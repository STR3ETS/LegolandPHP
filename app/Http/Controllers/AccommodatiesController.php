<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accommodaties;
use App\Models\Reserveringen;
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
    
    public function store(Request $request, Accommodaties $accommodatie)
    {
        $request->validate([
            'naam' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'telefoonnummer' => 'required|string|max:15',
            'checkindate' => 'required|date',
            'checkoutdate' => 'required|date',
            'kamers' => 'required|integer|min:1|max:10',
        ]);

        Reserveringen::create([
            'naam' => $request->naam,
            'email' => $request->email,
            'telefoonnummer' => $request->telefoonnummer,
            'checkindate' => $request->checkindate,
            'checkoutdate' => $request->checkoutdate,
            'geboekt_huis' => $accommodatie->id,
            'kamers' => $request->kamers,
        ]);

        return redirect('/accommodaties')->with('success', 'Reservering succesvol gemaakt!');
    }
    
    public function create(Request $request)
    {
        $request->validate([
            'naam' => 'required|string|max:255',
            'omschrijving' => 'required|string',
            'afbeelding_url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'prijs' => 'required|numeric|min:0',
        ]);

        $afbeeldingPath = $request->file('afbeelding_url')->store('images', 'public');
        $afbeeldingUrl = basename($afbeeldingPath);

        Accommodaties::create([
            'naam' => $request->naam,
            'omschrijving' => $request->omschrijving,
            'afbeelding_url' => $afbeeldingUrl,
            'prijs' => $request->prijs,
        ]);

        return redirect('/accommodaties')->with('success', 'Accommodatie succesvol toegevoegd!');
    }
}