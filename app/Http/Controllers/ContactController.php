<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // Valideert de data of alles ingevuld is
        $validatedData = $request->validate([
            'naam' => 'required',
            'email' => 'required',
            'onderwerp' => 'required',
            'bericht' => 'required',
        ]);
    
        // Slaat de gevalideerde data op
        $naam = $validatedData['naam'];
        $email = $validatedData['email'];
        $onderwerp = $validatedData['onderwerp'];
        $bericht = $validatedData['bericht'];
    
        // Maakt een nieuw object van type Contact
        // En vul daarna de gegevens hiervan
        $contact = new Contact();
        $contact->naam = $naam;
        $contact->email = $email;
        $contact->onderwerp = $onderwerp;
        $contact->bericht = $bericht;
        // Sla het contact formulier op
        $contact->save();
        // return de user naar "/contact" -> dit is in web.php weer aangegeven waar dit heen moet.
        return redirect('/contact');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
