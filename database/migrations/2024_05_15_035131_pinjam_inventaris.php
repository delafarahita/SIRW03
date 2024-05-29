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
        Schema::dropIfExists('pinjam_inventaris');

        Schema::create('pinjam_inventaris', function (Blueprint $table) {
            $table->id('pinjam_inventaris_id');
            $table->unsignedBigInteger('inventaris_id');
            $table->string('peminjam');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali')->nullable();
            $table->timestamps();

            // $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('inventaris_id')->references('inventaris_id')->on('inventaris');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjam_inventaris');
    }
};
