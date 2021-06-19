<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Courts Master</h3>
            </div>
            <div class="col-6" style="text-align:right">
                <a href="dashboard.php?action=Courts/add" class="btn btn-primary">New Court</a>
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
                                    <th>Court Name</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $courts = $mysql->select("select * from _tbl_master_courts where (IsActive=1 or IsActive=0)");
                                    foreach($courts as $court) {
                                ?>
                                <tr>
                                    <td><?php echo $court['CourtName'];?></td>
                                    <td><?php echo $court['Address'];?></td>
                                    <td><?php echo ($court['IsActive']==1) ? "Active" : "Deactive" ;?></td>
                                    <td style="text-align: right;" class="jsgrid jsgrid-cell jsgrid-control-field jsgrid-align-center">
                                        <a style="color:red" href="dashboard.php?action=Courts/edit&edit=<?php echo md5($court['CourtID']);?>"> 
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
    