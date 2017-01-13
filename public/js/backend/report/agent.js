/**
 * PayMedia
 * js report/agent_report
 */
$(document).ready(function () {

    var nowADate = new Date();
    // var datetime = now.getFullYear()+'.'+(now.getMonth()+1)+'.'+now.getDate();
    // datetime += ' '+now.getHours()+'.'+now.getMinutes()+'.'+now.getSeconds();
    // var Title='daily_report '+document.getElementById('userNamePtag').innerHTML+' '+datetime;
    document.getElementById("agent_date").defaultValue = nowADate.getFullYear()+'-'+(nowADate.getMonth()+1)+'-'+nowADate.getDate();


    jQuery(function() {
        jQuery("#aDate").datetimepicker({
            format: "yyyy-mm-dd",
            startView: "month",
            minView: "month",
            autoclose: true
        });
    });

    // $("#btn_daily").click(function(a) {
    //     $("#aAlerts").empty();
    //     $("#aAlerts").append("<div class='alert alert-danger' role='alert'' id='alertAgentError'>Fill Required Fields * </div>");
    //     $("#alertAgentError").show();
    //     $("#alertAgentError").fadeTo(2000, 500).slideUp(500, function(){
    //         $("#alertAgentError").slideUp(500);
    //     });
    // });

});