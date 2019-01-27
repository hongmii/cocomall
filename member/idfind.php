<?
	include "../include/top.php";
?>
<link rel="stylesheet" href="../css/findId.css" />
</head>
<body>
<div id="login" class="jn_login">
		<div class="jn_container">
			<div class="jn_head">
				<p class="jn_noto">내 계정 찾기
				</p>
				<ul class="jn_ul">
					<li class="jn_li" style="border-bottom: 1px solid rgb(0, 0, 0);color: rgb(0, 0, 0);">
						<a href="idfind.php">아이디찾기</a>
					</li>
					<li class="jn_lii"style="border-bottom: 0px; color: rgb(170, 170, 170);">
						<a href='pwfind.php'>비밀번호 찾기</a>
					</li>
				</ul>
			</div>

			<div class="jn_body">
				<div class="jn_findId">
					<div class="jn_enter">
						<!-- <input class="customerNm" type="text" id="userNm" name="userNm" placeholder="이름"> -->
						<input class="jn_input" style="border: 1px solid #aaa;" type="text" id="cmj_userNm" name="userNm" placeholder="이름">

						<div class="jn_phone">
							
							<select name="phoneLeft" id="cmj_phoneLeft" class="jn_select">
								<option value="010">010</option>
								<option value="011">011</option>
								<option value="016">016</option>
								<option value="017">017</option>
								<option value="018">018</option>
								<option value="019">019</option>
							</select>
							<!-- <input class="phoneCenter" type="text" name="phoneCenter" id="phoneCenter" placeholder="">
							<input class="phoneRight" type="text" name="phoneRight" id="phoneRight" placeholder=""> -->

							<input class="jn_phoneCenter" type="text" name="phoneCenter" id="cmj_phoneCenter" placeholder="">
							<input class="jn_phoneRight" type="text" name="phoneRight" id="cmj_phoneRight" placeholder="">


							<!-- <input type="hidden" id="phone" name="phone" value="phoneLeft+phoneCenter+phoneRight"> -->

						</div>
						<!-- <p class="alert">입력하신 휴대폰 번호로 계정정보를 찾을 수 없습니다. 확인 후 다시 이용하여주세요. <br><br>
						비회원이신가요? 회원가입을 진행해주세요.</p>
						<p class="alert2"></p>
						<input class="authNo_findId"type="text" name="authNo"placeholder="인증번호" style="display:none;"> -->
					</div>

					<p class="jn_resultCmt noto"></p>

			
					<!-- <button class="jn_send btn_s_red btn_240" id="idFind"> -->
					<button class="jn_idFind" id="cmj_idFind">
						ID 찾기
					</button>

					<script>

						//   phone = "phoneLeft" + "phoneCenter" + "phoneRight";

						$(document).ready(function () {
			
							$('#cmj_idFind').click(function (e) {
								e.preventDefault();


								iphone = $('#cmj_phoneLeft').val() + $('#cmj_phoneCenter').val() + $('#phoneRight').val();
								$.ajax({
									type: 'POST',
									url: 'findId.php',
									data: {
										userNm: $('#cmj_userNm').val(),
										phone: iphone
									},
									dataType: 'json',
									success: function (data) {
										if (data.count == 0) { // 아이디 없음
											alert("아이디가 없습니다.");
										} else {				// 아이디 있음
											alert("아이디는 " + data.mem_id + " 입니다.");
										}
									}
								});

							});

						});
					</script>

				</div>

			</div>

		</div>

	</div>



</body>
<?
    include "../include/footer.php";
?>
