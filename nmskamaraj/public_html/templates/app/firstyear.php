<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php
define("SSLC_MARK_MINIMUM",35);
define("SSLC_MARK_MAXIMUM",100);
define("HSC_MARK_MINIMUM",35);
define("HSC_MARK_MAXIMUM",100);
define("YEAR_STARTING",date("Y")-15);
define("YEAR_ENDING",date("Y"));
$month = array("","JAN","FEB","MAR","APR","MAY","JUN","JUL","AUG","SEP","OCT","NOV","DEC");
   $mysql =   new MySql();  
     
    
     function removeQuotes($str) {
        $s = str_replace("'","",$str);
        $s = str_replace('"',"",$s);
        return $s;
    }
        
        
                            if (isset($_POST['submitForm'])) {
                                  
                                  if($_POST['Nationality']=="Others"){
                                      $othernationality = $_POST['AdditionalNationality'];
                                  }else {
                                      $othernationality = "";
                                  }
                                  if($_POST['Mothertongue']=="Others"){
                                      $otherMothertongue = $_POST['AdditionalMothertongue'];
                                  }else {
                                      $otherMothertongue = "";
                                  }
                                  $firstcourse = $mysql->select("select * from _tbl_courses where Courseid='".$_POST['FirstCourse']."'");
                                  $secondcourse = $mysql->select("select * from _tbl_courses where Courseid='".$_POST['SecondCourse']."'");
                                    $id =  $mysql->insert("admission_firstyear",array("AcademicYear"                    =>"2020 - 2021",
                                                                                       "filepath1"                       =>removeQuotes($_POST['uploadimage1']),
                                                                                       "FirstCourseID"                   =>removeQuotes($_POST['FirstCourse']),
                                                                                       "FirstCourse"                     =>removeQuotes($firstcourse[0]['CourseName']),
                                                                                       "SecondCourseID"                  =>removeQuotes($_POST['SecondCourse']),
                                                                                       "SecondCourse"                    =>removeQuotes($secondcourse[0]['CourseName']),
                                                                                       "PreviousTotalMarks"              =>removeQuotes($_POST['PreviousTotalMarks']),
                                                                                       "CandidiateName"                  =>removeQuotes($_POST['CandidiateName']),
                                                                                       "ParentName"                      =>removeQuotes($_POST['ParentName']),
                                                                                       "Address1"                        =>removeQuotes($_POST['Address1']),
                                                                                       "Address2"                        =>removeQuotes($_POST['Address2']),
                                                                                       "Address3"                        =>removeQuotes($_POST['Address3']),
                                                                                       "Address4"                        =>removeQuotes($_POST['Address4']),
                                                                                       "Pincode"                         =>removeQuotes($_POST['Pincode']),
                                                                                       "AadhaarNumber"                   =>removeQuotes($_POST['AadhaarNumber']),
                                                                                       "FathersMobile"                   =>removeQuotes($_POST['FathersMobile']),
                                                                                       "MothersMobile"                   =>removeQuotes($_POST['MothersMobile']),
                                                                                       "Nationality"                     =>removeQuotes($_POST['Nationality']),
                                                                                       "AdditionalNationality"           =>removeQuotes($othernationality),
                                                                                       "NativeDistrict"                  =>removeQuotes($_POST['NativeDistrict']),
                                                                                       "PlaceofBirth"                    =>removeQuotes($_POST['PlaceofBirth']),
                                                                                       "Mothertongue"                    =>removeQuotes($_POST['Mothertongue']),
                                                                                       "AdditionalMothertongue"          =>removeQuotes($otherMothertongue),
                                                                                       "Gender"                          =>removeQuotes($_POST['Gender']),
                                                                                       "DateofBirth"                     =>removeQuotes($_POST['DateofBirth']),
                                                                                       "Religion"                        =>removeQuotes($_POST['Religion']),
                                                                                       "OtherReligion"                   =>removeQuotes($_POST['OtherReligion']),
                                                                                       "Community"                       =>removeQuotes($_POST['Community']),
                                                                                       "Caste"                           =>removeQuotes($_POST['Caste']),
                                                                                       "CommunityCertificateNo"          =>removeQuotes($_POST['CommunityCertificateNo']),
                                                                                       "DesignationofTheOfficer"         =>removeQuotes($_POST['DesignationofTheOfficer']),
                                                                                       "DivisionName"                    =>removeQuotes($_POST['DivisionName']),
                                                                                       "TalukName"                       =>removeQuotes($_POST['TalukName']),
                                                                                       "ExaminationPassed"               =>removeQuotes($_POST['ExaminationPassed']),
                                                                                       "PassedYear"                      =>removeQuotes($_POST['YearofPassing']),
                                                                                       "SubjectTamil"                    =>removeQuotes($_POST['Subject_Tamil']),
                                                                                       "TamilPassMnth"                   =>removeQuotes($_POST['Subject_Tamil_Passing_Month']),
                                                                                       "TamilPassYear"                   =>removeQuotes($_POST['Subject_Tamil_Passing_YEAR']),
                                                                                       "SubjectEnglish"                  =>removeQuotes($_POST['Subject_English']),
                                                                                       "EnglishPassMnth"                 =>removeQuotes($_POST['Subject_English_Passing_Month']),
                                                                                       "EnglishPassYear"                 =>removeQuotes($_POST['Subject_English_Passing_YEAR']),
                                                                                       "SubjectMathemetics"              =>removeQuotes($_POST['Subject_Mathametics']),
                                                                                       "MathsPassMnth"                   =>removeQuotes($_POST['Subject_Mathametics_Passing_Month']),
                                                                                       "MathsPassYear"                   =>removeQuotes($_POST['Subject_Mathametics_Passing_YEAR']),
                                                                                       "SubjectScience"                  =>removeQuotes($_POST['Subject_Science']),
                                                                                       "SciencePassMnth"                 =>removeQuotes($_POST['Subject_Science_Passing_Month']),
                                                                                       "SciencePassYear"                 =>removeQuotes($_POST['Subject_Science_Passing_YEAR']),
                                                                                       "SubjectSocial"                   =>removeQuotes($_POST['Subject_Social']),
                                                                                       "SocialPassMnth"                  =>removeQuotes($_POST['Subject_Social_Passing_Month']),
                                                                                       "SocialPassYear"                  =>removeQuotes($_POST['Subject_Social_Passing_YEAR']),
                                                                                       "SubjectTotal"                    =>removeQuotes($_POST['TotalMarks']),
                                                                                       "PassingMonth"                    =>removeQuotes($_POST['Passing_Month']),
                                                                                       "PassingYear"                     =>removeQuotes($_POST['Passing_YEAR']),
                                                                                       "HSCPassMnth"                     =>removeQuotes($_POST['Eleven_Passing_Month']),                          
                                                                                       "HSCPassYear"                     =>removeQuotes($_POST['Eleven_Passing_YEAR']),
                                                                                       "HSCInstitute"                    =>removeQuotes($_POST['NameoftheInstitutionEleven']),
                                                                                       "SSLCPassMnth"                    =>removeQuotes($_POST['SSLC_Passing_Month']),
                                                                                       "SSLCPassYear"                    =>removeQuotes($_POST['SSLC_Passing_YEAR']),
                                                                                       "SSLCInstitute"                   =>removeQuotes($_POST['NameoftheInstitutionSSLC']),
                                                                                       "DeclarationName"                 =>removeQuotes($_POST['DeclarationName']),
                                                                                       "SonorDaughterof"                 =>removeQuotes($_POST['SonorDaughterof']),
                                                                                       "EmailID"                         =>removeQuotes($_POST['EmailID']),
                                                                                       "Place"                           =>removeQuotes($_POST['Place']),
                                                                                       "Certificate1"                    =>removeQuotes($_POST['uploadcertificate1']),
                                                                                       "Status"                          =>"1",
                                                                                       "CreatedOn"                       =>date("Y-m-d H:i:s")));
                                                                                       
                             if ($_POST['Community']=="ST" || $_POST['Community']=="SC" || $_POST['Community']=="SC(A)"  ) {                                                             
                                    $paymentid = $mysql->insert("_tblPayments",array("TxnDate"    => date("Y-m-d H:i:s"),
                                                 "TxnAmount"  => "0",
                                                 "FormID"   => $id,
                                                 "TblName"   => 'sc/stadmission_firstyear',
                                                 "PaymentFor" => $paymentfor));
                                     $mysql->execute("update admission_firstyear set IsPaid='2', PaymentID='".$paymentid."', PaidOn='".date("Y-m-d H:i:s")."' where AdmissionID=".$id);        
                                     
                                 
                             }
                                  
        if ($id>0) { 
         
            $message = '<div style="padding:45px;background:#e5e5e5;margin:20px;border-radius:10px;padding-top:20px;padding-bottom:10px;">
                            <div style="text-align:center;padding-bottom:20px;">
                                <img src="https://www.nmskamarajpolytechnic.com/images/nms_logo.png">&nbsp;&nbsp;
                            </div>
                            <div style="border:0px solid black;text-align:left;padding:30px;background:white;border-radius:10px;">
                                Hello,
                                <br><br>
                                Your Application Saved:
                                <br><br>
                                <p style="text-align:center">
                                    <a href="https://nmskamarajpolytechnic.com/viewfirstyearapplication.php?id='.$id.'" style="font-size:16px;font-family:Poppins,sans-serif;font-weight:600;color:#ffffff;text-decoration:none;background-color:#3a77ff;border-top:12px solid #3a77ff;border-bottom:12px solid #3a77ff;border-left:36px solid #3a77ff;border-right:36px solid #3a77ff;display:inline-block">VIEW APPLICATION</a>
                                </p>               
                                <br> 
                                Thanks <br>                                                                 
                                NMS Kamaraj Polytechnic College
                            </div>
                            <p style="color:#888;padding:10px;text-align:center">Please do not reply this email. Replies to this message are routed to an unmonitored mailbox. For more information visit our help page or contact us here.</p>
                        </div>';

            $mparam['MailTo']=$_POST['EmailID'];
            $mparam['MemberID']=$id;
            $mparam['Subject']="Applicant Registration Completed";
            $mparam['Message']=$message;
            MailController::Send($mparam,$mailError);     
            
            
            ?>
            
            <section class="kamaraj-contact-field">
                <div class="container">
                    <div class="row" >
                        <div class="col-md-2"></div>
                        <div class="col-md-8" style="margin:0px auto !important;border-radius: 10px;background: #fff;padding-bottom: 0px;text-align:center">
                            <div class="kamaraj-contact-col">
                                <div class="row">
                                    <div class="registration_form_control">
                                        <label>
                                            <img src="images/tick.jpg" style="width:120px"><br> <br>
                                            <?php
                                                    if ($_POST['Community']=="ST" || $_POST['Community']=="SC" || $_POST['Community']=="SC(A)"  ) {  
                             
                                            ?>
                                            <h3 style='font-weight:bold;'>Your Application submitted</h3>
                                           <span> Application Reference Number: 202021-<?php echo $id;?>-<?php echo $paymentid;?><br>
                                           
                                           <?php } else {?>
                                               <h3 style='font-weight:bold;'>Your Application Saved</h3>
                                           <span> Application Reference Number: 202021-<?php echo $id;?><br>
                                           <form action="https://nmskamarajpolytechnic.com/pay.php" method="post">
                                            <input type="hidden" name="recordx" value="admission_firstyear">
                                            <input type="hidden" name="record" value="<?php echo md5('x'.$id);?>">
                                            <input type="submit" value="Pay Rs. 150" class="btn btn-success">
                                           </form>
                                           <?php } ?>
                                            </span>
                                        </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
       <?php } else {   ?>
            <section class="kamaraj-contact-field">
                <div class="container">
                    <div class="row" >
                        <div class="col-md-2"></div>
                        <div class="col-md-8" style="margin:0px auto !important;border: 2px solid #bad8f7;padding: 50px;border-radius: 10px;background: #fff;padding-bottom: 0px;text-align:center">
                            <div class="kamaraj-contact-col">
                                <div class="row">
                                    <div class="registration_form_control">
                                        <label>
                                            <span style='Color:Blue;font-weight:bold;'>Couldn't your information<br>
                                            </span>
                                        </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php }
    } else {
   ?>
    <style>
.errorstring{width:100%;font-size:11px;color:red;}
</style>
    <script>
    
     function is_Alphabets(acname) {
    
        if (acname.length==0) {
            return false;
        }
        var reg = /^[a-z0-9\-\s]+$/i
        if (acname.match(reg)) {
            return true
        }
        return false;
    }
    function is_AlphaNumeric(acname) {
    
        if (acname.length==0) {
            return false;
        }
       // var reg = /[a-zA-Z]|\d|\s|\./
        var reg = /^[a-zA-Z\s\.]+$/
        if (acname.match(reg)) {
            return true
        }
        return false;
    }
    function is_Numeric(acname) {
    
        if (acname.length==0) {
            return false;
        }         
        var reg = /^[0-9]*$/i
        if (acname.match(reg)) {
            return true
        }
        return false;
    }
    
 function IsEmail(email) {
        if (email.length==0) {
            return false;
        }
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,8})$/
        if (email.match(reg)) {
            return true
        }
        return false;
    } 
 
   function sportsplayer(action) {
if(action=="Show") {
  $("#sports-selected").show();  
}else {
  $("#sports-selected").hide();    
}
}

