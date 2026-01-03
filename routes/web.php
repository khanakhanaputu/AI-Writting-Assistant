<?php

use App\Http\Controllers\AuthGoogleController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

// Route::get('/login', function () {
//     return view('welcome');
// })->name('login');

Route::get('/ai', [TestController::class, 'index'])->name('ai.get')->middleware('auth');
Route::post('/ai', [TestController::class, 'TestResponse'])->name('ai.post');

Route::get('/register', [AuthController::class, 'register'])->name('register.form');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');

Route::post('/logout', [AuthController::class, 'logout'])->name('user.logout');

Route::get('/profile', fn() => view('user.profile'));

Route::get('/login', [AuthController::class, 'loginForm']);
Route::post('/login', [AuthController::class, 'login'])->name('user.login');


Route::get('/auth/google', [AuthGoogleController::class, 'redirect']);
Route::get('/auth/google/callback', [AuthGoogleController::class, 'callback']);
