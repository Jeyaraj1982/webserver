<?php include_once("header.php");?>
<?php $Invoices = $mysql->select("select * from tbl_invoice where CustomerID='".$_SESSION['User']['CustomerID']."' order by InvoiceID desc");?>	
<section class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
        <div class="cart">
          <div class="page-content page-order"><div class="page-title">
            <h2>My Invoices</h2>
          </div>
            <div class="order-detail-content" style="text-align: center;">
            <?php if(sizeof($Invoices)==0){ ?>
                <div class="cart-icon" style="text-align: center;width:100%"><i class="icon-basket-loaded icons" style="font-size: 200px"></i></div>    <br>
                No Invoices Found<br>
                <div class="cart_navigation"> <a class="continue-btn" href="index.php"> Continue shopping&nbsp; <i class="fa fa-arrow-right"> </i></a></div>
            <?php }else{ ?>
              <div class="table-responsive">
                <table class="table table-bordered cart_summary">
                  <thead>
                    <tr>
                      <th>Invoice ID</th>
                      <th>Invoice Date</th>
                      <th>Order ID</th>
                      <th style="text-align:right">Invoice Value (&#8377;)</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                  foreach($Invoices as $invoice) { 
				   
                      ?> 
                    <tr> 
					  <td><?php echo $invoice['InvoiceCode'];?> 	
                      <td><?php echo date("M d, Y H:i",strtotime($invoice['InvoiceDate']));?>    
                      <td><?php echo $invoice['OrderCode'];?>  
                      <td class="price" style="text-align:right"><span><?php echo number_format($invoice['InvoiceTotal'],2);?></span></td>
                      
                      <td><a href="viewinvoice.php?id=<?php echo $invoice['InvoiceCode'];?>">view</td>
                    </tr>
                  <?php } ?>
                  </tbody>
                  
                </table>
              </div>
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

