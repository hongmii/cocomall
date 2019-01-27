<?
    include "../include/top.php";
    /* 페이징 */
    $no = (!empty($_GET['no'])) ? $_GET['no'] : 0; 

    $prod_cat=(!empty($_GET['prod_cat'])) ? $_GET['prod_cat'] : 'A'; 

    //넘겨진 데이터 받는곳
    $field=(isset($_GET['field']))?$_GET['field'] : "title";;
    $sword = (isset($_GET['sword']))?$_GET['sword'] : "";

    $page_size = 20;
    $page_list_size = 10;

    $PHP_SELF = $_SERVER['PHP_SELF']; //자기자신의 URL 경로
    $where = "";
    if($sword != ""){
        $where = " AND $field LIKE '%$sword%'";
    }
    $query = "SELECT * FROM product_list
                WHERE  prod_cat='$prod_cat'$where
                ORDER BY prod_id DESC             
                LIMIT $no, $page_size";
    
    $result = mysql_query($query, $conn);
    $query = "SELECT COUNT(*) FROM product_list
                WHERE  prod_cat='$prod_cat'";
    $count = mysql_query($query, $conn);
    $rs = mysql_fetch_row($count);

    //총게시물 갯수와 총페이지수 계산
    $total_row = $rs[0];    //총 게시물 갯수


    if($total_row <= 0){
        $total_row = 0;
    }
    //total_page는 0부터 시작, 페이지 갯수 10/10 =1 : 2페이지를 의미
    $total_page = floor(($total_row -1) / $page_size);

    $current_page = floor($no / $page_size);//내부적으로 인덱스 페이지(밑의 숫자)


    

?>
<script>
        
    function insertCart(div, uid, pid, pqn, ppr){
        
        event.preventDefault();
        if(uid ==''){
            alert("로그인을 하셔야 합니다."); 
            location.href = "../member/loginMain.php";
        }else{
            $.ajax({
                url: "cartProc.php",
                type: "post",
                data: {mem_id:uid, prod_id:pid , cart_qt:pqn, cart_pr:ppr},
                dataType: "json",
                success:function(data){
                
                    if(data){
                        if(div =='cart'){
                            var b = confirm("카트에 담았습니다.");
                            if(b) location.href="../cart/cart.php";
                        }else{
                            alert("구매페이지로 이동합니다.");
                            location.href="../cart/orderAllNew.php";
                        }  
                    }else{
                        alert("이미 카트에 담겨있습니다.");
                        location.href="../cart/cart.php";
                    }
                },
                error:function(request,status,error){
                    alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                }
            });
        }
    };
