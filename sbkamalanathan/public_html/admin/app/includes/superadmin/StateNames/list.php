<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>State Names</h3>
            </div>
            <div class="col-6" style="text-align:right">
                <a href="dashboard.php?action=StateNames/add" class="btn btn-primary">New State Name</a>
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
                                    <th>State Names</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $statenames = $mysql->select("select * from _tbl_master_statenames where (IsActive=1 or IsActive=0)");
                                    foreach($statenames as $statename) {
                                ?>
                                <tr>
                                    <td><?php echo $statename['StateName'];?></td>
                                    <td><?php echo ($statename['IsActive']==1) ? "Active" : "Deactive" ;?></td>
                                    <td style="text-align: right;" class="jsgrid jsgrid-cell jsgrid-control-field jsgrid-align-center">
                                        <a style="color:red" href="dashboard.php?action=StateNames/edit&edit=<?php echo md5($statename['StateNameID']);?>"> 
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
    