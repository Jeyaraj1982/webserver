<?php
class Webservice {
        
        var $serverURL="";
        
        function Webservice() {
            global $loginID;
            $this->serverURL  = "https://www.aaranju.in/busticket/api.php?action="; 
        }

        function getData($method,$param=array()) {  
            return $this->_callUrl($method,$param) ;
        }
        
        function _callUrl($method,$param) {
            
            global $__Global;
            $postvars = '';
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL,$this->serverURL.$method."&rand=".rand(3,33333333333333));
            curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
            curl_setopt($ch,CURLOPT_TIMEOUT, 600); 
            $response = curl_exec($ch);
            curl_close ($ch);
            return $response;
        }
    }
    
  
    
    $webservice = new Webservice();
    echo $_GET['action']();
    
      
    function _getdestinationList() {
        global $webservice;
        $data = $webservice->getData("_getdestinationList&sourceList=".$_GET['sourceList']);
        $data = substr($data,12,strlen($data)-13);
        return $data;
    }
    
?>