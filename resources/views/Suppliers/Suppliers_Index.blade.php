
<style>

    /* تخصيص الروابط */
a {
    display: inline-block;
    padding: 10px 20px;
    margin: 10px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s;
}

a:hover {
    background-color: #0056b3;
}

</style>
@extends($layout)   
    
<a href="{{route("addseller")}}">اضافة بائع</a>
<a href="{{route("showdeseller")}}">اضافة تسديد</a>

<a href="{{route("showdepositseller")}}">عرض التسديدات</a>
<a href="{{route("sellers")}}">كشف حساب بائع</a>
