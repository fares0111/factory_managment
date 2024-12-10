


@extends($layout)   
    
<link rel="stylesheet" href="{{ asset('css/washes/search.css') }}">

@foreach($Launderers as $Launderer)
    <a href='{{ route("results",$Launderer->id) }}' class="btn">{{ $Launderer->name }}</a>
@endforeach
