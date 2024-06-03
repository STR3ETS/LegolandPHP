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
    <div class="w-full h-auto py-[5rem]">
        <div class="max-w-[1400px] h-full mx-auto flex flex-col justify-end">
            <h2 class="text-[24px] font-[600]">Attracties</h2>
            <p class="mb-[2rem]">Voeg een attractie toe / update een attractie / verwijder een attractie</p>
            <div class="w-full h-auto px-[2rem] rounded-[10px] bg-white">
                @foreach($attracties as $attractie)
                    <div class="w-full h-auto py-[2rem]" id="{{ $attractie['id'] }}">
                    <form method="POST" action="" class="flex gap-[1rem]">
                        @csrf
                        <div class="w-1/4 h-auto">
                            <textarea class="w-full" rows="6" id="attractie-titel" name="attractie-titel">{{ $attractie['titel'] }}</textarea>
                        </div>
                        <div class="w-1/4 h-auto">
                            <textarea class="w-full" rows="6" id="attractie-omschrijving" name="attractie-omschrijving">{{ $attractie['omschrijving'] }}</textarea>
                        </div>
                        <div class="w-1/4 h-auto">
                            <p>{{ $attractie['afbeelding_url'] }}</p>
                        </div>
                        <div class="w-1/4 h-auto">
                            <input type="submit" name="update-prijs-verzenden" class="w-full h-auto py-[1rem] bg-red-500 text-white flex items-center justify-center rounded-[10px]" value="Aanpassing doorvoeren">
                        </div>
                    </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection