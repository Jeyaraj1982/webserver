<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Clients</h3>                
            </div>
            <div class="col-6" style="text-align:right">
                <a href="dashboard.php?action=Clients/add" class="btn btn-primary">New Client</a>
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
                                    <th>Client ID</th>                 
                                    <th>Client Name</th>
                                    <th>Mobile Number</th>
                                    <th>District Name</th>
                                    <th>Created</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $clients = $mysql->select("select * from _tbl_master_clients where  (IsActive=1 or IsActive=0)");
                                    foreach($clients as $client) {
                                ?>
                                <tr>
                                    <td><?php echo $client['ClientID'];?></td>
                                    <td><?php echo $client['ClientName'];?></td>
                                    <td><?php echo $client['MobileNumber'];?></td>
                                    <td><?php echo $client['DistrictName'];?></td>
                                    <td><?php echo $client['CreatedOn'];?></td>
                                    <td><?php echo ($client['IsActive']==1) ? "Active" : "Deactive" ;?></td>
                                    <td style="text-align: right;" class="jsgrid jsgrid-cell jsgrid-control-field jsgrid-align-center">
                                        <a style="color:red" href="dashboard.php?action=Clients/edit&edit=<?php echo md5($client['CreatedOn'].$client['ClientID']);?>"> 
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
    