</script>


    <div class="s_wrap">
        <!-- S: top_img -->
        <div class="t_img">
            <img src="../images/product/t_img1.png" alt="">
        </div>
        <!-- E: top_img -->
        <div class="list_paging">

        </div>
        <!-- S: title & sort -->
        <div class="s_section">
            <h2 class="subTitle">
                <?
                    if($prod_cat=='A') echo'식기<span class="inlineB sTitle">TABLEWARE</span>'; 
                    if($prod_cat=='B') echo'침구<span class="inlineB sTitle">BEDDING</span>';
                    if($prod_cat=='C') echo'수납<span class="inlineB sTitle">STORAGE</span>';
                    if($prod_cat=='D') echo'소품<span class="inlineB sTitle">PROPS</span>';
                    if($prod_cat=='E') echo'장식<span class="inlineB sTitle">DECORATION</span>';
                ?>
            </h2>

        </div>
        <!-- E: title & sort -->
        <div class="sort">
            <ul class="fr sort_p">
                <li class="fl best">
                    <a href="#">BEST</a>
                </li>
                <li class="fl s_pl new">
                    <a href="#"></a>NEW</li>
                <li class="fl s_pl hPrice">
                    <a href="#"></a>높은가격순</a>
                </li>
                <li class="fl s_pl lPrice ">
                    <a href="#"></a>낮은가격순</a>
                </li>
            </ul>
            <div class="list_paging">
            <ul class="fr list_p">
                <li class="fl">
                    <a href="#">20</a>
                    <a href="#">40</a>
                    <a href="#">모두보기</a>
                </li>
                <li class="fl num">
                    <div>
                        <input type="text" value="1" size="5">/
                        <a href=""><?= $total_row?></a>
                    </div>
                    <a href=""></a>
                </li>
            </ul>
        </div>
        </div>
        
        <!-- S: PRODUCT -->
        <div class="list_box">
            <div class="items">
                <ul class="fl">
                    <!-- S: PRODUCT ITEM While문 -->
                    <?
                         while(list($prod_id, $prod_cat, $prod_name, $prod_detail, $prod_meterial, $prod_made, $prod_size, $prod_img1, $prod_img2, $prod_img3, $prod_img4, $prod_pr, $prod_color, $prod_qt, $prod_sold, $prod_regw, $prod_rate, $reg_dt)=mysql_fetch_array($result)){
                    ?>
                    <li class="fl item_con">
                            <div class="img">
                                <a href="./product_detail.php?prod_id=<?=$prod_id?>&prod_cat=<?=$prod_cat?>">
                                    <img src="../images/product/<?= $prod_img1 ?>" alt="" width="277px" height="277px">
                                </a>
                            </div>
                            <div class="prodNm"><?= $prod_name ?></div>
                            <div class="prodPr"><?= number_format($prod_pr) ?>원 </div>
                            <div class="prodRev">
                                <ul>
                                    <?
                                        $fav=5;
                                        for($i =1; $i <=$fav; $i++){
                                    ?>
                                        <li class="star">
                                            <?
                                            // DB에서 가져온 별 갯수

                                            if($i<=$prod_rate){
                                                echo "<img src='../images/common/star.png'>";
                                            }else{
                                                echo "<img src='../images/common/star_bg.png'>";
                                            } 
                                            ?>                                        
                                        </li>
                                    <?
                                        }
                                    ?>
                                    
                                </ul>
                            </div>
                            <!-- S: 쇼핑백 -->

                            <!-- <input onclick="javascript:insertCart('cart','<?= $mem_id?>', '<?= $prod_id?>', 1 ,<?= $prod_pr?> )" type="button" value="쇼핑백"> -->
                            
                            <!-- E: 쇼핑백 -->
                            <!-- S: 구매 -->
                            <!-- <input onclick="javascript:insertCart('order','<?= $mem_id?>', '<?= $prod_id?>', 1 ,<?= $prod_pr?> )" type="button" value="구매"> -->
                            <!-- E: 구매 -->
                    </li>
<?
    }
?>
                    <!-- E: PRODUCT ITEM While문 -->
                </ul>
            </div>
            <!-- S: paging -->
        </div>
        <div class=" list_cnt">
            <ul class="pagination inline list_cnt_ul">
                <li>
                <!-- S: 페이징 num -->
 <?
                    //페이지리스트 첫번째 페이지 구하기 
                    // 0, 10, 20, 30, 40...계산 1/10 = (int)0.1 = 0 의미
                    $start_page = (int)($current_page/$page_list_size) * $page_list_size;//int 소수점이하는 자른다.인덱스 

                    // 페이지리스트 마지막 페이지 구하기
                    // 0부터 시작함 첫번째페이지 + 9페이지 = 마지막페이지
                    $end_page = $start_page + $page_list_size -1;
                    // 그런데 마지막 리스트가 10개가 안될수 있기 때문에 
                    // 마지막 페이지와 전체 페이지를 비교해서 다시 계산
                    if($total_page < $end_page) $end_page = $total_page;
                    # 이전페이지 리스트 필요할때
                    // 시작페이지가 페이지리스트보다 클때
                    if($start_page >= $page_list_size){
                        $pre_list = ($start_page - 1)  * $page_size;
                        echo "<a href=\'$PHP_SELF?no=$pre_list\'> << </a>";
                    }

                    ## 페이징
                    for($i = $start_page; $i <= $end_page; $i++){
                        $page = $i * $page_size;    //페이지값을 no로 변환
                        $page_num = $i + 1;         //보여질 페이지 번호

                        echo "<a class='active' href=\"$PHP_SELF?no=$page&field=$field&sword=$sword\">";
                        echo "$page_num ";
                        echo "</a>";
                    }

                    # 다음페이지 리스트 필요할때
                    // 총페이지가 마지막 페이지보다 클때
                    if($total_page > $end_page){
                        $next_list = ($end_page + 1) * $page_size;
                        echo "<a href=\'$PHP_SELF?no=$next_list\'> >> </a>";
                        alert(1);
                    }
?>
                <!-- E: 페이징 num -->
            </li>
            </ul>

        </div>
        <!-- E: paging -->

        <!-- E: PRODUCT -->
    </div>
</body>
<?
    include "../include/footer.php";
?>