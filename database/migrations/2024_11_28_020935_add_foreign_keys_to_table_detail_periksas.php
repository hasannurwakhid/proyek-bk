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
        Schema::table('detail_periksas', function (Blueprint $table) {
            //
            $table->foreign('id_obat')->references('id')->on('obats');
            $table->foreign('id_periksa')->references('id')->on('periksas');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_periksas', function (Blueprint $table) {
            //
            $table->dropForeign(['id_obat']);
            $table->dropForeign(['id_periksa']);

        });
    }
};
