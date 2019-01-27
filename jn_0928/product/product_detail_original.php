<?
    include "../include/top.php";
    
    $prod_id = $_GET['prod_id'];
    $prod_cat=(isset($_GET['prod_cat'])) ? $_GET['prod_cat'] : 'A';

      
   

    //넘겨진 데이터 받는곳
    $field=(isset($_GET['field']))?$_GET['field'] : "title";;
    $sword = (isset($_GET['sword']))?$_GET['sword'] : "";

    $where = "";
    if($sword != ""){
        $where = " AND $field LIKE '%$sword%'";
    }


    
    $query = "SELECT * FROM product_list
                WHERE prod_id='$prod_id'$where";
    $result = mysql_query($query, $conn);

    list($prod_id, $prod_cat, $prod_name, $prod_detail, $prod_meterial, $prod_made, $prod_size, $prod_img1, $prod_img2, $prod_img3, $prod_img4, $prod_pr, $prod_color, $prod_qt, $prod_sold, $prod_regw, $prod_rate, $reg_dt)=mysql_fetch_array($result);


    $query = "SELECT * FROM member
                WHERE mem_id='$mem_id'";
    $rs = mysql_query($query, $conn);

    $point = mysql_fetch_array($rs);
    
    
?>

<script>
    $(function(){
/*             
        $(".pcnt").change(function(){
            if($(this).val()<=1){
                $(this).val();
            }
        });

*/
        
    $("#plus").click(function(){
        event.preventDefault();
            $obj = $(this).prev();
            if($obj.val()>=999){
                // alert("최대값입니다.");
                return;
                }
            $obj.val(parseInt($obj.val())+1);
            $price = (parseInt($obj.val())*parseInt($("#now_price").text()));
            $("#payToDoAmt").text($price) ;
            
        });
        $("#minus").click(function(){
            event.preventDefault();
            $obj = $(this).next();
            if($obj.val()<=1){
                // alert("최소값입니다.");
                return;
                }
            $obj.val(parseInt($obj.val())-1);
            $price = (parseInt($obj.val())*parseInt($("#now_price").text()));
            $("#payToDoAmt").text($price) 
        });
        
        
        
    });


    /*  */
    function cartProdDel(uid, pid){
        // var mem_id = uid;
        // var prod_id = pid;
        var b = confirm("삭제하시겠습니까");
        if(b) location.href="cartProdDel.php?mem_id='"+uid+"'&prod_id='"+pid+"'";
        
    }
/* sImg 클릭시 bImg */        
    function sImgClick(img){
        $('#bImg').attr('src','../images/product/'+img);            
    }
/* 쇼핑백, 바로구매 */
        
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
                        points=ppr* 0.005;
                        if(data){
                            if(div =='cart'){
                                var b = confirm("카트에 담았습니다.");
                                if(b) location.href="../cart/cart.php";
                            }else{
                                alert("이미 카트에 담겨있습니다.");
                                // location.href="../cart/cart.php";
                            }  
                        }else{                           
                            alert("구매페이지로 이동합니다.");
                            location.href="../cart/order1.php?points="+points+"&price="+ppr+"&product_id="+pid+"&quantity="+pqn;
                        }
                    },
                    error:function(request,status,error){
                        alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                    }
                });
            }
        };
    </script>

