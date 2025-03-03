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
        Schema::create('apars', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_apar')->unique();
            $table->string('pemilik');
            $table->string('merek');
            $table->string('sistem_kerja');
            $table->foreignId('jenis_media_id')->constrained('media_apars')->onDelete('cascade');
            $table->string('kapasitas');
            $table->foreignId('model_tabung_id')->constrained('model_tabungs')->onDelete('cascade');
            $table->string('nomor_tabung')->unique();
            $table->date('tanggal_kadaluarsa');
            $table->text('keterangan')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apars');
    }
};
