<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
  
    <link href="images/favicon.png" rel="shortcut icon" type="image/png">

    <!-- Efinance Title -->
    <title>NMS Kamaraj Polytechnic College</title>

    <!-- css file -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive stylesheet -->
    <link rel="stylesheet" href="css/responsive.css"> <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
   <script type="text/javascript" src="app.js"></script>
     <script type="text/javascript" src="js/jquery.js"></script>
<body>
   
    <!-- Main Header Start -->
       <header class="kamaraj-main-header">
     
        <div class="kamaraj-header-nav scrollingto-fixed">
            <div class="container">
                 <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <nav class="navbar navbar-default kamaraj-navbar">
                            <div class="container-fluid">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <a class="navbar-brand logo-obs" href="index.php">
                                        <img src="images/logo.png" alt="">
                                    </a>
                                </div>
                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav navbar-right" data-hover="dropdown" data-animations="flipInY">
                                        <li class=" active"> <a href="index.php">Home </a> </li>
                                        <li><a href="about.php">About Us</a></li>
                                                <li class="dropdown">
                                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Department </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="automobile.php">Automobile Engineering</a> </li>
                                                <li><a href="computerscience.php">Computer Engineering</a></li>
                                                <li><a href="civilengineering.php">Civil Engineering</a></li>
                                                <li><a href="mechanical.php">Mechanical Engineering</a></li>
                                                <li><a href="ece.php">Electronics & Comm. Engg.</a></li>
                                                <li><a href="eee.php">Electrical & ELEC. Engg. </a></li>
                                            </ul>
                                        </li>
                                        <li><a href="placement.php">Placement</a> </li>
                                                <li class="dropdown">
                                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Facilities</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="hostel.php">Hostel</a></li>
                                                <li><a href="library.php">Library</a> </li>
                                                <li><a href="transport.php">Transport</a> </li>
                                                
                                                <li><a href="salientfeatures.php">Salient Features</a> </li>
                                                <li><a href="activities.php">Activities</a> </li>
                                                <li><a href="others.php">Others</a> </li>
                                            </ul>
                                        </li>
                                        <li><a href="gallery.php">Gallery</a> </li>
                                        <li><a href="alumini.php">Alumni</a> </li>
                                        <li><a href="contact.php">Contact Us</a> </li>
                                    </ul>
                                </div>
                                <!-- /.navbar-collapse -->
                            </div>
                            <!-- /.container-fluid -->
                        </nav>
                    </div>
                    <!-- <div class="col-md-2 col-sm-12"> -->
                        <!-- <div class="kamaraj-log-reg"> -->
                            <!-- <a href="account.php">Login</a> -->
                            <!-- <span>/</span> -->
                            <!-- <a href="account.php">Register</a> -->
                        <!-- </div> -->
                    <!-- </div> -->
                </div>
                </div>
        </div>
    </header> <!-- Main Header end -->

    <!-- Inner page hedaing start -->
    <section class="kamaraj-inner-page-heading kamaraj-layer-black">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="kamaraj-inner-heading">
                        <h2>Register</h2>
                      
                        <p><a href="index.php">HOME</a> > <a href="#">Register</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Inner page hedaing end -->
   
    <!-- Contact start -->
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
                            if (isset($_POST['submitForm'])) {
                                
                                  include_once("webadmin/mysql.php");
                                  
                                  $mysql =   new MySql();
                                  
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
                                    
                                    $id =  $mysql->insert("register",array("ApplicantName"            =>$_POST['applicantName'],
                                                                         "ApplicantEmail"           =>$_POST['applicantEmail'],
                                                                         "ApplicantMobile"          =>$_POST['applicantMobile'],
                                                                         "ApplicantAddress"         =>$_POST['applicantAddress'],
                                                                         "ApplicantParentName"      =>$_POST['applicantParentName'],
                                                                         "ApplicantParentMobile"    =>$_POST['applicantParentMobile'],
                                                                         "DateofBirth"              =>$_POST['DateofBirth'],
                                                                         "Age"                      =>$_POST['Age'],
                                                                         "Gender"                   =>$_POST['Gender'],
                                                                         "ApplicantInstitution"     =>$_POST['applicantInstitution'],
                                                                         "CourseCompleted"          =>$_POST['courseCompleted'],
                                                                         "courseToSelect"           =>$_POST['courseToSelect'],
                                                                         "SportsPlayer"             =>$_POST['SportsPlayer'],
                                                                         "SportsFile"               =>$file,
                                                                         "Community"                =>$_POST['community'],
                                                                         "CreatedOn"                =>date("Y-m-d H:i:s")));
                                     
                                 
                                    
                                  
        if ($id>0) {         
            
            $message = "Dear Applicant,<br> Your Application Accepted.<br> Reference Number:".$_POST['applicantMobile']."-".$id;"";
                   
                          $mparam['MailTo']=$_POST['applicantEmail'];
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
                                            <h3 style='font-weight:bold;'>Your Application Accepted</h3>
                                           <span> Reference Number: <?php echo $_POST['applicantMobile']."-".$id;?>
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
.errorstring{width:100%;font-size:11px;color:red}
</style>
    <script>
    
     function is_AlphaNumeric(acname) {
    
        if (acname.length==0) {
            return false;
        }
        var reg = /^[a-z0-9\-\s]+$/i
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
        
        
        $("#applicantInstitution").blur(function() { 
         $('#ErrapplicantInstitution').html("");     
        var AppIn = $('#applicantInstitution').val().trim();
        if (AppIn.length==0) {
            $('#ErrapplicantInstitution').html("Please Enter Name of the School/Institution Last Studied ");
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
    $('#ErrapplicantInstitution').html(""); 
   
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
       
        var AppIn = $('#applicantInstitution').val().trim();
        if (AppIn.length==0) {
            $('#ErrapplicantInstitution').html("Please Enter Name of the School/Institution Last Studied ");
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
    <section class="kamaraj-contact-field">
        <div class="container">
            <div class="row" >
                <div class="col-md-2"></div>
                <div class="col-md-8" style="margin:0px auto !important;border: 2px solid #bad8f7;padding: 50px;border-radius: 10px;background: #fff;padding-bottom: 0px;">
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
                                    <label style="width: 100%;margin-bottom: 20px;"><span style="font-size: 16px;"> Name of the School/Institution Last Studied</span><span style="color : red;font-size: 10px;vertical-align: text-bottom;">*</span><br>
                                        <span>
                                            <input type="text" name="applicantInstitution" value="<?php echo (isset($_POST['applicantInstitution']) ? $_POST['applicantInstitution'] : "");?>" size="40" class="form-control" style="background: white;width: 100%;height:26px;font-size:13px;border-left: none;border-top: none;border-right: none;padding-left: 0px;margin-bottom:0px;" id="applicantInstitution" aria-required="true" aria-invalid="false" placeholder="Enter Name of the School/Institution">
                                        </span>
                                        <span class="errorstring" id="ErrapplicantInstitution"></span>
                                    </label>
                                </div>
                                <div class="registration_form_control"  style="margin-bottom: 20px;">
                                    <label style="width: 100%;"><span style="font-size: 16px;"> Course Completed</span><span style="color : red;font-size: 10px;vertical-align: text-bottom;">*</span></label><br>
                                    <label><input type="radio" name="courseCompleted" value="HSC" <?php echo (isset($_POST['courseCompleted']) && $_POST['courseCompleted']=="HSC") ? " checked='checked' ": "";?>>&nbsp;HSC</label><br>
                                    <label><input type="radio" name="courseCompleted" value="SSLC" <?php echo (isset($_POST['courseCompleted']) && $_POST['courseCompleted']=="SSLC") ? " checked='checked' ": "";?>>&nbsp;SSLC</label>
                                </div>
                                 <div class="registration_form_control" style="margin-bottom: 20px;">
                                    <label style="width: 100%;"><span style="font-size: 16px;"> Course Willing to Learn</span><span style="color : red;font-size: 10px;vertical-align: text-bottom;">*</span></label><br>
                                    <span>
                                        <select name="courseToSelect" id="courseToSelect"  class="form-control" style="background: white;width: 100%;border-left: none;border-top: none;border-right: none;padding-left: 0px;height:31px;/*font-size: 13px;font-weight: bold;color: #9999b2;*/"  aria-required="true" aria-invalid="false">
                                            <option value="Automobile Engineering" <?php echo (isset($_POST['courseToSelect']) && $_POST['courseToSelect']=="Automobile Engineering") ? " selected='selected' ": "";?>>&nbsp;Automobile Engineering</option>
                                            <option value="Computer Science and Engineering" <?php echo (isset($_POST['courseToSelect']) && $_POST['courseToSelect']=="Computer Science and Engineering") ? " selected='selected' ": "";?>>&nbsp;Computer Science and Engineering</option>
                                            <option value="Civil Engineering" <?php echo (isset($_POST['courseToSelect']) && $_POST['courseToSelect']=="Civil Engineering") ? " selected='selected' ": "";?>>&nbsp;Civil Engineering</option>
                                            <option value="Mechanical Engineering" <?php echo (isset($_POST['courseToSelect']) && $_POST['courseToSelect']=="Mechanical Engineering") ? " selected='selected' ": "";?>>&nbsp;Mechanical Engineering</option>
                                            <option value="Electrical and Electronics Engineering" <?php echo (isset($_POST['courseToSelect']) && $_POST['courseToSelect']=="Electronics Engineering") ? " selected='selected' ": "";?>>&nbsp;Electrical and Electronics Engineering</option>
                                            <option value="Electronics and Communication Engineering" <?php echo (isset($_POST['courseToSelect']) && $_POST['courseToSelect']=="Communication Engineering") ? " selected='selected' ": "";?>>&nbsp;Electronics and Communication Engineering</option>
                                        </select>
                                    </span>
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
                               <div id="registerButton">
                                    <button type="submit" class="btn btn-default kamaraj-big-btn" id="submitForm" name="submitForm">Register</button>
                               </div>
                               <div class="wpcf7-response-output wpcf7-display-none"></div>
                            </form>
                        </div>
                    </div>
                </div>                                                               
                <div class="col-md-2"></div>
            </div>
        </div>
    </section>
<?php } ?>
    <!-- Contact end -->

   

    <!-- Footer start -->
   <?php include_once("includes/footer.php");?>


</body>

</html>