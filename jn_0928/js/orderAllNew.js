$(document).ready(function () {

    var origPnts = parseInt($("#availPntsText").text().replace(",", ""));

    $("#usePntCheckbox").click(function (){       
      
    if ($(this).prop("checked")) {
            var points = 0;
            var total = parseInt($("#totalAmountText").text().replace(",", "")) - origPnts;      
            $("#totalAmountText").text(total);
            $("#totalAmount").val(total);
            $("#availPntsText").text(points); //0
            $("#availPnts").val(points);
    } else {
        var total = parseInt($("#totalAmountText").text().replace(",", "")) + origPnts;
        $("#totalAmountText").text(total);
        $("#availPntsText").text(origPnts); 
        $("#availPnts").val(origPnts);
        $("#totalAmount").val(total);
    }
});

});