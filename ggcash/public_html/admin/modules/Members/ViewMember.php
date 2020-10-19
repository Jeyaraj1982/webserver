<?php include_once("header.php");?>
<?php

  $Member =$mysqldb->select("select * from _tbl_Members where MemberCode='".$_GET['code']."'");
  ?>
  <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-9 align-self-center">
                        <h4 class="page-title">Edit member</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">View Member</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="container-fluid">
                <div class="row">
  
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">

        <div class="card-body">
        <form method="post">
            <h4 class="card-title text-orange"><i class="ti-user"></i>&nbsp;&nbsp;Member Information</h4>
            
            
                <div class="row">
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Member ID</strong>
                                                <br>
                                                <p class="text-muted">
                                                    <?php echo $Member[0]['MemberCode'];?> 
                                                    
                                                </p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Sponsor ID</strong>
                                                <br>
                                                <p class="text-muted">
                                                <?php echo $Member[0]['SponsorCode'];?>
                                                </p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Upline ID</strong>
                                                <br>
                                                <p>
                                                  <?php echo $Member[0]['UplineCode'];?>
                                                  </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Created On</strong>
                                                <br>
                                                <p class="text-muted">
                                                    <?php echo $Member[0]['CreatedOn'];?> 
                                                    
                                                </p>
                                            </div>
                                             
                                        </div>
                                        <hr>
                                        
                                        <div class="row">
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Member Name</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Member[0]['MemberName'];?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>DOB</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Member[0]['DateofBirth'];?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Gender</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Member[0]['Sex'];?></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Mobile</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Member[0]['MobileNumber'];?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6"> <strong>Email</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Member[0]['MemberEmail'];?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Password</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Member[0]['MemberPassword'];?></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                             <div class="col-md-4 col-xs-6 b-r"> <strong>Father Name</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Member[0]['FatherName'];?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Adhaar Number</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Member[0]['AdhaarCard'];?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Pancard Number</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Member[0]['PanCard'];?></p>
                                            </div>
                                           </div>
                                           <hr>
                                        <div class="row">
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Address 1</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Member[0]['AddressLine1'];?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Address 2</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Member[0]['AddressLine2'];?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Address 3</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Member[0]['AddressLine3'];?></p>
                                            </div>
                                        </div>
                                        <hr> 
                                        <div class="row">
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Pincode</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Member[0]['PinCode'];?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>IsActive</strong>
                                                <br>
                                                <p class="text-muted"><span class="<?php echo ($Member[0]['IsActive']==1) ? 'Activedot' : 'Deactivedot';?>"></span>&nbsp;&nbsp;&nbsp;<?php if($Member[0]['IsActive']==1){ echo "Active";}  else{  echo "Deactive";   }   ?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Created On</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Member[0]['CreatedOn'];?></p>
                                            </div>
                                        </div>            
                                        <hr> 
                                        <div class="row">
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>E-Pin Wallet Balance</strong>
                                                <br>
                                                <p class="text-muted"><?php echo number_format(getEpinWalletBalance($Member[0]['MemberID']),2);?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>GGCash Wallet Balance</strong>
                                                <br>
                                                <p class="text-muted"><?php echo number_format(getGGCashWalletBalance($Member[0]['MemberID']),2);?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Utility Wallet Balance</strong>
                                                <br>
                                                <p class="text-muted"><?php echo number_format(getUtilityhWalletBalance($Member[0]['MemberID']),2);?></p>
                                            </div>
                                        </div>
                                        </form>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Available Balance</strong>
                                               
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"></div>
                                            <div class="col-md-4 col-xs-6 b-r" style="text-align:right"><a href="dashboard.php?action=Members/List">List of Members</a></div>
                                        </div>
                        </div>
                    </div>

                    </div>
                </div>            </div>
            


         <?php include_once("footer.php"); ?>



 
