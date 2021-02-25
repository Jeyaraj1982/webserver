<?php
    class MailController {
        
        static public function Send($param,&$mailError) {
            reInitMail();
            global $mail,$mysql;
            reInitMail();
            $reqID = $mysql->insert("_tbl_logs_email",array("EmailTo"          => $param['MailTo'],
                                                            "EmaildFor"        => $param['Category'],
                                                            "CustomerID"       => isset($param['CustomerID']) ? $param['CustomerID'] : 0,
                                                            "EmailSubject"     => $param['Subject'],
                                                            "EmailContent"     => $param['Message'],
                                                            "EmailRequestedOn" => date("Y-m-d H:i:s")));
            $mail->isSMTP(); 
            $mail->SMTPDebug = 0;
            $mail->Host = Mail_Host;
            $mail->Port = 465;
            $mail->SMTPSecure = "ssl";
            $mail->SMTPAuth   = true;
            $mail->Username   = SMTP_UserName;
            $mail->Password   = SMTP_Password;
            $mail->Subject    = $param['Subject']; 
            $mail->setFrom("support".".".SMTP_UserName,SMTP_Sender);
            $mail->addAddress($param['MailTo'],"");
            $mail->msgHTML($param['Message']);
            if ($param['attachment']!="") {
                $mail->addAttachment($param['attachment']);
                $mysql->execute("update _tbl_logs_email set IsAttachment='1', AttachmentFile='".$param['attachment']."' where EmailLogID='".$reqID."'");
            }
            $mailError = $mail->ErrorInfo;
            
             
            if(!$mail->send()){
                $mysql->execute("update _tbl_logs_email set IsFailure='1', FailureMessage='".$mail->ErrorInfo."' where EmailLogID='".$reqID."'");
                $mailError = true;
                return false;
            } else {
                $mailError = false;
                $mysql->execute("update _tbl_logs_email set IsSuccess='1' where EmailLogID='".$reqID."'");
                return true;
            } 
        }
   }
?> 