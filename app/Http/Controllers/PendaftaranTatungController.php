<?php

namespace App\Http\Controllers;

use App\Models\PendaftaranTatung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PendaftaranTatungController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_cetya_vihara_kelenteng' => ['required', 'string', 'max:150'],
            'penanggung_jawab' => ['required', 'string', 'max:100'],
            'no_kontak_penanggung_jawab' => ['required', 'string', 'max:30'],
            'jenis_pawai' => ['required', 'array', 'min:1'],
        ]);

        $jenisPawaiInput = $request->input('jenis_pawai', []);
        $jenisPawaiFiles = $request->file('jenis_pawai', []);
        $storedJenisPawai = [];

        foreach ($jenisPawaiInput as $entryId => $entryData) {
            $file = data_get($jenisPawaiFiles, $entryId . '.foto');
            $entryType = $entryData['type'] ?? null;

            $entryRules = [
                'type' => ['required', Rule::in(['Tatung', 'Tandu', 'Budaya'])],
                'foto' => ['required', 'file', 'image', 'max:5120'],
            ];

            if ($entryType === 'Tatung') {
                $entryRules['nama_dewa'] = ['required', 'string', 'max:100'];
                $entryRules['nama_tatung'] = ['required', 'string', 'max:100'];
            } else {
                $entryRules['nama'] = ['required', 'string', 'max:100'];
            }

            $entryValidated = Validator::make(
                array_merge($entryData, ['foto' => $file]),
                $entryRules
            )->validate();

            $storedPath = $file->store('pendaftaran-tatung', 'public');

            $storedJenisPawai[] = [
                'type' => $entryValidated['type'],
                'data' => $entryValidated['type'] === 'Tatung'
                    ? [
                        'nama_dewa' => $entryValidated['nama_dewa'],
                        'nama_tatung' => $entryValidated['nama_tatung'],
                    ]
                    : [
                        'nama' => $entryValidated['nama'],
                    ],
                'foto_path' => $storedPath,
                'foto_original_name' => $file->getClientOriginalName(),
                'foto_mime' => $file->getClientMimeType(),
            ];
        }

        PendaftaranTatung::create([
            'nama_cetya_vihara_kelenteng' => $validated['nama_cetya_vihara_kelenteng'],
            'penanggung_jawab' => $validated['penanggung_jawab'],
            'no_kontak_penanggung_jawab' => $validated['no_kontak_penanggung_jawab'],
            'jenis_pawai_json' => $storedJenisPawai,
            'status' => 'pending',
        ]);

        return back()
            ->withInput()
            ->with('success', 'Pendaftaran berhasil dikirim. Tim panitia akan menghubungi penanggung jawab.');
    }
}
