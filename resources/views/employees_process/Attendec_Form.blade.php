
<style>

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
    
    select{
    
    padding:12px;
    font-size:20px;  
    }
    
    #main{
    
    margin-top:100px;
    color:red;
    
    
    }
    
    </style>
    
    
    @extends($layout)   
    
    <DIv class="do">
    
    @section('con');
    
    </DIv>
    
    <h1 id="main">تسجيل غياب</h1>
    
    <form action="{{route('increase_attendec')}}" method="post">
    
    @csrf
    
    
     اسم العامل 
 
     <select name="id" id="">
    
    
     @foreach($Employees as $Employee)
    
    <option value="{{$Employee->id}}">{{$Employee->name}}</option>
    
    @endforeach
     </select>
    
    <input type="submit" class="value">
    
    </form>