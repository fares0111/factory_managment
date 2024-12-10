

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
    background-color: black;
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
.dropdown, .dropdown1, .dropdown2, .dropdown3, .dropdown4, .dropdown5 , .dropdown6,.dropdown7 ,.dropdown8 ,.dropdown9,.dropdown10{
    position: relative;
    display: inline-block;
    background-color: #4A90E2;
    border-radius: 15px; /* زوايا مستديرة */
    padding: 12px 5px;
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


.dropdown:hover, .dropdown1:hover, .dropdown2:hover, .dropdown3:hover, .dropdown4:hover, .dropdown5:hover, .dropdown6:hover ,.dropdown7:hover ,.dropdown8:hover ,.dropdown9:hover,.dropdown10:hover{
    background-color: #357ABD;
    box-shadow: 0px 12px 20px rgba(0, 0, 0, 0.4); /* تكثيف الظلال عند التمرير */
    transform: scale(1.05); /* تأثير التكبير عند التمرير */
}

/* إعدادات القائمة المنسدلة */
.dropdown-content, .dropdown-content1, .dropdown-content2, .dropdown-content3, .dropdown-content4, .dropdown-content5, .dropdown-content6 ,  .dropdown-content7,  .dropdown-content8 ,  .dropdown-content9,  .dropdown-content10{
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
.dropdown-content a, .dropdown-content1 a, .dropdown-content2 a, .dropdown-content3 a, .dropdown-content4 a, .dropdown-content5 a , .dropdown-content6 a , .dropdown-content7 a , .dropdown-content8 a , .dropdown-content9 a , .dropdown-content10 a {
    color: white;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
    font-size: 14px;
    transition: background-color 0.2s ease;
}

/* تأثير التمرير داخل القوائم */
.dropdown-content a:hover, .dropdown-content1 a:hover, .dropdown-content2 a:hover, .dropdown-content3 a:hover, .dropdown-content4 a:hover, .dropdown-content5 a:hover, .dropdown-content6 a:hover , .dropdown-content7 a:hover , .dropdown-content8 a:hover , .dropdown-content9 a:hover, .dropdown-content10 a:hover{
    background-color: #ffffff; /* لون أغمق عند التمرير */
    border-radius: 5px; /* زوايا ناعمة عند التمرير */
    color: black;
}

/* إظهار القائمة عند التمرير فوقها */
.dropdown:hover .dropdown-content, .dropdown1:hover .dropdown-content1, .dropdown2:hover .dropdown-content2, .dropdown3:hover .dropdown-content3, .dropdown4:hover .dropdown-content4, .dropdown5:hover .dropdown-content5,.dropdown6:hover .dropdown-content6,.dropdown7:hover .dropdown-content7 ,.dropdown8:hover .dropdown-content8,.dropdown9:hover .dropdown-content9,.dropdown10:hover .dropdown-content10 {
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

    <a href="{{route('admin/dashboard')}}">الصفحة الرئيسية</a>
        </div>
</div>


        <div class="dropdown">
            <a class="bro"> اضافة </a>


            <div class="dropdown-content">
            <a href="{{route('addbuyer')}}"> اضافة عميل</a>
            <a href="{{route('addseller')}}"> اضافة موردين</a>
            <a href="{{route('Add_Worker_Form')}}">اضافة صنايعي</a>
            <a href="{{route('new_em')}}"> اضافة عامل</a>
            <a href="{{route('add')}}">اضافة مصنع (تصنيع)</a>

                <a href="{{route('addmodel')}}">اضافة منتج</a>
                
                
            </div>
    </div>

                   <div class="dropdown1">

            <a class="bro1">عملاء</a>

                <div class="dropdown-content1">

            <a href="{{route('showde')}}"> اضافة دفع عملاء</a>
            <a href="{{route('addsell')}}"> اضافة فاتورة بيع</a>            
            <a href="{{route('addsalsereturn')}}">  مرتجع بيع</a>
            <a href="{{route('buyers')}}">   كشف حساب عميل مفصل</a>
            <a href="{{route('Cheack_On_For_Simply_Account_Statment')}}">  كشف حساب عميل مبسط</a>
            <a href="{{route('sales.invoice.review')}}"> مراجعة فاتورة</a>
            <a href="{{route('clint.depts')}}"> المديونية</a>

           </div>

        </div>


        <div class="dropdown2">

<a class="bro2">موردين</a>

    <div class="dropdown-content2">

<a href="{{route('showdeseller')}}"> اضافة دفع مورد</a>
<a href="{{route('form')}}"> اضافة فاتورة شراء</a>
<a href="{{route('sellers')}}">  كشف حساب مورد</a>
<a href="{{route('addpurchasesreturn')}}">  مرتجع شراء</a>   
</div>

</div>


<div class="dropdown3">

<a class="bro3">المخازن</a>

    <div class="dropdown-content3">

<a href="{{route('repo')}}"> جرد مخزن البضاعة</a>
   <a href="{{route('netprofit')}}">صافي الربح</a>
</div>

</div>



<div class="dropdown4">

    <a class="bro4">القماش</a>
    
        <div class="dropdown-content4">

            <a href="{{route('add_fabric_clint')}}">اضافة مورد قماش</a>
            <a href="{{route('add_fabrics_installment')}}"> اضافة دفعة مورد</a>
            <a href="{{route('accout_fabrics_clint_statment')}}"> كشف حساب مورد قماش</a>
            
            <a href="{{route('choosing_method')}}">  اضافة فاتورة</a>

    </div>
    
    </div>
    
    <div class="dropdown5">

        <a class="bro5">المغسلة</a>
        
            <div class="dropdown-content5">
    
                <a href="{{route('addwasher')}}">اضافة مغسلة </a> 
                <a href="{{route('dowithdraw')}}"> اضافة دفعة مغسلة</a>
                <a href="{{route('addrecite')}}">اضافة فاتورة </a>
                <a href="{{route('search_launderers')}}">  كشف حساب مغسلة</a>

        </div>
        
        </div>

        <div class="dropdown7">
            <a class="bro7" >المصنعين</a>
            <div class="dropdown-content7">
            <a href="{{route('worker_bro_withdraw_form')}}">دفعة من التصنيع</a>
            <a href="{{route('worker_bro_add_form')}}"> انتاج تصنيع</a>
                <a href="{{route('search_report_bro')}}">كشف حساب (تصنيع)</a>
            </div>
        </div>

        <div class="dropdown8">
            <a class="bro8" >العمال</a>
            <div class="dropdown-content8">
            <a href="{{route('add_new_with')}}"> اضافة سحب</a>
            <a href="{{route('employees.index')}}"> الخصم و المكافاة</a>
            <a href="{{route('statment')}}">كشف حساب عامل</a>
            </div>
        </div>  

        <div class="dropdown9">
            <a class="bro9">الصنايعية</a>
        <div class="dropdown-content9">
    
            <a href="{{route('Add_Worker_Form')}}">اضافة صنايعي</a>
            <a href="{{route('worker_withdraw_form')}}">سحب</a>
            <a href="{{route('worker_addetion_form')}}">انتاج</a>
            <a href="{{route('report')}}">كشف حساب صنايعي</a>
        </div>
            </div>
    
            <div class="dropdown10">
            <a class="bro10" >اليومية</a>
        <div class="dropdown-content10">
    
            <a href="{{route('addbalance')}}">اضافة ايراد</a>
            <a href="{{route('add_with_daily')}}">اضافة مصروف</a>
            <a href="{{route('search')}}">بحث عن يومية</a>
            <a href="{{route('daily')}}"> الخزنة</a>
    
            </div>
            </div>

        <div class="notification-container" id="notificationBell">
            <div class="notification-icon">
                <!-- رمز الجرس من Unicode -->
                <span class="bell-icon">&#x1F514;</span> <!-- 🔔 -->
                <!-- عدد الإشعارات غير المقروءة -->
                <span class="notification-badge">{{auth()->guard("admin")->user()->unreadNotifications->count()}}</span>
            </div>
            <div class="notification-list" id="notificationList">
                <ul>

                    <li>

                        <a href="{{route('Mark_All_As_Read')}}" >تحديد الكل كمقروء</a>

                    </li>

@foreach(auth()->guard("admin")->user()->Notifications as $noti)

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
 


   
      
<!--   <div class="background">
      
    </div>
-->  
@if(session('alert'))
<script>
    alert('{{ session('alert') }}');
</script>
@endif

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


