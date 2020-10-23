<?php
     //Tatasky 9952514892
//Password TKSD@2011
    $tataSky = new TataSky($_REQUEST['username'],$_REQUEST['password'],$_REQUEST['number'],$_REQUEST['amount']);
    echo $tataSky->res;
    
    $file = fopen("tataskylog.txt","a") or die("filenot");
    fwrite($file,"\n".date("Y-m-d H:i;s")."\t".$_REQUEST['username']."\t".$_REQUEST['password']."\t".$_REQUEST['number']."\t".$_REQUEST['amount']."\t".        $tataSky->res);
    fclose($file);
  
    class TataSky {
        
        var $cookieFile="";
        var $res="";
        var $Wid="";
        var $return="";
        
        function TataSky($username,$password,$number,$amount) {
            
            
            $key="tataskysaleandpa";
            $iv="1234567890abcdef";
             $this->res=123;
            return true; 
            $blockSize=mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
            $this->cookieFile="_tsky".time().rand(333,333333).".txt";
          
            if(!file_exists($this->cookieFile)) {
                $fh = fopen($this->cookieFile, "w");
                fwrite($fh, "");
                fclose($fh);                           
            }
           
            $this->_call();
            $r=explode('"WL-Instance-Id":"',$this->res);
            $r=explode('"',$r[1]);
            $this->Wid=$r[0];  
            
            $r=json_encode(array($username,$password,"MOBWEB"));
            $pad=$blockSize-(strlen($r)%$blockSize);
            $l='["'.base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128,$key,$r.str_repeat(chr($pad),$pad),MCRYPT_MODE_CBC,$iv)).'","null","null"]';
            $this->_call("adapter=".urlencode("HttpEVDAdapter")."&procedure=".urlencode("doEVDLogin")."&isAjaxRequest=".urlencode("true")."&x=".urlencode("0.".rand(11111111,99999999).rand(11111111,99999999))."&parameters=".urlencode($l));
            $r=json_decode(ltrim(rtrim(trim(str_replace("\\","",json_encode($this->res,JSON_FORCE_OBJECT))),'"'),'"'),TRUE);
            if ($r['result']["status"]!="success") {
               return $this->res = "failure,0,".$r['result']["errorMessage"].",LOGIN";
            }      
            
            $r=json_encode(array($username,$number,"",$amount,"","MOBDESKTOP"));
            $pad=$blockSize-(strlen($r)%$blockSize);
            $l='["'.base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128,$key,$r.str_repeat(chr($pad),$pad),MCRYPT_MODE_CBC,$iv)).'","null","null","null","null","null"]';
            $this->_call("adapter=".urlencode("HttpEVDAdapter")."&procedure=".urlencode("doRecharge")."&isAjaxRequest=".urlencode("true")."&x=".urlencode("0.".rand(11111111,99999999).rand(11111111,99999999))."&parameters=".urlencode($l));
            $r=json_decode(ltrim(rtrim(trim(str_replace("\\","",json_encode($this->res,JSON_FORCE_OBJECT))),'"'),'"'),TRUE);
            if ($r['result']["status"]!="success") {
               return $this->res = "failure,0,".$r['result']["errorMessage"].",RECHARGE";
            }
            $r=trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, base64_decode($r['result']['payload']), MCRYPT_MODE_CBC, $iv));
           
            $this->return=str_replace('"}','',substr(trim($r),12,strlen($r)-13));
            
            /*unlink($this->cookieFile);
            $r=json_encode(array($username,"Recharge","MOBWEB"));
            $pad=$blockSize-(strlen($r)%$blockSize);
            $l='["'.base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128,$key,$r.str_repeat(chr($pad),$pad),MCRYPT_MODE_CBC,$iv)).'"]';
            $this->_call("adapter=".urlencode("HttpEVDServiceAdapter")."&procedure=".urlencode("retrieveTransactionsDetails")."&isAjaxRequest=".urlencode("true")."&x=".urlencode("0.".rand(11111111,99999999).rand(11111111,99999999))."&parameters=".urlencode($l));
            $r=explode('"WL-Instance-Id":"',$this->res);
            $r=explode('"',$r[1]);
            $this->Wid=$r[0];
            */
                        
            $r=json_encode(array($username,"Recharge","MOBWEB"));
            $pad=$blockSize-(strlen($r)%$blockSize);
            $l='["'.base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128,$key,$r.str_repeat(chr($pad),$pad),MCRYPT_MODE_CBC,$iv)).'"]';
            $this->_call("adapter=".urlencode("HttpEVDServiceAdapter")."&procedure=".urlencode("retrieveTransactionsDetails")."&isAjaxRequest=".urlencode("true")."&x=".urlencode("0.".rand(11111111,99999999).rand(11111111,99999999))."&parameters=".urlencode($l));
            $r=json_decode(ltrim(rtrim(trim(str_replace("\\","",json_encode($this->res,JSON_FORCE_OBJECT))),'"'),'"'),TRUE);
            $r=mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, base64_decode($r['result']['payload']), MCRYPT_MODE_CBC, $iv);
            $r=explode("}],",$r);
            $r=json_decode($r[0]."}]}");        
            foreach($r->transactions as $tr) {
                if ($tr->subscriberID==$number && $tr->amount==$amount){
                    $this->res = "success,".$tr->transactionID.",".$this->return;
                    return $this->res;    
                }
            }
            $this->res = "success,0,".$this->return;;
            unlink(dirname(__FILE__)."/".$this->cookieFile);
            return $this->res;  
        }
        
        function _call($param="") {
            $curlHeader=array('Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8','Accept-Encoding: gzip, deflate, br','Accept-Language: en-US,en;q=0.5','User-Agent: Mozilla/5.0 (Windows NT 6.1; rv:52.0) Gecko/20100101 Firefox/52.0','Connection: Keep-Alive','Content-Type: application/x-www-form-urlencoded; charset=UTF-8;text/plain;','Cache-Control: no-store, no-cache','Referer: https://msales.tatasky.com/TataSky/apps/services/preview/SalesAndPartner/desktopbrowser/1.0/default/TSindex.html','Host: msales.tatasky.com','X-Requested-With: XMLHttpRequest','x-wl-app-version: 1.0','Pragma: no-cache','x-wl-platform-version: 6.1.0.02.20160528-1310');
            if ($this->Wid!="") {
                $curlHeader[]= 'WL-Instance-Id: '.$this->Wid;  
            } 
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL, "https://msales.tatasky.com/TataSky/apps/services/api/SalesAndPartner/desktopbrowser/query");
            curl_setopt($ch,CURLOPT_REFERER, "https://msales.tatasky.com/TataSky/apps/services/preview/SalesAndPartner/desktopbrowser/1.0/default/TSindex.html");
            curl_setopt($ch,CURLOPT_HTTPHEADER, $curlHeader);
            curl_setopt($ch,CURLOPT_POST,true);
            curl_setopt($ch,CURLOPT_POSTFIELDS,$param);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
            curl_setopt($ch,CURLOPT_HEADER, 0);
            curl_setopt($ch,CURLOPT_ENCODING, "gzip");
            curl_setopt($ch,CURLOPT_COOKIEFILE,dirname(__FILE__)."/".$this->cookieFile);
            curl_setopt($ch,CURLOPT_COOKIEJAR,dirname(__FILE__)."/".$this->cookieFile);
            $this->res = curl_exec($ch);
            curl_close($ch);
            return $this->res;
        }
    }   
?>