<?php
session_start();
define("SITE_URL","https://hamiec.j2jsoftwaresolutions.com");
define("SITE_TITLE","HamiEC");                       
define("SQL_LOG_PATH","/home/j2jsoftwares/public_html/hamiec/");

date_default_timezone_set('Asia/Calcutta'); 

include_once("app/classes/DatabaseController.php");
include_once("app/classes/MobileSMSController.php");
include_once("app/classes/MailController.php");
include_once("app/classes/SequenceController.php");

include_once("app/classes/class.MRoboticsAPI.php");
include_once("app/classes/class.EzytmAPI.php");
include_once("app/classes/class.RealRoboAPI.php");
include_once("app/classes/class.ManualRecharge.php");
include_once("app/classes/class.AnnaiAPI.php");

define("APPURL",SITE_URL);    
$mysql = new MySqlDb("localhost","j2jsoftw_user","mysql@Pwd","j2jsoftw_hamiec");
                                   
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
function printDateTime($datetime) {
    return date("M d, Y H:i",strtotime($datetime));
}

class JApplication {
    
    function getBalance($MemberID) {
        global $mysql;
        $res = $mysql->select("select (sum(Credit)-sum(Debit)) as bal from _tbl_accounts where MemberID='".$MemberID."'");
        return isset($res[0]['bal']) ? $res[0]['bal'] : "0";
    }
    
    function getCommissionDebited($MemberID) {
        global $mysql;
        $res = $mysql->select("select sum(Debit) as bal from _tbl_accounts where Voucher='4' and MemberID='".$MemberID."'");
        return isset($res[0]['bal']) ? $res[0]['bal'] : "0";
    }
    
     function getCommissionCredited($MemberID) {
        global $mysql;
        $res = $mysql->select("select sum(Credit) as bal from _tbl_accounts where Voucher='3' and MemberID='".$MemberID."'");
        return isset($res[0]['bal']) ? $res[0]['bal'] : "0";
    }  
    
     function getCommissionMemberCredited($MemberID) {
        global $mysql;
        $res = $mysql->select("select sum(Credit) as bal from _tbl_accounts where Voucher='5' and MemberID='".$MemberID."'");
        return isset($res[0]['bal']) ? $res[0]['bal'] : "0";
    } 
    
    function getCommissionTransfered($MemberID) {
        global $mysql;
        $res = $mysql->select("select sum(Debit) as bal from _tbl_accounts where Voucher='6' and MemberID='".$MemberID."'");
        return isset($res[0]['bal']) ? $res[0]['bal'] : "0";
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
        if ($param['status']=="FAILURE" ) {
            $mysql->execute("update _tbl_transactions set `TxnStatus`='reversed',`reverseResponse` = concat(`reverseResponse`,'<br>".implode(",",$param)."'), `revDate`='".date("Y-m-d H:i:s")."' where `txnid`='".$txnid."'");
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
                                                                   
            return true;
        }
        
        if ($param['status']=="SUCCESS") {
            $mysql->execute("update _tbl_transactions set `TxnStatus`='success',OperatorNumber='".$param['transid']."',`reverseResponse`='".implode(",",$param)."', `revDate`='".date("Y-m-d H:i:s")."' where `txnid`='".$txnid."'");
            return true;
        }

        if ($param['status']=="RESPWAIT" || $param['status']=="SUSPENSE") {
            $mysql->execute("update _tbl_transactions set `TxnStatus`='pending',`reverseResponse`='".implode(",",$param)."', `revDate`='".date("Y-m-d H:i:s")."' where `txnid`='".$txnid."'");
            return true;
        }
    }
 
