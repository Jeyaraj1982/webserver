<?php
 
    error_reporting(0); 
    session_start();  
    date_default_timezone_set("Asia/Calcutta");  
                   
    include_once("class.mysql.php");
    $mysql = new MySql("localhost","companyd_bulksms","abcd1234","companyd_bulksms");
    
    function loginCheck() {
        
        if ($_SESSION['user']['id']>0) {
            return true;
        }
        return false;
    }
    
    function getUserInfo($id) {
        
        global $mysql;
        $data = $mysql->select("select * from _user where id=".$id);
        return $data[0];
    }
    
    function checkCredits($userid) {
        
        global $mysql;
        $data = $mysql->select("select sum(credits)-sum(debits) as bal from _smscredits where userid=".$userid);
        $udata = $mysql->select("select sum(smscount) as used from _mobilesms where userid=".$userid);
        return $data[0]['bal']-$udata[0]['used'];
    }
    
    function checkValidSenderID($userid,$senderid) {
        
        global $mysql;
        $data = $mysql->select("select * from _senderid where sid='".$senderid."' and userid='".$userid."'");
        return (sizeof($data)>0) ? true : false;
    }
    
    function checkValidSenderIDAPI($userid,$senderid) {
        
        global $mysql;
        $data = $mysql->select("select * from _senderid where senderid='".strtoupper($senderid)."' and userid='".$userid."'");
        return $data;
    }
    
    function getSenderIds($userid) {
        
        global $mysql;
        $data = $mysql->select("select * from _senderid where userid='".$userid."'");
        return $data;
    }
    
    function getSenderId($userid,$sid) {
        
        global $mysql;
        $data = $mysql->select("select * from _senderid where sid='".$sid."' and userid='".$userid."'");
        return $data[0];
    }
    
    
        if (isset($_POST['loginBtn'])) {
        
        if ($_POST['role']=="User") {
            $sql = " and isuser=1 ";
        } else {
            $sql = " and isreseller=1";
        }
        
        $data = $mysql->select("select * from _user where emailid='".$_POST['emailid']."' and loginpassword='".$_POST['loginpassword']."' ".$sql);
      //  echo "select * from _user where emailid='".$_POST['emailid']."' and loginpassword='".$_POST['loginpassword']."' ".$sql;
        
        
        if (sizeof($data)>0){
            $_SESSION['user']=$data[0];
            echo "<script>location.href='dashboard.php';</script>";
        } else {
            
              
           $dom = $mysql->select("select * from _cms where domainname='".$_SERVER['HTTP_HOST']."'");
        
        
         if (sizeof($dom)>0) {
            
             echo "<script>location.href='".$dom[0]['errorlogin']."Invalid Login Details';</script>";
         } else {
         
        
           $msg = "<img src='images/exclamation.png'>&nbsp;Invalid Login Details";   
         }
         
            
        }
        
        
    }
    
    
        function isMobileNumber($number) {
        if ($number<=9999999999 && $number>=7000000000) {
            return true;
        }
        return false;
    }
    
    function MessageCount($message) {
    
    //$count = intval(strlen(trim($message))/159);
    $count = intval(mb_strlen(trim($message))/159);
    if ($count>0) {
         if ($count<strlen(trim($message))/159) {
            $count++;
         }
    } else {
        $count = 1;
    }
    return $count;
}

    
?>