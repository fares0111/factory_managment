

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صافي الارباح او الخسائر</title>

    <style>

        .net_profit {

font-size:25px;
background-color:black;

padding:30px;
width: 30%;
margin: auto;
margin-top:100px ;
        }

#sell{

    color:yellow;
}

#cost{

    color:red;
}

#net{

  

color:green;

}
    </style>
</head>
<body>
    @extends($layout)   
    
<div class="net_profit">
<ul>
<li id="sell">سعر البيع   {{$Sell_Prise}}</li> 

<li id="cost">تكلفة التصنيع  {{$Cost_price}}</li> 

<li id="net"> صافي الربح {{$Net_Profit}} </li>
</ul>
</div>

</body>
</html>