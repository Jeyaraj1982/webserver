<div style="background:#F9F9F9;border:1px solid #F1F1F1;padding:10px;">
        <?php
        
        if (isset($_POST['pjemailid'])) {
            
            $ldata = $mysql->select("select * from _clients where isactive='1' and emailid='".$_POST['pjemailid']."' and password='".$_POST['pjpassword']."'");
            if (sizeof($ldata)) {
                $_SESSION['PJUSER']=$ldata[0];
                ?>
                     <script>
                       location.href="http://www.dealmaass.in/p/free_parttimejob_mypage";
                     </script>
                <?php
                
            } else {
                $msg = "Invalid Login Details";
            }
            
        }
        
        if ($_SESSION['PJUSER']['id']>0) {
            ?>
            
             <h3 style="text-align:left;font-family:arial;color:rgb(38,74,148);" id="yui_3_13_0_1_1384247625179_18712">Member's Area</h3>   
             <div style="font-size:12px;font-family:arial;line-height:24px;">
             Welcome <b><?php echo $_SESSION['PJUSER']['firstname'];?></b>,<br>
             <div style="margin-left:20px">
             
             <img src="http://www.dupont.com/etc/designs/dupont/tools/carouselnavigation/source/images/right-arrow-grey.png" align="absmiddle">&nbsp;&nbsp;<a target="_self" href="p/free_parttimejob_mypage" style="color:#333333">My Page</a><br>
             <img src="http://www.dupont.com/etc/designs/dupont/tools/carouselnavigation/source/images/right-arrow-grey.png" align="absmiddle">&nbsp;&nbsp;<a target="_self" href="p/free_parttimejob_earnings" style="color:#333333">My Earning</a><br>
             <img src="http://www.dupont.com/etc/designs/dupont/tools/carouselnavigation/source/images/right-arrow-grey.png" align="absmiddle">&nbsp;&nbsp;<a target="_self" href="p/free_parttimejob_mywithdrawals" style="color:#333333">My Withdrawals</a><br> 
             <img src="http://www.dupont.com/etc/designs/dupont/tools/carouselnavigation/source/images/right-arrow-grey.png" align="absmiddle">&nbsp;&nbsp;<a target="_self" href="p/free_parttimejob_addbank" style="color:#333333">Add Bank</a><br>
             <img src="http://www.dupont.com/etc/designs/dupont/tools/carouselnavigation/source/images/right-arrow-grey.png" align="absmiddle">&nbsp;&nbsp;<a target="_self" href="p/free_parttimejob_addnominee" style="color:#333333">Add Nominee</a><br>
             <img src="http://www.dupont.com/etc/designs/dupont/tools/carouselnavigation/source/images/right-arrow-grey.png" align="absmiddle">&nbsp;&nbsp;<a target="_self" href="p/free_parttimejob_changepassword" style="color:#333333">Change Password</a><br>
             <img src="http://www.dupont.com/etc/designs/dupont/tools/carouselnavigation/source/images/right-arrow-grey.png" align="absmiddle">&nbsp;&nbsp;<a target="_self" href="p/free_parttimejob_logout" style="color:#333333">Logout</a><br><br>
             <hr style="border:none;border-bottom:1px solid #ccc;">
             <img src="http://www.dupont.com/etc/designs/dupont/tools/carouselnavigation/source/images/right-arrow-grey.png" align="absmiddle">&nbsp;&nbsp;<a target="_self" href="p/free_parttimejob_admatter" style="color:#333333">Ad Matter</a><br>
             <img src="http://www.dupont.com/etc/designs/dupont/tools/carouselnavigation/source/images/right-arrow-grey.png" align="absmiddle">&nbsp;&nbsp;<a target="_self" href="p/free_parttimejob_startworking" style="color:#333333">Start Working</a><br>
             <img src="http://www.dupont.com/etc/designs/dupont/tools/carouselnavigation/source/images/right-arrow-grey.png" align="absmiddle">&nbsp;&nbsp;<a target="_self" href="p/free_parttimejob_extraincome" style="color:#333333">Extra Income</a><br>
             
             </div>
             
             
             </div>
             
            
            <?php                                                                                           

            
        } else {
            
?>   
 <h3 style="text-align:left;font-family:arial;color:rgb(38,74,148);" id="yui_3_13_0_1_1384247625179_18712">Member's Login</h3>     
  <form action="" method="post" target="_self">
        <table style="font-size:12px;color:#222;font-family:arial;color:#888888">
            <tr>
                <td>Email ID</td>
            </tr>
            <tr>
                <td><input type="text" name="pjemailid"></td>
            </tr>
            <tr>
                <td>Password</td>
            </tr>
            <tr>
                <td><input type="password" name="pjpassword"></td>
            </tr>
            <tr>
                <td  style="padding-top:5px"><input type="submit" style="border:none;padding:5px;background:#F574DB;color:#ffffff;font-weight:bold;font-family: arial;padding-left:20px;padding-right:20px;" name="loginBtn" value="Login"></td>
            </tr>
            <?php
                if (isset($msg)) {?>
            <tr>
                <td style='color:red'><?php echo $msg;?></td>
            </tr>
                <?php } ?>
        </table>
        </form>
            <br>             
         <h3 style="text-align:left;font-family:arial;color:rgb(38,74,148);">Pay Now</h3>     
        
        
         <div style="font-size:12px;font-family:arial;text-align:justify;color:#888888">
         <img src="http://static3.wikia.nocookie.net/__cb20120415234019/dragonvale/images/f/fd/Blue_Information_Sign.png" align="left" width="55" style="margin-right:10px"> If you don't pay training fee in previous registration session, don't worry just give registered email id and mobile number and pay training fee Rs. 300 and activate your account instantly.
         </div>
         <br> 
         <?php
            if (isset($_POST['ppjemailid'])) {
                
                $usr = $mysql->select("select * from _clients where emailid='".$_POST['ppjemailid']."' and mobileno='".$_POST['ppmobileno']."'");
                
                if (sizeof($usr)==1) {
                    
                    if ($usr[0]['isactive']==0) {
                        
                        ?>
                    <form action="http://www.dealmaass.com/paymentgateway.php" method="post" name="frmRsubmit" id="frmRsubmit" target="_self">
                        <input type="hidden" value="1" name="partimeJob" id="partimeJob">
                        <input type="hidden" value="<?php echo $usr[0]['id']; ?>" id="inUserid" name="inUserid">
                    </form> 
                    
                     <script>setTimeout("$('#frmRsubmit').submit();",2000);</script>
                    
                        <?php
                        $pmsg = "Please wait .... ";    
                        
                    } else {
                        $pmsg = "This member is already activated";
                    }
                    
                } else {
                    $pmsg = "Member Not Found";
                }
                
            }
?>
         <form action=""  method="post" target="_self">
         <table style="font-size:12px;color:#222;font-family:arial;color:#888888">
            <tr>
                <td>Registered Email ID</td>
            </tr>
            <tr>
                <td><input type="text" name="ppjemailid" size="22"></td>
            </tr>
              <tr>
                <td>Registered Mobile No</td>
            </tr>
            <tr>
                <td><input type="text" name="ppmobileno" size="22"></td>
            </tr>
            <tr>
                <td style="padding-top:5px"><input type="submit" style="border:none;padding:5px;background:#F574DB;color:#ffffff;font-weight:bold;font-family: arial;padding-left:20px;padding-right:20px;" name="loginBtn" value=" Pay Training Fee "></td>
            </tr>
            <?php
                if (isset($pmsg)) {?>
            <tr>
                <td style='color:red'><?php echo $pmsg;?></td>
            </tr>
                <?php } ?>
        </table>
        
        </form>
        
        
        <?php } ?>
        
        </div> 