<?php
     $products  = $mysql->select("SELECT * FROM _tbl_shopping_products where  IsActive='1'" );
?>
<?php if (sizeof($products)==0) {?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Shopping/ManageOrders">Shopping</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Shopping/ManageOrders">Products</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List of Products</h4>
                </div>
                <div class="card-body">
                    <div class="card-body">
                         No Products found at this time.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } else { ?>
<div class="page-inner">
                    <div class="row row-projects">
                    <?php
                       
    
                 foreach($products as $sc) {
                    ?>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card">
                                <div class="p-2">
                                    <img class="card-img-top rounded" src="assets/products/<?php echo $sc['ProductImage'];?>" alt="Product 1">
                                </div>
                                <div class="card-body pt-2">
                                    <h4 class="mb-1 fw-bold"><?php echo $sc['ProductName'];?></h4>
                                    <p class="text-muted small mb-2">BV: <?php echo $sc['ProductBV'];?></p>
                                    <div class="kanban-item" style="padding:0px;" draggable="false">
                                    <div class="kanban-badges" style="width: 100%;">
                                        <div class="kanban-badge bg-success" style="width: 100%;">
                                            <span class="badge-text" style="font-size:15px;">&#8377;<?php echo number_format($sc['ProductPrice'],2);?></span> (<span style="font-weight:normal;font-size:12px;"><strike>MRP: &#8377;<?php echo number_format($sc['ProductMRP'],2);?></strike></span>
                                        </div>
                                    </div>
                                </div>
                                    
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>    
<?php } ?>