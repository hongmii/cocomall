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
});
