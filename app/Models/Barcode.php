<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barcode extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_lokasi',
        'id_apar',
        'status',
    ];

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
}
