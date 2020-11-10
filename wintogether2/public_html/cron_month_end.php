<?php
       include_once("/home/wintogether2/public_html/config.php");
       
       $members = $mysql->select("select * from _tbl_Members order by MemberID");
       foreach($members as $member) {
           $member_balance = getEarningWalletBalance($member['MemberID']);
           if ($member_balance>0) {
               $member_bank_details = $mysql->select("select * from _tbl_member_bank_details where MemberID='".$member['MemberID']."' order by BankID desc");
               $id = $mysql->insert("_tbl_payout_banktransfer",array("TxnDate"=>date("Y-m-d H:i:s"),
                                                               "MemberID"=>$member['MemberID'],
                                                               "MemberCode"=>$member['MemberCode'],
                                                               "MemberName"=>$member['MemberName'],
                                                               "Particulars"=>"Bank Transfer",
                                                               "Amount"=>$member_balance,
                                                               "AccountName"=>isset($member_bank_details[0]['AccountName']) ? $member_bank_details[0]['AccountName'] : "",
                                                               "AccountNumber"=>isset($member_bank_details[0]['AccountNumber']) ? $member_bank_details[0]['AccountNumber'] : "",
                                                               "AccountIFSCode"=>isset($member_bank_details[0]['IFSCode']) ? $member_bank_details[0]['IFSCode'] : ""));
               $mysql->insert("_tbl_wallet_earnings",array(
               "MemberID"=>$member['MemberID'],
               "MemberCode"=>$member['MemberCode'],
               "Particulars"=>"Payout of ".date("M, Y")." Transfered To Bank Transfer / ".$id,
               "TxnDate"=> date("Y-m-d H:i:s"),
               "Credits"=>"0",
               "Debits"=>$member_balance,
               "AvailableBalance"=> "0",
               "details"=>$id,
               "Ledger"=>1110));
               
           }                                
       }
 ?> 