<?php 

 $Requests  = $mysql->select("SELECT * FROM _tbl_Log_WhatsappMessage order by SMSID desc");
  ?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Whatsapp/OutgoingMsg">Whatsapp Outgoing MSG</a></li>
        </ul>
    </div>
    
    <div class="row">
        <div class="col-lg-12 col-xlg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Whatsapp Outgoing Msg</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th><b>Requested On</b></th>
                                    <th><b>Mobile Number</b></th>
                                    <th><b>Message</b></th>
                                    <th><b>Doc Url</b></th>
                                    <th><b>API Response</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($Requests as $Request){ ?>
                                <tr>
                                    <td><?php echo $Request['MessagedOn'];?></td>
                                    <td><?php echo $Request['SmsTo'];?></td>
                                    <td><?php echo $Request['Message'];?></td>
                                    <td><?php echo $Request['DocUrl'];?></td>
                                    <td><?php echo $Request['APIResponse'];?></td>
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