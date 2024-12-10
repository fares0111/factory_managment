<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>قائمة الدفعات</title>
    <link rel="stylesheet" href="{{ asset('css/bank/showcheak.css')}}"><!-- تضمين ملف الستايل -->
</head>
<body>
    @extends($layout)   
    
<div class="container">
    <div class="main-content">
        <h1 class="title">قائمة الدفعات</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">الاسم</th>
                    <th scope="col">المبلغ</th>
                    <th scope="col">التاريخ</th>
                    <th scope="col">رقم الشيك</th>

                    <th scope="col">تعديل</th>
                    <th scope="col">حذف</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Checks as $Cheak)
                    <tr>
                        <td>{{ $Cheak->name }}</td>
                        <td>{{ $Cheak->price }}</td>
                        <td>{{ $Cheak->date }}</td>
                        <td>{{ $Cheak->number }}</td>
                        <td><a href="{{ route("editbank", $Cheak->id) }}" class="btn btn-secondary">تعديل</a></td>
                        <td><a href="{{ route("deletebank", $Cheak->id) }}" class="btn btn-danger">حذف</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
