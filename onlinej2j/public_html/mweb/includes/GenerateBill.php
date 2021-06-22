<?php



if (isset($_POST['submitRequest'])) {
    //_tbl_bills
    
    $summary = $mysql->select("select * from `_tbl_transactions` where md5(concat(`txnid`,'mmm_j2j'))='".$_GET['txn']."' ");
    $mysql->insert("_tbl_bills",array("CustomerName"=>$_POST['CustomerName'],
                                      "CustomerMobileNumber"=>$_POST['CustomerMobileNumber'],
                                      "CustomerEmail"=>$_POST['CustomerEmail'],
                                      "CustomerAddress"=>$_POST['CustomerAddress'],
                                      "TxnID"=>$summary[0]['txnid'],
                                      "BillGeneratedOn"=>date("Y-m-d H:i:s")));
    $mysql->execute("update _tbl_transactions set CustomerBillGenerated='1' where md5(concat(`txnid`,'mmm_j2j'))='".$_GET['txn']."' ");
}
    $summary = $mysql->select("select * from `_tbl_transactions` where md5(concat(`txnid`,'mmm_j2j'))='".$_GET['txn']."' ");
    $opt = $mysql->select("select * from _tbl_operators where OperatorCode='".$summary[0]['operatorcode']."'");
?>
<div style="padding:0px;text-align:center;margin-bottom:20px;">
    <h5>Print Bill</h5>
</div> 
    <?php if ($summary[0]['CustomerBillGenerated']==0) {?> 
        <div class="row">
            <form action="" method="post" style="width: 80%;margin: 0px auto;">
            <table>
    <tr>
        <td>Txn Date</td>
        <td>:&nbsp;<?php echo $summary[0]['txndate'];?></td>
    </tr>
     <tr>
        <td>Transaction Ref.Number</td>
        <td>:&nbsp;#<?php echo "TKSD_".$summary[0]['txnid'];?></td>
    </tr>
    
     <tr>
        <td>Operator Number</td>
        <td>:&nbsp;<?php echo $summary[0]['rcnumber'];?></td>
    </tr>
    
       <tr>
        <td>Operator Name</td>
        <td>:&nbsp;<?php echo $opt[0]['OperatorName'];?></td>
    </tr>
    
       <tr>
        <td>
        
        
        Amount</td>
        <td>:&nbsp;<?php echo number_format($summary[0]['rcamount'],2);?></td>
    </tr>
    
       <tr>
        <td>Operator Bill/Ref Number</td>
        <td>:&nbsp;<?php echo $summary[0]['OperatorNumber'];?></td>
    </tr>
       <tr>
        <td>Operator Bill/Ref Date</td>
        <td>:&nbsp;<?php echo $summary[0]['OperatorDate'];?></td>
    </tr>
    
 </table>
 <br><Br>
 
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Customer Name<span style="color:red">*</span></label>
                    <input type="text"  value="" required class="form-control" name="CustomerName" placeholder="Customer Name" >
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Mobile Number<span style="color:red">*</span></label>
                    <input type="text"  value="" name="CustomerMobileNumber" class="form-control"  required  placeholder="Customer MobileNumber" >
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Email</label>
                    <input type="text"  value="" name="CustomerEmail" class="form-control" placeholder="Customer Email"  >
                </div> 
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Address</label>
                    <input type="text"  value="Address" name="CustomerAddress" class="form-control" placeholder="Customer Address"  >
                </div>
             
                <div class="form-group">
                <button type="submit" name="submitRequest" class="btn btn-success  glow w-100 position-relative">Save & Print Bill</button><br><br>
                <a href="dashboard.php" class="btn btn-outline-success glow w-100 position-relative">Back<i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;"></i></a><br><br>
                </div>
            </form>         
        </div>           
    <?php } else { 
        $customer = $mysql->select("select * from _tbl_bills where TxnID='".$summary[0]['txnid']."'");
        ?>
        <div class="row">
            <div class="col-sm-12">
            <table style="margin:0px auto" align="center">
    <tr>
        <td style="width:200px">Txn Date</td>
        <td>:&nbsp;<?php echo $summary[0]['txndate'];?></td>
    </tr>
     <tr>
        <td>Transaction Ref.Number</td>
        <td>:&nbsp;#<?php echo "TKSD_".$summary[0]['txnid'];?></td>
    </tr>
    
    
     <tr>
        <td style="vertical-align:top;">Customer Details</td>
        <td style="vertical-align:top;">:&nbsp;
            <?php echo $customer[0]['CustomerName'];?><br>
            <?php if (strlen(trim($customer[0]['CustomerAddress']))>0) {?>
                &nbsp;&nbsp;<?php echo $customer[0]['CustomerAddress'];?><br>
            <?php } ?>
            
             <?php if (strlen(trim($customer[0]['CustomerMobileNumber']))>0) {?>
                &nbsp;&nbsp;Mobile:&nbsp;<?php echo $customer[0]['CustomerMobileNumber'];?><br>
            <?php } ?>
            
              <?php if (strlen(trim($customer[0]['CustomerEmail']))>0) {?>
                &nbsp;&nbsp;Email:&nbsp;<?php echo $customer[0]['CustomerEmail'];?><br>
            <?php } ?>
            
            
            
        
        </td>
    </tr>
    
        <tr>
        <td>Operator Name</td>
        <td>:&nbsp;<?php echo $opt[0]['OperatorName'];?></td>
    </tr>
     <tr>
        <td>Operator Type</td>
        <td>:&nbsp;<?php echo $opt[0]['OperatorTypeCode'];?></td>
    </tr>

     <tr>
        <td>Number</td>
        <td>:&nbsp;<?php echo $summary[0]['rcnumber'];?></td>
    </tr>
    
    
    
      
        
    <tr>
        <td>    
        Amount</td>
        <td>:&nbsp;<?php echo number_format($summary[0]['rcamount'],2);?></td>
    </tr>
    
       <tr>
        <td>Operator Bill/Ref Number</td>
        <td>:&nbsp;<?php echo $summary[0]['OperatorNumber'];?></td>
    </tr>
       <tr>
        <td>Operator Bill/Ref Date</td>
        <td>:&nbsp;<?php echo $summary[0]['OperatorDate'];?></td>
    </tr>
    <tr>
        <td style="text-align: center;padding:20px;" colspan="2">
        <?php
            echo "<a href='print.php?print=".md5($summary[0]['txnid'].'mmm_j2j')."' target='_new' style='color:#ccc;background:orange;color:#fff;padding:5px 10px;border:1px solid #ccc;border-radius:5px'>Print Bill</a></div>";
        ?>
        </td>
    </tr>
 </table>
            
            </div>
        
        </div>
    <?php } ?>
    