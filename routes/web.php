<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftaranPanitiaController;

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

Route::get('/pendaftaran/panitia', function () {
    return view('register-panitia');
})->name('pendaftaran.panitia');

Route::post('/pendaftaran/panitia', [PendaftaranPanitiaController::class, 'store'])->name('pendaftaran.panitia.submit');
