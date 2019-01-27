<?  
    session_start();
    echo $_SESSION['mem_id'];
    echo "<br>";
    echo "Hello ".$_SESSION['mem_name'];
    

    include "../common/db_info.php";
    
?>