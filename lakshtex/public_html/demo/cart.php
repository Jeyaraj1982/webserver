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
                      <th style="text-align: right;">Unit price</th>
                      <th style="text-align: center;">Qty</th>
                      <th>Total</th>
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
                      <td class="cart_product"><a href="#"><img src="uploads/<?php echo $item['ProductImage'];?>" alt="Product"></a></td>
                      <td class="cart_description"><p class="product-name"><a href="#"><?php echo $item['ProductName'];?><br>Size&nbsp;:&nbsp;<?php echo $item['Size'];?> </a></p>
                        <!--<small><a href="#">Color : Red</a></small>
                        <small><a href="#">Size : M</a></small></td> -->
                      <td class="price" style="text-align: right"><span><?php echo $item['Price'];?></span></td>
                      <td class="qty"><input class="form-control input-sm" type="text" value="<?php echo $item['Qty'];?>"></td>
                      <td class="price" style="text-align:left"><span><?php echo number_format($item['Qty']*$item['Price'],2);?></span></td>
                      <td class="action"><a  onclick="CallConfirmation('<?php echo $item['ProductID'];?>')"><i class="icon-close"></i></a></td>
                    </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="2" rowspan="2"></td>
                      <td colspan="2">Total products (tax incl.)</td>
                      <td colspan="3" style="text-align:left"><?php echo number_format($subtotal,2);?> </td> 
                    </tr>
                    <tr>
                      <td colspan="2"><strong>Total</strong></td>
                      <td colspan="3" style="text-align:left"><?php echo number_format($subtotal,2);?> </td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <div class="cart_navigation"> <a class="continue-btn" href="index.php"><i class="fa fa-arrow-left"> </i>&nbsp; Continue shopping</a> <a class="checkout-btn" href="checkout.php"><i class="fa fa-check"></i> Proceed to checkout</a> </div>
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
