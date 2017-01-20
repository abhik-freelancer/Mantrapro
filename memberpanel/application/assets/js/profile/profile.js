/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
    var basepath = $("#basepath").val();
    
     $("#frmPersonalia").on("submit", function(event) {
         event.preventDefault();
         //var data = $(this).serialize();
                   
        $.ajax({
            type: "POST",
            url: basepath + 'profile/UpadatePersonalia',
            dataType: "json",
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            data: $(this).serialize(),
            success: function (result) {
                if (result.msg_code == 0) {
                    $("#msgdivsuccess").hide();
                    $("#msgdiv").show();
                    $("#msgText").html(result.msg_data);

                } else if(result.msg_code == 2) {
                    $("#msgdivsuccess").hide();
                    $("#msgdiv").show();
                    $("#msgText").html(result.msg_data);
                }else if(result.msg_code == 1){
                    $("#msgdiv").hide();
                    $("#msgdivsuccess").show();
                    $("#successmsgText").html(result.msg_data);
                } else if(result.msg_code==500){
                    window.location.href = basepath + 'memberlogin';
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
       });
    
    $(document).on('click', '#errorclose', function () {
        $("#msgdiv").hide();
    });
     $(document).on('click', '#successclose', function () {
        $("#msgdivsuccess").hide();
    });
    
    
});//end