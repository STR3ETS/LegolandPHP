
    @extends('layout')

    @section('content')
    <div class="subpage-hero" style="background-image: url('{{ Vite::asset('resources/images/subpage-bg.png') }}')">
        <div class="max-w-[1400px] h-full mx-auto flex flex-col items-center justify-center">
            <h1 class="text-[55px] font-[700] text-white">Tickets</h1>
        </div>
    </div>
    <div class="w-full h-auto">
        <div class="max-w-[1400px] h-full p-[1rem] md:p-[2rem] lg:p-[4rem] bg-white rounded-[25px] -mt-[4rem] mx-auto flex flex-col lg:flex-row gap-[4rem] justify-between">
            <div class="w-full lg:w-1/2 h-full">
                <h2 class="text-[24px] font-[600]">Ticketprijzen</h2>
                @foreach($tickets as $ticket)
                        <div class="w-full h-auto py-[2rem] px-[1rem] rounded-[10px] border-b-[1px] border-b-[#f1f1f1] flex items-center justify-between">
                            <p>{{ $ticket['leeftijdsgroep'] }}</p>
                            <p>€ {{ $ticket['prijs'] }}</p>
                        </div>
                @endforeach
            </div>
            <div class="w-full lg:w-1/2 h-full">
                <h2 class="text-[24px] font-[600]">Tickets bestellen</h2>
                <form action="/tickets/store" method="POST">
                    @csrf
                    <p class="mt-[2rem] mb-[0.5rem] font-[600]">Uw naam</p>
                    <input type="text" name="naam" class="w-full h-auto p-[1rem] border-[1px] border-[#f1f1f1] rounded-[5px]" placeholder="Typ hier uw voornaam en achternaam..." required>
                    <p class="mt-[2rem] mb-[0.5rem] font-[600]">E-mailadres</p>
                    <input type="text" name="email" class="w-full h-auto p-[1rem] border-[1px] border-[#f1f1f1] rounded-[5px]" placeholder="bijv: uwnaam@gmail.com" required>
                    <p class="mt-[2rem] mb-[0.5rem] font-[600]">Aantal tickets kinderen (1 t/m 12 jaar)</p>
                    <input type="text" name="aantal-tickets-kinderen" class="w-full h-auto p-[1rem] border-[1px] border-[#f1f1f1] rounded-[5px]" value="0" required>
                    <p class="mt-[2rem] mb-[0.5rem] font-[600]">Aantal tickets jongeren (13 t/m 17 jaar)</p>
                    <input type="text" name="aantal-tickets-jongeren" class="w-full h-auto p-[1rem] border-[1px] border-[#f1f1f1] rounded-[5px]" value="0" required>
                    <p class="mt-[2rem] mb-[0.5rem] font-[600]">Aantal tickets volwassenen (18+ jaar)</p>
                    <input type="text" name="aantal-tickets-volwassenen" class="w-full h-auto p-[1rem] border-[1px] border-[#f1f1f1] rounded-[5px]" value="0" required>
                    <input type="submit" name="bestellen" class="w-full h-auto py-[1rem] bg-red-500 text-white flex items-center justify-center rounded-[10px] mt-[2rem]">
                </form>
            </div>
        </div>
    </div>
    @endsection