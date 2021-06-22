<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">SMS Logs</h4>
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
            <div class="form-group row">
                <div class="col-sm-6"><h4 class="page-title"></h4></div>
                <div class="col-sm-6" style="text-align:right;padding-top:5px;color:skyblue;">
                    <a href="dashboard.php?action=Logs/LoginLog&Status=All"><?php if($_GET['Status']=="All") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>All</small></a>&nbsp;|&nbsp;
                    <a href="dashboard.php?action=Logs/LoginLog&Status=Success"><?php if($_GET['Status']=="Success") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>Success</small></a>&nbsp;|&nbsp;
                    <a href="dashboard.php?action=Logs/LoginLog&Status=Failure"><?php if($_GET['Status']=="Failure") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>Failure</small></a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Login Logs
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Member ID</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        if( $_GET['Status']=="All"){
                                            $sql= $mysql->select("select * from `_tbl_logs_logins` where Date(LoginOn)>=Date('".$_POST['From']."') and Date(LoginOn)<=Date('".$_POST['To']."') order by `LoginID` desc ");
                                        }
                                        if( $_GET['Status']=="Success"){
                                            $sql= $mysql->select("select * from `_tbl_logs_logins` where Date(LoginOn)>=Date('".$_POST['From']."') and Date(LoginOn)<=Date('".$_POST['To']."') LoginStatus='1' order by `LoginID` desc ");
                                        }
                                        if( $_GET['Status']=="Failure"){
                                            $sql= $mysql->select("select * from `_tbl_logs_logins` where Date(LoginOn)>=Date('".$_POST['From']."') and Date(LoginOn)<=Date('".$_POST['To']."') LoginStatus='0' order by `LoginID` desc ");
                                        }
                                    ?>
                                    <?php  foreach($sql as $log){ ?>
                                        <tr>
                                            <td><?php echo date("d M, Y H:i",strtotime($log['LoginOn']));?></td>
                                            <td><?php echo $log['MemberID'];?></td>
                                            <td><?php if($log['LoginStatus']==0){ echo "Failed";}else{ echo "Success"; };?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>                                                                                             
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<script>
function _showPopup(div) {
    $('.modal-content').html($('#'+div).html());
    $('#exampleModal').modal("show");
}    
$('#From').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#To').datetimepicker({
        format: 'YYYY-MM-DD'
    });  
</script>