<?php $data = $mysql->select("select * from `_tbl_Members` where  `MemberCode`='".$_GET['MCode']."'");
$package=$mysql->select("SELECT * FROM `_tbl_Settings_Packages` where PackageID='".$data[0]['CurrentPackageID']."'"); 
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/AllMembers">Member</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/AllMembers">Member Information</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/AllMembers"><?php echo $_GET['MCode'];?></a></li>
        </ul>
    </div> 
    <div class="row">              
    
        <div class="col-md-12">
        
            <div class="card">
                <div class="card-header">
                    <div class="row"> 
                        <div class="col-md-8">
                            <div class="card-title">Member Information</div>
                            <span style="font-size:13px"><?php echo ($data[0]['IsActive']==1) ? '<span style="color:green">Active</span>' : '<span style="color:red">Blocked</span>';?></span>
                        </div>
                    </div>
                </div> 
                <div class="card-body">
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Member Code</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['MemberCode'];?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row" style="text-align: right;">
                                   <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Package</label> 
                                    <img src="assets/img/<?php echo $package[0]['FileName'];?>" style="height:48px;">
                                    <?php echo $package[0]['PackageName'];?>
                                </div>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Member Name</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['MemberName'];?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Joined</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['CreatedOn'];?></small>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Gender</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['Sex'];?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Date of Birth</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['DateofBirth'];?></small>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Mobile No</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['MobileNumber'];?></small>
                                    </div>
                                </div>
                            </div>  
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Email ID</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['MemberEmail'];?></small>
                                    </div>
                                </div>  
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
                            <?php $sold = $mysql->select("select sum(InvoiceAmount) as bal from _tbl_orders where MemberCode='".$data[0]['MemberCode']."'");?>
                            <span>Total Purchase&nbsp;:&nbsp;<?php echo "INR&nbsp;&nbsp;". number_format($sold[0]['bal'],2);?></span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                         <table class="table table-striped mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">Store Name</th>
                                    <th scope="col">Invoice Number</th>
                                    <th scope="col" style="text-align: right;">Invoice Amount</th>
                                    <th scope="col">Invoice Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $Orders = $mysql->select("SELECT * FROM _tbl_orders where MemberCode='".$data[0]['MemberCode']."' order by OrderID Desc");?>
                            <?php foreach ($Orders as $Order){ ?>
                            <?php $Store = $mysql->select("select * from _tbl_business_supporting_center where SupportingCenterAdminID='".$Order['StoreID']."'");?>
                                <tr>
                                    <td><?php echo $Store[0]['SupportingCenterName'];?></td>
                                    <td><?php echo $Order['InvoiceNumber'];?></td>
                                    <td style="text-align:right"><?php echo number_format($Order['InvoiceAmount'],2);?></td>
                                    <td><?php echo date("d M,Y", strtotime($Order['InvoiceDate']));?></td>
                                    <td  style="text-align: right;">
                                        <div class="dropdown dropdown-kanban" style="float: right;">
                                        <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                            <i class="icon-options-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="dashboard.php?action=Members/vieworder&id=<?php echo $Order['OrderID'];?>" draggable="false">View</a>
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
 


