(function($) {
"use strict";

/* ==============================================
ANIMATION -->
=============================================== */

    new WOW({
	    boxClass:     'wow',      // default
	    animateClass: 'animated', // default
	    offset:       0,          // default
	    mobile:       true,       // default
	    live:         true        // default
    }).init();
    
/* ==============================================
CAROUSEL -->
=============================================== */

	$('#owl-services').owlCarousel({
		loop:true,
		margin:25,
		nav:false,
		dots:true,
		responsive:{
		0:{
		items:1
		},
		600:{
		items:2
		},
		1000:{
		items:4
		}
	}
	})
	$('#owl-services2').owlCarousel({
		loop:true,
		margin:25,
		nav:false,
		dots:true,
		responsive:{
		0:{
		items:1
		},
		600:{
		items:2
		},
		1000:{
		items:4
		}
	}
	})
	$('#owl-services1').owlCarousel({
		loop:true,
		margin:25,
		nav:false,
		dots:true,
		responsive:{
		0:{
		items:1
		},
		600:{
		items:2
		},
		1000:{
		items:4
		}
	}
	})
	$('#owl-gallery').owlCarousel({
		loop:true,
		margin:0,
		nav:true,
		dots:false,
		responsive:{
		0:{
		items:1
		},
		600:{
		items:2
		},
		1000:{
		items:5
		}
	}
	})
	$('#owl-courses').owlCarousel({
		loop:true,
		margin:25,
		nav:false,
		dots:true,
		responsive:{
		0:{
		items:1
		},
		600:{
		items:2
		},
		1000:{
		items:3
		}
	}
	})
	$('#clients').owlCarousel({
		loop:true,
		margin:25,
		nav:true,
		dots:false,
		responsive:{
		0:{
		items:2
		},
		600:{
		items:4
		},
		1000:{
		items:6
		}
	}
	})
	$('#owl-testimonial').owlCarousel({
		loop:true,
		margin:25,
		nav:false,
		dots:true,
		responsive:{
		0:{
		items:1
		},
		600:{
		items:1
		},
		1000:{
		items:1
		}
	}
	})
	$('#owl-testimonial-2').owlCarousel({
		loop:true,
		margin:0,
		nav:false,
		dots:true,
		responsive:{
		0:{
		items:1
		},
		600:{
		items:1
		},
		1000:{
		items:1
		}
	}
	})

/* ==============================================
PROGRESS BAR -->
=============================================== */

    $('.progress .progress-bar').progressbar({transition_delay: 800});

/* ==============================================
PARALLAX -->
=============================================== */

	$.stellar({
		horizontalScrolling: false,
		verticalOffset: 100
	});

/* ==============================================
LIGHTBOX -->
=============================================== */

	jQuery('a[data-gal]').each(function() {
		jQuery(this).attr('rel', jQuery(this).data('gal')); });     
	jQuery("a[data-rel^='prettyPhoto']").prettyPhoto({animationSpeed:'slow',theme:'light_square',slideshow:true,overlay_gallery: true,social_tools:false,deeplinking:false});

/* ==============================================
ACCORDION -->
=============================================== */

    function toggleChevron(e) {
        $(e.target)
            .prev('.panel-heading')
            .find("i.indicator")
            .toggleClass('fa-minus fa-plus');
    }
    $('#accordion').on('hidden.bs.collapse', toggleChevron);
    $('#accordion').on('shown.bs.collapse', toggleChevron);

/* ==============================================
SEARCH -->
=============================================== */

	var $ctsearch = $( '#dmsearch' ),
		$ctsearchinput = $ctsearch.find('input.dmsearch-input'),
		$body = $('html,body'),
		openSearch = function() {
			$ctsearch.data('open',true).addClass('dmsearch-open');
			$ctsearchinput.focus();
			return false;
		},
		closeSearch = function() {
			$ctsearch.data('open',false).removeClass('dmsearch-open');
		};

	$ctsearchinput.on('click',function(e) { e.stopPropagation(); $ctsearch.data('open',true); });

	$ctsearch.on('click',function(e) {
		e.stopPropagation();
		if( !$ctsearch.data('open') ) {

			openSearch();

			$body.off( 'click' ).on( 'click', function(e) {
				closeSearch();
			} );

		}
		else {
			if( $ctsearchinput.val() === '' ) {
				closeSearch();
				return false;
			}
		}
	});

/* ==============================================
LOADER -->
=============================================== */

	$(window).load(function() {
		$('#loader').delay(300).fadeOut('slow');
			$('#loader-container').delay(200).fadeOut('slow');
		$('body').delay(300).css({'overflow':'visible'});
	})

/* ==============================================
MENU HOVER -->
=============================================== */

    jQuery('.navbar-default .dropdown, .topbar .dropdown').hover(function() {
      jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn();
    }, function() {
      jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut();
    });

/* ==============================================
FUN -->
=============================================== */

	function count($this){
		var current = parseInt($this.html(), 10);
		current = current + 5;
			$this.html(++current);
			if(current > $this.data('count')){
			$this.html($this.data('count'));
			} 
			else {    
			setTimeout(function(){count($this)}, 50);
			}
			}        
			$(".stat-count").each(function() {
			$(this).data('count', parseInt($(this).html(), 10));
			$(this).html('0');
		count($(this));
	});

/* ==============================================
AFFIX -->
=============================================== */

	$(".onepage").affix({
		offset: {
	        top: $('.slider-section').height()
		}
	})
	
	$(".header").affix({
		offset: {
			top: 100, 
			bottom: function () {
			return (this.bottom = $('.copyrights').outerHeight(true))
			}
		}
	})

})(jQuery);