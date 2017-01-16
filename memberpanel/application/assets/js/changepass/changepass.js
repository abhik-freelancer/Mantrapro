/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    var basepath = $("#basepath").val();
    
    
    $("#btnchangepwd").click(function(){
        var oldpassword = $("#oldpassword").val()||"";
        var newpassword = $("#newpassword").val()||"";
        if(validate()){
         $.ajax({
            type: "POST",
            url: basepath + 'changepass/changePassword',
            dataType: "json",
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            data: {mobile: mobile, pwd: pwd},
            success: function (result) {
                if (result.msg_code == 0) {

                    $("#msgdiv").show();
                    $("#msgText").html(result.msg_data);

                } else if(result.msg_code == 3) {
                    $("#msgdiv").show();
                    $("#msgText").html(result.msg_data);
                }else if(result.msg_code == 1){
                    window.location=basepath + 'memberdashboard';
                }
            }, error: function (jqXHR, exception) {
                var msg = '';
                if (jqXHR.status === 0) {
                    msg = 'Not connect.\n Verify Network.';
                } else if (jqXHR.status == 404) {
                    msg = 'Requested page not found. [404]';
                } else if (jqXHR.status == 500) {
                    msg = 'Internal Server Error [500].';
                } else if (exception === 'parsererror') {
                    msg = 'Requested JSON parse failed.';
                } else if (exception === 'timeout') {
                    msg = 'Time out error.';
                } else if (exception === 'abort') {
                    msg = 'Ajax request aborted.';
                } else {
                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                }
                alert(msg);
            }
        });
    }else{
        return false;
    }
    });
     $(document).on('click', '.glyphicon-remove', function () {
        $("#msgdiv").hide();
    });
});
function validate(){
     var oldpassword = $("#oldpassword").val()||"";
     var newpassword = $("#newpassword").val()||"";
     
     if(oldpassword=="" || newpassword=="" ){
          $("#msgdiv").show();
          $("#msgText").html("Fields are mandatory");
         return false;
     }
    return true;
}