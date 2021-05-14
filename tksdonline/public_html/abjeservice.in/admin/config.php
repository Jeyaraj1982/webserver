<?php
session_start();

date_default_timezone_set('Asia/Calcutta'); 
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

if (isset($_SESSION['User']) && $_SESSION['User']['Role']=="Member") {
    define("UserRole","Member");
}
if (isset($_SESSION['User']) && $_SESSION['User']['Role']=="Admin") {
    define("UserRole","Admin");
}          
                  
                 
                                         
define("DbHost","localhost");
define("DbName","tksdonli_abjeservice");
define("DbUser","tksdonli_user");
define("DbPassword","mysqluser@123");
define("AdminTelegramID","1498244953");  
define("TKSDADMIN","316574188");  

include_once(__DIR__."/app/controller/class.DatabaseController.php");
include_once(__DIR__."/app/controller/class.MobileSMSController.php");
include_once(__DIR__."/app/controller/class.TelegramMessageController.php");
include_once(__DIR__."/app/controller/class.EzytmAPI.php");
include_once(__DIR__."/app/controller/class.MRoboticsAPI.php");
include_once(__DIR__."/app/controller/class.AaranjuLapu.php");
include_once(__DIR__."/app/controller/class.TKSD.php");

define("SITE_TITLE","abjeservice.in");
define("SiteTitle","abjeservice.in");
define("loginUrl","https://www.abjeservice.in/index");

if (isset($_GET['action']) && $_GET['action']=="logout") {
    session_destroy();
    $_SESSION['User']=array();
    setcookie ("username","",time()-3600);
    setcookie ("password","",time()-3600);
    echo "<script>location.href='https://www.abjeservice.in/index.php';</script>"; 
    exit;
}


$mysql   = new MySqldatabase(DbHost,DbUser,DbPassword,DbName);

define("PORT","7860");
class JApplication {
    
    function getBalance($MemberID) {
        global $mysql;
        $res = $mysql->select("select (sum(Credit)-sum(Debit)) as bal from _tbl_accounts where MemberID='".$MemberID."'");
        return isset($res[0]['bal']) ? $res[0]['bal'] : "0";
    }
    
    function getBalanceDatewise($MemberID,$date) {
        global $mysql;
        $res = $mysql->select("select (sum(Credit)-sum(Debit)) as bal from _tbl_accounts where date(TxnDate)<=date('".$date."') and MemberID='".$MemberID."'");
        return isset($res[0]['bal']) ? $res[0]['bal'] : "-1";
    }
    
    function getCashback($MemberID) {
        global $mysql;
        $res = $mysql->select("select (sum(Credit)-sum(Debit)) as bal from _tbl_accounts where (Voucher='12' or Voucher='22') and MemberID='".$MemberID."'");
        return isset($res[0]['bal']) ? $res[0]['bal'] : "0";
    }
    function getCharges($MemberID) {
        global $mysql;
        $res = $mysql->select("select (sum(Credit)-sum(Debit)) as bal from _tbl_accounts where (Voucher='32' or Voucher='42') and MemberID='".$MemberID."'");
        return isset($res[0]['bal']) ? $res[0]['bal'] : "0";
    }
    
    function reverseRecharge($param) {
        global $mysql;
        $txnid = str_replace("web_x","",$param['yourref']);
        $txnid = str_replace("web","",$param['yourref']);
        $txnid = str_replace("webx","",$param['yourref']);
        
        
        $txnid = str_replace("w","",$param['yourref']);
        $txnid = str_replace("e","",$txnid);
        $txnid = str_replace("b","",$txnid);
        $txnid = str_replace("_","",$txnid);
        $txnid = str_replace("x","",$txnid);
        
        
        if ($param['status']=="FAILURE" ) {
            $mysql->execute("update _tbl_transactions set `TxnStatus`='reversed', `urlresponse` = concat(`urlresponse`,'<br>".json_encode($param)."'), `reverseResponse` = concat(`reverseResponse`,'<br>".implode(",",$param)."'), `revDate`='".date("Y-m-d H:i:s")."' where `txnid`='".$txnid."'");
            $t = $mysql->select("select * from _tbl_transactions where `txnid`='".$txnid."'");

            $ac = $mysql->select("select * from _tbl_accounts where AccountID='".$t[0]['ACtxnid']."'");
            $balance = $this->getBalance($t[0]['memberid']);
            $ACtxnid = $mysql->insert("_tbl_accounts",array("TxnDate"     => date("Y-m-d H:i:s"),
                                                            "memberid"    => $ac[0]['MemberID'],
                                                            "Particulars" => "Reversed.".$ac[0]['Particulars'],
                                                            "TxnValue"    => $ac[0]['TxnValue'],
                                                            "Credit"      => $ac[0]['Debit'],
                                                            "Debit"       => "0",
                                                            "Balance"     => $balance+$ac[0]['Debit'],
                                                            "Voucher"     => "21"));        
            $mysql->execute("update _tbl_transactions set ACtxnid_Reverse='".$ACtxnid."' where `txnid`='".$txnid."'" );
            
            $ac_cashback = $mysql->select("select * from _tbl_accounts where AccountID='".$t[0]['Cashback_ACtxnid']."'");
            $balance = $this->getBalance($t[0]['memberid']);
            $Cashback_ACtxnid = $mysql->insert("_tbl_accounts",array("TxnDate"     => date("Y-m-d H:i:s"),
                                                                     "memberid"    => $ac_cashback[0]['MemberID'],
                                                                     "Particulars" => "Reversed.".$ac_cashback[0]['Particulars'],
                                                                     "TxnValue"    => $ac_cashback[0]['TaxValue'],
                                                                     "credit"      => "0",
                                                                     "debit"       => $ac_cashback[0]['Credit'],
                                                                     "balance"     => $balance-$ac_cashback[0]['Credit'],
                                                                     "Voucher"     => "22"));   
             $mysql->execute("update _tbl_transactions set Cashback_ACtxnid_Reverse='".$Cashback_ACtxnid."' where `txnid`='".$txnid."'" );                                                       
            return true;
        }
        
        if ($param['status']=="SUCCESS") {                                                                                    
            $mysql->execute("update _tbl_transactions set `TxnStatus`='success',OperatorNumber='".$param['transid']."', `urlresponse` = concat(`urlresponse`,'<br>".json_encode($param)."'), `revDate`='".date("Y-m-d H:i:s")."' where `txnid`='".$txnid."'");
            return true;
        }

        if ($param['status']=="RESPWAIT" || $param['status']=="SUSPENSE") {
            $mysql->execute("update _tbl_transactions set `TxnStatus`='pending',`reverseResponse`='".implode(",",$param)."', `revDate`='".date("Y-m-d H:i:s")."' where `txnid`='".$txnid."'");
            return true;
        }
    }
    
