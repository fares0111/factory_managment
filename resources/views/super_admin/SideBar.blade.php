<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Default Title')</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f2f5;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
        }
        .sidebar {
            width: 250px;
            background-color: #000000;
            color: #50ce16;
            padding: 20px;
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100%;
            top: 40px;
            left: 0;
        }
        .sidebar a {
            color: #d41313;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            display: block;
        }
        .sidebar a:hover {
            background-color: #495057;
            color: #fff;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
            background-color: #fff;
            overflow-y: auto;
        }
        /* Add other styles here */
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Super Admin :: {{ Auth::guard('super_admin')->user()->name }}</h2>
        

        <a href="{{route('admin/user.index')}}">الاعضاء</a>  
        <a href="{{route('admin/show.report.user')}}">تقارير الاعضاء</a>
        <a href="{{route("super_admin/control.admin")}}">المسئولين</a>
        <a href="{{route('super_admin/query.admin.report')}}"> تقارير المسئولين</a>
        <a href="{{route('admin/Comprehensive.Query')}}">تقارير العمل</a>
        <a href="{{route('backup')}}">عمل نسخة احتياطية</a>

        <a href="{{ route('admin/logout') }}" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
           تسجيل خروج
        </a>
        <form id="logout-form" action="{{ route('super_admin/logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
 
</body>
</html>
