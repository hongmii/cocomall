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
    <meta charset="UTF-8">
    <link rel="stylesheet" href="cs_3.css">
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
    <table>
        <thead>
            <tr>
            <th class="th1" onclick=""><a href="./cs_3.php">공지사항</a></th>
            <th class="th1" onclick=""><a href="./reply.php">자주찿는 질문</a></th>
            <th class="th3" onclick=""><a href="./cs_1.html">1:1문의</a></th>
            </tr>
        </thead>
    </table>
</center>
<div id="faqTable"></div>
<br>
<center>
<form  method="post">
<?
while(list($nb_seq,$nb_title,$nb_date,$nb_con,$nb_view) = mysql_fetch_array($result)){
?>
<textarea name="comments" id="comments" style="width:1000px;padding:2%;height:300px;font:36px/44px cursive;border:10px double grey;">
<?
}
mysql_close($conn);
?>
</textarea><br>
</form>
</center>
</body>
</html>