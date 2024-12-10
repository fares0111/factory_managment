

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


<h1 id="main">اضاف عامل</h1>
<form action="{{route('insert_em')}}" method="post">

@csrf


 الاسم<input type="text" name="name"><br><br>
الراتب <input type="number" name="salary"><br><br>
الوظيفة <input type="text" name="jop"><br><br>

التاريخ <input type="date" name="date"><br><br>
ساعات العمل <input type="number" name="hours"><br><br>


<input type="submit" value="اضافة">

</form>