    function doRecharge($param) {
        
        global $mysql;
        sleep(15);
        $result = array();
        $error = 0;
        $result['number'] = $param['number'];
        $result['amount'] = $param['amount'];
        $result['creditnote'] =0;
        
            $mysql->insert("reqTbl",array("txndate"        => date("Y-m-d H:i:s"),  
                                          "memberid"       => $param['MemberID'],
                                          "operatorcode"   => $param['operator'],
                                          "rcnumber"       => $param['number'],
                                          "rcamount"       => $param['amount'],
                                          "OperatorNumber" => "0")); 
        $balance = $this->getBalance($param['MemberID']);
        
       
        if ($balance<$param['amount']) {
            $result['status']="failure";
            $result['message']="insufficient balance.";  
            return $result;
        }
                            
        $api = $mysql->select("select * from _tbl_operators where OperatorCode='".$param['operator']."' and APIID>0");
        
        if (sizeof($api)==0) {
            $result['status']="failure";
            $result['message']="Operator currently unavailable..";    
            return $result;
        }
        
         
        $dup = $mysql->select("select * from reqTbl where  operatorcode='".$param['operator']."' and rcnumber='".$param['number']."' and rcamount='".$param['amount']."' order by txnid desc limit 0,2");
        if (sizeof($dup)>1) {
            
               if ( (strtotime($dup[0]['txndate'])-strtotime($dup[1]['txndate']))<=150 ) {
                  $result['status']="failure";
                  $result['message']="Failed. Duplicate not allow lessthan 5 minutes";  
                  return $result; 
               }
        }   
        
        //  $result['status']="failure";
          //  $result['message']="manual.".json_encode($dup).(strtotime(date("Y-m-d H:i:s"))-strtotime($dup[0]['txndate']));  
           // return $result;
        
      //  $url = "http://216.10.242.207:".PORT."/MARSrequest/?operator=TRAI";
       // $_response = getHttp($url);
       // if (!(strlen($_response)>0)) {
            //MobileSMS::sendSMS("7373772010","Dear Admin, agent requested to do recharge, but request not reached lapu. please check your lapu","0");                     
          //  MobileSMS::sendSMS("xxxx","Dear Admin, agent requested to do recharge, but request not reached lapu. please check your lapu","0");                     
          //  $result['status']="failure";
          //  $result['message']="sorry, couldn't process your recharge request.";  
           // return $result;
       // }                            
            
        if ($error==0) {
            
            $ACtxnid = $mysql->insert("_tbl_accounts",array("TxnDate"     => date("Y-m-d H:i:s"),
                                                            "memberid"    => $param['MemberID'],
                                                            "Particulars" => $param['particulars']."/".$param['number']."/".$param['operator'],
                                                            "TxnValue"    => $param['amount'],
                                                            "Credit"      => "0",
                                                            "Debit"       => $param['amount'],
                                                            "Balance"     => $balance-$param['amount'],
                                                            "Voucher"     => "11"));        
            $cashback_commission = $mysql->select("select * from _tbl_operators where OperatorCode='".$param['operator']."'");
         
            $Cashback_ACtxnid = $mysql->insert("_tbl_accounts",array("TxnDate"     => date("Y-m-d H:i:s"),
                                                                     "memberid"    => $param['MemberID'],
                                                                     "Particulars" => "Cashback/".$param['number']."/".$param['operator'],
                                                                     "TxnValue"    => $param['amount'],
                                                                     "credit"      => $param['amount']*($cashback_commission[0]['IsCashback']/100),
                                                                     "debit"       => "0",
                                                                     "balance"     => $balance-$param['amount']+($param['amount']*($cashback_commission[0]['IsCashback']/100)),
                                                                     "Voucher"     => "12"));        
         
            $txnid = $mysql->insert("_tbl_transactions",array("txndate"        => date("Y-m-d H:i:s"),  
                                                              "memberid"       => $param['MemberID'],
                                                              "operatorcode"   => $param['operator'],
                                                              "rcnumber"       => $param['number'],
                                                              "rcamount"       => $param['amount'],
                                                              "cashback"       => "0",
                                                              "charge"         => "0",
                                                              "OperatorNumber" => "0",                   
                                                              "TxnStatus"      => "accepted",
                                                              "ACtxnid"        => $ACtxnid,
                                                              "Cashback_ACtxnid" => $Cashback_ACtxnid,
                                                              "calledurl"      => "",
                                                              "urlresponse"    => ""));
                                                              
           if (isset($param['markascredit']) && $param['markascredit']=="on") {
            $credit_note =    $mysql->insert("_tbl_user_credits",array("MemberID"=>$param['MemberID'],
                                                        "NickName"=>$param['credit_nickname'],
                                                        "CreditUpdated"=>date("Y-m-d H:i:s"),
                                                        "Amount"=>$param['CrAmount'],
                                                        "PayableAmount"=>$param['CrAmount'],
                                                        "summary"=>$param['particulars']."/".$param['number']."/".$param['operator'],
                                                        "txnid"=>$txnid,
                                                        "TxnAmount"=>$param['amount'],
                                                        "IsPaid"=>"0"));
            $mysql->execute("update `_tbl_transactions` set `IsCreditSale`='1', `Credit_noteid`='".$credit_note."'  where `txnid`='".$txnid."'");
            $result['creditnote'] =$credit_note;
           }
            if ($param['operator']=="RB") {
                if (($param['amount']%10)==0) {
                    $param['operator']="TB";
                }
            }
            
            $param['txnid']=$txnid;
            $param['actxnid']=$ACtxnid;
            
            if ($api[0]['APIID']==1) {
                $response = Mars::sendRequest($param);
            } elseif ($api[0]['APIID']==2) {                           
                $response = MRoboticsAPI::sendRequest($param);
                
                if ($response['status']=="failure") {
                    if ((strtolower(trim($response['message']))==strtolower("no lapu is ON or Low Balance in Lapu")) || ($response['message']=="no lapu is ON or Low Balance in Lapu") ) {
                        
                        if ($param['operator']=="RB" || $param['operator']=="TB") {
                            $mysql->execute("update _tbl_operators set APIID='4' where OperatorCode='RB'");
                            TelegramMessageController::sendSMS(AdminTelegramID,"Dear Admin: BSNL Topup/Recharge API has been auot-switched to ArranjuLapu",0,0);
                            $response = AaranjuLapu::sendRequest($param);
                        }
                          
                        if ($param['operator']=="RV") {
                            $mysql->execute("update _tbl_operators set APIID='4' where OperatorCode='RV'");
                            TelegramMessageController::sendSMS(AdminTelegramID,"Dear Admin: Vodafone API has been auot-switched to ArranjuLapu",0,0);
                            $response = AaranjuLapu::sendRequest($param);
                        }
                        
                        if ($param['operator']=="DS") {
                            $mysql->execute("update _tbl_operators set APIID='4' where OperatorCode='DS'");
                            TelegramMessageController::sendSMS(AdminTelegramID,"Dear Admin: SunDirect API has been auot-switched to ArranjuLapu",0,0);
                            $response = AaranjuLapu::sendRequest($param);
                        } 
                        
                        if ($param['operator']=="TA") {
                            $mysql->execute("update _tbl_operators set APIID='4' where OperatorCode='TA'");
                            TelegramMessageController::sendSMS(AdminTelegramID,"Dear Admin: AirtelDigitalTV API has been auot-switched to ArranjuLapu",0,0);
                            $response = AaranjuLapu::sendRequest($param);
                        }
                        
                        if ($param['operator']=="DD") {
                            $mysql->execute("update _tbl_operators set APIID='4' where OperatorCode='DD'");
                            TelegramMessageController::sendSMS(AdminTelegramID,"Dear Admin: DishTV API has been auot-switched to ArranjuLapu",0,0);
                            $response = AaranjuLapu::sendRequest($param);
                        }
                        
                        if ($param['operator']=="DV") {
                            $mysql->execute("update _tbl_operators set APIID='4' where OperatorCode='DV'");
                            TelegramMessageController::sendSMS(AdminTelegramID,"Dear Admin: Videoond2h API has been auot-switched to ArranjuLapu",0,0);
                            $response = AaranjuLapu::sendRequest($param);
                        }
                    }
                }
                
            } elseif ($api[0]['APIID']==3) {
                $response = EzytmAPI::sendRequest($param);
            } elseif ($api[0]['APIID']==4) {
                $response = AaranjuLapu::sendRequest($param);
            }  elseif ($api[0]['APIID']==5) {
                $response = TKSD::sendRequest($param);
            }   

             if ($response['status']=="failure") {
               $result['status']="failure";
               $result['message']=$response['message'];
               $mysql->execute("update _tbl_transactions set `TxnStatus`='failure',`lapurefno`='".$response['lapuno']."', `msg`='".$response['message']."', `OperatorDate`='".date("Y-m-d H:i:s")."' where `txnid`='".$txnid."'");
               $mysql->execute("update _tbl_accounts set Debit='0', Credit='0', Balance='".$balance."' where AccountID='".$ACtxnid."'");
               $mysql->execute("update _tbl_accounts set Debit='0', Credit='0', Balance='".$balance."' where AccountID='".$Cashback_ACtxnid."'");
               if (isset($param['markascredit']) && $param['markascredit']=="on") {
                    $mysql->execute("update _tbl_transactions set IsCreditSale='-1'  where `txnid`='".$txnid."'");
                    $mysql->execute("delete from `_tbl_user_credits` where CreditID='".$credit_note."'");
               }
                 
           } elseif ($response['status']=="success") {
                $result['status']="success";
                $result['txnid']=$txnid;
                $result['operatorid']=$response['operatorid'];
                $mysql->execute("update `_tbl_transactions` set `TxnStatus`='success',`lapurefno`='".$response['lapuno']."',`OperatorNumber`='".$response['operatorid']."',`OperatorDate`='".date("Y-m-d H:i:s")."' where `txnid`='".$txnid."'");
           } else {
                $operatorid = "";
                $refno = "";
                $result['status']="pending";
                $result['txnid']=$txnid;
                $result['operatorid']=$response['operatorid'];
                $mysql->execute("update `_tbl_transactions` set `lapurefno`='".$response['lapuno']."',`OperatorNumber`='".$response['operatorid']."',`OperatorDate`='".date("Y-m-d H:i:s")."' where `txnid`='".$txnid."'");
           }
           
            
               //$mysql->execute("update `_tbl_transactions` set `urlresponse`='".$response."',`OperatorDate`='".date("Y-m-d H:i:s")."' where `txnid`='".$txnid."'");
          /*  if (strpos($response, "ERROR") !== false) {
                $msg = explode("mars_reason=",trim($response));
                $msg = $msg[1];
                $result['status']="failure";
                $result['message']=$msg;
                    $mysql->execute("update _tbl_transactions set `TxnStatus`='failure',`msg`='".$msg."', `OperatorDate`='".date("Y-m-d H:i:s")."' where `txnid`='".$txnid."'");
                    $mysql->execute("update _tbl_accounts set Debit='0', Credit='0', Balance='".$balance."' where AccountID='".$ACtxnid."'");
                    $mysql->execute("update _tbl_accounts set Debit='0', Credit='0', Balance='".$balance."' where AccountID='".$Cashback_ACtxnid."'");
                    if (isset($param['markascredit']) && $param['markascredit']=="on") {
                        $mysql->execute("update _tbl_transactions set IsCreditSale='-1'  where `txnid`='".$txnid."'");
                        $mysql->execute("delete from `_tbl_user_credits` where CreditID='".$credit_note."'");
                    }
            } else {
                if (strpos($response, "ACCEPTED") !== false) {
                    $operatorid = "";                                         
                    $refno = "";
                        $result['status']="success";
                    $result['txnid']=$txnid;
                        $result['operatorid']=$operatorid;
                        $mysql->execute("update `_tbl_transactions` set `TxnStatus`='success',`lapurefno`='".$lapuno."',`OperatorNumber`='".$operatorid."',`OperatorDate`='".date("Y-m-d H:i:s")."' where `txnid`='".$txnid."'");
                } else {
                    $operatorid = "";
                    $refno = "";
                    $result['status']="pending";
                    $result['txnid']=$txnid;
                    $result['operatorid']=$operatorid;
                    $mysql->execute("update `_tbl_transactions` set `lapurefno`='".$lapuno."',`OperatorNumber`='".$operatorid."',`OperatorDate`='".date("Y-m-d H:i:s")."' where `txnid`='".$txnid."'");
                }
            } 
            */                
        }  
        return $result;
    }
    
