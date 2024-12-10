
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
    
<h1>سجل ايداعات فودافون كاش</h1><br><br>



<table class="table">
  <thead>
    <tr>
      <th scope="col">المبلغ</th>
      <th scope = "col">المودع</th>
      <th scope="col">التاريخ</th>

      <th scope="col">تعديل</th>
      <th scope="col">حذف</th>
    </tr>
  </thead>
  <tbody>
  @foreach($Vodafon_Cash_Deposits as $Vodafon_Cash_Deposit)  
    

  <tr>

     
      <td>{{$Vodafon_Cash_Deposit->amont}}</td>
      
      <td>{{$Vodafon_Cash_Deposit->name}}</td>
      <td>{{$Vodafon_Cash_Deposit->date}}</td>

     <td> <a href="{{route("editdevodafone",$Vodafon_Cash_Deposit->id)}}">تعديل</a></td>
     <td><a href="{{route("deletevodafone",$Vodafon_Cash_Deposit->id)}}">حذف</a> </td>
     

  </tr>
    
  

    @endforeach
  </tbody>
</table>