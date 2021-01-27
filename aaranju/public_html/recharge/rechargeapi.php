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
               http://www.aaranju.in/recharge/api.php?apipassword=&lt;apiusername>&apipassword=&lt;apipassword&gt;&number=&lt;mobilenumber&gt;&amount=&lt;amount&gt;&optr=&lt;operatorcode&gt;&uid=&lt;yourtxnid&gt;&response=&lt;csv/json&gt;  <br><br>
               
               http://www.aaranju.in/recharge/api_balance.php?apipassword=&lt;apiusername>&apipassword=&lt;apipassword&gt;<br><Br>
               
               Operator Code<br><br>
               
               <u><b>Prepaid Mobile</b></u><br><br>
               <b>RA:</b> Airtel<br>
               <b>RB:</b> BSNL Booster<br>
               <b>RJ:</b> JIO<br>
               <b>RT:</b> BSNL Topup<br>
               <b>RI:</b> Idea<br>
               <b>RV:</b> Vodafone<br><br>
               
               <u><b>DTH Operator</b></u><br><br>
               <b>DA:</b> Airtel DTH<br>
               <b>DB:</b> BigTV<br>
               <b>DD:</b> Dish TV<br>
               <b>DS:</b> SunDirect<br>
               <b>DT:</b> Tatasky<br>
               <b>DV:</b> Videocon<br>
               
               
               
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