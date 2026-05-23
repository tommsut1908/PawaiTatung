<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AlterPendaftaranTatungsJenisPawaiJsonToLongtext extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE pendaftaran_tatungs MODIFY jenis_pawai_json LONGTEXT NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('ALTER TABLE pendaftaran_tatungs MODIFY jenis_pawai_json TEXT NULL');
    }
}
