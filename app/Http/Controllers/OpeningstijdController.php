<?php

namespace App\Http\Controllers;

use App\Models\Openingstijd;
use Illuminate\Http\Request;

class OpeningstijdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // pak alle openingstijden uit de database en geef deze mee aan de view
        $openingstijden = Openingstijd::all();
        return view('openingstijden', ['openingstijden' => $openingstijden]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Openingstijd $openingstijd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Openingstijd $openingstijd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Openingstijd $openingstijd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Openingstijd $openingstijd)
    {
        //
    }
}