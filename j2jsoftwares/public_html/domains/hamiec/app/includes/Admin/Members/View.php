
<?php 
    $sql= $mysql->select("select * from `_tbl_Members` where  md5(Concat('J!',`MemberID`))='".$_GET['d']."'");
 
?>
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                     
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title" style="float: left;">View Member Information</div>
                                    <div class="dropdown dropdown-kanban" style="float: right;padding-top:10px;">
                                        <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                            <i class="icon-options-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="dashboard.php?action=Members/MyContacts&d=<?php echo $_GET['d'];?>" draggable="false">My Contacts</a>
                                            <a class="dropdown-item" href="dashboard.php?action=Members/DefaultSettings&d=<?php echo $_GET['d'];?>" draggable="false">Default Settings</a>
                                            <a class="dropdown-item" href="dashboard.php?action=Members/TNEBDataLog&d=<?php echo $_GET['d'];?>" draggable="false">TNEB Data Log</a>
                                            <a class="dropdown-item" href="dashboard.php?action=Members/IMPSDataLog&d=<?php echo $_GET['d'];?>" draggable="false">IMPS Data Log</a>
                                            <a class="dropdown-item" href="dashboard.php?action=Members/MobileAPILog&d=<?php echo $_GET['d'];?>" draggable="false">Mobile Api Log</a>
                                        </div>
                                    </div>
                                </div>
                                    <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Member Name </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['MemberName'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="MobileNumber" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Gender </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['Gender'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="MobileNumber" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Mobile Number </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['MobileNumber'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="MobileNumber" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Email ID </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['EmailID'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="CommunicationAddress" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Address Line 1 </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['Address1'];?> <?php echo $sql[0]['Address1'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Aadhaar" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Pincode </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['PostalCode'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Aadhaar" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">GSTIN </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['GSTIN'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Aadhaar" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Login Password </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['MemberPassword'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Aadhaar" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Member Pin </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['MemberPin'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Aadhaar" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Mobile Region </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['Region'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Aadhaar" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">TNEB Region </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['TNEBRegion'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Aadhaar" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Status </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><span class="<?php echo ($sql[0]['IsActive']==1) ? 'Activedot' : 'Deactivedot';?>"></span>&nbsp;&nbsp;&nbsp;<?php echo $sql[0]['IsActive']==1 ? "Active" : "Deactivated";?></div>
                                        </div>
                                         <div class="form-group form-show-validation row">
                                            <label for="Aadhaar" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Created On</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['CreatedOn'];?></div>
                                        </div>
                                        </div>
                                        <div class="card-action">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <a href="dashboard.php?action=Members/Manage&Status=All" id="show-signup" class="link">Back</a>
                                                </div>                                        
                                            </div>
                                        </div>
                                    </div>                                                                                             
                                </div>
                            </div>
                        </div>
                    </div>
             
        </div>

         
     