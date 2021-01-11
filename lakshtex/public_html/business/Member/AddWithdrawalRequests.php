
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-title">
                                        Add Withdrawal Request
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php if(getWithdrawableBalance($_SESSION['User']['MemberCode'])<100){ ?>
                                <div class="form-group row" style="text-align:center;">
                                   <div class="col-sm-12">                            
                                        <img src="assets/accessdenied.png" style="width: 100px;height:100px"><br>
                                        Insufficient Balance<br>
                                        <a href="Dashboard.php?action=MyWithdrawalRequests">Continue</a>
                                   </div>
                                </div>                                       
                            <?php } else {
                                      
                                 if (isset($_POST['updateBtn'])) {
                                     $Bank = $mysql->select("select * from _tbl_member_banknames where BankID='".$_POST['BankDetails']."'"); 
                                     
                                    $id = $mysql->insert("_tbl_member_withdraw_request",array("MemberID"          => $_SESSION['User']['MemberID'],
                                                                                              "RequestedOn"       => date("Y-m-d H:i:s"),
                                                                                              "Amount"            => $_POST['Amount'],
                                                                                              "AccountNumber"     => $Bank[0]['AccountNumber'],
                                                                                              "IFSCode"           => $Bank[0]['IFSCode'],
                                                                                              "AccountName"       => $Bank[0]['AccountHolderName']));
                                          $mysql->insert("_tbl_wallet_earning",array("MemberID"    => $_SESSION['User']['MemberID'],
                                                                                     "MemberCode"  => $_SESSION['User']['MemberCode'],
                                                                                     "Txndate"     => date("Y-m-d H:i:s"),
                                                                                     "Particulars" => "Withdrawal Request",
                                                                                     "Amount"      => $_POST['Amount'],
                                                                                     "Credit"      => "0",
                                                                                     "Debit"       => $_POST['Amount'],
                                                                                     "Balance"     => getWithdrawableBalance($_SESSION['User']['MemberCode'])-$_POST['Amount']));
                                     if($id>0){
                                 ?>
                                     
                                     <script>
                                        $(document).ready(function() {
                                            swal("Request Added successfully", { 
                                                icon:"success",
                                                confirm: {value: 'Continue'}
                                            }).then((value) => {
                                                location.href='Dashboard.php?action=MyWithdrawalRequests'
                                            });
                                        });
                                    </script>
                                     <?php
                                 }else{ ?>                                                           
                                    <script>
                                        $(document).ready(function() {
                                            swal("Error Add request", { 
                                                icon:"error"
                                            })
                                        });
                                    </script>    
                                 <?php }
                                 }
                                    
                                ?>
                                <form action="" method="post" onsubmit="return submitbank()">
                                    <input type="hidden" name="AvailableBalance" id="AvailableBalance" value="<?php echo getWithdrawableBalance($_SESSION['User']['MemberCode']);?>">
                                    <div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">Available Balance</div>
                                            <div class="col-sm-9"><i class="fas fa-rupee-sign"></i> <?php echo number_format(getWithdrawableBalance($_SESSION['User']['MemberCode']),2);?></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">Amount<span id="star">*</span></div>
                                            <div class="col-sm-9">
                                                <div class="input-icon">
                                                    <span class="input-icon-addon">
                                                        <i class="fas fa-rupee-sign"></i>                                  
                                                    </span>
                                                    <input type="text" name="Amount" id="Amount" class="form-control onlynumeric" value="<?php echo isset($_POST['Amount']) ? $_POST['Amount'] : "";?>">
                                                </div>
                                                <span class="errorstring" id="ErrAmount"><?php echo isset($ErrAmount)? $ErrAmount : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">Bank<span id="star">*</span></div>
                                            <div class="col-sm-9">
                                                <select name="BankDetails" id="BankDetails" class="form-control">
                                                    <?php $BankDetails = $mysql->select("select * from _tbl_member_banknames where MemberID='".$_SESSION['User']['MemberID']."'"); ?>
                                                    <?php foreach($BankDetails as $BankDetail){ ?>
                                                        <option value="<?php echo $BankDetail['BankID'];?>" <?php echo ($_POST['BankDetails']==$BankDetail['BankID']) ? " selected='selected' " : "";?>><?php echo $BankDetail['AccountHolderName'];?>&nbsp;::&nbsp;<?php echo $BankDetail['AccountNumber'];?></option>                             
                                                    <?php } ?>
                                                </select>
                                                <span class="errorstring" id="ErrBankDetails"><?php echo isset($ErrBankDetails)? $ErrBankDetails : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                           <div class="col-sm-12"><button type="submit" name="updateBtn" class="btn btn-primary"  >Add Withdrawal Request</button></div>
                                        </div>
                                    </div>  
                                </form>
                                <?php }?>
                        </div>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>
<script>

  $(document).ready(function () {
        $("#Amount").blur(function () {
            $('#ErrAmount').html("");
            if($("#Amount").val()==""){
                $("#ErrAmount").html("Please Enter Amount");
            }else{
                if($("#Amount").val()>$("#AvailableBalance").val()){
                    $("#ErrAmount").html("Please Enter Amount less than or equal to avalible balance");    
                }
            }
        });
  });
  function submitbank(){
      ErrorCount=0;
        $('#ErrAmount').html("");
        
        if($("#Amount").val()==""){
                $("#ErrAmount").html("Please Enter Amount");
                ErrorCount++;
            }else{
                if($("#Amount").val()>$("#AvailableBalance").val()){
                    $("#ErrAmount").html("Please Enter Amount less than or equal to avalible balance"); 
                    ErrorCount++;   
                }
            }
        return (ErrorCount==0) ? true : false;
  }
 </script>
 