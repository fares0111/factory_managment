<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض الفواتير</title>
    <link rel="stylesheet" href="{{ asset('css/washes/finalty.css') }}"> <!-- تضمين ملف الستايل -->
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 18px;
            background-color: white;
            color: black;
        }

        .al {
            background-color: black;
            color: rgb(255, 255, 255);
            font-size: 25px;
            margin-top: 100px;
            padding: 10px;
            margin-left: 1100px;
        }

        .container {
            padding: 10px;
        }

        .title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }

        .table {
            border-collapse: collapse;
            width: 100%;
            margin: 25px 0;
            font-size: 18px;
            text-align: left;
            background-color: #fff;
        }

        .table th, .table td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
        }

        .table th {
            background-color: #4CAF50;
            color: white;
            text-transform: uppercase;
        }

        .table tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .table tr:hover {
            background-color: #f1f1f1;
        }

        #printButton {
            margin: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        } 

        .clint {
            margin-top: 80px;
            margin-bottom: -100px;
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

        .fa {
            margin-top: 50px;
            margin-bottom: -100px;
            text-align: center; 
        }

        /* إعدادات الطباعة */
        @media print {
            #printButton, .taskbar {
                display: none !important;
            }

            .print-info {
                display: block;
            }

            .al {
                margin-left: 380px;
                font-size: 18px;
                text-align: center;
                background-color: #ffffff;
                width: 20%;
                color: rgb(0, 0, 0);
            }

            .container {
                width: 100%;
                margin: 0;
            }

            .table {
                border: 1px solid #ccc;
                margin-top: 0;
                font-size: 14px;
            }

            .table th, .table td {
                padding: 8px;
            }

            body {
                background-color: white;
                color: black;
            }

            .table a {
                display: none;
            }
            .fa{
text-align: center;
                margin-top:-50px ;
              
            }

        }
    </style>
</head>
<body>
    @extends($layout)   
    
<h4 class="clint">المغسلة :: {{$The_Launderer->name}} </h4> 

<h2 class="fa"> مصنع الحكمدار 


    <button id="printButton" class="btn btn-primary">طباعة </button>

</h2>

<div class="print-info">
    <p>ريمون :: 01070284120</p>
    <p>طلعت :: 01080784490</p>
    <p> ت الارضي :: 0233559777</p>
    <p> تحريرا في يوم :: {{ date('Y-m-d') }}</p>
</div>

<div class="al">
    <p>المستحق {{$Total_Cash}}</p>
    <p> اجمالي الدفع {{$Launderer_Withdrawls}}</p>
    <p> اجمالي الباقي {{$Net_Cash}}</p>
</div>

@php
$counter =1;
@endphp

<div class="container">
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>مراحل الشغل</th>
                    <th>الكمية</th>
                    <th>النوع</th>
                    <th>السعر</th>
                    <th>التاريخ</th>
                    <th>الاجمالي</th>
                    <th>الملاحظات</th>
                    <th >المسوؤل</th>
                    <th >الرقم</th>
        

                </tr>
            </thead>
            <tbody>
                @foreach($Laundries_Invoices as $Laundrie_Invoice)
                <tr>
                    <td>{{ $Laundrie_Invoice->prosses }}</td>
                    <td>{{ $Laundrie_Invoice->much }}</td>
                    <td>{{ $Laundrie_Invoice->type }}</td>
                    <td>{{ $Laundrie_Invoice->price }}</td>
                    <td>{{ \Carbon\Carbon::parse($Laundrie_Invoice->date)->format('Y-m-d') }}</td>
                    <td>{{ $Laundrie_Invoice->total }}</td>
                    <td>{{ $Laundrie_Invoice->commants }}</td>
                    <td>{{ $Laundrie_Invoice->opreator }}</td>
                    <td>{{ $counter++ }}</td>
    

                    @if(auth()->guard("admin")->check() || auth()->guard("super_admin")->check())

                    <td>
                        <a href="{{ route('editwasher', $Laundrie_Invoice->id) }}">تعديل</a>
                    </td>
                    <td>
                        <a href="{{ route('deletewasher', $Laundrie_Invoice->id) }}">حذف</a>

                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>

        @php
        $counter =1;
        @endphp

        <table class="table">
            <thead>
                <tr>  
                    <th>المبلغ</th>
                    <th>التاريخ</th>
                    <th >المسوؤل</th>
                    <th >الرقم</th>
                
                </tr>
            </thead>
            <tbody>
                @foreach($Launderer_Installments as $Launderer_Installment)
                <tr>             

                    <td>{{ $Launderer_Installment->price }}</td>
                    <td>{{ \Carbon\Carbon::parse($Launderer_Installment->date)->format('Y-m-d') }}</td>
                    <td>{{ $Launderer_Installment->opreator }}</td>
                    <td>{{ $counter++ }}</td>

                    @if(auth()->guard("admin")->check() || auth()->guard("super_admin")->check())

                    <td><a href="{{route("editwasherwith", $Launderer_Installment->id)}}">تعديل</a></td>
                    <td><a href="{{route("deletewasherwith", $Launderer_Installment->id)}}">حذف</a></td>
@endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- زر الطباعة -->
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // إضافة حدث استماع لزر الطباعة
        document.getElementById('printButton').addEventListener('click', function() {
            // فتح نافذة الطباعة
            window.print();
        });
    });
</script>

</body>
</html>
