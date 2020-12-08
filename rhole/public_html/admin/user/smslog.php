<?php 
  $obj = new CommonController();
$user = new JUsertable();
$pageContent = $user->getUser($_GET['d']);
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                User Details
                            </div>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="rowid" value="<?php echo $pageContent[0]['userid'];?>">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">Person Name</label>
                                    <div class="col-md-3"><?php echo $pageContent[0]['personname'];?></div>
                                </div>
                                <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">Email Address</label>
                                    <div class="col-md-3"><?php echo $pageContent[0]['email'];?></div>
                                </div>
                                <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">Mobile Number</label>
                                    <div class="col-md-3"><?php echo $pageContent[0]['mobile'];?></div>
                                </div>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-warning" name="cancelbtn"  onclick="location.href='<?php echo AppUrl;?>/admin/dashboard.php?action=user/listuser&f=a'">Cancel</button>
                                    </div>                                        
                                </div>
                            </div>
                        </form>
                    </div>                                                                                             
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                Email Log
                            </div>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th><b>Messaged</b></th>
                                        <th><b>Mobile No</b></th>
                                        <th><b>Message</b></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $Requests  = $mysql->select("SELECT * FROM `_tbl_Log_MobileSMS` where MemberCode='".$_GET['d']."' order by SMSID desc "); ?>
                                    <?php foreach ($Requests as $Request){ ?>
                                    <tr>
                                        <td><?php echo $Request['MessagedOn'];?></td>
                                        <td><?php echo $Request['SmsTo'];?></td>
                                        <td><div title="<?php echo $Request['Message'];?>"><?php echo substr($Request['Message'],0,30).(strlen($Request['Message'])>30 ? "..." : "");?></div>
                                        <div id="disp_<?php echo $Request['SMSID'];?>" style="display: none;">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $Request['SmsTo'];?></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="height:200px;overflow:auto">
                                                    <?php echo $Request['Message'];?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        
                                        
                                        </td>
                                        <td><a href="javascript:void(0)" onclick="_showPopup('disp_<?php echo $Request['SMSID'];?>')">View</a></td>
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

