<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>روابط العمليات</title>
    <link rel="stylesheet" href="{{ asset('css/washes/washes.css') }}"> <!-- تضمين ملف الستايل -->
</head>
<body>
    @extends($layout)   
    
<div class="container">
    <h1 class="title">روابط العمليات</h1>
    <div class="links">
        <a href="{{ route("addwasher") }}" class="link">اضافة مغسلة</a>
        <a href="{{ route("addrecite") }}" class="link">اضافة فاتورة</a>
        <a href="{{ route("dowithdraw") }}" class="link">تسديد فاتورة</a>
        <a href="{{ route("buys/showeith") }}" class="link">روية التسديدات</a>
        <a href="{{ route("search") }}" class="link">الفاتورة</a>
    </div>
</div>

</body>
</html>
