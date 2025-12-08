<?php

use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\PasswordReset;
use App\Mail\ResetPasswordCode;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
function calculate_name_alias_json($foods) {
    $foodData = json_decode(file_get_contents(base_path('routes/nutritions.json')), true);

    // pastikan input selalu array
    if (!is_array($foods)) {
        $foods = [$foods];
    }

    $results = [];

    foreach ($foods as $name_food_string) {
        $search = strtolower(trim($name_food_string));
        $bestScore = 0;
        $bestMatch = null;

        foreach ($foodData as $item) {
            foreach ($item["name_alias"] as $alias) {
                $aliasLower = strtolower(trim($alias));

                similar_text($search, $aliasLower, $percent);

                if ($percent > $bestScore) {
                    $bestScore = $percent;
                    $bestMatch = $item;
                }
            }
        }

        // minimal 70% baru di-anggap valid
        if ($bestScore >= 70 && $bestMatch !== null) {
            $results[] = $bestMatch;
        } else {
            $results[] = null;
        }
    }

    return $results;
}

function rotate_key() {
    static $index = 0;

    $apiKeys = [
        "SECRET_API"
    ];

    $key = $apiKeys[$index];
    $index = ($index + 1) % count($apiKeys);

    return $key;
}

function get_base64_mime_type($base64) {
    $binary = base64_decode($base64, true);

    if ($binary === false) return false;

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_buffer($finfo, $binary);
    finfo_close($finfo);

    return $mimeType;
}

Route::post('/rv_forgot_password', function (Request $req) {
    try {
        $data = $req->validate([
            'email' => 'required|string|email|max:255'
        ]);
    } catch (ValidationException $e) {
        return response()->json(['success' => false, 'message' => collect($e->errors())->flatten()->first()], 422);
    }

    $user = User::where('email', $data['email'])->first();
    if (!$user) {
        return response()->json([
            'success' => false,
            'message' => 'Email tidak terdaftar!'
        ], 404);
    }

    PasswordReset::where('email', $data['email'])->delete();

    $verification_code = random_int(100000, 999999);

    PasswordReset::create([
        'email' => $data['email'],
        'ver_code' => $verification_code,
        'created_at' => now(),
    ]);

    try {
        Mail::to($user->email)->send(new ResetPasswordCode($verification_code));
    } catch (\Exception $e) {
        Log::error("Gagal kirim email reset password ke {$user->email}: " . $e->getMessage());
        return response()->json([
            'success' => false,
            'message' => 'Gagal mengirim email verifikasi. Coba lagi nanti.'
        ], 500);
    }

    return response()->json([
        'success' => true,
        'message' => 'Kode verifikasi sudah dikirim ke email Anda.'
    ]);
});

Route::post('/forgot_password', function (Request $req) {
    try {
        $data = $req->validate([
            'email' => 'required|string|email|max:255',
            'ver_code' => 'required|integer|digits:6',
            'new_pass' => ['required', 'string', 'min:8', 'confirmed']
        ]);
    } catch (ValidationException $e) {
        return response()->json(['success' => false, 'message' => collect($e->errors())->flatten()->first()], 422);
    }

    $passwordReset = PasswordReset::where('email', $data['email'])->where('ver_code', $data['ver_code'])->first();

    if (!$passwordReset) {
        return response()->json([
            'success' => false,
            'message' => 'Kode verifikasi salah atau email tidak cocok.'
        ], 400);
    }

    $expirationTime = $passwordReset->created_at->addMinutes(5);
    if (now()->greaterThan($expirationTime)) {
        $passwordReset->delete();
        return response()->json([
            'success' => false,
            'message' => 'Kode verifikasi sudah kedaluwarsa. Silakan minta kode baru.'
        ], 400);
    }

    $user = User::where('email', $data['email'])->first();

    if (!$user) {
        return response()->json([
            'success' => false,
            'message' => 'User tidak ditemukan.'
        ], 404);
    }

    $user->password = Hash::make($data['new_pass']);
    $user->save();

    $passwordReset->delete();

    return response()->json([
        'success' => true,
        'redirect' => '/login',
        'message' => 'Password berhasil di-reset. Silakan login dengan password baru Anda.'
    ]);
});

Route::post("/predict_image", function (Request $req) {
    try {
        $req->validate([
            'image' => ['required', 'string', 'regex:/^[A-Za-z0-9+\/=]+$/']
        ]);
    } catch (ValidationException $e) {
        return response()->json([
            'success' => false,
            'message' => collect($e->errors())->flatten()->first()
        ]);
    }

    $mime = get_base64_mime_type($req->image);
    if (!$mime || !in_array($mime, ['image/jpeg', 'image/png'])) {
        return response()->json([
            'success' => false,
            'message' => 'Not a vaild image file.'
        ]);
    }

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash-lite:generateContent?key=" . rotate_key(),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
        ],
        CURLOPT_POSTFIELDS => json_encode(value: [
            "contents" => [
                [
                    "role" => "user",
                    "parts" => [
                        [
                            "text" => "Analyze this food image and returns [\"food_name\"]. if its not a food, then return [\"unknown\"]. if the image contains more than 1 foods, make it like this for example: [\"a\", \"b\", ...]. all case must be lower, return with indonesian name, and returns as it is."
                        ],
                        [
                            "inlineData" => [
                                "mimeType" => $mime,
                                "data" => $req->image,
                            ]
                        ]
                    ]
                ]
            ]
        ]),
    ]);

    $response = curl_exec($curl);
    curl_close($curl);

    $data = json_decode($response, true);
    if (!empty($data["error"])) {
        return response([
            'success' => false,
            'message' => "Limit exceeded."
        ]);
    }

    $text = json_decode($data["candidates"][0]["content"]["parts"][0]["text"]) ?? null;
    
    if ($text[0] === "unknown") return response()->json([
        'success' => false,
    ]);

    $result = calculate_name_alias_json($text);

    return response()->json([
        'success' => true,
        'nama_makanan' => $text,
        'result' => $result
    ]);
});