<?php 
if (isset($_GET['filter']) && $_GET['filter']=="all") {
 $Requests  = $mysql->select("SELECT * FROM _tbl_stock_admin" );
 $title="All Stock-Points";
} elseif (isset($_GET['filter']) && $_GET['filter']=="active") {
 $Requests  = $mysql->select("SELECT * FROM _tbl_stock_admin where IsActive='1'" );
 $title="Active  Stock-Points";
} elseif (isset($_GET['filter']) && $_GET['filter']=="deactive") {
 $Requests  = $mysql->select("SELECT * FROM _tbl_stock_admin where IsActive='0'" );
 $title="Deactive  Stock-Points";
} else {
 $Requests  = $mysql->select("SELECT * FROM _tbl_stock_admin" );
 $title="All  Stock-Points";
}
  ?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Stockiest/ManageStockPoints">Stockiest</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Stockiest/ManageStockPoints">Manage Stockiests</a></li>
        </ul>
    </div>
    <div class="row" style="margin-bottom:10px;">
        <div class="col-md-12" style="text-align: right;">
            <a href="dashboard.php?action=Stockiest/NewStockPoint" style="color:orange" ><small>New Stock Point</small></a>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="dashboard.php?action=Stockiest/ManageStockPoints&filter=active" ><small>Active</small></a>&nbsp;|&nbsp;
            <a href="dashboard.php?action=Stockiest/ManageStockPoints&filter=deactive"><small>Deactive</small></a>&nbsp;|&nbsp;
            <a href="dashboard.php?action=Stockiest/ManageStockPoints&filter=all"><small>All</small></a> 
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xlg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="card-title">Manage Stock-Points</h4>
                        <span><?php echo $title;?></span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th><b>Stock Point</b></th>
                                        <th><b>Mobile Number</b></th>
                                        <th><b>District Name</b></th>
                                        <th><b>City Name</b></th>
                                        <th><b>Status</b></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($Requests as $Request){ ?>
                                    <tr>
                                        <td><?php echo $Request['StockAdminName'];?><br>
                                            <a href="dashboard.php?action=Stockiest/EditStockPoint&code=<?php echo $Request['StockAdminID'];?>">Edit</a>&nbsp;|&nbsp;
                                            <a href="dashboard.php?action=Stockiest/ViewStockPoint&code=<?php echo $Request['StockAdminID'];?>">View</a>
                                        </td>
                                        <td><?php echo $Request['MobileNumber'];?></td>
                                        <td><?php echo $Request['StockPointDistrict'];?></td>
                                        <td><?php echo $Request['StockPointCityName'];?></td>
                                        <td><?php echo $Request['IsActive']==1 ? "Active" : "Deactive";?></td>
                                        <td>
                                          <a href="dashboard.php?action=Stockiest/StockSummary&code=<?php echo $Request['StockAdminID'];?>">Stock Summary</a>
                                              
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