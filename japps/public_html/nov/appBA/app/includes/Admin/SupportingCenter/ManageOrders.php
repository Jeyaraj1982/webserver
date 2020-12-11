<?php $data= $mysql->select("select * from _tbl_business_supporting_center where SupportingCenterAdminID='".$_GET['id']."'");?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=SupportingCenter/ManageBusinessSupporting">Supporting Center</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=SupportingCenter/ManageBusinessSupporting">Products</a></li>
        </ul>
    </div> 
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Supporting Center Information</div>
                </div>
                <div class="card-body">
                    <div class="form-group form-show-validation row" style="padding:0px">
                        <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Store Name</label>
                        <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['SupportingCenterName'];?></div>
                    </div>
                    <div class="form-group form-show-validation row" style="padding:0px">
                        <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">State Name</label>
                        <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['State'];?></div>
                    </div>
                    <div class="form-group form-show-validation row" style="padding:0px">
                        <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">District Name</label>
                        <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['District'];?></div>
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
                            <a href="dashboard.php?action=SupportingCenter/ManageBusinessSupporting&filter=all" class="btn btn-warning btn-border">Back</a>
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
                                Manage Orders
                            </div>
                            <?php $sold = $mysql->select("select sum(InvoiceAmount) as bal from _tbl_orders where StoreID='".$_GET['id']."'");?>
                            <span>Total Sold&nbsp;:&nbsp;<?php echo "INR&nbsp;&nbsp;". number_format($sold[0]['bal'],2);?></span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                         <table class="table table-striped mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">Member ID</th>
                                    <th scope="col">Member Name</th>
                                    <th scope="col">Invoice Number</th>
                                    <th scope="col" style="text-align: right;">Invoice Amount</th>
                                    <th scope="col">Invoice Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $Orders = $mysql->select("SELECT * FROM _tbl_orders where StoreID='".$_GET['id']."' order by OrderID Desc");?>
                            <?php foreach ($Orders as $Order){ ?>
                                <tr>
                                    <td><?php echo $Order['MemberCode'];?></td>
                                    <td><?php echo $Order['MemberName'];?></td>
                                    <td><?php echo $Order['InvoiceNumber'];?></td>
                                    <td style="text-align:right"><?php echo number_format($Order['InvoiceAmount'],2);?></td>
                                    <td><?php echo date("d M,Y", strtotime($Order['InvoiceDate']));?></td>
                                    <td  style="text-align: right;">
                                        <div class="dropdown dropdown-kanban" style="float: right;">
                                        <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                            <i class="icon-options-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="dashboard.php?action=SupportingCenter/vieworder&id=<?php echo $Order['OrderID'];?>" draggable="false">View</a>
                                            <!--<a class="dropdown-item" draggable="false"><span onclick='CallConfirmation(<?php echo $Order['OrderID'];?>)' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></a>-->
                                        </div>
                                    </div>     
                                    </td>
                                </tr>
                            <?php } ?>
                            <?php if (sizeof($Orders)==0) { ?>
                            <tr>
                                <td colspan="6" style="text-align:center;">No Record Found</td>
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
 


