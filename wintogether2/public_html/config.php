<?php
session_start();
date_default_timezone_set('Asia/Calcutta');
if (isset($_GET['action']) && $_GET['action']=="logout") {
    session_destroy();
    header("Location: ../index.php");    
    exit;
}

if (isset($_SESSION['User']) && $_SESSION['User']['Role']=="Member") {
    define("UserRole","Member");
}
if (isset($_SESSION['User']) && $_SESSION['User']['Role']=="Admin") {
    define("UserRole","Admin");
}

if (isset($_SESSION['User']) && $_SESSION['User']['Role']=="Stockiest") {
    define("UserRole","Stockiest");
}
if (isset($_SESSION['User']) && $_SESSION['User']['Role']=="BSCenter") {
    define("UserRole","BSCenter");
}
                                                                                   
define("DbHost","localhost");
define("DbName","wintoget_database");
define("DbUser","wintoget_user");            
define("DbPassword","mysqluser@123");

include_once(__DIR__."/app/controller/class.DatabaseController.php");
include_once(__DIR__."/app/controller/class.MobileSMSController.php");
include_once(__DIR__."/app/controller/class.EmailController.php");

define("SiteTitle","WinTogether");
define("SITE_TITLE","WinTogether");
define("EPINS","EPINs");
define("EPIN","EPIN");
define("loginUrl","http://WinTogether2.com/login");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__.'/app/lib/mail/src/Exception.php';
require __DIR__.'/app/lib/mail/src/PHPMailer.php';
require __DIR__.'/app/lib/mail/src/SMTP.php';

$mail    = new PHPMailer;
function reInitMail() {
    global $mail;
    $mail    = new PHPMailer;
}      

