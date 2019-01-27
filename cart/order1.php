<?
    include "../include/top.php";
    $points = $_GET['points'];
    $price = $_GET['price'];

    $product_id = $_GET['product_id'];
    $quantity = $_GET['quantity'];
    $total = $price * $quantity;

    $memInfo_query = "SELECT * 
                    FROM member
                    WHERE mem_id = '$_SESSION[mem_id]'";
    $result1 = mysql_query($memInfo_query, $conn);
    $row1 = mysql_fetch_array($result1);


    $mem_id = $row1['mem_id'];
    $mem_name = $row1['mem_name'];
    $mem_tel = $row1['mem_tel'];
    $mem_addr1 = $row1['mem_addr1'];
    $mem_addr2 = $row1['mem_addr2'];
    // $mem_addr3 = $row1['mem_addr3'];
    // $mem_addr3 = "asdfasdf";

    $shipping = 2000;
    $save = 0;

    $insert_query = "INSERT INTO orders (mem_id, order_tel, order_addr1, order_addr2)
                    VALUES ('$mem_id', '$mem_tel', '$mem_addr1', '$mem_addr2')";

    $rs3 = mysql_query($insert_query, $conn);
    if(!$rs3) {
    die("failed to insert: ".mysql_error());
    }

    $query6 = "SELECT LAST_INSERT_ID()";
    $rs6 = mysql_query($query6, $conn);
    $row6 = mysql_fetch_array($rs6);

    $order_id = $row6[0];

    $insertOrderDt_query = "INSERT INTO order_detail (order_id, product_id, orderDt_qt, orderDt_price, OrderDt_st, orderDt_paid)
                            VALUES ('$row6[0]', '$product_id', '$quantity', '$price', '0', '0')";

    $rs4 = mysql_query($insertOrderDt_query, $conn);

    $query7 = "SELECT *
                FROM product_list
                WHERE prod_id = '$product_id'";
    
    $rs7 = mysql_query($query7, $conn);
    $row7 = mysql_fetch_array($rs7);

    $delete_query = "DELETE 
                    FROM cart
                    WHERE prod_id = '$product_id'";

    $rs5 = mysql_query($delete_query, $conn);

?>


<body>


    <section id="center">
        <h2 id="charset-title">주문서</h2>
        <div id="process">
            <div style="position: absolute; top: 35px; left: 400px; color: #999; font-size: 15px;">01.쇼핑백</div>
            <div style="position: absolute; top: 35px; left: 610px; color: #212121; font-size: 15px;">02.주문결제</div>
            <div style="position: absolute; top: 35px; left: 850px; color: #999; font-size: 15px;">03.주문완료</div>
        </div>


        <!-- <div class="beneInfo"> -->
            <!--beneinfo start -->
            <!-- <span>혜택정보</span>
            <span id="point">포인트 <?= $row1['mem_pt'] ?>P</span>
        </div> -->
        <!--beneinfo end -->

        <table class="itemTable">
            <!--itemTable start -->

            <tr class="title">
                <th class="th1">상품정보</th>
                <th class="th2">수량</th>
                <th class="th3">상품주문금액</th>
                <th class="th4">예정포인트</th>
            </tr>
            <tr class="items">
                <td>
                    <div class="img">
                        <a href="">
                            <img src="../images/product/<?= $row7['prod_id'] ?>_1.jpg" width=200 height=200>
                        </a>
                    </div>
                    <div class="info">
                        <span class="brand"><?= $row7['prod_name'] ?></span>
                        <span class="productName"><?= $row7['prod_detail'] ?></span>
                        <span class="option"><?= $row7['prod_size'] ?></span>
                        <span class="won"><?= $row7['prod_color'] ?></span>
                    </div>
                </td>

       
                <td class="col3"><?= $quantity ?></td>
                <td class="col4"><?= number_format($row7['prod_pr'] * $quantity) ?>원</td>
                <td class="co15"><?= $points ?>P</td>
            </tr>

            <!-- <tr class="items">
                <td>
                    <div class="img">
                        <a href="">
                            <img src="">
                        </a>
                    </div>
                    <div class="info">
                        <span class="brand"></span>
                        <span class="productName"></span>
                        <span class="option"></span>
                        <span class="won"></span>
                    </div>
                </td>

                <td class="col3"></td>
                <td class="col4"></td>
                <td class="col5"></td>
            </tr> -->
        </table>

    
        <div class="order_status_box">
            <!-- order_status_box start -->
            <div class="or_sum">
                <?= number_format($total) ?>원
                <br>
            </div>
            <div class="icon_plus">
                <span></span>
            </div>
            <div class="or_sum">
                <? echo ($total > 30000)? 0: number_format($shipping) ?>원
                <br>
            </div>
            <div class="icon_sum">
                <span></span>
            </div>
            <div class="or_sum">
                <? echo ($total  > 30000)?  $total -$save : number_format($total - $save + $shipping) ?>원
                <br>
            </div>
        </div>
        <!-- order_status_box end -->
        <ul class="bulList">
            <li>
                총 상품금액이 30,000원 이상 배송비 무료입니다
            </li>
        </ul>


