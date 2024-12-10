<!--

    @extends($layout)   
    


  <style>
    /* تنسيق الجدول */
    table {
      width: 70%;
      border-collapse: collapse;
      margin-top: 100px;
      font-size: 25px;
      margin:auto;
      margin-top: 100px;

    }

    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: center;
    }

    th {
      background-color: #f2f2f2;
    }
  </style>

  <h2>قائمة الأقمشة</h2>

  <table>
    <thead>
      <tr>
        <th>البيان</th>
        <th>عدد الأثواب</th>
        <th>عدد الأمتار</th>
        <th>سعر المتر</th>
        <th>الكود </th>
        <th>المجموع</th>
      </tr>
    </thead>
    <tbody>
      @foreach($All_Fabrics as $Fabric)
        <tr>
          <td>{{ $Fabric->details }}</td>
          <td>{{ $Fabric->much_of_fabricrobe }}</td>
          <td>{{ $Fabric->much_of_fabricmeter }}</td>
          <td>{{ $Fabric->price }}</td>
          <td>{{ $Fabric->code }}</td>

          <td>{{ $Fabric->total }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

