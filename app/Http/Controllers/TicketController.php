<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Bestelling;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // pak alle ticket prijzen uit de database en geef deze mee aan de view
        $tickets = Ticket::all();
        return view('tickets', ['tickets' => $tickets]);
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
        // valideer de data of alles ingevuld is
        $validatedData = $request->validate([
            'naam' => 'required',
            'email' => 'required',
            'aantal-tickets-kinderen' => 'required',
            'aantal-tickets-jongeren' => 'required',
            'aantal-tickets-volwassenen' => 'required',
        ]);
    
        // sla de gevalideerde data op
        $naam = $validatedData['naam'];
        $email = $validatedData['email'];
        $aantalTicketsKinderen = $validatedData['aantal-tickets-kinderen'];
        $aantalTicketsJongeren = $validatedData['aantal-tickets-jongeren'];
        $aantalTicketsVolwassenen = $validatedData['aantal-tickets-volwassenen'];
    
        // maak een nieuw object van type bestelling
        // en vul de data
        $bestelling = new Bestelling();
        $bestelling->naam = $naam;
        $bestelling->email = $email;
        $bestelling->tickets_kinderen = $aantalTicketsKinderen;
        $bestelling->tickets_jongeren = $aantalTicketsJongeren;
        $bestelling->tickets_volwassenen = $aantalTicketsVolwassenen;
        // sla de data op in de database
        $bestelling->save();
        // return de user naar de "/tickets" view -> staat in web.php aangegeven waar dit naartoe moet.
        return redirect('/tickets');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'leeftijdsgroep' => 'required|string',
            'update-prijs-ticket' => 'required|numeric',
        ]);

        $ticket = Ticket::updateOrCreate(
            ['leeftijdsgroep' => $request->input('leeftijdsgroep')],
            ['prijs' => $request->input('update-prijs-ticket')]
        );

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
