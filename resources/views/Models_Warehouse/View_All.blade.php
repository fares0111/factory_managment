
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h3 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 80%;
            margin: 100px auto 20px;
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

        h1{

margin-top:80px;
margin-bottom:-60px;
text-align:center;
        }
    </style>
@extends('index')
<h1>خامات</h1>
<table class="table">
  <thead>
    


    <tr>
      <th scope="col">الصنف</th>
      <th scope = "col">العدد</th>
  
      <th scope="col">كود المنتج</th>
      <th scope="col">السعر </th>

    </tr>
  </thead>
  <tbody>
  @foreach($Purchases_Invoices as $Purchase_Invoice)  
    <tr>
    
      <td>{{$Purchase_Invoice->name}}</td>
      <td>{{$Purchase_Invoice->num}}</td>   
      <td>{{$Purchase_Invoice->code}}</td>
      <td>{{$Purchase_Invoice->price}}</td>
      
    </tr>

    @endforeach
  </tbody>
</table>



<table class="table">
  <thead>
    
          <h1>البضاعة</h1>

    <tr>
      <th scope="col">الاسم</th>
      <th scope = "col">العدد</th>
       <th scope="col">السعر </th>
      <th scope="col">كود المنتج</th>
     

    </tr>
  </thead>
  <tbody>
  @foreach($models as $model)  
    <tr>
    
      <td>{{$model->name}}</td>
      <td>{{$model->much}}</td>
      <td>{{$model->price}}</td>
      <td>{{$model->code}}</td>

      @if(auth()->guard("admin")->check() || auth()->guard("super_admin")->check())

      <td><a href="{{route("editmodel",$model->id)}}">تعديل</a></td>
      @endif
    </tr>

    @endforeach
  </tbody>
</table>



