
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        a {
            text-decoration: none;
            color: blue;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
  @extends($layout)   
    
<table class="table">
  <thead>
    
  <h1>الموديلات</h1>

    <tr>
      <th scope="col">الموديل</th>
      <th scope="col">السعر </th>
      <th scope = "col">العدد</th>
      <th scope="col">كود المنتج</th>
  

    </tr>
  </thead>
  <tbody>
  @foreach($models as $model)  
    <tr>
    
      <td>{{$model->name}}</td>
      <td>{{$model->price}}</td>
      <td>{{$model->much}}</td>
      <td>{{$model->code}}</td>

      @if(auth()->guard("admin")->check() || auth()->guard("super_admin")->check())

<td><a href="{{route("editmodel",$model->id)}}">تعديل</a></td>

@endif
    </tr>

    @endforeach
  </tbody>
</table>