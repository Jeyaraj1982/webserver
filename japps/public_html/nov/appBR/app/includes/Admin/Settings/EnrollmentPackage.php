<?php $Members =$mysql->select("select * from `_tbl_Settings_Packages` order by PackageAmount*1 "); ?>
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
                <div class="col-lg-12 col-xlg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-orange"><i class="ti-user"></i>Enrollment Packages</h4>
                            <a href="dashboard.php?action=Settings/AddEnrollmentPackage">Add Package</a>
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th class="border-top-0" colspan="3" style="background:#00cbff;text-align:center;"><b>Package Info</b></th>
                                            <th class="border-top-0" colspan="2" style="background:#C2DFFF;text-align:center;"><b>Direct Referal</b></th>
                                            <th class="border-top-0" colspan="2" style="background:#82CAFF;text-align:center;"><b>Binary Comm</b></th>
                                            <th class="border-top-0" colspan="3" style="background:#BCC6CC;text-align:center;"><b>ROI Commission</b></th>
                                            <th class="border-top-0" colspan="3" style="background:#C2DFFF;text-align:center"><b>ROI Booster Comm</b></th>
                                            <th class="border-top-0" rowspan="2" style="text-align:center;padding-left:5px !important;padding-right:5px !important"><b>Ceiling</b></th>
                                        </tr>
                                        <tr>
                                            <th class="border-top-0" style="background:#00cbff;"><b>Name</b></th>
                                            <th class="border-top-0" style="background:#00cbff;text-align:center;padding-left:0px !important;padding-right:0px !important"><b>Price($)</b></th>
                                            <th class="border-top-0" style="background:#00cbff;text-align:center;padding-left:0px !important;padding-right:0px !important"><b>PV</b></th>
                                            <th class="border-top-0"  style="background:#C2DFFF;text-align:center;padding-left:0px !important;padding-right:0px !important"><b>(%)</b></th>
                                            <th class="border-top-0"  style="background:#C2DFFF;text-align:center;padding-left:0px !important;padding-right:0px !important"><b>Days</b></th>
                                            <th class="border-top-0"  style="background:#82CAFF;text-align:center;padding-left:0px !important;padding-right:0px !important"><b>(%)</b></th>
                                            <th class="border-top-0"  style="background:#82CAFF;text-align:center;padding-left:0px !important;padding-right:0px !important"><b>Days</b></th>
                                            <th class="border-top-0"  style="background:#BCC6CC;text-align:center;padding-left:0px !important;padding-right:0px !important"><b>(%)</b></th>
                                            <th class="border-top-0"  style="background:#BCC6CC;text-align:center;padding-left:0px !important;padding-right:0px !important"><b>Days</b></th>
                                            <th class="border-top-0"  style="background:#BCC6CC;text-align:center;padding-left:0px !important;padding-right:5px !important"><b>Start</b></th>
                                            <th class="border-top-0"  style="background:#C2DFFF;text-align:center;padding-left:0px !important;padding-right:0px !important"><b>(%)</b></th>
                                            <th class="border-top-0"  style="background:#C2DFFF;text-align:center;padding-left:0px !important;padding-right:0px !important"><b>Days</b></th>
                                            <th class="border-top-0"  style="background:#C2DFFF;text-align:center;padding-left:0px !important;padding-right:0px !important"><b>&lt;=Days</b></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($Members as $Member){
                                            $e = $mysql->select("select * from _tbl_Members where CurrentPackageID='".$Member['PackageID']."'");
                                            $style= ($Member['IsActive']==0) ? " style='background:orange' " : "";
                                        ?>
                                        <tr <?php echo $style?> >
                                            <td>
                                                <?php echo $Member['PackageName'];?><br>
                                                <?php if (sizeof($e)==0) {?>
                                                    <a href="dashboard.php?action=Settings/EditEnrollmentPackage&Package=<?php echo md5("J2J".$Member['PackageID']);?>">Edit</a>
                                                <?php } else {?>
                                                    <span style="color:#888">Edit</span>
                                                <?php } ?>
                                            </td>
                                            <td style="text-align:center;padding-left:5px !important;padding-right:5px !important"><?php echo $Member['PackageAmount'];?></td>
                                            <td style="text-align:center;padding-left:5px !important;padding-right:5px !important"><?php echo $Member['PV'];?></td>
                                            <td style="background:#C2DFFF;text-align:center;padding-left:0px !important;padding-right:5px !important" ><?php echo $Member['DirectReferalCommission'];?></td>
                                            <td style="background:#C2DFFF;text-align:center;padding-left:0px !important;padding-right:5px !important"><?php echo $Member['DirectReferal_Days'];?></td>
                                            <td style="background:#82CAFF;text-align:center;padding-left:0px !important;padding-right:5px !important"><?php echo $Member['BinaryCommission'];?></td>
                                            <td style="background:#82CAFF;text-align:center;padding-left:0px !important;padding-right:5px !important"><?php echo $Member['BinaryCommission_Days'];?></td> 
                                            <td style="background:#BCC6CC;text-align:center;padding-left:0px !important;padding-right:5px !important"><?php echo $Member['ROI'];?></td>
                                            <td style="background:#BCC6CC;text-align:center;padding-left:0px !important;padding-right:5px !important"><?php echo $Member['ROI_Days'];?></td>
                                            <td style="background:#BCC6CC;text-align:center;padding-left:0px !important;padding-right:5px !important"><?php echo $Member['ROI_StartDay'];?></td>
                                            <td style="background:#C2DFFF;text-align:center;padding-left:0px !important;padding-right:5px !important"><?php echo $Member['ROI_Booster_Commission'];?></td>
                                            <td style="background:#C2DFFF;text-align:center;padding-left:0px !important;padding-right:5px !important"><?php echo $Member['ROI_Booster_Days'];?></td>
                                            <td style="background:#C2DFFF;text-align:center;padding-left:0px !important;padding-right:5px !important"><?php echo $Member['ROI_Booster_Apply_Before'];?></td>
                                            <td style="text-align:center;padding-left:0px !important;padding-right:5px !important"><?php echo $Member['CutOffPV'];?></td>
                                        </tr>
                                        <?php } ?>    
                                    </tbody>
                                </table>
                            </div>          
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</div>