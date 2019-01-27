<?
    include "../include/top.php";
    // session_start();

    $memInfo_query = "SELECT * 
                    FROM member
                    WHERE mem_id = '$_SESSION[mem_id]'";
    $result1 = mysql_query($memInfo_query, $conn);
    $row1 = mysql_fetch_array($result1);



?>

    <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js?autoload=false"></script>
    <script src="../js/changeInfo.js"></script>
    
    <link rel="stylesheet" href="../css/mmpp.css" type="text/css">
</head>
<body>

    <section id="center">
    <h2 id="charset-title">고객정보</h2>
    <form id="submitChange" action="insertChangeInfo.php" method="POST">
        <table class="customerInfo">
            <tr class="customerInfo_1">
                <th>이름</th>
                <td class="col1">
                    <input type="text" style="height: 25px; width: 250px;" name="name" value=<?= $row1['mem_name'] ?>>
                </td>
                <th>전화번호</th>
                <td class="col2">
                    <input type="text" style="height: 25px; width: 250px;" id="home_tel" name="home_tel" size="11" value=<?= $row1['home_tel']?>>
                </td>
            </tr>
            <tr class="customerInfo_2">
                <th>이메일 주소</th>
                <td class="col1">
                    <input type="text" style="height: 25px; width: 250px;" id="mem_id" name="mem_id" value=<?= $_SESSION['mem_id'] ?> readonly>
                </td>
                <th>휴대폰 번호</th>
                <td class="col2">
                    <input type="text" style="height: 25px; width: 250px;" id="mem_tel" name="mem_tel" size="11" value=<?= $row1['mem_tel'] ?> >
                </td>
            </tr>
            <tr class="customerInfo_3">
                <th>새비밀번호</th>
                <td class="col1">
                    <input type="password" style="height: 25px; width: 250px;" id="mem_pwd" name="mem_pwd" value=<?= $row1['mem_pwd'] ?>>
                </td>
                <th>비밀번호 확인</th>
                <td class="col2">
                    <input type="password" style="height: 25px; width: 250px;" id="mem_pwd2" name="mem_pwd2" size="11" value=<?= $row1['mem_pwd'] ?>>
                </td>

                
            </tr>
            <tr>
                <th>주소</th>
                <td colspan="3" class="col3">
                    <ul class="address">
                        <li style="list-style: none">
                            <input type="text" style="height: 25px; width: 88px;" id="addr1" name="addr1" value=<?= $row1['mem_addr1'] ?>>
                            <input class="btnD" type="button" name="zipSearchbtn" id="zipSearchbtn" value="우편검색">
                             <!-- style="vertical-align: middle;width: 100px; height: 28px;border: 1px solid #333;background-color: #fff; color:#333 ;line-height: 32px;"> -->
                        </li>
                        <li style="list-style: none">
                            <input type="text" placeholder="&nbsp;&nbsp;[도로명주소]" style="height: 25px; width: 768px;" id="addr2" name="addr2" value=<?= $row1['mem_addr2'] ?>>
                        </li>
                        <li style="list-style: none">
                            <input type="text" placeholder="&nbsp;&nbsp;[지번주소]" style="height: 25px; width: 768px;" id="addr3" name="addr3" value=<?= $row1['mem_addr3'] ?>>
                        </li>
                    </ul>
                </td>
            </tr>
        </table>
        <button class="paymentBtn" type="submit">수정하기</button>
</form>

    <!-- <button class="paymentBtn" type="button" onclick="location.href='mypage.php'">GO BACK</button> -->

</section>

</body>
<?
    include "../include/footer.php";
?>