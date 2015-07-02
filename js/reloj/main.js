(function($){
	
	"use strict";
	
    $(document).ready(function(){
	
		jQuery('#countdown_dashboard').countDown({
				targetDate: {
					'day': 		7, // Put the date here
					'month': 	10, // Month
					'year': 	2015, // Year
					'hour': 	0,
					'min': 		0,
					'sec': 		0
				} //,omitWeeks: true
		});
	});
	
})(jQuery);