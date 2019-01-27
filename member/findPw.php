<?

    $userNm = $_POST['userNm'];
    $userId = $_POST['userId'];

    include "../common/db_info.php";

    $query = "SELECT COUNT(*) as count, mem_pwd
            FROM member
            WHERE mem_name = '$userNm' AND mem_id = '$userId'";
    
    $rs = mysql_query($query, $conn);

    $row = mysql_fetch_array($rs);

    echo jason_encode($row, JASON_UNESCAPED_UNICODE);
?>