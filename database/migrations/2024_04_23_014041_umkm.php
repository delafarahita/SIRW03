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
        Schema::create('umkm', function(Blueprint $table) {
           $table->id('id_umkm');
           $table->string('nama_umkm', 50);
           $table->enum('kategori_umkm' ,['dagang', 'jasa']);
           $table->string('pemilik_umkm', 50);
           $table->string('alamat_umkm', 100);
           $table->unsignedBigInteger('id_rt');
           $table->string('rw', 5);
           $table->string('kelurahan', 50);
           $table->string('kecamatan', 50);
           $table->string('image_path');
           $table->string('deskripsi_umkm', 50);

           $table->foreign('id_rt')->references('id_rt')->on('rt');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umkm');
    }
};