function AgeCalc() {
 
    if($("#DateofBirth").val()!=""){
 
var From_date = new Date($("#DateofBirth").val());
var To_date = new Date();
var diff_date =  To_date - From_date;
 
var years = Math.floor(diff_date/31536000000);
$('#Age').val(years);
 //alert(years);
}
}        
function adnationality(){
   if($('#Nationality').val()=="Others") { 
    $("#AdditionalNationality").show(); 
   }else {
     $("#AdditionalNationality").hide();   
   }
}
function admothertongue(){
   if($('#Mothertongue').val()=="Others") { 
    $("#AdditionalMothertongue").show(); 
   }else {
     $("#AdditionalMothertongue").hide();   
   }
}
function adreligion(){
   if($('#Religion').val()=="Others") { 
    $("#OtherReligion").show(); 
   }else {
     $("#OtherReligion").hide();   
   }
}
function getSecondCourse(Courseid) {
        $.ajax({url:'../webservice.php?action=getsecondcourse&Courseid='+Courseid,success:function(data){
            $('#div_SecondCourse').html(data);      
        }});
    }
function getDeclrationName(CandidiateName){
   $("#DeclarationName").val($("#CandidiateName").val());  
}
function getDeclrationParentName(ParentName){
   $("#SonorDaughterof").val($("#ParentName").val());  
}
</script>
    <section class="kamaraj-contact-field"  style="background:#444;">
        <div class="container">
            <div class="row" >
                <div class="col-md-12">
                    <div style="border:1px solid green;background:#fff;padding:10px;margin-bottom:10px;width: 870px;margin:0px auto;border-radius:10px">
                    <table style="margin:0px auto">
                        <tr>
                            <td style="width:100px;">
                            <img src="https://www.inwayhosting.com/assets/images/phone.jpg" style="width:80px">
                            </td>
                            <td style="text-align:center;font-size:17px;line-height:30px;color:#555;">
                            Admission Help Line Number<br><b style="font-size:30px;color:green">+91 9442906414</b>
                            </td>
                        </tr>
                    </table>
                    </div>
                    <br>
                    <div style="background:#ffeaf4;padding:20px;width: 870px;margin:0px auto;border:1px solid #f24395;border-radius:10px">
                        <form action="" method="POST" onsubmit="return doConfrim()">
                        <input type="hidden" name="EmailID" id="EmailID">
                            <table style="width:100%" style="font-size:13px;font-family:arial;color:#222">
                            <tr>
                                <td colspan="3" style="padding-bottom:10px;">
                                    <div>
                                        <div style="width:100px;float:left">
                                            <img style="width:100px" src="https://www.nmskamarajpolytechnic.com/images/nms_logo.png">
                                        </div>
                                        <div style="float:left;padding:0px 5px;">
                                            <div style="font-size:16px;font-weight:bold;text-align:center;color:#222">Nadar Mahajana Sangam</div>
                                            <div style="font-size:32px;font-weight:bold;text-align:center;padding:5px;color:#222;font-family:arial">KAMARAJ POLYTECHNIC COLLEGE</div>
                                            <div style="font-size:16px;font-weight:bold;text-align:center;color:#222">Pazhavilai, Kanyakumari District - 629 501</div>
                                            <div style="font-size:14px;font-weight:bold;text-align:center;color:#222">Phone No : 04652-253900, Email: kamarajpolytechniccollege@gmail.com, nmskptc_2003@yahoo.co.in</div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <div style="background:#d10e69;color:#fff;padding:10px;text-align:center;font-weight:bold;font-size:18px;letter-spacing:1.2px;">
                                        APPLICATION FOR ADMISSION TO FIRST YEAR DIPLOMA COURSES - 2020-21
                                    </div>
                                </td>
                            </tr>                                 
                             <tr>
                                    <td colspan="3">&nbsp;</td>
                                </tr> 
                                
                                   <tr>
                                   <td colspan="3">
                                        <div style="float:right;border: 1px solid black;background: #fff;padding:5px;width:130px;height:170px;text-align:center;border:1px solid #f9cae0">
                                            <input type="hidden" name="uploadimage1" id="uploadimage1">
                                            <input type="file" onchange="image1_onchage()" name="image1" id="image1" style="display: none;">
                                            <div id="div_1">
                                                <img id="src_image1" onclick="uploadimage('1')" src="https://nmskamarajpolytechnic.com/images/usericon1.png" style="width:100%;opacity: 0.3;cursor: pointer;background: #d10e69;">
                                            </div> 
                                            <div id="Errimage1" style="text-align: right;padding-top: 5px;" class="errorstring" ></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3"><div id="Errimage" style="text-align:right;padding-top: 5px;" class="errorstring" ></div></td>
                                </tr>
                            <tr>
                                <td colspan="3">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="padding: 5px;text-align:left;width:30px">&nbsp;</td>
                                <td>Select Course</td>
                                <td>
                                    <select name="FirstCourse" id="FirstCourse" onchange="getSecondCourse($(this).val())" style="float: left;width:100%;text-align:left;padding-right:10px;line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                        <option value="0">Select First Course</option>
                                        <?php
                                            $Courses = $mysql->select("select * from _tbl_courses where IsActive='1' order by CourseName"); 
                                            foreach($Courses as $Course){ ?>
                                            <option value="<?php echo $Course['Courseid'];?>" <?php echo (($_POST['FirstCourse']==$Course['CourseName']) ? " selected='selected' " : "");?>><?php echo $Course['CourseName'];?></option>
                                        <?php } ?> 
                                    </select>
                                    <div id="ErrFirstCourse" class="errorstring"></div>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 5px;text-align:left;width:30px">&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>
                                    <div id="div_SecondCourse">
                                        <select class="form-control" name="SecondCourse" id="SecondCourse" style="float: left;width:100%;text-align:left;padding-right:10px;line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                        <option value="0" selected="selected">Select Second Course</option> 
                                        </select> 
                                    </div>
                                    <div id="ErrSecondCourse" class="errorstring"></div>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:5px;text-align:left;width:30px;">1.</td>
                                <td>SSLC/Equivalent Total Marks</td>
                                <td>
                                    <select name="PreviousTotalMarks" id="PreviousTotalMarks" style="width:80px;text-align: right;padding-right:10px; line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                        <?php for($i=175;$i<=500;$i++){?>
                                            <option value="<?php echo $i;?>" <?php echo (($_POST[ 'PreviousTotalMarks']==$i) ? " selected='selected' " : "");?>><?php echo $i;?></option>
                                        <?php } ?> 
                                    </select> / 500 Maximum
                                    <div id="ErrPreviousTotalMarks" class="errorstring"></div>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:5px;text-align:left;width:30px">2.</td>
                                <td>(a) Name of the Candidate</td>
                                <td>
                                    <input type="text" name="CandidiateName" id="CandidiateName" onkeyup="getDeclrationName($(this).val())" onblur="getDeclrationName($(this).val())" style="line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width: 100%;">
                                    <div id="ErrCandidiateName" class="errorstring"></div>
                                </td>
                            </tr>                                                     
                              <tr>                                                                     
                              <td style="padding:5px;text-align:left;width:30px">&nbsp; </td>
                                <td>(b) Name of the Parent / Guardian</td>
                                <td>
                                    <input type="text" name="ParentName" id="ParentName" onkeyup="getDeclrationParentName($(this).val())" onblur="getDeclrationParentName($(this).val())"  style="line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width: 100%;">
                                    <div id="ErrParentName" class="errorstring"></div>
                                </td>
                            </tr>
                             <tr>
                             <td style="padding:5px;text-align:left;width:30px">&nbsp; </td>
                                <td>(c) Address for Communication</td>
                                <td>
                                    <input name="Address1" id="Address1" style="line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width: 100%;" type="text">
                                    <div id="ErrAddress1" class="errorstring"></div>
                                </td>
                            </tr>
                             <tr>
                                <td style="padding:5px;text-align:left;width:30px"> &nbsp;</td>
                                <td> </td>
                                <td>
                                    <input name="Address2" id="Address2" style="line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width: 100%;" type="text">
                                    <div id="ErrAddress2" class="errorstring"></div>
                                </td>
                            </tr>
                             <tr>
                                <td style="padding:5px;text-align:left;width:30px">&nbsp; </td>
                                <td> </td>
                                <td><input name="Address3" id="Address3" style="line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width: 100%;" type="text"></td>
                            </tr>
                             <tr>
                                <td style="padding:5px;text-align:left;width:30px">&nbsp; </td>
                                <td> </td>
                                <td><input name="Address4" id="Address4" style="line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width: 50%;" type="text"> 
                                 &nbsp;&nbsp;&nbsp;&nbsp;PIN Code&nbsp;&nbsp;&nbsp;<input type="text" name="Pincode" id="Pincode" style="line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width:134px;"><div id="ErrPincode" class="errorstring" style="text-align: right;"></div></td>
                            </tr>
                             <tr>
                             <td style="padding:5px;text-align:left;width:30px">&nbsp; </td>
                                <td>(d) Aadhaar Number</td>
                                <td>
                                    <input type="text" name="AadhaarNumber" onblur="CheckDuplicateAadhaar()" id="AadhaarNumber" maxlength="15" style="line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width: 100%;">
                                    <div id="ErrAadhaarNumber" class="errorstring"></div>
                                </td>
                            </tr>
                            <tr>
                            <td style="padding:5px;text-align:left;width:30px"> </td>
                                <td>(e) Father's Mobile Number</td>
                                <td>
                                    <input type="text" name="FathersMobile" maxlength="10" id="FathersMobile" style="line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width: 100%;">
                                    <div id="ErrFathersMobile" class="errorstring"></div>    
                                </td>
                            </tr>
                            <tr>
                            <td style="padding:5px;text-align:left;width:30px">&nbsp; </td>
                                <td>(f) Mother's Mobile Number</td>
                                <td>
                                    <input type="text" name="MothersMobile" id="MothersMobile" maxlength="10" style="line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width: 100%;">
                                    <div id="ErrMothersMobile" class="errorstring"></div> 
                                </td>
                            </tr>
                            <tr>
                            <td style="padding:5px;text-align:left;width:30px">3. </td>
                                <td>Nationality</td>
                                <td><select id="Nationality" name="Nationality" onchange="adnationality()" style="width:50%;line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;"><option value="Indian" <?php echo $_POST[ 'Nationality'] ? " selected='selected' " : "";?>>Indian</option><option value="Others"  <?php echo $_POST[ 'Nationality'] ? " selected='selected' " : "";?>>Others</option></select>
                                <input type="text" id="AdditionalNationality" name="AdditionalNationality"  style="width:45%;display: none;float:right;line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                <div id="ErrAdditionalNationality" class="errorstring" style="text-align: right;"></div> 
                                </td>
                            </tr>
                             <tr>
                             <td style="padding:5px;text-align:left;width:30px">4. </td>
                                <td>Native District</td>
                                <td>
                                    <input type="text" name="NativeDistrict" id="NativeDistrict" style="line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width: 100%;">
                                    <div id="ErrNativeDistrict" class="errorstring"></div> 
                                </td>
                            </tr>
                             <tr style="padding:5px">
                             <td style="padding:5px;;text-align:left;width:30px">5. </td>
                                <td>Place of Birth</td>
                                <td>
                                    <input type="text" name="PlaceofBirth" id="PlaceofBirth" style="line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width: 100%;">
                                    <div id="ErrPlaceofBirth" class="errorstring"></div> 
                                </td>
                            </tr>
                             <tr>
                             <td style="padding:5px;text-align:left;width:30px">6. </td>
                                <td>Mother Tongue</td>
                                <td>
                                    <select id="Mothertongue" name="Mothertongue" onchange="admothertongue()" style="width:50%;line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;"><option value="Tamil"  <?php echo $_POST[ 'Mothertongue'] ? " selected='selected' " : "";?>>Tamil</option><option value="Others"  <?php echo $_POST[ 'Mothertongue'] ? " selected='selected' " : "";?>>Others</option></select> 
                                    <input type="text" id="AdditionalMothertongue" name="AdditionalMothertongue"  style="width:45%;display: none;float:right;line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                    <div id="ErrAdditionalMothertongue" class="errorstring" style="text-align: right;"></div> 
                                </td>
                            </tr>
                            
                             <tr>
                             <td style="padding:5px;text-align:left;width:30px"> 7. </td>                                                                                                        
                                <td>Sex</td>
                                <td><select name="Gender" id="Gender" style="width:50%;line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;"><option value="Male"  <?php echo $_POST[ 'Gender'] ? " selected='selected' " : "";?>>Male</option><option value="Female"  <?php echo $_POST[ 'Gender'] ? " selected='selected' " : "";?>>Female</option></select></td>
                            </tr>
                             <tr>
                             <td style="padding:5px;text-align:left;width:30px;vertical-align: top;padding-top: 0px;line-height: 17px;">8. </td>
                                <td style="line-height: 17px;">Date of Birth (Christian era)<br><span style="font-size:12px"> as found in SSLC or its equivalent certificate</span></td>
                                <td>
                                    <input type="date" name="DateofBirth"   id="DateofBirth" style="width:50%;line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                    <div id="ErrDateofBirth" class="errorstring"></div> 
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:5px;text-align:left;width:30px;">9. </td>
                                <td>(a). Religion</td>
                                <td> 
                                    <select id="Religion" onchange="adreligion()" name="Religion" style="width:50%;line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                        <option value="Hindu"  <?php echo ($_POST[ 'Religion']=="Hindu") ? " selected='selected' " : "";?>>Hindu</option>
                                        <option value="Muslim"  <?php echo ($_POST[ 'Religion']=="Muslim") ? " selected='selected' " : "";?>>Muslim</option>
                                        <option value="Christian"  <?php echo ($_POST[ 'Religion']=="Christian") ? " selected='selected' " : "";?>>Christian</option>
                                        <option value="Others"  <?php echo ($_POST[ 'Religion']=="Others") ? " selected='selected' " : "";?>>Others</option>
                                    </select> 
                                    <input type="text" id="OtherReligion" name="OtherReligion"  style="width:45%;display: none;float:right;line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;"> 
                                    <div id="ErrOtherReligion" class="errorstring" style="text-align: right;"></div> </td>
                            </tr>
                            <tr>
                            <td style="padding:5px;text-align:left;width:30px;">&nbsp;</td>
                            <td>(b). Name of the community</td>
                            <td>          
                            <select id="Community" name="Community" style="width:50%;line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                        <option value="ST"  <?php echo ($_POST[ 'Community']=="ST") ? " selected='selected' " : "";?>>ST</option>
                                        <option value="SC" <?php echo ($_POST[ 'Community']=="SC") ? " selected='selected' " : "";?>>SC</option>
                                        <option value="SC(A)" <?php echo ($_POST[ 'Community']=="SC(A)") ? " selected='selected' " : "";?>>SC(A)</option>
                                        <option value="MBC & DNC" <?php echo ($_POST[ 'Community']=="MBC & DNC") ? " selected='selected' " : "";?>>MBC & DNC</option>
                                        <option value="BC(M)" <?php echo ($_POST[ 'Community']=="BC(M)") ? " selected='selected' " : "";?>>BC(M)</option>
                                        <option value="BC" selected="selected" <?php echo ($_POST[ 'Community']=="BC") ? " selected='selected' " : "";?>>BC</option>
                                        <option value="OC" <?php echo ($_POST[ 'Community']=="OC") ? " selected='selected' " : "";?>>OC</option>
                            </select> 
                            </td>
                        </tr>
                             <tr>
                                <td style="padding:5px;text-align:left;width:30px;">&nbsp;</td>
                                <td>(c). Caste</td>
                                <td>
                                    <input type="text" name="Caste" id="Caste" style="line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width: 100%;">
                                    <div id="ErrCaste" class="errorstring"></div> 
                                </td>
                            </tr>
                             <tr>
                                <td style="padding:5px;text-align:left;width:30px;">&nbsp;</td>
                                <td>(d). Sl. No. of the Community Certificate </td>
                                <td>
                                    <input type="text" name="CommunityCertificateNo" id="CommunityCertificateNo" style="line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width: 100%;">
                                    <div id="ErrCommunityCertificateNo" class="errorstring"></div> 
                                </td>
                            </tr>
                          <tr>
                            <td style="padding:5px;text-align:left;width:30px;">&nbsp;</td>
                            <td style="line-height: 17px;">(e). Designation of the Officer <br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:12px">Who issued the Community Certificate</span></td>
                            <td>   
                             <select id="DesignationofTheOfficer" name="DesignationofTheOfficer" style="width:50%;line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                        <option value="Sub Collector" <?php echo ($_POST[ 'DesignationofTheOfficer']=="Sub Collector") ? " selected='selected' " : "";?>>Sub Collector</option>
                                        <option value="RDO/PA(O)" <?php echo ($_POST[ 'DesignationofTheOfficer']=="RDO/PA(O)") ? " selected='selected' " : "";?>>RDO/PA(O)</option>
                                        <option value="Tahsildar " <?php echo ($_POST[ 'DesignationofTheOfficer']=="Tahsildar") ? " selected='selected' " : "";?>> Tahsildar </option>
                                        <option value="Dy Tahsildar" <?php echo ($_POST[ 'DesignationofTheOfficer']=="Dy Tahsildar") ? " selected='selected' " : "";?>>Dy Tahsildar</option>
                            </select> 
                            </td>
                        </tr>
                          <tr>
                            <td style="padding:5px;text-align:left;width:30px;">&nbsp;</td>
                            <td>(f). Name of the Revenue Division / Taluk</td>
                            <td>
                                <table style="width: 100%;">
                                    <tr>
                                        <td style="width: 50%;text-align:center">Division </td>
                                        <td width="10%"></td>
                                        <td style="text-align: center;">Taluk</td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="DivisionName" id="DivisionName" style="line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width: 100%;"></td>
                                        <td></td>
                                        <td><input type="text" name="TalukName" id="TalukName" style="line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width: 100%;"> </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><div id="ErrDivisionTaluk" class="errorstring" ></div></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:5px;text-align:left;width:30px;">10.</td>
                            <td>(a). Examination Passed </td>
                            <td>   
                                <select name="ExaminationPassed" id="ExaminationPassed" style="line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width: 147px;">
                                    <option value="SSLC" <?php echo ($_POST[ 'ExaminationPassed']=="SSLC") ? " selected='selected' " : "";?>>SSLC</option>
                                    <option value="CBSE / ICSE" <?php echo ($_POST[ 'ExaminationPassed']=="CBSE / ICSE") ? " selected='selected' " : "";?>>CBSE / ICSE</option>
                                    <option value="Others" <?php echo ($_POST[ 'ExaminationPassed']=="Others") ? " selected='selected' " : "";?>>Others</option>
                                </select>&nbsp;&nbsp;&nbsp;&nbsp;Year of Passing&nbsp;&nbsp;&nbsp;<select name="YearofPassing" id="YearofPassing" style="width:80;line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                                <?php for($i=YEAR_ENDING;$i>=YEAR_STARTING;$i--){?>
                                                    <option value="<?php echo $i;?>" <?php echo (($_POST[ 'YearofPassing']==$i) ? " selected='selected' " : "");?>><?php echo $i;?></option>
                                                <?php } ?> 
                                            </select> 
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:5px;text-align:left;width:30px;">&nbsp;</td>
                            <td colspan="2">(b). Marks obtained in SSLC / Equivalent Examination: <br> (False information will lead to cancellation and Criminal Action) </td>
                        </tr>
                        <tr>
                            <td style="padding:5px;text-align:left;width:30px;">&nbsp;</td>
                            <td colspan="2">
                                <table class="table-bordered" style="width:100%">
                                    <tr>
                                        <td rowspan="2" style="text-align: center;width: 80px;">Sl.No.</td>
                                        <td rowspan="2" style="text-align: center;">Subject</td>
                                        <td colspan="2" style="text-align: center;">Marks</td>
                                        <td rowspan="2" style="text-align: center;width:170px">Month and Year of Passing</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;width: 80px;">Scored</td>
                                        <td style="text-align: center;width: 80px;">Maximum</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;">(i)</td>
                                        <td style="padding-left: 10px;">Tamil or any other Language</td>
                                        <td style="text-align: center;">
                                            <select name="Subject_Tamil" id="Subject_Tamil" onchange="calculate_total_marks()" style="width:80px;text-align: right;padding-right:10px; line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                                <?php for($i=SSLC_MARK_MINIMUM;$i<=SSLC_MARK_MAXIMUM;$i++){?>
                                                    <option value="<?php echo $i;?>" <?php echo (($_POST[ 'Subject_Tamil']==$i) ? " selected='selected' " : "");?>><?php echo $i;?></option>
                                                <?php } ?> 
                                            </select>
                                        </td>
                                        <td style="text-align: center;">100</td>
                                        <td style="padding-left: 4px;">
                                            <select name="Subject_Tamil_Passing_Month" id="Subject_Tamil_Passing_Month" style="float: left;width:80px;text-align:right;padding-right:10px; line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                                <?php  $i=1;
                                                for($i=1;$i<sizeof($month);$i++){ ?>
                                                    <option value="<?php echo $month[$i];?>" <?php echo (($_POST[ 'Subject_Tamil_Passing_Month']==$i) ? " selected='selected' " : "");?>><?php echo $month[$i];?></option>
                                                <?php } ?> 
                                            </select>
                                            <select name="Subject_Tamil_Passing_YEAR" id="Subject_Tamil_Passing_YEAR" style="width:80px;text-align:right;padding-right:10px;line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                                <?php for($i=YEAR_ENDING;$i>=YEAR_STARTING;$i--){?>
                                                    <option value="<?php echo $i;?>" <?php echo (($_POST[ 'Subject_Tamil_Passing_YEAR']==$i) ? " selected='selected' " : "");?>><?php echo $i;?></option>
                                                <?php } ?> 
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;">(ii)</td>
                                        <td style="padding-left: 10px;">English</td>
                                        <td style="text-align: center;">
                                            <select name="Subject_English" id="Subject_English" onchange="calculate_total_marks()" style="width:80px;text-align: right;padding-right:10px; line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                                <?php for($i=SSLC_MARK_MINIMUM;$i<=SSLC_MARK_MAXIMUM;$i++){?>
                                                    <option value="<?php echo $i;?>" <?php echo (($_POST[ 'Subject_English']==$i) ? " selected='selected' " : "");?>><?php echo $i;?></option>
                                                <?php } ?> 
                                            </select>
                                        </td>
                                        <td style="text-align: center;">100</td>
                                        <td style="padding-left: 4px;">
                                            <select name="Subject_English_Passing_Month" id="Subject_English_Passing_Month" style="float: left;width:80px;text-align:right;padding-right:10px;line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                                <?php  $i=1;
                                                for($i=1;$i<sizeof($month);$i++){ ?>
                                                    <option value="<?php echo $month[$i];?>" <?php echo (($_POST[ 'Subject_English_Passing_Month']==$i) ? " selected='selected' " : "");?>><?php echo $month[$i];?></option>
                                                <?php } ?> 
                                            </select>
                                            <select name="Subject_English_Passing_YEAR" id="Subject_English_Passing_YEAR" style="width:80px;text-align:right;padding-right:10px;line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                                <?php for($i=YEAR_ENDING;$i>=YEAR_STARTING;$i--){?>
                                                    <option value="<?php echo $i;?>" <?php echo (($_POST[ 'Subject_English_Passing_YEAR']==$i) ? " selected='selected' " : "");?>><?php echo $i;?></option>
                                                <?php } ?> 
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;">(iii)</td>
                                        <td style="padding-left: 10px;">Mathematics</td>
                                        <td style="text-align: center;">
                                            <select name="Subject_Mathametics" id="Subject_Mathametics" onchange="calculate_total_marks()" style="width:80px;text-align: right;padding-right:10px; line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                                <?php for($i=SSLC_MARK_MINIMUM;$i<=SSLC_MARK_MAXIMUM;$i++){?>
                                                    <option value="<?php echo $i;?>" <?php echo (($_POST[ 'Subject_Mathametics']==$i) ? " selected='selected' " : "");?>><?php echo $i;?></option>
                                                <?php } ?> 
                                            </select>
                                        </td>
                                        <td style="text-align: center;">100</td>
                                        <td style="padding-left: 4px;">
                                            <select name="Subject_Mathametics_Passing_Month" id="Subject_Mathametics_Passing_Month" style="float: left;width:80px;text-align:right;padding-right:10px;line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                                <?php  $i=1;
                                                for($i=1;$i<sizeof($month);$i++){ ?>
                                                    <option value="<?php echo $month[$i];?>" <?php echo (($_POST[ 'Subject_Mathametics_Passing_Month']==$i) ? " selected='selected' " : "");?>><?php echo $month[$i];?></option>
                                                <?php } ?> 
                                            </select>
                                            <select name="Subject_Mathametics_Passing_YEAR" id="Subject_Mathametics_Passing_YEAR" style="width:80px;text-align:right;padding-right:10px;line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                                <?php for($i=YEAR_ENDING;$i>=YEAR_STARTING;$i--){?>
                                                    <option value="<?php echo $i;?>" <?php echo (($_POST[ 'Subject_Mathametics_Passing_YEAR']==$i) ? " selected='selected' " : "");?>><?php echo $i;?></option>
                                                <?php } ?> 
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;">(iv)</td>
                                        <td style="padding-left: 10px;">Science</td>
                                        <td style="text-align: center;">
                                            <select name="Subject_Science" id="Subject_Science" onchange="calculate_total_marks()" style="width:80px;text-align: right;padding-right:10px; line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                                <?php for($i=SSLC_MARK_MINIMUM;$i<=SSLC_MARK_MAXIMUM;$i++){?>
                                                    <option value="<?php echo $i;?>" <?php echo (($_POST[ 'Subject_Science']==$i) ? " selected='selected' " : "");?>><?php echo $i;?></option>
                                                <?php } ?> 
                                            </select>
                                        </td>
                                        <td style="text-align: center;">100</td>
                                        <td style="padding-left: 4px;">
                                            <select name="Subject_Science_Passing_Month" id="Subject_Science_Passing_Month" style="float: left;width:80px;text-align:right;padding-right:10px;line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                                <?php  $i=1;
                                                for($i=1;$i<sizeof($month);$i++){ ?>
                                                    <option value="<?php echo $month[$i];?>" <?php echo (($_POST[ 'Subject_Science_Passing_Month']==$i) ? " selected='selected' " : "");?>><?php echo $month[$i];?></option>
                                                <?php } ?> 
                                            </select>
                                            <select name="Subject_Science_Passing_YEAR" id="Subject_Science_Passing_YEAR" style="width:80px;text-align:right;padding-right:10px;line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                                <?php for($i=YEAR_ENDING;$i>=YEAR_STARTING;$i--){?>
                                                    <option value="<?php echo $i;?>" <?php echo (($_POST[ 'Subject_Science_Passing_YEAR']==$i) ? " selected='selected' " : "");?>><?php echo $i;?></option>
                                                <?php } ?> 
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;">(v)</td>
                                        <td style="padding-left: 10px;">Social Science</td>
                                        <td style="text-align: center;">
                                            <select name="Subject_Social" id="Subject_Social" onchange="calculate_total_marks()" style="width:80px;text-align: right;padding-right:10px; line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                                <?php for($i=SSLC_MARK_MINIMUM;$i<=SSLC_MARK_MAXIMUM;$i++){?>
                                                    <option value="<?php echo $i;?>" <?php echo (($_POST[ 'Subject_Social']==$i) ? " selected='selected' " : "");?>><?php echo $i;?></option>
                                                <?php } ?> 
                                            </select>
                                        </td>
                                        <td style="text-align: center;">100</td>
                                        <td style="padding-left: 4px;">
                                            <select name="Subject_Social_Passing_Month" id="Subject_Social_Passing_Month" style="float: left;width:80px;text-align:right;padding-right:10px;line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                                <?php  $i=1;
                                                for($i=1;$i<sizeof($month);$i++){ ?>
                                                    <option value="<?php echo $month[$i];?>" <?php echo (($_POST[ 'Subject_Social_Passing_Month']==$i) ? " selected='selected' " : "");?>><?php echo $month[$i];?></option>
                                                <?php } ?> 
                                            </select>
                                            <select name="Subject_Social_Passing_YEAR" id="Subject_Social_Passing_YEAR" style="width:80px;text-align:right;padding-right:10px;line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                                <?php for($i=YEAR_ENDING;$i>=YEAR_STARTING;$i--){?>
                                                    <option value="<?php echo $i;?>" <?php echo (($_POST[ 'Subject_Social_Passing_YEAR']==$i) ? " selected='selected' " : "");?>><?php echo $i;?></option>
                                                <?php } ?> 
                                            </select>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td style="text-align: center;">(vi)</td>
                                        <td style="padding-left: 10px;">Total</td>
                                        <td style="text-align: center;"><input type="text" name="TotalMarks" id="TotalMarks" style="line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width:80px;padding-right:23px;text-align:right"></td>
                                        <td style="text-align: center;"><b>500</b></td>
                                        <td></td>
                                    </tr>
                                    
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:5px;text-align:left;width:30px;">11.</td>
                            <td colspan="2">Details of Studies :</td>    
                        </tr>
                        <tr>
                            <td style="padding:5px;text-align:left;width:30px;">&nbsp;</td>
                            <td colspan="2">
                                <table class="table-bordered" style="width:100%">
                                    <tr>
                                        <td style="text-align: center;width: 50px;">Sl.No.</td>
                                        <td style="text-align: center;width:65px;">Class</td>
                                        <td style="text-align: center;width:170px">Month and Year of Passing</td>
                                        <td style="text-align: center;">Name of the Institution and Address</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;">1</td>
                                        <td style="text-align: center;">IX Std.</td>
                                        <td style="text-align: center;">
                                            <select name="Eleven_Passing_Month" id="Eleven_Passing_Month" style="float: left;width:80px;text-align:right;padding-right:10px;line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                                <?php  $i=1;
                                                for($i=1;$i<sizeof($month);$i++){ ?>
                                                    <option value="<?php echo $month[$i];?>" <?php echo (($_POST[ 'Eleven_Passing_Month']==$i) ? " selected='selected' " : "");?>><?php echo $month[$i];?></option>
                                                <?php } ?> 
                                            </select>
                                            <select name="Eleven_Passing_YEAR" id="Eleven_Passing_YEAR" style="width:80px;text-align:right;padding-right:10px;line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                                <?php for($i=YEAR_ENDING;$i>=YEAR_STARTING;$i--){?>
                                                    <option value="<?php echo $i;?>" <?php echo (($_POST[ 'Eleven_Passing_YEAR']==$i) ? " selected='selected' " : "");?>><?php echo $i;?></option>
                                                <?php } ?> 
                                            </select>
                                        </td>
                                        <td style="text-align: center;"><input type="text" name="NameoftheInstitutionEleven" id="NameoftheInstitutionEleven" style="line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width:100%;padding-right:30px"></td>
                                    </tr>                                                                                      
                                    <tr>
                                        <td style="text-align: center;">2</td>
                                        <td style="text-align: center;">X Std.</td>
                                        <td style="text-align: center;">
                                            <select name="SSLC_Passing_Month" id="SSLC_Passing_Month" style="float: left;width:80px;text-align:right;padding-right:10px;line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                                <?php  $i=1;
                                                for($i=1;$i<sizeof($month);$i++){ ?>
                                                    <option value="<?php echo $month[$i];?>" <?php echo (($_POST[ 'SSLC_Passing_Month']==$i) ? " selected='selected' " : "");?>><?php echo $month[$i];?></option>
                                                <?php } ?> 
                                            </select>
                                            <select name="SSLC_Passing_YEAR" id="SSLC_Passing_YEAR" style="width:80px;text-align:right;padding-right:10px;line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;">
                                                <?php for($i=YEAR_ENDING;$i>=YEAR_STARTING;$i--){?>
                                                    <option value="<?php echo $i;?>" <?php echo (($_POST[ 'SSLC_Passing_YEAR']==$i) ? " selected='selected' " : "");?>><?php echo $i;?></option>
                                                <?php } ?> 
                                            </select>
                                        </td>
                                        <td style="text-align: center;"><input type="text" name="NameoftheInstitutionSSLC" id="NameoftheInstitutionSSLC" style="line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;width:100%;padding-right:30px"></td>
                                    </tr>
                                </table>
                                <div id="ErrNameoftheInstitutionSSLC" class="errorstring" style="text-align: right;"></div> 
                            </td>
                        </tr>
                        <tr>
                         <td style="padding:5px;text-align:left;width:30px"> 12. </td>                                                                                                         
                            <td colspan="2">Certificate Attachment &nbsp;&nbsp;
                                 <input type="hidden" name="uploadcertificate1" id="uploadcertificate1">
                                <input type="file" onchange="certificate1_onchage()" name="certificate1" id="certificate1" style="display: none;">
                               <span id="div_certificate">
                                <button type="button" class="btn btn-success" style="padding: 2px 10px;font-size: 11px;background: #f24395;border: 1px solid #f24395;" onclick="uploadcertificate()">Upload</button> 
                                </span>  
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="text-align:center;padding-top:10px;padding-bottom: 10px;"><b>DECLARATION BY THE APPLICANT</b></td>
                        </tr>
                        <tr>
                            <td style="padding:5px;text-align:left;width:30px;">&nbsp;</td>
                            <td colspan="2">
                                I&nbsp;&nbsp;<input type="text" name="DeclarationName" readonly="readonly" id="DeclarationName" style="line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;border-left:none;border-top:none;border-right:none;width:230px;background:none;font-weight:bold;">&nbsp;&nbsp; Son/Daughter of &nbsp;<input type="text" readonly="readonly" name="SonorDaughterof" id="SonorDaughterof" style="width:230px;line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;border-left:none;border-top:none;border-right:none;background:none;font-weight:bold">&nbsp;
                                hereby solemnly declare that the information given in the application and the enclosures are true and correct.
                            </td>    
                        </tr>
                        <tr>
                            <td style="padding:5px;text-align:left;width:30px;">&nbsp;</td>
                            <td colspan="2" style="width:50px">Place : &nbsp;<input type="text" name="Place" id="Place" style="line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;border-left:none;border-top:none;border-right:none">
                                 <div id="ErrPlace" class="errorstring"></div>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:5px;text-align:left;width:30px;">&nbsp;</td>
                            <td>Date :&nbsp;&nbsp;&nbsp;<input type="text" name="Date" id="Date" value="<?php echo date("M d, Y");?>" readonly="readonly" style="line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: uppercase;border-left:none;border-top:none;border-right:none;background:none;font-weight:bold;"></td>
                            <td style="text-align:right"><button type="submit" class="btn btn-success" name="submitForm" style="padding: 10px 50px;background: #f24395;border: 1px solid #f24395;"> Submit</button><button type="submit" class="btn btn-primary" name="submitForm" id="submitForm" style="display: none;"> Submit</button></td>
                        </tr>
                    </table>
                       
                        </form>
                    </div>
                </div>
                                                                                 
               
            </div>
        </div>
    </section>
