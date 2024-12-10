<style>

.balance{

margin:300px;

font-size:30px;
}

#bala{

    color:red;
    font-size:30px;
}

#with{

color:red;
}

#reve{

    color:red;
    font-size:30px;
}

.routes{

font-size:30px;
margin:180px;

}

body{


background-color:blue;

}


#net{

color:red;
}
</style>


@extends($layout)   

<DIv class="do">

@section('con');

</DIv>

<div class="balance">

<p id="bala">الخزينة</p>


<p id ="reve">ايرادات {{$Revenues + $bro}}</p>
<p id="with">مسحوبات{{$Withdrawals + $W + $worker_with}}</p>

<p id="net"> الصافي {{$Revenues + $bro - $Withdrawals -$W-$worker_with}}</p>

</div>



