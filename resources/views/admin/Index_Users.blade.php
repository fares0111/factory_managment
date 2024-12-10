



@if(auth()->guard("super_admin")->check())

@include("super_admin.TaskBar")
@include("super_admin.SideBar")


@elseif(auth()->guard("admin")->check())

@include("admin.TaskBar")
@include("admin.sidebar")


@endif


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Members</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f2f5;
            color: #333;
            margin: 0;
            padding: 0;
    
        }
        .container {
            width:80%;
          margin: auto;
          margin-left:400px; 
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top:60px;
        }
        h1 {
            text-align: center;
            color: #c8d0d8;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            border-radius: 5px;
            text-align: center;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }
        .btn-add {
            background-color: #28a745;
        }
        .btn-add:hover {
            background-color: #218838;
        }
        .btn-edit {
            background-color: #ffc107;
        }
        .btn-edit:hover {
            background-color: #e0a800;
        }
        .btn-delete {
            background-color: #dc3545;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
        .btn-upgrade {
            background-color: #17a2b8;
        }
        .btn-upgrade:hover {
            background-color: #138496;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            padding: 20px;
        }
        table th, table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        table th {
            background-color: #007bff;
            color: white;
        }
        table tr:hover {
            background-color: #f1f1f1;
        }
        .actions {
            display: flex;
            gap: 5px;
        }
    </style>




</head>
<body>
    <div class="container">
        
        <h1>ادارة الاعضاء</h1>
        <a href="{{route('register')}}" class="btn btn-add">اضافة عضو</a>


        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>الاسم</th>
                    <th>الايميل</th>
                    <th>التحكم</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example Row -->
                <tr>

                    @foreach ($Users as $User)
                        
             

                    <td>{{$User->id}}</td>
                    <td>{{$User->name}}</td>
                    <td>{{$User->email}}</td>
                    <td class="actions">
                        <a href="{{route('admin/edit.user',$User->id)}}" class="btn btn-edit">تعديل</a>
                        <a  href="{{route('admin/delete.user',$User->id)}}" class="btn btn-delete">حذف</a>
            
                    </td>
                </tr>
                       @endforeach
                <!-- More rows go here -->
            </tbody>
        </table>
    </div>
</body>
</html>
