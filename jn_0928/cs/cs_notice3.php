<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" media="screen" href="cs_notice.css" />
    <script src="main.js"></script>


</head>

<body>
    <div id="contentWrap">
        <!--contentWrap start 전체 내용 감싸는 콘텐츠-->
        <div class="bbsmenu">
            <!--bbsmenuClear strart 상단 메뉴 -->
            <div class="menubox">
                <!-- menubox start -->
                <div class="treemenu">
                    <!-- treemenu 상단메뉴 내용 start -->
                    <a href="">Home</a>
                    <span>고객센터</span>
                    <span class="on">공지사항</span>
                </div>
                <!-- treemenu 상단메뉴 내용 end  -->
            </div>
            <!-- menubox end -->
        </div>
        <!--.bbsmenuClear end-->

        </h2>
        <!-- .bbstit end 고객센터텍스트 ~ 메인메뉴박스 -->


        <div id="content" class="photoreview">
            <!-- #content/.photoreview start   고객센터 ~ 글쓰기(끝) -->
            <h2 class="bbstit">
                <!-- .bbstit start 고객센터텍스트 ~ 메인메뉴박스 -->

                고객센터
                <br>
                <span>Customer Center</span>
            </h2>
            <div class="sub_vvisual2">
                    <!--sub vvisual2 start 이미지 -->
                    <img src="cs_img.jpg">
                </div>
                <!--sub vvisual2 end 이미지 -->
            <!-- .bbstit end 고객센터텍스트 ~ 메인메뉴박스 -->
            <table class="main_menu_box">
                <thead>
                    <tr>
                        <th class="th3">공지사항</th>
                        <th class="th1"><a href="cs_often.html">자주찾는 질문</a></th>
                        <th class="th1"><a href="cs_appli.html">1:1문의</a></th>
                    </tr>
                </thead>
            </table>



            <!-- <div id="faqTable">
                <table class="tableContent">
                    <tr>
                        <th class="col1">No</th>
                        <th class="col2">제목</th>
                        <th class="col3">등록일</th>
                    </tr>
                    <tr class="text_bold">
                        <td class="col1">※</td>
                        <td class="col2" class="sptd">
                            <a href="">[공지]서비스 제공을 위한 개인정보 수집 및 이용 약관 개정안내(2018년 6월21일)</a>
                        </td>
                        <td class="col3" class="sptd">2018.06.15</td>
                    </tr>
                    <tr class="text_bold">
                        <td class="col1">※</td>
                        <td class="col2" class="sptd">
                            <a href="">[공지]개인정보 처리방침 개정안내(2018년 6월21일)</a>
                        </td>
                        <td class="col3" class="sptd">2018.06.15</td>
                    </tr>
                    <tr>
                        <td class="col1">7</td>
                        <td class="col2">
                            <a href="">[공지]개인정보 처리방침 개정안내(2018년 6월15일)</a>
                        </td>
                        <td class="col3">2018.06.08</td>
                    </tr>
                    <tr>
                        <td class="col1">6</td>
                        <td class="col2">
                            <a href="">[공지]일부 브랜드 포인트 적립을 한시적 변경 안내</a>
                        </td>
                        <td class="col3">2018.02.13</td>
                    </tr>
                    <tr>
                        <td class="col1">5</td>
                        <td class="col2">
                            <a href="">[공지]개인정보 처리방침 개정안내(2018년 3월2일)</a>
                        </td>
                        <td class="col3">2018.02.22</td>
                    </tr>
                    <tr>
                        <td class="col1">4</td>
                        <td class="col2">
                            <a href="">[공지]회원 가입약관 개정 안내(2018년 3월2일)</a>
                        </td>
                        <td class="col3">2018.01.29</td>
                    </tr>
                    <tr>
                        <td class="col1">3</td>
                        <td class="col2">
                            <a href="">[공지]통합회원 이용약관 개정 안내(2018년 3월2일)</a>
                        </td>
                        <td class="col3">2018.01.29</td>
                    </tr>
                    <tr>
                        <td class="col1">2</td>
                        <td class="col2">
                            <a href="">[공지]상품 구매 기본 포인트 추가 적립 이벤트종료</a>
                        </td>
                        <td class="col3">2017.06.30</td>
                    </tr>
                    <tr>
                        <td class="col1">1</td>
                        <td class="col2">
                            <a href="">[공지]정기점검으로 인한 서비스 일시중지 -05월 30일(화)</a>
                        </td>
                        <td class="col3">2017.05.26</td>
                    </tr>
                </table>

            </div>
            <!-- #faqTable end 게시물 -->
  
            <input type="submit" value="1" id="numBtn">
        </div>
        <!-- #content/.photoreview start 고객센터 ~ 끝 -->
    </div>
    <!-- #contetnWrap end -->
