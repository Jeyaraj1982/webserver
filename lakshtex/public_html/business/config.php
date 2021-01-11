<?php
    if (isset($_SESSION['User']) && $_SESSION['User']['MemberID']>0) {    
    } else {
    session_start();
    }

    define("AppUrl","https://business.lakshtex.com");
date_default_timezone_set("Asia/Kolkata");

    class MySql
   {
        public $link   = "";
        public $qry    = "";
          public $error = "";

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
                $this->error=$e->getMessage();
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
                $this->error=$e->getMessage();
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
                $this->error=$e->getMessage();
                $this->writeSql($e->getMessage());
                return 0;
            }
        }

        public function __destruct()
        {
            $this->link = null;
        }

        public function writeSql($text) {
            $myFile = "/home/lakshtex/public_html/business/".date("Y_m_d")."_.txt";
            $fh = fopen($myFile, 'a') or die ("can't open file..");
            fwrite($fh, "[".date("Y-m-d H:i:s")."]\t".$text."\n");
            fclose($fh);
        }
}
    function putDateTime($dateTime) {
        return date("M d, Y H:i",strtotime($dateTime));
    }
                              
    function putDate($date) {
        return date("M d, Y",strtotime($date));
    }

     if (isset($_GET['action']) && $_GET['action']=="logout") {
        session_destroy();
        $_SESSION['User']=array();
    }
     class SeqMaster {
      
        public static function GenerateCode($prefix,$numberlength,$number) { 
            for($i=1;$i<=$numberlength-strlen($number);$i++) {
                $prefix .= "0";    
            }
            return $prefix.$number;
        }
        
        public static function GetNextMemberCode($MemberType=2) {
            global $mysql;
            if ($MemberType=="2" || $MemberType=="1") {
            $prefix = "LT";
            $count = 1000001;
            $Rows   = $mysql->select("select count(*) as rCount from `_tbl_member`");
            return $prefix.($count+$Rows[0]['rCount']);
            } 
            
           
        }
        
          
        //1H100002000030001 
        public static function GetNextPinCode() {
            global $mysql;
            $prefix = "EPN";
            $length = 4;
            $Rows   = $mysql->select("select count(*) as rCount from `_tbl_epins`");
            return SeqMaster::GenerateCode($prefix,$length,$Rows[0]['rCount']+1);
        }
       
}
        class Application {
            function GetBranchBalance($BranchID) {
               global $mysql;
               $data  = $mysql->select("select (sum(PaidToAdmin)-sum(ReceviedAmount))  as rTotal from `_tbl_branches_accounts` where BranchID='".$BranchID."'");   
               return isset($data[0]['rTotal']) ? $data[0]['rTotal'] : 0;
            }
        }
        $applicaiton = new Application();
