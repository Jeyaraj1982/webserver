<?php include_once("header.php");?>  
<?php
 $mysqldb   = new MySqldatabase("localhost","ggcash_user","ggcash_user","ggcash_database");
  $Profile =$mysqldb->select("select * from _tbl_Members where MemberID='".$_SESSION['User']['MemberID']."'");
  ?>
  <style>
    .Activedot {height:10px;width:10px;background-color:#20e512;border-radius:50%;display:inline-block;}
            .Deactivedot {height:10px;width:10px;background-color:#888;border-radius:50%;display:inline-block;}
</style>
  <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-9 align-self-center">
                        <h4 class="page-title">View Profile</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">View Profile</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-3 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <div class="m-r-10 display-6 text-primary">
                                <i class="ti-user"></i>
                            </div>
                            <div class=""><small> </small>
                                <h4 class="text-primary m-b-0 font-medium"><?php echo $_SESSION['User']['MemberName'];?></h4></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="container-fluid">
                <div class="row">
    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-b-20"> 
                                
                                
                                                <?php if (strlen(trim($Profile[0]['Thumb']))==0) { ?>
                                                       <?php if ($Profile[0]['Sex']=="Female") {?>
                                                          <img src="assets/images/female_default.png"  class="rounded-circle" width="150"><br>
                                                       <?php } ?>
                                                       
                                                       <?php if ($Profile[0]['Sex']=="Male") {?>
                                                            <img src="assets/images/male_default.png"  class="rounded-circle" width="150"><br>
                                                       <?php } ?>
                                                
                                                <?php } else { ?>
                                                <img src="uploads/<?php echo $Profile[0]['Thumb'];?>" class="rounded-circle" width="150"><br>
                                                <?php } ?>
                                              
                                           
                                
                                <!--<img src="https://gcchub.org/panel/assets/images/users/1.jpg" class="rounded-circle" width="150">-->
                                    <h4 class="card-title m-t-10"><?php echo $_SESSION['User']['MemberName'];?></h4>
                                    <h6 class="card-subtitle"><?php echo $_SESSION['User']['MemberEmail'];?></h6>
                                    <h6 class="card-subtitle"><?php echo $Profile[0]['MemberCode']; ?></h6>
                                </center>
                                <ul class="list-unstyled m-t-40">
                                                
                                    <hr>
                                    <li class="media">
                                       <!-- <img class="m-r-15" src="https://gcchub.org/panel/assets/images/users/1.jpg" width="60" alt="Generic placeholder image">-->
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1">Your personalized promo page:</h5> <a href="">http://ggcash.in/profile/<?php echo $_SESSION['User']['MemberCode'];?></a>
                                        </div>
                                    </li>
                                    
                                </ul>
                              <!--  <div class="p-20 border-top m-t-15">
                                <div class="row text-center">
                                    <div class="col-6 border-right">
                                        <a href="CreateMyPage.php" class="link d-flex align-items-center justify-content-center font-medium"><i class="fas fa-pencil-alt font-20 m-r-10"></i>Promotional Page</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="ChangePassword.php" class="link d-flex align-items-center justify-content-center font-medium"><i class="fas fa-key font-20 m-r-10"></i>Change Password</a>
                                    </div>
                                </div>
                            </div>
                            <div class="p-20 border-top m-t-15">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="javascript:void(0);" class="link d-flex align-items-center justify-content-center font-medium"><img src="https://gcchub.org/panel/assets/img/badge/0.png" class="profile-club"><h4 class="p-t-10"><span class="profile-club-name text-danger">DECIDERS</span> Club</h4></a>
                                    </div>
                                </div>
                            </div> -->

                            </div>
                            <div>
                               </div>
                        </div>
                    </div>
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">

        <div class="card-body">
            <h4 class="card-title text-orange"><i class="ti-user"></i>&nbsp;&nbsp;Personal Information</h4>
            
               
       
            
            
                                        <div class="row">
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Member Name</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Profile[0]['MemberName'];?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>DOB</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Profile[0]['DateofBirth'];?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Gender</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Profile[0]['Sex'];?></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Father Name</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Profile[0]['FatherName'];?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Mobile</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Profile[0]['MobileNumber'];?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6"> <strong>Email</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Profile[0]['MemberEmail'];?></p>
                                            </div> 
                                        </div>
                                        <hr>
                                        <div class="row"> 
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Address 1</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Profile[0]['AddressLine1'];?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Address 2</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Profile[0]['AddressLine2'];?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Address 3</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Profile[0]['AddressLine3'];?></p>
                                            </div>
                                        </div>
                                        <hr> 
                                        <div class="row">
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Pincode</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Profile[0]['PinCode'];?></p>
                                            </div> 
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Adhaar Number</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Profile[0]['AdhaarCard'];?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Pancard Number</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Profile[0]['PanCard'];?></p>
                                            </div>
                                           </div>
                                           <hr>
                                        <div style="text-align:right">
                                            <a href="dashboard.php?action=EditProfile">Edit</a>
                                        </div>
                        </div>
                    </div>

                    </div>
                </div>            </div>
            


         <?php include_once("footer.php"); ?>



 
