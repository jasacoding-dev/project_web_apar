<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OTPCode extends Model
{
    use HasFactory;

    protected $table = 'otp_codes'; 
    protected $fillable = ['email', 'code', 'expires_at'];
    protected $dates = ['expires_at'];
}
