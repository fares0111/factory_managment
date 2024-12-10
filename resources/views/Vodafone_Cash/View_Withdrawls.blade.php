<style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f0f0f0;
        }
        h1 {
            text-align: center;
            color: #007bff;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        a {
            text-decoration: none;
            color: #007bff;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
  @extends($layout)   
    
<h1>سجل مسحوبات الخزينة</h1><br><br>



<table class="table">
  <thead>
    <tr>
      <th scope="col">الاسم</th>
      <th scope = "col">الرقم</th>
      <th scope="col">المبلغ</th>
      <th scope="col">التاريخ</th>

    </tr>
  </thead>
  <tbody>
  @foreach($Withdrawls as $Withdraw)  
    <tr>


      <td>{{$Withdraw->name}}</td>
      <td>{{$Withdraw->number}}</td>
      <td>{{$Withdraw->amont}}</td>
      <td>{{$Withdraw->date}}</td>

      
  <td> <a href="{{route("editdevodafonewith",$Withdraw->id)}}">تعديل</a></td>
     <td><a href="{{route("deletevodafonewith",$Withdraw->id)}}">حذف</a> </td>

    </tr>

    @endforeach
  </tbody>
</table>