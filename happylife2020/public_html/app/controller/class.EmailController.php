 <?php
    class MailController {
        
        static public function Send($param,&$mailError) {
            reInitMail();
            global $mail,$mysql;
            reInitMail();
            $reqID = $mysql->insert("_tbl_logs_email",array("EmailTo"          => $param['MailTo'],
                                                            "EmaildFor"        => $param['Category'],
                                                            "MemberID"         => isset($param['MemberID']) ? $param['MemberID'] : 0,
                                                            "EmailSubject"     => $param['Subject'],
                                                            "EmailContent"     => $param['Message'],
                                                            "EmailRequestedOn" => date("Y-m-d H:i:s")));
            $mail->isSMTP(); 
            $mail->SMTPDebug = 0;
            $mail->Host = "mail.happylife2020.in";
            $mail->Port = 465;
            $mail->SMTPSecure = "ssl";
            $mail->SMTPAuth   = true;
            $mail->Username   = "support@happylife2020.in";
            $mail->Password   = "Welcome@@82";
            $mail->Subject    = $param['Subject'];
            $mail->setFrom("Happylife2020".".support@happylife2020.in","Happylife2020");
            $mail->addAddress($param['MailTo'],"");
            $mail->msgHTML($param['Message']);
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