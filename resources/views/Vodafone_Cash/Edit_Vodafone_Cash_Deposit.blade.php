
<style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f0f0f0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
  @extends($layout)   
    
<form action="{{route("doeditvodafone",$Edit_Deposit->id)}}" method="post">

@csrf

<label for="name">اسم المودع</label>
<input type="text" name="name" id="name" value="{{$Edit_Deposit->name}}" readonly><br><br>
<label for="price" >مبلغ الايداع</label>
<input type="number" name="price" value="{{$Edit_Deposit->amont}}"><br><br>
<label for="date">التاريخ</label>
<input type="date" name="date" id="date" value="{{$Edit_Deposit->date}}"><br><br>

<label for="date">الرقم</label>
<input type="text" name="number" id="date" value="{{$Edit_Deposit->number}}"><br><br>
<button type="submit">تسجيل الايداع</button>

</form>
