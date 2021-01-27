<?php include_once("../header.php");?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Mobile/DTH Recharge</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo url;?>/dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Mobile Recharge</li>
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
          <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Mobile Recahrge</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php if ($_SESSION['user']['mobiledthrecharge']==0)  {?>
              To enable this service please contact administrator
              <?php } else { ?>
                   <?php
                   if (isset($_POST['rechargeBtn'])) {
                          
                      $param['amount']=  $_POST['amount'] ;
                      $param['userid']=$_SESSION['user']['userid'];
                      $param['number'] =$_POST['mobilenumber']; 
                      $param['optr'] =$_POST['optr'] ;
                      $param['optrtype']= "MobileRecharge" ;
                      $param['txn_from']= "Panel";
                      $param['uid'] ="0" ;
                      $res = Recharge::doRecharge($param);
                      if ($res['response']['status']=="SUCCESS") {
                          ?>
                           <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i>Submitted Success</h5>
                  Recharge request has been submitted with Rs. <?php echo $_POST['amount'];?>.
                </div>
                          <?php
                          unset($_POST);
                      } else {
                         ?>
                           <div class="alert alert-danger  alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i>Recharge failed</h5>
                    <?php echo $res['response']["error"]; ?>
                </div>
                         <?php
                      }
                   }
                   ?>
                <form role="form" action="" method="post">
                  <div class="row">
                    <div class="col-sm-6"> 
                    <div class="form-group">
                        <label>Operator</label>
                        <?php $operators= $mysql->select("select * from `_tbl_operators` where `IsMobile`='1' order by `OperatorName`"); ?>
                        <select name="optr" class="custom-select">
                        <?php foreach($operators as $operator) {?>
                        <option value="<?php echo  $operator['OperatorCode'];?>"><?php echo $operator['OperatorName'];?></option>
                        <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6"> 
                    <div class="form-group">
                        <label>Available Credits (Rs)</label>
                        <input type="text" readonly="readonly" class="form-control" value="<?php echo number_format(Recharge::get_balance($_SESSION['user']['userid']),2);  ?>" style="text-align:right">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Mobile Number</label>
                        <input type="text"  name="mobilenumber" value="<?php echo isset($_POST['mobilenumber']) ? $_POST['mobilenumber'] : '';?>" class="form-control <?php echo isset($mobile_error) ? 'is-warning' : '';?>" placeholder="Enter mobile number ...">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Amount</label>
                        <input type="text"  name="amount" value="<?php echo isset($_POST['amount']) ? $_POST['amount'] : '';?>" class="form-control <?php echo isset($amount_error) ? 'is-warning' : '';?>" placeholder="Enter the amount ...">
                      </div>
                    </div>
                  </div>
               
                <div class="card-footer" style="padding:0px;background:#fff">
                  <button type="submit" name="rechargeBtn" class="btn btn-info">Recharge now</button>
                  <button type="submit" class="btn btn-default float-right">Reset</button>
                </div>
                 </form>  
                <?php } ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- general form elements disabled -->
             
            <!-- /.card -->
          </div>
          
          
           <div class="col-md-6">
                <div class="row">
                
                <div class="col-md-12">
                    <a href="mycommission.php">View Commission</a>
                
                </div>
                    
                </div>
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