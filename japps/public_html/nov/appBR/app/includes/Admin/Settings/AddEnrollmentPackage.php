<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Setttings/EnrollmentPackage">Settings</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Setttings/EnrollmentPackage">Enrollment Package Settings</a></li>
        </ul>
    </div>
    <div class="row">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <?php include_once("includes/".UserRole."/Settings/sub_menu.php"); ?>  
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-xlg-8 col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-orange"><i class="ti-user"></i>New Enrollment Packages</h4>
                    <br>
                    <?php
                        if (isset($_POST['createBtn'])) {
                            $mysql->insert("_tbl_Settings_Packages",array("PackageName"              => $_POST['PackageName'],
                                                                          "PackageAmount"            => $_POST['PackageAmount'],
                                                                          "PV"                       => $_POST['PV'],
                                                                          "CutOffPV"                 => $_POST['CutOffPV'],
                                                                          "PVAmount"                 => '1',
                                                                          "FileName"                 => 'diamond.png',
                                                                          "Prefix"                   => $_POST['PackageName'],
                                                                          "DirectReferalCommission"  => $_POST['DirectReferalCommission'],
                                                                          "DirectReferal_Days"       => $_POST['DirectReferal_Days'],
                                                                          "BinaryCommission"         => $_POST['BinaryCommission'],
                                                                          "BinaryCommission_Days"    => $_POST['BinaryCommission_Days'],
                                                                          "ROI"                      => $_POST['ROI'],
                                                                          "ROI_Days"                 => $_POST['ROI_Days'],
                                                                          "ROI_StartDay"             => $_POST['ROI_StartDay'],
                                                                          "ROI_Booster_Commission"   => $_POST['ROI_Booster_Commission'],
                                                                          "ROI_Booster_Days"         => $_POST['ROI_Booster_Days'],
                                                                          "ROI_Booster_Apply_Before" => $_POST['ROI_Booster_Apply_Before']));
                        ?>
                        <script>$(document).ready(function() {swal("Package created.", {icon : "success" });});</script>
                    <?php } ?>
                    <form method="post" action="">
                        <div class="row mb15"> 
                            <div class="col-md-12 col-xs-6 b-r">
                                <strong>Package Name</strong>
                                <br>
                                <input type="text" name="PackageName" required id="PackageName" placeholder="Package Name" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb15"> 
                            <div class="col-md-4 col-xs-6 b-r">
                                <strong>Package Amount ($)</strong>
                                <br>
                                <input type="text" name="PackageAmount" required  placeholder="Package Amount" id="PackageAmount" class="form-control" required>
                            </div>
                            <div class="col-md-4 col-xs-6 b-r">
                                <strong>Package Value (PV)</strong>
                                <br>
                                <input type="text" name="PV" required  placeholder="Package Value" id="PV" class="form-control" required>
                            </div>
                             <div class="col-md-4 col-xs-6 b-r">
                                <strong>Celing ($)</strong>
                                <br>
                                <input type="text" name="CutOffPV" required placeholder="Celing" id="CutOffPV" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb15"> 
                            <div class="col-md-4 col-xs-6 b-r">
                                <strong>Direct Referal Comm(%)</strong>
                                <br>
                                <input type="text" name="DirectReferalCommission" required placeholder="DirectReferal Commission" id="DirectReferalCommission" class="form-control" required>
                            </div>
                            <div class="col-md-4 col-xs-6 b-r">
                                <strong>Direct Referal Days</strong>
                                <br>
                                <input type="text" name="DirectReferal_Days" required  placeholder="DirectReferal Days" id="DirectReferal_Days" class="form-control" required>
                            </div>
                        </div> 
                        <div class="row mb15"> 
                            <div class="col-md-4 col-xs-6 b-r">
                                <strong>Binary Comm(%)</strong>
                                <br>
                                <input type="text" name="BinaryCommission" required placeholder="Binary Commission" id="BinaryCommission" class="form-control" required>
                            </div>
                            <div class="col-md-4 col-xs-6 b-r">
                                <strong>Binary Comm Days</strong>
                                <br>
                                <input type="text" name="BinaryCommission_Days" required placeholder="BinaryCommission Days"  id="BinaryCommission_Days" class="form-control" required>
                            </div>
                        </div> 
                        <div class="row mb15"> 
                            <div class="col-md-4 col-xs-6 b-r">
                                <strong>Package ROI ($)</strong>
                                <br>
                                <input type="text" name="ROI" id="ROI" required placeholder="ROI"   class="form-control" required>
                            </div>
                             <div class="col-md-4 col-xs-6 b-r">
                                <strong>ROI Days (%)</strong>
                                <br>
                                <input type="text" name="ROI_Days" required  placeholder="ROI Days"  id="ROI_Days" class="form-control" required>
                            </div>
                             <div class="col-md-4 col-xs-6 b-r">
                                <strong>ROI Starts</strong>
                                <br>
                                <input type="text" name="ROI_StartDay" id="ROI_StartDay" required placeholder="ROI Start Day"   class="form-control" required>
                                <span style='font-size:10px;color:#888'>Note: Roi Start (7th working day)</span>
                            </div>
                        </div> 
                        <div class="row mb15"> 
                            <div class="col-md-4 col-xs-6 b-r">
                                <strong>Booster Commission(%)</strong>
                                <br>
                                <input type="text" name="ROI_Booster_Commission" id="ROI_Booster_Commission" required placeholder="ROI Booster Days"   class="form-control" required>
                            </div>
                            <div class="col-md-4 col-xs-6 b-r">
                                <strong>Booster Days</strong>
                                <br>
                                <input type="text" name="ROI_Booster_Days" id="ROI_Booster_Days" required placeholder="ROI Booster Days"   class="form-control" required>
                            </div>
                            <div class="col-md-4 col-xs-6 b-r">
                                <strong>Booster Apply Before (Days)</strong>
                                <br>
                                <input type="text" name="ROI_Booster_Apply_Before" id="ROI_Booster_Apply_Before" required placeholder="ROI Booster Apply Before" class="form-control" required>
                                <span style='font-size:10px;color:#888'>Note: 5 for (5th working day)</span>
                            </div>
                        </div> 
                        <div class="row mb15">
                            <div class="col-md-4 col-xs-6 b-r">
                                <button type="submit" name="createBtn" id="updateBtn" class="btn btn-primary" >Create Package</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>                      
        </div>
    </div>            
</div>