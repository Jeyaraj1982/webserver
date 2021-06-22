<?php 
include_once("config.php");

function getIFSCode() {
    //tlO260h88nC24pU651g5d5yxn
    //https://ifsc.firstatom.org/key/tlO260h88nC24pU651g5d5yxn/ifsc/{ifsc_code}
     
     
     $ch = curl_init();  
 
    curl_setopt($ch,CURLOPT_URL,"https://api.techm.co.in/api/v1/ifsc/".$_GET['IFSCode']);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_HEADER, false); 
    $output=curl_exec($ch);
    curl_close($ch);
    
    global $mysql;
     
         $mysql->insert("_tbl_ifsc_log",array("UserID"     => $_SESSION['User']['MemberID'],
                                              "IFSCode"    => $_GET['IFSCode'],
                                              "OutPut"     => $output,
                                              "TxnOn"      =>date("Y-m-d H:i:s")));
     
    return $output;
    
}

 function getTNEBDetails() {
    //https://paytm.com/papi/digitalrecharge/v1/expressrecharge/verify?channel=web&version=2&child_site_id=1&site_id=1&locale=en-in&client=WEB
    //{"cart_items":[{"product_id":205364123,"qty":1,"configuration":{"price":10,"recharge_number":"07134389383"},"meta_data":{"state":"Tamil Nadu","board":"Tamil Nadu Electricity Board (TNEB)","district":"N/A","sub_district":"N/A","sub_division":"N/A","productLength":1,"protection_url":"https://paytm.com/protection/v2/public/attachment/policies?categoryId=26","newVerify":true}}]}
    //{"cart_items":{"product_id":"205364123","qty":"1","configuration":{"price":"10","recharge_number":"07134389383"},"meta_data":{"state":"Tamil Nadu","board":"Tamil Nadu Electricity Board (TNEB)","district":"N\/A","sub_district":"N\/A","productLength":"1","newVerify":"true","protection_url":"https:\/\/paytm.com\/protection\/v2\/public\/attachment\/policies?categoryId=26"}}} 
    /* return json_encode(array("cart_items"=>array("product_id"=>"205364123",
                          "qty"=>"1",
                          "configuration"=>array("price"=>"10",
                                                 "recharge_number"=>"07134389383"
                          
                          ),
                          "meta_data"=>array("state"=>"Tamil Nadu",
                          "board"=>"Tamil Nadu Electricity Board (TNEB)",
                          "district"=>"N/A",
                          "sub_district"=>"N/A",
                          "productLength"=>"1",
                          "newVerify"=>"true",
                          "protection_url"=>"https://paytm.com/protection/v2/public/attachment/policies?categoryId=26",
                          )
))); */

$payload = json_encode(array("cart_items"=>array(
                                array("product_id"=>"205364123",
                                      "qty"=>"1",
                                      "configuration"=>array("price"=>"10",
                                                 "recharge_number"=>"0".$_POST['region'].$_POST['MobileNumber']),
                                      "meta_data"=>array("state"=>"Tamil Nadu",
                                                          "board"=>"Tamil Nadu Electricity Board (TNEB)",
                                                          "district"=>"N/A",
                                                          "sub_district"=>"N/A",
                                                          "productLength"=>"1",
                                                          "newVerify"=>true,
                                                          "protection_url"=>"https://paytm.com/protection/v2/public/attachment/policies?categoryId=26",
                                      )))));
    
    $ch = curl_init('https://paytm.com/papi/digitalrecharge/v1/expressrecharge/verify?channel=web&version=2&child_site_id=1&site_id=1&locale=en-in&client=WEB');                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
//curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );                                                                
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json'                                                                                 
  
));                                                                                                                   
                                                                                                                     
$result = curl_exec($ch);                          
$result = json_decode($result,true);
$nresult = $result['cart']['cart_items'][0]['service_options']['actions'][0];
if (isset($result['cart']['error']) && strlen($result['cart']['error'])>20) {
  $tmp = array("error"=>"1",
"errMsg"=>$result['cart']['error']);  
} else {
$tmp = array("billAmount"=>$nresult['billAmount'],
"billerName"=>$nresult['displayValues'][0]['value'],
"billDate"=>$nresult['displayValues'][2]['value'],
"dueDate"=>$nresult['displayValues'][1]['value'],
"error"=>"0"
);    
}
 global $mysql;
     
         $mysql->insert("_tbl_tneb_log",array("UserID"     => $_SESSION['User']['MemberID'],
                                              "TNEBNumber"    => json_encode("0".$_POST['region'].$_POST['MobileNumber']),
                                              "OutPut"     => json_encode($tmp),
                                              "TxnOn"      =>date("Y-m-d H:i:s")));

//['cart_items'][0]['service_options'][0]
return json_encode($tmp);
//{"actions":[{"billAmount":575,"billDueDate":null,"bill_amount_max":575,"bill_amount_min":575,"billamount_editable":false,"caNumber":null,"course":null,"customerBalance":null,"customerEmail":null,"customerName":null,"customer_bill_download":false,"displayValues":[{"label":"Name","value":"SIVANTHIKANI"},{"label":"Due Date","value":"2020-07-10"},{"label":"Bill Date","value":"2020-06-22"},{"label":"Bill Period","value":"Monthly"}],"dob":null,"fatherName":null,"inputNumberType":null,"label":"customerInfo","operatorName":null,"payment_options":[],"section":null,"selfRecharge":false,"studentClass":null,"year":null}]} 
    $number = $_POST['MobileNumber'];
    
//$data = httpPost("http://tneb.tnebnet.org/newlt/lt_cmbt/consumerwise_gmc_report.php?rsno=7",array("sec"=>134,"dist"=>389,"serno"=>383));
$data = httpPost("http://tneb.tnebnet.org/newlt/lt_cmbt/consumerwise_gmc_report.php?rsno=".$_POST['region'],array("sec"=>substr($number,0,3),"dist"=>substr($number,3,3),"serno"=>substr($number,6,strlen($number)-6)));
$consur_name = explode("CONSUMER NAME</span>:",$data);
$consur_name = explode("</td>",$consur_name[1]);
//echo $consur_name[0];

//echo $data;
$tbl = explode("Monthly Consumption Charge Collection Details</b></font></td>",$data);
$tbl = explode('<tr><td align="center" class="style17"><font face=arial size=3><b>Miscellaneous Collection Details</b></font></td>',$tbl[1]);
//echo $tbl[0];
//
// 
//<Br>
//<p>
$d = str_replace("</tr></table><br />","",$tbl[0]);
$d = str_replace("<br>","",$d);
$d = str_replace("<br />","",$d);
$d = str_replace("<p>","",$d);
$d = str_replace("<center><h2>Connection Failed!</h2></center>","",$d);
$d = trim($d);

//echo $d;
$arr = explode("\n", $d);

//var_dump($arr);
$n_array=array();
for($i=sizeof($arr)-25;$i<=sizeof($arr);$i++) {
    //echo "<br>".$arr[$i];
    if (strlen(trim($arr[$i]))>0) {
        $res = str_replace("<td   align=center><font color='black'  face='arial'  size='2'>","",$arr[$i]);
        $res = str_replace("<td   align=left><font color='black'  face='arial'  size='2'>","",$res);
        $res = str_replace("<td   align=right><font color='black'  face='arial'  size='2'>","",$res);
        
        $n_array[]=trim(str_replace("&nbsp;","",strip_tags(trim($arr[$i]))));
    }
    
}
   
