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
                'id' => $tatung->id,
                'index' => $index,
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
    
    // Update participant details
    Route::post('/peserta/update', function (Illuminate\Http\Request $request) {
        $id = $request->input('id');
        $index = $request->input('index');
        
        $tatung = PendaftaranTatung::findOrFail($id);
        $entries = $tatung->jenis_pawai_json ?? [];
        
        if (!isset($entries[$index])) {
            return back()->with('error', 'Peserta tidak ditemukan.');
        }
        
        // Update parent Vihara and PIC details
        $tatung->nama_cetya_vihara_kelenteng = $request->input('vihara');
        $tatung->penanggung_jawab = $request->input('penanggung_jawab');
        $tatung->no_kontak_penanggung_jawab = $request->input('no_kontak');
        $tatung->save();
        
        // Update entry details
        $type = $request->input('type');
        $entries[$index]['type'] = $type;
        
        if ($type === 'Tatung') {
            $entries[$index]['data']['nama_tatung'] = $request->input('name');
            $entries[$index]['data']['nama_dewa'] = $request->input('deity_name');
            if (isset($entries[$index]['data']['nama'])) {
                unset($entries[$index]['data']['nama']);
            }
        } else {
            $entries[$index]['data']['nama'] = $request->input('name');
            if (isset($entries[$index]['data']['nama_tatung'])) {
                unset($entries[$index]['data']['nama_tatung']);
            }
            if (isset($entries[$index]['data']['nama_dewa'])) {
                unset($entries[$index]['data']['nama_dewa']);
            }
        }
        
        // Handle photo upload if present
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('foto_peserta', 'public');
            $entries[$index]['foto_path'] = $path;
        }
        
        $tatung->jenis_pawai_json = $entries;
        $tatung->save();
        
        return back()->with('success', 'Data peserta berhasil diperbarui.');
    })->name('peserta.update');

    // Delete participant
    Route::post('/peserta/delete', function (Illuminate\Http\Request $request) {
        $id = $request->input('id');
        $index = $request->input('index');
        
        $tatung = PendaftaranTatung::findOrFail($id);
        $entries = $tatung->jenis_pawai_json ?? [];
        
        if (!isset($entries[$index])) {
            return back()->with('error', 'Peserta tidak ditemukan.');
        }
        
        // Remove the entry from the array
        array_splice($entries, $index, 1);
        
        $tatung->jenis_pawai_json = $entries;
        $tatung->save();
        
        return back()->with('success', 'Peserta berhasil dihapus.');
    })->name('peserta.delete');

    // Add participant entry
    Route::post('/peserta/add', function (Illuminate\Http\Request $request) {
        $id = $request->input('id');
        
        $tatung = PendaftaranTatung::findOrFail($id);
        $entries = $tatung->jenis_pawai_json ?? [];
        
        $type = $request->input('type');
        $newEntry = [
            'type' => $type,
            'data' => []
        ];
        
        if ($type === 'Tatung') {
            $newEntry['data']['nama_tatung'] = $request->input('name');
            $newEntry['data']['nama_dewa'] = $request->input('deity_name');
        } else {
            $newEntry['data']['nama'] = $request->input('name');
        }
        
        // Handle photo upload if present
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('foto_peserta', 'public');
            $newEntry['foto_path'] = $path;
        } else {
            $newEntry['foto_path'] = null;
        }
        
        $entries[] = $newEntry;
        $tatung->jenis_pawai_json = $entries;
        $tatung->save();
        
        return back()->with('success', 'Berhasil menambahkan entri peserta pawai.');
    })->name('peserta.add');
});
