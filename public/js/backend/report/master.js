/**
 * PayMedia
 * js report/master_report
 */
$(document).ready(function () {

    var nowMDate = new Date();
    // var datetime = now.getFullYear()+'.'+(now.getMonth()+1)+'.'+now.getDate();
    // datetime += ' '+now.getHours()+'.'+now.getMinutes()+'.'+now.getSeconds();
    // var Title='daily_report '+document.getElementById('userNamePtag').innerHTML+' '+datetime;
    document.getElementById("master_date").defaultValue = nowMDate.getFullYear()+'-'+(nowMDate.getMonth()+1)+'-'+nowMDate.getDate();


    jQuery(function() {
        jQuery("#mDate").datetimepicker({
            format: "yyyy-mm-dd",
            startView: "month",
            minView: "month",
            autoclose: true
        });
    });

    // $("#btn_daily").click(function(a) {
    //     $("#mAlerts").empty();
    //     $("#mAlerts").append("<div class='alert alert-danger' role='alert' id='alertMasterError'>Fill Required Fields * </div>");
    //     $("#alertMasterError").show();
    //     $("#alertMasterError").fadeTo(2000, 500).slideUp(500, function(){
    //         $("#alertMasterError").slideUp(500);
    //     });
    // });

});