<?php $page="instamajo";?>
<?php include_once("settings_header.php");?>

<script>
$(document).ready(function () {
   $("#InstamajoName").blur(function () {
        IsNonEmpty("InstamajoName","ErrInstamajoName","Please Enter Instamajo Name");
   });
   $("#ActionUrl").blur(function () {
        IsNonEmpty("ActionUrl","ErrActionUrl","Please Enter Action Url");
   });
   $("#ClientID").blur(function () {
        IsNonEmpty("ClientID","ErrClientID","Please Enter Client ID");
   }); 
   $("#SecretKey").blur(function () {
        IsNonEmpty("SecretKey","ErrSecretKey","Please Enter Secret Key");
   });
   $("#SuccessUrl").blur(function () {
        IsNonEmpty("SuccessUrl","ErrSuccessUrl","Please Enter Success Url");
   });
   $("#FailureUrl").blur(function () {
        IsNonEmpty("FailureUrl","ErrFailureUrl","Please Enter Failure Url");
   });
   
});       
function SubmitInstamajo() {
                         $('#ErrInstamajoName').html("");
                         $('#ErrActionUrl').html("");
                         $('#ErrClientID').html("");
                         $('#ErrSecretKey').html("");
                         $('#ErrSuccessUrl').html("");
                         $('#ErrFailureUrl').html("");
                         
                         ErrorCount=0;
        
                        IsNonEmpty("InstamajoName","ErrInstamajoName","Please Enter Instamajo Name");
                        IsNonEmpty("ActionUrl","ErrActionUrl","Please Enter Action Url");
                        IsNonEmpty("ClientID","ErrClientID","Please Enter Client ID");
                        IsNonEmpty("SecretKey","ErrSecretKey","Please Enter Secret Key");
                        IsNonEmpty("SuccessUrl","ErrSuccessUrl","Please Enter Success Url");
                        IsNonEmpty("FailureUrl","ErrFailureUrl","Please Enter Failure Url");
                       
                        if (ErrorCount==0) {
                            return true;
                        } else{
                            return false;
                        }
                 
}
</script>
<div class="col-sm-10 rightwidget">
<form method="post" id="frmfrPaymentGateway">
    <input type="hidden" value="" name="txnPassword" id="txnPassword">
    <input type="hidden" value="VT0002" name="InstamajoSoftCode" id="InstamajoSoftCode">
    <input type="hidden" value="instamajo" name="InstamajoCodeValue" id="InstamajoCodeValue">
    <h4 class="card-title">Create Instamajo</h4>                    
						<div class="form-group row">
                            <label class="col-sm-3 col-form-label">Instamajo Name<span id="star">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="InstamajoName" name="InstamajoName" value="<?php echo isset($_POST['InstamajoName']) ? $_POST['InstamajoName'] : "";?>">
                                <span class="errorstring" id="ErrInstamajoName"><?php echo isset($ErrInstamajoName)? $ErrInstamajoName : "";?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Logo<span id="star">*</span></label>
                          <div class="col-sm-9">
                            <input type="file" id="InstamajoLogo" name="InstamajoLogo">
                            <span class="errorstring" id="ErrInstamajoLogo"><?php echo isset($ErrInstamajoLogo)? $ErrInstamajoLogo : "";?></span>
                          </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Action Url<span id="star">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="ActionUrl" name="ActionUrl" value="<?php echo isset($_POST['ActionUrl']) ? $_POST['ActionUrl'] : "";?>">
                                <span class="errorstring" id="ErrActionUrl"><?php echo isset($ErrActionUrl)? $ErrActionUrl : "";?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Client ID<span id="star">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="ClientID" name="ClientID" value="<?php echo isset($_POST['ClientID']) ? $_POST['ClientID'] : "";?>">
                                <span class="errorstring" id="ErrClientID"><?php echo isset($ErrClientID)? $ErrClientID : "";?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Secret Key<span id="star">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="SecretKey" name="SecretKey" value="<?php echo isset($_POST['SecretKey']) ? $_POST['SecretKey'] : "";?>">
                                <span class="errorstring" id="ErrSecretKey"><?php echo isset($ErrSecretKey)? $ErrSecretKey : "";?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Mode<span id="star">*</span></label>
                            <div class="col-sm-4">
                                <select class="form-control" id="Mode"  name="Mode" >
                                    <option value="Live" <?php echo ($_POST['Mode']=="Live") ? " selected='selected' " : "";?>>Live</option>
                                    <option value="Test" <?php echo ($_POST['Mode']=="Test") ? " selected='selected' " : "";?>>Test</option>
                                </select>
                              <span class="errorstring" id="ErrMode"><?php echo isset($ErrMode)? $ErrMode : "";?></span>
                            </div>
							<label class="col-sm-2 col-form-label">Status<span id="star">*</span></label>
							<div class="col-sm-3">
							    <select class="form-control" id="Status"  name="Status" >
                                    <option value="1" <?php echo ($_POST['Status']=="1") ? " selected='selected' " : "";?>>Active</option>
							        <option value="0" <?php echo ($_POST['Status']=="0") ? " selected='selected' " : "";?>>Deactive</option>
						        </select>
							</div>
						</div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Success Url<span id="star">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="SuccessUrl" name="SuccessUrl" value="<?php echo isset($_POST['SuccessUrl']) ? $_POST['SuccessUrl'] : "";?>">
                                <span class="errorstring" id="ErrSuccessUrl"><?php echo isset($ErrSuccessUrl)? $ErrSuccessUrl : "";?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Failure Url<span id="star">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="FailureUrl" name="FailureUrl" value="<?php echo isset($_POST['FailureUrl']) ? $_POST['FailureUrl'] : "";?>">
                                <span class="errorstring" id="ErrFailureUrl"><?php echo isset($ErrFailureUrl)? $ErrFailureUrl : "";?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Remarks</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="InstaRemarks" name="InstaRemarks"><?php echo isset($_POST['InstaRemarks']) ? $_POST['InstaRemarks'] : "";?></textarea>
                                <span class="errorstring" id="ErrInstaRemarks"><?php echo isset($ErrInstaRemarks)? $ErrInstaRemarks : "";?></span>
                            </div>
                        </div> 
		           
		<div class="form-group row" >
						<div class="col-sm-12" style="text-align:right">
							&nbsp;<a href="javascript:void(0)" class="btn btn-default" style="padding:7px 20px" onclick="AppSettings.ConfirmGotoBackFromCreateInstamajo()">Cancel</a>&nbsp;
							<a href="javascript:void(0)" onclick="PaymentGateway.ConfirmCreateInstamajo()" class="btn btn-primary">Create</a>
						</div>
					</div>
	</div>
    
</form>
<div class="modal" id="PubplishNow" data-backdrop="static" >
		<div class="modal-dialog" >
			<div class="modal-content" id="Publish_body"  style="max-height: 360px;min-height: 360px;" >
		
			</div>
		</div>
	</div>
</div>

<?php include_once("settings_footer.php");?>                    