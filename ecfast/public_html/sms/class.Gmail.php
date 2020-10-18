<?php

    class Gmail {
        
        function mailTo($username, $password, $from, $namefrom, $to, $nameto, $subject, $message, $j2juserid, $isSecure = 0) {
        
            global $mysql;
            
            $smtpServer = "tls://smtp.gmail.com";
            $port       = "465";
            $timeout    = "45"; 
            $localhost  = $_SERVER['REMOTE_ADDR'];
            $newLine    = "\r\n"; 
            $mailArray  = array("userid"     => $j2juserid,
                                "mailedon"   => date("Y-m-d H:i:s"),
                                "mailedfrom" => $from,
                                "mailedto"   => $to,
                                "subject"    => $subject,
                                "content"    => $message,
                                "issend"     => 0,
                                "issecure"   => $isSecure);
                               
            $smtpConnect  = fsockopen($smtpServer, $port, $errno, $errstr, $timeout);
            $smtpResponse = fgets($smtpConnect, 4096);
            
            if(empty($smtpConnect)) {
                $mysql->insert("_tblmails",$mailArray);                  
                $output = "Failed to connect: $smtpResponse";
                return false;
            } else {
                $logArray['connection'] = "Connected to: $smtpResponse";
            }
            
            $mailArray['issend']=1;

            fputs($smtpConnect, "HELO $localhost". $newLine);
            $smtpResponse = fgets($smtpConnect, 4096);
            $logArray['heloresponse2'] = "$smtpResponse";
            
            fputs($smtpConnect,"AUTH LOGIN" . $newLine);
            $smtpResponse = fgets($smtpConnect, 4096);
            $logArray['authrequest'] = "$smtpResponse";
            
            fputs($smtpConnect, base64_encode($username) . $newLine);
            $smtpResponse = fgets($smtpConnect, 4096);
            $logArray['authusername'] = "$smtpResponse";

            fputs($smtpConnect, base64_encode($password) . $newLine);
            $smtpResponse = fgets($smtpConnect, 4096);
            $logArray['authpassword'] = "$smtpResponse";

            fputs($smtpConnect, "MAIL FROM: <$from>" . $newLine);
            $smtpResponse = fgets($smtpConnect, 4096);
            $logArray['mailfromresponse'] = "$smtpResponse";
            
            fputs($smtpConnect, "RCPT TO: <$to>" . $newLine);
            $smtpResponse = fgets($smtpConnect, 4096);
            $logArray['mailtoresponse'] = "$smtpResponse";

            fputs($smtpConnect, "DATA" . $newLine);
            $smtpResponse = fgets($smtpConnect, 4096);
            $logArray['data1response'] = "$smtpResponse";

            $headers = "MIME-Version: 1.0" . $newLine;
            $headers .= "Content-type: text/html; charset=utf-8" . $newLine;
            //$headers .= "To: $nameto $to1" . $newLine;
            //$headers .= "To: $nameto <$to>" . $newLine;
          //  $headers .= "To: ".$to." <".$nameto.">" . $newLine;
            //$headers .= "From: $namefrom <$from>" . $newLine;
          //  $headers .= "From: ".$from." <".$namefrom.">" . $newLine;
            
            fputs($smtpConnect, "To: <$to>\r\nFrom: $from\r\nSubject: $subject\r\n$headers\r\n\r\n$message\r\n.\r\n");
            $smtpResponse = fgets($smtpConnect, 4096);
            $logArray['data2response'] = "$smtpResponse";
            
            fputs($smtpConnect,"QUIT" . $newLine);
            $smtpResponse = fgets($smtpConnect, 4096);
            $logArray['quitresponse'] = "$smtpResponse";
            $logArray['quitcode'] = substr($smtpResponse,0,3);
            fclose($smtpConnect);

            $mysql->insert("_tblmails",$mailArray);                  
            
            return true;
        
        }
    
    }
?>