<?php } ?>
    <!-- Contact end -->
   
  <div class="modal fade" id="ConfirmationPopup" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="border:1px solid #f24395 !important;border-radius: 10px !important;">
    <div class="modal-content">
      <div class="modal-body" id="confrimation_text" style="padding:10px !important;background:#ffeaf4 !important;margin: 0px auto !important;">
         
         <div id="xconfrimation_text" style="font-size:15px !important; "></div>  
      </div>
    </div>
  </div>
</div>
    <!-- Footer start -->
 
<script>
 $(document).ready(function(){
        /*$("#uploadimage1").blur(function() { 
          $('#Errimage').html("");    
            var uploadimage1 = $('#uploadimage1').val().trim();
            if (uploadimage1.length==0) {
                $('#Errimage').html("Please upload photo");   
            }else {
                alert(uploadimage1);
                $('#Errimage').html("");  
            }
        });      */
        $("#FirstCourse").blur(function() { 
          $('#ErrFirstCourse').html("");    
            var FirstCourse = $('#FirstCourse').val().trim();
                if (FirstCourse==0) {
                    $('#ErrFirstCourse').html("Please Select Course");   
                }
        });
        $("#CandidiateName").blur(function() { 
            $('#ErrCandidiateName').html("");    
             var CandidiateName = $('#CandidiateName').val().trim();
             if (CandidiateName.length==0) {
                $('#ErrCandidiateName').html("Please Enter Name of the Candidate");   
             } else {
                if (!(is_AlphaNumeric(CandidiateName))) {
                    $('#ErrCandidiateName').html("Please Enter Alpha Numeric Characters Only");
                }
             } 
        });
        $("#ParentName").blur(function() { 
            $('#ErrParentName').html(""); 
            var ParentName = $('#ParentName').val().trim();   
            if (ParentName.length==0) {
                $('#ErrParentName').html("Please Enter Name of the Parent / Guardian");   
            } else {
                if (!(is_AlphaNumeric(ParentName))) {
                    $('#ErrParentName').html("Please Enter Alpha Numeric Characters Only");
                }
            }
        });
        $("#Address1").blur(function() { 
            $('#ErrAddress1').html(""); 
            var Address1 = $('#Address1').val().trim();   
            if (Address1.length==0) {
                $('#ErrAddress1').html("Please Enter the Address For Communication");   
            } 
        });
        $("#Pincode").blur(function() { 
            $('#ErrPincode').html(""); 
            var Pincode = $('#Pincode').val().trim();   
            if (Pincode.length==0) {
                $('#ErrPincode').html("Please Enter the Pincode");   
            } else {
                if (!(is_Numeric(Pincode))) {
                    $('#ErrPincode').html("Please Enter Numeric Characters Only");
                }
            } 
        });
        $("#AadhaarNumber").blur(function() { 
            $('#ErrAadhaarNumber').html(""); 
            var AadhaarNumber = $('#AadhaarNumber').val().trim();
            if (AadhaarNumber.length==0) {
                $('#ErrAadhaarNumber').html("Please Enter Aadhaar Number");   
            } else {
                if (!(is_Numeric(AadhaarNumber))) {
                    $('#ErrAadhaarNumber').html("Please Enter Numeric Characters Only");
                }
            }
        });
        $("#FathersMobile").blur(function() { 
            $('#ErrFathersMobile').html("");   
            var FathersMobile = $('#FathersMobile').val().trim();
            if (FathersMobile.length==0) {
                $('#ErrFathersMobile').html("Please Enter Father's Mobile Number");
            } else {
                if (!($('#FathersMobile').val().length==10 && parseInt($('#FathersMobile').val())>6000000000 && parseInt($('#FathersMobile').val())<9999999999)) {
                    $('#ErrFathersMobile').html("Please Enter Valid Mobile Number");
                }
            }
        });
      /*  $("#MothersMobile").blur(function() { 
            $('#ErrMothersMobile').html("");   
            var MothersMobile = $('#MothersMobile').val().trim();
            if (MothersMobile.length==0) {
                $('#ErrMothersMobile').html("Please Enter Mother's Mobile Number");
            } else {
                if (!($('#MothersMobile').val().length==10 && parseInt($('#MothersMobile').val())>6000000000 && parseInt($('#MothersMobile').val())<9999999999)) {
                    $('#ErrMothersMobile').html("Please Enter Valid Mobile Number");
                }
            }
        });  */
        $("#NativeDistrict").blur(function() { 
            $('#ErrNativeDistrict').html("");   
            var NativeDistrict = $('#NativeDistrict').val().trim();
            if (NativeDistrict.length==0) {
                $('#ErrNativeDistrict').html("Please Enter Native District");   
            } else {
                if (!(is_AlphaNumeric(NativeDistrict))) {
                    $('#ErrNativeDistrict').html("Please Enter Alpha Numeric Characters Only");
                }
            }
        });
        $("#PlaceofBirth").blur(function() { 
            $('#ErrPlaceofBirth').html("");   
            var PlaceofBirth = $('#PlaceofBirth').val().trim();
            if (PlaceofBirth.length==0) {
                $('#ErrPlaceofBirth').html("Please Enter Place of Birth");   
            } else {
                if (!(is_AlphaNumeric(PlaceofBirth))) {
                    $('#ErrPlaceofBirth').html("Please Enter Alpha Numeric Characters Only");
                }
            }
        }); 
        $("#AdditionalNationality").blur(function() { 
            $('#ErrAdditionalNationality').html("");  
            if($('#Nationality').val()=="Others") { 
                var AdditionalNationality = $('#AdditionalNationality').val().trim();
                if (AdditionalNationality.length==0) {
                    $('#ErrAdditionalNationality').html("Please Enter Nationality");   
                } else {
                    if (!(is_AlphaNumeric(AdditionalNationality))) {
                        $('#ErrAdditionalNationality').html("Please Enter Alpha Numeric Characters Only");
                    }
                }
            }else {
                $('#ErrAdditionalNationality').html("");  
            }
        });
        $("#AdditionalMothertongue").blur(function() { 
            $('#ErrAdditionalMothertongue').html("");  
            if($('#Mothertongue').val()=="Others") { 
                var AdditionalMothertongue = $('#AdditionalMothertongue').val().trim();
                if (AdditionalMothertongue.length==0) {
                    $('#ErrAdditionalMothertongue').html("Please Enter Mothertongue");   
                } else {
                    if (!(is_AlphaNumeric(AdditionalMothertongue))) {
                        $('#ErrAdditionalMothertongue').html("Please Enter Alpha Numeric Characters Only");
                    }
                }
            }else {
                $('#ErrAdditionalMothertongue').html("");  
            }
        });
        $("#Caste").blur(function() { 
            $('#ErrCaste').html("");   
            var Caste = $('#Caste').val().trim();
            if (Caste.length==0) {
                $('#ErrCaste').html("Please Enter Caste");   
            } else {
                if (!(is_AlphaNumeric(Caste))) {
                    $('#ErrCaste').html("Please Enter Alpha Numeric Characters Only");
                }
            }
        });
        $("#OtherReligion").blur(function() { 
            $('#ErrOtherReligion').html("");  
            if($('#Religion').val()=="Others") { 
                var OtherReligion = $('#OtherReligion').val().trim();
                if (OtherReligion.length==0) {
                    $('#ErrOtherReligion').html("Please Enter Religion");   
                } else {
                    if (!(is_AlphaNumeric(OtherReligion))) {
                        $('#ErrOtherReligion').html("Please Enter Alpha Numeric Characters Only");
                    }
                }
            }else {
                $('#ErrAdditionalNationality').html("");  
            }
        });
        /*$("#CommunityCertificateNo").blur(function() { 
            $('#ErrCommunityCertificateNo').html("");   
            var CommunityCertificateNo = $('#CommunityCertificateNo').val().trim();
            if (CommunityCertificateNo.length==0) {
                $('#ErrCommunityCertificateNo').html("Please Enter Sl. No. of the Community Certificate");   
            } 
        });    */
         $("#DivisionName").blur(function() { 
            $('#ErrDivisionTaluk').html("");   
            var Division = $('#DivisionName').val().trim();
            var Taluk = $('#TalukName').val().trim();
            if (Division.length==0 && Taluk.length==0) {
                $('#ErrDivisionTaluk').html("Please Enter Division or Taluk");   
            } 
        });
        $("#TalukName").blur(function() { 
            $('#ErrDivisionTaluk').html("");   
            var Division = $('#DivisionName').val().trim();
            var Taluk = $('#TalukName').val().trim();
            if (Division.length==0 && Taluk.length==0) {
                $('#ErrDivisionTaluk').html("Please Enter Division or Taluk");   
            } 
        });
        $("#NameoftheInstitutionSSLC").blur(function() { 
            $('#ErrNameoftheInstitutionSSLC').html("");   
            var NameoftheInstitutionSSLC = $('#NameoftheInstitutionSSLC').val().trim();
            if (NameoftheInstitutionSSLC.length==0) {
                $('#ErrNameoftheInstitutionSSLC').html("Please Enter the Name of the SSLC Institution and Address");   
            } 
        });
        $("#Place").blur(function() { 
            $('#ErrPlace').html("");   
            var Place = $('#Place').val().trim();
            if (Place.length==0) {
                $('#ErrPlace').html("Please Enter the Place");   
            } else {
                if (!(is_AlphaNumeric(Place))) {
                    $('#ErrPlace').html("Please Enter Alpha Numeric Characters Only");
                }
            }
        });
        $("#DateofBirth").blur(function() { 
            $('#ErrDateofBirth').html("");   
            var From_date = new Date($("#DateofBirth").val());
               var To_date = new Date();
               var diff_date =  To_date - From_date;
               var years = Math.floor(diff_date/31536000000);
               if($('#DateofBirth').val().trim()==""){
                   $('#ErrDateofBirth').html("Please Enter Date of Birth");
               }else {
               if(years<15){
                    $('#ErrDateofBirth').html("Please Enter valid Date of Birth");
               }
               }
        });
 });
        
    var isSubmit = 0;                                                      
