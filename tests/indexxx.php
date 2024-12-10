<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>



    <style>

        body{

            background-image: url("/home/username/Slide1.JPg");

        }



        form{

            margin-left: 450px;

            margin-top: 200px;

            font-size: 20px;

            color: whitesmoke;

        }



        input{

            display: block;

            padding: 10px;

            border-radius: 10px;

        }



        .bu{

            margin-top: 20px;

            padding: 10px;

            margin-left: 50px;

            border-radius: 10px;

            font-size: 20px;

        }



        input:hover{

            border-color: aqua;

        }



        .p1 {

            position: absolute;

            bottom: 60px;

            right: 900px;

            margin-bottom: 20px;

            margin-right: 50px;

            color: white;

        }

    </style>
@extends('index')

</head>

<body>



<h3 class="p1">Created By: Mamdouh Adel</h3>



<form action="" method="post">

    username<input type="text" name="username"><br>

    password<input type="password" name="password" id="password">

    <span class="toggle-password" onclick="togglePasswordVisibility()">

        

    </span>

    <button type="submit" class="bu"> LogIn</button>

</form>



<script>

    function togglePasswordVisibility() {

        var passwordInput = document.getElementById("password");

        if (passwordInput.type === "password") {

            passwordInput.type = "text";

        } else {

            passwordInput.type = "password";

        }

    }

</script>



</body>

</html>



<?php

if(isset($_POST["username"],$_POST["password"])){

    # code...

    if($_POST["username"] == "Westcairo" && $_POST["password"] == "onefamily"){

        // توجيه المستخدم إلى صفحة جديدة

        header("Location: https://sites.google.com/view/west-cairo-wiki");

        exit(); // يجب استخدام exit() للتأكد من أن لا يتم استئناف تنفيذ البرنامج بعد التوجيه

    } else {

        header("location:index.php");

    }

}

?>

