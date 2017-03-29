
$(document).ready(function(){
	var basepath = $("#basepath").val();
	
	$("#fitnessEnqForm").on("submit",function(event){
		event.preventDefault();
		//validateFitnessEduForm();
		
		if(validateFitnessEduForm()){
		$.ajax({
			type:'POST',
			url:basepath+'fitness_education/fitnessEducationEnquiry',
			dataType: "json",
			contentType: "application/x-www-form-urlencoded; charset=UTF-8",
			data: $(this).serialize(),
			success:function(response){
				
				if(response.status_code==0){
					$("#fitnessedu-enq-error").css("color","#F95340");
					$("#fitnessedu-enq-error").html(response.status_msg);
				}
				else if(response.status_code==1){
					$("#fitnessedu-enq-error").css("color","#0EA74B");
					$("#fitnessedu-enq-error").html(response.status_msg);
					$("#fitnessEnqForm")[0].reset();
					
					
				}
				else if(response.status_code==2){
					$("#fitnessedu-enq-error").css("color","#F95340");
					$("#fitnessedu-enq-error").html(response.status_msg);
					
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
              //  alert(msg);  
            }
		});
		}
		else{
			return false;
		}
		
		
		
	});
	
});


function validateFitnessEduForm(){
	var name = $("#fitnessedu-enq-name").val();
	var email = $("#fitnessedu-enq-email").val();
	var mobile = $("#fitnessedu-enq-mobile").val();
	var message = $("#fitnessedu-enq-message").val();
	var phone_valid = /^([0-9]{10})$/;
	var email_validate = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var error = "";
	var up_icon = '<span class="glyphicon glyphicon-hand-up"></span>';
	
	$("#fitnessedu-enq-name,#fitnessedu-enq-email,#fitnessedu-enq-mobile,#fitnessedu-enq-message").removeClass('validation-error');
	$("#fitnessedu-enq-error").html(error);
		if(name==""){
			error = up_icon+" Name is required";
			$("#fitnessedu-enq-name").addClass('validation-error');
			$("#fitnessedu-enq-error").html(error);
			return false;
		}
		if(email==""){
			error = up_icon+" Email is required";
			$("#fitnessedu-enq-email").addClass('validation-error');
			$("#fitnessedu-enq-error").html(error);
			return false;
		}
		if(email_validate.test(email)==false){
			error = up_icon+" Email is not valid";
			$("#fitnessedu-enq-email").addClass('validation-error');
			$("#fitnessedu-enq-error").html(error);
			return false;
		}
		if(mobile == ""){
			error = up_icon+" Mobile no is required";
			$("#fitnessedu-enq-mobile").addClass('validation-error');
			$("#fitnessedu-enq-error").html(error);
			return false;
		}
		if(phone_valid.test(mobile)==false){
			error = up_icon+" Mobile no is not valid";
			$("#fitnessedu-enq-mobile").addClass('validation-error');
			$("#fitnessedu-enq-error").html(error);
			return false;
		}
		if(message==""){
			error = up_icon+" Please write your message";
			$("#fitnessedu-enq-message").addClass('validation-error');
			$("#fitnessedu-enq-error").html(error);
			return false;
		}
		
	return true;
}