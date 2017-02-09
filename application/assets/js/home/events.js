/*--------------------Event------------*/
$(document).ready(function(){
	var basepath = $("#basepath").val();
	
	$(document).on('click','.eventdetail',function(){
		var event_date = $(this).data('id');
		$.ajax({
			type: "POST",
            url: basepath + 'home/geteventdetail',
            dataType: "html",
			data:{event_date:event_date},
			success:function(response){
				$("#even-detail-modal").html(response);
			}
		});
	});
	
	
});