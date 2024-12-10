<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسديد فاتورة مغسلة</title>
    <link rel="stylesheet" href="{{ asset('css/washes/editwith.css') }}"> <!-- تضمين ملف الستايل -->
</head>
<body>
    @extends($layout)   
    
<div class="container">
    <h1 class="title">تسديد فاتورة مغسلة</h1>
    <form action="{{ route("doeditwasherwith", $Edit_Laundries_Installments->id) }}" method="post" class="form">
        @csrf
        <div class="form-group">
            <label for="name">اسم المغسلة</label>
            <input type="text" name="name" value="{{ $Edit_Laundries_Installments->name }}" readonly class="form-control">
        </div>

        <div class="form-group">
            <label for="date">التاريخ</label>
            <input type="date" name="date" id="date" value="{{ $Edit_Laundries_Installments->date }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="price">المبلغ</label>
            <input type="number" name="price" id="price" value="{{ $Edit_Laundries_Installments->price }}" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">تسديد الفاتورة</button>
    </form>
</div>

</body>
</html>
