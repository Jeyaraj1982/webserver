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
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-orange"><i class="ti-user"></i>Enrollment Packages</h4>
                        <?php $Members =$mysql->select("select * from `_tbl_Settings_Packages`"); ?>
                         <div class="table-responsive">
                                                <table id="basic-datatables" class="display table table-striped table-hover" >
                                                    <thead>
                                                        <tr>
                                                            <th  style="width:50px !important;"></th>
                                                            <th class="border-top-0"><b>Package Name</b></th>
                                                            <th class="border-top-0"><b>PV</b></th>
                                                            <th class="border-top-0"><b>CutOff</b></th>
                                                            <th class="border-top-0"><b>&nbsp;</b></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($Members as $Member){ ?>
                                                        <tr>
                                                            <td style="padding:10px !important"><img src="assets/img/<?php echo $Member['FileName'];?>" style="height:48px;"></td>
                                                            <td><?php echo $Member['PackageName'];?></td>
                                                            <td><?php echo $Member['PV'];?></td>
                                                            <td><?php echo $Member['CutOffPV'];?></td>
                                                            <td>&nbsp;</td>
                                                        </tr>
                                                    <?php }?>    
                                                    </tbody>
                                                </table>
                                            </div>          
                    
                </div>
            </div>
        </div>
    </div>            
</div>
<?php include_once("footer.php"); ?>