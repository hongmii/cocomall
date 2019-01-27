$(document).ready(function(){

});

function login(){
    if($('.id').val().length<1){
        alert('아이디를 입력해주세요');
        return false;
    } else if ($('.pwd').val().length<1){
        alert ("비밀번화를 입력해주세요");
        return false;
    }else{
        document.loginForm.submit();
    }
}    

