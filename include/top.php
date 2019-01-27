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
	<title>Product</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>COCOMALL</title>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->

<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="../css/main.css">
<!--===============================================================================================-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">



<link rel="stylesheet" href="../css/t_style.css">
<link rel="stylesheet" href="../css/footer.css" />
<!-- <link rel="stylesheet" href="../css/customerInfo.css" />
<link rel="stylesheet" href="../css/join.css" type="text/css">
<link rel="stylesheet" href="../css/login.css" type="text/css"> -->
<link rel="stylesheet" href="../css/add_jn.css" type="text/css">
<link rel="stylesheet" href="../css/cs_hm.css" type="text/css">
<link rel="stylesheet" href="../css/mypage.css" />
<!-- <link rel="stylesheet" href="../cs/cs_notice.css" /> -->

   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body class="animsition">

	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="topbar">
				<div class="topbar-social">
					<a href="#" class="topbar-social-item fa fa-facebook"></a>
					<a href="#" class="topbar-social-item fa fa-instagram"></a>
					<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
					<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
				</div>

				

				<div class="topbar-child2">
					<span class="topbar-child1">
	<?
						if($mem_id == ""){ // 세션없으면 
							echo "<li class='t_login inlineB'><a class='login' href='../member/loginMain.php' >로그인</a></li><li class='t_reg viewport inlineB'><a href='../member/join1.php' >회원가입</a></li>";                       
						}else{
							echo "<li class='t_login inlineB'><a class='logout' href='../member/logout.php' >로그아웃</a></li><li class='t_reg viewport inlineB'><a href='../member/changeInfo.php?mem_id=<?=$mem_id?>' >회원정보수정</a></li>";                        
						}
	?>
					</span>
					<span> <a href="../member/mypage.php?mem_id='<?=$mem_id?>'" style='line-height: 26px; padding:0 20px'>마이페이지</a></span>
					<div class="topbar-language rs1-select2">
						<select class="selection-1" name="time" onchange="javascript:handleSelect(this)" style="background-color: #f5f5f5;">
							<option value="cs_notice2" style="background-color: #fff;><a href="../cs/cs_notice2.php" onchn>공지사항</a></option>
							<option value="cs_notice2" style="background-color: #fff;><a href="../cs/cs_notice2.php">고객센터</a></option>
							<option value="cs_often" style="background-color: #fff;><a href="../cs/cs_often.php">FAQ</a></option>
							<option value="cs_appli.php?mem_id='<?=$mem_id?>''" style="background-color: #fff;><a href="../cs/cs_appli.php?mem_id='<?=$mem_id?>'">1:1문의</a></option>
						</select>
					</div>
					<script type="text/javascript">
