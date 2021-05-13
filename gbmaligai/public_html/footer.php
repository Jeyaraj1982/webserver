<footer>

 

      <div class="foot-top" style="background:#f7f7f7;"><div class="container"><div>    <div class="slide-padding">
    <div class="service">
    <div class="row" style="margin-top:10px;">
                    <div class=" col-sm-3 col-xs-12">
                        <div style="text-align: center;" >
                            <img src="<?php echo WEB_URL;?>/assets/lowest_guranty.png" style="height:100px;margin:0px auto">
                            <br>Lowest Price & Quality Guarantee 
                        </div>
                    </div>
                    <div class=" col-sm-3 col-xs-12">
                        <div style="text-align: center;" >
                            <img src="<?php echo WEB_URL;?>/assets/cash_on_delivery.png" style="height:100px;margin:0px auto">
                            <br>Cash on Delivery<br>at your doorstep
                        </div>
                    </div>
                    
                     <div class=" col-sm-3 col-xs-12">
                        <div style="text-align: center;" >
                            <img src="<?php echo WEB_URL;?>/assets/free_delivery.png" style="height:100px;margin:0px auto">
                            <br>Free Delivery<br>Your Order value above Rs.1000
                        </div>
                    </div>
                </div>
                 
    </div>
  </div></div>

</div></div>

  <div class="container">
    <div class="row">
    <aside id="column-left1" class="col-sm-6">
    <div>  <h5><span>Contact us</span>
   <button type="button" class="btn btn-primary toggle collapsed" data-toggle="collapse" data-target="#contact"></button>
</h5>
<div id="contact" class="collapse footer-collapse footcontact">
<ul class="list-unstyled f-left">
  <li><i class="fa fa-map-marker"></i>3/105, West Street, Eraviputhoor P.O</li>
  <li><i class="fa fa-map-marker"></i>Kanyakumari District. 629402</li>
  <!--<li><i class="fa fa-envelope"></i>company@gmail.com</li>-->
  <li><i class="fa fa-phone"></i>9566585866</li>
  <li><i class="fa fa-print" aria-hidden="true"></i>&nbsp;gbmaligai@gmail.com</li>
  </ul>
  <!--<ul class="list-inline list-unstyled foot-social">
  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
  <li><a href="#"><i class="fa fa-instagram"></i></a></li>
  <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
  <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
</ul>-->
</div></div>

  </aside>

  <div class="col-sm-6">
    <div class="row">
    <div class="middle-footer">
       
      <div class="col-sm-6">
                <h5>Information
          <button type="button" class="btn btn-primary toggle collapsed" data-toggle="collapse" data-target="#info"></button>
        </h5>
        <div id="info" class="collapse footer-collapse">
        <ul class="list-unstyled">
                   <li><a href="">About Us</a></li>
                    <li><a href="">Privacy Policy</a></li>
                    <li><a href="">Terms &amp; Conditions</a></li>
                    <li><a href="Payment-method.php">Payment Method</a></li>
                    <li><a href="contact-us.php">Contact Us</a></li>
         
        </ul>
        </div>
              </div>
      <div class="col-sm-6">
        <h5>My Account
          <button type="button" class="btn btn-primary toggle collapsed" data-toggle="collapse" data-target="#account"></button>
        </h5>
        <div id="account" class="collapse footer-collapse">
        <ul class="list-unstyled lastb">
          <li><a href="">My Account</a></li>
          <li><a href="">My Orders</a></li>
          <li><a href="">My WishList</a></li>
        </ul>
        </div>
      </div>
    </div>
    </div>
  </div>
 
      </div>
    </div>

     <!--
  <div class="container">
    <div class="foot-bottom">
      <div>  <div class="row">
  <div class="col-lg-4 col-md-3 col-sm-4 col-xs-12">
    <ul class="list-inline list-unstyled foot-social">
      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
      <li><a href="#"><i class="fa fa-instagram"></i></a></li>
      <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
      <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
      <li><a href="#"><i class="fa fa-rss"></i></a></li>
    </ul>
  </div>
  <div class="col-lg-4 col-md-5 col-sm-5 col-xs-12">
    <ul class="list-inline list-unstyled foot-app">
      <li><a href="#"><img class="img-responsive center-block" src="image/catalog/app1.png" alt="app"></a></li>
      <li><a href="#"><img class="img-responsive center-block" src="image/catalog/app2.png" alt="app"></a></li>
      <li><a href="#"><img class="img-responsive center-block" src="image/catalog/app3.png" alt="app"></a></li>
    </ul>
  </div>
	<div class="col-md-4 col-sm-3 col-xs-12 foot-pay text-right">
      <img class="img-responsive pull-right" src="image/catalog/payment.png" alt="imgpayment">
	</div>
