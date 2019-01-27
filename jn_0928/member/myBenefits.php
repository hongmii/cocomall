<?
    session_start();
    echo $_SESSION['mem_id'];
    echo "<br>";
    echo "Hello ".$_SESSION['mem_name'];
 


    include "../common/db_info.php";


    $query = "SELECT orders.order_id, orders.mem_id, orders.order_dt 
            FROM orders
            INNER JOIN order_detail ON orders.mem_id = '$_SESSION[mem_name]'";

    $rs = mysql_query($query, $conn);

    while($row = mysql_fetch_array($rs)) {
        echo "<tr><td scope='col'>";
        echo $row['mem_name'];
        // echo "</td><td scope='col'>";   
        // echo $row[''];
        // echo "</td><td scope='col'>";
        // $price = $row['cart_pr'];
        // echo number_format($price).'원';
        // echo "</td><td scope='col'>";
        // $totalPrice = $row['cart_pr'] * $row['cart_qt'];
        // echo number_format($totalPrice).'원';
        // echo "</td><td>";
        // echo $point."P";
        // echo "</td><td scope='col'>";
        // echo "<a href='order1.php?product_id=$row[prod_id]&quantity=$row[cart_qt]&points=$point&price=$price'>GO BACK</a>";
        echo "</td></tr>";
    }
?>

<? include "../include/footer.php";';?>