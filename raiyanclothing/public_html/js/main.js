"use strict";
/* -------------------------------------
		Google Analytics
change UA-XXXXX-X to be your site's ID.
-------------------------------------- */
(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
e=o.createElement(i);r=o.getElementsByTagName(i)[0];
e.src='//www.google-analytics.com/analytics.js';
r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
ga('create','UA-XXXXX-X','auto');ga('send','pageview');
/* -------------------------------------
		CUSTOM FUNCTION WRITE HERE
-------------------------------------- */
$(document).ready(function(e) {
	/* -------------------------------------
		PROGRESS BAR
	-------------------------------------- */
	try {
		$('#skill-faq').appear(function () {
			jQuery('.skill-holder').each(function(){
				jQuery(this).find('.skill-bar').animate({
					width:jQuery(this).attr('data-percent')
				},2500);
			});
		});
	} catch (err) {}
	/* -------------------------------------
		LETTERING JS FOR PAGE TITLE
	-------------------------------------- */
	$(function() {
		$(".banner h1").lettering();
	});
	/* -------------------------------------
		CUSTOM FORM
	-------------------------------------- */
	$(function() {
		jcf.replaceAll();
	});
	/* -------------------------------------
		HOME SLIDER
	-------------------------------------- */
	$("#home-slider").owlCarousel({
		autoPlay : true,
		slideSpeed : 500,
		paginationSpeed : 500,
		pagination : false,
		singleItem : true,
		navigation : true,
		navigationText: [
			"<i class='fa fa-angle-left'></i>",
			"<i class='fa fa-angle-right'></i>"
		]
	});
	/* -------------------------------------
				Product Slider
	-------------------------------------- */
	(function ( $ ) {
		var sync1 = $("#sync1");
		var sync2 = $("#sync2");
		sync1.owlCarousel({
			singleItem : true,
			slideSpeed : 1000,
			navigation: false,
			pagination:false,
			afterAction : syncPosition,
			responsiveRefreshRate : 200,
		});
		sync2.owlCarousel({
			items : 3,
			itemsDesktop      : [1199,2],
			itemsDesktopSmall     : [979,2],
			itemsTablet       : [768,3],
			itemsTabletSmall : [640,3],
			itemsMobile       : [479,2],
			pagination:false,
			responsiveRefreshRate : 100,
			navigation : true,
			navigationText: [
				"<i class='fa fa-angle-left'></i>",
				"<i class='fa fa-angle-right'></i>"
			],
			afterInit : function(el){
				el.find(".owl-item").eq(0).addClass("synced");
			}
		});
		function syncPosition(el){
			var current = this.currentItem;
			$("#sync2")
			.find(".owl-item")
			.removeClass("synced")
			.eq(current)
			.addClass("synced")
			if($("#sync2").data("owlCarousel") !== undefined){
				center(current)
			}
		}
		$("#sync2").on("click", ".owl-item", function(e){
			e.preventDefault();
			var number = $(this).data("owlItem");
			sync1.trigger("owl.goTo",number);
		});
		function center(number){
			var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
			var num = number;
			var found = false;
			for(var i in sync2visible){
				if(num === sync2visible[i]){
					var found = true;
				}
			}
			if(found===false){
				if(num>sync2visible[sync2visible.length-1]){
					sync2.trigger("owl.goTo", num - sync2visible.length+2)
				}else{
					if(num - 1 === -1){
						num = 0;
					}
					sync2.trigger("owl.goTo", num);
				}
			} else if(num === sync2visible[sync2visible.length-1]){
				sync2.trigger("owl.goTo", sync2visible[1])
			} else if(num === sync2visible[0]){
				sync2.trigger("owl.goTo", num-1)
			}
		}
	}( jQuery ));
	/* -------------------------------------
		DESIGN YOUR PRODUCT SLIDER
	-------------------------------------- */
	(function ( $ ) {
		var sync1 = $("#product");
		var sync2 = $("#products-thumb");
		sync1.owlCarousel({
			autoPlay : false,
			singleItem : true,
			slideSpeed : 1000,
			navigation: false,
			pagination:false,
			transitionStyle : "fade",
			autoHeight : true,
			afterAction : syncPosition,
			responsiveRefreshRate : 200,
		});
		sync2.owlCarousel({
			items : 4,
			itemsDesktop      : [1199,4],
			itemsDesktopSmall     : [992,3],
			itemsTablet       : [768,4],
			itemsMobile       : [479,4],
			pagination:false,
			responsiveRefreshRate : 100,
			afterInit : function(el){
				el.find(".owl-item").eq(0).addClass("synced");
			}
		});
		function syncPosition(el){
			var current = this.currentItem;
			$("#products-thumb")
			.find(".owl-item")
			.removeClass("synced")
			.eq(current)
			.addClass("synced")
			if($("#products-thumb").data("owlCarousel") !== undefined){
				center(current)
			}
		}
		$("#products-thumb").on("click", ".owl-item", function(e){
			e.preventDefault();
			var number = $(this).data("owlItem");
			sync1.trigger("owl.goTo",number);
		});
		function center(number){
			var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
			var num = number;
			var found = false;
			for(var i in sync2visible){
			if(num === sync2visible[i]){
				var found = true;
			}
		}
			if(found===false){
				if(num>sync2visible[sync2visible.length-1]){
					sync2.trigger("owl.goTo", num - sync2visible.length+2)
				}else{
					if(num - 1 === -1){
					num = 0;
				}
				sync2.trigger("owl.goTo", num);
			}
			} else if(num === sync2visible[sync2visible.length-1]){
				sync2.trigger("owl.goTo", sync2visible[1])
			} else if(num === sync2visible[0]){
				sync2.trigger("owl.goTo", num-1)
			}
		}
	}( jQuery ));
	/* -------------------------------------
		LATEST ARRIWALS PRODUCT SLIDER
	-------------------------------------- */
	$(function() {
		var _visible = 6;
		var $pagers = $('#pager a');
		var _onBefore = function() {
			$(this).find('img').stop().fadeTo( 300, 1 );
			$pagers.removeClass( 'selected' );
		};
		$('#carousel').carouFredSel({
			width				:'100%',
			auto				:false,
			scroll: {
				duration		:750
			},
			prev: {
				button			:'#prev',
				items			:1,
				onBefore		:_onBefore
			},
			next: {
				button			:'#next',
				items			:1,
				onBefore		:_onBefore
			},
			items : {
				visible : {
					min			:1,
					max			:6
				},
			}
		});
		$pagers.on('click', function( e ) {
			e.preventDefault();
			var group = $(this).attr( 'href' ).slice( 1 );
			var slides = $('#carousel div.' + group);
			var deviation = Math.floor( ( _visible - slides.length ) / 2 );
			if ( deviation < 0 ) {
				deviation = 0;
			}
			$('#carousel').trigger( 'slideTo', [ $('#' + group), -deviation ] );
			$('#carousel div img').stop().fadeTo( 300, 0.3 );
			slides.find('img').stop().fadeTo( 300, 1 );
			$(this).addClass( 'selected' );
		});
	});
	/* -------------------------------------
		Our Product Gallery
	-------------------------------------- */
	var $container = $('.portfolio-content');
	// set selected menu items
	var $optionSets = $('.option-set');
	var $optionLinks = $optionSets.find('a');
	function doIsotopeFilter() {
		if ($().isotope) {
			var isotopeFilter = '';
			$optionLinks.each(function () {
				var selector = $(this).attr('data-filter');
				var link = window.location.href;
				var firstIndex = link.indexOf('filter=');
				if (firstIndex > 0) {
					var id = link.substring(firstIndex + 7, link.length);
					if ('.' + id == selector) {
						isotopeFilter = '.' + id;
					}
				}
			});
			if (isotopeFilter.length > 0) {
				$container.isotope({
					itemSelector: '.gallery-product',
					filter: isotopeFilter
				});
				$optionLinks.each(function () {
					var $this = $(this);
					var selector = $this.attr('data-filter');
					if (selector == isotopeFilter) {
						if (!$this.hasClass('selected')) {
							var $optionSet = $this.parents('.option-set');
							$optionSet.find('.selected').removeClass('selected');
							$this.addClass('selected');
						}
					}
				});
			}
			$optionLinks.on('click', function () {
				var $this = $(this);
				var selector = $this.attr('data-filter');
				$container.isotope({itemSelector: '.gallery-product', filter: selector});
				if (!$this.hasClass('selected')) {
					var $optionSet = $this.parents('.option-set');
					$optionSet.find('.selected').removeClass('selected');
					$this.addClass('selected');
				}
				return false;
			});
		}
	}
	var isotopeTimer = window.setTimeout(function () {
		window.clearTimeout(isotopeTimer);
		doIsotopeFilter();
	}, 1000);
	var selected = $('#gallery-cats > li > a');
	var $this = $(this);
	selected.on('click', function () {
		if (selected.hasClass('selected')) {
			$(this).parent().addClass('select').siblings().removeClass('select');
		}
	});
	/* -------------------------------------
		EVENTS SLIDER
	-------------------------------------- */
	$("#event-slider").owlCarousel({
		autoPlay: true,
		singleItem:true,
		pagination : false,
		navigation : true,
		navigationText: [
			"<i class='fa fa-angle-left'></i>",
			"<i class='fa fa-angle-right'></i>"
		]
	});
	/* -------------------------------------
		PRETTY PHOTO GALLERY
	-------------------------------------- */
	$("a[data-rel]").each(function () {
		$(this).attr("rel", $(this).data("rel"));
	});
	$("a[data-rel^='prettyPhoto']").prettyPhoto({
		animation_speed:'normal',
		theme:'dark_square',
		slideshow:3000,
		autoplay_slideshow: true,
		social_tools: false
	});
	/* -------------------------------------
		FAQ ACCORDION
	-------------------------------------- */
	function toggleChevron(e) {
		$(e.target)
		.prev('.accordion-heading')
		.find("i.indicator")
		.toggleClass('fa-caret-down fa-caret-right');
	}
	$('#faq-accordion').on('hidden.bs.collapse', toggleChevron);
	$('#faq-accordion').on('shown.bs.collapse', toggleChevron);
	/* -------------------------------------
		MASNORY SCROLL ANNIMATION
	-------------------------------------- */
	$('#portfolio .grid').masonry({
		itemSelector: '.masonry-grid',
		columnWidth: 5
	});
	
	$('#gallery-masonry').masonry({
		itemSelector: '.masonry-grid',
		columnWidth: 5
	});
	
	$('#filter-masonry').isotope({
		itemSelector: '.masonry-grid',
		masonry: {columnWidth: 50}
	});
	/* -------------------------------------
		POST TYPE SLIDER
	-------------------------------------- */
	$(".postslider-holder").owlCarousel({
		autoPlay: false,
		singleItem:true,
		pagination : false,
		navigation : true,
		navigationText: [
			"<i class='fa fa-angle-left'></i>",
			"<i class='fa fa-angle-right'></i>"
		]
	});
	/* -------------------------------------
		RECENTLY VIEWED SLIDER
	-------------------------------------- */
	$("#view-product-slider").owlCarousel({
		autoPlay: false,
		items : 4,
		itemsDesktop : [1199,4],
		itemsDesktopSmall : [979,3],
		paginationSpeed : 400,
		pagination : true,
		navigation : false,
		navigationText: [
			"<i class='fa fa-angle-left'></i>",
			"<i class='fa fa-angle-right'></i>"
		]
	});
	/* -------------------------------------
			Google Map
	-------------------------------------- */
	$("#gmap").gmap3({
		marker:{address: "Haltern am See, Weseler Str. 151"},
		map:{ options:{ zoom: 16}}
	});
	/* -------------------------------------
		404 BG FULLSCREEN
	-------------------------------------- */
	if ($(document.body).hasClass('comingsoon-page')) {
		jQuery(function($){
			$.supersized({
				slides : [ {image : 'images/img-commingsoon.jpg'} ],
				vertical_center : 0
			});
		});
	};
	/* -------------------------------------
			PRODUCT INCREASE
	-------------------------------------- */
	$('em.minus').on('click', function () {
		$('#quantity1').val(parseInt($('#quantity1').val()) - 1, 10);
	});
	$('em.plus').on('click', function () {
		$('#quantity1').val(parseInt($('#quantity1').val()) + 1, 10);
	});
	/* -------------------------------------
		NICE SCROLLING
	-------------------------------------- */
	$(function() {
		$(".theme-tab-content .tab-pane, .scroll").niceScroll({
			cursorcolor:"#313131",
			cursorwidth: "3px",
			cursorborderradius: "0",
			background: "#d8d8d8",
			cursorborder: "0",
			autohidemode: false
		});
	});
	/* -------------------------------------
			SIMPLE COUNTOWN
	-------------------------------------- */
	if ($(document.body).hasClass('home')) {
		// set the date we're counting down to
		var target_date = new Date('Jan, 31, 2016').getTime();
		// variables for time units
		var days, hours, minutes, seconds;
		// get tag element
		var countdown = document.getElementById('countdown');
		// update the tag with id "countdown" every 1 second
		setInterval(function () {
			// find the amount of "seconds" between now and target
			var current_date = new Date().getTime();
			var seconds_left = (target_date - current_date) / 1000;
			// do some time calculations
			days = parseInt(seconds_left / 86400, 10);
			seconds_left = seconds_left % 86400;
			hours = parseInt(seconds_left / 3600, 10);
			seconds_left = seconds_left % 3600;
			minutes = parseInt(seconds_left / 60, 10);
			seconds = parseInt(seconds_left % 60, 10);
			// format countdown string + set tag value
			countdown.innerHTML = '<span class="days">' + days +  ' <i>Days</i></span>   <span class="hours">' + hours + ' <i>Hours</i></span>   <span class="minutes">'
			+ minutes + ' <i>Minutes</i></span>   <span class="seconds">' + seconds + ' <i>Seconds</i></span>';  
		}, 1000);
	}
	/* -------------------------------------
			ISOTOPE GALLERY
	-------------------------------------- */
	$('.grid').isotope({
		layoutMode: 'packery',
		itemSelector: '.grid-item'
	});
	if ($(document.body).hasClass('comingsoon-page')) {
		// set the date we're counting down to
		var target_date = new Date('Jan, 31, 2016').getTime();
		// variables for time units
		var days, hours, minutes, seconds;
		// get tag element
		var countdown = document.getElementById('countdown');
		// update the tag with id "countdown" every 1 second
		setInterval(function () {
			// find the amount of "seconds" between now and target
			var current_date = new Date().getTime();
			var seconds_left = (target_date - current_date) / 1000;
			// do some time calculations
			days = parseInt(seconds_left / 86400, 10);
			seconds_left = seconds_left % 86400;
			hours = parseInt(seconds_left / 3600, 10);
			seconds_left = seconds_left % 3600;
			minutes = parseInt(seconds_left / 60, 10);
			seconds = parseInt(seconds_left % 60, 10);
			// format countdown string + set tag value
			countdown.innerHTML = '<span class="days">' + days +  ' <i>Days</i></span>   <span class="hours">' + hours + ' <i>Hours</i></span>   <span class="minutes">'
			+ minutes + ' <i>Minutes</i></span>   <span class="seconds">' + seconds + ' <i>Seconds</i></span>';  
		}, 1000);
		/* -------------------------------------
			COMING SOON COUNTER
		-------------------------------------- */
		$(window).on('load', function() {
			var labels = ['weeks', 'days', 'hours', 'minutes', 'seconds'],
			nextYear = (new Date().getFullYear() + 1) + '/01/01',
			template = _.template($('#main-example-template').html()),
			currDate = '00:00:00:00:00',
			nextDate = '00:00:00:00:00',
			parser = /([0-9]{2})/gi,
			$example = $('#main-example');
			// Parse countdown string to an object
			function strfobj(str) {
				var parsed = str.match(parser),
					obj = {};
				labels.forEach(function(label, i) {
					obj[label] = parsed[i]
				});
				return obj;
			}
			// Return the time components that diffs
			function diff(obj1, obj2) {
				var diff = [];
				labels.forEach(function(key) {
					if (obj1[key] !== obj2[key]) {
						diff.push(key);
					}
				});
				return diff;
			}
			// Build the layout
			var initData = strfobj(currDate);
			labels.forEach(function(label, i) {
				$example.append(template({
					curr: initData[label],
					next: initData[label],
					label: label
				}));
			});
			// Starts the countdown
			$example.countdown(nextYear, function(event) {
				var newDate = event.strftime('%w:%d:%H:%M:%S'),
				data;
				if (newDate !== nextDate) {
					currDate = nextDate;
					nextDate = newDate;
					// Setup the data
					data = {
						'curr': strfobj(currDate),
						'next': strfobj(nextDate)
					};
					// Apply the new values to each node that changed
					diff(data.curr, data.next).forEach(function(label) {
						var selector = '.%s'.replace(/%s/, label),
						$node = $example.find(selector);
						// Update the node
						$node.removeClass('flip');
						$node.find('.curr').text(data.curr[label]);
						$node.find('.next').text(data.next[label]);
						// Wait for a repaint to then flip
						_.delay(function($node) {
							$node.addClass('flip');
						}, 50, $node);
					});
				}
			});
		});
	};
	/* -------------------------------------
			COMING SOON COUNTER
	-------------------------------------- */
	var setElementHeight = function () {
		var width = $(window).width();
		var height = $(window).height();
		var small = parseInt(height, 10) / 1.7;
		var medium = parseInt(height, 10) / 2;
		if (width >= 992) {
			$('.autoheight').css('height', (height));
		}
		else if (width < 768) {
			if (width < height) {
				$('.autoheight').css('min-height', (small));
				$('.autoheight > div').css('top', 45);
			} else {
				$('.autoheight').css('min-height', (height));
				$('.autoheight > div').css('top', 0);
			}
		}
		else {
			$('.autoheight').css('height', (medium));
		}
	};
	$(window).on("resize", function () {
		setElementHeight();
		return false;
	}).resize();
});
