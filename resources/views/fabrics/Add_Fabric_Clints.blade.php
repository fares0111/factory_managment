
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

body {
    font-family: Arial, sans-serif;
   
    background-color: #f7f7f7;
 
}

.container {
    max-width: 800px;
    margin: 50px auto;
    margin-top:100px;
}

.title {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

.buyer-form {
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 20px;
}

.form-control {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
}

.btn:hover {
    background-color: #0056b3;
}

 </style>


</head>
<body>
    

    @extends($layout)   
    
<div class="container">
    <div class="main-content">
        <h1 class="title">نموذج إنشاء مورد (قماش)</h1>
        <form action="{{'insert_fabric_clint'}}" method="post" class="buyer-form">
            @csrf
            <div class="form-group">
                <label for="name">الاسم</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="address">العنوان</label>
                <input type="text" name="address" id="address" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">إنشاء عميل</button>
        </form>
    </div>
</div>


</body>
</html>