<style>
        /* تخصيص الروابط */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        a {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        a:hover {
            background-color: #0056b3;
        }
    </style>

@extends($layout)   
    
<a href="{{route("addsell")}}">انشاء فاتورة</a>
<a href="{{route("sell/showrecite")}}">عرض الفواتير</a>
