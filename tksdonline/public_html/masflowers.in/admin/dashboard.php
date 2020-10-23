<?php
include_once("header.php");
include_once("LeftMenu.php"); 
if (isset($_GET['action'])) {
         include_once($_GET['action'].".php");
     } else { ?>
<br><br><br>
<div class="main-panel full-height">
    <div class="container">
        <div class="panel-header">
            <div class="page-inner border-bottom pb-0 mb-3 row">
                <div class="col-sm-6" style="text-align: left;">
                    <h2 class="pb-2 fw-bold">Dashboard</h2>
                    </div>
                    <div class="col-sm-6" >
                        <a href="dashboard.php?action=Invoice/create" class="btn btn-secondary btn-round" style="float: right;">Create Invoice</a>
                    </div>
            </div>
        </div>
        <div class="page-inner">
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round" onclick="location.href='dashboard.php?action=Customers/list&status=All'" style="cursor: pointer;">
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
                                        <h3 class="card-title"><?php echo sizeof($mysql->select("select * from _tbl_sales_customers"));?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round" onclick="location.href='dashboard.php?action=Invoice/list'" style="cursor: pointer;">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-analytics text-warning"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Invoice Amount</p>
                                        <h3 class="card-title"><?php $res= $mysql->select("select (sum(order_total_after_tax)) as bal from invoice_order"); echo "RS. ". number_format($res[0]['bal'],2); ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round" onclick="location.href='dashboard.php?action=Invoice/receipts'" style="cursor: pointer;">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-analytics text-warning"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Receipt Amount</p>
                                        <h3 class="card-title"><?php $res= $mysql->select("select (sum(receipt_amount)) as bal from receipt"); echo "RS. ". number_format($res[0]['bal'],2); ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round" style="cursor: pointer;">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-analytics text-warning"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Payable Amount</p>
                                        <h3 class="card-title"><?php $res= $mysql->select("select (sum(order_total_amount_due)) as bal from invoice_order"); echo "RS. ". number_format($res[0]['bal'],2); ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round" onclick="location.href='dashboard.php?action=Invoice/TodaySales&status=totalsales'" style="cursor: pointer;">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-analytics text-warning"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Today Sales</p>
                                        <h3 class="card-title"><?php $res= $mysql->select("select (sum(order_total_after_tax)) as bal from invoice_order where date(order_date)='".date("Y-m-d")."'"); echo "RS. ". number_format($res[0]['bal'],2); ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round" onclick="location.href='dashboard.php?action=Invoice/TodaySales&status=totalcash'" style="cursor: pointer;">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-analytics text-warning"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Today Cash</p>
                                        <h3 class="card-title"><?php $res= $mysql->select("select (sum(TotalCashReceived)) as bal from invoice_order where date(order_date)='".date("Y-m-d")."'"); echo "RS. ". number_format($res[0]['bal'],2); ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round" onclick="location.href='dashboard.php?action=Invoice/TodaySales&status=totalbank'" style="cursor: pointer;">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-analytics text-warning"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Today Bank</p>
                                        <h3 class="card-title"><?php $res= $mysql->select("select (sum(order_amount_paid)) as bal from invoice_order where TransactionMode='Net Banking' and date(order_date)='".date("Y-m-d")."'"); echo "RS. ". number_format($res[0]['bal'],2); ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round" style="cursor: pointer;"  onclick="location.href='dashboard.php?action=Invoice/TodaySales&status=totalpayable'">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-analytics text-warning"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Today Payable Amount</p>
                                        <h3 class="card-title"><?php $res= $mysql->select("select (sum(order_total_amount_due)) as bal from invoice_order where date(order_date)='".date("Y-m-d")."'"); echo "RS. ". number_format($res[0]['bal'],2); ?></h3>
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
                                    <a class="nav-link active show" id="pills-home-tab-nobd" data-toggle="pill" href="#pills-members" role="tab" aria-controls="pills-members" aria-selected="true">Most Selling Product</a>
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
                                                    <th>Unit od Measeurment</th> 
                                                    <th>Price (Rs)</th> 
                                                    <th></th>
                                                </tr>
                                            </thead>                                                                         
                                            <tbody>
                                            <?php
                                                $products = $mysql->select("SELECT * FROM _tbl_sales_products WHERE ProductID IN (SELECT order_id FROM invoice_order_item)  order by ProductID Desc");
                                               ?>                                                                                                   
                                                <?php foreach($products as $product){ ?>                                                           
                                                <tr>
                                                    <td><?php echo $product['ProductNameTamil'];?><br><?php echo $product['ProductName'];?></td>
                                                    <td><?php echo $product['ProductUnitName'];?></td>                                               
                                                    <td style="text-align:right"><?php echo number_format($product['ProductPrice'],2);?></td>
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
<?php } ?>
<?php include_once("footer.php");?>