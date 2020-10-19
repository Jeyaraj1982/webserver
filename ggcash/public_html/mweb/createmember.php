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
   

        <h3 class="font-weight-400 text-center"  style="margin-top:10px;">Create Member</h3>
      <p class="lead text-center"></p>
      <div class="bg-light shadow-md rounded p-4 mx-2">
      <?php
      
      
 
     
        if (isset($_POST['CreateBtn'])) {
             $error = 0;
              $epin =$mysqldb->select("SELECT * FROM `_tblEpins` where md5(concat(EPIN,PINPassword,EPINID))='".$_POST['data']."'");
             
           
           if (!(strlen(trim($_POST['MemberName']))>3)) {
               $error++;
                $errorMember="Please enter member name.";
           }
          
          $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';  
          if (!(preg_match($regex, $_POST['MemberEmail']))) {
            $error++;
            $errorEmail="Email is an invalid email. Please try again.";
          }                
 
           
           if (strlen(trim($_POST['MemberName']))<6) {
               $error++;
               $errorPassword="Password must be six and more characters";
           }
          
           if (sizeof($epin)==0) {
                $error++;
                $errorMsg = "Couldn't be process. Please contact administrator";
           }
           
           if (sizeof($epin)>1) {
                $error++;
                $errorMsg = "Couldn't be process. Please contact administrator";
           }
           
           if (isset($epin[0]['IsUsed']) && $epin[0]['IsUsed']==1) {
               $error++;
               $errorMsg = "Couldn't be process. Please contact administrator";
           }
          
            $url  = "https://www.ggcash.in/app/api.php?action=GetMemberCodeUpLineCode&data=".$_POST['data']."&MemberName=".urlencode($_POST['MemberName']);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $data = curl_exec($ch);
            curl_close($ch); 

            $data = explode(",",$data); // Member Code, Upline Code
           
            if ($error==0) {
            
             $MemberCode=$data[0];
            
           
            $upline = $mysqldb->select("select * from _tbl_Members where MemberCode='".$data[1]."'");
            
            $MemberID =  $mysqldb->insert("_tbl_Members",array("MemberCode"      => $MemberCode,
                                                               "MemberName"      => $_POST['MemberName'],
                                                               "DateofBirth"     => "0000-00-00 00:00:00",
                                                               "Sex"             => "Male",
                                                               "MobileNumber"    => "",
                                                               "MemberEmail"     => $_POST['MemberEmail'],
                                                               "MemberPassword"  => $_POST['MemberPassword'],
                                                               "FatherName"      => "",
                                                               "PanCard"         => "",
                                                               "AdhaarCard"      => "",
                                                               "AddressLine1"    => "",
                                                               "AddressLine2"    => "",
                                                               "AddressLine3"    => "",
                                                               "PinCode"         => "",
                                                               "IsActive"        => "1",
                                                               "CreatedOn"       => date("Y-m-d H:i:s"),
                                                               "SponsorCode"     => $epin[0]['OwnToCode'],
                                                               "SponsorID"       => $epin[0]['OwnToID'],
                                                               "SponsorName"     => $epin[0]['OwnToName'],
                                                               "UplineID"        => $upline[0]['MemberID'],
                                                               "UplineCode"      => $upline[0]['MemberCode'],
                                                               "UplineName"      => $upline[0]['MemberName']));
                                                                          
            $mysqldb->insert("_tblPlacements",array("ParentID"      => $upline[0]['MemberID'],
                                                    "ParentCode"    => $upline[0]['MemberCode'],
                                                    "ParentName"    => $upline[0]['MemberName'],
                                                    "ChildID"       => $MemberID,
                                                    "ChildCode"     => $MemberCode,
                                                    "ChildName"     => $_POST['MemberName'],
                                                    "PlacedByID"    => $epin[0]['OwnToID'],
                                                    "PlacedByCode"  => $epin[0]['OwnToCode'],
                                                    "PlacedByName"  => $epin[0]['OwnToName'],
                                                    "PlacedOn"      => date("Y-m-d H:i:s"),
                                                    "UsedEPin"      => $epin[0]['EPINID'],
                                                    "PlacedFrom"    => "website",
                                                    "Position"      => "L"));
            $mysqldb->execute("update `_tblEpins` set `IsUsed`='1', `UsedOn`='".date("Y-m-d H:i:s")."',`UsedForID`='".$MemberID."',`UserForCode`='".$MemberCode."',`UsedForName`='".$_POST['MemberName']."' where EPINID='".$epin[0]['EPINID']."'");
                                                                            
        
            ?>
            <style>
            #headH3{display:none}
            </style>
              <div style="text-align:center;padding:50px;">
                                    <img src="app/assets/images/shield.png"><br><br>
                                    <span style='color:green'>Member Created Successfully.</span> 
                                    <br><br>
                                    <table align="center">
                                        <tr>
                                            <td style="text-align: right;">Your Member ID</td>
                                            <td  style="text-align: left">:&nbsp;<?php echo $MemberCode;?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: right;">Your Sponsor ID</td>
                                            <td style="text-align: left">:&nbsp;<?php echo $epin[0]['OwnToCode'];?></td>
                                        </tr>
                                          <tr>
                                            <td style="text-align: right;">Your Upline ID</td>
                                            <td  style="text-align: left">:&nbsp;<?php echo $upline[0]['MemberCode'];?></td>
                                        </tr>
                                    </table>
                                </div>
            <?php
            
        } else {
            echo "Couldn't be processed. please contact administrator";
        }
        }
       
       
       if (isset($_POST['submitBtn'])) {
           
           $error = 0;
           if (!(isset($_POST['data']))) {
               $error++;
           }
           
           $epin =$mysqldb->select("SELECT * FROM `_tblEpins` where md5(concat(EPIN,PINPassword,EPINID))='".$_POST['data']."'");
           
           if (sizeof($epin)==0) {
                $error++;
           }
           
           if (sizeof($epin)>1) {
                $error++;
           }
           
           if (isset($epin[0]['IsUsed']) && $epin[0]['IsUsed']==1) {
               $error++;
           }
           
           if ($error==0) {
           ?>
           <form action="" id="signupForm" method="post">
                <input type="hidden" value="<?php echo $_POST['data'];?>" name="data">
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
                 
                <div class="form-group">
                  <label for="fullName">Your Name</label>
                  <input type="text" class="form-control" name="MemberName" id="MemberName" required placeholder="Enter Your Name">
                  <span style="color:red"><?php echo $errorMember;?></span>
                </div>
                <div class="form-group">
                  <label for="emailAddress">Email Address</label>
                  <input type="email" class="form-control" name="MemberEmail" id="MemberEmail" required placeholder="Enter Your Email">
                  <span style="color:red"><?php echo $errorEmail;?></span>
                </div>
                <div class="form-group">
                  <label for="loginPassword">Login Password</label>
                  <input type="password" class="form-control" name="MemberPassword" id="MemberPassword" required placeholder="Enter Password">
                  <span style="color:red"><?php echo $errorEmail;?></span>
                </div>
                <button class="btn btn-primary btn-block my-4" name="CreateBtn" type="submit">Create Member</button>
              </form>
                 <?php
               
           } else {
               echo "Couldn't processed. please contact administrator";
           }
       }
      ?>
    </div>
    </div>
  <!-- Content end -->
 
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