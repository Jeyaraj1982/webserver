<?php
session_start();
date_default_timezone_set("Asia/Kolkata");

    class MySql  {
    
    public $link = "";
    public $dbHost = "";
    public $dbUser = "";
    public $dbPass = "";
    public $dbName = "";
    public $qry = "";

    public function __construct($dbHost, $dbUser, $dbPass, $dbName)
    {
        $this->dbHost = $dbHost;
        $this->dbName = $dbName;
        $this->dbUser = $dbUser;
        $this->dbPass = $dbPass;
        $this->link = new PDO("mysql:host=" . $this->dbHost . ";dbname=" . $this->dbName, $this->dbUser, $this->dbPass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function select($sql)
    {
      
        $stmt = $this->link->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        return $stmt->fetchAll();
    }

    public function insert($tableName, $rowData)
    {

        $r = "insert into `" . $tableName . "` (";
        $l = " values (";
        foreach ($rowData as $key => $value) {
            $r .= "`" . $key . "`,";
            if ($value == "Null") {
                $l .= "Null,";
            } else {
                $l .= "'" . $value . "',";
            }
        }
        $r = substr($r, 0, strlen($r) - 1) . ")";
        $l = substr($l, 0, strlen($l) - 1) . ")";
        $sql = $r . $l;

        
        $this->qry = $sql;
        $this->link->exec($sql);
        $last_id = $this->link->lastInsertId();
        return $last_id;
    }

    public function execute($sql)
    {
        
        return $this->link->exec($sql);
    }

    public function __destruct()
    {
        $this->link = null;
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
      
        function GenerateCode($prefix,$numberlength,$number) { 
            for($i=1;$i<=$numberlength-strlen($number);$i++) {
                $prefix .= "0";    
            }
            return $prefix.$number;
        }
        
        function GetNextMemberCode() {
            global $mysql;
            //5H100011002200301
            $prefix = "5H";
            $count = 100002000030001;
            $Rows   = $mysql->select("select count(*) as rCount from `_tbl_member`");
            return $prefix.($count+$Rows[0]['rCount']);
            //return SeqMaster::GenerateCode($prefix,$length,$Rows[0]['rCount']+1);
        }
        function GetNextPinCode() {
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
$mysql   = new MySql("localhost","goldenli_user","mysqlPwd","goldenli_database");

    $income = array(150,30,20,50,40,30,20,20,20,20,20,20);
    
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
   
      function findUpline($sponsorCode) {
         
         global $mysql; 
         $uplines = array();
     
         $parentID=$mysql->select("select * from `_tbl_member` where `MemberCode`='".$sponsorCode."'");
         
         $parentID1=$mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$parentID[0]['MemberCode']."'");
         if (sizeof($parentID1)<5) {
             
             $uplines[]=array("MemberID"         => $parentID[0]['MemberID'],
                              "MemberCode"       => $parentID[0]['MemberCode'],
                              "MemberName"       => $parentID[0]['MemberName'],
                              "UplineMemberID"   => $parentID[0]['MemberID'],
                              "UplineMemberCode" => $parentID[0]['MemberCode'],
                              "UplineMemberName" => $parentID[0]['MemberName']);
             return $uplines; 
         
         } else {
             
             $parent_ID1=$mysql->select("select * from `_tbl_placements` where `ParentMemberCode`='".$parentID[0]['MemberCode']."'");
             if (sizeof($parent_ID1)<10) { /*finished 25*/
                 $temp=array();
                 foreach($parentID1 as $parentid1) {
                     $P1Children = $mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$parentid1['ChildMemberCode']."'");      
                     if (sizeof($P1Children)<5) {
                         $childinfo=$mysql->select("select * from `_tbl_member` where `MemberCode`='".$parentid1['ChildMemberCode']."'");
                         $temp=array("MemberID"         => $parentID[0]['MemberID'],
                                     "MemberCode"       => $parentID[0]['MemberCode'],
                                     "MemberCode1"      => $parentID[0]['MemberCode'],
                                     "MemberName"       => $parentID[0]['MemberName'],
                                     "UplineMemberID"   => $childinfo[0]['MemberID'],
                                     "UplineMemberCode" => $childinfo[0]['MemberCode'],
                                     "UplineMemberName" => $childinfo[0]['MemberName']); 
                         $uplines[]=$temp;
                         return $uplines;
                     }
                 }
             } else if (sizeof($parent_ID1)<15) { /*finished 125*/
                 
                 $childnodes = array();
                 foreach($parentID1 as $parentid1) {
                     $P1Children = $mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$parentid1['ChildMemberCode']."'");      
                     foreach($P1Children as $c) {
                         $childnodes[]=$c  ;           
                     }
                 }
                 $temp=array();
                 foreach($childnodes as $childnode) {
                     $P1Children = $mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$childnode['ChildMemberCode']."'");      
                     if (sizeof($P1Children)<5) {
                         $childinfo=$mysql->select("select * from `_tbl_member` where `MemberCode`='".$childnode['ChildMemberCode']."'");
                         $temp=array("MemberID"         => $parentID[0]['MemberID'],
                                     "MemberCode"       => $parentID[0]['MemberCode'],
                                     "MemberCode1"      => $parentID[0]['MemberCode'],
                                     "MemberName"       => $parentID[0]['MemberName'],
                                     "UplineMemberID"   => $childinfo[0]['MemberID'],
                                     "UplineMemberCode" => $childinfo[0]['MemberCode'],
                                     "UplineMemberName" => $childinfo[0]['MemberName']); 
                         $uplines[]=$temp;
                         return $uplines;
                     }
                 }
                 
             } else if (sizeof($parent_ID1)<20) { /*finished 625*/
                 
                 $childnodes = array();
                 foreach($parentID1 as $parentid1) {
                     $P1Children = $mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$parentid1['ChildMemberCode']."'");      
                     foreach($P1Children as $c) {
                         $P1Childrenc = $mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$c['ChildMemberCode']."'");      
                         foreach($P1Childrenc as $d) {
                                 $childnodes[]=$d  ;
                         }
                     }
                 }
                 
                 $temp=array();
                 foreach($childnodes as $childnode) {
                     $P1Children = $mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$childnode['ChildMemberCode']."'");      
                     if (sizeof($P1Children)<5) {
                         $childinfo=$mysql->select("select * from `_tbl_member` where `MemberCode`='".$childnode['ChildMemberCode']."'");
                         $temp=array("MemberID"         => $parentID[0]['MemberID'],
                                     "MemberCode"       => $parentID[0]['MemberCode'],
                                     "MemberCode1"      => $parentID[0]['MemberCode'],
                                     "MemberName"       => $parentID[0]['MemberName'],
                                     "UplineMemberID"   => $childinfo[0]['MemberID'],
                                     "UplineMemberCode" => $childinfo[0]['MemberCode'],
                                     "UplineMemberName" => $childinfo[0]['MemberName']); 
                         $uplines[]=$temp;
                         return $uplines;
                     }
                 }
                 
                 
             } else if (sizeof($parent_ID1)<25) { /*finished 3125*/
                 
                 $childnodes = array();
                 foreach($parentID1 as $parentid1) {
                     $P1Children = $mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$parentid1['ChildMemberCode']."'");      
                     foreach($P1Children as $c) {
                         $P1Childrenc = $mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$c['ChildMemberCode']."'");      
                         foreach($P1Childrenc as $d) {
                             $P1Childrend = $mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$d['ChildMemberCode']."'");      
                             foreach($P1Childrend as $e) {
                                 $childnodes[]=$e  ;
                             }
                         }
                     }
                 }
                 $temp=array();
                 foreach($childnodes as $childnode) {
                     $P1Children = $mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$childnode['ChildMemberCode']."'");      
                     if (sizeof($P1Children)<5) {
                         $childinfo=$mysql->select("select * from `_tbl_member` where `MemberCode`='".$childnode['ChildMemberCode']."'");
                         $temp=array("MemberID"         => $parentID[0]['MemberID'],
                                     "MemberCode"       => $parentID[0]['MemberCode'],
                                     "MemberCode1"      => $parentID[0]['MemberCode'],
                                     "MemberName"       => $parentID[0]['MemberName'],
                                     "UplineMemberID"   => $childinfo[0]['MemberID'],
                                     "UplineMemberCode" => $childinfo[0]['MemberCode'],
                                     "UplineMemberName" => $childinfo[0]['MemberName']); 
                         $uplines[]=$temp;
                         return $uplines;
                     }
                 }
                 
              } else if (sizeof($parent_ID1)<30) { /*finished 15625*/
                 
                 $childnodes = array();
                 foreach($parentID1 as $parentid1) {
                     $P1Children = $mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$parentid1['ChildMemberCode']."'");      
                     foreach($P1Children as $c) {
                         $P1Childrenc = $mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$c['ChildMemberCode']."'");      
                         foreach($P1Childrenc as $d) {
                             $P1Childrend = $mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$d['ChildMemberCode']."'");      
                             foreach($P1Childrend as $e) {
                                 $P1Childrene = $mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$e['ChildMemberCode']."'");      
                                 foreach($P1Childrene as $f) {
                                    $childnodes[]=$f  ;
                                 }
                             }
                         }
                     }
                 }
                 $temp=array();
                 foreach($childnodes as $childnode) {
                     $P1Children = $mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$childnode['ChildMemberCode']."'");      
                     if (sizeof($P1Children)<5) {
                         $childinfo=$mysql->select("select * from `_tbl_member` where `MemberCode`='".$childnode['ChildMemberCode']."'");
                         $temp=array("MemberID"         => $parentID[0]['MemberID'],
                                     "MemberCode"       => $parentID[0]['MemberCode'],
                                     "MemberCode1"      => $parentID[0]['MemberCode'],
                                     "MemberName"       => $parentID[0]['MemberName'],
                                     "UplineMemberID"   => $childinfo[0]['MemberID'],
                                     "UplineMemberCode" => $childinfo[0]['MemberCode'],
                                     "UplineMemberName" => $childinfo[0]['MemberName']); 
                         $uplines[]=$temp;
                         return $uplines;
                     }
                 }
             
             } else if (sizeof($parent_ID1)<35) { /*finished  78125*/
                 
                 $childnodes = array();
                 foreach($parentID1 as $parentid1) {
                     $P1Children = $mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$parentid1['ChildMemberCode']."'");      
                     foreach($P1Children as $c) {
                         $P1Childrenc = $mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$c['ChildMemberCode']."'");      
                         foreach($P1Childrenc as $d) {
                             $P1Childrend = $mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$d['ChildMemberCode']."'");      
                             foreach($P1Childrend as $e) {
                                 $P1Childrene = $mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$e['ChildMemberCode']."'");      
                                 foreach($P1Childrene as $f) {
                                     $P1Childrenf = $mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$f['ChildMemberCode']."'");      
                                     foreach($P1Childrenf as $g) {
                                        $childnodes[]=$g  ;
                                     }
                                 }
                             }
                         }
                     }
                 }
                 $temp=array();
                 foreach($childnodes as $childnode) {
                     $P1Children = $mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$childnode['ChildMemberCode']."'");      
                     if (sizeof($P1Children)<5) {
                         $childinfo=$mysql->select("select * from `_tbl_member` where `MemberCode`='".$childnode['ChildMemberCode']."'");
                         $temp=array("MemberID"         => $parentID[0]['MemberID'],
                                     "MemberCode"       => $parentID[0]['MemberCode'],
                                     "MemberCode1"      => $parentID[0]['MemberCode'],
                                     "MemberName"       => $parentID[0]['MemberName'],
                                     "UplineMemberID"   => $childinfo[0]['MemberID'],
                                     "UplineMemberCode" => $childinfo[0]['MemberCode'],
                                     "UplineMemberName" => $childinfo[0]['MemberName']); 
                         $uplines[]=$temp;
                         return $uplines;
                     }
                 }
                 
              } else if (sizeof($parent_ID1)<40) { /*finished  390625*/
                 
                 $childnodes = array();
                 foreach($parentID1 as $parentid1) {
                     $P1Children = $mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$parentid1['ChildMemberCode']."'");      
                     foreach($P1Children as $c) {
                         $P1Childrenc = $mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$c['ChildMemberCode']."'");      
                         foreach($P1Childrenc as $d) {
                             $P1Childrend = $mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$d['ChildMemberCode']."'");      
                             foreach($P1Childrend as $e) {
                                 $P1Childrene = $mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$e['ChildMemberCode']."'");      
                                 foreach($P1Childrene as $f) {
                                     $P1Childrenf = $mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$f['ChildMemberCode']."'");      
                                     foreach($P1Childrenf as $g) {
                                         $P1Childreng = $mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$g['ChildMemberCode']."'");      
                                         foreach($P1Childreng as $h) {
                                             $childnodes[]=$h  ;
                                         }
                                     }
                                 }
                             }
                         }
                     }
                 }
                 $temp=array();
                 foreach($childnodes as $childnode) {
                     $P1Children = $mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$childnode['ChildMemberCode']."'");      
                     if (sizeof($P1Children)<5) {
                         $childinfo=$mysql->select("select * from `_tbl_member` where `MemberCode`='".$childnode['ChildMemberCode']."'");
                         $temp=array("MemberID"         => $parentID[0]['MemberID'],
                                     "MemberCode"       => $parentID[0]['MemberCode'],
                                     "MemberCode1"      => $parentID[0]['MemberCode'],
                                     "MemberName"       => $parentID[0]['MemberName'],
                                     "UplineMemberID"   => $childinfo[0]['MemberID'],
                                     "UplineMemberCode" => $childinfo[0]['MemberCode'],
                                     "UplineMemberName" => $childinfo[0]['MemberName']); 
                         $uplines[]=$temp;
                         return $uplines;
                     }
                 }
                 
              } else if (sizeof($parent_ID1)<45) { /*finished  1953125*/
                 
                 $childnodes = array();
                 foreach($parentID1 as $parentid1) {
                     $P1Children = $mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$parentid1['ChildMemberCode']."'");      
                     foreach($P1Children as $c) {
                         $P1Childrenc = $mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$c['ChildMemberCode']."'");      
                         foreach($P1Childrenc as $d) {
                             $P1Childrend = $mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$d['ChildMemberCode']."'");      
                             foreach($P1Childrend as $e) {
                                 $P1Childrene = $mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$e['ChildMemberCode']."'");      
                                 foreach($P1Childrene as $f) {
                                     $P1Childrenf = $mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$f['ChildMemberCode']."'");      
                                     foreach($P1Childrenf as $g) {
                                         $P1Childreng = $mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$g['ChildMemberCode']."'");      
                                         foreach($P1Childreng as $h) {
                                             $P1Childrenh = $mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$h['ChildMemberCode']."'");      
                                             foreach($P1Childrenh as $i) {
                                                $childnodes[]=$i;
                                             }
                                         }
                                     }
                                 }
                             }
                         }
                     }
                 }
                 $temp=array();
                 foreach($childnodes as $childnode) {
                     $P1Children = $mysql->select("select * from `_tbl_placements` where `UplineMemberCode`='".$childnode['ChildMemberCode']."'");      
                     if (sizeof($P1Children)<5) {
                         $childinfo=$mysql->select("select * from `_tbl_member` where `MemberCode`='".$childnode['ChildMemberCode']."'");
                         $temp=array("MemberID"         => $parentID[0]['MemberID'],
                                     "MemberCode"       => $parentID[0]['MemberCode'],
                                     "MemberCode1"      => $parentID[0]['MemberCode'],
                                     "MemberName"       => $parentID[0]['MemberName'],
                                     "UplineMemberID"   => $childinfo[0]['MemberID'],
                                     "UplineMemberCode" => $childinfo[0]['MemberCode'],
                                     "UplineMemberName" => $childinfo[0]['MemberName']); 
                         $uplines[]=$temp;
                         return $uplines;
                     }
                 }
                 
                
             } else {
                  return array();
             }
         }
      }
      
      function findUplines($sponsorCode) {
         
         global $mysql; 
         $uplines = array();
         
         $parentID=$mysql->select("select * from `_tbl_member` where `MemberCode`='".$sponsorCode."'");
         
         $uplines[]=array("MemberID"  =>$parentID[0]['MemberID'],
                          "MemberCode"=>$parentID[0]['MemberCode'],
                          "MemberName"=>$parentID[0]['MemberName']);

         $parentID1=$mysql->select("select * from `_tbl_placements` where `ChildMemberCode`='".$parentID[0]['MemberCode']."'");
         if (sizeof($parentID1)>0) {
             $uplines[]=array("MemberID"  =>$parentID1[0]['UplineMemberID'],
                              "MemberCode"=>$parentID1[0]['UplineMemberCode'],
                              "MemberName"=>$parentID1[0]['UplineMemberName']); 

             $parentID2=$mysql->select("select * from `_tbl_placements` where `ChildMemberCode`='".$parentID1[0]['UplineMemberCode']."'");
             if (sizeof($parentID2)>0) {
                 $uplines[]=array("MemberID"  =>$parentID2[0]['UplineMemberID'],
                                  "MemberCode"=>$parentID2[0]['UplineMemberCode'],
                                  "MemberName"=>$parentID2[0]['UplineMemberName']); 
                                
                 $parentID3=$mysql->select("select * from `_tbl_placements` where `ChildMemberCode`='".$parentID2[0]['UplineMemberCode']."'");
                 if (sizeof($parentID3)>0) {
                     $uplines[]=array("MemberID"  =>$parentID3[0]['UplineMemberID'],
                                      "MemberCode"=>$parentID3[0]['UplineMemberCode'],
                                      "MemberName"=>$parentID3[0]['UplineMemberName']);
                     $parentID4=$mysql->select("select * from `_tbl_placements` where `ChildMemberCode`='".$parentID3[0]['UplineMemberCode']."'");
                     if (sizeof($parentID4)>0) {
                         $uplines[]=array("MemberID"  =>$parentID4[0]['UplineMemberID'],
                                          "MemberCode"=>$parentID4[0]['UplineMemberCode'],
                                          "MemberName"=>$parentID4[0]['UplineMemberName']);   
                                             
                         $parentID5=$mysql->select("select * from `_tbl_placements` where `ChildMemberCode`='".$parentID4[0]['UplineMemberCode']."'");
                         if (sizeof($parentID5)>0) {
                             $uplines[]=array("MemberID"  =>$parentID5[0]['UplineMemberID'],
                                              "MemberCode"=>$parentID5[0]['UplineMemberCode'],
                                              "MemberName"=>$parentID5[0]['UplineMemberName']);   
                             
                             $parentID6=$mysql->select("select * from `_tbl_placements` where `ChildMemberCode`='".$parentID5[0]['UplineMemberCode']."'");
                             if (sizeof($parentID6)>0) {
                                 $uplines[]=array("MemberID"  =>$parentID6[0]['UplineMemberID'],
                                                  "MemberCode"=>$parentID6[0]['UplineMemberCode'],
                                                  "MemberName"=>$parentID6[0]['UplineMemberName']);   
                                 
                                 $parentID7=$mysql->select("select * from `_tbl_placements` where `ChildMemberCode`='".$parentID6[0]['UplineMemberCode']."'");
                                 if (sizeof($parentID7)>0) {
                                     $uplines[]=array("MemberID"  =>$parentID7[0]['UplineMemberID'],
                                                      "MemberCode"=>$parentID7[0]['UplineMemberCode'],
                                                      "MemberName"=>$parentID7[0]['UplineMemberName']);   
                                        
                                        $parentID8=$mysql->select("select * from `_tbl_placements` where `ChildMemberCode`='".$parentID7[0]['UplineMemberCode']."'");
                                        if (sizeof($parentID8)>0) {
                                            $uplines[]=array("MemberID"  =>$parentID8[0]['UplineMemberID'],
                                                             "MemberCode"=>$parentID8[0]['UplineMemberCode'],
                                                             "MemberName"=>$parentID8[0]['UplineMemberName']);   
                                            
                                            $parentID9=$mysql->select("select * from `_tbl_placements` where `ChildMemberCode`='".$parentID8[0]['UplineMemberCode']."'");
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
         
          function fillStarts($length) {
                                     $return = "";
                                     for($i=1;i<=5-$length;$i++) {
                                      $return .= "<img src='assets/images/stars_gray.png'>";   
                                     }
                                     for($i=$length;$i<=5;$i++) {
                                        $return .= "<img src='assets/images/stars.png'>";   
                                     }
                                   return $return;  
                                 }
?>