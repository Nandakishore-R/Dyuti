$(document).on('click', '#cancel_btn', function(){
        window.history.back();
});

function confirm_del(url)
{					
   
	if(confirm('Can you confirm this?')){

		gotoURL(url);
	}
					
				


}

	
	
function gotoURL(url)
{		
	 $("#ajax_content").empty();
	 $("#ajax_content").html('<i class="fa fa-spin fa-spinner"></i>');
	 
	jQuery.get(url, function(html) {
			 	// append the "ajax'd" data to the table body
				 
				$("#ajax_content").fadeIn('slow');
			 	 $("#ajax_content").html(html);
			});
}
