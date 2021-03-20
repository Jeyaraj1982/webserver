<?php include_once("header.php");?>
<div id="account-login" class="container">
	<ul class="breadcrumb">
		<li><a href="<?php echo WEB_URL;?>/index.php">Home</a></li>
		<li><a href="<?php echo WEB_URL;?>/MyProfile.php">Dashboard</a></li>
	</ul>
    <div class="row">
        <div id="content" class="col-md-9 col-sm-8 col-xs-12">
			<div class="row">
				<div class="col-md-12 col-xs-12">
					<div >
						    <h1 class="heading">Dashboard</h1>
                        <div class="form-group row">
                            <label class="col-sm-9" style="font-weight:bold">Dear <?php echo $_SESSION['User']['CustomerName'];?></label>
                            
                        </div>
                        <!--
						<div class="form-group row">
							<label class="col-sm-4" style="font-weight:bold">My Referal Code</label>
							<label class="col-sm-7">:&nbsp;<?php echo $_SESSION['User']['Referral'];?></label>
						</div>
                        <div class="form-group row">
                            <label class="col-sm-4" style="font-weight:bold">Referred Customers</label>
                            <label class="col-sm-7">:&nbsp;<?php echo sizeof($mysql->select("select * from _tbl_customer where CreatedBy='".$_SESSION['User']['CustomerID']."'"));?> 
                            (<a href="MyReferredCustomers.php"  style="text-decoration: underline;">view</a>)&nbsp;
                            (<a href="AddCustomers.php" style="text-decoration: underline;">Add Customer</a>)
                            </label>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4" style="font-weight:bold">Total Earnings</label>
                            <label class="col-sm-7">:&nbsp;Rs. <?php echo number_format(Wallet::getTotalCredits($_SESSION['User']['CustomerID']),2);?></label>
                        </div>                         
                        <div class="form-group row">
                            <label class="col-sm-4" style="font-weight:bold">Available Balance</label>
                            <label class="col-sm-7">:&nbsp;Rs. <?php echo number_format(Wallet::getBalance($_SESSION['User']['CustomerID']),2);?>
                             (<a href="MyAccountSummary.php"  style="text-decoration: underline;">view</a>)&nbsp;
                            </label>
                        </div>						 
                        <div class="form-group row">
                            <label class="col-sm-4" style="font-weight:bold">Member Bank Account</label>
                            <label class="col-sm-7">: 
                                <?php
                                    $bankaccount = $mysql->select("select * from _tbl_customer_bankinformations where CustomerID='".$_SESSION['User']['CustomerID']."'");
                                    if (sizeof($bankaccount)==0) {
                                        ?>
                                        <a href="MyBankInformation.php"  style="text-decoration: underline;">Add Your Bank Information</a>
                                        <?php
                                    }  else {
                                        echo $bankaccount[0]['BankAccountName'].", A/c No: ".$bankaccount[0]['BankAccountNumber'].", IFSCode: ".$bankaccount[0]['IFSCode'];
                                    }
                                ?>
                            
                            </label>
                        </div> 
                                        

						<button type="button" class="btn btn-primary" onclick="location.href='index.php'">Back</button>
                           -->     
					</div>
				</div> 
			</div>   
            
     <?php $Orders = $mysql->select("select * from _tbl_orders where CustomerID='".$_SESSION['User']['CustomerID']."' order by OrderID desc limit 0,5");?>           
            <div class="row">
        <div id="content" class="col-sm-12">
            <h1 class="heading">My Recnet Orders</h1>
            <?php if(sizeof($Orders)==0){ ?>
                <div class="cart-icon" style="text-align: center;width:100%"><i class="icon-basket-loaded icons" style="font-size: 200px"></i></div>    <br>
                No Orders Found<br>
                <div class="cart_navigation"> <a class="continue-btn" href="index.php"> Continue shopping&nbsp; <i class="fa fa-arrow-right"> </i></a></div>
            <?php }else{ ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Order Date</th>
                                <th style="text-align:right">Order Value (&#8377;)</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                  <?php 
                  foreach($Orders as $order) { 
                     $items = $mysql->select("select * from _tbl_orders_itmes where OrderID='".$order['OrderID']."'");
                      ?> 
                    <tr> 
                      <td><?php echo $order['OrderCode'];?>     
                      <td><?php echo date("M d, Y H:i",strtotime($order['OrderDate']));?>     
                      <td class="price" style="text-align:right"><span><?php echo number_format($order['OrderTotal'],2);?></span></td>
                      <td>
                        <?php     if($order['OrderStatus']=="1"){
                                    echo "Order Placed";
                                }if($order['OrderStatus']=="2"){
                                    echo "Confirmed";
                                }if($order['OrderStatus']=="3"){
                                    echo "Cancel";
                                }if($order['OrderStatus']=="4"){
                                    echo "Processing";
                                }if($order['OrderStatus']=="5"){
                                    echo "Dispatched";
                                }if($order['OrderStatus']=="6"){
                                    echo "Delivered";
                                } 
                         ?>    
                      </td>
                      <td style="text-align:right"><a class="btn btn-primary btn-sm theme-menu-background" href="MyOrderView.php?Order=<?php echo md5("Jeyaraj".$order['OrderCode']);?>">view</td>
                    </tr>
                  <?php } ?>
                  </tbody>
                    </table>
                </div>
            </form>
           
          
        <?php } ?>
        </div>
    </div>                                  
		</div>  
	</div>
</div>
<?php include_once("footer.php");?>
