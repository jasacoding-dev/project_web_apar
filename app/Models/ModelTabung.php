<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelTabung extends Model
{
    protected $table = 'model_tabungs';
    protected $fillable = ['model_tabung'];

    public function apars()
    {
        return $this->hasMany(Apar::class, 'model_tabung_id');
    }
}
