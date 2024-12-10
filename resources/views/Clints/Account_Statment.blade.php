<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فواتير البيع</title>
    
    <link rel="stylesheet" href="{{ asset('css/buyer/final.css') }}"> <!-- تضمين ملف الستايل -->

    <style>
        @media print {
            /* إخفاء أعمدة معينة أثناء الطباعة */
            .no-print {
                display: none;
            }

            .hide-on-print {
                display: none;
            }

            /* تحسين تنسيق الطباعة */
            .print-section {
                margin: 0;
                padding: 0;
                border: none;
                width: 100%;
                font-size: 100px; /* تكبير حجم الخط للطباعة بشكل عام */
            }

            .section {
                margin: 0;
                padding: 0;
                page-break-inside: avoid;
            }

            .table {
                width: 100%;
                border-collapse: collapse;
                margin: 0;
                border: 1px solid #ccc;
            
            }

            .table th, .table td {
                border: 1px solid #ccc;
                padding: 4px; /* تقليل المسافات داخل الخلايا */
                text-align: center;
                vertical-align: middle;
                font-size: 50px; /* تكبير حجم الخط داخل الخلايا */
            }

            .table th {
                background-color: #007bff;
                color: #fff;
            }

            .title {
                margin: 0;
                padding: 5px 0; /* تقليل المسافة في العنوان */
                font-size: 16px; /* تكبير حجم الخط في العنوان */
                text-align: center;
                border-bottom: 2px solid #007bff;
            }

            .header-info{
display: inline;
width: auto;
    margin-top:-100px ;
}

            .footer-info {
                margin-top: 10px; /* تقليل المسافة فوق البيانات */
                text-align: center;
            }



            /* تكبير حجم الخط في خانة "الخصم بالنسبة المئوية" */
            .discount-percentage {
                font-size: 100px; /* تكبير حجم الخط في هذه الخانة */
            }


            .print-info p {
    margin: 0;
    padding: 5px 0;
    font-size: 14px; /* حجم النص */
    white-space: nowrap; /* يمنع النص من الانتقال إلى السطر التالي */
}

.name{

display: inline;
} 
        }

        .container {
            padding: 20px;
        }

        .no-print {
            text-align: center;
            margin-bottom: 20px;
        }

        .no-print button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
        }

        .hide-on-print {
            display: none;
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
            width: 100%;
            display: none;
           }         
           .name{

            display:none;
           }

    </style>
</head>
<body>

       @extends($layout)   
    

<div class="container">
    <div class="main-content">
        <!-- زر الطباعة -->
        <div class="no-print">
            <button id="print-btn">طباعة</button>
        </div>

            
        <div id="print-section" class="print-section"> 
            <h1 class="name" style="width:auto; margin-left:300px; font-size:35px;">مصنع الحكمدار</h1>

            <div class="header-info" >
                <h3>{{"" ." العميل::"." "." "}}{{ $Clints->name}}</h3>
            </div>
