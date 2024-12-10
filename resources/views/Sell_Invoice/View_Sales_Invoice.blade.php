
<style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        a {
            text-decoration: none;
            color: blue;
        }
    </style>

@extends($layout)   
    
<h1>فواتير البيع</h1><br><br>


<table class="table">
  <thead>
    <tr>
      <th scope="col">الصنف</th>
      <th scope = "col">الكمية</th>
      <th scope="col">البائع</th>
      <th scope="col">السعر</th>
      <th scope="col">الكود</th>
      <th scope="col">الخصم</th>
      <th scope="col">الخصم بالنسبة المئوية</th>
      <th scope="col">المبلغ قبل الخصم</th>
      <th scope="col">المبلغ بعد الخصم</th>
      <th scope="col">طريقة الدفع</th>
      <th scope="col">الاجمالي</th>
    </tr>
  </thead>
  <tbody>



  @foreach($models as $model)  
    <tr>
    
      <td>{{$model->type}}</td>
      <td>{{$model->much}}</td>
      <td>{{$model->buyer}}</td>
      <td>{{$model->price}}</td>
      <td>{{$model->code}}</td>
      <td>{{"EG"}}{{$model->dis}}</td>
      <td>{{"%"}}{{$model->presdis}}</td>
      <td>{{$model->price}}</td>
      <td>{{$model->afterdis}}</td>
      <td>{{$model->bymethod}}</td>
      <td>{{$model->total}}</td>
      <td><a href="{{route("editsell",$model->id)}}">تعديل</a></td>
      <td><a href="{{route("deleteseller",$model->id)}}">حذف</a></td>

    </tr>

    @endforeach
  </tbody>
</table>