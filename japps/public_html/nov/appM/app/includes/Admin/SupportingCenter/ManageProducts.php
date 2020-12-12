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
                                Manage Products
                            </div>
                        </div>
                        <div class="col-md-6" style="text-align: right;">
                            <a href="dashboard.php?action=SupportingCenter/ManageProducts&id=<?php echo $_GET['id'];?>&filter=All" <?php if($_GET['filter']=="All"){ ?> style="text-decoration: underline;font-weight:bold" <?php } ?>>All</a>&nbsp;&nbsp;|&nbsp;&nbsp;    
                            <a href="dashboard.php?action=SupportingCenter/ManageProducts&id=<?php echo $_GET['id'];?>&filter=Active" <?php if($_GET['filter']=="Active"){ ?> style="text-decoration: underline;font-weight:bold" <?php } ?>>Active</a>&nbsp;&nbsp;|&nbsp;&nbsp;    
                            <a href="dashboard.php?action=SupportingCenter/ManageProducts&id=<?php echo $_GET['id'];?>&filter=Deactive" <?php if($_GET['filter']=="Deactive"){ ?> style="text-decoration: underline;font-weight:bold" <?php } ?>>Deactive</a>&nbsp;&nbsp;|&nbsp;&nbsp;    
                            <a href="dashboard.php?action=SupportingCenter/ManageProducts&id=<?php echo $_GET['id'];?>&filter=Blocked" <?php if($_GET['filter']=="Blocked"){ ?> style="text-decoration: underline;font-weight:bold" <?php } ?>>Blocked By Admin</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                         <table class="table table-striped mt-3">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col" style="padding-left:0px !important">Name</th>
                                    <th scope="col" style="text-align: right;padding-right:0px !important">Price</th>
                                    <th scope="col" style="text-align: right;padding-right:0px !important">Offer Price</th>
                                    <th scope="col" style="text-align: center;">Created On</th> 
                                    <?php if($_GET['filter']=="All"){ ?><th scope="col" style="padding-right:0px !important">Status</th><?php } ?>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                if($_GET['filter']=="All"){
                                   $Products = $mysql->select("SELECT * FROM _tbl_products where StoreID='".$_GET['id']."' order by ProductID Desc");
                                }if($_GET['filter']=="Active"){ 
                                     $Products = $mysql->select("SELECT * FROM _tbl_products where IsBlock='0' and IsActive='1' and StoreID='".$_GET['id']."'  order by ProductID Desc");  
                                }if($_GET['filter']=="Deactive"){ 
                                     $Products = $mysql->select("SELECT * FROM _tbl_products where IsBlock='0' and IsActive='0' and StoreID='".$_GET['id']."'  order by ProductID Desc");  
                                }if($_GET['filter']=="Blocked"){ 
                                     $Products = $mysql->select("SELECT * FROM _tbl_products where IsBlock='1' and StoreID='".$_GET['id']."'  order by ProductID Desc");  
                                } 
                                
                                 ?>
                            <?php foreach ($Products as $Product){ ?>
                                <tr>
                                    <td style="padding-right:0px !important;padding-left:0px !important"><img src="<?php echo "assets/products/".$Product['ProductImage'];?>" style='width: 50px;height:50px;margin-top: 5px;'></td>
                                    <td style="padding-right:0px !important;padding-left:0px !important"><?php echo $Product['ProductName'];?></td>
                                    <td style="padding-right:0px !important;text-align:right"><?php echo number_format($Product['ProductPrice'],2);?></td>
                                    <td style="padding-right:0px !important;text-align:right"><?php echo number_format($Product['OfferPrice'],2);?></td>
                                    <td style="padding-right:0px !important;padding-left:0px !important;text-align:center"><?php echo date("M-d-Y H:i",strtotime($Product['AddedOn']));?></td>
                                    <?php if($_GET['filter']=="All"){ ?><td><?php if($Product['IsBlock']=="0"){ echo ($Product['IsActive']==1) ? 'Active' : 'Deactive'; } else { echo "Blocked";}?></td><?php } ?>
                                    <td  style="padding-right:10px !important;padding-left:0px !important;text-align: right;">
                                        <div class="dropdown dropdown-kanban" style="float: right;">
                                        <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                            <i class="icon-options-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="dashboard.php?action=SupportingCenter/editproduct&id=<?php echo $Product['ProductID'];?>" draggable="false">Edit</a>
                                            <a class="dropdown-item" href="dashboard.php?action=SupportingCenter/viewproduct&id=<?php echo $Product['ProductID'];?>" draggable="false">View</a>
                                            <!--<a class="dropdown-item" draggable="false"><span onclick='CallConfirmation(<?php echo $Product['ProductID'];?>)' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></a>-->
                                        </div>
                                    </div>     
                                    </td>
                                </tr>
                            <?php } ?>
                            <?php if (sizeof($Products)==0) { ?>
                            <tr>    
                                <?php if($_GET['filter']=="All"){ ?>
                                    <td colspan="7" style="text-align:center;">No Record Found</td>
                                <?php } else { ?>
                                    <td colspan="6" style="text-align:center;">No Record Found</td>
                                <?php } ?>
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
 


