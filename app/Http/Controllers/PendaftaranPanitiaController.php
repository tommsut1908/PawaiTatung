<?php

namespace App\Http\Controllers;

use App\Models\PendaftaranPanitia;
use Illuminate\Http\Request;

class PendaftaranPanitiaController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:100'],
            'no_kontak' => ['required', 'string', 'max:30'],
        ]);

        PendaftaranPanitia::create([
            'nama' => $validated['nama'],
            'no_kontak' => $validated['no_kontak'],
            'status' => 'pending',
        ]);

        return back()->with('success', 'Pendaftaran berhasil. Nanti panitia akan menghubungi Anda.');
    }
}
