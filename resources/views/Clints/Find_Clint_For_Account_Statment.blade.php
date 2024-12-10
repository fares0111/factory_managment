<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>قائمة العملاء</title>
    <link rel="stylesheet" href="{{ asset('css/buyer/buyers.css') }}"> <!-- تضمين ملف الستايل -->
</head>
<body>

    
    @extends($layout)   
    
<h1 class="title">قائمة العملاء</h1>


@csrf
@foreach($Clints as $Clint)
    <button class="buyer-button"><a href="{{ route("Simply_Account_Statment", $Clint->id) }}" class="buyer-link">{{ $Clint->name }}</a></button>
@endforeach