<?php
session_start();
date_default_timezone_set("Asia/Kolkata");
 class MySqldatabase {
        
        var $link; 
        var $dbName = "";
        var $qry    = "";
        
        public function MySqldatabase($dbHost,$dbUser,$dbPass,$dbName){
            $this->dbName = $dbName;
            $this->link = mysql_connect($dbHost,$dbUser,$dbPass) or die("Error");
        }
        
        public function select($sql,$ass=false) {
            
            
            mysql_select_db($this->dbName,$this->link);

            $resultData = array();
            $result     = mysql_query($sql,$this->link);
            
            if ($ass) {
                return mysql_fetch_assoc($result); 
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
        
        public function execute($sql) {
            
            $this->qry = $sql;
            mysql_select_db($this->dbName,$this->link);
            mysql_query($this->qry,$this->link);
            return mysql_affected_rows();
        }
        
        public function insert($tableName,$rowData) {
            
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
        
        public  function update($tableName,$rowData,$where) {
            
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
        
        public function dbClose() {
            mysql_close($this->link);
        }
    }
 
  
    
$mysqldb   = new MySqldatabase("localhost","ggcash_user","ggcash_user","ggcash_database");

function getAvailableBalance($memberID) {
    global $mysqldb;
    $d = $mysqldb->select("select (sum(Credits)-sum(Debits)) as bal from  _tbl_wallet_transactions where MemberID='".$memberID."'");
    return isset($d[0]['bal']) ? $d[0]['bal'] : 0;      
}

function getEarningAvailableBalance($memberID) {
    global $mysqldb;
    $d = $mysqldb->select("select (sum(Credits)-sum(Debits)) as bal from  _tbl_earnings where MemberID='".$memberID."'");
    return isset($d[0]['bal']) ? $d[0]['bal'] : 0;      
}

  class SMSController {
        function sendsms($url) {  
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL,$url."&rand=".rand(3,33333333333333));
            curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
            curl_setopt($ch,CURLOPT_TIMEOUT, 600); 
            $response = curl_exec($ch);
            curl_close ($ch);
            return $response;
        }
    }
    
    
    
    
    
    
         function getMemberCode($memberName) {
          
          global $mysqldb;
          
          $count = $mysqldb->select("select * from _tbl_Members");
          $memberName = preg_replace('/\s+/', '', $memberName);
          $d = "GGC".strtoupper(substr($memberName,0,3));
          if (strlen(sizeof($count)+1)==1) {
                $d .= "0000". (sizeof($count)+1);
          }
          if (strlen(sizeof($count)+1)==2) {
            $d .= "000". (sizeof($count)+1);
          }
          if (strlen(sizeof($count)+1)==3) {
            $d .= "00". (sizeof($count)+1);
          }
          if (strlen(sizeof($count)+1)==4) {
            $d .= "0". (sizeof($count)+1);
          }
          if (strlen(sizeof($count)+1)==5) {
            $d .= (sizeof($count)+1);
          }
          return $d;
      }
      
      function getNodes($parantID,$pos) {
        
        global $mysqldb,$LeftCount,$RightCount;
        $d = $mysqldb->select("select * from `_tblPlacements` where `ParentCode`='".$parantID."'"); 
        
        if (sizeof($d)==0) {
            return $parantID.",LR,".$LeftCount.",".$RightCount;    
        } else if (sizeof($d)==1) {
            
            if ($d[0]['Position']=="L") {
                if ($pos=="L") {
                    $LeftCount++;
                }
                if ($pos=="R") {
                    $RightCount++;
                }
                return $parantID.",R,".$LeftCount.",".$RightCount;    
            }  
            
            if ($d[0]['Position']=="R") {
                if ($pos=="L") {
                    $LeftCount++;
                }
                if ($pos=="R") {
                    $RightCount++;
                }
                return $parantID.",L,".$LeftCount.",".$RightCount;    
            }
        } else {
            foreach($d as $node) {
                return getNodes($node['ChildCode'],$pos); 
            }
            //getNodes($d[0]['ChildCode'],$pos); 
            //getNodes($d[1]['ChildCode'],$pos);  
        }                          
    }    
    
    $LeftCount = 0;
    $RightCount = 0;

    

    function GetLeft($MemberCode) {
        global $mysqldb,$LeftCount;
        $fL = $mysqldb->select("select * from `_tblPlacements` where `Position`='L' and `ParentCode`='".$MemberCode."'");
        if (sizeof($fL)==0) {
            return $MemberCode.",LR,0,0";
        } else {
            $LeftCount++;
            return getNodes($fL[0]['ChildCode']);
        }
    }

    function GetRight($MemberCode) {
        global $mysqldb,$RightCount;
        $fR = $mysqldb->select("select * from `_tblPlacements` where `Position`='R' and `ParentCode`='".$MemberCode."'");
        if (sizeof($fR)==0) {
            return $MemberCode.",LR,0,0";
        } else {
            $RightCount++;
            return getNodes($fR[0]['ChildCode']);
        }
    }
    
    
      function countChildrenCodees($MemberCode) {
       global $mysqldb;
       $children = $mysqldb->select("select * from `_tblPlacements` where `ParentCode`='".$MemberCode."'");
       $count = "";
       foreach($children as $userId) {
           $count .= ",".$userId['ChildCode'];
          $count .= ",". countChildrenCodees($userId['ChildCode']);
       }
       return $count;
}  
    
    
    
    
  function countChildren($MemberCode) {
       global $mysqldb;
       $children = $mysqldb->select("select * from `_tblPlacements` where `ParentCode`='".$MemberCode."'");
       $count = sizeof($children);
       foreach($children as $userId) {
          $count += countChildren($userId['ChildCode']);
       }
       return $count;
}  
    

    function getTotalLeftCount($ParentCode) {
        global $mysqldb;
        $dwn = $mysqldb->select("select * from `_tblPlacements` where `Position`='L' and `ParentCode`='".$ParentCode."'");
        if (sizeof($dwn)>0) {
            return (1 + countChildren($dwn[0]['ChildCode']));
        } else {
            return "0";
        }
    }
         
    function getTotalRightCount($ParentCode) {
        global $mysqldb;
        $dwn = $mysqldb->select("select * from `_tblPlacements` where `Position`='R' and `ParentCode`='".$ParentCode."'");
        if (sizeof($dwn)>0) {
            return (1 + countChildren($dwn[0]['ChildCode']));
        } else {
            return "0";
        }
    } 
    
  
     class MobileSMS {
        
        function sendSMS($mobileNumber,$text,$memberID="") {
            global $mysqldb,$userData;
            if (strlen($memberID)>0) {
                  $member = $mysqldb->select("select * from _tbl_Members where MemberID'".$memberID."'");
            }   else {
               $member = $mysqldb->select("select * from _tbl_Members where MemberID'".$userData['MemberID']."'"); 
            }
            
            $id=$mysqldb->insert("_tbl_Log_MobileSMS",array("MemberID"=>$member[0]['MemberID'],
                                                          "MemberCode"=>$member[0]['MemberCode'],
                                                          "SmsTo"=>$mobileNumber,
                                                          "Message"=>$text,
                                                          "MessagedOn"=>date("Y-m-d H:i:s")));
                                                          
            $url = "http://www.j2jsoftwaresolutions.com/sms.php?Key=GOODGW&Text=".base64_encode($text)."&MobileNumber=".$mobileNumber;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
        }
    }
      
?>