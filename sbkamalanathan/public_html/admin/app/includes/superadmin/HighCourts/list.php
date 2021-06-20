<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>High Courts</h3>
            </div>
            <div class="col-6" style="text-align:right">
                <a href="dashboard.php?action=HighCourts/add" class="btn btn-primary">New High Court</a>
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
                                    <th>High Court</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $highcourts = $mysql->select("select * from _tbl_master_highcourts where (IsActive=1 or IsActive=0) order by CourtName");
                                    foreach($highcourts as $highcourt) {
                                ?>
                                <tr>
                                    <td><?php echo $highcourt['CourtName'];?></td>
                                    <td><?php echo ($highcourt['IsActive']==1) ? "Active" : "Deactive" ;?></td>
                                    <td style="text-align: right;" class="jsgrid jsgrid-cell jsgrid-control-field jsgrid-align-center">
                                        <a style="color:red" href="dashboard.php?action=HighCourts/edit&edit=<?php echo md5($highcourt['HighCourtID']);?>"> 
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
    