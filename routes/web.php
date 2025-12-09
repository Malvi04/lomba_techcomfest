<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\PasswordReset;
use App\Mail\ResetPasswordCode;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;


// testing ui woi jangan dulu di apusss
Route::get('/services', function () {
    return view('pages.services');
})->name('services');
Route::get('/comingsoon', function () {
    return view('pages.comingsoon');
})->name('comingsoon');


// end testing ui

Route::get('/', function () {
    return view('pages.homepage');
})->name('homepage');

Route::get('/about', function() {
    if (!Auth::check()) return view('pages.about');
    return redirect('about');
});

Route::get('/dashboard', function () {
    if (!Auth::check())return view('pages.dashboard');
    return redirect('dashboard');
});

Route::get('/hasil', function () {
    return view('pages.result');
})->name('hasil');

Route::get('/login', fn() => view('auth.login'))->name('login');
Route::get('/register', fn() => view('auth.register'))->name('register');
Route::get('/forgot_password', fn() => view('auth.forgot_password'))->name('forgot_password');

Route::post('/register', function(Request $req) {
    try {
        $req->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
    } catch(ValidationException $e) {
        return redirect()->route('register')->with('error', collect($e->errors())->flatten()->first());
    }

    $user = User::create([
        'full_name' => $req->full_name,
        'username' => $req->username,
        'email' => $req->email,
        'password' => Hash::make($req->password),
    ]);

    return redirect()->route('login')->with('success', 'Registrasi berhasil! Silahkan masukkan akun anda.');
});

Route::post('/login', function(Request $req) {
    try {
        $req->validate([
            'uoe' => 'required|string', // maksud uoe = username or email
            'password' => 'required|string',
        ]);
    } catch(ValidationException) {
        return redirect()->route('login')->with('error', 'Something went wrong! Please try again later.');
    }
    

    $user = User::where('username', $req->uoe)->orWhere('email', $req->uoe)->first();
    if (!$user || !Hash::check($req->password, $user->password)) {
        return redirect()->route('login')->with('error', 'Username dan Password yang anda masukkan salah!');
    }

    return redirect()->route('login')->with('success', 'Anda berhasil login!');
});

Route::post('/rv_forgot_password', function (Request $req) {
    try {
        $req->validate([
            'email' => 'required|string|email|max:255'
        ]);
    } catch (ValidationException) {
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
        $req->validate([
            'email' => 'required|string|email|max:255',
            'ver_code' => 'required|integer|digits:6',
            'new_pass' => ['required', 'string', 'min:8', 'confirmed']
        ]);
    } catch (ValidationException) {
        return collect($e->errors())->flatten()->first();
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
        'message' => 'Password berhasil di-reset. Silakan login dengan password baru Anda.'
    ]);
});