<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اضافة مغسلة جديدة</title>
    <link rel="stylesheet" href="{{ asset('css/washes/AddWasher.css') }}"> <!-- تضمين ملف الستايل -->
</head>
<body>
    @extends($layout)   
    
<div class="container">
    <h1 class="title">اضافة مغسلة جديدة</h1>
    <form action="{{ route("insertwasher") }}" method="post" class="form">
        @csrf
        <div class="form-group">
            <label for="name">الاسم</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="contact">رقم التواصل</label>
            <input type="text" name="contact" id="contact" class="form-control">
        </div>
        <div class="form-group">
            <label for="location">العنوان</label>
            <input type="text" name="location" id="location" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">إضافة</button>
    </form>
</div>

</body>
</html>
