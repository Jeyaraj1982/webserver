/* Add Custom Code Jquery
 ========================================================*/
$(document).ready(function(){
	// Messenger posmotion
	$( "#so_popup_countdown .customer a" ).click(function() {
		$('body').toggleClass('hidden-popup-countdown');
	});

	// Messenger posmotion
	$( "#close-posmotion-header" ).click(function() {
		$('.promotion-top').toggleClass('hidden-promotion');
		$('body').toggleClass('hidden-promotion-body');

		if($(".promotion-top").hasClass("hidden-promotion")){
			$.cookie("open", 0);
			
		} else{
			$.cookie("open", 1);
		}

	});	

	// menu
	$("#show-megamenu").click(function () {
		$('.icon-bar').addClass('so-megamenu-active');
		$('.megamenu-wrapper').addClass('so-megamenu-active');

		if($('.icon-bar').hasClass('so-megamenu-active'))
			$('.icon-bar').removeClass('so-megamenu-active');
		else
			$('.icon-bar').addClass('so-megamenu-active');
	}); 
	$('#remove-megamenu').click(function() {
        $('.megamenu-wrapper').removeClass('so-megamenu-active');
        return false;
    });		
	
	$("#show-verticalmenu").click(function () {
		if($('.vertical-wrapper').hasClass('so-vertical-active'))
			$('.vertical-wrapper').removeClass('so-vertical-active');
		else
			$('.vertical-wrapper').addClass('so-vertical-active');
	}); 
	$('#remove-verticalmenu').click(function() {
        $('.vertical-wrapper').removeClass('so-vertical-active');
        return false;
    });	

	if($.cookie("open") == 0){
		$('.promotion-top').addClass('hidden-promotion');
		$('body').addClass('hidden-promotion-body');
	}

	// Messenger Top Link
	$('.list-msg').owlCarousel2({
		pagination: false,
		center: false,
		nav: false,
		dots: false,
		loop: true,
		slideBy: 1,
		autoplay: true,
		margin: 30,
		autoplayTimeout: 4500,
		autoplayHoverPause: true,
		autoplaySpeed: 1200,
		startPosition: 0, 
		responsive:{
			0:{
				items:1
			},
			480:{
				items:1
			},
			768:{
				items:1
			},
			1200:{
				items:1
			}
		}
	});


	$('.horizontal').on('mouseenter', function() {
	 	$(".select_category select").blur();
	});

	// Messenger Top Link
	$('.cate-content-home5').owlCarousel2({
		pagination: false,
		center: false,
		nav: false,
		dots: false,
		loop: true,
		slideBy: 1,
		autoplay: true,
		margin: 30,
		autoplayTimeout: 4500,
		autoplayHoverPause: true,
		autoplaySpeed: 1200,
		startPosition: 0, 
		responsive:{
			0:{
				items:1
			},
			480:{
				items:2
			},
			768:{
				items:3
			},
			1200:{
				items:4
			}
		}
	});
	// Slider Clients Say
	$('.slider-clients-say').owlCarousel2({
		pagination: false,
		center: false,
		nav: false,
		loop: true,
		slideBy: 1,
		autoplay: true,
		margin: 0,
		autoplayTimeout: 4500,
		autoplayHoverPause: true,
		autoplaySpeed: 1200,
		startPosition: 0, 
		responsive:{
			0:{
				items:1
			},
			480:{
				items:1
			},
			768:{
				items:1
			},
			1200:{
				items:1
			}
		}
	});

	 $(document).ready(function(){
        $(".topbar-close").click(function(){
            $(".header-promotion").slideToggle();
        });
        $(".button").on('click',function(){
                if($('.button').hasClass('active')){
                    $('.button').removeClass('active');
                }else{
                    $('.button').removeClass('active');
                    $('.button').addClass('active');
                }
         });
    });
    

	// Slider Clients Say
	$('.inner-clientsay').owlCarousel2({
		pagination: false,
		center: false,
		nav: false,
		loop: true,
		slideBy: 1,
		autoplay: true,
		margin: 0,
		autoplayTimeout: 4500,
		autoplayHoverPause: true,
		autoplaySpeed: 1200,
		startPosition: 0, 
		responsive:{
			0:{
				items:1
			},
			480:{
				items:1
			},
			768:{
				items:1
			},
			1200:{
				items:1
			}
		}
	});

	$( ".header_search .btn-search" ).click(function() {
		$('.sosearchpro-wrapper').slideToggle(200);
		$(this).toggleClass('active');
	});
	$( ".layout-4 .container-megamenu" ).click(function() {
		$(this).toggleClass('open');
	});
	

	// custom to show footer center
	$(".footer-toggle").click(function () {
		if($('.showmore').hasClass('active'))
			$('.showmore').removeClass('active');
		else
			$('.showmore').addClass('active');
		$('.collapse').collapse("toggle");
	}); 
	
});
