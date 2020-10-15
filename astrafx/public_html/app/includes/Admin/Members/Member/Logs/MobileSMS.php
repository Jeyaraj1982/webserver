<?php $action = explode("/",$_GET['cp']); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <ul class="nav nav-pills nav-secondary" id="pills-tab" role="tablist" style="margin:0px auto;background:#fff">
                    <li class="nav-item submenu">
                        <a class="nav-link <?php echo $action[1]=="MemberLogin" ? 'active show ' : '';?>" id="pills-home-tab" href="dashboard.php?action=Members/ViewMember&cp=Logs/MemberLogin&MCode=<?php echo $_GET['MCode'];?>" role="tab" >Login</a>
                    </li>
                    <li class="nav-item submenu">
                        <a class="nav-link <?php echo $action[1]=="Email" ? 'active show ' : '';?>" id="pills-home-tab" href="dashboard.php?action=Members/ViewMember&cp=Logs/Email&MCode=<?php echo $_GET['MCode'];?>" role="tab" >Email</a>
                    </li>
                    <li class="nav-item submenu">
                        <a class="nav-link <?php echo $action[1]=="MobileSMS" ? 'active show ' : '';?>" id="pills-home-tab" href="dashboard.php?action=Members/ViewMember&cp=Logs/MobileSMS&MCode=<?php echo $_GET['MCode'];?>" role="tab" >Mobile SMS</a>
                    </li>
                </ul> 
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Mobile SMS Logs</h4>
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
                                        <th><b>Mobile No</b></th>
                                        <th><b>Message</b></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $Requests  = $mysql->select("SELECT * FROM `_tbl_Log_MobileSMS` where MemberCode='".$data[0]['MemberCode']."' and Date(MessagedOn)>=Date('".$_POST['From']."') and Date(MessagedOn)<=Date('".$_POST['To']."') order by SMSID desc "); ?>    
                                    <?php foreach ($Requests as $Request){ ?>
                                    <tr>
                                        <td><?php echo date("M d, Y",strtotime($Request['MessagedOn']));?></td>
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
<script>
 function _showPopup(div) {
      //swal($('#'+div).html());
$('.modal-content').html($('#'+div).html());
$('#exampleModal').modal("show");
 }    
    /*$(document).ready(function() {
        $('#basic-datatables').DataTable(
         {
        "order": [[ 1, "desc" ]]
    } 
        );
    }); */
    $('#From').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#To').datetimepicker({
        format: 'YYYY-MM-DD'
    });
</script>
    
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
    </div>
  </div>
</div>
