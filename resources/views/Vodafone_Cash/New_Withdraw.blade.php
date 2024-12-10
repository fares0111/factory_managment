
<style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f0f0f0;
        }
        form {
            width: 50%;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="number"],
        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
  @extends($layout)   
    
<form action="{{route("vodafone/reqwith")}}" method="post">

@csrf

<label for="amont">المبلغ</label>
<input type="number" name="amont" id="amont"><br><br>
<label for="reason">الاسم</label>
<input type="text" name="name" id="name"><br><br>

<label for="">الرقم</label>
<input type="text" name="number" id="number"><br><br>

<label for="date">التاريخ</label>
<input type="date" name="date" id="date"><br><br>

<button type="submit">تسجيل السحب</button>


</form>



