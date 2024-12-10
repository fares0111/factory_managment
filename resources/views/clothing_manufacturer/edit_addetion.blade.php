<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker</title>
    <style>
        body {
            background-color: blue;
            color: white;
        }
        input, select {
            padding: 12px;
            font-size: 20px;
            margin: 10px 0;
            box-sizing: border-box;
        }
        form {
            font-size: 30px;
        }
        .value {
            font-size: 25px;
        }
        #expenseForm {
            margin: 50px;
            margin-top: 100px; /* Adjust this value as needed */
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .form-group {
            flex: 1 1 30%; /* Adjust the width of each field */
            min-width: 200px; /* Set a minimum width to handle small screens */
        }
        .form-group-full {
            flex: 1 1 100%; /* Full width for the button */
        }
        table {
            margin: 50px;
            width: 90%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid white;
            padding: 10px;
            text-align: left;
        }
        #addExpense{

            font-size:25px;
        }

        #saveExpenses{

font-size:25px;
}
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    @extends($layout)   

    <div class="do">
        @section('con')
    </div>

    <form id="expenseForm" method="post" action="{{route('doedit_add_bro_worker',$edit->id)}}">
        @csrf

        
        <div class="form-group">
            اسم الصنايعي <input type="text" name="name" value="{{$edit->name}}" readonly>
        </div>
        <div class="form-group">
            عدد القطع
            <input type="number" id="much" name="much"  value="{{$edit->much}}">
        </div>
        <div class="form-group">
            سعر القطعة
            <input type="number" id="price" name="price"  value="{{$edit->price}}">
        </div>
        <div class="form-group">
            التاريخ
            <input type="date" id="date" name="date"  value="{{$edit->date}}">
        </div>
        <div class="form-group">
            المسئول
            <select id="oper" name="oper"  value="{{$edit->opre}}">
                <option value="روماني">روماني</option>
                <option value="طلعت">طلعت</option>
            </select>
        </div>
        <div class="form-group">
            الصنف
            <input type="text" id="type" name="type"  value="{{$edit->type}}">
        </div>
        <div class="form-group">
            وصف الموديل
            <input type="text" id="details"  name="details" value="{{$edit->details}}">
        </div>
        <div class="form-group">
            الملاحظات
            <input type="text" id="comments"  name="comments" value="{{$edit->comments}}">
        </div>
    
            <button type="submite" id="addExpense">تعديل</button>
   
    </form>