<?php 
    include_once("case_view_header.php");

    $CaseDetails = $mysql->select("select * from _tbl_cases_register where md5(concat(CreatedOn,CaseID))='".$_GET['case']."'" );
    $timesheets = $mysql->select("select * from _tbl_cases_timesheet where CaseID='".$CaseDetails[0]['CaseID']."' and  IsActive=1 order by CaseTimeSheetID desc");
?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h5 style="margin-top:5px">Time Sheets</h5>
            </div>
            <div class="col-md-6 text-end">
                 <div class="media">
                    <div class="media-body text-end">
                        <div class="btn btn-primary" onclick="location.href='dashboard.php?action=Cases/view&sa=TimeSheet/add&case=<?php echo $_GET['case'];?>'"><i data-feather="plus-square"></i>Add</div>
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
                        <tbody>
                            <?php foreach($timesheets as $timesheet) { ?>
                            <tr>
                                <td><?php echo date("M d, Y",strtotime($timesheet['EventTime']));?></td>
                                <td>
                                    <?php echo $timesheet['Particulars'];?><br>
                                    <?php echo $timesheet['EventType'];?><br>
                                    <span style="font-size:11px;color:#888"><?php echo date("M d, Y H:i",strtotime($timesheet['CreatedOn']));?></span>&nbsp;&nbsp;&nbsp;
                                    <span style="font-size:11px;color:#888"><?php echo $timesheet['AttachedByStaffName'].$timesheet['AttachedByAdvocateName'].$timesheet['AttachedByAdminName'];?></span>&nbsp;&nbsp;&nbsp;
                                </td>
                                <td>
                                  <?php echo $timesheet['SpentHours'].":".$timesheet['SpentMins'];?>
                                </td>
                                <td style="text-align: right;" class="jsgrid jsgrid-cell jsgrid-control-field jsgrid-align-center">
                                   
                                    <a style="color:red" href="dashboard.php?action=Cases/view&sa=TimeSheet/edit&case=<?php echo $_GET['case'];?>&edit=<?php echo md5($timesheet['CreatedOn'].$timesheet['CaseTimeSheetID']);?>"> 
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