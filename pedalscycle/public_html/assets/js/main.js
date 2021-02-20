(function($){
    "use strict";
    jQuery(document).on('ready', function () {
        /* Header Sticky
        ========================================================*/
        $(window).on('scroll',function() {
            if ($(this).scrollTop() >70){  
                $('.header-sticky').addClass("is-sticky");
            }
            else{
                $('.header-sticky').removeClass("is-sticky");
            }
        });
        
        // Nav Active Code
        /*==============================================================*/
        if ($.fn.classyNav) {
            $('#bikeNav').classyNav({
                theme: 'light'
            });
        }
        
        // Search Popup Js
        /*==============================================================*/
        $(function() {
            $('a[href="#search"]').on("click", function(event) {
                event.preventDefault();
                $("#search").addClass("open");
                $('#search > form > input[type="search"]').focus();
            });

            $("#search, #search button.close").on("click keyup", function(event) {
                if (
                event.target == this ||
                event.target.className == "close" ||
                event.keyCode == 27
                ) {
                    $(this).removeClass("open");
                }
            });

            $("form").on("submit",function(event) {
                event.preventDefault();
                return false;
            });
        });
        
        /* Home Slides
        ========================================================*/
        $('.home-slides').owlCarousel({
            items:1,
            loop:true,
            autoplay:true,
            nav:false,
            responsiveClass:true,
            dots:true,
            autoplayHoverPause:true,
            mouseDrag:true,
            animateOut: 'fadeOut',
            navText: [
            "<i class='fa fa-angle-left'></i>",
            "<i class='fa fa-angle-right'></i>"
            ],
        });
        $(".home-slides").on("translate.owl.carousel", function(){
            $(".main-banner h1").removeClass("animated fadeInUp").css("opacity", "0");
            $(".main-banner .btn").removeClass("animated fadeInDown").css("opacity", "0");
        });
        $(".home-slides").on("translated.owl.carousel", function(){
            $(".main-banner h1").addClass("animated fadeInUp").css("opacity", "1");
            $(".main-banner .btn").addClass("animated fadeInDown").css("opacity", "1");
        });
        
        // Upcoming Bike Slides
        /*==============================================================*/
        $(".upcoming-bike-slider").owlCarousel({
            nav: true,
            dots: false,
            center: false,
            touchDrag: false,
            mouseDrag: true,
            autoplay: true,
			autoplayHoverPause: true,
            smartSpeed: 750,
            loop: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            responsive:{
                0:{
                    items:1,
                },
                768:{
                    items:1,
                },
                1024:{
                    items:2,
                },
                1200:{
                    items:3,
                }
            }
        });
        
        // Categories Bike Slides
        /*==============================================================*/
        $(".categories-bike-slider").owlCarousel({
            nav: true,
            dots: false,
            center: false,
            touchDrag: false,
            mouseDrag: true,
            autoplay: true,
            smartSpeed: 750,
			autoplayHoverPause: true,
            loop: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            responsive:{
                0:{
                    items:1,
                },
                576:{
                    items:2,
                },
                768:{
                    items:2,
                },
                1200:{
                    items:4,
                }
            }
        });
        
        // Bikes Slides
        /*==============================================================*/
        $(".bike-slider").owlCarousel({
            nav: true,
            dots: false,
            center: false,
            touchDrag: false,
            mouseDrag: true,
            autoplay: true,
			autoplayHoverPause: true,
            smartSpeed: 750,
            loop: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            responsive:{
                0:{
                    items:1,
                },
                768:{
                    items:2,
                },
                1200:{
                    items:3,
                }
            }
        });
        
        // Equipment Bike Slides
        /*==============================================================*/
        $(".equipment-slider").owlCarousel({
            nav: false,
            dots: true,
            center: false,
            touchDrag: false,
            mouseDrag: true,
            autoplay: true,
            smartSpeed: 750,
			autoplayHoverPause: true,
            loop: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            responsive:{
                0:{
                    items:1,
                },
                768:{
                    items:2,
                },
                1200:{
                    items:3,
                }
            }
        });
        
        /* Sale Product Slides
        ========================================================*/
        $('.sale-product-slider').owlCarousel({
            items:1,
            loop:true,
            autoplay:true,
            nav:false,
            responsiveClass:true,
            dots:true,
            autoplayHoverPause:true,
            mouseDrag:true,
            navText: [
            "<i class='fa fa-angle-left'></i>",
            "<i class='fa fa-angle-right'></i>"
            ],
        });
        $(".sale-product-slider").on("translate.owl.carousel", function(){
            $(".sale-product-content").removeClass("animated fadeInDown").css("opacity", "0");
            $(".sale-product-img").removeClass("animated fadeInUp").css("opacity", "0");
        });
        $(".sale-product-slider").on("translated.owl.carousel", function(){
            $(".sale-product-content").addClass("animated fadeInDown").css("opacity", "1");
            $(".sale-product-img").addClass("animated fadeInUp").css("opacity", "1");
        });
        
        // Blog Slides
        /*==============================================================*/
        $(".blog-slider").owlCarousel({
            nav: false,
            dots: true,
            center: false,
            touchDrag: false,
            mouseDrag: true,
            autoplay: true,
            smartSpeed: 750,
			autoplayHoverPause: true,
            loop: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            responsive:{
                0:{
                    items:1,
                },
                768:{
                    items:2,
                },
                1200:{
                    items:3,
                }
            }
        });
        
        // Testimonials Slides
        /*==============================================================*/
        $(".testimonials-slider").owlCarousel({
            nav: false,
            dots: true,
            center: false,
            touchDrag: false,
            mouseDrag: true,
            autoplay: true,
			autoplayHoverPause: true,
            margin: 30,
            smartSpeed: 750,
            loop: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            responsive:{
                0:{
                    items:1,
                },
                768:{
                    items:2,
                },
                1200:{
                    items:2,
                }
            }
        });
        
        // Instagram Feed Slides
        /*==============================================================*/
        $(".instagram-feed-slider").owlCarousel({
            nav: false,
            dots: false,
            center: false,
            touchDrag: false,
            mouseDrag: true,
            autoplay: true,
			autoplayHoverPause: true,
            smartSpeed: 750,
            loop: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            responsive:{
                0:{
                    items:1,
                },
                576:{
                    items:2,
                },
                768:{
                    items:4,
                },
                1200:{
                    items:6,
                }
            }
        });
        
        // Partner Slides
        /*==============================================================*/
        $(".partner-slider").owlCarousel({
            nav: false,
            dots: false,
            center: false,
            touchDrag: false,
            mouseDrag: true,
            autoplay: true,
			autoplayHoverPause: true,
            smartSpeed: 750,
            loop: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            responsive:{
                0:{
                    items:2,
                },
                576:{
                    items:4,
                },
                768:{
                    items:4,
                },
                1200:{
                    items:6,
                }
            }
        });
        
        /* About Image Slides
        ========================================================*/
        $('.about-img-slider').owlCarousel({
            items:1,
            loop:true,
            autoplay:true,
            nav:true,
            responsiveClass:true,
            dots:false,
            autoplayHoverPause:true,
            mouseDrag:true,
            navText: [
            "<i class='fa fa-angle-left'></i>",
            "<i class='fa fa-angle-right'></i>"
            ],
        });
        
        // Show More And Show Less
        /*==============================================================*/
        $(".show-more").on("click",function(event) {
            var txt = $(".hide-part").is(':visible') ? 'Show more' : 'Show Less';
            $(".hide-part").toggleClass("show-part");
            $(this).html(txt);
            event.preventDefault();
        });
        
        // Zoom Instagram Popup
        /*==============================================================*/
        $('.zoom-instagram').magnificPopup({
            type: 'image',
            gallery:{
                enabled:true
            }
        });
        
        // Show More And Show Less Two
        /*==============================================================*/
        $(".show-more2").on("click",function(event) {
            var txt = $(".hide-part2").is(':visible') ? 'Show more' : 'Show Less';
            $(".hide-part2").toggleClass("show-part");
            $(this).html(txt);
            event.preventDefault();
        });
        
        /* Zoom Gallery
        ========================================================*/
        $('.zoom-gallery').magnificPopup({
            type: 'image',
            gallery:{
                enabled:true
            }
        });
        
        /* Go To Top
        ========================================================*/
        $(function(){
            //Scroll event
            $(window).on("scroll",function(){
                var scrolled = $(window).scrollTop();
                if (scrolled > 200) $('.go-top').fadeIn('slow');
                if (scrolled < 200) $('.go-top').fadeOut('slow');
            });  
            //Click event
            $('.go-top').on('click', function () {
                $("html, body").animate({ scrollTop: "0" },  500);
            });
        });
        
        // Counter
        /*==============================================================*/
        $(".count").counterUp({
            delay: 20,
            time: 1500
        });
    });

    // Page Loader
    /*==============================================================*/
    jQuery(window).on('load', function() {
        $('#preloader-area').fadeOut(0);
    });
}(jQuery));