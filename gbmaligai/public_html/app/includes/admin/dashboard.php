 
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
                <!--<div class="col-sm-6 col-md-3">
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
                </div> -->
                
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
                                                   <th scope="col"> </th>
                                                <th scope="col">Product Code</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col"> </th>
                                                </tr>
                                            </thead>                                                                         
                                            <tbody>
                                            <?php
                                                $products = $mysql->select("SELECT * FROM _tbl_products WHERE IsActive='1'  order by ProductID Desc limit 0,5");
                                               ?>                                                                                                   
                                                <?php foreach($products as $product){ 
                                                     $img = $mysql->select("select * from _tbl_products_images where ProductID='".$product['ProductID']."' and ImageOrder=1 and IsDelete='0'");
                                                    ?> 
                                                <tr>
                                                 <td>
                                                    <?php if (sizeof($img)>0) {?>
                                                      <img src="../uploads/products/<?php echo $product['ProductID'];?>/<?php echo $img[0]['ImageName'];?>" style="height:75px;text-align:center;margin:5px">  
                                                    <?php } else { ?>
                                                    <img src="../assets/noimages.png" style="height:75px;text-align:center;margin:5px">
                                                    <?php } ?>
                                                </td>
                                                <td><?php echo $product['ProductCode'];?></td>
                                                    <td><?php echo $product['ProductName'];?></td>
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
                                                <?php } ?>
                                                <?php if(sizeof($products)=="0"){ ?>
                                                    <tr>
                                                        <td style="text-align: center;" colspan="4">No Products found</td>
                                                    </tr>
                                                <?php } else {?>
                                                     <tr>
                                                        <td colspan="4" style=""><a href="dashboard.php?action=Products/list&status=All">List all products</a></td>
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
 