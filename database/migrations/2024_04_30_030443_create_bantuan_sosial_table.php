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
        Schema::create('bantuan_sosial', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenis');
            $table->integer('jumlah');
            $table->string('status');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('bantuan_sosial');
    }
};
