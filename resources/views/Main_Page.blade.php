<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* خلفية بتدرج داكن */
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #2e2e2e, #1c1c1c); /* تدرج من الرمادي الداكن إلى الأسود */
            font-family: 'Arial', sans-serif;
            overflow: hidden;
        }

        /* تنسيق الأزرار */
        a {
            font-size: 1.5rem; /* حجم النص */
            padding: 15px 40px;
            color: #fff; /* لون النص */
            text-decoration: none;
            background-color: #000000; /* خلفية داكنة للأزرار */
            border-radius: 50px; /* جعل الأزرار مستديرة */
            transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease; /* تأثير التفاعل */
            margin: 10px; /* المسافة بين الأزرار */
            font-family: 'Arial', sans-serif; /* الخط المستخدم */
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5); /* ظل خفيف */
        }

        /* تأثير عند المرور بالفأرة */
        a:hover {
            background-color: #666; /* لون خلفية أفتح عند التمرير */
            transform: scale(1.05); /* تكبير الزر قليلاً */
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.7); /* زيادة قوة الظل عند التمرير */
        }

        /* تأثير الدوائر المتحركة */
        .circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1); /* لون دائري شبه شفاف */
            animation: move 15s infinite linear;
            mix-blend-mode: overlay; /* مزج الألوان مع الخلفية */
        }

        /* خصائص حركة الدوائر */
        @keyframes move {
            0% {
                transform: translateY(0) translateX(0) scale(1);
            }
            50% {
                transform: translateY(-100vh) translateX(50vw) scale(1.5);
            }
            100% {
                transform: translateY(0) translateX(0) scale(1);
            }
        }

        /* أحجام مختلفة للدوائر */
        .circle:nth-child(1) {
            width: 200px;
            height: 200px;
            left: 10%;
            top: 30%;
            background: rgba(255, 255, 255, 0.2); /* دائرة بلون رمادي فاتح */
        }

        .circle:nth-child(2) {
            width: 250px;
            height: 250px;
            right: 20%;
            top: 20%;
            background: rgba(255, 255, 255, 0.2); /* دائرة بلون رمادي فاتح */
        }

        .circle:nth-child(3) {
            width: 300px;
            height: 300px;
            left: 40%;
            bottom: 10%;
            background: rgba(255, 255, 255, 0.2); /* دائرة بلون رمادي فاتح */
        }

    </style>
</head>
<body>



    <!-- دوائر متحركة للخلفية -->
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="circle"></div>

    @if(Auth::guard("admin")->check())
    <a href="{{ route('admin/dashboard') }}"> العودة للصفحة الرئيسية</a>

@elseif(Auth::check())
    <a href="{{ route('index') }}"> العودة للصفحة الرئيسية</a>

    @elseif(Auth::guard("super_admin")->check())

    <a href="{{ route('super_admin/dashboard') }}"> العودة للصفحة الرئيسية</a>

@else
    <!-- الروابط -->
    <a href="{{ route('super_admin/login') }}" style="color:red;">Super Admin </a>

    <a href="{{ route('admin/login') }}" style="color:green">مسئول</a>
    <a href="{{ route('login') }}">عضو</a>

@endif

</body>
</html>
