<?php include_once("../header.php");?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Transactional SMS</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo url;?>/dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Transactional SMS</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
                                          
    <!-- Main content -->
     <section class="content">
      <div class="container-fluid">
        <div class="row">
         <div class="col-sm-12"> 
              <div class="card">
            <div class="card-header">
              <h3 class="card-title">Reports</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                     <?php if ($_SESSION['user']['transactionsms']==0)  {?>
              To enable this service please contact administrator
              <?php } else {?>
              <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                    <th class="sorting_asc">Txn Date</th>
                    <th class="sorting">Sender ID</th>
                    <th class="sorting">Mobile Number</th>
                    <th class="sorting">Message</th>
                    <th class="sorting">Credits</th>
                    <th class="sorting">Debits</th>
                   <!-- <th class="sorting">Balance</th> -->
                    <th class="sorting">Txn From</th>
                    <th class="sorting">API UID</th>
                    </tr>
                </thead>
                <tbody>
                <?php $txndata = $mysql->select("Select * from _smstransactions where userid='".$_SESSION['user']['userid']."' order by smsid desc limit 0,100");?>
                <?php foreach($txndata as $t) {?>
                <tr role="row" class="<?php echo ($i%2)==0 ? 'even' : 'odd';?>" style="<?php echo ($t['credits']==0 && $t['debits']==0) ? " background:#f7b7b7; " : ""; ?>">
                  <td class="sorting_1"><?php echo $t['txndate'];?></td>
                  <td><?php echo $t['sendername'];?></td>
                  <td><?php 
                  $nos = explode(",",$t['mobilenumber']);
                  if (sizeof($nos)==1) {
                      echo $nos[0];
                       
   //$ch = curl_init('https://api.datayuge.com/v1/lookup/'.$nos[0]);
     //            curl_setopt($ch, CURLOPT_HEADER, false);
       //          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         //        $api = json_decode(curl_exec($ch));
           //      curl_close($ch);
                 
                 
//$operator = $api->operator;
//$circle = $api->circle;
 
//now you can use the operator and the circle in your program
//if (isset($api->circle) && isset($api->operator)) {
//echo "<br>".$operator.",".$circle;
//}
                  } else {
                  foreach($nos as $n) {
                      echo $n."<br>";
                  }
                  }
                  ?></td>
                  <td><?php echo $t['message'];?></td>
                  <td style="text-align:right"><?php echo $t['credits'];?></td>
                  <td style="text-align:right"><?php echo $t['debits'];?></td>
                  <!--<td style="text-align:right"><?php echo $t['balance'];?></td>-->
                  <td style="text-align:left"><?php echo $t['txnfrom'];?></td>
                  <td style="text-align:left"><?php echo $t['uid'];?></td>
                </tr>
                <?php } ?>
              </tbody>
                
              </table></div></div>
               </div>
               <?php } ?>
            </div>
            <!-- /.card-body -->
          </div>
           </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include_once("../footer.php");?>
<!-- DataTables -->
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