<?php include_once("header.php");?>
<?php $Product = $mysql->select("select * from _tbl_products where md5(ProductID)='".$_GET['id']."'");?>
<body class="product-page">
<div id="page"> 
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a title="Go to Home Page" href="index.php">Home</a><span>&raquo;</span></li>
            <li class=""> <a><?php echo $Product[0]['CategoryName'];?></a><span>&raquo;</span></li>
            <li class=""> <a><?php echo $Product[0]['SubCategoryName'];?></a><span>&raquo;</span></li>
            <li><strong><?php echo $Product[0]['ProductName'];?></strong></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <form method="post" action="" id=frmid_<?php echo $Product[0]['ProductID'];?>>
  <input type="hidden" name="ProductID" id="ProductID" value="<?php echo $Product[0]['ProductID'];?>"> 
  <div class="main-container col1-layout">
    <div class="container">
      <div class="row">
        <div class="col-main">
          <div class="product-view-area">
            <div class="product-big-image col-xs-12 col-sm-5 col-lg-5 col-md-5">
              <div class="large-image"><a href="uploads/<?php echo $Product[0]['ProductImage'];?>" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20"> <img class="zoom-img" src="uploads/<?php echo $Product[0]['ProductImage'];?>" alt="products"> </a> </div>
              <div class="flexslider flexslider-thumb">
                <ul class="previews-list slides">
                <?php $additionalImages = $mysql->select("select * from _tbl_product_additional_image where ProductID='".$Product[0]['ProductID']."'");?>
                <?php foreach($additionalImages as $image){ ?>
                  <li><a href='http://japps.online/ecommerce/uploads/<?php echo $image['ProductImage'];?>' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: 'http://japps.online/ecommerce/uploads/<?php echo $image['ProductImage'];?>' "><img src="http://japps.online/ecommerce/uploads/<?php echo $image['ProductImage'];?>" alt = "Thumbnail 2"/></a></li>
                <?php } ?>
                </ul>
              </div>
              
              <!-- end: more-images --> 
              
            </div>
            <div class="col-xs-12 col-sm-7 col-lg-7 col-md-7 product-details-area">
              <div class="product-name">
                <h1><?php echo $Product[0]['ProductName'];?></h1>
              </div>
              <div class="price-box">
                <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> &#8377; <?php echo number_format($Product[0]['SellingPrice'],2);?> </span> </p>
                <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price" style="color: #575757 !important;"> &#8377; <?php echo number_format($Product[0]['ProductPrice'],2);?> </span> </p>
                <p class="special-price"> <span class="price-label">Save Price:</span> <span class="price" style="color: green;"> 
                    <?php 
                     $Percentage = 100-(($Product[0]['SellingPrice']*100)/($Product[0]['ProductPrice']*1));
                    echo ceil($Percentage)."% off";?> </span> </p>
              </div>
              <div class="ratings">
                <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                <!--<p class="rating-links"><a href="#">1 Review(s)</a> <span class="separator">|</span><a href="#">Add Your Review</a> </p>-->
                <p class="availability in-stock pull-right">Availability: <span>In Stock</span></p>
              </div>
              <div class="short-description">
                <h2>Quick Overview</h2>
                <p><?php echo $Product[0]['ShortDescription'];?></p>
              </div>
              <div class="product-color-size-area">
               <!-- <div class="color-area">
                  <h2 class="saider-bar-title">Color</h2>
                  <div class="color">
                    <ul>
                      <li><a href="#"></a></li>
                      <li><a href="#"></a></li>
                      <li><a href="#"></a></li>
                      <li><a href="#"></a></li>
                      <li><a href="#"></a></li>
                      <li><a href="#"></a></li>
                    </ul>
                  </div>
                </div> -->
                <div class="size-area" style="width: 100%;">
                  <h2 class="saider-bar-title">Size</h2>
                  <div class="size">
                    <ul>
                    <?php 
                       if($Product[0]['AgeGroup']!=""){ 
                            $AgeGroups = explode(",", $Product[0]['AgeGroup']);
                            foreach($AgeGroups as $AgeGroup){ 
                    ?>
                            <li><a id="AgeGroup<?php echo md5($AgeGroup)?>" onclick="SelectAgeGroup('<?php echo $AgeGroup;?>','<?php echo md5($AgeGroup)?>')" style="margin-bottom: 5px;cursor: pointer"><?php echo $AgeGroup;?></a></li>
                    <?php              
                            }
                       }
                       if($Product[0]['BrandSize']!=""){ 
                            $BrandSizes = explode(",", $Product[0]['BrandSize']);
                            foreach($BrandSizes as $BrandSize){ 
                    ?>
                            <li><a id="Bs<?php echo $BrandSize;?>" onclick="SelectSize('<?php echo $BrandSize;?>')" style="cursor: pointer"><?php echo $BrandSize;?></a></li>
                    <?php 
                            }
                       }
                    
                     ?> 
                    </ul>
                    <input type="hidden" name="BrandSize" id="BrandSize">
                    <span style="color: red;" id="ErrBrandSize"></span>
                  </div>
                </div>
              </div>
              <div class="product-variation">
                  <div class="cart-plus-minus">
                    <label for="qty">Quantity:</label>
                    <div class="numbers-row">
                      <div onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) result.value--;return false;" class="dec qtybutton"><i class="fa fa-minus">&nbsp;</i></div>
                      <input type="text" class="qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                      <div onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="inc qtybutton"><i class="fa fa-plus">&nbsp;</i></div>
                    </div>
                  </div>
                  <div id="addcart">
                    <button class="button pro-add-to-cart" title="Add to Cart" type="button" onclick="addtocart('<?php echo $Product[0]['ProductID'];?>')"><span><i class="fa fa-shopping-basket"></i> Add to Cart</span></button>
                  </div>
                  <div id="addedcart" style="display: none;">
                    <button class="button pro-add-to-cart" type="button" style="background:green;border-color: green;"><span><i class="fa fa-check"></i> Added</span></button>
                  </div>
              </div>
              <div class="product-cart-option"> 
                <ul>
                  <li>
                    <?php $whishlist = $mysql->select("select * from _tbl_whishlist where CustomerID='".$_SESSION['User']['CustomerID']."' and WhislistedProductID='".$Product[0]['ProductID']."'");?>
                    <?php if(sizeof($whishlist)==0){ ?>
                        <a  style="cursor:pointer" id="wishlist" onclick="addtowishlist('<?php echo $Product[0]['ProductID'];?>')"><i class="fa fa-heart-o"></i><span>Add to Wishlist</span></a></li>
                    <?php } else { ?>
                        <a  style="cursor:pointer"><i class="fa fa-heart" style="color:#e83f33;vertical-align: 0px !important;"></i><span>Added to whishlist</span></a></li>
                    <?php } ?>
                  <!--<li><a href="#"><i class="fa fa-envelope"></i><span>Email to a Friend</span></a></li>-->
                </ul>
              </div>
              <!--<div class="pro-tags">
                <div class="pro-tags-title">Tags:</div>
               <a href="#">bootstrap</a>,<a href="#">shopping</a>,<a href="#">fashion</a>,<a href="#">responsive</a> </div>-->
              <div class="share-box">
                <div class="title">Share in social media</div>
                <div class="socials-box"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </form>
  
 
  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-3 col-xs-12">
          <div style="display: none;" class="footer-logo"><a href="index.html"><img src="assets/images/footer-logo.png" alt="fotter logo"></a> </div>
          <p>Lorem Ipsum is simply dummy text of the print and typesetting industry. Ut pharetra augue nec augue. Nam elit agna, endrerit sit amet.</p>
          <div class="social">
            <ul class="inline-mode">
              <li class="social-network fb"><a title="Connect us on Facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li class="social-network tw"><a title="Connect us on Twitter" href="#"><i class="fa fa-twitter"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-md-2 col-xs-12 collapsed-block">
          <div class="footer-links">
            <h5 class="links-title">Information<a class="expander visible-xs" href="#TabBlock-1">+</a></h5>
            <div class="tabBlock" id="TabBlock-1">
              <ul class="list-links list-unstyled">
                <li><a href="delivery.php">Delivery Information</a></li>
                <li><a href="faq.php">FAQs</a></li>
                <li><a href="termsandconditions.php">Terms &amp; Condition</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-md-2 col-xs-12 collapsed-block">
          <div class="footer-links">
            <h5 class="links-title">Insider<a class="expander visible-xs" href="#TabBlock-3">+</a></h5>
            <div class="tabBlock" id="TabBlock-3">
              <ul class="list-links list-unstyled">
                <li><a href="about_us.php">About Us</a></li>
                <li><a href="contact_us.php">Contact Us</a></li>
                <li><a href="return_policy.php">Return Policy</a></li>
               
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-md-2 col-xs-12 collapsed-block">
          <div class="footer-links">
            <h5 class="links-title">Service<a class="expander visible-xs" href="#TabBlock-4">+</a></h5>
            <div class="tabBlock" id="TabBlock-4">
              <ul class="list-links list-unstyled">
                <li><a href="Orders.php">My Orders</a></li>
                <li><a href="mywishlist.php">My Wishlists</a></li>
                <li><a href="cart.php">Shopping Cart</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 col-xs-12 collapsed-block">
          <div class="footer-links">
            <h5 class="links-title">Working hours<a class="expander visible-xs" href="#TabBlock-5">+</a></h5>
            <div class="tabBlock" id="TabBlock-5">
              
              <div class="footer-description"> <b>Mon-Fri:</b> 8.30 a.m. - 5.30 p.m.<br>
                <b>Saturday:</b> 9.00 a.m. - 2.00 p.m.<br>
                <b>Sunday:</b> Closed </div>
              <div class="payment">
                <ul>
                  <li><a href="#"><img title="Visa" alt="Visa" src="assets/images/visa.png"></a></li>
                  <li><a href="#"><img title="Paypal" alt="Paypal" src="assets/images/paypal.png"></a></li>
                  <li><a href="#"><img title="Discover" alt="Discover" src="assets/images/discover.png"></a></li>
                  <li><a href="#"><img title="Master Card" alt="Master Card" src="assets/images/master-card.png"></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-coppyright">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-xs-12 coppyright"> Copyright © 2020. All Rights Reserved. </div>
          <div class="col-sm-6 col-xs-12">
            <ul class="footer-company-links">
              <li><a href="about_us.php">About</a></li>
              <li><a href="privacypolicy.php">Privacy Policy</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
 <a href="#" id="back-to-top" title="Back to top"><i class="fa fa-angle-up"></i></a> </div>
  
