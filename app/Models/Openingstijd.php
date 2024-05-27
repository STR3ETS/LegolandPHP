<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Openingstijd extends Model
{
    use HasFactory;

    protected $fillable = [
        'dag',
        'open_om',
        'gesloten_om',
    ];
}
