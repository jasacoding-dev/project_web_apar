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
        Schema::create('perbaikan_laporan_kustom', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_barcode')->constrained('barcodes')->onDelete('cascade');
            $table->text('temuan');
            $table->integer('jumlah');
            $table->enum('rencana_tindak_lanjut', ['perlu_pengecekan', 'perlu_pengadaan', 'perlu_penggantian']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perbaikan_laporan_kustom');
    }
};