</div></div>


    </div>
  </div>
   -->
   <div class="foot-power" style="background: #222;">
        <div class="container">
            <div class="copy text-center">Powered By <a href=""></a>2020-2021</div>
        </div>
    </div>
</footer>
<a href="" id="scroll" title="Scroll to Top" style="display: block;">
   <i class="fa fa-angle-up"></i>
</a>
<script type="text/javascript">

 
function listaddtocart(ProductID){
    $('#buttoncart').button('loading'); 
     ErrorCount=0;   
     
     if (ProductID==0) {
         ErrorCount=0;
     } else {
       // $('#ErrBrandSize').html("");
       // if($('#BrandSize').val()==""){
       //     ErrorCount++;  
       //     $('#ErrBrandSize').html("<br>Please Select Size");    
      //  } 
     }
     
      var xqty='fqty_'+ProductID;
      var aqty = parseInt(document.getElementById(xqty).value);
     if(aqty <=0){
              alert('Invalid quantity');
              return false;
              }
              
                       
     if(ErrorCount==0) {
        var param = $("#frmid_"+ProductID).serialize();
        $.post("webservice.php?action=listaddtocart", param,function( data ) {
          DisplayCartItem(data);
		  //$('.breadcrumb').after('<div id="success"><div  class="alert alert-success alert-dismissible">Added Cart<button type="button" class="close" data-dismiss="alert">&times;</button></div></div>');
		  $('html, body').animate({ scrollTop: 0 }, 'slow');
		  $('#buttoncart').html('Added');
	
		});
     } else{
        return false;
     }
 }
                                         
    
 
$(document).ready(function () {
  addtocart(0,0);
 $('#success').hide();
 
}); 
window.onload = function() {
  $("#success").hide();
  
}; 
</script>
<!--
OpenCart is open source software and you are free to remove the powered by OpenCart if you want, but its generally accepted practise to make a small donation.
Please donate via PayPal to donate@opencart.com
//-->
</body></html>
<div class="modal fade right" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" style="top: 0px !important;">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document" >
    <div class="modal-content" >
    <div id="xconfrimation_text"></div>
    </div>
  </div>
</div>

