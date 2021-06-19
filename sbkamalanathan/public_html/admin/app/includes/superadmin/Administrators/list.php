<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Administrators</h3>
            </div>
            <div class="col-6" style="text-align:right">
                <a href="dashboard.php?action=Administrators/add" class="btn btn-primary">New Administrator</a>
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
                                    <th>Administrator Name</th>
                                    <th>Email</th>
                                    <th>Mobile Number</th>
                                    <th>Created</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $administrators = $mysql->select("select * from _tbl_admin where IsAdmin='1' and (IsActive=1 or IsActive=0)");
                                    foreach($administrators as $administrator) {
                                ?>
                                <tr>
                                    <td><?php echo $administrator['AdminName'];?></td>
                                    <td><?php echo $administrator['Email'];?></td>
                                    <td><?php echo $administrator['AdminMobileNumber'];?></td>
                                    <td><?php echo $administrator['CreatedOn'];?></td>
                                    <td><?php echo ($administrator['IsActive']==1) ? "Active" : "Deactive" ;?></td>
                                    <td style="text-align: right;" class="jsgrid jsgrid-cell jsgrid-control-field jsgrid-align-center">
                                        <a style="color:red" href="dashboard.php?action=Administrators/edit&edit=<?php echo md5($administrator['CreatedOn'].$administrator['AdminID']);?>"> 
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
    