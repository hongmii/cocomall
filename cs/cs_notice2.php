
<?
 include "../include/top.php";
?>

<!DOCTYPE html>
<html>

<!-- <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" media="screen" href="../css/cs_notice.css" />
   


</head> -->

<body>
    <div id="contentWrap">
        <!--contentWrap start 전체 내용 감싸는 콘텐츠-->
     


        <div id="content" class="photoreview">
            <!-- #content/.photoreview start   고객센터 ~ 글쓰기(끝) -->
            <h2 class="bbstit">
                <!-- .bbstit start 고객센터텍스트 ~ 메인메뉴박스 -->

                고객센터
                <br>
                <span>Customer Center</span>
            </h2>
            <!-- <div class="sub_vvisual2">
                   
                    <img src="cs_img.jpg">
                </div> -->
                <!--sub vvisual2 end 이미지 -->
            <!-- .bbstit end 고객센터텍스트 ~ 메인메뉴박스 -->
            <table class="main_menu_box">
                <thead>
                    <tr >
                        <th class="hm_th3" style="text-align: center;">공지사항</th>
                        <th class="hm_th1" style="text-align: center;"><a href="cs_often.php">자주찾는 질문</a></th>
                        <th class="hm_th1" style="text-align: center;"><a href="cs_appli.php">1:1문의</a></th>
                    </tr>
                </thead>
            </table>



            <?
              include "../common/db_info.php";
            $query = "SELECT * FROM notice_board";
            $result = mysql_query($query, $conn);
           
        ?>
        <div id="faqTable">
        <table class="tableContent">
        <tr style="border-bottom:1px solid #e3e3e3; color: #565656;font-size: 12px;">
                                <th class="col1" style="width:200px; padding-top: 10px; padding-bottom: 10px; text-align: center; ">No</th>
                                <th class="col2" style="width:700px; padding-top: 10px; padding-bottom: 10px; text-align: center; ">제목</th>
                                <th class="col3" style="width:300px;  padding-top: 10px; padding-bottom: 10px;text-align: center; ">등록일</th>
                            </tr>
        <? 
            while(list($nb_seq,$nb_title,$nb_date,$nb_con,$nb_view)=mysql_fetch_array($result)){
        ?>
            <tr style="border-bottom:1px solid #e3e3e3; font-size: 13px;" >
                <td class="Tcol1" style="width:200px; height:41px;"><?= $nb_seq ?></td>
                <td class="Tcol2" style="width:700px; height:41px; text-align:left;" ><a href="cs_notice_read.php?id=<?= $nb_seq ?>"><?= $nb_title ?></a></td>
                <td class="Tcol3" style="width:300px; height:41px;"><?= $nb_date ?></td>
        
            </tr>
        <?
            }
        ?>
        
        </table>

            </div>
            <!-- #faqTable end 게시물-->
            <input type="submit" value="1" id="numBtn">
        </div>
        <!-- #content/.photoreview start 고객센터 ~ 끝 -->
    </div>
    <!-- #contetnWrap end -->
</body>

<?
    include "../include/footer.php";
?>
</html>
