<div style="padding:10px;border:1px solid #eee;background:#fff">
    <div class="heading1">
        <span>Change Password</span>
    </div>
    <Br>
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
                echo $ErrorString;
            }       
        }
        $lastChanged = $mysql->select("select * from _tbl_Members_Events where MemberID='".$userData['MemberID']."' order by EventID Desc limit 0,1");
    ?>
    <form action="" method="post">
    <table cellspacing="0" cellpadding="6" style="width:100%">
        <tr>
            <td style="width:150px;padding-bottom:0px;padding-top:0px">Current Password</td>
            <td style="padding-bottom:0px;padding-top:0px;padding-left:3px"><input type="password" name="CurrentPassword" value="<?php echo isset($_POST['CurrentPassword']) ? $_POST['CurrentPassword'] : '';?>" placeholder="Current Password"> </td>
        </tr>
        <tr>
            <td style="padding-bottom:0px;padding-top:0px">New Password</td>
            <td style="padding-bottom:8px;padding-top:8px;padding-left:3px"><input type="password" name="NewPassword" value="<?php echo isset($_POST['NewPassword']) ? $_POST['NewPassword'] : '';?>"  placeholder="New Password"> </td>
        </tr>
        <tr>
            <td style="padding-bottom:0px;padding-top:0px">Confrim Password</td>
            <td style="padding-bottom:0px;padding-top:0px;padding-left:3px"><input type="password" name="ConfirmNewPassword"  value="<?php echo isset($_POST['ConfirmNewPassword']) ? $_POST['ConfirmNewPassword'] : '';?>"   placeholder="Confrim Password"> </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" class="SubmitBtn" name="ChangePwdBtn" value="Save Password"></td>
        </tr>
    </table>
    </form>
    <?php
        if (sizeof($lastChanged)>0) {
            echo "last changed ".putDateTime($lastChanged[0]['EventDate']);
        }
    ?>
</div> 
   