<?php include_once("header.php");?>
<?php

        if (isset($_POST['btnsubmit'])) {
            $ErrorCount = 0;            
            $mysql->insert("_tbl_customer_bankinformations",array("CustomerID"        => $_SESSION['User']['CustomerID'],
                                                                  "BankAccountName"   => $_POST['BankAccountName'],
                                                                  "BankAccountNumber" => $_POST['BankAccountNumber'],
                                                                  "IFSCode"           => $_POST['IFSCode']));
        }
      ?> 
<div id="account-login" class="container">
	<ul class="breadcrumb">
		<li><a>Home</a></li>
		<li><a href="MyBankInformation.php">Add Bank Account Details</a></li>
	</ul>
    <div class="row">
        <div id="content" class="col-md-9 col-sm-8 col-xs-12">
			<div class="row">
				<div class="col-md-6 col-xs-12">
					<div class="well">
						<h2 class="heading" id="hed">Bank Information</h2>
                        <?php if (isset($ErrorCount) && $ErrorCount==0) {?>
                            <div class="form-group row">
                                <div class="alert alert-success alert-dismissible">
                                    Bank Account Added<button type="button" class="close" data-dismiss="alert">&times;</button>
                                </div>
                            </div>
                        <?php } ?>
                        <?php
                           $data =  $mysql->select("select * from  _tbl_customer_bankinformations where CustomerID='".$_SESSION['User']['CustomerID']."'");
                           if (sizeof($data)==0) {
                        ?>
						<form action="" method="post" enctype="multipart/form-data" onsubmit="return SubmitFrm();">
							<div class="form-group" style="margin-bottom:0px">
								<label class="control-label" for="input-password">Account Name<span class="required" style="color:red">*</span></label>
								<input type="text" id="BankAccountName" name="BankAccountName" value="<?php echo (isset($_POST['BankAccountName']) ? $_POST['BankAccountName'] :"");?>" class="form-control" />
								<span class="errorstring" id="ErrBankAccountName"><?php echo isset($ErrBankAccountName)? $ErrBankAccountName : "";?></span><br>
							</div>
                            <div class="form-group" style="margin-bottom:0px">
                                <label class="control-label" for="input-password">Account Number<span class="required" style="color:red">*</span></label>
                                <input type="text" id="BankAccountNumber" name="BankAccountNumber" value="<?php echo (isset($_POST['BankAccountNumber']) ? $_POST['BankAccountNumber'] :"");?>" class="form-control" />
                                <span class="errorstring" id="ErrBankAccountNumber"><?php echo isset($ErrBankAccountNumber)? $ErrBankAccountNumber : "";?></span><br>
                            </div>
                             <div class="form-group" style="margin-bottom:0px">
                                <label class="control-label" for="input-password">IFS Code<span class="required" style="color:red">*</span></label>
                                <input type="text" id="IFSCode" name="IFSCode" value="<?php echo (isset($_POST['IFSCode']) ? $_POST['IFSCode'] :"");?>" class="form-control" />
                                <span class="errorstring" id="ErrIFSCode"><?php echo isset($ErrIFSCode)? $ErrIFSCode : "";?></span><br>
                            </div>
							<div class="form-group">
								<span class="errorstring" style="text-align: center"><?php echo isset($successmessage)? $successmessage : "";?></span>
							</div>
                            <a href="MyPage.php"><input type="button" value="Back" class="btn btn-outline-primary" /></a>
							<input type="submit" value="Save Bank Account" class="btn btn-primary"  name="btnsubmit" />
                        </form>
                        <?php } else {?>
                           <div class="form-group" style="margin-bottom:0px">
                                <label class="control-label" for="input-password">Account Name<span class="required" style="color:red">*</span></label>
                                <input type="text" readonly="readonly" value="<?php echo $data[0]['BankAccountName'];?>" class="form-control" />
                            </div>
                            <div class="form-group" style="margin-bottom:0px">
                                <label class="control-label" for="input-password">Account Number<span class="required" style="color:red">*</span></label>
                                <input type="text" readonly="readonly"  value="<?php echo $data[0]['BankAccountNumber'];?>" class="form-control" />
                            </div>
                             <div class="form-group" style="margin-bottom:0px">
                                <label class="control-label" for="input-password">IFS Code<span class="required" style="color:red">*</span></label>
                                <input type="text" readonly="readonly" value="<?php echo $data[0]['IFSCode'];?>" class="form-control" />

                            </div>
                        <?php } ?>
					</div>
				</div> 
			</div>
		</div>
	</div>
</div>
<?php include_once("footer.php");?>
<script>
$(document).ready(function () {
    $("#BankAccountName").blur(function () {
        IsNonEmpty("BankAccountName","ErrBankAccountName","Please Enter Bank Account Name");
    });
    
    $("#BankAccountNumber").blur(function () {
        IsNonEmpty("BankAccountNumber","ErrBankAccountNumber","Please Enter Bank Account Number");
    });
    
    $("#IFSCode").blur(function () {
        IsNonEmpty("IFSCode","ErrIFSCode","Please Enter Bank IFS Code");
    });
    
});
function SubmitFrm() {
        ErrorCount=0;    
        $('#ErrBankAccountName').html("");
        $('#ErrBankAccountNumber').html("");
        $('#ErrIFSCode').html("");
 
        IsNonEmpty("BankAccountName","ErrBankAccountName","Please Enter Bank Account Name");
        IsNonEmpty("BankAccountNumber","ErrBankAccountNumber","Please Enter Bank Account Number");
        IsNonEmpty("IFSCode","ErrIFSCode","Please Enter Bank IFS Code");      
        
                return (ErrorCount==0) ? true : false;
         }
</script>