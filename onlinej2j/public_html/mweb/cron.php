<?php
    include_once("/home/tksdonline/public_html/admin/config.php");
    
    
    if (date("i")*1 == 5 || date("i")*1 == 15 || date("i")*1 == 25 || date("i")*1 == 35 || date("i")*1 == 45 || date("i")*1 == 55)  {
       // $ch = curl_init("https://aaranju.in/test_whatsapp.php");
      //  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      //  $result = curl_exec($ch);
      //  curl_close($ch);
     //   $result = json_decode($result,true);
    }                                                           
     
        
    if ( date("H")*1 == 8 && date("i")*1 == 5) {
        $BalanceAlertAmount = 300;
        $count=0;

        $subscribed_agents = $mysql->select("select * from _tbl_member where TelegramID>0 and MapedTo<>3"); 
        foreach($subscribed_agents as $agent) {
            $balance = $application->getBalance($agent['MemberID']);
            if ($balance<=$BalanceAlertAmount) {
                $count++;
                TelegramMessageController::sendSMS($agent['TelegramID'],"Dear ".$agent['MemberName'].", Account balance is too low.  Please check and update",0,0);       
            }
        }
        TelegramMessageController::sendSMS(1107300198,"Balance alert has sent '".$count."' agents ".date("H")."-".date("i"),0,0);  
        TelegramMessageController::sendSMS(AdminTelegramID,"Balance alert has sent '".$count."' agents",0,0); 
    } 
?> 