<body>
    <!-- S: s_wrap -->
    <div class="s_wrap">
        <!-- S: 상단 -->
        <div class="prod_contain">
            <!-- S: 상품상세 left -->
            <div class="prod_left fl">
                <!-- S: 상품 img -->
                <div class="b_pic">
                    <img id="bImg"  src="../images/product/<?= $prod_img1?>">
                    
                </div>
                <!-- E: 상품 img -->
                <!-- S: 상품 sImg -->
                <div class="sImgs">
                    <ul class="">
                        <li class="">
                            <a href="#" onclick="sImgClick('<?= $prod_img1?>');"><img src="../images/product/<?= $prod_img1?>"></a>
                        </li>
                        
                        <li class="">
                        <? if($prod_img2!=""){ ?>
                            <a href="#" onclick="sImgClick('<?= $prod_img2?>')"><img src="../images/product/<?= $prod_img2?>"></a>
                        <?    } ?>
                        </li>
                        <li class="">
                        <? if($prod_img3!=""){ ?>
                            <a href="#" onclick="sImgClick('<?= $prod_img3?>')"><img src="../images/product/<?= $prod_img3?>"></a>
                        <?    } ?>
                        </li>
                        <li class="">
                        <? if($prod_img4!=""){ ?>
                            <a href="#" onclick="sImgClick('<?= $prod_img4?>')"><img src="../images/product/<?= $prod_img4?>"></a>
                        <?    } ?>
                        </li>

                    </ul>
                </div>
                <!-- E: 상품 sImg -->
                <!-- S: 상품 후기 -->
                <div class="prodD_rev">
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
                <!-- E: 상품 후기 -->
            </div>
            <!-- E: 상품상세 left -->

            <!-- S: 상품수량과 쇼핑백 구매 -->
            <div class="prod_right fl">
                <div class="pr_wrap">
                    <div class="pr_header ">
                        <div class="h50"></div>
                        <h2><?= $prod_name?></h2>
                        <div class="sub_title"><?= $prod_detail?></div>
                    </div>
                    <div class="pr_body">
                        <dl>
                            <dt>최초 판매가</dt>
                            <dd><?= $prod_pr?>원</dd>
                        </dl>
                        <dl>
                            <dt class="dtB">현재가</dt>
                            <dd class="dtBr"><span id="now_price" ><?= ($prod_pr)?></span>원</dd>
                        </dl>
                        <dl>
                            <dt>배송비</dt>
                            <dd>30000원 이상</dd>
                        </dl>
                        <dl>
                            <dt>포인트</dt>
                            <dd><?= number_format($point['mem_pt'])?></dd>
                        </dl>
                        <dl>
                            <dt>수량</dt>
                            <dd>
                                <div class="spinner" data-min="1" data-max="35">
                                    <a href="javascipt:;" id="minus" class="btn-down"></a>
                                    <input type="text" class="numberic-view" id="productQty" name="productQty" value="1">
                                    <a href="javascipt:;" id="plus"  class="btn-up"></a>
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
                <div class="pr_footer">
                    <!-- 총합계 -->
                    <div class="control">
                        <dl class="total_amount">
                            <dt class="dtB">결제예정금액</dt>
                            <dd>
                                <strong id="payToDoAmt" class="payToDoAmt"><?= number_format($prod_pr)?></strong>원
                        </dl>
                    </div>
                    <div class="p_btn">
                        
                        <ul>
                            <li>
                                <a href="#">
                                    <img id="order" src="../images/product/buyBtn.png" alt="바로구매">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img id="cart" src="../images/product/cartBtn.png" alt="쇼핑백">
                                </a>
                            </li>
                            <script>
                            $("#cart").click(function(){
                                var qnt = $("#productQty").val();
                                insertCart('cart','<?= $mem_id?>', '<?= $prod_id?>', qnt ,'<?= $prod_pr?>' )
                            });

                            $("#order").click(function(){
                                var qnt = $("#productQty").val();
                                insertCart('order','<?= $mem_id?>', '<?= $prod_id?>', qnt ,'<?= $prod_pr?>' )
                            });
                        </script>
                            <li>
                                <a href="#">
                                    <img onclick="javascript:insertCart('wish','<?= $mem_id?>', '<?= $prod_id?>', <?= $prod_qn?> ,'<?= $prod_pr?>' )" src="../images/product/wishBtn.png" alt="위시리스트">
                                </a>
                            </li>
                        </ul>
                    </div>


                </div>
            </div>
            <!-- E: 상품수량과 쇼핑백 구매 -->
        </div>
        <!-- E: 상단 -->

        <!-- S: 설명 -->
        <div class="prod_contents">
            <!-- S:p_d1 설명 -->
            <div id="p_d1" class="p_d1">
                <h2>설명합니다.</h2>
                <table class="p_d1_tb">
                    <colgroup>
                            <col style="width:30%">
                            <col style="width:70%">
                        </colgroup>
                        <tbody>
                            <tr>
                                <th>제조국</th>
                                <td><?=$prod_made?></td>
                            </tr>
                            
                            <th>품질보증기준</th>
                            <td>관련법 및 소비자 분쟁해결 규정에 따름</td>
                        </tr>
                        <tr>
                            <th>재질</th>
                            <td><?=$prod_meterial?></td>
                        </tr>
                        <tr>
                            <th>사이즈</th>
                            <td><?=$prod_size?></td>
                        </tr>
                        <tr>
                            <th>칼라</th>
                            <td><?=$prod_color?></td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            <!-- E:p_d1 설명 -->

            <!-- S:p_d2 설명 -->
            <div id="p_d2" class="p_d2">
            <? if($prod_img1!=""){ ?>
                <p><img id="bImg"  src="../images/product/<?= $prod_img1?>"></p>
            <?    } ?>
            <? if($prod_img2!=""){ ?>
                <p><img id="bImg"  src="../images/product/<?= $prod_img2?>"></p>
            <?    } ?>
            <? if($prod_img3!=""){ ?>
                <p><img id="bImg"  src="../images/product/<?= $prod_img3?>"></p>
            <?    } ?>
            <? if($prod_img4!=""){ ?>
                <p><img id="bImg"  src="../images/product/<?= $prod_img4?>"></p>
            <?    } ?>
            
                
            </div>
            <!-- E:p_d2 설명 -->


        </div>
        <!-- E: 설명 -->
    </div>
    <!-- E: s_wrap -->
</body>
<?
    include "../include/footer.php";
?>