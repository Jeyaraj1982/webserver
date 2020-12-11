<?php
       $Logs = $mysql->select("SELECT * FROM _tbl_member_verify_log where VerifybyID='".$_SESSION['User']['SupportingCenterAdminID']."' order by VerifyID Desc");
                                                                                                        
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/VerifiedMembers">Members</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/VerifiedMembers">Manage Verified Members</a></li>
        </ul>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Manage Verified Members</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                         <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>        
                                <tr>
                                    <th class="border-top-0"><b>Verify Member ID</b></th>
                                    <th class="border-top-0"><b>Verified On</b></th>
                                    <th class="border-top-0"><b>IsValid</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (sizeof($Logs)==0) { ?>
                                <tr>
                                    <td colspan="4" style="text-align:center;">No Record Found</td>
                                </tr>
                                <?php } ?>                                                                 
                                <?php foreach ($Logs as $Log){ ?>
                                <tr> 
                                    <td><?php echo $Log['TypedMemberID'];?></td>
                                    <td><?php echo $Log['VerifiedOn'];?></td>
                                    <td><?php echo ($Log['IsValid']==1) ? 'Valid' : 'Invalid';?></td>
                               </tr>
                                <?php }?> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#basic-datatables').DataTable({});
    });
</script>