$mysql   = new MySql("localhost","lakshtex_user","mysql@Pwd","lakshtex_mlm");

    //$income = array(150,30,20,50,40,30,20,20,20,20,20,20);
    $income = array(100);
    
 function getdownlineFree($sponsorCode,&$uplines) {
         
         global $mysql;
         
         $db = $mysql->select("select * from `_tbl_placements` where `ParentMemberCode`='".$sponsorCode."'");
         //Level 1
         $uplines = array();
         if (sizeof($db)<5) {
             $uplines=findUplines($sponsorCode);
             return true; 
         } else {
             //Level1
             $childNodes = $mysql->select("select * from `_tbl_placements` where `ParentMemberCode`='".$sponsorCode."'");
             foreach($childNodes as $childNode ) {
                  $db = $mysql->select("select * from `_tbl_placements` where `ParentMemberCode`='".$childNode['ChildMemberCode']."'"); 
                  if (sizeof($d)<5) {
                      $uplines=findUplines($childNode['ChildMemberCode']);
                      return true;  
                  }
             }
         }
         
         
         
     }
     
     function findUplines_checkout($sponsorCode) {
         
         global $mysql; 
         $uplines = array();
         
         $parentID=$mysql->select("select * from `_tbl_member` where `MemberCode`='".$sponsorCode."'");
         
         $uplines[]=array("MemberID"  =>$parentID[0]['MemberID'],
                          "MemberCode"=>$parentID[0]['MemberCode'],
                          "MemberName"=>$parentID[0]['MemberName']);

         $parentID1=$mysql->select("select * from `_tbl_placements` where `ChildMemberCode`='".$parentID[0]['MemberCode']."'");
         if (sizeof($parentID1)>0) {
             $uplines[]=array("MemberID"  =>$parentID1[0]['ParentMemberID'],
                              "MemberCode"=>$parentID1[0]['ParentMemberCode'],
                              "MemberName"=>$parentID1[0]['ParentMemberName']); 

             $parentID2=$mysql->select("select * from `_tbl_placements` where `ChildMemberCode`='".$parentID1[0]['ParentMemberCode']."'");
             if (sizeof($parentID2)>0) {
                 $uplines[]=array("MemberID"  =>$parentID2[0]['ParentMemberID'],
                                  "MemberCode"=>$parentID2[0]['ParentMemberCode'],
                                  "MemberName"=>$parentID2[0]['ParentMemberName']); 
                                
                 $parentID3=$mysql->select("select * from `_tbl_placements` where `ChildMemberCode`='".$parentID2[0]['ParentMemberCode']."'");
                 if (sizeof($parentID3)>0) {
                     $uplines[]=array("MemberID"  =>$parentID3[0]['ParentMemberID'],
                                      "MemberCode"=>$parentID3[0]['ParentMemberCode'],
                                      "MemberName"=>$parentID3[0]['ParentMemberName']);
                     $parentID4=$mysql->select("select * from `_tbl_placements` where `ChildMemberCode`='".$parentID3[0]['ParentMemberCode']."'");
                     if (sizeof($parentID4)>0) {
                         $uplines[]=array("MemberID"  =>$parentID4[0]['ParentMemberID'],
                                          "MemberCode"=>$parentID4[0]['ParentMemberCode'],
                                          "MemberName"=>$parentID4[0]['ParentMemberName']);   
                                             
                         $parentID5=$mysql->select("select * from `_tbl_placements` where `ChildMemberCode`='".$parentID4[0]['ParentMemberCode']."'");
                         if (sizeof($parentID5)>0) {
                             $uplines[]=array("MemberID"  =>$parentID5[0]['ParentMemberID'],
                                              "MemberCode"=>$parentID5[0]['ParentMemberCode'],
                                              "MemberName"=>$parentID5[0]['ParentMemberName']);   
                             
                             $parentID6=$mysql->select("select * from `_tbl_placements` where `ChildMemberCode`='".$parentID5[0]['ParentMemberCode']."'");
                             if (sizeof($parentID6)>0) {
                                 $uplines[]=array("MemberID"  =>$parentID6[0]['ParentMemberID'],
                                                  "MemberCode"=>$parentID6[0]['ParentMemberCode'],
                                                  "MemberName"=>$parentID6[0]['ParentMemberName']);   
                                 
                                 $parentID7=$mysql->select("select * from `_tbl_placements` where `ChildMemberCode`='".$parentID6[0]['ParentMemberCode']."'");
                                 if (sizeof($parentID7)>0) {
                                     $uplines[]=array("MemberID"  =>$parentID7[0]['ParentMemberID'],
                                                      "MemberCode"=>$parentID7[0]['ParentMemberCode'],
                                                      "MemberName"=>$parentID7[0]['ParentMemberName']);   
                                        
                                        $parentID8=$mysql->select("select * from `_tbl_placements` where `ChildMemberCode`='".$parentID7[0]['ParentMemberCode']."'");
                                        if (sizeof($parentID8)>0) {
                                            $uplines[]=array("MemberID"  =>$parentID8[0]['ParentMemberID'],
                                                             "MemberCode"=>$parentID8[0]['ParentMemberCode'],
                                                             "MemberName"=>$parentID8[0]['ParentMemberName']);   
                                            
                                            $parentID9=$mysql->select("select * from `_tbl_placements` where `ChildMemberCode`='".$parentID8[0]['ParentMemberCode']."'");
                                            if (sizeof($parentID9)>0) {
                                                $uplines[]=array("MemberID"=>$parentID9[0]['ParentMemberID'],
                                                                 "MemberCode"=>$parentID9[0]['ParentMemberCode'],
                                                                 "MemberName"=>$parentID9[0]['ParentMemberName']);   
                                            }
                                        }
                                    }
                                }
                            }
                        }
                     }  
                 }
             } else {
                 
             }
             return $uplines; 
         }
   
     function getOverallBalance($MemberCode) {
         global $mysql;
         $data = $mysql->select("select sum(LevelIncome) as income from _tbl_earnings where MemberCode='".$MemberCode."'") ;
         return isset($data[0]['income']) ? $data[0]['income'] : "0";
     }
    
       
     function getLevelBasedEarning($MemberCode,$LevelNumber) {
         global $mysql;
         $data = $mysql->select("select sum(LevelIncome) as income from _tbl_earnings where  LevelNumber='".$LevelNumber."'  and MemberCode='".$MemberCode."'") ;
         return isset($data[0]['income']) ? $data[0]['income'] : "0";
     }
     
     function getLevelMembers($MemberCode,$LevelNumber) {
         global $mysql;
         $data = $mysql->select("select count(*) as cnt from _tbl_earnings where LevelNumber='".$LevelNumber."' and MemberCode='".$MemberCode."'") ;
         return isset($data[0]['cnt']) ? $data[0]['cnt'] : "0";
     }
     
     function getMembers($MemberCode,$LevelNumber) {
         global $mysql;
         $data = $mysql->select("select * from _tbl_earnings where PlacedByMemberCode='".$MemberCode."' and LevelNumber='".$LevelNumber."' and MemberCode='".$MemberCode."'") ;
         $return=array();
         foreach($data as $d) {
             $return[] =$d['PlacedMemberCode'] ;
         }
         return $return;
     }
     
     function getTags($MemberCode,$TagNumber) {
         global $mysql;
        $data = $mysql->select("select * from _tbl_tags where MemberCode='".$MemberCode."' and LevelTag='".$TagNumber."' ") ;
        return $data;
     }
   
      function findUpline($sponsorCode) {
         
         global $mysql; 
         $uplines = array();
         
         $parentID=$mysql->select("select * from `_tbl_member` where `MemberCode`='".$sponsorCode."'");
         $parentID1=$mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$parentID[0]['MemberCode']."'");
         
         if (sizeof($parentID1)<5) {
             
             $tag = $mysql->select("select * from _tbl_tags where `LevelTag`='1' and `MemberCode`='".$parentID[0]['MemberCode']."'");
             if (sizeof($tag)==0) {
                 $tag[0]['LevelTagID']=$mysql->insert("_tbl_tags",array("MemberID"    => $parentID[0]['MemberID'],
                                                                        "MemberCode"  => $parentID[0]['MemberCode'],
                                                                        "LevelTag"    => "1",
                                                                        "LevelLable"  => "Star",
                                                                        "Required"    => "5",
                                                                        "Filled"      => "0",
                                                                        "TagCreated"  => date("Y-m-d H:i:s"),
                                                                        "LastUpdated" => date("Y-m-d H:i:s"),
                                                                        "TagClosed"   => "Null"));
             }
             $mysql->execute("update _tbl_tags set Filled=(Filled+1), LastUpdated='".date("Y-m-d H:i:s")."' where LevelTagID='".$tag[0]['LevelTagID']."'");
             if (sizeof($parentID1)+1 == 5 ) {
                $mysql->execute("update _tbl_tags set  TagClosed='".date("Y-m-d H:i:s")."' where LevelTagID='".$tag[0]['LevelTagID']."'");
             }
         
         } else if (sizeof($parentID1)<10) {
             
             $tag = $mysql->select("select * from _tbl_tags where `LevelTag`='2' and `MemberCode`='".$parentID[0]['MemberCode']."'");
             if (sizeof($tag)==0) {
                 $tag[0]['LevelTagID']=$mysql->insert("_tbl_tags",array("MemberID"    => $parentID[0]['MemberID'],
                                                                        "MemberCode"  => $parentID[0]['MemberCode'],
                                                                        "LevelTag"    => "2",
                                                                        "LevelLable"  => "Sliver",
                                                                        "Required"    => "5",
                                                                        "Filled"      => "0",
                                                                        "TagCreated"  => date("Y-m-d H:i:s"),
                                                                        "LastUpdated" => date("Y-m-d H:i:s"),
                                                                        "TagClosed"   => "Null"));
             }
             $mysql->execute("update _tbl_tags set Filled=(Filled+1), LastUpdated='".date("Y-m-d H:i:s")."' where LevelTagID='".$tag[0]['LevelTagID']."'");
             if (sizeof($parentID1)+1 == 10 ) {
                $mysql->execute("update _tbl_tags set  TagClosed='".date("Y-m-d H:i:s")."' where LevelTagID='".$tag[0]['LevelTagID']."'");
             }
         
         } else if (sizeof($parentID1)<20) {
             $tag = $mysql->select("select * from _tbl_tags where `LevelTag`='3' and `MemberCode`='".$parentID[0]['MemberCode']."'");
             if (sizeof($tag)==0) {
                 $tag[0]['LevelTagID']=$mysql->insert("_tbl_tags",array("MemberID"=>$parentID[0]['MemberID'],
                 "MemberCode"=>$parentID[0]['MemberCode'],
                 "LevelTag"=>"3",
                 "LevelLable"=>"Gold",
                 "Required"=>"10",
                 "Filled"=>"0",
                 "TagCreated"=>date("Y-m-d H:i:s"),
                 "LastUpdated"=>date("Y-m-d H:i:s"),
                 "TagClosed"=>"Null"));
             }
             $mysql->execute("update _tbl_tags set Filled=(Filled+1),  LastUpdated='".date("Y-m-d H:i:s")."' where LevelTagID='".$tag[0]['LevelTagID']."'");
             if (sizeof($parentID1)+1 == 20 ) {
                $mysql->execute("update _tbl_tags set  TagClosed='".date("Y-m-d H:i:s")."' where LevelTagID='".$tag[0]['LevelTagID']."'");
             }
         } else if (sizeof($parentID1)<30) {
             $tag = $mysql->select("select * from _tbl_tags where `LevelTag`='4' and `MemberCode`='".$parentID[0]['MemberCode']."'");
             if (sizeof($tag)==0) {
                 $tag[0]['LevelTagID']=$mysql->insert("_tbl_tags",array("MemberID"=>$parentID[0]['MemberID'],
                 "MemberCode"=>$parentID[0]['MemberCode'],
                 "LevelTag"=>"4",
                 "LevelLable"=>"GoldP",
                 "Required"=>"10",
                 "Filled"=>"0",
                 "TagCreated"=>date("Y-m-d H:i:s"),
                 "LastUpdated"=>date("Y-m-d H:i:s"),
                 "TagClosed"=>"Null"));
             }
             $mysql->execute("update _tbl_tags set Filled=Filled+1,  LastUpdated='".date("Y-m-d H:i:s")."' where LevelTagID='".$tag[0]['LevelTagID']."'");
             if (sizeof($parentID1)+1 == 30 ) {
                $mysql->execute("update _tbl_tags set  TagClosed='".date("Y-m-d H:i:s")."' where where LevelTagID='".$tag[0]['LevelTagID']."'");
             }  
         } else if (sizeof($parentID1)<40) {
             $tag = $mysql->select("select * from _tbl_tags where `LevelTag`='5' and `MemberCode`='".$parentID[0]['MemberCode']."'");
             if (sizeof($tag)==0) {
                 $tag[0]['LevelTagID']=$mysql->insert("_tbl_tags",array("MemberID"=>$parentID[0]['MemberID'],
                 "MemberCode"=>$parentID[0]['MemberCode'],
                 "LevelTag"=>"5",
                 "LevelLable"=>"GoldPP",
                 "Required"=>"10",
                 "Filled"=>"0",
                 "TagCreated"=>date("Y-m-d H:i:s"),
                 "LastUpdated"=>date("Y-m-d H:i:s"),
                 "TagClosed"=>"Null"));
             }
             $mysql->execute("update _tbl_tags set Filled=Filled+1,  LastUpdated='".date("Y-m-d H:i:s")."'  where LevelTagID='".$tag[0]['LevelTagID']."'");
             if (sizeof($parentID1)+1 == 40 ) {
                $mysql->execute("update _tbl_tags set  TagClosed='".date("Y-m-d H:i:s")."' where LevelTagID='".$tag[0]['LevelTagID']."'");
             }  
             
         }  else if (sizeof($parentID1)<50) {
             $tag = $mysql->select("select * from _tbl_tags where `LevelTag`='6' and `MemberCode`='".$parentID[0]['MemberCode']."'");
             if (sizeof($tag)==0) {
                $tag[0]['LevelTagID']= $mysql->insert("_tbl_tags",array("MemberID"=>$parentID[0]['MemberID'],
                 "MemberCode"=>$parentID[0]['MemberCode'],
                 "LevelTag"=>"6",
                 "LevelLable"=>"GoldPP",
                 "Required"=>"10",
                 "Filled"=>"0",
                 "TagCreated"=>date("Y-m-d H:i:s"),
                 "LastUpdated"=>date("Y-m-d H:i:s"),
                 "TagClosed"=>"Null"));
             }
             $mysql->execute("update _tbl_tags set Filled=Filled+1,  LastUpdated='".date("Y-m-d H:i:s")."' where LevelTagID='".$tag[0]['LevelTagID']."'");
             if (sizeof($parentID1)+1 == 50 ) {
                $mysql->execute("update _tbl_tags set  TagClosed='".date("Y-m-d H:i:s")."' where LevelTagID='".$tag[0]['LevelTagID']."'");
             }  
         } else {
             $tag = $mysql->select("select * from _tbl_tags where `LevelTag`='7' and `MemberCode`='".$parentID[0]['MemberCode']."'");
             if (sizeof($tag)==0) {
                 $tag[0]['LevelTagID']=$mysql->insert("_tbl_tags",array("MemberID"=>$parentID[0]['MemberID'],
                 "MemberCode"=>$parentID[0]['MemberCode'],
                 "LevelTag"=>"7",
                 "LevelLable"=>"GoldPP",
                 "Required"=>"0",
                 "Filled"=>"0",
                 "TagCreated"=>date("Y-m-d H:i:s"),
                 "LastUpdated"=>date("Y-m-d H:i:s"),
                 "TagClosed"=>"Null"));
             }
             $mysql->execute("update _tbl_tags set Filled=Filled+1,  LastUpdated='".date("Y-m-d H:i:s")."' where LevelTag='7' and MemberCode='".$parentID[0]['MemberCode']."'");
         }
         
         $uplines[]=array("MemberID"         => $parentID[0]['MemberID'],
                          "MemberCode"       => $parentID[0]['MemberCode'],
                          "MemberName"       => $parentID[0]['MemberName'],
                          "UplineMemberID"   => $parentID[0]['MemberID'],
                          "UplineMemberCode" => $parentID[0]['MemberCode'],
                          "UplineMemberName" => $parentID[0]['MemberName']);
         return $uplines; 
      }
      
      function findUplines($sponsorCode) {
         
         global $mysql; 
         $uplines = array();
         
         $parentID=$mysql->select("select * from `_tbl_member` where `MemberCode`='".$sponsorCode."'");
         
         $uplines[]=array("MemberID"  =>$parentID[0]['MemberID'],
                          "MemberCode"=>$parentID[0]['MemberCode'],
                          "MemberName"=>$parentID[0]['MemberName']);

         $parentID1=$mysql->select("select * from `_tbl_placements` where `IsPayable` ='1' and `ChildMemberCode`='".$parentID[0]['MemberCode']."'");
         if (sizeof($parentID1)>0) {
             $uplines[]=array("MemberID"  =>$parentID1[0]['UplineMemberID'],
                              "MemberCode"=>$parentID1[0]['UplineMemberCode'],
                              "MemberName"=>$parentID1[0]['UplineMemberName']); 

             $parentID2=$mysql->select("select * from `_tbl_placements` where `IsPayable` ='1' and  `ChildMemberCode`='".$parentID1[0]['UplineMemberCode']."'");
             if (sizeof($parentID2)>0) {
                 $uplines[]=array("MemberID"  =>$parentID2[0]['UplineMemberID'],
                                  "MemberCode"=>$parentID2[0]['UplineMemberCode'],
                                  "MemberName"=>$parentID2[0]['UplineMemberName']); 
                                
                 $parentID3=$mysql->select("select * from `_tbl_placements` where `IsPayable` ='1' and  `ChildMemberCode`='".$parentID2[0]['UplineMemberCode']."'");
                 if (sizeof($parentID3)>0) {
                     $uplines[]=array("MemberID"  =>$parentID3[0]['UplineMemberID'],
                                      "MemberCode"=>$parentID3[0]['UplineMemberCode'],
                                      "MemberName"=>$parentID3[0]['UplineMemberName']);
                     $parentID4=$mysql->select("select * from `_tbl_placements` where `IsPayable` ='1' and  `ChildMemberCode`='".$parentID3[0]['UplineMemberCode']."'");
                     if (sizeof($parentID4)>0) {
                         $uplines[]=array("MemberID"  =>$parentID4[0]['UplineMemberID'],
                                          "MemberCode"=>$parentID4[0]['UplineMemberCode'],
                                          "MemberName"=>$parentID4[0]['UplineMemberName']);   
                                             
                         $parentID5=$mysql->select("select * from `_tbl_placements` where `IsPayable` ='1' and  `ChildMemberCode`='".$parentID4[0]['UplineMemberCode']."'");
                         if (sizeof($parentID5)>0) {
                             $uplines[]=array("MemberID"  =>$parentID5[0]['UplineMemberID'],
                                              "MemberCode"=>$parentID5[0]['UplineMemberCode'],
                                              "MemberName"=>$parentID5[0]['UplineMemberName']);   
                             
                             $parentID6=$mysql->select("select * from `_tbl_placements` where `IsPayable` ='1' and  `ChildMemberCode`='".$parentID5[0]['UplineMemberCode']."'");
                             if (sizeof($parentID6)>0) {
                                 $uplines[]=array("MemberID"  =>$parentID6[0]['UplineMemberID'],
                                                  "MemberCode"=>$parentID6[0]['UplineMemberCode'],
                                                  "MemberName"=>$parentID6[0]['UplineMemberName']);   
                                 
                                 $parentID7=$mysql->select("select * from `_tbl_placements` where `IsPayable` ='1' and  `ChildMemberCode`='".$parentID6[0]['UplineMemberCode']."'");
                                 if (sizeof($parentID7)>0) {
                                     $uplines[]=array("MemberID"  =>$parentID7[0]['UplineMemberID'],
                                                      "MemberCode"=>$parentID7[0]['UplineMemberCode'],
                                                      "MemberName"=>$parentID7[0]['UplineMemberName']);   
                                        
                                        $parentID8=$mysql->select("select * from `_tbl_placements` where `IsPayable` ='1' and  where `ChildMemberCode`='".$parentID7[0]['UplineMemberCode']."'");
                                        if (sizeof($parentID8)>0) {
                                            $uplines[]=array("MemberID"  =>$parentID8[0]['UplineMemberID'],
                                                             "MemberCode"=>$parentID8[0]['UplineMemberCode'],
                                                             "MemberName"=>$parentID8[0]['UplineMemberName']);   
                                            
                                            $parentID9=$mysql->select("select * from `_tbl_placements` where `IsPayable` ='1' and  where `ChildMemberCode`='".$parentID8[0]['UplineMemberCode']."'");
                                            if (sizeof($parentID9)>0) {
                                                $uplines[]=array("MemberID"=>$parentID9[0]['UplineMemberID'],
                                                                 "MemberCode"=>$parentID9[0]['UplineMemberCode'],
                                                                 "MemberName"=>$parentID9[0]['UplineMemberName']);   
                                            }
                                        }
                                    }
                                }
                            }
                        }
                     }  
                 }
             } else {
                 
             }
             return $uplines; 
         }
         
         function fillStarts($length,$required) {
             
             $return = "<div>";
               if ($length>0)  {
             for($i=1;$i<=$length;$i++) {
                 $return .= "<img src='../assets/images/stars.png'>";   
             }
             for($i=1;$i<=$required-$length;$i++) {
                $return .= "<img src='../assets/images/stars_gray.png'>";   
             }
             } else {
              for($i=1;$i<=$required;$i++) {
                $return .= "<img src='../assets/images/stars_gray.png'>";   
             }   
             }
            
             return $return."</div>";  
         } 
         
         function getWithdrawableBalance($MemberCode) {
             global $mysql;
             $e = $mysql->select("select (sum(Credit)-Sum(Debit)) as bal from `_tbl_wallet_earning` where `MemberCode`='".$MemberCode."'");
             return isset($e[0]['bal']) ? $e[0]['bal'] : "0";
         }
          function GetUtilityBalance($MemberCode) {
             global $mysql;
             $e = $mysql->select("select (sum(Credit)-Sum(Debit)) as bal from `_tbl_wallet_utility` where `MemberCode`='".$MemberCode."'");
             return isset($e[0]['bal']) ? $e[0]['bal'] : "0";
         }
         
         function DebitCharges($MemberID,$MemberCode,$particulars,$amount) {
             
             global $mysql;
             
             // Debit Service Charge
             $mysql->insert("_tbl_accounts",array("MemberID"        => $MemberID,
                                                  "MemberCode"      => $MemberCode,
                                                  "TxnDate"         => date("Y-m-d H:i:s"),
                                                  "Particulars"     => "Debited Service Charge (5%)  of ".$particulars,
                                                  "Amount"          => number_format($amount*5/100,2),
                                                  "Credit"          => "0",
                                                  "Debit"           => number_format($amount*5/100,2),
                                                  "Balance"         => number_format(getWithdrawableBalance($MemberCode)-($amount*5/100),2),
                                                  "VoucherID"       => "2",
                                                  "VoucherName"     => "ServiceChrgDebit",
                                                  "ToFrom"          => $MemberID,
                                                  "ToFromCode"      => $MemberCode));
                                  
             $mysql->insert("_tbl_accounts",array("MemberID"       => "0",
                                                  "MemberCode"     => "0",
                                                  "TxnDate"        => date("Y-m-d H:i:s"),
                                                  "Particulars"    => "Credited Service Charge (5%) of ".$particulars,
                                                  "Amount"         => number_format($amount*5/100,2),
                                                  "Credit"         => number_format($amount*5/100,2),
                                                  "Debit"          => "0",
                                                  "Balance"        => number_format(getWithdrawableBalance("0")+($amount*5/100),2),
                                                  "VoucherID"      => "3",
                                                  "VoucherName"    => "ServiceChrgCredit",
                                                  "ToFrom"         => $MemberID,
                                                  "ToFromCode"     => $MemberCode));
                                  // Debit Administrative Charges
             $mysql->insert("_tbl_accounts",array("MemberID"       => $MemberID,
                                                  "MemberCode"     => $MemberCode,
                                                  "TxnDate"        => date("Y-m-d H:i:s"),
                                                  "Particulars"    => "Debited Administrative Charge (5%)  of ".$particulars,
                                                  "Amount"         => number_format($amount*5/100,2),
                                                  "Credit"         => "0",
                                                  "Debit"          => number_format($amount*5/100,2),
                                                  "Balance"        => number_format(getWithdrawableBalance($MemberCode)-($amount*5/100),2),
                                                  "VoucherID"      => "4",
                                                  "VoucherName"    => "AdminChrgDebit",
                                                  "ToFrom"         => $MemberID,
                                                  "ToFromCode"     => $MemberCode));
                                  
             $mysql->insert("_tbl_accounts",array("MemberID"       => "0",
                                                  "MemberCode"     => "0",
                                                  "TxnDate"        => date("Y-m-d H:i:s"),
                                                  "Particulars"    => "Credited Administrative Charge (5%) of ".$particulars,
                                                  "Amount"         => number_format($amount*5/100,2),
                                                  "Credit"         => number_format($amount*5/100,2),
                                                  "Debit"          => "0",
                                                  "Balance"        => number_format(getWithdrawableBalance("0")+($amount*5/100),2),
                                                  "VoucherID"      => "5",
                                                  "VoucherName"    => "AdminChrgCredit",
                                                  "ToFrom"         => $MemberID,
                                                  "ToFromCode"     => $MemberCode));
             // TDS 
             $mysql->insert("_tbl_accounts",array("MemberID"      => $MemberID,
                                                  "MemberCode"    => $MemberCode,
                                                  "TxnDate"       => date("Y-m-d H:i:s"),
                                                  "Particulars"   => "Debited TDS (10%)  of ".$particulars,
                                                  "Amount"        => number_format($amount*10/100,2),
                                                  "Credit"        => "0",
                                                  "Debit"         => number_format($amount*10/100,2),
                                                  "Balance"       => number_format(getWithdrawableBalance($MemberCode)-($amount*10/100),2),
                                                  "VoucherID"     => "6",
                                                  "VoucherName"   => "TDSDebit",
                                                  "ToFrom"        => $MemberID,
                                                  "ToFromCode"    => $MemberCode));
                                  
             $mysql->insert("_tbl_accounts",array("MemberID"       => "0",
                                                  "MemberCode"     => "0",
                                                  "TxnDate"        => date("Y-m-d H:i:s"),
                                                  "Particulars"    => "Credited TDS (10%) of ".$particulars,
                                                  "Amount"         => number_format($amount*10/100,2),
                                                  "Credit"         => number_format($amount*10/100,2),
                                                  "Debit"          => "0",
                                                  "Balance"        => number_format(getWithdrawableBalance("0")+($amount*10/100),2),
                                                  "VoucherID"      => "7",
                                                  "VoucherName"    => "TDSCredit",
                                                  "ToFrom"         => $MemberID,
                                                  "ToFromCode"     => $MemberCode));
         }
         
         function countDownlines($MemberCode,$stage,$insTable=1,&$downids) {
             
             global $mysql;
             $counts = 0;
             
             if ($stage==1) {
                 
                 $children = $mysql->select("SELECT * FROM _tbl_placements WHERE UplineMemberCode='".$MemberCode."'");
                 foreach($children as $child) {
                     
                     $temp= $mysql->select("SELECT PlacementID FROM _tbl_placements WHERE UplineMemberCode='".$child['ChildMemberCode']."'");
                     if  (sizeof($temp) >= 5)  {
                         $counts++;
                         $downids[]=$child['ChildMemberCode'];
                         if ($insTable==1) {
                             $dup = $mysql->select("select * from _tbl_stage_incomes where MemberCode='".$MemberCode."' and StageID='1' and CountNo='".$counts."'");
                             if (sizeof($dup)==0) {
                                 $mysql->insert("_tbl_earnings",array("MemberID"=>$supline['MemberID'],
                                                                      "MemberCode"=>$child['UplineMemberID'],
                                                                      "MemberName"=>$MemberCode,
                                                                      "LevelNumber"=>"Star",
                                                                      "LevelIncome"=>"50.00",
                                                                      "PlacedMemberID"=>"0",
                                                                      "PlacedMemberCode"=>"0",
                                                                      "PlacedMemberName"=>"0",
                                                                      "PlacedByMemberID"=>"0",
                                                                      "PlacedByMemberCode"=>"0",
                                                                      "PlacedByMemberName"=>"0",
                                                                      "PlacedOn"=>date("Y-m-d H:i:s"),
                                                                      "FromWeb"=>"1",
                                                                      "FromPortal"=>"0"));
                                 $sid = $mysql->insert("_tbl_stage_incomes",array("MemberID"     => $child['UplineMemberID'],
                                                                                  "MemberCode"   => $MemberCode,
                                                                                  "StageID"      => "1",
                                                                                  "CountNo"      => $counts,
                                                                                  "EarnAmount"   => "50.00",
                                                                                  "AccountTxnID" => "0",
                                                                                  "TxnDate"      => date("Y-m-d H:i:s")));
                                 $particulars = "Stage Star Income ".$MemberCode;
                                 $id = $mysql->insert("_tbl_accounts",array("MemberID"       => "0",
                                                                            "MemberCode"     => $MemberCode,
                                                                            "TxnDate"        => date("Y-m-d H:i:s"),
                                                                            "Particulars"    => $particulars,
                                                                            "Amount"         => "50.00",
                                                                            "Credit"         => "50.00",
                                                                            "Debit"          => "0.00",
                                                                            "Balance"        => number_format(getWithdrawableBalance($MemberCode)+50,2),
                                                                            "VoucherID"      => "10",
                                                                            "VoucherName"    => "StarIncome",
                                                                            "ToFrom"         => "0",
                                                                            "ToFromCode"     => "0"));
                                 $mysql->execute("update _tbl_stage_incomes set AccountTxnID='".$id."' where stageincomeid='".$sid."'");
                                 DebitCharges($child['UplineMemberID'],$MemberCode,$particulars,50);
                             }
                         }
                     }
                 }
                 return $counts;
             }
      
             if ($stage==1.5) {
                 $childrena = $mysql->select("SELECT * FROM _tbl_placements WHERE UplineMemberCode='".$MemberCode."'");
                 foreach($childrena as $childa) {
                    $childrenb = $mysql->select("SELECT PlacementID FROM _tbl_placements WHERE UplineMemberCode='".$childa['ChildMemberCode']."'");
                    foreach($childrenb as $childb) {
                        $temp = $mysql->select("SELECT PlacementID FROM _tbl_placements WHERE UplineMemberCode='".$childb['ChildMemberCode']."'");
                        if (sizeof($temp)>0)  {
                            $counts +=   (sizeof($temp) >= 5)  ? 1 :0  ;
                        }
                    }
                 }
                 return $counts;
             }
             
             if ($stage==2) {
                 $counts=0;
                 $children = $mysql->select("SELECT * FROM _tbl_placements WHERE UplineMemberCode='".$MemberCode."'");
                 foreach($children as $child) {
                     $temp= $mysql->select("SELECT PlacementID FROM _tbl_placements WHERE UplineMemberCode='".$child['ChildMemberCode']."'");
                     if (sizeof($temp) >= 10) {
                         $counts++;
                          $downids[]=$child['ChildMemberCode'];
                         if ($insTable==1) {
                             $dup = $mysql->select("select * from _tbl_stage_incomes where MemberCode='".$MemberCode."' and StageID='2' and CountNo='".$counts."'");
                             if (sizeof($dup)==0) {
                                  $mysql->insert("_tbl_earnings",array("MemberID"=>$supline['MemberID'],
                                                                                        "MemberCode"=>$child['UplineMemberID'],
                                                                                        "MemberName"=>$MemberCode,
                                                                                        "LevelNumber"=>"Silver",
                                                                                        "LevelIncome"=>"30.00",
                                                                                        "PlacedMemberID"=>"0",
                                                                                        "PlacedMemberCode"=>"0",
                                                                                        "PlacedMemberName"=>"0",
                                                                                        "PlacedByMemberID"=>"0",
                                                                                        "PlacedByMemberCode"=>"0",
                                                                                        "PlacedByMemberName"=>"0",
                                                                                        "PlacedOn"=>date("Y-m-d H:i:s"),
                                                                                        "FromWeb"=>"1",
                                                                                        "FromPortal"=>"0"));
                                                                                        
                                 $sid = $mysql->insert("_tbl_stage_incomes",array("MemberID"     => "0",
                                                                                  "MemberCode"   => $MemberCode,
                                                                                  "StageID"      => "2",
                                                                                  "CountNo"      => $counts,
                                                                                  "EarnAmount"   => "30",
                                                                                  "AccountTxnID" => "0",
                                                                                  "TxnDate"      => date("Y-m-d H:i:s")));
                                 $particulars = "Stage Silver Income ".$MemberCode;
                                 $id = $mysql->insert("_tbl_accounts",array("MemberID"       => "0",
                                                                            "MemberCode"     => $MemberCode,
                                                                            "TxnDate"        => date("Y-m-d H:i:s"),
                                                                            "Particulars"    => $particulars,
                                                                            "Amount"         => "30.00",
                                                                            "Credit"         => "30.00",
                                                                            "Debit"          => "0.00",
                                                                            "Balance"        => number_format(getWithdrawableBalance($MemberCode)+30,2),
                                                                            "VoucherID"      => "11",
                                                                            "VoucherName"    => "SilverIncome",
                                                                            "ToFrom"         => "0",
                                                                            "ToFromCode"     => "0"));
                                 $mysql->execute("update _tbl_stage_incomes set AccountTxnID='".$id."' where stageincomeid='".$sid."'");
                                 DebitCharges($child['UplineMemberID'],$MemberCode,$particulars,30);
                             }
                         }
                     }
                 }
                 return $counts;
             }
             
             if ($stage==3) {
                 $counts=0;
                 $children = $mysql->select("SELECT * FROM _tbl_placements WHERE UplineMemberCode='".$MemberCode."'");
                 foreach($children as $child) {
                     $temp= $mysql->select("SELECT PlacementID FROM _tbl_placements WHERE UplineMemberCode='".$child['ChildMemberCode']."'");
                     if (sizeof($temp) >= 20)  {
                            $downids[]=$child['ChildMemberCode'];
                         $counts++;
                         if ($insTable==1) {
                             $dup = $mysql->select("select * from _tbl_stage_incomes where MemberCode='".$MemberCode."' and StageID='3' and CountNo='".$counts."'");
                             if (sizeof($dup)==0) {
                                  $mysql->insert("_tbl_earnings",array("MemberID"=>$supline['MemberID'],
                                                                                        "MemberCode"=>$child['UplineMemberID'],
                                                                                        "MemberName"=>$MemberCode,
                                                                                        "LevelNumber"=>"Gold",
                                                                                        "LevelIncome"=>"20.00",
                                                                                        "PlacedMemberID"=>"0",
                                                                                        "PlacedMemberCode"=>"0",
                                                                                        "PlacedMemberName"=>"0",
                                                                                        "PlacedByMemberID"=>"0",
                                                                                        "PlacedByMemberCode"=>"0",
                                                                                        "PlacedByMemberName"=>"0",
                                                                                        "PlacedOn"=>date("Y-m-d H:i:s"),
                                                                                        "FromWeb"=>"1",
                                                                                        "FromPortal"=>"0"));
                                 $sid = $mysql->insert("_tbl_stage_incomes",array("MemberID"     => "0",
                                                                                  "MemberCode"   => $MemberCode,
                                                                                  "StageID"      => "3",
                                                                                  "CountNo"      => $counts,
                                                                                  "EarnAmount"   => "20",
                                                                                  "AccountTxnID" => "0",
                                                                                  "TxnDate"      => date("Y-m-d H:i:s")));
                                 $particulars = "Stage Gold Income ".$MemberCode;
                                 $id = $mysql->insert("_tbl_accounts",array("MemberID"       => "0",
                                                                            "MemberCode"     => $MemberCode,
                                                                            "TxnDate"        => date("Y-m-d H:i:s"),
                                                                            "Particulars"    => $particulars,
                                                                            "Amount"         => "20.00",
                                                                            "Credit"         => "20.00",
                                                                            "Debit"          => "0.00",
                                                                            "Balance"        => number_format(getWithdrawableBalance($MemberCode)+20,2),
                                                                            "VoucherID"      => "12",
                                                                            "VoucherName"    => "GoldIncome",
                                                                            "ToFrom"         => "0",
                                                                            "ToFromCode"     => "0"));
                                 $mysql->execute("update _tbl_stage_incomes set AccountTxnID='".$id."' where stageincomeid='".$sid."'");
                                 DebitCharges($child['UplineMemberID'],$MemberCode,$particulars,20);
                             }
                         }
                     }
                 }
                 return $counts;
             }
             
               if ($stage==4) { // 1+5+5+10+10
                 $counts=0;
                 $children = $mysql->select("SELECT * FROM _tbl_placements WHERE UplineMemberCode='".$MemberCode."'");
                 foreach($children as $child) {
                     $temp= $mysql->select("SELECT PlacementID FROM _tbl_placements WHERE UplineMemberCode='".$child['ChildMemberCode']."'");
                     if (sizeof($temp) >= 30)  {
                           $downids[]=$child['ChildMemberCode'];
                         $counts++;
                         if ($insTable==1) {
                             $dup = $mysql->select("select * from _tbl_stage_incomes where MemberCode='".$MemberCode."' and StageID='3' and CountNo='".$counts."'");
                             if (sizeof($dup)==0) {
                                  $mysql->insert("_tbl_earnings",array("MemberID"=>$supline['MemberID'],
                                                                                        "MemberCode"=>$child['UplineMemberID'],
                                                                                        "MemberName"=>$MemberCode,
                                                                                        "LevelNumber"=>"1+5+5+10+10",
                                                                                        "LevelIncome"=>"20.00",
                                                                                        "PlacedMemberID"=>"0",
                                                                                        "PlacedMemberCode"=>"0",
                                                                                        "PlacedMemberName"=>"0",
                                                                                        "PlacedByMemberID"=>"0",
                                                                                        "PlacedByMemberCode"=>"0",
                                                                                        "PlacedByMemberName"=>"0",
                                                                                        "PlacedOn"=>date("Y-m-d H:i:s"),
                                                                                        "FromWeb"=>"1",
                                                                                        "FromPortal"=>"0"));
                                 $sid = $mysql->insert("_tbl_stage_incomes",array("MemberID"     => "0",
                                                                                  "MemberCode"   => $MemberCode,
                                                                                  "StageID"      => "4",
                                                                                  "CountNo"      => $counts,
                                                                                  "EarnAmount"   => "20",
                                                                                  "AccountTxnID" => "0",
                                                                                  "TxnDate"      => date("Y-m-d H:i:s")));
                                 $particulars = "Stage Gold Income ".$MemberCode;
                                 $id = $mysql->insert("_tbl_accounts",array("MemberID"       => "0",
                                                                            "MemberCode"     => $MemberCode,
                                                                            "TxnDate"        => date("Y-m-d H:i:s"),
                                                                            "Particulars"    => $particulars,
                                                                            "Amount"         => "20.00",
                                                                            "Credit"         => "20.00",
                                                                            "Debit"          => "0.00",
                                                                            "Balance"        => number_format(getWithdrawableBalance($MemberCode)+20,2),
                                                                            "VoucherID"      => "13",
                                                                            "VoucherName"    => "1+5+5+10+10 Income",
                                                                            "ToFrom"         => "0",
                                                                            "ToFromCode"     => "0"));
                                 $mysql->execute("update _tbl_stage_incomes set AccountTxnID='".$id."' where stageincomeid='".$sid."'");
                                 DebitCharges($child['UplineMemberID'],$MemberCode,$particulars,20);
                             }
                         }
                     }
                 }                      
                 return $counts;
             }
             
               if ($stage==5) { // 1+5+5+10+10+10
                 $counts=0;
                 $children = $mysql->select("SELECT * FROM _tbl_placements WHERE UplineMemberCode='".$MemberCode."'");
                 foreach($children as $child) {
                     $temp= $mysql->select("SELECT PlacementID FROM _tbl_placements WHERE UplineMemberCode='".$child['ChildMemberCode']."'");
                     if (sizeof($temp) >= 40)  {
                           $downids[]=$child['ChildMemberCode'];
                         $counts++;
                         if ($insTable==1) {
                             $dup = $mysql->select("select * from _tbl_stage_incomes where MemberCode='".$MemberCode."' and StageID='3' and CountNo='".$counts."'");
                             if (sizeof($dup)==0) {
                                  $mysql->insert("_tbl_earnings",array("MemberID"=>$supline['MemberID'],
                                                                                        "MemberCode"=>$child['UplineMemberID'],
                                                                                        "MemberName"=>$MemberCode,
                                                                                        "LevelNumber"=>" 1+5+5+10+10+10",
                                                                                        "LevelIncome"=>"20.00",
                                                                                        "PlacedMemberID"=>"0",
                                                                                        "PlacedMemberCode"=>"0",
                                                                                        "PlacedMemberName"=>"0",
                                                                                        "PlacedByMemberID"=>"0",
                                                                                        "PlacedByMemberCode"=>"0",
                                                                                        "PlacedByMemberName"=>"0",
                                                                                        "PlacedOn"=>date("Y-m-d H:i:s"),
                                                                                        "FromWeb"=>"1",
                                                                                        "FromPortal"=>"0"));
                                 $sid = $mysql->insert("_tbl_stage_incomes",array("MemberID"     => "0",
                                                                                  "MemberCode"   => $MemberCode,
                                                                                  "StageID"      => "5",
                                                                                  "CountNo"      => $counts,
                                                                                  "EarnAmount"   => "20",
                                                                                  "AccountTxnID" => "0",
                                                                                  "TxnDate"      => date("Y-m-d H:i:s")));
                                 $particulars = "Stage Gold Income ".$MemberCode;
                                 $id = $mysql->insert("_tbl_accounts",array("MemberID"       => "0",
                                                                            "MemberCode"     => $MemberCode,
                                                                            "TxnDate"        => date("Y-m-d H:i:s"),
                                                                            "Particulars"    => $particulars,
                                                                            "Amount"         => "20.00",
                                                                            "Credit"         => "20.00",
                                                                            "Debit"          => "0.00",
                                                                            "Balance"        => number_format(getWithdrawableBalance($MemberCode)+20,2),
                                                                            "VoucherID"      => "14",
                                                                            "VoucherName"    => " 1+5+5+10+10 Income",
                                                                            "ToFrom"         => "0",
                                                                            "ToFromCode"     => "0"));
                                 $mysql->execute("update _tbl_stage_incomes set AccountTxnID='".$id."' where stageincomeid='".$sid."'");
                                 DebitCharges($child['UplineMemberID'],$MemberCode,$particulars,20);
                             }
                         }
                     }
                 }
                 return $counts;
             }
             
              if ($stage==6) { // 1+5+5+10+10+10+10
                 $counts=0;
                 $children = $mysql->select("SELECT * FROM _tbl_placements WHERE UplineMemberCode='".$MemberCode."'");
                 foreach($children as $child) {
                     $temp= $mysql->select("SELECT PlacementID FROM _tbl_placements WHERE UplineMemberCode='".$child['ChildMemberCode']."'");
                     if (sizeof($temp) >= 50)  {
                          $downids[]=$child['ChildMemberCode'];
                         $counts++;
                         if ($insTable==1) {
                             $dup = $mysql->select("select * from _tbl_stage_incomes where MemberCode='".$MemberCode."' and StageID='3' and CountNo='".$counts."'");
                             if (sizeof($dup)==0) {
                                  $mysql->insert("_tbl_earnings",array("MemberID"=>$supline['MemberID'],
                                                                                        "MemberCode"=>$child['UplineMemberID'],
                                                                                        "MemberName"=>$MemberCode,
                                                                                        "LevelNumber"=>" 1+5+5+10+10+10+10",
                                                                                        "LevelIncome"=>"20.00",
                                                                                        "PlacedMemberID"=>"0",
                                                                                        "PlacedMemberCode"=>"0",
                                                                                        "PlacedMemberName"=>"0",
                                                                                        "PlacedByMemberID"=>"0",
                                                                                        "PlacedByMemberCode"=>"0",
                                                                                        "PlacedByMemberName"=>"0",
                                                                                        "PlacedOn"=>date("Y-m-d H:i:s"),
                                                                                        "FromWeb"=>"1",
                                                                                        "FromPortal"=>"0"));
                                 $sid = $mysql->insert("_tbl_stage_incomes",array("MemberID"     => "0",
                                                                                  "MemberCode"   => $MemberCode,
                                                                                  "StageID"      => "6",
                                                                                  "CountNo"      => $counts,
                                                                                  "EarnAmount"   => "20",
                                                                                  "AccountTxnID" => "0",
                                                                                  "TxnDate"      => date("Y-m-d H:i:s")));
                                 $particulars = "Stage Gold Income ".$MemberCode;
                                 $id = $mysql->insert("_tbl_accounts",array("MemberID"       => "0",
                                                                            "MemberCode"     => $MemberCode,
                                                                            "TxnDate"        => date("Y-m-d H:i:s"),
                                                                            "Particulars"    => $particulars,
                                                                            "Amount"         => "20.00",
                                                                            "Credit"         => "20.00",
                                                                            "Debit"          => "0.00",
                                                                            "Balance"        => number_format(getWithdrawableBalance($MemberCode)+20,2),
                                                                            "VoucherID"      => "15",
                                                                            "VoucherName"    => "1+5+5+10+10+10 Income",
                                                                            "ToFrom"         => "0",
                                                                            "ToFromCode"     => "0"));
                                 $mysql->execute("update _tbl_stage_incomes set AccountTxnID='".$id."' where stageincomeid='".$sid."'");
                                 DebitCharges($child['UplineMemberID'],$MemberCode,$particulars,20);
                             }
                         }
                     }
                 }
                 return $counts;
             }
             return $counts;
         
         }
       $_Month = array("","January","February","March","April","May","June","July","Augest","September","October","November","December");
         $_monthname = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
    $_SES = array("AM","PM");
    $_DOB_Year_Start = date("Y")-18;
    $_DOB_Year_End = (date("Y")-18)-55;
    //print_r($_SESSION);
  //  echo "Done";
  
