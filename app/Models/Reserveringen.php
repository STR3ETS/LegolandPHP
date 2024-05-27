<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserveringen extends Model
{
    use HasFactory;
    protected $table = 'reserveringen';
    protected $fillable = [
        'naam',
        'email',
        'telefoonnummer',
        'checkindate',
        'checkoutdate',
        'geboekt_huis',
        'kamers',
    ];
}
