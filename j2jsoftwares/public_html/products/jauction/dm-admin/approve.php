<h3 style="font-family:arial">Wallet Requests</h3>
<?php
 include_once("config.php");
  
 if (isset($_POST['btnApprove'])) {
     $products = $mysql->select("select * from `_walletupdaterequests` where isapproved=0 and isrejected=0 and  id=".$_REQUEST['id']." order by id desc");
     if (sizeof($products)==1) {
         $d = new DealMaass();
         $d->userid = $products[0]['userid'];
         
     $mysql->insert("_acc_txn", array("userid"=>$products[0]['userid'],
                                      "txndate"=>date("Y-m-d H:i:s"),
                                      "particulars"=>"Wallet Update/".$_REQUEST['id'],
                                      "cramount"=>$products[0]['amount'],
                                      "dramount"=>"0",
                                      "transactionid"=>$_REQUEST['id'],
                                      "abalance"=>$d->getBalance()  + $products[0]['amount'],
                                      "paymentstatus"=>"SUCCESS"));
                                      
     echo "Approved Successfully";
     $mysql->execute("update _walletupdaterequests set isapproved=1,approvedon='".date("Y-m-d H:i:s")."' where id=".$_REQUEST['id']);
 } else {
     echo "error";
     
 }
 }
  if (isset($_POST['btnReject'])) {
     $products = $mysql->select("select * from `_walletupdaterequests` where isapproved=0 and isrejected=0 and  id=".$_REQUEST['id']." order by id desc");
     if (sizeof($products)==1) {
      
     $mysql->execute("update _walletupdaterequests set isrejected=1,rejectedon='".date("Y-m-d H:i:s")."' where id=".$_REQUEST['id']);
 } else {
     echo "error";
     
 }
 }
 $products = $mysql->select("select * from `_walletupdaterequests` where    id=".$_REQUEST['id']." order by id desc");
 if ($products[0]['isapproved']==0 && $products[0]['isrejected']==0) {
?>
<form action="" method="post">
    <table cellpadding="3" cellspacing="4" border="1" style="font-size:12px;font-family:arial;" width="100%">
        <tr style="background:#666;font-weight:bold;text-align: center;color:#FFFFFF">
            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">Requested</td>   
            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">User ID</td>
            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">Currency</td>
            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">Amount</td>
            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">Remarks</td>
            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">Action</td>
        </tr>
        <?php  foreach($products as $p ) { ?>
        <tr>  
            <td style="padding-left:5px;padding-right:5px;"><?php echo $p['requestedon'];?></td>
            <td style="padding-left:5px;padding-right:5px;"><?php echo $p['userid'];?></td>
            <td style="padding-left:5px;padding-right:5px;"><?php echo $p['currency'];?></td>
            <td style="padding-left:5px;padding-right:5px;"><?php echo $p['amount'];?></td>
            <td style="padding-left:5px;padding-right:5px;"><?php echo $p['details'];?></td>
            <td style="padding-left:5px;padding-right:5px;text-align:center"></td>
        </tr>        
        <?php } ?>
    </table>
    <input type="submit" value="Approve" name="btnApprove">
    <input type="submit" value="Reject" name="btnReject">
</form>    
    <?php } else { ?>
    
     <table cellpadding="3" cellspacing="4" border="1" style="font-size:12px;font-family:arial;" width="100%">
        <tr style="background:#666;font-weight:bold;text-align: center;color:#FFFFFF">
            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">Requested</td>   
            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">User ID</td>
            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">Currency</td>
            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">Amount</td>
            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">Remarks</td>
            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">Action</td>
        </tr>
        <?php  foreach($products as $p ) { ?>
        <tr>  
            <td style="padding-left:5px;padding-right:5px;"><?php echo $p['requestedon'];?></td>
            <td style="padding-left:5px;padding-right:5px;"><?php echo $p['userid'];?></td>
            <td style="padding-left:5px;padding-right:5px;"><?php echo $p['currency'];?></td>
            <td style="padding-left:5px;padding-right:5px;"><?php echo $p['amount'];?></td>
            <td style="padding-left:5px;padding-right:5px;"><?php echo $p['details'];?></td>
            <td style="padding-left:5px;padding-right:5px;text-align:center"><?php echo ($p['isapproved']==1) ? "Approved on ".$p['approvedon'] : "Rejected On ".$p['rejectedon']; ?></td>
        </tr>     
    <?php } ?>
<?php } ?>
   