<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            background-color: white;
            color: black;
            font-size: 18px;
        }

        .container {
            width: 20%;
            padding: 10px;
            background-color: black;
            color: white;
            font-size: 18px;
            position: relative;
            top: 10px;
            margin-bottom: 20px;
        }

        .factory-name {
            text-align: center;
            font-size: 30px;
            font-weight: bold;
            margin: 20px 0;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin: 25px 0;
            font-size: 18px;
            text-align: left;
            background-color: #fff;
        }

        th, td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
            text-transform: uppercase;
        }

        tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .print-info {
            position: fixed;
            top: 0;
            right: 0;
            padding: 10px;
            background-color: white;
            color: black;
            font-size: 15px;
            border: 1px solid #ccc;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: auto;
            display: none;
        }

        @media print {
            .print-info {
                display: block;
            }

            .container {
                width: 100%;
                margin: 0;
                margin-top:-35px;
                background-color:white;
                color:black;
                font-size:12px;
            }

            table {
                border: 1px solid #ccc;
                margin-top: 0;
                width: 100%;
                font-size: 12px;
               
            }

            th, td {
                padding: 8px;
                color:black;
            }

            body {
                background-color: white;
                color: black;
            }

            .taskbar, button {
                display: none !important;
            }
        }
    </style>
</head>
<body>
    @extends($layout)   
    
<div class="factory-name">
    <p>مصنع الحكمدار</p>
</div>

<div class="container">
    <h1> اسم المورد :: {{$The_Clint->name}}</h1>
    <p> عدد الامتار :: {{$Total_Of_Meters}}</p>
    <p> عدد الاتواب :: {{$Total_Of_Robes}}</p>
    <p> الاجل :: {{$Total_Deferred}}</p>
    <p> اجمالي المستحق :: {{$Total_Recite_Amount}}</p>
    <p> الدفعات :: {{$Total_Installment}}</p>
    <p> الباقي :: {{$Net_Amount}}</p> 
</div>
    <button style="position:absolute;left:600px;top:300px;    font-size:40px;background-color:black;color:white" onclick="printPage()">طباعة</button>

<div>
   
</div>

<div class="print-info">
    <p>ريمون :: 01070284120</p>
    <p>طلعت :: 01080784490</p>
    <p> ت الارضي :: 0233559777</p>
    <p> تحريرا في يوم :: {{ date('Y-m-d') }}</p>
</div>

<div>
    <table border="5px">
        <h5>فواتير البيع الكاش</h5>
        <thead>
            <tr>
                <th>الوصف</th>
                <th> الامتار</th>
                <th>الاتواب</th>
                <th>سعر المتر</th>
                <th>الاجمالي</th>
                <th>الرقم</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($The_Cash_Recite as $Recite)
                <tr>
                    <td>{{$Recite->details}}</td>
                    <td>{{$Recite->much_of_fabricmeter}}</td>
                    <td>{{$Recite->much_of_fabricrobe}}</td>
                    <td>{{$Recite->price}}</td>
                    <td>{{$Recite->total}}</td>
                    <td>{{$Recite->id}}</td>

                    @if(auth()->guard("admin")->check() || auth()->guard("super_admin")->check())

                    <td><a href="{{route("Edit_Cash_Invoice",$Recite->id)}}">تعديل</a></td>
                    <td><a href="{{route("Delete_Cash_Invoice",$Recite->id)}}">حذف</a></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>

    <table border="5px">
        <h5>فواتير البيع بالاجل</h5>
        <thead>
            <tr>

                <th>الوصف</th>
                <th> الامتار</th>
                <th>الاتواب</th>
                <th>سعر المتر</th>
                <th>مدة الاجل</th>
                <th>سعر الاجل</th>
                <th>اجمالي الاجل</th>
                <th>الاجمالي</th>
                <th>الرقم</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($The_Deferred_Recite as $Recite)
                <tr>
                    <td>{{$Recite->details}}</td>
                    <td>{{$Recite->much_of_fabricmeter}}</td>
                    <td>{{$Recite->much_of_fabricrobe}}</td>
                    <td>{{$Recite->price}}</td>
                    <td> اشهر {{$Recite->time_deferred}}</td>
                    <td>EG {{$Recite->cost_deferred}}</td>
                    <td>EG {{$Recite->total_deferred}}</td>
                    <td>EG {{$Recite->total}}</td>
                    <td>{{$Recite->id}}</td>
                    @if(auth()->guard("admin")->check() || auth()->guard("super_admin")->check())

                    <td><a href="{{route("Edit_Deferred_Invoice",$Recite->id)}}">تعديل</a></td>
                    <td><a href="{{route("Delete_Deferred_Invoice",$Recite->id)}}">حذف</a></td>
                    

@endif
                </tr>
            @endforeach
        </tbody>
    </table>

    <h5>التسديدات</h5>
    <table border="5px">
        <thead>
            <tr>
                <th>المبلغ</th>
                <th>التاريخ</th>
                <th>الملاحظات</th>
                <th>الرقم</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($All_Installment as $Installment)
                <tr>
                    <td>{{$Installment->amount}}</td>
                    <td>{{$Installment->date}}</td>
                    <td>{{$Installment->comments}}</td>
                    <td>{{$Installment->id}}</td>
                    @if(auth()->guard("admin")->check() || auth()->guard("super_admin")->check())

                    <td><a href="{{route("Edit_Payment",$Installment->id)}}">تعديل</a></td>
                    <td><a href="{{route("Delete_Payment",$Installment->id)}}">حذف</a></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function printPage() {
        window.print();
    }
</script>
</body>
</html>
