
    @extends('layout')

    @section('content')
    <div class="subpage-hero" style="background-image: url('{{ Vite::asset('resources/images/subpage-bg.png') }}')">
        <div class="max-w-[1400px] h-full mx-auto flex flex-col items-center justify-center">
            <h1 class="text-[55px] font-[700] text-white">Openingstijden</h1>
        </div>
    </div>
    <div class="w-full h-auto pb-[5rem]">
        <div class="max-w-[1400px] h-full p-[1rem] md:p-[2rem] lg:p-[4rem] bg-white rounded-[25px] -mt-[4rem] mx-auto">
                @foreach($openingstijden as $openingstijd)
                    <div class="w-full h-auto py-[2rem] px-[1rem] rounded-[10px] border-b-[1px] hover:text-[#fff] hover:bg-red-500 transition border-b-[#f1f1f1] flex items-center justify-between">
                        <p>{{ $openingstijd['dag'] }}</p>
                        <p>{{ $openingstijd['open_om'] }} - {{ $openingstijd['gesloten_om'] }}</p>
                    </div>
                @endforeach
        </div>
    </div>
    @endsection