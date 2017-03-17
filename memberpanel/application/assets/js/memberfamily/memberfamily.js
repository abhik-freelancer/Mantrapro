$(document).ready(function(){
	var basepath = $("#basepath").val();
	$('#relationship').selectpicker();
	
	/* $("#relationship").on("change",function(){
		var id = $(this).val();
		alert(id);
	}); */
	
	$("#memberfamilyForm").on("submit",function(event){
		event.preventDefault();
		//validateMemberFamily();
		if(validateMemberFamily()){
		$.ajax({
				type: "POST",
				url: basepath + 'memberfamily/saveMemberFamily',
				dataType: "json",
				contentType: "application/x-www-form-urlencoded; charset=UTF-8",
				data: $(this).serialize(),
				success:function(result){
					if(result.msg_code==0){
						$("#save-memberfamily-err").html(result.msg_data);
					}
					else if(result.msg_code==1){
						$("#membfamlysuccess").html(result.msg_data);
						$('#membersfamilySuccessModal').modal({backdrop: 'static', keyboard: false})  
						$("#membersfamilySuccessModal").modal('show');
					}
					else if(result.msg_code==2){
						$("#save-memberfamily-err").html(result.msg_data);
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

function validateMemberFamily(){
	var relationship = $("#relationship").val();
	var name = $("#memfamilyname").val();
	var age = $("#memfamilyage").val();
	var bloodgrp = $("#memfamilybldgrp").val();
	
	var error = "";
	var up_icon = '<span class="glyphicon glyphicon-hand-up"></span>';
	$("#relationship , #memfamilyname , #memfamilyage").removeClass('validation-error');
	$("#save-memberfamily-err").html(error);
	
	if(relationship=="0"){
		error = up_icon+" Please select relationship";
		$("#relationship").addClass('validation-error');
		$("#save-memberfamily-err").html(error);
		return false;
	}
	if(name==""){
		error = up_icon+" Please enter family member's name";
		$("#memfamilyname").addClass('validation-error');
		$("#save-memberfamily-err").html(error);
		return false;
	}
	if(age==""){
		error = up_icon+" Please enter family member's age";
		$("#memfamilyage").addClass('validation-error');
		$("#save-memberfamily-err").html(error);
		return false;
	}
	if(age<0){
		error = up_icon+" Please enter family member's correct age";
		$("#memfamilyage").addClass('validation-error');
		$("#save-memberfamily-err").html(error);
		return false;
	}
	if(bloodgrp=="0"){
		error = up_icon+" Please select blood group";
		$("#memfamilybldgrp").addClass('validation-error');
		$("#save-memberfamily-err").html(error);
		return false;
	}
	return true;
}