class MobileSMS {
    
    public static function sendSMS($mobileNumber,$text,$memberID="") {
        
        global $mysql,$userData;
        
        if (strlen($memberID)>0) {
            $member = $mysql->select("select * from _tbl_member where MemberID='".$memberID."'");
        } else {
            $member = $mysql->select("select * from _tbl_member where MemberID='".$userData['MemberID']."'"); 
        }
        
        $id=$mysql->insert("_tbl_Log_MobileSMS",array("MemberID"    => $member[0]['MemberID'],
                                                      "MemberCode"  => $member[0]['MemberCode'],
                                                      "SmsTo"       => $mobileNumber,
                                                      "Message"     => $text,
                                                      "Url"         => " ",
                                                      "MessagedOn"  => date("Y-m-d H:i:s")));
        $mobileapi =  $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('MobileSMSSendAPI')"); 
        
        $url = $mobileapi[0]['ParamValue']."&number=".$mobileNumber."&message=".urlencode($text)."&uid=".$id;                                               
        $mysql->execute("update _tbl_Log_MobileSMS set Url='".$url."' where SMSID='".$id."'");
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $mysql->execute("update _tbl_Log_MobileSMS set APIResponse='".$response."' where SMSID='".$id."'");
        return $id;
    }
}
  
  
class Member {
    function CreateMember($param) {
        
    }
}

class J2JApplication {
    
    function encryptID($id) {
        
        $array[1]="a";
        $array[2]="B";
        $array[3]="1";
        $array[4]="d";
        $array[5]="E";
        $array[6]="5";
        $array[7]="G";
        $array[8]="h";
        $array[9]="9";
        $array[0]="j";
        $array["-"]="z";

        $ds = str_split($id);
        $ulink = "";
        foreach($ds as $d) {
            $ulink.=$array[$d];
        }
        return $ulink;
    }
    
//    /lakshtex
 
}


function InvalidRegistrationReferCode() {
    return "<div class='row' style='padding:50px;'>
                <div class='col-sm-12' style='text-align: center;'><img src='assets/invalidreference.jpg' style='width:200px;'></div>
                <div class='col-sm-12' style='text-align: center;padding-top:13px;color:red;'>Your entered referal url is invalid</div>
                <div class='col-sm-12' style='text-align: center;padding-top:50px;'><a href='register.php'>Continue to Register</a></div>
            </div>";
}
?> 