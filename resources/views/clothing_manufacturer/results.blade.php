   


<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>'</title>
    <style>
        .table {
            width: 70%;
            text-align: center;
            font-size: 15px;
            color: black;
            background-color: white;
            border-collapse: collapse;
        }

        #ac {
            color: red;
            text-align: left;
            font-size: 20px;
        }

        #f {
            color: red;
        }

        h2 {
            font-size: 20px;
            text-align: center;
        }

        body {
            background-color: blue;
            font-size: 15px;
        }

        .info {
            margin-top: 70px;
            width: 20%;
            padding: 10px;
            background-color: white;
            color: black;
            font-size: 15px;
        }

        .print-info {
            position: absolute;
            top: 0;
            right: 0;
            padding: 10px;
            background-color: white;
            color: black;
            font-size: 15px;
            border: 1px solid #ccc;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: auto;
            display: none; /* مخفية افتراضيا */
        }

        .v {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            font-size: 30px;
            background-color: white;
            color: black;
            text-align: center;
            width: 100%;
            z-index: 1;
        }

        @media print {
            .no-print, .edit-delete, button ,.task{
                display: none;
            }

            .table {
                border: 1px solid #ccc;
                margin-top: 10px;
                width: 100%; /* ملء الصفحة بالكامل للطباعة */
                font-size: 13px;
            }

            .table th, .table td {
                border: 1px solid #ccc;
                padding: 4px;
                text-align: center;
                vertical-align: middle;
            }

            .table th {
                background-color: #007bff;
                color: #fff;
            }

            #ac, #f, h2 {
                font-size: 20px;
            }

            body {
                background-color: white;
                color: black;
                font-size: 15px;
            }

            .info {
                margin-top: 10px;
                background-color: white;
                color: black;
                font-size: 15px;
            }

            .print-info {
                display: block; /* عرض قسم البيانات فقط عند الطباعة */
                page-break-after: always; /* فصل الصفحة بعد بيانات المصنع */

            }

            .v {
                display: block; /* تأكد من ظهور النص عند الطباعة */
                top: 0; /* في أعلى الصفحة */
                left: 50%; /* في المنتصف أفقيًا */
                transform: translateX(-50%); /* تحريك النص لمنتصف الصفحة */
                font-size: 30px;
                background-color: white;
                color: black;
                text-align: center;
                width: 30%;
                z-index: 1;
            }
        }

        .pr{
            margin-top:10px;

            font-size:25px;
        }
    </style>
</head>
<body>


    <div class="task">

        @include($layout)   
    </div>
<p class="v">مصنع الحكمدار</p>
<!-- بيانات الطباعة -->
<div class="print-info">
    
    <p>ريمون :: 01070284120</p>
    <p>طلعت :: 01080784490</p>
    <p> ت الارضي :: 0233559777</p>
    <p> تحريرا في يوم :: {{ date('Y-m-d') }}</p>
</div>

<div class="info">
    <p>حساب {{$Workers->name}}</p>
    <p>اجمالي الحساب = {{$Workers->credit + $total}}</p>
    <p>اجمالي المصاريف = {{$total_withdraws}}</p>
    <p>الصافي {{$Workers->credit + $total - $total_withdraws}}</p>
</div>

<button class="pr" onclick="printPage()">طباعة</button>

@php
$counter =1;
@endphp

<table class="table" border="10">
    <h2>الانتاج</h2>
    <thead>
        <tr>
            <th scope="col">التاريخ</th>
            <th scope="col">الملاحظات</th>
            <th scope="col">الاجمالي</th>
            <th scope="col">السعر</th>
            <th scope="col">الكمية</th>
            <th scope="col">الموديل</th>
            <th scope="col">الوصف</th>
            <th scope="col">المسوؤل</th>
            <th scope="col">الرقم</th>

            <th class="edit-delete" scope="col">تعديل</th>
            <th class="edit-delete" scope="col">حذف</th>
        </tr>
    </thead>
    <tbody>
        @foreach($credits as $credit)
            <tr>
                <td>{{ $credit->date }}</td>
                <td>{{ $credit->comments }}</td>
                <td>{{ $credit->total }}</td>
                <td>{{ $credit->price }}</td>
                <td>{{ $credit->much }}</td>
                <td>{{ $credit->type }}</td>
                <td>{{ $credit->ditails }}</td>
                <td>{{ $credit->opreator }}</td>
                <td>{{ $counter++ }}</td>

                @if(auth()->guard("admin")->check() || auth()->guard("super_admin")->check())

                <td class="edit-delete"><a href="{{route('edit_add_bro_worker', $credit->id)}}">تعديل</a></td>
                <td class="edit-delete"><a href="{{route('delete_add_bro_worker', $credit->id)}}">حذف</a></td>
                @endif
            </tr>
        @endforeach
        <tr>
            <td>{{ $sum }}</td>
            <td colspan="9">اجمالي الانتاج</td>
        </tr>
    </tbody>
</table>

<hr>

@php
$counter =1;
@endphp

<table class="table" border="10">
    <h2>المسحوبات</h2>
    <thead>
        <tr>
            <th scope="col">التاريخ</th>
            <th scope="col">الملاحظات</th>
            <th scope="col">المبلغ</th>
            <th scope="col">المسوؤل</th>
            <th scope="col">الرقم</th>
            <th class="edit-delete" scope="col">تعديل</th>
            <th class="edit-delete" scope="col">حذف</th>
        </tr>
    </thead>
    <tbody>
        @foreach($Withdrawals as $Withdrawal)
            <tr>
                <td>{{ $Withdrawal->date }}</td>
                <td>{{ $Withdrawal->comments }}</td>
                <td>{{ $Withdrawal->much }}</td>
                <td>{{ $Withdrawal->opreator }}</td>
                <td>{{ $counter++ }}</td>

                @if(auth()->guard("admin")->check() || auth()->guard("super_admin")->check())

                <td class="edit-delete"><a href="{{route('edit_with_bro_worker', $Withdrawal->id)}}">تعديل</a></td>
                <td class="edit-delete"><a href="{{route('delete_with_bro_worker', $Withdrawal->id)}}">حذف</a></td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>

<hr>

<script>
    function printPage() {
        window.print();
    }
</script>
</body>
</html>
