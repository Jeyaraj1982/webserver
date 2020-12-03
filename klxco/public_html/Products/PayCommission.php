<?php
include_once("header.php");
include_once("LeftMenu.php");  
$display=true;
if (isset($_POST['adComm'])) {
       //$q = $mysql->select("select * from _tbl_share_products_link where Link='".$_POST['Link']."'");
        $customer = $mysql->select("select * from _jusertable where mobile='".$_POST['CustomerMobileNumber']."'");
       if (sizeof($customer)>0) {
          
           $display=false;
           $bal = $mysql->select("select (sum(Credits)-sum(Debits)) as bal from _tbl_share_products_earning where UserID='".$customer[0]['userid']."'");
                        $balance = isset($bal[0]['bal']) ?  $bal[0]['bal'] : 0;
         
         ?>
         <div class="main-panel">
            <div class="container">
                <div class="page-inner">  
            <div class="row">                                                     
                 
            
               <div class="col-md-6">
                      <div class="card"> 
                        <div class="card-body">
                          <br><br>
                                    Contact Details<br><br>
                                    <div style="border:1px dashed #ccc;padding:10px;text-align:center;color:#222;background:#f2efd7">
                                    
                                    <?php echo $customer[0]['useid'];?>,<br>
                                    <?php echo $customer[0]['personname'];?>,<br>
                                    <?php echo $customer[0]['mobile'];?>,<br>
                                    <?php echo $customer[0]['email'];?>,<br>
                                    Available Balance <br>
                                    <?php echo number_format($balance,2);?>
                        </div>
                      </div>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                <?php
                    if (isset($_POST['Amount'])) {
                        
                        $bal = $mysql->select("select (sum(Credits)-sum(Debits)) as bal from _tbl_share_products_earning where UserID='".$customer[0]['userid']."'");
                        $balance = isset($bal[0]['bal']) ?  $bal[0]['bal'] : 0;
                        
                        $mysql->insert("_tbl_share_products_earning",array("TxnDate"=>date("Y-m-d H:i:s"),
                                                                           "UserID"=> $customer[0]['userid'],
                                                                           "ProductID"=> "0",
                                                                           "ShareLinkID"=> "0",
                                                                           "Particular"=> $_POST["Details"],
                                                                           "Credits"=> "0",
                                                                           "Debits"=> $_POST['Amount'],
                                                                           "Balance"=> $balance-$_POST['Amount']));
                           echo "Payment Updated";
                    }  else {
                        if ($balance>0) {
                ?>
                    <form action="" method="post">
                      <input type="hidden"  id="CustomerMobileNumber" name="CustomerMobileNumber" value="<?php echo $customer[0]['mobile'];?>" aria-describedby="basic-addon3">
                      <br>
                      Amount:<br>
                      <input type="text" class="form-control" name="Amount" id="Amount" required="required"> 
                      <br>
                      Details:<br>
                      <input type="text" class="form-control" name="Details" id="Details" required="required"> 
                        <button class="btn btn-warning" type="submit" name="adComm" >Update Payment Info</button>&nbsp;
                    </form>
                    <?php }  } ?>
                    <br><br><a href="dashboard.php?action=Products/list&status=All" class="btn btn-warning">Back</a>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12">
                <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Earnings</h4>
                </div>
                <div class="card-body">
                    <div class="row row-projects">
                      <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">Txn Date</th>
                                                <th scope="col">Particulars</th>
                                                <th scope="col" style="text-align: right;">Credits</th>                                   
                                                <th scope="col" style="text-align: right;">Debits</th>                                   
                                                <th scope="col" style="text-align: right;">Balance</th>                                   
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <?php 
                                        $products = $mysql->select("select * from _tbl_share_products_earning where UserID='".$customer[0]['userid']."' order by EarningID desc");
                                        foreach($products as $product){ 
                                             
                                            ?>
                                            <tr>
                                                <td><?php echo $product['TxnDate'];?></td>
                                                <td><?php echo $product['Particular'];?></td>
                                                <td style="text-align:right"><?php echo number_format($product['Credits'],2);?></td>
                                                <td style="text-align:right"><?php echo number_format($product['Debits'],2);?></td>
                                                <td style="text-align:right"><?php echo number_format($product['Balance'],2);?></td>
                                            </tr>
                                        <?php } if(sizeof($products)=="0"){ ?>
                                            <tr>
                                                <td style="text-align: center;" colspan="5">No Products found</td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                            </div>
                    </div>
                </div>
            </div>
                </div>
            </div>
         </div>
         </div>
         </div>
        
        
        
        
        
            
         <?php
               
            
       }   else {
         $error="Customer not found";
            $display=true;
       }
}

 
   if ($display) {
?>
     
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">                                                       
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Pay Commission</div>
                                    <?php echo $error;?>
                                </div>
                                <form   method="POST" action=""  enctype="multipart/form-data">
                                    <div class="card-body">
                                    
                                    <label for="basic-url">User ID<br></label>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon3">+91</span>
  </div>
  <input type="text" class="form-control" id="CustomerMobileNumber" name="CustomerMobileNumber" aria-describedby="basic-addon3">
</div>


                                       
                                         
                                    </div>   
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-warning" type="submit" name="adComm" >Pay Commission</button>&nbsp;
                                                <a href="dashboard.php?action=Products/list&status=All" class="btn btn-warning btn-border">Back</a>
                                            </div>                                        
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

  
    <?php } ?>

  
          