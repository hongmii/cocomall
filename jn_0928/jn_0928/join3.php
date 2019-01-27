<?
    include "../include/top.php";
?>
    
    <script>
        $(document).ready(function () {

            var selectemailHost = $("select#selectemailHost");
            selectemailHost.change(function () {
                if ($("#selectemailHost option:selected").val() != "0") {
                    $("input[name='emailHost']").val($("#selectemailHost option:selected").val());
                } else {
                    $("input[name='emailHost']").val("");
                }
            });

            //우편번호 검색
            var zipSearchbtn = $("input[name='zipSearchbtn']");

            zipSearchbtn.click(function () {
                daum.postcode.load(function () {
                    new daum.Postcode({
                        oncomplete: function (data) {
                            $("input[name='addr1']").val(data.zonecode);
                            $("input[name='addr2']").val(data.address);
                            $("input[name='addr3']").val(data.buildingName);
                        }
                    }).open();
                });
            });

            $("#signupForm").submit(function () {

                //이메일
                var regExp = /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*/;
                var regExp1 = /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.^[a-zA-Z]{2,3}$/i;
                var emailId = $("input[name='emailId']");
                var emailHost = $("input[name='emailHost']");
                if (!(emailId.val().match(regExp))) {
                    alert("이메일 아이디를 입력해주세요.");
                    emailId.val() == "";
                    emailId.focus();
                    return false;
                }

                if (!(emailHost.val().match(regExp))) {
                    alert("이메일 주소를 입력양식에 맞게 작성해주세요.");
                    emailHost.val() == "";
                    emailHost.focus();
                    return false;
                }

                //패스워드1
                var pwd = $("input[name=pwd]");
                var pwd2 = $("input[name=pwd2]");
                var pwdLength = pwd.val().length;
                if (!(pwdLength >= 4 && pwdLength <= 6)) {
                    alert("패스워드 4~6자로 적어주세요.");
                    pwd.focus();
                    return false;
                }
                ////패스워드2
                if (!(pwd.val() == pwd2.val())) {
                    alert("패스워드를 확인해 주세요.");
                    pwd2.focus();
                    return false;
                }

                var name = $("input[name='name']");
                if (name.val().length == 0) {
                    alert("이름 입려하세요");
                    name.focus();
                    return false;
                } else if (name.val().length < 3 || name.val().length > 8) {
                    alert("이름을 3~8자 입력하세요");
                    name.focus();
                    return false;
                }

                //이름
                var name = $("input[name='name']");
                if (name.val().length == 0) {
                    alert("이름을 입력하세요.")
                    name.focus();
                    return false;
                } else if (name.val().length < 3 || name.val().length > 8) {
                    alert("이름을 3~8자 입력하세요");
                    name.focus();
                    return false;
                }

                //생일

                var year = document.getElementById('#years').val();
                var month = document.getElementById("#months").val();
                var day = document.getElementById("#days").val();
                var age = 14;
                var today = new Date();
                todayDate.setFullYear(year, month - 1, day);


                // if (year) {
                //     alert("Sorry have to be over 14 years");
                //     return false;
                // }




                //gender
                var radio = 0;
                $("input[name='gender']").each(function () {
                    if ($(this).is(":checked") == true) {
                        //if ($("input[name='gender']:checked") == true) {
                        radio++;
                    }
                });
                if (radio == 0) {
                    alert("성별을 체크하세요.")
                    return false;
                }

                //우편번호
                var ZipExp = /^\d{5}$/
                var zip = $("input[name=addr1]");
                var add1 = $("input[name=addr2]");
                var add2 = $("input[name=addr3]");

                if (!(zip.val().match(ZipExp))) {
                    alert("우편번호 5자리 숫자를 입력하세요.")
                    zip.focus();
                    return false;
                }
                if (add1.val() == "") {
                    alert("주소를 입력하세요")
                    addr.focus();
                    return false;
                }

                //phone num
                var exp = /^[0-9]+$/;
                var phone2 = $("input[name=phone2]");
                var phone3 = $("input[name=phone3]");

                if (!(phone2.val().match(exp))) {
                    alert("숫자를 입력하세요.");
                    phone2.focus();
                    return false;
                }
                if (!(phone3.val().match(exp))) {
                    alert("숫자를 입력하세요.");
                    phone3.focus();
                    return false;
                }
            });
        });

    </script>
</head>

