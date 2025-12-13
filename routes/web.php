<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\PasswordReset;
use App\Mail\ResetPasswordCode;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

Route::get('/services', function () {
    return Auth::check() ? redirect("/dashboard") : view('pages.services');
})->name('services');


Route::get('/comingsoon', function () {
    return view('pages.comingsoon');
})->name('comingsoon');

Route::get('/', function () {
    return Auth::check() ? redirect("/dashboard") : view('pages.homepage');
});


Route::get('/sleep-tracker', function () {
    if (!Auth::check()) return redirect()->route('login');
    $user_data = Auth::user();

    if (!$user_data->umur) return redirect('/assesment');

    return view('pages.sleep-tracking', ['user' => Auth::user()]);
})->middleware('auth')->name('sleep.tracker');

Route::get('/hidupsehat', function () {
    if (!Auth::check()) return redirect()->route('login');
    $user_data = Auth::user();

    if (!$user_data->umur) return redirect('/assesment');

    return view('pages.hidup', ['user' => Auth::user()]);
})->middleware('auth')->name('hidupsehat');

Route::get('/dietSehat', function () {
    if (!Auth::check()) return redirect()->route('login');
    $user_data = Auth::user();

    if (!$user_data->umur) return redirect('/assesment');

    return view('pages.diet-sehat', ['user' => Auth::user()]);
})->middleware('auth')->name('dietsehat');

Route::get('/diabetes', function () {
    if (!Auth::check()) return redirect()->route('login');
    $user_data = Auth::user();

    if (!$user_data->umur) return redirect('/assesment');

    return view('pages.diabetes-olh', ['user' => Auth::user()]);
})->middleware('auth')->name('diabetes');

Route::get('/olahraga', function () {
    if (!Auth::check()) return redirect()->route('login');
    $user_data = Auth::user();

    if (!$user_data->umur) return redirect('/assesment');

    return view('pages.olahraga', ['user' => Auth::user()]);
})->middleware('auth')->name('olahraga');


Route::get('/about', function() {
    return Auth::check() ? redirect("/dashboard") : view('pages.about');
})->name('about');

Route::get('/dashboard', function () {
    if (!Auth::check()) return redirect()->route('login');
    $user_data = Auth::user();

    if (!$user_data->umur) return redirect('/assesment');

    return view('pages.dashboard', ['user' => Auth::user()]);
})->middleware('auth')->name('dashboard');


Route::get('/hasil', function () {
    if (!Auth::check()) return redirect()->route('login');
    return view('pages.result', ['user' => Auth::user()]);
})->middleware('auth')->name('hasil');

Route::get('/login', function () {
    return Auth::check() ? redirect('/dashboard') : view('auth.login');
})->name('login');

Route::get('/register', function () {
    return Auth::check() ? redirect('/dashboard') : view('auth.register');
})->name('register');

Route::get('/forgot_password', function () {
    return Auth::check() ? redirect('/dashboard') : view('auth.forgot_password');
})->name('forgot_password');

Route::get('/assesment', function () {
    if (!Auth::check()) return redirect()->route('login');
    $user_data = Auth::user();

    if ($user_data->umur) return redirect('/dashboard');
    return view('assesment.index');
})->middleware('auth')->name('assesment');

