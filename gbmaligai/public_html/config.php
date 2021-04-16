<?php
session_start();
date_default_timezone_set('Asia/Calcutta');  

define("SERVER_PATH",__DIR__);
define("log_path",SERVER_PATH."/app/logs/");
define("WEB_URL","https://www.gbmaligai.com");
define("LOGOUT_PATH","https://www.gbmaligai.com");
define("WEB_Title","GBMaligai.Com :: Online Grocery Shopping Hub");   

define("DBSERVER","localhost");                      
define("DBUSER","gbmaliga_user");
define("DBPASSWORD","mysql@Pwd");
define("DBNAME","gbmaliga_database");

if (isset($_GET['do']) && $_GET['do']=="logout") {
    session_destroy();
    echo "<script>location.href='".LOGOUT_PATH."';</script>";
    exit;
}

define("Mail_Host","mail.gbmaligai.com");
define("SMTP_UserName","support@gbmaligai.com");
define("SMTP_Password","Welcome@82");
define("SMTP_Sender","gbmaligai");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__.'/lib/mail/src/Exception.php';
require __DIR__.'/lib/mail/src/PHPMailer.php';
require __DIR__.'/lib/mail/src/SMTP.php';

$mail    = new PHPMailer;
function reInitMail() {
    global $mail;
    $mail    = new PHPMailer;
}
    
include_once("app/controller/EmailController.php");
include_once("app/controller/DatabaseController.php");
$mysql = new MySqldatabase(DBSERVER,DBUSER,DBPASSWORD,DBNAME);

if (isset($_SESSION['User']) && $_SESSION['User']['Role']=="User") {
    define("UserRole","user");
}
if (isset($_SESSION['User']) && $_SESSION['User']['Role']=="Admin") {
    define("UserRole","admin");
}

$_CONFIG['LOGO_URL'] = WEB_URL."/assets/new_weblogo.png";
define("BrandSize",0);

function parseStringForURL($string) {
    $string = strtolower(trim($string));
    $string = str_replace("&","and",$string);
    $string = str_replace("/"," ",$string);
    $string = str_replace("'"," ",$string);
    $string = str_replace("%"," ",$string);
    $string = str_replace("  "," ",$string);
    $string = str_replace(" ","-",$string);
    return $string;
}   
    
function parseStringForPhysicalPath($string) {
    $string = strtolower(trim($string));
    $string = str_replace("&","and",$string);
    $string = str_replace("'"," ",$string);
    $string = str_replace("/"," ",$string);
    $string = str_replace("%"," ",$string);
    $string = str_replace("  "," ",$string);
    $string = str_replace(" ","_",$string);
    return $string;
}

class JApp {
    
     const REFERAL_PROGRAM = false;
     const MANDATORY_EMAIL = false;
     const REGISTER_EMAIL = false;
    
    const CURRENT_PASSWORD_MINIMUM_LENGTH = 6;
    const CURRENT_PASSWORD_MAXIMUM_LENGTH = 12;                                         
    
    const LOGIN_PASSWORD_MINIMUM_LENGTH = 6;
    const LOGIN_PASSWORD_MAXIMUM_LENGTH = 12;
                                                                            
    const CONFIRM_PASSWORD_MINIMUM_LENGTH = 6;
    const CONFIRM_PASSWORD_MAXIMUM_LENGTH = 12;
    
    const DATE_OF_BIRTH_START_YEAR=1960;
    const DATE_OF_BIRTH_END_YEAR=2000;
      
    const MOBILE_NUMBER_START_FROM=6666666666;
    const MOBILE_NUMBER_END_TO=9999999999;  
    const MOBILE_NUMBER_MINIMUM_LENGTH=10;
    const MOBILE_NUMBER_MAXIMUM_LENGTH=10;
    
    const EMAIL_ID_FORMAT='/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
    
    const PROFILE_NAME_MINIMUM_LENGTH = 3;
    const PROFILE_NAME_MAXIMUM_LENGTH = 20;
    