<body>
    <div id="info" class="jn2_info">
        <div class="jn2_container">
            <div class="jn2_head">
                <p class="jn2_noto">회원가입
                </p>
                <ul>
                    <li>가입</li>
                    <li>약관동의</li>
                    <li style="font-weight:bold">정보입력</li>
                    <li>가입완료</li>
                </ul>

            </div>
            <div class="jn2_body">

                <form id="signupForm" action="joinInsert.php" method="post" name="joinForm" class="jn2_signupForm">

                    <div class="jn2_insert">
                        <div class="jn2_id">
                            <input maxlength="20" id="emailId" class="" type="text" name="emailId" placeholder="아이디(이메일)" class="jn2_emailId">
                            <input maxlength="20" id="emailHost" class="" type="text" style="width:126px;" name="emailHost" placeholder="" class="jn2_emailHost">
                            <!-- <select id="selectemailHost" name="selectemailHost" class="frt"> -->
                            <select id="selectemailHost" name="selectemailHost" class="jn2_selectemailHost"> 
                                <option value="0" selected>직접입력</option>
                                <option value="naver.com">naver.com</option>
                                <option value="nate.com">nate.com</option>
                                <option value="daum.net">daum.net</option>
                                <option value="hanmail.net">hanmail.net</option>
                                <option value="gmail.com">gmail.com</option>
                                <option value="yahoo.co.kr">yahoo.co.kr</option>
                                <option value="lycos.co.kr">lycos.co.kr</option>
                                <option value="hotmail.com">hotmail.com</option>
                            </select>
                            <!-- <button class="frt" id="idcheck">중복확인</button> -->
                            <button class="jn2_idcheck" id="idcheck">중복확인</button>
                        </div>
                        <script>
                            $('#idcheck').click(function (e) {
                                e.preventDefault();

                                $.ajax({
                                    type: 'POST',
                                    url: 'checkUserId.php',
                                    data: {
                                        "emailId": $('#emailId').val(),
                                        "emailHost": $('#emailHost').val()
                                    },
                                    success: function (data) {
                                        if (data == 0) {
                                            $('#emailId').css("border", "1px solid green");
                                            $('#emailHost').css("border", "1px solid green");
                                        }
                                        else {
                                            $('#emailId').css("border", "1px solid red");
                                            $('#emailHost').css("border", "1px solid red");
                                        }
                                    }
                                });

                            });
                        </script>
                        <div class="pwd">
                            <div>
                                <!-- <input type="password" autocomplete="off" style="display:none;" id="pwd" name="pwd"> -->

                                <!-- <input class="first" type="password" id="pwd" name="pwd" autocomplete="off" placeholder="비밀번호"> -->
                                <input class="jn2_pwd" type="password" id="pwd" name="pwd" autocomplete="off" placeholder="비밀번호">
                                <p></p>
                            </div>
                            <div>
                                <!-- <input class="second" type="password" id="pwd2" name="pwd2" placeholder="비밀번호 확인"> -->
                                <input class="jn2_pwd2" type="password" id="pwd2" name="pwd2" placeholder="비밀번호 확인">
                                <p></p>
                            </div>
                            <p class="jn2_frt">6~15자의 영문, 숫자, 특수문자 조합</p>
                        </div>
                        <div class="jn2_name">
                            <input maxlength="20" id="name" class="jn2_name" type="text" name="name" placeholder="이름">
                        </div>
                        <div class="jn2_date">
                            <select id="years" name="years" class="jn2_years"></select>
                            <select id="months" name="months" class="jn2_months"></select>
                            <select id="days" name="days" class="jn2_days"></select>

                            <ul>
                                <li class="jn2_radioM">
                                    <input type="radio" name="gender" value="1" class=""> 남자
                                </li>
                                <li class="jn2_radioF">
                                    <input type="radio" name="gender" value="2" class=""> 여자
                                </li>
                            </ul>
                        </div>

                        <script>

                            $(function () {
                                for (i = new Date().getFullYear(); i > 1900; i--) {
                                    $('#years').append($('<option />').val(i).html(i + "년"));
                                }
                                for (i = 1; i < 13; i++) {
                                    $('#months').append($('<option />').val(i).html(i + "월"));
                                }
                                updateNumberOfDays();

                            });

                            function updateNumberOfDays() {
                                $('#days').html('');
                                month = $('#months').val();
                                year = $('#years').val();
                                days = daysInMonth(month, year);

                                for (i = 1; i < days + 1; i++) {
                                    $('#days').append($('<option />').val(i).html(i + "일"));
                                }
                            }

                            function daysInMonth(month, year) {
                                return new Date(year, month, 0).getDate();
                            }

                        </script>

                        <div class="jn2_address">
                            <!-- 주소 -->
                            <!-- <input type="text" name="addr1" id="addr1" class="a"> -->
                            <input type="text" name="addr1" id="addr1" class="jn2_addr1">
                            <input type="button" name="zipSearchbtn" id="zipSearchbtn" class="jn2_zipSearchbtn"value="우편검색" style="vertical-align: middle;width: 100px; height: 34px;border: 1px solid #333;background-color: #fff; color:#333 ;line-height: 32px;">
                            <p></p>
                            <!-- <input style="width:403px; margin-top:10px" name="addr2" id="addr2" class="h" type="address1"> -->
                            <input style="width:403px; margin-top:10px" name="addr2" id="addr2" class="jn2_addr2" type="address1">
                            <p></p>
                            <!-- <input style="width:403px; margin-top:10px;" name="addr3" id="addr3" class="h" type="address2" placeholder="상세주소"> -->
                            <input style="width:403px; margin-top:10px;" name="addr3" id="addr3" class="jn2_addr3" type="address2" placeholder="상세주소">
                        </div>

                        <div class="jn2_phone">
                            <select id="phone1" name="phone1" class="jn2_phone1">
                                <option value="010">010</option>
                                <option value="011">011</option>
                                <option value="016">016</option>
                                <option value="017">017</option>
                                <option value="018">018</option>
                                <option value="019">019</option>
                            </select>
                            <input maxlength="4" id="phone2" class="jn2_phone2" type="text" name="phone2" placeholder="">
                            <input maxlength="4" id="phone3" class="jn2_phone3" type="text" name="phone3" placeholder="">
                        </div>
                    </div>
                    <!-- <input class="joinButton btn_s_gray btn_205" type="submit" id="btn4" value="회원가입" style="margin-top:10px"> -->
                    <input class="jn2_btn4" type="submit" id="btn4" value="회원가입" style="margin-top:10px">
                </form>
                <!-- <button class="joinButton btn_s_red btn_205" id="btn5" onclick="location.href='join1.php'"> -->
                <button class="jn2_btn5" id="btn5" onclick="location.href='join1.php'">
                
                처음으로</button>
                </button>

            </div>
        </div>
    </div>
    </div>

</body>
<?
    include "../include/footer.php";
?>
