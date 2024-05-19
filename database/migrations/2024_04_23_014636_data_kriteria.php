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
        Schema::create('data_kriteria', function (Blueprint $table) {
            $table->id('id_kriteria');
            $table->string('kode_kriteria');
            $table->string('nama_kriteria');
            $table->decimal('bobot');
            $table->enum('jenis', ['Benefit', 'Cost']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_kriteria');
    }
};
