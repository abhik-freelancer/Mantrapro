$(document).ready(function(){
	var basepath = $("#basepath").val();
	
	$('#memberFamilyList,#bloodPressureData').DataTable({
		"ordering": false,
		language: {
			search: "_INPUT_",
			searchPlaceholder: "Search..."
		}
	});
	
	
	$('#relationship').selectpicker();
	$('.searchabledropdown').selectpicker();
	
	$('#collectiondate').datepicker({
		autoclose: true,
        todayHighlight: true,
        format: 'dd-mm-yyyy',
        forceParse: false
	}); 
	
	$('.datepicker').datepicker({
		autoclose: true,
        todayHighlight: true,
        format: 'dd-mm-yyyy',
        forceParse: false
	});
	
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
	}); /*----END-----*/
	
	
	$("#membr-relatinship").on("change",function(){
		var relationid = $(this).val();
		var relation= $("#membr-relatinship option:selected").text();
		if(relation=="Self" && relationid==18){
			 $('#membr-family-name').prop('disabled', 'disabled');
			 $("#memFamilyName .searchabledropdown .btn").css({
				 "background":"#E0E0E0",
				"cursor":"not-allowed"
			 });
		}
		else{
			 $('#membr-family-name').prop('disabled', false);
			 $("#memFamilyName .searchabledropdown .btn").css({});
			 
			 
			 
			$.ajax({
				type: "POST",
				url: basepath + 'memberfamily/getMemberFamily',
				dataType: "html",
				//contentType: "application/x-www-form-urlencoded; charset=UTF-8",
				data:{relationid:relationid},
				success:function(result){
					$("#memFamilyName").html(result);
					$('.searchabledropdown').selectpicker();
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
	});  
	
	
	// Blood Pressure Search
	$("#bpSearchForm").on("submit",function(event){
		event.preventDefault();
		
		$("#bpLoader").css("display","block");
		
		$.ajax({
			url:basepath + 'memberfamily/getBloodTestReport',
			type:'POST',
			dataType:'html',
			data:$(this).serialize(),
			success:function(res){
				$("#bpLoader").css("display","none");
				$("#bloodPressureList").html(res);
				$('#bloodPressureData').DataTable({
					"ordering": false,
					language: {
						search: "_INPUT_",
						searchPlaceholder: "Search..."
					}
				});
			},
			error:function (jqXHR, exception) {
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
	});
	
	
	
	
	
	// Add Blood Pressure 
	$("#bloodPressureForm").on("submit",function(event){
		event.preventDefault();

		if(validateBloodPressure()){
		$.ajax({
				type: "POST",
				url: basepath + 'memberfamily/saveBloodPressure',
				dataType: "json",
				contentType: "application/x-www-form-urlencoded; charset=UTF-8",
				data: $(this).serialize(),
				success:function(result){
					if(result.msg_code==0){
						$("#bldpressure-err").html(result.msg_data);
					}
					else if(result.msg_code==1){
						$("#bldpressure-err").html("");
						$("#bpsavesuccessmsg").html(result.msg_data);
						$('#memFamlyBPsaveModal').modal({backdrop: 'static', keyboard: false})  
						$("#memFamlyBPsaveModal").modal('show');
					}
					else if(result.msg_code==2){
						$("#bldpressure-err").html(result.msg_data);
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
		 }
		 else{
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


function validateBloodPressure(){
	var relationshipId = $("#membr-relatinship").val();
	var familynameId = $("#membr-family-name").val();
	var systolic = $("#systolic").val();
	var diastolic = $("#diastolic").val();
	var pulserate = $("#pulserate").val();
	var collectiondate = $("#collectiondate").val();
	
	var error = "";
	var up_icon = '<span class="glyphicon glyphicon-hand-up"></span>';
	$("#membr-relatinship , #membr-family-name , #systolic , #diastolic , #pulserate , #collectiondate").removeClass('validation-error');
	$("#bldpressure-err").html(error);
	
	if(relationshipId=="0"){
		error = up_icon+" Please select relationship";
		$("#membr-relatinship").addClass('validation-error');
		$("#bldpressure-err").html(error);
		return false;
	}
	if(familynameId=="0"){
		error = up_icon+" Please select name";
		$("#membr-family-name").addClass('validation-error');
		$("#bldpressure-err").html(error);
		return false;
	}
	if(systolic==""){
		error = up_icon+" Please enter systolic value";
		$("#systolic").addClass('validation-error');
		$("#bldpressure-err").html(error);
		return false;
	}
	if(diastolic==""){
		error = up_icon+" Please enter diastolic value";
		$("#diastolic").addClass('validation-error');
		$("#bldpressure-err").html(error);
		return false;
	}
	if(pulserate==""){
		error = up_icon+" Please enter pulserate value";
		$("#pulserate").addClass('validation-error');
		$("#bldpressure-err").html(error);
		return false;
	}
	if(collectiondate==""){
		error = up_icon+" Please enter Collection Date";
		$("#collectiondate").addClass('validation-error');
		$("#bldpressure-err").html(error);
		return false;
	}
	
	return true;

}
