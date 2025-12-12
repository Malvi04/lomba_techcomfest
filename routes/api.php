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
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

function calculate_name_alias_json($foods) {
    $foodData = json_decode(file_get_contents(base_path('routes/nutritions.json')), true);

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
                $item["name_target"] = $name_food_string;
                $aliasLower = strtolower(trim($alias));

                similar_text($search, $aliasLower, $percent);

                if ($percent > $bestScore) {
                    $bestScore = $percent;
                    $bestMatch = $item;
                }
            }
        }

        // minimal 85% baru di-anggap valid
        if ($bestScore >= 85 && $bestMatch !== null) {
            $results[] = $bestMatch;
        } else {
            $results[] = null;
        }
    }

    return $results;
}

function rotate_key() {
    $filePath = 'key_index.txt';

    if (file_exists($filePath)) {
        $index = (int)file_get_contents($filePath);
    } else {
        $index = 0;
    }
    $apiKeys = [
        "AIzaSyBS2VjmIvVpe_kVnutM9g7i3l56FFCjYi0",
        "AIzaSyC5JiulKVaazibPqHd_c2tjDnLOqMOeCxw",
        "AIzaSyCwNExhfsmeqbvSGxn3p1YDUzzGgl2Ald8",
        "AIzaSyCGAlhTFCJA-5859HKREfzMm-TqCOvHrWU",
        "AIzaSyBkC3Od_lPd_dbRhfvBGP2Mu2ip-fy9sOM",
        "AIzaSyDxvK7eVxclGqJw4cq90lFig0HmMK-PQ3A",
        "AIzaSyCKIT-QoFmirmwtFNHUlf2H8xYcJqAEhcg",
        "AIzaSyAocvH1gI6M4M7UViHNJcdgNOm2-M9_l6A",
        "AIzaSyCiIREAQ_xyK42fT9RPEqDJUwZPQTJq4_w",
        "AIzaSyDESnu3oweLAdo7N0bLxicJHxj6WzYQJrg"
    ];

    $key = $apiKeys[$index];
    $index = ($index + 1) % count($apiKeys);

    file_put_contents($filePath, $index);
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

/*Route::post("/predict_image", function (Request $req) {
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
        CURLOPT_URL => "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash-exp:generateContent?key=" . rotate_key(),
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
                            "text" => "Analyze this food image and returns [\"name_food\"]. if its not a food, then return [\"unknown\"]. if the image contains more than 1 food, then make more than one value. all case must be lower, return with indonesian name, and returns as it is."
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

    if (isset($data["error"])) {
        return response([
            'success' => false,
            'message' => $data
        ]);
    }

    $text = json_decode($data["candidates"][0]["content"]["parts"][0]["text"], true);

    if ($text[0] === "unknown") return response()->json([
        'success' => false,
    ]);

    $result = calculate_name_alias_json($text);
    
    return response()->json([
        'success' => true,
        'nama_makanan' => $text,
        'result' => $result
    ]);
});*/

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

    $payload = [
        'model' => 'glm-4.6v-flash',
        'messages' => [
            [
                'role' => 'user',
                'content' => [
                    [
                        'type' => 'image_url',
                        'image_url' => [
                            'url' => "data:$mime;base64,$req->image"
                        ]
                    ],
                    [
                        'type' => 'text',
                        'text' => 'Analyze this food image and return array like this: ["food_name"]. if this image contains more than one food, then add value in the array with a specific name of the food. if is it not a food, then return ["unknown"]. all case must be lower, return MUST indonesian name food, and returns as it is. example: ["telur mata sapi", "nasi putih", ...]'
                    ]
                ]
            ]
        ],
        'thinking' => [
            'type' => 'enabled'
        ]
    ];

    $token = 'a95965a0b645476d9a8fca51870bfb87.JOYEIx1BUoNMF9Dm'; 
    $curl = curl_init("https://api.z.ai/api/paas/v4/chat/completions");

    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . $token,
        'Content-Type: application/json'
    ]);

    $response = curl_exec($curl);
    curl_close($curl);
    $data = json_decode($response);

    $content_string = $data->choices[0]->message->content;

    if (preg_match('/<\|begin_of_box\|>(.*?)<\|end_of_box\|>/s', $content_string, $matches)) {
        $target_json_string = trim($matches[1]);
        $result_array = json_decode($target_json_string, true);
        
        if (is_array($result_array)) {
            $result = calculate_name_alias_json($result_array);
    
            return response()->json([
                'success' => true,
                'nama_makanan' => $result_array,
                'result' => $result
            ]);
        } else {
            return response()->json([
                'message' => "ini bukan array",
                'success' => false,
            ]);
        }
    } else {
        $result_array = json_decode($content_string, true);
        
        if (is_array($result_array)) {
            $result = calculate_name_alias_json($result_array);
    
            return response()->json([
                'success' => true,
                'nama_makanan' => $result_array,
                'result' => $result
            ]);
        } else {
            return response()->json([
                'message' => "ini bukan array",
                'success' => false,
            ]);
        }
    }
});