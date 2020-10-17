<?php include_once("header.php");?>
<?php if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            $dupMobile = $mysql->select("select * from _tbl_customer where MobileNumber='".$_POST['MobileNumber']."'");
            if(sizeof($dupMobile)>0){
                $ErrMobileNumber ="Mobile Number Already Exist<br>";
                $ErrorCount++;
            }
            $dupemail = $mysql->select("select * from _tbl_customer where EmailID='".$_POST['EmailID']."'");
            if(sizeof($dupemail)>0){
                $ErrEmailID ="Email ID Already Exist<br>";
                $ErrorCount++;
            }
            if($ErrorCount==0){
                   $random = sizeof($mysql->select("select * from _tbl_customer")) + 1;
                   $UserCode ="CSTMR0000".$random;
                   
              $id = $mysql->insert("_tbl_customer",array("CustomerCode" => $UserCode,
                                                         "CustomerName" => $_POST['Name'],
                                                         "EmailID"      => $_POST['EmailID'],
                                                         "MobileNumber" => $_POST['MobileNumber'],
                                                         "Password"     => $_POST['Password'],
                                                         "CreatedOn"    => date("Y-m-d H:i:s")));
              
            if($id>0){
                $user = $mysql->select("select * from _tbl_customer where CustomerID='".$id."'");
                $_SESSION['User'] = $user[0];
				
				$message = '
                    <div style="padding:45px;background:#e5e5e5;margin:20px;border-radius:10px;padding-top:20px;">
                        <div style="text-align:center;padding-bottom:20px;">
                            <img src="" style="height:30px;">&nbsp;&nbsp;
                            <img src="" style="height:24px;border:1px solid #eee;border-radius:3px;">
                        </div>
                        <div style="border:0px solid black;text-align:left;padding:30px;background:white;border-radius:10px;">
                            Welcome '.$_SESSION['User']['CustomerName'].',
                            <br><br>
                            Your Account Created Successfully<br>Your ID is '.$_SESSION['User']['CustomerCode'].'.
                            <br><br>
                            <br> 
                            Thanks <br>
                            
                        </div>
                    </div>';

                    $mparam['MailTo']=$_SESSION['User']['EmailID'];
                    $mparam['CustomerID']=$_SESSION['User']['CustomerID'];
                    $mparam['Subject']="Account Created";
                    $mparam['Message']=$message;
                    MailController::Send($mparam,$mailError); 	
				
                echo "<script>location.href='index.php';</script>";
            }
    }
}
    
?>
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a title="Go to Home Page" href="index.php">Home</a><span>&raquo;</span></li>
            <li><strong>My Account</strong><span>&raquo;</span></li>
            <li><strong>Register</strong></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <section class="main-container col1-layout">
    <div class="main container">
      <div class="page-content">
        <div class="account-login">
          <div class="box-authentication">
            <h4>Register</h4>
            <p>Create your very own account</p>
            <form method="post" action="" onsubmit="return SubmitLogin();">
                
                <label for="EmailID">Name<span class="required" style="color:red">*</span></label>
                <input id="Name" name="Name" value="<?php echo (isset($_POST['Name']) ? $_POST['Name'] :"");?>" type="text" class="form-control">
                <span class="errorstring" id="ErrName"><?php echo isset($ErrName)? $ErrName : "";?></span>
                
                <label for="EmailID">Email address<span class="required" style="color:red">*</span></label>
                <input id="EmailID" name="EmailID" value="<?php echo (isset($_POST['EmailID']) ? $_POST['EmailID'] :"");?>" type="text" class="form-control">
                <span class="errorstring" id="ErrEmailID"><?php echo isset($ErrEmailID)? $ErrEmailID : "";?></span>
                
                <label for="EmailID">Mobile Number<span class="required" style="color:red">*</span></label>
                <input id="MobileNumber" name="MobileNumber" value="<?php echo (isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] :"");?>" maxlength="10" type="text" class="form-control onlynumeric">
                <span class="errorstring" id="ErrMobileNumber"><?php echo isset($ErrMobileNumber)? $ErrMobileNumber : "";?></span>
                
                <label for="Password">Password<span class="required" style="color:red">*</span></label>
                <input id="Password" name="Password" value="<?php echo (isset($_POST['Password']) ? $_POST['Password'] :"");?>" type="password"  class="form-control">
                <span class="errorstring" id="ErrPassword"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span>
            
                <button class="button" type="submit" name="btnsubmit"><i class="icon-user icons"></i>&nbsp; <span>Register</span></button>
                 
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="jtv-service-area">
    <div class="container">
      <div class="row">
        <div class="col col-md-3 col-sm-6 col-xs-12">
          <div class="block-wrapper ship">
            <div class="text-des">
              <div class="icon-wrapper"><i class="fa fa-paper-plane"></i></div>
              <div class="service-wrapper">
                <h3>World-Wide Shipping</h3>
                <p>On order over $99</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col col-md-3 col-sm-6 col-xs-12 ">
          <div class="block-wrapper return">
            <div class="text-des">
              <div class="icon-wrapper"><i class="fa fa-rotate-right"></i></div>
              <div class="service-wrapper">
                <h3>30 Days Return</h3>
                <p>Moneyback guarantee </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col col-md-3 col-sm-6 col-xs-12">
          <div class="block-wrapper support">
            <div class="text-des">
              <div class="icon-wrapper"><i class="fa fa-umbrella"></i></div>
              <div class="service-wrapper">
                <h3>Support 24/7</h3>
                <p>Call us: ( +123 ) 456 789</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col col-md-3 col-sm-6 col-xs-12">
          <div class="block-wrapper user">
            <div class="text-des">
              <div class="icon-wrapper"><i class="fa fa-tags"></i></div>
              <div class="service-wrapper">
                <h3>Member Discount</h3>
                <p>25% on order over $199</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php include_once("footer.php");?>
