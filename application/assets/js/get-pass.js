
$(document).ready(function(){
	var basepath = $("#basepath").val();
	
	$("#getPassForm").on("submit", function(event){
		 event.preventDefault();
		$.ajax({
            type: "POST",
            url: basepath + 'home/InsertFreeGuestPass',
            dataType: "json",
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            data: $(this).serialize(),
            success: function (result) {
               
            }, 
			error: function (jqXHR, exception) {
              /*  var msg = '';
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
                alert(msg); */
            }
        });
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
		if(gymLocation=="0"){
			error = "Select a gym location";
			$("#gymlocation-error").html(error);
			return false;
		}
		if(pincode==""){
			error ="Pincode is required";
			$("#pincode-error").html(error);
		}
		
		return true;
	}




