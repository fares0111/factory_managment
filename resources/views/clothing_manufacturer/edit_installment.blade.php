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


</style>


@extends($layout)   

<DIv class="do">

@section('con');

</DIv>


<form action="{{Route('doedit_with_bro_worker',$edit->id)}}" method="post">

@csrf

اسم الصنايعي <input type="text" name="name" value="{{$edit->name}}"><br><br>

المبلغ<input type="number" name="amont" value="{{$edit->much}}"><br><br>

الملاحظات <input type="text" name="comments" value="{{$edit->comments}}"><br><br>

المسئول <select name="oper" id="">

<option value="روماني"> روماني</option>
<option value="طلعت">طلعت</option>
</select><br><br>

<input class="value" type="submit" value="اضافة">
</form>