<?php 
    include_once("case_view_header.php");

    $CaseDetails = $mysql->select("select * from _tbl_cases_register where md5(concat(CreatedOn,CaseID))='".$_GET['case']."'" );
    $documents = $mysql->select("select * from _tbl_cases_hirings where CaseID='".$CaseDetails[0]['CaseID']."' and  IsActive=1 order by CaseHiringID desc");
?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h5 style="margin-top:5px">Hiring Information</h5>
            </div>
            <div class="col-md-6 text-end">
                 <div class="media">
                    <div class="media-body text-end">
                        <div class="btn btn-primary" onclick="location.href='dashboard.php?action=Cases/view&sa=Hiring/add&case=<?php echo $_GET['case'];?>'"><i data-feather="plus-square"></i>Add</div>
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
                                <th>Case Attent</th>
                                <th>Next Hiring</th>
                                <th>Summary</th>
                                 
                                
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($documents as $document) { ?>
                            <tr>
                                <td><?php echo $document['CaseAttendDate'];?></td>
                                <td><?php echo $document['NextHiringDate'];?></td>
                                <td>
                                    IA Number: <?php echo $document['IANumber'];?><br>
                                    Attend By: <?php echo $document['CaseAttendAdvocateByName'];?><br><br>
                                    <span style="font-size:11px;color:#888"><?php echo date("M d, Y H:i",strtotime($document['CreatedOn']));?></span>&nbsp;&nbsp;&nbsp;
                                    <span style="font-size:11px;color:#888"><?php echo $document['AttachedByStaffName'].$document['AttachedByAdvocateName'].$document['AttachedByAdminName'];?></span>&nbsp;&nbsp;&nbsp;
                                </td>
                                
                                <td style="text-align: right;" class="jsgrid jsgrid-cell jsgrid-control-field jsgrid-align-center">
                                   
                                    <a style="color:red" href="dashboard.php?action=Cases/view&sa=Hiring/edit&case=<?php echo $_GET['case'];?>&edit=<?php echo md5($document['CreatedOn'].$document['CaseHiringID']);?>"> 
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