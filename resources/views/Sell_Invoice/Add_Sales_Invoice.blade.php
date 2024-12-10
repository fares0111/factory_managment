<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <style>
        body {
            background-color: black;
            color: antiquewhite;
            font-family: Arial, sans-serif;
            font-size:20px;
        }

        .invoice {
            border: 1px solid white;
            padding: 20px;
            margin-bottom: 20px;
            margin-top: 100px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .invoice .field {
            flex: 1 1 auto;
            display: flex;
            align-items: center;
        }

        .invoice .field label {
            margin-right: 10px;
        }

        .invoice .field input,
        .invoice .field select {
            flex: 1 1 50%;
            padding: 9px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid white;
            padding: 10px;
            text-align: left;
        }

        .create, .add-invoice {
            padding: 20px;
            background-color: aquamarine;
            font-size: 20px;
            margin: 10px;
            cursor:default;
        }
        #saveInvoices {
            font-size: 30px;
        }

        .totals {
            margin-top: 20px;
        }

    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

@extends($layout)




<form id="invoiceForm">

    @csrf
    @php

    use App\Models\Clints\Sales_Invoices_Model;
           do{
       
    
    $Reference_Id = rand(100000,100000000);
    
    
    }while (Sales_Invoices_Model::where('reference_id', $Reference_Id)->exists());
    
    
    @endphp
            <input type="number" name="refer" value="{{$Reference_Id}}" id="refere" hidden>


    <div class="invoice">
        <div class="field">
            <label for="code">رقم الكود</label>
            <input type="text" id="code" class="code">
        </div>


        <div class="field">
            <label for="payer">البائع</label>
            <select id="payer" class="payer">
                <option value="">اختار بائع</option>
                @foreach($Clints as $Clint)
                    <option value="{{$Clint->name}}" data-id="{{$Clint->id}}">{{$Clint->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="field">
            <label for="availableQuantity">الكمية</label>
            <input type="number" id="availableQuantity" class="availableQuantity" min="1">
        </div>

        <div class="field">
            <label for="much">الكمية المتاحة</label>
            <input type="text" id="much" class="much" readonly>
        </div>
        
        <div class="field">
            <label for="type">الصنف</label>
            <input type="text" id="type" class="type" readonly>
        </div>

       
        <div class="field">
            <label for="price">السعر</label>
            <input type="number" id="price" class="price">
        </div>

        <div class="field">
            <label for="amountDiscount">الخصم الثابت</label>
            <input type="number" id="amountDiscount" class="amountDiscount">
        </div>

        <div class="field">
            <label for="percentageDiscount">الخصم بالنسبة المئوية</label>
            <input type="number" id="percentageDiscount" class="percentageDiscount">
        </div>

        <div class="field">
            <label for="pay">طريقة البيع</label>
            <select id="pay" class="pay">
                @foreach($Payments_Ways as $Payments_Way)
                    <option value="{{$Payments_Way->name}}">{{$Payments_Way->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="field">
            <label for="afdi">المبلغ بعد الخصم</label>
            <input type="text" id="afdi" class="afdi" readonly>
        </div>

        <div class="field">
            <label for="total">الإجمالي</label>
            <input type="text" id="total" class="total" readonly>
        </div>


        <!-- Add Date Field -->
        <div class="field">
            <label for="date">التاريخ</label>
            <input type="date" id="date" class="date">
        </div>

        <button type="button" class="add-invoice">إضافة فاتورة</button>
    </div>
</form>

<h2>قائمة الفواتير</h2>
<table id="invoicesTable">
    <thead>
        <tr>
            <th>الصنف</th>
            <th>الكمية</th>
            <th>السعر</th>
            <th>رقم الكود</th>
            <th>الخصم الثابت</th>
            <th>الخصم بالنسبة المئوية</th>
            <th>طريقة البيع</th>
            <th>المبلغ بعد الخصم</th>
            <th>الإجمالي</th>
        </tr>
    </thead>
    <tbody>
        <!-- Rows will be added here dynamically -->
    </tbody>
    <tfoot>
        <tr>
            <td colspan="7">عدد قطع الفاتورة:</td>
            <td id="totalQuantity" colspan="4">0</td>
        </tr>
        <tr>
            <td colspan="7">إجمالي الفاتورة:</td>
            <td id="totalAmount" colspan="4">0</td>
        </tr>
    </tfoot>
</table>

<button id="saveInvoices">حفظ جميع الفواتير</button>
<button id="printInvoices" style="font-size:20px;">طباعة الفواتير </button>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let invoices = []; // متغير لتخزين الفواتير
    let totalQuantity = 0; // متغير لتخزين إجمالي القطع
    let totalAmount = 0; // متغير لتخزين إجمالي المبالغ
    let lastPayer = ""; // متغير لتخزين آخر بائع تم استخدامه

    function calculateTotal() {
        const price = parseFloat(document.getElementById('price').value) || 0;
        const quantity = parseFloat(document.getElementById('availableQuantity').value) || 0;
        const amountDiscount = parseFloat(document.getElementById('amountDiscount').value) || 0;
        const percentageDiscount = parseFloat(document.getElementById('percentageDiscount').value) || 0;

        const totalBeforeDiscount = price * quantity;
        const totalAmountDiscount = amountDiscount * quantity;
        const totalPercentageDiscount = totalBeforeDiscount * (percentageDiscount / 100);

        const total = totalBeforeDiscount - totalAmountDiscount - totalPercentageDiscount;
        document.getElementById('total').value = total.toFixed(4);

        const discountedPrice = price - amountDiscount - (price * (percentageDiscount / 100));
        document.getElementById('afdi').value = discountedPrice.toFixed(2);

        // Ensure available quantity check
        const inputQuantity = parseFloat(document.getElementById('availableQuantity').value);
        if (inputQuantity > quantity) {
            document.getElementById('availableQuantity').value = quantity;
            alert('الكمية المطلوبة تجاوزت الكمية المتاحة.');
        }
    }

    function fetchDataByCode(code) {
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
        fetch(`/api/models/${code}`, {
            headers: {
                'X-CSRF-TOKEN': token,
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data) {
                document.getElementById('type').value = data.name;
                document.getElementById('price').value = data.price;
                document.getElementById('much').value = data.much;
                calculateTotal();
            } else {
                document.getElementById('type').value = '';
                document.getElementById('price').value = '';
                document.getElementById('much').value = '';
                document.getElementById('total').value = '';
                document.getElementById('afdi').value = '';
            }
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
    }

    document.getElementById('code').addEventListener('input', function() {
        fetchDataByCode(this.value);
    });

    document.querySelectorAll('.price, .availableQuantity, .amountDiscount, .percentageDiscount').forEach(function(element) {
        element.addEventListener('input', calculateTotal);
    });

    document.querySelector('.add-invoice').addEventListener('click', function() {
    const type = document.getElementById('type').value;
    const much = document.getElementById('much').value;
    const availableQuantity = parseFloat(document.getElementById('availableQuantity').value);
    const price = parseFloat(document.getElementById('price').value);
    const code = document.getElementById('code').value;
    const amountDiscount = parseFloat(document.getElementById('amountDiscount').value) || 0;
    const percentageDiscount = parseFloat(document.getElementById('percentageDiscount').value) || 0;
    const pay = document.getElementById('pay').value;
    const payerSelect = document.getElementById('payer');
    const reference_id = document.getElementById('refere').value;
    const payerId = payerSelect.options[payerSelect.selectedIndex].getAttribute('data-id');       
    const afdi = parseFloat(document.getElementById('afdi').value) || 0;
    const total = parseFloat(document.getElementById('total').value) || 0;
    const payer = document.getElementById('payer').value || lastPayer; // استخدام آخر بائع إذا كان متاحاً
    const date = document.getElementById('date').value || null; // السماح بأن يكون التاريخ فارغًا


    if (type && availableQuantity && price && pay && payer) { // قم بإزالة التحقق من التاريخ هنا
        if (availableQuantity > parseFloat(much)) {
            alert('الكمية المطلوبة تجاوزت الكمية المتاحة.');
            return;
        }

        const invoice = {
            type: type,
            availableQuantity: availableQuantity,
            price: price,
            code: code,
            amountDiscount: amountDiscount,
            percentageDiscount: percentageDiscount,
            afdi: afdi,
            total: total,
            payer: payer,
            pay: pay,
            date: date, // السماح بأن يكون التاريخ فارغًا
            payerId: payerId,
            reference_id:reference_id,

        };

        const remainingQuantity = parseFloat(much) - availableQuantity;
        document.getElementById('much').value = remainingQuantity;

        invoices.push(invoice);
        appendInvoiceToTable(invoice);

        // Update totals
        totalQuantity += availableQuantity;
        totalAmount += total;
        updateTotals();

        lastPayer = payer;
        const payerValue = document.getElementById('payer').value;
        document.getElementById('invoiceForm').reset();
        document.getElementById('payer').value = payerValue;
    } else {
        alert('الرجاء ملء جميع الحقول المطلوبة.');
    }
});


    function appendInvoiceToTable(invoice) {
        const tableBody = document.getElementById('invoicesTable').querySelector('tbody');
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${invoice.type}</td>
            <td>${invoice.availableQuantity}</td>
            <td>${invoice.price}</td>
            <td>${invoice.code}</td>
            <td>${invoice.amountDiscount}</td>
            <td>${invoice.percentageDiscount}</td>
            <td>${invoice.pay}</td>
            <td>${invoice.afdi}</td>
            <td>${invoice.total}</td>
        
        `;
        tableBody.appendChild(row);
    }

    function updateTotals() {
        document.getElementById('totalQuantity').textContent = totalQuantity;
        document.getElementById('totalAmount').textContent = totalAmount.toFixed(2);
    }

    document.getElementById('saveInvoices').addEventListener('click', function() {
        if (invoices.length > 0) {
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch('{{ route("insertsellrecite") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({ invoices: invoices })
            })
            .then(response => response.json())
            .then(data => {
                alert('تم حفظ الفواتير بنجاح!');
                invoices = [];
                totalQuantity = 0;
                totalAmount = 0;
                updateTotals(); // تأكد من تحديث الإجماليات
                document.getElementById('invoicesTable').querySelector('tbody').innerHTML = '';
                window.location.reload();
            })
            .catch((error) => {
                console.error('Error:', error);
                alert('حدث خطأ أثناء حفظ الفواتير. الرجاء المحاولة مرة أخرى لاحقاً. تفاصيل الخطأ: ' + error);
            });
        } else {
            alert('لا توجد فواتير لحفظها.');
        }
    });

    document.getElementById('printInvoices').addEventListener('click', function() {
    if (invoices.length > 0) {
        const buyer = document.getElementById('payer').value; 
        
        const reference_id = document.getElementById('refere').value;
        
        // الحصول على اسم المشتري

        // الحصول على تاريخ اليوم بصيغة (اليوم/الشهر/السنة)
        const today = new Date();
        const day = today.getDate().toString().padStart(2, '0');
        const month = (today.getMonth() + 1).toString().padStart(2, '0'); // يتم إضافة 1 لأن الأشهر تبدأ من 0
        const year = today.getFullYear();
        const formattedDate = `${day}/${month}/${year}`;

        let printContent = `
            <div>
                <p style="text-align:center; font-size:40px; margin-top:-15px">مصنع الحكمدار</p>
                <p style="text-align:right; font-size:15px; margin-top:-10px;">  تحريرا في يوم :: ${formattedDate}</p>
                <p style="margin-top:-50px; font-size:35px; text-align:left;">${buyer}</p>
                <p style="margin-top:50px; font-size:35px; text-align:center;">${reference_id} رقم الفاتورة</p>
                <p> ريمون ::01070284120</p>
                <p> طلعت :: 01080784490</p>
                <p style="margin-left:500px;margin-top:-50px"> ت الارضي :: 0233559777</p>
            </div>
            <table border="1">
                <thead>
                    <tr>
                        <th style="width:120px;">الصنف</th>
                        <th>الكمية</th>
                        <th>السعر</th>
                        <th>رقم الكود</th>
                        <th style="width:2px;">الخصم الثابت</th>
                        <th style="width:2px;">الخصم بالنسبة المئوية</th>
                        <th style="width:3px;">المبلغ بعد الخصم</th>
                        <th>الإجمالي</th>
               
                    </tr>
                </thead>
                <tbody>
        `;

        invoices.forEach(function(invoice) {
            printContent += `<tr>
                <td>${invoice.type}</td>
                <td>${invoice.availableQuantity}</td>
                <td>${invoice.price}</td>
                <td>${invoice.code}</td>
                <td>${invoice.amountDiscount}</td>
                <td>${invoice.percentageDiscount}</td>
                <td>${invoice.afdi}</td>
                <td>${invoice.total}</td>
        
            </tr>`;
        });

        // Add totals to print content
        printContent += `<tfoot>
            <tr>
                <td colspan="7"> إجمالي عدد القطع:</td>
                <td colspan="4">${totalQuantity}</td>
            </tr>
            <tr>
                <td colspan="7">إجمالي الفاتورة:</td>
                <td colspan="4">${totalAmount.toFixed(2)}</td>
            </tr>
        </tfoot>`;

        printContent += '</tbody></table>';
        printContent += `
    <div style="margin-top: 30px;">
        <p style="font-size: 20px; text-align: left;">توقيع العميل:</p>
        <div style="border-top: 1px solid black; width: 200px; margin-top: 10px;">
            <p style="text-align: center; margin-top: 5px;">توقيع العميل</p>
        </div>
    </div>
`;
        const printWindow = window.open('', '', 'width=800,height=600');
        printWindow.document.open();
        printWindow.document.write(`
            <html>
                <head>
                    <style>
                        table {
                            width: 100%;
                            border-collapse: collapse;
                        }
                        table, th, td {
                            border: 1px solid black;
                            text-align: center;
                            font-size: 14px;
                            height: 2px;
                        }
                    </style>
                </head>
                <body>
                    ${printContent}
                </body>
            </html>
        `);
        printWindow.document.close();
        printWindow.print();
    } else {
        alert('لا توجد فواتير للطباعة.');
    }
});

});
</script>

</body>
</html>
