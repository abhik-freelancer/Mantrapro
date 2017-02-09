
$(document).ready(function(){
	var basepath = $("#basepath").val();
	
	
	$("#mayihelpForm").on("submit", function(event){
		event.preventDefault();
		
		if(validateMayIHelp()){
		$.ajax({
            type: "POST",
            url: basepath + 'home/InsertMayIHelp',
            dataType: "json",
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            data: $(this).serialize(),
            success: function (result) {
				//alert(result.msg_code);
				if(result.msg_code==0){
					$("#name , #mobileno , #email, #branch , #pincode , #message").removeClass('validation-error');
					var error_msg_str = result.msg_data;
					var validity_msg = error_msg_str.split("*");
					$("#mayihelp-error").html(validity_msg[0]);
					$("#"+validity_msg[1]).addClass('validation-error');
				}
				else if(result.msg_code==1){
					$("#mayihelp-error").css("color","#0F8110");
					$("#mayihelp-error").html(result.msg_data);
					$('#mayihelpForm')[0].reset();
				}
				else if(result.msg_code==2){
					$("#mayihelp-error").html(result.msg_data);
				}
				else{
					$("#mayihelp-error").html("");
				}
			}, 
			error: function (jqXHR, exception) {
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
		}
		else{
			return false;
		} 
	
	});
});

	function validateMayIHelp(){
		var areaofinterest="";
		var name = $("#name").val();
		var mobileno = $("#mobileno").val();
		var email = $("#email").val();
		var branch = $("#branch").val();
		var pincode = $("#pincode").val();
		var selectinterest =  $("input:radio[name=interestarea]:checked");
		if (selectinterest.length > 0) {
			areaofinterest = selectinterest.val();
		}
		var message = $("#message").val();
		var email_validate = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		var phone_valid = /^([0-9]{10})$/;
		var pincode_valid = /^([0-9]{6})$/;
		var error = "";
		var up_icon = '<span class="glyphicon glyphicon-hand-up"></span>';
		$("#name , #mobileno , #email, #branch , #pincode , #message").removeClass('validation-error');
		$("#mayihelp-error").html(error);
		
		if(name==""){
			$("#name").addClass('validation-error');
			error = up_icon+" Name is required";
			$("#mayihelp-error").html(error);
			return false;
		}
		if(mobileno==""){
			$("#mobileno").addClass('validation-error');
			error = up_icon+" Mobile no is required";
			$("#mayihelp-error").html(error);
			return false;
		}
		if(email.length>0){
			if(email_validate.test(email)==false){
			$("#email").addClass('validation-error');
			error = up_icon+" Email is not valid";
			$("#mayihelp-error").html(error);
			return false;
			}
		}
		if(phone_valid.test(mobileno)==false){
			$("#mobileno").addClass('validation-error');
			error = up_icon+" Mobile no is not valid";
			$("#mayihelp-error").html(error);
			return false;
		}
		if(branch=="0"){
			$("#branch").addClass('validation-error');
			error = up_icon+" Branch is required";
			$("#mayihelp-error").html(error);
			return false;
		}
		if(pincode==""){
			$("#pincode").addClass('validation-error');
			error = up_icon+" Pincode is required";
			$("#mayihelp-error").html(error);
			return false;
		}
		if(pincode_valid.test(pincode)==false){
			$("#pincode").addClass('validation-error');
			error = up_icon+" Pincode is not valid";
			$("#mayihelp-error").html(error);
			return false;
		}
		if(areaofinterest=="") {
			error = up_icon+" Select area of interest";
			$("#mayihelp-error").html(error);
			return false;
		}
		if(areaofinterest=="Others"){
			if(message==""){
				$("#message").addClass('validation-error');
				error = up_icon+" Please write your message";
				$("#mayihelp-error").html(error);
				return false;
			}
		}
		
		return true;
	}
	
function numericFilter(txb) {
   txb.value = txb.value.replace(/[^\0-9]/ig, "");
	//txb.value = txb.value.replace(/[^\0-9]/, "");
}	















