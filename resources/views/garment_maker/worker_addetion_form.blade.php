<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker</title>
    <style>
        body {
            background-color: blue;
            color: white;
        }
        input, select {
            padding: 12px;
            font-size: 20px;
            margin: 10px 0;
            box-sizing: border-box;
        }
        form {
            font-size: 30px;
        }
        .value {
            font-size: 25px;
        }
        #expenseForm {
            margin: 50px;
            margin-top: 100px; /* Adjust this value as needed */
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .form-group {
            flex: 1 1 30%; /* Adjust the width of each field */
            min-width: 200px; /* Set a minimum width to handle small screens */
        }
        .form-group-full {
            flex: 1 1 100%; /* Full width for the button */
        }
        table {
            margin: 50px;
            width: 90%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid white;
            padding: 10px;
            text-align: left;
        }
        #addExpense{

            font-size:25px;
        }

        #saveExpenses{

font-size:25px;
}

#main{

margin-top:100px;
color:red;


}
    </style>


<h1 id="main">اضافة انتاج صنايعي</h1>


    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    @extends($layout)   


    <form id="expenseForm">
        @csrf
        <div class="form-group">
            اسم الصنايعي
            <select id="name">
                @foreach($Workers as $Worker)
                    <option value="{{$Worker->name}}"> {{$Worker->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            عدد القطع
            <input type="number" id="much">
        </div>
        <div class="form-group">
            سعر القطعة
            <input type="number" id="price">
        </div>
        <div class="form-group">
            التاريخ
            <input type="date" id="date">
        </div>

        <div class="form-group">
            الصنف
            <input type="text" id="type">
        </div>
        <div class="form-group">
            وصف الموديل
            <input type="text" id="details">
        </div>
        <div class="form-group">
            الملاحظات
            <input type="text" id="comments">
        </div>
        <div class="form-group-full">
            <button type="button" id="addExpense">تسجيل</button>
        </div>
    </form>


    <table id="expensesTable">
        <thead>
            <tr>
                <th>الصنايعي</th>
                <th>العدد</th>
                <th>السعر</th>
              
                <th>الصنف</th>
                <th>وصف الموديل</th>
             
            </tr>
        </thead>
        <tbody>
            <!-- Rows will be added here dynamically -->
        </tbody>
    </table>

    <button id="saveExpenses">حفظ الكل</button>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            let expenses = [];

            document.getElementById('addExpense').addEventListener('click', () => {
                const name = document.getElementById('name').value;
                const much = document.getElementById('much').value;
                const price = document.getElementById('price').value;
                const date = document.getElementById('date').value;
                const type = document.getElementById('type').value;
                const details = document.getElementById('details').value;
                const comments = document.getElementById('comments').value;

                if (name && much && price && type && details) {
                    const expense = {
                        name: name,
                        much: parseFloat(much),
                        price: parseFloat(price),
                        date: date || '',
                        type: type,
                        details: details,
                        comments: comments || '',
                    };

                    expenses.push(expense);
                    appendExpenseToTable(expense);

                    document.getElementById('expenseForm').reset();
                } else {
                    alert('Please fill out all required fields.');
                }
            });

            document.getElementById('saveExpenses').addEventListener('click', () => {
                if (expenses.length > 0) {
                    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                    fetch('{{ route('insert_addetion') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': token
                        },
                        body: JSON.stringify({ expenses: expenses })
                    })
                    .then(response => response.json())
                    .then(data => {
                        alert('Expenses saved successfully!');
                        expenses = [];
                        document.getElementById('expensesTable').querySelector('tbody').innerHTML = '';
                    })
                    .catch((error) => {
                        console.error('Error:', error);
                        alert('Error saving expenses. Please try again later. Error details: ' + error);
                    });
                } else {
                    alert('No expenses to save.');
                }
            });

            function appendExpenseToTable(expense) {
                const row = `<tr>
                    <td>${expense.name}</td>
                    <td>${expense.much.toFixed(2)}</td>
                    <td>${expense.price.toFixed(2)}</td>
                
                    <td>${expense.type}</td>
                    <td>${expense.details}</td>
                
                </tr>`;
                document.getElementById('expensesTable').querySelector('tbody').insertAdjacentHTML('beforeend', row);
            }
        });
    </script>
</body>
</html>
