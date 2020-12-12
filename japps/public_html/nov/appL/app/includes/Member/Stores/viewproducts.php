<?php $products = $mysql->select("select * from `_tbl_products` where StoreID='".$_GET['id']."' and IsBlock='0' and IsActive='1'");?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Stores/BrowseStores">Stores</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Stores/BrowseStores">Browse Stores</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Stores/BrowseStores">View Products</a></li>
        </ul>
    </div>
    <div id="myKanban" >
    <?php foreach($products as $product) { ?>
        <div data-id="_todo" class="kanban-board">
            <header class="kanban-board-header">
                <div class="kanban-title-board"><?php echo $product['ProductName'];?></div>
            </header>
            <main class="kanban-drag">
                <div class="kanban-item">
                    <div class="kanban-image">
                        <img src="assets/products/<?php echo $product['ProductImage'];?>" class="img-fluid">
                    </div>
                    <div class="kanban-badges">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="kanban-badge">
                                    <span class="badge-text" style="margin-left:0px">Regular<br>Price&nbsp;:&nbsp;<i class="fas fa-rupee-sign"></i>&nbsp;<?php echo $product['ProductPrice'];?></span>
                                </div>    
                            </div>
                            <div class="col-md-6" style="text-align: right;">
                                <div class="kanban-badge">
                                    <span class="badge-text" style="margin-left:0px">Wintogether Price&nbsp;:&nbsp;<i class="fas fa-rupee-sign"></i>&nbsp;<?php echo $product['OfferPrice'];?></span>
                                </div>   
                            </div>
                        </div>
                           <br>
                        <div class="kanban-badge" style="text-align: center;width:100%">
                            <a href="dashboard.php?action=Stores/viewproduct&id=<?php echo $product['ProductID'];?>" class="btn btn-primary btn-xs">View Details</a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
      <?php } ?>
    </div>
</div>

									
