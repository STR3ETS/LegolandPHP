@extends('layout')

@section('content')
@foreach ($accommodations as $accommodation)
    <p>{{ $accommodation->type }} - {{ $accommodation->capacity }} personen - €{{ $accommodation->price }}</p>
@endforeach
@endsection('content')