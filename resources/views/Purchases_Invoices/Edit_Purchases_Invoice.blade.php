 
  @extends($layout)   
    
  
  <link rel="stylesheet" href="{{asset('css/buys/edit.css')}}">
<div class="form">
<form action="{{route("doeditbuy",$Edit_Purchases_Invoice->id)}}" method="post">

@csrf





نوع الشراء::<input type="text" id="name" name="name" placeholder="ادخل الاسم" value="{{$Edit_Purchases_Invoice->name}}"><br><br>
العدد::<input type="text" id="num" name="num" placeholder="ادخل العدد" value="{{$Edit_Purchases_Invoice->num}}"><br><br>
السعر::<input type="text" name="price" id="price" placeholder="ادخل السعر" value="{{$Edit_Purchases_Invoice->price}}"><br><br>


البائع ::<input type="text" name="buyer" value="{{$Edit_Purchases_Invoice->buyer}}" readonly><br><br>

كود المنتج<input type="text" name="code" id="code" placeholder="ادخل الكود" value="{{$Edit_Purchases_Invoice->code}}"><br><br>
التاريخ<input type="date" name="date" id="date" placeholder="ادخل التايخ" value="{{$Edit_Purchases_Invoice->date}}"><br><br>
الاجمالي <input type="number" name="total" id="total"><br><br>
<button type="submit">انشاء فاتورة</button><br>



</form>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // تحديد حقل السعر وحقل الكمية
    var priceInput = document.getElementById('price');
    var quantityInput = document.getElementById('num');
    var totalInput = document.getElementById('total');

    // استماع لتغييرات في حقلي السعر والكمية
    priceInput.addEventListener('input', calculateTotal);
    quantityInput.addEventListener('input', calculateTotal);

    // دالة لحساب الإجمالي
    function calculateTotal() {
        // جلب قيمة السعر والكمية
        var price = parseFloat(priceInput.value) || 0;
        var quantity = parseFloat(quantityInput.value) || 0;

        // حساب الإجمالي
        var total = price * quantity;

        // عرض الإجمالي في حقل الإجمالي
        totalInput.value = total.toFixed(2);
    }
});
</script>


<br>

