
$(document).ready(function(){
	var basepath = $("#basepath").val();
	
	$('#dietry-managment-list').DataTable({
		"ordering": false,
		language: {
			search: "_INPUT_",
			searchPlaceholder: "Search..."
		}
	});
	
	$("#dietaryManagmentForm").on("submit",function(event){
		event.preventDefault();
		
		
		
		
		$.ajax({
			type: "POST",
			url: basepath + 'dietary_management/addMemberDiet',
			dataType: "json",
			contentType: "application/x-www-form-urlencoded; charset=UTF-8",
			data: $(this).serialize(),
			success:function(result){
				
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
	
	
	
	
});