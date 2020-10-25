<?php


$bot_id = "1357308306:AAEzLgx7Qo72KoJnO4jfxM_GoqfOi9c10gg";


$bot_url    = "https://api.telegram.org/bot".$bot_id."/";
//$chat_id = "1107300198"; //jeyaraj
//$chat_id = "316574188";
$chat_id = "1330085047";
$url        = $bot_url . "sendPhoto?chat_id=" . $chat_id ;
$url        = $bot_url . "sendDocument?chat_id=" . $chat_id ;


           //'photo'     => new CURLFile(realpath("/path/to/image.png"))
$post_fields = array('chat_id'   => $chat_id,
    
    'photo'     => 'http://tksdonlineservice.in/assets/img/logo.png'
);
$post_fields = array('chat_id'   => $chat_id,
    
    'document'     => 'http://tksdonlineservice.in/test.pdf'
);



/*$post_fields = [
    'chat_id' => '316574188',                        
    'text' => 'Welcome to J2J Softwar Solutions!'
];*/
   
   //$url =  "https://api.telegram.org/bot$bot_id/sendMessage?" . http_build_query($post_fields);
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Content-Type:multipart/form-data"
));
curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields); 
$output = curl_exec($ch);  
echo $output;

 
         exit;
class Telegram {
    
    var $botID = "1357308306:AAEzLgx7Qo72KoJnO4jfxM_GoqfOi9c10gg";
    
    function sendTextMessage($chatID,$message) {
        
        $data = ['chat_id' => $chatID,'text' => $message];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot".$this->botID."/sendMessage?".http_build_query($data));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $contents = curl_exec($ch);                                  
        curl_close($ch);
        return $contents;
    }
    
     function sendImage($chatID,$url) {
        
        $post_fields = array('chat_id'   => $chatID, 'photo'     => $url);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot".$this->botID."/sendPhoto?chat_id=".$chatID);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type:multipart/form-data"
        ));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
        $contents = curl_exec($ch);                                  
        curl_close($ch);
        return $contents;
    }
    
    function sendDocument($chatID,$url) {
        
        $post_fields = array('chat_id'   => $chatID, 'document'     => $url);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot".$this->botID."/sendDocument?chat_id=".$chatID);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type:multipart/form-data"
        ));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
        $contents = curl_exec($ch);                                  
        curl_close($ch);
        return $contents;
    }
}
  ?>   