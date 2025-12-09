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

Route::get('/', function () {
    return Auth::check() ? redirect("/dashboard") : view('pages.homepage');
});

Route::get('/about', function() {
    return Auth::check() ? redirect("/dashboard") : view('pages.about');
})->name('about');

Route::get('/dashboard', function () {
    if (!Auth::check()) return redirect()->route('login');
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
    $user->food_today = [];
    //$user->food_today = [...$user->food_today, $req->food];

    $user->save();
    
    return response()->json([
        'success' => true,
        'user' => Auth::user(),
        'food' => $req->food
    ]);
});

Route::get('/logout', function (Request $req) {
    Auth::logout();
    $req->session()->invalidate();
    $req->session()->regenerateToken();
    return redirect()->route('login');
})->middleware('auth');