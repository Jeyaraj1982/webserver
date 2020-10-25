<?php
    date_default_timezone_set("Asia/Calcutta");
    include_once("class.Mysql.php");
    $d = file_get_contents('php://input');
    writeTxt(file_get_contents('php://input'));
    $param = json_decode(file_get_contents('php://input'),true);
    if ($_GET["id"]>0) {
        $mysql = new MySqlDb("localhost","aaranju_user","mysqlPwd","aaranju_database");
        $data = $mysql->select("select * from telegram_ids where userid='".$_GET["id"]."'");
        $reqid = $mysql->insert("telegram_requests",array("txndate"         => date("Y-m-d H:i:s"),
                                                          "userid"          => $_GET["id"],
                                                          "telegramid"      => $data[0]['telegramid'],
                                                          "chatid"          => $param['message']['chat']['id'],
                                                          "receviedtext"    => $param['message']['text'],
                                                          "receviedmessage" => str_replace("\n","",file_get_contents('php://input')),
                                                          "fromname"        => $param['message']['chat']['first_name']));
        $url = $data[0]['webservice']."?txnid=".$reqid."&clientid=".$param['message']['chat']['id']."&message=".urlencode($param['message']['text'])."&from=".urlencode($param['message']['chat']['first_name']); 
        $mysql->execute("update telegram_requests set  callbackurl='".$url."' where telegram_chatid='".$reqid."'");
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);          
        $chresult = curl_exec($ch);
  }
  
  function writeTxt($text) {
      $file = "telegram".date("Y_m_d").".txt";
      $myfile = fopen($file, "a") or die("Unable to open file!");
      fwrite($myfile,"\n".date('Y-m-d H:i:s')."\t".$text);
      fclose($myfile);
  }
/*
{"update_id":461654196,
  "message":{"message_id":16,
          "from":{"id":1107300198,"is_bot":false,"first_name":"Jeyaraj","language_code":"en"},
          "chat":{"id":1107300198,"first_name":"Jeyaraj","type":"private"},
          "date":1595575749,
          "text":"Hi 9"}}
*/
?>   