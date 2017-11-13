<?php 
header("content-type: application/x-javascript"); 
?>
jQuery(document).ready(function() {
	jQuery('#option_btn').click(
		function() {
			if(jQuery('#option_wrapper').css('right') != '0px')
			{	
	    		jQuery('#option_wrapper').animate({"right": "0px"}, { duration: 200 });
	 			jQuery(this).animate({"right": "250px"}, { duration: 200 });
	 		}
	 		else
	 		{
	 			var isOpenOption = jQuery.cookie("grandcarrental_demo");
				if(jQuery.type(isOpenOption) === "undefined")
	    		{
	    			jQuery.cookie("grandcarrental_demo", 1, { expires : 7, path: '/' });
	    		}
	 			jQuery('#option_wrapper').animate({"right": "-251px"}, { duration: 200 });
				jQuery('#option_btn').animate({"right": "-2px"}, { duration: 200 });
	 		}
		}
	);
	
	var isOpenOption = jQuery.cookie("grandcarrental_demo");
	if(jQuery.type(isOpenOption) === "undefined")
	{
	    jQuery('#option_btn').trigger('click');
	}
});