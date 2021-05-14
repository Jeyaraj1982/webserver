<?php
    if (isset($_POST['refillBtn'])) {
        
        $member = $mysql->select("Select * from _tbl_member where `MemberID`='".$_POST['MemberCode']."'");
        $error=0;
        if (sizeof($member)==0) {
            $error++;
            $errormsg = "Agent not found";
        }
        
        $balance =  $application->getBalance($member[0]['MemberID']);
        if (!($_POST['Amount']*1>=0 && $_POST['Amount']*1<=$balance)) {
            $error++;
            $errormsg = "Amount must have greater than Rs.0 and Rs.".number_format($balance,2);
        }
        if ($error==0) {
            $balance = $balance-$_POST['Amount'];
            $id=$mysql->insert("_tbl_accounts",array("MemberID"    => $member[0]['MemberID'],
                                                     "Particulars" => 'Refill Wallet/FromAdmin',                    
                                                     "Credit"      => "0",                    
                                                     "Debit"       => $_POST['Amount'], 
                                                     "Balance"     => $balance,                   
                                                     "Voucher"     => "-1",                    
                                                     "TxnDate"     => date("Y-m-d H:i:s")));
           // $d = MobileSMS::sendSMS($member[0]['MobileNumber'],"Your wallet has debited Rs. ".$_POST['Amount'].". Wallet Balance Rs.".number_format($balance,2),$member[0]['MemberID']);
           if ($member[0]['TelegramID']>0)  {
            $message = "Dear ".$member[0]['MemberName'].", Your wallet has been debited Rs. ".$_POST['Amount'].". Wallet Balance Rs.".number_format($balance,2);
            TelegramMessageController::sendSMS($member[0]['TelegramID'],$message,0,0);
        }                                     
            ?>
            <script>
                swal("Debited Successfully. Current Balance is <?php echo number_format($balance,2);?> ", {
                    icon:"success",
                    confirm: {value: 'Continue'}
                }).then((value) => {
                    location.href='dashboard.php?action=Wallets/Debit'
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
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Wallets/Refill">Wallets</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Wallets/Refill">Debit Amount From Member</a></li>
        </ul>
    </div>
        
       <style>
       .btn-light{border:1px solid #ccc !important}
       </style> 
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
    
    
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>-->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
   
  
    <div class="row">
        <div class="col-md-12">
        <div class="card">
        <div class="card-header">
                    <div class="card-title">Debit from Member</div>
                </div>
            <div class="card-body">
                <form method="post" action="">
                   
                    <div class="row mb15">
                        <div class="col-md-12 col-xs-6 b-r">
                            <strong>Super Agent / Agent Mobile Number</strong>
                            <br>
                            <!--<input type="text" name="MemberCode" id="MemberCode" class="form-control" value="<?php echo isset($_POST['MemberCode']) ? $_POST['MemberCode'] : "";?>">-->
                             <select name="MemberCode" id="MemberCode" class="form-control selectpicker" style="border:1px solid #555" data-live-search="true">
                             <option value="0">Slect Agent</option>
    <!--<option data-tokens="ketchup mustard">Hot Dog, Fries and a Soda</option>-->
    
    <?php $agents = $mysql->select("select * from _tbl_member order by MemberName");
    foreach($agents as $a) {
        ?>
             <option value="<?php echo $a['MemberID'];?>">
             
             <?php echo $a['MemberName']." (".$a['MobileNumber'].") ";?>
             <!--Balance: <?php // echo number_format($application->getBalance($a['MemberID']),2);?>-->
             
             </option>
        <?php
    }
    ?>
    
  </select>
                        </div>
                    </div>
                    <div class="row mb15"> 
                        <div class="col-md-12 col-xs-6 b-r"> 
                            <strong>Debit Amount</strong>
                            <br>
                            <input type="text" name="Amount" id="Amount"  class="form-control" value="<?php echo isset($_POST['Amount']) ? $_POST['Amount'] : "";?>" >
                        </div>
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
