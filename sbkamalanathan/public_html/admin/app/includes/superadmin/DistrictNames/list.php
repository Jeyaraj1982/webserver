<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>District Names</h3>
            </div>
            <div class="col-6" style="text-align:right">
                <a href="dashboard.php?action=DistrictNames/add" class="btn btn-primary">New District Name</a>
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
                                    <th>District Names</th>
                                    <th>State Names</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $districtnames = $mysql->select("select * from _tbl_master_districtnames where (IsActive=1 or IsActive=0)");
                                    foreach($districtnames as $districtname) {
                                ?>
                                <tr>
                                    <td><?php echo $districtname['DistrictName'];?></td>
                                    <td><?php echo $districtname['StateName'];?></td>
                                    <td><?php echo ($districtname['IsActive']==1) ? "Active" : "Deactive" ;?></td>
                                    <td style="text-align: right;" class="jsgrid jsgrid-cell jsgrid-control-field jsgrid-align-center">
                                        <a style="color:red" href="dashboard.php?action=DistrictNames/edit&edit=<?php echo md5($districtname['DistrictNameID']);?>"> 
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
    