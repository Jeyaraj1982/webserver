<?php
    session_start();
   include_once("../config.php");
    include_once("config_client.php");
    include_once("includes/class.BusinessConfig.php");
    include_once("includes/class.WebConfig.php");
    $__Global = $_SERVER;

    class Franchisee  {
        
        function GetDetails($FranchiseeCode) {
            global $mysql;
           $data =  $mysql->select("select * from _tbl_franchisees Where FranchiseeCode='".$FranchiseeCode."'"); 
           return json_encode($data[0]);
         }
        
        function GetNextStaffNumber() {
            
            global $mysql,$_Franchisee;
        
            $prefix = "FS";
            $Rows = $mysql->select("select * from _tbl_franchisees_staffs Where ReferedBy='".$_Franchisee['FranchiseeID']."'");
        
            $nextNumber = sizeof($Rows)+1; 
         
            if (sizeof($nextNumber)==1) {
                $prefix .= "000".$nextNumber; 
            }
        
            if (sizeof($nextNumber)==2) {
                $prefix .= "00".$nextNumber; 
            }
        
            if (sizeof($nextNumber)==3) {
                $prefix .= "0".$nextNumber; 
            }
        
            if (sizeof($nextNumber)==4) {   
                $prefix .= $nextNumber; 
            }
            
            return $prefix;
        }
    }
    
    class Paypal  {
        
        function GetNextPaypalNumber() {
            
            global $mysql;
        
            $prefix = "PAL";
            $Rows = $mysql->select("select * from _tbl_settings_paypal");
        
            $nextNumber = sizeof($Rows)+1; 
         
            if (sizeof($nextNumber)==1) {
                $prefix .= "000".$nextNumber; 
            }
        
            if (sizeof($nextNumber)==2) {
                $prefix .= "00".$nextNumber; 
            }
        
            if (sizeof($nextNumber)==3) {
                $prefix .= "0".$nextNumber; 
            }
        
            if (sizeof($nextNumber)==4) {   
                $prefix .= $nextNumber; 
            }
            
            return $prefix;
        }
    }
    
    class MobileSMS{
        
        function GetNextMobileSMSNumber() {
            
            global $mysql;
        
            $prefix = "SMS";
            $Rows = $mysql->select("select * from _tbl_settings_mobilesms");
        
            $nextNumber = sizeof($Rows)+1; 
         
            if (sizeof($nextNumber)==1) {
                $prefix .= "000".$nextNumber; 
            }
        
            if (sizeof($nextNumber)==2) {
                $prefix .= "00".$nextNumber; 
            }
        
            if (sizeof($nextNumber)==3) {
                $prefix .= "0".$nextNumber; 
            }
        
            if (sizeof($nextNumber)==4) {   
                $prefix .= $nextNumber; 
            }
            
            return $prefix;
        }
    }
    
    class Admin{
        
        function GetNextAdminStaffNumber() {
            
            global $mysql;
        
            $prefix = "AS";
            $Rows = $mysql->select("select * from _tbl_admin_staffs");
        
            $nextNumber = sizeof($Rows)+1; 
         
            if (sizeof($nextNumber)==1) {
                $prefix .= "000".$nextNumber; 
            }
        
            if (sizeof($nextNumber)==2) {
                $prefix .= "00".$nextNumber; 
            }
        
            if (sizeof($nextNumber)==3) {
                $prefix .= "0".$nextNumber; 
            }
        
            if (sizeof($nextNumber)==4) {   
                $prefix .= $nextNumber; 
            }
            
            return $prefix;
        }
    }
    
    class MemberPlan{
        
        function GetNextMemberPlanNumber() {
            
            global $mysql;
        
            $prefix = "PLN";
            $Rows = $mysql->select("select * from _tbl_member_plan");
        
            $nextNumber = sizeof($Rows)+1; 
         
            if (sizeof($nextNumber)==1) {
                $prefix .= "000".$nextNumber; 
            }
        
            if (sizeof($nextNumber)==2) {
                $prefix .= "00".$nextNumber; 
            }
        
            if (sizeof($nextNumber)==3) {
                $prefix .= "0".$nextNumber; 
            }
        
            if (sizeof($nextNumber)==4) {   
                $prefix .= $nextNumber; 
            }
            
            return $prefix;                                
        }
    }
  
    class MemberNews{
        
        function GetNextMemberNewsNumber() {
            
            global $mysql;
        
            $prefix = "NE";
            $Rows = $mysql->select("select * from _tbl_franchisees_news");
        
            $nextNumber = sizeof($Rows)+1; 
         
            if (sizeof($nextNumber)==1) {
                $prefix .= "000".$nextNumber; 
            }
        
            if (sizeof($nextNumber)==2) {
                $prefix .= "00".$nextNumber; 
            }
        
            if (sizeof($nextNumber)==3) {
                $prefix .= "0".$nextNumber; 
            }
        
            if (sizeof($nextNumber)==4) {   
                $prefix .= $nextNumber; 
            }
            
            return $prefix;
        }
    }
     
    
    function GetUrl($Param) {
       return SiteUrl.$Param;
    }
   
    function putDateTime($dateTime) {
        return date("M d, Y H:i",strtotime($dateTime));
    }
    
    function putDate($date) {
        return date("M d, Y",strtotime($date));
    }
    
    $loginID = "";
    
    
    if (isset($_SESSION['UserDetails']) && ($_SESSION['UserDetails']['FranchiseeID']>0)) {
        $_Franchisee     = $_SESSION['UserDetails'];
        $_FranchiseeInfo = $_SESSION['FranchiseeDetails'];
        $loginID         = $_Franchisee['LoginID'];
        define("UserRole","Franchisee");     
    } else  if (isset($_SESSION['AdminDetails']) && ($_SESSION['AdminDetails']['AdminID']>0)) {
        $_Admin  = $_SESSION['AdminDetails'];
        $loginID = $_Admin['LoginID'];
        define("UserRole","Admin");
    } else if (isset($_SESSION['MemberDetails']) && ($_SESSION['MemberDetails']['MemberID']>0)) {
        $_Member = $_SESSION['MemberDetails'];
        $loginID = $_Member['LoginID'];
        define("UserRole","Member");
    } else {
        if (!( isset($_POST['login']) || isset($_GET['uid']) )) {
        echo "<script>alert('session expired. login again');location.href='".DomainName."';</script>";
        }
    }                        
     
    class Webservice {
        
        var $serverURL="";
        
        public function __construct() {
            global $loginID;
            $this->serverURL  = WebServiceUrl. "webservice.php?rand=2&LoginID=".$loginID."&"; 
        }
        
        function CreateMember($param) {
            return json_decode($this->_callUrl("m=Franchisee&a=CreateMember",$param),true);
        }
        
        function GetMemberCode($param) {
            return json_decode($this->_callUrl("m=Franchisee&a=GetMemberCode",$param),true);
        }
        
        function GetMyMembers($param) {
            return json_decode($this->_callUrl("m=Franchisee&a=GetMyMembers",$param),true);
        }
        
        function GetMyActiveMembers($param) {
            return json_decode($this->_callUrl("m=Franchisee&a=GetMyActiveMembers",$param),true);
        }
        
        function GetMyDeactiveMembers($param) {
            return json_decode($this->_callUrl("m=Franchisee&a=GetMyDeactiveMembers",$param),true);
        }
        
        function GetMemberDetails($param) {
            return json_decode($this->_callUrl("m=Franchisee&a=GetMemberDetails",$param),true);
        }
        
        function EditMember($param) {
            return json_decode($this->_callUrl("m=Franchisee&a=EditMember",$param),true);
        }
        
        function SearchMemberDetails($param) {
            return json_decode($this->_callUrl("m=Franchisee&a=SearchMemberDetails",$param),true);
        }
        
        function RefillWallet($param) {
            return json_decode($this->_callUrl("m=Franchisee&a=RefillWallet",$param),true);
        }
        
        function ResetPassword($param) {
            return json_decode($this->_callUrl("m=Franchisee&a=ResetPassword",$param),true);
        }
        
        function GetManageStaffs($param) {
            return json_decode($this->_callUrl("m=Franchisee&a=GetManageStaffs",$param),true);
        }
        
        function CreateFranchiseeStaff($param) {
            return json_decode($this->_callUrl("m=Franchisee&a=CreateFranchiseeStaff",$param),true);
        }
        
        function GetFranchiseeStaffCodeCode($param) {
            return json_decode($this->_callUrl("m=Franchisee&a=GetFranchiseeStaffCodeCode",$param),true);
        }
        
        function EditFranchiseeStaff($param) {
            return json_decode($this->_callUrl("m=Franchisee&a=EditFranchiseeStaff",$param),true);
        }
        
        function GetStaffs($param) {
            return json_decode($this->_callUrl("m=Franchisee&a=GetStaffs",$param),true);
        }
        
        function ChangePassword($param) {
            return json_decode($this->_callUrl("m=Franchisee&a=ChangePassword",$param),true);
        }
        
         
        function AdminChangePassword($param) {
              return json_decode($this->_callUrl("m=Admin&a=AdminChangePassword",$param),true);
        }
        function CreateFranchisee($param) {
              return json_decode($this->_callUrl("m=Admin&a=CreateFranchisee",$param),true);
        }
        function GetFranchiseeCode($param) {
              return json_decode($this->_callUrl("m=Admin&a=GetFranchiseeCode",$param),true);
        }
        function GetManageFranchisee($param) {
              return json_decode($this->_callUrl("m=Admin&a=GetManageFranchisee",$param),true);
        }
        function GetManageActiveFranchisee($param) {
              return json_decode($this->_callUrl("m=Admin&a=GetManageActiveFranchisee",$param),true);
        }
        function GetManageDeactiveFranchisee($param) {
              return json_decode($this->_callUrl("m=Admin&a=GetManageDeactiveFranchisee",$param),true);
        }
        function GetFranchiseeInfo($param) {
              return json_decode($this->_callUrl("m=Admin&a=GetFranchiseeInfo",$param),true);
        }
        function GetFranchiseePrimaryAccountDetails($param) {
              return json_decode($this->_callUrl("m=Admin&a=GetFranchiseePrimaryAccountDetails",$param),true);
        }
        function GetFranchiseeStaffProfileInfo($param) {
              return json_decode($this->_callUrl("m=Admin&a=GetFranchiseeStaffProfileInfo",$param),true);
        }
        function EditFranchisee($param) {
              return json_decode($this->_callUrl("m=Admin&a=EditFranchisee",$param),true);
        }
        function GetManagePlans($param) {
              return json_decode($this->_callUrl("m=Admin&a=GetManagePlans",$param),true);
        }
        function GetManageActivePlans($param) {
              return json_decode($this->_callUrl("m=Admin&a=GetManageActivePlans",$param),true);
        }
        function GetManageDeactivePlans($param) {
              return json_decode($this->_callUrl("m=Admin&a=GetManageDeactivePlans",$param),true);
        }
        function GetNextFranchiseePlanNumber($param) {
              return json_decode($this->_callUrl("m=Admin&a=GetNextFranchiseePlanNumber",$param),true);
        }
        function CreateFranchiseePlan($param) {
              return json_decode($this->_callUrl("m=Admin&a=CreateFranchiseePlan",$param),true);
        }
        function EditFranchiseePlan($param) {
              return json_decode($this->_callUrl("m=Admin&a=EditFranchiseePlan",$param),true);
        }
        function GetFranchiseePlanInfo($param) {
              return json_decode($this->_callUrl("m=Admin&a=GetFranchiseePlanInfo",$param),true);
        }
        function GetFranchiseeRefillWalletManage($param) {
              return json_decode($this->_callUrl("m=Admin&a=GetFranchiseeRefillWalletManage",$param),true);
        }
        function GetFranchiseeManageNewsandEvents($param) {
              return json_decode($this->_callUrl("m=Admin&a=GetFranchiseeManageNewsandEvents",$param),true);
        }
        
        
        function GetMastersManageDetails($param) {
              return json_decode($this->_callUrl("m=Admin&a=GetMastersManageDetails",$param),true);
        }
        
        function GetMasterAllViewInfo($param) {
              return json_decode($this->_callUrl("m=Admin&a=GetMasterAllViewInfo",$param),true);
        }
         
        function GetManageEmailApi($param) {
              return json_decode($this->_callUrl("m=Admin&a=GetManageEmailApi",$param),true);
        }
        /*
        function MemberChangePassword($param) {
              return json_decode($this->_callUrl("m=Member&a=MemberChangePassword",$param),true);
        } */
        
        function GetMyDraftProfiles($param) {
            return json_decode($this->_callUrl("m=Member&a=GetMyDraftProfiles",$param),true);
        }
        
        function GetMemberInfo($param) {
              return json_decode($this->_callUrl("m=Member&a=GetMemberInfo",$param),true);
        }
        
        function WelcomeMessage($param) {
            return json_decode($this->_callUrl("m=Member&a=WelcomeMessage",$param),true);
        }
        
        function GetCodeMasterDatas($param) {
              return json_decode($this->_callUrl("m=Member&a=GetCodeMasterDatas",$param),true);
        }
        
        function CreateProfile($param) {
            return json_decode($this->_callUrl("m=Member&a=CreateProfile",$param),true);
        }
        
        function EditProfile($param) {
            return json_decode($this->_callUrl("m=Member&a=EditProfile",$param),true);
        }
        
        function GetDraftProfileInformation($param) {
            return json_decode($this->_callUrl("m=Member&a=GetDraftProfileInformation",$param),true);
        }
        
        function EditDraftGeneralInformation($param) {
              return json_decode($this->_callUrl("m=Member&a=EditDraftGeneralInformation",$param),true);
        }
        
        function GetMyEmails($param) {
              return json_decode($this->_callUrl("m=Member&a=GetMyEmails",$param),true);
        }
        
        function GetAdvancedSearchElements($param) {
              return json_decode($this->_callUrl("m=Member&a=GetAdvancedSearchElements",$param),true);
        }
        
        function GetBasicSearchElements($param) {
              return json_decode($this->_callUrl("m=Member&a=GetBasicSearchElements",$param),true);
        }
        
        function EditMemberInfo($param) {
              return json_decode($this->_callUrl("m=Member&a=EditMemberInfo",$param),true);
        }
        
        function SaveBasicSearch($param) {
              return json_decode($this->_callUrl("m=Member&a=SaveBasicSearch",$param),true);
        }
        function updateProfilePhoto($param) {
              return json_decode($this->_callUrl("m=Member&a=updateProfilePhoto",$param),true);
        }
        function GetKYC($param) {
              return json_decode($this->_callUrl("m=Member&a=GetKYC",$param),true);
        }
        function UpdateKYC($param) {
              return json_decode($this->_callUrl("m=Member&a=UpdateKYC",$param),true);
        }
        
        function getData($method,$action,$param=array()) {
            return json_decode($this->_callUrl("m=".$method."&a=".$action,$param),true);
        }
        
        function _callUrl($method,$param) {
            
            global $__Global;
            $postvars = '';
            foreach($param as $key=>$value) {
                $postvars .= $key . "=" . $value . "&";
            }
            foreach($_GET as $key=>$value) {
                $postvars .= $key . "=" . $value . "&";
            }
            $postvars .= "qry=".base64_encode(json_encode(array("UserAgent"=>$__Global['HTTP_USER_AGENT'],"IPAddress"=>$__Global['REMOTE_ADDR'])));
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL,$this->serverURL.$method."&User=".(isset($_SESSION['UserData']['MemberID']) ? $_SESSION['UserData']['MemberID'] : ""));
            curl_setopt($ch,CURLOPT_POST, 1);
            curl_setopt($ch,CURLOPT_POSTFIELDS,$postvars);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
            curl_setopt($ch,CURLOPT_TIMEOUT, 200);
            $response = curl_exec($ch);
            curl_close ($ch);
            return $response;
        }
    }
    
    $webservice = new Webservice($loginID);
     
    if (isset($_GET['action']) && $_GET['action']=="logout") {
        
        if (isset($_Franchisee['LoginID'])) {
            $loginID = $_Franchisee['LoginID'];
        } else if (isset($_Member['LoginID'])) {
            $response = $webservice->getData("Member","Logout");
        } else {
            $loginID = $_Admin['LoginID'];
        }
        unset($_SESSION);
        session_destroy();
        sleep(3);
        //header("Location:".$_GET['redirect']);
        //header("Location: '".DomainName."'");
        echo "<script>location.href='".DomainName."';</script>";
    }
    
    class J2JDashboard {
        
        function showSuccessMsg($message) {
            return "<div style='border:1px solid #d5d5d5;background:#a5f296;color:green;padding:10px 20px;border-radius: 10px;margin-bottom: 20px;'>".$message."</div>";
        }
        
        function showErrorMsg($message) {
            return "<div style='border:1px solid #d5d5d5;background:#ff0000;color:green;padding:10px 20px;border-radius: 10px;margin-bottom: 20px;'>".$message."</div>";
        }
    }
    $dashboard = new J2JDashboard();                                 
    
    /* CData */
    $_Month = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
    $_SES = array("AM","PM");
    $_DOB_Year_Start = date("Y")-18;
    $_DOB_Year_End = (date("Y")-18)-55;
  
  function time_elapsed_string($datetime, $full = false) {
      return putDateTime($datetime); 
                 if ($datetime=="") {
      return putDateTime($datetime);               
                 }
      
    $now = new DateTime;
    $datetime = strtotime($datetime);
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

     if ($diff->d >= 1) {
         return putDateTime($datetime);
    }
    
    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;
     
    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

class JHTML {  
    function li($text,$attributes=array()) {
        $r = "<li ";
        foreach($attributes as $attr=>$value) {
            $r.= $attr.="'".$value."' ";
        }
        return $r." >".$text."</li>";
    }
    function td($text,$attributes=array()) {
        $r = "<td ";
        foreach($attributes as $attr=>$value) {
            $r.= $attr.="'".$value."' ";
        }
        return $r." >".$text."</td>";
    }
    function th($text,$attributes=array()) {
        $r = "<th ";
        foreach($attributes as $attr=>$value) {
            $r.= $attr."='".$value."' ";
        }
        return $r." >".$text."</th>";
    }
     function span($text,$attributes=array()) {
        $r = "<span ";
        foreach($attributes as $attr=>$value) {
            $r.= $attr."='".$value."' ";
        }
        return $r." >".$text."</span>";
    }
    function a($text,$attributes=array()) {
        $r = "<a ";
        foreach($attributes as $attr=>$value) {
            $r.= $attr."='".$value."' ";
        }
        return $r." >".$text."</a>";
    }
    
}
$html = new JHTML();


 
?>