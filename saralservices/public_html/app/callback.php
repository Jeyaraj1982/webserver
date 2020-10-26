<?php
   
            $myFile = "callback_".date("Y_m_d").".txt";
            $fh = fopen($myFile, 'a') or die ("can't open file");
            $text = json_encode($_GET);
            fwrite($fh, "[".date("Y-m-d H:i:s")."]\t".$text."\n");
            fclose($fh);

//Airtel            
//https://mrobotics.in/api/recharge_get?api_token=b87fd7e9-db93-4b15-8281-2d73b1ab30fd&mobile_no=9944872965&amount=10&company_id=2&order_id=300&is_stv=false
//{"error":true,"errorMessage":"Request from Unknown IP","ip":"157.51.238.108"}   117.242.69.165

//{"lapu_no":"9789645608","balance":7321.4,"roffer":0,"status":"success","recharge_date":"2020-05-14T14:58:06.684Z","id":324714791,"lapu_id":352908,"user_id":3117,"company_id":2,"mobile_no":"9944872965","amount":10,"order_id":"300","ip_address":"157.51.238.108","updatedAt":"2020-05-14T14:58:10.742Z","createdAt":"2020-05-14T14:58:06.684Z","response":"Customer Balance Recharged Successfully","tnx_id":"1516618214"}
//{"error":true,"errorMessage":"Request from Unknown IP","ip":"157.51.125.247"}
?>