<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نموذج تسجيل الفاتورة</title>
    <link rel="stylesheet" href="{{ asset('css/washes/Addrecite.css') }}"> <!-- تضمين ملف الستايل -->
</head>
<body>
  @extends($layout)   
    
<div class="container">
    <p class="title"> تسجيل فاتورة مغسلة</p>
    <form action="{{ route("insertrecite") }}" method="post" class="recite-form">
        @csrf

        <div class="form-group">
            <label for="washer">المغسلة</label>
            <select name="washer" id="washer" class="form-control" onchange="updateWasherId()">
                <option value="">اختار مغسلة</option>
                @foreach($Launderers as $Launderer)
                    <option value="{{ $Launderer->id }}" data-name="{{ $Launderer->name }}">{{ $Launderer->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- إضافة الحقل المخفي لإرسال الـ ID -->
        <input type="hidden" name="Launderer_Id" id="washerId">

        <div class="form-group">
            <label for="much">العدد</label>
            <input type="text" name="much" id="much" class="form-control">
        </div>
        <div class="form-group">
            <label for="type">النوع</label>
            <input type="text" name="type" id="type" class="form-control">
        </div>
        <div class="form-group">
            <label for="prosses">المراحل</label>
            <input type="text" name="prosses" id="prosses" class="form-control">
        </div>

        <div class="form-group">
            <label for="price">السعر</label>
            <input type="text" name="price" id="price" class="form-control">
        </div>

        <div class="form-group">
            <label for="comments">الملاحظات</label>
            <input type="text" name="comments" id="comments" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">تسجيل الفاتورة</button>
    </form>
</div>

<script>
    function updateWasherId() {
        var select = document.getElementById("washer");
        var selectedId = select.options[select.selectedIndex].value;
        document.getElementById("washerId").value = selectedId;
    }
</script>

</body>
</html>
