<?php 
$page="about";
include_once("header.php");?>
  <section class="breadcrumb breadcrumb-img">
    <div class="container">
      <div class="row">
        <div class="col">
          <h1>Admission</h1>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="admission.php">Admission</a></li>
          
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!--========================================================
                          ABOUT
  =========================================================-->
  <section class="mt100">
    <div class="container">
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
    }            include_once("mysql.php");
                             $mysql =   new MySqldb();
                            if (isset($_POST['submitForm'])) {
                                  include_once("includes/mailcontroller.php");
    
                                  $checkbox1=$_POST['HECClubs'];  
                                    $chk="";  
                                    foreach($checkbox1 as $chk1)  
                                       {  
                                          $chk .= $chk1.",";  
                                       }   
                                       
                             if($_POST['SportsPlayer']=="Yes"){               
                                                                                                          
                                 $target_path = "gallery/";                 
                                 $target_path = "";                 
                                 
                              //  $filename = strtolower(time()."_".$_FILES['sportsfile']['name']);
                            
                             //   if(move_uploaded_file($_FILES['sportsfile']['tmp_name'], $target_path.$filename)) {
                                    
                                
                                 $filename = time().strtolower($_FILES['sportsfile']['name']);
                                 $filename = preg_replace('/\s+/', '', $filename);
                                 $target_path = $target_path . basename($filename); 

                                 if(move_uploaded_file($_FILES['sportsfile']['tmp_name'], $target_path)) {
                                    
                                    $file = $filename;
                                  //   echo "file upload success";
                                }else {
                                    $file = "";
                                 //   echo "file upload failure";
                                }
                             }
                                    
                                    $id =  $mysql->insert("_tbl_admissionform",array("ApplicantName"            =>$_POST['applicantName'],
                                                                         "ApplicantEmail"           =>$_POST['applicantEmail'],
                                                                         "ApplicantMobile"          =>$_POST['applicantMobile'],
                                                                         "ApplicantAddress"         =>$_POST['applicantAddress'],
                                                                         "ApplicantParentName"      =>$_POST['applicantParentName'],
                                                                         "ApplicantParentMobile"    =>$_POST['applicantParentMobile'],
                                                                         "DateofBirth"              =>$_POST['DateofBirth'],
                                                                         "Age"                      =>$_POST['Age'],
                                                                         "Gender"                   =>$_POST['Gender'],
                                                                         "Community"                =>$_POST['community'],
                                                                         "Nationality"              =>$_POST['Nationality'],
                                                                         "Religion"                 =>$_POST['Religion'],
                                                                         "Caste"                    =>$_POST['Caste'],
                                                                         "ApplicantInstitution"     =>$_POST['InstitutionLastStudied'],
                                                                         "SportsPlayer"             =>$_POST['SportsPlayer'],
                                                                         "SportsFile"               =>$file,
                                                                         "CreatedOn"                =>date("Y-m-d H:i:s")));
                                     
                                 
                                    
                                  
        if ($id>0) {         
                         
            $message = '<div style="padding:45px;background:#e5e5e5;margin:20px;border-radius:10px;padding-top:20px;padding-bottom:10px;">
                            <div style="text-align:center;padding-bottom:20px;">
                                <img src="https://stmcnys.com/assets/footerlogo.png">&nbsp;&nbsp;
                            </div>
                            <div style="border:0px solid black;text-align:left;padding:30px;background:white;border-radius:10px;">
                                Hello,
                                <br><br>
                                Your Application Saved:
                                <br><br>
                                <p style="text-align:center">
                                    <a href="https://stmcnys.com/viewapplication.php?id='.$id.'" style="font-size:16px;font-family:Poppins,sans-serif;font-weight:600;color:#ffffff;text-decoration:none;background-color:#3a77ff;border-top:12px solid #3a77ff;border-bottom:12px solid #3a77ff;border-left:36px solid #3a77ff;border-right:36px solid #3a77ff;display:inline-block">VIEW APPLICATION</a>
                                </p>               
                                <br> 
                                Thanks <br>                                                                  
                                S. THANGAPAZHAM COLLEGE OF NATUROPATHY AND YOGA SCIENCE
                            </div>
                            <p style="color:#888;padding:10px;text-align:center">Please do not reply this email. Replies to this message are routed to an unmonitored mailbox. For more information visit our help page or contact us here.</p>
                        </div>';

            $mparam['MailTo']=$_POST['applicantEmail'];
            $mparam['MemberID']=$id;
            $mparam['Subject']="Applicant Registration Completed";
            $mparam['Message']=$message;
            MailController::Send($mparam,$mailError);
            
            MobileSMS::sendSMS("9942852100","Dear ".$_POST['applicantName'].", You have received enquiry Applicant Name : ".$_POST['applicantName']."Mobile Number : ".$_POST['applicantMobile'],$id);  
                                                                                                        
            ?>
                                                                                                                                             
                    <div class="row" >
                        <div class="col-md-2"></div>
                        <div class="col-md-8" style="margin:0px auto !important;border-radius: 10px;background: #fff;padding-bottom: 0px;text-align:center">
                            <div class="kamaraj-contact-col">
                                <div class="row">
                                    <div class="registration_form_control">
                                        <label>
                                            <img src="assets/img/tick.jpg" style="width:120px"><br> <br>
                                            <h3 style='font-weight:bold;'>Your Application Accepted</h3>
                                           <span> Reference Number: <?php echo $_POST['applicantMobile']."-".$id;?>                               
                                            </span>
                                        </label>
                                </div>
                            </div>
                        </div>
                    </div>
       <?php } else {   ?>
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
        <?php }
    } else {
   ?>
      
      <script>
    
     function is_AlphaNumeric(acname) {
    
        if (acname.length==0) {
            return false;
        }
        //var reg = /^[a-z0-9\-\s]+$/i
        var reg = /^[a-zA-Z\s\.]+$/
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
 $(document).ready(function(){
        $("#applicantName").blur(function() { 
          $('#ErrapplicantName').html("");    
            var ac_name = $('#applicantName').val().trim();
                if (ac_name.length==0) {
                    $('#ErrapplicantName').html("Please Enter Applicant Name");   
                } else {
                    if (!(is_AlphaNumeric(ac_name))) {
                        $('#ErrapplicantName').html("Please Enter Alpha Numeric Characters Only");
                    }
                }
        });
        
        
        
        $("#applicantEmail").blur(function() {   
            $('#ErrapplicantEmail').html("");    
            var ap_email = $('#applicantEmail').val().trim();
            if (ap_email.length==0) {
                $('#ErrapplicantEmail').html("Please Enter Applicant Email ID");   
            } else {
                if (!(IsEmail(ap_email))) {
                    $('#ErrapplicantEmail').html("Please Enter Valid Email ID");
                }
            }
        });
        $("#applicantMobile").blur(function() { 
        $('#ErrapplicantMobile').html("");   
        var m = $('#applicantMobile').val().trim();
        if (m.length==0) {
            $('#ErrapplicantMobile').html("Please Enter Applicant Mobile Number");
        } else {
            if (!($('#applicantMobile').val().length==10 && parseInt($('#applicantMobile').val())>6000000000 && parseInt($('#applicantMobile').val())<9999999999)) {
                $('#ErrapplicantMobile').html("Please Enter Valid Mobile Number");
            }
        }
        }); 
       $("#applicantAddress").blur(function() {   
       $('#ErrapplicantAddress').html("");   
        var Ad= $('#applicantAddress').val().trim();
        if (Ad.length==0) {
            $('#ErrapplicantAddress').html("Please Enter Address");
        }
        });
        $("#applicantParentName").blur(function() {   
            $('#ErrapplicantParentName').html("");   
        var ap_name = $('#applicantParentName').val().trim();
        if (ap_name.length==0) {
            $('#ErrapplicantParentName').html("Please Enter Applicant Parent / Guardian Name");   
        } else {
            if (!(is_AlphaNumeric(ap_name))) {
                $('#ErrapplicantParentName').html("Please Enter Alpha Numeric Characters Only");
            }
        } 
        });
        
        $("#applicantParentMobile").blur(function() { 
         $('#ErrapplicantParentMobile').html("");    
        var m = $('#applicantParentMobile').val().trim();
        if (m.length==0) {
            $('#ErrapplicantParentMobile').html("Please Enter Applicant Parent / Guardian Mobile Number");
        } else {
            if (!($('#applicantParentMobile').val().length==10 && parseInt($('#applicantParentMobile').val())>6000000000 && parseInt($('#applicantParentMobile').val())<9999999999)) {
                $('#ErrapplicantParentMobile').html("Please Enter Valid Mobile Number");
            }
        }
        });
        
        $("#DateofBirth").blur(function() {   
            $('#ErrDateofBirth').html("");    
            var ap_email = $('#DateofBirth').val().trim();
            if (ap_email.length==0) {
                $('#ErrDateofBirth').html("Please Enter DateofBirth");   
            } 
        });
        
        $("#Age").blur(function() {   
            $('#ErrAge').html("");    
            var ap_email = $('#Age').val().trim();
            if (ap_email.length==0) {
                $('#ErrAge').html("Please Enter Age");   
            } 
        });
        
        $("#Nationality").blur(function() {   
            $('#ErrNationality').html("");   
        var Nationality = $('#Nationality').val().trim();
        if (Nationality.length==0) {
            $('#ErrNationality').html("Please Enter Nationality");   
        } else {
            if (!(is_AlphaNumeric(Nationality))) {
                $('#ErrNationality').html("Please Enter Alpha Numeric Characters Only");
            }
        } 
        });
        $("#Religion").blur(function() {   
            $('#ErrReligion').html("");   
        var Religion = $('#Religion').val().trim();
        if (Religion.length==0) {
            $('#ErrReligion').html("Please Enter Religion");   
        } else {
            if (!(is_AlphaNumeric(Religion))) {
                $('#ErrReligion').html("Please Enter Alpha Numeric Characters Only");
            }
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
        $("#InstitutionLastStudied").blur(function() { 
         $('#ErrInstitutionLastStudied').html("");     
        var AppIn = $('#InstitutionLastStudied').val().trim();
        if (AppIn.length==0) {
            $('#ErrInstitutionLastStudied').html("Please Enter Name of the School/Institution Last Studied ");
        }
        });
 });
   
    function checkInputs() {
    $('#ErrapplicantName').html(""); 
    $('#ErrapplicantEmail').html(""); 
    $('#ErrapplicantMobile').html(""); 
    $('#ErrapplicantAddress').html(""); 
    $('#ErrapplicantParentName').html(""); 
    $('#ErrapplicantParentMobile').html(""); 
    $('#ErrDateofBirth').html(""); 
    $('#ErrAge').html(""); 
    $('#ErrNationality').html(""); 
    $('#ErrReligion').html(""); 
    $('#ErrCaste').html(""); 
    $('#ErrInstitutionLastStudied').html(""); 
   
    var ErrorCount=0;  
        /* IsNonEmpty("applicantName","ErrapplicantName","Please Enter Applicant Name");
           IsAlphaNumeric("applicantName","ErrapplicantName","Please Enter Alpha Numerics Character Only");
         }
        /* if(IsNonEmpty("applicantEmail","ErrapplicantEmail","Please Enter Applicant Email")){
            IsEmail("applicantEmail","ErrapplicantEmail","Please Enter Alpha Numerics Character Only");
         }  */ 
       var ac_name = $('#applicantName').val().trim();
        if (ac_name.length==0) {
            $('#ErrapplicantName').html("Please Enter Applicant Name");   
            ErrorCount++;      
        } else {
            if (!(is_AlphaNumeric(ac_name))) {
                $('#ErrapplicantName').html("Please Enter Alpha Numeric Characters Only");
            ErrorCount++; 
            }
        }
        var ap_email = $('#applicantEmail').val().trim();
        if (ap_email.length==0) {
            $('#ErrapplicantEmail').html("Please Enter Applicant Email ID");   
            ErrorCount++;      
        } else {
            if (!(IsEmail(ap_email))) {
                $('#ErrapplicantEmail').html("Please Enter Valid Email ID");
            ErrorCount++; 
            }
        }
        
        var m = $('#applicantMobile').val().trim();
        if (m.length==0) {
            $('#ErrapplicantMobile').html("Please Enter Applicant Mobile Number");
           ErrorCount++;   
        } else {
            if (!($('#applicantMobile').val().length==10 && parseInt($('#applicantMobile').val())>6000000000 && parseInt($('#applicantMobile').val())<9999999999)) {
                $('#ErrapplicantMobile').html("Please Enter Valid Mobile Number");
            ErrorCount++;           
            }
        } 
        
        var Ad= $('#applicantAddress').val().trim();
        if (Ad.length==0) {
            $('#ErrapplicantAddress').html("Please Enter Address");
           ErrorCount++;   
        }
        var ap_name = $('#applicantParentName').val().trim();
        if (ap_name.length==0) {
            $('#ErrapplicantParentName').html("Please Enter Applicant Parent / Guardian Name");   
            ErrorCount++;      
        } else {
            if (!(is_AlphaNumeric(ap_name))) {
                $('#ErrapplicantParentName').html("Please Enter Alpha Numeric Characters Only");
            ErrorCount++; 
            }
        }
        var m = $('#applicantParentMobile').val().trim();
        if (m.length==0) {
            $('#ErrapplicantParentMobile').html("Please Enter Applicant Parent / Guardian Mobile Number");
           ErrorCount++;   
        } else {
            if (!($('#applicantParentMobile').val().length==10 && parseInt($('#applicantParentMobile').val())>6000000000 && parseInt($('#applicantParentMobile').val())<9999999999)) {
                $('#ErrapplicantParentMobile').html("Please Enter Valid Mobile Number");
            ErrorCount++;           
            }
        }
        var ai = $('#DateofBirth').val().trim();
        if (ai.length==0) {
            $('#ErrDateofBirth').html("Please Enter Date of Birth ");
           ErrorCount++;   
        }
         var ai = $('#Age').val().trim();
        if (ai.length==0) {
            $('#ErrAge').html("Please Enter Age ");
           ErrorCount++;   
        }
        var Nationality = $('#Nationality').val().trim();
        if (Nationality.length==0) {
            $('#ErrNationality').html("Please Enter Applicant Parent / Guardian Name");   
            ErrorCount++;      
        } else {
            if (!(is_AlphaNumeric(Nationality))) {
                $('#ErrNationality').html("Please Enter Alpha Numeric Characters Only");
            ErrorCount++; 
            }
        }
        var Religion = $('#Religion').val().trim();
        if (Religion.length==0) {
            $('#ErrReligion').html("Please Enter Religion");   
            ErrorCount++;      
        } else {
            if (!(is_AlphaNumeric(Religion))) {
                $('#ErrReligion').html("Please Enter Alpha Numeric Characters Only");
            ErrorCount++; 
            }
        }
        var Caste = $('#Caste').val().trim();
        if (Caste.length==0) {
            $('#ErrCaste').html("Please Enter Caste");   
            ErrorCount++;      
        } else {
            if (!(is_AlphaNumeric(Caste))) {
                $('#ErrCaste').html("Please Enter Alpha Numeric Characters Only");
            ErrorCount++; 
            }
        } 
       
        var AppIn = $('#InstitutionLastStudied').val().trim();
        if (AppIn.length==0) {
            $('#ErrInstitutionLastStudied').html("Please Enter Institution Last Studied ");
           ErrorCount++;   
        }
        // alert(ErrorCount) ;
        if (ErrorCount>0) {
            return false;
        }else {
            return true;
        }
        
       
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
    </script>
    <style>
.errorstring{width:100%;font-size:11px;color:red}
</style>
            <div class="row" >
                <div class="col-md-2"></div>
                <div class="col-md-8" style="margin:0px auto !important;border: 2px solid #ffd041;padding: 50px;border-radius: 10px;background: #fff;padding-bottom: 0px;">
                <div class="kamaraj-contact-col">
                        <div class="row">
                            <form action="" method="post" class="wpcf7-form"  enctype="multipart/form-data" onsubmit="return checkInputs();">
                                <div class="registration_form_control">
                                    <label style="width: 100%;margin-bottom: 20px;"><span style="font-size: 16px;">Name of the Applicant</span><span style="color : red;font-size: 10px;vertical-align: text-bottom;">*</span><br>
                                        <span>
                                            <input type="text"  id="applicantName" value="<?php echo (isset($_POST['applicantName']) ? $_POST['applicantName'] : "");?>" size="40" name="applicantName" class="form-control" style="height:26px;font-size:13px;background: white;width: 100%;border-left: none;border-top: none;border-right: none;padding-left: 0px;margin-bottom:0px;" aria-required="true" aria-invalid="false" placeholder="Enter name of the applicant">
                                        </span>
                                        <span class="errorstring" id="ErrapplicantName"></span>
                                    </label>
                                </div>
                                <div class="registration_form_control">
                                    <label style="width: 100%;margin-bottom: 20px;"><span style="font-size: 16px;"> Email</span><span style="color : red;font-size: 10px;vertical-align: text-bottom;">*</span><br>
                                        <span>
                                            <input type="text" value="<?php echo (isset($_POST['applicantEmail']) ? $_POST['applicantEmail'] : "");?>" size="40"  id="applicantEmail" name="applicantEmail"   class="form-control" style="height:26px;font-size:13px;background: white;width: 100%;border-left: none;border-top: none;border-right: none;padding-left: 0px;margin-bottom:0px;" aria-required="true" aria-invalid="false" placeholder="Enter your email">
                                        </span>
                                        <span class="errorstring" id="ErrapplicantEmail"></span>
                                    </label>
                                </div>
                                <div class="registration_form_control">
                                    <label style="width: 100%;margin-bottom: 20px;"> <span style="font-size: 16px;">Phone Number</span><span style="color : red;font-size: 10px;vertical-align: text-bottom;">*</span><br>
                                        <span>
                                            <input type="text" value="<?php echo (isset($_POST['applicantMobile']) ? $_POST['applicantMobile'] : "");?>" name="applicantMobile"  id="applicantMobile"  size="40" maxlength="10" minlength="10" class="form-control" style="height:26px;font-size:13px;background: white;width: 100%;border-left: none;margin-bottom:0px;border-top: none;border-right: none;padding-left: 0px;" aria-required="true" aria-invalid="false" placeholder="Enter mobile number of Applicant">
                                        </span>
                                        <span class="errorstring" id="ErrapplicantMobile"></span>
                                       
                                    </label>
                                </div>
                                <div class="registration_form_control">
                                    <label style="width: 100%;margin-bottom: 20px;"><span style="font-size: 16px;"> Address</span><span style="color : red;font-size: 10px;vertical-align: text-bottom;">*</span><br>
                                        <span>
                                            <textarea cols="40" rows="10" class="form-control" style="font-size:13px;background: white;width: 100%;border-left: none;border-top: none;border-right: none;padding-left: 0px;height:30px;margin-bottom: 0px" id="applicantAddress" name="applicantAddress" aria-required="true" aria-invalid="false" placeholder="Enter Address Here" style="margin-bottom:0px;width: 478px; height: 195px;"><?php echo (isset($_POST['applicantAddress']) ? $_POST['applicantAddress'] : "");?></textarea>
                                        </span> 
                                         <span class="errorstring" id="ErrapplicantAddress"></span>
                                    </label>
                                </div>
                                <div class="registration_form_control">
                                    <label style="width: 100%;margin-bottom: 20px;"><span style="font-size: 16px;"> Name of the Parent/Guardian</span><span style="color : red;font-size: 10px;vertical-align: text-bottom;">*</span><br>
                                        <span>
                                            <input type="text" id="applicantParentName" name="applicantParentName"  value="<?php echo (isset($_POST['applicantParentName']) ? $_POST['applicantParentName'] : "");?>" size="40" class="form-control" style="height:26px;font-size:13px;background: white;width: 100%;border-left: none;border-top: none;border-right: none;padding-left: 0px;margin-bottom:0px;" aria-required="true" aria-invalid="false" placeholder="Enter name of Parent/Guardian">
                                        </span>
                                        <span class="errorstring" id="ErrapplicantParentName"></span>
                                    </label>
                                </div>
                                <div class="registration_form_control">
                                    <label style="width: 100%;margin-bottom: 20px;"><span style="font-size: 16px;">Parent's Mobile number</span><span style="color : red;font-size: 10px;vertical-align: text-bottom;">*</span><br>
                                       <span>
                                            <input type="text"  id="applicantParentMobile" name="applicantParentMobile" value="<?php echo (isset($_POST['applicantParentMobile']) ? $_POST['applicantParentMobile'] : "");?>" size="40" maxlength="10" minlength="10" class="form-control" style="height:26px;font-size:13px;background: white;width: 100%;border-left: none;border-top: none;border-right: none;padding-left: 0px;margin-bottom:0px;" aria-required="true" aria-invalid="false" placeholder="Enter mobile number of Parent/Guardian">
                                        </span> 
                                        <span class="errorstring" id="ErrapplicantParentMobile"></span>
                                    </label>
                                </div>
                                <div class="form-group row">
                                 <div class="col-sm-6">
                                <div class="registration_form_control">
                                    <label style="width: 100%;margin-bottom: 20px;"><span style="font-size: 16px;">Date of Birth</span><span style="color : red;font-size: 10px;vertical-align: text-bottom;">*</span><br>
                                       <span>
                                            <input type="date"  id="DateofBirth" name="DateofBirth" value="<?php echo (isset($_POST['DateofBirth']) ? $_POST['DateofBirth'] : "");?>" onchange="AgeCalc();" size="40" maxlength="10" minlength="10" class="form-control" style="height:34px;font-size:13px;background: white;width: 100%;border-left: none;border-top: none;border-right: none;padding-left: 0px;margin-bottom:0px;" aria-required="true" aria-invalid="false" placeholder="DateofBirth">
                                        </span> 
                                        <span class="errorstring" id="ErrDateofBirth"></span>
                                    </label>
                                </div>
                                </div> 
                                <div class="col-sm-6">
                                    <div id="AgeDiv" class="registration_form_control">
                                        <label style="width: 100%;margin-bottom: 20px;"><span style="font-size: 16px;">Age</span><span style="color : red;font-size: 10px;vertical-align: text-bottom;">*</span><br>
                                           <span>
                                                <input type="text" readonly="readonly"  id="Age" name="Age" value="" size="40" maxlength="10" minlength="10" class="form-control" style="height:34px;font-size:13px;background: white;width: 100%;border-left: none;border-top: none;border-right: none;padding-left: 0px;margin-bottom:0px;" aria-required="true" aria-invalid="false" placeholder="0">
                                            </span> 
                                            <span class="errorstring" id="ErrAge"></span>
                                        </label>
                                    </div>
                                </div>
                                </div>
                                <div class="registration_form_control"  style="margin-bottom: 20px;">
                                    <label style="width: 100%;"><span style="font-size: 16px;"> Gender</span><span style="color : red;font-size: 10px;vertical-align: text-bottom;">*</span></label><br>
                                    <label><input type="radio" name="Gender" id="Gender" value="Male" <?php echo (isset($_POST['Gender']) && $_POST['Gender']=="Male") ? " checked='checked' ": "";?>>&nbsp;Male</label><br>
                                    <label><input type="radio" name="Gender" id="Gender" value="Female" <?php echo (isset($_POST['Gender']) && $_POST['Gender']=="Female") ? " checked='checked' ": "";?>>&nbsp;Female</label>
                                </div>
                                 <div class="registration_form_control" style="margin-bottom: 20px;">
                                    <label style="width: 100%;"><span style="font-size: 16px;"> Community</span><span style="color : red;font-size: 10px;vertical-align: text-bottom;">*</span><br>
                                        <span>
                                            <select name="community" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required form_control_input" id="community" aria-required="true" aria-invalid="false">
                                                <option value="OC" <?php echo (isset($_POST['community']) && $_POST['community']=="OC") ? " selected='selected' ": "";?>>&nbsp;OC</option>
                                                <option value="BC" <?php echo (isset($_POST['community']) && $_POST['community']=="BC") ? " selected='selected' ": "";?>>&nbsp;BC</option>
                                                <option value="MBC" <?php echo (isset($_POST['community']) && $_POST['community']=="MBC") ? " selected='selected' ": "";?>>&nbsp;MBC</option>
                                                <option value="SC/ST" <?php echo (isset($_POST['community']) && $_POST['community']=="SC/ST") ? " selected='selected' ": "";?>>&nbsp;SC/ST</option>
                                                <option value="Others" <?php echo (isset($_POST['community']) && $_POST['community']=="Others") ? " selected='selected' ": "";?>>&nbsp;Others</option>
                                            </select>
                                        </span><br>
                                    </label>
                                </div>
                                                                                                 
                                <div class="registration_form_control">
                                    <label style="width: 100%;margin-bottom: 20px;"><span style="font-size: 16px;">Nationality</span><span style="color : red;font-size: 10px;vertical-align: text-bottom;">*</span><br>
                                       <span>
                                            <input type="text"  id="Nationality" name="Nationality" value="<?php echo (isset($_POST['Nationality']) ? $_POST['Nationality'] : "");?>" size="40" class="form-control" style="height:26px;font-size:13px;background: white;width: 100%;border-left: none;border-top: none;border-right: none;padding-left: 0px;margin-bottom:0px;" aria-required="true" aria-invalid="false" placeholder="Enter Nationality">
                                        </span> 
                                        <span class="errorstring" id="ErrNationality"></span>
                                    </label>
                                </div>
                                <div class="registration_form_control">
                                    <label style="width: 100%;margin-bottom: 20px;"><span style="font-size: 16px;">Religion</span><span style="color : red;font-size: 10px;vertical-align: text-bottom;">*</span><br>
                                       <span>
                                            <input type="text"  id="Religion" name="Religion" value="<?php echo (isset($_POST['Religion']) ? $_POST['Religion'] : "");?>" size="40" class="form-control" style="height:26px;font-size:13px;background: white;width: 100%;border-left: none;border-top: none;border-right: none;padding-left: 0px;margin-bottom:0px;" aria-required="true" aria-invalid="false" placeholder="Enter Nationality">
                                        </span> 
                                        <span class="errorstring" id="ErrReligion"></span>
                                    </label>
                                </div>
                                <div class="registration_form_control">
                                    <label style="width: 100%;margin-bottom: 20px;"><span style="font-size: 16px;">Caste</span><span style="color : red;font-size: 10px;vertical-align: text-bottom;">*</span><br>
                                       <span>
                                            <input type="text"  id="Caste" name="Caste" value="<?php echo (isset($_POST['Caste']) ? $_POST['Caste'] : "");?>" size="40" class="form-control" style="height:26px;font-size:13px;background: white;width: 100%;border-left: none;border-top: none;border-right: none;padding-left: 0px;margin-bottom:0px;" aria-required="true" aria-invalid="false" placeholder="Enter Nationality">
                                        </span> 
                                        <span class="errorstring" id="ErrCaste"></span>
                                    </label>
                                </div>
                                <div class="registration_form_control">
                                    <label style="width: 100%;margin-bottom: 20px;"><span style="font-size: 16px;">Institution Last Studied</span><span style="color : red;font-size: 10px;vertical-align: text-bottom;">*</span><br>
                                       <span>
                                            <input type="text"  id="InstitutionLastStudied" name="InstitutionLastStudied" value="<?php echo (isset($_POST['InstitutionLastStudied']) ? $_POST['InstitutionLastStudied'] : "");?>" class="form-control" style="height:26px;font-size:13px;background: white;width: 100%;border-left: none;border-top: none;border-right: none;padding-left: 0px;margin-bottom:0px;" aria-required="true" aria-invalid="false" placeholder="Enter Institution Last Studied">
                                        </span> 
                                        <span class="errorstring" id="ErrInstitutionLastStudied"></span>
                                    </label>
                                </div>
                                 <div class="registration_form_control" style="margin-bottom: 20px;">
                                    <label style="width: 100%;"><span style="font-size: 16px;">Are you a Sports player/Athlete represented in District/State/National/International level</span><span style="color : red;font-size: 10px;vertical-align: text-bottom;">*</span></label><br>
                                    <label><input type="radio" name="SportsPlayer" value="Yes" id="SportsPlayer" onclick="sportsplayer('Show');" <?php echo (isset($_POST['SportsPlayer']) && $_POST['SportsPlayer']=="Yes") ? " checked='checked' ": "";?>>&nbsp;Yes</label><br>
                                    <label><input type="radio" name="SportsPlayer" value="No"  id="SportsPlayer" onclick="sportsplayer('Hide');" <?php echo (isset($_POST['SportsPlayer']) && $_POST['SportsPlayer']=="No") ? " checked='checked' ": "";?>>&nbsp;No</label><br>
                                </div>
                                <div id="sports-selected" style="display: none;" >
                                    <div class="registration_form_control">
                                        <label style="width: 100%;margin-bottom: 20px;"><span style="font-size: 16px;"> If yes kindly note the details and attach a copy of the certificate to avail Sports scholarship</span><span style="color : red;font-size: 10px;vertical-align: text-bottom;">*</span><br>
                                            <span>
                                                <input type="file" name="sportsfile" size="40" class="form-control" id="sportsFile" accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.ppt,.pptx,.odt,.avi,.ogg,.m4a,.mov,.mp3,.mp4,.mpg,.wav,.wmv" aria-required="true" aria-invalid="false">
                                            </span>
                                        </label>
                                    </div>                                               
                                </div>
                               <div id="registerButton" style="text-align:right">
                                    <button type="submit" class="btn-2" id="submitForm" name="submitForm">Register</button>
                               </div>
                               <div class="wpcf7-response-output wpcf7-display-none">
                               <br></div>
                            </form>
                        </div>
                    </div>
                </div>                                                               
                <div class="col-md-2"></div>
            </div>
  <?php } ?>       
       
    </div>
  </section>
<br><br>
<?php include_once("footer.php");?>