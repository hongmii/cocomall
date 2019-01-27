<? 

    $id = $_POST['userId'];
    $pwd = $_POST['password'];

    include "../common/db_info.php";

    $query = "SELECT COUNT(*) as COUNT, mem_name 
                FROM member 
                WHERE mem_id='$id' AND mem_pwd='$pwd'";

    $result = mysql_query($query, $conn);
    $row = mysql_fetch_array($result);

    if($row['COUNT'] == 1) {
            session_start();
            $_SESSION['mem_id']=$id;
            $_SESSION['mem_name']=$row['mem_name'];
            
        ?>
        <script>
            location.href = "../index.php";
        </script>
        <?
    
    } else {

        ?>
        <script>
            alert('try again');
            location.href= "loginMain.php";
        </script>
        <?
    exit;
    }

?>