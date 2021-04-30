<?php
    if (isset($_POST['btnsubmit'])) {
        $error=0;
        $getpassword = $mysql->select("select * from `_tbl_tour_agents` where `AgentID`='".$_SESSION['User']['AgentID']."'");
        if ($getpassword[0]['LoginPassword']!=$_POST['CurrentPassword']) {
                $error++; ?>
                <script>
                    $(document).ready(function() {
                        swal("Incorrect Current Password!", {
                            icon : "error" 
                        });
                     });
                </script>
        <?php }
        
        if ($error==0) { 
            $mysql->execute("update `_tbl_tour_agents` set `LoginPassword`='".$_POST['confirmnewpassword']."' where `AgentID`='".$_SESSION['User']['AgentID']."'"); 
            unset($_POST);
        ?>
            <script>
              $(document).ready(function() {
                    swal("Password Changed sucessfully!", {
                        icon : "success" 
                    });
                 });
            </script>
        <?php } 
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
                        </div>
                        <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitPassword();">
                            <div class="card-body">
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Current Password <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <div class="input-icon">
                                            <input type="Password" class="form-control" id="CurrentPassword" name="CurrentPassword" placeholder="Enter Current Password" value="<?php echo (isset($_POST['CurrentPassword']) ? $_POST['CurrentPassword'] :"");?>">
                                            <span class="input-icon-addon"  onclick="showHidePwd('CurrentPassword',$(this))">
                                                <i class="fas fa-eye-slash"></i>
                                            </span>
                                        </div>
                                        <span class="errorstring" id="ErrCurrentPassword"><?php echo isset($ErrCurrentPassword)? $ErrCurrentPassword : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">New Password <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <div class="input-icon">
                                            <input type="Password" class="form-control" id="Password" name="Password" placeholder="Enter New Password" value="<?php echo (isset($_POST['Password']) ? $_POST['Password'] :"");?>">
                                            <span class="input-icon-addon"  onclick="showHidePwd('Password',$(this))">
                                                <i class="fas fa-eye-slash"></i>
                                            </span>
                                        </div>
                                        <span class="errorstring" id="ErrPassword"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Confirm New Password <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <div class="input-icon">
                                            <input type="Password" class="form-control" id="confirmnewpassword" name="confirmnewpassword" placeholder="Enter Confirm New Password" value="<?php echo (isset($_POST['confirmnewpassword']) ? $_POST['confirmnewpassword'] :"");?>">
                                            <span class="input-icon-addon"  onclick="showHidePwd('confirmnewpassword',$(this))">
                                                <i class="fas fa-eye-slash"></i>
                                            </span>
                                        </div>
                                        <span class="errorstring" id="Errconfirmnewpassword"><?php echo isset($Errconfirmnewpassword)? $Errconfirmnewpassword : "";?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="btn btn-warning" type="submit" name="btnsubmit" value="Change Password">
                                        <button type="button" onclick="location.href='dashboard.php'" class="btn btn-outline-warning">Back</button>
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