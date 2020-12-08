<?php
include_once("config.php"); 
$message = '
            <div style="padding:45px;background:#e5e5e5;margin:20px;border-radius:10px;padding-top:20px;padding-bottom:10px;">
                <div style="text-align:center;padding-bottom:20px;">
                    <img src="https://www.klx.co.in/assets/cms/klx_log.png" style="height:30px;">&nbsp;&nbsp;
                    <img src="https://www.klx.co.in/assets/img/in.png" style="height:24px;border:1px solid #eee;border-radius:3px;">
                </div>
                <div style="border:0px solid black;text-align:left;padding:30px;background:white;border-radius:10px;">
                    Hello,
                    <br><br>
                    Your ad is live, share it with friends to sell faster:
                    <br><br>
                    <p style="text-align:center">
                        <a href="'.path_url.'"v"'.$ad['postadid'].'"-"'.parseTextToURL($ad['title']).'" style="font-size:16px;font-family:Poppins,sans-serif;font-weight:600;color:#ffffff;text-decoration:none;background-color:#3a77ff;border-top:12px solid #3a77ff;border-bottom:12px solid #3a77ff;border-left:36px solid #3a77ff;border-right:36px solid #3a77ff;display:inline-block">VIEW AD</a>
                    </p>               
                    <br> 
                    Thanks <br>
                    KLX Team
                </div>
                <p style="color:#888;padding:10px;text-align:center">Please do not reply this email. Replies to this message are routed to an unmonitored mailbox. For more information visit our help page or contact us here.</p>
            </div>';

            $mparam['MailTo']="sales@j2jsoftwaresolutions.com";
            $mparam['MailTo']="jeyaraj.s.ngl@gmail.com";
            $mparam['MemberID']=$_SESSION['USER']['userid'];
            $mparam['Subject']="KLX :) Your ad is now live!";
            $mparam['Message']=$message;
            MailController::Send($mparam,$mailError);     
?>