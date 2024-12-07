<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('daftar_polis', function (Blueprint $table) {
            //
            $table->foreign("id_pasien")->references("id")->on("pasiens");
            $table->foreign("id_jadwal")->references("id")->on("jadwal_periksas");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('daftar_polis', function (Blueprint $table) {
            //
            $table->dropForeign(['id_pasien']);
            $table->dropForeign(['id_jadwal']);
        });
    }
};
