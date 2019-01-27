<?
include "../include/top.php";
?>
<link rel="stylesheet" href="../css/pwfind.css" />
<script>
    $(function () {
        ////이메일 change이벤트
        var selemailHost = $("select#selectEmail");
        selemailHost.change(function () {

            if ($("#selectEmail option:selected").val() != "0") {
                $("input[name='email']").val($("#selectEmail option:selected").val());
            } else {
                $("input[name='email']").val("");
            }

        });
    });

</script>
<body>
        <div id="login" class="jn6_login">
                <div class="jn6_container">
                    <div class="jn6_head">
                        <p class="jn6_noto">내 계정 찾기
                        </p>
                        <ul>
                            <li onclick="findTypeChg1('findId')" style="border-bottom: 0px;color: rgb(170, 170, 170);"><a href='idfind.php'>아이디찾기</a></li>
                            <li onclick="findTypeChg1('findPwd')" style="border-bottom: 1px solid rgb(0, 0, 0);color: rgb(0, 0, 0);">비밀번호 찾기</li>
                        </ul>
        
                    </div>
                    
                            
                    <div class="jn6_body">
                        <div class="jn6_findId" style="display: none;">
                            <div class="jn6_enter">
                                <input class="jn6_customerNm"type="text" name="userNm"placeholder="이름">
                                <div class="jn6_phone">
                                    <input type="hidden" name="phone">
                                    <select name="phoneLeft" >
                                        <option value="0"></option>
                                <option value="010">010</option>
                                <option value="011">011</option>
                                <option value="016">016</option>
                                <option value="017">017</option>
                                <option value="018">018</option>
                                <option value="019">019</option>
                                    </select>
                                    <input class="jn6_phoneCenter"type="text" name="phoneCenter"placeholder="">
                                    <input class="jn6_phoneRight"type="text" name="phoneRight"placeholder="">

                                  
                                    
                                </div>
                                <p class="jn6_alert">입력하신 휴대폰 번호로 계정정보를 찾을 수 없습니다. 확인 후 다시 이용하여주세요. <br><br>
                                비회원이신가요? 회원가입을 진행해주세요.</p>
                                <p class="jn6_alert2"></p>
                                <input class="jn6_authNo_findId"type="text" name="authNo"placeholder="인증번호" style="display:none;">
                            </div>
                        
                            <p class="jn6_resultCmt noto"></p>
                            
                            
        
                            <button class="jn6_send btn_s_red btn_240" onclick="sendSms()">
                                ID 찾기
                            </button>		
                            <div class="jn6_buttonDiv1">
                                <button class="jn6_send btn_s_gray btn_205" onclick="sendSms()">
                                    인증번호 전송
                                </button>
                                <button class="jn6_send btn_s_red btn_205" onclick="checkAuthNo()">
                                    확인
                                </button>				
                            </div>
                            <div class="jn6_buttonDiv2">
                                <button class="jn6_send btn_s_gray btn_205" onclick="location.href='/account/join/intro.do'">
                                    회원가입 하기
                                </button>
                                <button class="jn6_send btn_s_red btn_205" onclick="sendSms()">
                                    인증번호 전송
                                </button>				
                            </div>
        
                                <button class="jn6_buttonDiv3 btn_s_red btn_240" onclick="location.href='/account/login.do'">
                                    로그인
                                </button>			
        
                        </div>
                        <div class="jn6_findPwd" style="display:block;" center=80%>
                            <div>
                                <ul>
                                    <li>∙ 비밀번호의 경우 암호화 저장되어 분실 시 찾아드릴 수 없는 정보입니다.</li>
                                    <li>∙ 본인확인을 통해 비밀번호를 재설정 하실 수 있습니다.</li>						
                                </ul>
                                <div class="jn6_enter">
                                    <input class="jn6_customerNm"type="text" name="userNm"placeholder="이름">
                                    <input class=""type="hidden" name="userId"placeholder="아이디(이메일)">
                                    <input class=""type="text" name="id"placeholder="아이디(이메일)">
                                    <input class="jn6_email"type="text" style="width:126px;" name="email" placeholder="">
                                    <select id="selectEmail" name="email" class="jn6_frt">
                                    <select id="selectEmail" name="email" class="jn6_frt">
                                        <option value="true"selected>직접입력</option>
                                         <option value="naver.com">naver.com</option>
                                         <option value="nate.com">nate.com</option>
                                        <option value="daum.net">daum.net</option>
                                        <option value="hanmail.net">hanmail.net</option>
                                        <option value="gmail.com">gmail.com</option>
                                        <option value="yahoo.co.kr">yahoo.co.kr</option>
                                        <option value="lycos.co.kr">lycos.co.kr</option>
                                        <option value="paran.com">paran.com</option>
                                        <option value="empas.com">empas.com</option>
                                        <option value="hotmail.com">hotmail.com</option>
                                    </select>
                                </div>
                                <div class="jn6_findWay">
                                    <p>
                                        찾기 방법
                                    </p>
                                    <p onclick="selectRadio('radioEmail')">
                                        <input id="radioEmail" type="radio" name="findType"style="display:none;"value="email">
                                        <img src="https://www.iloom.com/img/front/account/check_2.png"/>
                                    </p>
                                    <p >
                                        E-mail 주소로 보내기
                                    </p>
                                    <p onclick="selectRadio('radioPhone')">
                                        <input id="radioPhone" type="radio" name="findType"style="display:none;" value="phone" >
                                        <img src="https://www.iloom.com/img/front/account/check_2.png"/>
                                    </p>
                                    <p >
                                        등록된 휴대폰 번호로 보내기
                                    </p>
                                </div>
                                <button class="jn6_buttonDiv3 btn_s_red btn_240" style="left:50%;" onclick="sendSms2()">
                                    비밀번호 찾기 <span>(인증번호 전송)</span>
                                </button>
                            </div>
                            <!-- <div>
                                <ul>
                                    <li>∙ 선택하신 수단으로 인증번호를 발송하였습니다</li>
                                    <li>∙ 전송된 인증번호 및 신규 비밀번호를 입력해주세요</li>						
                                </ul>		
                                <div class="enter">
                                    <input class="authNo_findPwd"type="text" name="authNo"placeholder="인증 번호" style="width:60%">
                                    <div id=count class="frt" style="padding-top:8px;">
                                        <span id=counter2>3</span>&nbsp;분&nbsp;
                                        <span id=counter3>00</span>&nbsp;초
                                        <span style="padding-left:30px;"></span>
                                    </div>
                                <div class="pwd">
                                    <div><input type="password"  autocomplete="off" style="display:none;"><input class="first"type="password" name="password"autocomplete="off"placeholder="비밀번호"><p></p></div>
                                    <div><input class="second"type="password" disabled="true" name=""placeholder="비밀번호 확인"><p></p></div>
                                </div>
                                </div>
                                <button class="buttonDiv3 btn_l_red btn_171" onclick="sendSms2()" style="left:0;margin:0;width:150px;">
                                     인증번호 재전송
                                </button>	
                                <button class="buttonDiv3 btn_s_red btn_240" onclick="updatePwd()" style="right:0;margin:0;">
                                    확인
                                </button>				
                            </div>
                            
                            <div class="layerPopup">
                                
                                    <p class="noto">비밀번호가 변경되었습니다.</p>
                                    <button class="buttonDiv3 btn_l_gray btn_240" style="left:50%;"onclick="confirm()">
                                        확인
                                    </button>
                                                            
                            </div> -->
                            
                        </div>
        
                    </div>
                    
                
                </div>
            
            
            
            
            
            </div>
        
  

        
        
           
</body>
<?
    include "../include/footer.php";
?>