<style>
.StoreLink {color:#666;margin:10px;padding:10px;background:#f1f1f1;border:1px dashed #ccc;border-radius:10px;text-align:center;cursor:pointer}
.StoreLink:hover{background:#999;color:#f1f1f1}
</style>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Stores/BrowseStores">Stores</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Stores/BrowseStores">Browse Stores</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Browse Stores</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                    <?php $storetypes = $mysql->select("select * from _tbl_store_types order by StoreTypeName");?>
                    <?php foreach($storetypes as $s) { ?>
                    <?php $StoreCount = $mysql->select("SELECT * FROM _tbl_business_supporting_center WHERE StoreTypeID='".$s['StoreTypeID']."'");?>
                        <div class="col-md-4">
                            <img src="assets/stores/<?php echo $s['StoreTypeImage'];?>" style="height:160px;width:100%"><br>
                            <div onclick="location.href='dashboard.php?action=Stores/BrowseStoresState&SID=<?php echo $s['StoreTypeID'];?>'" class="StoreLink"><?php echo $s['StoreTypeName'];?>&nbsp;&nbsp;(<?php echo sizeof($StoreCount);?>)</div>     
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
