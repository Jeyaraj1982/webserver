<?php 
       $Member =  $mysql->select("select * from `_tbl_Members` where `MemberCode`='".$_GET['MCode']."'"); 
       $sql= $mysql->select("select * from `_tbl_Log_MobileSMS` where `MemberID`='".$Member[0]['MemberID']."' order by `SMSID` desc ");
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="form-group row">
                <div class="col-sm-6"><h4 class="page-title">SMS Logs</h4></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                SMS Logs
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>SMS To</th>
                                            <th>Message</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php  foreach($sql as $log){ ?>
                                        <tr>
                                            <td><?php echo date("d M, Y H:i",strtotime($log['MessagedOn']));?></td>
                                            <td><?php echo $log['SmsTo'];?></td>
                                            <td><?php echo $log['Message'];?></td>
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