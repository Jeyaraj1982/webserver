<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="form-group row">
                <div class="col-sm-6"></div>
                <div class="col-sm-6" style="text-align:right;padding-top:5px;color:skyblue;">
                    <a href="dashboard.php?action=Staffs/LoginLog&Status=All&ACode=<?php echo $_GET['ACode'];?>"><?php if($_GET['Status']=="All") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>All</small></a>&nbsp;|&nbsp;
                    <a href="dashboard.php?action=Staffs/LoginLog&Status=Success&ACode=<?php echo $_GET['ACode'];?>"><?php if($_GET['Status']=="Success") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>Success</small></a>&nbsp;|&nbsp;
                    <a href="dashboard.php?action=Staffs/LoginLog&Status=Failure&ACode=<?php echo $_GET['ACode'];?>"><?php if($_GET['Status']=="Failure") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>Failure</small></a>
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
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $admin= $mysql->select("select * from `_tbl_Admin` where `AdminCode`='".$_GET['ACode']."'");
                                        if( $_GET['Status']=="All"){
                                            $sql= $mysql->select("select * from `_tbl_logs_logins` where AdminStaffID='".$admin[0]['AdminID']."' order by `LoginID` desc ");
                                        }
                                        if( $_GET['Status']=="Success"){
                                            $sql= $mysql->select("select * from `_tbl_logs_logins` where AdminStaffID='".$admin[0]['AdminID']."' and LoginStatus='1' order by `LoginID` desc ");
                                        }
                                        if( $_GET['Status']=="Failure"){
                                            $sql= $mysql->select("select * from `_tbl_logs_logins` where AdminStaffID='".$admin[0]['AdminID']."' and LoginStatus='0' order by `LoginID` desc ");
                                        }
                                    ?>
                                    <?php  foreach($sql as $log){ ?>
                                        <tr>
                                            <td><?php echo date("d M, Y H:i",strtotime($log['LoginOn']));?></td>
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
        </div>
    </div>
</div>
<script>$(document).ready(function() {$('#myTable').DataTable({ "order": [[ 1, "desc" ]]});});</script>