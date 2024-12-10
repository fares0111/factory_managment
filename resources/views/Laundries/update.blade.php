
@extends($layout)   
    
<li><a href="{{route("addseller")}}">اضافة دفعة</a></li>
  <li><a href="{{route("showdeposit")}}">عرض الدفع</a></li>
  <li><a href="{{route("buyers")}}">كشف حساب عميل</a></li>




  sellerindex

<li><a href="{{route("showdeseller")}}">اضافة دفعة</a></li>
<li><a href="{{route("showdepositseller")}}">عرض الدفع</a></li>
<li><a href="{{route("sellers")}}">كشف حساب مورد</a></li>



<li><a href="{{route("addbalance")}}">اضافة رصيد</a></li>
<li><a href="{{route("balances")}}">عرض الايداعات</a></li>
<li><a href="{{route("with")}}">سحب</a></li>
<li><a href="{{route("balance/withdraws")}}">عرض المسحوبات</a></li>

<li class="banks"><a href="{{route("bank/index")}}">البنك</a></li>

<ul class="bank">
<li><a href="{{route("bank/index")}}">ملخص</a></li>
<li><a href="{{route("addcheak")}}">اضافة شيك</a></li>
<li><a href="{{route("cheaks")}}">عرض الشيكات</a></li>
<li><a href="{{url("withdraw")}}">سحب</a></li>
<li><a href="{{route("withdraws")}}">عرض المسحوبات</a></li>

</ul>


<a href="#">التفارير</a>
<ul class="l2">
    <li class="sellesrecite"><a href="{{route("sellindex")}}">المبيعات</a></li>
    <ul class="sellrecite">
        <li><a href="{{route("addsell")}}">انشاء فاتورة</a></li>
        <li><a href="{{route("sell/showrecite")}}">عرض الفواتير</a></li>
    </ul>
    <li class="buysss"><a href="{{route("sellindex")}}">المشتريات</a></li>
    <ul class="buyss">
        <li><a href="{{route("form")}}">عرض الفواتير</a></li>
        <li><a href="#">       </a></li>
    </ul>
</ul>

<a href="#">المغاسل</a>
<ul class="l3">
    <li class="washes"><a href="{{route("washes")}}">المغاسل</a></li>
    <ul class="wash">
        <li><a href="{{route("addwasher")}}">اضافة مغسلة</a></li>
        <li><a href="{{route("addrecite")}}">اضافة فاتورة</a></li>
        <li><a href="{{route("search")}}">عرض الفواتير</a></li>
        <li><a href="{{route("dowithdraw")}}">اضافة دفعة</a></li>
        <li><a href="{{route("buys/showeith")}}">عرض الدفع</a></li>
    </ul>
</ul>

