<?
    session_start();
    include "../common/db_info.php";
    $query = "DELETE *
                FROM wishlist
                WHERE mem_id = '$_SESSION[mem_id]'";
    $rs = mysql_query($query, $conn);    
    session_unset();    // 세션저장된 변수를 모두 삭제
    session_destroy();  // 세션 종료
?>
<script>
    location.href="../index.php";
</script>