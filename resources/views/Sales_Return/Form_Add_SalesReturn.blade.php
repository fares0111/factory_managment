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
            margin-top:100px;
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
    </style>
</head>
<body>
    @extends($layout)   
    
    <form action="{{route('insert_sales_return')}}" method="post">
        @csrf
        <label for="TheSaller">المشتري</label>
        <select name="TheSaller" id="TheSaller" onchange="setClientId()">
            <option value="">اختر المشتري</option>
            @foreach($All_Clints as $Clint)
                <option value="{{$Clint->name}}">{{$Clint->name}}</option>
            @endforeach
        </select>
        <!-- حقل مخفي لحمل ID العميل -->
        <input type="hidden" name="client_id" id="clientId">

        <label for="All_Codes">كود الموديل</label>
        <input type="text" name="The_Code">

        <label for="Much_Of_Return">الكمية</label>
        <input type="number" name="Much_Of_Return" id="Much_Of_Return"><br>

        <label for="Date_Of_Return">التاريخ</label>
        <input type="date" name="Date_Of_Return" id="Date_Of_Return"><br>

        <input type="submit" value="إرسال">
    </form>

    <script>
        // تحويل المصفوفة الخاصة بالعملاء إلى JSON في JavaScript
        var clients = @json($All_Clints);

        function setClientId() {
            // الحصول على العميل المختار من القائمة المنسدلة
            var clientSelect = document.getElementById("TheSaller");
            var selectedClientName = clientSelect.value;

            // البحث عن العميل الذي يحمل نفس الاسم
            var selectedClient = clients.find(function(client) {
                return client.name === selectedClientName;
            });

            // تعيين ID العميل في الحقل المخفي
            if (selectedClient) {
                document.getElementById("clientId").value = selectedClient.id;
            } else {
                document.getElementById("clientId").value = "";
            }
        }
    </script>
</body>
</html>
