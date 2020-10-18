<?php
        if (isset($_POST['btnsubmits'])) {
            $Error=0;
          if (!(strlen(trim($_POST['BankName']))>0)) {
                $ErrBankName ="Please Enter Bank Name";
                $Error++;
             }
             
             if (!(strlen(trim($_POST['IFSCode']))>0)) {
                $ErrIFSCode = "Please Enter IFSCode";
                $Error++;
             }

             if (!(strlen(trim($_POST['AccountName']))>0)) {
                $ErrAccountName = "Please Enter Account Name";
                $Error++;
             }
             if (!(strlen(trim($_POST['AccountNumber']))>0)) {
                $ErrAccountNumber = "Please Enter Account Number";
                $Error++;
             }                                                                                                 
             $data = $mysql->select("select * from `_tbl_Bank_Details` where  `AccountNumber`='".$_POST['AccountNumber']."'");
             if (sizeof($data)>0) {
                 $ErrAccountNumber = "Account Number Already Exists";
                 $Error++;
             }
             if($Error==0){  
                 $id = $mysql->insert("_tbl_Bank_Details",array("MemberID"       => $_SESSION['User']['MemberID'],
                                                                "MemberCode"       => $_SESSION['User']['MemberCode'],
                                                                "MemberName"       => $_SESSION['User']['MemberName'],
                                                                "BankName"       => $_POST['BankName'],
                                                                "IFSCode"        => $_POST['IFSCode'],
                                                                "AccountName"    => $_POST['AccountName'],
                                                                "AccountNumber"  => $_POST['AccountNumber'],                                                
                                                                "AccountType"    => $_POST['AccountType'],
                                                                "CreatedOn"      => date("Y-m-d H:i:s")));   
                 if (sizeof($id)>0) {  ?>
                     <script>location.href='BankAccount.php';</script>
               <?php  }                                          
             } 
       }
      ?>
<script>
$(document).ready(function () {
  $("#BankName").blur(function () {
        IsNonEmpty("BankName","ErrBankName","Please Enter Bank Name");
   });
   $("#IFSCode").blur(function () {
        IsNonEmpty("IFSCode","ErrIFSCode","Please Enter IFSCode");
   });
   $("#AccountName").blur(function () {
        IsNonEmpty("AccountName","ErrAccountName","Please Enter AccountName");
   });
   $("#AccountNumber").blur(function () {
        IsNonEmpty("AccountNumber","ErrAccountNumber","Please Enter AccountNumber");
   });
});
   
 function SubmitAccount() { 
                         ErrorCount=0;       
                         $('#ErrBankName').html("");            
                         $('#ErrIFSCode').html("");            
                         $('#ErrAccountName').html("");            
                         $('#ErrAccountNumber').html("");            
                         
                       IsNonEmpty("BankName","ErrBankName","Please Enter Bank Name");
                       IsNonEmpty("IFSCode","ErrIFSCode","Please Enter IFSCode");
                       IsNonEmpty("AccountName","ErrAccountName","Please Enter Account Name");
                       IsNonEmpty("AccountNumber","ErrAccountNumber","Please Enter Account number");
                       
                        return (ErrorCount==0) ? true : false;
                 }
</script>
        <!-- Sidebar -->
              
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">Bank Account</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Add Bank </div>                                                              
                                </div>
                                <form id="exampleValidation" action="" method="post" onsubmit="return SubmitAccount();">
                                    <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="BankName" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Bank Name  <span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="BankName" name="BankName" placeholder="Enter Bank Name" value="<?php echo (isset($_POST['BankName']) ? $_POST['BankName'] :"");?>">
                                                <span class="errorstring" id="ErrBankName"><?php echo isset($ErrBankName)? $ErrBankName : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="IFSCode" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">IFS Code  <span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="IFSCode" name="IFSCode" placeholder="Enter IFS Code" value="<?php echo (isset($_POST['IFSCode']) ? $_POST['IFSCode'] :"");?>">
                                                <span class="errorstring" id="ErrIFSCode"><?php echo isset($ErrIFSCode)? $ErrIFSCode : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="AccountName" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Account Name  <span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="AccountName" name="AccountName" placeholder="Enter Account Name" value="<?php echo (isset($_POST['AccountName']) ? $_POST['AccountName'] :"");?>">
                                                <span class="errorstring" id="ErrAccountName"><?php echo isset($ErrAccountName)? $ErrAccountName : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="AccountNumber" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">AccountNumber  <span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="AccountNumber" name="AccountNumber" placeholder="Enter Account Number" value="<?php echo (isset($_POST['AccountNumber']) ? $_POST['AccountNumber'] :"");?>">
                                                <span class="errorstring" id="ErrAccountNumber"><?php echo isset($ErrAccountNumber)? $ErrAccountNumber : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="AccountNumber" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Type  <span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <select class="form-control" id="AccountType" name="AccountType" required>
                                                    <option value="Current" <?php echo (isset($_POST[ 'AccountType'])) ? (($_POST[ 'AccountType']=="Current") ? " selected='selected' " : "") : "";?>>Current</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="btn btn-warning" type="submit" value="Submit" name="btnsubmits" id="btnsubmits">
                                                <a href="BankAccount.php" class="btn btn-danger">Cancel</a>
                                            </div>                                        
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
         
        <!-- Custom template | don't include it in your project! -->
         
         
    </div>
    