    const ADDRESS_LINE1_MINIMUM_LENGTH = 3;
    const ADDRESS_LINE1_MAXIMUM_LENGTH = 30;
    
    const PINCODE_MINIMUM_LENGTH = 6;
    const PINCODE_MAXIMUM_LENGTH = 10;
    
    const GENDER = array("Male","Female");
    const WEB_PRODUCTS_PER_PAGE = 20;
}
















class Messages{
    
    const LOGIN_PASSWORD_ERROR_IDLE="";
    const LOGIN_PASSWORD_ERROR_INVALID_CURRENT_PASSWORD="";
    const LOGIN_PASSWORD_CHANGE_SUCCESS_MESSAGE="";
    const LOGIN_PASSWORD_CHANGE_FAILURE_MESSAGE="";
      
    const MOBILE_NUMBER_ERROR_EMPTY="Please enter mobile number";
    const MOBILE_NUMBER_ERROR_LASS_THAN_MINIMUM_LENGTH="";
    const MOBILE_NUMBER_ERROR_GREATER_THAN_MAXIMUM_LENGTH="";
    const MOBILE_NUMBER_ERROR_LASS_THAN_START_FROM="Invalid mobile number.";
    const MOBILE_NUMBER_ERROR_GREATER_THAN_END_TO="Invalid mobile number..";
    const MOBILE_NUMBER_ERROR_INBETWEEN_START_END="Invalid mobile number...";
    const MOBILE_NUMBER_ERROR_DUPLICATE="Mobile Number already used";
     
    const EMAIL_NUMBER_ERROR_EMPTY="Please enter email id";     
    const EMAIL_ID_ERROR_INVALID="Invalid email id";  
    const EMAIL_ID_ERROR_DUPLICATE="Email id already used";      
      
    const PROFILE_NAME_ERROR_EMPTY="Please enter name";      
    const PROFILE_NAME_ERROR_LESS_THAN_MINIMUM_LENGTH="Please enter more than three charcters";      
    const PROFILE_NAME_ERROR_GREATER_THAN_MAXIMUM_LENGTH="Please enter less than twenty charcters";  
      
    const ADDRESS_LINE1_ERROR_EMPTY="Please enter address";      
    const ADDRESS_LINE1_ERROR_LESS_THAN_MINIMUM_LENGTH="Please enter more than three charcters";      
    const ADDRESS_LINE1_ERROR_GREATER_THAN_MAXIMUM_LENGTH="Please enter less than thirty charcters";    
      
    const COUNTRY_NAME_ERROR_EMPTY="Please select country name";       
    const STATE_NAME_ERROR_EMPTY="Please select state name";       
    const DISTRICT_NAME_ERROR_EMPTY="Please select district name";       
     
    const PINCODE_ERROR_EMPTY="Please enter pin/zip code";       
    const PINCODE_ERROR_LESS_THAN_MINIMUM_LENGTH="Please enter valid pin/zip code.";       
    const PINCODE_ERROR_GREATER_THAN_MAXIMUM_LENGTH="Please enter valid pin/zip code..";
      
    const CURRENT_PASSWORD_ERROR_EMPTY="Please enter current password";       
    const CURRENT_PASSWORD_ERROR_LESS_THAN_MINIMUM_LENGTH="Please enter minimum six characters";       
    const CURRENT_PASSWORD_ERROR_GREATER_THAN_MAXIMUM_LENGTH="Please enter maximum twelve characters";    
    const CURRENT_PASSWORD_ERROR_INCORRECT="Incorrect current password";    
      
    const LOGIN_PASSWORD_ERROR_EMPTY="Please enter password";       
    const LOGIN_PASSWORD_ERROR_LESS_THAN_MINIMUM_LENGTH="Please enter minimum six characters";       
    const LOGIN_PASSWORD_ERROR_GREATER_THAN_MAXIMUM_LENGTH="Please enter maximum twelve characters"; 
      
