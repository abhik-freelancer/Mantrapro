$(document).ready(function(){
	
	var basepath = $("#basepath").val();
	
	$("#career-resume").on("change",function(){
		var resume = $(this).val().replace(/([^\\]*\\)*/,'');
		$("#resume-file-info").html(resume);
	});
	
	$("#careerForm").on("submit",function(event){
		event.preventDefault();
	if(validateCareerForm()){
		 var formData = new FormData($(this)[0]);
		    $.ajax({
            type: "POST",
            url: basepath + 'about/insertMantraCareer',
            dataType: "json",
            processData: false,
            contentType: false, // "application/x-www-form-urlencoded; charset=UTF-8",
            data: formData,
            success: function (result){
              if(result.msg_code==0){
				$("#career-form-error").css('color','#F95340');
				$("#career-form-error").html(result.msg_data);
			  }
			  else if(result.msg_code==1){ 
				$("#career-form-error").css('color','#259819');
				$("#career-form-error").html(result.msg_data); 
				$("#careerForm")[0].reset();
			  }
			  else if(result.msg_code==2){
				$("#career-form-error").css('color','#F95340');
				$("#career-form-error").html(result.msg_data); 
			  }
			  else if(result.msg_code==3){
				$("#career-form-error").css('color','#F95340');
				$("#career-form-error").html(result.msg_data);
			  }
			  else{
				$("#career-form-error").html(""); 
			  }
            }
			, error: function (jqXHR, exception) {
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
             //   alert(msg);
            }
        });
		}else{
			return false;
		}
		
	});
	
	
	/*Know More*/
	
	$("#know-more-btn-director").on("click",function(){
		$("#more-info-director1").slideDown("slow");
		$("#know-more-btn-director").hide();
		$("#show-less-btn-director").show();
	});
	$("#show-less-btn-director").on("click",function(){
		$("#more-info-director1").slideUp("slow");
		$("#show-less-btn-director").hide();
		$("#know-more-btn-director").show();
		
	});
	
	
	
});


function validateCareerForm(){
	var firstname = $("#career-firstname").val();
	var lastname = $("#career-lastname").val();
	var mobile = $("#career-mobile").val();
	var email = $("#career-email").val();
	var branch = $("#branch").val();
	var appliedfor = $("#applied-for").val();
	var resume = $("#career-resume").val();
	
	var phone_valid = /^([0-9]{10})$/;
	var email_validate = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	
	var error = "";
	var up_icon = '<span class="glyphicon glyphicon-hand-up"></span>';
	$("#career-firstname , #career-lastname , #career-mobile, #career-email , #branch , #applied-for").removeClass('validation-error');
	$("#career-form-error").html(error);
	
	if(firstname==""){
		error = up_icon+" First Name is required";
		$("#career-firstname").addClass('validation-error');
		$("#career-form-error").html(error);
		return false;
	}
	if(lastname==""){
		error = up_icon+" Last Name is required";
		$("#career-lastname").addClass('validation-error');
		$("#career-form-error").html(error);
		return false;
	}
	if(mobile==""){
		error = up_icon+" Mobile no is required";
		$("#career-mobile").addClass('validation-error');
		$("#career-form-error").html(error);
		return false;
	}
	if(phone_valid.test(mobile)==false){
		$("#bodyfat-mobile").addClass('validation-error');
		error = up_icon+" Mobile no is not valid";
		$("#career-form-error").html(error);
		return false;
	}
	if(email.length>0){
		if(email_validate.test(email)==false){
		$("#career-email").addClass('validation-error');
		error = up_icon+" Email is not valid";
		$("#career-form-error").html(error);
		return false;
		}
	}
	if(branch=="0"){
		error = up_icon+" Please select branch";
		$("#branch").addClass('validation-error');
		$("#career-form-error").html(error);
		return false;
	}
	if(appliedfor=="0"){
		error = up_icon+" Please select applied for";
		$("#applied-for").addClass('validation-error');
		$("#career-form-error").html(error);
		return false;
	}
	if(resume==""){
		error = up_icon+" Please upload your resume";
		$("#career-resume").addClass('validation-error');
		$("#career-form-error").html(error);
		return false;
	}
	
	return true;
}
