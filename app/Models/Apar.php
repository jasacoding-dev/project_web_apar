<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apar extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_apar',
        'pemilik',
        'merek',
        'sistem_kerja',
        'jenis_media_id',
        'kapasitas',
        'model_tabung_id',
        'nomor_tabung',
        'tanggal_kadaluarsa',
        'keterangan',
        'foto',
    ];

    // Relasi ke jenis media
    public function jenisMedia()
    {
        return $this->belongsTo(MediaApar::class, 'jenis_media_id');
    }

    // Relasi ke model tabung
    public function modelTabung()
    {
        return $this->belongsTo(ModelTabung::class, 'model_tabung_id');
    }

    public function lokasis()
    {
        return $this->hasManyThrough(Lokasi::class, Barcode::class, 'id_apar', 'id', 'id', 'id_lokasi');
    }

    public function barcodes()
    {
        return $this->hasMany(Barcode::class, 'id_apar');
    }
}
