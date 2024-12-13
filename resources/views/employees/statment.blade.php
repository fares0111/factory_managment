
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

<h1 id="main">كشف حساب عامل</h1>


<form action="{{route('search_about_statment')}}" method="post">

@csrf

<select name="id" id="">
<option value="">اختار موظف</option>
@foreach($all as $all_names)
<option value="{{$all_names->id}}">{{$all_names->name}}</option>
@endforeach

</select>

<input class="value" type="submit">

</form>

 