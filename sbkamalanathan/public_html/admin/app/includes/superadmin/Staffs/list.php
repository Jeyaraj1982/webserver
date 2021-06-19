<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Staffs</h3>                
            </div>
            <div class="col-6" style="text-align:right">
                <a href="dashboard.php?action=Staffs/add" class="btn btn-primary">New Staff</a>
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
                                    <th>Staff Name</th>
                                    <th>Area Name</th>
                                    <th>District Name</th>
                                    <th>Created</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $staffs = $mysql->select("select * from _tbl_master_staffs where  (IsActive=1 or IsActive=0)");
                                    foreach($staffs as $staff) {
                                ?>
                                <tr>
                                    <td><?php echo $staff['StaffName'];?></td>
                                    <td><?php echo $staff['AreaName'];?></td>
                                    <td><?php echo $staff['DistrictName'];?></td>
                                    <td><?php echo $staff['CreatedOn'];?></td>
                                    <td><?php echo ($staff['IsActive']==1) ? "Active" : "Deactive" ;?></td>
                                    <td style="text-align: right;" class="jsgrid jsgrid-cell jsgrid-control-field jsgrid-align-center">
                                        <a style="color:red" href="dashboard.php?action=Staffs/edit&edit=<?php echo md5($staff['CreatedOn'].$staff['StaffID']);?>"> 
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
    