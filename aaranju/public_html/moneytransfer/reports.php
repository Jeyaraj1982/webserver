<?php include_once("../header.php");?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Transactions</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo url;?>/dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Transactions</li>
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
              <!--<a style="float: right;"  href="purchase.php">Money Transfer Transaction</a>-->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                     <?php if ($_SESSION['user']['moneytransfer']==0)  {?>
              To enable this service please contact administrator
              <?php } else {?>
               
               <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                    <th class="sorting_asc">Txn Date</th>
                    <th class="sorting">Particulars</th>
                    <th class="sorting">Credit</th>
                    <th class="sorting">Debit</th>
                    <th class="sorting">Balance</th>
                    <th class="sorting">Account Number</th>
                    <th class="sorting">IFS Code</th>
                    <th class="sorting">Amount</th>
                    <th class="sorting">Bank Referance</th>
                    <th class="sorting">Txn Status</th>
                    <th class="sorting">Txn Form</th>
                    <th class="sorting">API UID</th>
                    </tr>
                </thead>           
                <tbody>
                <?php //$txndata = $mysql->select("Select * from _transactions where date(txndate)=date('".date("Y-m-d")."') and userid='".$_SESSION['user']['userid']."' order by rctxtid desc ");?>
                <?php $txndata = $mysql->select("Select * from _tbl_money_transfer where   userid='".$_SESSION['user']['userid']."'  order by  MoneyTransferID desc ");?>
                <?php foreach($txndata as $t) {?>
                <tr role="row" class="<?php echo ($i%2)==0 ? 'even' : 'odd';?>">
                  <td class="sorting_1" style="font-size:12px"><?php echo $t['TxnDate'];?></td>
                  <td style="font-size:12px"><?php echo $t['Particulars'];?></td>
                  <td style="text-align:right;font-size:12px;"><?php echo number_format($t['Credit'],2);?></td>
                  <td style="text-align:right;font-size:12px;"><?php echo number_format($t['Debit'],2);?></td>
                  <td style="text-align:right;font-size:12px;"><?php echo number_format($t['Balance'],2);?></td>
                  <td style="font-size:12px"><?php echo $t['BankAccountNumber'];?></td>
                  <td style="font-size:12px"><?php echo strtoupper($t['IFSCode']);?></td>
                  <td style="font-size:12px;text-align:right"><?php 
                  if ($t['Debit']==0) {
                      
                  } else {
                    if ($t['IsWalletUpdate']==3) {
                    } else {
                        echo number_format($t['Debit'],2);      
                    }
                  }
                  
                  
                  ?></td>
                  <td style="font-size:12px"><?php echo $t['ReferenceNumber'];?></td>
                  <td style="font-size:12px"><?php 
                   if ($t['IsWalletUpdate']==2) {
                  echo $t['TransactionStatus'];
                  }
                  ?></td>
                  <td style="font-size:12px"><?php 
                  if ($t['IsWalletUpdate']=='2') {
                  echo $t['RequestedFrom'];
                  }?></td>
                  <td style="font-size:12px"><?php
                   if ($t['IsWalletUpdate']=='2') {
                  echo $t['uid'];
                  }
                   ?></td>
                </tr>
                <?php } ?>
              </tbody>
              </table>
               
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