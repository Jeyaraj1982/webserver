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
            $errormsg = "Retailer not found";
        }
        if (!($_POST['Amount']*1>=0 && $_POST['Amount']*1<=10000000)) {
            $error++;
            $errormsg = "Amount must have greater than Rs.100 and Rs.10000000";
        }
        if (!($app->getBalance($member[0]['MemberID'])<=$_POST['Amount'])) {
            $err++;
            $errormsg = "Retailer balance is not sufficiant to debit";
        }
        if ($error==0) {
             
             $description = $_POST['Description'];
            $id=$mysql->insert("_tbl_accounts",array("MemberID"    => $member[0]['MemberID'],
                                                     "Particulars" => 'Debit/FromAdmin/Retailer:'.$member[0]['MobileNumber']."/".$description,                    
                                                     "Credit"      => "0",                    
                                                     "Debit"       => $_POST['Amount'], 
                                                     "Balance"     => $app->getBalance($member[0]['MemberID'])-$_POST['Amount'],                   
                                                     "Voucher"     => "10001",
                                                     "TxnDoneBy"   => $_SESSION['User']['MemberID'],                                        
                                                     "TxnDate"     => date("Y-m-d H:i:s")));
                                                     
             $id=$mysql->insert("_tbl_accounts",array("MemberID"    => $_SESSION['User']['MemberID'],
                                                     "Particulars" => 'Debit/ToAdmin/Retailer:'.$member[0]['MobileNumber']."/".$description,                   
                                                     "Credit"      => $_POST['Amount'],                    
                                                     "Debit"       => "0", 
                                                     "Balance"     => $app->getBalance($_SESSION['User']['MemberID'])+$_POST['Amount'],                   
                                                     "Voucher"     => "20001",  
                                                     "TxnDoneBy"   => $_SESSION['User']['MemberID'],                                      
                                                     "TxnDate"     => date("Y-m-d H:i:s")));
              
                                                     
             MobileSMS::sendSMS($member[0]['MobileNumber'],"Dear Retailer, Your wallet has debited Rs. ".$_POST['Amount'].".   Wallet Balance Rs.".number_format($app->getBalance($member[0]['MemberID']),2),$member[0]['MemberID']);
             
            ?>
            <script>
             $(document).ready(function() {
                swal("Reversed Successfully", {
                    icon:"success",
                    confirm: {value: 'Continue'}
                }).then((value) => {
                    location.href='dashboard.php?action=Retailers/Reverse'
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
                          if (!(parseInt($('#Amount').val())>=0)) {
                              swal("Please enter valid amount Rs. 1 to 1000000", {icon : "error"});
                              return false;
                          }  
                   } else {
                       swal("Please Select Retailer", {icon : "error"});
                       return false;
                   }
                   return true;
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
                            <strong>Retailer<span style="color:red">*</span></strong>
                            <br>
                             <select required name="MemberCode" id="MemberCode" class="form-control"   style="border:1px solid #555"  data-live-search="true">
                             <option value="0">Slect Retailer</option>
                                  
    
    <?php $agents = $mysql->select("select * from _tbl_Members where IsMember='1' and MemberID>1");
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
                            <strong>Debit Amount<span style="color:red">*</span></strong>
                            <br>
                            <input type="text" required name="Amount" id="Amount" placeholder="0.00" class="form-control" value="<?php echo isset($_POST['Amount']) ? $_POST['Amount'] : "";?>" >
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
                            <button type="submit" name="refillBtn" id="refillBtn" class="btn btn-warning" >Reverse</button>
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
 