<?php 
  $sql= $mysql->select("select * from `_tbl_Members` where  `MemberCode`='".$_SESSION['User']['MemberCode']."'");
?>
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title" style="line-height:18px;">
                                        Profile Information<br>
                                        <span style="font-size:12px;color:#888">Joined: <?php echo printDateTime($sql[0]['CreatedOn']);?></span>
                                    </div>
                                </div>
                                <form id="exampleValidation">
                                    <div class="card-body">
                                        <div class=" row">
                                            <label for="Name" class="col-lg-2 col-md-3 col-sm-4 mt-sm-2 text-left">Name </label>
                                            <div class="col-lg-10 col-md-9 col-sm-8" style="padding-top:8px"><?php echo $sql[0]['MemberName'];?></div>
                                        </div>
                                        <div class=" row">
                                            <label for="MobileNumber" class="col-lg-2 col-md-3 col-sm-4 mt-sm-2 text-left">Gender </label>
                                            <div class="col-lg-10 col-md-9 col-sm-8" style="padding-top:8px"><?php echo $sql[0]['Sex'];?></div>
                                        </div>
                                        <div class=" row">
                                            <label for="MobileNumber" class="col-lg-2 col-md-3 col-sm-4 mt-sm-2 text-left">Mobile Number </label>
                                            <div class="col-lg-10 col-md-9 col-sm-8" style="padding-top:8px"><?php echo $sql[0]['MobileNumber'];?></div>
                                        </div>
                                        <div class=" row">
                                            <label for="MobileNumber" class="col-lg-2 col-md-3 col-sm-4 mt-sm-2 text-left">Email ID </label>
                                            <div class="col-lg-10 col-md-9 col-sm-8" style="padding-top:8px"><?php echo $sql[0]['EmailID'];?></div>
                                        </div>
                                        <div class="row">
                                            <label for="CommunicationAddress" class="col-lg-2 col-md-3 col-sm-4 mt-sm-2 text-left"> Address </label>
                                            <div class="col-lg-10 col-md-9 col-sm-8" style="padding-top:8px"><?php echo $sql[0]['AddressLine1'];?>,<br><?php echo $sql[0]['AddressLine2'];?></div>
                                        </div>
                                        <div class=" row">
                                            <label for="Aadhaar" class="col-lg-2 col-md-3 col-sm-4 mt-sm-2 text-left">City Name </label>
                                            <div class="col-lg-10 col-md-9 col-sm-8" style="padding-top:8px"><?php echo $sql[0]['CityName'];?></div>
                                        </div>
                                        <div class=" row">
                                            <label for="Aadhaar" class="col-lg-2 col-md-3 col-sm-4 mt-sm-2 text-left">Pincode </label>
                                            <div class="col-lg-10 col-md-9 col-sm-8" style="padding-top:8px"><?php echo $sql[0]['Pincode'];?></div>
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a href="dashboard.php?action=EditProfile" id="show-signup" class="link">Edit</a>
                                            </div>                                        
                                        </div>
                                    </div>
                                </form>
                            </div>                                                                                             
                        </div>
                    </div>
                </div>
            </div>
