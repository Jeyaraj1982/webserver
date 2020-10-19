<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-9 align-self-center">
                <h4 class="page-title">Settings</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Entrollment Package</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <div class="row  mb15">
                        <div class="col-md-12 col-xs-12 b-r">
                            <a href="dashboard.php?action=Settings/GeneralSettings">General Settings</a>
                        </div>
                    </div>
                    <div class="row mb15">
                        <div class="col-md-12 col-xs-12 b-r">
                            <a href="dashboard.php?action=Settings/EnrollmentPackage">Enrollment Packages</a>
                        </div>
                    </div>
                    <div class="row mb15">
                        <div class="col-md-12 col-xs-12 b-r">
                            <a href="dashboard.php?action=Settings/WithdrawalSettings">Withdrawal Settings</a>
                        </div>
                    </div>
                    <div class="row mb15">
                        <div class="col-md-12 col-xs-12 b-r">
                            <a href="dashboard.php?action=Settings/PayoutSettings">Payout Settings</a>
                        </div>
                    </div>
                    <div class="row mb15">
                        <div class="col-md-12 col-xs-12 b-r">
                            <a href="dashboard.php?action=Settings/AdminSettings">Admin Settings</a>
                        </div>
                    </div>
                    <div class="row mb15">
                        <div class="col-md-12 col-xs-12 b-r">
                            <a href="dashboard.php?action=Settings/MobileAPISettings">Mobile SMS API Settings</a>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-orange"><i class="ti-user"></i>&nbsp;&nbsp; Enrollment Packages</h4>
                    <div class="row">
                        <?php $Members =$mysqldb->select("select * from `_tbl_Settings_Packages`"); ?>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12 col-xlg-12 col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table v-middle" style="border: 1px solid; border-color: #e1e1e1;">
                                                    <thead>
                                                        <tr>
                                                            <th class="border-top-0"><b>Package Name</b></th>
                                                            <th class="border-top-0"><b>Package Amount</b></th>
                                                            <th class="border-top-0"><b>Package SKU</b></th>
                                                            <th class="border-top-0"><b>&nbsp;</b></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($Members as $Member){ ?>
                                                        <tr>
                                                            <td><?php echo $Member['PackageName'];?></td>
                                                            <td><?php echo $Member['PackageAmount'];?></td>
                                                            <td><?php echo $Member['ProductSKU'];?></td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>            
</div>
<?php include_once("footer.php"); ?>