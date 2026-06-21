<?php

namespace App\Http\Controllers;

use App\Models\PendaftaranPanitia;
use App\Models\PendaftaranTatung;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $tab = $request->input('tab', 'tatung');

        $tatungQuery = PendaftaranTatung::query()->latest();
        $panitiaQuery = PendaftaranPanitia::query()->latest();

        if ($search) {
            $tatungQuery->where(function ($q) use ($search) {
                $q->where('nama_cetya_vihara_kelenteng', 'like', "%{$search}%")
                  ->orWhere('penanggung_jawab', 'like', "%{$search}%")
                  ->orWhere('no_kontak_penanggung_jawab', 'like', "%{$search}%");
            });

            $panitiaQuery->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('no_kontak', 'like', "%{$search}%");
            });
        }

        $tatungs = $tatungQuery->get();
        $panitias = $panitiaQuery->get();

        return view('dashboard', compact('tatungs', 'panitias', 'search', 'tab'));
    }

    public function updateStatus(Request $request)
    {
        $validated = $request->validate([
            'id' => ['required', 'integer'],
            'type' => ['required', 'string', 'in:tatung,panitia'],
            'status' => ['required', 'string', 'in:pending,approved,rejected'],
        ]);

        if ($validated['type'] === 'tatung') {
            $registration = PendaftaranTatung::findOrFail($validated['id']);
        } else {
            $registration = PendaftaranPanitia::findOrFail($validated['id']);
        }

        $registration->update([
            'status' => $validated['status']
        ]);

        return back()->with('success', 'Status pendaftaran berhasil diperbarui.');
    }
}