<button>{{"اجمالي عدد القطع"}}<h3>{{$Net_Quntem}}</h3></button>
            <div class="print-info" style="margin-left:530px;margin-top:-150px;"> 

                <p>محمد عطيه :: 01070284120</p>
                <p>طلعت :: 01080784490</p>
                <p>ت الارضي :: 0233559777</p>
                <p>تحريرا في يوم :: {{ date('Y-m-d') }}</p>
            </div>

            @php
            $counter = 1;
            @endphp
            <div class="section">
                <h1 class="title">الفواتير</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">الصنف</th>
                            <th scope="col">الكمية</th>
                            <th scope="col" class="hide-on-print">البائع</th>
                            <th scope="col">السعر</th>
                            <th scope="col">الكود</th>
                            <th scope="col">الخصم</th>
                            <th scope="col" class="discount-percentage" stylr="width:1px;">الخصم بالنسبة المئوية</th>
                            <th scope="col">المبلغ قبل الخصم</th>
                            <th scope="col">المبلغ بعد الخصم</th>
                            <th scope="col" class="hide-on-print">طريقة الدفع</th>
                            <th scope="col">التاريخ</th>
                            <th scope="col">الاجمالي</th>
                            <th scope="col">الرقم</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach($Invoices as $Invoice)  

                            <tr>
                                <td>{{ $Invoice->type }}</td>
                                <td>{{ $Invoice->much }}</td>
                                <td class="hide-on-print">{{ $Invoice->buyer }}</td>
                                <td>{{ $Invoice->price }}</td>
                                <td>{{ $Invoice->code }}</td>
                                <td>{{ "EG" . $Invoice->dis }}</td>
                                <td class="discount-percentage">{{ "%" . $Invoice->presdis }}</td>
                                <td>{{ $Invoice->price }}</td>
                                <td>{{ $Invoice->afterdis }}</td>
                                <td class="hide-on-print">{{ $Invoice->bymethod }}</td>
                                <td>{{ date('d-m-Y', strtotime($Invoice->date)) }}</td>
                                <td>{{ $Invoice->total }}</td>
                                <td>{{ $counter++ }}</td>
                             
                                @if(auth()->guard("admin")->check() || auth()->guard("super_admin")->check())
                                <td class="no-print"><a href="{{route("editsell",$Invoice->id)}}">تعديل</a></td>
                                <td class="no-print"><a href="{{route("deleteseller",$Invoice->id)}}">حذف</a></td>
                                <td class="no-print">
                                    <a href="https://api.whatsapp.com/send/?%2B201121414088&text={{ urlencode('الصنف: '. $Invoice->type . "\nالعدد: " . $Invoice->much . "\nالسعر: " . $Invoice->price . "\nالإجمالي: " . $Invoice->total) }}" rel="noopener noreferrer">
                                        WhatsApp
                                    </a>
                                </td>
                                @endif
                                
                                
                                
                                
 </tr>
                        @endforeach
                        @php
                        $counter =1;
                        @endphp
                    </tbody>
                </table>
            </div>

            <!-- قسم المرتجعات للطباعة -->
            <div class="section">
                <h1 class="title">المرتجعات</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">الكمية</th>
                            <th scope="col">التاريخ</th>
                            <th scope="col">الموديل</th>
                            <th scope="col">كود الموديل</th>
                            <th scope="col">الاجمالي</th>
                            <th scope="col">الرقم</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Sales_Returns as $Sales_Return)  
                            <tr>
                                <td>{{ $Sales_Return->much }}</td>
                                <td>{{ date('d-m-Y', strtotime($Sales_Return->date)) }}</td>
                                <td>{{ $Sales_Return->model }}</td>
                                <td>{{ $Sales_Return->code}}</td>
                                <td>{{ $Sales_Return->total }}</td>
                                <td>{{ $counter++ }}</td>

                                @if(auth()->guard("admin")->check() || auth()->guard("super_admin")->check())

                                <td class="no-print"><a href="{{route("Edit_Salse_Return",$Sales_Return->id)}}"> تعديل</a></td>
                                <td class="no-print"><a  href="{{route("Delete_Sales_Return",$Sales_Return->id)}}">حذف</a></td>

                                @endif

                            </tr>
                        @endforeach

                        @php
                        $counter =1;
                        @endphp
                    </tbody>
                </table>
            </div>

            <!-- قسم المدفوعات للطباعة -->
        
                <h1 class="title">المدفوعات</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">المبلغ</th>
                            <th scope="col">التاريخ</th>
                            <th scope="col">طريقة الدفع</th>
                            <th scope="col">الملاحظات</th>
                            <th scope="col">الرقم</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($The_Installments as $The_Installment)  
                            <tr>
                                <td>{{ $The_Installment->amont }}</td>
                                <td>{{ date('d-m-Y', strtotime($The_Installment->date)) }}</td>
                                <td>{{ $The_Installment->payment_way }}</td>
                                <td>{{ $The_Installment->commants }}</td>
                                <td>{{ $counter++ }}</td>


                                @if(auth()->guard("admin")->check() || auth()->guard("super_admin")->check())

                                <td class="no-print"><a  href="{{route("editbuyer",$The_Installment->id)}}"> تعديل</a></td>
                                <td class="no-print"><a  href="{{route("deletebuyerde",$The_Installment->id)}}">حذف</a></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            <!-- بيانات البائع للطباعة -->
            <div class="footer-info">
                <p>رصيد مرحل: {{$Clints->mony}}</p>
                <p>المديونية: {{ $Total_Cash }}</p>
                <p>اجمالي المرتجعات: {{ $Total_Sales_Returns }}</p>
                <p>الدفعات: {{ $Totl_Installment }}</p>
                <p>الباقي: {{ $Net_Cash }}</p>
            </div>
      
        </div>
    </div>
</div>

<script>function printAll() {
    const printWindow = window.open('', '', 'height=800,width=1200');
    printWindow.document.write('<html><head><title>طباعة</title>');
    printWindow.document.write('<style>@media print { .no-print { display: none; } .hide-on-print { display: none; } .print-section { margin: 0; padding: 0; border: none; width: 100%; font-size: 30px; } .section { margin: 0; padding: 0; page-break-inside: avoid; } .table { width: 100%; border-collapse: collapse; margin: 0; border: 1px solid #ccc; } .table th, .table td { border: 1px solid #ccc; padding: 4px; text-align: center; vertical-align: middle; font-size: 13px; } .table th { background-color: #007bff; color: #fff; } .title { margin: 0; padding: 5px 0; font-size: 16px; text-align: center; border-bottom: 2px solid #007bff; } .footer-info { margin-top: 10px; text-align: center; } .discount-percentage { font-size: 14px; } .page-break { display: none; }</style>');
    printWindow.document.write('</head> <body>' );
    printWindow.document.write(document.getElementById('print-section').innerHTML);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.focus();
    printWindow.print();
}




    
    document.getElementById('print-btn').addEventListener('click', printAll);


</script>

</body>
</html>
