$(document).ready(function(){

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

   $("#submitChange").submit(function(){
   
       
       var pwd = $("input[name=mem_pwd]");
       var pwd2 = $("input[name=mem_pwd2]");
       var pwdLength = pwd.val().length;

       

           if (!(pwdLength >= 4 && pwdLength <= 6)) {
               alert("패스워드 4~6자로 적어주세요.");
               return false;
           }
       
           if (!(pwd.val() == pwd2.val())) {
               alert("패스워드를 확인해 주세요.");
               return false;
           }
       
   });
});