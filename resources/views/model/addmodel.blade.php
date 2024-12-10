
<style>
        /* تخصيص العناصر */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        form {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
  @extends($layout)   
    

<form action="{{route("insertmodel")}}" method="post">
 @csrf

<label for="type">الصنف</label>
<input type="text" name="type" id="type"><br><br>
<label for="much">الكمية</label>
<input type="number" name="much" id="much"><br><br>
<label for="price">سعر البيع</label>
<input type="number" name="price" id="price"><br><br>

<label for="code">تكلفة التصنيع  </label>
<input type="text" name="Prudec_cost" id="Prudec_cost"><br><br>

<label for="code">رقم الموديل</label>
<input type="text" name="code" id="code"><br><br>



<input type="submit">

</form>