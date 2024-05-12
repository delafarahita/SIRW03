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
        Schema::create('data_penilaian', function(Blueprint $table) {
            $table->id('id_penilaian');
            $table->unsignedBigInteger('id_kriteria');
            $table->unsignedBigInteger('id_alternatif');
            $table->integer('nilai');

            $table->foreign('id_kriteria')->references('id_kriteria')->on('data_kriteria');
            $table->foreign('id_alternatif')->references('id_alternatif')->on('data_alternatif');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_penilaian');
    }
};
