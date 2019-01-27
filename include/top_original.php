<?
    session_start();
    include "../common/db_info.php";
    // session_start();
    $mem_id = (isset($_SESSION['mem_id'])) ? $_SESSION['mem_id']:"" ; 
    $mem_name = (isset($_SESSION['mem_name'])) ? $_SESSION['mem_name']:"" ; 
    $prod_cat=(isset($_GET['prod_cat'])) ? $_GET['prod_cat'] : 'A';
/*     
    if($mem_id=""){
        echo "<script>alert("로그인 하시면 더 많은 혜택이 있습니다.");
                location.href("../member/login.php");
                </script>";
    }

     */
    
    /* 
    $query = "SELECT * from cart
                WHERE mem_id = '$mem_id'";

    $rs = mysql_query($query,$conn);
    list($mem_id, $prod_id,$cart_qt,$cart_pr,$cart_dt)=mysql_fetch_array($rs);
 */
    $query = " SELECT COUNT(*) FROM cart
                 WHERE  mem_id='$mem_id'";
    
    $sBag = mysql_query($query, $conn);
    $cart_rs = mysql_fetch_row($sBag);
    $totalCart = $cart_rs[0];

    /* 검색 */
    $field=(isset($_GET['field']))?$_GET['field'] : "";
    $sword = (isset($_GET['sword']))?$_GET['sword'] : "";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COCOMALL</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


    <link rel="stylesheet" href="../css/t_style.css">
    <link rel="stylesheet" href="../css/footer.css" />
    <link rel="stylesheet" href="../css/customerInfo.css" />
    <link rel="stylesheet" href="../css/join.css" type="text/css">
    <link rel="stylesheet" href="../css/login.css" type="text/css">
    <link rel="stylesheet" href="../css/mypage.css" />
    <!-- <link rel="stylesheet" href="../cs/cs_notice.css" /> -->

   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    
    
    

    <!-- K  -->
    <!-- <script type="text/javascript" src="../js/feedback-modal-window.js"></script> -->
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
    <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
    
    
    
</head>
<body>
    <!-- S: top wrap -->
    <div class="t_wrap">

        <!-- S: container top -->
        <div class="t_container ">
            <div class="ut noto">
                <ul class="fr">
<?
                    if($mem_id == ""){ // 세션없으면 
                        echo "<li class='t_login inlineB'><a class='login' href='../member/loginMain.php' >로그인</a></li><li class='t_reg viewport inlineB'><a href='../member/join1.php' >회원가입</a></li>";                       
                    }else{
                        echo "<li class='t_login inlineB'><a class='logout' href='../member/logout.php' >로그아웃</a></li><li class='t_reg viewport inlineB'><a href='../member/changeInfo.php?mem_id=<?=$mem_id?>' >회원정보수정</a></li>";                        
                    }
?>
                    
                    <li class="t_mypage inlineB ">
                        <a href="../member/mypage.php?mem_id='<?=$mem_id?>'" style='line-height: 26px;'>마이페이지</a>
                    </li>
                    <li class="t_cs inlineB ">
                        <a href="../cs/cs_notice2.php" style='line-height: 26px;'>고객센터</a>
                    </li>
                    <!-- <li class="t_view inlineB ">
                        <a href="">최근본상품</a>
                    </li> -->
                </ul>
            </div>
            <!-- E: container top -->
            <!-- S: gnb  -->
            <div class="gnb">
                <a class="t_logo" href="../index.php">
                    <img src="../images/common/logo.png" alt="logo home">
                </a>
                <!-- S: nav  -->
                <div class="nav">
                    <ul>
                        <li class="fl nav_A">
                            <a href="../product/product_list.php?mem_id=<?=$mem_id?>&prod_cat=A">
                                <img src="../images/common/nav_A.png" alt="식기 tableware">
                            </a>
                        </li>
                        <li class="fl nav_B">
                            <a href="../product/product_list.php?mem_id=<?=$mem_id?>&prod_cat=B">
                                <img src="../images/common/nav_B.png" alt="침구 bedding">
                            </a>
                        </li>
                        <li class="fl nav_C">
                            <a href="../product/product_list.php?mem_id=<?=$mem_id?>&prod_cat=C">
                                <img src="../images/common/nav_C.png" alt="수납 storage">
                            </a>
                        </li>
                        <li class="fl nav_D">
                            <a href="../product/product_list.php?mem_id=<?=$mem_id?>&prod_cat=D">
                                <img src="../images/common/nav_D.png" alt="소품 props">
                            </a>
                        </li>
                        <li class="fl nav_E">
                            <a href="../product/product_list.php?mem_id=<?=$mem_id?>&prod_cat=E">
                                <img src="../images/common/nav_E.png" alt="장식 decoration">
                            </a>
                        </li>

                    </ul>
                </div>
                <!-- E: nav  -->
                <!-- S: gnbR  -->
                <div class="gnbR">
                    <div class="t_cart fr">
                        <!-- <a href="../cart/cart.php?mem_id=<?=$mem_id?>"> -->
                        <a href="#">
                            <img src="../images/common/bag_cnt.png" alt="쇼핑백 shopping bag">
                        </a>
                        <span class="bag_cnt"><?=$totalCart?></span>
                    </div>
                    <!-- S:search -->
                    <div class="t_search fr">
                        <img onclick="searchShow();" src="../images/common/search.png" alt="검색 search">
                    </div>
                    <div class="ns-container search-panel">
                        
                        
                        <div id="search_box_layer_popup" style="position: absolute; ">
                            
                            <div class="sblp_search_bar" > 
                                <select name="field" id="field" class="field" style="width: 340px; height: 30px; margin-bottom: 15px;">
                                    <option value="prod_name" <? echo ($field=="prod_name")? "selected" : "";?>>제품명</option>
                                    <option value="prod_detail" <? echo ($field=="prod_detail")? "selected" : "";?>>제품상세</option>
                                </select>       
                                <input type="text" placeholder="검색" name="sword" id="sword" value="<?= $sword ?>">
                                <img src="../images/common/search.png" style="cursor:pointer" onclick="goSearch()">    
                            </div>
                            <script>
                            function goSearch(){
                                
                                var field = $("#field").val();
                                var sword = $("#sword").val();  
                                location.href="product_list.php?mem_id=<?=$mem_id?>&prod_cat=<?=$prod_cat?>&field="+field+"&sword="+sword;
                                $("#search_box_layer_popup").hide();
                            }
                            function searchShow(){
                                $("#search_box_layer_popup").show();
                            }
                            </script>
                            <hr>
                        
                        </div>
                    </div>
                    <!-- E:search -->

                </div>
                
                <!-- E: gnbR  -->
            </div>
            <!-- E: gnb  -->
        </div>
        <!-- E: t_container -->
    </div>
    <!-- E: top_wrap -->