$result['name']=$consur_name[0];
$result['x']=array("sec"=>substr($number,0,3),"dist"=>substr($number,3,3),"serno"=>substr($number,6,strlen($number)-6));

if (strlen(trim($n_array[11]))==0) {
   $result["payable_amt"]=trim($n_array[5]); 
   $result["due_date"]=trim($n_array[6]); 
} else {
    $result["paid_amt"]=trim($n_array[11]);     
    $result["billed_amt"]=trim($n_array[12]);     
    $result["bill_on"]=trim($n_array[13]);     
}
return json_encode($result);
}

function PayEBBill() {
    global $mysql,$app;
    $number = "0".$_POST['region']."-".$_POST['MobileNumber'];
    $_OPERATOR = "ET";
    $data = $mysql->select("select * from _tbl_operators where OperatorCode='".$_OPERATOR."'");
    $result = $app->doBillPay(array("MemberID"             => $_SESSION['User']['MemberID'],
                                    "operator"             => $data[0]['OperatorCode'],
                                    "CustomerMobileNumber" => $_POST['CustomerMobileNumber'],
                                    "particulars"          => $data[0]['OperatorType']."/TNEB/".$number."/".(isset($_POST['whatsappRequired']) && ($_POST['whatsappRequired']=="on")) ? "Wapp" : "",
                                    "number"               => $number,
                                    "whatsappRequired"     => (isset($_POST['whatsappRequired']) && ($_POST['whatsappRequired']=="on")) ? "1" : "0",         
                                    "markascredit"         => $_POST['markascredit'],         
                                    "credit_nickname"      => $_POST['credit_nickname'],
                                    "CrAmount"             => $_POST['CrAmount'],
                                    "amount"               => $_POST['Amount']));
     
     return json_encode($result);                          
   
}
function doMoneyTransfer() {
    
    global $mysql,$app;
    $_OPERATOR = "MTB";
    $data = $mysql->select("select * from _tbl_operators where OperatorCode='".$_OPERATOR."'");
    $result = $app->doMoneyTransfer(array("MemberID"            => $_SESSION['User']['MemberID'],
                                         "operator"             => $data[0]['OperatorCode'],
                                         "number"               => $_POST['MobileNumber'],
                                         "CustomerMobileNumber" => $_POST['CustomerMobileNumber'],
                                         "Remarks"              => $_POST['Remarks'],
                                         "AccountName"          => $_POST['AccountName'],
                                         "markascredit"         => $_POST['markascredit'],
                                         "credit_nickname"      => $_POST['credit_nickname'],
                                         "IFSCode"              => $_POST['IFSCode'],
                                         "CrAmount"             => $_POST['CrAmount'],
                                         "amount"               => $_POST['Amount']));
    return json_encode($result);
}

function doupdate() {
    global $mysql;
    $mysql->insert("_tbl_news_log",array("MemberID"=>$_SESSION['User']['MemberID'],
                                         "NewsID"=>$_GET['N'],
                                         "ViewedOn"=>date("Y-m-d H:i:s")));
    return "done";
}

function doRecharge() {
    
    global $mysql,$app;
    //$temp_sql= $mysql->select("select * from `_tbl_operators` where APIID='0' and OperatorCode='".$_POST['optr']."'");
    if (isset($_POST['optr'])) {
        $param = array("number"   => $_POST['MobileNumber'],
                       "amount"   => $_POST['RechargeAmt'],
                       "MemberID" => $_SESSION['User']['MemberID'],
                       "operator" => $_POST['optr']);
        return json_encode($app->doRecharge($param));
    } else {
        $result = array();
        $result['status']="failure";
        $result['message']="Operator currently unavailable. please try later.";  
        return json_encode($result);
    }
    
}
function MoveOtherDealer(){
   global $mysql,$app;
   $mem = $mysql->select("select * from _tbl_Members where MemberID='".$_POST['OtherDealer']."'");
   $id = $mysql->execute("update `_tbl_Members` set `MapedTo`    ='".$_POST['OtherDealer']."',
                                                    `MapedToName`='".$mem[0]['MemberName']."' where `MemberID`='".$_POST['MemberID']."'");
    $result = array();
    $result['status']="Success";
    $result['message']="Retailer Moved.";  
    return json_encode($result);
}


function recentMobileRecharges() {
    global $mysql;
    ?>
    <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Txn ID</th>
                                            <th>Txn Date</th>
                                            <th>Number</th>                                                                                           
                                            <th>Operator</th>                                                                                           
                                            <th>Amount</th>                                                                                           
                                            <th>Status</th>                                                                                           
                                            <th>Operator ID</th>                                                                                           
                                        </tr>
                                    </thead>                                                                         
                                    <tbody>
                                    <?php 
                                    $operatorName = array("RA"=>"Airtel","RB"=>"BSNL","RJ"=>"JIO","RV"=>"Vodafone","RI"=>"IDEA");
                                    $txn = $mysql->select("select * from _tbl_transactions where operatorcode in ('RA','RB','RJ','RV','RI') and MemberID='".$_SESSION['User']['MemberID']."' order by txnid desc limit 0,10");
                                     foreach($txn as $t){ ?>
                                        <tr>
                                            <td><?php echo $t['txnid'];?></td>
                                            <td><?php echo $t['txndate'];?></td>
                                            <td><?php echo $t['rcnumber'];?></td>
                                            <td><?php echo $operatorName[$t['operatorcode']];?></td>
                                            <td style="text-align: right"><?php echo  number_format($t['rcamount'],2);?></td>
                                           <td><?php 
                                            if ($t['TxnStatus']=="failure") {
                                                echo "<span style='background:red;color:#fff;padding:3px 10px;border-radius:5px' title='".$t['msg']."'>Failure</span>";
                                            } elseif ($t['TxnStatus']=="success") {
                                                echo "<span style='background:green;color:#fff;padding:3px 10px;border-radius:5px'>Success</span>";
                                           
                                            } elseif ($t['TxnStatus']=="reversed") {
                                                echo "<span style='background:pink;color:#fff;padding:3px 10px;border-radius:5px'>Reversed</span><br><span style='font-size:11px;'>".$t['ReversedOn']."</span>";
                                            
                                            } else {
                                               echo "<span style='background:Orange;color:#fff;padding:3px 10px;border-radius:5px'>Pending</span>"; 
                                            }
                                              ?></td>
                                           <td style="text-align: right"><?php echo strlen($t['OperatorNumber'])>3 ? $t['OperatorNumber'] : "";?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
    <?php
}

function recentDTHRecharges() {
    global $mysql;
    ?>
    <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Txn ID</th>
                                            <th>Txn Date</th>
                                            <th>Number</th>                                                                                           
                                            <th>Operator</th>                                                                                           
                                            <th>Amount</th>                                                                                           
                                            <th>Status</th>                                                                                           
                                            <th>Operator ID</th>                                                                                           
                                        </tr>
                                    </thead>                                                                         
                                    <tbody>
                                    <?php 
                                    $operatorName = array("DD"=>"Dish TV","DA"=>"Airtel Digital Tv","DT"=>"Tatasky","DS"=>"Sun Direct","DV"=>"Videocon d2h","DB"=>"Big Tv");
                                    $txn = $mysql->select("select * from _tbl_transactions where operatorcode in ('DA','DS','DV','DB','DT','DD') and MemberID='".$_SESSION['User']['MemberID']."' order by txnid desc limit 0,10");
                                     foreach($txn as $t){ ?>
                                        <tr>
                                            <td><?php echo $t['txnid'];?></td>
                                            <td><?php echo $t['txndate'];?></td>
                                            <td><?php echo $t['rcnumber'];?></td>
                                            <td><?php echo $operatorName[$t['operatorcode']];?></td>
                                            <td style="text-align: right"><?php echo  number_format($t['rcamount'],2);?></td>
                                           <td><?php 
                                            if ($t['TxnStatus']=="failure") {
                                                echo "<span style='background:red;color:#fff;padding:3px 10px;border-radius:5px' title='".$t['msg']."'>Failure</span>";
                                            } elseif ($t['TxnStatus']=="success") {
                                                echo "<span style='background:green;color:#fff;padding:3px 10px;border-radius:5px'>Success</span>";
                                                } elseif ($t['TxnStatus']=="reversed") {
                                                echo "<span style='background:pink;color:#fff;padding:3px 10px;border-radius:5px'>Reversed</span><br><span style='font-size:11px;'>".$t['ReversedOn']."</span>";
                                            
                                            } else {
                                               echo "<span style='background:Orange;color:#fff;padding:3px 10px;border-radius:5px'>Pending</span>"; 
                                            }
                                              ?></td>
                                           <td style="text-align: right"><?php echo strlen($t['OperatorNumber'])>3 ? $t['OperatorNumber'] : "";?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
    <?php
}






function get_mobile_operator($mobile_number) {
    
    $url = "https://digitalapiproxy.paytm.com/v1/mobile/getopcirclebyrange?channel=web&version=2&number=".$mobile_number."&child_site_id=1&site_id=1&locale=en-in";
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $url,
    ]);
    $resp =json_decode(curl_exec($curl),true); 
    curl_close($curl);
    //{"Operator":"Airtel","Circle":"Tamil Nadu","product_id":221,"status":true,"postpaid":false,"source":"prefix"} 
    $res[]=$resp;
   // $url = "https://digitalcatalog.paytm.com/dcat/v1/browseplans/mobile/7166?channel=web&version=2&child_site_id=1&site_id=1&locale=en-in&operator=".$resp['Operator']."&pageCount=1&itemsPerPage=20&sort_price=asce&pagination=1&circle=".urlencode($resp['Circle']);
   // $curl = curl_init();
   // curl_setopt_array($curl, [
      //  CURLOPT_RETURNTRANSFER => 1,
      //  CURLOPT_URL => $url
   // ]);
//$resp2 =json_decode(curl_exec($curl),true); 
  //  curl_close($curl);
  //  $res[]=$resp2;  
    return $res;
}

function get_mobile_operator_plan($Operator,$Region) {
  //  
    $url = "https://digitalcatalog.paytm.com/dcat/v1/browseplans/mobile/7166?channel=web&version=2&child_site_id=1&site_id=1&locale=en-in&operator=".$Operator."&pageCount=1&itemsPerPage=20&sort_price=asce&pagination=1&circle=".urlencode($Region);
$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $url
]);
$resp = json_decode(curl_exec($curl),true); 
curl_close($curl);
return $resp;
}

