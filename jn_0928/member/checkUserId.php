<?

    $emailId = $_POST['emailId'];
    $emailHost = $_POST['emailHost'];
    $userId = $emailId."@".$emailHost;
    
    include "../common/db_info.php";

    $userid_query = mysql_query("SELECT COUNT(*) as count
                                    FROM member
                                    WHERE mem_id = '$userId'");
   
    $result = mysql_fetch_array($userid_query);

    echo $result['count'];
    

?>  