<?php $data= $mysql->select("select * from _tbl_franchisee where FranchiseeID='".$_GET['id']."'");?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Franchisee Information</div>
                        </div>
                        <div class="card-body">
                            <div class="form-group form-show-validation row" style="padding:0px">
                                <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Name</label>
                                <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['FranchiseeName'];?></div>
                            </div>
                            <div class="form-group form-show-validation row" style="padding:0px">
                                <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Mobile Number</label>
                                <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['MobileNumber'];?></div>
                            </div>
                            <div class="form-group form-show-validation row" style="padding:0px">
                                <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">IsActive</label>
                                <div class="col-lg-4 col-md-9 col-sm-8">
                                    <?php if($data[0]['IsActive']=="1") { echo "Yes"; } else { echo "No"; } ?>
                                </div>
                            </div>
                        </div>                                                                        
                        <div class="card-action">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="dashboard.php?action=Franchisee/List&filter=all" class="btn btn-warning btn-border">Back</a>
                                </div>                                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-title">
                                        Account Summary
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">Request On</th>
                                                <th scope="col">Particulars</th>
                                                <th scope="col" style="text-align: right;">Credits</th>
                                                <th scope="col" style="text-align: right;">Debits</th>
                                                <th scope="col" style="text-align: right;">Balance</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $credits = $mysql->select("select * from _tbl_franchisee_credits where FranchiseeID='".$_GET['id']."' order by CreditsID desc");?>
                                        <?php foreach($credits as $credit){ ?>
                                            <tr>
                                                <td><?php echo date("M-d-Y",strtotime($credit['RequestOn']));?></td>
                                                <td><?php echo $credit['Particulars'];?></td>
                                                <td style="text-align: right;"><?php echo $credit['Credits'];?></td>
                                                <td style="text-align: right;"><?php echo $credit['Debits'];?></td>
                                                <td style="text-align: right;"><?php echo $credit['Balance'];?></td>
                                            </tr>
                                        <?php } ?>
                                        <?php if(sizeof($credits)==0){ ?>
                                            <tr>
                                                <td colspan="5" style="text-align: center;">No Summary Found</td>
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



