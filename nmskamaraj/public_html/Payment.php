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
                
             <div id="formwindow" class="formwindow">
                     <?php
                       echo "D";
                     include_once("webadmin/mysql.php");
  $mysql =   new MySql();
                        $status=$_POST["status"];
                        $firstname=$_POST["firstname"];
                        $amount=$_POST["amount"];
                        $txnid=$_POST["txnid"];
                        $posted_hash=$_POST["hash"];
                        $key=$_POST["key"];
                        $productinfo=$_POST["productinfo"];
                        $email=$_POST["email"];
                        $salt="XI7ezq8zgy";
                        $response = json_encode($_POST);
                        // Salt should be same Post Request 
                      
                     
                        $data = $mysql->select("select * from  _tblPayments  where PaymentID='".$txnid."' and IsProcessed='0'");
                        if (sizeof($data)==1) {
                            $txn  = $mysql->select("select * from _tblPayments where PaymentID='".$txnid."'");
                            $userinformation = $mysql->select("select * from ".$txn[0]['TblName']." where AdmissionID='".$txn[0]['FormID']."'");
        
                            $mysql->execute("update _tblPayments set PaymentResponse='".$response."' where PaymentID='".$txnid."'");
                            If (isset($_POST["additionalCharges"])) {
                                $additionalCharges=$_POST["additionalCharges"];
                                $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
                            } else {
                                $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
                            }
                            
                            $hash = hash("sha512", $retHashSeq);
                            if ($hash != $posted_hash || $status=="failure") {
                                $mysql->execute("update _tblPayments set TxnStatus='Failure', IsProcessed='1' where PaymentID='".$txnid."'");
                            ?>
                                <div style="text-align:center;font-size:15px;color:#555">
                                    <img src="https://www.hdfcbank.com/static/widgets/%5BBBHOST%5D/widget-hdfc-common-overlays/media/failure.png" style="width:256px;margin:0px auto"><br>
                                    <span style="font-size:30px;">Payment Failure</span><br>
                                </div>
                            <?php
                            }  else {
                                $mysql->execute("update `_tblPayments` set  `IsProcessed`='1',`TxnStatus`='Success' where `PaymentID`='".$txnid."'");
                                $mysql->execute("update `".$txn[0]['TblName']."` set `IsPaid`='1', `PaymentID`='".$txnid."', `PaidOn`='".date("Y-m-d H:i:s")."' where `AdmissionID`='".$txn[0]['FormID']."'");        
                                $cramount = 0;
                        ?>
                            <div style="text-align:center;font-size:15px;color:#555">
                                    <img src="assets/success.png" style="width:256px;margin:0px auto"> <br><br>
                            
                                    <span style="font-size:30px;">Payment Success</span><br>
                                    
                                    Your application  has submitted.    <br><br>
                                    Your receipt Number :  202021-<?php echo $txn[0]['AdmissionID']."-".$txnid;?> 
                            </div>
                        <?php 
                        
                            }
    

                      } else {
                        ?>
                         <div style="text-align:center;font-size:15px;color:#555">
                                    <img src="https://www.hdfcbank.com/static/widgets/%5BBBHOST%5D/widget-hdfc-common-overlays/media/failure.png" style="width:256px;margin:0px auto"><br>
                                    <span style="font-size:30px;">Access denied</span><br>
                                </div>
                        <?php
                     } 
                   
                       

                   

   
?>
                </div>
        </article>
    </div>
</div> 