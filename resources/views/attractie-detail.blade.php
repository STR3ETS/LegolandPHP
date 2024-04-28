@extends('layout')

@section('content')
    <div class="subpage-hero" style="background-image: url('{{ Vite::asset('resources/images/' . $attractie['afbeelding_url']) }}')">
        <div class="max-w-[1400px] h-full mx-auto flex flex-col justify-end">
            <h1 class="text-[55px] font-[700] text-white mb-[3rem]">{{$attractie->titel}}</h1>
        </div>
    </div>
@endsection('content')