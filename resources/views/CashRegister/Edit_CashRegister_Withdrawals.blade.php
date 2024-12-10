<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نموذج تعديل طلب سحب من الخزينة</title>
   
    <link rel="stylesheet" href="{{ asset('css/balance/withedit.css') }}">
 <!-- تضمين ملف الستايل -->
</head>
<body>
    @extends($layout)   
    
<h1 class="title">نموذج تعديل طلب سحب من الخزينة</h1>

<form action="{{ route("doeditbalancewithdraw", $Edit_CashRegister_Withdrals->id) }}" method="post" class="edit-withdraw-form">
    @csrf
    <div class="form-group">
        <label for="amont">المبلغ</label>
        <input type="number" name="amont" id="amont" value="{{ $Edit_CashRegister_Withdrals->amount }}" class="form-control">
    </div>
    <div class="form-group">
        <label for="reason">السبب</label>
        <input type="text" name="reason" id="reason" value="{{ $Edit_CashRegister_Withdrals->reason }}" class="form-control">
    </div>
    <div class="form-group">
        <label for="date">التاريخ</label>
        <input type="date" name="date" id="date" value="{{ $Edit_CashRegister_Withdrals->date }}" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">تسجيل السحب</button>
</form>

</body>
</html>
