<?
include "../include/top.php";

    $name = $_POST['name'];
    $home_tel = $_POST['home_tel'];
    $mem_tel = $_POST['mem_tel'];
    $mem_pwd = $_POST['mem_pwd'];
    $mem_addr1 = $_POST['addr1'];
    $mem_addr2 = $_POST['addr2'];
    $mem_addr3 = $_POST['addr3'];

    include "../common/db_info.php";

    $saveInsert_query = "UPDATE member SET mem_name = '$name', home_tel = '$home_tel', mem_tel = '$mem_tel', mem_pwd = '$mem_pwd', mem_addr1='$mem_addr1', mem_addr2='$mem_addr2', mem_addr3= '$mem_addr3'
                    WHERE mem_id = '$_SESSION[mem_id]'";

    $rs = mysql_query($saveInsert_query, $conn);

    if($rs){
        echo "<meta http-equiv='Refresh' content='1; URL=mypage.php'>";
    }
    
?>