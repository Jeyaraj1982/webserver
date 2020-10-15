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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Member Login Logs</h4>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label>From</label>
                                <div class="input-group">
                                    <input type="text" class="form-control success" id="From" name="From" value="<?php echo isset($_POST['From']) ? $_POST['From'] : date("Y-m-d");?>" required="" aria-invalid="false">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-calendar-check"></i>
                                        </span>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-sm-3">
                                <label class="col-sm-1">To</label>
                                <div class="input-group">
                                    <input type="text" class="form-control success" id="To" name="To" value="<?php echo isset($_POST['To']) ? $_POST['To'] : date("Y-m-d");?>" required="" aria-invalid="false">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-calendar-check"></i>
                                        </span>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-sm-2"><label class="col-sm-1"> &nbsp;</label><button type="submit" name="viewTransaction" class="btn btn-primary">View logs</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php if(strlen($_POST['From'])!=0 && strlen($_POST['To'])!=0) {?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
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
                                <?php 
                                    $Requests  = $mysql->select("SELECT _tbl_members_login_logs.*, _tbl_Members.MemberCode, _tbl_Members.MemberName FROM _tbl_members_login_logs LEFT JOIN _tbl_Members
                                                                ON _tbl_members_login_logs.MemberID=_tbl_Members.MemberID where Date(_tbl_members_login_logs.LoginOn)>=Date('".$_POST['From']."') and Date(_tbl_members_login_logs.LoginOn)<=Date('".$_POST['To']."') order by _tbl_members_login_logs.LoginID Desc"); ?>
                                <?php foreach ($Requests as $Request){ ?>
                                <tr>
                                    <td><?php echo date("M d, Y",strtotime($Request['LoginOn']));?></td>
                                    <td><?php echo $Request['MemberCode'];?></td>
                                    <td><?php echo $Request['MemberName'];?></td>
                                    <td><?php echo $Request['IsSuccess']==1 ? "Success" : "Failed";?></td>
                                </tr>
                                <?php }?>  
                                <?php if(sizeof($Requests)=="0"){?>
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
    <?php } ?>
 </div>
<script>
$('#From').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#To').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    //$(document).ready(function() {$('#basic-datatables').DataTable();});
</script>