function get_mobile_operator_roffer($Operator,$mobileNumber) {
   
    $url = "http://planapi.in/api/Mobile/RofferCheck?apimember_id=3476&api_password=02021982&mobile_no=".$mobileNumber."&operator_code=".$Operator;
$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $url
]);
$resp = json_decode(curl_exec($curl),true); 
curl_close($curl);
return $resp;
}

function get_mobile_operator_planapi($mobileNumber) {
    $url = "http://planapi.in/api/Mobile/OperatorFetch?apimember_id=3476&api_password=02021982&Mobileno=".$mobileNumber;
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $url
]);
$resp = json_decode(curl_exec($curl),true); 
curl_close($curl);
return $resp;
}

function get_dth_plan($operator) {
    $url = "https://digitalcatalog.paytm.com/dcat/v1/browseplans/dth/7167?channel=web&version=2&child_site_id=1&site_id=1&locale=en-in&operator=".urlencode($operator)."&pageCount=1&itemsPerPage=50&sort_price=asce&pagination=1";
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $url
]);
$resp = json_decode(curl_exec($curl),true); 
curl_close($curl);
return $resp;
}

 function WalletRequest() {
    global $mysql,$app;
    
    $result = array();
    $duplicate_reference = $mysql->select("select * from _tbl_wallet_request where Remarks='".trim($_POST['Remarks']."'"));
    
    if (sizeof($duplicate_reference)>0) {
        $result['status']="failure";
        $result['message']="Transaction id already exits."; 
        sleep(10);
        return json_encode($result);
    }
    $current_date = strtotime(date("Y-m-d"));
    $request_date = strtotime($_POST['TxnDate']);
    if (!($request_date<=$current_date)) {
        $result['status']="failure";
        $result['message']="Payment Date is post date."; 
        sleep(10);
        return json_encode($result);
    }
   
    $id = $mysql->insert("_tbl_wallet_request",array("MemberID"       => $_SESSION['User']['MemberID'],
                                                     "TransferTo"     => "1",
                                                     "Amount"         =>$_POST['Amount'],
                                                     "TransferMode"   =>$_POST['Mode'],
                                                     "TxnDate"        =>$_POST['TxnDate'],
                                                     "Remarks"        =>trim($_POST['Remarks'])));
                                                     
    $mem = $mysql->select("select * from _tbl_members where MemberID='".$_SESSION['User']['MemberID']."'");
    if(sizeof($id)>0){
        $result = array();
        $result['status']="Success";
        $result['message']="Wallet Request Sent."; 
       if($mem[0]['IsDealer']==1){
        $message = "Dear Dealer, Your account wallet request has been sent";   
       }if($mem[0]['IsMember']==1){ 
           $message = "Dear Retailer, Your account wallet request has been sent";
       }
        
         // MobileSMS::sendSMS($mem[0]['MobileNumber'],$message,$id);  
         // $mparam['MailTo']=$mem[0]['EmailID'];
         /// $mparam['MemberID']=$id;
         // $mparam['Subject']="Wallet Request Sent";
         // $mparam['Message']=$message;
         // MailController::Send($mparam,$mailError);
         
        
    } else {
       $result = array();
        $result['status']="failure";
        $result['message']="Wallet Request Sent failed.";  
        
    }
     sleep(20);
    return json_encode($result);
}

 function ApproveMemberWalletRequest() {
    
    global $mysql,$app,$application;
    $balance = $application->getBalance($_POST['MemberID']);
      $id = $mysql->insert("_tbl_accounts",array("MemberID"     => $_POST['MemberID'],
                                                 "TxnDate"      =>date("Y-m-d H:i:s"),
                                                 "Particulars"  => "Wallet Refill Request",
                                                 "TxnValue"     => $_POST['Amount'],
                                                 "Credit"       => $_POST['Amount'],
                                                 "Debit"        => "0",
                                                 "CreditFrom"    => $_SESSION['User']['MemberID'],     
                                                 "Balance"      => $balance));
             $mysql->execute("update _tbl_wallet_request set Status='1', ApprovedOn='".date("Y-m-d H:i:s")."' where RequestID='".$_POST['RequestID']."'");
             $mem = $mysql->select("select * from _tbl_Members where MemberID='".$_POST['MemberID']."'");
      if(sizeof($id)>0){
          if($mem[0]['IsDealer']==1){
            $message = "Dear Dealer, Your wallet request has been approved. Your wallet has credited Rs. ".$_POST['Amount']."  Wallet Balance Rs.".number_format($app->getBalance($_POST['MemberID']),2);
          }
          if($mem[0]['IsMember']==1){
            $message = "Dear Retailer, Your wallet request has been approved. Your wallet has credited Rs. ".$_POST['Amount']."  Wallet Balance Rs.".number_format($app->getBalance($_POST['MemberID']),2);
          }
                          MobileSMS::sendSMS($mem[0]['MobileNumber'],$message,$id);  
                          $mparam['MailTo']=$mem[0]['EmailID'];
                          $mparam['MemberID']=$mem[0]['MemberID'];
                          $mparam['Subject']="Wallet Request Approved";
                          $mparam['Message']=$message;
                          MailController::Send($mparam,$mailError);
          
          
        $result = array();
        $result['status']="Success";
        $result['message']="Approved.";  
        return json_encode($result);
    } else {
        $result = array();
        $result['status']="failure";
        $result['message']="Operator currently unavailable. please try later.";  
        return json_encode($result);
    }
    
} 
function RejectMemberWalletRequest() {
    
    global $mysql,$app;
   
      $id=$mysql->execute("update _tbl_wallet_request set Status='2', RejectedOn='".date("Y-m-d H:i:s")."' where RequestID='".$_POST['RequestID']."'");
      $mem = $mysql->select("select * from _tbl_Members where MemberID='".$_POST['MemberID']."'");
      if(sizeof($id)>0){
        
        if($mem[0]['IsDealer']==1){
            $message = "Dear Dealer, Your wallet request has been rejected";
          }
          if($mem[0]['IsMember']==1){
            $message = "Dear Retailer, Your wallet request has been rejected";
          }
                          MobileSMS::sendSMS($mem[0]['MobileNumber'],$message,$id);  
                          $mparam['MailTo']=$mem[0]['EmailID'];
                          $mparam['MemberID']=$mem[0]['MemberID'];
                          $mparam['Subject']="Wallet Request Rejected";
                          $mparam['Message']=$message;
                          MailController::Send($mparam,$mailError);
          
            
          
        $result = array();
        $result['status']="Success";
        $result['message']="Rejected.";  
        return json_encode($result);
    } else {
        $result = array();
        $result['status']="failure";
        $result['message']="Operator currently unavailable. please try later.";  
        return json_encode($result);
    }
    
}
function savemycontact() {
    
    global $mysql,$app;
    
    if (!(strlen(trim($_POST['ContactName']))>0)) {
        $result = array();
        $result['status']="failure";
        $result['message']="Please Enter Contact Name";  
        return json_encode($result);
    }
    if (!(strlen(trim($_POST['MobileNumber']))>0)) {
        $result = array();
        $result['status']="failure";
        $result['message']="Please Enter Mobile Number";  
        return json_encode($result);
    }
    $data = $mysql->select("select * from `_tbl_my_contact` where  `ContactName`='".$_POST['ContactName']."' and MemberID='".$_SESSION['User']['MemberID']."'");
    if (sizeof($data)>0) {
        $result = array();
        $result['status']="failure";
        $result['message']="Name Already Exist";  
        return json_encode($result);
    }
    $data = $mysql->select("select * from `_tbl_my_contact` where  `MobileNumber`='".$_POST['MobileNumber']."' and MemberID='".$_SESSION['User']['MemberID']."'");
    if (sizeof($data)>0) {
        $result = array();
        $result['status']="failure";
        $result['message']="Mobile Number Already Exist";  
        return json_encode($result);
    }
    if (strlen(trim($_POST['DTHNumber']))>0) {
        $data = $mysql->select("select * from `_tbl_my_contact` where  `DTHNumber`='".$_POST['DTHNumber']."' and MemberID='".$_SESSION['User']['MemberID']."'");
        if (sizeof($data)>0) {
            $result = array();
            $result['status']="failure";
            $result['message']="DTH Number Already exist";  
            return json_encode($result);      
        }
    }
    if (strlen(trim($_POST['TNEBNumber']))>0) {
        $data = $mysql->select("select * from `_tbl_my_contact` where  `TNEBNumber`='".$_POST['TNEBNumber']."' and MemberID='".$_SESSION['User']['MemberID']."'");
        if (sizeof($data)>0) {
            $result = array();
            $result['status']="failure";
            $result['message']="TNEB Number Already exist";  
            return json_encode($result);      
        }
    }
   
      $id=$mysql->insert("_tbl_my_contact",array("MemberID"       => $_SESSION['User']['MemberID'],
                                                 "CreatedOn"      => date("Y-m-d H:i:s"),
                                                 "ContactName"    => $_POST['ContactName'],
                                                 "MobileNumber"   => $_POST['MobileNumber'],
                                                 "MobileOperator" => $_POST['Operator'],
                                                 "DTHNumber"      => $_POST['DTHNumber'],
                                                 "DTHOperator"    => $_POST['DTHOperator'],
                                                 "TNEBRegion"     => $_POST['region'],
                                                 "TNEBNumber"     => $_POST['TNEBNumber'])); 
      if(sizeof($id)>0){
        $result = array();
        $result['status']="Success";
        $result['message']="Contact saved successfully.";  
        return json_encode($result);
    } else {
        $result = array();
        $result['status']="failure";
        $result['message']="Operator currently unavailable. please try later.";  
        return json_encode($result);
    }
    
}

