<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventaris');
    }

    public function up(): void
    {
        Schema::dropIfExists('inventaris');

        Schema::create('inventaris', function (Blueprint $table) {
            $table->id('inventaris_id');
            $table->string('nama_barang');
            $table->string('jenis_barang');
            $table->enum('status_barang',['Tersedia', 'Dipinjam']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
};
