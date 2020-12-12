<?php 
if (isset($_GET['filter']) && $_GET['filter']=="all") {
 $Requests  = $mysql->select("SELECT * FROM _tbl_shopping_subcategories" );
 $title="All Sub Categories";
} elseif (isset($_GET['filter']) && $_GET['filter']=="active") {
 $Requests  = $mysql->select("SELECT * FROM _tbl_shopping_subcategories where IsActive='1'" );
 $title="Active Sub Categories";
} elseif (isset($_GET['filter']) && $_GET['filter']=="deactive") {
 $Requests  = $mysql->select("SELECT * FROM _tbl_shopping_subcategories where IsActive='0'" );
 $title="Deactive Sub Categories";
} else {
 $Requests  = $mysql->select("SELECT * FROM _tbl_shopping_subcategories" );
 $title="All Sub Categories";
}
  ?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Products/ManageCategories">Products</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Products/ManageSubCategories">Manage Sub Categories</a></li>
        </ul>
    </div>
    <div class="row" style="margin-bottom:10px;">
        <div class="col-md-12" style="text-align: right;">
            <a href="dashboard.php?action=Products/SubCategory/Add" style="color:orange" ><small>Add Sub Category</small></a>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="dashboard.php?action=Products/ManageSubCategories&filter=active" ><small>Active</small></a>&nbsp;|&nbsp;
            <a href="dashboard.php?action=Products/ManageSubCategories&filter=deactive"><small>Deactive</small></a>&nbsp;|&nbsp;
            <a href="dashboard.php?action=Products/ManageSubCategories&filter=all"><small>All</small></a> 
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xlg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="card-title">Manage Sub Categories</h4>
                        <span><?php echo $title;?></span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th><b>Code</b></th>
                                        <th><b>Sub Category Name</b></th>
                                        <th><b>Category Name</b></th>
                                        <th><b>Status</b></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($Requests as $Request){ ?>
                                    <tr>
                                        <td><?php echo $Request['SubCategoryCode'];?></td>
                                        <td><?php echo $Request['SubCategoryName'];?></td>
                                        <td><?php echo $Request['CategoryName'];?></td>
                                        <td><?php echo $Request['IsActive']==1 ? "Active" : "Deactive";?></td>
                                        <td><a href="dashboard.php?action=Products/SubCategory/Edit&code=<?php echo $Request['SubCategoryCode'];?>">Edit</a></td>
                                    </tr>
                                    <?php }?>  
                                    <?php if(sizeof($Requests)=="0"){?>
                                    <tr>
                                        <td colspan="5" style="text-align: center;">No Datas Found</td>
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