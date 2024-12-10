
<style>


.table{

width: 800px;

text-align:center;
font-size:30px;


}

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
    </style>


@extends($layout)   

<DIv class="do">

@section('con');

</DIv>
<form action="{{route('insert_time')}}" method="post">

@csrf
تاريخ البدء <input type="date" name="start_date"><br><br>

تاريخ الانتهاء <input type="date" name="end_date"><br><br>

<input type="submit">


</form>

<table class="table" border="10" >
            <thead>
                <tr>
                    <th scope="col">الوصف</th>
                    <th scope="col">السبب</th>
                    <th scope="col">المبلغ</th>
                    <th scope="col">التاريخ </th>
                </tr>
            </thead>
            <tbody>
                @foreach($all as $alll)
                    <tr>
                        <td>{{ $alll->des }}</td>
                        <td>{{ $alll->reason }}</td>
                        <td>{{ $alll->amont }}</td>
                        <td>{{ $alll->date }}</td>
                
                    </tr>
                @endforeach

                @foreach($withdrawals as $withdrawalss)
                    <tr>
                        <td>{{ $withdrawalss->des }}</td>
                        <td>{{ $withdrawalss->reason }}</td>
                        <td>{{ $withdrawalss->amont }}</td>
                        <td>{{ $withdrawalss->date }}</td>
                
                    </tr>
                @endforeach
            </tbody>
        </table>





