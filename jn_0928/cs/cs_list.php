<?

include "../include/top.php";


?>

<html>
<head>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" media="screen" href="cs_list.css" />
        <script src="main.js"></script>
    
    </head>
    
</head>
<body>
    <div class="contentWrap"> <!--contentWrap start 전체 내용 감싸는 콘텐츠-->
        <div class="bbsmenu"><!--bbsmenuClear strart 상단 메뉴 -->
            <div class="menubox"><!-- menubox start -->
                <div class="treemenu"> <!-- treemenu 상단메뉴 내용 start -->
                    <a href="/">Home</a>
                    <span>고객센터</span>
                    <span class="on">1대1문의</span>
                </div>        <!-- treemenu 상단메뉴 내용 end  --> 
            </div> <!-- menubox end -->
        </div><!--.bbsmenuClear end-->
        
       
        <div id="content" class="photoreview"> <!-- #content/.photoreview start   고객센터 ~ 글쓰기(끝) -->
            <h2 class="bbstit"> <!-- .bbstit start 고객센터텍스트 ~ 메인메뉴박스 -->
                
                                고객센터
                <br>
                <span>Customer Center</span>
                
                <table class="main_menu_box">
                    <thead>
                        <tr>
                            <th class="th1"><a href="cs_notice.html">공지사항</a></th>
                            <th class="th1"><a href="cs_often.html">자주찾는 질문</a></th>
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
                            <li class="now"><a href="cs_list.php">1:1문의내역</a></li>
                            <li><a href="cs_01.php">1:1문의신청</a></li>
                        </ul> <!-- .faq menu end -->
                    </div> <!-- #faq-category end 서브박스메뉴 -->



<?
    include "../common/db_info.php";
    $query = "SELECT * FROM onetoone";
    $result = mysql_query($query, $conn);
?>
<div id="faqTable">
<table class="tableContent">
<tr>
                        <th class="hm_num" >No</th>
                        <th class="hm_title">제목</th>
                        
                    </tr>
<? 
    while(list($oto_seq,$oto_title)=mysql_fetch_array($result)){
?>
    <tr>
        <td class="col1"><a href="read.php?id=<?= $id ?>"><?= $oto_seq ?></a></td>
        <td class="col2"><a href="read.php?id=<?= $id ?>"><?= $oto_title ?></a></td>
    </tr>
<?
    }
?>

</table>

</div>
</center>