function savemycontact_dth() {
    
    global $mysql,$app;
    
    if (!(strlen(trim($_POST['ContactName']))>0)) {
        $result = array();
        $result['status']="failure";
        $result['message']="Please Enter Contact Name";  
        return json_encode($result);
    }
   
    $data = $mysql->select("select * from `_tbl_my_contact` where  `ContactName`='".$_POST['ContactName']."' and MemberID='".$_SESSION['User']['MemberID']."'");
    if (sizeof($data)>0) {
        $result = array();
        $result['status']="failure";
        $result['message']="Name Already Exist";  
        return json_encode($result);
    }
    
    if (strlen(trim($_POST['DTHNumber']))>0) {
        $data = $mysql->select("select * from `_tbl_my_contact` where  `DTHNumber`='".$_POST['DTHNumber']."' and MemberID='".$_SESSION['User']['MemberID']."'");
        if (sizeof($data)>0) {
            $result = array();
            $result['status']="failure";
            $result['message']="DTH Number Already exist";  
            return json_encode($result);      
        }
    }
   
      $id=$mysql->insert("_tbl_my_contact",array("MemberID"       => $_SESSION['User']['MemberID'],
                                                 "CreatedOn"      => date("Y-m-d H:i:s"),
                                                 "ContactName"    => $_POST['ContactName'],
                                                 "DTHNumber"      => $_POST['DTHNumber'],
                                                 "DTHOperator"    => $_POST['DTHOperator'])); 
      if(sizeof($id)>0){
        $result = array();
        $result['status']="Success";
        $result['message']="Contact saved successfully.";  
        return json_encode($result);
    } else {
        $result = array();
        $result['status']="failure";
        $result['message']="Operator currently unavailable. please try later.";  
        return json_encode($result);
    }
    
}

