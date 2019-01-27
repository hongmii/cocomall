<?

include "../include/top_main.php";


?>
<link rel="stylesheet" href="cs_1.css">
<body>
   

<center id="cs_center">
    <hr>
    <div class="sub_vvisual2">
        
        <img src="cs_img.jpg">
    </div>

<form action="cs_1.php" method="POST">

<center>
    <h1>  고객센터  </h1>
    <h3> Costumer Center </h3>
</center>

<table height="140px">
    <thead class="thead1">
        <tr>
        <th class="th1" onclick="">공지사항</th>
        <th class="th1" onclick="">자주찿는 질문</th>
        <th class="th3" onclick="">1:1문의</th>
        </tr>
    </thead>
</table>

<br>

<table class="td11" height="140px"> 
    <tr>
    <td> 
        <center>구객님께서 찿으시는 질문을 검색해주세요.
            
        </center><br>
        <center>
        <!-- <select>
            <option>전체검색</option>
            <option>배송</option>
            <option>화불</option>
            <option>쿠폰</option>
            <option>주문확인</option>
        </select> -->
        <input type="text" size="60">
        <button> 검색</button>
        </center>
    </td>
    </tr>
</table>

<br>

<table>
    <thead >
        <tr>
            <th class="th1">1:1문의 검색</th>
            <th class="th3">1대1문의 신청</th>
           
        </tr>
    </thead>
</table>
        
<!-- <table class="table_sign_up" action="cs_1.php" method="post" id="cs1"> -->
        
<br>
<tbody>
    <tr>
        <td class="tda1">
           <center> 문의제목</center>
        </td>
        <td class="tdb1">
            <input type="text" name="title" value="" size="100" required style="border: 1px solid #ccc;"/>
        </td>
    </tr>
    <tr>
        <td class="tda2">
               <center> 문의내용</center>
        </td>
        <td class="tdb2">
            <textarea name="content" rows="10" cols="101" required style="border: 1px solid #ccc;"></textarea>
        </td>
    </tr>
    
    <tr>
        <td class="tda4">
           <center> 이름 </center>
        </td>
        <td class="tdb4">
            <input type="text" name="name" value="" size="50" required style="border: 1px solid #ccc;" >
        </td>
    </tr>
    <tr>
 </tr>
</tbody>

<!-- </table> -->
 <br>
 
 <input type="reset" value="취소" id="btn1" style=" position: static;">  
 <input type="submit" value="Submit" id="btn2" style="position:static;" >
</form>   


</center>

<?
include "../include/footer.php";
?>  