<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'lastname',
        'forename',
        'date_of_birth',
        'social_number',
        'hic_picture',
        'tm_advices',

    ];
}
