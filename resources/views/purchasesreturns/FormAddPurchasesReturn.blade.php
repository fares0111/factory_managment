<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نموذج إرجاع المبيعات</title>
    <style>
        body {
            background-color: black;
            color: white;
            font-size: 18px;
            font-family: Arial, sans-serif;
        }
        form {
            max-width: 500px;
        
            margin: auto;
            margin-top:-130px;
            padding: 20px;
            background-color: #333;
            border-radius: 10px;
        }
        input[type="text"],
        input[type="number"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            font-size: 18px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #444;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #555;
        }

        h1{
            color:white;
            margin-top:150px;
            margin-left:800px;
        }
    </style>
</head>
<body>
    @extends($layout)   
    
  <h1 style="text-align: right;">مرتجعات مشتريات</h1>
    <form action="{{route('Insert_Purcases_return')}}" method="post">

        @csrf
      
        <label for="TheSeller">البائع</label>
        <select name="TheSeller" id="TheSeller" onchange="setSellerId()">
            <option value="">اختيار المورد</option>
            @foreach($All_Sellers as $Seller)
                <option value="{{$Seller->name}}" data-id="{{$Seller->id}}">{{$Seller->name}}</option>
            @endforeach
        </select><br><br>

        <!-- حقل مخفي للاحتفاظ بـ ID البائع -->
        <input type="hidden" name="Suppliers_id" id="TheSellerId">

        <label for="TheType">كود المنتج</label>
        <input type="text" name="The_Code">

        <label for="Much_Of_Return">الكمية</label>
        <input type="number" name="Much_Of_Return" id="Much_Of_Return"><br>

        <label for="Date_Of_Return">التاريخ</label>
        <input type="date" name="Date_Of_Return" id="Date_Of_Return"><br>

        <input type="submit" value="إرسال">
    </form>

    <script>
        function setSellerId() {
            var select = document.getElementById("TheSeller");
            var selectedOption = select.options[select.selectedIndex];
            var sellerId = selectedOption.getAttribute("data-id");
            document.getElementById("TheSellerId").value = sellerId;
        }
    </script>
</body>
</html>
