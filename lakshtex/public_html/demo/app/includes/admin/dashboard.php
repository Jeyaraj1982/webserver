<?php
/*include_once("header.php");
include_once("LeftMenu.php"); 
if (isset($_GET['action'])) {
         include_once($_GET['action'].".php");
     } else { */?>
<br><br><br>
<div class="main-panel full-height">
    <div class="container">
        <div class="panel-header">
            <div class="page-inner border-bottom pb-0 mb-3">
                <div class="d-flex align-items-left flex-column">
                    <h2 class="pb-2 fw-bold">Dashboard</h2>
                    <div class="nav-scroller d-flex">
                        <div class="nav nav-line nav-color-info d-flex align-items-center justify-contents-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner">
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round" onclick="location.href='dashboard.php?action=Customer/list&status=All'" style="cursor: pointer;">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-user text-warning"></i>
                                    </div>
                                </div> 
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Customers</p>
                                        <h3 class="card-title"><?php echo sizeof($mysql->select("select * from _tbl_customer where IsActive='1'")); ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round" onclick="location.href='dashboard.php?action=Order/list&status=new'" style="cursor: pointer;">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-analytics text-warning"></i>
                                    </div>
                                </div> 
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">New Orders</p>
                                        <h3 class="card-title"><?php echo sizeof($mysql->select("select * from invoice_order where OrderStatus='1'")); ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round" onclick="location.href='dashboard.php?action=Order/list&status=confirm'" style="cursor: pointer;">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-analytics text-warning"></i>
                                    </div>
                                </div> 
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Confirm Orders</p>
                                        <h3 class="card-title"><?php echo sizeof($mysql->select("select * from invoice_order where OrderStatus='2'")); ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round" onclick="location.href='dashboard.php?action=Order/list&status=cancel'" style="cursor: pointer;">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-analytics text-warning"></i>
                                    </div>
                                </div> 
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Cancel Orders</p>
                                        <h3 class="card-title"><?php echo sizeof($mysql->select("select * from invoice_order where OrderStatus='3'")); ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round" onclick="location.href='dashboard.php?action=Order/list&status=processing'" style="cursor: pointer;">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-analytics text-warning"></i>
                                    </div>
                                </div> 
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Processing Orders</p>
                                        <h3 class="card-title"><?php echo sizeof($mysql->select("select * from invoice_order where OrderStatus='4'")); ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round" onclick="location.href='dashboard.php?action=Order/list&status=dispatched'" style="cursor: pointer;">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-analytics text-warning"></i>
                                    </div>
                                </div> 
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Dispatched Orders</p>
                                        <h3 class="card-title"><?php echo sizeof($mysql->select("select * from invoice_order where OrderStatus='5'")); ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round" onclick="location.href='dashboard.php?action=Order/list&status=delivered'" style="cursor: pointer;">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-analytics text-warning"></i>
                                    </div>
                                </div> 
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Delivered Orders</p>
                                        <h3 class="card-title"><?php echo sizeof($mysql->select("select * from invoice_order where OrderStatus='6'")); ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-round" onclick="location.href='dashboard.php?action=Order/list&status=paid'" style="cursor: pointer;">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="icon-big text-center">
                                            <i class="flaticon-analytics text-warning"></i>
                                        </div>
                                    </div> 
                                    <div class="col-7 col-stats">
                                        <div class="numbers">
                                            <p class="card-category">Paid Orders</p>
                                            <h3 class="card-title"><?php echo sizeof($mysql->select("select * from invoice_order where OrderStatus='6' and IsPaid='1'")); ?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="card card-stats card-round" onclick="location.href='dashboard.php?action=Order/list&status=undelivered'" style="cursor: pointer;">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-analytics text-warning"></i>
                                    </div>
                                </div> 
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Delivered Failed Order</p>
                                        <h3 class="card-title"><?php echo sizeof($mysql->select("select * from invoice_order where OrderStatus='7'")); ?></h3>
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
                        <div class="card-header">
                            <ul class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab-without-border" role="tablist">
                                <li class="nav-item submenu">
                                    <a class="nav-link active show" id="pills-home-tab-nobd" data-toggle="pill" href="#pills-members" role="tab" aria-controls="pills-members" aria-selected="true">Recent Orders</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">
                                <div class="tab-pane fade active show" id="pills-members" role="tabpanel" aria-labelledby="pills-home-tab-nobd">
                                    <div class="table-responsive">
                                        <table id="myTable" class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>Order No.</th>
                                                <th>Create Date</th>
                                                <th>Customer Name</th>
                                                <th style="text-align:right">Order Total ( <i class="fas fa-rupee-sign"></i> )</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <?php 
                                        $invoiceList = $mysql->select("SELECT * FROM invoice_order where OrderStatus='1' order by order_id desc limit 0,5");
                                        foreach($invoiceList as $invoiceDetails){
                                        $invoiceDate = date("d/M/Y, H:i:s", strtotime($invoiceDetails["OrderDate"]));
                                         ?>
                                            <tr>
                                                <td><?php echo $invoiceDetails["OrderCode"];?></td>
                                                <td><?php echo $invoiceDate;?></td>
                                                <td><?php echo $invoiceDetails["CustomerName"];?></td>
                                                <td style="text-align:right"><?php echo $invoiceDetails["OrderTotal"];?></td>
                                                <td style="text-align: right">                                                   
                                                    <div class="dropdown dropdown-kanban" style="float: right;">
                                                        <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                            <i class="icon-options-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="dashboard.php?action=Order/view&id=<?php echo $invoiceDetails["OrderCode"];?>" draggable="false">View</a>
                                                        </div>
                                                    </div>
                                                </td>                                                                                                                                                                           
                                            </tr>
                                        <?php } ?>
                                        <?php if(sizeof($invoiceList)=="0"){ ?>
                                            <tr>
                                                <td colspan="5" style="text-align: center;">No Orders Found</td>
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
           <div class="row">
                 <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab-without-border" role="tablist">
                                <li class="nav-item submenu">
                                    <a class="nav-link active show" id="pills-home-tab-nobd" data-toggle="pill" href="#pills-members" role="tab" aria-controls="pills-members" aria-selected="true">Recent Product</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">
                                <div class="tab-pane fade active show" id="pills-members" role="tabpanel" aria-labelledby="pills-home-tab-nobd">
                                    <div class="table-responsive">
                                        <table id="myTable" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Product Name</th>                                                                                           
                                                    <th>MRP (Rs)</th> 
                                                    <th>Selling Price (Rs)</th> 
                                                    <th></th>
                                                </tr>
                                            </thead>                                                                         
                                            <tbody>
                                            <?php
                                                $products = $mysql->select("SELECT * FROM _tbl_products WHERE IsActive='1'  order by ProductID Desc");
                                               ?>                                                                                                   
                                                <?php foreach($products as $product){ ?>                                                           
                                                <tr>
                                                    <td><?php echo $product['ProductName'];?></td>
                                                    <td style="text-align:right"><?php echo number_format($product['ProductPrice'],2);?></td>
                                                    <td style="text-align:right"><?php echo number_format($product['SellingPrice'],2);?></td>
                                                    <td style="text-align: right">                                                   
                                                        <div class="dropdown dropdown-kanban" style="float: right;">
                                                            <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                                <i class="icon-options-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="dashboard.php?action=Products/edit&id=<?php echo md5($product['ProductID']);?>" draggable="false">Edit</a>
                                                                <a class="dropdown-item" href="dashboard.php?action=Products/view&id=<?php echo md5($product['ProductID']);?>" draggable="false">View</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php } if(sizeof($products)=="0"){ ?>
                                                    <tr>
                                                        <td style="text-align: center;" colspan="4">No Products found</td>
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
    </div>
</div>
<?php //} ?>
<?php //include_once("footer.php");?>