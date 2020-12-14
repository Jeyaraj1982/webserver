(function($) {

"use strict";


$(document).ready(function(e) {
    
    var win 		= $(window),
		win_h 		= $(window).height(),
		win_w 		= $(window).width(),
		win_h_h 	= $(window).height()/2,
		win_w_h 	= $(window).width()/2,
		web_width 	= $(".boxed").width();

	var animating = false;

	$(".tabs-nav a").click(function(event) {

		event.preventDefault();

		var wanted_tab = $(this).attr('href');

		if( !$(this).hasClass('selected') && !(animating) ) {

			animating = true;
			$(window).scrollTo(0, 400);

			$(".tabs-nav a.selected").removeClass('selected');
			$(this).addClass('selected');

			$(".tabs-data .tab-panel.selected").fadeOut(250, function() {

				$(this).removeClass('selected');

				$(".tabs-data .tab-panel"+ wanted_tab +"").fadeIn(250, function() {
					
					$(this).addClass('selected');
					animating = false;
				});
			});
		}
	});

});

})(jQuery);

