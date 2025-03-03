<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaApar extends Model
{
    use HasFactory;

    protected $table = 'media_apars';
    protected $fillable = ['nama_media'];

    public function apars()
    {
        return $this->hasMany(Apar::class, 'jenis_media_id');
    }
}
