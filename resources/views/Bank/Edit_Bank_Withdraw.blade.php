<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نموذج تعديل طلب سحب من البنك</title>
    <link rel="stylesheet" href="{{ asset('css/bank/editwith.css') }}"><!-- تضمين ملف الستايل -->
</head>
<body>
    @extends($layout)   
    
    

<div class="container">
    <div class="main-content">
        <h1 class="title">نموذج تعديل طلب سحب من البنك</h1>
        <form action="{{ route("doeditbankwith", $Edit_Bank_Withdraw->id) }}" method="post" class="bank-withdraw-form">
            @csrf
            <div class="form-group">
                <label for="amont">المبلغ</label>
                <input type="number" name="amont" id="amont" value="{{ $Edit_Bank_Withdraw->amont }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="reason">السبب</label>
                <input type="text" name="reason" id="reason" value="{{ $Edit_Bank_Withdraw->reason }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="date">التاريخ</label>
                <input type="date" name="date" id="date" value="{{ $Edit_Bank_Withdraw->date }}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">تسجيل السحب</button>
        </form>
    </div>
</div>

</body>
</html>
