

<!DOCTYPE html>
<html lang="en">
<head>


<title>الصفحة الرئيسية</title>
<style>
/* تصميم شريط المهام */
.taskbar {
    position: fixed;
    top: 0;
    width: 100%;
    height: 45px;
    background-color: rgb(107, 74, 74);
    color: white;
    padding: 10px 0; /* زيادة السماكة */
    font-size: 30px;
    text-align: center;
    z-index: 9999;
    display: flex;
    justify-content: center;
    
    gap: 20px; /* المسافة بين القوائم */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3); /* ظلال بارزة */
}

/* تصميم الأزرار والقوائم المنسدلة */
.dropdown, .dropdown1, .dropdown2, .dropdown3, .dropdown4, .dropdown5 , .dropdown6{
    position: relative;
    display: inline-block;
    background-color: #4A90E2;
    border-radius: 15px; /* زوايا مستديرة */
    padding: 12px 12px;
    margin: 10px;
    
    color: white;
    font-family: 'Arial', sans-serif;
    font-size: 25px;
    cursor: pointer;
    box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.3);
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
    transform: translateZ(0);
    
    /* لإضافة توسيط رأسي وأفقي */
    display: flex; /* تفعيل Flexbox */
    justify-content: center; /* توسيط النص أفقيًا */
    align-items: center; /* توسيط النص رأسيًا */
}


.dropdown:hover, .dropdown1:hover, .dropdown2:hover, .dropdown3:hover, .dropdown4:hover, .dropdown5:hover, .dropdown6:hover {
    background-color: #357ABD;
    box-shadow: 0px 12px 20px rgba(0, 0, 0, 0.4); /* تكثيف الظلال عند التمرير */
    transform: scale(1.05); /* تأثير التكبير عند التمرير */
}

/* إعدادات القائمة المنسدلة */
.dropdown-content, .dropdown-content1, .dropdown-content2, .dropdown-content3, .dropdown-content4, .dropdown-content5, .dropdown-content6 {
    display: none;
    position: absolute;
    background-color: rgba(0, 0, 0, 0.9); /* خلفية شفافة للقائمة */
    min-width: 200px;
    z-index: 1;
    top: 100%; /* تحت الزر */
    left: 0;
    border-radius: 10px; /* زوايا مستديرة للقائمة */
    box-shadow: 0px 8px 15px rgba(252, 247, 247, 0.5); /* ظلال للقائمة */
}

/* تصميم العناصر داخل القائمة */
.dropdown-content a, .dropdown-content1 a, .dropdown-content2 a, .dropdown-content3 a, .dropdown-content4 a, .dropdown-content5 a , .dropdown-content6 a {
    color: white;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
    font-size: 14px;
    transition: background-color 0.2s ease;
}

/* تأثير التمرير داخل القوائم */
.dropdown-content a:hover, .dropdown-content1 a:hover, .dropdown-content2 a:hover, .dropdown-content3 a:hover, .dropdown-content4 a:hover, .dropdown-content5 a:hover, .dropdown-content6 a:hover {
    background-color: #ffffff; /* لون أغمق عند التمرير */
    border-radius: 5px; /* زوايا ناعمة عند التمرير */
    color: black;
}

/* إظهار القائمة عند التمرير فوقها */
.dropdown:hover .dropdown-content, .dropdown1:hover .dropdown-content1, .dropdown2:hover .dropdown-content2, .dropdown3:hover .dropdown-content3, .dropdown4:hover .dropdown-content4, .dropdown5:hover .dropdown-content5,.dropdown6:hover .dropdown-content6 {
    display: block;
}

/* إعدادات الخلفية */
.background {
    width: 100%;
    height: 100vh;
    background-image: url('{{ asset('cover.png') }}');
    background-size: cover; /* تغطية الخلفية بالكامل */
    background-position: center;
    background-repeat: no-repeat;
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* تحسينات إضافية على الخطوط والنصوص */


تصميم الإشعارات */
.notification-container {
    position: relative;
    display: inline-block;
}
.notification-icon {
    font-size: 24px;
    cursor: pointer;
    position: relative;
}
.notification-badge {
    position: absolute;
    top: -10px;
    right: -10px;
    background-color: red;
    color: white;
    border-radius: 50%;
    padding: 5px 8px;
    font-size: 12px;
}
.notification-list {
    display: none;
    position: absolute;
    max-height: 400px; 
    top: 45px;
    right: 0;
    width: 300px;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    padding: 10px;

    overflow-y: auto; 
}
.notification-list ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}
.notification-list li {
    padding: 10px;
    border-bottom: 1px solid #eee;
    font-size: 14px;
}
.notification-list li:last-child {
    border-bottom: none;
}
.notification-message {
    font-weight: bold;
    color: #333;
}
.notification-date {
    font-size: 12px;
    color: #888;
    margin-top: 5px;
}
.notification-list li:hover {
    background-color: #f0f0f0;
    border-radius: 5px;
}
.hidden {
    display: none;
}

