<?php
    include_once("config.php");
?>
  <!doctype html>
<html class="no-js" lang="en-US">

<head>
    <title>login</title>

<meta charset="utf-8">
<title>GG Cash </title>
<meta name="description" content="GG Cash ">
<meta name="keywords" content="GG Cash ">
<meta name="robots" content="index, follow" />

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i' type='text/css'>
<link href="images/favicon.png" rel="icon" />

 <script src="https://kit.fontawesome.com/1495d5c517.js"></script>

 <script type="text/javascript">
        var base_url  = 'https://ggcash.in/';
    </script>

    <link href="https://ggcash.in/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen" /><link href="https://ggcash.in/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet" type="text/css" media="screen" /><link href="https://ggcash.in/assets/css/stylesheet.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<!-- Preloader -->
<div id="preloader">
  <div data-loader="dual-ring"></div>
</div>
 
<div id="content">
    <div class="login-signup-page mx-auto my-5">
       <div class="logo text-center"> <a class="d-flex" href="#" title=""><img src="https://ggcash.in/images/logo.png" alt="" style="margin: 0px auto;"></a> </div>
   

        <h3 class="font-weight-400 text-center"  style="margin-top:10px;">Signup</h3>
        <p class="lead text-center"></p>
        <div class="bg-light shadow-md rounded p-4 mx-2">
        <?php
            
          
        
        if (isset($_POST['submitBtn'])) {
            
            $epin =$mysqldb->select("SELECT * FROM `_tblEpins` where `EPIN`='".$_POST['Epin']."' and `PINPassword`='".$_POST['PinPassword']."'");
            
            if (sizeof($epin)==1)  {
                
                if ($epin[0]['IsUsed']==0) {
                    
                    $data = md5($_POST['Epin'].$_POST['PinPassword'].$epin[0]['EPINID']);
                    ?>
                    <form action="createmember.php" id="signupCForm" method="post">
                        <input type="hidden" value="<?php echo $data;?>" name="data">
                        <div class="form-group">
                            <label for="Epin">Sponser ID</label>
                            <input type="text" class="form-control" readonly="readonly" value="<?php echo $epin[0]['OwnToCode'];?>">
                        </div>
                        <div class="form-group">
                            <label for="Epin">Sponser Name</label>
                            <input type="text" class="form-control" readonly="readonly"  value="<?php echo $epin[0]['OwnToName'];?>">
                        </div>
                        <div class="form-group">
                            <label for="Epin">E-Pin</label>
                            <input type="text" class="form-control" readonly="readonly"  value="<?php echo $epin[0]['EPIN'];?>">
                        </div>
                        <button class="btn btn-primary btn-block my-4" name="submitBtn" type="submit">Confirm & Continue</button>
                    </form>
                    <?php
                    $isSuccess=true;                   

                } else {
                    $error = "Entered epin already used.";
                }
            } else {
                $error = "Invalid epin & pin password.";
            }

        }   
    
    if (!(isset($isSuccess) && $isSuccess==true)) {
    ?>
    <form action="signup.php" id="signupForm" method="post">
                 <div class="form-group">
                  <label for="Epin">E-Pin</label>
                  <input type="text" class="form-control" name="Epin" value="<?php echo isset($_POST['Epin']) ? $_POST['Epin'] : "";?>" id="Epin" required placeholder="Enter Epin">
                </div>
                <div class="form-group">
                  <label for="PinPassword">Pin Password</label>
                  <input type="password" class="form-control" name="PinPassword" value="<?php echo isset($_POST['PinPassword']) ? $_POST['PinPassword'] : "";?>" id="PinPassword" required placeholder="Enter Pin Password">
                </div>
                <?php if (isset($error)) { ?>
                 <div class="form-group">
                    <label style="color:red;"><?php echo $error;?></label>
                 </div>
                 <?php } ?>
                <button class="btn btn-primary btn-block my-4" name="submitBtn" type="submit">Continue Sign Up</button>
              </form>
    <p class="text-3 text-muted text-center mb-0">Already have an account? <a class="btn-link" href="index.php">Log In</a></p>
    <?php } ?>
    </div>
    </div>
        </div>
 
 
    <div style="text-align: center;width:100%">
        <p class="text-center mb-2 mb-lg-0">Copyright &copy; 2019 GGCASH. All Rights Reserved.</p>
        <br>
    </div>
 
 
  <!-- Footer end --> 
  
</div>
<!-- Document Wrapper end --> 

<!-- Back to Top
============================================= --> 
<a id="back-to-top" data-toggle="tooltip" title="Back to Top" href="javascript:void(0)"><i class="fa fa-chevron-up"></i></a> 

  <script type="text/javascript" charset="utf-8" src="https://ggcash.in/assets/js/vendor/jquery/jquery.min.js"></script><script type="text/javascript" charset="utf-8" src="https://ggcash.in/assets/js/vendor/bootstrap/js/bootstrap.bundle.min.js"></script><script type="text/javascript" charset="utf-8" src="https://ggcash.in/assets/js/vendor/owl.carousel/owl.carousel.min.js"></script><script type="text/javascript" charset="utf-8" src="https://ggcash.in/assets/js/theme.js"></script>
</body>
</html>