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
	
});

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