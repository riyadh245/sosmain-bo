<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'logo',
        'website',
        'address',
        'longitude',
        'latitude',
        'created_at'
    ];
}
