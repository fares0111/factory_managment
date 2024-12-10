<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>طباعة الفاتورة</title>
    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            #invoice-print-area, #invoice-print-area * {
                visibility: visible;
            }
            #invoice-print-area {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                z-index: 1000;
            }
        }
    </style>
</head>
<body>
    <button id="print-invoice-btn">طباعة الفاتورة</button>

    <div id="invoice-print-area" style="display: none;">
        <!-- محتوى الفاتورة سيظهر هنا -->
    </div>

    <script>
        document.getElementById('print-invoice-btn').addEventListener('click', function() {
            fetch('/print-invoice', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    invoice_id: /* ID الفاتورة هنا */
                })
            })
            .then(response => response.json())
            .then(data => {
                // ترتيب البيانات وإدراجها في عنصر الطباعة
                let printArea = document.getElementById('invoice-print-area');
                printArea.innerHTML = `
                    <h1>فاتورة رقم ${data.id}</h1>
                    <p>اسم العميل: ${data.customer_name}</p>
                    <p>المبلغ: ${data.amount}</p>
                    <!-- أضف المزيد من الحقول حسب الحاجة -->
                `;
                printArea.style.display = 'block';

                // طباعة الفاتورة
                window.print();

                // إخفاء منطقة الطباعة بعد الطباعة
                printArea.style.display = 'none';
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
</body>
</html>
