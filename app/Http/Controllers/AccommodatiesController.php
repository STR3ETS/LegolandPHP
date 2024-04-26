<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accommodation;

class AccommodatiesController extends Controller
{
    public function index()
    {
        $accommodations = Accommodation::all();
        return view('accommodations.index', compact('accommodations'));
    }
    
    public function create()
    {
        return view('accommodations.create');
    }
    
    public function store(Request $request)
    {
        Accommodation::create($request->all());
        return redirect()->route('accommodations.index');
    }
    
    public function show(Accommodation $accommodation)
    {
        return view('accommodations.show', compact('accommodation'));
    }
    
    public function edit(Accommodation $accommodation)
    {
        return view('accommodations.edit', compact('accommodation'));
    }
    
    public function update(Request $request, Accommodation $accommodation)
    {
        $accommodation->update($request->all());
        return redirect()->route('accommodations.index');
    }
    
    public function destroy(Accommodation $accommodation)
    {
        $accommodation->delete();
        return redirect()->route('accommodations.index');
    }
    
}