    const CONFIRM_PASSWORD_ERROR_EMPTY="Please enter confirm password";       
    const CONFIRM_PASSWORD_ERROR_LESS_THAN_MINIMUM_LENGTH="Please enter minimum six characters";       
    const CONFIRM_PASSWORD_ERROR_GREATER_THAN_MAXIMUM_LENGTH="Please enter maximum twelve characters";       
    const CONFIRM_PASSWORD_ERROR_NOT_MATCH="Passwords do not match";       
}      

function getCode($code) {
    $array[1]="a";
    $array[2]="B";
    $array[3]="n";
    $array[4]="d";
    $array[5]="E";
    $array[6]="5";
    $array[7]="G";
    $array[8]="h";
    $array[9]="9";
    $array[0]="j";
    $array["-"]="z";
    $ds = str_split($code);
    $ulink = "";
    foreach($ds as $d) {
        $ulink.=$array[$d];
    }
    return  $ulink;
}

Class Wallet {
    function getBalance($CustomerID=0) {
        global $mysql;
        $data = $mysql->select("select (sum(Credit)-Sum(Debit)) as Bal from _tbl_wallet where CustomerID='".$CustomerID."'");
        if (isset($data[0]['Bal'])) {
            return $data[0]['Bal'];
        } else {
            return 0;
        }
    }  
    
    function getTotalCredits($CustomerID=0) {
        global $mysql;
        $data = $mysql->select("select sum(Credit) as Bal from _tbl_wallet where CustomerID='".$CustomerID."'");
        if (isset($data[0]['Bal'])) {
            return $data[0]['Bal'];
        } else {
            return 0;
        }
    }
}

