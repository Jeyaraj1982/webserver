<?php 
include_once("admin/config.php");
 function SearchTelegramsubs() {
    global $mysql;
    $data = $mysql->select("select * from telegram_subscribers where mobilenumber='".$_GET['CustomerMobileNumber']."'");
    if(sizeof($data)==0){
      $result['status']="failure";  
    }
    return json_encode($result);
}
function getTNPolic() {
    global $mysql;
    $data = $mysql->select("select * from _tbl_utility_tnpolice where TxnID='".$_GET['txn']."'");
    return json_encode($data[0]);
}
function doGenerateAPIKey() {
    
    global $mysql,$app;
     $id= $mysql->execute("update _tbl_member set APIKey='".md5("APIKEY".time().date("Y-m-d H:i:s"))."',APIPassword='".md5("APIPASS".date("Y-m-d H:i:s").time())."' where MemberID='".$_SESSION['User']['MemberID']."'"); 
     
        $result = array();
        $result['status']="Success";
        $result['message']="Your Api Key Generated..";  
        return json_encode($result);
   
    
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

function _getIFSCode() {
    //tlO260h88nC24pU651g5d5yxn
    //https://ifsc.firstatom.org/key/tlO260h88nC24pU651g5d5yxn/ifsc/{ifsc_code}
    
     $ch = curl_init();  
 
    curl_setopt($ch,CURLOPT_URL,"https://api.techm.co.in/api/v1/ifsc/".$_GET['IFSCode']);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_HEADER, false); 
    $output=curl_exec($ch);
    curl_close($ch);
    return $output;
    
}
function getIFSCode() {
    
    global $mysql;
    $ch = curl_init();  
    
    curl_setopt($ch,CURLOPT_URL,"https://ifsc.bankifsccode.com/".$_GET['IFSCode']);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_HEADER, false); 
    $output=curl_exec($ch);
    curl_close($ch);
    $output_data = explode("IFSC Code:-",$output);
    $output_data = explode("</div>",$output_data[1]);
    $data = explode(",",$output_data[0]);  
    if (sizeof($data)>1) {
        $output = json_encode(array("status"=>"success",
                                    "data"=>array("STATE"=>"","BANK"=>$data[1],"IFSC"=>$data[0],"BRANCH"=>$data[2],"ADDRESS"=>"","CONTACT"=>"0","CITY"=>"","DISTRICT"=>"","MICRCODE"=>""),
                                    "message"=>""));
     } else {
        $output = json_encode(array("status"=>"failure","message"=>"Invalid ifscode"));
    }
    $txnid=   $mysql->insert("_tbl_ifsc_log",array("UserID"     => $_SESSION['User']['MemberID'],
                                                    "IFSCode"    => $_GET['IFSCode'],
                                                    "OutPut"     => $output,
                                                     "TxnOn"      =>date("Y-m-d H:i:s")));
      //$output = json_encode(array("status"=>))
         //{"status":"success","data":{"_id":"5a90ef28ec4a372ad2966588","STATE":"TAMIL NADU","BANK":"FEDERAL BANK","IFSC":"FDRL0002109","BRANCH":"RAMAPURAM","ADDRESS":"D.NO.1/12, THIROOR VILLAGE VELLAMADAM P.O, KANYAKUMARI","CONTACT":"0","CITY":"RAMAPURAM","DISTRICT":"KANYAKUMARI","MICRCODE":"NA"},"message":null}
    return $output;
    
}

