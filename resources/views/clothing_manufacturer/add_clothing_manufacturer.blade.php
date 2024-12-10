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

#main{

margin-top:100px;
color:red;


}

</style>


@extends($layout)   



<form action="{{Route('insert_bro')}}" method="post">

@csrf


اسم الصنايعي<input type="text" name="name"><br><br>

مبلغ الكاش <input type="number" name="credit"><br><br>

<input class="value" type="submit" value="اضافة">

</form>