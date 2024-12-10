<style>

body{

background-color:blue;

color:white;


}

input{

padding:12px;
font-size:20px;

}

select{

padding:12px;
font-size:20px;  
}


form{

margin:100px;

font-size:30px
}
.value{

font-size:25px;

}

.h12{

color:red;
font-size:50px;
margin-left:500px;

}
</style>


@extends($layout)   

<DIv class="do">

@section('con');

</DIv>

<p class="h12">تعديل ايراد</p>

<form action="{{route('doedit_with_daily',$edit->id)}}" method="post">

@csrf

الوصف <input type="text" name="des" value="{{$edit->des}}"><br><br>


السبب <input type="text" name="reason" value="{{$edit->reason}}"><br><br>


المبلغ<input type="number" name="amont" value="{{$edit->amont}}"><br><br>



المسئول <select name="oper" id="">

<option value="روماني"> روماني</option>
<option value="طلعت">طلعت</option>
</select><br><br>

<input type="submit">
</form>