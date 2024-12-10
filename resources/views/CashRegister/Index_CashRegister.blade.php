<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحة الرصيد</title>
    <link rel="stylesheet" href="css/balance/index.css">
</head>
<body>
    @extends($layout)   
    
    <div class="container">
        <div class="balance-summary">
            <h2>ملخص الرصيد</h2>
            <p class="green">الايداعات: {{$Net_Cash}}</p>
            <p>الدفعات: {{$Total_Salse_Deposits}}</p>
            <p class="red">المسحوبات: {{$Net_Withdrawls}}</p>
            <p class="good">الرصيد الحالي: {{$Final_Calucat}}</p>
        </div>
        <div class="actions">
            <a href="{{route("addbalance")}}" class="btn">اضافة اموال</a>
            <a href="{{route("balances")}}" class="btn">عرض الاضافات</a>
            <a href="{{route("balance/with")}}" class="btn">سحب</a>
            <a href="{{route("balance/withdraws")}}" class="btn">عرض المسحوبات</a>
        </div>
    </div>
</body>
</html>
