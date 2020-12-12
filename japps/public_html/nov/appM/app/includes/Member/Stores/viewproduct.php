<?php $products = $mysql->select("select * from `_tbl_products` where ProductID='".$_GET['id']."'");?>
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
        <div data-id="_todo" class="kanban-board" style="width:100%">
            <header class="kanban-board-header">
                <div class="kanban-title-board"><?php echo $products[0]['ProductName'];?></div>
            </header>
            <main class="kanban-drag">
                <div class="kanban-item">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="kanban-image">
                                <img src="assets/products/<?php echo $products[0]['ProductImage'];?>" class="img-fluid">
                            </div>  
                            <div class="kanban-badges">
                                <div class="kanban-badge">
                                    <span class="badge-text" style="margin-left:0px;font-size:15px">Regular Price&nbsp;:&nbsp;<i class="fas fa-rupee-sign" ></i>&nbsp;<span style="font-size:18px;font-weight:bold"><?php echo $products[0]['ProductPrice'];?></span></span>
                                </div>    
                            </div>
                            <div class="kanban-badges">
                                <div class="kanban-badge">
                                    <span class="badge-text" style="margin-left:0px;font-size:15px">Wintogether Price&nbsp;:&nbsp;<i class="fas fa-rupee-sign"></i>&nbsp;<span style="font-size:18px;font-weight:bold"><?php echo $products[0]['OfferPrice'];?></span></span>
                                </div>   
                            </div>  
                        </div>                                                                          
                        <div class="col-md-8">
                            <a href="#" class="kanban-title" draggable="false" style="font-size:20px">Description&nbsp;:</a>
                            <div class="kanban-badges" style="margin-top:0px">
                                <div class="kanban-badge">
                                    <span class="badge-text" style="margin-left:0px"><?php echo $products[0]['ProductShortDesc'];?></span>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>

									
