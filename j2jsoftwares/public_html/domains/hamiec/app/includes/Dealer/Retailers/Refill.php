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
        if (!($_POST['Amount']*1>=500)) {
            $error++;
            $errormsg = "Minimum Amount must have 500 and above";
        }
        
        if (!($app->getBalance($_SESSION['User']['MemberID'])>=$_POST['Amount'])) {
           $error++;
            $errormsg = "Transfer failed. Insufficiant amount"; 
        }
        
        
        
        if ($error==0) {
             
             $description = $_POST['Description'];
            $id=$mysql->insert("_tbl_accounts",array("MemberID"    => $member[0]['MemberID'],
                                                     "Particulars" => 'Refill/Dealer:'.$_SESSION['User']['MobileNumber'].'/Retailer:'.$member[0]['MobileNumber'].'/'.$description,                    
                                                     "Credit"      => $_POST['Amount'],                    
                                                     "Debit"       => "0", 
                                                     "Balance"     => $app->getBalance($member[0]['MemberID'])+$_POST['Amount'],                   
                                                     "Voucher"     => "1",                    
                                                     "TxnDoneBy"   => $_SESSION['User']['MemberID'],     
                                                     "CreditFrom"    => $_SESSION['User']['MemberID'],               
                                                     "TxnDate"     => date("Y-m-d H:i:s")));
                                                     
             $id=$mysql->insert("_tbl_accounts",array("MemberID"    => $_SESSION['User']['MemberID'],
                                                     "Particulars" => 'Refill/Dealer:'.$_SESSION['User']['MobileNumber'].'/Retailer:'.$member[0]['MobileNumber'].'/'.$description,                                       
                                                     "Credit"      => "0",                    
                                                     "Debit"       => $_POST['Amount'], 
                                                     "Balance"     => $app->getBalance($_SESSION['User']['MemberID'])-$_POST['Amount'],                   
                                                     "Voucher"     => "2",  
                                                     "TxnDoneBy"   => $_SESSION['User']['MemberID'],     
                                                     "CreditTo"    => $member[0]['MemberID'],                                             
                                                     "TxnDate"     => date("Y-m-d H:i:s")));
             $commission = str_replace(",","",number_format($_POST['Amount'] * (3/100),2));
             $id=$mysql->insert("_tbl_accounts",array("MemberID"    => $member[0]['MemberID'],
                                                     "Particulars" => 'Commission/Dealer:'.$_SESSION['User']['MobileNumber'].'/Retailer:'.$member[0]['MobileNumber'],                    
                                                     "Credit"      => $commission,                    
                                                     "Debit"       => "0", 
                                                     "TxnDoneBy"   => $_SESSION['User']['MemberID'],                    
                                                     "Balance"     => $app->getBalance($member[0]['MemberID'])+$commission,                   
                                                     "Voucher"     => "5",      
                                                     "CreditFrom"    => $_SESSION['User']['MemberID'],                    
                                                     "TxnDate"     => date("Y-m-d H:i:s")));
                                                     
             $id=$mysql->insert("_tbl_accounts",array("MemberID"   => $_SESSION['User']['MemberID'],
                                                     "Particulars" => 'Commission/Dealer:'.$_SESSION['User']['MobileNumber'].'/Retailer:'.$member[0]['MobileNumber'],                                        
                                                     "Credit"      => "0",  
                                                     "TxnDoneBy"   => $_SESSION['User']['MemberID'],                                      
                                                     "Debit"       => $commission, 
                                                     "Balance"     => $app->getBalance($_SESSION['User']['MemberID'])-$commission,                   
                                                     "Voucher"     => "6",        
                                                     "CreditTo"    => $member[0]['MemberID'],                 
                                                     "TxnDate"     => date("Y-m-d H:i:s")));
                                                     
             MobileSMS::sendSMS($member[0]['MobileNumber'],"Dear Dealer, Your wallet has credited Rs. ".$_POST['Amount'].". and Commission: ".$commission.". Wallet Balance Rs.".number_format($app->getBalance($member[0]['MemberID']),2),$member[0]['MemberID']);
             unset($_POST); 
            ?>
            <script>
             $(document).ready(function() {
                swal("Transfer Successfully", {
                    icon:"success",
                     
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
                                //if (!(parseFloat($('#Commission').val())>=0)) {
                                //    swal("Please enter valid Commission  0 to 10", {icon : "error"});
                                   // return false;
                                //} else {
                                    return true;
                                //}
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
                    <div class="card-title">Refill to Retailer</div>
                </div>
            <div class="card-body">
                <form method="post" action="" onsubmit="return doFvalidation()">
                     <div class="row mb15"> 
                        <div class="col-md-12 col-xs-6 b-r"> 
                            <strong>My Balance</strong>
                            <br>
                            <input type="text" disabled="disabled" class="form-control" value="<?php echo number_format($app->getBalance($_SESSION['User']['MemberID']),2);?>" >
                        </div>
                    </div>
                    <div class="row mb15">
                        <div class="col-md-12 col-xs-6 b-r">
                            <strong>Retailer<span style="color:red">*</span></strong>
                            <br>
                             <select required name="MemberCode" id="MemberCode" class="form-control selectpicker"   style="border:1px solid #555"  data-live-search="true">
                             <option value="0">Slect Retailer</option>
                                <?php $agents = $mysql->select("select * from _tbl_Members where IsMember='1' and MapedTo='".$_SESSION['User']['MemberID']."' and MemberID>1 order by MemberName");
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
                            <input type="number" required name="Amount" onkeyup="getCommission()" onblur="getCommission()" id="Amount" placeholder="0.00" class="form-control" value="<?php echo isset($_POST['Amount']) ? $_POST['Amount'] : "";?>" >
                        </div>
                    </div>
                    <div class="row mb15">
                        <div class="col-md-6 col-xs-6 b-r">
                            <strong>Commission (%)</strong>
                            <br>
                             <input type="text" disabled="disabled" id="Commission" class="form-control" value="3">
                            
                        </div>
                        <div class="col-md-6 col-xs-6 b-r">
                            <strong>Commission Amount (Rs)</strong>
                            <br>
                             <input type="text" disabled="disabled" id="Commissionx" class="form-control" placeholder="0.00">
                            
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
 