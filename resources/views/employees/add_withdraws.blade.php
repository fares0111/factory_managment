

<style>

body{

background-color:blue;

color:white;


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
select{

padding:12px;
font-size:20px;  
}

#main{

margin-top:100px;
color:red;


}

</style>


@extends($layout)   

<DIv class="do">

@section('con');

</DIv>

<h1 id="main">اضاف سحب عامل</h1>

<form action="{{route('insert_with_em')}}" method="post">

@csrf


 الاسم<select name="name">

@foreach($names as $name)

<option value="{{$name->name}}">{{$name->name}}</option>

@endforeach

 </select><br><br>
المبلغ <input type="text" name="amount"><br><br>


التاريخ 
<input type="date" name="date"><br><br>
<input class="value" type="submit" value="اضافة">

</form>