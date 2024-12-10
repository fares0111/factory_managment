<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الروابط</title>
    <link rel="stylesheet" href="{{ asset('css/buyer/index.css') }}"> <!-- تضمين ملف الستايل -->
</head>
<body>
    
    @extends($layout)   
    
<div class="container">
    <div class="main-content">
        <h1 class="title">روابط مهمة</h1>
        <ul class="links-list">
            <li><a href="{{ route("addbuyer") }}" class="link">اضافة عميل</a></li>
            <li><a href="{{ route("showde") }}" class="link">اضافة دفعة</a></li>
            <li><a href="{{ route("showdeposit") }}" class="link">عرض الدفع</a></li>
            <li><a href="{{ route("buyers") }}" class="link">كشف حساب عميل</a></li>
        </ul>
    </div>
</div>

</body>
</html>
