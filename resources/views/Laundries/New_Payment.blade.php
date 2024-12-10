@extends($layout)   
    
<h1>تسديد فاتورة مغسلة</h1>

<link rel="stylesheet" href="{{ asset('css/washes/withrecite.css') }}">

<form action="{{route("withrecite")}}" method="post" class="payment-form">
    @csrf

    <label for="name">اسم المغسلة</label>
    <select name="name" id="name" onchange="setLaundererId()">
        <option value="">اختار مغسلة</option>
        @foreach($Launderer_Payments as $Launderer_Payment)
       
            <option value="{{$Launderer_Payment->name}}" data-id="{{$Launderer_Payment->id}}">{{$Launderer_Payment->name}}</option>
        @endforeach
    </select><br><br>

    <!-- حقل مخفي للاحتفاظ بـ ID المغسلة -->
    <input type="hidden" name="Launderer_Id" id="laundererId">

    <label for="price">المبلغ</label>
    <input type="number" name="price" id="price"><br><br>

    <label for="date">التاريخ</label>
    <input type="date" name="date" id="date"><br><br>

    <input type="submit" value="تسديد الفاتورة">
</form>

<script>
    function setLaundererId() {
        var select = document.getElementById("name");
        var selectedOption = select.options[select.selectedIndex];
        var laundererId = selectedOption.getAttribute("data-id");
        document.getElementById("laundererId").value = laundererId;
    }
</script>
