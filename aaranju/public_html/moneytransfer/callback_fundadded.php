<?php
    include_once("../config.php");
    function writeTxt($text) {
        $file = "_callback_fundaded".date("Y_m_d").".txt";
        $myfile = fopen($file, "a") or die("Unable to open file!");
        fwrite($myfile,"\n".date('Y-m-d H:i:s')."\t".$text);
        fclose($myfile);
    }
    writeTxt(json_encode($_GET));
    writeTxt(json_encode($_POST));
    
    $data = $mysql->select("select * from _moneytransfer_incoming_bankaccount where accountnumber='".$_POST['rmtr_account_no']."'");
    
    if (sizeof($data)>0) {
        
        $user_balance = MoneyTransfer::get_balance($data[0]['userid']);
        
        $txnid = $mysql->insert("_tbl_money_transfer",array("UserID"             => $data[0]['userid'],
                                                            "TxnDate"            => date("Y-m-d H:i:s"),
                                                            "Particulars"        => "WalletUpdate",
                                                            "IsWalletUpdate"     => "1",
                                                            "TxnAmount"          => $_POST['amount'],
                                                            "Credit"             => $_POST['amount'],        
                                                            "Debit"              => "0",
                                                            "Balance"            => $user_balance+$_POST['amount'],
                                                            "BankAccountNumber"  => "",
                                                            "IFSCode"            => "",
                                                            "PaymentType"        => $_POST['payment_type'],
                                                            "Remarks"            => "AutoRefill",
                                                            "BeneficiaryName"    => "",
                                                            "ReferenceNumber"    => $_POST['bank_ref_num'],
                                                            "APIResponse_1"        => json_encode($_POST),
                                                            "TransactionStatus"  => "Success",
                                                            "uid"  => "0",
                                                            "BankReferenceID"    => $_POST['bank_ref_num'],
                                                            "RequestedFrom"      => "API"));
           
           if ($data[0]['userid']==9) { 
               $charges=5;
               $Particulars="Charges/".$txnid;
           } else {
               $Particulars="Charges/NonMaintainBalance/".$txnid;
               $charges=50;
           }                                                     
            $charges = 0;
            if ($charges>0) {                                         
           $mysql->insert("_tbl_money_transfer",array("UserID"             => $data[0]['userid'],
                                                                 "TxnDate"            => date("Y-m-d H:i:s"),
                                                                 "Particulars"        => $Particulars,
                                                                 "IsWalletUpdate"     => "4",
                                                                 "Credit"             => "0",
                                                                 "Debit"              => $charges,
                                                                 "Balance"            => $user_balance+$_POST['amount']-$charges,
                                                                 "BankAccountNumber"  => "",
                                                                 "IFSCode"            => "",
                                                                 "PaymentType"        => "",
                                                                 "Remarks"            => "",
                                                                 "BeneficiaryName"    => "",
                                                                 "ReferenceNumber"    => "",
                                                                 "APIResponse_1"        => "",
                                                                 "TransactionStatus"  => "SUCCESS",
                                                                 "BankReferenceID"    => "0",
                                                                 "RequestedFrom"      => $param['txn_from']));
            }                                            
        writeTxt("TxnID: ".$txnid);
        
}
?>