<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftaranTatungController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pendaftaran/tatung', function () {
    return view('register-tatung');
})->name('pendaftaran.tatung');

Route::post('/pendaftaran/tatung', [PendaftaranTatungController::class, 'store'])->name('pendaftaran.tatung.submit');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Dashboard Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/dashboard/status', [DashboardController::class, 'updateStatus'])->name('dashboard.status');
});
