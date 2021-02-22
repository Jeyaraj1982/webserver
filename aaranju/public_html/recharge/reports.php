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
              <?php 
              //$txndata = $mysql->select("Select * from _transactions where   userid='".$_SESSION['user']['userid']."' order by rctxtid desc ");
              if (isset($_POST['d'])) {
                  $date = $_POST['y']."-".$_POST['m']."-".$_POST['d'];
                  
              } else {
                  $date = date("Y-m-d");
              }
             
            
              $txndata = $mysql->select("SELECT _accounts.*,_transactions.optrcode as optrcode,_transactions.transid as transid,_transactions.rcstatus as rcstatus,_transactions.api_uid as api_uid,_transactions.rctxtid as trctxtid FROM _accounts LEFT JOIN _transactions ON _accounts.rctxnid=_transactions.rctxtid WHERE date(_accounts.txndate)=date('".$date."') and _accounts.userid='".$_SESSION['user']['userid']."' order by _accounts.actxnid desc ");
            
              
              ?>
              <div class="row">
              <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-12 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Balance</p>
                                                <h4 class="card-title" style="font-size: 24px;font-weight: bold;">
                                                    Rs. <?php echo number_format(Recharge::get_balance($_SESSION['user']['userid']),2);?>
                                                </h4>
                                            </div>
                                        </div>                        
                                    </div>
                                </div>
                            </div>
                        </div>
              <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-12 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Today Sold</p>
                                                <h4 class="card-title" style="font-size: 24px;font-weight: bold;">
                                                <?php
                                                   $d = $mysql->select("SELECT SUM(rcamount) AS amt FROM _transactions WHERE  userid='".$_SESSION['user']['userid']."' and DATE(txndate)=DATE('".date("Y-m-d")."') AND rcstatus='success'");
                                                   echo number_format((isset($d[0]['amt']) ? $d[0]['amt'] : 0 ),2);
                                                ?>  
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                         <div class="col-sm-6 col-md-6">
                            <div class="card card-stats card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-12 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Report Date</p>
                                                   <form action="" method="post">
                                                <h4 class="card-title">
                                             
                                                <select name="d">
                                                    <?php for($i=1;$i<=31;$i++) {?>
                                                    <option value="<?php echo $i;?>" <?php echo date("d",strtotime($date))==$i ? " selected='selected'" : "";?> ><?php echo $i;?></option>
                                                    <?php } ?>
                                                </select>
                                                <select name="m">
                                                        <option value="1" <?php echo date("m",strtotime($date))==1 ? " selected='selected'" : "";?>>JAN</option>
                                                        <option value="2" <?php echo date("m",strtotime($date))==2 ? " selected='selected'" : "";?>>FEB</option>
                                                        <option value="3" <?php echo date("m",strtotime($date))==3 ? " selected='selected'" : "";?>>MAR</option>
                                                        <option value="4" <?php echo date("m",strtotime($date))==4 ? " selected='selected'" : "";?>>APR</option>
                                                        <option value="5" <?php echo date("m",strtotime($date))==5 ? " selected='selected'" : "";?>>MAY</option>
                                                        <option value="6" <?php echo date("m",strtotime($date))==6 ? " selected='selected'" : "";?>>JUN</option>
                                                        <option value="7" <?php echo date("m",strtotime($date))==7 ? " selected='selected'" : "";?>>JULY</option>
                                                        <option value="8" <?php echo date("m",strtotime($date))==8 ? " selected='selected'" : "";?>>AUG</option>
                                                        <option value="9" <?php echo date("m",strtotime($date))==9 ? " selected='selected'" : "";?>>SEP</option>
                                                        <option value="10" <?php echo date("m",strtotime($date))==10 ? " selected='selected'" : "";?>>OCT</option>
                                                        <option value="11" <?php echo date("m",strtotime($date))==11 ? " selected='selected'" : "";?>>NOV</option>
                                                        <option value="12" <?php echo date("m",strtotime($date))==12 ? " selected='selected'" : "";?>>DEC</option>
                                                    </select> -
                                                    <select name="y">
                                                        <option value="2020" <?php echo date("Y",strtotime($date))==2020 ? " selected='selected'" : "";?>>2020</option>
                                                        <option value="2021" <?php echo date("Y",strtotime($date))==2021 ? " selected='selected'" : "";?>>2021</option>
                                                    </select> 
                                                    <input type="submit" value="View">
                                                 
                                                </h4>
                                                   </form>           
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
              </div>
              
              <div class="row">
                <div class="col-sm-12 col-md-12">
                    Month Sales Report for additional earnings
                    <table style="background:#f1f1f1;margin-top:10px;margin-bottom:20px">
                        <tr>
                            <td style="text-align: right;">Bsnl</td>
                            <td style="text-align: right;">VI</td>
                            <td style="text-align: right;"></td>
                        </tr>
                        <tr>
                            
                            <td style="text-align:right;width:200px">
                                <?php 
                                    $data = $mysql->select("select sum(rcamount) as rcamount from _transactions where  userid='".$_SESSION['user']['userid']."' and (optrcode='RB' or optrcode='RT')  and month(txndate)='".date("m")."' and year(txndate)='".date("Y")."' and rcstatus='success'");
                                    $amt = isset($data[0]['rcamount']) ? $data[0]['rcamount']: 0;
                                    echo number_format($amt,2);
                                ?>
                               <br><span style="font-size:14px">Incentive: 5% above 10 lakhs</span>
                            </td>
                            
                            <td style="text-align:right;;width:200px">
                                <?php 
                                    $data = $mysql->select("select sum(rcamount) as rcamount from _transactions where  userid='".$_SESSION['user']['userid']."' and (optrcode='RV' or optrcode='RI') and month(txndate)='".date("m")."' and year(txndate)='".date("Y")."' and rcstatus='success'");
                                    $amt = isset($data[0]['rcamount']) ? $data[0]['rcamount']: 0;
                                    echo number_format($amt,2);
                                ?>
                                <br><span style="font-size:14px">Incentive: 2% above 10 lakhs</span>
                            </td>
                            <td style="width: 50px;">&nbsp;</td>
                        </tr>
                    </table>
                </div>
              </div>
              <style>
              .odd {background:#fcfcfc !important}
              </style>
              <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                    <th class="sorting_asc">Date</th>
                    <th class="sorting">Number</th>
                    <th class="sorting">Operator</th>
                    <th class="sorting">Amount</th>
                    <th class="sorting">Credit</th>
                    <th class="sorting">Debit</th>
                    <th class="sorting">Balance</th>
                    <th class="sorting">Operator ID</th>
                    <th class="sorting">Status</th>
                    <th class="sorting">API UID<!--<br>
                    API Response--></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $optrString = array("DA"=>"Airtel Digital TV",
                                        "DD"=>"Dish TV",
                                        "DS"=>"Sun Direct",
                                        "DV"=>"Videocond2h",
                                        "RI"=>"IDEA",
                                        "RV"=>"Vodafone",                                  
                                        "RB"=>"BSNL Booster",
                                        "RT"=>"BSNL Toppu");
                ?>
                <?php //$txndata = $mysql->select("Select * from _transactions where date(txndate)=date('".date("Y-m-d")."') and userid='".$_SESSION['user']['userid']."' order by rctxtid desc ");?>
                
                <?php foreach($txndata as $t) {?>
                <?php
                $color = "#333";
                    if ($t['rctxnid']<0) {
                        $color = "#b112c9";
                    }
                     if ($t['rcstatus']=="FAILURE") {
                        $color = "red";
                    }
                    if ($t['particulars']=="WalletUpdate") {
                        $color = "green;background:#adffad;font-weight:bold";
                    }
                ?>
                <tr role="row" class="<?php echo ($i%2)==0 ? 'even' : 'odd';?>" style="color:<?php echo $color;;?>">
                  <td style="font-size:15px;padding:5px;"><?php echo $t['txndate'];?></td>
                  <td style="font-size:15px;padding:5px;"><?php echo $t['rcnumber'];?></td>
                  <td style="font-size:15px;padding:5px;"><?php echo (isset($optrString[$t['optrcode']])) ? $optrString[$t['optrcode']] : $t['particulars'];?></td>
                  <td style="text-align:right;font-size:15px;;padding:5px;"><?php echo $t['rcamount'];?></td>
                  <td style="text-align:right;font-size:15px;;padding:5px;"><?php echo $t['credits'];?></td>
                  <td style="text-align:right;font-size:15px;;padding:5px;"><?php echo $t['debits'];?></td>
                  <td style="text-align:right;font-size:15px;;padding:5px;"><?php echo $t['balance'];?></td>
                  <td style="font-size:15px;;padding:5px;"><?php echo $t['transid'];?></td>
                  <td style="font-size:15px;text-align:center;;padding:5px;"><?php echo $t['rcstatus'];?></td>
                  <td style="font-size:15px;text-align:right;;padding:5px;"><?php echo $t['api_uid'];?><!--<br>
                  <span style="color:#777"><?php echo $t['ourresponse'];?></span>-->
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
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
       "order": [[ 0, "desc" ]]
    });
  });
</script>