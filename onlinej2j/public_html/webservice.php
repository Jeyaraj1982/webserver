<?php
	include_once("config.php");
    echo $_GET['action']();
    
    function returnError($message="") {
          return json_encode(array("status"=>"failure","message"=>$message));
    }
    
    function returnSuccess($data="",$message="") {
        return json_encode(array("status"=>"success","data"=>$data,"message"=>$message));
    }
    
    function RetailerRegister() {
        
        global $mysql;
        
        if ($_SESSION['captcha_code']!=$_POST['captcha_code']) {
            return returnError("register failed, captcha code mismatch"); 
        }
        
        if (strlen(trim($_POST['MemberName']))==0){
            return returnError("please enter your name"); 
        }
        
        if (strlen(trim($_POST['RetailerMobileNumber']))==0){
            return returnError("please enter mobile number"); 
        } else {
            if (!(trim($_POST['RetailerMobileNumber'])<9999999999 && trim($_POST['RetailerMobileNumber'])>6000000000)) {
                return returnError("please enter valid mobile number"); 
            }
        }
        
        if (strlen(trim($_POST['RetailerPassword']))==0){
            return returnError("please enter password"); 
        } else {
            if (strlen(trim($_POST['RetailerPassword']))<6){
                return returnError("password length 6 or more characters"); 
            }
        }

        $data = $mysql->select("select MobileNumber from `_tbl_member` where `MobileNumber`='".trim($_POST['RetailerMobileNumber'])."'");
        if (sizeof($data)>0){
            return returnError("register failed, mobile number already in-use"); 
        }
        
        $id = $mysql->insert("_tbl_member",array("MemberName"       => $_POST['MemberName'],
                                                 "EmailID"          => "",
                                                 "MobileNumber"     => trim($_POST['RetailerMobileNumber']),
                                                 "MemberPassword"   => trim($_POST['RetailerPassword']),
                                                 "Address1"         => "",
                                                 "Address2"         => "",
                                                 "PostalCode"       => "",
                                                 "MAB_Enabled"      => "0",
                                                 "MoneyTransfer"    => "1",
                                                 "IsActive"         => "1",
                                                 "IsMember"         => "1",
                                                 "MapedTo"          => "1",
                                                 "MapedToName"      => "OnlineJ2J",
                                                 "create_from"      => "Web",
                                                 "CreatedOn"        => date("Y-m-d H:i:s")));
        if ($id>0) {
            $message = "Dear Admin, new retailer ".$_POST['Name'].", (".$_POST['MobileNumber'].") has registered from website.";
            //Admin Notificatino
                //TelegramMessageController::sendSMS(AdminTelegram,$message,0,0);
                //Whatsapp::sendsms(AdminWhatsapp,$message,0,"");            
            //Retailer Welcome Message                        
                //Whatsapp::sendsms("91".trim($_POST['RetailerMobileNumber']),$message,0,"");                                    
            $d = $mysql->select("select * from _tbl_member where MemberID='".$id."'");
            $_SESSION['User']=$d[0];
            $_SESSION['User']['UserRole']="Member";  
            return returnSuccess();
        } else {
            return returnError("register failed, please try again later"); 
        }  
    }
    
    function RetailerLogin() {
        global $mysql;
        
        if ($_SESSION['captcha_code']!=$_POST['captcha_code']) {
             return returnError("login failed, captcha code mismatch"); 
        }
        
        $data = $mysql->select("select * from `_tbl_member` where `MobileNumber`='".$_POST['MobileNumber']."'");
        
        $clientinfo['Device']="";
        $clientinfo['country']="";
        $clientinfo['UserAgent']="";
        
        if (sizeof($data)>0) {
            
            if ($data[0]['MemberPassword']==$_POST['Password']) {
                
                if($data[0]['IsActive']=="1") {
                    
                    $_SESSION['User']=$data[0];
                    if ($data[0]['IsAdmin']==1) {
                        $_SESSION['User']['UserRole']="Admin";    
                    }
                    if ($data[0]['IsDistributor']==1) {
                        $_SESSION['User']['UserRole']="Distributor";    
                    }
                    if ($data[0]['IsDealer']==1) {
                        $_SESSION['User']['UserRole']="Dealer";    
                    }
                    if ($data[0]['IsMember']==1) {
                        $_SESSION['User']['UserRole']="Member";    
                    }
                
                    $loginid = $mysql->insert("_tbl_logs_logins",array("LoginOn"       => date("Y-m-d H:i:s"),
                                                                       "LoginFrom"     => "Web",
                                                                       "Device"        => $clientinfo['Device'],
                                                                       "MemberID"      => $data[0]['MemberID'],
                                                                       "MemberCode"    => $data[0]['MemberCode'],
                                                                       "MobileNumber"  => $data[0]['MobileNumber'],
                                                                       "BrowserIP"     => $clientinfo['query'],
                                                                       "LoginStatus"   => "1",
                                                                       "CountryName"   => $clientinfo['country'],
                                                                       "BrowserName"   => $clientinfo['UserAgent'],
                                                                       "APIResponse"   => json_encode($clientinfo),
                                                                       "LoginPassword" => $_POST['Password']));  
                    if ($_GET['f']=="m") {
                        $return['url']= SITE_URL."/dashboard.php";    
                    } else {
                        $return['url']= SITE_URL."/app/dashboard.php";    
                    }
                    
                    return returnSuccess($return);
                } else {
                    return returnError("Account Deactivated");
                } 
            } else {
                return returnError("login failed, invalid password.");
            } 
        } else {
            return returnError("login failed. account not found");
        }   
    }
?>