function savemycontact_tneb() {
    
    global $mysql,$app;
    
    if (!(strlen(trim($_POST['ContactName']))>0)) {
        $result = array();
        $result['status']="failure";
        $result['message']="Please Enter Contact Name";  
        return json_encode($result);
    }
   
    if (strlen(trim($_POST['TNEBNumber']))>0) {
        $data = $mysql->select("select * from `_tbl_my_contact` where  `TNEBNumber`='".$_POST['TNEBNumber']."' and MemberID='".$_SESSION['User']['MemberID']."'");
        if (sizeof($data)>0) {
            $result = array();
            $result['status']="failure";
            $result['message']="TNEB Number Already exist";  
            return json_encode($result);      
        }
    }
   
      $id=$mysql->insert("_tbl_my_contact",array("MemberID"       => $_SESSION['User']['MemberID'],
                                                 "CreatedOn"      => date("Y-m-d H:i:s"),
                                                 "ContactName"    => $_POST['ContactName'],
                                                 "TNEBRegion"     => $_POST['region'],
                                                 "TNEBNumber"     => $_POST['TNEBNumber'])); 
      if(sizeof($id)>0){
        $result = array();
        $result['status']="Success";
        $result['message']="Contact saved successfully.";  
        return json_encode($result);
    } else {
        $result = array();
        $result['status']="failure";
        $result['message']="Operator currently unavailable. please try later.";  
        return json_encode($result);
    }
    
}

function savemybankdetails() {
    
    global $mysql,$app;
    
    if (!(strlen(trim($_POST['BankName']))>0)) {
        $result = array();
        $result['status']="failure";
        $result['message']="Please Enter Bank Name";  
        return json_encode($result);
    }
    if (!(strlen(trim($_POST['AccountName']))>0)) {
        $result = array();
        $result['status']="failure";
        $result['message']="Please Enter Account Name";  
        return json_encode($result);
    }
    if (!(strlen(trim($_POST['AccountNumber']))>0)) {
        $result = array();
        $result['status']="failure";
        $result['message']="Please Enter Account Number";  
        return json_encode($result);
    }
    if (!(strlen(trim($_POST['IFSCode']))>0)) {
        $result = array();
        $result['status']="failure";
        $result['message']="Please Enter IFS Code";  
        return json_encode($result);
    }
    $data = $mysql->select("select * from `tbl_admin_bank_details` where  `BankName`='".$_POST['BankName']."'");
    if (sizeof($data)>0) {
        $result = array();
        $result['status']="failure";
        $result['message']="Bank Name Already Exist";  
        return json_encode($result);
    }
    $data = $mysql->select("select * from `tbl_admin_bank_details` where  `AccountNumber`='".$_POST['AccountNumber']."'");
    if (sizeof($data)>0) {
        $result = array();
        $result['status']="failure";
        $result['message']="Account Number Already Exist";  
        return json_encode($result);
    }
   
      $id=$mysql->insert("tbl_admin_bank_details",array("CreatedOn"     => date("Y-m-d H:i:s"),
                                                        "BankName"      => $_POST['BankName'],
                                                        "AccountName"   => $_POST['AccountName'],
                                                        "AccountNumber" => $_POST['AccountNumber'],
                                                        "IFSCode"       => $_POST['IFSCode'],
                                                        "IsActive"      => $_POST['IsActive'])); 
      if(sizeof($id)>0){
        $result = array();
        $result['status']="Success";
        $result['message']="Contact saved successfully.";  
        return json_encode($result);
    } else {
        $result = array();
        $result['status']="failure";
        $result['message']="Operator currently unavailable. please try later.";  
        return json_encode($result);
    }
    
}

