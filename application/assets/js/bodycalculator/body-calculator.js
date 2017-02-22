/*----Body Calculator JS--------*/

$(document).ready(function(){
	var basepath = $("#basepath").val();
	
	// Body Fat 
	$("#bodyfatForm").on("submit",function(event){
		event.preventDefault();
		if(validateBodyFatForm()){
			$.ajax({
				type: "POST",
				url: basepath + 'body_calculator/InsertOutsideBodyFat',
				dataType: "json",
				contentType: "application/x-www-form-urlencoded; charset=UTF-8",
				data: $(this).serialize(),
				success:function(result){
					if(result.msg_code==0){
						$("#bodyfat-error").html(result.msg_data);
					}
					else if(result.msg_code==1){
						
						$(".fat-percentage-res").text(result.msg_data.bodyFatPercentage);
						$(".fat-mass-res").text(result.msg_data.bodyFatMass);
						$(".lean-body-mass-res").text(result.msg_data.bodyLeanMass);
						$(".waist-hip-ratio-res").text(result.msg_data.waisthipRatio);
						$(".waist-circum-point-res").text(result.msg_data.waistcurcumferencevalue);
						$(".waist-circum-remark").text(result.msg_data.waistcurcumferenceassesment);
						$(".waist-hip-point-res").text(result.msg_data.waistHipRatioValue);
						$(".waist-hip-remark").text(result.msg_data.waistHipRatioAssessment);
						$("#bodyfatForm")[0].reset();
					}
					else if(result.msg_code==2){
						$("#bodyfat-error").html(result.msg_data);
					}
					else{
						$("#bodyfat-error").html("");
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
	
	
	// Harvard Step Test
	
	$("#harvardTestForm").on("submit",function(event){
		event.preventDefault();
		validateHarvardTest();
	});
	
});


function validateBodyFatForm(){
	var firstname = $("#bodyfat-firstname").val();
	var lastname = $("#bodyfat-lastname").val();
	var mobile = $("#bodyfat-mobile").val();
	var email = $("#bodyfat-email").val();
	var weight = $("#txt_weight").val();
	var waist = $("#txt_waist").val();
	var hip = $("#txt_hip").val();
	var phone_valid = /^([0-9]{10})$/;
	var email_validate = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	
	var error = "";
	var up_icon = '<span class="glyphicon glyphicon-hand-up"></span>';
	$("#bodyfat-firstname , #bodyfat-lastname , #bodyfat-mobile, #bodyfat-email , #txt_weight , #txt_waist , #txt_hip").removeClass('validation-error');
	$("#bodyfat-error").html(error);
	
	if(firstname==""){
		error = up_icon+" First Name is required";
		$("#bodyfat-firstname").addClass('validation-error');
		$("#bodyfat-error").html(error);
		return false;
	}
	if(lastname==""){
		error = up_icon+" Last Name is required";
		$("#bodyfat-lastname").addClass('validation-error');
		$("#bodyfat-error").html(error);
		return false;
	}
	if(mobile==""){
		error = up_icon+" Mobile no is required";
		$("#bodyfat-mobile").addClass('validation-error');
		$("#bodyfat-error").html(error);
		return false;
	}
	if(phone_valid.test(mobile)==false){
		$("#bodyfat-mobile").addClass('validation-error');
		error = up_icon+" Mobile no is not valid";
		$("#bodyfat-error").html(error);
		return false;
	}
	if(email.length>0){
		if(email_validate.test(email)==false){
		$("#bodyfat-email").addClass('validation-error');
		error = up_icon+" Email is not valid";
		$("#bodyfat-error").html(error);
		return false;
		}
	}
	if(weight==""){
		error = up_icon+" Enter your weight";
		$("#txt_weight").addClass('validation-error');
		$("#bodyfat-error").html(error);
		return false;
	}
	if(weight<=0){
		error = up_icon+" Enter your real weight";
		$("#txt_weight").addClass('validation-error');
		$("#bodyfat-error").html(error);
		return false;
	}
	if(waist==""){
		error = up_icon+" Enter waist size";
		$("#txt_waist").addClass('validation-error');
		$("#bodyfat-error").html(error);
		return false;
	}
	if(waist<=0){
		error = up_icon+" Enter your real waist size";
		$("#txt_waist").addClass('validation-error');
		$("#bodyfat-error").html(error);
		return false;
	}
	if(hip==""){
		error = up_icon+" Enter hip size";
		$("#txt_hip").addClass('validation-error');
		$("#bodyfat-error").html(error);
		return false;
	}
	if(hip<=0){
		error = up_icon+" Enter your real hip size";
		$("#txt_hip").addClass('validation-error');
		$("#bodyfat-error").html(error);
		return false;
	}
	
	return true;
}




function validateHarvardTest(){
	var firstname = $("#harvard-test-firstname").val();
	var lastname = $("#harvard-test-lastname").val();
	var mobile = $("#harvard-test-mobile").val();
	var email = $("#harvard-test-email").val();
	var no_of_sec = $("#no_of_sec").val();
	var pulse_rate = $("#pulse-rate").val();
	var phone_valid = /^([0-9]{10})$/;
	var email_validate = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	
	var error = "";
	var up_icon = '<span class="glyphicon glyphicon-hand-up"></span>';
	$("#harvard-test-firstname , #harvard-test-lastname , #harvard-test-mobile, #harvard-test-email , #no_of_sec , #pulse-rate").removeClass('validation-error');
	$("#harvard-test-error").html(error);
	
	if(firstname==""){
		error = up_icon+" First Name is required";
		$("#harvard-test-firstname").addClass('validation-error');
		$("#harvard-test-error").html(error);
		return false;
	}
	if(lastname==""){
		error = up_icon+" Last Name is required";
		$("#harvard-test-lastname").addClass('validation-error');
		$("#harvard-test-error").html(error);
		return false;
	}
	if(mobile==""){
		error = up_icon+" Mobile no is required";
		$("#harvard-test-mobile").addClass('validation-error');
		$("#harvard-test-error").html(error);
		return false;
	}
	if(phone_valid.test(mobile)==false){
		$("#harvard-test-mobile").addClass('validation-error');
		error = up_icon+" Mobile no is not valid";
		$("#harvard-test-error").html(error);
		return false;
	}
	if(email.length>0){
		if(email_validate.test(email)==false){
		$("#harvard-test-email").addClass('validation-error');
		error = up_icon+" Email is not valid";
		$("#harvard-test-error").html(error);
		return false;
		}
	}
	if(no_of_sec==""){
		error = up_icon+" Enter your weight";
		$("#no_of_sec").addClass('validation-error');
		$("#bodyfat-error").html(error);
		return false;
	}
	if(no_of_sec<=0){
		error = up_icon+" Enter your real weight";
		$("#no_of_sec").addClass('validation-error');
		$("#bodyfat-error").html(error);
		return false;
	}
	if(pulse_rate==""){
		error = up_icon+" Enter waist size";
		$("#pulse-rate").addClass('validation-error');
		$("#bodyfat-error").html(error);
		return false;
	}
	if(pulse_rate<=0){
		error = up_icon+" Enter your real waist size";
		$("#pulse-rate").addClass('validation-error');
		$("#bodyfat-error").html(error);
		return false;
	}
	
	
	return true;
}




function numericFilter(txb) {
   txb.value = txb.value.replace(/[^\0-9]/ig, "");
}	
