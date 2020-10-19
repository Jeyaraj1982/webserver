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
                    
define("DbHost","localhost");
define("DbName","ggcash_mlmapp");
define("DbUser","ggcash_user");
define("DbPassword","ggcash_user");
 
define("CreateMemberUsing","WALLET"); //EPIN / WALLET
define("TransferEPin",false); //true / false

include_once(__DIR__."/app/controller/class.DatabaseController.php");
include_once(__DIR__."/app/controller/class.MobileSMSController.php");
include_once(__DIR__."/app/controller/class.EmailController.php");

define("SiteTitle","GGCash");
define("SITE_TITLE","GGCash");
define("EPINS","Vouchers");
define("EPIN","Voucher");
define("loginUrl","http://ggcash.in/mlm/index.php");

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
       
       var $member_count=0;
       var $error=0;
       var $LeftCount = 0;
       var $RightCount = 0;
       var $PV=0;
       
       var $leftIDs=array();
       var $rightIDs=array();
       var $leftPV=0;
       var $rightPV=0;
       var $todayLeftPV=0;
       var $todayRightPV=0;
       public $process_date="";
       
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
                   
                   //$this->rightPV+=$userId['PV'];
                   //$this->rightIDs[]=$userId['ChildCode'];    
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
    
           if ($pos=="L") {
               $this->leftIDs=array();
               $this->leftPV=0;
               $this->todayLeftPV=0;
               
               $fL = $mysql->select("select * from `_tblPlacements` where `Position`='L' and `ParentCode`='".$MemberCode."'");
               if (sizeof($fL)==0) {
                   $this->leftIDs[]=$MemberCode; 
                   return $MemberCode;
               } 
               if (sizeof($fL)==1) {
                   //$this->leftIDs[]=$fL[0]['ChildCode'];
                   //$this->leftPV+=$fL[0]['PV'];
                   if (strtotime(date("Y-m-d",strtotime($fL[0]['PlacedOn'])))<=strtotime($date)) {
                       $this->leftPV+=$fL[0]['PV'];
                       $this->leftIDs[]=$fL[0]['ChildCode'];
                   }
                   
                   if (strtotime($date)==strtotime(date("Y-m-d",strtotime($fL[0]['PlacedOn'])))) {
                       $this->todayLeftPV += $fL[0]['PV'];
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
                   $this->rightIDs[]=$MemberCode;
                   return $MemberCode;
               } 
               if (sizeof($fR)==1) {
                   
                    //$this->rightPV+=$fR[0]['PV'];
                    //$this->rightIDs[]=$fR[0]['ChildCode'];
                   
                   if (strtotime(date("Y-m-d",strtotime($fR[0]['PlacedOn'])))<=strtotime($date)) {
                       $this->rightPV+=$fR[0]['PV'];
                       $this->rightIDs[]=$fR[0]['ChildCode'];
                   }
                   
                   if (strtotime($date)==strtotime(date("Y-m-d",strtotime($fR[0]['PlacedOn'])))) {
                       $this->todayRightPV += $fR[0]['PV'];
                   }
                   
                   return $this->countChildrenCodees($fR[0]['ChildCode'],"R");
               } 
           }
       }
    
        function IsBinaryEligible($MemberCode,&$left_ids,&$right_ids) {
            global $mysql;
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
                    $n_rightids[] = $id;
                }
            }        
            if (sizeof($sqlids)>0) {
            $rdata = $mysql->select("select * from _tblPlacements where PlacedByCode='".$MemberCode."' and ChildCode in (".implode(",",$sqlids).")");
            } else {
            $rdata = array();    
            }  
                  
