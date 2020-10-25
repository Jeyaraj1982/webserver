<?php include_once("../header.php");?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Money Transfer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo url;?>/dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Money Transfer API</li>
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
                <h3 class="card-title">Money Transfer API</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                    <?php if ($_SESSION['user']['moneytransfer']==0)  {?>
              To enable this service please contact administrator
              <?php } else { ?>
               http://www.aaranju.in/recharge/api.php?username=&lt;apiusername>&password=&lt;apipassword&gt;
               &uid=&lt;yourtxnid&gt;&account_name=&lt;account_name&gt;
               &account_name=&lt;account_name&gt;
               &account_number=&lt;account_number&gt;
               &amount=&lt;amount&gt;
               &remarks=&lt;remarks&gt;
               &ifsc_code=&lt;ifsc_code&gt;
               &response=&lt;csv/json&gt;  <br><br>
               
               <b>account_name:</b> alphanumeric<br>
               <b>account_number:</b> alphanumeric<br>
               <b>ifsc_code:</b> alphanumeric valid ifscode<br>
               <b>amount:</b> Rs. 10 to 10000<br>
               <b>remarks:</b> reference text print on bank statement<br>
              
               
               
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