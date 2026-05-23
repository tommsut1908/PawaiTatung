<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranTatung extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_cetya_vihara_kelenteng',
        'penanggung_jawab',
        'no_kontak_penanggung_jawab',
        'jenis_pawai_json',
        'status',
    ];

    protected $casts = [
        'jenis_pawai_json' => 'array',
    ];
}
