<?php 
      // $sql= $mysql->select("select * from `_tbl_Log_MobileSMS` order by `SMSID` desc ");
       
       $sql = $mysql->select("SELECT * FROM _tbl_tneb_log
                                            LEFT JOIN _tbl_Members
                                            ON _tbl_tneb_log.UserID = _tbl_Members.MemberID where Date(_tbl_tneb_log.TxnOn)>=Date('".$_POST['From']."') and Date(_tbl_tneb_log.TxnOn)<=Date('".$_POST['To']."')");
?>

<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">TNEB Logs</h4>
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
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Member ID</th>
                                            <th>Mobile Number</th>
                                            <th>TNEB Number</th>
                                            <th>Output</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php  foreach($sql as $log){ ?>
                                        <tr>
                                            <td><?php echo date("d M, Y H:i",strtotime($log['TxnOn']));?></td>
                                            <td><?php echo $log['MemberID'];?></td>
                                            <td><?php echo $log['MobileNumber'];?></td>
                                            <td><?php echo $log['TNEBNumber'];?></td>
                                            <td><?php echo $log['OutPut'];?></td>
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