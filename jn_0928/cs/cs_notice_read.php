<?
    
include "../include/top.php";



    $nb_seq = $_GET['id'];
    $query = "SELECT * FROM notice_board
           WHERE nb_seq=$nb_seq";
    $result = mysql_query($query, $conn);
    list($nb_seq,$nb_title,$nb_date,$nb_con,$nb_view)=mysql_fetch_array($result);
?>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" media="screen" href="cs_read.css" />
 


</head>




<body>
        <div id="readTable">
            <table class="readContent">
                    <tr class="trTop">
                    <td class="colTitle"><?=$nb_title ?></td>
                    <td class="colVeiw">조회수</td>
                    <td class="colNum"><?= $nb_view ?></td>
                    <td class="colDate"><?= $nb_date ?></td>
                
                </tr>
                        <td colspan="4" class="tdContent"><?= $nb_con ?></td>
                    </tr>
                </table>
                <div class="back_btn"><a href="cs_notice2.php">목록</a><div>
            </div>
           
</body>

<?
    include "../include/footer.php";
?>