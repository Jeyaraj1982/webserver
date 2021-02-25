<?php
    if (isset($_POST['submitpassword'])) {
        
        $error=0;
        $getpassword = $mysql->select("select * from `_tbl_admin` where  `AdminID`='".$_SESSION['User']['AdminID']."'");
        if($_POST['CPassword']==""){
            $error++;
            $ErrCPassword=Messages::CURRENT_PASSWORD_ERROR_EMPTY;    
        }else{
            if(strlen($_POST['CPassword']) < JApp::CURRENT_PASSWORD_MINIMUM_LENGTH){
                $error++;                                                                 
                $ErrCPassword=Messages::CURRENT_PASSWORD_ERROR_LESS_THAN_MINIMUM_LENGTH;    
            }
            if(strlen($_POST['CPassword']) > JApp::CURRENT_PASSWORD_MAXIMUM_LENGTH){
                $error++;                                                                 
                $ErrCPassword=Messages::CURRENT_PASSWORD_ERROR_GREATER_THAN_MAXIMUM_LENGTH;    
            }
            if ($getpassword[0]['Password']!=$_POST['CPassword']) {
                $error++;
                $ErrCPassword=Messages::CURRENT_PASSWORD_ERROR_INCORRECT;    
            } 
        }
        if($_POST['CNPassword']==""){
            $error++;
            $ErrCNPassword=Messages::LOGIN_PASSWORD_ERROR_EMPTY;    
        }else{
            if(strlen($_POST['CNPassword']) < JApp::LOGIN_PASSWORD_MINIMUM_LENGTH){
                $error++;                                                                 
                $ErrCNPassword=Messages::LOGIN_PASSWORD_ERROR_LESS_THAN_MINIMUM_LENGTH;    
            }
            if(strlen($_POST['CNPassword']) > JApp::LOGIN_PASSWORD_MAXIMUM_LENGTH){
                $error++;                                                                 
                $ErrCNPassword=Messages::LOGIN_PASSWORD_ERROR_GREATER_THAN_MAXIMUM_LENGTH;    
            }     
        }
        if($_POST['CCNPassword']==""){
            $error++;
            $ErrCCNPassword=Messages::CONFIRM_PASSWORD_ERROR_EMPTY;    
        }else{
            if(strlen($_POST['CCNPassword']) < JApp::CONFIRM_PASSWORD_MINIMUM_LENGTH){
                $error++;                                                                 
                $ErrCCNPassword=Messages::CONFIRM_PASSWORD_ERROR_LESS_THAN_MINIMUM_LENGTH;    
            }
            if(strlen($_POST['CCNPassword']) > JApp::CONFIRM_PASSWORD_MAXIMUM_LENGTH){
                $error++;                                                                 
                $ErrCCNPassword=Messages::CONFIRM_PASSWORD_ERROR_GREATER_THAN_MAXIMUM_LENGTH;    
            } 
            if (!(($_POST['CNPassword']==$_POST['CCNPassword']))) {
                $error++;
                $ErrCCNPassword = Messages::CONFIRM_PASSWORD_ERROR_NOT_MATCH;    
            }    
        }
        
        
        if ($error==0) {
            $mysql->insert("_tbl_change_password_log",array("AdminID"     => $_SESSION['User']['AdminID'],
                                                            "OldPassword" => $getpassword[0]['Password'],
                                                            "NewPassword" => $_POST['CNPassword'],
                                                            "ChangeOn"    => date("Y-m-d H:i:s")));
            $mysql->execute("update `_tbl_admin` set `Password`='".$_POST['CNPassword']."' where AdminID='".$_SESSION['User']['AdminID']."'");  
                
            unset($_POST);
            ?>
            <script>
              $(document).ready(function() {
                    swal("Password Changed sucessfully!", {
                        icon : "success" 
                    });
                 });
            </script>
            <?php
        } 
}                                   
?>
<script>
$(document).ready(function () {
    $("#Password").blur(function () {
        IsNonEmpty("Password","ErrPassword","Please Enter New Password");
    });
    $("#CurrentPassword").blur(function () {
        IsNonEmpty("CurrentPassword","ErrCurrentPassword","Please Enter Current Password");
    });
    $("#confirmnewpassword").blur(function () {
        IsNonEmpty("confirmnewpassword","Errconfirmnewpassword","Please Enter Confirm New Password");
    });
});
function SubmitPassword() {
        ErrorCount=0;    
        $('#ErrPassword').html("");
        $('#Errconfirmnewpassword').html("");
        $('#ErrCurrentPassword').html("");
        
        IsNonEmpty("CurrentPassword","ErrCurrentPassword","Please Enter Current Password");
        IsNonEmpty("Password","ErrPassword","Please Enter New Password");
        IsNonEmpty("confirmnewpassword","Errconfirmnewpassword","Please Enter Confirm New Password"); 
        var password = document.getElementById("Password").value;
                var confirmPassword = document.getElementById("confirmnewpassword").value;
                if (password != confirmPassword) {
                    ErrorCount++;
                    $('#Errconfirmnewpassword').html("Passwords do not match.");
                }
                return (ErrorCount==0) ? true : false;
         }
</script>

         
              
        <div class="main-panel">
            <div class="container">
                <div class="page-inner"> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Change Password</div>
									<?php $lastchange = $mysql->select("select * from _tbl_change_password_log where AdminID='".$_SESSION['User']['AdminID']."' order by LogID desc");?>
                    <?php if(sizeof($lastchange)>0){ ?>
                        <span style="font-size:12px">Last Change On <?php echo date("M d, Y H:i",strtotime($lastchange[0]['ChangeOn']));?></span>    
                    <?php } ?>
                                </div>
                                <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitPassword();">
                                    <div class="card-body">
                                        <div class="form-group">
											<label for="email2">Current Password</label>
											<div class="input-icon">
												<input class="form-control" id="CPassword" name="CPassword" value="<?php echo isset($_POST['CPassword']) ? $_POST['CPassword'] : "";?>" placeholder="Current Password" type="password">
												<span class="input-icon-addon"  onclick="showHidePwd('CPassword',$(this))">
													<i class="fas fa-eye-slash"></i>
												</span>
											</div>
											<span class="errorstring" id="ErrCPassword" style="color: red"><?php echo isset($ErrCPassword)? $ErrCPassword : "";?></span>
										</div>
										<div class="form-group">
											<label for="email2">New Password</label>
											<div class="input-icon">
												<input class="form-control" id="CNPassword" name="CNPassword"  value="<?php echo isset($_POST['CNPassword']) ? $_POST['CNPassword'] : "";?>" placeholder="New Password" type="password">
												<span class="input-icon-addon"  onclick="showHidePwd('CNPassword',$(this))">
													<i class="fas fa-eye-slash"></i>
												</span>
											</div>
											<span class="errorstring" id="ErrCNPassword" style="color: red"><?php echo isset($ErrCNPassword)? $ErrCNPassword : "";?></span>
										</div>
										<div class="form-group">
											<label for="password">Confirm New Password</label>
											<div class="input-icon">
												<input class="form-control" id="CCNPassword" name="CCNPassword" value="<?php echo isset($_POST['CCNPassword']) ? $_POST['CCNPassword'] : "";?>"  placeholder="Confirm New Password" type="password">
												<span class="input-icon-addon"  onclick="showHidePwd('CCNPassword',$(this))">
													<i class="fas fa-eye-slash"></i>
												</span>
											</div>
											<span class="errorstring" id="ErrCCNPassword" style="color: red"><?php echo isset($ErrCCNPassword)? $ErrCCNPassword : "";?></span>
										</div> 
										<div class="form-group">
											<button type="submit" id="submitpassword" name="submitpassword" class="btn btn-primary" style="display: none;">Change Password</button>&nbsp;&nbsp;
											<button type="button" onclick="CallConfirmation()" class="btn btn-primary">Change Password</button>&nbsp;&nbsp;
										</div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<div class="modal fade right" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" style="top: 0px !important;">
    <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document" >
        <div class="modal-content" >
            <div id="xconfrimation_text"></div>
        </div>
    </div>
</div>
<script>
function CallConfirmation(){
    var txt= '<div class="modal-header" style="padding-bottom:5px">'
                 +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                 +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                    +'<span aria-hidden="true" style="color:black">&times;</span>'
                 +'</button>'
             +'</div>'
             +'<div class="modal-body">'
                +'<div class="form-group row">'                                                            
                    +'<div class="col-sm-12">'
                        +'Are you sure want to change password?<br>'
                    +'</div>'
                +'</div>'
             +'</div>'
             +'<div class="modal-footer">'
                +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                +'<button type="button" class="btn btn-success" onclick="Change()" >Yes, Confirm</button>'
             +'</div>';
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");                                                      
}
function Change() {
    $("#submitpassword").trigger( "click" );
}
</script>