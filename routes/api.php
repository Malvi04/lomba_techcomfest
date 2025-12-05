<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\PasswordReset;
use App\Mail\ResetPasswordCode;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

function calculate_name_alias_json($name_food_string) {
    $foodData = json_decode(file_get_contents(base_path('routes/nutritions.json')), true);

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

    if ($bestScore < 70) {
        return null;
    }

    return $bestMatch;
}


function rotate_key() {
    static $index = 0;

    $apiKeys = [
        "AIzaSyCW8OY1ePxwJPbi-hBmMn9_QZ9tUfRHp3g",
        "AIzaSyBt0J2HltcWcVrJDd6RPc9iF8IPCilPI08",
        "AIzaSyCxfAXDaHGarOhG-pI4ZTqbaUmbssCEYoQ"
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
        $req->validate([
            'email' => 'required|string|email|max:255'
        ]);
    } catch (ValidationException $e) {
        return collect($e->errors())->flatten()->first();
    }

    $user = User::where('email', $req->email)->first();

    if (!$user) {
        return response()->json([
            'success' => false,
            'message' => 'Email tidak terdaftar!'
        ]);
    }

    PasswordReset::where('email', $req->email)->delete();

    $verification_code = random_int(100000, 999999);
    $token_expires_at = now()->addMinutes(5);

    PasswordReset::create([
        'email' => $req->email,
        'ver_code' => $verification_code,
        'created_at' => now(),
    ]);

    try {
        Mail::to($user->email)->send(new ResetPasswordCode($verification_code));
    } catch (Exception $e) {
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
        $req->validate([
            'email' => 'required|string|email|max:255',
            'ver_code' => 'required|integer|digits:6',
            'new_pass' => ['required', 'string', 'min:8', 'confirmed']
        ]);
    } catch (ValidationException $e) {
        return response()->json([
        'success' => false,
        'message' => collect($e->errors())->flatten()->first()
        ]);
    }

    $passwordReset = PasswordReset::where('email', $req->email)->where('ver_code', $req->ver_code)->first();

    if (!$passwordReset) {
        return response()->json([
            'success' => false,
            'message' => 'Kode verifikasi salah atau email tidak cocok.'
        ], 400);
    }

    // check expire time
    $expirationTime = $passwordReset->created_at->addMinutes(5);
    if (now()->greaterThan($expirationTime)) {
        $passwordReset->delete();
        return response()->json([
            'success' => false,
            'message' => 'Kode verifikasi sudah kedaluwarsa. Silakan minta kode baru.'
        ], 400);
    }

    $user = User::where('email', $req->email)->first();

    if (!$user) {
        return response()->json([
            'success' => false,
            'message' => 'User tidak ditemukan.'
        ], 404);
    }

    $user->password = Hash::make($req->new_pass);
    $user->save();

    $passwordReset->delete();

    return response()->json([
        'success' => true,
        'redirect' => route('login'),
        'message' => 'Password berhasil diubah! Silakan login kembali.'
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
        CURLOPT_URL => "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=" . rotate_key(),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
        ],
        CURLOPT_POSTFIELDS => json_encode([
            "contents" => [
                [
                    "role" => "user",
                    "parts" => [
                        [
                            "text" => "Analyze this food image and returns [\"food_name\"]. if its not a food, then return [\"unknown\"]. all case must be lower, return with indonesian name, and returns as it is."
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

    $text = json_decode($data["candidates"][0]["content"]["parts"][0]["text"]) ?? null;

    $result = calculate_name_alias_json($text[0]);

    return response()->json([
        'success' => true,
        'nama_makanan' => $text[0],
        'result' => $result
    ]);
});