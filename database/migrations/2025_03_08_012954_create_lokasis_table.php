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
        Schema::create('lokasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_gedung');
            $table->string('lantai');
            $table->string('nama_ruangan');
            $table->string('pemilik_gedung');
            $table->string('alamat_gedung');
            $table->string('pic_gedung');
            $table->string('satuan_kerja');
            $table->date('tanggal_pengecekan');
            $table->date('tanggal_kadaluwarsa');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lokasis');
    }
};