<!-- End Footer --> 

<!-- JS --> 

<!-- jquery js --> 
<script src="assets/js/jquery.min.js"></script> 

<!-- bootstrap js --> 
<script src="assets/js/bootstrap.min.js"></script> 

<!-- owl.carousel.min js --> 
<script src="assets/js/owl.carousel.min.js"></script> 

<!--cloud-zoom js --> 
<script src="assets/js/cloud-zoom.js"></script> 

<!-- flexslider js --> 
<script src="assets/js/jquery.flexslider.js"></script> 

<!-- jquery.mobile-menu js --> 
<script src="assets/js/mobile-menu.js"></script> 

<!--jquery-ui.min js --> 
<script src="assets/js/jquery-ui.js"></script> 

<!-- main js --> 
<script src="assets/js/main.js"></script> 

<!-- countdown js --> 
<script src="assets/js/countdown.js"></script>
<script type="text/javascript" src="//themera.net/embed/themera.js?id=65867"></script>
</body>
</html>
       <script>
 function SelectSize(BrandSize){
     $('#BrandSize').val(BrandSize);
     $('#Bs'+BrandSize).css("border-color", "#e83f33");  
     $('#ErrBrandSize').html("");
 }
 function SelectAgeGroup(AgeGroup,id){
     $('#BrandSize').val(AgeGroup);
     $('#AgeGroup'+id).css("border-color", "#e83f33");   
     $('#ErrBrandSize').html("");
 }

 function addtocart(ProductID){
     
     ErrorCount=0;   
     
     if (ProductID==0) {
         ErrorCount=0;
     } else {
        $('#ErrBrandSize').html("");
        if($('#BrandSize').val()==""){
            ErrorCount++;  
            $('#ErrBrandSize').html("<br><br><br>Please Select Size");    
        } 
     }
     
     if(ErrorCount==0) {
        var param = $("#frmid_"+ProductID).serialize();
        $.post("webservice.php?action=addtocart", param,function( data ) {
          DisplayCartItem(data);
        });
     } else{
        return false;
     }
 }
 function DisplayCartItem(data){
    var obj = JSON.parse(data);
    var subamount=0;
    var text='<ul id="cart-sidebar" class="mini-products-list">';
                $.each(obj.items,function(index, value){
                   // console.log('My array has at position ' + index + ', this value: ' + value.ProductID);
                  text +='<li class="item odd"><a href="uploads/'+value.ProductImage+'" title="Product title here" class="product-image"><img src="uploads/'+value.ProductImage+'" alt="html Template" width="65"></a>'
                          +'<div class="product-details"><a title="Remove This Item" class="remove-cart"><i class="pe-7s-trash" onclick="CallConfirmationtopcart(\''+value.ProductID+'\')"></i></a>'
                            +'<p class="product-name"><a href="viewproduct.php?id='+value.ProductIDen+'">'+value.ProductName+'</a> </p>'
                            +'<strong>'+value.Qty+'</strong> x <span class="price">'+value.Price+'</span><br>'
                            +'Size : <strong>'+value.Size+'</strong></div>'
                        +'</li>'  
                  });
                  if(obj.IsCart==1){  
                        $('#addedcart').show();  
                        $('#addcart').hide();  
                      }else{
                        $('#addcart').show();  
                      }      
                     text +='</ul>'
                      +'<div class="top-subtotal">Subtotal: <span class="price">'+obj.subtotal+'</span></div>'
                      +'<div class="actions">'
                        +'<button class="btn-checkout" type="button" onClick="location.href=\'checkout.php\'"><i class="fa fa-check"></i><span>Checkout</span></button>'
                        +'<button class="view-cart" type="button" onClick="location.href=\'cart.php\'"><i class="fa fa-shopping-cart"></i><span>View Cart</span></button>'
                      +'</div>';
    $('#cart_total').html(obj.items.length);
    $('#cart_items').html(text);    
}
function CallConfirmationtopcart(ProductID) {
    var text = '<input type="hidden" value="'+ProductID+'" id="ProductID" Name="ProductID">'
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
                        +'<button type="button" class="btn btn-danger" onclick="RemoveItem(\''+ProductID+'\')" >Yes, Confirm</button>'
                     +'</div>';  
        $('#xconfrimation_text').html(text);                                       
        $('#ConfirmationPopup').modal("show");
    }
