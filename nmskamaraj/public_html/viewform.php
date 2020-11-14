<?php session_start(); ?>
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
                                        <img src="images/new_logo.png" alt="">
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
                        <h2>View Application</h2>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
     
   
   <?php 
       include_once("webadmin/mysql.php");    
       $mysql =   new MySql();  
       if(Isset($_POST['submitbtn'])){
            if($_POST['Year']=="FirstYear"){
                $sql= $mysql->select("SELECT * FROM admission_firstyear WHERE AadhaarNumber='".$_POST['AadhaarNumber']."' and FathersMobile='".$_POST['FathersMobile']."'");
                if(sizeof($sql)!=0){
                    $_SESSION['F']=$sql[0]['AdmissionID'];
                    echo "<script>location.href='viewFirstYear.php'</script>";
                } else { $error="Form not found";   }
            }
            if($_POST['Year']=="SecondYear"){
                $sql= $mysql->select("SELECT * FROM admission_secondyear WHERE AadhaarNumber='".$_POST['AadhaarNumber']."' or FathersMobile='".$_POST['FathersMobile']."'");
                if(sizeof($sql)!=0){
                       $_SESSION['S']=$sql[0]['AdmissionID'];
                echo "<script>location.href='viewSecondYear.php'</script>";
                }else { $error="Form not found";  } }  }   
   ?>  
<script>
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
$(document).ready(function(){
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
});
function doConfrim() {
     $('#ErrAadhaarNumber').html(""); 
     $('#ErrFathersMobile').html(""); 
     
     var ErrorCount=0;
     
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
    if(ErrorCount==0){
        return true;
    }else {
        return false;
    }
}
</script>      
<style>
.errorstring{width:100%;font-size:11px;color:red;}
</style>                                                                                                           
   
    <section class="kamaraj-contact-field">                                                                         
        <div class="container">
            <div class="row" >
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form action="" method="POST" onsubmit="return doConfrim()">
                        <div class="col-md-12">
                            <label>Select Applied Year</label>
                            <select name="Year" id="Year" class="form-control">
                                <option value="FirstYear" <?php echo (($_POST[ 'Year']=="FirstYear") ? " selected='selected' " : "");?>>First Year</option>    
                                <option value="SecondYear" <?php echo (($_POST[ 'Year']=="SecondYear") ? " selected='selected' " : "");?>>Second Year</option>    
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label>Applicant's Aadhaar Number</label>
                            <input type="text" name="AadhaarNumber" id="AadhaarNumber" value="<?php echo isset($_POST['AadhaarNumber']) ? $_POST['AadhaarNumber'] : ""; ?>" class="form-control">
                            <div id="ErrAadhaarNumber" class="errorstring"></div>
                        </div>
                        <div class="col-md-12">
                            <label>Father's Mobile Number</label>
                            <input type="text" name="FathersMobile" maxlength="10" value="<?php echo isset($_POST['FathersMobile']) ? $_POST['FathersMobile'] : ""; ?>" id="FathersMobile" class="form-control">
                            <div id="ErrFathersMobile" class="errorstring"></div>
                        </div>
                        <div class="col-md-12" style="text-align: center;color:red;">
                            <?php echo $error;?>
                        </div>
                        <div class="col-md-12" style="text-align: center;">
                            <br><button type="submit" class="btn btn-default kamaraj-big-btn" name="submitbtn">View Application</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-4"></div>
                   
                </div>
            </div>
        </div>
    </section>
 