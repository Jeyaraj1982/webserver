
<div style="padding:10px;border:1px solid #eee;background:#fff">
    <div class="heading1">
        <span>Edit Member</span>
    </div>
    <Br>
    <?php
     function validateCreateMemberForm(&$ErrorString) {
            
            global $userData,$Config,$mysql;
            
            if (strlen(trim($_POST['FirstName']))<2) {
                $ErrorString = ErrorMsg("Please enter valid First Name");  
                return false;
            }
            
            if (strlen(trim($_POST['LastName']))<2) {
                $ErrorString = ErrorMsg("Please enter valid Last Name");  
                return false;
            }
            
            if (strlen(trim($_POST['NickName']))<2) {
                $ErrorString = ErrorMsg("Please enter valid Nick Name");  
                return false;
            } 
            
            if (strlen(trim($_POST['DateofBirth']))<2) {
                $ErrorString = ErrorMsg("Please select valid Date of Birth");  
                return false;
            }
            
            $dob = date("Y",strtotime($_POST['DateofBirth']));
            if (!($dob<=$Config['DOB_YEAR_END'] && $dob>$Config['DOB_YEAR_START'])) {
                $ErrorString = ErrorMsg("Please enter valid date of birth, Member must have 18 years old");  
                return false;  
            }
            
            if (!((strlen(trim($_POST['MobileNumber']))==10) && $_POST['MobileNumber']<9999999999 && $_POST['MobileNumber']>6000000000)) {
                $ErrorString = ErrorMsg("Please enter valid Mobile Number");  
                return false;
            }
            
            $DupMobileNumber = $mysql->select("select * from _tbl_Members where MemberCode<>'".$_GET['MemberCode']."' and MobileNumber='".trim($_POST['MobileNumber'])."'");
            if (sizeof($DupMobileNumber)>0) {
                $ErrorString = ErrorMsg("Mobile number already exists. Please try another mobile number");  
                return false;  
            }
            
            if (strlen(trim($_POST['EmailID']))<2) {
                $ErrorString = ErrorMsg("Please enter valid Email ID");  
                return false;
            }
            
            if (!filter_var(trim($_POST['EmailID']), FILTER_VALIDATE_EMAIL)) {
                $ErrorString = ErrorMsg("Invalid email format. Please enter valid email id");
                 return false;
            }
            
            $DupEmailID = $mysql->select("select * from _tbl_Members where MemberCode<>'".$_GET['MemberCode']."' and EmailID='".trim($_POST['EmailID'])."'");
            if (sizeof($DupEmailID)>0) {
                $ErrorString = ErrorMsg("Email ID already exists. Please try another Email ID");  
                return false;  
            }
            
            if (strlen(trim($_POST['LoginName']))<2) {
                $ErrorString = ErrorMsg("Please Enter Login Name");  
                return false;
            }
            
            if (strlen(trim($_POST['LoginName']))<3) {
                $ErrorString = ErrorMsg("Login Name must have morethan 3 characters");  
                return false;
            }
            
            $DupLoginName = $mysql->select("select * from _tbl_Members where MemberCode<>'".$_GET['MemberCode']."' and LoginName='".trim($_POST['LoginName'])."'");
            if (sizeof($DupLoginName)>0) {
                $ErrorString = ErrorMsg("LoginName already exists. Please try another LoginName");  
                return false;  
            }   
             
            return true;
        }
        
        if (isset($_POST['EditMemberBtn'])) {
            
            $res = validateCreateMemberForm($ErrorString);
            if ($res) {
                
                $ID = $mysql->execute("update _tbl_Members set FirstName       = '".trim($_POST['FirstName'])."',
                                                               LastName        = '".trim($_POST['LastName'])."',
                                                               NickName        = '".trim($_POST['NickName'])."',
                                                               DateOfBirth     = '".trim($_POST['DateofBirth'])."',
                                                               MobileNumber    = '".trim($_POST['MobileNumber'])."',
                                                               EmailID         = '".trim($_POST['EmailID'])."',
                                                               MemberUserName  = '".trim($_POST['LoginName'])."' where MemberCode='".$_GET['MemberCode']."'");
                echo SuccessMsg("Member Updated Successfully");                                      
                unset($_POST);
            } else {
                echo $ErrorString;
            }   
        }                            
?>
<?php
        $member = $mysql->select("select * from _tbl_Members where MemberCode='".$_GET['MemberCode']."'");
    ?>
    <table style="width:100%">
        <tr>
            <td style="width:400px;vertical-align:top">
             <form action="" method="post">
                <table cellspacing="0" cellpadding="6" style="width:100%">
                    <tr>
                        <td style="padding-bottom:0px;padding-top:0px">Member Code</td>
                        <td style="padding-bottom:8px;padding-top:8px;padding-left:3px">
                            <?php echo $member[0]['MemberCode'];?>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-bottom:0px;padding-top:0px">Plan</td>
                        <td style="padding-bottom:8px;padding-top:8px;padding-left:3px">
                            <?php echo $member[0]['PlanString'];?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:150px;padding-bottom:0px;padding-top:0px">First Name</td>
                        <td style="padding-bottom:0px;padding-top:0px;padding-left:3px">
                            <input type="text" name="FirstName" placeholder="First Name" value="<?php echo isset($_POST['FirstName']) ? $_POST['FirstName'] : $member[0]['FirstName'];?>">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-bottom:0px;padding-top:0px">Last Name</td>
                        <td style="padding-bottom:0px;padding-top:8px;padding-left:3px">
                            <input type="text" name="LastName" placeholder="Last Name" value="<?php echo isset($_POST['LastName']) ? $_POST['LastName'] : $member[0]['LastName'];?>">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-bottom:0px;padding-top:0px">Nick Name</td>
                        <td style="padding-bottom:0px;padding-top:8px;padding-left:3px">
                            <input type="text" name="NickName" placeholder="Nick Name" value="<?php echo isset($_POST['NickName']) ? $_POST['NickName'] : $member[0]['NickName'];?>">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-bottom:0px;padding-top:0px">Date of Birth</td>
                        <td style="padding-bottom:0px;padding-top:8px;padding-left:3px">
                            <input id="datepicker" type="text" name="DateofBirth" placeholder="Date Of Birth" style="min-width:120px !important" value="<?php echo isset($_POST['DateofBirth']) ? $_POST['DateofBirth'] : $member[0]['DateOfBirth'];?>">
                            &nbsp;&nbsp;&nbsp;Sex&nbsp;&nbsp;&nbsp;&nbsp;     
                <select name="Sex" style="width:73px">
                    <option value="Male" <?php echo $member[0]['Sex']=="Male" ? " selected='selected' ": "";?> >Male</option>
                    <option value="FeMale" <?php echo $member[0]['Sex']=="FeMale" ? " selected='selected' ": "";?> >FeMale</option>
                </select>
                        </td>
                    </tr>  
                    <tr>
                        <td style="padding-bottom:0px;padding-top:0px">Mobile Number</td>
                        <td style="padding-bottom:0px;padding-top:8px;padding-left:3px">
                            <input type="text" name="MobileNumber" placeholder="Mobile Number" value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : $member[0]['MobileNumber'];?>">
                        </td>
                    </tr> 
                    <tr>
                        <td style="padding-bottom:0px;padding-top:0px">Email ID</td>
                        <td style="padding-bottom:0px;padding-top:8px;padding-left:3px"><input type="text" name="EmailID" placeholder="Email Address"  value="<?php echo isset($_POST['EmailID']) ? $_POST['EmailID'] : $member[0]['EmailID'];?>"> </td>
                    </tr>
                    <tr>
                        <td style="padding-bottom:0px;padding-top:0px">Login Name</td>
                        <td style="padding-bottom:0px;padding-top:8px;padding-left:3px"><input type="text" name="LoginName" placeholder="Login Name" value="<?php echo isset($_POST['LoginName']) ? $_POST['LoginName'] : $member[0]['MemberUserName'];?>"> </td>
                    </tr>  
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" class="SubmitBtn" name="EditMemberBtn" value="Update Member"></td>
                    </tr>
                </table>
                </form>
            </td>
            <td style="vertical-align:top">
                       
              
            </td>
        </tr>
    </table>
    
    <form action="dashboard.php" method="Get" >
            <select name="action">
                <option value="MemberView">View Member</option>
                <option value="MChangePassword">Change Password</option>
            </select>
            <input type="hidden" name="MemberCode" value="<?php echo $_GET['MemberCode'];?>">
            <input type="submit" class="SubmitBtn"  value="Go" style="padding:4px 20px !important">
            </form>
</div>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({
    dateFormat: "yy-mm-dd",
    
    });
    
  } );
  </script> 
   