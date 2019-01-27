<?
	include "../include/top.php";
?>

<body>

    <div id="info" class="jn2_info">
        <div class="jn2_container" style="height: 510px;">
            <div class="jn2_head">
                <p class="jn2_noto">회원가입</p>
                <ul>
                    <li>가입</li>
                    <li style="font-weight:bold">약관동의</li>
                    <li>정보입력</li>
                    <li>가입완료</li>
                </ul>
            </div>
            <p></p>
            <div class="jn2_body">
                <!-- <form action="joinInsert1.php?checked=check4" method="GET"> -->
                    <div id="agree" class="jn2_agree">
                        <div class="jn2_must">
                            <br>
                            <!-- <p class="heading" id="line" style="font-size: 20px">필수동의</p> -->
                            <p class="jn2_lime" id="line" style="font-size: 20px">필수동의</p>
                            <br>
                            <div>
                                <p class="jn2_line">
                                    <input type="checkbox" id="check1" class="jn2_check1"> 코코 회원 이용 약관
                                    <button onclick="" class="jn2_fwhite">약관 전제보기</button>
                                </p>
                                <p class="jn2_line">
                                    <input type="checkbox" id="check2" class="jn2_check2"> 개인정보 처리방침
                                    <button onclick="" class="jn2_fwhite">내용보기</button>
                                </p>
                                <p class="jn2_line">
                                    <input type="checkbox" id="check3" class="jn2_check3"> 개인정보 수집 및 이용
                                    <button onclick="" class="jn2_fwhite">내용보기</button>
                                </p>
                                <hr>
                                <input type="checkbox" id="allCheck" class="jn2_allcheck"/>전체선택 
                            </div>
                        </div>

                        <div class="jn2_choice">
                            <br>
                            <p class="jn2_heading" id="line" style="font-size: 20px">선택 동의항목</p>
                            <br>
                            <div>
                                <p class="jn2_line">
                                    <input type="checkbox" id="check4" name="check4"> 미케팅 수신동의
                                </p>
                            </div>
                            <p style="color:#333; font-size:13px; padding-top:15px;">* 정보수신에 동의하지 않으셔도 정상적인 서비스 이용이 가능합니다 *</p>
                        </div>
                    </div>
                    <br>
                    <div class="jn2_button">
                        <button class="jn2_joinButton btn_s_gray btn_205" id="btn1" onclick="location.href='join3.php'">동의하고 회원가입</button>
                <!-- </form> -->

                <button class="jn2_joinButton btn_s_gray btn_205" id="btn2" onclick="location.href='join1.php'">처음으로</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function(){ 
            //전체선택 체크박스 클릭 
            $("#allCheck").click(function(){
                //만약 전체 선택 체크박스가 체크된상태일경우 
                if($("#allCheck").prop("checked")) { 
                    //해당화면에 전체 checkbox들을 체크해준다 
                    $("#check1").prop("checked",true); 
                    $("#check2").prop("checked",true); 
                    $("#check3").prop("checked",true); 
                    // 전체선택 체크박스가 해제된 경우 
                } else { //해당화면에 모든 checkbox들의 체크를해제시킨다. 
                    $("input[type=checkbox]").prop("checked",false); } 
            }) 
        })
    </script>
    

</body>
<?
    include "../include/footer.php";
?>