</body>

</html>













<?
    include "db_info.php";
    
    // 게시물을 짤라서 가져온다. 0, 10, 20, 30...
    $no = (isset($_GET['no'])) ? $_GET['no'] : 0;          // 게시물 시작 인덱스 번호

    $page_size = 10;            // 한페이지 게시물 갯수
    $page_list_size = 10;       // 한리스트 페이지 갯수

    $PHP_SELF = $_SERVER['PHP_SELF'];   // 자기자신의 URL 경로

    $query = "SELECT * FROM costumerservice
              LIMIT $no, $page_size";

    $result = mysql_query($query, $conn);

    $query = "SELECT count(*) FROM costumerservice";
    $count = mysql_query($query, $conn);
    $rs = mysql_fetch_array($count);

    // 총게시물 갯수와 총페이지수 계산
    $total_row = $rs[0];
    // echo "total_row : " . $total_row ."<br>";

    if($total_row <= 0) {
        $total_row = 0;
    }
    // total_page는 0부터 시작 페이지갯수 10/10=1 : 2페이지의 의미 그래서 내림
    $total_page = floor(($total_row - 1) / $page_size);
    // $no (0 : 10 : 20 : 30) 10으로 나우면 페이지 숫자 나옴.
    $current_page = floor($no / $page_size);

?>
<div id="faqTable">
<table class="tableContent">
     <tr>
                        <th class="col1">No</th>
                        <th class="col2">제목</th>
                        <th class="col3">등록일</th>
                    </tr>
<?  
    while(list($qa_seq, $qa_title, $cs_name) = mysql_fetch_array($result)){
        $date = date("Y-m-d", strtotime($date));
?>
     <tr>
       
        <td class="col1"><a href="read.php?id=<?= $id ?>"><?= $qa_seq ?></a></td>
        <td class="col2"><a href="read.php?id=<?= $id ?>"><?= $qa_title ?></a></td>
        <td class="col3"><a href="read.php?id=<?= $id ?>"><?= $date ?></a></td>
       
    </tr>
<?
    }
?>
    <tr align=center>
        <td colspan=4>
        <?
        
        // 페이지 리스트 첫번째 페이지 구하기 
        // 0, 10, 20, 30, 40 ... 계산 1 / 10 * 10 : 0.1 = 0 효과 int=floor 같은효과 
        $start_page = (int)($current_page / $page_list_size) * $page_list_size;
        
        // 페이지 리스트 마지막 페이지 구하기 0부터 시작함. 첫번째 페이지 + 9번째 페이지= 마지막 페이지
        $end_page = $start_page + $page_list_size - 1;
        
        // 그런데 마지막 리스트가 10개가 안될수있기 때문에 사이즈크기로 다시계산
        if($total_page < $end_page) $end_page = $total_page;
        
        ### 이전페이지 리스트 필요할때
        // 시작페이지가 페이지리스트 보다 클때
        if($start_page >= $page_list_size){
            // 시작페이지보다 1 작은 페이지에 10을 곱하면 no(0, 10, 20, ...)가 나온다.
            $prev_list = ($start_page - 1) * $page_size;
            echo "<a href=\"$PHP_SELF?no=$prev_list\"> << </a>";
        }
        ################################################

        ### 페이지 리스트 
        for($i = $start_page; $i <= $end_page; $i++){
            $page = $i * $page_size; // 페이지값을 no값으로 변환
            $page_num = $i + 1; // 보여질때의 페이지값 1,2,3...

            if($no != $page){
                echo "<a href=\"$PHP_SELF?no=$page\">";
            }
            echo " $page_num "; // 보여질 페이지표시
            if($no != $page){
                echo "</a>";
            }
        }
      
        ### 다음페이지 리스트 필요할때
        // 총페이지가 마지막 리스트보다 클때
        if($total_page > $end_page){
            // 마지막페이지보다 1 큰 페이지에 10을 곱하면 no가 나온다
            $next_list = ($end_page + 1) * $page_size;
            echo "<a href=\"$PHP_SELF?no=$next_list\"> >> </a>";
        }
        
        ################################################
        ?>


        </td>
    <tr>
</table>
    </div>
<?
    mysql_close($conn);
?>