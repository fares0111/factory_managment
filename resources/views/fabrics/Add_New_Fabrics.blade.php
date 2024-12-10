<!-- @extends("index")

  <style>
    /* تنسيق النموذج */
    form {
      max-width: 400px;
      margin: 100px auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #f9f9f9;
      font-size:25px;
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
  </style>

  <form action="{{ route('Insert_Fabrics') }}" method="post">
    @csrf
    
    <label for="The_Code">الكود:</label>
    <input type="text" id="The_Code" name="The_Code"><br>
    

    <label for="The_Details">البيان:</label>
    <input type="text" id="The_Details" name="The_Details"><br>
    
    <label for="Much_OF_Robe">عدد الأثواب:</label>
    <input type="number" id="Much_OF_Robe" name="Much_OF_Robe"><br>
    
    <label for="Much_OF_Meters">عدد الأمتار:</label>
    <input type="number" id="Much_OF_Meters" name="Much_OF_Meters"><br>
    
    <label for="Price_Of_Meter">سعر المتر:</label>
    <input type="number" id="Price_Of_Meter" name="Price_Of_Meter"><br>
    
    <br>
    <input type="submit" value="إرسال">
  </form>

