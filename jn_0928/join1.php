<?
	include "../include/top.php";
?>

<body>
    <div id="info" class="jn2_info">
        <div class="jn2_container" style="height: 430px">
            <div class="jn2_head">
                <p class="jn2_noto">회원가입</p>
                <ul>
                    <li style="font-weight:bold">가입</li>
                    <li>약관동의</li>
                    <li>정보입력</li>
                    <li>가입완료</li>
                </ul>
            </div>

            <div class="jn2_body" style="text-align: center">
                <br>
                <p class="jn2_bigNote">회원가입을 환영합니다</p>
                <p id="explain" class="jn2_explain">회원으로 가입하시면 다양한 혜택과</p>
                <p>서비스를 이용하실 수 있습니다</p>
                <br>
                <div class="jn2_button">
                    <button class="jn2_joinButton btn_s_gray btn_205" style="width: 250px;" onclick="location.href='join2.php'">가입하기 [14세 이상]</button>
                    <p></p>
                    </br>
                    <!-- <div id="naverIdLogin" onclick="naverIdLogin">
                        <a href="http://naver.com">
                            <img src="../images/member/naverLogin.png" border="0" width="240.5px" height="52px">
                        </a>
                    </div> -->
                    <div class="jn2_panel-body naverIdLogin " style="">
                        <a id="kakao-login-btn" class="jn2_kakao-login-btn"></a>
                    </div>
                </div>
                <p style="font-size:13px;">*가입은 만 14세 이상 고객만 가능합니다*</p>
            </div>
        </div>
    </div>
    <script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>
    <script src="../js/cacao.js"></script>
</body>
<?
    include "../include/footer.php";
?>