Route::post('/register', function (Request $req) {
    try {
        $data = $req->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
    } catch (ValidationException $e) {
        return redirect()->route('register')->with('error', collect($e->errors())->flatten()->first());
    }

    User::create([
        'full_name' => $data['full_name'],
        'username' => $data['username'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
    ]);

    return redirect()->route('login')->with('success', 'Registrasi berhasil! Silahkan masukkan akun anda.');
});

Route::post('/login', function (Request $req) {
    try {
        $data = $req->validate([
            'uoe' => 'required|string', // username or email
            'password' => 'required|string',
        ]);
    } catch (ValidationException $e) {
        return redirect()->route('login')->with('error', 'Something went wrong! Please try again later.');
    }

    $user = User::where('username', $data['uoe'])->orWhere('email', $data['uoe'])->first();
    if (!$user || !Hash::check($data['password'], $user->password)) {
        return redirect()->route('login')->with('error', 'Username dan Password yang anda masukkan salah!');
    }

    Auth::login($user);
    $req->session()->regenerate();

    return redirect()->intended('/dashboard');
});

Route::middleware('auth')->post('/get_food', function(Request $req) {
    try {
        $req->validate([
            'name' => ['required', 'string', 'max:255']
        ]);
    } catch (ValidationException $e) {
        return response()->json([
            'status' => false,
            'message' => 'Nama Makanan harus diisi dengan vaild.'
        ]);
    }

    $result = calculate_name_alias_json([$req->name]);

    if ($result === [null]) {
        return response()->json([
            'status' => false,
            'message' => 'Makanan tidak ditemukan di dataset.'
        ]);
    }

    return response()->json([
        'success' => true,
        'result' => $result
    ]);
});

Route::middleware('auth')->post('/edit_food', action: function(Request $req) {
    if (!isset($req->id)) {
        return response()->json([
            'success' => false,
            'message' => 'ID harus diisi.'
        ], 400);
    }
    if (!isset($req->result)) {
        return response()->json([
            'success' => false,
            'message' => 'Result harus diisi.'
        ], 400);
    }
    if (!is_array($req->result)) {
        return response()->json([
            'success' => false,
            'message' => 'Result harus berbentuk array.'
        ], 400);
    }

    $user = Auth::user();
    $targetId = $req->id;
    $data = $user->food_today;

    foreach ($data as $i => $item) {
        if ($item['id'] === $targetId) {
            $data[$i] = $req->result[0];
        }
    }

    $user->current_protein = 0;
    $user->current_karbo = 0;
    $user->current_kalori = 0;

    foreach ($data as $i => $inner) {
        $user->current_protein += $data[$i]["proteins"];
        $user->current_karbo += $data[$i]["carbohydrate"];
        $user->current_kalori += $data[$i]["calories"];
    }

    $user->food_today = $data;
    $user->save();
});

Route::middleware('auth')->post('/delete_food', action: function(Request $req) {
    try {
        $req->validate([
            'id' => ['required', 'string', 'max:255']
        ]);
    } catch (ValidationException $e) {
        return response()->json([
            'status' => false,
            'message' => 'ID harus diisi dengan vaild.'
        ]);
    }

    $user = Auth::user();
    $data = $user->food_today;
    $targetId = $req->id;

    $data = array_filter($data, function($item) use ($targetId) {
        return $item['id'] !== $targetId;
    });
    $data = array_values($data);

    $user->food_today = $data;

    $user->current_protein = 0;
    $user->current_karbo = 0;
    $user->current_kalori = 0;

    foreach ($data as $i => $inner) {
        $user->current_protein += $data[$i]["proteins"];
        $user->current_karbo += $data[$i]["carbohydrate"];
        $user->current_kalori += $data[$i]["calories"];
    }

    $user->save();
});

Route::middleware('auth')->post('/add_food_to_db', function (Request $req) {
    if (!isset($req->food)) {
        return response()->json([
            'success' => false,
            'message' => 'Food harus diisi.'
        ], 400);
    }

    if (!is_array($req->food)) {
        return response()->json([
            'success' => false,
            'message' => 'Food harus berbentuk array.'
        ], 400);
    }

    if (empty($req->food)) {
        return response()->json([
            'success' => false,
            'message' => 'Food tidak boleh kosong.'
        ], 400);
    }

    $user = Auth::user();
    $user->current_protein += $req->food["total_protein"];
    $user->current_kalori += $req->food["total_kalori"];
    $user->current_karbo += $req->food["total_karbohidrat"];
    $user->food_today = [...$user->food_today, ...$req->food["result"]];

    $user->save();
    
    return response()->json([
        'success' => true,
        'user' => Auth::user(),
        'food' => $req->food
    ]);
});

Route::middleware('auth')->post('/complete_profile', function (Request $req) {
    try {
        $req->validate([
            'step_1' => 'required|integer', // username or email
            'step_2' => 'required|integer',
            'step_3' => 'required|integer',
            'step_4' => 'required|integer',
            'step_5' => 'required|integer',
            'step_6' => 'required|integer',
            'step_7' => 'required|integer',
        ]);

        $user = Auth::user();
        if ($user->umur) return redirect('/dashboard');

        $user->umur = (int) $req->step_1;
        $user->kelamin = (int) $req->step_2;
        $user->berat_badan = (float) $req->step_3;
        $user->tinggi_badan = (float) $req->step_4;
        $user->seberapa_aktif = (int) $req->step_5;
        $user->sakit_diabetes = (int) $req->step_6;
        $user->waktu_tidur = (int) $req->step_7;

        $weight = max(1, $user->berat_badan);
        $height = max(1, $user->tinggi_badan);
        $age = max(1, $user->umur);

        if ($user->kelamin === 1) $bmr = (10 * $weight) + (6.25 * $height) - (5 * $age) + 5;
        else $bmr = (10 * $weight) + (6.25 * $height) - (5 * $age) - 161;

        switch ($user->seberapa_aktif) {
            case 1: $activityFactor = 1.2; break;
            case 2: $activityFactor = 1.375; break;
            case 3: $activityFactor = 1.55; break;
            case 4: $activityFactor = 1.725; break;
            default: $activityFactor = 1.375; break;
        }

        $tdee = $bmr * $activityFactor;

        $sleepFactor = ($user->waktu_tidur === 2) ? 0.95 : 1.0; // tidur setelah jam 10 => turunkan 5%
        $tdee_final = $tdee * $sleepFactor;

        if ($user->sakit_diabetes === 1 || $user->sakit_diabetes === 3) {
            $proteinFactor = 1.65;
        } else {
            $proteinFactor = 1.4;
        }
        $protein_g = round($weight * $proteinFactor);
        
        $carbPercent = ($user->sakit_diabetes === 1 || $user->sakit_diabetes === 3) ? 0.40 : 0.50;
        $carb_kcal = $tdee_final * $carbPercent;
        $carb_g = round($carb_kcal / 4);

        $user->limit_kalori = (float)round($tdee_final, 2);
        $user->limit_protein = (float)$protein_g;
        $user->limit_karbo = (float)$carb_g;

        $user->save();

        return response()->json([
            'status' => true
        ]);
    } catch (ValidationException $e) {
        return response()->json([
            'status' => false,
            'message' => collect($e->errors())->flatten()->first()
        ]);
    }
});

Route::get('/logout', function (Request $req) {
    Auth::logout();
    $req->session()->invalidate();
    $req->session()->regenerateToken();
    return redirect()->route('login');
})->middleware('auth');

