@extends('layout')

@section('content')
    <div class="subpage-hero" style="background-image: url('{{ Vite::asset('resources/images/subpage-bg.png') }}')">
        <div class="max-w-[1400px] h-full mx-auto flex flex-col justify-end">
        </div>
    </div>
    <div class="w-full h-auto">
        <div class="max-w-[1400px] h-full mx-auto py-[4rem]">
            <a href="/accommodaties" class="underline opacity-75 hover:opacity-100 transition">Terug naar alle accommodaties</a>
            <div class="flex gap-[4rem] justify-between items-center mt-[1rem]">
                <div class="w-[60%] h-full">
                    <img class="w-full" src="{{ asset('storage/images/' . $accommodatie['afbeelding_url']) }}">
                </div>
                <div class="w-[40%] h-full">
                    <h1 class="text-[55px] font-[700] text-[#282828] mb-[3rem] leading-[1]">{{$accommodatie->naam}}</h1>
                    <p class="text-[18px] leading-[2] mb-[4rem]">{{$accommodatie->omschrijving}}
                        <br>
                        <br>
                        Prijs per kamer: €{{ $accommodatie['prijs'] }}
                    </p>
                    <form id="reserveringForm" action="{{ route('reservering.store', $accommodatie->id) }}" method="POST" onsubmit="return validateForm()">
                        @csrf
                        <p class="mb-[0.5rem] font-[600]">Naam</p>
                        <input type="text" name="naam" class="w-full h-auto p-[0.5rem] focus:outline-none mb-[1rem]" required>
                        <div class="w-full flex gap-[1rem]">
                            <div class="w-[50%]">
                                <p class="mb-[0.5rem] font-[600]">Email</p>
                                <input type="email" name="email" class="w-full h-auto p-[0.5rem] focus:outline-none mb-[1rem]" required>
                            </div>
                            <div class="w-[50%]">
                                <p class="mb-[0.5rem] font-[600]">Telefoonnummer</p>
                                <input type="text" name="telefoonnummer" class="w-full h-auto p-[0.5rem] focus:outline-none mb-[1rem]" required>
                            </div>
                        </div>
                        <div class="w-full flex gap-[1rem] mb-[1rem]">
                            <div class="w-[50%]">
                                <p class="mb-[0.5rem] font-[600]">Check-in datum</p>
                                <input type="date" id="checkindate" name="checkindate" class="w-full h-auto p-[0.5rem] focus:outline-none" required>
                            </div>
                            <div class="w-[50%]">
                                <p class="mb-[0.5rem] font-[600]">Check-out datum</p>
                                <input type="date" id="checkoutdate" name="checkoutdate" class="w-full h-auto p-[0.5rem] focus:outline-none" required>
                            </div>
                        </div>
                        <p class="mb-[0.5rem] font-[600]">Aantal kamers</p>
                        <select name="kamers" class="w-full h-auto p-[0.5rem] focus:outline-none mb-[1rem]" required>
                            <option value="1">1 kamer</option>
                            <option value="2">2 kamers</option>
                            <option value="3">3 kamers</option>
                            <option value="4">4 kamers</option>
                            <option value="5">5 kamers</option>
                            <option value="6">6 kamers</option>
                            <option value="7">7 kamers</option>
                        </select>
                        <div id="error-message" class="text-red-500 mb-[1rem]" style="display: none;"></div>
                        <input type="submit" value="Boeken" class="w-full h-auto py-[1rem] bg-blue-500 rounded text-white font-[600]">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function validateForm() {
            var checkindate = document.getElementById('checkindate').value;
            var checkoutdate = document.getElementById('checkoutdate').value;
            var errorMessage = document.getElementById('error-message');

            if (new Date(checkoutdate) <= new Date(checkindate)) {
                errorMessage.textContent = 'De check-out datum moet na de check-in datum zijn.';
                errorMessage.style.display = 'block';
                return false;
            }

            errorMessage.style.display = 'none';
            return true;
        }
    </script>
@endsection('content')

