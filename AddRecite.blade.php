<!-- HTML و JavaScript -->
<link rel="stylesheet" href="{{ asset('css/buys/AddREcite.css') }}">
   <form id="purchase-form" action="{{route("buyinsert")}}" method="post">
   " @csrf
    <h1>انشاء فاتورة مشتريات</h1>
    نوع الشراء::<input type="text" id="name" name="name" placeholder="ادخل الاسم"><br><br>
    السعر::<input type="text" name="price" id="price" placeholder="ادخل السعر"><br><br>
   البائع <select name="buyer" id="">
        @foreach($sellers as $seller)
         <option value="{{$seller->name}}">{{$seller->name}}</option>
        @endforeach
    </select><br><br>
    كود المنتج<input type="text" name="code" id="code" placeholder="ادخل الكود"><br><br>
    التاريخ<input type="date" name="date" id="date" placeholder="ادخل الكود"><br><br>
    الاجمالي <input type="number" name="total" id="total"><br><br>
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
        @foreach($Recites as $Recite)  
        <tr>
            <td>{{$Recite->buyer}}</td>
            <td>{{$Recite->name}}<hr></td>
            <td>{{$Recite->price}}</td>
            <td>{{$Recite->num}}</td>
            <td>{{$Recite->total}}</td>
            <td>{{$Recite->what}}</td>
            <td>{{$Recite->code}}</td>
            <td>{{$Recite->date}}</td>
            <td><a href="{{route("editbuy",$Recite->id)}}">تعديل</a></td>
            <td><a href="{{route("deletesellerde",$Recite->id)}}">حذف</a></td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- تضمين النصوص النصية -->
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
