<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;
    protected $table = 'lokasis';
    protected $fillable = [
        'nama_gedung',
        'lantai',
        'nama_ruangan',
        'pemilik_gedung',
        'alamat_gedung',
        'pic_gedung',
        'satuan_kerja',
        'tanggal_pengecekan',
        'tanggal_kadaluwarsa',
        'foto',
    ];

    public function barcodes()
    {
        return $this->hasMany(Barcode::class, 'id_lokasi');
    }
}
