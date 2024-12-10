
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

<h1 id="main">تسجيل غياب</h1>

<form action="{{route('insert_add')}}" method="post">

@csrf


 اسم العامل 
 
 <select name="name" id="">


 @foreach($all as $alll)

<option value="{{$alll->name}}">{{$alll->name}}</option>

@endforeach
 </select>
التاريخ <input type="date" name="date">

<input type="submit" class="value">

</form>