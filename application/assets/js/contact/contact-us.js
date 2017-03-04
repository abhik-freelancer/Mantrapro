$(window).on("load", function() {
	var basepath = $("#basepath").val();
    var branch = $("#contact-branch").val();
	contactDetail(branch,basepath);
});

$(window).resize(function(){
	var window_width = $(window).width();
	//alert(window_width);
	if(window_width<=991){
		//alert("Responsive Mode");
		$('#fbpageContainer').html('<div class="fb-page" data-href="https://www.facebook.com/MantraLIfeStyleHealthClub/" data-tabs="timeline" data-width="' + window_width + '" data-height="480" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/MantraLIfeStyleHealthClub/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/MantraLIfeStyleHealthClub/">Mantra Lifestyle Health Club</a></blockquote></div>');
		FB.XFBML.parse(); 
		
	}
	else{
	
	}
});

$(document).ready(function(){
	var basepath = $("#basepath").val();
	$(document).on('change','#contact-branch',function(){
		var branch = $("#contact-branch").val();
		contactDetail(branch,basepath);
	});
	
	
	$("#contact-enquiry-form").on("submit",function(event){
		event.preventDefault();
		//validateContactEnquiry();
		
	if(validateContactEnquiry()){
		$.ajax({
			type:'POST',
			url:basepath+'contact/contactusEnquiry',
			dataType: "json",
			contentType: "application/x-www-form-urlencoded; charset=UTF-8",
			data: $(this).serialize(),
			success:function(response){
				if(response.status_code==0){
					$("#contact-enquiry-error").css("color","#F95340");
					$("#contact-enquiry-error").html(response.status_msg);
				}
				else if(response.status_code==1){
					$("#contact-enquiry-error").css("color","#0EA74B");
					$("#contact-enquiry-error").html(response.status_msg);
					$("#contact-enquiry-form")[0].reset();
					
					
				}
				else if(response.status_code==2){
					$("#contact-enquiry-error").css("color","#F95340");
					$("#contact-enquiry-error").html(response.status_msg);
					
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

function validateContactEnquiry(){
	var name = $("#enq-name").val();
	var email = $("#enq-email").val();
	var mobile = $("#enq-mobile").val();
	var message = $("#enq-message").val();
	var phone_valid = /^([0-9]{10})$/;
	var email_validate = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var error = "";
	var up_icon = '<span class="glyphicon glyphicon-info-sign"></span>';
	
	$("#enq-name,#enq-email,#enq-mobile,#enq-message").removeClass('validation-error');
	$("#contact-enquiry-error").html(error);
		if(name==""){
			error = up_icon+" Name is required";
			$("#enq-name").addClass('validation-error');
			$("#contact-enquiry-error").html(error);
			return false;
		}
		if(email==""){
			error = up_icon+" Email is required";
			$("#enq-email").addClass('validation-error');
			$("#contact-enquiry-error").html(error);
			return false;
		}
		if(email_validate.test(email)==false){
			error = up_icon+" Email is not valid";
			$("#enq-email").addClass('validation-error');
			$("#contact-enquiry-error").html(error);
			return false;
		}
		if(mobile == ""){
			error = up_icon+" Mobile no is required";
			$("#enq-mobile").addClass('validation-error');
			$("#contact-enquiry-error").html(error);
			return false;
		}
		if(phone_valid.test(mobile)==false){
			error = up_icon+" Mobile no is not valid";
			$("#enq-mobile").addClass('validation-error');
			$("#contact-enquiry-error").html(error);
			return false;
		}
		if(message==""){
			error = up_icon+" Please write your message";
			$("#enq-message").addClass('validation-error');
			$("#contact-enquiry-error").html(error);
			return false;
		}
		
	return true;
}


function contactDetail(branch,basepath){
	$.ajax({
			type: "POST",
            url: basepath + 'contact/getContactDetaitl',
            dataType: "html",
			data:{branch:branch},
			success:function(response){
				$("#contact-detail").html(response);
			}
		});
}