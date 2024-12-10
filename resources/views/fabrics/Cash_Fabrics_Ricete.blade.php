

فا
You said:
@extends("index")

<style>
  /* تنسيق النموذج */
  form {
    max-width: 500px;
    margin: 100px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
    font-size: 18px;
  }

  .invoice-group {
    margin-bottom: 20px;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #fff;
  }

  label {
    display: block;
    margin-bottom: 5px;
  }

  input[type="text"],
  input[type="number"] {
    width: calc(100% - 12px);
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 16px;
  }

  input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
  }

  input[type="submit"]:hover {
    background-color: #45a049;
  }

  .add-invoice {
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    margin-bottom: 10px;
  }

  .add-invoice:hover {
    background-color: #0056b3;
  }

  .remove-invoice {
    background-color: #dc3545;
    color: white;
    padding: 5px 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    float: right;
  }

  .remove-invoice:hover {
    background-color: #c82333;
  }
</style>
@extends($layout)   
    
<form id="invoiceForm" action="{{ route('insert_fabrics_cash_ricete') }}" method="post">
  @csrf

  <div id="invoiceContainer">
    <div class="invoice-group">
      <button type="button" class="remove-invoice" onclick="removeInvoice(this)">إزالة الفاتورة</button>
      
      <label for="search">المورد:</label>
      <input type="text" class="search" onkeyup="searchCustomer(this)" onfocus="handleSearchFocus(this)" placeholder="ابحث باسم العميل">
      <select class="customerSelect" name="customerSelect[]" onchange="handleSelectChange(this)" style="display: none;">
        <option value="">اختر عميل</option>
      </select>
      <input type="hidden" class="selectedValue" name="selectedValue[]">

      <label for="code">الكود:</label>
      <input type="text" class="code" name="code[]" oninput="fetchDataByCode(this)"><br>

      <label for="details">البيان:</label>
      <input type="text" class="details" name="details[]" ><br>

      <label for="much_of_fabricrobe">عدد الأثواب:</label>
      <input type="number" class="much_of_fabricrobe" name="much_of_fabricrobe[]" oninput="checkAvailableStock(this)"><br>

      <label for="much_of_fabricmeter">عدد الأمتار:</label>
      <input type="number" class="much_of_fabricmeter" name="much_of_fabricmeter[]" oninput="checkAvailableStock(this)"><br>

      <label for="price">سعر المتر:</label>
      <input type="number" class="price" name="price[]" oninput="calculateTotal(this)"><br>

      <label for="total">الإجمالي:</label>
      <input type="text" class="total" name="total[]" ><br>

      <input type="hidden" class="id" name="id[]">
    </div>
  </div>

  <button type="button" class="add-invoice" onclick="addInvoice()">إضافة فاتورة جديدة</button>
  <input type="submit" value="إرسال">
</form>

<script>
  function searchCustomer(input) {
    var query = input.value;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/fabrics/installment/search_fabrics_cash_recite?query=' + encodeURIComponent(query), true);
    xhr.onload = function() {
      if (xhr.status === 200) {
        var customers = JSON.parse(xhr.responseText);
        var select = input.nextElementSibling;
        select.innerHTML = '<option value="">اختر عميل</option>';
        customers.forEach(function(customer) {
          var option = document.createElement('option');
          option.value = customer.name;
          option.textContent = customer.name;
          select.appendChild(option);
        });
        select.style.display = 'block';
      } else {
        console.error('Failed to fetch data');
      }
    };
    xhr.onerror = function() {
      console.error('Request error');
    };
    xhr.send();
  }

  function handleSelectChange(select) {
    var selectedValue = select.value;
    var input = select.previousElementSibling;
    input.value = selectedValue;
    select.style.display = 'none';
  }

  function handleSearchFocus(input) {
    if (input.value.trim() !== '') {
      input.nextElementSibling.style.display = 'block';
    }
  }
/*
  function fetchDataByCode(input) {
    var code = input.value;
    if (code) {
      var xhr = new XMLHttpRequest();
      xhr.open('GET', '/api/get_date_for_cash_fabrics_recite?code=' + encodeURIComponent(code), true);
      xhr.onload = function() {
        if (xhr.status === 200) {
          var data = JSON.parse(xhr.responseText);
          if (data) {
            var parent = input.closest('.invoice-group');
            parent.querySelector('.details').value = data.details || '';
            parent.querySelector('.much_of_fabricrobe').value = data.much_of_fabricrobe || '';
            parent.querySelector('.much_of_fabricmeter').value = data.much_of_fabricmeter || '';
            parent.querySelector('.price').value = data.price || '';
            parent.querySelector('.total').value = data.total || '';
            parent.querySelector('.availableFabricRobe').value = data.much_of_fabricrobe || '';
            parent.querySelector('.availableFabricMeter').value = data.much_of_fabricmeter || '';
            parent.querySelector('.id').value = data.id || '';
          } else {
            clearFields(input);
          }
        } else {
          console.error('Failed to fetch data');
        }
      };
      xhr.onerror = function() {
        console.error('Request error');
      };
      xhr.send();
    } else {
      clearFields(input);
    }
  }

  function checkAvailableStock(input) {
    var parent = input.closest('.invoice-group');
    var enteredValue = parseFloat(input.value) || 0;
    var availableValueId = input.classList.contains('much_of_fabricrobe') ? 'availableFabricRobe' : 'availableFabricMeter';
    var availableValue = parseFloat(parent.querySelector('.' + availableValueId).value) || 0;

    if (enteredValue > availableValue) {
      alert('القيمة المدخلة تتجاوز الكمية المتاحة.');
      input.value = availableValue;
    }
    calculateTotal(input);
  }
*/


  function clearFields(input) {
    var parent = input.closest('.invoice-group');
    parent.querySelector('.details').value = '';
    parent.querySelector('.much_of_fabricrobe').value = '';
    parent.querySelector('.much_of_fabricmeter').value = '';
    parent.querySelector('.price').value = '';
    parent.querySelector('.total').value = '';
    parent.querySelector('.availableFabricRobe').value = '';
    parent.querySelector('.availableFabricMeter').value = '';
    parent.querySelector('.id').value = '';
  }

  function calculateTotal(input) {
    var parent = input.closest('.invoice-group');
    var price = parseFloat(parent.querySelector('.price').value) || 0;
    var quantity = parseFloat(parent.querySelector('.much_of_fabricmeter').value) || 0;
    var total = price * quantity;
    parent.querySelector('.total').value = total.toFixed(2);
  }

  function addInvoice() {
    var container = document.getElementById('invoiceContainer');
    var newInvoice = container.querySelector('.invoice-group').cloneNode(true);
    newInvoice.querySelectorAll('input').forEach(function(input) {
      input.value = '';
    });
    container.appendChild(newInvoice);
  }

  function removeInvoice(button) {
    var container = document.getElementById('invoiceContainer');
    if (container.children.length > 1) {
      button.closest('.invoice-group').remove();
    } else {
      alert('لا يمكن إزالة الفاتورة الأخيرة.');
    }
  }
</script>