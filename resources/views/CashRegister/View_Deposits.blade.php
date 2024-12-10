
    <title>سجل ايداعات الخزينة</title>
    <link rel="stylesheet" href="{{ asset('css/balance/showbalance.css') }}"> <!-- تضمين ملف الستايل -->

    @extends($layout)   
    
<h1 class="title">سجل ايداعات الخزينة</h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">المبلغ</th>
      <th scope="col">المودع</th>
      <th scope="col">التاريخ</th>
  
      <th scope="col">تعديل</th>
      <th scope="col">حذف</th>
    </tr>
  </thead>
  <tbody>
  @foreach($Increases_CashRegister as $Increase_CashRegister)  
    <tr>
      <td>{{ $Increase_CashRegister->price }}</td>
      <td>{{ $Increase_CashRegister->name }}</td>
      <td>{{ $Increase_CashRegister->date }}</td>
      
      <td><a href="{{ route("editsellrecite", $Increase_CashRegister->id) }}">تعديل</a></td>
      <td><a href="{{ route("deletesellerdelete", $Increase_CashRegister->id) }}">حذف</a></td>
    </tr>
  @endforeach
  </tbody>
</table>

