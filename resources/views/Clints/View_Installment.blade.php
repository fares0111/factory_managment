<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سجل الايداعات البنكية</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


    @extends($layout)   
    
<div class="container">
    <h1 class="mt-5 mb-4 text-center">سجل الايداعات البنكية</h1>
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">البائع</th>
                <th scope="col">المبلغ</th>
                <th scope="col">التاريخ</th>
                <th scope="col">طريقة البيع</th>
            </tr>
        </thead>
        <tbody>
            @foreach($deposites as $deposite)  
            <tr>
                <td>{{ $deposite->buyer }}</td>
                <td>{{ $deposite->amont }}</td>
                <td>{{ $deposite->date }}</td>
                <td>{{ $deposite->way }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
