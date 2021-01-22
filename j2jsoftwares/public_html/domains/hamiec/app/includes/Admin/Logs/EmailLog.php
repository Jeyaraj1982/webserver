<?php 
       $sql= $mysql->select("SELECT * FROM `_tbl_logs_email` where Date(EmailRequestedOn)>=Date('".$_POST['From']."') and Date(EmailRequestedOn)<=Date('".$_POST['To']."') ORDER BY EmailLogID Desc "); 

?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Email Logs</h4>
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
                                            <th>Email To</th>
                                            <th>Subject</th>   
                                            <th>Status</th>
                                            <th>Attachment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php  foreach($sql as $log){ ?>
                                        <tr>
                                            <td><?php echo date("d M, Y H:i",strtotime($log['EmailRequestedOn']));?></td>
                                            <td><?php echo $log['EmailTo'];?></td>
                                            <td><?php echo $log['EmailSubject'];?></td>
                                            <td><?php if($log['IsSuccess']==1) { echo "Success"; } else { echo "Failure"; }?></td>
                                            <td><?php if($log['IsAttachment']==1) { echo "attached"; 
                                            ?>
                                               <a href="<?php echo $log['AttachmentFile'];?>"><i class="fas fa-cloud-download-alt"></i></a>
                                               <?php
                                            }  ?></td>
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