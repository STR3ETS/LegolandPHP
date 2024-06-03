<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodaties extends Model
{
    use HasFactory;

    protected $fillable = [
        'naam',
        'omschrijving',
        'afbeelding_url',
        'prijs',
    ];
}