function doConfrim() {
    $('#Errimage').html(""); 
    $('#ErrFirstCourse').html(""); 
    $('#ErrCandidiateName').html(""); 
    $('#ErrParentName').html(""); 
    $('#ErrAddress1').html(""); 
    $('#ErrAadhaarNumber').html(""); 
    $('#ErrFathersMobile').html(""); 
  //  $('#ErrMothersMobile').html(""); 
    $('#ErrPlaceofBirth').html(""); 
    $('#ErrAdditionalNationality').html(""); 
    $('#ErrAdditionalMothertongue').html(""); 
    $('#ErrCaste').html(""); 
    $('#ErrOtherReligion').html(""); 
    $('#ErrCommunityCertificateNo').html(""); 
    $('#ErrDivisionName').html(""); 
    $('#ErrTalukName').html(""); 
    $('#ErrNameoftheInstitutionSSLC').html(""); 
    $('#ErrPlace').html(""); 
    
    var ErrorCount=0;  
    
    /*
    var uploadimage1 = $('#uploadimage1').val().trim();
    if (uploadimage1=="") {
        $('#Errimage').html("Please upload photo");   
        ErrorCount++;      
    } */
    var FirstCourse = $('#FirstCourse').val().trim();
    if (FirstCourse==0) {
        $('#ErrFirstCourse').html("Please Select Course");   
        ErrorCount++;      
    }
    var CandidiateName = $('#CandidiateName').val().trim();
        if (CandidiateName.length==0) {
            $('#ErrCandidiateName').html("Please Enter Name of the Candidate");   
            ErrorCount++;      
        } else {
            if (!(is_AlphaNumeric(CandidiateName))) {
                $('#ErrCandidiateName').html("Please Enter Alpha Numeric Characters Only");
            ErrorCount++; 
            }
        }
    var ParentName = $('#ParentName').val().trim();
        if (ParentName.length==0) {
            $('#ErrParentName').html("Please Enter Name of the Parent / Guardian");   
            ErrorCount++;      
        } else {
            if (!(is_AlphaNumeric(ParentName))) {
                $('#ErrParentName').html("Please Enter Alpha Numeric Characters Only");
            ErrorCount++; 
            }
        }
    var Address1 = $('#Address1').val().trim();
        if (Address1.length==0) {
            $('#ErrAddress1').html("Please Enter the Address for Communication");   
            ErrorCount++;      
        }
    var Pincode = $('#Pincode').val().trim();
        if (Pincode.length==0) {
            $('#ErrPincode').html("Please Enter the Pincode");   
            ErrorCount++;      
        }else {
                if (!(is_Numeric(Pincode))) {
                    $('#ErrPincode').html("Please Enter Numeric Characters Only");
                    ErrorCount++;    
                }
        } 
    var AadhaarNumber = $('#AadhaarNumber').val().trim();
        if (AadhaarNumber.length==0) {
            $('#ErrAadhaarNumber').html("Please Enter Aadhaar Number");   
            ErrorCount++;      
        } else {
            if (!(is_Numeric(AadhaarNumber))) {
                $('#ErrAadhaarNumber').html("Please Enter Numeric Characters Only");
            ErrorCount++; 
            }
        }
    var FathersMobile = $('#FathersMobile').val().trim();
        if (FathersMobile.length==0) {
            $('#ErrFathersMobile').html("Please Enter Father's Mobile Number");
            ErrorCount++;
        } else {
            if (!($('#FathersMobile').val().length==10 && parseInt($('#FathersMobile').val())>6000000000 && parseInt($('#FathersMobile').val())<9999999999)) {
                $('#ErrFathersMobile').html("Please Enter Valid Mobile Number");
            ErrorCount++;
            }
        }
   /* var MothersMobile = $('#MothersMobile').val().trim();
        if (MothersMobile.length==0) {
            $('#ErrMothersMobile').html("Please Enter Mother's Mobile Number");
            ErrorCount++;
        } else {
            if (!($('#MothersMobile').val().length==10 && parseInt($('#MothersMobile').val())>6000000000 && parseInt($('#MothersMobile').val())<9999999999)) {
                $('#ErrMothersMobile').html("Please Enter Valid Mobile Number");
            ErrorCount++;
            }
        } */
    var NativeDistrict = $('#NativeDistrict').val().trim();
        if (NativeDistrict.length==0) {
            $('#ErrNativeDistrict').html("Please Enter Native District");   
            ErrorCount++;      
        } else {
            if (!(is_AlphaNumeric(NativeDistrict))) {
                $('#ErrNativeDistrict').html("Please Enter Alpha Numeric Characters Only");
            ErrorCount++; 
            }
        }
    var PlaceofBirth = $('#PlaceofBirth').val().trim();
        if (PlaceofBirth.length==0) {
            $('#ErrPlaceofBirth').html("Please Enter Place of Birth");   
            ErrorCount++;      
        } else {
            if (!(is_AlphaNumeric(PlaceofBirth))) {
                $('#ErrPlaceofBirth').html("Please Enter Alpha Numeric Characters Only");
            ErrorCount++; 
            }
        }
    var Division = $('#DivisionName').val().trim();
            var Taluk = $('#TalukName').val().trim();
            if (Division.length==0 && Taluk.length==0) {
                $('#ErrDivisionTaluk').html("Please Enter Division or Taluk");  
                ErrorCount++;    
            }
    if($('#Nationality').val()=="Others") { 
        var AdditionalNationality = $('#AdditionalNationality').val().trim();
        if (AdditionalNationality.length==0) {
            $('#ErrAdditionalNationality').html("Please Enter Nationality");   
            ErrorCount++;     
        } else {
            if (!(is_AlphaNumeric(AdditionalNationality))) {
                $('#ErrAdditionalNationality').html("Please Enter Alpha Numeric Characters Only");
                ErrorCount++;     
            }
        }
    }
    if($('#Mothertongue').val()=="Others") { 
        var AdditionalMothertongue = $('#AdditionalMothertongue').val().trim();
        if (AdditionalMothertongue.length==0) {
            $('#ErrAdditionalMothertongue').html("Please Enter Mothertongue");   
            ErrorCount++;     
        } else {
            if (!(is_AlphaNumeric(AdditionalMothertongue))) {
                $('#ErrAdditionalMothertongue').html("Please Enter Alpha Numeric Characters Only");
                ErrorCount++;     
            }
        }
    }
    if($('#Religion').val()=="Others") { 
        var OtherReligion = $('#OtherReligion').val().trim();
        if (OtherReligion.length==0) {
            $('#ErrOtherReligion').html("Please Enter Religion");   
            ErrorCount++;     
        } else {
            if (!(is_AlphaNumeric(OtherReligion))) {
                $('#ErrOtherReligion').html("Please Enter Alpha Numeric Characters Only");
                ErrorCount++;     
            }
        }
    }
    var  Caste= $('#Caste').val().trim();
        if (Caste.length==0) {
            $('#ErrCaste').html("Please Enter Caste");   
            ErrorCount++;     
        } else {
            if (!(is_AlphaNumeric(Caste))) {
                $('#ErrCaste').html("Please Enter Alpha Numeric Characters Only");
                ErrorCount++;     
            }
        }
    
    var  CommunityCertificateNo= $('#CommunityCertificateNo').val().trim();
     /*   if (CommunityCertificateNo.length==0) {
            $('#ErrCommunityCertificateNo').html("Please Enter Sl. No. of the Community Certificate");   
            ErrorCount++;     
        }*/
    var  NameoftheInstitutionSSLC= $('#NameoftheInstitutionSSLC').val().trim();
        if (NameoftheInstitutionSSLC.length==0) {
            $('#ErrNameoftheInstitutionSSLC').html("Please Enter the Name of the SSLC Institution and Address");   
            ErrorCount++;     
        }  
   var Place = $('#Place').val().trim();
        if (Place.length==0) {
            $('#ErrPlace').html("Please Enter the Place");   
            ErrorCount++;    
        } else {
            if (!(is_AlphaNumeric(Place))) {
                $('#ErrPlace').html("Please Enter Alpha Numeric Characters Only");
                ErrorCount++;    
            }
        }  
   var From_date = new Date($("#DateofBirth").val());
   var To_date = new Date();
   var diff_date =  To_date - From_date;
   var years = Math.floor(diff_date/31536000000);
   if($('#DateofBirth').val().trim()==""){
       $('#ErrDateofBirth').html("Please Enter Date of Birth");
       ErrorCount++;   
   }else {
   if(years<15){
        $('#ErrDateofBirth').html("Please Enter valid Date of Birth");
        ErrorCount++;    
   }
   }

       
    if(ErrorCount==0){
     var txt = '<table style="width:100%" style="font-size:13px;font-family:arial;color:#222">'
                    +'<tr>'
                        +'<td colspan="4">'
                            +'<div style="text-align:center;padding:10px;font-weight:bold;font-size:18px;letter-spacing:1.2px;">'
                                +'CONFIRMATION'
                                +'</div>'
                            +'</td>'
                        +'</tr>'
                        +'<tr>'
                            +'<td style="padding:5px;text-align:left;width:30px">&nbsp;</td>'
                            +'<td colspan="2">Are you sure want to submit?</td>'
                            +'<td style="padding:5px;text-align:left;width:30px">&nbsp;</td>'
                        +'</tr>'
                        +'<tr>'
                            +'<td style="padding:5px;text-align:left;width:30px">&nbsp;</td>'
                            +'<td style="width:20%">Email Address</td>'
                            +'<td><input type="text" name="Email" id="Email" placeholder="eg.john@example.com" style="line-height:normal;border: 1px solid #f9cae0;padding: 4px;font-size: 13px;color: #333;text-transform: lowercase;width: 100%;height:33px"><div id="ErrEmail" class="errorstring"></div></td>'
                            +'<td style="padding:5px;text-align:left;width:30px">&nbsp;</td>'
                        +'</tr>'
                        +'<tr>'
                        +'<td style="padding:5px;text-align:left;width:30px">&nbsp;</td>'
                            +'<td colspan="2"><div class="custom-control custom-checkbox mb-3"><input type="checkbox" name="terms" id="terms" class="custom-control-input">&nbsp;<label class="custom-control-label" for="terms">I agree terms and conditions</label></div><div id="Errterms" class="errorstring"></div></td>'
                            +'<td style="padding:5px;text-align:left;width:30px">&nbsp;</td>'
                        +'</tr>'
                    +'</table>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline" data-dismiss="modal" style="padding: 10px 50px;border: 1px solid #f24395;background: #ffc8e2;">Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-success" onclick="doSubmit()" style="padding: 10px 50px;background: #f24395;border: 1px solid #f24395;">Yes, Confirm to Submit</button>'
                 +'</div>';  
                 if (isSubmit==0) {
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
         return false;  
                 } 
                 if (isSubmit==1) {
                     return true;
                 }
     }else {                                                                                   
         return false;                                                                                                                                                                                                                                                
     }
}
function doSubmit(){
    
    $('#ErrEmail').html("");
    $('#Errterms').html("");
    var ErrorCount=0;    
    
     var Email = $('#Email').val().trim();
     
     if (Email.length==0) {
            $('#ErrEmail').html("Please Enter the Email Address");   
            ErrorCount++;    
     } else if (!(IsEmail(Email))) {                                                            
        $('#ErrEmail').html("Please Enter valid Email Address");
            ErrorCount++;    
     }else {
           $('#ErrEmail').html(""); 
        }
     if($('#terms').prop("checked") == false){
        $('#Errterms').html("Please agree terms and conditions");
        ErrorCount++; 
    }
    $('#EmailID').val($('#Email').val());
    if(ErrorCount==0){ 
        isSubmit=1;
        $('#submitForm').trigger("click"); 
    }else {
         return false;
     }
}
 function calculate_total_marks(){
 $("#TotalMarks").val(parseInt($('#Subject_Tamil').val())+parseInt($('#Subject_English').val())+parseInt($('#Subject_Mathametics').val())+parseInt($('#Subject_Science').val())+parseInt($('#Subject_Social').val()));           
 }
 setTimeout(function(){
     calculate_total_marks();
},1000);

