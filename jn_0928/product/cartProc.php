<?
    include "../common/db_info.php";

    $mem_id =  $_POST['mem_id'];
    $prod_id = $_POST['prod_id'];
    $cart_qt = $_POST['cart_qt'];
    $cart_pr = $_POST['cart_pr'];
    
    $query = "INSERT INTO cart(mem_id,prod_id,cart_qt,cart_pr,cart_dt)
                VALUES ('$mem_id','$prod_id',$cart_qt,$cart_pr,now())";  
    
    $ajaxRs = mysql_query($query,$conn);
     echo json_encode($ajaxRs);
?>