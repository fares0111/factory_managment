
<link rel="stylesheet" href="{{ asset('css/balance/edit.css') }}">
@extends($layout)   
    
<form action="{{ route("doeditsellrecite", $Edit_CashRegister_Deposits->id) }}" method="post" class="edit-form">
    @csrf
    <label for="name">اسم المودع</label>
    <input type="text" name="name" id="name" value="{{ $Edit_CashRegister_Deposits->name }}"><br><br>
    <label for="price">مبلغ الايداع</label>
    <input type="number" name="price" value="{{ $Edit_CashRegister_Deposits->amount }}"><br><br>
    <label for="date">التاريخ</label>
    <input type="date" name="date" id="date" value="{{ $Edit_CashRegister_Deposits->date }}"><br><br>
    <button type="submit" class="submit-button">تسجيل الايداع</button>
</form>
