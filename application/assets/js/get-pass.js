
$(document).ready(function(){
	var basepath = $("#basepath").val();
	
	$("#getPassForm").on("submit", function(event){
		 event.preventDefault();
		if(validateFreeGuestPass()){
		$.ajax({
            type: "POST",
            url: basepath + 'home/InsertFreeGuestPass',
            dataType: "json",
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            data: $(this).serialize(),
            success: function (result) {
				//alert(result.msg_code);
				if (result.msg_code == 0) {
					//$("#all-field-req").html("");
					$("#submit-response").css("display","none");
					$("#submit-response").html("");
					
					$("#all-field-req").css("display","block");
					$("#all-field-req").html(result.msg_data);
				}
				else if(result.msg_code == 10){
					$("#submit-response").css("display","none");
					$("#submit-response").html("");
					
					$("#all-field-req").css("display","block");
					$("#all-field-req").html(result.msg_data);
				}
				else if(result.msg_code == 1){
					$("#all-field-req").css("display","none");
					$("#all-field-req").html("");
					
					$("#submit-response").css("display","block");
					$("#submit-response").html(result.msg_data);
					$('#getPassForm')[0].reset();
				}
				else if(result.msg_code == 2){
					$("#all-field-req").css("display","none");
					$("#all-field-req").html("");
					
					$("#submit-response").css("display","block");
					$("#submit-response").html(result.msg_data);
				}
				else{
					$("#all-field-req").html("");
					$("#submit-response").html("");
					$("#all-field-req").css("display","none");
					$("#submit-response").css("display","none");
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

	function validateFreeGuestPass(){
		var firstname = $("#firstname").val();
		var lastname = $("#lastname").val();
		var email = $("#email").val();
		var mobile = $("#mobile").val();
		var gymLocation = $("#gymLocation").val();
		var pincode = $("#pincode").val();
		var error = "";
		var email_validate = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		var mobile_validate = /^([0-9]{10})$/;
		
		$("#fname-error").html("");
		$("#lastname-error").html("");
		$("#email-error").html("");
		$("#mobile-error").html("");
		$("#gymlocation-error").html("");
		$("#pincode-error").html("");
		
		if(firstname==""){
			error = "First name is required";
			$("#fname-error").html(error);
			return false;
		}
		if(lastname==""){
			
			error = "Last name is required";
			$("#lastname-error").html(error);
			return false;
		}
		if(email!=""){
			if(!email_validate.test(email)){
			error = "This email is not valid";
			$("#email-error").html(error);
			return false;
			}
		}
		if(mobile==""){
			error = "Mobile No is required";
			$("#mobile-error").html(error);
			return false;
		}
		if(!mobile_validate.test(mobile)){
			error = "This mobile no is not valid";
			$("#mobile-error").html(error);
			return false;
		}
		if(gymLocation=="0"){
			error = "Select a gym location";
			$("#gymlocation-error").html(error);
			return false;
		}
		if(pincode==""){
			error ="Pincode is required";
			$("#pincode-error").html(error);
			return false;
		}
		
		return true;
	}

function numericFilter(txb) {
   txb.value = txb.value.replace(/[^\0-9]/ig, "");
	//txb.value = txb.value.replace(/[^\0-9]/, "");
}



