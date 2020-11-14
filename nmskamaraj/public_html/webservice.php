<?php
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
    include_once("webadmin/mysql.php");    
    $mysql =   new MySql();   
   echo $_REQUEST['action']();
      
function getsecondcourse() {
            
            global $mysql;
            $dNames = $mysql->select("select * from _tbl_courses where IsActive='1' and Courseid!='".$_GET['Courseid']."' order by CourseName"); 
            if($_GET['Year']=="second"){
                $html = '<select class="form-control" name="SecondCourse" id="SecondCourse" style="float: left;width:100%;text-align:left;padding-right:10px;line-height:normal;border: 1px solid #9dc6a2;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">';
            }else{
                $html = '<select class="form-control" name="SecondCourse" id="SecondCourse" style="float: left;width:100%;text-align:left;padding-right:10px;line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">';    
            }
            if($_GET['Courseid']==0){
                $html .= '<option value="0" selected="selected">Select Second Course</option>';   
                $html .='</select>';
            return $html;  
            }else { 
            if (sizeof($dNames)>0) {
                foreach($dNames as $r) {
                    if (isset($_GET['Scourseid'])) {
                        $html .= '<option value="'.$r['Courseid'].'"   '.(($_GET['Scourseid']==$r['Courseid']) ? ' selected=selected ':'').'>'.$r['CourseName'].'</option>';
                    } else {
                        $html .= '<option value="'.$r['Courseid'].'">'.$r['CourseName'].'</option>';    
                    }
                }
            } else {
               $html .= '<option value="0" selected="selected">Select Second Course</option>';  
            }
            $html .='</select>';
            return $html;
        }
        }
