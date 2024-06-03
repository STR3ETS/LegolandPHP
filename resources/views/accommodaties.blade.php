@extends('layout')

@section('content')
<div x-data="{ open: false }">
    <div class="subpage-hero" style="background-image: url('{{ Vite::asset('resources/images/subpage-bg.png') }}')">
        <div class="max-w-[1400px] h-full mx-auto flex flex-col justify-center">
            <h1 class="text-[55px] font-[700] text-white">Accommodaties</h1>
        </div>
    </div>

    <div class="w-full h-auto pb-[5rem]">
        <div class="max-w-[1400px] h-full p-[1rem] md:p-[2rem] lg:p-[4rem] bg-white rounded-[25px] -mt-[4rem] mx-auto flex flex-wrap justify-center gap-[2rem]">
            <div class="">
                @auth
                    <button @click="open = true" class="p-[1rem] bg-red-500 text-white flex items-center justify-center rounded-[10px] mt-[2rem]">Accommodatie toevoegen</button>
                @endauth
            </div>
            <div class="flex flex-wrap justify-center gap-[2rem]">
                @foreach($accommodaties as $accommodatie)
                    <a href="accommodaties/{{$accommodatie['id']}}" class="w-[100%] md:w-[50%] lg:w-[30%] h-auto border-[1px] border-[#efefef] rounded-[10px]">
                    <img class="w-full h-[300px] object-cover object-center rounded-tr-[10px] rounded-tl-[10px]" src="{{ asset('storage/images/' . $accommodatie['afbeelding_url']) }}">
                        <div class="p-[2rem]">
                            <h2 class="text-[24px] font-[600] mb-[1rem] text-center">{{ $accommodatie['naam'] }}</h2>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <div x-show="open" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" x-cloak>
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Accommodatie Toevoegen</h3>
                <div class="mt-2 px-7 py-3">
                    <form action="{{ route('accommodaties.create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="naam" class="block text-gray-700">Naam</label>
                            <input type="text" name="naam" id="naam" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="omschrijving" class="block text-gray-700">Omschrijving</label>
                            <textarea name="omschrijving" id="omschrijving" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="afbeelding_url" class="block text-gray-700">Afbeelding</label>
                            <input type="file" name="afbeelding_url" id="afbeelding_url" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="prijs" class="block text-gray-700">Prijs</label>
                            <input type="number" name="prijs" id="prijs" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>
                        <div class="flex justify-center mt-4">
                            <button type="button" @click="open = false" class="px-4 py-2 bg-gray-500 text-white rounded-md">Annuleer</button>
                            <button type="submit" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-md">Opslaan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    
</div>
@endsection
