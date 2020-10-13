<?php include_once("header.php"); ?> 
 
       <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-display1 icon-gradient bg-premium-dark">
                                    </i>
                                </div>
                                <div>Add Bank Account Information
                                </div>
                            </div>
                        </div>
                    </div>        
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade active show" id="tab-content-1" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"> 
                                        <?php

                       if (isset($_POST['btnWithDraw'])) {
                                           
                      $BankDetails =$mysql->select("select * from _tbl_member_bank_details where BankID='".$_POST['BankName']."'");                                                    
            $id=$mysql->insert("_tbl_member_withdraw_request",array("MemberID"          =>$_SESSION['User']['MemberID'],
                                                                         "RequestedOn"       =>date("Y-m-d H:i:s"),
                                                                         "Amount"            =>$_POST['Amount'],
                                                                         "BankName"          =>$BankDetails[0]['BankName'],
                                                                         "AccountNumber"     =>$BankDetails[0]['AccountNumber'],
                                                                         "IFSCode"           =>$BankDetails[0]['IFSCode'],
                                                                         "AccountName"       =>$BankDetails[0]['AccountName'])); 
                                         echo "<span style='color:green'>Your withdraw request has been updated.</span>";
                                         unset($_POST);    
         
                                         }                                                                                           
                                                                                                            
                                         ?>
 <script>
    $(document).ready(function () {
        $("#Amount").keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                $("#ErrAmount").html("Digits Only").fadeIn().fadeIn("fast");
                return false;
            }
        });
        $("#Amount").blur(function () { 
            IsNonEmpty("Amount","ErrAmount","Please Enter Amount");
        });
    });
    function submitamount() {
        
        $('#ErrAmount').html("");
          ErrorCount=0;
          IsNonEmpty("Amount","ErrAmount","Please Enter Amount");
          if (ErrorCount==0) {
                            return true;
                        } else{
                            return false;
                        }
                 
}
</script>
                                            <form action="" method="post">
                                            <div>
                                                    <div class="form-group row">
                                                   <div class="col-sm-3">Bank Name</div>
                                                    <div class="col-sm-9">
                                                       <select name="BankName" id="BankName" class="form-control">
                                                        <?php $BankDetails =$mysql->select("select * from _tbl_member_bank_details where MemberID='". $_SESSION['User']['MemberID']."'");
                                                                foreach($BankDetails as $BankDetail){
                                                         ?>
                                                        <option value="<?php echo $BankDetail['BankID'];?>" <?php echo $_POST[ 'BankName'] ? " selected='selected' " : "";?>><?php echo $BankDetail['BankName'];?>&nbsp;-&nbsp;<?php  echo $BankDetail['AccountNumber']; ?>&nbsp;-&nbsp;<?php echo $BankDetail['IFSCode']; ?></option>
                                                        <?php }?>
                                                    </select>
                                                    </div>
                                                </div>
                                                   <div class="form-group row">
                                                   <div class="col-sm-3">Amount</div>
                                                    <div class="col-sm-9">
                                                       <input type="text" name="Amount" id="Amount" placeholder="Amount" value="<?php echo (isset($_POST['Amount']) ? $_POST['Amount'] : "");?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter Username">
                                                    <span class="errorstring" id="ErrAmount"><?php echo isset($ErrAmount)? $ErrAmount : "";?></span>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                   <div class="col-sm-12"><button type="submit" name="btnWithDraw" class="mb-2 mr-2 btn btn-gradient-primary"  >With Draw</button></div>
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
 <?php include_once("footer.php");?>              