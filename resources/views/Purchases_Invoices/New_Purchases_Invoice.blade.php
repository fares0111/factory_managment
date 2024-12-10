<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>انشاء فاتورة مشتريات</title>
    <style>
        /* تنسيق عام */
        body {
            font-family: 'Droid Arabic Naskh', 'Amiri', Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }

        /* تنسيق النموذج */
        #purchase-form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }

        #purchase-form h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        #purchase-form input[type="text"],
        #purchase-form input[type="number"],
        #purchase-form select,
        #purchase-form button {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        #purchase-form button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        #purchase-form button:hover {
            background-color: #45a049;
        }

        /* تنسيق الجدول */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th, .table td {
            padding: 8px;
            text-align: center;
            border: 1px solid #ddd;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .table a {
            text-decoration: none;
            color: #007bff;
        }

        .table a:hover {
            text-decoration: underline;
            color: #0056b3;
        }

        /* تنسيق خاص بالمربعات المنسدلة */
        #buyer {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        #searchBuyerInput {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
    </style>
</head>
<body>

    @extends($layout)   
    
<form id="purchase-form" action="{{ route('buyinsert') }}" method="post">
    @csrf
    <h1>انشاء فاتورة مشتريات</h1>
    نوع الشراء::<input type="text" id="name" name="name" placeholder="ادخل الاسم"><br><br>
    العدد::<input type="text" id="num" name="num" placeholder="ادخل العدد"><br><br>
    السعر::<input type="text" name="price" id="price" placeholder="ادخل السعر"><br><br>

    البائع::
    <select id="buyer" onclick="this.size=5" onblur="this.size=1;this.value=this.value;" onchange="setBuyerId()" name="buyer">
        <option value="">اختر مشتري</option>
        @foreach($Suppliers as $Supplier)
            <option value="{{ $Supplier->name }}" data-id="{{ $Supplier->id }}">{{ $Supplier->name }}</option>
        @endforeach
    </select>
    <input type="text" id="searchBuyerInput" placeholder="ابحث عن البائع..." onkeyup="filterBuyers()">
    <!-- الحقل المخفي لحمل ID البائع -->
    <input type="hidden" name="Supplier_id" id="buyerId">

    <br><br>
    كود المنتج::<input type="text" name="code" id="code" placeholder="ادخل الكود"><br><br>
    
    طريقة الدفع<select name="Payment_Ways" id="">

@foreach($Payments_Ways as $Payments_Way)

<option value="{{$Payments_Way->name}}">{{$Payments_Way->name}}</option>

@endforeach
    </select>
    التاريخ::<input type="date" name="date" id="date" placeholder="ادخل الكود"><br><br>
    الاجمالي::<input type="number" name="total" id="total"><br><br>
    <button type="submit">انشاء فاتورة</button><br>
</form>

<table class="table">
    <thead>
        <tr>
            <th scope="col">المورد</th>
            <th scope="col">نوع الشراء</th>
            <th scope="col">المبلغ</th>
            <th scope="col">العدد</th>
            <th scope="col">الاجمالي</th>
            <th scope="col">الصنف</th>
            <th scope="col">الكود</th>
            <th scope="col">التاريخ</th>
        </tr>
    </thead>
    <tbody>
        @foreach($Purchases_Invoices as $Purchases_Invoice)  
        <tr>
            <td>{{ $Purchases_Invoice->buyer }}</td>
            <td>{{ $Purchases_Invoice->name }}</td>
            <td>{{ $Purchases_Invoice->price }}</td>
            <td>{{ $Purchases_Invoice->num }}</td>
            <td>{{ $Purchases_Invoice->total }}</td>
            <td>{{ $Purchases_Invoice->what }}</td>
            <td>{{ $Purchases_Invoice->code }}</td>
            <td>{{ $Purchases_Invoice->date }}</td>
            <td><a href="{{ route('editbuy', $Purchases_Invoice->id) }}">تعديل</a></td>
            <td><a href="{{ route('deletesellerde', $Purchases_Invoice->id) }}">حذف</a></td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
// دالة لحساب الإجمالي
document.addEventListener('DOMContentLoaded', function() {
    var priceInput = document.getElementById('price');
    var quantityInput = document.getElementById('num');
    var totalInput = document.getElementById('total');

    priceInput.addEventListener('input', calculateTotal);
    quantityInput.addEventListener('input', calculateTotal);

    function calculateTotal() {
        var price = parseFloat(priceInput.value) || 0;
        var quantity = parseFloat(quantityInput.value) || 0;
        var total = price * quantity;
        totalInput.value = total.toFixed(2);
    }
});

// دالة لتحديد ID البائع
function setBuyerId() {
    var buyerSelect = document.getElementById('buyer');
    var selectedOption = buyerSelect.options[buyerSelect.selectedIndex];
    var buyerId = selectedOption.getAttribute('data-id');
    document.getElementById('buyerId').value = buyerId;
}

// دالة لتصفية خيارات البائع
function filterBuyers() {
    var input, filter, select, options, option, i, txtValue;
    input = document.getElementById('searchBuyerInput');
    filter = input.value.toUpperCase();
    select = document.getElementById('buyer');
    options = select.getElementsByTagName('option');

    select.size = 5;

    for (i = 0; i < options.length; i++) {
        option = options[i];
        txtValue = option.textContent || option.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            option.style.display = "";
        } else {
            option.style.display = "none";
        }
    }
}
</script>

</body>
</html>
