<?php

namespace App\Http\Controllers;

use App\Models\Attractie;
use Illuminate\Http\Request;

class AttractieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Pakt alle attracties en geeft ze mee aan de view
        $attracties = Attractie::all();
        return view('attracties', ['attracties' => $attracties]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'titel' => 'required',
            'omschrijving' => 'required',
            'afbeelding_url' => 'required',
        ]);

        $afbeeldingPath = $request->file('afbeelding_url')->store('images', 'public');
        $afbeeldingUrl = basename($afbeeldingPath);

        Attractie::create([
            'titel' => $request->titel,
            'omschrijving' => $request->omschrijving,
            'afbeelding_url' => $afbeeldingUrl,
        ]);

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Attractie $attractie)
    {
        return view('attractie-detail', ['attractie' => $attractie]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attractie $attractie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attractie $attractie)
    {
        $validatedData = $request->validate([
            'attractie-titel' => 'required|string|max:255',
            'attractie-omschrijving' => 'required|string',
            'attractie-afbeeldingurl' => 'nullable|file|image|max:2048',
        ]);
    
        $attractie->titel = $validatedData['attractie-titel'];
        $attractie->omschrijving = $validatedData['attractie-omschrijving'];
    
        if ($request->hasFile('attractie-afbeeldingurl')) {
            $path = $request->file('attractie-afbeeldingurl')->store('images', 'public');
            $filename = basename($path);
            $attractie->afbeelding_url = $filename;
        }
    
        $attractie->save();
    
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attractie $attractie)
    {
        $attractie->delete();
        
        return redirect()->back();
    }
}