    function reverseBillPay($txnid,$message,&$error) {
        global $mysql;
        //$txnid = str_replace("web_x","",$param['yourref']);
        $t = $mysql->select("select * from _tbl_transactions where `txnid`='".$txnid."'");
        if ($t[0]['TxnStatus']=="requested" ) {
            $mysql->execute("update _tbl_transactions set `TxnStatus`='reversed',`reverseResponse`='".$message."', `revDate`='".date("Y-m-d H:i:s")."' where `txnid`='".$txnid."'");
            $t = $mysql->select("select * from _tbl_transactions where `txnid`='".$txnid."'");

            $ac = $mysql->select("select * from _tbl_accounts where AccountID='".$t[0]['ACtxnid']."'");
            $balance = $this->getBalance($t[0]['memberid']);
            $ACtxnid = $mysql->insert("_tbl_accounts",array("TxnDate"     => date("Y-m-d H:i:s"),
                                                            "memberid"    => $ac[0]['MemberID'],
                                                            "Particulars" => "Reversed.".$ac[0]['Particulars'],
                                                            "TxnValue"    => $ac[0]['TxnValue'],
                                                            "Credit"      => $ac[0]['Debit'],
                                                            "Debit"       => "0",
                                                            "Balance"     => $balance+$ac[0]['Debit'],
                                                            "Voucher"     => "41"));   
            
             $mysql->execute("update _tbl_transactions set ACtxnid_Reverse='".$ACtxnid."' where `txnid`='".$txnid."'" );
                                                            
            if ($t[0]['Cashback_ACtxnid']>0) {                                                          
            $ac_cashback = $mysql->select("select * from _tbl_accounts where AccountID='".$t[0]['Cashback_ACtxnid']."'");
            $balance = $this->getBalance($t[0]['memberid']);
            $Cashback_ACtxnid = $mysql->insert("_tbl_accounts",array("TxnDate"     => date("Y-m-d H:i:s"),
                                                                     "memberid"    => $ac_cashback[0]['MemberID'],
                                                                     "Particulars" => "Reversed.".$ac_cashback[0]['Particulars'],
                                                                     "TxnValue"    => $ac_cashback[0]['TaxValue'],
                                                                     "credit"      => $ac_cashback[0]['Debit'],
                                                                     "debit"       => "0",
                                                                     "balance"     => $balance+$ac_cashback[0]['Debit'],
                                                                     "Voucher"     => "42"));       
             $mysql->execute("update _tbl_transactions set Cashback_ACtxnid_Reverse='".$Cashback_ACtxnid."' where `txnid`='".$txnid."'" );
            }
            $error = "";
            return true;
        } else {
            $error = "transaction already reversed or success transaction";
            return false;
        }
    }
    
