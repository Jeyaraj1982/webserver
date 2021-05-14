<?php
    include_once("admin/config.php");
    
    function writeTxt($text) {
        $file = "telegram_".date("Y_m_d").".txt";
        $myfile = fopen($file, "a") or die("Unable to open file!");
        fwrite($myfile,"\n".date('Y-m-d H:i:s')."\t".$text);
        fclose($myfile);
    }
    
    writeTxt(json_encode($_GET));
    
    if (isset($_GET['txnid'])) {    
       
        $url =  "https://www.aaranju.in/moneytransfer/api.php?txnInfo=".$_GET['txnid'];
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result,true);
        $data = $result['data'];
        
        //Maajid ID
        $Message = "Your Virutal account will updated with Rs. ".$data['TxnAmount'].", Refill From ".$data['InCommingAccountName']." (".$data['InCommingAccountNumber'].")";
        TelegramMessageController::sendSMS(AdminTelegramID,$Message,0,0); 
        
        $bankData = $mysql->select("select * from _tbl_member_bankaccounts where AccountNumber='".ltrim($data['InCommingAccountNumber'], '0')."'");
        if (sizeof($bankData)>0) {
                                                            
            $balance = $application->getBalance($bankData[0]['MemberID'])+$data['TxnAmount'];
            $id=$mysql->insert("_tbl_accounts",array("MemberID"    => $bankData[0]['MemberID'],
                                                     "Particulars" => 'Refill Wallet/FromAdmin/AutoRefill',                    
                                                     "Credit"      => $data['TxnAmount'],                    
                                                     "Debit"       => "0", 
                                                     "Balance"     => $balance,                   
                                                     "Voucher"     => "555",                    
                                                     "TxnDate"     => date("Y-m-d H:i:s")));
                                                         
            $member = $mysql->select("Select * from _tbl_member where `MemberID`='".$bankData[0]['MemberID']."'");
            
            //if ($member[0]['MapedTo']!=4) 
            {                                                   
                 $com = $data['TxnAmount'] * (0.50/100);
                 $xbalance = $application->getBalance($member[0]['MapedTo']);
                 $xid=$mysql->insert("_tbl_accounts",array("MemberID"    => $member[0]['MapedTo'],
                                                           "Particulars" => 'Bonus Commission/FromAdmin Wallet Transfer/AutoRefill',                    
                                                           "Credit"      => $com,                    
                                                           "Debit"       => "0", 
                                                           "Balance"     => $xbalance+$com,                   
                                                           "Voucher"     => "-2",                    
                                                           "TxnDate"     => date("Y-m-d H:i:s")));
            }
            
            if ($member[0]['TelegramID']>0)  {
                $message = "Dear ".$member[0]['MemberName'].", Your wallet has been credited Rs. ".$data['TxnAmount'].". Wallet Balance Rs.".number_format($balance,2);
                TelegramMessageController::sendSMS($member[0]['TelegramID'],$message,$member[0]['MemberID'],0);
            }
            
            //Maajid ID
            $Message = "Wallet Refilled from Autowallet update to  ".$member[0]['MemberName']." with INR. ".$data['TxnAmount'];
            TelegramMessageController::sendSMS(AdminTelegramID,$Message,0,0);
        } 
        exit;
    }
    
    if (isset($_GET['action']) && $_GET['action']=="sendMessage") {
        //Maajid ID
        TelegramMessageController::sendSMS(AdminTelegramID,$_GET['Message'],0,0);
        exit;
    }
?> 