<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>High Court's Bench Names</h3>
            </div>
            <div class="col-6" style="text-align:right">
                <a href="dashboard.php?action=HighCourtBenchNames/add" class="btn btn-primary">New Bench</a>
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
                                    <th>Bench Names</th>
                                    <th>High Court</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $benches = $mysql->select("select * from _tbl_master_highcourts_bench where (IsActive=1 or IsActive=0) order by BenchName");
                                    foreach($benches as $bench) {
                                ?>
                                <tr>
                                    <td><?php echo $bench['BenchName'];?></td>
                                    <td><?php echo $bench['HighCourtName'];?></td>
                                    <td><?php echo ($bench['IsActive']==1) ? "Active" : "Deactive" ;?></td>
                                    <td style="text-align: right;" class="jsgrid jsgrid-cell jsgrid-control-field jsgrid-align-center">
                                        <a style="color:red" href="dashboard.php?action=HighCourtBenchNames/edit&edit=<?php echo md5($bench['HighCourtBenchID']);?>"> 
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
    