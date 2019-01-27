

<?
 include "../include/top.php";
?>
<!DOCTYPE html>
<html>
<!-- <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" media="screen" href="../css/cs_oftenq.css" />




</head> -->
<body>
    <div id="contentWrap"> <!--contentWrap start 전체 내용 감싸는 콘텐츠-->

        
       
        <div id="hm_content" class="photoreview"> <!-- #content/.photoreview start   고객센터 ~ 글쓰기(끝) -->
            <h2 class="bbstit"> <!-- .bbstit start 고객센터텍스트 ~ 메인메뉴박스 -->
                
                                고객센터
                <br>
                <span>Customer Center</span>
                <!-- <ul class="bbs_menu_tab">
                    <li><a href="cs_notice.html">공지사항</a></li>
                    <li class="on">자주찾는 질문</li>
                    <li><a href="cs_list.html">1:1문의</a></li>
                </ul> -->
                
                <table class="main_menu_box">
                    <thead>
                        <tr>
                            <th class="th1" style="text-align:center;"><a href="cs_notice2.php">공지사항</a></th>
                            <th class="th3" style="text-align:center;">자주찾는 질문</th>
                            <th class="th1" style="text-align:center;"><a href="cs_appli.php">1:1문의</a></th>
                        </tr>
                    </thead>
                </table>


            </h2> <!-- .bbstit end 고객센터텍스트 ~ 메인메뉴박스 -->
            
            <div id="faqWrap"><!-- #faqWrap start 질문검색박스 ~ 끝까지 -->
                <div class="page-body"> <!-- page-body start 검색박스 ~ 게시판까지 (문의하기/숫자박스제외 -->
                   

                  

                    <div id="faqTable">
                        <table class="tableContent">
                            <tr>
                                <th style="text-align:center; width:150px;">No</th>
                                <th style="text-align:center; width:150px;">구분</th>
                                <th style="text-align:center; width:900px;">제목</th>
                            </tr>
                            <tr>
                                <td class="col1">10</td>
                                <td class="col2">배송/반품/교환/AS</td>
                                <td class="col3" style="text-align:left; padding-left:100px;"><a href="oftenq_read.php">반품/교환 접수를 했는데 회수기사가 오지않아요</a></td>
                            </tr>
                            <tr>
                                <td class="col1">9</td>
                                <td class="col2">배송/반품/교환/AS</td>
                                <td class="col3" style="text-align:left; padding-left:100px;"><a href="oftenq_read.php">사은품을 반품하고 싶어요</a></td>
                            </tr>
                            <tr>
                                <td class="col1">8</td>
                                <td class="col2">배송/반품/교환/AS</td>
                                <td class="col3" style="text-align:left; padding-left:100px;"><a href="oftenq_read.php">상품을 반품하고 싶어요</a></td>
                            </tr>
                            <tr>
                                <td class="col1">7</td>
                                <td class="col2">배송/반품/교환/AS</td>
                                <td class="col3" style="text-align:left; padding-left:100px;"><a href="oftenq_read.php">다른 상품이 왔어요</a></td>
                            </tr>
                            <tr>
                                <td class="col1">6</td>
                                <td class="col2">배송/반품/교환/AS</td>
                                <td class="col3" style="text-align:left; padding-left:100px;"><a href="oftenq_read.php">상품을 교환하고 싶어요</a></td>
                            </tr>
                            <tr>
                                <td class="col1">5</td>
                                <td class="col2">배송/반품/교환/AS</td>
                                <td class="col3" style="text-align:left; padding-left:100px;"><a href="oftenq_read.php">회수기사가 상품을 가져갔는데 교환 환불은 언제되나요?</a></td>
                            </tr>
                            <tr>
                                <td class="col1">4</td>
                                <td class="col2">배송/반품/교환/AS</td>
                                <td class="col3" style="text-align:left; padding-left:100px;"><a href="oftenq_read.php">배송을 받지 못했는데 배송완료가 되어있어요</a></td>
                            </tr>
                            <tr>
                                <td class="col1">3</td>
                                <td class="col2">배송/반품/교환/AS</td>
                                <td class="col3" style="text-align:left; padding-left:100px;"><a href="oftenq_read.php">현재의 배송상태를 알고싶어요</a></td>
                            </tr>
                            <tr>
                                <td class="col1">2</td>
                                <td class="col2">배송/반품/교환/AS</td>
                                <td class="col3" style="text-align:left; padding-left:100px;"><a href="oftenq_read.php">배송비는 얼마인가요?</a></td>
                            </tr>
                            <tr>
                                <td class="col1">1</td>
                                <td class="col2">배송/반품/교환/AS</td>
                                <td class="col3" style="text-align:left; padding-left:100px;"><a href="oftenq_read.php">주문한 상품의 배송은 언제쯤오나요?</a></td>
                            </tr>
                        </table>


                    </div>  <!-- #faqTable end 게시물-->
                    <input type="submit" value="1" id="numBtn">
                </div><!-- page-body end 검색박스 ~ 게시판까지 (문의하기/숫자박스제외 -->
            </div> <!-- #faqWrap end 질문검색박스 ~ 끝까지 -->
        </div> <!-- #content/.photoreview start 고객센터 ~ 끝 -->
    </div> <!-- #contetnWrap end -->
</body>
<?
    include "../include/footer.php";
?>
</html>