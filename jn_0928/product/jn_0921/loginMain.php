<?
    include "../include/top.php";
?>
    <script>
        $(document).ready(function () {

        });

        function login() {
            if ($('.id').val().length < 1) {
                alert('아이디를 입력해주세요');
                return false;
            } else if ($('.pwd').val().length < 1) {
                alert("비밀번화를 입력해주세요");
                return false;
            } else {
                document.loginForm.submit();
            }
        }
    </script>
</head>

<body>
    <div id="login" class="jn3_login">
        <div class="container">
            <div class="head">
                <p class="noto">로그인</p>
                <ul>
                    <li onclick="findTypeChg1('member')" style="border-bottom: 1px solid #333">회원</li>
                    <li onclick="">비회원</li>
                </ul>
            </div>
            <div class="body">
                <div class="member">
                    <form action="login.php" method="post" name="loginForm" autocomplete="off">
                        <!-- <input type="hidden" name="retUrl"> -->
                        <div class="enter">
                            <input class="id" type="text" name="userId" placeholder="아이디 (이메일)" autocomplete="off">
                            <p></p>
                            <input class="pwd" type="password" name="password" placeholder="비밀번호" autocomplete="off">
                            <p></p>
                        </div>
                        <div class="all">
                            <ul>
                                <li>
                                    <a href="idfind.php">아이디찾기</a>
                                    &nbsp; | &nbsp;
                                </li>
                                <li>
                                    <a href="pwfind.php">비밀번호찾기</a>
                                    &nbsp; | &nbsp;
                                </li>
                                <li>
                                    <a href="join1.php">회원가입</a>
                                </li>
                            </ul>
                        </div>
                    </form>
                    <button class="joinBtn btn_s_gray btn_240" onclick="login()">로그인</button>
                    <!-- <div id="naverIdLogin" onclick="naverIdLogin">
                        <a href="http://naver.com">
                            <img src="../images/member/naverLogin.png" border="0" width="240.5px" height="52px">
                        </a>
                    </div> -->
                    <div class="panel-body naverIdLogin " style="">
                        <a id="kakao-login-btn"></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>
    <script src="../js/cacao.js"></script>
</body>
<?
    include "../include/footer.php";
?>


