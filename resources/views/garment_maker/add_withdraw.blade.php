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

#main{

margin-top:100px;
color:red;


}


</style>


@extends($layout)   

<DIv class="do">


</DIv>


    <h1 id="main">اضاف سحب صنايعي</h1>

<form action="{{Route('insert_withdraw')}}" method="post">



@csrf


اسم الصنايعي{{" "}}<select name="name">


@foreach($Workers as $Worker)

<option value="{{$Worker->name}}"> {{$Worker->name}}</option>

@endforeach

</select><br><br>


المبلغ<input type="number" name="amont"><br><br>

التاريخ<input type="date" name="date"><br><br>

الملاحظات <input type="text" name="comments"><br><br>

<input class="value" type="submit" value="اضافة">
</form>