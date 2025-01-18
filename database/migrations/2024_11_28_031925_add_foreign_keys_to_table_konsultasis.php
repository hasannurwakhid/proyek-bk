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
        Schema::table('konsultasis', function (Blueprint $table) {
            //
            $table->foreign("id_pasien")->references("id")->on("pasiens");
            $table->foreign("id_dokter")->references("id")->on("dokters");
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('konsultasis', function (Blueprint $table) {
            //
            $table->dropForeign("id_pasien");
            $table->dropForeign("id_dokter");
        });
        
    }
};
