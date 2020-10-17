
<!DOCTYPE html>
    <html>
        <head>
            <title>   SVCVRT-Sri Venkateshwara Center for Vocational Research Training</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {margin:0;font-family:Arial}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 14px;
}
                
.active {
  background-color: #2196F3;
  font-weight:bold;
  color: white;
}

.topnav .icon {
  display: none;
}
       
.topnav a:hover, .dropdown:hover .dropbtn {
  background-color: #555;
  color: white;
}

.dropdown-content a:hover {
  background-color: #ddd;
  color: black;
}

.dropdown:hover .dropdown-content {
  display: block;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child), .dropdown .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
}

.footer{
 
 
border-top:1px solid #e1e1e1;
padding-top:10px;
padding-bottom:10px;
}
.footerdiv1{
 font-size:11px;

text-align:center;
padding-bottom:10px;
}
.footerdiv1 ul{
margin:0px;
padding:0px;
}
.footerdiv1 ul li{
list-style:none;
display:inline;
padding:0px 4px;
color:#7d7b7b;
}
.footerdiv1 ul li a{
text-decoration:none;
font-size:11px;
color:#7d7b7b;
}
.footerdiv1 ul li a:hover{
text-decoration:none;
color:#dc0000;
}
.footerdiv2{
 
   font-size:11px;
text-align:center;
color:#7d7b7b;
}
</style>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
    <body>

<div style="max-width:1100px;min-width:300px;margin:0px auto"    >
   <div class="w3-container" style="padding:0px !important;line-height:35px;margin-top:20px;">
   <div style="font-size:50px;font-weight:bold">SVCVRT</div>
Sri Venkateshwara Center for Vocational Research Training


</div>  
<div class="topnav" id="myTopnav">
   <a href="index.php" <?php echo isset($isHome) ? 'class="active"' :'';?> >Home</a>
                <a href="aboutus.php" <?php echo isset($isAboutus) ? 'class="active"' :'';?> >About Us</a>
                <a href="vocationalcourses.php" <?php echo isset($vocationalCourse) ? 'class="active"' :'';?> >Vocational Courses</a>
                <a href="computereducation.php" <?php echo isset($isComputerEducation) ? 'class="active"' :'';?> >Computer Education</a>
                <!--<a href="certificatemodels.php" <?php echo isset($isCertificate) ? 'class="active"' :'';?> >Certificate Models</a>-->
                <!--<a href="isoapproved.php" <?php echo isset($isISO) ? 'class="active"' :'';?> >ISO Approved</a>-->
                <!--<a href="certificateverification.php" <?php echo isset($isISO) ? 'class="active"' :'';?> >Online Certificate Verification</a>-->
                <a href="contactus.php" <?php echo isset($isContactus) ? 'class="active"' :'';?> >Contact Us</a>
                <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
         </div>