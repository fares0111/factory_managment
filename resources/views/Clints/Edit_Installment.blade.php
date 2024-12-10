
<style>
    /* styles.css */

/* تخصيص العناصر */
form {
    width: 50%;
    margin: auto;
    margin-top:100px;
}

h1 {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
}

input[type="text"],
input[type="number"],
select,
button[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-image: url('data:image/svg+xml;utf8,<svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>');
    background-repeat: no-repeat;
    background-position-x: 95%;
    background-position-y: center;
}

button[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}

</style>


@extends($layout)   
    

<form action="{{route('doeditbuyswith',$Edit_Installment->id)}}" method="post">

@csrf

المشتري ::


<input type="text" name="buyer" value="{{$Edit_Installment->buyer}}" readonly><br>

طريقة الدفع :: 

<select name="way" id="">
    @foreach($Payment_Ways as $Payment_Way)

    <option value="{{$Payment_Way->name}}">{{$Payment_Way->name}}</option>
@endforeach
</select><br><br>

المبلغ :: <input type="number" name="amont" value="{{$Edit_Installment->amont}}"><br><br>

التايخ :: <input type="date" name="date" value="{{$Edit_Installment->date}}"><br><br>

<button type="submit"> تعديل دفعة</button>

</form>