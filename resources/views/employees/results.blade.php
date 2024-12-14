<style>


@media print {
            .no-print, .edit-delete, button ,.task {
                display: none;
            }}

.all{
width: 200px;
padding: 20px;
background-color:white;
margin-top:80px ;
font-size:25px;
color:black;

}

.table{

width: 800px;

text-align:center;

font-size:25px;

color:black;
}

.black{

color:black;

}
.pr{


    padding: 10px;
    margin-top: 10px;
    font-size:25px;
}

</style>



<div class="task">

    @include($layout)   
</div>
<DIv class="do">

@section('con');

</DIv>

<div class="all">

المرتب {{$salary}}<br>


اجمالي المرتبات {{$Total_salary}}<br><br>

الغياب {{$abs}}<br>
خصم الغياب {{$priceabs}}<br><br>

ساعات زيادة {{$Plus_Hours}}<br>
ساعات متاخرة {{$Abs_Hours}}<br>


المسحوبات {{$sumwith}}<br>

الباقي {{$Net}}
</div>


<button class="pr" onclick="printPage()">طباعة</button>

@php
$counter =1;
@endphp

<h2 class="black">المسحوبات</h2>

<table class="table"  border="10" >
            <thead>
                <tr>
                    
                   
                    <th scope="col">الاسم</th>
                    <th scope="col">المبلغ</th>
                    <th scope="col">التاريخ</th>
                    <th scope="col">المسوؤل</th>
                    <th scope="col">الرقم</th>

                </tr>
            </thead>
            <tbody>
                @foreach($with as $withh)
                    <tr>
                        
                    <td>{{$withh->name}}</td>                        
                    <td>{{$withh->amount}}</td>
                    <td>{{$withh->date}}</td>
                    <td>{{ $withh->opreator }}</td>
                    <td>{{ $counter++ }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @php
        $counter =1;
        @endphp

        <h2 class="black">الغياب</h2>

<table class="table"  border="10" >
            <thead>
                <tr>
                    
                   
                    <th scope="col">الاسم</th> 
                    <th scope="col">التاريخ</th>
                    <th scope="col">المسوؤل</th>
                    <th scope="col">الرقم</th>


                </tr>
            </thead>
            <tbody>
                @foreach($allabs as $abs)
                    <tr>  
                    <td>{{$abs->name}}</td>                        
                    <td>{{$abs->date}}</td>
                    <td>{{ $abs->opreator }}</td>
                    <td>{{ $counter++ }}</td>
                    
                    </tr>
                @endforeach
            </tbody>
        </table>

        @php
        $counter =1;
        @endphp
        <h2 class="black">ساعات زيادة</h2>

<table class="table"  border="10" >
            <thead>
                <tr>
                    
                   
                    <th scope="col">عدد الساعات</th> 
                    <th scope="col">التاريخ</th>
                    <th scope="col">الرقم</th>


                </tr>
            </thead>
            <tbody>
                @foreach($user_over_times as $user_over_time)
                    <tr>  
                    <td>{{$user_over_time->number}}</td>                        
                    <td>{{$user_over_time->created_at}}</td>
                    <td>{{ $counter++ }}</td>
                    
                    </tr>
                @endforeach
            </tbody>
        </table>

        @php
        $counter =1;
        @endphp
        <h2 class="black">ساعات متاخرة</h2>

<table class="table"  border="10" >
            <thead>
                <tr>
                    
                   
                    <th scope="col">عدد الساعات</th> 
                    <th scope="col">التاريخ</th>
                    <th scope="col">الرقم</th>


                </tr>
            </thead>
            <tbody>
                @foreach($user_lates as $user_late)
                    <tr>  
                    <td>{{$user_late->number}}</td>                        
                    <td>{{$user_late->created_at}}</td>
                    <td>{{ $counter++ }}</td>
                    
                    </tr>
                @endforeach
            </tbody>
        </table>

        @php
        $counter =1;
        @endphp
        <h2 class="black">الحضور </h2>

<table class="table"  border="10" >
            <thead>
                <tr>
                    
                   
                    <th scope="col">بداية الاسبوع </th> 
                    <th scope="col">نهاية الاسبوع</th>
                    <th scope="col">الرقم</th>


                </tr>
            </thead>
            <tbody>
                @foreach($user_attendeces as $user_attendec)
                    <tr>  
                    <td>{{$user_attendec->start_week}}</td>                        
                    <td>{{$user_attendec->end_week}}</td>
                    <td>{{ $counter++ }}</td>
                    
                    </tr>
                @endforeach
            </tbody>
        </table>

<script>
    function printPage() {
        window.print();
    }
</script>
</body>
</html>




