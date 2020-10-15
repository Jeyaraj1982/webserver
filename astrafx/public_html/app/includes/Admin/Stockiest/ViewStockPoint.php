 <?php
     
 ?>
  <div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=/NewStockPoint">Stockiest</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=/NewStockPoint">View Stockiest</a></li>
        </ul>
    </div> 
    <?php
        $data = $mysql->select("select * from _tbl_stock_admin where StockAdminID='".$_GET['code']."'");
    ?>
    <form action="" class="validation-wizard clearfix" role="application" id="steps-uid-7" novalidate="novalidate" method="post">    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-b-0 text-orange "><i class="mdi mdi-account-multiple-plus  p-r-10"></i>Vuew Stockiest Information</h4>
                </div>
                <div class="card-body">
                    <div class="form-body">
                        <div class="card-body"> 
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>Stock Point Name</label>
                                        <div style="color:#999"><?php echo $data[0]['StockPointName'];?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>Address Line 1</label>
                                        <div style="color:#999"><?php echo $data[0]['StockPointAddressLine1'];?></div>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>Address Line 2</label>
                                        <div style="color:#999"><?php echo $data[0]['StockPointAddressLine2'];?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>City Name</label>
                                        <div style="color:#999"><?php echo $data[0]['StockPointCityName'];?></div>
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
                                        <div style="color:#999"><?php echo $data[0]['StockPointCountry'];?></div>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>State Name</label>
                                        <div style="color:#999"><?php echo $data[0]['StockPointState'];?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>District Name</label>
                                        <div style="color:#999"><?php echo $data[0]['StockPointDistrict'];?></div>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>Pin Code</label>
                                        <div style="color:#999"><?php echo $data[0]['StockPointPinCode'];?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>Email ID</label>
                                        <div style="color:#999"><?php echo $data[0]['StockPointEmail'];?></div>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>Mobile Number</label>
                                        <div style="color:#999"><?php echo $data[0]['StockPointMobile'];?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-b-0 text-orange "><i class="mdi mdi-account-multiple-plus  p-r-10"></i>Stock Point Admin Details</h4>
                </div>
                <div class="card-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="form-group user-test" id="user-exists">
                                    <label>Admin Name</label>
                                    <div style="color:#999"><?php echo $data[0]['StockAdminName'];?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <div style="color:#999"><?php echo $data[0]['MobileNumber'];?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" id="email-exists">
                                    <label>Email</label>
                                    <div style="color:#999"><?php echo $data[0]['AdminEmail'];?></div>
                                </div>
                            </div>                                
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <div style="color:#999"><?php echo $data[0]['Gender'];?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Pancard</label>
                                    <div style="color:#999"><?php echo $data[0]['PanCard'];?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Aadhaar Card</label>
                                    <div style="color:#999"><?php echo $data[0]['AdhaarCard'];?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address Line 1</label>
                                    <div style="color:#999"><?php echo $data[0]['Address1'];?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address Line 2</label>
                                    <div style="color:#999"><?php echo $data[0]['Address2'];?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Pincode</label>
                                    <div style="color:#999"><?php echo $data[0]['PostalCode'];?></div>
                                </div>
                            </div>
                        </div>
                </div>
                  <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Created On</label>
                                    <div style="color:#999"><?php echo $data[0]['CreatedOn'];?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <div style="color:#999"><?php echo $data[0]['IsActive']==1 ? "Active" : "Deactivated";?></div>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
    </div>
  </div>   