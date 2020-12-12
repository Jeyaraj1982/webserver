<?php 
if (isset($_GET['filter']) && $_GET['filter']=="all") {
 $Requests  = $mysql->select("SELECT * FROM _tbl_business_supporting_center" );
 $title="All";
} elseif (isset($_GET['filter']) && $_GET['filter']=="active") {
 $Requests  = $mysql->select("SELECT * FROM _tbl_business_supporting_center where IsActive='1'" );
 $title="Active";
} elseif (isset($_GET['filter']) && $_GET['filter']=="deactive") {
 $Requests  = $mysql->select("SELECT * FROM _tbl_business_supporting_center where IsActive='0'" );
 $title="Deactive";
} else {
 $Requests  = $mysql->select("SELECT * FROM _tbl_business_supporting_center" );
 $title="All";
}
  ?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=SupportingCenter/ManageBusinessSupporting">Business Supporting Center</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=SupportingCenter/ManageBusinessSupporting">Manage Business Supporting Center</a></li>
        </ul>
    </div>
    <div class="row" style="margin-bottom:10px;">
        <div class="col-md-12" style="text-align: right;">
            <a href="dashboard.php?action=SupportingCenter/NewSupportingCenter" style="color:orange" ><small>New</small></a>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="dashboard.php?action=SupportingCenter/ManageBusinessSupporting&filter=active" ><small>Active</small></a>&nbsp;|&nbsp;
            <a href="dashboard.php?action=SupportingCenter/ManageBusinessSupporting&filter=deactive"><small>Deactive</small></a>&nbsp;|&nbsp;
            <a href="dashboard.php?action=SupportingCenter/ManageBusinessSupporting&filter=all"><small>All</small></a> 
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xlg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Manage Business Supporting Center</h4>
                    <span><?php echo $title;?></span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th><b>Businsess Supporting Center</b></th>
                                    <th><b>State Name</b></th>
                                    <th><b>District Name</b></th>
                                    <th style="text-align: right;"><b>Products</b></th>
                                    <?php if (isset($_GET['filter']) && $_GET['filter']=="all") { ?>
                                    <th style="text-align: right;"><b>Orders</b></th>
                                    <th><b>Status</b></th>
                                    <?php } ?>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($Requests as $Request){ ?>
                                <tr>
                                    <td><?php echo $Request['SupportingCenterName'];?><br><span style="color:#9f9f9f"><?php echo $Request['StoreTypeName'];?></span></td>
                                    <td><?php echo $Request['State'];?></td>
                                    <td><?php echo $Request['District'];?></td>
                                    <td style="text-align: right;"><?php echo sizeof($mysql->select("select * from _tbl_products where StoreID='".$Request['SupportingCenterAdminID']."'"));?></td>
                                    <td style="text-align: right;"><?php echo sizeof($mysql->select("select * from _tbl_orders where StoreID='".$Request['SupportingCenterAdminID']."'"));?></td>
                                    <?php if (isset($_GET['filter']) && $_GET['filter']=="all") { ?>
                                    <td><?php echo $Request['IsActive']==1 ? "Active" : "Deactive";?></td>
                                    <?php }?> 
                                    <td style="text-align: right;">
                                        <div class="dropdown dropdown-kanban" style="float: right;">
                                        <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                            <i class="icon-options-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="dashboard.php?action=SupportingCenter/EditSupportingCenter&code=<?php echo $Request['SupportingCenterAdminID'];?>" draggable="false">Edit</a>
                                            <a class="dropdown-item" href="dashboard.php?action=SupportingCenter/ViewSupportingCenter&code=<?php echo $Request['SupportingCenterAdminID'];?>" draggable="false">View</a>
                                            <a class="dropdown-item" href="dashboard.php?action=SupportingCenter/ManageProducts&filter=All&id=<?php echo $Request['SupportingCenterAdminID'];?>" draggable="false">View Products</a>
                                            <a class="dropdown-item" href="dashboard.php?action=SupportingCenter/ManageOrders&filter=All&id=<?php echo $Request['SupportingCenterAdminID'];?>" draggable="false">View Orders</a>
                                            <a class="dropdown-item" href="dashboard.php?action=SupportingCenter/ViewRatings&id=<?php echo $Request['SupportingCenterAdminID'];?>" draggable="false">View Ratings</a>
                                            <a class="dropdown-item" href="dashboard.php?action=SupportingCenter/SearchedMemberLog&id=<?php echo $Request['SupportingCenterAdminID'];?>" draggable="false">Searched Member Log</a>
                                            <a class="dropdown-item" href="dashboard.php?action=SupportingCenter/LoginLog&id=<?php echo $Request['SupportingCenterAdminID'];?>" draggable="false">Login Log</a>
                                        </div>
                                    </div>     
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
<script>
    $(document).ready(function() {
        $('#basic-datatables').DataTable({});
    });
</script> 