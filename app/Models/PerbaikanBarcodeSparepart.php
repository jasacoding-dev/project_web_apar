<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerbaikanBarcodeSparepart extends Model
{
    use HasFactory;

    protected $table = 'perbaikan_sparepart_barcodes';

    protected $fillable = [
        'id_sparepart',
        'id_barcode',
    ];
}
