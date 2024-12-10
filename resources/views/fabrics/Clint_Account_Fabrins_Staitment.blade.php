<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

<style>
body {
    font-family: Arial, sans-serif;

    background-color: #f7f7f7;
    margin: 0;
    padding: 0;
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

.buyer-button {
    display: block;
    margin-top: 10px;
    font-size:35px; 
}

.buyer-link {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border-radius: 5px;
 

}

.buyer-link:hover {
    background-color: #0056b3;
}


</style>

</head>
<body>
    @extends($layout)   
</body>
</html>


<div class="container">
@foreach ($Clints as $clint)
  
<button class="buyer-button"><a href="{{ route("results_of_fabrics_clint",$clint->id) }}" class="buyer-link">{{ $clint->name }}</a></button>

@endforeach
</div>