function GetUsers() {
    global $mysql,$app;
    $users = $mysql->select("select * from _tbl_my_contact where MemberID='".$_SESSION['User']['MemberID']."' order by ContactName");
    ?>
    <div>
        <div id="accordion">
            <div class="card" style="margin-bottom:5px;">
                <div class="card-title">
                    <h5 style="margin-bottom: -8px;letter-spacing: 0px;">Mobile Number</h5>
                    <span style="font-size:12px;"> My contacts</span>
                </div>
                <div style="margin-bottom:5px;">
                        <table style="width:100%;">
                            <tbody>
                                <?php $i=1; foreach($users as $u) { ?>
                                    <tr id="tblid_<?php echo $i;?>">                                          
                                        <td style="border-bottom:1px solid #ccc;padding-top:3px;padding-bottom:3px;font-size:11px;padding-right:5px;">
                                           <b style="font-weight:18px;"><?php echo $u['ContactName'];?></b><br>
                                            <span style="color:#888"><?php echo $u['MobileNumber'];?>&nbsp;(<?php echo $u['MobileOperator'];?>)</span>
                                        </td>
                                        <td style="border-bottom:1px solid #ccc;padding-top:3px;padding-bottom:3px;vertical-align:top;text-align:right;padding-right:10px">
                                            <?php if($u['MobileOperator']=="RA"){?>
                                                <a href="dashboard.php?action=mrc_airtel&mobilenumber=<?php echo $u['MobileNumber'];?>" class="btn btn-primary btn-xs" style="float: right;padding:3px 10px;font-size:11px;">Select</a>
                                            <?php } ?>
                                            <?php if($u['MobileOperator']=="RB"){?>
                                                <a href="dashboard.php?action=mrc_bsnl&mobilenumber=<?php echo $u['MobileNumber'];?>" class="btn btn-primary btn-xs" style="float: right;padding:3px 10px;font-size:11px;">Select</a>
                                            <?php } ?>
                                            <?php if($u['MobileOperator']=="RV"){?>
                                                <a href="dashboard.php?action=mrc_vodaidea&mobilenumber=<?php echo $u['MobileNumber'];?>" class="btn btn-primary btn-xs" style="float: right;padding:3px 10px;font-size:11px;">Select</a>
                                            <?php } ?>
                                            <?php if($u['MobileOperator']=="RI"){?>
                                                <a href="dashboard.php?action=mrc_idea&mobilenumber=<?php echo $u['MobileNumber'];?>" class="btn btn-primary btn-xs" style="float: right;padding:3px 10px;font-size:11px;">Select</a>
                                            <?php } ?>
                                            <?php if($u['MobileOperator']=="RJ"){?>
                                                <a href="dashboard.php?action=mrc_jio&mobilenumber=<?php echo $u['MobileNumber'];?>" class="btn btn-primary btn-xs" style="float: right;padding:3px 10px;font-size:11px;">Select</a>
                                            <?php } ?>
                                        </td>
                                    </tr>      
                                <?php $i++; } ?>
                            </tbody>
                        </table>
                </div>
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
                    <h5 style="margin-bottom: -8px;letter-spacing: 0px;">DTH Number</h5>
                    <span style="font-size:12px;"> My contacts</span>
                </div>
                <div style="margin-bottom:5px;">
                        <table style="width:100%;">
                            <tbody>
                                <?php $i=1; foreach($users as $u) { ?>
                                    <tr id="tblid_<?php echo $i;?>"> 
                                    <?php 
                                        if($u['DTHOperator']=="DD"){
                                            $dthoptr = "Dish TV";
                                            $url ="dashboard.php?action=dth_dish&dthnumber=".$u['DTHNumber']."";
                                        }if($u['DTHOperator']=="DA"){
                                            $dthoptr = "Airtel Digital Tv";
                                            $url ="dashboard.php?action=dth_airtel&dthnumber=".$u['DTHNumber']."";
                                        } if($u['DTHOperator']=="DT"){
                                            $url ="dashboard.php?action=dth_tatasky&dthnumber=".$u['DTHNumber']."";
                                            $dthoptr = "Tatasky";
                                        }if($u['DTHOperator']=="DS"){
                                            $dthoptr = "Sun Direct";
                                             $url ="dashboard.php?action=dth_sundirect&dthnumber=".$u['DTHNumber']."";
                                        }if($u['DTHOperator']=="DV"){
                                            $dthoptr = "Videocon d2h";
                                            $url ="dashboard.php?action=dth_videocond2h&dthnumber=".$u['DTHNumber']."";
                                        }if($u['DTHOperator']=="DB"){
                                            $dthoptr = "Big Tv";
                                            $url ="dashboard.php?action=dth_bigtv&dthnumber=".$u['DTHNumber']."";
                                        }
                                    ?>                                         
                                        <td style="border-bottom:1px solid #ccc;padding-top:3px;padding-bottom:3px;font-size:11px;padding-right:5px;">
                                           <b style="font-weight:18px;"><?php echo $u['ContactName'];?></b><br>
                                            <span style="color:#888"><?php echo $u['DTHNumber'];?>&nbsp;&nbsp;(<?php echo $dthoptr;?>)</span>
                                        </td>
                                        <td style="border-bottom:1px solid #ccc;padding-top:3px;padding-bottom:3px;vertical-align:top;text-align:right;padding-right:10px">
                                            <a href="<?php echo $url;?>" class="btn btn-primary btn-xs" style="float: right;padding:3px 10px;font-size:11px;">Select</a>
                                        </td>
                                    </tr>      
                                <?php $i++; } ?>
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
    $users = $mysql->select("select * from _tbl_my_contact where MemberID='".$_SESSION['User']['MemberID']."' and TNEBNumber!=''  order by ContactName");
    ?>
    <div>
        <div id="accordion">
            <div class="card" style="margin-bottom:5px;">
                <div class="card-title">
                    <h5 style="margin-bottom: -8px;letter-spacing: 0px;">TNEB Number</h5>
                    <span style="font-size:12px;"> My contacts</span>
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
                                            <a href="dashboard.php?action=bill_tneb&region=<?php echo $u['TNEBRegion'];?>&ebnumber=<?php echo $u['TNEBNumber'];?>" class="btn btn-primary btn-xs" style="float: right;padding:3px 10px;font-size:11px;">Select</a>
                                        
                                        </td>
                                    </tr>      
                                <?php $i++; } ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>                          
    <?php
}
echo $_GET['action']();
?> 