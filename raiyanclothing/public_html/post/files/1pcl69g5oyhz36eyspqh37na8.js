(function($) {
	var mouse = {x:0, y:0};
	var openedDialogs = [];
	var languages = {
		title: 'Information',
		loading: 'Loading...',
		ok: 'OK',
		cancel: 'Cancel',
		yes: 'Yes',
		no: 'No',
		close: 'Close'
	}

	$.fn.dlglanguage = function(settings) {
		languages = jQuery.extend(languages, settings);
		return this;
	}

	$.fn.dlgclose = function() {
		if(openedDialogs.length == 0)
			return;
			
		id = openedDialogs[openedDialogs.length-1];
		
		var iframes = $('#dialog-overlay-'+id).find('iframe');
		if (iframes.length > 0)
			iframes.remove();
		
		$('#dialog-main-'+id).hide();
		$('#dialog-overlay-'+id).hide();
		$('#dialog-main-'+id).remove();
		$('#dialog-overlay-'+id).remove();
		
		openedDialogs.pop();		
	};

	$.fn.dlgresize = function(center) {
		if(!center) return;
			
		if(openedDialogs.length == 0)
			return;
			
		id = openedDialogs[openedDialogs.length-1];
		
		var left = ($(window).width() - $('#dialog-main-'+id).width()) / 2;
		var top = ($(window).height() - $('#dialog-main-'+id).height()) / 2;

		$('#dialog-main-'+id+' .dialog-header').css({
			width: $('#dialog-main-'+id).width()
		});
		
		$('#dialog-main-'+id).css({
			left: ($(document).scrollLeft() + left),
			top: ($(document).scrollTop() + top)
		});
	};
	
	$.fn.dlgmove = function(event) {
		var e = window.event || event;
		
		if (e.button != 1)
			return;
			
		if(openedDialogs.length == 0)
			return;
			
		if (e.clientX < 0 || e.clientY < 0 
			|| e.clientX > $(window).width()
			|| e.clientY > $(window).height())
			return;
			
		id = openedDialogs[openedDialogs.length-1];
		
		var top = parseInt($('#dialog-main-'+id).css('top')) + (e.clientY - mouse.y);
		var left = parseInt($('#dialog-main-'+id).css('left')) + (e.clientX - mouse.x);
		
		if (top < 0)
			top = 0;
		
		if (left < 0)
			left = 0;
		
		var right = left+ $('#dialog-main-'+id).width();
		var bottom = top+ $('#dialog-main-'+id).height();
		
		if (right > $(window).width())
			left = $(window).width()-$('#dialog-main-'+id).width();

		if (bottom > $(window).height())
			top = $(window).height()-$('#dialog-main-'+id).height();
		
		$('#dialog-main-'+id).css({top: top, left: left});
		
		mouse.x = e.clientX;
		mouse.y = e.clientY;
	};
	
	$.fn.dialog = function(setting) {
		var ps = $.fn.extend({
			id: '',
			data: {},
			drag: true,
			fixed: false,
			width: 400,
			height: 120,
			title: 'Information',
			center: true,
			basez: 999,
			buttons: ['ok', 'cancel'],
			callback: false,
			type: 'text',
			content: ''
		}, setting);

		if (ps.id == '')
			ps.id = 'id'+openedDialogs.length;

		openedDialogs.push(ps.id);

		var html = '<div class="dialog-overlay" id="dialog-overlay-'+ps.id+'"></div>';
		html += '<div class="dialog-main" id="dialog-main-'+ps.id+'">';
		if (ps.title) {
			html += '<div class="dialog-header">';
			html += '<div class="dialog-title">'+ps.title+'</div>';
			html += '<div class="dialog-close"></div>';
			html += '</div>';
		}
		html += '<div class="dialog-content"></div>';
		if (ps.buttons && ps.buttons.length > 0) {
			html += '<div class="dialog-footer">';
			for (var i in ps.buttons) {
				html += '&nbsp;&nbsp;';
				html += '<input type="button" id="'+ps.buttons[i]+'" name="'+ps.buttons[i]+'" value="'+eval('languages.'+ps.buttons[i])+'" />';
			}
			html += '</div>';
		}
		html += '</div>';

		$(html).appendTo($(document.body));

		var zIndex = openedDialogs.length*2 + ps.basez;

		$('#dialog-overlay-'+ps.id).css({
			width: $(document).width(),
			height: $(document).height(),
			"z-index": zIndex,
			opacity: 0.6
		}).show();

		height = ps.height;
		if (ps.title)
			height -= 25;
		if (ps.buttons && ps.buttons.length > 0)
			height -= 30;

		$('#dialog-main-'+ps.id+' .dialog-content').css({
			height: height
		});

		$('#dialog-main-'+ps.id).css({
			position: (ps.fixed ? 'fixed' : 'absolute'),
			"z-index": zIndex+1,
			left: ($(document).scrollLeft() + ($(window).width() - ps.width)/2),
			top: ($(document).scrollTop() + ($(window).height() - ps.height)/2),
			width: ps.width
		}).show();

		if (ps.title) {
			$('#dialog-main-'+ps.id+' .dialog-header').mousedown(function(event){
				if(!ps.drag)
					return; 
	
				var e = window.event || event;
				mouse.x = e.clientX;
				mouse.y = e.clientY;
				
				$(document).bind('mousemove', $.fn.dlgmove);
			});
			
			$(document).mouseup(function(event){
				$(document).unbind('mousemove', $.fn.dlgmove);
			});
			
			$('#dialog-main-'+ps.id+' .dialog-close').one('click', $.fn.dlgclose);
		}
		
		switch(ps.type.toLowerCase())
		{
		case 'id':
			$('#dialog-main-'+ps.id+' .dialog-content').html($('#'+ps.content).html());
			break;
		case 'img':
			$('#dialog-main-'+ps.id+' .dialog-content').html(languages.loading);
			$('<img alt="" />').load(function(){
					$('#dialog-main-'+ps.id+' .dialog-content').empty().append($(this)); 
					$.fn.dlgresize(true);
				}).attr('src', ps.content);			
			break;
		case 'url':
			$('#dialog-main-'+ps.id+' .dialog-content').html(languages.loading);
			$.ajax({url:ps.content,
					success: function(html){
						$('#dialog-main-'+ps.id+' .dialog-content').html(html); 
						$.fn.dlgresize(true);
						},
					error: function(xml, textStatus, error){
						$('#dialog-main-'+ps.id+' .dialog-content').html('Load failed!')
						}
			});
			break;
		case 'iframe':
			$('#dialog-main-'+ps.id+' .dialog-content').append($('<iframe src="'+ps.content+'" name="'+ps.id+'_iframe" id="'+ps.id+'_iframe" width="100%" height="100%" frameborder="0" scrolling="no" />'));
			break;
		case 'text':
		default:
			$('#dialog-main-'+ps.id+' .dialog-content').html(ps.content);
			break;
		}
		
		if (ps.buttons && ps.buttons.length > 0) {
			var btnid = '#dialog-main-'+ps.id+' .dialog-footer input';
			$(btnid).unbind('click');
			
			if (ps.callback) {
				$(btnid).bind('click', function(e) {
						if (window.event) e = window.event;  
						var srcEl = e.srcElement? e.srcElement : e.target; 
 						var ret = ps.callback(srcEl.id);
						if (typeof ret != 'boolean' || ret != false)
							$.fn.dlgclose();
					});
				
				$('#dialog-main-'+ps.id+' #focusctrl').keypress(function(event) {
						if (event.which == 13) {
							event.preventDefault();

							var ret = ps.callback('ok');
							if (typeof ret != 'boolean' || ret != false)
								$.fn.dlgclose();
						}
					});
			}
			else {
				$(btnid).bind('click', $.fn.dlgclose);
			}
		}
		
		$('#dialog-main-'+ps.id+' #focusctrl').focus();
	};
	
	$.fn.tips = function(strContent) {
		if (strContent) {
			$.fn.dialog({
				title: false,
				content: '<table align="center" border="0"><tr height=60><td><img src="common/dialog/loading.gif" width="24" height="24" border="0" align="absmiddle">&nbsp;&nbsp;<font color="#004080">'+strContent+'</font></td></tr></table>',
				buttons: false,
				width: 300,
				height: 60
			});
		}
		else {
			$.fn.dlgclose();
		}
	}
	
	$.fn.alert = function(strContent) {
		$.fn.dialog({
			title: languages.title,
			content: strContent,
			buttons: ['ok'],
			width: 400,
			height: 150
		});
	}

	$.fn.confirm = function(strContent, funCallback) {
		$.fn.dialog({
			title: languages.title,
			content: strContent,
			buttons: ['ok', 'cancel'],
			callback: funCallback,
			width: 400,
			height: 150
		});
	}
	
	$.fn.prompt = function(strTitle, strContent, iWidth, iHeight, funCallback) {
		$.fn.dialog({
			title: strTitle == '' ? languages.title : strTitle,
			content: strContent,
			buttons: ['ok', 'cancel'],
			callback: funCallback,
			width: iWidth,
			height: iHeight
		});
	}

	$.fn.opendlg = function(id, strTitle, strContent, strType, iWidth, iHeight, funCallback) {
		$.fn.dialog({
			id: id,
			title: strTitle == '' ? languages.title : strTitle,
			content: strContent,
			type: strType,
			buttons: false,
			callback: funCallback,
			width: iWidth,
			height: iHeight
		});
	}
	
})(jQuery);