<?php

  session_start();
    date_default_timezone_set("Asia/Calcutta");
  //utf8_encode   
   
    class MySql {
        
        var $link; 
        var $dbName = "";
        var $qry    = "";
        
        function MySql($dbHost,$dbUser,$dbPass,$dbName){
            $this->dbName = $dbName;
            $this->link = mysql_connect($dbHost,$dbUser,$dbPass) or die("Error");
             mysql_set_charset('utf8', $this->link);
        }
        
        function select($sql,$ass=false) {
            
             mysql_set_charset('utf8', $this->link);
            mysql_select_db($this->dbName,$this->link);

            $resultData = array();
            $result     = mysql_query($sql,$this->link);
            
            if ($ass) {
               // return mysql_fetch_assoc($result); 
                return $result; 
            }
            
            if ($result) { 
                
                if (mysql_num_rows($result) > 0) {
                    while ($row = mysql_fetch_assoc($result)) {
                        $resultData[]=$row;
                    }
                    mysql_free_result($result);  
                }
            }
            
            return $resultData;
        }
        
        function execute($sql) {
            
            $this->qry = $sql;
            mysql_select_db($this->dbName,$this->link);
            mysql_query($this->qry,$this->link);
            return mysql_affected_rows();
        }
        
        function insert($tableName,$rowData) {
            
            $r = "insert into `".$tableName."` (";
            $l = " values (";
            foreach($rowData as $key => $value) {
                $r.="`".$key."`,";
                if ($value=="Null") {
                    $l.="Null,";
                } else {
                    $l.="'".$value."',";    
                }
                
            }
            $r = substr($r,0,strlen($r)-1).")";
            $l = substr($l,0,strlen($l)-1).")";
            $sql = $r.$l;
            
            mysql_select_db($this->dbName,$this->link);

            $this->qry=$sql;  
            mysql_query($this->qry,$this->link) ;
            return mysql_insert_id($this->link);
        }
        
         function update($tableName,$rowData,$where) {
            
            $r = "update `".$tableName."` set ";
 
            foreach($rowData as $key => $value) {
                $r.="`".$key."`='".$value."',";
            }
            $r = substr($r,0,strlen($r)-1);
            $sql = $r." where ".$where;
            
            mysql_select_db($this->dbName,$this->link);
            $this->qry=$sql;  
            mysql_query($this->qry,$this->link);
            return mysql_affected_rows($this->link);
        }
        
        function dbClose() {
            mysql_close($this->link);
        }
    }
    
   // $mysql     = new MySql("localhost","abcaduac_bigrock","bigrock","abcaduac_smsservice");
    $mysql = new MySql("localhost","nicusehy_nicus","abcdef","nicusehy_nicussms");
    $_REQUEST['fdate'] = isset($_REQUEST['fdate']) ? $_REQUEST['fdate'] : date("Y-m-d");
    $_REQUEST['tdate'] = isset($_REQUEST['fdate']) ? $_REQUEST['tdate'] : date("Y-m-d");
    
    echo $_REQUEST['request']();
    
    function smsreport() {
        
        global $mysql;   
         
        $data = $mysql->select("select * from _mobilesms as m, _senderid as s where (date(m.senton)>=date('".$_REQUEST['fdate']."') and date(m.senton)<=date('".$_REQUEST['tdate']."') ) and s.sid=m.sid and m.userid='".$_SESSION['user']['id']."'",true);//" and ( date(senton)<=date('".$_REQUEST['tdate']."') and date(senton) 
          
          $i =0;
        $resultData = '{"data":[';
        while ($d = mysql_fetch_assoc($data)) {
            $i++;
          
            $str =  str_replace(array("\r", "\n"), "", $d['message']);;
//            $resultData .= '["'.$d['senton'].'","NEXIFY","'.$d['sendto'].'","'.$str.'","'.$d['smscount'].'","'.$d['sentfrom'].'"],';
            $resultData .= '["'.$d['senton'].'","'.$d['senderid'].'","'.$d['sendto'].'","'.$str.'","'.$d['smscount'].'","'.$d['sentfrom'].'"],';
        }
        if ($i==0) {
            return substr($resultData,0,strlen($resultData)).']}';    
        } else {
            return substr($resultData,0,strlen($resultData)-1).']}';
        }
        
    }
    
      
    function getUserInfo($id) {
        global $mysql;
        if ($id==0) {
            return array("username"=>"admin");
        }
         $data = $mysql->select("select * from _user where id=".$id);
         return ($data[0]);
    }
    
        function accountSummary() {
        
        global $mysql;   
         
        $data = $mysql->select("select * from _smscredits where userid='".$_SESSION['user']['id']."'",true);//" and ( date(senton)<=date('".$_REQUEST['tdate']."') and date(senton) 
          
          $i =0;
        $resultData = '{"data":[';
        while ($d = mysql_fetch_assoc($data)) {
            $i++;
            $u = getUserInfo($d['transferfrom']);
          if ($_SESSION['user']['isuser']==1) {
              $c = "To: ".$u['username'];
              
              
          } else {
              if ($d['credits']>0) {
                $c = "From: ".$u['username'] ;         
              } else {
                  $c = "To: ".$u['username'] ;   
              }
            
          }
          
            $str =  str_replace(array("\r", "\n"), "", $d['message']);;
            $resultData .= '["'.$d['dateoftransfer'].'","'.$d['particulars'].'","'.$d['creditsfor'].'",
            "'.$c.'",
            "<div style=\'text-align:right\'>'.$d['credits'].'</div>","<div style=\'text-align:right\'>'.$d['debits'].'</div>","<div style=\'text-align:right\'>'.$d['availablebalance'].'</div>"],';
        }
        if ($i==0) {
            return substr($resultData,0,strlen($resultData)).']}';    
        } else {
            return substr($resultData,0,strlen($resultData)-1).']}';
        }
        
    }
    
?>