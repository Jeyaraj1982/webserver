<?php
    if (isset($_POST['refillBtn'])) {
        
         if (!($application->getBalance($_SESSION['User']['MemberID'])>=$_POST['Amount'])) {
            $error++;
            $result['status']="failure";
            $result['message']="insufficant balance";
        }
        
        if ($_POST['Amount']<1000) {
            $error++;
            $result['status']="failure";
            $result['message']="amount should be greater than 1000";
        }
        
        
         $summary = $mysql->select("select * from `_tbl_member` where `MapedTo`='".$_SESSION['User']['MemberID']."' and `IsActive`='1' and MemberID='".$_POST['MemberCode']."' order by MemberID desc");
        if (sizeof($summary)==0) {
              $error++;
            $result['status']="failure";
            $result['message']="Agent not found";
        }
        
        if ($error==0) {
            
             $particulars = 'Refill Wallet/Distributor: '.$_SESSION['User']['MemberName'].' ('.$_SESSION['User']['MobileNumber'].') /Agent: '.$summary[0]['MemberName'].' ('.$summary[0]['MobileNumber'].')';
            $balance = $application->getBalance($_SESSION['User']['MemberID'])-$_POST['Amount'];
            $id=$mysql->insert("_tbl_accounts",array("MemberID"    => $_SESSION['User']['MemberID'],
                                                     "Particulars" => $particulars,                    
                                                     "Credit"      => "0",                    
                                                     "Debit"       => $_POST['Amount'], 
                                                     "Balance"     => $balance,                   
                                                     "Voucher"     => "101",                    
                                                     "TxnDate"     => date("Y-m-d H:i:s")));

            $com = $_POST['Amount'] * (0.50/100);

            $xid=$mysql->insert("_tbl_accounts",array("MemberID"    => $_SESSION['User']['MemberID'],
                                                     "Particulars" => 'Bonus Commission/FromAdmin Wallet Transfer',                    
                                                     "Credit"      => $com,                    
                                                     "Debit"       => "0", 
                                                     "Balance"     => $balance+$com,                   
                                                     "Voucher"     => "-2",                    
                                                     "TxnDate"     => date("Y-m-d H:i:s")));
                                                    
            $balance = $application->getBalance($summary[0]['MemberID'])+$_POST['Amount'];
            $id=$mysql->insert("_tbl_accounts",array("MemberID"    => $summary[0]['MemberID'],
                                                     "Particulars" => $particulars,                    
                                                     "Credit"      => $_POST['Amount'],                    
                                                     "Debit"       => "0", 
                                                     "Balance"     => $balance,                   
                                                     "Voucher"     => "102",                    
                                                     "TxnDate"     => date("Y-m-d H:i:s")));
                                                     
            if (isset($_POST['markascredit']) && $_POST['markascredit']=="on") {
               $credit_note = $mysql->insert("_tbl_user_credits",array("MemberID"       =>$_SESSION['User']['MemberID'],
                                                                       "NickName"       =>$_POST['credit_nickname'],
                                                                       "TxnAmount"      =>$_POST['Amount'],
                                                                       "CreditUpdated"  =>date("Y-m-d H:i:s"),
                                                                       "Amount"         =>$_POST['CrAmount'],
                                                                       "PayableAmount"  =>$_POST['CrAmount'],
                                                                       "summary"        =>$particulars,
                                                                       //"txnid"          =>$txnid,
                                                                       "IsPaid"          =>"0"));
           }
                                                     
          //   MobileSMS::sendSMS($summary[0]['MobileNumber'],"Your wallet has credited Rs. ".$_POST['Amount'].". Wallet Balance Rs.".number_format($balance,2),$summary[0]['MemberID']);
          if ($summary[0]['TelegramID']>0)  {
              $message = "Dear ".$summary[0]['MemberName'].", Your wallet has been credited Rs. ".$_POST['Amount'].". Wallet Balance Rs.".number_format($balance,2);
              TelegramMessageController::sendSMS($summary[0]['TelegramID'],$message,0,0);
            
            if (isset($_POST['CrAmount']) && $_POST['CrAmount']>0) {
                $message = "Dear ".$member[0]['MemberName'].",  please trasfer your outstanding balance Rs. ".$_POST['CrAmount']." shortly. ";  //" Transaction ID: ".$credit_note;
                TelegramMessageController::sendSMS($summary[0]['TelegramID'],$message,0,0);
            }
          }
                                      
            ?>     
             <div class="modal fade" id="Resposne_success_Popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div style="text-align: center;padding:20px;">
                            <img src="assets/img/success.png" style="width: 128px;"><br><br>
                            Amount Transfered</div>
                            <a href="javascript:void(0)" data-dismiss="modal" class="btn btn-success glow w-100 position-relative">OK</a>
                        </div>
                    </div>
                </div>
             </div>
            <script>
                $( document ).ready(function() {
   $('#Resposne_success_Popup').modal("show");
});
            </script>
        <?php } else { ?>
              <div class="modal fade" id="Resposne_failure_Popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div style="text-align: center;padding:20px;">
                            <img src="assets/img/failure.png" style="width: 128px;"><br><br>
                            Transaction failed<Br>
                            <?php echo $result['message'];?>
                            </div>
                            <a href="javascript:void(0)" data-dismiss="modal" class="btn btn-success glow w-100 position-relative">OK</a>
                        </div>
                    </div>
                </div>
             </div>
            <script>
                $( document ).ready(function() {
   $('#Resposne_failure_Popup').modal("show");
});
</script>
            <?php
        }
    }
