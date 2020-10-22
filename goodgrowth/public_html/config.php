<?php
    session_start();
    date_default_timezone_set('Asia/Kolkata');
    ini_set('display_startup_errors', 0);
    ini_set('display_errors', 0);
    error_reporting(0);
    
	class MySql {
        
        var $link; 
        var $dbName = "";
        var $qry    = "";
        
        function MySql($dbHost,$dbUser,$dbPass,$dbName){
            $this->dbName = $dbName;
            $this->link = mysql_connect($dbHost,$dbUser,$dbPass) or die("Mysql Server unavailable");
        }
        
        function select($sql,$ass=false) {
            
            mysql_select_db($this->dbName,$this->link);

            $resultData = array();
            $result     = mysql_query($sql,$this->link);
            
            if ($ass) {
                return mysql_fetch_assoc($result); 
            }
            
            if ($result) { 
                
                if (mysql_num_rows($result) > 0) {
                    while ($row = mysql_fetch_assoc($result)) {
                        $resultData[]=$row;
                    }
                    mysql_free_result($result);  
                }
            }
            
            return $resultData;
        }
        
        function execute($sql) {
            
            $this->qry = $sql;
            mysql_select_db($this->dbName,$this->link);
            mysql_query($this->qry,$this->link);
            return mysql_affected_rows();
        }
        
        function insert($tableName,$rowData) {
            
            $r = "insert into `".$tableName."` (";
            $l = " values (";
            foreach($rowData as $key => $value) {
                $r.="`".$key."`,";
                if ($value=="Null") {
                    $l.="Null,";
                } else {
                    $l.="'".$value."',";    
                }
                
            }
            $r = substr($r,0,strlen($r)-1).")";
            $l = substr($l,0,strlen($l)-1).")";
            $sql = $r.$l;
            
            mysql_select_db($this->dbName,$this->link);

            $this->qry=$sql;  
            mysql_query($this->qry,$this->link) ;
            return mysql_insert_id($this->link);
        }
        
         function update($tableName,$rowData,$where) {
            
            $r = "update `".$tableName."` set ";
 
            foreach($rowData as $key => $value) {
                $r.="`".$key."`='".$value."',";
            }
            $r = substr($r,0,strlen($r)-1);
            $sql = $r." where ".$where;
            
            mysql_select_db($this->dbName,$this->link);
            $this->qry=$sql;  
            mysql_query($this->qry,$this->link);
            return mysql_affected_rows($this->link);
        }
        
        function dbClose() {
            mysql_close($this->link);
        }
    }
    
     class Invoice {
         function CreateInvoice($param) {
             global $mysql;
             $invoiceNo = "IN";
             $d  = $mysql->select("select * from _tbl_Accounts_Invoices");
             if (strlen(sizeof($d)+1)==1) {
                 $invoiceNo .= "000000".(sizeof($d)+1);
             }
             if (strlen(sizeof($d)+1)==2) {
                 $invoiceNo .= "00000".(sizeof($d)+1);
             }
             if (strlen(sizeof($d)+1)==3) {
                 $invoiceNo .= "0000".(sizeof($d)+1);
             }
             if (strlen(sizeof($d)+1)==4) {
                 $invoiceNo .= "000".(sizeof($d)+1);
             }
             if (strlen(sizeof($d)+1)==5) {
                 $invoiceNo .= "00".(sizeof($d)+1);
             }
             if (strlen(sizeof($d)+1)==6) {
                 $invoiceNo .= "0".(sizeof($d)+1);
             }
             if (strlen(sizeof($d)+1)==7) {
                 $invoiceNo .= (sizeof($d)+1);
             }
             $InvoiceID = $mysql->insert("_tbl_Accounts_Invoices", array("MemberID"           => $param['MemberID'],
                                                                         "TxnDate"            => date("Y-m-d H:i:s"),
                                                                         "MemberCode"         => $param['MemberCode'],
                                                                         "InvoiceNo"          => $invoiceNo,
                                                                         "Particulars"        => $param['Particulars'],
                                                                         "InvoiceAmount"      => $param['InvoiceAmount'],
                                                                         "TxnID"              => $param['TxnID'],
                                                                         "MemberName"         => $param['MemberName'],
                                                                         "MemberMobileNumber" => $param['MemberMobileNumber'],
                                                                         "MemberEmailID"      => $param['MemberEmailID'],
                                                                         "MemberAddress"      => $param['MemberAddress'],
                                                                         "CityName"           => $param['CityName'],
                                                                         "DistrictName"       => $param['DistrictName'],
                                                                         "StateName"          => $param['StateName'],
                                                                         "CountryName"        => $param['CountryName'],
                                                                         "PinCode"            => $param['PinCode']));
                                                                         
             $mysql->execute("update _tbl_Wallet_Transactions set InvoiceID='".$InvoiceID."' where WalletTransactionID='".$param['TxnID']."'");                                             
              
             return $InvoiceID;
         }
         
         function getInvoice($invoiceID) {
            global $mysql;
           
                $invoice = $mysql->select("select * from _tbl_Accounts_Invoices where InvoiceNo='".$invoiceID."'");
                
            
              $return = '<div style="width:650px;margin:0px auto;font-family:arial;font-size:12px">
                                <table style="width:100%;font-family:arial;font-size:12px">
                                    <tr>
                                        <td><img src="http://goodgrowth.in/images/logo.png"></td>
                                        <td style="width:300px;text-align:right">
                                            5/3, Kamalam Annamalai Complex,<br>
                                            Mudangiyar Road,<br>
                                            Rajapalayam - 626117.<br>
                                            Ph: +91-9751157370, 8870832788<br>
                                            Mail: goodgrowth@gmail.com.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="text-align:center;padding:20px;font-size:18px;font-weight:bold">Invoice</td>
                                    </tr>
                                    <tr>
                                        <td> '.ucwords(strtolower($invoice[0]['MemberName'])).'<br>'.
                                            nl2br(ucwords(strtolower($invoice[0]['MemberAddress']))).'<br>'.
                                            ucwords(strtolower($invoice[0]['CityName'])).'<br>'.
                                            ucwords(strtolower($invoice[0]['DistrictName'])).'<br>'.
                                            ucwords(strtolower($invoice[0]['StateName'])).' - '.$invoice[0]['PinCode'].'<br>
                                            Mobile No: '.$invoice[0]['MemberMobileNumber'].'<bR>
                                            Mail: '.$invoice[0]['MemberEmailID'].'
                                        
                                        </td>
                                        <td style="width:300px;text-align:right;vertical-align:top">
                                            Invoice # :'.$invoice[0]['InvoiceNo'].'<br>
                                            Date:'.$invoice[0]['TxnDate'].'<br>
                                        </td>
                                    </tr>
                                </table>
                                 <br><br>
                             <table style="width:100%;font-family:arial;font-size:12px" cellspacing="0" cellpadding="5">
                                <tr>
                                    <td style="padding:5px;border-top:1px solid #ccc;border-bottom:1px solid #ccc;width:30px;;font-weight:bold;">SL</td>
                                    <td style="padding:5px;border-top:1px solid #ccc;border-bottom:1px solid #ccc;;font-weight:bold;">Particulars</td>
                                    <td style="padding:5px;border-top:1px solid #ccc;border-bottom:1px solid #ccc;width:50px;text-align:right;;font-weight:bold;">Qty</td>
                                    <td style="padding:5px;border-top:1px solid #ccc;border-bottom:1px solid #ccc;width:100px;text-align:right;;font-weight:bold;">Amount</td>
                                </tr>
                                <tr>
                                    <td style="padding-top:3px;padding-bottom:3px;padding-left:5px;text-align:right">1.</td>
                                    <td style="padding-top:3px;padding-bottom:3px;padding-left:5px;">'.$invoice[0]['Particulars'].'</td>
                                    <td style="padding-top:3px;padding-bottom:3px;text-align:right;padding-right:5px;">'.number_format($invoice[0]['InvoiceAmount'],2).'</td>
                                    <td style="padding-top:3px;padding-bottom:3px;text-align:right;padding-right:5px;">'.number_format($invoice[0]['InvoiceAmount'],2).'</td>
                                </tr>
                                <tr>
                                    <td style="padding-top:5px;padding-bottom:5px;border-top:1px solid #ccc;border-bottom:1px solid #ccc;padding-left:5px;text-align:right"></td>
                                    <td style="padding-top:5px;padding-bottom:5px;border-top:1px solid #ccc;border-bottom:1px solid #ccc;text-align:right;padding-right:5px;font-weight:bold;" colspan="2">Payable Amount</td>
                                    <td style="padding-top:5px;padding-bottom:5px;border-top:1px solid #ccc;border-bottom:1px solid #ccc;text-align:right;padding-right:5px;font-weight:bold;">'.number_format($invoice[0]['InvoiceAmount'],2).'</td>
                                </tr> 
                             </table>
              </div>';
              return $return;
        }
     }
      class Points {
          function getAvailablePoints($MemberID)  {
              global $mysql;
              $bal  = $mysql->select("select sum(EarnPoint) as bal from _tbl_Member_Points where MemberID='".$MemberID."'");
              return (isset($bal[0]['bal'])) ? $bal[0]['bal'] : 0;
          }
          
      }
     class Receipt {
          function getReceipt($receiptID) {
            global $mysql;
           
                $receipt = $mysql->select("select * from _tbl_Accounts_Receipts where ReceiptNo='".$receiptID."'");
                
            
            
              $return = '<div style="width:650px;margin:0px auto;font-family:arial;font-size:12px">
                                <table style="width:100%;font-family:arial;font-size:12px">
                                    <tr>
                                        <td><img src="http://goodgrowth.in/images/logo.png"></td>
                                        <td style="width:300px;text-align:right">
                                            5/3, Kamalam Annamalai Complex,<br>
                                            Mudangiyar Road,<br>
                                            Rajapalayam - 626117.<br>
                                            Ph: +91-9751157370, 8870832788<br>
                                            Mail: goodgrowth@gmail.com.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="text-align:center;padding:20px;font-size:18px;font-weight:bold">Receipt</td>
                                    </tr>
                                    <tr>
                                        <td> '.ucwords(strtolower($receipt[0]['MemberName'])).'<br>'.
                                            nl2br(ucwords(strtolower($receipt[0]['MemberAddress']))).'<br>'.
                                            ucwords(strtolower($receipt[0]['CityName'])).'<br>'.
                                            ucwords(strtolower($receipt[0]['DistrictName'])).'<br>'.
                                            ucwords(strtolower($receipt[0]['StateName'])).' - '.$invoice[0]['PinCode'].'<br>
                                            Mobile No: '.$receipt[0]['MemberMobileNumber'].'<bR>
                                            Mail: '.$receipt[0]['MemberEmailID'].'
                                        
                                        </td>
                                        <td style="width:300px;text-align:right;vertical-align:top">
                                            Receipt # :'.$receipt[0]['ReceiptNo'].'<br>
                                            Date:'.$receipt[0]['TxnDate'].'<br>
                                        </td>
                                    </tr>
                                </table>
                                 <br><br>
                             <table style="width:100%;font-family:arial;font-size:12px" cellspacing="0" cellpadding="5">
                                <tr>
                                    <td style="padding:5px;border-top:1px solid #ccc;border-bottom:1px solid #ccc;width:30px;;font-weight:bold;">SL</td>
                                    <td style="padding:5px;border-top:1px solid #ccc;border-bottom:1px solid #ccc;;font-weight:bold;">Particulars</td>
                                    <td style="padding:5px;border-top:1px solid #ccc;border-bottom:1px solid #ccc;width:100px;text-align:right;;font-weight:bold;">Amount</td>
                                </tr>
                                <tr>
                                    <td style="padding-top:3px;padding-bottom:3px;padding-left:5px;text-align:right">1.</td>
                                    <td style="padding-top:3px;padding-bottom:3px;padding-left:5px;">'.$receipt[0]['Particulars'].'</td>
                                    <td style="padding-top:3px;padding-bottom:3px;text-align:right;padding-right:5px;">'.number_format($receipt[0]['ReceiptAmount'],2).'</td>
                                </tr>
                                <tr>
                                    <td style="padding-top:5px;padding-bottom:5px;border-top:1px solid #ccc;border-bottom:1px solid #ccc;padding-left:5px;text-align:right;font-weight:bold;"> </td>
                                    <td style="padding-top:5px;padding-bottom:5px;border-top:1px solid #ccc;border-bottom:1px solid #ccc;padding-left:5px;text-align:right;font-weight:bold;">Received Amount</td>
                                    <td style="padding-top:5px;padding-bottom:5px;border-top:1px solid #ccc;border-bottom:1px solid #ccc;text-align:right;padding-right:5px;font-weight:bold;">'.number_format($receipt[0]['ReceiptAmount'],2).'</td>
                                </tr> 
                             </table>
              </div>';
              return $return;
        }
     }
     
    
     class MobileSMS {
        
        function sendSMS($mobileNumber,$text,$memberID="") {
            global $mysql,$userData;
            if (strlen($memberID)>0) {
                  $member = $mysql->select("select * from _tbl_Members where MemberID'".$memberID."'");
            }   else {
               $member = $mysql->select("select * from _tbl_Members where MemberID'".$userData['MemberID']."'"); 
            }
            
            $id=$mysql->insert("_tbl_Log_MobileSMS",array("MemberID"=>$member[0]['MemberID'],
                                                          "MemberCode"=>$member[0]['MemberCode'],
                                                          "SmsTo"=>$mobileNumber,
                                                          "Message"=>$text,
                                                          "MessagedOn"=>date("Y-m-d H:i:s")));
                                                          
            $url = "http://www.j2jsoftwaresolutions.com/sms.php?Key=GOODGW&Text=".base64_encode($text)."&MobileNumber=".$mobileNumber;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
        }
    }
    
    class Log {
        function MailLog($param) {
            
     global $mysql;
$mysql->insert("_tbl_Log_Emails",array("MemberID"=>$param['MemberID'],
                                        "MemberCode"=>$param['MemberCode'],
                                        "MailTo"=>$param['MailTo'],
                                        "Message"=>$param['Message'],
                                        "MessagedOn"=>date("Y-m-d H:i:s"),
                                        "Mailed"=>$param['Mailed'],
                                        "ErrorMsg"=>$param['ErrorMsg'],
                                        "Category"=>$param['Category']));
             
        }
    }
    $mysql = new MySql("localhost","goodgrow_user","goodgrow_","goodgrow_masterdb");
    if (isset($_SESSION['UserData']) && $_SESSION['UserData']['MemberID']>0) {
        $userData = $_SESSION['UserData'];
    }
     function putDate($date) {
        return date("M d, Y",strtotime($date));
    }
    
    function putDateTime($date) {
        return date("M d, Y H:i",strtotime($date));
    }
    $Config['DOB_YEAR_START'] = date("Y")-80;
    $Config['DOB_YEAR_END']   = date("Y")-18;
    
    if (isset($_POST['AddCart'])) {
         if (sizeof($_SESSION['items'])<=10) {
             $e=0; 
             foreach($_SESSION['items'] as $item) {
                 if ($item['PName']==$_POST['ProName']) {
                     $e++;
                 }
             }
            if ($e==0)  {
                $_SESSION['items'][]=array("PName"=>$_POST['ProName'],"PQty"=>1,"Price"=>$_POST['ProPrice']);    
                echo "<script>setTimeout('$(\"#myModal\").modal()',1500);</script>";
            } else {
                echo "<script>setTimeout('$(\"#myModal2\").modal()',1500);</script>";
            }
             
         } else {
             echo "<script>setTimeout('$(\"#myModal\").modal()',1500);</script>";
         }
        
    }
    
    if (isset($_POST['BuyNow'])) {
      if (sizeof($_SESSION['items'])<=10) {
            $_SESSION['items'][]=array("PName"=>$_POST['ProName'],"PQty"=>1,"Price"=>$_POST['ProPrice']);
         }
        echo "<script>location.href='order.php';</script>";   
    }
    
    if (isset($_POST['emptyCart'])) {
        unset($_SESSION['items']);
        $_SESSION['items']=array();
    }
    
     
?>