var loadingGif="<img src='https://nmskamarajpolytechnic.com/assets/loading.gif' style='width:96px'>";
    function uploadimage(imgid){                                                                                       
        $('#image'+imgid).trigger("click");
    }
    
    function image1_onchage() {
        $('#div_1').html(loadingGif);
        var fd = new FormData(); 
        var files = $('#image1')[0].files[0]; 
        fd.append('file', files); 
        $.ajax({
            url: '../upload.php', 
            type: 'post', 
            data: fd, 
            contentType: false, 
            processData: false, 
            success: function(response){
                var obj = JSON.parse(response); 
                    if(obj.success=="1"){
                        $('#uploadimage1').val(obj.filename);
                            $('#div_1').html("<div><img src='<?php echo "https://nmskamarajpolytechnic.com/uploads/";?>"+obj.filename.trim()+"' style='width:100%;height:133px;'><br><span onclick='uploadimage(1)' class='btn btn-success btn-sm' style='padding: 0px 10px;font-size: 10px;text-align:center;background: #d10e69;border:1px solid #d10e69'>Upload</span>    </div>");
                            $('#Errimage1').html("");
                        } else {
                            $('#div_1').html('<img id="src_image1" onclick="uploadimage(1)" src="https://nmskamarajpolytechnic.com/images/usericon1.png" style="width:100%;opacity: 0.3;cursor: pointer;">');
                            $('#Errimage1').html(obj.msg);
                        }
                }, 
            }); 
    }
    function uploadcertificate(){                                                                                       
        $('#certificate1').trigger("click");
    }
    function certificate1_onchage() {
        var fd = new FormData(); 
        var files = $('#certificate1')[0].files[0]; 
        fd.append('file', files); 
        $.ajax({
            url: '../upload.php', 
            type: 'post', 
            data: fd, 
            contentType: false, 
            processData: false, 
            success: function(response){
                var obj = JSON.parse(response); 
                    if(obj.success=="1"){
                    $('#uploadcertificate1').val(obj.filename);      
                        $('#div_certificate').html(obj.filename.trim()+"&nbsp;&nbsp;<span onclick='certificate1_close()' style='cursor:pointer;background: white;border-radius: 50%;padding: 2px;font-size: 12px;'>X</span>");
                        $('#div_certificate').css({"border": "1px solid #f9cae0","padding":"4px 11px 4px 11px","background":"#ffffff"});    
                } else {
                        alert("error");
                    }
                }, 
            }); 
    }
    function certificate1_close() {
        $('#uploadcertificate1').val("");
        $('#div_certificate').html('<button type="button" class="btn btn-success" style="padding: 2px 10px;font-size: 11px;background: #f24395;border: 1px solid #f24395;" onclick="uploadcertificate()">Upload</button>'); 
        $('#div_certificate').css({"border": "none","padding":"0px"});   
    }
 function CheckDuplicateAadhaar() {
    
    $('#ErrAadhaarNumber').html("");
    var AadhaarNumber = $('#AadhaarNumber').val().trim();
    if (AadhaarNumber.length==0) {
        $('#ErrAadhaarNumber').html("Please Enter AadhaarNumber");
        return false; 
    }
    
    if (is_Numeric($('#AadhaarNumber').val())) {
        $.post( "../webservice.php?action=CheckDuplicateAadhaar&AadhaarNumber="+$('#AadhaarNumber').val(),"",function( rdata ) {
            var obj = JSON.parse(rdata);
            var objData = obj.data;
            if (obj.status=="Success") {
                $('#ErrAadhaarNumber').html(obj.message);
            } else {                                                                               
                $('#ErrAadhaarNumber').html();
            }
        });
    } else {
        $('#ErrAadhaarNumber').html("Please Enter Numeric Characters Only");
        return false;
    }
}    
     
</script>