<?php

use App\Http\Controllers\AuthGoogleController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExportExcel;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserGenerateController;
use Illuminate\Support\Facades\Route;

// Route Authentication & Public (Biarkan di luar)
Route::get('/', fn() => view('welcome'))->middleware('guest');

Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'register')->name('register.form');
    Route::post('/register', 'store')->name('register.store');
    Route::get('/login', 'loginForm')->name('login');
    Route::post('/login', 'login')->name('user.login');
    Route::post('/logout', 'logout')->name('user.logout');
});

Route::get('/auth/google', [AuthGoogleController::class, 'redirect']);
Route::get('/auth/google/callback', [AuthGoogleController::class, 'callback']);

// --- PENGELOMPOKAN ROUTE DASHBOARD ---
// Kita gunakan middleware 'auth' agar semua halaman di dalam group ini 
// hanya bisa diakses setelah login.
Route::middleware(['auth'])->group(function () {

    // Menggunakan prefix 'dashboard' jika ingin URL-nya menjadi /dashboard/history, dll.
    // Jika ingin tetap /history (tanpa prefix), hapus bagian ->prefix('dashboard')
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::get('/history', 'history')->name('history');
        Route::get('/generate', 'generatePage')->name('generate.page');
        Route::get('/result/{promptGeneration}', 'result')->name('generate.result');
    });

    // Profile & Generate Action
    Route::get('/profile', fn() => view('pages.user.profile'))->name('profile');
    Route::post('/generate', [UserGenerateController::class, 'generate'])->name('genarete.post');

    // Route AI Test Anda sebelumnya
    Route::get('/ai', [TestController::class, 'index'])->name('ai.get');
    Route::post('/ai', [TestController::class, 'TestResponse'])->name('ai.post');

    Route::get('/download/{id}', [PdfController::class, 'ExportPDF'])->name('export.pdf');
    Route::get('/download-excel', [ExportExcel::class, 'DownloadExcel'])->name('export.excel');

    Route::put('/update/password', [AuthController::class, 'resetPassword'])->name('update.password');
    Route::delete('/delete/{id}', [UserGenerateController::class, 'delete'])->name('delete.result');
});
