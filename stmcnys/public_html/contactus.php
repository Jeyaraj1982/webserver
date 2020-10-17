<?php 
$page="contactus";
include_once("header.php");?>
  <section class="breadcrumb breadcrumb-img">
    <div class="container">
      <div class="row">
        <div class="col">
          <h1>Contact Us</h1>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="contactus.php">Contact US</a></li>
            <li>Contact Us</li>
          </ul>
        </div>
      </div> 
    </div>
  </section>
  <div class="mt80">
    <div class="container-fluid apply-form-padding">
      <div class="row no-gutters">
        <div class="col-lg-6 wow fadeInLeft" data-wow-delay=".3s">
            <div class="inner-column">
                <h3>Our Address</h3>
                 <h4>[Thiru.K.Subramania Nadar-Vadivoo Ammal Educational Trust]</h4>
                 <h4>S.THANGAPAZHAM MEDICAL COLLEGE OF NATUROPATHY AND YOGIC SCIENCE<br>RESEARCH CENTRE</h4>
                 <p>VASUDEVANALLUR (Via) Athuvazhi (Po) - 627760,<br> Sivagiri (T.k)<br> Tenkasi (Dt)</p>
                <ul>
                    <li><i class="ti-facebook" style="color: #ffbc13;"></i>&nbsp;&nbsp; S.Thangapazham</li>
                    <li><i class="ti-instagram" style="color: #ffbc13;"></i>&nbsp;&nbsp; stmcnys</li>
                    <li><i class="fas fa-phone-square-alt" style="color: #ffbc13;"></i>&nbsp;&nbsp;9489740955 / 9489805644</li>
                    <li><i class="fas fa-envelope" style="color: #ffbc13;"></i>&nbsp;&nbsp;stmcnys@gmail.com</li>
                </ul>
            </div> 
        </div>
        <div class="col-lg-6 wow fadeInRight" data-wow-delay=".3s">
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
    include_once("includes/mailcontroller.php");
            include_once("mysql.php");
            $mysql =   new MySqldb();
             if (isset($_POST['SubmitBtn'])) {
                  $id =  $mysql->insert("contacts",array("contactname"  =>$_POST['FullName'],
                                                         "emailid"      =>$_POST['EmailID'],
                                                         "mobile"       =>$_POST['MobileNumber'],
                                                         "comments"     =>$_POST['Comments'],
                                                         "postedon"     =>date("Y-m-d H:i:s")));
                    if ($id>0) {
                        $admin = $mysql->select("Select * from admintable");
                        MobileSMS::sendSMS($admin[0]['MobileNumber'],"Dear Admin, You have received contact enquiry Contact Name : ".$_POST['FullName']."Mobile Number : ".$_POST['MobileNumber'],$id);  
                        $msg = "<p align='center' style='Color:Blue;font-weight:bold;'>Saved your information Successfully</p>";
                        unset($_POST);
                    } else {
                        $msg = "<p align='center'  style='Color:Red;font-weight:bold;'>Couldn't save your information</p>";
                    }
             }
         ?>
        <h2>Send Us Message</h2>
          <div class="apply-form bxw">
            <form action="" method="post">
              <div class="row">                                                                                  
                <div class="col-md-12">
                  <input type="text" class="form-control" placeholder="Full Name" id="FullName" name="FullName"  value="<?php echo (isset($_POST['FullName']) ? $_POST['FullName'] : "");?>">
                </div>
                <div class="col-md-6">
                  <input type="email" class="form-control" placeholder="Your Email Address" id="EmailID" name="EmailID"  value="<?php echo (isset($_POST['EmailID']) ? $_POST['EmailID'] : "");?>">
                </div>
                <div class="col-md-6">
                  <input type="tel" class="form-control" placeholder="Phone" id="MobileNumber" maxlength="10" name="MobileNumber"  value="<?php echo (isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : "");?>">
                </div>
                <div class="col-md-12">
                  <textarea class="form-control" placeholder="Comment" id="Comments" name="Comments"  value="<?php echo (isset($_POST['Comments']) ? $_POST['Comments'] : "");?>"></textarea>
                </div>
                <div class="col-md-12 mt20">
                  <button type="submit" class="btn-2" name="SubmitBtn">Send</button>
                  <?php echo $msg;?>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="mt80">
    <div class="container-fluid apply-form-padding">
      <div class="row no-gutters">
        <div class="col-lg-12 wow fadeInLeft" data-wow-delay=".3s">
            <div id="map-container-google-9" class="z-depth-1-half map-container-5" style="height: 300px">
                <iframe src="https://maps.google.com/maps?q=tenkasi&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
      </div>
    </div>
  </div>
  <style>
  .map-container-5{
overflow:hidden;
padding-bottom:56.25%;
position:relative;
height:0;
}
.map-container-5 iframe{
left:0;
top:0;
height:100%;
width:100%;
position:absolute;
}
  </style>    
  <br><br>
 <?php include_once("footer.php");?>