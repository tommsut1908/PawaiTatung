<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaranTatungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran_tatungs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_cetya_vihara_kelenteng', 150);
            $table->string('penanggung_jawab', 100);
            $table->string('no_kontak_penanggung_jawab', 30);
            $table->text('jenis_pawai_json')->nullable();
            $table->string('status', 20)->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftaran_tatungs');
    }
}
