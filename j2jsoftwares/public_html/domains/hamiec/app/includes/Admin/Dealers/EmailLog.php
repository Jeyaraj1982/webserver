<?php 
       $Member =  $mysql->select("select * from `_tbl_Members` where `MemberCode`='".$_GET['MCode']."'"); 
       $sql= $mysql->select("select * from `_tbl_logs_email` where `MemberID`='".$Member[0]['MemberID']."' order by `EmailLogID` desc ");
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
           
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Email Logs
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Email To</th>
                                            <th>Subject</th>   
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php  foreach($sql as $log){ ?>
                                        <tr>
                                            <td><?php echo date("d M, Y H:i",strtotime($log['EmailRequestedOn']));?></td>
                                            <td><?php echo $log['EmailTo'];?></td>
                                            <td><?php echo $log['EmailSubject'];?></td>
                                            <td><?php if($log['IsSuccess']==1) { echo "Success"; } else { echo "Failure"; }?></td>
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