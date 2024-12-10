

@include("super_admin.TaskBar")
@include("super_admin.SideBar")

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>تسجيل تاريخ وعضو</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f8fc;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            min-height: 100vh;
        }
        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            width: 290px;
            text-align: center;
            margin-top: 40px;
        }
        h1 {
            font-size: 24px;
            color: #4a4a4a;
            margin-bottom: 20px;
        }
        input[type="date"],
        select {
            width: 80%;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid #ddd;
            font-size: 16px;
        }
        input[type="date"]:focus,
        select:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 4px rgba(0, 123, 255, 0.4);
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .results-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* عرض ثلاث أعمدة */
            gap: 20px; /* المسافة بين الجداول */
            width: calc(100% - 500px); /* طرح عرض الشريط الجانبي */
            margin-left:250px ;
            margin-top: 20px;
            padding: 0 20px; /* تباعد داخلي إضافي */
        }
        .table-container {
            background-color: #fff;
            padding: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .table-container h2 {
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
        }
        table th,
        table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        table th {
            background-color: #f1f1f1;
            color: #333;
        }
        table td {
            color: #666;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h1>إدخال التاريخ واختيار المسئول</h1>

        <form action="{{route('super_admin/result.admin.report')}}" method="post">
            @csrf
            <label for="date">التاريخ</label>
            <input type="date" name="date" required>

            <label for="admin_id">اختر مسئول</label>
            <select name="admin_id" id="admin_id" required>
                <option disabled selected>اختر مسئو</option>
                @foreach ($Admins as $Admi)
                    <option value="{{$Admi->id}}">{{$Admi->name}}</option>
                @endforeach
            </select>

            <input type="submit" value="إرسال">
        </form>
    </div>

    @if(isset($Admin_Sales_Report))
    <div class="results-container">
        <!-- الجدول الأول: تقرير المبيعات -->
        <div class="table-container">
            <h2>تقرير فواتير البيع</h2>
            <table>
                <thead>
                    <tr>
                        <th>المشتري</th>
                        <th>السعر</th>
                        <th>الكمية </th>
                        <th>الاجمالي</th>
                        <th>كود الموديل</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Admin_Sales_Report as $item)
                    <tr>
                        <td>{{ $item->buyer }}</td>
                        <td>{{ $item->price}}</td>
                        <td>{{ $item->much}}</td>
                        <td>{{ $item->total}}</td>
                        <td>{{ $item->code}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- الجدول الثاني: تقرير المشتريات -->
        <div class="table-container">
            <h2>تقرير دفعات العملاء</h2>
            <table>
                <thead>
                    <tr>
                        <th>العميل</th>
                        <th>المبلغ</th>
                        <th>طريقة الدفع</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($Admin_Sales_Installments_Report  as $item)
                    <tr>
                        <td>{{ $item->buyer }}</td>
                        <td>{{ $item->amont }}</td>
                        <td>{{ $item->payment_way }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- الجدول الثالث: تقرير المرتجعات -->


<div class="table-container">
    <h2>تقرير المرتجعات المبيعات</h2>
    <table>
        <thead>
            <tr>
                <th>العميل</th>
                <th>الموديل</th>
                <th>الكمية</th>
                <th>الاجمالي</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Admin_Sales_Returns_Report as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->model }}</td>
                <td>{{ $item->much }}</td>
                <td>{{ $item->total }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="table-container">
    <h2>تقرير فواتير الشراء</h2>
    <table>
        <thead>
            <tr>
                <th>الكود</th>
                <th>الكمية</th>
                <th>السعر </th>
                <th>الاجمالي</th>
                <th>المورد </th>
            </tr>
        </thead>
        <tbody>
            @foreach($Admin_Puraches_Report as $item)
            <tr>
                <td>{{ $item->code }}</td>
                <td>{{ $item->num}}</td>
                <td>{{ $item->price}}</td>
                <td>{{ $item->total}}</td>
                <td>{{ $item->buyer}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="table-container">
    <h2>تقرير تسديدات الشراء</h2>
    <table>
        <thead>
            <tr>
                <th>العميل</th>
                <th>المبلغ</th>
                <th>طريقة الدفع</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Admin_Purchases_Installments_Report  as $item)
            <tr>
                <td>{{ $item->seller }}</td>
                <td>{{ $item->amont }}</td>
                <td>{{ $item->payment_way }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>




<div class="table-container">
    <h2>تقرير مرتجعات الشراء</h2>
    <table>
        <thead>
            <tr>
                <th>العميل</th>
                <th>الصنف</th>
                <th>الكمية</th>
                <th>الاجمالي</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Admin_Purchases_Returns_Report   as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->type }}</td>
                <td>{{ $item->much }}</td>
                <td>{{ $item->total }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<div class="table-container">
    <h2>تقرير تسديدات المغسلة</h2>
    <table>
        <thead>
            <tr>
                <th>المغسلة</th>
                <th>المبلغ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Laundries_Installments   as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->price }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="table-container">
    <h2>تقرير  فواتير المغاسل</h2>
    <table>
        <thead>
            <tr>
                <th>العميل</th>
                <th>الصنف</th>
                <th>السعر</th>
                <th>الكمية</th>           
                <th>الاجمالي</th>
    
            </tr>
        </thead>
        <tbody>
            @foreach($Laundrise_Invoices  as $item)
            <tr>
                <td>{{ $item->washer }}</td>
                <td>{{ $item->type }} {{" "}} {{$item->prosses}}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->much }}</td>           
                <td>{{ $item->total }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="table-container">
    <h2>تقرير فواتير القماش</h2>
    <table>
        <thead>
            <tr>
                <th>العميل</th>
                <th>النوع </th>
                <th>عدد الاثواب</th>
                <th>عدد الامتار</th>
                <th>سعر المتر</th>
                <th>الاجمالي</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Cash_Fabric_Ricete   as $item)
            <tr>
                <td>{{ $item->clint }}</td>
                <td>{{ $item->details }}</td>
                <td>{{ $item->much_of_fabricmeter }}</td>
                <td>{{ $item->much_of_fabricrobe }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->total }}</td>
            </tr>
            @endforeach

            @foreach($Deferred_Fabrics_Invoices    as $item)
            <tr>
                <td>{{ $item->clint }}</td>
                <td>{{ $item->details }}</td>
                <td>{{ $item->much_of_fabricmeter }}</td>
                <td>{{ $item->much_of_fabricrobe }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->total }}</td>
            </tr>
            @endforeach


        </tbody>
    </table>
</div>

<div class="table-container">
    <h2>تقرير تسديدات القماش</h2>
    <table>
        <thead>
            <tr>
                <th>العميل</th>

                <th>المبلغ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Installment_Fabric_Clint   as $item)
            <tr>
                <td>{{ $item->clint }}</td>
                <td>{{ $item->amount }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


    </div>
    @endif

</body>
</html>
