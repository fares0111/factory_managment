<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نموذج إرجاع المبيعات</title>
    <style>
        body {
            background-color: black;
            color: white;
            font-size: 18px;
            font-family: Arial, sans-serif;
        }
        form {
            max-width: 500px;
            margin: auto;
            margin-top:100px;
            padding: 20px;
            background-color: #333;
            border-radius: 10px;
        }
        input[type="text"],
        input[type="number"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            font-size: 18px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #444;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    @extends($layout)   
    
    <form action="{{route('Update_Purchases_Return',$Date_Purchases_Return->id)}}" method="post">
        @csrf

        <label for="TheSaller">البائع</label>
        <input type="text" value="{{$Supplier}}" readonly>

        <label for="All_Codes">كود الموديل</label>
        <input type="text" name="The_Code" value="{{$Date_Purchases_Return->code}}" readonly>

        <label for="Much_Of_Return">الكمية</label>
        <input type="number" name="Much_Of_Return" id="Much_Of_Return" value="{{$Date_Purchases_Return->much}}"><br>

        <label for="Date_Of_Return">التاريخ</label>
        <input type="date" name="Date_Of_Return" id="Date_Of_Return" value="{{$Date_Purchases_Return->date}}"><br>

        <input type="submit" value="إرسال">
    </form>
</body>
</html>