
$(window).load(function(){
	var basepath = $("#basepath").val();
	var branch = $("#branch").val();
	getBranchWiseRate(basepath,branch);
});

$(document).ready(function(){
	var basepath = $("#basepath").val();
	$("#branch").on("change",function(){
		var branch = $("#branch").val();
		getBranchWiseRate(basepath,branch);
	});
	
	$('.datepicker').datepicker({
            autoclose: true,
			todayHighlight: true,
            format: 'dd-mm-yyyy',
			forceParse: false
			
	});
	
	
});

function getBranchWiseRate(basepath,branch){
			$.ajax({
            type: "POST",
            url: basepath + 'services/getBranchWiseRate',
            dataType: "html",
          //  contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            data:{branch:branch},
            success: function (result) {
				$("#branchWiseRate").html(result);
			//	$("#rateChartAccordion").find('.panel-collapse:first').addClass("in");	
			
				
			/*
			var rateHtmlView = '';
				console.log(result);
				$.each(result, function(i,codeprefix) {
					//console.log('<p style="color:red;">'+codeprefix.category_name+'</p>');
					
					if(codeprefix.package_detail.length>0){
					var ratechartRefId = "#collapse"+i;
					var ratechartTargetId = "collapse"+i;
					rateHtmlView+='<div class="panel-group" id="rateChartAccordion">';
					rateHtmlView+=' <div class="panel panel-default">';
					rateHtmlView+=' <div class="panel-heading">';
					rateHtmlView+='<h4 class="panel-title" data-toggle="collapse" data-parent="#rateChartAccordion" href="'+ratechartRefId+'">';
					rateHtmlView+='<a ><span class="glyphicon glyphicon-chevron-right"></span> ';
					rateHtmlView+=codeprefix.category_name+'</a>';
					rateHtmlView+='</h4>';
					rateHtmlView+=' </div>';
					rateHtmlView+='<div id="'+ratechartTargetId+'" class="panel-collapse collapse ">';
					/*
					rateHtmlView+='<h3>'+codeprefix.category_name+'</h3>';*/
				/*	
					rateHtmlView+='<div class="table-responsive">';
					
					
					rateHtmlView+='<table class="table table-striped">';
					rateHtmlView+='<thead>';
					rateHtmlView+='<tr>';
					rateHtmlView+='<th>#</th>';
					rateHtmlView+='<th></th>';
					rateHtmlView+='<th>Package</th>';
					rateHtmlView+='<th>Duration</th>';
					rateHtmlView+='<th style="text-align:right;">Admission Amt <br>(w/o Service Tax)</th>';
					rateHtmlView+='<th style="text-align:right;">Renewal Amt <br>(w/o Service Tax)</th>';
					rateHtmlView+='<th>Facility(s)</th>';
					rateHtmlView+='</tr>';
					rateHtmlView+='</thead>';
					rateHtmlView+='<tbody>';
					
					$.each(codeprefix.package_detail,function(x,packageDtl){
						//console.log('<p>'+packageDtl.card_name+'</p>');
						var card_id= packageDtl.card_id;
						var branch_code = packageDtl.branch_code;
						rateHtmlView+='<tr>';
						rateHtmlView+='<td>'+(x+1)+'</td>';
						rateHtmlView+='<td><a href="javascript:void(0);"><span class="label label-success">Buy</span></a></td>';
						rateHtmlView+='<td>'+packageDtl.card_name+' ('+packageDtl.card_code+')'+'</td>';
						rateHtmlView+='<td align="center">'+packageDtl.card_duration+'</td>';
						rateHtmlView+='<td align="right">'+packageDtl.package_rate+'</td>';
						rateHtmlView+='<td align="right">'+packageDtl.renewal_rate+'</td>';
						rateHtmlView+='<td><a href="'+basepath+'services/getFacilty/'+card_id+'/'+branch_code+'"><img src="'+basepath+'application/assets/images/facility.png" /></a></td>';
						
			
						rateHtmlView+='</tr>';
						
						
					});
					rateHtmlView+='</tbody>';
					rateHtmlView+='</table>';
					rateHtmlView+='</div>';
					rateHtmlView+='</div>';
					rateHtmlView+='</div>';
					rateHtmlView+='</div>';
					}
					else{
						rateHtmlView+='';
					}
					
					
				});
				
				$("#branchWiseRate").html(rateHtmlView);
				$("#rateChartAccordion").find('.panel-collapse:first').addClass("in");	
				
				*/
				
				
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
               // alert(msg);  
            }
			});
}

	
function validateRegForm()
{
	var name = $("#onlinereg-name").val();
	var dob = $("#onlinereg-dob").val();
	var mobile = $("#onlinereg-mobile").val();
	var email = $("#onlinereg-email").val();
	var address = $("#onlinereg-address").val();
	var zipcode = $("#onlinereg-zipcode").val();
	var city = $("#onlinereg-city").val();
	var state = $("#onlinereg-state").val();
	var country = $("#onlinereg-country").val();

	
	var phone_valid = /^([0-9]{10})$/;
	var email_validate = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var dobvalidation =  /^\d{1,2}-\d{1,2}-\d{4}$/;
	
	var error = '';
	var up_icon = '<span class="glyphicon glyphicon-hand-up"></span>';
	$("#onlinereg-name , #onlinereg-dob , #onlinereg-mobile, #onlinereg-email,#onlinereg-address,#onlinereg-zipcode,#onlinereg-city,#onlinereg-state,#onlinereg-country").removeClass('validation-error');
	$("#onlinereg-error").html(error);
	
	if(name=="")
	{
		error = up_icon+" Name is required";
		$("#onlinereg-name").addClass('validation-error');
		$("#onlinereg-error").html(error);
		return false;
	}
	if(dob==""){
		error = up_icon+" DOB is required";
		$("#onlinereg-dob").addClass('validation-error');
		$("#onlinereg-error").html(error);
		return false;
	} 
	
	if(dobvalidation.test(dob)==false){
		error = up_icon+" DOB is not valid";
		$("#onlinereg-dob").addClass('validation-error');
		$("#onlinereg-error").html(error);
		return false;
		
	}
	
	if(mobile==""){
		error = up_icon+" Mobile no is required";
		$("#onlinereg-mobile").addClass('validation-error');
		$("#onlinereg-error").html(error);
		return false;
	}
	if(phone_valid.test(mobile)==false){
		error = up_icon+" Mobile no is not valid";
		$("#onlinereg-mobile").addClass('validation-error');
		$("#onlinereg-error").html(error);
		return false;
	}
	if(email=="")
	{
		error = up_icon+" Email is required";
		$("#onlinereg-email").addClass('validation-error');
		$("#onlinereg-error").html(error);
		return false;
	}
	if(email_validate.test(email)==false)
	{
		error = up_icon+" Email is not valid";
		$("#onlinereg-email").addClass('validation-error');
		$("#onlinereg-error").html(error);
		return false;
	}
	if(address=="")
	{
		error = up_icon+" Please write your address";
		$("#onlinereg-address").addClass('validation-error');
		$("#onlinereg-error").html(error);
		return false;
	}
	if(zipcode=="")
	{
		error = up_icon+" Please write your zip code";
		$("#onlinereg-zipcode").addClass('validation-error');
		$("#onlinereg-error").html(error);
		return false;
	}
	if(city=="")
	{
		error = up_icon+" Please write your city name";
		$("#onlinereg-city").addClass('validation-error');
		$("#onlinereg-error").html(error);
		return false;
	}
	if(state=="")
	{
		error = up_icon+" Please write your state name";
		$("#onlinereg-state").addClass('validation-error');
		$("#onlinereg-error").html(error);
		return false;
	}
	if(country=="")
	{
		error = up_icon+" Please write your country name";
		$("#onlinereg-country").addClass('validation-error');
		$("#onlinereg-error").html(error);
		return false;
	}
	return true;
}


