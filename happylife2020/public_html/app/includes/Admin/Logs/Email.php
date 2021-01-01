<?php $Requests  = $mysql->select("SELECT * FROM `_tbl_logs_email` ORDER BY EmailLogID Desc "); ?>
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
        <div class="col-lg-12 col-xlg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="card-title">Mobile SMS Logs</h4>
                    </div>
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
                                    <?php if(sizeof($Requests)=="5"){?>
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
    </div>
</div>
<script>
function _showPopup(div) {
    $('.modal-content').html($('#'+div).html());
    $('#exampleModal').modal("show");
}    
$(document).ready(function() {                                                   
    $('#basic-datatables').DataTable({});
});
</script>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    </div>
  </div>
</div>