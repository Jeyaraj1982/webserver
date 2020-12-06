<?php
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
?>