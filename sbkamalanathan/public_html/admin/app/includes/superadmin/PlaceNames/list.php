<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Place Name Master</h3>
            </div>
            <div class="col-6" style="text-align:right">
                <a href="dashboard.php?action=PlaceNames/add" class="btn btn-primary">New Place Name</a>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive" style="overflow: hidden;">
                        <table class="display" id="basic-8">
                            <thead>
                                <tr>
                                    <th>Place Name</th>
                                    <th>District Name</th>
                                    <th>State Name</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $PlaceNames = $mysql->select("select * from _tbl_master_placenames where (IsActive=1 or IsActive=0)");
                                    foreach($PlaceNames as $PlaceName) {
                                ?>
                                <tr>
                                    <td><?php echo $PlaceName['PlaceName'];?></td>
                                    <td><?php echo $PlaceName['DistrictName'];?></td>
                                    <td><?php echo $PlaceName['StateName'];?></td>
                                    <td><?php echo ($PlaceName['IsActive']==1) ? "Active" : "Deactive" ;?></td>
                                    <td style="text-align: right;" class="jsgrid jsgrid-cell jsgrid-control-field jsgrid-align-center">
                                        <a style="color:red" href="dashboard.php?action=PlaceNames/edit&edit=<?php echo md5($PlaceName['PlaceNameID']);?>"> 
                                        <input class="jsgrid-button jsgrid-edit-button" type="button" title="" data-bs-original-title="Edit" aria-label="Edit">
                                        </a>
                                    </td>
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
    