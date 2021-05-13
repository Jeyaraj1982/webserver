<?php
	include_once("config.php");
    echo $_GET['action']();
    function returnError($message) {
          return json_encode(array("status"=>"failure","message"=>$message));
    }
    
    function returnSuccess($data,$message="") {
        return json_encode(array("status"=>"success","data"=>$data,"message"=>$message));
    }
    
    function RetailerRegister() {
        global $mysql;
        if ($_SESSION['captcha_code']!=$_POST['captcha_code']) {
             return returnError("register failed, captcha code mismatch"); 
        }
        $data = $mysql->select("select * from `_tbl_members` where  `MobileNumber`='".$_POST['MobileNumber']."'");
        if (sizeof($data)>0){
            return returnError("register failed, mobile number already in-use"); 
        }
        
        $id= $mysql->insert("_tbl_pre_members",array("MemberName"      => $_POST['RetailerName'],
                                                     "MobileNumber"    => $_POST['RetailerMobileNumber'],
                                                     "MemberPassword"  => $_POST['RetailerPassword'],
                                                     "CreatedOn"       => date("Y-m-d H:i:s"),
                                                     "IsMember"        => "1",
                                                     "IsActive"        => "0",
                                                     "MapedTo"         => "1",
                                                     "MapedToName"     => "Admin"));
        
        $return['url']="https://www.j2jsoftwaresolutions.com/payments/config.php?action=paynow&id=".md5("jraj@12#34%56*hamiec".$id);
        return returnSuccess($return);
    }
    
    function RetailerLogin() {
        global $mysql;
        
        if ($_SESSION['captcha_code']!=$_POST['captcha_code']) {
             return returnError("login failed, captcha code mismatch"); 
        }
        
        $data = $mysql->select("select * from `_tbl_members` where `MobileNumber`='".$_POST['MobileNumber']."'");
        
        $clientinfo['Device']="";
        $clientinfo['country']="";
        $clientinfo['UserAgent']="";
        
        if (sizeof($data)>0) {
            if ($data[0]["IsActive"]!=1) {
              return returnError("login failed, please contact administrator.");   
            }
            
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
                return returnError("login failed, invalid login details.");
            } 
        } else {
            return returnError("login failed"."select * from `_tbl_members` where  `MobileNumber`='".$_POST['MobileNumber']."'");
        }   
    }
?>