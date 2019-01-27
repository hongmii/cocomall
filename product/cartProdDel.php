<?
    include "../common/db_info.php";

    $mem_id = $_GET['mem_id'];
    $prod_id = $_GET['prod_id'];


    $query = "SELECT COUNT(*) FROM cart
               WHERE mem_id = $mem_id AND prod_id= $prod_id ";
    $rs= mysql_query($query, $conn);  
    
    $row= mysql_fetch_row($rs);
    if($row[0]==0){
        die("조건이 맞는경우가 없어 삭제실패".mysql_error());
    }
    
    
    $query = "DELETE FROM cart
                WHERE mem_id = $mem_id AND prod_id=$prod_id ";
    $result= mysql_query($query, $conn);
    if($result){
        echo "<meta http-equiv='Refresh' content='1; URL=myCart.php'>";
    }else{
        echo "삭제실패";
    }
    

?>