$mysql   = new MySqldatabase(DbHost,DbUser,DbPassword,DbName);

    function getEarningWalletBalance($memberID) {
        global $mysql;
        $d = $mysql->select("select (sum(Credits)-sum(Debits)) as bal from  _tbl_wallet_earnings where MemberID='".$memberID."'");
        return isset($d[0]['bal']) ? $d[0]['bal'] : 0;      
    }
   
    function getEarningWalletShortSummary($memberID) {
        global $mysql;
        $d = $mysql->select("select sum(Credits) as Credits, sum(Debits) as Debits,  (sum(Credits)-sum(Debits)) as Balance from  _tbl_wallet_earnings where MemberID='".$memberID."'");
        return isset($d[0]['Balance']) ? $d[0] : array("Credits"=>0,"Debits"=>0,"Balance"=>0);      
    }

    function getUtilityhWalletBalance($memberID) {
        global $mysql;
        $d = $mysql->select("select (sum(Credits)-sum(Debits)) as bal from  _tbl_wallet_utility where MemberID='".$memberID."'");
        return isset($d[0]['bal']) ? $d[0]['bal'] : 0;      
    }
   
     function getUtilityhWalletShortSummary($memberID) {
        global $mysql;
        $d = $mysql->select("select sum(Credits) as Credits, sum(Debits) as Debits,  (sum(Credits)-sum(Debits)) as Balance from  _tbl_wallet_utility where MemberID='".$memberID."'");
       return isset($d[0]['Balance']) ? $d[0] : array("Credits"=>0,"Debits"=>0,"Balance"=>0);      
    }
   
   
   
      class MemberTree {
       
       var $member_code="";  
       var $member_count=0;
       var $error=0;
       var $LeftCount = 0;
       var $RightCount = 0;
       var $PV=0;
       
       var $LeftCarryForwarded = 0;
       var $RightCarryForwarded = 0;
       var $availableLeftCarryForward = 0;
       var $availableRightCarryForward = 0;
       
       var $leftIDs=array();
       var $rightIDs=array();
       var $leftPV=0;
       var $rightPV=0;
       var $todayLeftPV=0;
       var $todayRightPV=0;
       public $process_date="";
       var $primary = "";
       
       function countChildren($MemberCode) {
           global $mysql;
           $children = $mysql->select("select * from `_tblPlacements` where `ParentCode`='".$MemberCode."'");
           $count = sizeof($children);
           
           if ($count<=2) {                                      
               foreach($children as $userId) {
                   $this->PV+=$userId['PV'];
                   $count += $this->countChildren($userId['ChildCode']);
               }                    
           } else {
               $this->error++;
           }
           $this->member_count=$count;
           return $count;
       }
       
       function getTotalLeftCount($ParentCode) {
           
           global $mysql;
           $this->error=0;
           $this->count=0;
           $this->PV=0;
           
           $dwn = $mysql->select("select * from `_tblPlacements` where `Position`='L' and `ParentCode`='".$ParentCode."'");
           if (sizeof($dwn)>0) {
               $this->PV+=$dwn[0]['PV'];
               $data = $this->countChildren($dwn[0]['ChildCode']);
               $this->member_count = 1 + $data;
               return (1 + $data);
           } else {
               return "0";
           }
       }
       
       function getTotalRightCount($ParentCode) {
           global $mysql;
           $this->error=0;
           $this->count=0;
           $this->PV=0;
           $dwn = $mysql->select("select * from `_tblPlacements` where `Position`='R' and `ParentCode`='".$ParentCode."'");
           if (sizeof($dwn)>0) {
                $this->PV+=$dwn[0]['PV'];
               $data = $this->countChildren($dwn[0]['ChildCode']);
               $this->member_count = 1 + $data;
               return (1 + $data);
           } else {
               return "0";
           }
       }
       
       function getNodes($parantID,$pos) {
           
           global $mysql;
           $d = $mysql->select("select * from `_tblPlacements` where `ParentCode`='".$parantID."'");
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
           global $mysql;
           $this->LeftCount = 0;
           $this->RightCount = 0;
           $fL = $mysql->select("select * from `_tblPlacements` where `Position`='L' and `ParentCode`='".$MemberCode."'");
           if (sizeof($fL)==0) {
               return $MemberCode.",LR,0,0";
           } else {
               $this->LeftCount++;
               return $this->getNodes($fL[0]['ChildCode'],"L");
           }
       }
       
       function GetRight($MemberCode) {
           global $mysql;
            $this->LeftCount = 0;
           $this->RightCount = 0;
           $fR = $mysql->select("select * from `_tblPlacements` where `Position`='R' and `ParentCode`='".$MemberCode."'");
           if (sizeof($fR)==0) {
               return $MemberCode.",LR,0,0";
           } else {
               $this->RightCount++;
               return $this->getNodes($fR[0]['ChildCode'],"R");
           }
       }  
       
       function GetLeftLastCode($MemberCode) {
           global $mysql;
           $this->leftIDs=array();
           $fL = $mysql->select("select * from `_tblPlacements` where `Position`='L' and `ParentCode`='".$MemberCode."'");
           if (sizeof($fL)==0) {
               $this->leftIDs[]= $MemberCode;
               return $MemberCode;
           } else {
                $this->leftIDs[]= $fL[0]['ChildCode'];
                return $this->postition_getNodes($fL[0]['ChildCode'],"L");
           }
       }
       
       function GetLastRight($MemberCode) {
           global $mysql;
           $this->rightIDs=array();
           $fR = $mysql->select("select * from `_tblPlacements` where `Position`='R' and `ParentCode`='".$MemberCode."'");
           if (sizeof($fR)==0) {
               $this->rightIDs[]= $MemberCode;
               return $MemberCode;
           } else {
               $this->rightIDs[]= $fR[0]['ChildCode'];
               return $this->postition_getNodes($fR[0]['ChildCode'],"R");
           }
       }
       
       function postition_getNodes($parantID,$pos) {
           
           global $mysql;
           $d = $mysql->select("select * from `_tblPlacements` where Position='".$pos."' and `ParentCode`='".$parantID."'");
           if (sizeof($d)==0) {
               if ($pos=="L") {
                   $this->leftIDs[]= $parantID;
               }
               if ($pos=="R") {
                   $this->rightIDs[]= $parantID;
               }
                return $parantID;    
           } else if (sizeof($d)==1) {
               if ($pos=="L") {
                   $this->leftIDs[]= $d[0]['ChildCode'];
               }
               if ($pos=="R") {
                   $this->rightIDs[]= $d[0]['ChildCode'];
               }
                return $this->postition_getNodes($d[0]['ChildCode'],$pos);
           } else {
               foreach($d as $node) {
                   return $this->postition_getNodes($node['ChildCode'],$pos);
               }
           }                          
       }
       
       function countChildrenCodees($MemberCode,$idpos="") {
           global $mysql;
           $children = $mysql->select("select * from `_tblPlacements` where `ParentCode`='".$MemberCode."'");
           $count = "";
           $date = $this->process_date == "" ? date("Y-m-d") : $this->process_date;
           foreach($children as $userId) {
               if ($idpos=="L") {
                   //$this->leftPV+=$userId['PV'];
                   //if ($date==date("Y-m-d",strtotime($userId['PlacedOn']))) {
                   if (strtotime($date)==strtotime(date("Y-m-d",strtotime($userId['PlacedOn'])))) {
                       $this->todayLeftPV += $userId['PV'];
                   }
                   
                   if (strtotime(date("Y-m-d",strtotime($userId['PlacedOn'])))<=strtotime($date)) {
                       $this->leftPV+=$userId['PV'];
                      $this->leftIDs[]=$userId['ChildCode'];  
                   }
                   //$this->leftPV+=$userId['PV'];
                  // $this->leftIDs[]=$userId['ChildCode'];    
               }
               if ($idpos=="R") {
                   
                   if (strtotime(date("Y-m-d",strtotime($userId['PlacedOn'])))<=strtotime($date)) {
                       $this->rightPV+=$userId['PV'];
                      $this->rightIDs[]=$userId['ChildCode'];
                   }
                   
                   if (strtotime($date)==strtotime(date("Y-m-d",strtotime($userId['PlacedOn'])))) {
                        $this->todayRightPV += $userId['PV'];
                   }
                   
               }
               $count .= ",".$userId['ChildCode'];
               $count .= ",". $this->countChildrenCodees($userId['ChildCode'],$idpos);
           }
           return $count;
       }                        
       
       function GetNodeIDs($MemberCode,$pos) {
           global $mysql;
           $date = $this->process_date == "" ? date("Y-m-d") : $this->process_date;
            if ($this->primary=="") {
             //   $this->primary = $MemberCode;
            }
           if ($pos=="L") {
               $this->leftIDs=array();
               $this->leftPV=0;
               $this->todayLeftPV=0;
               
               $fL = $mysql->select("select * from `_tblPlacements` where `Position`='L' and `ParentCode`='".$MemberCode."'");
               if (sizeof($fL)==0) {
                   return $MemberCode;
               }
               
               if (sizeof($fL)==1) {
                   if (strtotime(date("Y-m-d",strtotime($fL[0]['PlacedOn'])))<=strtotime($date)) {
                       $this->leftPV+=$fL[0]['PV'];
                       if ($fL[0]['PlacedByCode']==$this->primary) {
                          // $this->leftPV += $fL[0]['DirectPV'];
                       }
                       $this->leftIDs[]=$fL[0]['ChildCode'];
                   }
                   
                   if (strtotime($date)==strtotime(date("Y-m-d",strtotime($fL[0]['PlacedOn'])))) {
                       $this->todayLeftPV += $fL[0]['PV'];
                       if ($fL[0]['PlacedByCode']==$this->primary) {
                         //  $this->todayLeftPV += $fL[0]['DirectPV'];
                       }
                   }
                   
                   
                   return $this->countChildrenCodees($fL[0]['ChildCode'],"L");
               }
           }
           
           if ($pos=="R") {
               $this->rightIDs=array();
               $this->rightPV=0;
               $this->todayRightPV=0;
               $fR = $mysql->select("select * from `_tblPlacements` where `Position`='R' and `ParentCode`='".$MemberCode."'");
               if (sizeof($fR)==0) {
                   return $MemberCode;
               }
               if (sizeof($fR)==1) {
                   
                   if (strtotime(date("Y-m-d",strtotime($fR[0]['PlacedOn'])))<=strtotime($date)) {
                       $this->rightPV+=$fR[0]['PV'];
                       if ($fR[0]['PlacedByCode']==$this->primary) {
                       //$this->rightPV += $fR[0]['DirectPV'];
                       }
                       $this->rightIDs[]=$fR[0]['ChildCode'];
                   }
                   
                   if (strtotime($date)==strtotime(date("Y-m-d",strtotime($fR[0]['PlacedOn'])))) {
                        $this->todayRightPV += $fR[0]['PV'];
                       if ($fR[0]['PlacedByCode']==$this->primary) {
                        //  $this->todayRightPV += $fR[0]['DirectPV'];
                       }
                   }
                   return $this->countChildrenCodees($fR[0]['ChildCode'],"R");
               }
           }
       }
   
        function IsBinaryEligible($MemberCode,&$left_ids,&$right_ids) {
            global $mysql;
            $left_ids = array();
            $right_ids = array();
            $d = $mysql->select("select * from _tbl_Members where MemberCode='".$MemberCode."'");
            if ($d[0]['DirectLeft']>=1 && $d[0]['DirectRight']>=1) {
                return true;
            } else {
                return false;
            }
            
            $this->GetNodeIDs($MemberCode,"L");
            $left_ids = $this->leftIDs;
            $sqlids = array();                                      
            foreach($left_ids as $id) {
                $sqlids[]= "'".$id."'";
            }
            if (sizeof($sqlids)>0) {
                $ldata = $mysql->select("select * from _tblPlacements where PlacedByCode='".$MemberCode."' and ChildCode in (".implode(",",$sqlids).")");    
            } else {
                $ldata = array();
            }
           
            $this->GetNodeIDs($MemberCode,"R");
            $right_ids = $this->rightIDs;
            $sqlids = array();
            foreach($right_ids as $id) {
                $sqlids[] = "'".$id."'";
            }    
            if (sizeof($sqlids)>0)                                                    {
            $rdata = $mysql->select("select * from _tblPlacements where PlacedByCode='".$MemberCode."' and ChildCode in (".implode(",",$sqlids).")");    
            } else {
            $rdata = array();    
            }

            if (sizeof($ldata)>=1 && sizeof($rdata)>=1) {
                return true;
            } else {
                return false;
            }
        }
       
        function IsPayoutEligible($MemberCode,&$left_ids,&$right_ids) {
            global $mysql;
            $left_ids=array();
            $right_ids=array();
            $d = $mysql->select("select * from _tbl_Members where MemberCode='".$MemberCode."'");
            if ($d[0]['DirectLeft']>=1 && $d[0]['DirectRight']>=1) {
                return true;
            } else {
                return false;
            }
            
            
            $this->leftIDs=array();
            $this->GetNodeIDs($MemberCode,"L");
            $left_ids = $this->leftIDs;
            $left_ids = array_unique($left_ids);
            $sqlids = array();
            $n_leftids = array();
            foreach($left_ids as $id) {
                if ($id!=$MemberCode) {
                    $sqlids[]= "'".$id."'";
                }
                if ($id!=$MemberCode) {
                    $n_leftids[] = $id;
                }
            }
            if (sizeof($sqlids)>0) {  
                $ldata = $mysql->select("select * from _tblPlacements where PlacedByCode='".$MemberCode."' and ChildCode in (".implode(",",$sqlids).")");    
            } else {
                $ldata = array();    
            }
           
            $this->rightIDs=array();
            $this->GetNodeIDs($MemberCode,"R");
            $right_ids = $this->rightIDs;
            $right_ids = array_unique($right_ids);
            $sqlids = array();
            $n_rightids = array();
            foreach($right_ids as $id) {
                if ($id!=$MemberCode) {
                    $sqlids[]=  "'".$id."'";
                }
                if ($id!=$MemberCode) {
                    $n_rightidsp[] = $id;
                }
            }        
            if (sizeof($sqlids)>0) {
            $rdata = $mysql->select("select * from _tblPlacements where PlacedByCode='".$MemberCode."' and ChildCode in (".implode(",",$sqlids).")");
            } else {
            $rdata = array();    
            }  
                 
$left_ids= $n_leftids;
$right_ids= $n_rightidsp;
                                         
           
           // if ( (sizeof($left_ids)>=1 && sizeof($right_ids)>=2) || (sizeof($left_ids)>=2 && sizeof($right_ids)>=1) ) {   //2:1 or 1:2
            if ( (sizeof($left_ids)>=1 && sizeof($right_ids)>=1) || (sizeof($left_ids)>=1 && sizeof($right_ids)>=1) ) {   //1:1
           
                return true;
            } else {
                return false;
            }
        }      
       
        function Carryforward() {          
            global $mysql;
            $xcarryforward =  $mysql->select("select * from _tbl_payoutsummary where MemberCode='".$this->member_code."'");
            $carryforward =  $mysql->select("select (sum(DebitLeft)) as DebitLeft, (sum(DebitRight)) as DebitRight from _tbl_payoutsummary where MemberCode='".$this->member_code."'");
            $this->LeftCarryForwarded         = (isset($carryforward[0]['DebitLeft'])) ? $carryforward[0]['DebitLeft'] : "0";
            $this->RightCarryForwarded        = (isset($carryforward[0]['DebitRight'])) ? $carryforward[0]['DebitRight'] : "0";
            if (sizeof($xcarryforward)==0) {
                $this->availableLeftCarryForward  = $this->leftPV;
                $this->availableRightCarryForward = $this->rightPV;
            } else {
                $this->availableLeftCarryForward  =  $this->leftPV -  $this->LeftCarryForwarded ;//    + $this->todayLeftPV;
                $this->availableRightCarryForward =  $this->rightPV  - $this->RightCarryForwarded ;//  + $this->todayRightPV;
            }
        }
       
   }    
   
     function getMemberCode($memberName) {
       
        global $mysql;
        $member_code_prefix = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('MemberCodePrefix')");
        $count = $mysql->select("select * from _tbl_Members");
        $memberName = preg_replace('/\s+/', '', $memberName);
        $memberName = str_replace(".","",$memberName);
        $memberName = str_replace(" ","",$memberName);
       
        $d = $member_code_prefix[0]['ParamValue'];
        $d .= strtoupper(substr($memberName,0,3));
       
        $member_code_length = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('MemberCodeLength')");                                  
       
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
   
   $memberTree = new MemberTree();
   
    function getImage($thumb,$gender) {
               
                 if ((strlen(trim($thumb))<6) || ($thumb == null)) {
                     if ($gender=="Female") {
                         return '<img src="assets/images/smart_logo.png"  class="rounded-circle" width="48">';
                         return '<img src="assets/images/female_default.png"  class="rounded-circle" width="48">';
                     }
                     
                     if ($gender=="Male") {
                         return '<img src="assets/images/smart_logo.png"  class="rounded-circle" width="48">';
                         return '<img src="assets/images/male_default.png"  class="rounded-circle" width="48">';
                     }
                     
                     return '<img src="assets/images/smart_logo.png"  class="rounded-circle" width="48">';
                     return '<img src="assets/images/male_default.png"  class="rounded-circle" width="48">';
                     
                 } else {
                     return '<img src="assets/uploads/'.$thumb.'" class="rounded-circle" width="48">';
                 }
             }
             
    function getImageUrl($thumb,$gender) {
               
                 if ((strlen(trim($thumb))<6) || ($thumb == null)) {
                     if ($gender=="Female") {
                         return 'assets/images/smart_logo.png';
                         return 'assets/images/female_default.png';
                     }
                     
                     if ($gender=="Male") {
                         return "assets/images/smart_logo.png";
                         return "assets/images/male_default.png";
                     }
                     
                     return "assets/images/smart_logo.png";
                     return "assets/images/male_default.png";
                     
                 } else {
                     if (isset($_SESSION['User']) && $_SESSION['User']['Role']=="BSCenter") {
                        return "assets/stores/".$thumb;
                     }else {
                        return "assets/uploads/".$thumb;
                     }
                 }
             }
  $Minute = array("00","01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","56","57","58","59"); 

  function PrintStar($Rating){
      if($Rating=="0"){
         $html  = '<span class="fa fa-star checked" style="color: #aeadad;"></span>';
         $html .= '<span class="fa fa-star checked" style="color: #aeadad;"></span>';    
         $html .= '<span class="fa fa-star checked" style="color: #aeadad;"></span>';    
         $html .= '<span class="fa fa-star checked" style="color: #aeadad;"></span>';    
         $html .= '<span class="fa fa-star checked" style="color: #aeadad;"></span>';
      }if($Rating=="1"){
         $html  = '<span class="fa fa-star checked" style="color: #ffad46;"></span>';
         $html .= '<span class="fa fa-star checked" style="color: #aeadad;"></span>';    
         $html .= '<span class="fa fa-star checked" style="color: #aeadad;"></span>';    
         $html .= '<span class="fa fa-star checked" style="color: #aeadad;"></span>';    
         $html .= '<span class="fa fa-star checked" style="color: #aeadad;"></span>';
      }if($Rating=="2"){
         $html  = '<span class="fa fa-star checked" style="color: #ffad46;"></span>';
         $html .= '<span class="fa fa-star checked" style="color: #ffad46;"></span>';    
         $html .= '<span class="fa fa-star checked" style="color: #aeadad;"></span>';    
         $html .= '<span class="fa fa-star checked" style="color: #aeadad;"></span>';    
         $html .= '<span class="fa fa-star checked" style="color: #aeadad;"></span>';
      }if($Rating=="3"){
         $html  = '<span class="fa fa-star checked" style="color: #ffad46;"></span>';
         $html .= '<span class="fa fa-star checked" style="color: #ffad46;"></span>';    
         $html .= '<span class="fa fa-star checked" style="color: #ffad46;"></span>';    
         $html .= '<span class="fa fa-star checked" style="color: #aeadad;"></span>';    
         $html .= '<span class="fa fa-star checked" style="color: #aeadad;"></span>';
      }if($Rating=="4"){
         $html  = '<span class="fa fa-star checked" style="color: #ffad46;"></span>';
         $html .= '<span class="fa fa-star checked" style="color: #ffad46;"></span>';    
         $html .= '<span class="fa fa-star checked" style="color: #ffad46;"></span>';    
         $html .= '<span class="fa fa-star checked" style="color: #ffad46;"></span>';    
         $html .= '<span class="fa fa-star checked" style="color: #aeadad;"></span>';
      }if($Rating=="5"){
         $html  = '<span class="fa fa-star checked" style="color: #ffad46;"></span>';
         $html .= '<span class="fa fa-star checked" style="color: #ffad46;"></span>';    
         $html .= '<span class="fa fa-star checked" style="color: #ffad46;"></span>';    
         $html .= '<span class="fa fa-star checked" style="color: #ffad46;"></span>';    
         $html .= '<span class="fa fa-star checked" style="color: #ffad46;"></span>';
      }
      return $html;
  }
  
  ?> 