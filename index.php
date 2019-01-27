<?
    include "./include/top_main.php";

   $pcat = (!isset($_GET['pcat'])) ?'best': $_GET['pcat']; 

//    $pcat = $_GET['pcat'];
   $query ="";
   if($pcat=='best'){
       // 베스트상품 가져오기
       $query ="SELECT * 
                FROM product_list
                ORDER BY prod_sold DESC
                LIMIT 3";
   }else{
        // 신상품 가져오기
        $query ="SELECT * 
                 FROM product_list 
                 ORDER BY reg_dt DESC
                 LIMIT 3";
   }

  
   $rs = mysql_query($query,$conn);
   
 

?>

    <!DOCTYPE html>
<html lang="kor">
<head>
  <title>COCO MALL</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" media="screen" href="./css/index.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>



<body>
   
<div class="header"></div>

<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="./images/main/main.png" alt="Los Angeles">
    </div>

    <div class="item">
      <img src="./images/main/main2.png" alt="Chicago">
    </div>

    <div class="item">
      <img src="./images/main/main3.png" alt="New York">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


   
   
    <div class="content"> <!--content start --> 
     <div class="text_area">
        <!--text_area start-->
        <p>ISSUE PRODUCTS</p>
        <span>코코몰이 전하는 이슈제품</span>
    </div>
    <!--text_area end-->

    <div class="product_area">
        <!--product_area start-->
        <div class="discount_img">
            <!--discount_img start-->
            <a href="">
                <img src="./images/main/m_01.png"> 
            </a>
        </div>
        <!--discount_img end-->

        <div class="BN_box">
            <!--BN_box start-->
            <div class="best_new_box">
                <!--best_new_box start 탭메뉴박스-->
                <a href="./index.php?pcat=best" class="best" id="<? echo ($pcat=="best")? "tabar": "";  ?>" >베스트</a>
                <a href="./index.php?pcat=new" class="new" id="<? echo ($pcat=="new")? "tabar": "";  ?>">신제품</a>
            </div>
            <!--best_new_box end-->

            <div class="best_product_img">
                <ul>

<?
  while($row=mysql_fetch_array($rs)){
?>

                    <li>
                        <a href="./product/product_detail.php?prod_id=<?=$row['prod_id']?>">
                            <img  style="width:240px; height:240px" src="./images/product/<?=$row['prod_img1']?>">
                        </a>
                        <a href="./product/product_detail.php?prod_id=<?=$row['prod_id']?>"><span class="name"><?=$row['prod_name']?></span></a>
                        <span class="price"><?=number_format($row['prod_pr'])?>원</span>
                    </li>
  <?
  }
  mysql_close($conn);
  ?>                 



                </ul>
            </div>
        </div>
        <!--BN_box  end-->
    </div>
    <!--product_area end-->

    <div class="text_area">
        <!--text_area start-->
        <p>COCO DESIGN</p>
        <span>코코만의 특별한 디자인</span>
    </div>
    <!--text_area end-->

    <div class="design_area">
        <!--design_area start-->
        <div class="more_view1">
            <a href="./product/product_detail.php?prod_id=A1002"> 
            <img src="./images/main/m_05.png" alt="안녕 우주 식판"></a>
        </div>
        <div class="more_view2">
            <a href="./product/product_detail.php?prod_id=A1007"> 
            <img src="./images/main/m_07.png" alt="얌얌 미니 손잡이볼"></a>
        </div>
        <div class="more_view3">
            <a href="./product/product_detail.php?prod_id=C1008">  
                <img src="./images/main/m_06.png" alt="조이 키즈 체어"></a>
        </div>
    </div>
    <!--design_area end-->

    <div class="insta">
        <!--insta start-->
        <div class="insta_txt">INSTAGRAM</div>
        <div class="insta_images"><!--insta_images start-->
        <span class="insta_img1">
           <a href=""> <img src="./images/main/m_insta_01.png"></a>
        </span>
        <span class="insta_img2">
        <a href=""> <img src="./images/main/m_insta_02.png"></a>
        </span>
        <span class="insta_img3">
        <a href=""> <img src="./images/main/m_insta_03.png"></a>
        </span>
        <span class="insta_img4">
        <a href=""> <img src="./images/main/m_insta_04.png"></a>
        </span>
    </div><!--insta_images end-->

    <span class="read_more"><a href="">Read More</a></span>
    </div>
    <!--insta end--> 
</div><!--content end--> 
    <div class="footer"></div>
</body>
<?
    include "./include/footer_main.php";
?>
</html>