



@if(auth()->guard("super_admin")->check())

@include("super_admin.TaskBar")
@include("super_admin.SideBar")


@elseif(auth()->guard("admin")->check())

@include("admin.TaskBar")
@include("admin.sidebar")

@endif



<table border="1" cellpadding="10" cellspacing="0" style="width: 50%; border-collapse: collapse; margin-top:70px; margin-left:450px;">
    <thead>

    </thead>
    <tbody>

  
        @foreach ($Data->getAttributes() as $key => $value)
   <tr>   
<th>{{$key}}</th>


            <td>{{ $value }}</td>

            </tr>
        @endforeach   

    </tbody>
</table>
