<?

    session_start();
    include "../common/db_info.php";
    $mem_id = $_SESSION['mem_id'];
    
    
    $deleteItem = $_GET['product_id'];
    echo $deleteItem;


    $query = "DELETE FROM cart
            WHERE  prod_id = '$deleteItem'";

    $rs = mysql_query($query, $conn);

    echo $query;

    if ($rs){
        echo "삭제 성공";
        echo "<script>location.href='/cart/cart.php'</script>";
    } else {
        echo "삭제 실패";
    }

?>