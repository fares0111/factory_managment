@extends("admin.sidebar")

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
            margin: 0;
            padding: 0;
        }

        .dashboard-container {
            display: flex;
            min-height: 100vh;
            margin-left:200px;
            margin-top:60px; 
        }

        /* Ensure sidebar width is respected */
        .main-content {
            flex-grow: 1;
            margin-left: 250px; /* Adjust this based on the width of your sidebar */
            padding: 20px;
            background-color: #e9ecef;
        }

        .grid-container {
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            flex-wrap: wrap;
            gap: 20px; /* Space between cards */
        }

        .card {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            flex: 1 1 calc(25% - 40px); /* Adjust the card width */
            max-width: calc(40% - 50px); /* Ensure the max width of each card */
            box-sizing: border-box;
            text-align: center;
        }

        .card h3 {
            margin-bottom: 10px;
            color: #343a40;
        }

        .card p {
            font-size: 18px;
            color: #007bff;
        }

    </style>
</head>
<body>
@extends("admin.TaskBar")

<div class="dashboard-container">
    
    <div class="main-content">
        <div class="grid-container">
            <div class="card">
                <h3>مجموع الاعضاء</h3>
                <p>{{$Users->count()}}</p>
            </div>
            <div class="card">
                <h3>اجمالي مبيعات اليوم</h3>
                <p>${{$Sales_Invoices}}</p>
            </div>
 
        </div>
    </div>
</div>

</body>
</html>