Class Order {
    function OrderStatus($StatusCode=0) {
        
        if ($StatusCode==1) {
            return "Order Placed";
        }
        
        if ($StatusCode==2) {
            return "Order Cancelled";
        }
        
        if ($StatusCode==3) {
            return "Order Processing";
        }
        
        if ($StatusCode==4) {
            return "Order Dispatched";
        }
        
         if ($StatusCode==5) {
            return "Order Delivered";
        }
        return "Invalid";
    }
    
    function OrderPlacedMailContent($OrderID=0) {
        
        global $mysql;
        $Orders = $mysql->select("select * from _tbl_orders where OrderID='".$OrderID."'");
        $items = $mysql->select("select * from _tbl_orders_items where OrderID='".$OrderID."'");
        $inmessage = '
                <div style="border-radius:5px;background-color:#ffffff;margin-bottom: 30px;box-shadow: 2px 6px 15px 0px rgba(69, 65, 78, 0.1);border: 0px;position: relative;flex-direction: column;min-width: 0;word-wrap: break-word;background-clip: border-box;border:1px solid #666;margin-left:20px;margin-right:20px;padding:20px;">
                        <div style="display: flex;flex-direction: row;justify-content: space-between;align-items: center;">
                            <h3  style="font-size: 27px;font-weight: 400;line-height: 1.4;margin-bottom: .5rem;color: inherit;margin-top: 0;">
                                Order
                            </h3>
                        </div>
                        <div style="margin-right:0px;margin-left:0px;display: flex;flex-wrap: wrap;">
                            <div   style="padding-right:0px;padding-left:0px;flex: 0 0 100%;max-width: 100%;position: relative;width: 100%;min-height: 1px;">
                                <div  style="padding-right:0px;padding-left:0px;float: left;max-width: 50%;position: relative;width: 100%;min-height: 1px;">
                                    <h5 style="margin-bottom:3px;font-weight: bold;font-size:16px">Customer Details</h5>'.
                                        $Orders[0]['CustomerName'].'<br>'.
                                        $Orders[0]['BillingAddress1'].
                                        ((strlen(trim($Orders[0]['BillingAddress2']))>0) ? "<br>".$Orders[0]['BillingAddress2'] : '').
                                        ((strlen(trim($Orders[0]['BillingAddress3']))>0) ? "<br>".$Orders[0]['BillingAddress3'] : '').
                                        '<br>PinCode: '.$Orders[0]['BillingPincode'].
                                        ((strlen(trim($Orders[0]['BillingLandMark']))>0) ? "<br>Land Mark".$Orders[0]['BillingLandMark'] : '').
                                        ((strlen(trim($Orders[0]['CustomerEmailID']))>0) ? "<br>Email: ".$Orders[0]['CustomerEmailID']: "").
                                        ((strlen(trim($Orders[0]['CustomerMobileNumber']))>0) ? "<br>Mobile: ". $Orders[0]['CustomerMobileNumber'] : "").'
                                </div>
                                <div  style="padding-right:0px;padding-left:0px;float: left;text-align: right;max-width: 50%;position: relative;width: 100%;min-height: 1px;">
                                    <h5 style="margin-bottom:3px;font-weight: bold;font-size:16px">Order Details</h5>
                                    '."Order Number: ".$Orders[0]['OrderCode'].'<br>
                                    '.date("M d, Y H:i",strtotime($Orders[0]['OrderDate'])).'<br>
                                    <span style="font-weight: bold;color:red">Order Placed</span>
                                </div>
                            </div>
                        </div>
                        <div style="padding: 0;border: 0px !important;margin: auto;flex: 1 1 auto;">
                        <div style="border-top: 1px solid #ebecec;margin: 15px 0;"></div>
                        <div style="display: flex;flex-wrap: wrap;margin-right: -15px;margin-left: -15px;">
                            <div style="flex: 0 0 100%;max-width: 100%;position: relative;width: 100%;min-height: 1px;">
                                <div style="width: 100%;display: block;">
                                    <div>
                                         <img src="'.LOGO_URL.'" alt="company logo" style="height:90px;">
                                    </div>               
                                    <div>
                                        <div style="width: 100% !important;overflow-x: auto;display: block;width: 100%;margin-bottom: 1rem;background-color: transparent;border-collapse: collapse;">
                                            <table style="width:100% !important;" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th style="font-weight: 600;border-top: 1px solid #888; !important;border-bottom: 1px solid #888; !important;font-size: 14px;padding: 5px !important;height: 60px;vertical-align: middle !important;text-align: inherit;padding-left:0px !important;">Product Name</th>
                                                        <th style="font-weight: 600;border-top: 1px solid #888; !important;border-bottom: 1px solid #888; !important;font-size: 14px;padding: 5px !important;height: 60px;vertical-align: middle !important;text-align: right !important;padding-left:0px;padding-right:0px">Price (&#8377)</th>
                                                        <th style="font-weight: 600;border-top: 1px solid #888; !important;border-bottom: 1px solid #888; !important;font-size: 14px;padding: 5px !important;height: 60px;vertical-align: middle !important;text-align: right !important;padding-left:0px;padding-right:0px">Qty</th>
                                                        <th style="font-weight: 600;border-top: 1px solid #888; !important;border-bottom: 1px solid #888; !important;font-size: 14px;padding: 5px !important;height: 60px;vertical-align: middle !important;text-align: right !important;padding-left:0px;padding-right:0px">Total (&#8377)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>';
                                                    foreach($items as $item){
                                                    $inmessage .='
                                                    <tr>
                                                        <td style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;padding:5px !important;height: 60px;vertical-align: middle !important;padding-left:0px">'.$item['ProductName'].'</td>
                                                        <td style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;padding:5px !important;height: 60px;vertical-align: middle !important;text-align:right !important;padding-right:0px">'.number_format($item['Price'],2).'</td>
                                                        <td style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;padding:5px !important;height: 60px;vertical-align: middle !important;text-align:right !important;padding-right:0px">'.$item['Qty'].'</td>
                                                        <td style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;padding:5px !important;height: 60px;vertical-align: middle !important;text-align:right !important;padding-right:0px">'.number_format($item['Amount'],2).'</td>
                                                    </tr>';
                                                    }
                                                    $inmessage .= '
                                                    <tr>
                                                        <td colspan="4" style="border-bottom: 1px solid #888;">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" style="text-align:right;padding:5px;">Sub Total (&#8377)</td>
                                                        <td style="text-align:right !important;;padding-right:0px;padding:5px;">'.number_format($Orders[0]['OrderTotal'],2).'</td> 
                                                    </tr>
                                                     <tr>
                                                        <td colspan="3" style="text-align:right;padding:5px;">Total Amount (&#8377)</td>
                                                        <td style="text-align:right !important;padding-right:0px;padding:5px;">'.number_format($Orders[0]['OrderTotal'],2).'</td> 
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>    
                                <div style="border-top: 1px solid #ebecec;margin: 15px 0;margin-bottom: 1rem !important;"></div>
                            </div>    
                        </div>
                    </div>
                        <div style="padding: 5px 0 50px;border: 0px !important;width: 75%;margin: auto;background-color: transparent;line-height: 30px;font-size: 13px;border-radius: 0 0 calc(.25rem - 1px) calc(.25rem - 1px);">
                            <div  style="display: flex;    flex-wrap: wrap;    margin-right: -15px;    margin-left: -15px;">
                                <div  style="margin-bottom: 0 !important;flex: 0 0 41.666667%;max-width: 41.666667%;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;">
                                    
                                </div>
                                <div  style="text-align: right;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;">
                                    <h5  style="font-size: 14px;margin-bottom: 8px;font-weight: 600;line-height: 1.4;">Total Amount</h5>
                                    <div  style="font-size: 28px;color: #1572E8;padding: 7px 0;font-weight: 600;"><span style="font-size: 14px;">&#8377;&nbsp;</span>'.number_format($Orders[0]['OrderTotal'],2).'</div>
                                </div>
                            </div>
                        </div>
                    </div>';
        return array("MailSubject"=>"Order Placed","MailBody"=>$inmessage);
    }
    
    function OrderCancelledMailContent($OrderID=0) {
        global $mysql;
        $Orders = $mysql->select("select * from _tbl_orders where OrderID='".$OrderID."'");
        $items = $mysql->select("select * from _tbl_orders_items where OrderID='".$OrderID."'");
        $inmessage = " Your Order ".$Orders[0]['OrderCode']." has been cancelled";
        return array("MailSubject"=>"Order Cancelled","MailBody"=>$inmessage);
    }
    
     function OrderConfirmedAndProcessMailContent($OrderID=0) {
        global $mysql;
        //<a href="http://japps.online/ecommerce/vieworders.php?id='.md5($order[0]['order_id']).'" style="padding:5px 10px 5px 10px;background:#5656e8;color:white;border:1px solid #5656e8;border-radius:5px;text-decoration: none;">View Order</a>
        $order = $mysql->select("select * from _tbl_orders where OrderID='".$OrderID."'");
        $inmessage = ' 
            <div style="padding:5px;background:#e5e5e5;margin:20px;border-radius:10px;margin-bottom:0px">
                <div style="border:0px solid black;text-align:left;padding:20px;background:white;border-radius:10px;min-height:60px;">
                    <div style="float: left;"> 
                        <span style="color:#4d4b4b;font-weight: bold;font-size: 15px;">Order Information</span>
                        <br>
                        <span style="font-size: 12px;">#'.$order[0]['OrderCode'].'<br>
                        '.date("d M, Y, H:i", strtotime($order[0]["OrderDate"])).'</span>
                    </div>
                    <div style="float: right;text-align:right"> 
                        <h4 style="margin-top:0px;font-size:30px;margin-bottom:5px"><span style="font-size:12px">INR</span>&nbsp;'.$order[0]['OrderTotal'].'</h4>
                    </div>
                </div>
            </div>
            <br>
            <div style="padding:5px;margin-left:20px;">
                <h4 style="margin-top:0px;margin-bottom:0px">Status</h4>
                <div style="margin-left: 20px;">Your Order ('.$order[0]['OrderCode'].')  confirmed<br>'.date("d M, Y, H:i").'</div>
            </div>';
        return array("MailSubject"=>"Your Order (".$order[0]['OrderCode'].") Confirmed and Processing ...","MailBody"=>$inmessage);
    }
}
?>
 