<script>
$(document).ready(function() {
   $(".onlynumeric").keydown(function (e) {
       // Allow: backspace, delete, tab, escape, enter and .
       if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            // Allow: Ctrl+A, Command+A
           (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
            // Allow: home, end, left, right, down, up
           (e.keyCode >= 35 && e.keyCode <= 40)) {
                // let it happen, don't do anything
                return;
       }
       // Ensure that it is a number and stop the keypress
       if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
           e.preventDefault();
       }
   });
});
</script>
<script>
$(document).ready(function () {
   $("#Name").blur(function () {                                                                
        if(IsNonEmpty("Name","ErrName","Please Enter Name<br>")){
           IsAlphaNumeric("Name","ErrName","Please Enter Alpha Numerics Characters Only<br>");
        }
   });
   $("#EmailID").blur(function () {                                                                
        if(IsNonEmpty("EmailID","ErrEmailID","Please Enter Email address<br>")){
            IsEmail("EmailID","ErrEmailID","Please Enter Valid Email address<br>");
        }
   });
   $("#MobileNumber").blur(function () {                                                                
        if(IsNonEmpty("MobileNumber","ErrMobileNumber","Please Enter Mobile Number<br>")){
            IsMobileNumber("MobileNumber","ErrMobileNumber","Please Enter Valid Mobile Number<br>");
        }
   });
   $("#Password").blur(function () {
        IsNonEmpty("Password","ErrPassword","Please Enter Password<br>");
   });                                                                                                    
});
 function SubmitLogin() { 
         ErrorCount=0;       
         $('#ErrName').html("");            
         $('#ErrEmailID').html("");            
         $('#ErrMobileNumber').html("");            
         $('#ErrPassword').html("");
         
        if(IsNonEmpty("Name","ErrName","Please Enter Name<br>")){
           IsAlphaNumeric("Name","ErrName","Please Enter Alpha Numerics Characters Only<br>");
        }
        if(IsNonEmpty("EmailID","ErrEmailID","Please Enter Email address<br>")){
            IsEmail("EmailID","ErrEmailID","Please Enter Valid Email address<br>");
        }
        if(IsNonEmpty("MobileNumber","ErrMobileNumber","Please Enter Mobile Number<br>")){
            IsMobileNumber("MobileNumber","ErrMobileNumber","Please Enter Valid Mobile Number<br>");
        }
       IsNonEmpty("Password","ErrPassword","Please Enter Password<br>");
        return (ErrorCount==0) ? true : false;
 }
</script>