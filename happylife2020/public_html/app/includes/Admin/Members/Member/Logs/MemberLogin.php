   <?php $action = explode("/",$_GET['cp']); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <ul class="nav nav-pills nav-secondary" id="pills-tab" role="tablist" style="margin:0px auto;background:#fff">
                    <li class="nav-item submenu">
                        <a class="nav-link <?php echo $action[1]=="MemberLogin" ? 'active show ' : '';?>" id="pills-home-tab" href="dashboard.php?action=Members/ViewMember&cp=Logs/MemberLogin&MCode=<?php echo $_GET['MCode'];?>" role="tab" >Login</a>
                    </li>
                    <li class="nav-item submenu">
                        <a class="nav-link <?php echo $action[1]=="Email" ? 'active show ' : '';?>" id="pills-home-tab" href="dashboard.php?action=Members/ViewMember&cp=Logs/Email&MCode=<?php echo $_GET['MCode'];?>" role="tab" >Email</a>
                    </li>
                    <li class="nav-item submenu">
                        <a class="nav-link <?php echo $action[1]=="MobileSMS" ? 'active show ' : '';?>" id="pills-home-tab" href="dashboard.php?action=Members/ViewMember&cp=Logs/MobileSMS&MCode=<?php echo $_GET['MCode'];?>" role="tab" >Mobile SMS</a>
                    </li>
                </ul> 
            </div>
        </div>
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
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $Requests  = $mysql->select("SELECT _tbl_members_login_logs.*, _tbl_Members.MemberCode, _tbl_Members.MemberName FROM _tbl_members_login_logs LEFT JOIN _tbl_Members
                                                                ON _tbl_members_login_logs.MemberID=_tbl_Members.MemberID where _tbl_members_login_logs.MemberID='".$data[0]['MemberID']."' and Date(_tbl_members_login_logs.LoginOn)>=Date('".$_POST['From']."') and Date(_tbl_members_login_logs.LoginOn)<=Date('".$_POST['To']."') order by _tbl_members_login_logs.LoginID Desc"); ?>
                                <?php foreach ($Requests as $Request){ ?>
                                <tr>
                                    <td><?php echo date("M d, Y",strtotime($Request['LoginOn']));?></td>
                                    <td><?php echo $Request['IsSuccess']==1 ? "Success" : "Failed";?></td>
                                    <td></td>
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
<script>
$('#From').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#To').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    //$(document).ready(function() {$('#basic-datatables').DataTable();});
</script>