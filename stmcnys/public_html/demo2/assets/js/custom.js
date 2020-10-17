/* -----------------------------------
 
  # Template Name: Picwik
  # Author: tophive
  # Version: 1.0
 
-------------------------------------*/

/*
-----------------------------------------
Index
-----------------------------------------
# 01. menu
# 02. search
# 03. wow animated
# 04. Click To Top
# 05. Counter
# 06. slider
# 07. disable link [#]
# 08. gallery-carousel
# 09. Value carousel
# 10. News carousel
# 11. Value Carousel 2
# 12. Accordion
# 13. loading
 
*/

(function($) {
  "use strict";

  /* document ready all function here */
  $(document).ready(function() {
    /* -----------------------------------
            01. menu
        -------------------------------------*/
    function expandMenu(e) {
      var sublist = $(e.target).next("ul");
      if (sublist.length != 0) {
        if (sublist.is(":visible")) {
          sublist.slideUp("fast");
        } else {
          sublist.slideDown("fast");
        }

        return false;
      }
      return true;
    }

    $("nav ul:first").show("fast");
    $("nav li").on("click", expandMenu);

    $(".mobile-menu .ti-menu").on("click", function() {
      $("nav").css("left", "0");
      setTimeout(function() {
        $(".mobile-menu .ti-close").css("display", "block");
      }, 300);
    });
    $(".mobile-menu .ti-close").on("click", function() {
      $("nav").css("left", "-100%");
      $(".mobile-menu .ti-close").css("display", "none");
    });

    $(".header-2 nav img").on("click", function() {
      $("nav span").fadeToggle();
    });

    /* -----------------------------------
            02. search
        -------------------------------------*/
    $(".search .ti-close").on("click", function() {
      $(".search").fadeOut();
    });

    $(".search input").on("keypress", function(e) {
      if (e.which == 13) {
        $(".search").fadeOut();
        $(".search input").val("");
      }
    });

    $(".social-icon .ti-search").on("click", function() {
      $(".search").fadeIn();
    });

    /* -----------------------------------
            03. wow animated
        -------------------------------------*/
    let wow = new WOW({
      mobile: false // default
    });
    wow.init();

    /* -----------------------------------
            04. Click To Top
        -------------------------------------*/
    $("#toTop").on("click", function() {
      $("html, body").animate({ scrollTop: 0 }, 1000);
      return false;
    });

    $(window).scroll(function() {
      if ($(this).scrollTop() > 400) {
        $("#toTop").fadeIn();
      } else {
        $("#toTop").fadeOut();
      }
    });
    /* -----------------------------------
            05. Counter
        -------------------------------------*/
    $(".counter h2 span, .curriculum-pro span").counterUp({
      delay: 30,
      time: 2000
    });

    /* -----------------------------------
            06. slider
        -------------------------------------*/
    $(".slider").owlCarousel({
      loop: true,
      nav: false,
      dots: false,
      autoplay: true,
      smartSpeed: 1000,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 1
        },
        1000: {
          items: 1
        }
      }
    });

    /* -----------------------------------
            07. disable link [#]
        -------------------------------------*/
    $("a[href='#']").on("click", function($) {
      $.preventDefault();
    });

    /* -----------------------------------
            08. gallery-carousel
        -------------------------------------*/
    $(".gallery-carousel").owlCarousel({
      loop: true,
      nav: false,
      dots: false,
      autoplay: true,
      smartSpeed: 1000,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 2
        },
        1000: {
          items: 3
        },
        1300: {
          items: 4
        }
      }
    });
    /* -----------------------------------
            09. Value carousel
        -------------------------------------*/
    $(".our-value-carousel").owlCarousel({
      loop: true,
      nav: false,
      dots: false,
      margin: 30,
      autoplay: true,
      smartSpeed: 1000,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 2
        },
        1000: {
          items: 3
        }
      }
    });
    /* -----------------------------------
            10. News carousel
        -------------------------------------*/
    $(".news-carousel").owlCarousel({
      loop: true,
      nav: true,
      navText: [
        '<i class="ti-angle-left"></i>',
        '<i class="ti-angle-right"></i>'
      ],
      dots: false,
      margin: 30,
      autoplay: true,
      smartSpeed: 1000,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 2
        },
        1000: {
          items: 3
        }
      }
    });
    /* -----------------------------------
            11. Value Carousel 2
        -------------------------------------*/
    $(".our-value-carousel-2").owlCarousel({
      loop: true,
      nav: false,
      dots: false,
      margin: 30,
      autoplay: true,
      smartSpeed: 1000,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 1
        },
        1000: {
          items: 1
        }
      }
    });
    /* -----------------------------------
            12. Accordion
        -------------------------------------*/
    $(".set > a").on("click", function() {
      if ($(this).hasClass("active")) {
        $(this).removeClass("active");
        $(this)
          .siblings(".content")
          .slideUp(200);
        $(".set > a i")
          .removeClass("ti-angle-down")
          .addClass("ti-angle-right");
      } else {
        $(".set > a i")
          .removeClass("ti-angle-down")
          .addClass("ti-angle-right");
        $(this)
          .find("i")
          .removeClass("ti-angle-right")
          .addClass("ti-angle-down");
        $(".set > a").removeClass("active");
        $(this).addClass("active");
        $(".content").slideUp(200);
        $(this)
          .siblings(".content")
          .slideDown(200);
      }
    });
  });

  /* window on load all function here */
  $(window).on("load", function() {
    /* -----------------------------------
          13. loading
        -------------------------------------*/
    $("#preloader").fadeOut(500);
  });
})(jQuery);
