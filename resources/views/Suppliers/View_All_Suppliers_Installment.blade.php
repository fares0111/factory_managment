

<style>
        /* تحسين التباعد بين الأعمدة */
        th, td {
            padding: 10px;
        }
        /* تحديد نمط الخط والحجم ولون الخلفية لعنوان الصفحة */
        h1 {
            font-family: Arial, sans-serif;
            font-size: 24px;
            background-color: #f7f7f7;
            padding: 10px;
            margin-bottom: 20px;
        }
        /* تصميم الجدول */
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
        }
        /* تحديد لون الخلفية للصفوف الفردية */
        tbody tr:nth-child(odd) {
            background-color: #f2f2f2;
        }
        /* تحديد لون الخلفية عند تحويل المؤشر */
        tbody tr:hover {
            background-color: #ddd;
        }
        /* تصميم الروابط للتعديل والحذف */
        a {
            text-decoration: none;
            color: #007bff;
            margin-right: 5px;
        }
        /* تغيير لون الروابط عند التحويل */
        a:hover {
            color: #0056b3;
        }
    </style>
  @extends($layout)   
    

<br>
<h1>سجل التسديدات</h1><br><br>


<table class="table">
  <thead>
    <tr>
      <th scope="col">البائع</th>
      <th scope = "col">المبلغ</th>
      <th scope="col">التاريخ</th>
      <th scope="col">طريقة البيع</th>

    </tr>
  </thead>
  <tbody>
  @foreach($Deposites as $deposite)  
    <tr>
    
      <td>{{$deposite->seller}}</td>
      <td>{{$deposite->amont}}</td>
      <td>{{$deposite->date}}</td>
      <td>{{$deposite->way}}</td>
      <td><a href="{{route("editsellerde",$deposite->id)}}">تعديل</a></td>
      <td><a href="{{route("deletesellerde",$deposite->id)}}">حذف</a></td>
    </tr>

    @endforeach
  </tbody>
</table>

