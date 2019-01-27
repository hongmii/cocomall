<?
    include "db_info.php";

    $no =(isset($_GET['no']))?$_GET['no']:0;      // 게시물 시작 인덱스 번호


    $page_size = 10;        // 한페이지 게시물 갯수
    $page_list_size = 10;   // 한리스트 페이지 갯수

    $PHP_SELF = $_SERVER['PHP_SELF'];

    $query = "SELECT * FROM costumerservice ORDER BY mem_id DESC LIMIT $no, $page_size";

    $result = mysql_query($query, $conn);

    $query = "SELECT count(*) FROM costumerservice";
    $count = mysql_query($query, $conn);
    $rs = mysql_fetch_row($count);


    // 총게시물 갯수와 총페이지수 계산
    $total_row = $rs[0];    //
    echo "total_row: " . $total_row;

    if($total_row <= 0){
        $total_row = 0;
    }
    //total_page는 0부터, 페이지갯수 9/10 = 1
    $total_page = floor(($total_row -1) / $page_size);

    $current_page = floor($no / $page_size);

?>

<html  lang="ko">
<head>
    <meta charset="UTF-8">    
    <link rel="stylesheet" href="cs_2.css">
    <title>Document</title>
<script>


</script> 

</head>

<body>

<div>
<center>
        <hr>
        <div class="sub_visual2">
            
            <img src="cs_img.jpg">
        </div>
<center>
    <h1>  고객센터  </h1>
    <h3> Costumer Center </h3>
</center>

<table height="140px">
<thead class="thead1">
    <tr>
        <th class="th1">공지사항</th>
        <th class="th1">자주찿는 질문</th>
        <th class="th3" >1:1문의</th>
    </tr>
</thead>
</table>

<br>

<table class="td11" height="140px"> 
<tr>
<td>
    <center>구객님께서 찿으시는 질문을 검색해주세요.</center><br>
    <center>
    <select>
        <option>전체검색</option>
        <option>배송</option>
        <option>화불</option>
        <option>쿠폰</option>
        <option>주문확인</option>
    </select>
    <input type="text" size="60">
    </center>
</td>
</tr>
</table>

<br>

<table>
    <thead>
        <tr>
        <th class="th3">1:1문의검색</th>
        <th class="th1">1대1문의신청</th>
        </tr>
    </thead>
</table>
            
<div id="faqTable">
    <table class="tableContent">
        <tr>
            <th class="col1">No</th>
            <th class="col2">제목</th>
            <th class="col3">등록일</th>
        </tr>
        <?
            while(list($qa_seq,$mem_id,$qa_title,$qa_conttext,$cs_name,$cs_email,$wdate,$view) = mysql_fetch_array($result)){

        ?>
        <tr class="text_bold">
            <td class="col1">
            <a href="cs_3.php?id=<?=$mem_id?>&no=<?=$no?>">
            <?=$mem_id?></a>
            </td>
            <td class="col2" class="sptd">
            <a href="cs_3.php?id=<?$mem_id?>&no=<?=$no?>">   
            <?=strip_tags($qa_title, '<b><i>');?></a>
            </td>
            <td class="col3" class="sptd">
            <?=$wdate?></a>
            </td>
        </tr>
        <?
            }
            mysql_close($conn);
        ?>
    </table>

    </div>
<?
            // 페이지리스트 첫번째 페이지 구하기
            // 0, 10, 20, 30, 40..계산 1 / 10 = (int)0.1 = 0 의미
            $start_page = (int)($current_page / $page_list_size) * $page_list_size;

            // 페이지리스트 마지막 페이지 구하기.
            //0부터 시작함 첫번째페이지 + 9페이지 = 마지막페이지
            $end_page = $start_page + $page_list_size - 1; 
            // 그런데
            //If($total_page < $send_page) $end_page = $total_page;
            # 이전페이지 리스트 필요할때
            //시작페이지가 페이지리스트보다 클때
            if($start_page >= $page_list_size){
                $prev_list = ($start_page-1) * $page_size;
               echo "<a href=\"$PHP_SELF?no=$prev_list\"> << </a> ";
            }

             ## 
             for($i = $start_page; $i <= $end_page; $i++){
                $page = $i * $page_size;    //페이지값을 no로 변환
                $page_num = $i + 1;         //보여질 페이지 번호
                echo "<a href=\"$PHP_SELF?no=$page\"> ";
                echo "$page_num";
                echo "</a>";
            }

                // next page
            if($total_page > $end_page){
                $next_list = ($end_page + 1) * $page_size;
                echo "<a href=\"$PHP_SELF?no=$next_list\"> << </a> ";
            }

?>
</font>
</td>
</tr>
</table>
<a href="reply.html"></a>
    
</center>
</div>
</body>
</html>