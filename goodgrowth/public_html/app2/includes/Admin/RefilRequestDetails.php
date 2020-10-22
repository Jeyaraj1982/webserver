 <div style="padding:10px;border:1px solid #eee;background:#fff">
 <div class="heading1"><span>Refill Reuqests</span></div>
 <Br>
 <?php

 if (isset($_POST['ApproveBtn'])) {
     $data = $mysql->select("select * from _tbl_Wallet_Requests where md5(concat(TransferTo,WalletRefillRequestID))='".$_GET['Request']."'");
     if ( ($data[0]['IsApproved']==0) && ($data[0]['IsRejected']==0) ) {
         $d = $mysql->select("select * from _tbl_Members where MemberID='".$data[0]['MemberID']."'");
         $particulars = "ReceviedCash/".$d[0]['MemberCode']."/ByRequest";
         $mysql->insert("_tbl_Wallet_Transactions",array("MemberID"=>"1",
                                                         "TxnDate"=>date("Y-m-d H:i:s"),
                                                         "Particulars"=>$particulars,
                                                         "ActualAmount"=>$data[0]['Amount'],
                                                         "CreditAmount"=>$data[0]['Amount'],
                                                         "DebitAmount"=>"0",
                                                         "BalanceAmount"=>getBalance("1")+$data[0]['Amount'],
                                                         "Ledger"=>"10"));
         $ACTransactionID = $mysql->insert("_tbl_Wallet_Transactions",array("MemberID"=>$data[0]['MemberID'],
                                                         "TxnDate"=>date("Y-m-d H:i:s"),
                                                         "Particulars"=>$particulars,
                                                         "ActualAmount"=>$data[0]['Amount'],
                                                         "CreditAmount"=>$data[0]['Amount'],
                                                         "DebitAmount"=>"0",
                                                         "BalanceAmount"=>getBalance($data[0]['MemberID'])+$data[0]['Amount'],
                                                         "Ledger"=>"11"));
         $mysql->execute("update _tbl_Wallet_Requests set ACTransactionID='".$ACTransactionID."', IsApproved='1', ApprovedOn='".date("Y-m-d H:i:s")."'  where md5(concat(TransferTo,WalletRefillRequestID))='".$_GET['Request']."'");
 
                                                       
                $ReceiptID = $mysql->insert("_tbl_Accounts_Receipts", array("MemberID"        => $data[0]['MemberID'],
                                                                            "MemberCode"      => $data[0]['MemberCode'],
                                                                            "ReceiptNo"       => "",
                                                                            "TxnDate"         => date("Y-m-d H:i:s"),
                                                                            "Particulars"     => "For refill wallet ID: ".$Code,
                                                                            "ReceiptAmount"   => $data[0]['Amount'],
                                                                            "TxnID"           => $ACTransactionID,
                                                                            "MemberName"      => $data[0]['FirstName'],
                                                                            "MemberMobileNumber" => $data[0]['MobileNumber'],
                                                                            "MemberEmailID"   => $data[0]['EmailID'],
                                                                            "MemberAddress"   => $data[0]['Address'],
                                                                            "CityName"        => $data[0]['CityName'],
                                                                            "DistrictName"    => $data[0]['DistrictName'],
                                                                            "StateName"       => $data[0][0]['StateName'],
                                                                            "CountryName"     => $data[0]['CountryName'],
                                                                            "PinCode"         => $data[0]['PinCode']));
         
         echo SuccessMsg("Approved"); 
          
          $smstxt= "Dear ".trim($d[0]['FirstName']).", Your wallet updated. Your current Balance Rs. ".number_format((getBalance($data[0]['MemberID'])+$data[0]['Amount']),2)."  -Thanks GoodGrowth";
          //file_get_contents("http://onlinej2j.com/sms.php?Text=".base64_encode($smstxt)."&MobileNumber=".trim($d[0]['MobileNumber']));
          MobileSMS::sendSMS($d[0]['MobileNumber'],$smstxt);    
     } else {
         $d = $mysql->select("select * from _tbl_Members where MemberID='".$data[0]['MemberID']."'");
        echo  ErrorMsg("Error: Already Approved"); 
        $smstxt= "Dear ".trim($d[0]['FirstName']).", Your wallet update request has been rejected. Your current Balance Rs. ".number_format((getBalance($data[0]['MemberID'])+$data[0]['Amount']),2)."  -Thanks GoodGrowth";
         // file_get_contents("http://onlinej2j.com/sms.php?Text=".base64_encode($smstxt)."&MobileNumber=".trim($d[0]['MobileNumber']));
          MobileSMS::sendSMS($d[0]['MobileNumber'],$smstxt);    
     }
 }
 if (isset($_POST['RejectedBtn'])) {
    $mysql->execute("udpate _tbl_Wallet_Requests set  IsRejected='1', RejectedOn='".date("Y-m-d H:i:s")."'  where md5(concat(TransferTo,WalletRefillRequestID))='".$_GET['Request']."'");
         echo SuccessMsg("Rejected");  
 }
    $data = $mysql->select("select * from _tbl_Wallet_Requests where md5(concat(TransferTo,WalletRefillRequestID))='".$_GET['Request']."'");
    $d=$data[0];
 ?>
 <form action="" method="post">
    <input type="hidden" value="<?php echo $d['WalletRefillRequestID'];?>" name="RequestID">
  <table class= "listTable" style="width:100%" cellspacing="0">
    <tr style="background:#eee">
        <td>Req. Date</td>
        <td><?php echo putDate($d['RequestedOn']);?></td>
    </tr>
    <tr>
        <td style="width:120px;">Refill Amount</td>
        <td><?php echo number_format($d['Amount'],2);?>&nbsp;</td>
    </tr>
    <tr>
        <td>Transfer To</td>
        <td><?php echo $d['TransferTo'];?></td>
    </tr>
    <tr>
       <td>Transaction ID</td>
       <td><?php echo $d['TransactionID'];?></td>
    </tr>
      <tr>
       <td>Transaction Mode</td>
       <td><?php echo $d['TransactionMode'];?></td>
    </tr>
    <tr>
        <td>Transfered On</td>
       <td><?php echo putDate($d['TransferedOn']);?></td> 
    </tr>
    <tr>
        <td>Status</td>
        <td>
                  <?php 
                        if ($d['IsApproved']==0 && $d['IsRejected']==0) {
                           ?>
                              <input type="submit" value="Approve" name="ApproveBtn">&nbsp;
                              <input type="submit" value="Reject" name="RejectedBtn">
                           <?php
                        }
                        if ($d['IsApproved']==1 && $d['IsRejected']==0) {
                            echo "Approved";
                        }
                        if ($d['IsApproved']==0 && $d['IsRejected']==1) {
                            echo "Rejected";
                        }
                    ?>
        </td>
    </tr>
       
            
</table>
</form>
 </div> 
 