function WeighingFirstYearForm(){
    global $mysql;
    $data = $mysql->select("select * from admission_firstyear where AdmissionID='".$_POST['AdmissionID']."'");
    if($data[0]['IsPaid']=="1"){
    $id=$mysql->execute("update admission_firstyear set Status='4',
                                                        WeightingRemarks='".$_POST['WeightingRemarks']."',
                                                        WeightingOn='".date("Y-m-d H:i:s")."' where AdmissionID='".$_POST['AdmissionID']."'");
    if(sizeof($id)>0){
        
     /*   $message = '<div style="padding:45px;background:#e5e5e5;margin:20px;border-radius:10px;padding-top:20px;padding-bottom:10px;">
                            <div style="text-align:center;padding-bottom:20px;">
                                <img src="http://nmskamarajpolytechnic.com/images/logo.png">&nbsp;&nbsp;
                            </div>
                            <div style="border:0px solid black;text-align:left;padding:30px;background:white;border-radius:10px;">
                                Hello,
                                <br><br>
                                Your Application Approved:
                                <br><br>
                                <p style="text-align:center">
                                    <a href="http://nmskamarajpolytechnic.com/viewsecondyearapplication.php?id='.$_POST['AdmissionID'].'" style="font-size:16px;font-family:Poppins,sans-serif;font-weight:600;color:#ffffff;text-decoration:none;background-color:#3a77ff;border-top:12px solid #3a77ff;border-bottom:12px solid #3a77ff;border-left:36px solid #3a77ff;border-right:36px solid #3a77ff;display:inline-block">VIEW APPLICATION</a>
                                </p>               
                                <br> 
                                Thanks <br>                                                                 
                                NMS Kamaraj Polytechnic College
                            </div>
                            <p style="color:#888;padding:10px;text-align:center">Please do not reply this email. Replies to this message are routed to an unmonitored mailbox. For more information visit our help page or contact us here.</p>
                        </div>';

            $mparam['MailTo']=$_POST['EmailID'];
            $mparam['MemberID']=$id;
            $mparam['Subject']="Application Approved";
            $mparam['Message']=$message;
            MailController::Send($mparam,$mailError);     */
        
        $result = array();
        $result['status']="Success";
        $result['message']="Added to weighting  Successfully.";  
        $result['id']=$_POST['AdmissionID'];  
        return json_encode($result);
    } else {
        $result = array();
        $result['status']="failure";
        $result['message']="failed. please try later.";  
        return json_encode($result);
    }
    }else {
        $result = array();
        $result['status']="failure";
        $result['message']="Not paid";  
        return json_encode($result);
    }
}
function ApproveFirstYearForm(){
    global $mysql;
   /* if($_POST['ApproveFrom']=="FirstApprove"){
        $data = $mysql->select("select * from admission_firstyear where AdmissionID='".$_POST['AdmissionID']."'");
        if($data[0]['IsPaid']=="1"){
            $id=$mysql->execute("update admission_firstyear set Status='2',
                                                                ApproveRemarks='".$_POST['ApproveRemarks']."',
                                                                ApprovedOn='".date("Y-m-d H:i:s")."' where AdmissionID='".$_POST['AdmissionID']."'");
        }else {
            $result = array();
            $result['status']="failure";
            $result['message']="Not paid";  
            return json_encode($result);
        }                                                                                                                       
    }else {  */
        $id=$mysql->execute("update admission_firstyear set Status='2',
                                                                ApproveRemarks='".$_POST['ApproveRemarks']."',
                                                                ApprovedOn='".date("Y-m-d H:i:s")."' where AdmissionID='".$_POST['AdmissionID']."'");
    //}
    if(sizeof($id)>0){
                /*   $message = '<div style="padding:45px;background:#e5e5e5;margin:20px;border-radius:10px;padding-top:20px;padding-bottom:10px;">
                            <div style="text-align:center;padding-bottom:20px;">
                                <img src="http://nmskamarajpolytechnic.com/images/logo.png">&nbsp;&nbsp;
                            </div>
                            <div style="border:0px solid black;text-align:left;padding:30px;background:white;border-radius:10px;">
                                Hello,
                                <br><br>
                                Your Application Approved:
                                <br><br>
                                <p style="text-align:center">
                                    <a href="http://nmskamarajpolytechnic.com/viewsecondyearapplication.php?id='.$_POST['AdmissionID'].'" style="font-size:16px;font-family:Poppins,sans-serif;font-weight:600;color:#ffffff;text-decoration:none;background-color:#3a77ff;border-top:12px solid #3a77ff;border-bottom:12px solid #3a77ff;border-left:36px solid #3a77ff;border-right:36px solid #3a77ff;display:inline-block">VIEW APPLICATION</a>
                                </p>               
                                <br> 
                                Thanks <br>                                                                 
                                NMS Kamaraj Polytechnic College
                            </div>
                            <p style="color:#888;padding:10px;text-align:center">Please do not reply this email. Replies to this message are routed to an unmonitored mailbox. For more information visit our help page or contact us here.</p>
                        </div>';

            $mparam['MailTo']=$_POST['EmailID'];
            $mparam['MemberID']=$id;
            $mparam['Subject']="Application Approved";
            $mparam['Message']=$message;
            MailController::Send($mparam,$mailError);     */
        
                $result = array();
                $result['status']="Success";
                $result['message']="Approved Successfully.";  
                $result['id']=$_POST['AdmissionID'];  
                return json_encode($result);     
            } else {
                $result = array();
                $result['status']="failure";
                $result['message']="Approved failed. please try later.";  
                return json_encode($result);
            }
}
function RejectFirstYearForm(){
    global $mysql;
    $id=$mysql->execute("update admission_firstyear set Status='3',
                                                        RejectRemarks='".$_POST['RejectRemarks']."',
                                                        RejectedOn='".date("Y-m-d H:i:s")."' where AdmissionID='".$_POST['AdmissionID']."'");
    if(sizeof($id)>0){
     
        $result = array();
        $result['status']="Success";
        $result['message']="Rejected Successfully.";  
        $result['id']=$_POST['AdmissionID'];  
        return json_encode($result);
    } else {
        $result = array();
        $result['status']="failure";
        $result['message']="Rejection failed. please try later.";  
        return json_encode($result);
    }
}

function WeighingSecondYearForm(){
    global $mysql;
    $data = $mysql->select("select * from admission_secondyear where AdmissionID='".$_POST['AdmissionID']."'");
    if($data[0]['IsPaid']=="1"){
    $id=$mysql->execute("update admission_secondyear set Status='4',
                                                        WeightingRemarks='".$_POST['WeightingRemarks']."',
                                                        WeightingOn='".date("Y-m-d H:i:s")."' where AdmissionID='".$_POST['AdmissionID']."'");
    if(sizeof($id)>0){
        
     /*   $message = '<div style="padding:45px;background:#e5e5e5;margin:20px;border-radius:10px;padding-top:20px;padding-bottom:10px;">
                            <div style="text-align:center;padding-bottom:20px;">
                                <img src="http://nmskamarajpolytechnic.com/images/logo.png">&nbsp;&nbsp;
                            </div>
                            <div style="border:0px solid black;text-align:left;padding:30px;background:white;border-radius:10px;">
                                Hello,
                                <br><br>
                                Your Application Approved:
                                <br><br>
                                <p style="text-align:center">
                                    <a href="http://nmskamarajpolytechnic.com/viewsecondyearapplication.php?id='.$_POST['AdmissionID'].'" style="font-size:16px;font-family:Poppins,sans-serif;font-weight:600;color:#ffffff;text-decoration:none;background-color:#3a77ff;border-top:12px solid #3a77ff;border-bottom:12px solid #3a77ff;border-left:36px solid #3a77ff;border-right:36px solid #3a77ff;display:inline-block">VIEW APPLICATION</a>
                                </p>               
                                <br> 
                                Thanks <br>                                                                 
                                NMS Kamaraj Polytechnic College
                            </div>
                            <p style="color:#888;padding:10px;text-align:center">Please do not reply this email. Replies to this message are routed to an unmonitored mailbox. For more information visit our help page or contact us here.</p>
                        </div>';

            $mparam['MailTo']=$_POST['EmailID'];
            $mparam['MemberID']=$id;
            $mparam['Subject']="Application Approved";
            $mparam['Message']=$message;
            MailController::Send($mparam,$mailError);     */
        
        $result = array();
        $result['status']="Success";
        $result['message']="Added to weighting  Successfully.";  
        $result['id']=$_POST['AdmissionID'];  
        return json_encode($result);
    } else {
        $result = array();
        $result['status']="failure";
        $result['message']="failed. please try later.";  
        return json_encode($result);
    }
    }else {
        $result = array();
        $result['status']="failure";
        $result['message']="Not paid";  
        return json_encode($result);
    }
}
function ApproveSecondYearForm(){
    global $mysql;
   /* if($_POST['ApproveFrom']=="FirstApprove"){
        $data = $mysql->select("select * from admission_secondyear where AdmissionID='".$_POST['AdmissionID']."'");
        if($data[0]['IsPaid']=="1"){
            $id=$mysql->execute("update admission_secondyear set Status='2',
                                                                 ApproveRemarks='".$_POST['ApproveRemarks']."',
                                                                 ApprovedOn='".date("Y-m-d H:i:s")."' where AdmissionID='".$_POST['AdmissionID']."'");
        }else {
            $result = array();
            $result['status']="failure";
            $result['message']="Not paid";  
            return json_encode($result);
        }
    }else {  */
        $id=$mysql->execute("update admission_secondyear set Status='2',
                                                                 ApproveRemarks='".$_POST['ApproveRemarks']."',
                                                                 ApprovedOn='".date("Y-m-d H:i:s")."' where AdmissionID='".$_POST['AdmissionID']."'");
    //}
    if(sizeof($id)>0){
        
     /*   $message = '<div style="padding:45px;background:#e5e5e5;margin:20px;border-radius:10px;padding-top:20px;padding-bottom:10px;">
                            <div style="text-align:center;padding-bottom:20px;">
                                <img src="http://nmskamarajpolytechnic.com/images/logo.png">&nbsp;&nbsp;
                            </div>
                            <div style="border:0px solid black;text-align:left;padding:30px;background:white;border-radius:10px;">
                                Hello,
                                <br><br>
                                Your Application Approved:
                                <br><br>
                                <p style="text-align:center">
                                    <a href="http://nmskamarajpolytechnic.com/viewsecondyearapplication.php?id='.$_POST['AdmissionID'].'" style="font-size:16px;font-family:Poppins,sans-serif;font-weight:600;color:#ffffff;text-decoration:none;background-color:#3a77ff;border-top:12px solid #3a77ff;border-bottom:12px solid #3a77ff;border-left:36px solid #3a77ff;border-right:36px solid #3a77ff;display:inline-block">VIEW APPLICATION</a>
                                </p>               
                                <br> 
                                Thanks <br>                                                                 
                                NMS Kamaraj Polytechnic College
                            </div>
                            <p style="color:#888;padding:10px;text-align:center">Please do not reply this email. Replies to this message are routed to an unmonitored mailbox. For more information visit our help page or contact us here.</p>
                        </div>';

            $mparam['MailTo']=$_POST['EmailID'];
            $mparam['MemberID']=$id;
            $mparam['Subject']="Application Approved";
            $mparam['Message']=$message;
            MailController::Send($mparam,$mailError);     */
        
        $result = array();
        $result['status']="Success";
        $result['message']="Approved Successfully.";  
        $result['id']=$_POST['AdmissionID'];  
        return json_encode($result);
    } else {
        $result = array();
        $result['status']="failure";
        $result['message']="Approved failed. please try later.";  
        return json_encode($result);
    }
}
function RejectSecondYearForm(){
    global $mysql;
    $id=$mysql->execute("update admission_secondyear set Status='3',
                                                        RejectRemarks='".$_POST['RejectRemarks']."',
                                                        RejectedOn='".date("Y-m-d H:i:s")."' where AdmissionID='".$_POST['AdmissionID']."'");
    if(sizeof($id)>0){
     
        $result = array();
        $result['status']="Success";
        $result['message']="Rejected Successfully.";  
        $result['id']=$_POST['AdmissionID'];  
        return json_encode($result);
    } else {
        $result = array();
        $result['status']="failure";
        $result['message']="Rejection failed. please try later.";  
        return json_encode($result);
    }
}
function CheckDuplicateAadhaar(){
    global $mysql;
    $id=$mysql->select("select * from admission_firstyear where AadhaarNumber='".$_GET['AadhaarNumber']."'");
    if(sizeof($id)>0){
        $result = array();
        $result['status']="Success";
        $result['message']="Aadhaar Number Already Exists"; 
        return json_encode($result);
    } else {
        $result = array();
        $result['status']="failure";
        return json_encode($result);
    }
}
function CheckSecondYearDuplicateAadhaar(){
    global $mysql;
    $id=$mysql->select("select * from admission_secondyear where AadhaarNumber='".$_GET['AadhaarNumber']."'");
    if(sizeof($id)>0){
        $result = array();
        $result['status']="Success";
        $result['message']="Aadhaar Number Already Exists"; 
        return json_encode($result);
    } else {
        $result = array();
        $result['status']="failure";
        return json_encode($result);
    }
}
?> 