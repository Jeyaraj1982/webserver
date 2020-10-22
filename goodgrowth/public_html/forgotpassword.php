<?php $page='login';  include("file/header.php");?>
    <section class="team-section" style="padding-top:40px">
     <?php 
        include_once("config.php");
            use PHPMailer\PHPMailer\PHPMailer;
                use PHPMailer\PHPMailer\Exception; 
        if (isset($_POST['LoginBtn'])) {
              
            $userDatas = $mysql->select("select * from _tbl_Members where MemberUserName='".$_POST['UserName']."' or EmailID='".$_POST['UserName']."'");
            
            if (sizeof($userDatas)>0) {

                require 'app/lib/mail/src/Exception.php';
                require 'app/lib/mail/src/PHPMailer.php';
                require 'app/lib/mail/src/SMTP.php';
                $_SESSION['otp']=rand(1111,9999); 
                $_SESSION['MemID']=$userDatas[0]['MemberID']; 
                $_SESSION['Mem']=$userDatas[0]['MemberUserName']; 
                $_SESSION['Mail']=$userDatas[0]['EmailID']; 
                    
                    $cart = '<div style="width:650px;margin:0px auto">
                                <table style="width:100%">
                                    <tr>
                                        <td><img src="http://goodgrowth.in/images/logo.png"></td>
                                        <td style="width:300px;text-align:right">
                                            5/3, Kamalam Annamalai Complex,<br>
                                            Mudangiyar Road,<br>
                                            Rajapalayam - 626117.<br>
                                            Ph: +91-9751157370, 8870832788<br>
                                            Mail: goodgrowth@gmail.com.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Dear '.$userDatas[0]['MemberUserName'].', <Br><Br>Password Reset Security Code is '.$_SESSION['otp'].'</td>
                                    </tr>
                                </table>
                                </div>';
                          $mail = new PHPMailer;
                          $mail->isSMTP(); 
                          $mail->SMTPDebug = 0;
                          $mail->Host = "mail.goodgrowth.in";
                          $mail->Port = 465;
                          $mail->SMTPSecure = 'ssl';
                          $mail->SMTPAuth = true;
                          $mail->Username = "support@goodgrowth.in";
                          $mail->Password = "GoodGrowth";
                          $mail->setFrom("support@goodgrowth.in", "GoodGrowth");
                          $mail->addAddress($userDatas[0]['EmailID'],"GoodGrowth");
                          $mail->Subject = 'Password Reset';
                          $mail->msgHTML($cart);
                          $mail->AltBody = 'HTML messaging not supported';
                          if(!$mail->send()){
                            echo "Mailer Error: " . $mail->ErrorInfo;
                             $message ="Error. unable to process your request.";
                             $success = 0;
                          } else {
                              $success = 1;
                            
                          }
                            Log::MailLog(array("MemberID"=>$userDatas[0]['MemberID'],
                                               "MemberCode"=>$userDatas[0]['MemberCode'],
                                               "MailTo"=>$userDatas[0]['EmailID'],
                                               "Message"=>base64_encode($cart),
                                               "Mailed"=>$success,
                                               "ErrorMsg"=>$mail->ErrorInfo,
                                               "Category"=>"ForgetPassword"));
                            if ($success== 1) {
                                echo "<script>location.href='otp.php';</script>";
                            }
                } else {
                $message="Invalid. Please provide valid details.";
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
                                &nbsp;&nbsp;Please enter your valid Login Name or Registered Email Address and submit,<br>
                                &nbsp;&nbsp;we will send mail  OTP (security Code) to your registered email.
                                <table>
                                    <tr>
                                        <td style="padding:5px">
                                            <input type="text" style="width:400px" placeholder="Login Name or Email ID here ..." class="loginBox" name="UserName" value="<?php echo (isset($message)) ? $_POST['UserName'] : '' ; ?>" >    
                                        </td>
                                    </tr>
                                     
                                    <tr>
                                        <td style="padding:5px">
                                            <input type="Submit" value="Send Request" class="LoginBtn" name="LoginBtn">&nbsp;&nbsp;&nbsp;<a href="login.php">Login here</a>
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