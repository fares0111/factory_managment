<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Machine Options</title>
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
        .link-container {
            text-align: center;
        }
        .link-container a {
            display: block;
            margin: 20px 0;
            font-size: 24px; /* حجم الخط */
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }
        .link-container a:hover {
            color: #0056b3;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    @extends($layout)

    <div class="link-container">

        <a href="{{route("view_attendec_form")}}">تسجيل حضور</a>


        <a href="{{route('add_abs')}}">تسجيل غياب</a>
        <a href="{{route("abs_hours_form")}}">اضافة خصم</a>
    <a href="{{route("compensatory_hours")}}">اضافة مكافاة</a>
    

    </div>

</body>
</html>
