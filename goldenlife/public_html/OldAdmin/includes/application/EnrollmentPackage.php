            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-display1 icon-gradient bg-premium-dark">
                                    </i>
                                </div>
                                <div>Settings
                                
                                </div>
                            </div>
                        </div>
                    </div>       
                    
                     
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade active show" id="tab-content-1" role="tabpanel">
                            <div class="row">
                                <div class="col-md-4">
                                 
                                    <div class="card">
                <div class="card-body">
                    <div class="row mb15">
                        <div class="col-md-12 col-xs-12 b-r">
                            <a href="dashboard.php?action=application/GeneralSettings">General Settings</a>
                        </div>
                    </div>
                    <div class="row mb15">
                        <div class="col-md-12 col-xs-12 b-r">
                            <a href="dashboard.php?action=application/EnrollmentPackage">Enrollment Packages</a>
                        </div>
                    </div>
                    <div class="row mb15">
                        <div class="col-md-12 col-xs-12 b-r">
                            <a href="dashboard.php?action=application/WithdrawalSettings">Withdrawal Settings</a>
                        </div>
                    </div>
                    <div class="row mb15">
                        <div class="col-md-12 col-xs-12 b-r">
                            <a href="dashboard.php?action=application/PayoutSettings">Payout Settings</a>
                        </div>
                    </div>
                </div>
            </div>
                                </div>
                                
                                <div class="col-md-8">
                                    <div class="main-card mb-3 card">
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
                                                     <?php $Members =$mysql->select("select * from `_tbl_Settings_Packages`"); ?>
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




