@include($layout)

<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        margin-top:100px; 
    }

    th, td {
        padding: 10px;
        text-align: left;
        border: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    /* زر الطباعة */
    .print-btn {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        font-size: 16px;
        margin-top:120px; 
        margin-bottom:-50px; 
    }

    .print-btn:hover {
        background-color: #45a049;
    }

    /* تنسيق للطباعة */
    @media print {
        .print-btn {
            display: none; /* إخفاء زر الطباعة عند الطباعة */
        }

        .taskbar{

            display: none;
        }
    }
</style>



<button class="print-btn" onclick="window.print()">طباعة</button>

<table>
    <thead>
        <tr>
            <th>اسم العميل</th>
            <th>إجمالي المديونية</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ClintData as $data)
            <tr>
                <td>{{ $data['Clint']->name }}</td> <!-- اسم العميل -->
                <td>{{ $data['Net'] }}</td> <!-- إجمالي الفواتير -->
            </tr>
        @endforeach
    </tbody>
</table>

