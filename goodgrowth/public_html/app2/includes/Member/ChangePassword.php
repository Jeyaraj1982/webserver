<?php
        function validateCurrentForm(&$ErrorString) {
            
            global $userData;
            
            if (strlen(trim($_POST['CurrentPassword']))<2) {
                $ErrorString = ErrorMsg("Please enter valid current password");  
                return false;
            }
            
            if (strlen(trim($_POST['NewPassword']))<6) {
                $ErrorString = ErrorMsg("New password must have morethan 6 characters");  
                return false;
            }
            
            if (strlen(trim($_POST['ConfirmNewPassword']))<6) {
                $ErrorString =  ErrorMsg("Please enter valid Confrim New Password"); 
                return false; 
            }
            
            if ($_POST['NewPassword']!=$_POST['ConfirmNewPassword']) {
                $ErrorString =  ErrorMsg("New Password and Confirm New Password must be same"); 
                return false;
            } 
            
            if ($userData['MemberPassword']!=$_POST['CurrentPassword']) {
                $ErrorString =  ErrorMsg("Current Password is incorrect");
                return false;
            }  
            return true;
        }
        
        if (isset($_POST['ChangePwdBtn'])) {
            
            $res = validateCurrentForm($ErrorString);
            if ($res) {
                 $mysql->execute("update _tbl_Members set MemberPassword='".trim($_POST['NewPassword'])."'  where MemberID='".$userData['MemberID']."'");
                 echo SuccessMsg("Your new password saved successfully");
                 $mysql->insert("_tbl_Members_Events",array("MemberID"=>$userData['MemberID'],
                                                            "EventDate"=>date("Y-m-d H:i:s"),
                                                            "EventTitle"=>"ChangePassword",
                                                            "OldData"=>$userData['MemberPassword'],
                                                            "NewData"=>$_POST['NewPassword']));
                 unset($_POST);
            } else {
                $ErrorString;
            }       
        }
        $lastChanged = $mysql->select("select * from _tbl_Members_Events where MemberID='".$userData['MemberID']."' order by EventID Desc limit 0,1");
    ?>
<div class="content">
        <div class="hpanel">
                    <div class="panel-heading hbuilt">
                       Change Password
                    </div>
                    <div class="panel-body list">
                    <form action="" method="post">
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Current Password</label>
                            <div class="col-sm-4"><input type="password" class="form-control" name="CurrentPassword" value="<?php echo isset($_POST['CurrentPassword']) ? $_POST['CurrentPassword'] : '';?>" placeholder="Current Password"></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">New Password</label>
                            <div class="col-sm-4"><input type="password" class="form-control" name="NewPassword" value="<?php echo isset($_POST['NewPassword']) ? $_POST['NewPassword'] : '';?>"  placeholder="New Password"></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Confrim Password</label>
                            <div class="col-sm-4"><input type="password" class="form-control" name="ConfirmNewPassword"  value="<?php echo isset($_POST['ConfirmNewPassword']) ? $_POST['ConfirmNewPassword'] : '';?>"   placeholder="Confrim Password"></div>
                        </div>
                        <?php echo $ErrorString;?>
                        <input type="submit" class="btn btn-outline btn-success" name="ChangePwdBtn" value="Save Password"> 
                    </form>
                    <?php
                        if (sizeof($lastChanged)>0) {
                            echo "last changed ".putDateTime($lastChanged[0]['EventDate']);
                        }
                    ?>
                    </div>
                </div>
            </div>
        