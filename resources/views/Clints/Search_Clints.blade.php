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



<form action="{{route("searchcheak")}}" method="post">

@csrf
@foreach($Clints as $Clint)
    <button class="buyer-button"><a href="{{ route("cheak", $Clint->id) }}" class="buyer-link">{{ $Clint->name }}</a></button>
@endforeach

</form>


<script>
document.addEventListener("DOMContentLoaded", function() {
    var select = document.getElementById("buyer");
    select.addEventListener("change", function() {
        var self = this;
        setTimeout(function() {
            self.blur(); // تخفي الـ select بعد تغيير القيمة
        }, 100); // قم بتعديل الرقم إذا لز
})});


</script>