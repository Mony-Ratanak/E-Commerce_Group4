<?php

use App\Http\Controllers\AuthControoler;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [AuthControoler::class, 'login']);
Route::get('/register', [AuthControoler::class, 'register']);
Route::get('/forgot_password', [AuthControoler::class, 'showPassword'])->name('forgot-password');

Route::post('/register', [ AuthControoler::class, 'registerUser'])->name('register-user');
Route::post('login',[AuthControoler::class, 'loginUser'])->name('login-user');
Route::post('/forgot_password', [AuthControoler::class, 'resetPassword'])->name('forgot-password');


Route::get('/dashboard', [AuthControoler::class, 'dashboard']);
