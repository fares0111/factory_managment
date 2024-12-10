<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل معلومات المغسلة</title>
    <link rel="stylesheet" href="{{ asset('css/washes/edit.css') }}"> <!-- تضمين ملف الستايل -->
</head>
<body>
    @extends($layout)   
    
<div class="container">
    <h1 class="title">تعديل معلومات المغسلة</h1>
    <form action="{{ route("doeditwasher", $Edit_Launderer_Invoice->id) }}" method="post" class="form">
        @csrf
        <div class="form-group">
            <label for="much">العدد</label>
            <input type="text" name="much" id="much" value="{{ $Edit_Launderer_Invoice->much }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="type">النوع</label>
            <input type="text" name="type" id="type" value="{{ $Edit_Launderer_Invoice->type }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="washer">المغسلة</label>
            <input type="text" name="washer" id="washer" value="{{ $Edit_Launderer_Invoice->washer }}" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="price">السعر</label>
            <input type="text" name="price" id="price" value="{{ $Edit_Launderer_Invoice->price }}" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
    </form>
</div>

</body>
</html>
