<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerbaikanLaporanKustom extends Model
{
    use HasFactory;

    protected $table = 'perbaikan_laporan_kustom';

    protected $fillable = [
        'id_barcode',
        'temuan',
        'jumlah',
        'rencana_tindak_lanjut',
    ];
}
