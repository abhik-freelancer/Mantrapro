$(window).load(function(){
	var basepath = $("#basepath").val();
	var membership = $("#membership-no").val();
	var validity = $("#member-validity").val();

	$.ajax({
		type: "POST",
				url: basepath + 'memberdashboard/checkCashBackApplied',
				dataType: "json",
				contentType: "application/x-www-form-urlencoded; charset=UTF-8",
				data: {membership:membership,validity:validity},
				success:function(result){
					if(result.msg_data=='Y'){
						$(".casbck-terms-condition").css("display","none");
						$("#cash-back-apply-btn").css("display","none");
						$("#cashback-applied-msg").css("display","block");
					}
					else{
						
						$("#cashback-applied-msg").css("display","none");
						$(".casbck-terms-condition").css("display","block");
						$("#cash-back-apply-btn").css("display","block");
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
	
});

$(document).ready(function(){
	var basepath = $("#basepath").val();
	$(".cashbackForm #membership-no").prop("readonly", true);
	$(".cashbackForm #member-validity").prop("readonly", true);
	$(".cashbackForm #cashback-amount").prop("readonly", true);
	$(".cashbackForm #cashback-point").prop("readonly", true);
	
	$("#cashbackForm").on("submit",function(event){
		event.preventDefault();
		
		if(validateTermsCondition()){
		$.ajax({
		type: "POST",
				url: basepath + 'memberdashboard/processCashBack',
				dataType: "json",
				contentType: "application/x-www-form-urlencoded; charset=UTF-8",
				data: $(this).serialize(),
				success:function(result){
					if(result.msg_code==0){
						$("#cashbck-error").html(result.msg_data);
					}
					else if(result.msg_code==1){
						$("#cashbacksuccessmsg").html(result.msg_data);
						$('#cashbacksaveModal').modal({backdrop: 'static', keyboard: false})  
						$("#cashbacksaveModal").modal('show');
					}
					else if(result.msg_code==2){
						$("#cashbck-error").html(result.msg_data);
					}
					else{
						window.location.href = basepath + 'memberlogin';
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
		}else{
			return false;
		}
		
	});
	
	
});


function validateTermsCondition(){
	var isChecked = $("#termsAgree").is(':checked');
	var error = "";
	$("#cashbck-error").html(error);
	if(isChecked==false){
		error = "You must agree with the terms and conditions";
		$("#cashbck-error").html(error);
		return false;
	}
	return true;
	
}


