<!DOCTYPE html>
<html>
<head>
<style>
  .l a {
    background-color: black;
    padding: 65px;
    font-size: 60px;
    color: aliceblue;
    text-decoration: none; /* إزالة الخط السفلي */
    display: inline-block; /* تأكد من أن العنصر يمكن تحريكه بشكل صحيح */
  }

  #link {
    margin-top: 250px; /* تحريك العنصر لأسفل */
    margin-left: 550px; /* تحريك العنصر لليمين */
    margin-right:50px;
  }
</style>
</head>
<body>
  @extends($layout)   
    <div class="l">
  <a href="{{route("new_fabrics_cash_recite")}}" id="link">كاش</a>
  <a href="{{route("deferred_fabrics_recite")}}">اجل</a>

</div>
</body>
</html>
