<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\PasswordReset;
use App\Mail\ResetPasswordCode;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

Route::get('/', function () {
    return view('welcome');
});

// testing ui 
Route::get('/login', fn() => view('auth.login'))->name('login');
Route::get('/register', fn() => view('auth.register'))->name('register');
Route::get('/leadingpage', fn() => view('pages.leadingpage'))->name('leadingpage');
Route::get('/about', fn() => view('pages.about'))->name('about');


// end 

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