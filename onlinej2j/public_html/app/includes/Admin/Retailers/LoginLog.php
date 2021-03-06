<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="form-group row">
                <div class="col-sm-6"></div>
                <div class="col-sm-6" style="text-align:right;padding-top:5px;color:skyblue;">
                    <a href="dashboard.php?action=MemberLoginLog&Status=All&MCode=<?php echo $_GET['MCode'];?>"><?php if($_GET['Status']=="All") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>All</small></a>&nbsp;|&nbsp;
                    <a href="dashboard.php?action=MemberLoginLog&Status=Success&MCode=<?php echo $_GET['MCode'];?>"><?php if($_GET['Status']=="Success") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>Success</small></a>&nbsp;|&nbsp;
                    <a href="dashboard.php?action=MemberLoginLog&Status=Failure&MCode=<?php echo $_GET['MCode'];?>"><?php if($_GET['Status']=="Failure") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>Failure</small></a>
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
                                    $Member= $mysql->select("select * from `_tbl_Members` where `MemberCode`='".$_GET['MCode']."'");
                                        if( $_GET['Status']=="All"){
                                            $sql= $mysql->select("select * from `_tbl_logs_logins` where MemberID='".$Member[0]['MemberID']."' order by `LoginID` desc ");
                                        }
                                        if( $_GET['Status']=="Success"){
                                            $sql= $mysql->select("select * from `_tbl_logs_logins` where MemberID='".$Member[0]['MemberID']."' and LoginStatus='1' order by `LoginID` desc ");
                                        }
                                        if( $_GET['Status']=="Failure"){
                                            $sql= $mysql->select("select * from `_tbl_logs_logins` where MemberID='".$Member[0]['MemberID']."' and LoginStatus='0' order by `LoginID` desc ");
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