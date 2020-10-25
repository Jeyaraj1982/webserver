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
              <li class="breadcrumb-item active">Money Transfer</li>
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
                <h3 class="card-title">Money Transfer To Bank</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php if ($_SESSION['user']['moneytransfer']==0)  {?>
              To enable this service please contact administrator
              <?php } else { ?>
                   <?php
                   

                   if (isset($_POST['rechargeBtn'])) {
                       
                       $param['userid']=$_SESSION['user']['userid'];
                       $param['PaymentType']= $_POST['PaymentType'] ;
                       $param['BeneficiaryName']= $_POST['BeneficiaryName'] ;
                       $param['BankAccountNumber'] =$_POST['BankAccountNumber']; 
                       $param['IFSCode'] =$_POST['IFSCode'] ;
                       $param['Amount']=  $_POST['Amount'] ;
                       $param['Remarks']=  $_POST['Remarks'] ;
                       $param['txn_from']= "Panel";
                        
                      $param['uid'] ="0" ;
                     
                      $res = MoneyTransfer::doTransfer($param);
                     
                      if ($res['response']['status']=="SUCCESS" || $res['response']['status']=="REQUESTED") {
                          ?>
                           <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i>Transfer Success</h5>
                  Bank Ref ID: <?php echo $res['transid'];?>
                </div>
                          <?php
                          unset($_POST);
                      } else {
                         ?>
                           <div class="alert alert-danger  alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i><?php echo $res['error'];?></h5>
                    <?php echo $res['response']["error"]; ?>
                </div>
                         <?php
                      }
                   }
                   ?>
                <form role="form" action="" method="post" onsubmit="return form_validate()">
                  <div class="row">
                    <div class="col-sm-6"> 
                    <div class="form-group">
                        <label>Payment Type<span style="color:red">*</span></label>
                        <select name="optr" class="custom-select">
                        <option value="imps">IMPS</option>
                        </select>
                      </div>
                    </div>
                    
                    <div class="col-sm-6"> 
                    <div class="form-group">
                        <label>Available Credits (Rs)</label>
                        <input type="text" readonly="readonly" class="form-control" value="<?php echo number_format(MoneyTransfer::get_balance($_SESSION['user']['userid']),2);  ?>" style="text-align:right">
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Beneficiary Name</label>
                        <input type="text"  name="BeneficiaryName" value="<?php echo isset($_POST['BeneficiaryName']) ? $_POST['BeneficiaryName'] : '';?>" class="form-control <?php echo isset($bname_error) ? 'is-warning' : '';?>" placeholder="Beneficiary Name">
                      </div>
                    </div>
                  </div>
                     <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Account Number<span style="color:red">*</span></label>
                        <input type="text"  name="BankAccountNumber" value="<?php echo isset($_POST['BankAccountNumber']) ? $_POST['BankAccountNumber'] : '';?>" class="form-control <?php echo isset($account_error) ? 'is-warning' : '';?>" placeholder="Account Number" required>
                      </div>
                    </div>
                    </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Amount<span style="color:red">*</span></label>
                        <input type="text"  name="Amount" id="Amount" value="<?php echo isset($_POST['Amount']) ? $_POST['Amount'] : '';?>" class="form-control <?php echo isset($amount_error) ? 'is-warning' : '';?>" placeholder="Amount" required>
                        <span id="amount_error" style="color:red"></span>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>IFS Code<span style="color:red">*</span></label>
                        <input type="text" required  name="IFSCode" id="IFSCode" value="<?php echo isset($_POST['IFSCode']) ? $_POST['IFSCode'] : '';?>" class="form-control <?php echo isset($ifscode_error) ? 'is-warning' : '';?>" placeholder="IFS Code" required>
                        <span id="ifscode_error" style="color:red"></span>
                      </div>
                    </div>
                  </div>
                    <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Remarks<span style="color:red">*</span></label>
                        <input type="text"  name="Remarks" value="<?php echo isset($_POST['Remarks']) ? $_POST['Remarks'] : '';?>" class="form-control <?php echo isset($account_error) ? 'is-warning' : '';?>" placeholder="Remarks" required>
                        <span id="remarks_error" style="color:red"></span>
                      </div>
                    </div>
                    </div>
                <div class="card-footer" style="padding:0px;background:#fff">
                  <button type="submit" name="rechargeBtn" class="btn btn-info">Transfer now</button>
                
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
              <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Information</h3>
              </div>
              <div class="card-body">
              <b>Virtual Account Details</b><br>
              <?php echo $_SESSION['user']['virtual_account_name'];?><br>
              70809070809073244<br>
              ICIC0000104<br><br>
              
              
              <b>Fixed Maintain</b><br>
              Rs. <?php echo $_SESSION['user']['maintain_balance'];?><br>
              Max Allowed To Transfer. Rs.<?php echo $_SESSION['user']['maintain_balance'];?>/ per txn.<br><br>
              
              
              <b>Upload Funds Charges</b><br>
              Rs. 5 per fund upload for Fixed Maintain<br>
              Rs. 50 per fund upload for Non-Maintain Fixed Maintain<br><br>
              
              
              <b>Time To Update</b><br>
              IMPS: Instant<br>
              NEFT: Min: 2hrs Max: 4hrs (depends on bank working day)<br><br>
              
              <b>Allow Incoming Account(s) to automate</b><br>
              <?php
                  $qdata = $mysql->select("select * from _moneytransfer_incoming_bankaccount where userid='".$_SESSION['user']['userid']."'");
                  if (sizeof($qdata)==0) {
                      echo "Not Defined";
                  } else {
                      echo "<table border='1' style='width:100%'>";
                      foreach($qdata as $q) {
                          ?>
                            <tr>
                                <td style="padding-left:5px;"><?php echo $q['accountnumber'];?></td>
                                <td style="padding-left:5px;"><?php echo $q['accountname'];?></td>
                                <td style="padding-left:5px;"><?php echo $q['ifscode'];?></td>
                            </tr>
                          <?php
                      }
                      echo "</table>";
                  }
              ?>
              <br>
              <b>Outgoing Charges:</b><br>
              <table border="1">
                <tr style="font-weight:bold;">
                    <td width="100"  style="padding-left:10px">Charges</td>
                    <td width="250" style="padding-left:10px">Ranges</td>
                </tr>
                <tr>
                    <td style="padding-left:10px">Rs. 5</td>
                    <td style="padding-left:10px">lessthan 1000</td>
                </tr>
                 <tr>
                    <td style="padding-left:10px">Rs. 7</td>
                    <td style="padding-left:10px">for 1000-to-3000</td>
                </tr>
                <tr>
                    <td style="padding-left:10px">Rs. 10</td>
                    <td style="padding-left:10px">for  3001-7000</td>
                </tr>
                 <tr>
                    <td style="padding-left:10px">Rs. 15</td>
                    <td style="padding-left:10px">for  7001 To 10000</td>
                </tr>
                  <tr>
                    <td style="padding-left:10px">Rs. 18</td>
                    <td style="padding-left:10px">for  10001 to 25000</td>
                </tr>
                 <tr>
                    <td style="padding-left:10px">Rs. 20</td>
                    <td style="padding-left:10px">for  25001 to 50000</td>
                </tr>
                <tr>
                    <td style="padding-left:10px">Rs. 25</td>
                    <td style="padding-left:10px">for  50001 to 1-L</td>
                </tr>
              </table>
              
              
             
              </div>
             </div>                   
                                                   
           </div>
          
          <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Transactions</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
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
  <script>
  function form_validate() {
      $('#amount_error').html();
      $('#ifscode_error').html();
      $('#remarks_error').html();
      var error=0;
      if (!(parseFloat($('#Amount').val())>=10 && parseFloat($('#Amount').val())<=10000)) {
          $('#amount_error').html("<br>Amount must between Rs. 10 To 10000");
          error++;
          
      }
      
      if ($('#Remarks').val().length<5) {
          $('#remarks_error').html("<br>must have minimum 5 charactor");
          error++;
          
      }
      
      var reg = /[A-Z|a-z]{4}[0][a-zA-Z0-9]{6}$/;    
      if (!($('#IFSCode').val().match(reg))) {
        $('#ifscode_error').html("<br>Enter valid IFS Code");    
        error++;    
      }
      
       
      if (error>0) {
          return false;
      }
      
      return true; 
  }
                            
  </script>
 <?php include_once("../footer.php");?>