    function doBillPay($param) {
        
        global $mysql;
        $result = array();
        $result['number'] = $param['number'];
        $result['amount'] = $param['amount'];
        $result['creditnote'] =0;
        
        $balance = $this->getBalance($param['MemberID']);
        if ($balance>$param['amount']) {
            $ACtxnid = $mysql->insert("_tbl_accounts",array("TxnDate"     => date("Y-m-d H:i:s"),
                                                            "memberid"    => $param['MemberID'],
                                                            "Particulars" => $param['particulars']."/".$param['number']."/".$param['operator'],
                                                            "TxnValue"    => $param['amount'],
                                                            "Credit"      => "0",
                                                            "Debit"       => $param['amount'],
                                                            "Balance"     => $balance-$param['amount'],
                                                            "Voucher"     => "31"));        

            TelegramMessageController::sendSMS(TKSDADMIN,"Dear Admin: You have received on off-line billpayment ".$param['particulars']."/".$param['number']."/".$param['operator']." amount : ".$param['amount'] ,0,0);
 
            $cashback_commission = $mysql->select("select * from _tbl_operators where OperatorCode='".$param['operator']."'");
            $m = $mysql->select("select * from _tbl_member where MemberID='".$param['MemberID']."'") ;
            $Cashback_ACtxnid = 0;
            
            
            if ($m[0]['BillCharge']==1) {
                
              if ($param['operator']=="UTNP")  {
                  
                  if($param['amount']<=100)  {
                      $charge=10;
                  } else {
                      $subcharge = $param['amount'] - 100;
                      $count = intval($subcharge/100);
                      $suff = ($subcharge%100);
                      if ($suff>0) {
                          $count++;
                      }
                      $charge = 10 + ( $count * 3); 
                  }
                  if (isset($param['whatsappRequired'])) {
                      if ($param['whatsappRequired']==1) {
                        $charge = $charge+2;
                        $wp="/wp";
                      }
                  }
              }  else if($param['operator']=="BG" || $param['operator']=="HPG" || $param['operator']=="ING" ){    
                  
                  $charge =  3;
                  $wp="";
                  if (isset($param['whatsappRequired'])) {
                      if ($param['whatsappRequired']==1) {
                        $charge = $charge+2;
                        $wp="/wp";
                      }
                  }
              } else {    
                  $charge_count =  intval($param['amount']/5000);
                  $charge_prefix = $param['amount']%5000;
                  if ($charge_prefix>0) {
                    $charge_count++;
                  }
                  $charge = $charge_count * 5;
                  $wp="";
                  if (isset($param['whatsappRequired'])) {
                      if ($param['whatsappRequired']==1) {
                        $charge = $charge+2;
                        $wp="/wp";
                      }
                  }
              }
              
              $Cashback_ACtxnid = $mysql->insert("_tbl_accounts",array("TxnDate"     => date("Y-m-d H:i:s"),
                                    "memberid"    => $param['MemberID'],
                                                                         "Particulars" => "Charge/".$param['number']."/".$param['operator'].$wp,
                                                                         "TxnValue"    => $param['amount'],
                                                                         "credit"      => "0",
                                                                         "debit"       => $charge,
                                                                         "balance"     => $balance-$param['amount']-$charge,
                                                                         "Voucher"     => "32"));        
           }
           
           
            
           $txnid = $mysql->insert("_tbl_transactions",array("txndate"          => date("Y-m-d H:i:s"),  
                                                              "memberid"         => $param['MemberID'],
                                                              "operatorcode"     => $param['operator'],
                                                              "rcnumber"         => $param['number'],
                                                              "rcamount"         => $param['amount'],
                                                              "PremiumAmount"    => $param['PremiumAmount'],
                                                              "FineAmount"       => $param['FineAmount'],
                                                              "cashback"         => "0",
                                                              "charge"           => $charge,
                                                              "whatsappRequired" => isset($param['whatsappRequired']) ? $param['whatsappRequired'] : "0",
                                                              "telegramRequired" => isset($param['telegramRequired']) ? $param['telegramRequired'] : "0",
                                                              "CustomerMobileNumber" => isset($param['CustomerMobileNumber']) ? $param['CustomerMobileNumber'] : "",
                                                              "dob"              => isset($param['dob']) ? $param['dob'] : "",
                                                              "Remarks"          => isset($param['Remarks']) ? $param['Remarks'] : "",
                                                              "AccountName"      => isset($param['AccountName']) ? $param['AccountName'] : "",
                                                              "IFSCode"          => isset($param['IFSCode']) ? $param['IFSCode'] : "",
                                                              "OperatorNumber"   => "0",                   
                                                              "TxnStatus"        => "accepted",
                                                              "ACtxnid"          => $ACtxnid,
                                                              "Cashback_ACtxnid" => $Cashback_ACtxnid,
                                                              "calledurl"        => "",
                                                              "urlresponse"      => ""));
              if (isset($param['markascredit']) && $param['markascredit']=="on") {
               $credit_note = $mysql->insert("_tbl_user_credits",array("MemberID"=>$param['MemberID'],
                                                        "NickName"=>$param['credit_nickname'],
                                                        "TxnAmount"=>$param['amount'],
                                                        "CreditUpdated"=>date("Y-m-d H:i:s"),
                                                        "Amount"=>$param['CrAmount'],
                                                        "PayableAmount"=>$param['CrAmount'],
                                                        "summary"=>$param['particulars']."/".$param['number']."/".$param['operator'],
                                                        "txnid"=>$txnid,
                                                        "IsPaid"=>"0"));
               $mysql->execute("update `_tbl_transactions` set `IsCreditSale`='1', `Credit_noteid`='".$credit_note."'  where `txnid`='".$txnid."'");
               $result['creditnote'] =$credit_note;
           }
           
           if (isset($param['utility_tnpolice']) && sizeof($param['utility_tnpolice'])>0) {
               $param['utility_tnpolice']['TxnID']= $txnid;
               $tnpolice_requetid = $mysql->insert("_tbl_utility_tnpolice",$param['utility_tnpolice']); 
           }
           
            $operatorid = "";                                         
            $refno = "";
            $result['status']="requested";
            $result['txnid']=$txnid;
            $result['charged']=$charge;
            $result['operatorid']=$operatorid;
            $mysql->execute("update `_tbl_transactions` set `TxnStatus`='requested',`lapurefno`='".$lapuno."',`OperatorNumber`='".$operatorid."',`OperatorDate`='".date("Y-m-d H:i:s")."' where `txnid`='".$txnid."'");
        } else {
            $result['status']="failure";
            $result['message']="insufficient balance.";
        }
        return $result;
    }
    
    
      function doMoneyTransfer($param) {
        
        global $mysql;
        $result = array();
        $result['number'] = $param['number'];
        $result['amount'] = $param['amount'];
        $result['creditnote'] =0;
        
        $mysql->insert("reqTbl",array("txndate"        => date("Y-m-d H:i:s"),  
                                      "memberid"       => $param['MemberID'],
                                      "operatorcode"   => $param['operator'],
                                      "rcnumber"       => $param['number'],
                                      "rcamount"       => $param['amount'],
                                      "OperatorNumber" => "0")); 
        
        $balance = $this->getBalance($param['MemberID']);
        
        if ($balance>$param['amount']) {               
            
            $dup = $mysql->select("select * from reqTbl where  operatorcode='".$param['operator']."' and rcnumber='".$param['number']."'  order by txnid desc limit 0,2");
            if (sizeof($dup)>1) {
                if ( (strtotime($dup[0]['txndate'])-strtotime($dup[1]['txndate']))<=3600 ) {
                    $result['status']="failure";
                    $result['message']="Failed. Same account number not allow 1 hour";  
                    return $result; 
                }
            }
        
            $ACtxnid = $mysql->insert("_tbl_accounts",array("TxnDate"     => date("Y-m-d H:i:s"),
                                                            "memberid"    => $param['MemberID'],
                                                            "Particulars" => "MoneyTransfer/".$param['number']."/".$param['IFSCode'],
                                                            "TxnValue"    => $param['amount'],
                                                            "Credit"      => "0",
                                                            "Debit"       => $param['amount'],
                                                            "Balance"     => $balance-$param['amount'],
                                                            "Voucher"     => "31"));        

            $cashback_commission = $mysql->select("select * from _tbl_operators where OperatorCode='".$param['operator']."'");
            $m = $mysql->select("select * from _tbl_member where MemberID='".$param['MemberID']."'") ;
            $Cashback_ACtxnid = 0;
            //if ($m[0]['BillCharge']==1) {
               // $charge =  $param['amount'] * (0.50/100);
              //  if ($charge<=5) {
                //    $charge = 5;
               // }
            
              $charge=0;
              if ($param['amount']<=3000) {
                  $charge=10;
              } else if ($param['amount']>3000 && $param['amount']<=7000) {
                  $charge=15;
              } else if ($param['amount']>7000 && $param['amount']<=10000) {
                  $charge=20;
              }
              $charge_count =  intval($param['amount']/5000);
              $charge_prefix = $param['amount']%5000;
              if ($charge_prefix>0) {
                  $charge_count++;
              }
              $charge = $charge_count * 15;
              if($param['api']) {
                $Particulars = "Charge/MoneyTansfer_IMPS/".$param['number']."/".$param['IFSCode'];    
              } else {
                $Particulars = "Charge/MoneyTansfer_NEFT/".$param['number']."/".$param['IFSCode'];
              }  
              $Cashback_ACtxnid = $mysql->insert("_tbl_accounts",array("TxnDate"     => date("Y-m-d H:i:s"),
                                                                        "memberid"    => $param['MemberID'],
                                                                        "Particulars" => $Particulars,
                                                                        "TxnValue"    => $param['amount'],
                                                                        "credit"      => "0",
                                                                        "debit"       => $charge,
                                                                        "balance"     => $balance-$param['amount']-$charge,
                                                                        "Voucher"     => "32"));
              $txnid = $mysql->insert("_tbl_transactions",array("txndate"          => date("Y-m-d H:i:s"),  
                                                                "memberid"         => $param['MemberID'],
                                                                "operatorcode"     => $param['operator'],
                                                                "rcnumber"         => $param['number'],
                                                                "rcamount"         => $param['amount'],
                                                                "cashback"         => "0",
                                                                "charge"           => "0",
                                                                "CustomerMobileNumber" => isset($param['CustomerMobileNumber']) ? $param['CustomerMobileNumber'] : "",
                                                                "dob"              => isset($param['dob']) ? $param['dob'] : "",
                                                                "Remarks"          => isset($param['Remarks']) ? $param['Remarks'] : "",
                                                                "AccountName"      => isset($param['AccountName']) ? $param['AccountName'] : "",
                                                                "IFSCode"          => isset($param['IFSCode']) ? $param['IFSCode'] : "",
                                                                "OperatorNumber"   => "0",                   
                                                                "TxnStatus"        => "requested",
                                                                "ACtxnid"          => $ACtxnid,
                                                                "Cashback_ACtxnid" => $Cashback_ACtxnid,
                                                                "calledurl"        => "",
                                                                "urlresponse"      => ""));
                                                                                         
            if ($param['api']==true) {                             
             // &number=<mobilenumber>&sender=<sendername>&message=<textmessage>&uid=<yourtxnid> 
              $url = "https://www.aaranju.in/moneytransfer/api.php?username=ikXtsaLo3EWca&password=lzwjdughDqd=&uid=".$txnid;
              $url .= "&account_name=".urlencode($param['AccountName']);
              $url .= "&account_number=".$param['number'];   
              $url .= "&ifsc_code=".$param['IFSCode'];
              $url .= "&amount=".$param['amount'];
              $url .= "&remarks=".urlencode($param['Remarks']);
            $mysql->execute("update `_tbl_transactions` set `calledurl`='".$url."' where `txnid`='".$txnid."'");   
            $response = getHttp3($url);                  
            $mysql->execute("update `_tbl_transactions` set  `urlresponse`='".$response."' where `txnid`='".$txnid."'");   
              $response = json_decode($response,true);
           if ($response['response']['status']=="SUCCESS" || $response['response']['status']=="REQUESTED") {
            $operatorid = $response['response']['transid'];                                         
            $refno = "";
            $result['status']="success";
            $result['txnid']=$txnid;
            $result['charged']=$charge;
            $result['operatorid']=$response['response']['transid'];
            $mysql->execute("update `_tbl_transactions` set `TxnStatus`='success',`lapurefno`='".$lapuno."',`OperatorNumber`='".$operatorid."',`OperatorDate`='".date("Y-m-d H:i:s")."' where `txnid`='".$txnid."'");    
            
            
             if (isset($param['markascredit']) && $param['markascredit']=="on") {
               $credit_note = $mysql->insert("_tbl_user_credits",array("MemberID"=>$param['MemberID'],
                                                        "NickName"=>$param['credit_nickname'],
                                                        "TxnAmount"=>$param['amount'],
                                                        "CreditUpdated"=>date("Y-m-d H:i:s"),
                                                        "Amount"=>$param['CrAmount'],
                                                        "PayableAmount"=>$param['CrAmount'],
                                                        "summary"=>$param['particulars']."/".$param['number']."/".$param['operator'],
                                                        "txnid"=>$txnid,
                                                        "IsPaid"=>"0"));
               $mysql->execute("update `_tbl_transactions` set `IsCreditSale`='1', `Credit_noteid`='".$credit_note."'  where `txnid`='".$txnid."'");
               $result['creditnote'] =$credit_note;
           } 
            
            } else {
                $mysql->execute("update _tbl_accounts set Debit='0', Credit='0', Balance='".$balance."' where AccountID='".$ACtxnid."'");
               // $mysql->execute("update _tbl_accounts set Debit='0', Credit='0', Balance='".$balance."' where AccountID='".$Cashback_ACtxnid."'");
                $mysql->execute("delete from _tbl_accounts   where AccountID='".$Cashback_ACtxnid."'");
            $mysql->execute("update `_tbl_transactions` set `TxnStatus`='failure' where `txnid`='".$txnid."'");    
            $result['status']="failure";
            $result['message']=$response['response']["error"];
            }
            
            
        } else {
                   $result['status']="requested";
            $result['txnid']="0";
            $result['charged']=$charge;
            $result['operatorid']="0";
            
        }
                         
        } else {
            $result['status']="failure";
            $result['message']="insufficient balance.";
        }
        return $result;
    }
}

