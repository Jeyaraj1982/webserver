
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-title">
                                        Manage Customers
                                    </div>
                                </div>
                                <div class="col-md-6" style="text-align: right;">
                                    <a href="dashboard.php?action=Customer/list&status=All" <?php if($_GET['status']=="All"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>All</a>&nbsp;|&nbsp;
                                    <a href="dashboard.php?action=Customer/list&status=Active" <?php if($_GET['status']=="Active"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>Active</a>&nbsp;|&nbsp;
                                    <a href="dashboard.php?action=Customer/list&status=Disable" <?php if($_GET['status']=="Disable"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>Disable</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th>Customer Name</th>
                                                <th>Email ID</th>
                                                <th>Mobile Number</th>
                                                <th>Created On</th>
                                                <?php if($_GET['status']=="All"){ ?><th>Status</th><?php } ?>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                if($_GET['status']=="All"){
                                                    $Customers = $mysql->select("select * from _tbl_customer");
                                                }if($_GET['status']=="Active"){
                                                    $Customers = $mysql->select("select * from _tbl_customer where IsActive='1'");
                                                }if($_GET['status']=="Disable"){
                                                    $Customers = $mysql->select("select * from _tbl_customer where IsActive='0'");
                                                }
                                                foreach($Customers as $Customer){ 
                                            ?>
                                                <tr>
                                                    <td><?php echo $Customer['CustomerName'];?></td>
                                                    <td><?php echo $Customer['EmailID'];?></td>
                                                    <td><?php echo $Customer['MobileNumber'];?></td>
                                                    <td><?php echo date("d M Y, H:i", strtotime($Customer['CreatedOn']));?></td>
                                                    <?php if($_GET['status']=="All"){ ?><td><?php if($Customer['IsActive']=="1"){ echo "Active";} else { echo "Deactive"; };?></td><?php } ?>
                                                    <td style="text-align: right">                                                   
                                                    <div class="dropdown dropdown-kanban" style="float: right;">
                                                        <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                            <i class="icon-options-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="dashboard.php?action=Customer/view&id=<?php echo md5($Customer['CustomerID']);?>" draggable="false">View</a>
                                                            <a class="dropdown-item" href="dashboard.php?action=Customer/Orders&id=<?php echo md5($Customer['CustomerID']);?>&status=new" draggable="false">Orders</a>
                                                            <a class="dropdown-item" href="dashboard.php?action=Customer/Invoice&id=<?php echo md5($Customer['CustomerID']);?>" draggable="false">Invoice</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                </tr>
                                            <?php } if(sizeof($Customers)=="0"){ ?>
                                                <tr>
                                                    <?php if($_GET['status']=="All"){ ?><td colspan="6" style="text-align: center;">No Customers Found</td><?php }else{?><td colspan="5" style="text-align: center;">No Customers Found</td><?php } ?>
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
  