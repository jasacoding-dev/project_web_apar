<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sparepart extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_sparepart',
        'nama_sparepart',
        'jumlah',
        'keterangan',
        'foto',
    ];

    public function barcodes()
    {
        return $this->belongsToMany(Barcode::class, 'perbaikan_sparepart_barcodes', 'id_sparepart', 'id_barcode');
    }
}
