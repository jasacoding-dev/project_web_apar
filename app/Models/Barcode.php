<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barcode extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'id_lokasi',
        'id_apar',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'id_lokasi');
    }

    public function apar()
    {
        return $this->belongsTo(Apar::class, 'id_apar');
    }

    public function spareparts()
    {
        return $this->belongsToMany(Sparepart::class, 'perbaikan_sparepart_barcodes', 'id_barcode', 'id_sparepart');
    }

    public function perbaikanSparepart()
    {
        return $this->hasMany(PerbaikanBarcodeSparepart::class, 'id_barcode');
    }

    public function perbaikanLaporanKustom()
    {
        return $this->hasMany(PerbaikanLaporanKustom::class, 'id_barcode');
    }
}
