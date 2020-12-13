// autocompletenew */
(function($) {
	$.fn.autocompletenew = function(option) {
		return this.each(function() {
			this.timer = null;
			this.items = new Array();
	
			$.extend(this, option);
	
			$(this).attr('autocompletenew', 'off');
			
			// Focus
			$(this).on('focus', function() {
				this.request();
			});
			
			// Blur
			$(this).on('blur', function() {
				setTimeout(function(object) {
					object.hide();
				}, 200, this);				
			});
			
			// Keydown
			$(this).on('keydown', function(event) {
				switch(event.keyCode) {
					case 27: // escape
						this.hide();
						break;
					default:
						this.request();
						break;
				}				
			});
			
			// Click
			this.click = function(event) {
				event.preventDefault();
	
				value = $(event.target).parent().attr('data-value');
	
				if (value && this.items[value]) {
					this.select(this.items[value]);
				}
			}
			
			// Show
			this.show = function() {
				var pos = $(this).position();
	
				$(this).siblings('ul.dropdown-menu').css({
					top: pos.top + $(this).outerHeight(),
					left: pos.left
				});
	
				$(this).siblings('ul.dropdown-menu').show();
			}
			
			// Hide
			this.hide = function() {
				$(this).siblings('ul.dropdown-menu').hide();
			}		
			
			// Request
			this.request = function() {
				clearTimeout(this.timer);
		
				this.timer = setTimeout(function(object) {
					object.source($(object).val(), $.proxy(object.response, object));
				}, 200, this);
			}
			
			// Response
			this.response = function(json) {
				html = '';
	
				if (json.length) {
					for (i = 0; i < json.length; i++) {
						this.items[json[i]['value']] = json[i];
					}
	
					for (i = 0; i < json.length; i++) {
						if (!json[i]['category']) {
							html += '<li data-value="' + json[i]['value'] + '"><a href="#">' + json[i]['label'] + '</a></li>';
						}
					}
	
					// Get all the ones with a categories
					var category = new Array();
	
					for (i = 0; i < json.length; i++) {
						if (json[i]['category']) {
							if (!category[json[i]['category']]) {
								category[json[i]['category']] = new Array();
								category[json[i]['category']]['name'] = json[i]['category'];
								category[json[i]['category']]['item'] = new Array();
							}
	
							category[json[i]['category']]['item'].push(json[i]);
						}
					}
	
					for (i in category) {
						html += '<li class="dropdown-header">' + category[i]['name'] + '</li>';
	
						for (j = 0; j < category[i]['item'].length; j++) {
							html += '<li data-value="' + category[i]['item'][j]['value'] + '"><a href="#">&nbsp;&nbsp;&nbsp;' + category[i]['item'][j]['label'] + '</a></li>';
						}
					}
				}
	
				if (html) {
					this.show();
				} else {
					this.hide();
				}
	
				$(this).siblings('ul.dropdown-menu').html(html);
			}
			
			$(this).after('<ul class="dropdown-menu"></ul>');
			$(this).siblings('ul.dropdown-menu').delegate('a', 'click', $.proxy(this.click, this));	
			
		});
	}
})(window.jQuery);
$(document).ready(function(){
		var pinnotfound="";var cookie=0;var show=0;var inst;
		$('.popupfixed .search-postcode').on('click',function(){
			$(".popupfixed .pmessage").html("");
			var pincode = $('input[name=\'pincode\']').val();
			if(pincode!=""){
				$('.pincode .error').html("");
				temp={'pincode':pincode};sendfdata(temp);
			}else{
				$('.pincode .error').html("Please enter postcode");
			}
		});

		$('.popuppostcode  .search-postcode').on('click',function(){
			$(".popuppostcode .pmessage").html("");
			devpmcookie("postcodepopup");
			var pincode=$('.popuppostcode input[name=\'pincode\']').val();
			if(pincode!=""){
				$('.popuppostcode .pincode .error').html("");
				temp={'pincode':pincode};sendfdatapopup(temp);
			}else{
				$('.popuppostcode .pincode .error').html("Please enter postcode");
			}
		});

		$('input[name=\'pincode\']').bind('keydown', function(e) {
		console.log(e);
		if (e.keyCode == 13) {
			$(".popupfixed .pmessage").html("");
			var pincode=$('input[name=\'pincode\']').val();
			if(pincode!=""){
				$('.pincode .error').html("");
				temp={'pincode':pincode};sendfdata(temp);
			}else{
				$('.pincode .error').html("Please enter postcode");
			}
		}
		});

		$(document).delegate('#collapse-payment-address input[name=postcode]', 'keyup', function() {
			var postcodevalue = $(this).val();
			var location = "checkoutregister"; 
			autofill(postcodevalue,location);
		});
		$(document).delegate('#collapse-shipping-address input[name=postcode]', 'keyup', function() {
			var postcodevalue = $(this).val();
			var location = "shippingaddress"; 
			autofill(postcodevalue,location);
		});
		$(document).delegate('#account-address input[name=postcode]', 'keyup', function() {
			var postcodevalue = $(this).val();
			var location = "accountaddress"; 
			autofill(postcodevalue,location);
		});
		function autofill(postcodevalue,location){
			$.ajax({
				url:'index.php?route=extension/module/advancedpincode/autofill',
				type:'POST',
				dataType:'json',
				data:{'postcodevalue':postcodevalue},
				success:function(json){
					if(json.zone_id) {
						if(location == 'checkoutregister') {
							if($('#collapse-payment-address select[name=country_id] option:selected').val() != json.country_id) {
								$('#collapse-payment-address select[name=country_id] option[value='+json.country_id+']').prop('selected', true);
								$('#collapse-payment-address select[name=country_id]').trigger("change");
								setTimeout(function() {
							     $('#collapse-payment-address select[name=zone_id] option[value='+json.zone_id+']').prop('selected', true)
							    }, 1000);
							} else {
								$('#collapse-payment-address select[name=zone_id] option[value='+json.zone_id+']').prop('selected', true);
							}
							$('#collapse-payment-address input[name=city]').val(json.city);
						}
						if(location == 'shippingaddress') {
							if($('#collapse-shipping-address select[name=country_id] option:selected').val() != json.country_id) {
								$('#collapse-shipping-address select[name=country_id] option[value='+json.country_id+']').prop('selected', true);
								$('#collapse-shipping-address select[name=country_id]').trigger("change");
								setTimeout(function() {
							     $('#collapse-shipping-address select[name=zone_id] option[value='+json.zone_id+']').prop('selected', true)
							    }, 1000);
							} else {
								$('#collapse-shipping-address select[name=zone_id] option[value='+json.zone_id+']').prop('selected', true);
							}
							$('#collapse-shipping-address input[name=city]').val(json.city);
						}
						if(location == 'accountaddress') {
							if($('#account-address select[name=country_id] option:selected').val() != json.country_id) {
								$('#account-address select[name=country_id] option[value='+json.country_id+']').prop('selected', true);
								$('#account-address select[name=country_id]').trigger("change");
								setTimeout(function() {
							     $('#account-address select[name=zone_id] option[value='+json.zone_id+']').prop('selected', true)
							    }, 1000);
							} else {
								$('#account-address select[name=zone_id] option[value='+json.zone_id+']').prop('selected', true);
							}
							$('#account-address input[name=city]').val(json.city);
						}
					}
				}
			});
		}	
		function sendfdata(content){
			var location="";
			$.ajax({
			url:'index.php?route=extension/module/advancedpincode/checkpin',
			type:'POST',
			dataType:'json',
			data:content,
			success:function(data){
						$(".popupfixed .pmessage").html(data.html).show();
						if ($("span.codcheck").length) {
							$("span.codcheck").html(data.codhtml);
						} else {
							$(".pincodeheading").before("<span class='codcheck'>"+data.codhtml+"</span>");
						}
				}
			});
		};

		function sendfdatapopup(content){
			var location="";
			$.ajax({
			url:'index.php?route=extension/module/advancedpincode/checkpin',
			type:'POST',
			dataType:'json',
			data:content,
			success:function(data){
						$(".popuppostcode .pmessage").html(data.html).show();
						$("span.codcheck").html(data.codhtml);
						if(data.failed){
							$('.popuppostcode .remodal-cancel').show();
						} else {
							$('.popuppostcode .remodal-confirm').show();
							addpindetails();
						}
				}
			});
		};

		$('.popupfixed input[name=\'pincode\']').autocompletenew({
		    'source': function(request, response) {
		        $.ajax({
		            url: 'index.php?route=extension/module/advancedpincode/autocomplete&postcode=' +  encodeURIComponent(request),
		            dataType: 'json',           
		            success: function(json) {
		                response($.map(json, function(item) {
		                    return {
		                        label: item['city_name']+" "+item['zip_code'],
		                        value: item['zip_code']
		                    }
		                }));
		            }
		        });
		    },
		    'select': function(item) {
		        $(".popupfixed .pmessage").html("").hide();
		        $('.popupfixed input[name=\'pincode\']').val(item['value']);
		        $('.popupfixed .search-postcode').trigger("click");
		     //   $('textarea[name=\'link\']').val(item['value']);    
		    }   
		});

		$('.popuppostcode input[name=\'pincode\']').autocompletenew({
		    'source': function(request, response) {
		        $.ajax({
		            url: 'index.php?route=extension/module/advancedpincode/autocomplete&postcode=' +  encodeURIComponent(request),
		            dataType: 'json',           
		            success: function(json) {
		                response($.map(json, function(item) {
		                    return {
		                        label: item['city_name']+" "+item['zip_code'],
		                        value: item['zip_code']
		                    }
		                }));
		            }
		        });
		    },
		    'select': function(item) {
		        $(".popuppostcode .pmessage").html("").hide();
		        $('.popuppostcode input[name=\'pincode\']').val(item['value']);
		        $('.popuppostcode .search-postcode').trigger("click");
		     //   $('textarea[name=\'link\']').val(item['value']);    
		    }   
		});
		function devpmcookie(a) {
			  $.ajax({
			  url:"index.php?route=common/footer/devpmcookie",
			  type:"POST",
			  data : {'a':a},
			  success:function(){
			  }
		  	});
		}
	$(document).on('closed', '.remodal.pincodepopup', function (e) {
	    var id = $(this).attr("id");
	    devpmcookie(id);
	});

	function createCookie(name,value,days) {
	    if (days) {
	        var date = new Date();
	        date.setTime(date.getTime()+(days*24*60*60*1000));
	        var expires = "; expires="+date.toGMTString();
	    }
	    else var expires = "";
	    document.cookie = name+"="+value+expires+"; path=/";
	}

	function readCookie(name) {
	    var nameEQ = name + "=";
	    var ca = document.cookie.split(';');
	    for(var i=0;i < ca.length;i++) {
	        var c = ca[i];
	        while (c.charAt(0)==' ') c = c.substring(1,c.length);
	        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	    }
	    return null;
	}

	function addpindetails() {
		var mdevpc = readCookie('mdevpc');
		if(mdevpc != null){
			$('.popupfixed input[name="pincode"]').val(mdevpc.replace(/\+/g,' '));
		}
	}
	addpindetails();
});

