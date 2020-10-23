<?php 

 $Requests  = $mysql->select("SELECT * FROM telegram_subscribers order by telegram_subscriber_id desc");
  ?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=TelegramSubscribers">Telegram Subscribers</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=TelegramSubscribers">Telegram Subscribers</a></li>
        </ul>
    </div>
    
    <div class="row">
        <div class="col-lg-12 col-xlg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Manage Telegram Subscribers</h4>
                </div>                            
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th><b>Client ID</b></th>
                                    <th><b>Mobile Number</b></th>
                                    <th><b>Added On</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($Requests as $Request){ ?>
                                <tr>
                                    <td><?php echo $Request['client_id'];?></td>
                                    <td><?php echo $Request['mobilenumber'];?></td>
                                    <td><?php echo $Request['addedon'];?></td>
                                </tr>
                                <?php }?>  
                                <?php if(sizeof($Requests)=="0"){?>
                                <tr>
                                    <td colspan="3" style="text-align: center;">No Datas Found</td>
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
  /*  $(document).ready(function() {
        $('#basic-datatables').DataTable({});
    });          */
</script> 