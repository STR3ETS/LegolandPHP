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


<div class="subpage-hero" style="background-image: url('{{ asset('images/subpage-bg.png') }}')">
    <div class="max-w-[1400px] h-full mx-auto flex flex-col justify-center">
        <h1 class="text-[55px] font-[700] text-white">Accommodations</h1>
    </div>
</div>

<form method="POST" action="/accommodaties">
    @csrf
    <input type="text" id="datepicker" name="date">
    <button type="submit">Book</button>
</form>
@endsection