function updatemycontact() {
    
    global $mysql,$app;
    
    if (!(strlen(trim($_POST['ContactName']))>0)) {
        $result = array();
        $result['status']="failure";
        $result['message']="Please Enter Contact Name";  
        return json_encode($result);
    }
    if (!(strlen(trim($_POST['MobileNumber']))>0)) {
        $result = array();
        $result['status']="failure";
        $result['message']="Please Enter Mobile Number";  
        return json_encode($result);
    }
    $data = $mysql->select("select * from `_tbl_my_contact` where  `ContactName`='".$_POST['ContactName']."' and `ContactID`<>'".$_POST['ContactID']."' and MemberID='".$_SESSION['User']['MemberID']."'");
    if (sizeof($data)>0) {
        $result = array();
        $result['status']="failure";
        $result['message']="Name Already Exist";  
        return json_encode($result);
    }
    $data = $mysql->select("select * from `_tbl_my_contact` where  `MobileNumber`='".$_POST['MobileNumber']."' and `ContactID`<>'".$_POST['ContactID']."' and MemberID='".$_SESSION['User']['MemberID']."'");
    if (sizeof($data)>0) {
        $result = array();
        $result['status']="failure";
        $result['message']="Mobile Number Already Exist";  
        return json_encode($result);
    }
    if (strlen(trim($_POST['DTHNumber']))>0) {
        $data = $mysql->select("select * from `_tbl_my_contact` where  `DTHNumber`='".$_POST['DTHNumber']."' and `ContactID`<>'".$_POST['ContactID']."' and MemberID='".$_SESSION['User']['MemberID']."'");
        if (sizeof($data)>0) {
            $result = array();
            $result['status']="failure";
            $result['message']="DTH Number Already exist";  
            return json_encode($result);      
        }
    }
    if (strlen(trim($_POST['TNEBNumber']))>0) {
        $data = $mysql->select("select * from `_tbl_my_contact` where  `TNEBNumber`='".$_POST['TNEBNumber']."' and `ContactID`<>'".$_POST['ContactID']."' and MemberID='".$_SESSION['User']['MemberID']."'");
        if (sizeof($data)>0) {
            $result = array();
            $result['status']="failure";
            $result['message']="TNEB Number Already exist";  
            return json_encode($result);      
        }
    }
    
      $id=$mysql->execute("update _tbl_my_contact set ContactName='".$_POST['ContactName']."',
                                                      MobileNumber='".$_POST['MobileNumber']."',
                                                      MobileOperator='".$_POST['Operator']."',
                                                      DTHNumber='".$_POST['DTHNumber']."',
                                                      DTHOperator='".$_POST['DTHOperator']."',
                                                      TNEBRegion='".$_POST['region']."',
                                                      TNEBNumber='".$_POST['TNEBNumber']."'
                                                      where ContactID='".$_POST['ContactID']."'");
   
      
      if(sizeof($id)>0){
        $result = array();
        $result['status']="Success";
        $result['message']="Contact updated successfully.";  
        $result['cid']=$_POST['ContactID'];  
        return json_encode($result);
    } else {
        $result = array();
        $result['status']="failure";
        $result['message']="Updation failed. please try later.";  
        return json_encode($result);
    }
    
}


function getMobileRechargePlan() {
    $data = get_mobile_operator($_GET['number']);

$products = $data[1]['groupings'];
$optr = "";
 // print_r($data);
 //if (trim($data[0]['Operator'])=="" || $data[0]['Operator']==null) {
     //     $noptr=get_mobile_operator_planapi($_GET['number']);
     //     print_r($noptr);
    //      $data[0]['Operator']=$noptr['Operator'];
  //  }
    
  switch(strtolower($data[0]['Operator'])) {
        case   'airtel':
                    $optr="RA";
                    break;
        case   'bsnl':
                    $optr="RB";
                    break;
         case   'vodafone':
                    $optr="RV";
                    break;
         case   'jio':
                    $optr="RJ";                
                    break; 
         case   'reliance mobile':
                    $optr="RJ";                
                    break;
          case   'idea':
                    $optr="RI";
                    break;
    }
    
     global $mysql;
     
         $mysql->insert("_tbl_mobile_operator_log",array("UserID"     => $_SESSION['User']['MemberID'],
                                                         "MobileNumber"   => $_GET['number'],
                                                         "Operator"   => $data[0]['Operator'],
                                                         "Output"   => json_encode($data[0]),
                                                         "RequestFrom"        => "Web",
                                                         "Plan"        => "operator",
                                                         "LogOn"      =>date("Y-m-d H:i:s")));
   
                                                   
    ?>
   <div>
   <script>
        Region= "<?php echo $data[0]['Circle'];?>";
        $("#optr").val("<?php echo $optr;?>").change();
   </script>
     </div> 
    
    <?php
}


function GetMobileOperatorPlan() {
    
   global $mysql;
     $roffer = 0;
    switch($_GET['optr']) {
        case   'RA':
                    $optr="Airtel";
                    $roffer=2;
                    break;
                    
        case   'RB':
                    $optr="BSNL";
                    break;
         case   'RV':
                    $optr="Vodafone";
                     $roffer=23;
                    break;
         case   'RJ':
                    $optr="Jio";                
                    break;
          case   'RI':
                    $optr="Idea";
                    $roffer=6;
                    break;
          default :
            
                    echo ' <div style="margin-bottom:10px;text-align:center;padding:50px;">
         
         
                    <img src="assets/info.png"><br><br>
                    <span style="font-size:13px;color:red;">Operator currently unavailable. please try later.</span><br>
                
    </div>' ;
    exit;
                    
                    break;
                
    }
    
    $data = get_mobile_operator_plan($optr,$_GET['Region']);
    $products = $data['groupings'];
    
    $mysql->insert("_tbl_mobile_plan_log",array("UserID"        => $_SESSION['User']['MemberID'],
                                                    "SMobileNumber"  => $_GET['mobileno'],
                                                    "Operator"      => $optr,
                                                    "Output"        => json_encode($products),
                                                    "RequestFrom"        => "Web",
                                                    "Plan"        => "plan",
                                                    "LogOn"         =>date("Y-m-d H:i:s")));
    
     if ($roffer>0) {
         if ($_GET['mobileno']>6000000000 && $_GET['mobileno']<=9999999999) {
            $rdata = get_mobile_operator_roffer($roffer,$_GET['mobileno']);
            
        $mysql->insert("_tbl_mobile_plan_log",array("UserID"        => $_SESSION['User']['MemberID'],
                                                    "SMobileNumber"  => $_GET['mobileno'],
                                                    "Operator"      => $optr,
                                                    "Output"        => json_encode($rdata),
                                                    "RequestFrom"        => "Web",
                                                    "Plan"        => "roffer",
                                                    "LogOn"         =>date("Y-m-d H:i:s")));
           // print_r($rdata);
         }
         
         
     }
    //Jio
     

    ?>
   <div>
 
    <div style="margin-bottom:10px;">
        <table>
            <tr>
                <td><img src='assets/operator/<?php echo $optr;?>.png' style="width:64px"></td>
                <td style="padding-left:10px;line-height:15px;;">
                    <span style="font-size:25px"><?php echo $optr;?></span><br>
                    <span style="font-size:12px;color:#888"><?php echo $_GET['Region'];?><br></span>
                </td>
            </tr>
        </table>
    </div>
    
    <div id="accordion">
         <?php if($roffer>0 && $rdata['ERROR']==0) { ?>
            <div class="card" style="margin-bottom:5px;">
                <div style="margin-bottom:5px;">
                    <a class="card-header card-link collapsed" data-toggle="collapse" href="#collapse1_0" style="width:100%;display:inherit;padding:5px;border:1px solid #f1f1f1;border-radius:0px;background:#f9f9f9" aria-expanded="false">
                        R-Offer
                    </a>                    
                </div>
                <div id="collapse1_0" class="collapse" data-parent="#accordion" style="padding: 0px;">
                    <div class="card-body" style="padding:5px;">
                        <table style="width:100%;">
                            <tbody>
                                <?php foreach($rdata['RDATA'] as $pl ) { ?>
                                            <tr>                                          
                                                <td style="border-bottom:1px solid #ccc;padding-top:3px;padding-bottom:3px;font-size:11px;padding-right:5px;">
                                                    <?php echo $pl['logdesc'];?>
                                                </td>
                                                <td style="border-bottom:1px solid #ccc;padding-top:3px;padding-bottom:3px;vertical-align:top;text-align:right">
                                                    <a href="javascript:void(0)" onclick="selectAmount('<?php echo $pl['price'];?>');" class="btn btn-primary btn-xs" style="float: right;padding:3px 10px;width:50px;font-size:11px;">
                                                        <?php echo $pl['price'];?>
                                                    </a>
                                                </td>
                                            </tr>      
                                            <?php } ?>
                                        </tbody>
                                    </table>   
                                </div>
                            </div>
                        </div>
         <?php } ?>
    
                    <?php $i=1; foreach($products as $p) { ?>
                        <div class="card" style="margin-bottom:5px;">
                            <div style="margin-bottom:5px;">
                                <a class="card-header card-link collapsed" data-toggle="collapse" href="#collapse1_<?php echo $i;?>" style="width:100%;display:inherit;padding:5px;border:1px solid #f1f1f1;border-radius:0px;background:#f9f9f9" aria-expanded="false">
                                    <?php echo $p['name']; ?>
                                </a>                    
                            </div>
                            <div id="collapse1_<?php echo $i;?>" class="collapse" data-parent="#accordion" style="padding: 0px;">
                                <div class="card-body" style="padding:5px;">
                                    <table style="width:100%;">
                                        <tbody>
                                            <?php foreach($p['productList'] as $pl ) { ?>
                                            <tr>                                          
                                                <td style="border-bottom:1px solid #ccc;padding-top:3px;padding-bottom:3px;font-size:11px;padding-right:5px;">
                                                    <?php echo $pl['description'];?>
                                                </td>
                                                <td style="border-bottom:1px solid #ccc;padding-top:3px;padding-bottom:3px;vertical-align:top;text-align:right">
                                                    <a href="javascript:void(0)" onclick="selectAmount('<?php echo $pl['price'];?>');" class="btn btn-primary btn-xs" style="float: right;padding:3px 10px;width:50px;font-size:11px;">
                                                        <?php echo $pl['price'];?>
                                                    </a>
                                                </td>
                                            </tr>      
                                            <?php } ?>
                                        </tbody>
                                    </table>   
                                </div>
                            </div>
                        </div>
                    <?php $i++; } ?>
</div>
    </div> 
    <?php
}

function GetDTHPlan() {
    

     $optr = 0;
     
    switch($_GET['optr']) {
        case   'DS':
                    $optr="Sun Direct";
                    $img = "SunDirect.png";
                    break; 
        case   'DA':
                    $optr="Airtel Digital TV";
                    $img = "airteldth.png";
                    break;
         case   'DV':
                    $optr="Videocon d2h";
                    $img = "videocond2h.jpg";
                    break; 
         case   'DB':
                    $optr="Reliance Big TV";
                    $img = "bigtv.png";
                    break;
         
         case   'DT':
                    $optr="Tatasky";
                    $img = "tatasky.png";
                    break;
                    
         case   'DD':
                    $optr="Dish Tv";
                    $img = "Dishtv.png";
                    break;
         
         
        
         echo ' <div style="margin-bottom:10px;text-align:center;padding:50px;">
         
         
                    <img src="assets/info.png"><br><br>
                    <span style="font-size:13px;color:red;">Operator currently unavailable. please try later.</span><br>
                
    </div>' ;
    exit;
                    
                    break;
                    
    }
    if ($optr=="") {
        echo "No data found";
        exit;
    }
    $data = get_dth_plan($optr);
    $products = $data['groupings'];
    
    ?>
   <div>
 
    <div style="margin-bottom:10px;">
        <table>
            <tr>
                <td><img src='assets/operator/<?php echo $img;?>' style="width:64px"></td>
                <td style="padding-left:10px;line-height:15px;;">
                    <span style="font-size:25px"><?php echo $optr;?></span><br>
                </td>
            </tr>
        </table>
    </div>
    
    <div id="accordion">
         <?php if($roffer>0 && $rdata['ERROR']==0) { ?>
            <div class="card" style="margin-bottom:5px;">
                <div style="margin-bottom:5px;">
                    <a class="card-header card-link collapsed" data-toggle="collapse" href="#collapse1_0" style="width:100%;display:inherit;padding:5px;border:1px solid #f1f1f1;border-radius:0px;background:#f9f9f9" aria-expanded="false">
                        R-Offer
                    </a>                    
                </div>
                <div id="collapse1_0" class="collapse" data-parent="#accordion" style="padding: 0px;">
                    <div class="card-body" style="padding:5px;">
                        <table style="width:100%;">
                            <tbody>
                                <?php foreach($rdata['RDATA'] as $pl ) { ?>
                                            <tr>                                          
                                                <td style="border-bottom:1px solid #ccc;padding-top:3px;padding-bottom:3px;font-size:11px;padding-right:5px;">
                                                    <?php echo $pl['logdesc'];?>
                                                </td>
                                                <td style="border-bottom:1px solid #ccc;padding-top:3px;padding-bottom:3px;vertical-align:top;text-align:right">
                                                    <a href="javascript:void(0)" onclick="selectAmount('<?php echo $pl['price'];?>');" class="btn btn-primary btn-xs" style="float: right;padding:3px 10px;width:50px;font-size:11px;">
                                                        <?php echo $pl['price'];?>
                                                    </a>
                                                </td>
                                            </tr>      
                                            <?php } ?>
                                        </tbody>
                                    </table>   
                                </div>
                            </div>
                        </div>
         <?php } ?>
    
                    <?php $i=1; foreach($products as $p) { ?>
                        <div class="card" style="margin-bottom:5px;">
                            <div style="margin-bottom:5px;">
                                <a class="card-header card-link collapsed" data-toggle="collapse" href="#collapse1_<?php echo $i;?>" style="width:100%;display:inherit;padding:5px;border:1px solid #f1f1f1;border-radius:0px;background:#f9f9f9" aria-expanded="false">
                                    <?php echo $p['name']; ?>
                                </a>                    
                            </div>
                            <div id="collapse1_<?php echo $i;?>" class="collapse" data-parent="#accordion" style="padding: 0px;">
                                <div class="card-body" style="padding:5px;">
                                    <table style="width:100%;">
                                        <tbody>
                                            <?php foreach($p['productList'] as $pl ) { ?>
                                            <tr>                                          
                                                <td style="border-bottom:1px solid #ccc;padding-top:3px;padding-bottom:3px;font-size:11px;padding-right:5px;">
                                                    <?php echo $pl['description'];?>
                                                </td>
                                                <td style="border-bottom:1px solid #ccc;padding-top:3px;padding-bottom:3px;vertical-align:top;text-align:right">
                                                    <a href="javascript:void(0)" onclick="selectAmount('<?php echo $pl['price'];?>');" class="btn btn-primary btn-xs" style="float: right;padding:3px 10px;width:50px;font-size:11px;">
                                                        <?php echo $pl['price'];?>
                                                    </a>
                                                </td>
                                            </tr>      
                                            <?php } ?>
                                        </tbody>
                                    </table>   
                                </div>
                            </div>
                        </div>
                    <?php $i++; } ?>
</div>
    </div> 
    <?php
}
function GetUsers() {
    global $mysql,$app;
    $users = $mysql->select("select * from _tbl_my_contact where MemberID='".$_SESSION['User']['MemberID']."'");
    ?>
   <div>
   
    <div id="accordion">
        <div class="card" style="margin-bottom:5px;">
        <div class="card-title">
                    <h3 style="margin-bottom: 5px;">My Contacts</h3>
                </div>
            <table style="width:100%;">
                <tbody>
                    <?php $i=1; foreach($users as $u) { ?>
                        <tr id="tblid_<?php echo $i;?>">                                          
                            <td style="border-bottom:1px solid #ccc;padding-top:3px;padding-bottom:3px;font-size:11px;padding-right:5px;">
                               <b style="font-weight:18px;"><?php echo $u['ContactName'];?></b><br>
                                <span style="color:#888"><?php echo $u['MobileNumber'];?></span>
                            </td>
                            <td style="border-bottom:1px solid #ccc;padding-top:3px;padding-bottom:3px;vertical-align:top;text-align:right;padding-right:10px">
                                <a href="javascript:void(0)" onclick="selectMobileNumber('<?php echo $u['MobileNumber'];?>','tblid_<?php echo $i;?>');" class="btn btn-primary btn-xs" style="float: right;padding:3px 10px;width:50px;font-size:11px;">Select</a>
                            </td>
                        </tr>      
                    <?php $i++; } ?>
                    <?php if(sizeof($users)==0){ ?>
                        <tr>
                            <td style="text-align:center">
                                <button type="button" class="btn btn-black"  data-dismiss="modal" style="background:#6c757d !important;padding-top: 1px;padding-bottom: 2px;padding-right: 7px;padding-left: 7px;">Cancel</button>
                                <button type="button" class="btn btn-danger" onclick="location.href='dashboard.php?action=Settings/AddMyContact'" style="padding-top: 1px;padding-bottom: 2px;padding-right: 7px;padding-left: 7px;">Add Contact</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
</div>
    </div> 
    <?php
}
function GetUsersfrDth() {
    global $mysql,$app;
    $users = $mysql->select("select * from _tbl_my_contact where MemberID='".$_SESSION['User']['MemberID']."' and DTHNumber!='' order by ContactName");
    $operatorName = array("DD"=>"Dish TV","DA"=>"Airtel Digital Tv","DT"=>"Tatasky","DS"=>"Sun Direct","DV"=>"Videocon d2h","DB"=>"Big Tv");
    
    ?>
    <div>
        <div id="accordion">
            <div class="card" style="margin-bottom:5px;">
                <div class="card-title">
                    <h3 style="margin-bottom: 5px;">My Contacts</h3>
                </div>
                <div style="margin-bottom:5px;">
                        <table style="width:100%;">
                            <tbody>
                                <?php $i=1; foreach($users as $u) { ?>
                                    <tr id="tblid_<?php echo $i;?>"> 
                                    <?php 
                                        if($u['DTHOperator']=="DD"){
                                            $dthoptr = "Dish TV";
                                        }if($u['DTHOperator']=="DA"){
                                            $dthoptr = "Airtel Digital Tv";
                                        } if($u['DTHOperator']=="DT"){
                                            $dthoptr = "Tatasky";
                                        }if($u['DTHOperator']=="DS"){
                                            $dthoptr = "Sun Direct";
                                        }if($u['DTHOperator']=="DV"){
                                            $dthoptr = "Videocon d2h";
                                        }if($u['DTHOperator']=="DB"){
                                            $dthoptr = "Big Tv";
                                        }
                                    ?>                                         
                                        <td style="border-bottom:1px solid #ccc;padding-top:3px;padding-bottom:3px;font-size:11px;padding-right:5px;">
                                           <b style="font-weight:18px;"><?php echo $u['ContactName'];?></b><br>
                                            <span style="color:#888"><?php echo $u['DTHNumber'];?>&nbsp;&nbsp;(<?php echo $dthoptr;?>)</span>
                                        </td>
                                        <td style="border-bottom:1px solid #ccc;padding-top:3px;padding-bottom:3px;vertical-align:top;text-align:right;padding-right:10px">
                                            <a href="javascript:void(0)" onclick="selectDTHNumber('<?php echo $u['DTHNumber'];?>','tblid_<?php echo $i;?>');" class="btn btn-primary btn-xs" style="float: right;padding:3px 10px;width:50px;font-size:11px;">Select</a>
                                        </td>
                                    </tr>      
                                <?php $i++; } ?>
                                <?php if(sizeof($users)==0){ ?>
                                    <tr>
                                        <td style="text-align:center">
                                            <button type="button" class="btn btn-black"  data-dismiss="modal" style="background:#6c757d !important;padding-top: 1px;padding-bottom: 2px;padding-right: 7px;padding-left: 7px;">Cancel</button>
                                            <button type="button" class="btn btn-danger" onclick="location.href='dashboard.php?action=Settings/AddMyContact'" style="padding-top: 1px;padding-bottom: 2px;padding-right: 7px;padding-left: 7px;">Add Contact</button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>                          
    <?php
}

function GetTNEBUsers() {
    global $mysql,$app;
    $users = $mysql->select("select * from _tbl_my_contact where MemberID='".$_SESSION['User']['MemberID']."' and TNEBNumber!='' order by ContactName");
    ?>
    <div>
        <div>
            <div class="card" style="margin-bottom:5px;">
                <div class="card-title">
                    <h3 style="margin-bottom: 5px;">My Contacts</h3>
                </div>
                <div style="margin-bottom:5px;">
                        <table style="width:100%;">
                            <tbody>
                                <?php $i=1; foreach($users as $u) { ?>
                                    <tr id="tblid_<?php echo $i;?>"> 
                                                                             
                                        <td style="border-bottom:1px solid #ccc;padding-top:3px;padding-bottom:3px;font-size:11px;padding-right:5px;">
                                           <b style="font-weight:18px;"><?php echo $u['ContactName'];?></b><br>
                                            <span style="color:#888"><?php echo $u['TNEBRegion'];?>-<?php echo $u['TNEBNumber'];?></span>
                                        </td>
                                        <td style="border-bottom:1px solid #ccc;padding-top:3px;padding-bottom:3px;vertical-align:top;text-align:right;padding-right:10px">
                                            <a href="dashboard.php?action=ElectricityBill&ebnumber=<?php echo $u['TNEBNumber'];?>&region=<?php echo $u['TNEBRegion'];?>" class="btn btn-primary btn-xs" style="float: right;padding:3px 10px;width:50px;font-size:11px;">Select</a>
                                        </td>
                                    </tr>      
                                <?php $i++; } ?>
                                <?php if(sizeof($users)==0){ ?>
                                    <tr>
                                        <td style="text-align:center">
                                            <button type="button" class="btn btn-black"  data-dismiss="modal" style="background:#6c757d !important;padding-top: 1px;padding-bottom: 2px;padding-right: 7px;padding-left: 7px;">Cancel</button>
                                            <button type="button" class="btn btn-danger" onclick="location.href='dashboard.php?action=Settings/AddMyContact'" style="padding-top: 1px;padding-bottom: 2px;padding-right: 7px;padding-left: 7px;">Add Contact</button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>                          
    <?php
}

function Saveutilitytnpolice() {
    
    global $mysql,$app;
   
   $_OPERATOR = "UTNP";
    $data = $mysql->select("select * from _tbl_operators where OperatorCode='".$_OPERATOR."'");
    
    if($_POST['DocName']=="VehicleNumber"){
            $chsNumber = "-". $_POST['ChassisNumber'];
        }else {
            $chsNumber ="";
        }
   
      $result=$app->doBillPay(array("MemberID"             => $_SESSION['User']['MemberID'],
                                        "operator"             => $data[0]['OperatorCode'],
                                        "CustomerMobileNumber" => $_POST['CustomerMobileNumber'],
                                        "particulars"          => $data[0]['OperatorType']." UTNP ".$number,
                                        "number"               => $_POST['DocName']."-".$_POST['DocNumber'].$chsNumber,
                                        "markascredit"         => $_POST['markascredit'],         
                                        "credit_nickname"      => $_POST['credit_nickname'],
                                        "CrAmount"             => $_POST['CrAmount'],
                                        "whatsappRequired"     => $_POST['whatsappRequired']=="on" ? "1" : "0",
                                        "utility_tnpolice"     => array("DocumentType"         => $_POST['DocName'],
                                                                        "DocumentNumber"       => $_POST['DocNumber'],
                                                                        "ChassisNumber"        => $_POST['ChassisNumber'],
                                                                        "VehicleOwnerName"     => $_POST['VehicleOwnerName'],
                                                                        "Amount"               => $_POST['Amount'],
                                                                        "CustomerMobileNumber" => $_POST['MobileNumber'],
                                                                        "MemberID" => $_SESSION['User']['MemberID'],
                                                                        "CreatedOn"            =>date("Y-m-d H:i:s")),
                                        "amount"               => $_POST['Amount'])); 
                                        
      return json_encode($result);
    
}
function getTNPolic() {
    global $mysql;
    $data = $mysql->select("select * from _tbl_utility_tnpolice where TxnID='".$_GET['txn']."'");
    return json_encode($data[0]);
}
echo $_GET['action']();
?> 