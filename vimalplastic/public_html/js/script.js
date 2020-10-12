(function($) {
    
    "use strict";

    // ==================== Preloader
    function preloader_load() {
        if($('.preloader').length){
            $('.preloader').delay(300).fadeOut(500);
        }
    }
    
    // ==================== Progress Bar / Levels
    $(document).ready(function() {
        $(".progress-box .bar-fill").each(function() {
            var progressWidth = $(this).attr('data-percent');
            $(this).css('width',progressWidth+'%');
            $(this).children('.percent').html(progressWidth+'%');
        });
    });
    // ==================== Navbar Scroll To Fixed
    $(document).ready(function() {
        $('.scrollingto-fixed').scrollToFixed();
        var summaries = $('.summary');
        summaries.each(function(i) {
            var summary = $(summaries[i]);
            var next = summaries[i + 1];
            summary.scrollToFixed({
                marginTop: $('.scrollingto-fixed').outerHeight(true) + 10,
                limit: function() {
                    var limit = 0;
                    if (next) {
                        limit = $(next).offset().top - $(this).outerHeight(true) - 10;
                    } else {
                        limit = $('.footer').offset().top - $(this).outerHeight(true) - 10;
                    }
                    return limit;
                },
                zIndex: 999
            });
        });
    });

    // ==================== Gallery Masonry Isotop And Other Gallery and Lightbox
    function masonryIsotop() {
        if ($('.masonry-gallery').length) {
            $('.masonry-gallery').isotope({
                layoutMode:'masonry'
            });
        }
        if($('.masonry-filter').length){
            $('.masonry-filter a').children('span').click(function(){
                var Self = $(this);
                var selector = Self.parent().attr('data-filter');
                $('.masonry-filter a').children('span').parent().removeClass('active');
                Self.parent().addClass('active');
                $('.masonry-gallery').isotope({ filter: selector });
                return false;
            });
    }
        
    /*================================ magnificPopup  ================================*/  
    // lightbox image
    $(document).ready(function() {
        $('.popup-gallery').magnificPopup({
          delegate: 'a',
          type: 'image',
          tLoading: 'Loading image #%curr%...',
          mainClass: 'mfp-img-mobile',
          gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
          },
          image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            titleSrc: function(item) {
              return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
            }
          }
        });
    });

    $(document).ready(function() {
        $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
          disableOn: 700,
          type: 'iframe',
          mainClass: 'mfp-fade',
          removalDelay: 160,
          preloader: false,
          fixedContentPos: false
        });
    });

    //LighvtBox / Fancybox
    if($('.lightbox-image').length) {
      $('.lightbox-image').fancybox();
    }

    if($('.lightbox-image2').length) {
      $('.lightbox-image2').fancybox();
    }

    }

    // ==================== Paralex Backgrounds
    $.stellar({
       horizontalScrolling: false,
       responsive: true
    });


    // ==================== fitVids
    if($('.div').length) {
        $("div").fitVids();
    }

    // ==================== YTplayer
    if($('.player').length) {
        $(".player").mb_YTPlayer();
    }

    // ==================== OWL CAROUSEL AND OTHER SLIDER SCRIPT 

    // Testimonial
    if($('.testimonial-carousel').length){
        $('.testimonial-carousel').owlCarousel({
            loop:true,
            margin:30,
            dots: false,
            nav:false,
            autoplayHoverPause:false,
            autoplay: true,
            smartSpeed: 700,
            navText: [
              '<i class="lnr lnr-arrow-left"></i>',
              '<i class="lnr lnr-arrow-right"></i>'
            ],
            responsive: {
                0: {
                    items: 1,
                    center: false
                },
                480:{
                    items:1,
                    center: false
                },
                600: {
                    items: 1,
                    center: false
                },
                768: {
                    items: 1
                },
                992: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        })
    }

    // Owl-carousel-works-gallery
    if($('.owl-carousel-grid-five').length){
        $('.owl-carousel-grid-five').owlCarousel({
            loop:true,
            margin:0,
            dots: false,
            nav:false,
            autoplayHoverPause:true,
            autoplay: true,
            smartSpeed: 500,
            responsive: {
                0: {
                    items: 1,
                    center: false
                },
                480:{
                    items:2,
                    center: false
                },
                600: {
                    items: 2,
                    center: false
                },
                768: {
                    items: 5
                },
                992: {
                    items: 5
                },
                1200: {
                    items: 5
                }
            }
        })
    }

    // Owl-gallery-carousel
    if($('.owl-carousel-grid-four').length){
        $('.owl-carousel-grid-four').owlCarousel({
            loop: true,
            margin: 10,
            dots: false,
            nav: true,
            autoplayHoverPause: false,
            autoplay: true,
            smartSpeed: 700,
            navText: [
              '<i class="fa fa-long-arrow-left" aria-hidden="true"></i>',
              '<i class="fa fa-long-arrow-right" aria-hidden="true"></i>'
            ],
            responsive: {
                0: {
                    items: 1,
                    center: false
                },
                480:{
                    items: 1,
                    center: false
                },
                600: {
                    items: 2,
                    center: false
                },
                768: {
                    items: 2,
                    center: false
                },
                992: {
                    items: 2
                },
                1170: {
                    items: 4
                }
            }
        })
    }

    // Owl-service-carousel
    if($('.owl-service-carousel').length){
        $('.owl-service-carousel').owlCarousel({
            loop:true,
            margin:0,
            dots: false,
            nav:true,
            autoplayHoverPause:false,
            autoplay: true,
            smartSpeed: 700,
            navText: [
              '<i class="fa fa-angle-double-left" aria-hidden="true"></i>',
              '<i class="fa fa-angle-double-right" aria-hidden="true"></i>'
            ],
            responsive: {
                0: {
                    items: 1,
                    center: false
                },
                480:{
                    items:1,
                    center: false
                },
                600: {
                    items: 1,
                    center: false
                },
                768: {
                    items: 1
                },
                992: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        })
    }

    // ==================== Scroll To top
    $(function () {
        $.scrollUp({
            scrollName: 'scrollUp', 
            scrollDistance: 300,       
            scrollFrom: 'top',          
            scrollSpeed: 700,           
            easingType: 'linear',   
            animation: 'fade',      
            animationSpeed: 200,      
            scrollTrigger: false,     
            scrollTarget: false,
            scrollImg: true,      
            scrollText: '', 
            scrollTitle: false,   
            scrollImg: false,   
            activeOverlay: false,
            zIndex: 2147483647, 
        });
    });
    


/* ==========================================================================
   When document is Scrollig, do
   ========================================================================== */
    $(document).on('ready', function() {
        // add your functions
    });
    
/* ==========================================================================
   When document is loading, do
   ========================================================================== */

    $(window).on('load', function() {
        // add your functions
        preloader_load();
        masonryIsotop();
    }); 


/* ==========================================================================
   When Window is resizing, do
   ========================================================================== */
    $(window).on('resize', function() {
        // add your functions
    });


})(window.jQuery);