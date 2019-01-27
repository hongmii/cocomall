<?

	include "../include/top.php";
    $query = "SELECT *
            FROM member
            WHERE mem_id='$_SESSION[mem_id]'";

    $rs = mysql_query($query, $conn);
    $row = mysql_fetch_array($rs);




    $query1 = "SELECT *
                FROM orders
                WHERE mem_id='$_SESSION[mem_id]'";

    $rs1 = mysql_query($query1, $conn);
    $row1 = mysql_fetch_array($rs1);



	
    $query2 = "SELECT *
                FROM order_detail
                WHERE order_id = '$row1[order_id]'";
    $rs2 = mysql_query($query2, $conn);



    $product_query = "SELECT *
            FROM product_list";

    $rs4 = mysql_query($product_query, $conn);
    $row4 = mysql_fetch_array($rs4);




    $wish_query = "SELECT * 
                    FROM wishlist
                    WHERE mem_id = '$_SESSION[mem_id]'";

    $rs5 = mysql_query($wish_query, $conn);


?>



<body>
	<div id="content" class="size1200">

			
			<h2 class="cont_h2tit01 eng" style="margin-bottom: 20px;">마이 페이지</a></h2>
			<div class="bgBox">
			
			
		
				<div class="myInfo">
					<div class="gradeArea" id="gradeArea"><a href="/mypage/sivillagerInformation"><strong class="silver">SILVER 등급</strong></a><div><p>SILVER</p><a href="#none" onclick="showSIVLayer('#grade-info')">다음달 예상등급</a></div></div>
					<div class="itemArea">
						<div class="pointArea">
							<strong>POINT</strong>
							<em>포인트</em>
							<p class="count" id="pointArea"><a href="/mypage/siPoint" class="num"><?= $row['mem_pt'] ?></a><span class="eng">P</span></p>
						</div>
						<div class="couponArea">
							<strong>COUPON</strong>
							<em>쿠폰</em>
							<p class="count" id="couponArea"><a href="/myBenefits.php" class="num">23</a><span class="kor">장</span></p>
						</div>
					</div>
				</div>
				</div>
			
			
			<div class="layer-container">
		        <!-- 2017-07-12  다음달 예상 등급 안내 레이어 -->
		        <div class="layerPop" id="grade-info">
		            <div class="popArea">
		                <div class="popHead">
		                    <h4>다음달 예상 등급 안내</h4>
		                </div>
		                <div class="popContent">
		                    <div class="grade-info">
		                        <div class="grade-info-desc" id="gradeInfo"><p>2017년 7월 ~ 현재 기준으로,<br> 다음달 예상등급은 <strong>"SILVER"</strong> 입니다.</p><p><strong>500,000원</strong>을 더 결제하시면,<br> 다음달 <strong>GOLD</strong> 혜택을 받아보실 수 있습니다.</p></div>
		                        <ul class="dot-list">
		                            <li>최근 12개월 간 구매금액(온/오프라인 합산)을 기준으로, 매월 1일 등급이 산정됩니다. </li>
		                            <li>주문건의 취소/환불 발생 시 예상등급과 실제등급은 차이가 있을 수 있습니다.</li>
		                            <li>등급별 혜택은 승급 시 1회만 지급되며, 유지/강급 시에는 지급되지 않습니다.</li>
		                        </ul>
		                        <a class="btnD black raised" href="/mypage/sivillagerInformation">등급 혜택/산정기준 보기</a>
		                    </div>
		                </div>
		                <a href="#" class="popClose">닫기</a>
		            </div>
		        </div>
		        <!-- //2017-07-12  다음달 예상 등급 안내 레이어-->
	    	</div>
<!-- .division -->
		<!-- D: .lnb가 있는 2단으로 나뉜경우 div에 클래스 .division을, 1단일 경우 div에 클래스 .section을 적용해주세요 -->
		<div class="division">
			<div class="lnb">
                    <dl>
                            <dt><a href="./changeInfo.php">나의 정보관리</a></dt>
                            <dt><a href="./myShopInfo.php" >나의 쇼핑정보</a></dt>
                            <dt><a href="./myBenefits.php">나의 혜택정보</a></dt>
                            <dt><a href="../cs/cs_2.php">1:1 문의</a></dt>
                        
                    </dl>
                </div>
				<div class="cont">
				<h3>최근 주문 상품<a href="/mypage/orderList" class="btnMore bgNo">more</a></h3>
				<!-- .deliveryPrd -->
				<div class="deliveryPrd">
					<!-- .tbl -->
					<div class="tbl tblBasic">
						<table class="head" summary="배송 중 상품 목록">
							<caption>배송 중 상품 목록</caption>
							<colgroup>
								<col width="*">
								<col width="15%">
								<col width="15%">
							</colgroup>
							<thead>
								<tr>
									<th scope="col">상품정보</th>
									<th scope="col">결제금액</th>
									<th scope="col">진행상태</th>
								</tr>
							</thead>
							<tbody>

<?
                  
                  while($row2 = mysql_fetch_array($rs2)) {
                    echo "<tr><td scope='col'>";
                    echo "<img src='../images/product/$row2[product_id]_1.jpg' width=80 height=80>$row4[prod_name]";
                    echo "</td><td scope='col'>";
                    $totalPrice = $row2['orderDt_price'] * $row2['orderDt_qt'];
                    echo number_format($totalPrice).'원';
                    echo "</td><td scope='col'>";
                    if ($row2['orderDt_paid'] == 1) {
                        echo "결제완료";
                    } else {
                        echo "미결제";
                    };
                    echo "</td></tr>";

                  }
            ?>								</tbody>
						</table>
					</div>
					<!-- // .tbl head -->
				</div>

				</div>
                
                
                <!-- <h3>최근 주문 상품<a href="/mypage/orderList" class="btnMore bgNo">more</a></h3> -->
                

                    <br>
                    <br>
					<div class="cont">
	                    <h3>위시리스트<a href="../mypage/getProductWishList" class="btnMore bgNo">more</a></h3>
	                           

<?

while($row5 = mysql_fetch_array($rs5)) {
	echo "<div class='wish-list__body'>";   
	echo "<ul class='goods-list js-goods-over'>";
	echo "<li class='goods-item'>";
		echo "<div class='goods__cont'>";
			echo "<div class='goods__img thumb--full'>";

    echo "<a href='../productDetail.php/$row5[prod_id]'><img src='../images/product/$row5[prod_id]_1.jpg' width=100 height=100></a>";
	echo "<div class='goods__tag' style='transform: translateY(0%);'></div>";
		echo "<div class='goods__over-info' style='transform: translateY(0%);'>";
			echo "<div class='item__size'></div>";
				echo "<div class='item__bt' name='prdIcon'>";
				echo "<span class='bt--preview'></span>";
				echo "</div>
					</div>
						</div>";
					echo "<div class='goods__info'>";
				echo "<div class='item__name'>";
				echo "<a href='/product/productDetail' class='name--goods'> $row5[prod_id] </a>";
				echo "</div>";
				echo "<div class='item__price'>";
            echo "<div class='item__price'>";
	
	        echo "<span class='price--ing'>";
		echo "<span class='blind'>판매가</span>";
        echo "<span> $row5[prod_pr]원</span></span>";

    
 } ?>
	
	
</div></div>
										</div>
									</div>
								
							</div>
					</div>
					<!-- //halfCont [renewal] -->
				</div>
				<!-- // .halfCont -->
   
</body>
<?
    include "../include/footer.php";
?>