<?php $Requests  = $mysql->select("SELECT _tbl_members_login_logs.*, _tbl_Members.MemberCode, _tbl_Members.MemberName FROM _tbl_members_login_logs LEFT JOIN _tbl_Members
ON _tbl_members_login_logs.MemberID=_tbl_Members.MemberID order by _tbl_members_login_logs.LoginID Desc"); ?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Logs/MobileSMS">Logs</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Logs/MobileSMS">Mobile SMS Logs</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xlg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="card-title">Mobile SMS Logs</h4>
                    </div>
                    <div class="card-body">         
                         <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th><b>Logged</b></th>
                                        <th><b>Member Code</b></th>
                                        <th><b>Member Name</b></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($Requests as $Request){ ?>
                                    <tr>
                                        <td><?php echo $Request['LoginOn'];?></td>
                                        <td><?php echo $Request['MemberCode'];?></td>
                                        <td><?php echo $Request['MemberName'];?></td>
                                        <td><?php echo $Request['IsSuccess']==1 ? "Success" : "Failed";?></td>
                                        <td></td>
                                    </tr>
                                    <?php }?>  
                                    <?php if(sizeof($Requests)=="5"){?>
                                    <tr>
                                        <td colspan="8" style="text-align: center;">No Datas Found</td>
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
</div>
 

<script>
    $(document).ready(function() {$('#basic-datatables').DataTable();});
</script>