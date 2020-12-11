 <?php
     
 ?>
  <div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Settings/MyStoreInformation">Settings</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Settings/MyStoreInformation">My Store Information</a></li>
        </ul>
    </div> 
    <?php
        $data = $mysql->select("select * from _tbl_business_supporting_center where SupportingCenterAdminID='".$_SESSION['User']['SupportingCenterAdminID']."'");
    ?>
    <form action="" class="validation-wizard clearfix" role="application" id="steps-uid-7" novalidate="novalidate" method="post">    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-b-0 text-orange "><i class="mdi mdi-account-multiple-plus  p-r-10"></i>My Store Information</h4>
                </div>
                <div class="card-body"> 
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Store Name</label>
                                <div style="color:#999"><?php echo $data[0]['SupportingCenterName'];?></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Address Line 1</label>
                                <div style="color:#999"><?php echo $data[0]['SupportingCenterAddressLine1'];?></div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Address Line 2</label>
                                <div style="color:#999"><?php echo $data[0]['SupportingCenterAddressLine2'];?></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>City Name</label>
                                <div style="color:#999"><?php echo $data[0]['SupportingCenterCityName'];?></div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Landmark</label>
                                <div style="color:#999"><?php echo $data[0]['Landmark'];?></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Country Name</label>
                                <div style="color:#999"><?php echo $data[0]['Country'];?></div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>State Name</label>
                                <div style="color:#999"><?php echo $data[0]['State'];?></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>District Name</label>
                                <div style="color:#999"><?php echo $data[0]['District'];?></div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Pin Code</label>
                                <div style="color:#999"><?php echo $data[0]['PinCode'];?></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Email ID</label>
                                <div style="color:#999"><?php echo $data[0]['Email'];?></div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Contact Number</label>
                                <div style="color:#999"><?php echo $data[0]['Mobile'];?></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Website</label>
                                <div style="color:#999"><?php echo $data[0]['WebsiteName'];?></div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Google Map Url</label>
                                <div style="color:#999"><?php echo $data[0]['MapUrl'];?></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Pancard No</label>
                                <div style="color:#999"><?php echo $data[0]['PanCardNumber'];?></div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>GSTIN</label>
                                <div style="color:#999"><?php echo $data[0]['GSTIN'];?></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Store Type</label>
                                <div style="color:#999"><?php echo $data[0]['StoreTypeName'];?></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Input Commission</label>
                                <div style="color:#999"><?php echo $data[0]['InputCommission']."  %";?></div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Purchase Above</label>
                                <div style="color:#999"><?php echo $data[0]['PurchaseAbove'];?></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Short Description</label>
                                <div style="color:#999"><?php echo $data[0]['ShortDescription'];?></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Created On</label>
                                <div style="color:#999"><?php echo $data[0]['CreatedOn'];?></div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Status</label>
                                <div style="color:#999"><?php echo $data[0]['IsActive']==1 ? "Active" : "Deactivated";?></div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Store Logo</label>
                                <div>
                                    <img src="assets/stores/<?php echo $data[0]['ShopLogo'];?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
  </div>
     
   