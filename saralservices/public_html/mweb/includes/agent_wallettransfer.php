
<script>
$(document).ready(function(){
    $("#MemberCode").blur(function(){    
        $('#ErrMemberCode').html("");
            if ($('#MemberCode').val()=="0") {
                $('#ErrMemberCode').html("Please select dealer");
            }    
    });
    $("#Amount").blur(function(){    
        var amt = $('#Amount').val().trim();
        $('#ErrAmount').html("");
        if ($('#MemberCode').val()!="0") {
            if (amt.length==0) {
                $('#ErrAmount').html("Please enter Amount");
            } else {
                if (!(parseFloat(amt)>=100 && parseFloat(amt)<=1000000)) {
                    $('#ErrAmount').html("Amount must have Rs.100 to  Rs.1000000");
                }
            }   
        }else {
            $('#ErrMemberCode').html("Please select dealer");
        }   
    });
});
               function doFvalidation() {
                   $('#ErrAmount').html(""); 
                   $('#ErrMemberCode').html(""); 
                   error=0;
                   if ($('#MemberCode').val()!="0") {
                       var amt = $('#Amount').val().trim();
                         if (amt.length==0) {
                            $('#ErrAmount').html("Please enter Amount");
                             error++;
                        } else {
                        if (!(parseFloat(amt)>=100 && parseFloat(amt)<=1000000)) {
                            $('#ErrAmount').html("Amount must have Rs.100 to  Rs.1000000");
                             error++;
                        }
                        }
                          
                   } else {
                       $('#ErrMemberCode').html("Please select dealer");
                             error++;
                   }
                   if (error>0) {
                        return false;
                    }
               }
               function getCommission() {
                   $('#Commissionx').val( (parseInt($('#Amount').val()) * (parseFloat($('#Commission').val()/100))).toFixed(2));
               }
          </script>

<?php if ($_SESSION['User']['IsDealer']=="1") { ?>
<style>
.errorstring{text-align: right;width:100%;font-size:12px;padding:5px}
.sidenav {
z-index: 2;
}
</style>
<?php  if (isset($_POST['refillBtn'])) {
        
        $member = $mysql->select("Select * from _tbl_Members where `MemberID`='".$_POST['MemberCode']."'");
        $error=0;
        if (sizeof($member)==0) {
            $error++;
            $errormsg = "Agent not found";
        }
        if (!($_POST['Amount']*1>=100)) {
            $error++;
            $errormsg = "Minimum Amount must have 100 and above";
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
  .btn-light{
      color:black
  }
  </style>
    
<div>
    <div style="margin-top:0px !important">
        <div class="page-inner"> 
            <div class="row">
                <div class="col-md-12" style="padding: 5px;">
                    <div class="card" style="background: none;">
                        <div class="card-header">
                            <div class="card-title" style="text-align: center;">Refill to Retailer</div>
                        </div>
                        <div class="card-body" style="padding:0px;background:none;">
                             <form method="post" action="" onsubmit="return doFvalidation()">
                               <div class="row" style="margin-bottom:5px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12">                   
                                        
                                        <select name="MemberCode" id="MemberCode" class="form-control selectpicker "   style="border:1px solid #555;color:black"  data-live-search="true">
                                            <option value="0">Select Retailer</option>
                                            <?php $agents = $mysql->select("select * from _tbl_Members where IsMember='1' and MapedTo='".$_SESSION['User']['MemberID']."' and MemberID>1 order by MemberName");
                                            foreach($agents as $a) {
                                                ?>
                                                     <option value="<?php echo $a['MemberID'];?>">
                                                     <?php echo $a['MemberName'];?>
                                                     
                                                 
                                                     </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <div class="errorstring" id="ErrMemberCode"><?php echo isset($ErrMemberCode)? $ErrMemberCode : "";?></div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:5px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12">                   
                                        <label style="text-transform: none;">Transfer Amount</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">INR</span>
                                            </div>  
                                            <input type="number" name="Amount" onkeyup="getCommission()" onblur="getCommission()" id="Amount" placeholder="0.00" class="form-control" value="<?php echo isset($_POST['Amount']) ? $_POST['Amount'] : "";?>" >              
                                        </div>
                                        <div class="errorstring" id="ErrAmount"></div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:5px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12">                   
                                        <label style="text-transform: none;">Commission (%)</label>
                                        <input type="text" disabled="disabled" id="Commission" class="form-control" value="3">
                                        <div class="errorstring" id="ErrCommission"></div>
                                    </div>         
                                </div>
                                <div class="row" style="margin-bottom:5px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12">                   
                                        <label style="text-transform: none;">Commission Amount (Rs)</label>
                                        <input type="text" disabled="disabled" id="Commissionx" class="form-control" placeholder="0.00">
                                        <div class="errorstring" id="ErrCommissionx"></div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:5px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12">                   
                                        <label style="text-transform: none;">Description</label>
                                        <input type="text" name="Description" id="Description" placeholder="Description" class="form-control" value="<?php echo isset($_POST['Description']) ? $_POST['Description'] : "";?>" >
                                        <div class="errorstring" id="ErrDescription"></div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top:25px;margin-bottom:10px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button type="button" class="btn btn-black" onclick="location.href='dashboard.php?action=agents_manage';" style="background:#6c757d !important;width: 46%;">Back</button>
                                        <button type="submit" class="btn btn-danger" style="width: 46%;float:right" name="refillBtn" id="refillBtn">Refill</button>
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
<?php } else {       ?>
<div class="row">
    <div style="padding:20px;color:red;text-align:center;width:100%;">Permission denied. please contact administrator</div>
    <div style="width: 100%"><a href="dashboard.php?action=agents_manage" class="btn btn-success  glow w-100 position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a></div>
    <div style="width:100%;padding-top:15px"><a href="dashboard.php?action=agents_manage" class="btn btn-outline-success glow w-100 position-relative"><i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;">Back</i></a></div>
</div>    
<?php } ?>
          