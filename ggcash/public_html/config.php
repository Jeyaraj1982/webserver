<?php
session_start();
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

ini_set('memory_limit', '256M');
    date_default_timezone_set("Asia/Kolkata");
     class MySqldatabase
    {
       
         public $link   = "";
        public $qry    = "";

        public function __construct($dbHost, $dbUser, $dbPass, $dbName)
        {
            $this->link = new PDO("mysql:host=" . $dbHost . ";dbname=" . $dbName, $dbUser, $dbPass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        public function select($sql)
        {
            $this->writeSql($sql);
            try {
                $stmt = $this->link->prepare($sql);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                return $stmt->fetchAll();
            } catch (PDOException $e) {
                $this->writeSql($e->getMessage());
                return array();
            }
        }

        public function insert($tableName, $rowData)
        {
            $r = "insert into `" . $tableName . "` (";
            $l = " values (";
            foreach ($rowData as $key => $value) {
                $r .= "`" . $key . "`,";
                $l .= ($value == "Null") ? "Null," : "'" . $value . "',";
            }
            $sql = substr($r, 0, strlen($r) - 1) . ")" . substr($l, 0, strlen($l) - 1) . ")";
            $this->writeSql($sql);
            $this->qry = $sql;
            try {
                $this->link->exec($sql);
                $last_id = $this->link->lastInsertId();
                return $last_id;
            } catch (PDOException $e) {
                $this->writeSql($e->getMessage());
                return 0;
            }
        }

        public function execute($sql)
        {
            $this->writeSql($sql);
            try {
                return $this->link->exec($sql);
            } catch (PDOException $e) {
                $this->writeSql($e->getMessage());
                return 0;
            }
        }

        public function __destruct()
        {
            $this->link = null;
        }

        public function writeSql($text) {
            $myFile = date("Y_m_d").".txt";
            $fh = fopen($myFile, 'a') or die ("can't open file");
            fwrite($fh, "[".date("Y-m-d H:i:s")."]\t".$text."\n");
            fclose($fh);
        }
 

  
}

    
 
     if (isset($_GET['action']) && $_GET['action']=="logout") {\
        session_destroy();
        $_SESSION['User']=array();
     }
                                        
    $mysql   = new MySqldatabase("localhost","ggcash_user","ggcash_user","ggcash_database");
    $mysqldb   = new MySqldatabase("localhost","ggcash_user","ggcash_user","ggcash_database");
    

     

    function getEpinWalletBalance($memberID) {
        global $mysqldb;
        $d = $mysqldb->select("select (sum(Credits)-sum(Debits)) as bal from  `_tbl_wallet_epin` where `MemberID`='".$memberID."'");
        return isset($d[0]['bal']) ? $d[0]['bal'] : 0;      
    }
     function getEpinWalletShortSummary($memberID) {
        global $mysqldb;
        $d = $mysqldb->select("select sum(Credits) as Credits, sum(Debits) as Debits,  (sum(Credits)-sum(Debits)) as Balance from  `_tbl_wallet_epin` where `MemberID`='".$memberID."'");
        return isset($d[0]['Balance']) ? $d[0] : array("Credits"=>0,"Debits"=>0,"Balance"=>0);      
    }

    function getGGCashWalletBalance($memberID) {
        global $mysqldb;
        $d = $mysqldb->select("select (sum(Credits)-sum(Debits)) as bal from  _tbl_wallet_earnings where MemberID='".$memberID."'");
        return isset($d[0]['bal']) ? $d[0]['bal'] : 0;      
    }
    
    function getGGCashWalletShortSummary($memberID) {
        global $mysqldb;
        $d = $mysqldb->select("select sum(Credits) as Credits, sum(Debits) as Debits,  (sum(Credits)-sum(Debits)) as Balance from  _tbl_wallet_earnings where MemberID='".$memberID."'");
        return isset($d[0]['Balance']) ? $d[0] : array("Credits"=>0,"Debits"=>0,"Balance"=>0);      
    }

    function getUtilityhWalletBalance($memberID) {
        global $mysqldb;
        $d = $mysqldb->select("select (sum(Credits)-sum(Debits)) as bal from  _tbl_wallet_utility where MemberID='".$memberID."'");
        return isset($d[0]['bal']) ? $d[0]['bal'] : 0;      
    }
    
     function getUtilityhWalletShortSummary($memberID) {
        global $mysqldb;
        $d = $mysqldb->select("select sum(Credits) as Credits, sum(Debits) as Debits,  (sum(Credits)-sum(Debits)) as Balance from  _tbl_wallet_utility where MemberID='".$memberID."'");
       return isset($d[0]['Balance']) ? $d[0] : array("Credits"=>0,"Debits"=>0,"Balance"=>0);       
    }

     
    
    function getMemberCode($memberName) {
        
        global $mysqldb;
        $member_code_prefix = $mysqldb->select("select * from `_tbl_Settings_Params` where ParamCode in ('MemberCodePrefix')"); 
        $count = $mysqldb->select("select * from _tbl_Members");
        $memberName = preg_replace('/\s+/', '', $memberName);
        $d = $member_code_prefix[0]['ParamValue'];
        $d .= strtoupper(substr($memberName,0,3));
        
        $member_code_length = $mysqldb->select("select * from `_tbl_Settings_Params` where ParamCode in ('MemberCodeLength')");                                   
        
        if ($member_code_length[0]['ParamValue']==3) {
            if (strlen(sizeof($count)+1)==1) {
                $d .= "00". (sizeof($count)+1);
            }
            if (strlen(sizeof($count)+1)==2) {
                $d .= "0". (sizeof($count)+1);
            }
            if (strlen(sizeof($count)+1)==3) {
                $d .= (sizeof($count)+1);
            }
        }
        
        if ($member_code_length[0]['ParamValue']==4) {
            if (strlen(sizeof($count)+1)==1) {
                $d .= "000". (sizeof($count)+1);
            }
            if (strlen(sizeof($count)+1)==2) {
                $d .= "00". (sizeof($count)+1);
            }
            if (strlen(sizeof($count)+1)==3) {
                $d .= "0". (sizeof($count)+1);
            }
            if (strlen(sizeof($count)+1)==4) {
                $d .= (sizeof($count)+1);
            }
        }
        
        if ($member_code_length[0]['ParamValue']==5) {
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
        }
        
        if ($member_code_length[0]['ParamValue']==6) {
            if (strlen(sizeof($count)+1)==1) {
                $d .= "00000". (sizeof($count)+1);
            }
            if (strlen(sizeof($count)+1)==2) {
                $d .= "0000". (sizeof($count)+1);
            }
            if (strlen(sizeof($count)+1)==3) {
                $d .= "000". (sizeof($count)+1);
            }
            if (strlen(sizeof($count)+1)==4) {
                $d .= "00". (sizeof($count)+1);
            }
            if (strlen(sizeof($count)+1)==5) {
                $d .= "0". (sizeof($count)+1);
            }
            if (strlen(sizeof($count)+1)==6) {
                $d .= (sizeof($count)+1);
            }
        }
        
        if ($member_code_length[0]['ParamValue']==7) {
            if (strlen(sizeof($count)+1)==1) {
                $d .= "000000". (sizeof($count)+1);
            }
            if (strlen(sizeof($count)+1)==2) {
                $d .= "00000". (sizeof($count)+1);
            }
            if (strlen(sizeof($count)+1)==3) {
                $d .= "0000". (sizeof($count)+1);
            }
            if (strlen(sizeof($count)+1)==4) {
                $d .= "000". (sizeof($count)+1);
            }
            if (strlen(sizeof($count)+1)==5) {
                $d .= "00". (sizeof($count)+1);
            }
            if (strlen(sizeof($count)+1)==6) {
                $d .= "0". (sizeof($count)+1);
            }
            if (strlen(sizeof($count)+1)==7) {
                $d .= (sizeof($count)+1);
            }
        }

        if ($member_code_length[0]['ParamValue']==8) {
            if (strlen(sizeof($count)+1)==1) {
                $d .= "0000000". (sizeof($count)+1);
            }
            if (strlen(sizeof($count)+1)==2) {
                $d .= "000000". (sizeof($count)+1);
            }
            if (strlen(sizeof($count)+1)==3) {
                $d .= "00000". (sizeof($count)+1);
            }
            if (strlen(sizeof($count)+1)==4) {
                $d .= "0000". (sizeof($count)+1);
            }
            if (strlen(sizeof($count)+1)==5) {
                $d .= "000". (sizeof($count)+1);
            }
            if (strlen(sizeof($count)+1)==6) {
                $d .= "00". (sizeof($count)+1);
            }
            if (strlen(sizeof($count)+1)==7) {
                $d .= "0". (sizeof($count)+1);
            }
            if (strlen(sizeof($count)+1)==8) {
                $d .= (sizeof($count)+1);
            }
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
    
    
   class MemberTree {
       
       var $member_count=0;
       var $error=0;
       var $LeftCount = 0;
       var $RightCount = 0;
       
       function countChildren($MemberCode) {
           global $mysqldb;
           $children = $mysqldb->select("select * from `_tblPlacements` where `ParentCode`='".$MemberCode."'");
           $count = sizeof($children);
           
           if ($count<=2) {
               foreach($children as $userId) {
                   $count += $this->countChildren($userId['ChildCode']);
               }
           } else {
               $this->error++;
           }
           $this->member_count=$count;
           return $count;
       }
       
       function getTotalLeftCount($ParentCode) {
           
           global $mysqldb;
           $this->error=0;
           $this->count=0;
           
           $dwn = $mysqldb->select("select * from `_tblPlacements` where `Position`='L' and `ParentCode`='".$ParentCode."'");
           if (sizeof($dwn)>0) {
               $data = $this->countChildren($dwn[0]['ChildCode']);
               $this->member_count = 1 + $data;
               return (1 + $data);
           } else {
               return "0";
           }
       }
       
       function getTotalRightCount($ParentCode) {
           global $mysqldb;
           $this->error=0;
           $this->count=0;
           $dwn = $mysqldb->select("select * from `_tblPlacements` where `Position`='R' and `ParentCode`='".$ParentCode."'");
           if (sizeof($dwn)>0) {
               $data = $this->countChildren($dwn[0]['ChildCode']);
               $this->member_count = 1 + $data;
               return (1 + $data);
           } else {
               return "0";
           }
       }
       
       function getNodes($parantID,$pos) {
           
           global $mysqldb;
           $d = $mysqldb->select("select * from `_tblPlacements` where `ParentCode`='".$parantID."'"); 
           if (sizeof($d)==0) {
                return $parantID.",LR,".$this->LeftCount.",".$this->RightCount;    
           } else if (sizeof($d)==1) {
               if ($d[0]['Position']=="L") {
                   if ($pos=="L") {
                       $this->LeftCount++;
                   }
                   if ($pos=="R") {
                       $this->RightCount++;
                   }
                   return $parantID.",R,".$this->LeftCount.",".$this->RightCount;    
               }  
               if ($d[0]['Position']=="R") {
                   if ($pos=="L") {
                        $this->LeftCount++;
                   }
                   if ($pos=="R") {
                       $this->RightCount++;
                   }
                   return $parantID.",L,".$this->LeftCount.",".$this->RightCount;    
               }
           } else {
               foreach($d as $node) {
                   return $this->getNodes($node['ChildCode'],$pos); 
               }
           }                          
       }
       
       function GetLeft($MemberCode) {
           global $mysqldb;
           $this->LeftCount = 0;
           $this->RightCount = 0;
           $fL = $mysqldb->select("select * from `_tblPlacements` where `Position`='L' and `ParentCode`='".$MemberCode."'");
           if (sizeof($fL)==0) {
               return $MemberCode.",LR,0,0";
           } else {
               $this->LeftCount++;
               return $this->getNodes($fL[0]['ChildCode']);
           }
       }
       
       function GetRight($MemberCode) {
           global $mysqldb;
            $this->LeftCount = 0;
           $this->RightCount = 0;
           $fR = $mysqldb->select("select * from `_tblPlacements` where `Position`='R' and `ParentCode`='".$MemberCode."'");
           if (sizeof($fR)==0) {
               return $MemberCode.",LR,0,0";
           } else {
               $this->RightCount++;
               return $this->getNodes($fR[0]['ChildCode']);
           }
       } 
   }   
   
   $memberTree = new MemberTree();
         /*
  function countChildren($MemberCode) {
       global $mysqldb;
       $children = $mysqldb->select("select * from `_tblPlacements` where `ParentCode`='".$MemberCode."'");
       $count = sizeof($children);
       if ($count<=2) {
        //writeLog($MemberCode.":".$count);
       foreach($children as $userId) {
          $count += countChildren($userId['ChildCode']);
       }
       } else {
           return 0;
       }
       return $count;
}  
      

    function getTotalLeftCount($ParentCode) {
        global $mysqldb;
         writeLog($ParentCode);
        $dwn = $mysqldb->select("select * from `_tblPlacements` where `Position`='L' and `ParentCode`='".$ParentCode."'");
        if (sizeof($dwn)>0) {
           // return (1 + countChildren($dwn[0]['ChildCode']));
           $data = countChildren($dwn[0]['ChildCode']);
           
            return (1 + $data);
        } else {
            return "0";
        }
    }
    
  
         
    function getTotalRightCount($ParentCode) {
        global $mysqldb;
         writeLog($ParentCode);
        $dwn = $mysqldb->select("select * from `_tblPlacements` where `Position`='R' and `ParentCode`='".$ParentCode."'");
        if (sizeof($dwn)>0) {
            $data = countChildren($dwn[0]['ChildCode']);
            writeLog($dwn[0]['ChildCode'].":".$data);
            return (1 + $data);
        } else {
            return "0";
        }
    } 
    */
  
     class MobileSMS {
        
        public static function sendSMS($mobileNumber,$text,$memberID="") {
            global $userData;
             $mysqldb   = new MySqldatabase("localhost","ggcash_user","ggcash_user","ggcash_database");
            
            if (strlen($memberID)>0) {
                  $member = $mysqldb->select("select * from _tbl_Members where MemberID='".$memberID."'");
            }   else {
               $member = $mysqldb->select("select * from _tbl_Members where MemberID='".$userData['MemberID']."'"); 
            }
            
            $id=$mysqldb->insert("_tbl_Log_MobileSMS",array("MemberID"=> (isset($member[0]['MemberID']) ? $member[0]['MemberID'] : 0),
                                                            "MemberCode"=>(isset($member[0]['MemberCode']) ? $member[0]['MemberCode'] : 0),
                                                            "SmsTo"=>$mobileNumber,
                                                            "Message"=>$text,
                                                            "Url"=>" ",
                                                            "MessagedOn"=>date("Y-m-d H:i:s")));
            
                                                            
            $EnableSMS =  $mysqldb->select("select * from `_tbl_Settings_Params` where ParamCode in ('EnableSendSMS')"); 
            if ($EnableSMS[0]['ParamValue']==1) {
            $mobileapi =  $mysqldb->select("select * from `_tbl_Settings_Params` where ParamCode in ('MobileSMSSendAPI')"); 
            $url = $mobileapi[0]['ParamValue']."&number=".$mobileNumber."&message=".urlencode($text)."&uid=".$id;                                               
            $mysqldb->execute("update _tbl_Log_MobileSMS set Url='".$url."' where SMSID='".$id."'");
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
                $mysqldb->execute("update _tbl_Log_MobileSMS set APIResponse='".$response."' where SMSID='".$id."'");
            } else {
                $mysqldb->execute("update _tbl_Log_MobileSMS set APIResponse='sms disabled' where SMSID='".$id."'");    
            }
            
            return $id;
            
        }
        public static  function getBalance() {
            global $mysqldb;
            $mobileapi =  $mysqldb->select("select * from `_tbl_Settings_Params` where ParamCode in ('MobileSMSBalanceAPI')"); 
            //$url = "http://www.aaranju.in/sms/api_balance.php?apiusername=Z2djYXNoQGdtY&apipassword=WlsLmNvbQ==";
            $url = $mobileapi[0]['ParamValue'];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            $response = json_decode($response,true);
            return  $response['response']['balance'];
             
        }
    }
    
    class Recharge {
        
        function getBalance() {
            $url = "http://www.aaranju.in/recharge/api_balance.php?apiusername=Z2djYXNoQGdtY&apipassword=WlsLmNvbQ==";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            $response = json_decode($response,true);
            return  $response['response']['balance'];
        }
    }
    
     function getImage($thumb,$gender) {
                
                 if ((strlen(trim($thumb))==0) || ($thumb == null)) { 
                     if ($gender=="Female") {
                         return '<img src="assets/images/female_default.png"  class="rounded-circle" width="48">';
                     } 
                     
                     if ($gender=="Male") {
                         return '<img src="assets/images/male_default.png"  class="rounded-circle" width="48">';
                     } 
                 } else { 
                     return '<img src="uploads/'.$thumb.'" class="rounded-circle" width="48">';
                 } 
             }
?>


