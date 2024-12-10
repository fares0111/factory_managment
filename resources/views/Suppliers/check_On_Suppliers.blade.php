<style>
    /* تنسيق الأزرار */
    button {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        margin: 5px;
        cursor: pointer;
        text-decoration: none;
    }

    button a {
        text-decoration: none;
        color: inherit;
    }

    button:hover {
        background-color: #0056b3;
    }
    button{

margin-top: 100px;

    }
</style>

@extends($layout)   
    


@foreach($Suppliers as $Supplier)

<button><a href="{{route("cheakseller",$Supplier->id)}}">{{$Supplier->name}}</a></button>

@endforeach