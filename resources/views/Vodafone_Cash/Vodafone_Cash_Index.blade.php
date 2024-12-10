<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الرصيد</title>
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
        .balance-item {
            margin-bottom: 10px;
        }
        .balance-item span {
            font-weight: bold;
        }
        a {
            display: block;
            padding: 10px;
            margin-top: 20px;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border-radius: 4px;
            text-align: center;
        }
        a:hover {
            background-color: #0056b3;
        }
    </style>
  @extends($layout)   
    
</head>
<body>

<div class="container">
    <div class="balance-item">الايداعات :: <span>{{$Total_Cash}}</span></div>
    <div class="balance-item">المسحوبات :: <span>{{$Total_Withdrawls}}</span></div>
    <div class="balance-item">الرصيد :: <span>{{$Net_Cash}}</span></div>
</div>

<a href="{{route("addcash")}}">اضافة اموال</a>
<a href="{{route("vodafone")}}">عرض الاضافات</a>
<a href="{{route("vodafone/with")}}">سحب</a>
<a href="{{route("vodafone/withdraws")}}">عرض المسحوبات</a>

</body>
</html>
