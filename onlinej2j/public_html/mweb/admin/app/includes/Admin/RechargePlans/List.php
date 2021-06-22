<?php 
 
 $Requests  = $mysql->select("SELECT * FROM _tbl_operators  where IsPlanDetails='1'" );
 
  ?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=RechargePlans/List">Operators</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=RechargePlans/List">Plan Details</a></li>
        </ul>
    </div>
    
    <div class="row">
        <div class="col-lg-12 col-xlg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="card-title">Operator Plan Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th><b>Operator Name</b></th>
                                        <th><b>Operator Code</b></th>
                                        <th></th>
                                    </tr>
                                </thead>                    
                                <tbody>
                                    <?php foreach ($Requests as $Request){ ?>
                                    <tr>
                                        <td style="text-align: left"><?php echo $Request['OperatorName'];?></td>
                                        <td style="text-align: center"><?php echo $Request['OperatorCode'];?></td>
                                        <td style="text-align: right;">
                                          <a href="dashboard.php?action=RechargePlans/ViewOperatorPlan&OperatorCode=<?php echo $Request['OperatorCode'];?>">View Plans</a>
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
<script>
    $(document).ready(function() {
        $('#basic-datatables').DataTable({});
    });
</script> 