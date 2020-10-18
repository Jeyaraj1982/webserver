<?php
header('Content-Type:application/json');
    /*
        J2J Software Solutions
        sales@j2jsoftwaresolutions.com
        Project ID: 519 Build: 985 @ 15APR2015
        Delivery 15APR2015
    */
        
    $sDirect = new SunDirect("RTLR-137334","555666",$_REQUEST['number'],$_REQUEST['amount'],$_REQUEST['mobileno']);
    echo $sDirect->res;
    
    class SunDirect {
        
        var $cookieFile = "";
        var $res;
        var $link;
        var $Wid="";
        
        function SunDirect($username,$password,$number,$amount,$customermobilenumber) {
            
           $username = "q8608114781";
           $password = "star12345";
           $number = "8282828282";
           $amount = "100";
            $this->cookieFile = "_sundirect".time().rand(333,333333).".txt";
        
            if(!file_exists($this->cookieFile)) {
                $fh = fopen($this->cookieFile, "w");
                fwrite($fh, "");
                fclose($fh);
            }

            $this->link ="https://msales.tatasky.com/TataSky/apps/services/api/SalesAndPartner/desktopbrowser/query";
             $this->_call(array("adapter"=>"HttpEVDAdapter","isAjaxRequest"=>"true","parameters"=>array("0rFyvSJQW81hLbjDMrm1LY+PGFeRV5GFuTvA2RM+5gahnrPhzBGPreHPCDuLjBYx","null","null"),"procedure"=>"doEVDLogin","x"=>"0.12956140723095455"));
             echo $this->res;
              echo "<br><Br>";
         $data = explode('"WL-Instance-Id":"',$this->res);
         $data = explode('"',$data[1]);
         $this->Wid=$data[0];
          echo   $this->Wid=$data[0];
            
             $this->_call(array("adapter"=>"HttpEVDAdapter","isAjaxRequest"=>"true","parameters"=>array("0rFyvSJQW81hLbjDMrm1LY+PGFeRV5GFuTvA2RM+5gahnrPhzBGPreHPCDuLjBYx","null","null"),"procedure"=>"doEVDLogin","x"=>"0.12956140723095455"));
             echo $this->res; 
            exit;
            
            
            //["0rFyvSJQW81hLbjDMrm1LY+PGFeRV5GFuTvA2RM+5gahnrPhzBGPreHPCDuLjBYx","null","null"]
            $this->link ="https://msales.tatasky.com/TataSky/apps/services/api/SalesAndPartner/desktopbrowser/query";
            // $this->_call(array("adapter"=>"HttpEVDAdapter","isAjaxRequest"=>"true","parameters"=>'["'.base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128,"tataskysaleandpa",'["'.$username.'","'.$password.'","MOBWEB"]',MCRYPT_MODE_CBC,"1234567890abcdef")).'","null","null"]',"procedure"=>"doEVDLogin","x"=>0.12956140723095455));
            //$this->_call(array("adapter"=>"HttpEVDAdapter","isAjaxRequest"=>"true","parameters"=>'["0rFyvSJQW81hLbjDMrm1LY+PGFeRV5GFuTvA2RM+5gahnrPhzBGPreHPCDuLjBYx","null","null"]',"procedure"=>"doEVDLogin","x"=>"0.12956140723095455"));
            //$this->_call(array("adapter"=>"HttpEVDAdapter","isAjaxRequest"=>"true","parameters"=>array("0rFyvSJQW81hLbjDMrm1LY+PGFeRV5GFuTvA2RM+5gahnrPhzBGPreHPCDuLjBYx","null","null"),"procedure"=>"doEVDLogin","x"=>"0.12956140723095455"));
            
            //$this->_call(array("adapter"=>"HttpEVDAdapter","isAjaxRequest"=>"true","parameters"=>array("0rFyvSJQW81hLbjDMrm1LY+PGFeRV5GFuTvA2RM+5gahnrPhzBGPreHPCDuLjBYx","null","null"),"procedure"=>"doEVDLogin","x"=>"0.7714818446905836"));
            $this->_call(array("adapter"=>"HttpEVDAdapter","isAjaxRequest"=>"true","parameters"=>array("0rFyvSJQW81hLbjDMrm1LY+PGFeRV5GFuTvA2RM+5gahnrPhzBGPreHPCDuLjBYx","null","null"),"procedure"=>"doEVDLogin","x"=>"0.7714818446905836"));

         
         
         
         //$this->_call();
         echo $this->res;
            
             
         echo "<br><Br>";
         $data = explode('"WL-Instance-Id":"',$this->res);
         $data = explode('"',$data[1]);
         $this->Wid=$data[0];
          echo   $this->Wid=$data[0];
            echo $this->res;
         
             
        // $this->_call(array("adapter"=>"HttpEVDAdapter","isAjaxRequest"=>"true","parameters"=>'["'.base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128,"tataskysaleandpa",'["'.$username.'","'.$password.'","MOBWEB"]',MCRYPT_MODE_CBC,"1234567890abcdef")).'","null","null"]',"procedure"=>"doEVDLogin","x"=>0.12956140723095455));
         //$this->_call(array("adapter"=>"HttpEVDAdapter","isAjaxRequest"=>"true","parameters"=>'["0rFyvSJQW81hLbjDMrm1LY+PGFeRV5GFuTvA2RM+5gahnrPhzBGPreHPCDuLjBYx","null","null"]',"procedure"=>"doEVDLogin","x"=>0.12956140723095455));
        $this->_call(array("Parameters"=>array("adapter"=>"HttpEVDAdapter","isAjaxRequest"=>"true","parameters"=>array("0rFyvSJQW81hLbjDMrm1LY+PGFeRV5GFuTvA2RM+5gahnrPhzBGPreHPCDuLjBYx","null","null"),"procedure"=>"doEVDLogin","x"=>"0.12956140723095455")));

            
         echo $this->res;
         
         exit;
             
              
         $data = explode('"WL-Instance-Id":"',$this->res);
         $data = explode('"',$data[1]);
         $this->Wid=$data[0];
             
      
         //$this->_call(array("adapter"=>"HttpEVDAdapter","isAjaxRequest"=>"true","parameters"=>'["0rFyvSJQW81hLbjDMrm1LY+PGFeRV5GFuTvA2RM+5gahnrPhzBGPreHPCDuLjBYx","null","null"]',"procedure"=>"doEVDLogin","x"=>0.12956140723095455));
         $this->_call(array("adapter"=>"HttpEVDAdapter","isAjaxRequest"=>"true","parameters"=>'[0rFyvSJQW81hLbjDMrm1LY+PGFeRV5GFuTvA2RM+5gahnrPhzBGPreHPCDuLjBYx,null,null]',"procedure"=>"doEVDLogin","x"=>0.12956140723095455));
         //$this->_call(array("adapter"=>"HttpEVDAdapter","isAjaxRequest"=>"false","parameters"=>'["'.base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128,"tataskysaleandpa",'["'.$username.'","'.$number.'","","'.$amount.'","","MOBDESKTOP"]',MCRYPT_MODE_CBC,"1234567890abcdef")).'","null","null","null","null","null"]',"procedure"=>"doRecharge","x"=>0.12956140723095455));
         echo $this->res;
       exit;
         
        $data = explode('"WL-Instance-Id":"',$this->res);
        $data = explode('"',$data[1]);
        $this->Wid=$data[0];
             
         //$this->_call(array("adapter"=>"HttpEVDAdapter","isAjaxRequest"=>"true","parameters"=>'["'.base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128,"tataskysaleandpa",'["'.$username.'","'.$number.'","","'.$amount.'","","MOBDESKTOP"]',MCRYPT_MODE_CBC,"1234567890abcdef")).'","null","null","null","null","null"]',"procedure"=>"doRecharge","x"=>0.12956140723095455));
         $this->_call(array("adapter"=>"HttpEVDAdapter","isAjaxRequest"=>"true","parameters"=>'["af05CWIzkrJVWhYUynIjPKy3t1geVBmi+Q08WOFHtkC1Cdf2PH0shC6TwYXGKmlyOLaMjo07GAl2aNQW6F5VRg==","null","null","null","null","null"]',"procedure"=>"doRecharge","x"=>0.12956140723095455));
         //echo base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128,"tataskysaleandpa",'['.$username.','.$number.',,'.$amount.',,MOBDESKTOP]',MCRYPT_MODE_CBC,"1234567890abcdef"));
         echo $this->res;
         exit;
              
           
            unlink($this->cookieFile);
        }

                        //'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
                        //   'Content-Type: application/json; charset=UTF-8',
                        //  'Content-Type:application/x-www-form-urlencoded; charset=UTF-8',
                        //$j       'Cookie: WL_PERSISTENT_COOKIE=6d682b4b-0d12-43cb-92d0-345c9407f14a; testcookie=oreo; msales-cookie=2685600010.30755.0000; JSESSIONID=0000jbD9fV5uEgd3glGppiuvoqv:52e85e36-4d20-4dfb-af6c-f5f69e977e66',
                              //'Transfer-Encoding: chunked',
        function _call($param="") {
            
            $data_string = json_encode($param);
            $data_string = "adapter=HttpEVDAdapter&procedure=doEVDLogin&parameters=%5B%220rFyvSJQW81hLbjDMrm1LY%2BPGFeRV5GFuTvA2RM%2B5gahnrPhzBGPreHPCDuLjBYx%22%2C%22null%22%2C%22null%22%5D&isAjaxRequest=true&x=0.7714818446905836";
            $data_string = 'adapter=HttpEVDAdapter&procedure=doEVDLogin&parameters=["0rFyvSJQW81hLbjDMrm1LY+PGFeRV5GFuTvA2RM+5gahnrPhzBGPreHPCDuLjBYx","null","null"]&isAjaxRequest=true&x=0.7714818446905836';
            echo $data_string;
            $curlHeaders = array (                          
                    'Accept: text/javascript, text/html, application/xml, text/xml, application/json, */*',
                    'Accept-Encoding: gzip, deflate, br',
                    'Accept-Language: en-US',
                    'User-Agent: Mozilla/5.0 (Windows NT 6.1; rv:51.0) Gecko/20100101 Firefox/51.0',
                    'Connection: Keep-Alive',
                    'Content-Type: application/x-www-form-urlencoded; application/json; charset=UTF-8',                                                               
                    'Cache-Control: no-store, no-cache',
                       
                    'Referer: https://msales.tatasky.com/TataSky/apps/services/preview/SalesAndPartner/desktopbrowser/1.0/default/TSindex.html',
                    'Host: msales.tatasky.com',
                     'Content-Type: application/json',
                     'Content-Length: ' . strlen($data_string),
                    'X-Requested-With: XMLHttpRequest',
                    'x-wl-app-version: 1.0',
                    'x-wl-platform-version: 6.1.0.02.20160528-1310');
                    if ($this->Wid!="") {
                      $curlHeaders[]= 'WL-Instance-Id: '.$this->Wid;  
                    }
                    print_r($curlHeaders);
            $paramData = "";
          //  if ($param!="") foreach($param as $k=>$v) $paramData .= urlencode($k).'='.urlencode($v).'&';
            if ($param!="") foreach($param as $k=>$v) $paramData .=  ($k).'='. ($v).'&';
            
            $paramData = rtrim($post_string, '&');
            //$paramData = 'adapter=HttpEVDAdapter&procedure=doEVDLogin&parameters=["0rFyvSJQW81hLbjDMrm1LY+PGFeRV5GFuTvA2RM+5gahnrPhzBGPreHPCDuLjBYx","null","null"]&isAjaxRequest=true&x=0.8735636017912164';
            //$j = json_encode('["0rFyvSJQW81hLbjDMrm1LY+PGFeRV5GFuTvA2RM+5gahnrPhzBGPreHPCDuLjBYx","null","null"]');
           // $paramData = "adapter=HttpEVDAdapter,isAjaxRequest=true,parameters=".$j.",procedure=doEVDLogin,x=0.12956140723095455";
       
            $ch = curl_init($this->link);
            curl_setopt($ch,CURLOPT_POST,1);
            curl_setopt ($ch, CURLOPT_HTTPHEADER, $curlHeaders);
              //curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
            //curl_setopt($ch,CURLOPT_POSTFIELDS,$paramData);
            curl_setopt($ch,CURLOPT_POSTFIELDS,$data_string);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch,CURLOPT_COOKIEFILE,$this->cookieFile);
            curl_setopt($ch,CURLOPT_COOKIEJAR,$this->cookieFile);
            
             curl_setopt($ch, CURLOPT_VERBOSE, true);
             curl_setopt($ch, CURLOPT_HEADER, TRUE);
             curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
              curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);//allow redirects
             //  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
              // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
    
    
            $this->res = curl_exec($ch);
            curl_close($ch);
            echo   file_get_contents($this->res);
            return $this->res;
        }
}   
?>