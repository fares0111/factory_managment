<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سجل مسحوبات الخزينة</title>

    <link rel="stylesheet" href="{{ asset('css/balance/showwithdraw.css') }}">
 <!-- تضمين ملف الستايل -->
</head>
<body>
  @extends($layout)   
    
<h1 class="title">سجل مسحوبات الخزينة</h1>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">المبلغ</th>
      <th scope="col">السبب</th>
      <th scope="col">التاريخ</th>
      <th scope="col">تعديل</th>
      <th scope="col">حذف</th>
    </tr>
  </thead>
  <tbody>
  @foreach($CashRegister_withdrawls as $CashRegister_withdraw)  
    <tr>
      <td>{{ $CashRegister_withdraw->amont }}</td>
      <td>{{ $CashRegister_withdraw->reason }}</td>
      <td>{{ $CashRegister_withdraw->date }}</td>
      <td><a href="{{ route("editbalancewith", $CashRegister_withdraw->id) }}">تعديل</a></td>
      <td><a href="{{ route("deletesellerwith", $CashRegister_withdraw->id) }}">حذف</a></td>
    </tr>
  @endforeach
  </tbody>
</table>

</body>
</html>
