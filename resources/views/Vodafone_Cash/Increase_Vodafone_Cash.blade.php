
<style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f0f0f0;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input[type="text"],
        input[type="number"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 16px;
        }
        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
  @extends($layout)   
    
<form action="{{route("insertcash")}}" method="post">

@csrf

<label for="name">اسم المودع</label>
<input type="text" name="name" id="name"><br><br>
<label for="price">مبلغ الايداع</label>
<input type="number" name="price"><br><br>
<label for="">رقم المودع </label>
<input type="text" name="number">
<label for="date">التاريخ</label>
<input type="date" name="date" id="date"><br><br>
<button type="submit">تسجيل الايداع</button>

</form>