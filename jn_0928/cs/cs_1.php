<?php

include "../common/db_info.php";
include "../include/top_main.php";

    $mem_id = $_SESSION['mem_id'];
    $name = $_POST['name']; // required
    $title = $_POST['title']; // not required
    $content = $_POST['content']; // required
    
    $query = "INSERT INTO onetoone (oto_name, oto_title, oto_con, mem_id)
              VALUES ('$name', '$title' , '$content', '$mem_id')";
     
     echo $query;
     $rs = mysql_query($query, $conn);
    
     echo '<script>window.location.href = "cs_list.php";</script>';
?>              