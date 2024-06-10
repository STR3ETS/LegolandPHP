@extends('layout')

@section('content')
    <div class="subpage-hero" style="background-image: url('{{ Vite::asset('resources/images/subpage-bg.png') }}')">
        <div class="max-w-[1400px] h-full mx-auto flex flex-col justify-end pb-[4rem]">
            <h1 class="text-[55px] font-[700] text-white">Dashboard</h1>
            <p class="text-[#fff]">Ingelogd als {{ Auth::user()->name }}</p>
            <a href="/logout" class="px-[2rem] py-[0.75rem] bg-red-500 w-fit mt-[1rem] rounded-[10px] text-white font-[600]">Uitloggen</a>
        </div>
    </div>
    <div class="w-full h-auto py-[5rem]">
        <div class="max-w-[1400px] h-full mx-auto flex flex-col justify-end">
            <h2 class="text-[24px] font-[600] mb-[2rem]">Nieuwe berichten</h2>
            <div class="w-full h-auto p-[2rem] bg-white rounded-[10px]">
                <div class="w-full h-auto flex gap-[3rem]">
                    <div class="w-1/5 h-full">
                        <h3 class="text-[20px] font-bold">ID</h3>
                    </div>
                    <div class="w-1/5 h-full">
                        <h3 class="text-[20px] font-bold">Email</h3>
                    </div>
                    <div class="w-1/5 h-full">
                        <h3 class="text-[20px] font-bold">Onderwerp</h3>
                    </div>
                    <div class="w-1/5 h-full">
                        <h3 class="text-[20px] font-bold">Bericht</h3>
                    </div>
                    <div class="w-1/5 h-full"></div>
                </div>
                @foreach($contacts as $contact)
                    <div class="w-full h-auto flex gap-[3rem] my-[2rem]" id="{{ $contact['id'] }}">
                        <div class="w-1/5 h-full">
                            <p class="font-bold">#{{ $contact['id'] }}</p>
                        </div>
                        <div class="w-1/5 h-full">
                            <p>{{ $contact['email'] }}</p>
                        </div>
                        <div class="w-1/5 h-full">
                            <p>{{ $contact['onderwerp'] }}</p>
                        </div>
                        <div class="w-1/5 h-full">
                            <p>{{ $contact['bericht'] }}</p>
                        </div>
                        <div class="w-1/5 h-full">
                            <form class="w-full flex justify-end" method="POST" action="{{ route('delete.contact', $contact['id']) }}">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="contact_id" value="{{ $contact['id'] }}">
                                <input type="submit" name="delete-contact-verzenden" class="w-fit h-auto text-[14px] py-[0.75rem] px-[1.5rem] bg-red-800 text-white flex items-center justify-center rounded-[10px]" value="Bericht verwijderen">
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="w-full h-auto py-[5rem]">
        <div class="max-w-[1400px] h-full mx-auto flex flex-col justify-end">
            <h2 class="text-[24px] font-[600] mb-[2rem]">Accomodaties</h2>
            <div class="w-full h-auto p-[2rem] bg-white rounded-[10px]">
                <div class="w-full h-auto flex gap-[3rem]">
                    <div class="w-1/6 h-full">
                        <h3 class="text-[20px] font-bold">Naam</h3>
                    </div>
                    <div class="w-1/6 h-full">
                        <h3 class="text-[20px] font-bold">Email</h3>
                    </div>
                    <div class="w-1/6 h-full">
                        <h3 class="text-[20px] font-bold">Check-in</h3>
                    </div>
                    <div class="w-1/6 h-full">
                        <h3 class="text-[20px] font-bold">Check-out</h3>
                    </div>
                    <div class="w-1/6 h-full">
                        <h3 class="text-[20px] font-bold">Aantal kamers</h3>
                    </div>
                    <div class="w-1/6 h-full">
                        <h3 class="text-[20px] font-bold"></h3>
                    </div>
                </div>
                @foreach($accommodaties as $accommodatie)
                    <div class="w-full h-auto flex gap-[3rem] my-[2rem]">
                        <div class="w-1/6 h-full">
                            <p class="font-bold">{{ $accommodatie['naam'] }}</p>
                        </div>
                        <div class="w-1/6 h-full">
                            <p>{{ $accommodatie['email'] }}</p>
                        </div>
                        <div class="w-1/6 h-full">
                            <p>{{ $accommodatie['onderwerp'] }}</p>
                        </div>
                        <div class="w-1/6 h-full">
                            <p>{{ $accommodatie['checkindate'] }}</p>
                        </div>
                        <div class="w-1/6 h-full">
                            <p>{{ $accommodatie['checkoutdate'] }}</p>
                        </div>
                        <div class="w-1/6 h-full">
                            <form class="w-full flex justify-end" method="POST" action="{{ route('delete.accommodatie', $accommodatie['id']) }}">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="accommodatie_id" value="{{ $accommodatie['id'] }}">
                                <input type="submit" name="delete-accommodatie-verzenden" class="w-fit h-auto text-[14px] py-[0.75rem] px-[1.5rem] bg-red-800 text-white flex items-center justify-center rounded-[10px]" value="Boeking verwijderen">
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="w-full h-auto py-[5rem]">
        <div class="max-w-[1400px] h-full mx-auto flex flex-col justify-end">
            <h2 class="text-[24px] font-[600] mb-[2rem]">Openingstijden</h2>
            <div class="w-full h-auto flex gap-[2rem]">
                <div class="w-1/3 h-full bg-white rounded-[10px] p-[2rem]">
                    <h3 class="text-[18px] font-[600] text-center">Actueel</h3>
                    @foreach($openingstijden as $openingstijd)
                        <div class="w-full h-auto py-[2rem] px-[1rem] rounded-[10px] border-b-[1px] hover:text-[#fff] hover:bg-red-500 transition border-b-[#f1f1f1] flex items-center justify-between">
                            <p>{{ $openingstijd['dag'] }}</p>
                            <p>{{ $openingstijd['open_om'] }} - {{ $openingstijd['gesloten_om'] }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="w-2/3 h-full bg-white rounded-[10px] p-[2rem]">
                    <h3 class="text-[18px] font-[600] text-center mb-[2rem]">Aanpassen</h3>
                    <form method="POST" action="{{ route('update.openingstijden') }}">
                        @csrf
                        <div class="flex items-center gap-[2rem] mb-[2rem]">
                            <div class="flex flex-col gap-[1rem] w-1/3">
                                <p>Selecteer een dag:</p>
                                <select name="dag-van-de-week" id="dag-van-de-week" class="px-[0.75rem] py-[0.5rem] bg-[#f1f1f1]">
                                    <option value="maandag">Maandag</option>
                                    <option value="dinsdag">Dinsdag</option>
                                    <option value="woensdag">Woensdag</option>
                                    <option value="donderdag">Donderdag</option>
                                    <option value="vrijdag">Vrijdag</option>
                                    <option value="zaterdag">Zaterdag</option>
                                    <option value="zondag">Zondag</option>
                                </select>
                            </div>
                            <div class="flex flex-col gap-[1rem] w-1/3">
                                <p>Open om:</p>
                                <input type="text" name="update-open-om" class="px-[0.75rem] py-[0.5rem] focus:outline-none rounded-[5px] bg-[#f1f1f1]">
                            </div>
                            <div class="flex flex-col gap-[1rem] w-1/3">
                                <p>Gesloten om:</p>
                                <input type="text" name="update-gesloten-om" class="px-[0.75rem] py-[0.5rem] focus:outline-none rounded-[5px] bg-[#f1f1f1]">
                            </div>
                        </div>
                        <input type="submit" name="update-openingstijden-verzenden" class="w-full h-auto py-[1rem] bg-red-500 text-white flex items-center justify-center rounded-[10px]" value="Aanpassing doorvoeren">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full h-auto py-[5rem]">
        <div class="max-w-[1400px] h-full mx-auto flex flex-col justify-end">
            <h2 class="text-[24px] font-[600] mb-[2rem]">Tickets</h2>
            <div class="w-full h-auto flex gap-[2rem]">
                <div class="w-1/3 h-full bg-white rounded-[10px] p-[2rem]">
                    <h3 class="text-[18px] font-[600] text-center">Actueel</h3>
                    @foreach($tickets as $ticket)
                        <div class="w-full h-auto py-[2rem] px-[1rem] rounded-[10px] border-b-[1px] hover:text-[#fff] hover:bg-red-500 transition border-b-[#f1f1f1] flex items-center justify-between">
                            <p>{{ $ticket['leeftijdsgroep'] }}</p>
                            <p>{{ $ticket['prijs'] }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="w-2/3 h-full bg-white rounded-[10px] p-[2rem]">
                    <h3 class="text-[18px] font-[600] text-center mb-[2rem]">Aanpassen</h3>
                    <form method="POST" action="{{ route('update.tickets') }}">
                        @csrf
                        <div class="flex items-center gap-[2rem] mb-[2rem]">
                            <div class="flex flex-col gap-[1rem] w-1/2">
                                <p>Selecteer een leeftijdsgroep:</p>
                                <select name="leeftijdsgroep" id="leeftijdsgroep" class="px-[0.75rem] py-[0.5rem] bg-[#f1f1f1]">
                                    <option value="Kinderen (1 t/m 12 jaar)">Kinderen (1 t/m 12 jaar)</option>
                                    <option value="Jongeren (13 t/m 17 jaar)">Jongeren (13 t/m 17 jaar)</option>
                                    <option value="Volwassenen (18+ jaar)">Volwassenen (18+ jaar)</option>
                                </select>
                            </div>
                            <div class="flex flex-col gap-[1rem] w-1/2">
                                <p>Nieuwe prijs:</p>
                                <input type="text" name="update-prijs-ticket" class="px-[0.75rem] py-[0.5rem] focus:outline-none rounded-[5px] bg-[#f1f1f1]">
                            </div>
                        </div>
                        <input type="submit" name="update-prijs-verzenden" class="w-full h-auto py-[1rem] bg-red-500 text-white flex items-center justify-center rounded-[10px]" value="Aanpassing doorvoeren">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full h-auto py-[5rem] pb-[10rem]">
        <div class="max-w-[1400px] h-full mx-auto flex flex-col justify-end">
            <h2 class="text-[24px] font-[600]">Attracties</h2>
            <p class="mb-[2rem]">Voeg een attractie toe / update een attractie / verwijder een attractie</p>
            <div class="w-full h-auto px-[2rem] rounded-[10px] bg-white">
                @foreach($attracties as $attractie)
                    <div class="w-full h-auto py-[2rem] border-y-[1px] border-b-[#f1f1f1]" id="{{ $attractie['id'] }}">
                        <form method="POST" action="{{ route('update.attractie', $attractie['id']) }}" class="flex gap-[3rem]" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="attractie_id" value="{{ $attractie['id'] }}">
                            <div class="w-1/4 h-auto">
                                <textarea class="w-full" rows="6" id="attractie-titel" name="attractie-titel">{{ $attractie['titel'] }}</textarea>
                            </div>
                            <div class="w-1/4 h-auto">
                                <textarea class="w-full" rows="6" id="attractie-omschrijving" name="attractie-omschrijving">{{ $attractie['omschrijving'] }}</textarea>
                            </div>
                            <div class="w-1/4 h-auto flex overflow-show">
                                <input type="file" name="attractie-afbeeldingurl" id="attractie-afbeeldingurl" class="w-full rounded-md border-gray-300">
                            </div>
                            <div class="w-1/4 h-auto flex flex-col items-end gap-[1rem]">
                                <input type="submit" name="update-prijs-verzenden" class="w-full h-auto py-[1rem] bg-red-500 text-white flex items-center justify-center rounded-[10px]" value="Aanpassing doorvoeren">
                            </div>
                        </form>
                        <form class="w-full flex justify-end" method="POST" action="{{ route('delete.attractie', $attractie['id']) }}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="attractie_id" value="{{ $attractie['id'] }}">
                            <input type="submit" name="delete-attractie-verzenden" class="w-fit h-auto text-[14px] py-[0.75rem] px-[1.5rem] bg-red-800 text-white flex items-center justify-center rounded-[10px]" value="Attractie verwijderen">
                        </form>
                    </div>
                @endforeach
            </div>
            <h3 class="text-[20px] font-[600] my-[2rem]">Attractie toevoegen</h3>
            <div class="w-full h-auto p-[2rem] bg-white rounded-[10px]">
                <form action="{{ route('create.attractie') }}" method="POST" enctype="multipart/form-data" class="flex gap-[3rem] justify-between items-center">
                    @csrf
                    <div class="w-1/4 h-full">
                        <p>Titel</p>
                        <input type="text" name="titel" class="w-full px-[0.75rem] py-[0.5rem] focus:outline-none rounded-[5px] bg-[#f1f1f1]">
                    </div>
                    <div class="w-1/4 h-full">
                        <p>Omschrijving</p>
                        <input type="text" name="omschrijving" class="w-full px-[0.75rem] py-[0.5rem] focus:outline-none rounded-[5px] bg-[#f1f1f1]">
                    </div>
                    <div class="w-1/4 h-full">
                        <p>Afbeelding</p>
                        <input type="file" name="afbeelding_url" id="afbeelding_url" class="w-full rounded-md border-gray-300">
                    </div>
                    <div class="w-1/4 h-full flex items-center justify-end">
                        <input type="submit" value="Attractie toevoegen" class="w-fit h-auto py-[0.75rem] px-[1.5rem] bg-green-500 text-white flex items-center justify-center rounded-[10px]">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="w-full h-auto py-[5rem] pb-[10rem]">
        <div class="max-w-[1400px] h-full mx-auto flex flex-col justify-end">
            <h2 class="text-[24px] font-[600]">Accommodaties</h2>
            <p class="mb-[2rem]">Voeg een accommodatie toe / update een accommodatie / verwijder een accommodatie</p>
            <div class="w-full h-auto px-[2rem] rounded-[10px] bg-white">
                @foreach($accommodaties as $accommodatie)
                    <div class="w-full h-auto py-[2rem] border-y-[1px] border-b-[#f1f1f1]" id="{{ $accommodatie['id'] }}">
                        <form method="POST" action="{{ route('update.accommodatie', $accommodatie['id']) }}" class="flex gap-[3rem]" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="accommodatie_id" value="{{ $accommodatie['id'] }}">
                            <div class="w-1/4 h-auto">
                                <textarea class="w-full" rows="6" id="accommodatie-naam" name="accommodatie-naam">{{ $accommodatie['naam'] }}</textarea>
                            </div>
                            <div class="w-1/4 h-auto">
                                <textarea class="w-full" rows="6" id="accommodatie-omschrijving" name="accommodatie-omschrijving">{{ $accommodatie['omschrijving'] }}</textarea>
                            </div>
                            <div class="w-1/4 h-auto flex overflow-show">
                                <input type="file" name="accommodatie-afbeeldingurl" id="accommodatie-afbeeldingurl" class="w-full rounded-md border-gray-300">
                            </div>
                            <div class="w-1/4 h-auto flex flex-col items-end gap-[1rem]">
                                <input type="submit" name="update-prijs-verzenden" class="w-full h-auto py-[1rem] bg-red-500 text-white flex items-center justify-center rounded-[10px]" value="Aanpassing doorvoeren">
                            </div>
                        </form>
                        <form class="w-full flex justify-end" method="POST" action="{{ route('delete.accommodatie', $accommodatie['id']) }}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="accommodatie_id" value="{{ $accommodatie['id'] }}">
                            <input type="submit" name="delete-accommodatie-verzenden" class="w-fit h-auto text-[14px] py-[0.75rem] px-[1.5rem] bg-red-800 text-white flex items-center justify-center rounded-[10px]" value="Attractie verwijderen">
                        </form>
                    </div>
                @endforeach
            </div>
            <h3 class="text-[20px] font-[600] my-[2rem]">Accommodatie toevoegen</h3>
            <div class="w-full h-auto p-[2rem] bg-white rounded-[10px]">
                <form action="{{ route('create.accommodatie') }}" method="POST" enctype="multipart/form-data" class="flex gap-[3rem] justify-between items-center">
                    @csrf
                    <div class="w-1/4 h-full">
                        <p>Naam</p>
                        <input type="text" name="naam" class="w-full px-[0.75rem] py-[0.5rem] focus:outline-none rounded-[5px] bg-[#f1f1f1]">
                    </div>
                    <div class="w-1/4 h-full">
                        <p>Omschrijving</p>
                        <input type="text" name="omschrijving" class="w-full px-[0.75rem] py-[0.5rem] focus:outline-none rounded-[5px] bg-[#f1f1f1]">
                    </div>
                    <div class="w-1/4 h-full">
                        <p>Afbeelding</p>
                        <input type="file" name="afbeelding_url" id="afbeelding_url" class="w-full rounded-md border-gray-300">
                    </div>
                    <div class="w-1/4 h-full flex items-center justify-end">
                        <input type="submit" value="accommodatie toevoegen" class="w-fit h-auto py-[0.75rem] px-[1.5rem] bg-green-500 text-white flex items-center justify-center rounded-[10px]">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection