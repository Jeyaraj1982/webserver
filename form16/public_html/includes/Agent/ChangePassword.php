<?php
    if (isset($_POST['btnsubmit'])) {
        $data = $mysql->select("select * from `_tbl_Agents` where `AgentCode`='".$_SESSION['User']['AgentCode']."'");
        if($data[0]['Password']==$_POST['CurrentPassword']){
            $mysql->execute("update `_tbl_Agents` set `Password`='".$_POST['confirmnewpassword']."' where `AgentCode`='".$_SESSION['User']['AgentCode']."'"); 
            MobileSMS::sendSMS($data[0]['MobileNumber'],"Your password changed. Thanks Form16.online",$id);
                           $message = "Your password chnaged";
                           
                            $mparam['MailTo']=$data[0]['EmailID'];
                            $mparam['MemberID']=$id;
                            $mparam['Subject']="Password Changed";
                            $mparam['Message']=$message;
                            MailController::Send($mparam,$mailError);
            unset($_POST);
            ?>
            <script>
             $( document ).ready(function() {
     swal("Good job!", "Password Changed!", {
                        icon : "success",
                        buttons: {                    
                            confirm: {
                                className : 'btn btn-warning'                                                                  
                            }
                        },
                    });
});
                  
               
            </script>
            <?php
            //$successmessage ="Password Changed Successfully";
        }else {
             $ErrCurrentPassword ="Incorrect Current Password ";
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

        <!-- Sidebar -->
              
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Change Password</div>
                                </div>
                                <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitPassword();">
                                    <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left" style="font-weight:normal">Current Password <span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="Password" class="form-control  form-control-sm" id="CurrentPassword" name="CurrentPassword" placeholder="Enter Current Password" value="<?php echo (isset($_POST['CurrentPassword']) ? $_POST['CurrentPassword'] :"");?>">
                                                <span class="errorstring" id="ErrCurrentPassword"><?php echo isset($ErrCurrentPassword)? $ErrCurrentPassword : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left" style="font-weight:normal">New Password <span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="Password" class="form-control  form-control-sm" id="Password" name="Password" placeholder="Enter New Password" value="<?php echo (isset($_POST['Password']) ? $_POST['Password'] :"");?>">
                                                <span class="errorstring" id="ErrPassword"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left"  style="font-weight:normal">Confirm New Password <span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="Password" class="form-control  form-control-sm" id="confirmnewpassword" name="confirmnewpassword" placeholder="Enter Confirm New Password" value="<?php echo (isset($_POST['confirmnewpassword']) ? $_POST['confirmnewpassword'] :"");?>">
                                                <span class="errorstring" id="Errconfirmnewpassword"><?php echo isset($Errconfirmnewpassword)? $Errconfirmnewpassword : "";?></span>
                                            </div>
                                        </div>
                                        
                                      
                                    </div>
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12" style="text-align: right;">
                                                <a href="dashboard.php" class="btn btn-outline-danger">Cancel</a>
                                                <input class="btn btn-warning" type="submit" name="btnsubmit" value="Change Password">
                                                
                                            </div>                                        
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            