$left_ids= $n_leftids;
$right_ids= $n_rightids;

            //if ( (sizeof($ldata)>=1 && sizeof($rdata)>=2) || (sizeof($ldata)>=2 && sizeof($rdata)>=1) ) {
            if ( (sizeof($left_ids)>=1 && sizeof($right_ids)>=2) || (sizeof($left_ids)>=2 && sizeof($right_ids)>=1) ) {
           // if ( (sizeof($n_leftids)>=1 && sizeof($n_rightidsp)>=2) || (sizeof($n_leftids)>=2 && sizeof($n_rightidsp)>=1) ) {
                return true;
            } else {
                return false;
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
                         return 'assets/images/logo.png';
                         return 'assets/images/female_default.png';
                     } 
                     
                     if ($gender=="Male") {
                         return "assets/images/logo.png";
                         return "assets/images/male_default.png";
                     } 
                     
                     return "assets/images/logo.png";
                     return "assets/images/male_default.png";
                     
                 } else { 
                     return "assets/uploads/".$thumb;
                 } 
             } 
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
function getIncome($level) {
    if ($level==1) {
        return 20;
    } else {
        return 10;
    }
}

function getPlacedMembers($level,$memberCode) {
    global $mysql;
    
    $level_1 = $mysql->select("select * from _tblPlacements where ParentCode='".$memberCode."'");
    $array = array();
    if ($level==1) {
        foreach($level_1 as $l_1) {
            $array[]= $l_1['ChildCode'];
        }
        return $array;
    }
                                    
    
    if ($level==2) {
        $array2 = array();
        foreach($level_1 as $l_1) {
            foreach(getPlacedMembers(1,$l_1['ChildCode']) as $k=>$v) {
                $array2[]=$v;
            }
        }
        return $array2;
    }
    
    if ($level==3) {
        $array3 = array();
        foreach(getPlacedMembers(2,$memberCode) as $kk => $vv) {
            foreach(getPlacedMembers(1,$vv) as $k=>$v) {
                $array3[]=$v;
            }
        }
        return $array3;
    }
    
    if ($level==4) {
        $array4 = array();
        foreach(getPlacedMembers(3,$memberCode) as $kk => $vv) {
            foreach(getPlacedMembers(1,$vv) as $k=>$v) {
                $array4[]=$v;
            }
        }
        return $array4;
    }
                                    
    if ($level==5) {
        $array5 = array();
        foreach(getPlacedMembers(4,$memberCode) as $kk => $vv) {
            foreach(getPlacedMembers(1,$vv) as $k=>$v) {
                $array5[]=$v;
            }
        }
        return $array5;
    }
    
    if ($level==6) {
        $array6 = array();
        foreach(getPlacedMembers(5,$memberCode) as $kk => $vv) {
            foreach(getPlacedMembers(1,$vv) as $k=>$v) {
                $array6[]=$v;
            }
        }
        return $array6;
    }
    
    if ($level==7) {
        $array7 = array();
        foreach(getPlacedMembers(6,$memberCode) as $kk => $vv) {
            foreach(getPlacedMembers(1,$vv) as $k=>$v) {
                $array7[]=$v;
            }
        }
        return $array7;
    }
    
    if ($level==8) {
        $array8 = array();
        foreach(getPlacedMembers(7,$memberCode) as $kk => $vv) {
            foreach(getPlacedMembers(1,$vv) as $k=>$v) {
                $array8[]=$v;
            }
        }
        return $array8;
    }
    
    if ($level==9) {
        $array8 = array();
        foreach(getPlacedMembers(8,$memberCode) as $kk => $vv) {
            foreach(getPlacedMembers(1,$vv) as $k=>$v) {
                $array9[]=$v;
            }
        }
        return $array9;
    }
    
    if ($level==10) {
        $array8 = array();
        foreach(getPlacedMembers(9,$memberCode) as $kk => $vv) {
            foreach(getPlacedMembers(1,$vv) as $k=>$v) {
                $array10[]=$v;
            }
        }
        return $array10;
    }
    
    if ($level==11) {
        $array8 = array();
        foreach(getPlacedMembers(10,$memberCode) as $kk => $vv) {
            foreach(getPlacedMembers(1,$vv) as $k=>$v) {
                $array11[]=$v;
            }
        }
        return $array11;
    }
    
}

function calculate_level_members($dLevel,$count) {
    $c = 1;
    for($i=1;$i<=$dLevel;$i++) {
        $c *=  $count;
    }
    return $c;
} 
?> 