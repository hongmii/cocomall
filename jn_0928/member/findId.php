<?

    $userNm = $_POST['userNm'];
    $phone = $_POST['phone'];
    include "../common/db_info.php";

    $query = "SELECT COUNT(*) as count, mem_id
            FROM member
            WHERE mem_name = '$userNm' AND mem_tel = '$phone' ";

    $rs = mysql_query($query, $conn);

    $row = mysql_fetch_array($rs);
    // $str = "{count:$row[count], memId:'$row[mem_id]'}";
    echo json_encode($row, JSON_UNESCAPED_UNICODE);


?>