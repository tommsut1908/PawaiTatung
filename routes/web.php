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

use App\Models\PendaftaranTatung;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/peserta', function (Illuminate\Http\Request $request) {
    $search = $request->input('search');
    $category = $request->input('category');
    $approvedTatungs = PendaftaranTatung::where('status', 'approved')->latest()->get();
    $participants = [];

    foreach ($approvedTatungs as $tatung) {
        $entries = $tatung->jenis_pawai_json ?? [];
        foreach ($entries as $index => $entry) {
            $type = $entry['type'] ?? '';
            $name = '';
            $deityName = '';

            if ($type === 'Tatung') {
                $name = $entry['data']['nama_tatung'] ?? '';
                $deityName = $entry['data']['nama_dewa'] ?? '';
            } else {
                $name = $entry['data']['nama'] ?? '';
            }

            if ($category) {
                if (strtolower($type) !== strtolower($category)) {
                    continue;
                }
            }

            if ($search) {
                $searchLower = strtolower($search);
                $matches = strpos(strtolower($type), $searchLower) !== false ||
                           strpos(strtolower($name), $searchLower) !== false ||
                           strpos(strtolower($deityName), $searchLower) !== false ||
                           strpos(strtolower($tatung->nama_cetya_vihara_kelenteng), $searchLower) !== false;
                if (!$matches) {
                    continue;
                }
            }

            $participants[] = [
                'type' => $type,
                'name' => $name,
                'deity_name' => $deityName,
                'vihara' => $tatung->nama_cetya_vihara_kelenteng,
                'foto_path' => $entry['foto_path'] ?? null,
            ];
        }
    }

    return view('peserta', compact('participants', 'search', 'category'));
})->name('peserta.index');

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
