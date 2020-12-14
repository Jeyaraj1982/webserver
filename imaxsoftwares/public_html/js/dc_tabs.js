/* dCodes Framework: (c) TemplateAccess */

(function ($) {
	jQuery(document).ready(function () {
		doTabsType1();
		doTabsType2();
		doAccordion();
	});
	function doTabsType1() {
		var tabs = jQuery('.dc_tabs_type_1');
		if (tabs.length < 1) {
			return;
		}
		tabs.append("<span class='dc_tabs_type_1_arrow'></span>");
		tabs.each(function () {
			var self = jQuery(this);
			var handlers = self.children('dt');
			var tabContentBlocks = self.children('dd');
			var currentTab = tabContentBlocks.eq(0);
			var arrow = self.children('span').eq(0);
			var handlersWidth = handlers.eq(0).outerWidth();
			var firstHandlerY = handlers.eq(0).position().top + handlers.eq(0).outerHeight() - 17;
			arrow.css({
				'left': handlersWidth - 17 + 'px',
				'top': firstHandlerY + 'px'
			});
			handlers.click(function () {
				var self = jQuery(this);
				currentTab.prev().removeClass('current');
				currentTab.fadeOut('fast');
				currentTab = self.next();
				var minus = self.index() == 0 ? 17 : self.outerHeight() / 2 + 17;
				arrowY = self.position().top + self.outerHeight() - minus;
				arrow.animate({
					'top': arrowY + 'px'
				});
				currentTab.fadeIn('slow');
				self.parent().animate({
					'height': (currentTab.height() + 80) + 'px'
				}, 500);
				self.addClass('current');
			});
		});
		tabs.children('dt:first-child').click();
	}
	/* Tabs - Type 2 */
	function doTabsType2() {
		var tabs = jQuery('.dc_tabs_type_2');
		if (tabs.length < 1) {
			return;
		}
		tabs.append("<span class='dc_tabs_type_2_arrow'></span>");
		tabs.each(function () {
			var self = jQuery(this);
			var handlers = self.children('dt');
			var tabContentBlocks = self.children('dd');
			var currentTab = tabContentBlocks.eq(0);
			var arrow = self.children('span').eq(0);
			var handlersWidth = handlers.eq(0).outerWidth();
			var firstHandlerY = handlers.eq(0).position().top + handlers.eq(0).outerHeight() - 18;
			arrow.css({
				'left': handlersWidth / 2 - 7 + 'px'
			});
			handlers.click(function () {
				var self = jQuery(this);
				currentTab.prev().removeClass('current');
				currentTab.fadeOut('fast');
				currentTab = self.next();
				arrowY = self.position().left + (self.outerWidth() / 2) - 2;
				arrow.animate({
					'left': arrowY + 'px'
				});
				currentTab.fadeIn('slow');
				self.parent().animate({
					'height': (currentTab.height() + 60 + 40) + 'px'
				}, 500);
				self.addClass('current');
			});
			tabs.children('dt:first-child').click();
		});
	}
	function doAccordion() {
		var accordions = jQuery('.dc_accordion');
		if (accordions.length < 1) {
			return;
		}
		accordions.each(function () {
			var self = jQuery(this);
			var handlers = self.children('dt');
			handlers.click(function () {
				var self = jQuery(this);
				self.children('dt.current').removeClass('current').next().slideUp();
				self.toggleClass('current');
				self.next('dd').slideToggle();
			});
		});
	}
}(jQuery));
$(document).ready(function () {
	$(".dc_flat_tab_content").hide();
	$("ul.flat_tabs li:first").addClass("active").show();
	$(".dc_flat_tab_content:first").show();
	//On Click Event
	$("ul.flat_tabs li").click(function () {
		$("ul.flat_tabs li").removeClass("active");
		$(this).addClass("active");
		$(".dc_flat_tab_content").hide();
		var activeTab = $(this).find("a").attr("href");
		$(activeTab).fadeIn();
		return false;
	});
});