function submitpincodeemail() {
	var err = 1;email = '-';
	var newpincode = $('input[name=\'pincode\']').val();
	var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
	if (!testEmail.test($('input[name=\'postcodeemail\']').val())) {
		$('input[name=\'postcodeemail\']').after("<small style='color:red;'>Invalid Email Address</small>");
		err = 0;
	} else {
		email = $('input[name=\'postcodeemail\']').val();
	}
	if(err == 1) {
	 	temp =  {'newpincode':newpincode, 'email' : email};
	 	addemail(temp);
	}
};

function addemail(content){
	$.ajax({
		url:'index.php?route=extension/module/advancedpincode/pincodeemail',
		type:'POST',data:content,
		success:function(){
			 $(".popupfixed .pmessage").hide();
			  $(".popuppostcode .pmessage").hide();
		}
	});

};


$(window).load(function() {
	var delaylittle = (function(){
	var timer = 0;
	return function(callback, ms){
	    clearTimeout (timer);
	    timer = setTimeout(callback, ms);
	  };
	})();
	$(document).on('keyup', '#shipping_address_postcode,#payment_address_postcode', function () {
		delaylittle(function(){$('#shipping_address input[type=text]').trigger("change");}, 2000 );
	});
	if(jQuery(".remodal").length) {
		inst = $('[data-remodal-id=pincode]').remodal();
		inst.open();
	}
});
$(document).on('cancellation', '.remodal.pincodepopup', function () {
	$('.popuppostcode input[name="pincode"]').val("");
	$('.popuppostcode .pmessage').html("");
	$('.popuppostcode .remodal-cancel').css("display","none");
    inst = $('[data-remodal-id=pincode]').remodal();
	inst.open();
});