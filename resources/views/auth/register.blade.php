@extends('layout')

@section('content')
    <div class="subpage-hero" style="background-image: url('{{ Vite::asset('resources/images/subpage-bg.png') }}')">
        <div class="max-w-[1400px] h-full mx-auto flex flex-col justify-end">
        </div>
    </div>
    <div class="py-[5rem] flex flex-col items-center justify-center">
        <h1 class="text-[34px]">Registreren</h1>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-[1rem]">
            @csrf

            <div class="flex flex-col w-[300px]">
                <label for="name">Naam:</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus class="px-[0.75rem] py-[0.5rem] focus:outline-none rounded-[5px]">
            </div>

            <div class="flex flex-col w-[300px]">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required class="px-[0.75rem] py-[0.5rem] focus:outline-none rounded-[5px]">
            </div>

            <div class="flex flex-col w-[300px]">
                <label for="password">Wachtwoord:</label>
                <input type="password" name="password" id="password" required class="px-[0.75rem] py-[0.5rem] focus:outline-none rounded-[5px]">
            </div>

            <div class="flex flex-col">
                <label for="password_confirmation">Bevestig wachtwoord:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required class="px-[0.75rem] py-[0.5rem] focus:outline-none rounded-[5px]">
            </div>

            <button type="submit" class="w-full h-auto py-[1rem] bg-red-500 text-white flex items-center justify-center rounded-[10px]">Registreren</button>
        </form>
    </div>
@endsection
