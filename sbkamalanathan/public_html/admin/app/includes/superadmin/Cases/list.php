<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Cases</h3>
            </div>
            <div class="col-6" style="text-align:right">
                <a href="dashboard.php?action=Cases/new" class="btn btn-primary">New Case</a>
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
                                    <th>Case Number</th>
                                    <th>CNR Number</th>
                                    <th>Client Name</th>
                                    <th>Court Name</th>
                                    <th>Case Type</th>
                                    <th>Created</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $cases = $mysql->select("select * from _tbl_cases_register where  (IsActive=1 or IsActive=0)");
                                    foreach($cases as $case) {
                                        $pirority = $mysql->select("Select * from _tbl_master_priorities where PriorityID='".$case['PriorityID']."'");
                                ?>
                                <tr>
                                    <td style="background:<?php echo $pirority[0]['PriorityColor'];?>"><?php echo $case['CaseNumber'];?></td>
                                    <td style="background:<?php echo $pirority[0]['PriorityColor'];?>"><?php echo $case['CNRNumber'];?></td>
                                    <td style="background:<?php echo $pirority[0]['PriorityColor'];?>"><?php echo $case['ClientName'];?></td>
                                    <td style="background:<?php echo $pirority[0]['PriorityColor'];?>"><?php echo $case['CourtName'];?></td>
                                    <td style="background:<?php echo $pirority[0]['PriorityColor'];?>"><?php echo $case['CaseTypeName'];?></td>
                                    <td style="background:<?php echo $pirority[0]['PriorityColor'];?>"><?php echo $case['CreatedOn'];?></td>
                                    <td style="background:<?php echo $pirority[0]['PriorityColor'];?>"><?php echo ($case['IsActive']==1) ? "Active" : "Deactive" ;?></td>
                                    <td style="background:<?php echo $pirority[0]['PriorityColor'];?>;text-align: right;" class="jsgrid jsgrid-cell jsgrid-control-field jsgrid-align-center">
                                        <a href="dashboard.php?action=Cases/view&case=<?php echo md5($case['CreatedOn'].$case['CaseID']);?>"> 
                                        View
                                        </a>&nbsp;
                                        <a style="color:red" href="dashboard.php?action=Cases/edit&edit=<?php echo md5($case['CreatedOn'].$case['CaseID']);?>"> 
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
    