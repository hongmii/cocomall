<?
    include "db_info.php";

    $parent_depth = $_POST['parent_depth'];
    $parent_thread = $_POST['parent_thread'];
    $name = $_POST['name']; 
    $email_from = $_POST['email'];
    $title = $_POST['title']; 
    $content = $_POST['content']; 
    $remoteAddr = $_SERVER["REMOTE_ADDR"];

    
    $prev_parent_thread = ceil($parent_thread/1000) * 1000 - 1000;
    
    $query = "UPDATE costumerservice
              SET thread = thread-1 
              WHERE thread > $prev_parent_thread
              AND thread < $parent_thread";
    
    $update_thread = mysql_query($query, $conn);

    // $query = "INSERT INTO costumerservice(id, title, 
    //           content, name, email)
    //           VALUES (NULL, '$title' , '$content' , '$name', '$email_from', $remoteAddr)  ";
              
    $query = "INSERT INTO costumerservice(id, title, content, name, email) VALUES(NULL,";
    $query .=  $parent_thread - 1 .", ";
    $query .=  $parent_depth + 1 .", ";
    $query .= " '$title' , '$content' , '$name', '$email_from', $remoteAddr) ";
    
    echo $query;
    $result = mysql_query($query, $conn);

    mysql_close($conn);

    echo "<meta http-equiv='Refresh' content='1; URL=cs_2.php?no='>";

?>
<center>
<font size=2>정상적으로 저장되었습니다.</font>
</center>