<?php
//laktext
$bot = "1755553977:AAGWZNu-EoJMr_5uJvGwE2J_iyIjnZQ9jHs";
$data = ['url' => "https://www.aaranju.in/telegram_callback.php?id=21"];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot".$bot."/setwebhook");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $contents = curl_exec($ch);                                  
        curl_close($ch);
        print_r($contents);
 exit;
        //gbmaligai
$bot = "1721601512:AAEdRdGkWUaKx3jQPEgYr8jbpTj3NbapDR4";
$data = ['url' => "https://www.aaranju.in/telegram_callback.php?id=20"];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot".$bot."/setwebhook");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $contents = curl_exec($ch);                                  
        curl_close($ch);
        print_r($contents);
        
       
        //gbmaligai
$bot = "1727094449:AAEqsiKTTWFgxm0v2ovL-vyjkSiGjci5uSY";
$data = ['url' => "https://www.aaranju.in/telegram_callback.php?id=19"];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot".$bot."/setwebhook");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $contents = curl_exec($ch);                                  
        curl_close($ch);
        print_r($contents);
        
        exit;
//jalerts
$bot = "1357308306:AAEzLgx7Qo72KoJnO4jfxM_GoqfOi9c10gg";
$data = ['url' => "https://www.aaranju.in/telegram_callback.php?id=1"];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot".$bot."/setwebhook");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $contents = curl_exec($ch);                                  
        curl_close($ch);
        print_r($contents);
//abj        
$bot = "1102416744:AAHBrWSlf2tuQ8oeHKl2EzM8KWxHdWNi19I";
$data = ['url' => "https://www.aaranju.in/telegram_callback.php?id=17"];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot".$bot."/setwebhook");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $contents = curl_exec($ch);                                  
        curl_close($ch);
        print_r($contents);

        //https://api.telegram.org/bot{my_bot_token}/deleteWebhook
        //https://api.telegram.org/bot{my_bot_token}/getWebhookInfo
        //https://api.telegram.org/bot{my_bot_token}/setwebhook
        //https://api.telegram.org/bot{bot_token}/sendMessage?chat_id={chat_id}&text={notification_text}&parse_mode=markdown.
?>