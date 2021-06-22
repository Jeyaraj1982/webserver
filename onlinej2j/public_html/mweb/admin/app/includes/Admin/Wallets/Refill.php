<?php
    $agents = $mysql->select("select * from _tbl_member order by MemberName");
    if (isset($_POST['refillBtn'])) {
        
        $member = $mysql->select("Select * from _tbl_member where `MemberID`='".$_POST['MemberCode']."'");
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
            
            $balance = $application->getBalance($member[0]['MemberID'])+$_POST['Amount'];
            $id=$mysql->insert("_tbl_accounts",array("MemberID"    => $member[0]['MemberID'],
                                                     "Particulars" => 'Refill Wallet/FromAdmin',                    
                                                     "Credit"      => $_POST['Amount'],                    
                                                     "Debit"       => "0", 
                                                     "Balance"     => $balance,                   
                                                     "Voucher"     => "-1",                    
                                                     "TxnDate"     => date("Y-m-d H:i:s")));

            if (isset($_POST['markascredit']) && $_POST['markascredit']=="on") {
                $credit_note = $mysql->insert("_tbl_admin_credits",array("AdminID"        => $_SESSION['User']['AdminID'],
                                                                         "NickName"       => $_POST['credit_nickname'],
                                                                         "MemberID"       => $member[0]['MemberID'],
                                                                         "TxnAmount"      => $_POST['Amount'],
                                                                         "CreditUpdated"  => date("Y-m-d H:i:s"),
                                                                         "Amount"         => $_POST['CrAmount'],
                                                                         "PayableAmount"  => $_POST['CrAmount'],
                                                                         "summary"        => 'Refill Wallet/FromAdmin',
                                                                         "IsPaid"         => "0"));
            }
        
            $message = "Dear ".$member[0]['MemberName'].", Your wallet has been credited Rs. ".$_POST['Amount'].". Wallet Balance Rs.".number_format($balance,2);
            if ($member[0]['TelegramID']>0)  {
                TelegramMessageController::sendSMS($member[0]['TelegramID'],$message,0,0);
            }
            Whatsapp::sendsms("91".$member[0]['MobileNumber'],$message,0,"");
            
            if (isset($_POST['CrAmount']) && $_POST['CrAmount']>0) {
                $message = "Dear ".$member[0]['MemberName'].",  please trasfer your outstanding balance Rs. ".$_POST['CrAmount']." shortly."; 
                if ($member[0]['TelegramID']>0)  {
                    TelegramMessageController::sendSMS($member[0]['TelegramID'],$message,0,0);
                }
                Whatsapp::sendsms("91".$member[0]['MobileNumber'],$message,0,"");
            }
        
             ?>
            <script>                                      
                swal("Transfer Successfully", {
                    icon:"success",
                    confirm: {value: 'Continue'}
                }).then((value) => {
                    location.href='dashboard.php?action=Wallets/Refill'
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
<style>.btn-light{border:1px solid #ccc !important}</style> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Wallets/Refill">Refill To Member</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Refill to Member</div>
                </div>
                <div class="card-body">
                    <form method="post" action="">
                        <div class="row mb15">
                            <div class="col-md-12 col-xs-6 b-r">
                                <strong>Super Agent / Agent Mobile Number</strong><br>
                                <select name="MemberCode" id="MemberCode" class="form-control selectpicker" style="border:1px solid #555" data-live-search="true">
                                    <option value="0">Slect Agent</option>
                                    <?php foreach($agents as $a) { ?>                                            
                                    <option value="<?php echo $a['MemberID'];?>"><?php echo $a['MemberName']." (".$a['MobileNumber'].") ";?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb15"> 
                            <div class="col-md-12 col-xs-6 b-r"> 
                                <strong>Transfer Amount</strong><br>
                                <input type="text" name="Amount" id="Amount"  class="form-control" value="<?php echo isset($_POST['Amount']) ? $_POST['Amount'] : "";?>" >
                            </div>
                        </div> 
                        <div class="form-group">
                            <div class="checkbox checkbox-success checkbox-inline">
                                <input type="checkbox" class="checkbox-primary" onclick="do_markascredit()" name="markascredit" id="markascredit">
                                <label for="markascredit">Mark as credit</label>
                            </div>
                            <input type="text" class="form-control" value="" name="credit_nickname" id="credit_nickname" placeholder="Nick Name" style="display: none;margin-top:10px;">
                            <input type="number" class="form-control" value="" name="CrAmount" id="CrAmount" placeholder="Credit Amount" style="display: none;margin-top:10px;">
                        </div>
                        <div class="row mb15">
                            <div class="col-md-4 col-xs-6 b-r">
                                <button type="submit" name="refillBtn" id="refillBtn" class="btn btn-primary" >Refill</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>            
</div>
<script>
    function do_markascredit() {
        if($('#markascredit').prop("checked") == true){
            $('#credit_nickname').show();
            $('#credit_nickname').attr("required","");
            $('#CrAmount').show();
            $('#CrAmount').attr("required","");
            $('#credit_nickname').val($('#MemberCode option:selected').text());
        } else if($('#markascredit').prop("checked") == false) {
            $('#credit_nickname').hide();
            $('#credit_nickname').removeAttr("required");
            $('#CrAmount').hide();
            $('#CrAmount').removeAttr("required");
            $('#credit_nickname').val();
        }
    }
</script>