/* تصميم رمز الجرس */
/* تصميم رمز الجرس */
.notification-icon {
    position: relative;
    display: inline-block;
    font-size: 30px; /* حجم الجرس */
    color: yellow; /* لون الجرس الأصفر */
    cursor: pointer;
}

.bell-icon {
    display: inline-block;
}

/* تصميم العدد */
.notification-badge {
    position: absolute;
    top: -10px;
    right: -10px;
    background-color: red;
    color: white;
    border-radius: 50%;
    padding: 5px 8px;
    font-size: 12px;
}

    </style>

</head>
<body>

<div class="taskbar">

<div>    <div class="dropdown6" style="height:5px; color:red; background-color:#ffffff;">

    <a href="{{route('super_admin/dashboard')}}">الصفحة الرئيسية</a>
        </div>
</div>


                   <div class="dropdown1">

            <a class="bro1">عملاء</a>

                <div class="dropdown-content1">

            <a href="{{route('buyers')}}">   كشف حساب عميل مفصل</a>
            <a href="{{route('Cheack_On_For_Simply_Account_Statment')}}">  كشف حساب عميل مبسط</a>
            <a href="{{route('sales.invoice.review')}}"> مراجعة فاتورة</a>


           </div>

        </div>


        <div class="dropdown2">

            <a  href="{{route('sellers')}}" style="color: #eee;">  كشف حساب مورد</a>
    <div class="dropdown-content2">


</div>

</div>

<div class="dropdown4">

    <a href="{{route('accout_fabrics_clint_statment')}}"style="color: #eee;"  > كشف حساب مورد قماش</a>
    
        <div class="dropdown-content4">

            

    </div>
    
    </div>
    
    <div class="dropdown5">

        <a href="{{route('search')}}"  style="color: #eee;" >  كشف حساب مغسلة</a>
        
            <div class="dropdown-content5">
    

        </div>
        
        </div>



        <div class="dropdown3">

            <a class="bro3">المخازن</a>
            
                <div class="dropdown-content3">
            
            <a href="{{route('repo')}}"> جرد مخزن البضاعة</a>
               <a href="{{route('netprofit')}}">صافي الربح</a>
            </div>
            
            </div>


            <div class="notification-container" id="notificationBell">
                <div class="notification-icon">
                    <!-- رمز الجرس من Unicode -->
                    <span class="bell-icon">&#x1F514;</span> <!-- 🔔 -->
                    <!-- عدد الإشعارات غير المقروءة -->
                    <span class="notification-badge">{{auth()->guard("super_admin")->user()->unreadNotifications->count()}}</span>
                </div>
                <div class="notification-list" id="notificationList">
                    <ul>
    
                        <li>
    
                            <a href="{{route('Mark_All_As_Read')}}" >تحديد الكل كمقروء</a>
    
                        </li>
    
    @foreach(auth()->guard("super_admin")->user()->Notifications as $noti)
    
    <a href="{{route('get.data',['Model' => $noti->data['Model_Name'], 'data_id' => $noti->data['Id'],'notification_id' => $noti->id])}}">
        
        
        <li>
                            <span class="notification-message">{{$noti->data["message"]}}</span>
                            <div class="notification-date">{{$noti->created_at}}</div>
                        </li>
    </a>
    @endforeach
    
    
                    </ul>
                </div>
            </div>
    </div>
 


</body>
</html>

<script>
    // جافاسكريبت لعرض أو إخفاء الإشعارات
    document.getElementById('notificationBell').addEventListener('click', function() {
        var notificationList = document.getElementById('notificationList');
        notificationList.style.display = notificationList.style.display === 'block' ? 'none' : 'block';
    });

    // إخفاء القائمة عند النقر خارجها
    window.onclick = function(event) {
        if (!event.target.matches('.notification-container, .notification-container *')) {
            var notificationList = document.getElementById('notificationList');
            if (notificationList.style.display === 'block') {
                notificationList.style.display = 'none';
            }
        }
    };



</script>


