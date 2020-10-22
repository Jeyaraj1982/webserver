 <div style="padding:10px;border:1px solid #eee;background:#fff">
 <div class="heading1"><span>Manage Wallet</span></div>
 <?php 
   if (isset($_POST['btnRefill'])) {
       $memberInfo=$mysql->select("select * from _tbl_Members where MemberCode='".$_POST['memberdetails']."'")  ;
       $_error="0" ;
       if (sizeof($memberInfo)>0) {
           
       } else {
           $_error="1" ;
           $error_Member="Invalid Member";
       }
       
       if ($_POST['refillAmount']>=3000 && $_POST['refillAmount']<100000){
           
       } else {
          $_error="1" ;
           $error_Amount="Amount must have Min. Rs. 3000 and Max. Rs. 100000"; 
       }
       
       if ($_error == 0) {
             $particulars = "ReceviedCash/".$memberInfo[0]['MemberCode']."/ByAdmin";
             
             $mysql->insert("_tbl_Wallet_Transactions",array("MemberID"      => "1",
                                                             "TxnDate"       => date("Y-m-d H:i:s"),
                                                             "Particulars"   => $particulars,
                                                             "ActualAmount"  => $_POST['refillAmount'],
                                                             "CreditAmount"  => $_POST['refillAmount'],
                                                             "DebitAmount"   => "0",
                                                             "BalanceAmount" => getBalance("1")+$_POST['refillAmount'],
                                                             "Ledger"        => "10"));
                                                                                             
             $ACTransactionID = $mysql->insert("_tbl_Wallet_Transactions",array("MemberID"      => $memberInfo[0]['MemberID'],
                                                                                "TxnDate"       => date("Y-m-d H:i:s"),
                                                                                "Particulars"   => "WalletRefill/".$memberInfo[0]['MemberCode']."/ByAdmin",
                                                                                "ActualAmount"  => $_POST['refillAmount'],
                                                                                "CreditAmount"  => $_POST['refillAmount'],
                                                                                "DebitAmount"   => "0",
                                                                                "BalanceAmount" => getBalance($memberInfo[0]['MemberID'])+$_POST['refillAmount'],
                                                                                "Ledger"        => "11"));
                       
 $ReceiptNo = "RCGG";
             $d  = $mysql->select("select * from _tbl_Accounts_Receipts");
             if (strlen(sizeof($d)+1)==1) {
                 $ReceiptNo .= "0000000".(sizeof($d)+1);
             }
             if (strlen(sizeof($d)+1)==2) {
                 $ReceiptNo .= "000000".(sizeof($d)+1);
             }
             if (strlen(sizeof($d)+1)==3) {
                 $ReceiptNo .= "00000".(sizeof($d)+1);
             }
             if (strlen(sizeof($d)+1)==4) {
                 $ReceiptNo .= "0000".(sizeof($d)+1);
             }
             if (strlen(sizeof($d)+1)==5) {
                 $ReceiptNo .= "000".(sizeof($d)+1);
             }
             if (strlen(sizeof($d)+1)==6) {
                 $ReceiptNo .= "00".(sizeof($d)+1);
             }
             if (strlen(sizeof($d)+1)==7) {
                 $ReceiptNo .= "0". (sizeof($d)+1);
             }
                                                       
                $ReceiptID = $mysql->insert("_tbl_Accounts_Receipts", array("MemberID"        => $memberInfo[0]['MemberID'],
                                                                            "MemberCode"      => $memberInfo[0]['MemberCode'],
                                                                            "ReceiptNo"       => $ReceiptNo,
                                                                            "TxnDate"         => date("Y-m-d H:i:s"),
                                                                            "Particulars"     => "WalletRefill/".$memberInfo[0]['MemberCode']."/ByAdmin",
                                                                            "ReceiptAmount"   => $_POST['refillAmount'],
                                                                            "TxnID"           => $ACTransactionID,
                                                                            "MemberName"      => $memberInfo[0]['FirstName'],
                                                                            "MemberMobileNumber" => $memberInfo[0]['MobileNumber'],
                                                                            "MemberEmailID"   => $memberInfo[0]['EmailID'],
                                                                            "MemberAddress"   => $memberInfo[0]['Address'],
                                                                            "CityName"        => $memberInfo[0]['CityName'],
                                                                            "DistrictName"    => $memberInfo[0]['DistrictName'],
                                                                            "StateName"       => $memberInfo[0][0]['StateName'],
                                                                            "CountryName"     => $memberInfo[0]['CountryName'],
                                                                            "PinCode"         => $memberInfo[0]['PinCode']));
         
         echo SuccessMsg("Wallet has been refilled."); 
         $smstxt= "Dear ".trim($memberInfo[0]['FirstName']).", Your wallet updated. Your current Balance Rs. ".number_format(getBalance($memberInfo[0]['MemberID']),2)."  -Thanks GoodGrowth";
         MobileSMS::sendSMS($memberInfo[0]['MobileNumber'],$smstxt,$memberInfo[0]['MemberID']);  
         unset($_POST);
       }   
       
   }
 ?>
    <form action="" method="post">
    <br><br>
    <div style="padding:20px;background:#f6f6f6">
   <table style="width:100%;">   
        <tr>
            <td colspan="2"><b>Refill Member Wallet</b></td>
        </tr>
        <tr>
            <td style="width:120px">Member Details</td>
            <td><input type="text" name="memberdetails" placeholder="Member Code" value="<?php echo isset($_POST['memberdetails']) ? $_POST['memberdetails'] : '';?>">
                &nbsp;&nbsp;<span style="color:red"><?php echo isset($error_Member) ? $error_Member : "";?></span>
            </td>
        </tr>
        <tr>
            <td>Refill Amount</td>
            <td><input type="text" name="refillAmount" placeholder="Refill Amount" value="<?php echo isset($_POST['refillAmount']) ? $_POST['refillAmount'] : '';?>">
                &nbsp;&nbsp;<span style="color:red"><?php echo isset($error_Amount) ? $error_Amount : "";?></span>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input class="SubmitBtn" type="submit" name="btnRefill"  value="Refill Wallet"></td>
        </tr>
   </table>
   </div>
 </form>
 <br><br><br> 
 <div class="heading1"><span>Refill Reuqests</span></div>
 <Br>
 <?php
    $data = $mysql->select("select * from _tbl_Wallet_Requests where IsApproved='0' and IsRejected='0' order by WalletRefillRequestID desc limit 0,10");
 ?>
  <table class= "listTable" style="width:100%" cellspacing="0">