function handleSelect(elm)
{
window.location ="../cs/"+ elm.value+".php";
}
</script>
				</div>
			</div>

			<div class="wrap_header">
				<!-- Logo -->
				<a href="../index.php" class="logo">
					<img src="../images/common/logo.png" alt="IMG-LOGO">
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu ">

							<li>
								<a href="../product/product_list.php?mem_id=<?=$mem_id?>&prod_cat=A">
									<img src="../images/common/nav_A.png" alt="식기 tableware">
								</a>
							</li>

							<li class="sale-noti">
								<a href="../product/product_list.php?mem_id=<?=$mem_id?>&prod_cat=B">
									<img src="../images/common/nav_B.png" alt="침구 bedding">
								</a>
							</li>

							<li>
								<a href="../product/product_list.php?mem_id=<?=$mem_id?>&prod_cat=C">
									<img src="../images/common/nav_C.png" alt="수납 storage">
								</a>
							</li>

							<li>
								<a href="../product/product_list.php?mem_id=<?=$mem_id?>&prod_cat=D">
									<img src="../images/common/nav_D.png" alt="소품 props">
								</a>
							</li>

							<li>
								<a href="../product/product_list.php?mem_id=<?=$mem_id?>&prod_cat=E">
									<img src="../images/common/nav_E.png" alt="장식 decoration">
								</a>
							</li>

							
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">
					<div class="t_search fr">
						<img style="cursor: pointer" onclick="searchShow();" src="../images/common/search.png" alt="검색 search">
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
								<a class="search_close" onclick="goSearch_clear()" style="cursor:pointer;color: #fff;">닫기</a> 
                            </div>
                            
                        
                        </div>
                    </div>

					<span class="linedivide1"></span>

					<div class="header-wrapicon2">
						<img src="../images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">0</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="../images/item-cart-01.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											White Shirt With Pleat Detail Back
										</a>

										<span class="header-cart-item-info">
											1 x $19.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="../images/item-cart-02.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Converse All Star Hi Black Canvas
										</a>

										<span class="header-cart-item-info">
											1 x $39.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="../images/item-cart-03.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Nixon Porter Leather Watch In Tan
										</a>

										<span class="header-cart-item-info">
											1 x $17.00
										</span>
									</div>
								</li>
							</ul>

							<div class="header-cart-total">
								Total: $75.00
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="../index.php" class="logo-mobile">
				<img src="../images/common/logo.png" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					<!-- <a href="#" class="header-wrapicon1 dis-block">
						<img src="../images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
					</a> -->

					<span class="linedivide2"></span>

					<div class="header-wrapicon2">
						<img src="../images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">0</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="../images/item-cart-01.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											White Shirt With Pleat Detail Back
										</a>

										<span class="header-cart-item-info">
											1 x $19.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="../images/item-cart-02.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Converse All Star Hi Black Canvas
										</a>

										<span class="header-cart-item-info">
											1 x $39.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="../images/item-cart-03.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Nixon Porter Leather Watch In Tan
										</a>

										<span class="header-cart-item-info">
											1 x $17.00
										</span>
									</div>
								</li>
							</ul>

							<div class="header-cart-total">
								Total: $75.00
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				
				<ul class="main-menu">

					<li class="topbar-child1 text_a">
						<ul style="border-bottom: 1px solid #ccc;vertical-align:middle; text-align: center; line-height: 80px; background-color: #f2f2f2;">
<?
							if($mem_id == ""){ // 세션없으면 
								echo "<a class='t_login' href='../member/loginMain.php' ><li class='t_login inlineB'>로그인</li></a><a href='../member/join1.php' ><li class='t_reg viewport inlineB'>회원가입</li></a>";                       
							}else{
								echo "<li class='t_login inlineB'><a class='logout' href='../member/logout.php' >로그아웃</a></li><li class='t_reg viewport inlineB'><a href='../member/changeInfo.php?mem_id=<?=$mem_id?>' >회원정보수정</a></li>";                        
							}
?>
						</ul>
					</li>	
						

					<li class="item-menu-mobile">
						<a href="../product/product_list.php?mem_id=<?=$mem_id?>&prod_cat=A">식기 tableware</a>
					</li>

					<li class="item-menu-mobile">
						<a href="../product/product_list.php?mem_id=<?=$mem_id?>&prod_cat=B">침구 bedding</a>
					</li>

					<li class="item-menu-mobile">
						<a href="../product/product_list.php?mem_id=<?=$mem_id?>&prod_cat=C">수납 storage</a>
					</li>

					<li class="item-menu-mobile">
						<a href="../product/product_list.php?mem_id=<?=$mem_id?>&prod_cat=D">소품 props</a>
					</li>

					<li class="item-menu-mobile">
						<a href="../product/product_list.php?mem_id=<?=$mem_id?>&prod_cat=E">장식 decoration</a>
					</li>
					<li class="item-menu-mobile" style="background-color: #222;">
						<a href="../cs/cs_notice2.php" >고객센터</a>
						<ul class="sub-menu" style="background-color: #f1f1f1;">
							<li><a href="../cs/cs_notice2.php">공지사항</a></li>
							<li><a href="../cs/cs_often.php">자주찾는 질문</a></li>
							<li><a href="../cs/cs_appli.php?mem_id='<?=$mem_id?>'">1:1 문의</a></li>
						</ul>
						<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
					</li>

					

					
				</ul>
			</nav>
		</div>
    </header>
    


	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>
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
		function goSearch_clear(){
			$("#search_box_layer_popup").hide();
		}
	</script>


<!--===============================================================================================-->
	<script type="text/javascript" src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="../vendor/bootstrap/js/popper.js"></script>

<!--===============================================================================================-->
	<script src="../js/main.js"></script>


</body>
</html>