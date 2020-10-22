<?php $page='login';  include("file/header.php");?>
    <section class="team-section" style="padding-top:40px">
    
     <?php
         if (isset($_POST['btnContinue'])) {
             
             if ($_SESSION['otp']==$_POST['otp']) {
                $_SESSION['otp']="XXX";
                 echo "<script>location.href='changepassword.php';</script>"; 
             }   else {
                $message="Invalid. You entered OTP is invalid.";   
             }
         }
    
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
                                <h2>&nbsp;Forgot Password</h2>
                                &nbsp;&nbsp;Dear <?php echo $_SESSION['Mem'];?>, we have sent an OTP (security code) to your mail (<?php echo  $_SESSION['Mail'];?>).<br>
                                &nbsp;&nbsp;Please enter mailed OTP in bellow box and click continue.<br>
                               
                                <table>
                                    <tr>
                                        <td style="padding:5px">
                                            <input type="text" style="width:400px" placeholder="Mail OTP here ..." class="loginBox" name="otp" value="<?php echo (isset($message)) ? $_POST['UserName'] : '' ; ?>" >    
                                        </td>
                                    </tr>
                                     
                                    <tr>
                                        <td style="padding:5px">
                                            <input type="Submit" value="Continue" class="LoginBtn" name="btnContinue">&nbsp;&nbsp;&nbsp;<a href="login.php">Login here</a>
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