<tr style="background:#eee">
    <th style="text-align: center;padding:5px;width:90px">Req. Date</th>
    <th style="text-align: left;width:100px;">Refill Amount</th>
    <th style="text-align: left;width:150px">Transfer To</th>
    <th style="text-align: left;width:100px">Transaction ID</th>
    <th style="text-align: left;">TransactionMode</th>
       <th style="text-align: center;padding:5px;width:90px">Transfered On</th>
       <th style="text-align: center;padding:5px;width:50px">Status</th>
       <th style="text-align: center;padding:5px;width:90px">&nbsp;</th>
</tr>
    <?php
        foreach($data as $d) {
            ?>
            <tr>
                <td><?php echo putDate($d['RequestedOn']);?></td>
                <td style="text-align:right"><?php echo number_format($d['Amount'],2);?>&nbsp;</td>
                <td><?php echo $d['TransferTo'];?></td>
                <td><?php echo $d['TransactionID'];?></td>
                <td><?php echo $d['TransactionMode'];?></td>
                <td><?php echo putDate($d['TransferedOn']);?></td>
                <td>
                    <?php 
                        if ($d['IsApproved']==0 && $d['IsRejected']==0) {
                            echo "Pending";
                        }
                        if ($d['IsApproved']==1 && $d['IsRejected']==0) {
                            echo "Approved";
                        }
                        if ($d['IsApproved']==0 && $d['IsRejected']==1) {
                            echo "Rejected";
                        }
                    ?>
                </td>
                <td style="text-align:right">
                     <a href="dashboard.php?action=RefilRequestDetails&Request=<?php echo md5($d['TransferTo'].$d['WalletRefillRequestID']);?>" class="href" >Details</a>
                </td>
            </tr>
            <?php
        }
        if (sizeof($data)==0) {
            ?>
                <tr>
                    <td style="text-align:center" colspan="7">No records found.</td>
                </tr>
            <?php
        }
    ?>
</table>
 </div> 
 <br><br><br>
 
  <div class="heading1"><span>Processed Requests</span></div>
 <Br>
 <?php
    $data = $mysql->select("select * from _tbl_Wallet_Requests where IsApproved<>'0' or IsRejected<>'0' order by WalletRefillRequestID desc limit 0,10");
 ?>
  <table class= "listTable" style="width:100%" cellspacing="0">
<tr style="background:#eee">
    <th style="text-align: center;padding:5px;width:90px">Req. Date</th>
    <th style="text-align: left;width:100px;">Refill Amount</th>
    <th style="text-align: left;width:150px">Transfer To</th>
    <th style="text-align: left;width:100px">Transaction ID</th>
    <th style="text-align: left;">TransactionMode</th>
       <th style="text-align: center;padding:5px;width:90px">Status On</th>
       <th style="text-align: center;padding:5px;width:50px">Status</th>
       <th style="text-align: center;padding:5px;width:90px">&nbsp;</th>
</tr>
    <?php
        foreach($data as $d) {
            ?>
            <tr>
                <td><?php echo putDate($d['RequestedOn']);?></td>
                <td style="text-align:right"><?php echo number_format($d['Amount'],2);?>&nbsp;</td>
                <td><?php echo $d['TransferTo'];?></td>
                <td><?php echo $d['TransactionID'];?></td>
                <td><?php echo $d['TransactionMode'];?></td>
                <td><?php echo putDate($d['TransferedOn']);?></td>
                <td>
                    <?php 
                        if ($d['IsApproved']==0 && $d['IsRejected']==0) {
                            echo "Pending";
                        }
                        if ($d['IsApproved']==1 && $d['IsRejected']==0) {
                            echo "Approved";
                        }
                        if ($d['IsApproved']==0 && $d['IsRejected']==1) {
                            echo "Rejected";
                        }
                    ?>
                </td>
                <td style="text-align:right">
                </td>
            </tr>
            <?php
        }
        if (sizeof($data)==0) {
            ?>
                <tr>
                    <td style="text-align:center" colspan="7">No records found.</td>
                </tr>
            <?php
        }
    ?>
</table>
 </div> 
 