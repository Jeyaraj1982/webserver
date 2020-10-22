<?php $page='login';  include("file/header.php");?>
    <section class="team-section" style="padding-top:40px">
     <?php 
       
        include_once("config.php");
           
        
     ?>
     <style>
        .TMenu {cursor:pointer;color:#666;font-weight:bold;font-size:12px;font-family:arial;border-radius:0px 0px 5px 5px;background:#c4ed0e;float:left;margin-right:20px;padding:5px 20px;}
        .TMenu:hover { background:#a7ce0a;color:#fff}
        .loginBox {border-radius:5px;border:1px solid #a7ce0a;padding:5px;color:#444;width:250px;padding-left:10px;}
        .loginBox:focus {background:#f9fcef}
        .LoginBtn {cursor:pointer;padding:5px 15px;background:#a7ce0a;border:1px solid #a7ce0a;border-radius:5px;color:#fff;}
        .LoginBtn:hover {background:#f9fcef;color:#a7ce0a}
     </style>
     <form action="" method="post">
        <table style="width:1100px;margin:0px auto" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <table cellspacing="0" cellpadding="0" style="width:100%">
                        <tr>
                            <td style="width:508px" >
                                <h2>&nbsp;Change Password</h2>
                                <?php
                                if (isset($_POST['LoginBtn'])) {
            if ($_SESSION['otp']="XXX")   {
                
                if ($_POST['NPassword']!=$_POST['CNPassword']) {
                   $message = "New password and Re-Enter New password must be same";
                   $err=1;
                }
                 if (strlen(trim($_POST['NPassword']))<6) {
                   $message = "Password must have minimum length 6";
                   $err=1;
                }
                  if ($err==0) {
                if ($_POST['NPassword']==$_POST['CNPassword']) {
                    $mysql->execute("update _tbl_Members set MemberPassword='".$_POST['NPassword']."' where MemberID='". $_SESSION['MemID']."'");
                    echo "&nbsp;&nbsp;Password Changed. &nbsp;&nbsp;&nbsp;<a href='login.php'>Login here</a>";
                    echo "<style>#PBox{display:none}</style>";
                    unset($_SESSION);
                }
                  }
            } 
        }?>
                                  <table id="PBox" >
                                    <tr>
                                        <td style="padding:5px">
                                            <input type="text" style="width:400px" placeholder="New Password here ..." class="loginBox" name="NPassword" value="<?php echo (isset($message)) ? $_POST['NPassword'] : '' ; ?>" >    
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding:5px">
                                            <input type="text" style="width:400px" placeholder="Re-Enter New Password here ..." class="loginBox" name="CNPassword" value="<?php echo (isset($message)) ? $_POST['CNPassword'] : '' ; ?>" >    
                                        </td>
                                    </tr>
                                     
                                    <tr>
                                        <td style="padding:5px">
                                            <input type="Submit" value="Save Password" class="LoginBtn" name="LoginBtn"> 
                                        </td>
                                    </tr>
                                    <?php
                                        if (isset($message)) {
                                            echo "<tr><td  style='padding:5px'><div style='color:red;text-align:left'>&nbsp;".$message."</div></td></tr>";
                                        }
                                    ?>
                                </table>       
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
     </form> 
     </section>
<?php  include("file/footer.php");?>