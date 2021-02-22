<?php include_once("../header.php");?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Mobile/DTH Recahrge</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo url;?>/dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Mobile/DTH Recharge API</li>
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
           
          <!-- right column -->
          <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Mobile/DTH Recharge API</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                    <?php if ($_SESSION['user']['mobiledthrecharge']==0)  {?>
              To enable this service please contact administrator
              <?php } else { ?>
             
              
               
               <u><b>Prepaid Mobile</b></u><br><br>
               1.50%&nbsp;&nbsp;&nbsp;&nbsp;RA: Airtel  <br>
               3.50%&nbsp;&nbsp;&nbsp;&nbsp;RB: BSNL Booster <br>
               3.50%&nbsp;&nbsp;&nbsp;&nbsp;RT: BSNL Topup<br>
               1.50%&nbsp;&nbsp;&nbsp;&nbsp;RJ: JIO<br>
               3.50%&nbsp;&nbsp;&nbsp;&nbsp;RI: Idea<br>
               3.50%&nbsp;&nbsp;&nbsp;&nbsp;RV: Vodafone<br><br>
               
               <u><b>DTH Operator</b></u><br><br>
               3.50%&nbsp;&nbsp;&nbsp;&nbsp;DA: Airtel DTH<br>
               3.50%&nbsp;&nbsp;&nbsp;&nbsp;DD: Dish TV<br>
               3.50%&nbsp;&nbsp;&nbsp;&nbsp;DS: SunDirect<br>
               2.50%&nbsp;&nbsp;&nbsp;&nbsp;DT: Tatasky<br>
               3.50%&nbsp;&nbsp;&nbsp;&nbsp;DV: Videocon<br>
               
              <?php } ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- general form elements disabled -->
             
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include_once("../footer.php");?>