<?
   include "../common/db_info.php";
    $emailId = $_POST['emailId'];
    $emailHost = $_POST['emailHost'];
    $userId = $emailId."@".$emailHost;

    $pwd = $_POST['pwd'];
    $name = $_POST['name'];

    $year = $_POST['years'];
    $month = $_POST['months'];
    $day = $_POST['days'];
    $dob = $year.$month.$day;
    
    $gender = $_POST['gender'];

    $add1 = $_POST['addr1'];
    $add2 = $_POST['addr2'];
    $add3 = $_POST['addr3'];

    $phone1=$_POST['phone1'];
    $phone2=$_POST['phone2'];
    $phone3=$_POST['phone3'];
    $phone = $phone1.$phone2.$phone3;

    

    $query = "INSERT INTO member (mem_id, mem_pwd, mem_name, mem_bir, mem_gender, mem_addr1, mem_addr2, mem_addr3, mem_tel, mem_st, mem_pt)
                VALUES ('$userId', '$pwd', '$name', '$dob', '$gender', '$add1', '$add2', '$add3', '$phone', 'y', 0);";

    $rs = mysql_query($query, $conn);


    echo $query;

    if($rs){
        echo "성공";
        session_start();
        $_SESSION['mem_id'] = $userId;
        $_SESSION['mem_name'] = $name;
        echo "<meta http-equiv='Refresh' content='1; URL=join4.php'>";
        
    } else {
        echo "저장 실패".mysql_error();
    }
