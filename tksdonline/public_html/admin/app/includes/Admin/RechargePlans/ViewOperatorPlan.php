<?php 
 
 $Requests  = $mysql->select("SELECT * FROM _tbl_operator_plans  where IsActive='1'  and OperatorCode='".$_GET['OperatorCode']."'" );
 $optr  = $mysql->select("SELECT * FROM _tbl_operators  where OperatorCode='".$_GET['OperatorCode']."'" );
 
 
  ?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=RechargePlans/List">Operators</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=RechargePlans/List">Manage Plans</a></li>
        </ul>
    </div>
    
    <div class="row">
        <div class="col-lg-12 col-xlg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="card-title">Operator Plans</h4>
                        <span><?php echo $optr[0]["OperatorName"];?></span>
                        <a href="dashboard.php?action=RechargePlans/AddPlan&OperatorCode=<?php echo $_GET['OperatorCode'];?>" class="btn btn-primary btn-xs" style="float: right;">Add Plan</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th><b>Description</b></th>
                                        <th><b>Amount</b></th>
                                        <th><b></b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($Requests as $Request){ ?>
                                    <tr>
                                        <td><?php echo $Request['Description'];?><br></td>
                                        <td style="text-align: right"><?php echo $Request['Amount'];?></td>
                                        <td style="text-align: right;">
                                            <a href="dashboard.php?action=RechargePlans/EditPlan&OperatorCode=<?php echo $_GET['OperatorCode'];?>&id=<?php echo $Request['PlanTableID'];?>" class="btn btn-primary btn-xs" style="float: right;">Edit Plan</a>
                                        </td>
                                    </tr>
                                    <?php }?>  
                                    <?php if(sizeof($Requests)=="0"){?>
                                    <tr>
                                        <td colspan="6" style="text-align: center;">No Datas Found</td>
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