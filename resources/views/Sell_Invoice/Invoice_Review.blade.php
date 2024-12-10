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

            .header-info {
                margin-bottom: 10px; /* تقليل المسافة أسفل العنوان */
                text-align: center;
                padding: 5px;
                border-bottom: 2px solid #007bff;
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
    </style>
</head>
<body>

       @extends($layout)   
    
       <form action="{{route('get.invoice.to.review')}}" method="post" style="max-width: 400px; margin: 0 auto; padding: 20px; background-color: #f9f9f9; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); margin-top:100px;margin-bottom:-50px;">
        @csrf
        <label for="invoice_number" style="display: block; margin-bottom: 10px; font-size: 18px;">ادخل رقم الفاتورة</label>
        <input type="search" id="invoice_number" name="invoice_reference_number" placeholder="رقم الفاتورة" style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">
        
        <input type="submit" value="بحث" style="background-color: #28a745; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">
    </form>


    @isset($Invoices)
        

<div class="container">
    <div class="main-content">
        <!-- زر الطباعة -->
        <div class="no-print">
            <button id="print-btn">طباعة</button>
        </div>

            
        <div id="print-section" class="print-section">

            <div class="print-info" style="margin-left: 530px"> 
                <h1 class="the_name" style="margin-right:200px ">الحكمدار</h1>

                <p>ريمون :: 01070284120</p>
                <p>طلعت :: 01080784490</p>
                <p>ت الارضي :: 0233559777</p>
                <p>تحريرا في يوم :: {{ date('Y-m-d') }}</p>
            </div>
            <div class="header-info">

                </h1>
            </div>

            <div class="section">

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
                                <td>{{ $Invoice->id }}</td>
                             
</tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endisset
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


function sendWhatsAppMessage(phoneNumber, message) {
    var encodedMessage = encodeURIComponent(message);
    var whatsappUrl = 'https://wa.me/' + phoneNumber + '?text=' + encodedMessage;
    window.open(whatsappUrl, '_blank');
}

</script>

</body>
</html>
