<?
    
include "../include/top.php";



    $oto_seq = $_GET['id'];
    $query = "SELECT * FROM onetoone
           WHERE oto_seq=$oto_seq";
    $result = mysql_query($query, $conn);
    list($oto_seq,$oto_title,$oto_con,$oto_date,$oto_name)=mysql_fetch_array($result);
?>
<!-- <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" media="screen" href="../css/cs_read.css" />
 


</head> -->




<body>
        <div id="readTable">
            <table class="readContent">
                    <tr class="trTop">
                    <td class="colTitle"><?=$oto_title ?></td>
                    <td class="colDate"><?= $oto_date ?></td>
                
                </tr>
                        <td colspan="4" class="tdContent"><?= $oto_con ?></td>
                    </tr>
                </table>
                <!-- <div class="back_btn"><a href="cs_notice2.php">목록</a><div> -->
                <input type="button" value="목록" class="back_btn" a href="cs_list.php">
            </div>
           
</body>

<?
    include "../include/footer.php";
?>