<?php include_once("header.php");?>
<?php
    if (!($_SESSION['User']['CustomerID']>0)) {
         echo "<script>location.href='index.php';</script>";
         exit;
    }
?>
<?php $Transactions = $mysql->select("select * from _tbl_wallet where CustomerID='".$_SESSION['User']['CustomerID']."' order by WalletID desc");?>	
 
<div id="checkout-cart" class="container">
    <ul class="breadcrumb">
        <li><a href="<?php echo WEB_URL;?>/index.php">Home</a></li>
        <li><a href="<?php echo WEB_URL;?>/MyPage.php">Dashboard</a></li>
    </ul>
    <div class="row">
        <div id="content" class="col-sm-12">
            <h1 class="heading">Account Summary</h1>
            <?php if(sizeof($Transactions)==0){ ?>
                <div class="cart-icon" style="text-align: center;width:100%"><i class="icon-basket-loaded icons" style="font-size: 200px"></i></div>    <br>
                No Transaction(s) Found<br>
                <div class="cart_navigation"> <a class="continue-btn" href="index.php"> Continue shopping&nbsp; <i class="fa fa-arrow-right"> </i></a></div>
            <?php }else{ ?>
			<form action="" method="post" enctype="multipart/form-data">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
								<th>Txn On </th>
                                <th>Particulars</th>
                                <th style="text-align: right;">Credit</th>
                                <th style="text-align: right;">Debit</th>
								<th style="text-align: right;">Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                  <?php 
                  foreach($Transactions as $Transaction) { 
                      ?> 
                    <tr> 
					  <td><?php echo date("M d, Y H:i",strtotime($Transaction['TxnDate']));?> 	
                      <td><?php echo $Transaction['Particulars'];?></td>
                      <td style="text-align:right;"> <?php echo number_format($Transaction['Credit'],2);?></td>
                      <td style="text-align:right;"> <?php echo number_format($Transaction['Debit'],2);?></td>
                      <td style="text-align:right;"> <?php echo number_format($Transaction['Balance'],2);?></td>
                    </tr>
                  <?php } ?>
                  </tbody>
                    </table>
                </div>
            </form>
           
            <div class="buttons clearfix">
                <div class="pull-left"><a href="<?php echo WEB_URL;?>/MyPage.php" class="btn btn-default">Back</a></div>
               
            </div>
        <?php } ?>
		</div>
    </div>
</div>
<?php include_once("footer.php");?>
