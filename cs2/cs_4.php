<?
 include "db_info.php";
 $no = isset($_GET['no']); 

 $PHP_SELF = $_SERVER['PHP_SELF'];

 $query = "SELECT * FROM notice_board";

 $result = mysql_query($query, $conn);

 $query = "SELECT count(*) FROM notice_board";
 $count = mysql_query($query, $conn);
 $rs = mysql_fetch_row();


?>

<html>
<head>
    <link rel="stylesheet" href="cs_4.css">
    <title>Document</title>
</head>
<body>
<center>
    <hr>
    <div class="sub_vvisual2">
        
        <img src="cs_img.jpg">
    </div>
<center>
    <h1>  고객센터  </h1>
    <h3> Costumer Center </h3>
</center>

<table class="td11" height="140px"> 
    <tr>
    <td>
    <center>구객님께서 찿으시는 질문을 검색해주세요.</center>
<br>
    <center>

    <select>
        <option><a href="">전체검색</a></option>
        <option><a href="">배송</a></option>
        <option><a href="">화불</a></option>
        <option><a href="">쿠폰</a></option>
        <option><a href="">주문확인</a></option>
    </select>
    <input type="text" size="60">
    </center>
    </td>
    </tr>
</table>
<table>
    <thead>
    <tr>
        <th class="th3"><a href="">배송</a></th>
        <th class="th1"><a href="">화불</a></th>
        <th class="th1"><a href="">쿠폰</a></th>
        <th class="th1"><a href="">주문확인</a>/th>
    </tr>
    </thead>
</table>
<hr>
<?
/* here */
?>
<div id="faqTable">
<table class="tableContent">
    <tr>
        <th class="col1">No.</th>
        <th class="col2">재품번호</th>
        <th class="col3">주소</th>
        <th class="col4">상태</th>
    </tr>
</table>
<?
/* here */

?>


</center>
</body>
</html>