<script>
    function addtocart(ProductID,PriceTagID) {
        
        var param = (ProductID==0 || PriceTagID==0) ? "" : $("#frmid_"+PriceTagID).serialize();
        
        $.post("webservice.php?action=addtocart", param,function( data ) {
            DisplayCartItem(data);
		    //$('.breadcrumb').after('<div id="success"><div  class="alert alert-success alert-dismissible">Added Cart<button type="button" class="close" data-dismiss="alert">&times;</button></div></div>');
		    $('html, body').animate({ scrollTop: 0 }, 'slow');
		    var obj = JSON.parse(data); 
		    if(obj.IsCart=="1"){
                $('#cartadded_'+PriceTagID).show();
                $('#cartadd_'+PriceTagID).hide();
                $('#qtydiv_'+PriceTagID).html('Qty: '+ obj.Qty);
		    } else {
			    //$('#buttoncart_'+PriceTagID).html('<i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;Add to Cart'); 
			    //$('#buttoncart_'+PriceTagID).button('reset');	
		    }
        });
    }
    
 function DisplayCartItem(data) {
     var obj = JSON.parse(data);
     var subamount=0;
     var text='';
     
     if(obj.items.length>0){
        text += '<li>'
                +'<table class="table" style=";margin-top:-5px">'
                    +'<tbody>'
                        $.each(obj.items,function(index, value){
                            text+='<tr>'
                                        +'<td class="text-center"> <a><img src="uploads/'+value.ProductImage+'" alt="" title="" class="img-thumbnail" style="width:50px"> </a> </td>'
                                        +'<td class="text-left"><a>'+value.ProductName+'</a><Br><span style="color:#888">x '+value.Qty+'</span></td>'
                                        +'<td class="text-right">'+parseFloat(value.Price).toFixed(2)+'</td>';
                                         if (value.BrandSizeText != null && value.BrandSizeText !="") {
                                                text += '<td class="text-right">Size: '+value.BrandSizeText+'</td>';
                                            }
                                         text +='<td class="text-center"><button type="button"  onclick="CallConfirmationtopcart(\''+value.PriceTagID+'\')" title="Remove" class="btn btn-danger btn-xs" style="font-size: 10px !important;padding: 3px 6px;"><i class="fa fa-times" style="font-size:11px"></i></button></td>'
                                    +'</tr>';
                            if(value.IsCart==1){  
                                $('#buttoncart').html('Added'); 
                            } else {
                                $('#buttoncart').html('Add to Cart');  
                            }
                        });
                        text+= '<tr>'
						    +'<td style="text-align:right" colspan="2">Total</td>'
                            +'<td style="text-align:right;font-weight:bold">'+obj.subtotal+'</td>'
							+'<td style="text-align:right">&nbsp;</td>'
						+'</tr>'
                    + '</tbody>'
                + '</table>'
                + '<p class="text-right" style="padding-right:10px;"><a href="cart.php" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> View Cart</a>&nbsp;&nbsp;&nbsp;<a href="checkout.php" class="btn btn-primary"><i class="fa fa-share"></i> Continue Purchase</a></p>'
                + '</li>';
				} else {
					text+='<li>'
							+'<p class="text-center">Your shopping cart is empty!</p>'
						  +'</li>';
				}
				$('#cart_total').html(obj.items.length);
                $('#cart_amt').html(obj.subtotal);
				$('#cart_items').html(text);    
	}
function CallConfirmationtopcart(PriceTagID) {
    var text = '<input type="hidden" value="'+PriceTagID+'" id="ProductID" Name="ProductID">'
                     +'<div class="modal-header" style="border-bottom: 1px solid #e5e5e5;">'
                        +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                        +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;margin-top: -30px;">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                        +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to remove product?<br>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-danger" onclick="RemoveItem(\''+PriceTagID+'\')" >Yes, Confirm</button>'
                     +'</div>';  
        $('#xconfrimation_text').html(text);                                       
        $('#ConfirmationPopup').modal("show");
    }
function RemoveItem(PriceTagID){
    $.ajax({url:'webservice.php?action=RemoveItem&PriceTagID='+PriceTagID,success:function(data){
        DisplayCartItem(data);
		location.href='';
		
        }});    
}

 </script>
 <script>
function CallConfirmation(PriceTagID){
    var text = '<input type="hidden" value="'+PriceTagID+'" id="PriceTagID" Name="PriceTagID">'
                     +'<div class="modal-header" style="border-bottom: 1px solid #e5e5e5;">'
                        +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                        +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;margin-top: -30px;">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                        +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to remove product?<br>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-danger" onclick="Cart_RemoveItem(\''+PriceTagID+'\')" >Yes, Confirm</button>'
                     +'</div>';  
        $('#xconfrimation_text').html(text);                                       
        $('#ConfirmationPopup').modal("show");
    }
