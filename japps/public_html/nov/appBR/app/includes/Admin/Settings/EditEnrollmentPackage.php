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
                            <h4 class="card-title text-orange"><i class="ti-user"></i>Edit Enrollment Packages</h4>
                            <br>
                            <?php if(isset($_POST['deleteBtn'])){    ?>
                                <script>
                                $(document).ready(function() {
                                    $('#deleteModal').modal('show');
                                });
                                 </script> 
                                    <div class="modal fade" id="deleteModal" role="dialog">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                           <div class="modal-header">
                                                <h4 class="modal-title"> </h4>
                                                <button type="button" class="close" data-dismiss="modal" style="padding-top:5px;">&times;</button>
                                            </div>
                                            <div class="modal-body">'
                                                <div style="text-align:left"> Dear ,<br></div>
                                                <div style="text-align:left">Are you sure want to delete?<br><br><br><br><br><br></div>
                                            </div> 
                                            <div class="modal-footer">  
                                                <a data-dismiss="modal" style="color:#1d8fb9;cursor:pointer">No, i will do later</a>&nbsp;&nbsp;&nbsp;
                                                <button type="button" class="btn btn-primary" data-dismiss="modal" style="font-family:roboto">Yes,continue</button>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <script>  
                               function Confirmdelete() {
                                      //$('#deleteModal').modal('show'); 
                                      var content = '<div class="modal fade" id="deleteModal" role="dialog">'
                                        +'<div class="modal-dialog">'
                                                           +'<div class="modal-header">'
                                                                +'<h4 class="modal-title"> </h4>'
                                                                +'<button type="button" class="close" data-dismiss="modal" style="padding-top:5px;">&times;</button>'
                                                            +'</div>'
                                                            +'<div class="modal-body">'
                                                                +'<div style="text-align:left"> Dear ,<br></div>'
                                                                +'<div style="text-align:left">Are you sure want to delete?<br><br><br><br><br><br>'+'</div>'
                                                            +'</div>' 
                                                            +'<div class="modal-footer">'  
                                                                +'<a data-dismiss="modal" style="color:#1d8fb9;cursor:pointer">No, i will do later</a>&nbsp;&nbsp;&nbsp;'
                                                                +'<button type="button" class="btn btn-primary" data-dismiss="modal" style="font-family:roboto">Yes,continue</button>'
                                                            +'</div>'
                                                        +'</form>'                                                                                                          
                                                    +'</div>'
                                                    +'</div>'
                                                    +'</div>'
                                            $('#deleteModal').html(content);
                                }
                               </script>
                            <?php   }  ?>
                            <?php
                                if (isset($_POST['updateBtn'])) {
                                    $mysql->execute("update _tbl_Settings_Packages set PackageName              ='".$_POST['PackageName']."',
                                                                                       PackageAmount            ='".$_POST['PackageAmount']."',
                                                                                       PV                       ='".$_POST['PV']."',
                                                                                       CutOffPV                 ='".$_POST['CutOffPV']."',
                                                                                       Prefix                   ='".$_POST['PackageName']."',
                                                                                       DirectReferalCommission  ='".$_POST['DirectReferalCommission']."',
                                                                                       DirectReferal_Days       ='".$_POST['DirectReferal_Days']."',
                                                                                       BinaryCommission         ='".$_POST['BinaryCommission']."',
                                                                                       BinaryCommission_Days    ='".$_POST['BinaryCommission_Days']."',
                                                                                       IsActive                 ='".$_POST['IsActive']."',
                                                                                       ROI                      ='".$_POST['ROI']."',  
                                                                                       ROI_Days                 ='".$_POST['ROI_Days']."',
                                                                                       ROI_Booster_Commission   ='".$_POST['ROI_Booster_Commission']."',
                                                                                       ROI_Booster_Days         ='".$_POST['ROI_Booster_Days']."',
                                                                                       ROI_Booster_Apply_Before ='".$_POST['ROI_Booster_Apply_Before']."',
                                                                                       ROI_StartDay             ='".$_POST['ROI_StartDay']."'
                                                                                            where md5(concat('J2J',PackageID))='".$_GET['Package']."' ");
                            ?>
                            <script>$(document).ready(function() {swal("Package updated.",{icon:"success"});});</script>
                            <?php
                                }
                                $data = $mysql->select("select * from _tbl_Settings_Packages where md5(concat('J2J',PackageID))='".$_GET['Package']."'");
                            ?>
                            <form method="post" action="">
                                <div class="row mb15"> 
                                    <div class="col-md-12 col-xs-6 b-r">
                                        <strong>Package Name</strong><br>
                                        <input type="text" name="PackageName" required value="<?php echo $data[0]['PackageName'];?>" id="PackageName" placeholder="Package Name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row mb15"> 
                                    <div class="col-md-4 col-xs-6 b-r">
                                        <strong>Package Amount ($)</strong><br>
                                        <input type="text" name="PackageAmount" required value="<?php echo $data[0]['PackageAmount'];?>"  placeholder="Package Amount" id="PackageAmount" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 col-xs-6 b-r">
                                        <strong>Package Value (PV)</strong><br>
                                        <input type="text" name="PV" required  value="<?php echo $data[0]['PV'];?>" placeholder="Package Value" id="PV" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 col-xs-6 b-r">
                                        <strong>Celing ($)</strong><br>
                                        <input type="text" name="CutOffPV" required value="<?php echo $data[0]['CutOffPV'];?>" placeholder="Celing" id="CutOffPV" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row mb15"> 
                                    <div class="col-md-4 col-xs-6 b-r">
                                        <strong>Direct Referal Comm(%)</strong><br>
                                        <input type="text" name="DirectReferalCommission" value="<?php echo $data[0]['DirectReferalCommission'];?>" required placeholder="DirectReferal Commission" id="DirectReferalCommission" class="form-control" required>
                                    </div>
                                    <div class="col-md-4  col-xs-6 b-r">
                                        <strong>Direct Referal Days</strong><br>
                                        <input type="text" name="DirectReferal_Days" required value="<?php echo $data[0]['DirectReferal_Days'];?>"  placeholder="DirectReferal Days" id="DirectReferal_Days" class="form-control" required>
                                    </div>
                                </div> 
                                <div class="row mb15"> 
                                    <div class="col-md-4 col-xs-6 b-r">
                                        <strong>Binary Comm(%)</strong><br>
                                        <input type="text" name="BinaryCommission" required value="<?php echo $data[0]['BinaryCommission'];?>"  placeholder="Binary Commission" id="BinaryCommission" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 col-xs-6 b-r">
                                        <strong>Binary Comm Days</strong><br>
                                        <input type="text" name="BinaryCommission_Days" required value="<?php echo $data[0]['BinaryCommission_Days'];?>" placeholder="BinaryCommission Days"  id="BinaryCommission_Days" class="form-control" required>
                                    </div>
                                </div> 
                                <div class="row mb15"> 
                                    <div class="col-md-4 col-xs-6 b-r">
                                        <strong>ROI Commission (%)</strong><br>
                                        <input type="text" name="ROI" id="ROI" required value="<?php echo $data[0]['ROI'];?>" placeholder="ROI"   class="form-control" required>
                                    </div>
                                    <div class="col-md-4 col-xs-6 b-r">
                                        <strong>ROI Days</strong><br>
                                        <input type="text" name="ROI_Days" required  value="<?php echo $data[0]['ROI_Days'];?>" placeholder="ROI Days"  id="ROI_Days" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 col-xs-6 b-r">
                                        <strong>ROI Starts</strong><br>
                                        <input type="text" name="ROI_StartDay" id="ROI" value="<?php echo $data[0]['ROI_StartDay'];?>" required placeholder="ROI Start Day"   class="form-control" required>
                                        <span style='font-size:10px;color:#888'>Note: Roi Start (7th working day)</span>
                                    </div>
                                </div> 
                                <div class="row mb15">
                                    <div class="col-md-4 col-xs-6 b-r">
                                        <strong>Booster Commission(%)</strong><br>
                                        <input type="text" name="ROI_Booster_Commission" value="<?php echo $data[0]['ROI_Booster_Commission'];?>" id="ROI_Booster_Commission" required placeholder="ROI Booster Days"   class="form-control" required>
                                    </div>
                                    <div class="col-md-4 col-xs-6 b-r">
                                        <strong>Booster Days</strong><br>
                                        <input type="text" name="ROI_Booster_Days" value="<?php echo $data[0]['ROI_Booster_Days'];?>" id="ROI_Booster_Days" required placeholder="ROI Booster Days"   class="form-control" required>
                                    </div>
                                    <div class="col-md-4 col-xs-6 b-r">
                                        <strong>Booster Apply Before (Days)</strong><br>
                                        <input type="text" name="ROI_Booster_Apply_Before" value="<?php echo $data[0]['ROI_Booster_Apply_Before'];?>" id="ROI_Booster_Apply_Before" required placeholder="ROI Booster Apply Before" class="form-control" required>
                                        <span style='font-size:10px;color:#888'>Note: 5 for (5th working day)</span>
                                    </div>
                                </div> 
                                <div class="row mb15"> 
                                    <div class="col-md-12 col-xs-6 b-r">
                                        <strong>Is Active</strong><br>
                                        <select name="IsActive" class="form-control">
                                            <option value="1" <?php echo $data[0]['IsActive']==1 ? "  selected='selected' " : "";?> >Active</option>
                                            <option value="0" <?php echo $data[0]['IsActive']==0 ? "  selected='selected' " : "";?> >Disable</option>
                                        </select>
                                    </div>
                                </div>  
                                <div class="row mb15">
                                    <div class="col-md-4 col-xs-6 b-r">
                                        <button type="submit" name="updateBtn" id="updateBtn" class="btn btn-primary" >Update Package</button>
                                    </div>
                                    <div class="col-md-4 col-xs-6 b-r">
                                        <?php    
                                            $e = $mysql->select("select * from _tbl_Members where CurrentPackageID='".$data[0]['PackageID']."'");
                                            if (sizeof($e)==0) {?>
                                            <button type="submit"  name="deleteBtn" id="deleteBtn" class="btn btn-danger" >Delete</button>
                                        <?php } else {?>
                                            
                                        <?php } ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>                      
                </div>
            </div>            
        </div>
    </div>
</div>
