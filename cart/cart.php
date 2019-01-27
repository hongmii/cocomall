<?
    include "../include/top.php";
    
    $query = "SELECT * 
            FROM cart
            WHERE mem_id = '$_SESSION[mem_id]'";

    $rs = mysql_query($query, $conn);

    $query2 = "SELECT COUNT(*) count
                FROM cart
                WHERE mem_id = '$_SESSION[mem_id]'";

    $rs2 = mysql_query($query2, $conn);
    $row2 = mysql_fetch_array($rs2);
    // if ($product_id){
    //     $query ="SELECT *
    //             FROM product_list
    //             WHERE productcode = '$product_id'";

    //     $rs2 = mysql_query($query, $conn);

    //     $query = "INSERT INTO cart (mem_id, prod_id, cart_qt)
    //             VALUES ('$_SESSION[mem_id]', '$product_id', '1'";

    //     $rs3 = mysql_query($query, $conn);

    //     echo $query;
    // }

?>

    <link rel="stylesheet" href="../css/cart.css" type="text/css">
    <script>
        
        $(document).ready(function(){
            $('#checkAll').click(function() {
                if($("#checkAll").prop("checked")){
                    $('input[name=products]').prop('checked', true);
                }else{
                    $('input[name=products]').prop('checked', false);
                }    
            });
          });

    </script>


<body>
    <div id="container">
        <div id ="content" style="margin:0 auto; width:990px;">
            <h2 class="jc-h2"><?= $_SESSION['mem_name']?>님의 쇼핑백</h2>
        <div class="bgBox step jc-step">
            <ul class="jc-li" style="width:990px;">
                <li style="padding-left:150px;">쇼핑백</li>
                <li style="padding-left:160px;">주문결제</li>
                <li style="padding-left:170px;">주문완료</li>
            </ul>
        </div>
        <div class="section">
            <div class="tbl paLR0 paTB0">
                <input type="hidden" id="cartNo" value>
                <input type="hidden" id="cartSeqForOneOrder">
                <table id="prdTable" class="head" summary="주문상품선택">
                    <caption style="font-weight:bold">주문 상품 선택</caption>
                    <colgroup>
						<col width="70px">
						<col width="*">
						<col width="108px">
						<col width="170px">
						<col width="115px">
						<col width="80px">
                    </colgroup>
                    <thead>
						<tr>
							<th scope="col" class="t-chk jc-th">
								<input type="checkbox" id="checkAll" class="checkbox s-checkbox checked">
									<!-- <label for="prdselectChk"><input type="checkbox" data-link="prdselect" id="prdselectChk">&nbsp;</label> -->
							</th>
							<th scope="col" class="jc-th" style="font-size: 15px">상품정보</th>
							<th scope="col" class="jc-th" style="font-size: 15px;">수량</th>
                            <th scope="col" class="jc-th" style="font-size: 15px;">상품금액</th>
                            <th scope="col" class="jc-th" style="font-size: 15px;">총예정금액</th>
							<th scope="col" class="jc-th" style="font-size: 15px;">적립예정</th>
							<th scope="col" class="jc-th" style="font-size: 15px;">선택</th>
                        </tr>
                        <?

        $sum = 0;
        $totalPoints = 0;
        while($row = mysql_fetch_array($rs)) {
            echo "<tr><td scope='col'>";
            echo "<input type='checkbox' id='products' name='products'></td>";
            echo "<td scope='col'>";
            echo "<img src='../images/product/$row[prod_id]_1.jpg' width=100 height=100>";
            echo "</td><td scope='col'>";   
            echo $row['cart_qt'];
            echo "</td><td scope='col'>";
            $price = $row['cart_pr'];
            echo number_format($price).'원';
            echo "</td><td scope='col'>";
            $totalPrice = $row['cart_pr'] * $row['cart_qt'];
            $sum += $totalPrice;
            echo number_format($totalPrice).'원';
            echo "</td><td>";
            $point = $totalPrice * 0.005;
            $totalPoints += $point;
            echo $point."P";
            echo "</td><td scope='col'>";
            echo "<a href='./order1.php?product_id=$row[prod_id]&quantity=$row[cart_qt]&points=$point&price=$price'>구매</a>
                <p><a href='deleteChecked.php?product_id=$row[prod_id]'>삭제</a></p>";
            echo "</td></tr>";
}
?>
					</thead>
                </table>
<div id="orderResult">
    <table>
        <tr>
       

            <td colspan="3">
                <div>총 주문금액</div>
                    <p>
                    <?
                            $save = 0;
                            $shipping = 2000;
                            echo number_format($sum);
                            
                        ?>
                    </p>
                </div>
            </td>

            <td colspan="3">
                <div>할인금액</div>
                <p><?= $save ?>원</p>
            </td>

            <td colspan="3">
                <div>배송비</div>
                 
                    <?
                    $calcShipping=($row2['count'] == 0 || $sum > 30000)? 0: $shipping; 
                    echo  number_format($calcShipping);
                    ?>원</p>
                </div>
            </td>

            <td colspan="3">
                <div>결제예정금액
                    <p><? echo ($row2['count'] == 0) ? 0:number_format($sum-$save+$calcShipping); ?>원</p>
                </div>
            </td>
        </tr>


    </table>

    <div id="bottomBtns" style="text-align:center" >
    <br>
        <button class="joinBtn btn_s_gray btn_240" onclick="location.href='../product/product_list.php'">쇼핑 계속하기</button>
        <button class="joinBtn btn_s_gray btn_240" onclick="">선택상품 주문</button>
        <button class="joinBtn btn_s_gray btn_240" onclick="location.href='orderAllNew.php?points=<?= $totalPoints ?>&total=<?= $sum ?>'">전체상품 주문</button>
    <br>
    </div>

</div>
</div>
            </div>
        </div>
        </div>
    </div>
 
</body>
<? include '../include/footer.php';?>
</html>

