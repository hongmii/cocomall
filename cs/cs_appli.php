<?

include "../include/top.php";


?>
<html>

    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" media="screen" href="cs_appli.css" />
        <!-- <script src="main.js"></script> -->
    
    </head>
    


<body>
    <div class="contentWrap"> <!--contentWrap start 전체 내용 감싸는 콘텐츠-->
        
        
        <form action="cs_1.php" method="POST"> 
        <div id="content" class="photoreview"> <!-- #content/.photoreview start   고객센터 ~ 글쓰기(끝) -->
            <h2 class="bbstit"> <!-- .bbstit start 고객센터텍스트 ~ 메인메뉴박스 -->
                
                                고객센터
                <br>
                <span>Customer Center</span>
                
                <table class="main_menu_box">
                    <thead>
                        <tr>
                            <th class="th1"><a href="cs_notice2.php">공지사항</a></th>
                            <th class="th1"><a href="cs_often.php">자주찾는 질문</a></th>
                            <th class="th3">1:1문의</th>
                        </tr>
                    </thead>
                </table>



            </h2> <!-- .bbstit end 고객센터텍스트 ~ 메인메뉴박스 -->
            <div id="faqWrap"><!-- #faqWrap start 질문검색박스 ~ 끝까지 -->
                <div class="page-body"> <!-- page-body start 검색박스 ~ 게시판까지 (문의하기/숫자박스제외 -->
                    <div class="bbs-hd"> <!--.bbs-hd start 검색박스 전체 감쌈 -->
                        <div class="faq-search"><!--.faq-search start 검색박스 내용 -->
                            <p>고객님께서 찾으시는 질문을 검색해주세요.</p>
                            <div class="search-wrap"><!--search-wrap start 검색창-->
                                <fieldset>
                                    <select class="MS_input_select select-category" id="search-category">
                                        <option value>전체검색</option>
                                        <option value="2">배송</option>
                                        <option value="3">환불</option>
                                        <option value="4">쿠폰</option>
                                        <option value="5">주문확인</option>
                                        <option value="6">교환</option>
                                    </select>
                                    <span class="keyword">
                                        <input id="faqSearch" type="text" value>
                                    </span>
                                </fieldset>
                            </div><!--search-wrap end 검색창-->
                        </div><!--.faq-search end 검색박스 내용 -->
                    </div><!--.bbs-hd end 검색박스전체 -->

                    <div id="faq-category"> <!-- #faq-category start 서브박스메뉴 -->
                        <ul class="faq-menu">
                            <li ><a href="cs_list.php">1:1문의내역</a></li>
                            <li class="now"><a href="">1:1문의신청</a></li>
                        </ul> <!-- .faq menu end -->
                    </div> <!-- #faq-category end 서브박스메뉴 -->
                    <table class="hm_table_sign_up">
                        <tbody>
                            <tr>
                                <td class="hm_tda1">
                                    <center> 문의제목</center>
                                </td>
                                <td class="hm_tdb1">
                                    <input type="text" name="title" value="" style="text-align:left; width:1000px; height:50px; " required/>
                                </td>
                            </tr>
                            <tr>
                                <td class="hm_tda2">
                                    <center> 문의내용</center>
                                </td>
                                <td class="hm_tdb2">
                                    <textarea name="content" style="text-align:left; width:1000px; height:250px; " required></textarea>
                                </td>
                            </tr>

                            <tr>
                                <td class="hm_tda4">
                                    <center> 이름 </center>
                                </td>
                                <td class="hm_tdb4">
                                    <input type="text" style="text-align:left; width:1000px; height:50px;" name="name" value="" size="50" required>
                                </td>
                            </tr>
                        </tbody>
                    </table>


                    <!-- <div id="faqTable">
                        <table class="tableContent">
                            <tr>
                                <th class="num" >No</th>
                                <th class="state">처리상태</th>
                                <th class="title">제목</th>
                            </tr>
                            <tr>
                                <td class="col1">※</td>
                                <td class="col2"><a href="">[공지]서비스 제공을 위한 개인정보 수집 및 이용약관 개정안내(2018년 6월 21일)</a></td>
                                <td class="col3">2018.06.15</td>
                            </tr>
                            <tr>
                                <td class="col1">※</td>
                                <td class="col2"><a href="">[공지]개인정보처리방침 개정안내(2018년 6월 21일)</a></td>
                                <td class="col3">2018.06.15</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="col4">문의내역이 없습니다</td>
                            </tr>
                            
                        </table> -->

                </div>
                <!-- page-body end 검색박스 ~ 게시판까지 (문의하기/숫자박스제외 -->
                <div class="hm_btnArea">
                    <input type="reset" value="취소" id="hm_btn1">
                    <input type="submit" value="등록" id="hm_btn2">
                </div>
                <!-- #faqWrap end 질문검색박스 ~ 끝까지 -->
            </div>
            <!-- #content/.photoreview start 고객센터 ~ 끝 -->
</form>
        </div>
        <!-- #contetnWrap end -->
</body>

<?
include "../include/footer.php";
?>  
</html>