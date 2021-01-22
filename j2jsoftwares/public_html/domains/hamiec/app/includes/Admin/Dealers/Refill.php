<?php
//voucher 1 : credit to dealer from admin
//debit 2 : debit from admin
// 3 : commission to dealer from admin
// 4 : comission debit from admin
    if (isset($_POST['refillBtn'])) {
        
        $member = $mysql->select("Select * from _tbl_Members where `MemberID`='".$_POST['MemberCode']."'");
        $error=0;
        if (sizeof($member)==0) {
            $error++;
            $errormsg = "Agent not found";
        }
        if (!($_POST['Amount']*1>=0 && $_POST['Amount']*1<=10000000)) {
            $error++;
            $errormsg = "Amount must have greater than Rs.100 and Rs.10000000";
        }
        if ($error==0) {
             
             $description = $_POST['Description'];
            $id=$mysql->insert("_tbl_accounts",array("MemberID"    => $member[0]['MemberID'],
                                                     "Particulars" => 'Refill/FromAdmin/Dealer:'.$member[0]['MobileNumber']."/".$description,                    
                                                     "Credit"      => $_POST['Amount'],                    
                                                     "Debit"       => "0", 
                                                     "Balance"     => $app->getBalance($member[0]['MemberID'])+$_POST['Amount'],                   
                                                     "Voucher"     => "1",
                                                     "TxnDoneBy"   => $_SESSION['User']['MemberID'],   
                                                     "CreditFrom"    => $_SESSION['User']['MemberID'],     
                                                     "TxnDate"     => date("Y-m-d H:i:s")));
                                                     
             $id=$mysql->insert("_tbl_accounts",array("MemberID"    => $_SESSION['User']['MemberID'],
                                                     "Particulars" => 'Refill/ToDealer/Dealer:'.$member[0]['MobileNumber']."/".$description,                   
                                                     "Credit"      => "0",                    
                                                     "Debit"       => $_POST['Amount'], 
                                                     "Balance"     => $app->getBalance($_SESSION['User']['MemberID'])-$_POST['Amount'],                   
                                                     "Voucher"     => "2",  
                                                     "TxnDoneBy"   => $_SESSION['User']['MemberID'],   
                                                      "CreditTo"    => $member[0]['MemberID'],                                       
                                                     "TxnDate"     => date("Y-m-d H:i:s")));
             $commission = str_replace(",","",number_format($_POST['Amount'] * ($_POST['Commission']/100),2));
             $id=$mysql->insert("_tbl_accounts",array("MemberID"    => $member[0]['MemberID'],
                                                     "Particulars" => 'Commission/FromAdmin/Dealer:'.$member[0]['MobileNumber'],                    
                                                     "Credit"      => $commission,                    
                                                     "Debit"       => "0", 
                                                     "Balance"     => $app->getBalance($member[0]['MemberID'])+$commission,                   
                                                     "Voucher"     => "3",  
                                                     "TxnDoneBy"   => $_SESSION['User']['MemberID'],  
                                                     "CreditFrom"    => $_SESSION['User']['MemberID'],                                    
                                                     "TxnDate"     => date("Y-m-d H:i:s")));
                                                     
             $id=$mysql->insert("_tbl_accounts",array("MemberID"   => $_SESSION['User']['MemberID'],
                                                     "Particulars" => 'Commission/ToDealer/Dealer:'.$member[0]['MobileNumber'],                   
                                                     "Credit"      => "0",                    
                                                     "Debit"       => $commission, 
                                                     "Balance"     => $app->getBalance($_SESSION['User']['MemberID'])-$commission,                   
                                                     "Voucher"     => "4", 
                                                     "TxnDoneBy"   => $_SESSION['User']['MemberID'], 
                                                     "CreditTo"    => $member[0]['MemberID'],                                       
                                                     "TxnDate"     => date("Y-m-d H:i:s")));
                                                     
             //MobileSMS::sendSMS($member[0]['MobileNumber'],"Dear Dealer, Your wallet has credited Rs. ".$_POST['Amount'].". and Commission: ".$commission.". Wallet Balance Rs.".number_format($app->getBalance($member[0]['MemberID']),2),$member[0]['MemberID']);
             
             $message = "Dear Dealer, Your wallet has credited Rs. ".$_POST['Amount'].". and Commission: ".$commission.". Wallet Balance Rs.".number_format($app->getBalance($member[0]['MemberID']),2);
                          MobileSMS::sendSMS($member[0]['MobileNumber'],$message,$member[0]['MemberID']);  
                          $mparam['MailTo']=$member[0]['EmailID'];
                          $mparam['MemberID']=$member[0]['MemberID'];
                          $mparam['Subject']="Wallet Request";
                          $mparam['Message']=$message;
                          MailController::Send($mparam,$mailError);
             
             
            ?>
            <script>
             $(document).ready(function() {
                swal("Transfer Successfully", {
                    icon:"success",
                    confirm: {value: 'Continue'}
                }).then((value) => {
                    location.href='dashboard.php?action=Dealers/Refill'
                });
                 });
            </script>
        <?php } else { ?>
             <script>
              $(document).ready(function() {
                    swal("<?php echo $errormsg;?>", {
                        icon : "error" 
                    });
                 });
            </script>
            <?php
        }
    }
