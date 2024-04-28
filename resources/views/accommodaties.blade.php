@extends('layout')

@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function() {
        var disabledDates = @json($bookedDates);
        $("#datepicker").datepicker({
            beforeShowDay: function(date) {
                var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
                return [disabledDates.indexOf(string) == -1];
            }
        });
    });
</script>


<div class="subpage-hero" style="background-image: url('{{ Vite::asset('resources/images/subpage-bg.png') }}')">
        <div class="max-w-[1400px] h-full mx-auto flex flex-col justify-center">
            <h1 class="text-[55px] font-[700] text-white">Accommodaties</h1>
        </div>
    </div>
</div>

<div class="w-full h-auto pb-[5rem]">
    <div class="max-w-[1400px] h-full p-[1rem] md:p-[2rem] lg:p-[4rem] bg-white rounded-[25px] -mt-[4rem] mx-auto flex flex-wrap justify-center gap-[2rem]">
        <a href="" class="w-[100%] md:w-[50%] lg:w-[30%] h-auto border-[1px] border-[#efefef] rounded-[10px]">
            <img class="w-full h-[300px] object-cover object-center rounded-tr-[10px] rounded-tl-[10px]" src="">
            <div class="p-[2rem]">
                <h2 class="text-[24px] font-[600] mb-[1rem]"></h2>
                <p class="text-[16px] font-[400]"></p>
            </div>
        </a>
    </div>
</div>

<form method="POST" action="/accommodaties">
    @csrf
    <input type="text" id="datepicker" name="date">
    <button type="submit">Reseveer</button>
</form>
@endsection