function RemoveItem(ProductID){
    $.ajax({url:'webservice.php?action=RemoveItem&ProductID='+ProductID,success:function(data){
        DisplayCartItem(data);
        location.href='';
        
        }});    
}
$(document).ready(function () {
  addtocart(0);
}); 
 </script>
 <script>
function CallConfirmation(ProductID){
    var text = '<input type="hidden" value="'+ProductID+'" id="ProductID" Name="ProductID">'
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
                        +'<button type="button" class="btn btn-danger" onclick="Cart_RemoveItem(\''+ProductID+'\')" >Yes, Confirm</button>'
                     +'</div>';  
        $('#xconfrimation_text').html(text);                                       
        $('#ConfirmationPopup').modal("show");
    }
function Cart_RemoveItem(ProductID){
    $.ajax({url:'webservice.php?action=RemoveItem&ProductID='+ProductID,success:function(data){
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
            $("#wishlist").html("<a style='cursor:pointer'><i class='fa fa-heart' style='color:#e83f33;vertical-align: 0px !important;'></i><span>Added to whishlist</span></a>");
        }
        
    }});
 }     
</script>
<script type="text/javascript" src="//themera.net/embed/themera.js?id=65867"></script>
<div class="modal fade right" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" style="top: 0px !important;">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document" >
    <div class="modal-content" >
    <div id="xconfrimation_text"></div>
    </div>
  </div>
</div>