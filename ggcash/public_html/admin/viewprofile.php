<?php include_once("header.php");?>
<?php
 $mysqldb   = new MySqldatabase("localhost","ggcash_user","ggcash_user","ggcash_database");
  $Profile =$mysqldb->select("select * from _tbl_admin where AdminID='".$_SESSION['User']['AdminID']."'");
  ?>
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
                </div>
            </div>
            
            <div class="container-fluid">
                <div class="row">
    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-b-20"> <img src="https://gcchub.org/panel/assets/images/users/1.jpg" class="rounded-circle" width="150">
                                    <h4 class="card-title m-t-10"><?php echo $_SESSION['User']['MemberName'];?></h4>
                                    <h6 class="card-subtitle"><?php echo $_SESSION['User']['MemberEmail'];?></h6>
                                </center>
                                <div class="p-20 border-top m-t-15">
                                <div class="row text-center">
                                    <div class="col-6">
                                        <a href="ChangePassword.php" class="link d-flex align-items-center justify-content-center font-medium"><i class="fas fa-key font-20 m-r-10"></i>Change Password</a>
                                    </div>
                                </div>
                            </div>
                            <div class="p-20 border-top m-t-15">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="javascript:void(0);" class="link d-flex align-items-center justify-content-center font-medium"><img src="https://gcchub.org/panel/assets/img/badge/0.png" class="profile-club"><h4 class="p-t-10"><span class="profile-club-name text-danger">DECIDERS</span></h4></a>
                                    </div>
                                </div>
                            </div>                                          

                            </div>
                            <div>
                               </div>
                        </div>
                    </div>
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">

        <div class="card-body">
            <h4 class="card-title text-orange"><i class="ti-user"></i>&nbsp;&nbsp; Personal Information</h4>
                                        <div class="row">
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Full Name</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Profile[0]['AdminName'];?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Mobile</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Profile[0]['MobileNumber'];?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Passport</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Profile[0]['Passport'];?></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-4 col-xs-6"> <strong>Email</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Profile[0]['AdminEmail'];?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Gender</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Profile[0]['Gender'];?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>DOB</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Profile[0]['DateofBirth'];?></p>
                                            </div>
                                            
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Address 1</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Profile[0]['Address1'];?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Address 2</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Profile[0]['Address2'];?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Postal Code</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Profile[0]['PostalCode'];?></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>City</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Profile[0]['City'];?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>State/Province</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Profile[0]['State'];?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Country</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Profile[0]['Country'];?></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div style="text-align:right">
                                            <a href="EditProfile.php">Edit</a>
                                        </div>
                                      
                        </div>
                    </div>

                    </div>
                </div>            </div>
            


         <?php include_once("footer.php"); ?>



 