class Mars {
      
        
        public static function sendRequest($param) {
            
            global $mysql;
            $url = "http://216.10.242.207:".PORT."/MARSrequest/?operator=".$param['operator']."&number=".$param['number']."&amount=".$param['amount']."&reqref=web_x".$param['txnid']."&USERID=900&PASSWORD=7373772010";
            $mysql->execute("update `_tbl_transactions` set `ACtxnid`='".$param['actxnid']."',`calledurl`='".$url."'  where `txnid`='".$param['txnid']."'");
            $mysql->execute("update `_tbl_transactions` set `APIID`='1', `APIName`='Lapu', `calledurl`='".$url."'  where `txnid`='".$param['txnid']."'");
            
            //call api
            $api_response = getHttp($url);
            
            //update api response
            $mysql->execute("update `_tbl_transactions` set `urlresponse`='".$api_response."',`OperatorDate`='".date("Y-m-d H:i:s")."' where `txnid`='".$param['txnid']."'");
        
        
         if (strpos($api_response, "ERROR") !== false) {
                $msg = explode("mars_reason=",trim($response));
                $msg = $msg[1];
                $return['status']="failure";
                $return['message']=$msg;
                $return['lapuno']="0";
            } else {
                if (strpos($api_response, "ACCEPTED") !== false) {
                    $return['status']="success";
                    $return['operatorid']="0";  
                    $return['lapuno']="0";
                } else {
                    $operatorid = "";     
                    $refno = "";
                    $return['status']="pending";
                    $return['message']="0";
                    $return['lapuno']="0";
                }
            }
            return $return;
        }        
    
}

