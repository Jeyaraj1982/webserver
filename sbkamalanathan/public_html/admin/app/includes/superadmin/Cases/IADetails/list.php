<?php 
    include_once("case_view_header.php");

    $CaseDetails = $mysql->select("select * from _tbl_cases_register where md5(concat(CreatedOn,CaseID))='".$_GET['case']."'" );
    $iadetails = $mysql->select("select * from _tbl_cases_ia_details where CaseID='".$CaseDetails[0]['CaseID']."' and  IsActive=1 order by CaseIADetailID desc");
?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h5 style="margin-top:5px">IA Details</h5>
            </div>
            <div class="col-md-6 text-end">
                 <div class="media">
                    <div class="media-body text-end">
                        <div class="btn btn-primary" onclick="location.href='dashboard.php?action=Cases/view&sa=IADetails/add&case=<?php echo $_GET['case'];?>'"><i data-feather="plus-square"></i>Add</div>
                    </div>
                 </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive" style="overflow: hidden;">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Date of Filling</th>
                                <th>IA Number</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($iadetails as $iadetail) { ?>
                            <tr>
                                <td><?php echo date("M d, Y",strtotime($iadetail['FillingDate']));?></td>
                                <td>
                                    <?php echo $iadetail['IANumber'];?><br>
                                    <span style="font-size:11px;color:#888"><?php echo date("M d, Y H:i",strtotime($iadetail['CreatedOn']));?></span>&nbsp;&nbsp;&nbsp;
                                    <span style="font-size:11px;color:#888"><?php echo $iadetail['AttachedByStaffName'].$iadetail['AttachedByAdvocateName'].$iadetail['AttachedByAdminName'];?></span>&nbsp;&nbsp;&nbsp;
                                </td>
                                 
                                <td style="text-align: right;" class="jsgrid jsgrid-cell jsgrid-control-field jsgrid-align-center">
                                   
                                    <a style="color:red" href="dashboard.php?action=Cases/view&sa=IADetails/edit&case=<?php echo $_GET['case'];?>&edit=<?php echo md5($iadetail['CreatedOn'].$iadetail['CaseIADetailID']);?>"> 
                                        <input class="jsgrid-button jsgrid-edit-button" type="button" title="" data-bs-original-title="Edit" aria-label="Edit">
                                    </a>
                                      <!--
                                        <input class="jsgrid-button jsgrid-delete-button" type="button" title="" data-bs-original-title="Delete" aria-label="Delete">
                                      -->  
                                </td>
                              
                            </tr>
                            <?php } ?>
                            <?php if (sizeof($documents)==0) { ?>
                            <tr>
                                `<td colspan="4" style="text-align:center;">No records found.</td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>     
            </div>
        </div>
    </div>
</div>
<?php include_once("case_view_footer.php");?> 