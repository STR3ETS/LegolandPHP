<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accommodaties;

class AccommodatiesController extends Controller
{
    public function index()
    {
        $accommodaties = Accommodaties::all();
        return view('accommodaties', ['accommodaties' => $accommodaties]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date|after_or_equal:today',
        ]);
    
        if (Accommodaties::where('date', $request->date)->where('is_available', false)->exists()) {
            return redirect('/accommodaties')->withErrors('This date is already booked. Please choose another date.');
        }
    
        $accommodatie = new Accommodaties();
        $accommodatie->date = $request->date;
        $accommodatie->is_available = false;
        $accommodatie->save();
    
        return redirect('/accommodaties');
    }
    
}
