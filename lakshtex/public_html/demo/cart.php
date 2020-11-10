<?php include_once("header.php");?>
<?php $page="cart";?>	
<section class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
        <div class="cart">
          <div class="page-content page-order"><div class="page-title">
            <h2>Shopping Cart</h2>
          </div>
            <div class="order-detail-content" style="text-align: center;">
            <?php if(sizeof($_SESSION['items'])==0){ ?>
                <div class="cart-icon" style="text-align: center;width:100%"><i class="icon-basket-loaded icons" style="font-size: 200px"></i></div>    <br>
                No Cart Items Found<br>
                <div class="cart_navigation"> <a class="continue-btn" href="index.php"> Continue shopping&nbsp; <i class="fa fa-arrow-right"> </i></a></div>
            <?php }else{ ?>
              <div class="table-responsive">
                <table class="table table-bordered cart_summary">
                  <thead>
                    <tr>
                      <th class="cart_product">Product</th>
                      <th>Description</th>
                      <th style="text-align: right;">Unit price (&#8377;)</th>
                      <th style="text-align: center;">Qty</th>
                      <th>Total (&#8377;)</th>
                      <th  class="action"><i class="fa fa-trash-o"></i></th>
                    </tr> 
                  </thead>
                  <tbody>
                  <?php 
                    $subtotal=0;
                  foreach($_SESSION['items'] as $item) { 
                      $subtotal+=$item['Qty']*$item['Price'];
                      ?>
                    <tr>
                      <td class="cart_product"><a href="#"><img src="uploads/<?php echo $item['ProductImage'];?>" alt="Product" style="height: 100px;margin: 0px auto;"></a></td>
                      <td class="cart_description" style="vertical-align: top !important;padding-top: 10px;"><p class="product-name"><a href="viewproduct.php?id=<?php echo md5($item['ProductID']);?>"><?php echo $item['ProductName'];?></a><br><span style="font-weight:normal">Size&nbsp;:&nbsp;<?php echo $item['Size'];?></span></p>
                        <!--<small><a href="#">Color : Red</a></small>
                        <small><a href="#">Size : M</a></small></td> -->
                      <td class="price" style="text-align: right;vertical-align: top !important;padding-top: 10px;"><span><?php echo $item['Price'];?></span></td>
                      <td class="qty" style="width: 115px;vertical-align: top !important;padding-top: 10px;"><div class="numbers-row">
                      <div onClick="Decrement('<?php echo $item['ProductID'];?>','<?php echo $item['Price'];?>');" class="dec qtybutton" style="height: 23px;font-size: 10px;line-height: 0px;padding: 5px;"><i class="fa fa-minus">&nbsp;</i></div>
                      <input type="number" value="<?php echo $item['Qty'];?>" class="qty" title="Qty" value="1" maxlength="12" id="qty<?php echo $item['ProductID'];?>" name="qty" style="float: left;">
                      <div onClick="Increment('<?php echo $item['ProductID'];?>','<?php echo $item['Price'];?>');" class="inc qtybutton" style="height: 23px;font-size: 10px;line-height: 0px;padding: 5px;"><i class="fa fa-plus">&nbsp;</i></div>
                    </div></td>
                      <td class="price" style="text-align:left;vertical-align: top !important;padding-top: 10px;"><span id="total<?php echo $item['ProductID'];?>"><?php echo number_format($item['Qty']*$item['Price'],2);?></span></td>
                      <td class="action" style="vertical-align: top !important;padding-top: 10px;"><a  onclick="CallConfirmation('<?php echo $item['ProductID'];?>')"><i class="icon-close"></i></a></td>
                    </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="2" rowspan="2"></td>
                      <td colspan="2">Total products (tax incl.) (&#8377;)</td>
                      <td colspan="3" style="text-align:right"><span id="ttotal"><?php echo number_format($subtotal,2);?></span> </td> 
                    </tr>
                    <tr>
                      <td colspan="2"><strong>Total (&#8377;)</strong></td>
                      <td colspan="3" style="text-align:right"><span id="ftotal"><?php echo number_format($subtotal,2);?></span></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <div class="cart_navigation"> <a class="continue-btn" href="index.php" style="float: left;"><i class="fa fa-arrow-left"> </i>&nbsp; Continue shopping</a> <a class="checkout-btn" href="checkout.php"><i class="fa fa-check"></i> Proceed to checkout</a> </div>
              <?php } ?>
              <form action="index.php">
                <button type="submit" name="btnsubmit" id="btnsubmit" style="display: none;"></button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php include_once("footer.php");?>
<div class="modal fade right" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" style="top: 0px !important;">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document" >
    <div class="modal-content" >
    <div id="xconfrimation_text"></div>
    </div>
  </div>
</div>
<script>
function Pricebasequantity(price,ProductID){
 var total=(price * $('#qty'+ProductID).val());
 $('#total'+ProductID).html(parseInt(total));  
}

function Increment(ProductID,price){
    var result = document.getElementById('qty'+ProductID); 
    var qty = result.value; 
    if( !isNaN( qty )) result.value++;
    $( "#qty"+ProductID ).focus();    
    var total=(price * $('#qty'+ProductID).val());
    $('#total'+ProductID).html(total.toFixed(2));  
    $.ajax({url:'webservice.php?action=CalcualteCartTotal&ProductID='+ProductID+'&qty='+$("#qty"+ProductID).val(),success:function(data){
        var obj = JSON.parse(data);
         
        $("#ftotal").html(obj.subtotal);    
        $("#ttotal").html(obj.subtotal);    
    }});
    return false; 
    
}
function Decrement(ProductID,price){
    var result = document.getElementById('qty'+ProductID); 
    var qty = result.value; 
    if ( !isNaN( qty ) && qty > 1 ) {
         result.value--;
    }
    $( "#qty"+ProductID ).focus();
    var total=(price * $('#qty'+ProductID).val());
    $('#total'+ProductID).html(total.toFixed(2));  
    $.ajax({url:'webservice.php?action=CalcualteCartTotal&ProductID='+ProductID+'&qty='+$("#qty"+ProductID).val(),success:function(data){
        var obj = JSON.parse(data);
       
        $("#ftotal").html(obj.subtotal);    
        $("#ttotal").html(obj.subtotal);    
    }});
    return false; 
}
</script>

