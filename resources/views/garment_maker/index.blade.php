
<style>

body{

background-color:blue;

color:white;


}

input{

padding:12px;

}

select{

    padding:12px;
    font-size:20px;  
}

form{

margin:100px;

font-size:30px;
}
.value{

font-size:25px;

}

#main{

margin-top:100px;
color:red;


}

</style>

@extends($layout)   



<h1 id="main">كشف حساب صنايعي</h1>

<form action="{{route('search_report')}}" method="post">

@csrf
اسم الصنايعي{{" "}}<select name="name">


@foreach($Workers as $Worker)

<option value="{{$Worker->name}}"> {{$Worker->name}}</option>

@endforeach

</select><br><br>

<input class="value" type="submit" value="اضافة">

</form>