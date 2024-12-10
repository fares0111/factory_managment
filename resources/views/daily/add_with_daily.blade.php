<style>

body{

background-color:blue;

color:white;


}


select{

padding:12px;
font-size:20px;  
}

input{

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

<p class="h12">اضافة مصروف</p>
<form action="{{route('insert_with_daily')}}" method="post">

@csrf

الوصف <input type="text" name="des"><br><br>


السبب <input type="text" name="reason"><br><br>


المبلغ<input type="number" name="amont"><br><br>

التاريخ<input type="date" name="date"><br><br>


<option value="روماني"> روماني</option>
<option value="طلعت">طلعت</option>
</select><br><br>

<input type="submit">
</form>