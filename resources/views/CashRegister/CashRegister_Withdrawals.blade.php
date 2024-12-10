<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نموذج طلب سحب من الخزينة</title>
    
    <link rel="stylesheet" href="{{ asset('css/balance/withdraw.css') }}">



</head>
<body>
    @extends($layout)   
    
<h1 class="title">نموذج طلب سحب من الخزينة</h1>

<form action="{{ route("balance/reqwith") }}" method="post" class="withdraw-form">
    @csrf
    <div class="form-group">
        <label for="amont">المبلغ</label>
        <input type="number" name="amont" id="amont" class="form-control">
    </div>
    <div class="form-group">
        <label for="reason">السبب</label>
        <input type="text" name="reason" id="reason" class="form-control">
    </div>
    <div class="form-group">
        <label for="date">التاريخ</label>
        <input type="date" name="date" id="date" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">تسجيل السحب</button>
</form>

</body>
</html>
