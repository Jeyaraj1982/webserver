<?php
   $num = "+919944872965";
   $url = "https://api.telegram.org/bot951542210:AAGw8GyU_s_ptPAJDSQBB8NsBHBz6MQIp0s/sendContact?chat_id=1107300198&phone_number=".$num."&first_name=".$first_name;
  $response = file_get_contents($url, false, NULL);
  $jsondata = json_decode($response,true);
  echo "<pre>";
  print_r($jsondata);
  echo "</pre><br>";
?>