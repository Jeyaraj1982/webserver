<?php include_once("../header.php");?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Telegram Service</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo url;?>/dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Outgoing Message</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12"> 
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Reports</h3>
                        </div>
                        <div class="card-body">
                            <?php if ($_SESSION['user']['service_telegram']==0)  {?>
                                To enable this service please contact administrator
                            <?php } else {?>
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc">Txn Date</th>
                                                    <th class="sorting">Client ID</th>
                                                    <th class="sorting">Particular</th>                                                     
                                                    <th class="sorting">Message</th>
                                                    <!--<th class="sorting">Credits</th>
                                                    <th class="sorting">Debits</th>  -->
                                                    <th class="sorting">Txn From</th>
                                                    <th class="sorting">Status</th>
                                                    <th class="sorting">API UID</th>
                                                </tr>                                                              
                                            </thead>
                                            <tbody>
                                            <?php $txndata = $mysql->select("Select * from telegram_outgoing where userid='".$_SESSION['user']['userid']."' order by telegram_txnid desc limit 0,100");?>
                                            <?php foreach($txndata as $t) {?>
                                                <tr role="row" class="<?php echo ($i%2)==0 ? 'even' : 'odd';?>">
                                                    <td class="sorting_1"><?php echo $t['txndate'];?></td>
                                                    <td><?php echo $t['chatid'];?></td>
                                                    <td><?php echo $t['particulars'];?></td>
                                                    <td><?php echo $t['testmessage'];?></td>
                                                    <!--<td style="text-align:right"><?php echo $t['credits'];?></td>
                                                    <td style="text-align:right"><?php echo $t['debits'];?></td>
                                                    <td><?php echo $t['balance'];?></td>-->
                                                    <td style="text-align:left"><?php echo $t['txnfrom'];?></td>
                                                    <td style="text-align:left"><?php echo $t['messagestatus']=="failure" ? "<span style='color:red'>". $t['messagestatus']."<br>".$t['errormessage']."</span>" : "delivered";?></td>
                                                    <td style="text-align:left"><?php echo $t['uid'];?></td>
                                                </tr>
                                            <?php } ?>                                   
                                            </tbody>                               
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include_once("../footer.php");?>
<script src="<?php echo url;?>/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo url;?>/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>