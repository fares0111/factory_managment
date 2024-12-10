
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/balance/addbalance.css') }}">



</head>
<body>
    
</body>
</html>
@extends($layout)   
    
<form action="{{ route("insertbalance") }}" method="post" class="deposit-form">
    @csrf
    <label for="name">اسم المودع</label>
    <input type="text" name="name" id="name"><br><br>
    <label for="price">مبلغ الايداع</label>
    <input type="number" name="price"><br><br>
    <label for="date">التاريخ</label>
    <input type="date" name="date" id="date"><br><br>
    <button type="submit" class="submit-button">تسجيل الايداع</button>
</form>
