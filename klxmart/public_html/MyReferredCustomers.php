<?php include_once("header.php");?>
<?php
    if (!($_SESSION['User']['CustomerID']>0)) {
         echo "<script>location.href='index.php';</script>";
         exit;
    }
?>
<?php $customers = $mysql->select("select * from _tbl_customer where CreatedBy='".$_SESSION['User']['CustomerID']."' order by CustomerID desc");?>	
<div id="checkout-cart" class="container">
    <ul class="breadcrumb">
        <li><a href="<?php echo WEB_URL;?>/index.php">Home</a></li>
        <li><a href="<?php echo WEB_URL;?>/MyPage.php">Dashboard</a></li>
    </ul>
    <div class="row">
        <div id="content" class="col-sm-12">
            <h1 class="heading">My Referred Customers</h1>
            <?php if(sizeof($customers)==0){ ?>
                <div class="cart-icon" style="text-align: center;width:100%"><i class="icon-basket-loaded icons" style="font-size: 200px"></i></div>    <br>
                No Customer(s) Found<br>
                <div class="cart_navigation"> <a class="continue-btn" href="index.php"> Continue shopping&nbsp; <i class="fa fa-arrow-right"> </i></a></div>
            <?php }else{ ?>
			<form action="" method="post" enctype="multipart/form-data">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
								<th>Joined </th>
                                <th>Customer Name</th>
                                <th>Mobile Number</th>
                                <th>Refer From</th>
                                <th style="text-align: right;">Order Value</th>
								<th style="text-align: right;">Earned</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                  <?php 
                  foreach($customers as $customer) { 
                      ?> 
                    <tr> 
					  <td><?php echo date("M d, Y H:i",strtotime($customer['CreatedOn']));?> 	
                      <td><?php echo $customer['CustomerName'];?></td>
                      <td><?php echo $customer['MobileNumber'];?></td>
                      <td><?php echo $customer['ManualCreate']==0 ? "Url" : "Manual";?></td>
                      <td style="text-align:right;">
                        <?php
                            $order=$mysql->select("select sum(OrderTotal) as OrderTotal, sum(TotalUplevelCommission) as TotalUplevelCommission, sum(TotalUplevelCommissionL2) as TotalUplevelCommissionL2, sum(TotalUplevelCommissionL3) as TotalUplevelCommissionL3 from _tbl_orders where CustomerID='".$customer['CustomerID']."'");
                            echo isset($order[0]['OrderTotal']) ? number_format($order[0]['OrderTotal'],2) : "0.00";
                            echo "<br><span style='font-size:10px;color:#666'>Possible To Earn L1: </span> ";
                            echo isset($order[0]['TotalUplevelCommission']) ? number_format($order[0]['TotalUplevelCommission'],2) : "0.00";
                             echo "<br>";
                             echo "<br><span style='font-size:10px;color:#666'>Possible To Earn L2: </span> ";
                            echo isset($order[0]['TotalUplevelCommissionL2']) ? number_format($order[0]['TotalUplevelCommissionL2'],2) : "0.00";
                             echo "<br>";
                             echo "<br><span style='font-size:10px;color:#666'>Possible To Earn L3: </span> ";
                            echo isset($order[0]['TotalUplevelCommissionL3']) ? number_format($order[0]['TotalUplevelCommissionL3'],2) : "0.00";
                        ?>
                      </td>
                       <td style="text-align:right;">
                        <?php
                            $order=$mysql->select("select sum(TotalUplevelCommission) as TotalUplevelCommission, sum(TotalUplevelCommissionL2) as TotalUplevelCommissionL2, sum(TotalUplevelCommissionL3) as TotalUplevelCommissionL3 from _tbl_orders where InvoiceID>0 and CustomerID='".$customer['CustomerID']."'");
                            echo isset($order[0]['TotalUplevelCommission']) ? number_format($order[0]['TotalUplevelCommission'],2) : "0.00";
                            echo "<br>";
                            echo isset($order[0]['TotalUplevelCommission']) ? number_format($order[0]['TotalUplevelCommissionL2'],2) : "0.00";
                            echo "<br>";
                            echo isset($order[0]['TotalUplevelCommission']) ? number_format($order[0]['TotalUplevelCommissionL3'],2) : "0.00";
                        ?>
                      </td>
                      <td style="text-align: right;"><a class="btn btn-success btn-sm" href="MyCustomersOrders.php?Customer=<?php echo md5("Jeyaraj".$customer['CustomerID']);?>">View</a></td>
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
