$(document).ready(function() {

    $('#checkAll').click(function() {
        if($("#checkAll").prop("checked")){
            $('input[name=products]').prop('checked', true);
        }else{
            $('input[name=products]').prop('checked', false);
    };
  });

});