?>
 
 
        
       <style>
       .btn-light{border:1px solid #ccc !important}
       .mb15 {margin-bottom:15px;}
       </style> 
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
    
   
  
     <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title"></h4>
                    </div>
          <script>
               function doFvalidation() {
                   if ($('#MemberCode').val()!="0") {
                          if (!(parseInt($('#Amount').val())>=100)) {
                              swal("Please enter valid amount Rs. 100 to 1000000", {icon : "error"});
                              return false;
                          } else {
                                if (!(parseFloat($('#Commission').val())>=0)) {
                                    swal("Please enter valid Commission  0 to 10", {icon : "error"});
                                    return false;
                                } else {
                                    return true;
                                }
                          }
                   } else {
                       swal("Please Select Dealer", {icon : "error"});
                       return false;
                   }
               }
               function getCommission() {
                   $('#Commissionx').val( (parseInt($('#Amount').val()) * (parseFloat($('#Commission').val()/100))).toFixed(2));
               }
          </script>
    <div class="row">
        <div class="col-md-12">
        <div class="card">
        <div class="card-header">
                    <div class="card-title">Refill to Dealer</div>
                </div>
            <div class="card-body">
                <form method="post" action="" onsubmit="return doFvalidation()">
                   
                    <div class="row mb15">
                        <div class="col-md-12 col-xs-6 b-r">
                            <strong>Dealer<span style="color:red">*</span></strong>
                            <br>
                             <select required name="MemberCode" id="MemberCode" class="form-control"   style="border:1px solid #555"  data-live-search="true">
                             <option value="0">Slect Agent</option>
                                  
    
    <?php $agents = $mysql->select("select * from _tbl_Members where IsDealer='1' and MemberID>1");
    foreach($agents as $a) {
        ?>
             <option value="<?php echo $a['MemberID'];?>"><?php echo $a['MemberName']." (".$a['MobileNumber'].") ";?>
              Balance: <?php echo number_format($app->getBalance($a['MemberID']),2);?>
             </option>
        <?php
    }
    ?>
    
  </select>
                        </div>
                    </div>
                    <div class="row mb15"> 
                        <div class="col-md-12 col-xs-6 b-r"> 
                            <strong>Transfer Amount<span style="color:red">*</span></strong>
                            <br>
                            <input type="text" required name="Amount" id="Amount" placeholder="0.00" class="form-control" value="<?php echo isset($_POST['Amount']) ? $_POST['Amount'] : "";?>" >
                        </div>
                    </div>
                    <div class="row mb15">
                        <div class="col-md-6 col-xs-6 b-r">
                            <strong>Commission (%)<span style="color:red">*</span></strong>
                            <br>
                             <input type="text" required name="Commission" onkeyup="getCommission()" onblur="getCommission()" id="Commission" class="form-control" placeholder="0.00">
                            
                        </div>
                        <div class="col-md-6 col-xs-6 b-r">
                            <strong>Commission Amount (Rs)</strong>
                            <br>
                             <input type="text" disabled="disabled" name="Commissionx" id="Commissionx" class="form-control" placeholder="0.00">
                            
                        </div>
                    </div> 
                     <div class="row mb15"> 
                        <div class="col-md-12 col-xs-6 b-r"> 
                            <strong>Description<span style="color:red">*</span></strong>
                            <br>
                            <input type="text" name="Description" required id="Amount" placeholder="Description" class="form-control" value="<?php echo isset($_POST['Description']) ? $_POST['Description'] : "";?>" >
                        </div>
                    </div>     
                    <div class="row mb15">
                        <div class="col-md-4 col-xs-6 b-r">
                            <button type="submit" name="refillBtn" id="refillBtn" class="btn btn-warning" >Refill</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>            
 
</div>
</div>
</div>
 