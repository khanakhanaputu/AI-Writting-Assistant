<?php

use App\Http\Controllers\AuthGoogleController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ai', [TestController::class, 'index'])->name('ai.get')->middleware('auth');
Route::post('/ai', [TestController::class, 'TestResponse'])->name('ai.post');

Route::get('/register', [AuthController::class, 'register'])->name('register.form');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');

Route::post('/logout', [AuthController::class, 'logout'])->name('user.logout');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('user.login');


Route::get('/auth/google', [AuthGoogleController::class, 'redirect']);
Route::get('/auth/google/callback', [AuthGoogleController::class, 'callback']);

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/profile', fn() => view('pages.user.profile'));
Route::get('/result', fn() => view('pages.reports.result'));
Route::get('/history', fn() => view('pages.reports.history'));
Route::get('/generate', [DashboardController::class, 'generatePage']);
