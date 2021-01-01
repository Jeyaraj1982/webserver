<?php $Requests  = $mysql->select("SELECT * FROM `_tbl_logs_email` where Date(EmailRequestedOn)>=Date('".$_POST['From']."') and Date(EmailRequestedOn)<=Date('".$_POST['To']."') ORDER BY EmailLogID Desc "); ?>
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
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th><b>Messaged</b></th>
                                        <th><b>Member</b></th>
                                        <th><b>Stockiest</b></th>
                                        <th><b>Member</b></th>
                                        <th><b>To</b></th>
                                        <th><b>Subject</b></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($Requests as $Request){ ?>
                                    <tr>
                                        <td><?php echo $Request['EmailRequestedOn'];?></td>
                                        <td><?php echo $Request['MemberCode'];?></td>
                                        <td><?php echo $Request['StockistCode'];?></td>
                                        <td><?php echo $Request['AdminCode'];?></td>
                                        <td><?php echo $Request['EmailTo'];?></td>
                                        <td><?php echo $Request['EmailSubject'];?>
                                            <div id="disp_<?php echo $Request['EmailLogID'];?>" style="display: none;">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $Request['EmailSubject'];?></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="height:200px;overflow:auto">
                                                    <?php echo base64_decode($Request['EmailContent']);?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </td>
                                        <td><a href="javascript:void(0)" onclick="_showPopup('disp_<?php echo $Request['EmailLogID'];?>')">View</a></td>
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    </div>
  </div>
</div>