function Cart_RemoveItem(PriceTagID){
    $.ajax({url:'webservice.php?action=RemoveItem&PriceTagID='+PriceTagID,success:function(data){
        location.href='cart.php';
		
        }});  
}  







 function addtowishlist(ProductID){                                   
    $.ajax({url:'webservice.php?action=addtowishlist&ProductID='+ProductID,success:function(data){
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
                html = "<div class='modal-body'>";
                    html += "<div class='form-group row'>";
                        html += "<div class='col-sm-12' style='text-align:center'><img src='accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div>";
                    html += "</div>";
                html += "</div>";
                html += "<div class='modal-footer' style='border-top: none;padding-top: 0px;'>";
                    html += "<div class='col-sm-12' style='text-align:center'><button type='button' class='button pro' data-dismiss='modal'>Continue</button></div>";
                html += "</div>";
            $("#xconfrimation_text").html(html);
            $('#ConfirmationPopup').modal("show");
        }if (obj.status=="success") {
            $("#wishlist").html("<a style='cursor:pointer' onclick='removewishlist("+ProductID+")'><i class='fa fa-heart'  style='color:#e83f33;vertical-align: 0px !important;'></i><span>Remove Wishlisht</span></a>");
        }
        
    }});
 } 
 function addtowishlistindex(ProductID){
    $.ajax({url:'webservice.php?action=addtowishlist&ProductID='+ProductID,success:function(data){
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
                html = "<div class='modal-body'>";
                    html += "<div class='form-group row'>";
                        html += "<div class='col-sm-12' style='text-align:center'><img src='accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div>";
                    html += "</div>";
                html += "</div>";
                html += "<div class='modal-footer' style='border-top: none;padding-top: 0px;'>";
                    html += "<div class='col-sm-12' style='text-align:center'><button type='button' class='button pro' data-dismiss='modal'>Continue</button></div>";
                html += "</div>";
            $("#xconfrimation_text").html(html);
            $('#ConfirmationPopup').modal("show");
        }if (obj.status=="success") {
            $("#wishlist"+ProductID).html("<a style='cursor:pointer' onclick='removewishlistindex("+ProductID+")'><i class='fa fa-heart' style='color:#e83f33;vertical-align: 0px !important;'></i></a>");
        }
        
    }});
 }     
 function removewishlistindex(ProductID){
    $.ajax({url:'webservice.php?action=removewishlist&ProductID='+ProductID,success:function(data){
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
                html = "<div class='modal-body'>";
                    html += "<div class='form-group row'>";
                        html += "<div class='col-sm-12' style='text-align:center'><img src='accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div>";
                    html += "</div>";
                html += "</div>";
                html += "<div class='modal-footer' style='border-top: none;padding-top: 0px;'>";
                    html += "<div class='col-sm-12' style='text-align:center'><button type='button' class='button pro' data-dismiss='modal'>Continue</button></div>";
                html += "</div>";
            $("#xconfrimation_text").html(html);
            $('#ConfirmationPopup').modal("show");
        }if (obj.status=="success") {
            $("#wishlist"+ProductID).html("<a style='cursor:pointer' onclick='addtowishlistindex("+ProductID+")'><i class='fa fa-heart-o' style='color:#e83f33;vertical-align: 0px !important;'></i></a>");
        }
    }});
 }
 function removewishlist(ProductID){
	$.ajax({url:'webservice.php?action=removewishlist&ProductID='+ProductID,success:function(data){
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
				html = "<div class='modal-body'>";
					html += "<div class='form-group row'>";
						html += "<div class='col-sm-12' style='text-align:center'><img src='accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div>";
					html += "</div>";
				html += "</div>";
				html += "<div class='modal-footer' style='border-top: none;padding-top: 0px;'>";
					html += "<div class='col-sm-12' style='text-align:center'><button type='button' class='button pro' data-dismiss='modal'>Continue</button></div>";
				html += "</div>";
			$("#xconfrimation_text").html(html);
			$('#ConfirmationPopup').modal("show");
		}if (obj.status=="success") {
            location.href='';
            $("#wishlist"+ProductID).html("<a style='cursor:pointer' onclick='addtowishlist("+ProductID+")'><i class='fa fa-heart-o' style='color:#e83f33;vertical-align: 0px !important;'></i></a>");
        }
    }});
 }	 
