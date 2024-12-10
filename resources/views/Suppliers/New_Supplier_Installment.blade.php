<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نموذج تسجيل دفعة</title>
    <style>
        /* تخصيص العناصر */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        form {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        select,
        input[type="number"],
        input[type="date"],
        button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    @extends($layout)   
    
<form action="{{ route('insertdeseller') }}" method="post">
    @csrf

    <label for="seller">المشتري:</label>
    <select name="seller_name" id="seller" onchange="setSellerId()">
        <option value="">اختر المورد</option>
        @foreach($Suppliers as $Supllier)
            <option value="{{ $Supllier->name }}" data-id="{{ $Supllier->id }}">{{ $Supllier->name }}</option>
        @endforeach
    </select>
    <!-- حقل مخفي لحمل ID المورد -->
    <input type="hidden" name="supplier_id" id="sellerId">

    <label for="way">طريقة الدفع:</label>
    <select name="way" id="way">
        @foreach($Payment_Ways as $Payment_Way)
            <option value="{{ $Payment_Way->name }}">{{ $Payment_Way->name }}</option>
        @endforeach
    </select>

    <label for="amont">المبلغ:</label>
    <input type="number" name="amont" id="amont">

    <label for="date">التاريخ:</label>
    <input type="date" name="date" id="date">

    <button type="submit">تسجيل دفعة</button>
</form>

<script>
    // تحويل المصفوفة الخاصة بالموردين إلى JSON في JavaScript
    var suppliers = @json($Suppliers);

    function setSellerId() {
        // الحصول على المورد المختار من القائمة المنسدلة
        var sellerSelect = document.getElementById("seller");
        var selectedOption = sellerSelect.options[sellerSelect.selectedIndex];
        
        // الحصول على ID المورد من خاصية data-id
        var selectedSellerId = selectedOption.getAttribute('data-id');
        
        // تعيين ID المورد في الحقل المخفي
        document.getElementById("sellerId").value = selectedSellerId;
    }
</script>

</body>
</html>
