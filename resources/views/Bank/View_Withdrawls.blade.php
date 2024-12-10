<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سجل المسحوبات البنكية</title>
    <link rel="stylesheet" href="{{ asset('css/bank/showwith.css') }}"> <!-- تضمين ملف الستايل -->
</head>
<body>
    @extends($layout)   
    
<div class="container">
    <div class="main-content">
        <h1 class="title">سجل المسحوبات البنكية</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">المبلغ</th>
                    <th scope="col">السبب</th>
                    <th scope="col">التاريخ</th>

                    <th scope="col">تعديل</th>
                    <th scope="col">حذف</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Withdrawls as $Withdraw)
                    <tr>
                        <td>{{ $Withdraw->amont }}</td>
                        <td>{{ $Withdraw->reason }}</td>
                        <td>{{ $Withdraw->date }}</td>
                        <td><a href="{{ route("editbankwith", $Withdraw->id) }}" class="btn">تعديل</a></td>
                        <td><a href="{{ route("deletebankwith", $Withdraw->id) }}" class="btn">حذف</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
