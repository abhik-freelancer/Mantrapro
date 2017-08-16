/*----Body Calculator JS--------*/

$(document).ready(function(){
	var basepath = $("#basepath").val();
	
	
	$("#body-fat-dob").on("change",function(event){
		var dob = $("#body-fat-dob").val();
		calculateAge(basepath,dob,'body-fat-age'); // basepath, dob , selector
		
	});
	
	// Body Fat 
	$("#bodyfatForm").on("submit",function(event){
		event.preventDefault();
		if(validateBodyFatForm()){
			$.ajax({
				type: "POST",
				url: basepath + 'body_calculator/calculateBodyFat',
				dataType: "json",
				contentType: "application/x-www-form-urlencoded; charset=UTF-8",
				data: $(this).serialize(),
				success:function(result){
					if(result.msg_code==0){
						$("#bodyfat-error").html(result.msg_data);
						$(".fat-percentage-res").text(0);
						$(".fat-mass-res").text(0);
						$(".lean-body-mass-res").text(0);
						$(".waist-hip-ratio-res").text(0);
						$(".waist-circum-point-res").text(0);
						$(".waist-circum-remark").text("-");
						$(".waist-hip-point-res").text(0);
						$(".waist-hip-remark").text("-");
					}
					else if(result.msg_code==1){
						$("#bodyfat-error").html("");
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
						$(".fat-percentage-res").text(0);
						$(".fat-mass-res").text(0);
						$(".lean-body-mass-res").text(0);
						$(".waist-hip-ratio-res").text(0);
						$(".waist-circum-point-res").text(0);
						$(".waist-circum-remark").text("-");
						$(".waist-hip-point-res").text(0);
						$(".waist-hip-remark").text("-");
					}
					else{
						$("#bodyfat-error").html("");
						$(".fat-percentage-res").text(0);
						$(".fat-mass-res").text(0);
						$(".lean-body-mass-res").text(0);
						$(".waist-hip-ratio-res").text(0);
						$(".waist-circum-point-res").text(0);
						$(".waist-circum-remark").text("-");
						$(".waist-hip-point-res").text(0);
						$(".waist-hip-remark").text("-");
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
			$(".fat-percentage-res").text(0);
			$(".fat-mass-res").text(0);
			$(".lean-body-mass-res").text(0);
			$(".waist-hip-ratio-res").text(0);
			$(".waist-circum-point-res").text(0);
			$(".waist-circum-remark").text("-");
			$(".waist-hip-point-res").text(0);
			$(".waist-hip-remark").text("-");
			return false;
		}
	});
	
	
	// Harvard Step Test
	
    $("#harvardTestForm").on("submit",function(event){
		event.preventDefault();
		
		if(validateHarvardTest()){ 
			$.ajax({
				type: "POST",
				url: basepath + 'body_calculator/calculateHarvardTest',
				dataType: "json",
				contentType: "application/x-www-form-urlencoded; charset=UTF-8",
				data: $(this).serialize(),
				success:function(result){
					if(result.msg_code==0){
						$("#harvard-test-error").html(result.msg_data);
						$(".harvard-score-result").text(0);
						$(".harvard-rating-result").text("-");
					}
					else if(result.msg_code==1){
						$("#harvard-test-error").html("");
						$(".harvard-score-result").text(result.msg_data.harvardtestScore);
						$(".harvard-rating-result").text(result.msg_data.harvardtestRating);
						$("#harvardTestForm")[0].reset();
					}
					else if(result.msg_code==2){
						$("#harvard-test-error").html(result.msg_data);
						$(".harvard-score-result").text(0);
						$(".harvard-rating-result").text("-");
					}
					else{
						$("#harvard-test-error").html("");
						$(".harvard-score-result").text(0);
						$(".harvard-rating-result").text("-");
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
			$(".harvard-score-result").text(0);
			$(".harvard-rating-result").text("-");
			return false;
		} 
	
	});
	/* End Harvard Step Test*/
	
	
	/*------Sit And Reach------------*/
	$('#body-fat-dob,#sitandreach-dob , #pushup-test-dob , #situp-test-dob').datepicker({
            autoclose: true,
			todayHighlight: true,
            format: 'dd-mm-yyyy',
			forceParse: false
			
	});

	
	$("#sitandreach-dob").on("change",function(event){
		var dob = $("#sitandreach-dob").val();
		calculateAge(basepath,dob,'sitandreach-age'); // basepath, dob , selector
		
	});
	
	
	$("#sitAndReachForm").on("submit",function(event){
		event.preventDefault();
		//validateSitAndReach();
		if(validateSitAndReach()){
		$.ajax({
				type: "POST",
				url: basepath + 'body_calculator/calculateSitAndReach',
				dataType: "json",
				contentType: "application/x-www-form-urlencoded; charset=UTF-8",
				data: $(this).serialize(),
				success:function(result){
					if(result.msg_code==0){
						$("#sitandreach-error").html(result.msg_data);
						$(".sitandreach-rating").text("-");
					}
					else if(result.msg_code==1){
						$("#sitandreach-error").html("");
						$(".sitandreach-rating").text(result.msg_data.rating);
						$("#sitAndReachForm")[0].reset();
					}
					else if(result.msg_code==2){
						$("#sitandreach-error").html(result.msg_data);
						$(".sitandreach-rating").text("-");
						
					}
					else{
						$("#sitandreach-error").html("");
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
			$(".sitandreach-rating").text("-");
			return false;
		}
		
	});
	
	
	/*-----Push Up Test-----*/
	$("#pushup-test-dob").on("change",function(event){
		var dob = $("#pushup-test-dob").val();
		calculateAge(basepath,dob,'pushup-test-age'); // basepath, dob , selector
		
	});
	
	$("#pushUpTestForm").on("submit",function(event){
		event.preventDefault();
		
		if(validatePushUpTest()){
		$.ajax({
				type: "POST",
				url: basepath + 'body_calculator/calculatePushUpTest',
				dataType: "json",
				contentType: "application/x-www-form-urlencoded; charset=UTF-8",
				data: $(this).serialize(),
				success:function(result){
					if(result.msg_code==0){
						$("#pushup-test-error").html(result.msg_data);
						$(".pushup-score-result").text(0);
						$(".pushup-rating-result").text("-");
					}
					else if(result.msg_code==1){
						$("#pushup-test-error").html("");
						$(".pushup-score-result").text(result.msg_data.score);
						$(".pushup-rating-result").text(result.msg_data.rating);
						$("#pushUpTestForm")[0].reset();
					}
					else if(result.msg_code==2){
						$("#pushup-test-error").html(result.msg_data);
						$(".pushup-score-result").text(0);
						$(".pushup-rating-result").text("-");
						
					}
					else{
						$("#pushup-test-error").html("");
						$(".pushup-score-result").text(0);
						$(".pushup-rating-result").text("-");
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
			$(".pushup-score-result").text(0);
			$(".pushup-rating-result").text("-");
			return false;
		}
		
	});
	
	
	/*------Sit Up Test --------*/
	$("#situp-test-dob").on("change",function(event){
		var dob = $("#situp-test-dob").val();
		calculateAge(basepath,dob,'situp-test-age'); // basepath, dob , selector
		
	});
	
	$("#sitUpTestForm").on("submit",function(event){
		event.preventDefault();
	//	validateSitUpTest();
		if(validateSitUpTest()){
		$.ajax({
			type: "POST",
			url: basepath + 'body_calculator/calculateSitUpTest',
			dataType: "json",
			contentType: "application/x-www-form-urlencoded; charset=UTF-8",
			data: $(this).serialize(),
			success:function(result){
				if(result.msg_code==0){
						$("#situp-test-error").html(result.msg_data);
						$(".situp-score-result").text(0);
						$(".situp-rating-result").text("-");
					}
				else if(result.msg_code==1){
					$("#situp-test-error").html("");
					$(".situp-score-result").text(result.msg_data.score);
					$(".situp-rating-result").text(result.msg_data.rating);
					$("#sitUpTestForm")[0].reset();
				}
				else if(result.msg_code==2){
					$("#situp-test-error").html(result.msg_data);
					$(".situp-score-result").text(0);
					$(".situp-rating-result").text("-");
						
				}
				else{
					$("#situp-test-error").html("");
					$(".situp-score-result").text(0);
					$(".situp-rating-result").text("-");
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
			$(".situp-score-result").text(0);
			$(".situp-rating-result").text("-");
			return false;
		}
	
	});
	
	

});


function validateBodyFatForm(){
	var firstname = $("#bodyfat-firstname").val();
	var lastname = $("#bodyfat-lastname").val();
	var dob = $("#body-fat-dob").val();
	var mobile = $("#bodyfat-mobile").val();
	var email = $("#bodyfat-email").val();
	var weight = $("#txt_weight").val();
	var waist_navel = $("#txt_waist_navel").val();
	var waist = $("#txt_waist").val();
	var hip = $("#txt_hip").val();
	var phone_valid = /^([0-9]{10})$/;
	var email_validate = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	
	var error = "";
	var up_icon = '<span class="glyphicon glyphicon-hand-up"></span>';
	$("#bodyfat-firstname , #bodyfat-lastname ,#body-fat-dob, #bodyfat-mobile, #bodyfat-email , #txt_weight , #txt_waist_navel, #txt_waist , #txt_hip").removeClass('validation-error');
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
	if(dob==""){
		error = up_icon+" DOB is required";
		$("#body-fat-dob").addClass('validation-error');
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
	if(waist_navel==""){
		error = up_icon+" Enter waist navel size";
		$("#txt_waist_navel").addClass('validation-error');
		$("#bodyfat-error").html(error);
		return false;
	}
	if(waist_navel<=0){
		error = up_icon+" Enter your real waist navel size";
		$("#txt_waist_navel").addClass('validation-error');
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
		error = up_icon+" Enter no of sec";
		$("#no_of_sec").addClass('validation-error');
		$("#harvard-test-error").html(error);
		return false;
	}
	if(no_of_sec<=0){
		error = up_icon+" No of sec should be postive value";
		$("#no_of_sec").addClass('validation-error');
		$("#harvard-test-error").html(error);
		return false;
	}
	if(pulse_rate==""){
		error = up_icon+" Enter pulse rate";
		$("#pulse-rate").addClass('validation-error');
		$("#harvard-test-error").html(error);
		return false;
	}
	if(pulse_rate<=0){
		error = up_icon+" Pulse rate should be postive value";
		$("#pulse-rate").addClass('validation-error');
		$("#harvard-test-error").html(error);
		return false;
	}
	
	return true;
}

function validateSitAndReach(){
	var firstname = $("#sitandreach-firstname").val();
	var lastname = $("#sitandreach-lastname").val();
	var dob = $("#sitandreach-dob").val();
	var mobile = $("#sitandreach-mobile").val();
	var email = $("#sitandreach-email").val();
	var age = $("#sitandreach-age").val();
	var distance = $("#sitandreach-distance").val();
	var phone_valid = /^([0-9]{10})$/;
	var email_validate = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var dobvalidation =  /^\d{1,2}-\d{1,2}-\d{4}$/;
	
	var error = "";
	var up_icon = '<span class="glyphicon glyphicon-hand-up"></span>';
	$("#sitandreach-firstname , #sitandreach-lastname , #sitandreach-dob, #sitandreach-mobile , #sitandreach-email , #sitandreach-distance").removeClass('validation-error');
	$("#sitandreach-error").html(error);
	
	if(firstname==""){
		error = up_icon+" First Name is required";
		$("#sitandreach-firstname").addClass('validation-error');
		$("#sitandreach-error").html(error);
		return false;
	}
	if(lastname==""){
		error = up_icon+" Last Name is required";
		$("#sitandreach-lastname").addClass('validation-error');
		$("#sitandreach-error").html(error);
		return false;
	}
	
	if(dob==""){
		error = up_icon+" DOB is required";
		$("#sitandreach-dob").addClass('validation-error');
		$("#sitandreach-error").html(error);
		return false;
	} 
	
	if(dobvalidation.test(dob)==false){
		$("#sitandreach-dob").addClass('validation-error');
		error = up_icon+" DOB format is not valid";
		$("#sitandreach-error").html(error);
		return false;
	}
	
	if(mobile==""){
		error = up_icon+" Mobile no is required";
		$("#sitandreach-mobile").addClass('validation-error');
		$("#sitandreach-error").html(error);
		return false;
	}
	if(phone_valid.test(mobile)==false){
		$("#sitandreach-mobile").addClass('validation-error');
		error = up_icon+" Mobile no is not valid";
		$("#sitandreach-error").html(error);
		return false;
	}
	if(email.length>0){
		if(email_validate.test(email)==false){
		$("#sitandreach-email").addClass('validation-error');
		error = up_icon+" Email is not valid";
		$("#sitandreach-error").html(error);
		return false;
		}
	}
	if(age==""){
		error = up_icon+" DOB is not in correct format";
		$("#sitandreach-age").addClass('validation-error');
		$("#sitandreach-error").html(error);
		return false;
	}
	if(distance==""){
		$("#sitandreach-distance").addClass('validation-error');
		error = up_icon+" Enter distance value";
		$("#sitandreach-error").html(error);
		return false;
	}
	
	return true;
}

function validatePushUpTest(){
	var firstname = $("#pushup-test-firstname").val();
	var lastname = $("#pushup-test-lastname").val();
	var dob = $("#pushup-test-dob").val();
	var mobile = $("#pushup-test-mobile").val();
	var email = $("#pushup-test-email").val();
	var age = $("#pushup-test-age").val();
	var repetitions = $("#pushup-test-repetitions").val();
	var phone_valid = /^([0-9]{10})$/;
	var email_validate = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var dobvalidation =  /^\d{1,2}-\d{1,2}-\d{4}$/;
	
	var error = "";
	var up_icon = '<span class="glyphicon glyphicon-hand-up"></span>';
	$("#pushup-test-firstname , #pushup-test-lastname , #pushup-test-dob, #pushup-test-mobile , #pushup-test-email , #sitandreach-distance").removeClass('validation-error');
	$("#pushup-test-repetitions").html(error);
	
	if(firstname==""){
		error = up_icon+" First Name is required";
		$("#pushup-test-firstname").addClass('validation-error');
		$("#pushup-test-error").html(error);
		return false;
	}
	if(lastname==""){
		error = up_icon+" Last Name is required";
		$("#pushup-test-lastname").addClass('validation-error');
		$("#pushup-test-error").html(error);
		return false;
	}
	
	if(dob == ""){
		error = up_icon+" DOB is required";
		$("#pushup-test-dob").addClass('validation-error');
		$("#pushup-test-error").html(error);
		return false;
	} 
	
	if(dobvalidation.test(dob)==false){
		$("#pushup-test-dob").addClass('validation-error');
		error = up_icon+" DOB format is not valid";
		$("#pushup-test-error").html(error);
		return false;
	}
	
	if(mobile==""){
		error = up_icon+" Mobile no is required";
		$("#pushup-test-mobile").addClass('validation-error');
		$("#pushup-test-error").html(error);
		return false;
	}
	if(phone_valid.test(mobile)==false){
		$("#pushup-test-mobile").addClass('validation-error');
		error = up_icon+" Mobile no is not valid";
		$("#pushup-test-error").html(error);
		return false;
	}
	if(email.length>0){
		if(email_validate.test(email)==false){
		$("#pushup-test-email").addClass('validation-error');
		error = up_icon+" Email is not valid";
		$("#pushup-test-error").html(error);
		return false;
		}
	}
	if(age==""){
		error = up_icon+" DOB is not in correct format";
		$("#pushup-test-age").addClass('validation-error');
		$("#pushup-test-error").html(error);
		return false;
	}
	if(repetitions==""){
		$("#pushup-test-repetitions").addClass('validation-error');
		error = up_icon+" Enter repetitions value";
		$("#pushup-test-error").html(error);
		return false;
	}
	if(repetitions<=0){
		$("#pushup-test-repetitions").addClass('validation-error');
		error = up_icon+" Repetation value should be positive";
		$("#pushup-test-error").html(error);
		return false;
	}
	
	return true;
}

function validateSitUpTest(){
	var firstname = $("#situp-test-firstname").val();
	var lastname = $("#situp-test-lastname").val();
	var dob = $("#situp-test-dob").val();
	var mobile = $("#situp-test-mobile").val();
	var email = $("#situp-test-email").val();
	var age = $("#situp-test-age").val();
	var repetitions = $("#situp-test-repetitions").val();
	var phone_valid = /^([0-9]{10})$/;
	var email_validate = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var dobvalidation =  /^\d{1,2}-\d{1,2}-\d{4}$/;
	
	var error = "";
	var up_icon = '<span class="glyphicon glyphicon-hand-up"></span>';
	$("#situp-test-firstname , #situp-test-lastname , #situp-test-dob, #situp-test-mobile , #situp-test-email , #situp-test-repetitions").removeClass('validation-error');
	$("#situp-test-error").html(error);
	
	if(firstname==""){
		error = up_icon+" First Name is required";
		$("#situp-test-firstname").addClass('validation-error');
		$("#situp-test-error").html(error);
		return false;
	}
	if(lastname==""){
		error = up_icon+" Last Name is required";
		$("#situp-test-lastname").addClass('validation-error');
		$("#situp-test-error").html(error);
		return false;
	}
	
	if(dob == ""){
		error = up_icon+" DOB is required";
		$("#situp-test-dob").addClass('validation-error');
		$("#situp-test-error").html(error);
		return false;
	} 
	
	if(dobvalidation.test(dob)==false){
		$("#situp-test-dob").addClass('validation-error');
		error = up_icon+" DOB format is not valid";
		$("#situp-test-error").html(error);
		return false;
	}
	
	if(mobile==""){
		error = up_icon+" Mobile no is required";
		$("#situp-test-mobile").addClass('validation-error');
		$("#situp-test-error").html(error);
		return false;
	}
	if(phone_valid.test(mobile)==false){
		$("#situp-test-mobile").addClass('validation-error');
		error = up_icon+" Mobile no is not valid";
		$("#situp-test-error").html(error);
		return false;
	}
	if(email.length>0){
		if(email_validate.test(email)==false){
		$("#situp-test-email").addClass('validation-error');
		error = up_icon+" Email is not valid";
		$("#situp-test-error").html(error);
		return false;
		}
	}
	if(age==""){
		error = up_icon+" DOB is not in correct format";
		$("#situp-test-age").addClass('validation-error');
		$("#situp-test-error").html(error);
		return false;
	}
	if(repetitions==""){
		$("#situp-test-repetitions").addClass('validation-error');
		error = up_icon+" Enter repetitions value";
		$("#situp-test-error").html(error);
		return false;
	}
	if(repetitions<=0){
		$("#situp-test-repetitions").addClass('validation-error');
		error = up_icon+" Repetation value should be positive";
		$("#situp-test-error").html(error);
		return false;
	}
	
	return true;
}


function calculateAge(basepath,dob,selector){
	$.ajax({
		type: "POST",
		url: basepath + 'body_calculator/getAge',
		dataType: "json",
		contentType: "application/x-www-form-urlencoded; charset=UTF-8",
		data: {dob:dob},
		success:function(result){
			if(result.msg_code==0){
				$("#"+selector).val(result.msg_data);
			}
			else if(result.msg_code==1){
				$("#"+selector).val(result.msg_data);
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



function numericFilter(txb) {
   txb.value = txb.value.replace(/[^\0-9]/ig, "");
}	
