<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000; /* خلفية سوداء */
            padding: 20px;
            color: #fff;
        }

        form {
            background-color: #fff; /* خلفية بيضاء للنموذج */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            margin: auto;
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* عدد الأعمدة */
            gap: 20px; /* المسافة بين الحقول */
        }

        label {
            font-weight: bold;
            color: #000; /* لون النص أسود */
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: #fff;
        }

        select {
            cursor: pointer;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            grid-column: span 2; /* عرض الزر على عمودين */
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .full-width {
            grid-column: span 2; /* جعل الحقل يأخذ عرض العمودين */
        }
    </style>
</head>
<body>
    @extends($layout)   
    
<form action="{{route("doeditsell",$Edit_Sales_Invoice->id)}}" method="post">
@csrf

    <div>
        <label for="type">الصنف</label>
        <input type="text" name="type" value="{{$Edit_Sales_Invoice->type}}" readonly>
    </div>
    <div>
        <label for="much">الكمية المتاحة</label>
        <input type="text" name="much" id="much" value="{{$Available_Quantity_in_Stock->much + $Edit_Sales_Invoice->much}}" readonly>
    </div>
    <div>
        <label for="availableQuantity">الكمية</label>
        <input type="text" name="availableQuantity" id="availableQuantity" value="{{$Edit_Sales_Invoice->much}}">
    </div>
    <div>
        <label for="price">السعر</label>
        <input type="text" name="price" id="price" value="{{$Edit_Sales_Invoice->price}}">
    </div>
    <div>
        <label for="code">رقم الموديل</label>
        <input type="text" name="code" id="code" value="{{$Edit_Sales_Invoice->code}}">
    </div>
    <div>
        <label for="amountDiscount">الخصم الثابت</label>
        <input type="text" name="amountDiscount" id="amountDiscount" value="{{$Edit_Sales_Invoice->dis}}">
    </div>
    <div>
        <label for="percentageDiscount">الخصم بالنسبة المئوية</label>
        <input type="text" name="percentageDiscount" id="percentageDiscount" value="{{$Edit_Sales_Invoice->presdis}}">
    </div>
    <div>
        <label for="pay">طريقة البيع</label>
        <select name="pay" id="">
        @foreach($Payment_ways as $Payment_way)
        <option value="{{$Payment_way->name}}">{{$Payment_way->name}}</option>
        @endforeach 
        </select>
    </div>
    <div class="full-width">
        <label for="afdi">المبلغ بعد الخصم</label>
        <input type="text" name="afdi" id="afdi" readonly value="{{$Edit_Sales_Invoice->afterdis}}">
    </div>
    <div class="full-width">
        <label for="total">الإجمالي</label>
        <input type="text" name="total" id="total" readonly value="{{$Edit_Sales_Invoice->total}}">
    </div>
    <div class="full-width">
        <label for="payer">البائع</label>
        <input type="text" name="payer" value="{{$Edit_Sales_Invoice->buyer}}" readonly>
    </div>

    <button type="submit">انشاء فاتورة المبيعات</button>
</form>
</body>
</html>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // حساب الإجمالي عند تغيير قيمة السعر بعد الخصم أو الكمية
        document.querySelectorAll('#price, #availableQuantity, #amountDiscount, #percentageDiscount').forEach(function(element) {
            element.addEventListener('input', function() {
                var price = parseFloat(document.getElementById('price').value) || 0;
                var quantity = parseFloat(document.getElementById('availableQuantity').value) || 0;
                var amountDiscount = parseFloat(document.getElementById('amountDiscount').value) || 0;
                var percentageDiscount = parseFloat(document.getElementById('percentageDiscount').value) || 0;
    
                var t = (price * quantity);
                var dis = (quantity * amountDiscount);
                var disf = (t * percentageDiscount) / 100;
    
                var total = t - dis - disf;
                document.getElementById('total').value = total.toFixed(4);
    
                // تحديث المبلغ بعد الدفع بعد تطبيق الخصم
                var discountedPrice = price - amountDiscount - (price * percentageDiscount / 100);
                document.getElementById('afdi').value = discountedPrice.toFixed(2);
            });
        });
    });
    </script>
    
    <script>
        // تعبئة الحقول بالبيانات المسترجعة عند تغيير الاختيار
        document.getElementById('type').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var price = selectedOption.getAttribute('data-price');
            var quantity = selectedOption.getAttribute('data-quantity');
            var code = selectedOption.getAttribute('data-code');
            
            // تعبئة الحقول بالبيانات المسترجعة
            document.getElementById('price').value = price;
            document.getElementById('much').value = quantity;
            document.getElementById('code').value = code;
        });
    </script>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // تحقق من عدم تجاوز الكمية المتاحة
        document.getElementById('availableQuantity').addEventListener('input', function() {
            var availableQuantity = parseFloat(document.getElementById('much').value) || 0;
            var enteredQuantity = parseFloat(this.value) || 0;
    
            if (enteredQuantity > availableQuantity) {
                alert('لا يمكنك تحديد كمية أكبر من الكمية المتاحة (' + availableQuantity + ')');
                this.value = availableQuantity; // إعادة القيمة إلى القيمة المتاحة
            }
        });
    });
    </script>
    
    <script>
        document.querySelector('form').addEventListener('submit', function(event) {
            var availableQuantityInput = document.getElementById('availableQuantity');
            var availableQuantity = parseInt(availableQuantityInput.value);
            
            // التحقق من أن الكمية أكبر من 0
            if (availableQuantity < 1) {
                event.preventDefault(); // منع إرسال النموذج
                alert('الرجاء إدخال كمية علي الاقل 1');
            }
        });
    </script>