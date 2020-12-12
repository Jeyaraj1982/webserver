 <?php $storetypes = $mysql->select("SELECT * FROM _tbl_master_statenames WHERE StateID IN (SELECT StateID FROM _tbl_business_supporting_center WHERE IsActive='1' AND StoreTypeID='".$_GET['SID']."' GROUP BY StateID )");?>
 <?php $selectedStore = $mysql->select("SELECT * FROM _tbl_store_types WHERE StoreTypeID='".$_GET['SID']."'");?>
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
                    <span style="color: #757373;"><?php echo $selectedStore[0]['StoreTypeName'];?></span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3" style="margin-left:10px"><label>Select State</label></div>
                    </div>
                    <div class="row">
                    <?php foreach($storetypes as $s) { ?>
                    <?php $StoreCount = $mysql->select("SELECT * FROM _tbl_business_supporting_center WHERE StoreTypeID='".$_GET['SID']."' and StateID='".$s['StateID']."'");?>
                        <div class="col-md-3">
                            <div onclick="location.href='dashboard.php?action=Stores/BrowseStoresDistrict&SID=<?php echo $_GET['SID'];?>&StateID=<?php echo $s['StateID'];?>'" style="color:#666;margin:10px;padding:10px;background:#f1f1f1;border:1px dashed #ccc;border-radius:10px;text-align:center;cursor:pointer"><?php echo $s['StateName'];?>&nbsp;&nbsp;(<?php echo sizeof($StoreCount);?>)</div>     
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