function getHttp($url) {
    global $mysql;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_PORT, PORT);
    curl_setopt($ch, CURLOPT_TIMEOUT, 90); //timeout in seconds
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    $response = curl_exec($ch);   
    return $response;
}


function getHttp2($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 600); //timeout in seconds
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    $response = curl_exec($ch);   
    return $response;
}

function getHttp3($url) {
  
   
      $ch = curl_init($url);
     curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 6000); //timeout in seconds
    $response = curl_exec($ch);   
     curl_close($ch);
    return $response;
}
$application = new JApplication();
$TnebRegion = array("","01-Chennai-North","02-Viluppuram","03-Coimbatore","04-Erode","05-Madurai","06-Trichy","07-Tirunelvel","08-Vellore","09-chennai-South");
/*
http://216.10.242.207:7860/MARSrequest/?operator=RJ&number=9944872965&amount=10&reqref=A00000121&USERID=900&PASSWORD=7373772010
REQUEST ACCEPTED your ref=A00000121 mars_reference=RC4063243111077568279
REQUEST ERROR errorno=6;your ref=A00000121;mars_reason=Recharge disabled for this operator
*/

function getUpperLimit($MemberID) {
    global $mysql;
    $userlimit = $mysql->select("select * from _tbl_member where MemberID='".$MemberID."'");
    if ($userlimit[0]['MoneyTransferLimit']>0) {
        return $userlimit[0]['MoneyTransferLimit'];
    } else {
        $adminLimit = $mysql->select("select * from _tbl_members_imps_limits where MemberID='".$MemberID."' and  date(TxnDate)=date('".date("Y-m-d")."') order by id desc ");
        if (isset($adminLimit[0]['TransferLimit'])) {
            return $adminLimit[0]['TransferLimit'];
        } else {
            $previous_day_balance = $mysql->select("select (sum(Credit)-sum(Debit)) as previous_balance from _tbl_accounts where date(TxnDate)<=date('".date("Y-m-d",strtotime(date("Y-m-d"). ' -1 days'))."') and MemberID='".$MemberID."'");
            return isset($previous_day_balance[0]['previous_balance']) ? intval($previous_day_balance[0]['previous_balance']/2) : 0;
        }
    }
}

function getTodayTransfered($MemberID) {
    global $mysql; 
    $today_transfered  = $mysql->select("select sum(rcamount) as rcamount from _tbl_transactions where TxnStatus='success' and memberid='".$_SESSION['User']['MemberID']."' and date(txndate)=date('".date("Y-m-d")."') and operatorcode='MTB' ");
    return isset($today_transfered[0]['rcamount']) ? $today_transfered[0]['rcamount'] : 0;
}

?>