
<style>

body{

background-color:blue;

color:white;

font-size:40px;

}
</style>



@extends($layout)   

<DIv class="do">


</DIv>


@foreach($All_Workers as $worker)

{{$worker->name}}<BR><BR><br>

@endforeach