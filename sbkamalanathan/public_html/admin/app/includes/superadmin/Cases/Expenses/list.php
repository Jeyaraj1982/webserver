<?php 
    include_once("case_view_header.php");

    $CaseDetails = $mysql->select("select * from _tbl_cases_register where md5(concat(CreatedOn,CaseID))='".$_GET['case']."'" );
    $documents = $mysql->select("select * from _tbl_cases_expenses where CaseID='".$CaseDetails[0]['CaseID']."' and  IsActive=1 order by CaseExpenseID desc");
    $documents_amount = $mysql->select("select sum(Amount) as Amount from _tbl_cases_expenses where CaseID='".$CaseDetails[0]['CaseID']."' and  IsActive=1 order by CaseExpenseID desc");
?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h5 style="margin-top:5px">Expenses</h5>
                <h6 style="clear:both;margin-top: 8px;color: #999;font-weight: normal;font-size: 14px;">Total Expenses: <?php echo number_format((isset($documents_amount[0]['Amount']) ? $documents_amount[0]['Amount'] : 0),2);?></h6>
            </div>
            <div class="col-md-6 text-end">
                 <div class="media">
                    <div class="media-body text-end">
                        <div class="btn btn-primary" onclick="location.href='dashboard.php?action=Cases/view&sa=Expenses/add&case=<?php echo $_GET['case'];?>'"><i data-feather="plus-square"></i>Add</div>
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
                                <th style="width:100px">Date</th>
                                <th>Description</th>
                                <th style="width:80px;text-align:right">Amount</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($documents as $document) { ?>
                            <tr>
                                <td><?php echo $document['TxnDate'];?></td>
                                <td>
                                    <?php echo $document['Description'];?><br>
                                    <span style="font-size:11px;color:#888"><?php echo date("M d, Y H:i",strtotime($document['CreatedOn']));?></span>&nbsp;&nbsp;&nbsp;
                                    <span style="font-size:11px;color:#888"><?php echo $document['AttachedByStaffName'].$document['AttachedByAdvocateName'].$document['AttachedByAdminName'];?></span>&nbsp;&nbsp;&nbsp;
                                    
                                </td>
                               
                                
                                <td  style="text-align: right;" ><?php echo  number_format($document['Amount'],2);?></td>
                                <td style="text-align: right;" class="jsgrid jsgrid-cell jsgrid-control-field jsgrid-align-center">
                                   
                                    <a style="color:red" href="dashboard.php?action=Cases/view&sa=Expenses/edit&case=<?php echo $_GET['case'];?>&edit=<?php echo md5($document['CreatedOn'].$document['CaseExpenseID']);?>"> 
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