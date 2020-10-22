<div style="padding:10px;border:1px solid #eee;background:#fff">
    <div class="heading1">
        <span>Member Information</span>
    </div>
    <Br>
    
      <?php
        $member = $mysql->select("select * from _tbl_Members where MemberCode='".$_GET['MemberCode']."'");
    ?>
    <table style="width:100%">
        <tr><td>
    <table cellspacing="0" cellpadding="6" style="width:100%">
        <tr>
            <td style="width:100px;">First Name</td>
            <td>
                <?php echo $member[0]['FirstName'];?>
            </td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td>
                <?php echo $member[0]['LastName'];?>
            </td>
        </tr>
        <tr>
            <td>Nick Name</td>
            <td>
                <?php echo $member[0]['NickName'];?>
            </td>
        </tr>
        <tr>
            <td>Date of Birth</td>
            <td>
                <?php echo putDate($member[0]['DateOfBirth']);?>
            </td>
        </tr>  
        <tr>
            <td>Mobile Number</td>
            <td>
                <?php echo $member[0]['MobileNumber'];?>
            </td>
        </tr> 
        <tr>
            <td>Email ID</td>
            <td>
                <?php echo $member[0]['EmailID'];?>
            </td>
        </tr>
        <tr>
            <td>Login Name</td>
            <td>
                <?php echo $member[0]['MemberUserName'];?>
            </td>
        </tr>  
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2">
            <form action="dashboard.php" method="Get" >
            <select name="action">
                <option value="MemberView">View Member</option>
                <option value="MEditMember">Edit Member</option>
                <option value="MChangePassword">Change Password</option>
            </select>
            <input type="hidden" name="MemberCode" value="<?php echo $_GET['MemberCode'];?>">
            <input type="submit" class="SubmitBtn"   value="Go" style="padding:4px 20px !important">
            </form>
            </td>
        </tr>
    </table>
    </td>
     <td style="vertical-align:top">
           
            <div style="padding:10px;border:1px solid #eee;background:#fff">
 <div class="heading1"><span>Change Password</span></div>
 <Br>
 <?php
        function validateCurrentForm(&$ErrorString) {
            
            global $userData;
            
          
            
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
            
            return true;
        }
        
        if (isset($_POST['ChangePwdBtn'])) {
            
            $res = validateCurrentForm($ErrorString);
            if ($res) {
                 $mysql->execute("update _tbl_Members set MemberPassword='".trim($_POST['NewPassword'])."'  where MemberCode='".$_GET['MemberCode']."'");
                 echo SuccessMsg("Your new password saved successfully");
                 $mysql->insert("_tbl_Members_Events",array("MemberID"=>$userData['MemberID'],
                                                            "EventDate"=>date("Y-m-d H:i:s"),
                                                            "EventTitle"=>"ChangePassword[Admin]",
                                                            "OldData"=>$userData['MemberPassword'],
                                                            "NewData"=>$_POST['NewPassword']));
                 unset($_POST);
            } else {
                echo $ErrorString;
            }       
        }
        $lastChanged = $mysql->select("select * from _tbl_Members_Events where MemberCode='".$_GET['MemberCode']."' order by EventID Desc limit 0,1");
    ?>
   <form action="" method="post">
    <table cellspacing="0" cellpadding="6" style="width:100%">
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
           
               
 
           
            </td>
        </tr>
    </table>
    
    
</div> 
  