


<style>


.table{

width: 800px;

text-align:center;
font-size:25px;
margin:120px

}

body{

background-color:blue;

color:white;


}



#main{

    margin-top:50px;
    

}
    </style>




@extends($layout)   

<DIv class="do">

@section('con');

</DIv>


<h1 id="main">المسحوبات و الايرادات اليومية</h1>

<table class="table"  border="10" >
            <thead>
                <tr>
                    <th scope="col">الوصف</th>
                    <th scope="col">السبب</th>
                    <th scope="col">المبلغ</th>
                    <th scope="col">التاريخ </th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($data as $dataa)
                    <tr>
                        <td>{{ $dataa->des }}</td>
                        <td>{{ $dataa->reason }}</td>
                        <td>{{ $dataa->amont }}</td>
                        <td>{{ $dataa->date }}</td>
                        @if(auth()->guard("admin")->check())

                        <td><a href="{{route('editdaily',$dataa->id)}}">تعديل</a></td>
                        <td><a href="{{route('deletedaily',$dataa->id)}}">حذف</a></td>
                @endif
                    </tr>
                @endforeach

                @foreach($dataw as $data)
                    <tr>
                        <td>{{ $data->des }}</td>
                        <td>{{ $data->reason }}</td>
                        <td>{{ $data->amont }}</td>
                        <td>{{ $data->date }}</td>
                        @if(auth()->guard("admin")->check())

                        <td><a href="{{route('edit_with_daily',$data->id)}}">تعديل</a></td>
                        <td><a href="{{route('delete_with_daily',$data->id)}}">حذف</a></td>
                @endif

            </tr>
                @endforeach
            </tbody>
        </table>

        <hr>


   <h1>مسحوبات الصنايعية</h1>
        <table class="table"  border="10" >
            <thead>
                <tr>
                    <th scope="col">الاسم</th>
                    <th scope="col">الكمية</th>
                    <th scope="col">التاريخ </th>
                    <th scope="col">الملاحظات</th>
                    <th scope="col">المسؤول</th>
                </tr>
            </thead>
            <tbody>
                @foreach($workers_withs as $workers_with)
                    <tr>
                        <td>{{ $workers_with->name }}</td>
                        <td>{{ $workers_with->much }}</td>
                        <td>{{ $workers_with->date }}</td>
                        <td>{{ $workers_with->comments}}</td>
                        <td>{{ $workers_with->opre }}</td>

                
                    </tr>
                @endforeach
                </tbody>
                </table>

<hr>

                <h1>مسحوبات العمال</h1>
        <table class="table"  border="10" >
            <thead>
                <tr>
                    <th scope="col">الاسم</th>
                    <th scope="col">المبلغ</th>
                    <th scope="col">التاريخ </th>
                </tr>
            </thead>
            <tbody>
                @foreach($em_withs as $em_with)
                    <tr>
                        <td>{{ $em_with->name }}</td>
                        <td>{{ $em_with->amount }}</td>
                        <td>{{ $em_with->date }}</td>
                
                    </tr>
                @endforeach
                </tbody>
                </table>

<hr>

<h1>مسحوبات التصنيع</h1>
        <table class="table"  border="10" >
            <thead>
                <tr>
                    <th scope="col">الاسم</th>
                    <th scope="col">الكمية</th>
                    <th scope="col">التاريخ </th>
                    <th scope="col">الملاحظات</th>
                    <th scope="col">المسؤول</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bro_withs as $bro_with)
                    <tr>
                        <td>{{ $bro_with->name }}</td>
                        <td>{{ $bro_with->much }}</td>
                        <td>{{ $bro_with->date }}</td>
                        <td>{{ $bro_with->comments}}</td>
                        <td>{{ $bro_with->opre }}</td>

                
                    </tr>
                @endforeach
                </tbody>
                </table>

<hr>


<hr>
