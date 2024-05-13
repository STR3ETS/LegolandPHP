<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accommodaties;
use Illuminate\Support\Facades\Log;

class AccommodatiesController extends Controller
{
    public function index()
    {
        $accommodaties = Accommodaties::all();
        return view('accommodaties', ['accommodaties' => $accommodaties]);
    }
    
    public function show(Accommodaties $accommodatie)
    {
        return view('accommodaties-detail', ['accommodatie' => $accommodatie]);
    }
    
    
}
