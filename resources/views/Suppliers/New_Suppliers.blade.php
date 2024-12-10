
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

input[type="text"] {
    width: 100%;
    padding: 10px;
    margin-bottom: -15px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button[type="submit"] {
    width: 100%;
    padding: 10px;
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
    
<form action="{{route("insertseller")}}" method="post">

@csrf

الاسم <input type="text" name="name"><br><br>

رقم الهاتف  <input type="text" name="number"><br><br>

العنوان <input type="text" name="address"><br><br>

<button typee="submit">انشاء عميل</button>

</form>