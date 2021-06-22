<?php 

 $Requests  = $mysql->select("SELECT * FROM telegram_recevied_records order by telegram_id desc");
  ?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=TelegramReceivedMsg">Telegram Received Msg</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=TelegramReceivedMsg">Telegram Received Msg</a></li>
        </ul>
    </div>
    
    <div class="row">
        <div class="col-lg-12 col-xlg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Manage Telegram Received Msg</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th><b>Telegram Name</b></th>
                                    <th><b>API Txn ID</b></th>
                                    <th><b>Client ID</b></th>
                                    <th><b>Received Message</b></th>
                                    <th><b>Requested On</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($Requests as $Request){ ?>
                                <tr>
                                    <td><?php echo $Request['telegram_name'];?></td>
                                    <td><?php echo $Request['api_txnid'];?></td>
                                    <td><?php echo $Request['client_id'];?></td>
                                    <td><?php echo $Request['reciviedmessage'];?></td>
                                    <td><?php echo $Request['requestedon'];?></td>
                                </tr>
                                <?php }?>  
                                <?php if(sizeof($Requests)=="0"){?>
                                <tr>
                                    <td colspan="5" style="text-align: center;">No Datas Found</td>
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
<script>
   /* $(document).ready(function() {
        $('#basic-datatables').DataTable({});
    });  */
</script> 