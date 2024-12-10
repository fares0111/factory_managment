<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>تحديث الفواتير المؤجلة</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        form h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    @extends($layout)   
    
<form action="{{ route('Update_Deferred_Invoices', $Invoice->id) }}" method="post">
    @csrf
    <h2>تحديث الفواتير المؤجلة</h2>

    <label for="supplier">المورد</label>
    <input type="text" id="supplier" readonly value="{{ $Clint }}">

    <label for="details">البيان</label>
    <input type="text" id="details" name="name" value="{{ $Invoice->details }}">

    <label for="meters">عدد الامتار</label>
    <input type="number" id="meters" name="much_of_fabrics" value="{{ $Invoice->much_of_fabricmeter }}">

    <label for="robes">عدد الاتواب</label>
    <input type="number" id="robes" name="much_of_robs" value="{{ $Invoice->much_of_fabricrobe }}">

    <label for="deferred_time">فترة التقسيط</label>
    <input type="number" id="deferred_time" name="deferred_time" value="{{ $Invoice->time_deferred }}">

    <label for="amount_of_deferred">تكلفة التقسيط</label>
    <input type="number" id="amount_of_deferred" name="amount_of_deferred" value="{{ $Invoice->cost_deferred }}">

    <label for="price">السعر</label>
    <input type="number" id="price" name="price" value="{{ $Invoice->price }}">

    <input type="submit" value="تحديث">
</form>

</body>
</html>
