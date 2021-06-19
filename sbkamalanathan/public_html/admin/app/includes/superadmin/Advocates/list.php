<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Advocates</h3>
            </div>
            <div class="col-6" style="text-align:right">
                <a href="dashboard.php?action=Advocates/add" class="btn btn-primary">New Advocate</a>
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
                                    <th>Advocate Name</th>
                                    <th>Area Name</th>
                                    <th>District Name</th>
                                    <th>Created</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $advocates = $mysql->select("select * from _tbl_master_advocates where  (IsActive=1 or IsActive=0)");
                                    foreach($advocates as $advocate) {
                                ?>
                                <tr>
                                    <td><?php echo $advocate['AdvocateName'];?></td>
                                    <td><?php echo $advocate['AreaName'];?></td>
                                    <td><?php echo $advocate['DistrictName'];?></td>
                                    <td><?php echo $advocate['CreatedOn'];?></td>
                                    <td><?php echo ($advocate['IsActive']==1) ? "Active" : "Deactive" ;?></td>
                                    <td style="text-align: right;" class="jsgrid jsgrid-cell jsgrid-control-field jsgrid-align-center">
                                        <a style="color:red" href="dashboard.php?action=Advocates/edit&edit=<?php echo md5($advocate['CreatedOn'].$advocate['AdvocateID']);?>"> 
                                        <input class="jsgrid-button jsgrid-edit-button" type="button" title="" data-bs-original-title="Edit" aria-label="Edit">
                                        </a>
                                        <!--
                                        <input class="jsgrid-button jsgrid-delete-button" type="button" title="" data-bs-original-title="Delete" aria-label="Delete">
                                        -->
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
    