@extends('layout')

@section('content')



<div class="subpage-hero" style="background-image: url('{{ Vite::asset('resources/images/subpage-bg.png') }}')">
    <div class="max-w-[1400px] h-full mx-auto flex flex-col justify-center">
        <h1 class="text-[55px] font-[700] text-white">Accommodaties</h1>
    </div>
</div>

<div class="w-full h-auto pb-[5rem]">
    <div class="max-w-[1400px] h-full p-[1rem] md:p-[2rem] lg:p-[4rem] bg-white rounded-[25px] -mt-[4rem] mx-auto flex flex-wrap justify-center gap-[2rem]">
        @foreach($accommodaties as $accommodatie)
            <a href="" class="w-[100%] md:w-[50%] lg:w-[30%] h-auto border-[1px] border-[#efefef] rounded-[10px]">
                <img class="w-full h-[300px] object-cover object-center rounded-tr-[10px] rounded-tl-[10px]" src="{{ Vite::asset('resources/images/' . $accommodatie['afbeelding_url']) }}">
                <div class="p-[2rem]">
                    <h2 class="text-[24px] font-[600] mb-[1rem] text-center">{{ $accommodatie['titel'] }}</h2>
                </div>
            </a>
        @endforeach
    </div>
</div>

@endsection