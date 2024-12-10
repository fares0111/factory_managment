<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نموذج تسجيل الشيك</title>
    <link rel="stylesheet" href="{{ asset('css/bank/edit.css') }}"><!-- تضمين ملف الستايل -->
</head>
<body>
    @extends($layout)   
    
    
<div class="container">
    <div class="main-content">
        <h1 class="title">نموذج تسجيل الشيك</h1>
        <form action="{{ route("doeditbank",$Edit_Check->id) }}" method="post" class="cheque-form">
            @csrf
            <div class="form-group">
                <label for="name">اسم الشيك</label>
                <input type="text" name="name" id="name" class="form-control" value="{{$Edit_Check->name}}">
            </div>
            <div class="form-group">
                <label for="price">مبلغ الشيك</label>
                <input type="number" name="price" class="form-control" value="{{$Edit_Check->price}}">
            </div>
            <div class="form-group">
                <label for="date">التاريخ</label>
                <input type="date" name="date" id="date" class="form-control" value="{{$Edit_Check->date}}">
            </div>
            <div class="form-group">
                <label for="number">رقم الشيك</label>
                <input type="text" name="number" class="form-control" value="{{$Edit_Check->number}}">
            </div>
            <button type="submit" class="btn btn-primary">تسجيل الشيك</button>
        </form>
    </div>
</div>

</body>
</html>
