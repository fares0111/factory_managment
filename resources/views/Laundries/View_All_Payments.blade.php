

@extends($layout)   
    

<link rel="stylesheet" href="{{ asset('css/washes/showwithrecites.css') }}">

<table class="styled-table">
    <caption>اجمالي الدفعات {{$Total_Paymentys_Cash}}</caption>
    <thead>
        <tr>
            <th>الاسم</th>
            <th>المبلغ</th>
            <th>تعديل</th>
            <th>حذف</th>
        </tr>
    </thead>
    <tbody>
        @foreach($All_Payments as $Payment)
        <tr>
            <td>{{$Payment->name}}</td>
            <td>{{$Payment->price}}</td>
            <td><a href="{{route("editwasherwith",$Payment->id)}}">تعديل</a></td>
            <td><a href="{{route("deletewasherwith",$Payment->id)}}">حذف</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
