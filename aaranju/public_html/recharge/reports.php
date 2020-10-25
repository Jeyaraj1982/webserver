<?php include_once("../header.php");?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Reports</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo url;?>/dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Reports</li>
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
              <a style="float: right;"  href="purchase.php">Purchase Report</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                     <?php if ($_SESSION['user']['mobiledthrecharge']==0)  {?>
              To enable this service please contact administrator
              <?php } else {?>
              <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                    <th class="sorting_asc">Txn Date</th>
                    <th class="sorting">Mobile Number</th>
                    <th class="sorting">Operator</th>
                    <th class="sorting">RC Value</th>
                    <th class="sorting">Your Cost</th>
                    <th class="sorting">Operator ID</th>
                    <th class="sorting">Status</th>
                    <th class="sorting">Txn From</th>
                    <th class="sorting">API UID<br>
                    API Response</th>
                    </tr>
                </thead>
                <tbody>
                <?php //$txndata = $mysql->select("Select * from _transactions where date(txndate)=date('".date("Y-m-d")."') and userid='".$_SESSION['user']['userid']."' order by rctxtid desc ");?>
                <?php $txndata = $mysql->select("Select * from _transactions where   userid='".$_SESSION['user']['userid']."' order by rctxtid desc ");?>
                <?php foreach($txndata as $t) {?>
                <tr role="row" class="<?php echo ($i%2)==0 ? 'even' : 'odd';?>">
                  <td class="sorting_1" style="font-size:12px"><?php echo $t['txndate'];?></td>
                  <td style="font-size:12px"><?php echo $t['rcnumber'];?></td>
                  <td style="font-size:12px"><?php echo $t['optrcode'];?></td>
                  <td style="text-align:right;font-size:12px;"><?php echo $t['rcamount'];?></td>
                  <td style="text-align:right;font-size:12px;"><?php echo $t['SellCostAmount'];?></td>
                  <td style="font-size:12px"><?php echo $t['transid'];?></td>
                  <td style="font-size:12px"><?php echo $t['rcstatus'];?></td>
                  <td style="font-size:12px"><?php echo $t['txn_from'];?></td>
                  <td style="font-size:12px"><?php echo $t['api_uid'];?><br>
                  <span style="color:#777"><?php echo $t['ourresponse'];?></span>
                  </td>
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