<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>القائمة الرئيسية</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- تضمين Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- تضمين ملف الستايل -->
</head>
<body>
    @extends($layout)   
    
    

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">القائمة الرئيسية</div>
                <div class="card-body">
                    <p>الايداع: {{ $Total_Deposits}}</p>
                    <p>السحب: {{ $Total_Witdrawlas }}</p>
                    <p>الرصيد: {{ $Net_Cash}}</p>
                    <a href="{{ route("addcheak") }}" class="btn btn-primary">اضافة شيك</a>
                    <a href="{{ route("cheaks") }}" class="btn btn-primary">عرض الشيكات</a>
                    <a href="{{ route("with") }}" class="btn btn-primary">سحب</a>
                    <a href="{{ route("withdraws") }}" class="btn btn-primary">عرض المسحوبات</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
