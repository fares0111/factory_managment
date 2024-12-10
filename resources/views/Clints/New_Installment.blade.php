<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نموذج تسجيل الدفعة</title>

    <link rel="stylesheet" href="{{ asset('css/buyer/showde.css') }}"><!-- تضمين ملف الستايل -->
</head>
<body>

    
    @extends($layout)   
    
<div class="container">
    <div class="main-content">
        <h1 class="title">نموذج تسجيل الدفعة</h1>
        <form action="{{ route("insertde") }}" method="post" class="payment-form">
            @csrf
            <div class="form-group">
                <label for="buyer">المشتري</label>
                <select name="buyer" id="buyer" class="form-control" onchange="setBuyerId()">
                    <option value="">اختر المشتري</option>
                    @foreach($Clints as $Clint)
                        <option value="{{ $Clint->name }}">{{ $Clint->name }}</option>
                    @endforeach
                </select>
                <!-- حقل مخفي لحمل ID المشتري -->
                <input type="hidden" name="buyer_id" id="buyerId" value="">
            </div>
            <div class="form-group">
                <label for="way">طريقة الدفع</label>
                <select name="way" id="way" class="form-control">
                    @foreach($Payments_Ways as $Payments_Way)
                        <option value="{{ $Payments_Way->name }}">{{ $Payments_Way->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="amont">المبلغ</label>
                <input type="number" name="amont" id="amont" class="form-control">
            </div>
            <div class="form-group">
                <label for="date">التاريخ</label>
                <input type="date" name="date" id="date" class="form-control">
            </div>
            <div class="form-group">
                <label for="commants">الملاحظات</label>
                <input type="text" name="commants" id="commants" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">تسجيل الدفعة</button>
        </form>
    </div>
</div>

<script>
    // تحويل المصفوفة الخاصة بالمشترين إلى JSON في JavaScript
    var buyers = @json($Clints);

    function setBuyerId() {
        // الحصول على المشتري المختار من القائمة المنسدلة
        var buyerSelect = document.getElementById("buyer");
        var selectedBuyerName = buyerSelect.value;

        // البحث عن البائع الذي يحمل نفس الاسم
        var selectedBuyer = buyers.find(function(buyer) {
            return buyer.name === selectedBuyerName;
        });

        // تعيين ID المشتري في الحقل المخفي
        if (selectedBuyer) {
            document.getElementById("buyerId").value = selectedBuyer.id;
        } else {
            document.getElementById("buyerId").value = "";
        }
    }
</script>

</body>
</html>