    function doRecharge($param) {
        
        global $mysql;
        $result = array();
        $error = 0;
        $result['number'] = $param['number'];
        $result['amount'] = $param['amount'];
        $result['creditnote'] =0;
        $balance = $this->getBalance($param['MemberID']);
        
        
        if ($balance<$param['amount']) {
            $result['status']="failure";
            $result['message']="insufficient balance.";  
            return $result;
        }
        
        $api = $mysql->select("select * from _tbl_operators where OperatorCode='".$param['operator']."' and APIID>0");
        if (sizeof($api)==0) {
            $result['status']="failure";
            $result['message']="Operator currently unavailable.";  
            return $result;
        }
        
        $dup = $mysql->select("select * from _tbl_transactions where operatorcode='".$param['operator']."' and rcnumber='".$param['number']."' and rcamount='".$param['amount']."' order by txnid desc limit 0,1");
        if (sizeof($dup)>0) {
               if ( (strtotime(date("Y-m-d"))-strtotime($dup[0]['TxnDate']))<=300 ) {
                  $result['status']="failure";
                  $result['message']="previous transaction is in-process.";  
                  return $result; 
               }
        }
            
        if ($error==0) {
            
            if ($param['operator']=="RA") {
                $operator_string = "AIRTEL";
                $param['particulars'] = "Mobile Recharge";
            }
           
            if ($param['operator']=="RB") {
                $operator_string = ($param['amount']%10) ? "BSNL_TOPUP" : "BSNL_RECHARGE";
                $param['particulars'] = "Mobile Recharge";
            }
            
            if ($param['operator']=="RJ") {
                $operator_string = "JIO";
                $param['particulars'] = "Mobile Recharge";
            }
            
            if ($param['operator']=="RV") {
                $operator_string = "VODAFONE";
                $param['particulars'] = "Mobile Recharge";
            }
            
            if ($param['operator']=="RI") {
                $operator_string = "IDEA";
                $param['particulars'] = "Mobile Recharge";
            }
            
            if ($param['operator']=="DA") {
                $param['particulars']="DTH Recharge";
                $operator_string = "AIRTEL_DIGITAL_TV";
            }
            
            if ($param['operator']=="DD") {
                $param['particulars']="DTH Recharge";
                $operator_string = "DISH_TV";
            } 
            
            if ($param['operator']=="DS") {
                $param['particulars']="DTH Recharge";
                $operator_string = "SUN_DIRECT";
            }
            
            if ($param['operator']=="DT") {
                $param['particulars']="DTH Recharge";
                $operator_string = "TATA_SKY";
            }
            
            if ($param['operator']=="DV") {
                $param['particulars']="DTH Recharge";
                $operator_string = "VIDEOCON_D2H";
            }
           
            $ACtxnid = $mysql->insert("_tbl_accounts",array("TxnDate"     => date("Y-m-d H:i:s"),
                                                            "MemberID"    => $param['MemberID'],
                                                            "Particulars" => $param['particulars']."/".$param['number']."/".$operator_string,
                                                            "TxnValue"    => $param['amount'],
                                                            "Credit"      => "0",
                                                            "Debit"       => $param['amount'],
                                                            "Balance"     => $balance-$param['amount'],
                                                            "Voucher"     => "101"));        
            $Cashback_ACtxnid = "0";
         
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
            $mysql->execute("update `_tbl_transactions` set `ACtxnid`='".$ACtxnid."'  where `txnid`='".$txnid."'");
            $param['txnid']=$txnid;
            
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
            
            if ($api[0]['APIID']==1) {
                $response = MRoboticsAPI::sendRequest($param);
            } elseif ($api[0]['APIID']==2) {
                $response = EzytmAPI::sendRequest($param);
            } elseif ($api[0]['APIID']==3) {
                $response = RealRoboAPI::sendRequest($param);
            } elseif ($api[0]['APIID']==5) {
                $response = ManualRecharge::sendRequest($param);
            }  elseif ($api[0]['APIID']==6) {
                $response = AnnaiAPI::sendRequest($param);
            }  

           if ($response['status']=="failure") {
               $result['status']="failure";
               $result['message']=$response['message'];
               $mysql->execute("update _tbl_transactions set `TxnStatus`='failure',`msg`='".$response['message']."',`lapurefno`='".$response['lapuno']."', `OperatorDate`='".date("Y-m-d H:i:s")."' where `txnid`='".$txnid."'");
               $mysql->execute("update _tbl_accounts set Debit='0', Credit='0', Balance='".$balance."' where AccountID='".$ACtxnid."'");
                //$mysql->execute("update _tbl_accounts set Debit='0', Credit='0', Balance='".$balance."' where AccountID='".$Cashback_ACtxnid."'");
                //if (isset($param['markascredit']) && $param['markascredit']=="on") {
                    //$mysql->execute("update _tbl_transactions set IsCreditSale='-1'  where `txnid`='".$txnid."'");
                    //$mysql->execute("delete from `_tbl_user_credits` where CreditID='".$credit_note."'");
                //}
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
           $result['balance']=number_format($this->getBalance($param['MemberID'],2));
    }  
        return $result;
    }
    
    function doBillPay($param) {
        
        global $mysql;
        $result = array();
        $result['number'] = $param['number'];
        $result['amount'] = $param['amount'];
        $result['creditnote'] =0;
        
        if($param['operator']=="UTNP"){
            $operatorstring = "TN Police";
            $charge =5;
        } if($param['operator']=="ET"){
            $operatorstring = "Electricity Bill";
            $charge =8;
        }
        
        $balance = $this->getBalance($param['MemberID']);
        if ($param['whatsappRequired']=="1") {
            $charge +=2;
            $Particulars = "/wp";
        } 
        
        $debitable_amt = $param['amount']+$charge+($param['amount']*3/100); 
        
        
            
        if ($debitable_amt<=$balance) {
            $ACtxnid = $mysql->insert("_tbl_accounts",array("TxnDate"     => date("Y-m-d H:i:s"),
                                                            "memberid"    => $param['MemberID'],
                                                            "Particulars" => $param['operator']."/".$operatorstring."/".$param['number'],
                                                            "TxnValue"    => $param['amount'],
                                                            "Credit"      => "0",
                                                            "Debit"       => $param['amount'],
                                                            "Balance"     => $balance-$param['amount'],
                                                            "Voucher"     => "31"));        
            $Particulars= "";
            $ACtxnid_CommBack = $mysql->insert("_tbl_accounts",array("TxnDate"     => date("Y-m-d H:i:s"),
                                                                     "memberid"    => $param['MemberID'],
                                                                     "Particulars" => "CommBack/".$param['operator']."/".$operatorstring."/".$param['number'],
                                                                     "TxnValue"    => $param['amount']*3/100,
                                                                     "credit"      => "0",
                                                                     "debit"       => $param['amount']*3/100,
                                                                     "balance"     => $balance-$param['amount']-($param['amount']*3/100),
                                                                     "Voucher"     => "320")); 
                                                                     
            $ACtxnid_Charge   = $mysql->insert("_tbl_accounts",array("TxnDate"     => date("Y-m-d H:i:s"),
                                                                     "memberid"    => $param['MemberID'],
                                                                     "Particulars" => "Charge/".$param['operator']."/".$operatorstring."/".$param['number'].$Particulars,
                                                                     "TxnValue"    => $charge,
                                                                     "credit"      => "0",
                                                                     "debit"       => $charge,
                                                                     "balance"     => $balance-$param['amount']-$charge-($param['amount']*3/100),
                                                                     "Voucher"     => "32"));        
           $txnid = $mysql->insert("_tbl_transactions",array("txndate"              => date("Y-m-d H:i:s"),  
                                                             "memberid"             => $param['MemberID'],
                                                             "operatorcode"         => $param['operator'],
                                                             "rcnumber"             => $param['number'],
                                                             "rcamount"             => $param['amount'],
                                                             "cashback"             => "0",
                                                             "charge"               => "0",
                                                             "CustomerMobileNumber" => isset($param['CustomerMobileNumber']) ? $param['CustomerMobileNumber'] : "",
                                                             "dob"                  => isset($param['dob']) ? $param['dob'] : "",
                                                             "Remarks"              => isset($param['Remarks']) ? $param['Remarks'] : "",
                                                             "AccountName"          => isset($param['AccountName']) ? $param['AccountName'] : "",
                                                             "IFSCode"              => isset($param['IFSCode']) ? $param['IFSCode'] : "",
                                                             "OperatorNumber"       => "0",                   
                                                             "TxnStatus"            => "accepted",
                                                             "ACtxnid"              => $ACtxnid,
                                                             "ACtxnid_CommBack"     => $ACtxnid_CommBack,
                                                             "ACtxnid_Charge"       => $ACtxnid_Charge,
                                                             "Cashback_ACtxnid"     => "0",
                                                             "calledurl"            => "",
                                                             "urlresponse"          => ""));
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
            $result['status']="accepted";
            $result['txnid']=$txnid;
            $result['charged']=$charge;
            $result['operatorid']=$operatorid;
            $mysql->execute("update `_tbl_transactions` set `TxnStatus`='accepted',`lapurefno`='".$lapuno."',`OperatorNumber`='".$operatorid."',`OperatorDate`='".date("Y-m-d H:i:s")."' where `txnid`='".$txnid."'");
        } else {
            $result['status']="failure";
            $result['message']="insufficient balance. Required Rs.".number_format($debitable_amt,2);
        }
        $result['balance']=number_format($this->getBalance($param['MemberID']),2);
        return $result;
    }
    
    function reverseBillPay($txnid,$message,&$error) {
        
        global $mysql;
        $error = "";

        $t = $mysql->select("select * from _tbl_transactions where `txnid`='".$txnid."'");
        
        if ($t[0]['TxnStatus']=="accepted" || $t[0]['TxnStatus']=="requested" ) {
            
            $mysql->execute("update _tbl_transactions set `TxnStatus`='reversed',`reverseResponse`='".$message."', `revDate`='".date("Y-m-d H:i:s")."' where `txnid`='".$txnid."'");
            
            if ($t[0]['ACtxnid']>0) {
                $ac = $mysql->select("select * from _tbl_accounts where AccountID='".$t[0]['ACtxnid']."'");
                $ACtxnid = $mysql->insert("_tbl_accounts",array("TxnDate"     => date("Y-m-d H:i:s"),
                                                                "MemberID"    => $ac[0]['MemberID'],
                                                                "Particulars" => "Reversed.".$ac[0]['Particulars'],
                                                                "TxnValue"    => $ac[0]['Debit'],
                                                                "Credit"      => $ac[0]['Debit'],
                                                                "Debit"       => "0",
                                                                "Balance"     => $this->getBalance($t[0]['MemberID'])+$ac[0]['Debit'],
                                                                "Voucher"     => "41"));   
                                                                
                $mysql->execute("update _tbl_transactions set ACtxnid_Reverse='".$ACtxnid."' where `txnid`='".$txnid."'" );
            }
            
            if ($t[0]['ACtxnid_CommBack']>0) {
                $ac_commback = $mysql->select("select * from _tbl_accounts where AccountID='".$t[0]['ACtxnid_CommBack']."'");
                $Cashback_ACtxnid = $mysql->insert("_tbl_accounts",array("TxnDate"     => date("Y-m-d H:i:s"),
                                                                         "MemberID"    => $ac_commback[0]['MemberID'],
                                                                         "Particulars" => "Reversed.".$ac_commback[0]['Particulars'],
                                                                         "TxnValue"    => $ac_commback[0]['Debit'],
                                                                         "credit"      => $ac_commback[0]['Debit'],
                                                                         "debit"       => "0",
                                                                         "balance"     => $this->getBalance($t[0]['MemberID'])+$ac_commback[0]['Debit'],
                                                                         "Voucher"     => "142"));    
                $mysql->execute("update _tbl_transactions set ACtxnid_CommBack_Reverse='".$Cashback_ACtxnid."' where `txnid`='".$txnid."'" );                                                       
                                                                   
            }
            
            if ($t[0]['ACtxnid_Charge']>0) {
                $ac_chargeback = $mysql->select("select * from _tbl_accounts where AccountID='".$t[0]['ACtxnid_Charge']."'");
                $Charge_ACtxnid = $mysql->insert("_tbl_accounts",array("TxnDate"     => date("Y-m-d H:i:s"),
                                                                         "MemberID"    => $ac_chargeback[0]['MemberID'],
                                                                         "Particulars" => "Reversed.".$ac_chargeback[0]['Particulars'],
                                                                         "TxnValue"    => $ac_chargeback[0]['Debit'],
                                                                         "credit"      => $ac_chargeback[0]['Debit'],
                                                                         "debit"       => "0",
                                                                         "balance"     => $this->getBalance($t[0]['MemberID'])+$ac_chargeback[0]['Debit'],
                                                                         "Voucher"     => "143"));     
            $mysql->execute("update _tbl_transactions set ACtxnid_Charge_Reverse='".$Charge_ACtxnid."' where `txnid`='".$txnid."'" );                                                                  
            }
            return true;
        } else {
            $error = "transaction already reversed or success transaction";
            return false;
        }
    }
    
    function doMoneyTransfer($param) {
        
        global $mysql;
        
        $result = array();
        $result['number']     = $param['number'];
        $result['amount']     = $param['amount'];
        $result['creditnote'] = 0;
        
        $balance = $this->getBalance($param['MemberID']);
        $charge = 15;
        if ($balance>$param['amount']) {
            $ACtxnid          = $mysql->insert("_tbl_accounts",array("TxnDate"     => date("Y-m-d H:i:s"),
                                                                     "memberid"    => $param['MemberID'],
                                                                     "Particulars" => "MoneyTransfer/".$param['number']."/".$param['IFSCode'],
                                                                     "TxnValue"    => $param['amount'],
                                                                     "Credit"      => "0",
                                                                     "Debit"       => $param['amount'],
                                                                     "Balance"     => $balance-$param['amount'],
                                                                     "Voucher"     => "31"));        
            $ACtxnid_Commback = $mysql->insert("_tbl_accounts",array("TxnDate"     => date("Y-m-d H:i:s"),
                                                                     "memberid"    => $param['MemberID'],
                                                                     "Particulars" => "CommBack/MoneyTransfer/".$param['number']."/".$param['IFSCode'],
                                                                     "TxnValue"    => $param['amount']*3/100,
                                                                     "credit"      => "0",
                                                                     "debit"       => $param['amount']*3/100,
                                                                     "balance"     => $balance-$param['amount']-($param['amount']*3/100),
                                                                     "Voucher"     => "320")); 
            $ACtxnid_Charge   = $mysql->insert("_tbl_accounts",array("TxnDate"     => date("Y-m-d H:i:s"),
                                                                     "memberid"    => $param['MemberID'],
                                                                     "Particulars" => "Charge/MoneyTransfer/".$param['number']."/".$param['IFSCode'],
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
                                                              "TxnStatus"        => "accepted",
                                                              "ACtxnid"          => $ACtxnid,
                                                              "Cashback_ACtxnid" => "0",
                                                              "calledurl"        => "",
                                                              "urlresponse"      => ""));
            $url = "https://www.aaranju.in/moneytransfer/api.php?username=a2x4Lmn2cvLmluI&password=IGhhcHB==&uid=".$txnid;
            $url .= "&account_name=".urlencode($param['AccountName']);
            $url .= "&account_number=".trim($param['number']);   
            $url .= "&ifsc_code=".trim($param['IFSCode']);
            $url .= "&amount=".trim($param['amount']);
            $url .= "&remarks=".urlencode($param['Remarks']);
            $mysql->execute("update `_tbl_transactions` set `calledurl`='".$url."' where `txnid`='".$txnid."'");   
            $response = getHttp3($url);                  
            $mysql->execute("update `_tbl_transactions` set  `urlresponse`='".$response."' where `txnid`='".$txnid."'");   
            $response = json_decode($response,true);
              
            $result['number']   = $param['number'];
            $result['ifsccode'] = $param['IFSCode'];
            $result['txnid']    = $txnid;
            if ($response['response']['status']=="SUCCESS" || $response['response']['status']=="REQUESTED") {
                $result['status']     = "success";
                $result['charged']    = $charge;
                $result['operatorid'] = isset($response['response']['transid']) ? $response['response']['transid'] : 0;
                $mysql->execute("update `_tbl_transactions` set `TxnStatus`='success',`lapurefno`='".$lapuno."',`OperatorNumber`='".$result['operatorid']."',`OperatorDate`='".date("Y-m-d H:i:s")."' where `txnid`='".$txnid."'");    
                
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
                $result['status']  = "failure";
                $result['message'] = $response['response']["error"];
                $mysql->execute("update _tbl_accounts set Debit='0', Credit='0', Balance='".$this->getBalance($param['MemberID'])."' where AccountID='".$ACtxnid."'");
                $mysql->execute("update _tbl_accounts set memberid='0', Debit='0',Voucher='0', Credit='0', Balance='0' where AccountID='".$ACtxnid_Commback."'");
                $mysql->execute("update _tbl_accounts set memberid='0',Debit='0', Credit='0',Voucher='0', Balance='0' where AccountID='".$ACtxnid_Charge."'");
                $mysql->execute("update `_tbl_transactions` set msg='".$response['response']['error']."', `TxnStatus`='failure' where `txnid`='".$txnid."'");    
            }
                         
        } else {
            $result['status']="failure";
            $result['message']="insufficient balance.";
        }
        $result['balance']=number_format($this->getBalance($param['MemberID']),2);
        return $result;
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

function getHttp3($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 600); //timeout in seconds
    $response = curl_exec($ch);   
    curl_close($ch);
    return $response;
}

function getHttp2($url) {
    global $mysql;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 600); //timeout in seconds
    $response = curl_exec($ch);   
    return $response;
}

$app = new JApplication();



$application = new JApplication();
$operatorName = array("RA"=>"Airtel","RB"=>"BSNL","RJ"=>"JIO","RV"=>"Vodafone","RI"=>"IDEA","DD"=>"Dish TV","DA"=>"Airtel Digital Tv","DT"=>"Tatasky","DS"=>"Sun Direct","DV"=>"Videocon d2h","DB"=>"Big Tv");
 $TnebRegion = array("","01-Chennai-North","02-Viluppuram","03-Coimbatore","04-Erode","05-Madurai","06-Trichy","07-Tirunelvel","08-Vellore","09-chennai-South");
    
 
   
    
    
/*
ezytm.net
Api id : 8724
Pwd : Saral1992

Realrobo.in
User Id : 1910
Pwd : Saral@9566

https://mrobotics.in
Username :Saral Multi
Password :jjjgpfx9
*/            
?>