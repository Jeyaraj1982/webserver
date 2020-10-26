
 <?php
   // $fromDate = isset($_POST['fdate']) ? $_POST['fdate'] : date("Y-m-d");
   // $toDate = isset($_POST['tdate']) ? $_POST['tdate'] : date("Y-m-d");
    
    $txn = $mysql->select("select * from _tbl_mobile_plan_log where md5(Concat('J!',`UserID`))='".$_GET['d']."' and Plan='roffer' order by LogID desc");
    ?> 
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Mobile R-Offer Logs
                            </div>                                                                   
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Mobile Number</th>
                                            <th>Operator</th>
                                        </tr>
                                    </thead>                                                                         
                                    <tbody>
                                    <?php foreach($txn as $t){ ?>
                                        <tr>
                                            <td><?php echo $t['LogOn'];?></td>
                                            <th><?php echo $t['SMobileNumber'];?></th>
                                            <th><?php echo $t['Operator'];?></th>
                                        </tr>
                                    <?php } ?>
                                    <?php if(sizeof($txn)==0) {?>
                                        <tr>
                                            <td colspan="7" style="text-align: center;">No Logs Found</td>
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
    

<script>
$(document).ready(function() {$('#myTable').DataTable({ "order": [[ 0, "desc" ]]});
});

</script>
  