?>
  <style>
       .btn-light{border:1px solid #ccc !important}
       </style> 
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
    
    
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>-->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    
<?php
    $summary = $mysql->select("select * from `_tbl_member` where `MapedTo`='".$_SESSION['User']['MemberID']."' and `IsMember`='1' and `IsActive`='1' order by MemberName ");
?>
<h3 style="text-align: center;padding:10px;"><?php echo $optttitle;?>My Agents</h3>
<?php if ($_SESSION['User']['IsDistributor']=="1") { ?>
<!--<table class="table table-striped ">
    <tr>
        <td>Agent Names</td>
    </tr>
    <?php foreach($summary as $s) { ?>
        <tr>
            <td style="font-size:12px;">
            <span style="color:#222"><?php echo strtoupper($s['MemberName']);?></span><Br> 
            <?php echo $s['MobileNumber'];?><Br> 
            Balance: Rs. <?php echo number_format($application->getBalance($s['MemberID']),2);  ?><br><br>
            <a href="dashboard.php?action=agents_refill&agent=<?php echo $s['MemberID'];?>" class="btn btn-success  glow position-relative" style="width: 100px !important;">Refill</a>
            </td>
        </tr>
        <?php
    }
    ?>
    
</table> -->

<form method="post" action="">
                   
                    <div class="row mb15">
                        <div class="col-md-12 col-xs-6 b-r">
                            <strong>Super Agent / Agent Mobile Number</strong>
                            <br>
                            <!--<input type="text" name="MemberCode" id="MemberCode" class="form-control" value="<?php echo isset($_POST['MemberCode']) ? $_POST['MemberCode'] : "";?>">-->
                             <select name="MemberCode" id="MemberCode" class="form-control  " style="border:1px solid #555" data-live-search="true">
                             <option value="0">Slect Agent</option>
     
                                                                                               
    <?php  
    foreach($summary as $a) {
        $MemNameMob = $a['MemberName']." (".$a['MobileNumber'].") ";
         
        ?>
             <option value="<?php echo $a['MemberID'];?>"><?php echo substr($MemNameMob,0,30).(strlen($MemNameMob)>30 ? "..." : "");?>
            
             </option>           
        <?php
    }                                                         
    ?>
    
  </select>
                        </div>
                    </div>
                    <br><br>
                    <div class="row mb15"> 
                        <div class="col-md-12 col-xs-6 b-r"> 
                            <strong>Transfer Amount</strong>
                            <br>
                            <input type="text" name="Amount" id="Amount"  class="form-control" value="<?php echo isset($_POST['Amount']) ? $_POST['Amount'] : "";?>" >
                        </div>
                    </div>  
                    <br> 
                    <div class="form-group">
                      <div class="checkbox checkbox-success checkbox-inline">
                        <input type="checkbox" class="checkbox-primary" onclick="do_markascredit()" name="markascredit" id="markascredit">
                        <label for="markascredit">Mark as credit</label>
                      </div>
                      <input type="text" class="form-control" value="" name="credit_nickname" id="credit_nickname" placeholder="Nick Name" style="display: none;margin-top:10px;">
                      <input type="number" class="form-control" value="" name="CrAmount" id="CrAmount" placeholder="Credit Amount" style="display: none;margin-top:10px;">
                    </div>
                    <br><br>        
                    <div class="row mb15">
                        <div class="col-md-4 col-xs-6 b-r">
                            <button type="submit" name="refillBtn" id="refillBtn" class="btn btn-primary" >Refill</button>
                        </div>
                    </div>
                </form>
<?php } else { ?>
<div class="row">
    <div style="padding:20px;color:red;text-align:center;width:100%;">Permission denied. please contact administrator</div>
    <div style="width: 100%"><a href="dashboard.php?action=agents_manage" class="btn btn-success  glow w-100 position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a></div>
    <div style="width:100%;padding-top:15px"><a href="dashboard.php?action=agents_manage" class="btn btn-outline-success glow w-100 position-relative"><i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;">Back</i></a></div>
</div>
<?php } ?>