<form action="orderPaid.php?" method=-"GET">
        <h4 class="Info_text">주문고객정보</h4>
        <table class="customerInfo">
            <tr class="customerInfo_1">
                <th>주문하시는분＊</th>
                <td class="col1">
                    <input type="text" style="height: 25px; width: 250px;" name="sendFrom" value=<?= $mem_name ?>>
                </td>
                <input type="hidden" name="order_id" value=<?= $order_id ?>> 
                <!-- <input type="hidden" name="points" value=<?= $points ?>> -->

                <th>전화번호</th>
                <td class="col2">
                    <!-- <select style="height: 25px; width: 75px;">
                        <option value>선택</option>
                        <option value="02">02</option>
                        <option value="031">031</option>
                    </select>
                    <span class="hypen">-</span>
                    <input type="text" style="height: 25px; width: 75px;">
                    <span class="hypen">-</span>
                    <input type="text" style="height: 25px; width: 75px;"> -->
                    <input type="text" style="height: 25px; width: 250px;" id="tel" name="mem_tel" size="11">
                </td>
            </tr>
            <tr class="customerInfo_2">
                <th>이메일 주소</th>
                <td class="col1">
                    <input type="text" style="height: 25px; width: 250px;" id="mem_id" name="mem_id" value=<?= $mem_id ?>>
                </td>
                <th>휴대폰 번호＊</th>
                <td class="col2">
                    <input type="text" style="height: 25px; width: 250px;" id="tel" name="mem_tel" value=<?= $mem_tel ?> size="11">
                    <!-- <select style="height: 25px; width: 75px;">
                        <option value>선택</option>
                        <option value="02">010</option>
                        <option value="031">011</option>
                    </select>
                    <span class="hypen">-</span>
                    <input type="text" style="height: 25px; width: 75px;">
                    <span class="hypen">-</span>
                    <input type="text" style="height: 25px; width: 75px;"> -->
                </td>
            </tr>
        </table>
        <ul class="bulList">
            <li>
                변경하시는 정보는 이번 주문에만 적용되며, 고객님의 회원정보는 변경되지 않습니다.
            </li>
        </ul>


        <h4 class="Info_text">배송지 정보
            <div class="checkbox" id="sameInfo">
                <input type="checkbox">&nbsp;&nbsp;주문고객 정보와 동일</div>
        </h4>
        <table class="deliveryInfo">
            <!-- <tr>
                <th>배송지명</th>
                <td class="col1">
                    <input type="text" style="height: 25px; width: 250px;" id="placeName" name="placeName">
                </td>
                <th>전화번호</th>
                <td class="col2">
                <input type="text" style="height: 25px; width: 250px;" id="tel" name="mem_tel" size="11">
                    <select style="height: 25px; width: 75px;">
                        <option value>선택</option>
                        <option value="02">02</option>
                        <option value="031">031</option>
                    </select>
                    <span class="hypen">-</span>
                    <input type="text" style="height: 25px; width: 75px;">
                    <span class="hypen">-</span>
                    <input type="text" style="height: 25px; width: 75px;">
                </td>
            </tr> -->

            <tr>
                <th>받으시는분＊</th>
                <td class="col1">
                    <input type="text" style="height: 25px; width: 250px;" id="sendTo" name="sendTo" value= <?= $mem_name ?> >
                </td>
                <th>휴대폰 번호＊</th>
                <td class="col2">
                    <input type="text" style="height: 25px; width: 250px;" id="tel" name="mem_tel" value=<?= $mem_tel ?> size="11">
                    <!-- <select style="height: 25px; width: 75px;">
                        <option value>선택</option>
                        <option value="02">010</option>
                        <option value="031">011</option>
                    </select>
                    <span class="hypen">-</span>
                    <input type="text" style="height: 25px; width: 75px;">
                    <span class="hypen">-</span>
                    <input type="text" style="height: 25px; width: 75px;"> -->
                </td>
            </tr>

            <tr>
                <th>주소＊</th>
                <td colspan="3" class="col3">
                    <ul class="address">
                        <li>
                            <input type="text" style="height: 25px; width: 88px;" id="addr1" name="addr1" value=<?= $mem_addr1 ?>>
                            <a href="" class="btnD">우편번호 검색</a>
                        </li>
                        <li>
                            <input type="text" placeholder="&nbsp;&nbsp;[도로명주소]" style="height: 25px; width: 768px;" id="addr2" name="addr2" value=<?= $mem_addr2 ?>>
                        </li>
                        <li>
                            <!-- <input type="text" placeholder="&nbsp;&nbsp;[지번주소]" style="height: 25px; width: 768px;" id="addr3" name="addr3" value=<?= $mem_addr3 ?>> -->
                        </li>
                    </ul>
                </td>
            </tr>
            <tr>
                <th>배송메세지</th>
                <td colspan="3" class="">
                    <div class="textbox">
                        <input type="text" placeholder="&nbsp;&nbsp;배송메세지를 입력해주세요." style="height: 25px; width: 768px;">
                        <p class="txtMsg">※배송메세지는 50자까지 입력 가능합니다.</p>
                    </div>
                </td>
            </tr>
        </table>


        <!-- <h4 class="Info_text">포인트정보</h4>
        <table class="nohead">
            <tr>
                <th>포인트</th>
                <td>
                    <input type="text" class="pointTxt" style="height: 25px; width: 138px; text-align:right" value=<?= $row1['mem_pt'] ?>>&nbsp; P
                </td>
            </tr>
        </table>
        <ul class="bulList">
            <li>
                포인트는 1000P 단위로 사용할 수 있습니다.
            </li>
        </ul> -->


        <h4 class="Info_text">결제금액</h4>
        <!-- <div class="sumArea">
            sumArea start
            <div class="sum_group"> -->
                <!--sum_group start-->
                <!-- <dl class="sum_cont">
                    <dt class="dt">총 상품금액</dt>
                    <dd class="dd">원</dd>
                </dl>
                <dl class="sum_cont">
                    <dt class="dt">총 할인금액</dt>
                    <dd class="dd">원</dd>
                </dl>
                <dl class="sum_cont">
                    <dt class="dt">포인트 사용금액</dt>
                    <dd class="dd">원</dd>
                </dl>
                <dl class="sum_cont">
                    <dt class="dt">배송비</dt>
                    <dd class="dd">원</dd>
                </dl> -->
            <!-- </div> -->
            <!--sum_group end-->
            <div class="sum_result">
                <!--sum_result start-->
                <dl class="sum_cont">
                    <dt class="dt"><input type="checkbox" id="usePntCheckbox" style="margin-right:10px;">포인트 사용 (1000P 이상 사용할 가능)</dt>
                    <dd class="dd">
                        <em class="sum_big" ><span id="availPntsText"><?= number_format($row1['mem_pt']) ?></span>P</em>
                        <input type="hidden" name="availPnts" id="availPnts" value="<?= $row1['mem_pt'] ?>">
                    </dd>
                   
                </dl>
                <dl class="sum_cont">
                    <dt class="dt">최종 결제 금액</dt>
                    <dd class="dd">
                        <em class="sum_big"><span id="totalAmountText"><?= number_format($total) ?></span>원</em>
                        <input type="hidden" name="totalAmount" id="totalAmount" value="<?= $total ?>">
                    </dd>
                </dl>
                <dl class="sum_cont">
                    <dt class="dt">적립예정 포인트</dt>
                    <dd class="dd">
                        <em class="sum_big"><span id="savePntText"><?= $points ?></span>P</em>
                    </dd>
                    <input type="hidden" id="savePnt" name="savePnt" value=<?= $points ?>>
                </dl>
            </div>
            <!--sum_result end-->
        </div>
        <!-- sumArea end-->

        <button class="paymentBtn" type="submit">결제하기</button>
</form>

    </section>
</body>
</html>

<script>
    $(document).ready(function () {

        var origPnts = parseInt($("#availPntsText").text().replace(",", ""));
        
            $("#usePntCheckbox").click(function (){       
                  
                if ($(this).prop("checked")) {
                        var points = 0;
                        var total = parseInt($("#totalAmountText").text().replace(",", "")) - origPnts;      
                        $("#totalAmountText").text(total);
                        $("#totalAmount").val(total);
                        $("#availPntsText").text(points); //0
                        $("#availPnts").val(points);
                } else {
                    var total = parseInt($("#totalAmountText").text().replace(",", "")) + origPnts;
                    $("#totalAmountText").text(total);
                    $("#availPntsText").text(origPnts); 
                    $("#availPnts").val(origPnts);
                    $("#totalAmount").val(total);
                }
            });

    });
</script>

<?
    include "../include/footer.php";
?>