</script>
<script type="text/javascript">
                                $(document).ready(function () {
                                    var flag = false;
                                    var ajax_search_enable = $('#ajax-search-enable').val();
                                    
                                    var current_cate_value = $('ul.cate-items li.selected').data('value');
                                    var current_cate_text = $('ul.cate-items li.selected').html();
        
                                    $('.cate-selected').attr('data-value', current_cate_value);
                                    $('.cate-selected').html(current_cate_text);
        
        $('.hover-cate p').click(function () {
            $( ".cate-items" ).slideToggle("slow");
            $( ".cate-items" ).addClass("sblock");
        });
        
        $('.ajax-result-container').hover(
            function() {
                flag = true;
            },
            function() {
                flag = false;
            }
        );
        
        $('.hover-cate').hover(
            function() {
                flag = true;
            },
            function() {
                flag = false;
            }
        );
        
        $('#search-by-category').focusout(function() {
            if(flag == true) {
                $('.ajax-result-container').show();
            } else {
                $('.ajax-result-container').hide();
            }
        });
        
        $('#search-by-category').focusin(function() {
            $('.ajax-result-container').show();
        });

         $('#text-search').keypress(function(e){
            if(e.which == 13){//Enter key pressed
                $('#btn-search-category').click();//Trigger search button click event
            }
        }); 

        
        function goSearch(search_text) {
            $('#btn-search-category').click();
        }
        $('#btn-search-category').click(function () {
            var url = 'http://templatetasarim.com/opencart/Basket/index.php?route=product/search';
            var url = 'search_products.php?';
            var text_search = $('#text-search').val();
            if(text_search) {
                url += '&search=' + encodeURIComponent(text_search);
            }

            var category_search = $('.cate-selected').attr("data-value");
            if(category_search) {
                url += '&category_id=' + encodeURIComponent(category_search);
            }

            location = url;
        });

        if(ajax_search_enable == '1') {
            $('#text-search').keyup(function(e) {
                var text_search = $(this).val();
                var cate_search = $('.cate-selected').attr("data-value");
                if(text_search != null && text_search != '') {
                    ajaxSearch(text_search, cate_search);
                } else {
                    $('.ajax-result-container').html('');
                    $('.ajax-loader-container').hide();
                }
            });

            $('ul.cate-items li.item-cate').click(function() {
                var cate_search = $(this).data('value');
                var text_search = $('#text-search').val();
                $('.cate-selected').attr('data-value', cate_search);
                $('.cate-selected').html($(this).html());
                if(text_search != null && text_search != '') {
                    ajaxSearch(text_search, cate_search);
                } else {
                    $('.ajax-result-container').html('');
                    $('.ajax-loader-container').hide();
                }
                $( ".cate-items" ).hide();
                $('#text-search').focus();
            });

        }
        
        function ajaxSearch(text_search, cate_search) {
            if (text_search.length>2) {
            $.ajax({
                url         : 'webservice.php?action=ajaxSearch',
                type        : 'post',
                data        : { text_search : text_search, cate_search : cate_search },
                beforeSend  : function () {
                    $('.ajax-loader-container').show();
                },
                success     : function(json) {
                  var obj = JSON.parse(json);
                    if(obj.success == true) {
                        $('.ajax-result-container').html(obj.result_html);
                        $('.ajax-loader-container').hide();
                    }
                }
            });
            }
        }

    });    
</script>