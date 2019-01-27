<?
    include "../include/top.php";
 

    $savePnt = $_GET['savePnt'];
    $availPnts = $_GET['availPnts'];
    $totalPnts = $savePnt + $availPnts;
   
    $totalAmount = $_GET['totalAmount'];
 

    $order_id = $_GET['order_id'];
    $id = $_GET['mem_id'];
    $sendFrom = $_GET['sendFrom'];
    $sendTo = $_GET['sendTo'];
    $tel = $_GET['mem_tel'];
    $addr1 = $_GET['addr1'];
    $addr2 = $_GET['addr2'];
    $msg = $_GET['msg'];



    $query2 = "UPDATE order_detail
                SET orderDt_paid = '1'
                WHERE order_id = '$order_id'";
    $rs2 = mysql_query($query2, $conn);
     
   
    $query3 = "UPDATE orders SET order_sendTo = '$sendTo', order_tel = '$tel', order_addr1 = '$addr1', order_addr2='$addr2', order_msg='$msg'
                WHERE order_id = '$order_id'";
    $rs3 = mysql_query($query3, $conn);

  



    $query4 = "UPDATE member SET mem_pt = $totalPnts
                WHERE mem_id = '$id'";    
    $rs = mysql_query($query4, $conn);

  
?>


<body>
<div id="container">
        <div id ="content" style="margin:0 auto; width:990px;">
            <h3 class="jc-h2"><a href="../member/mypage.php?mem_id='<?=$mem_id?>'"><?= $_SESSION['mem_name']?></a>님의 쇼핑백</h3>
        <!-- <div class="bgBox step jc-step"> -->
            <!-- <ul class="jc-li" style="width:990px;">
                <li style="padding-left:150px;">쇼핑백</li>
                <li style="padding-left:160px;">주문결제</li>
                <li style="padding-left:170px;">주문완료</li>
            </ul>-->
        </div> 

    <div class="containter" style="padding: 40px 40px 40px 40px; text-align:center">
        <h1 style="font-size: 48px;">결제완료!</h1>
    </div>
<div id="btns" style="text-align:center; padding-bottom: 50px;">
    <button class="joinBtn btn_s_gray btn_240" onclick="location.href='../index.php'">쇼핑 계속하기</button>
    <button class="joinBtn btn_s_gray btn_240" onclick="location.href='/cart/cart.php'">카트</button>
    <button class="joinBtn btn_s_gray btn_240" onclick="location.href='../member/logout.php'">로그아웃</button>
</div>

</body>
<? include '../include/footer.php';?>
</html>