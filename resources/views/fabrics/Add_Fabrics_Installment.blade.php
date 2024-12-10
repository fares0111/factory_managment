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
        margin-top: 100px;
    }
    label {
        font-weight: bold;
    }
    select,
    input[type="number"],
    input[type="date"],
    input[type="text"],
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

@extends($layout)   
    
<h1>دفعه عميل قماش</h1>

<form action="{{ route('insert_Fabrics_Installment') }}" method="post">
    @csrf

    <label for="Fabric_Clint">المورد</label>
    <select name="Fabric_Clint" id="Fabric_Clint" onchange="setClintId()">
        <option value="">اختار المورد</option>
        @foreach($Clints as $Clint)
            <option value="{{ $Clint->name }}" data-id="{{ $Clint->id }}">{{ $Clint->name }}</option>
        @endforeach
    </select>

    <!-- إضافة الحقل المخفي لإرسال الـ ID -->
    <input type="hidden" name="Fabric_Clint_Id" id="ClintId">

    <label for="Amount">المبلغ</label>
    <input type="number" name="Amount" id="Amount">

    <label for="Date">التاريخ</label>
    <input type="date" name="Date" id="Date">

    <label for="Comments">الملاحظات</label>
    <input type="text" name="Comments" id="Comments">

    <button type="submit">تسجيل دفعة</button>
</form>

<script>
    function setClintId() {
        var select = document.getElementById("Fabric_Clint");
        var selectedOption = select.options[select.selectedIndex];
        var clintId = selectedOption.getAttribute("data-id");
        document.getElementById("ClintId").value = clintId;
    }
</script>
