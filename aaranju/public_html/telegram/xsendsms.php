<?php include_once("../header.php");?>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Transactional SMS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo url;?>/dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Transactional SMS</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Send SMS</h3>
              </div>
              <div class="card-body">
                <?php if ($_SESSION['user']['transactionsms']==0)  {?>
              To enable this service please contact administrator
              <?php } else {?>
              <?php
                if (isset($_POST['sendBtn'])) {
                   //http://sms.j2jsoftwaresolutions.com/api/sendmsg.php?user=j2jsoftwaresolutions&pass=123&sender=JAKRMY&phone=9944872965&text=Test%20SMS&priority=ndnd&type=ndnd&smstype=normal 
                   if (isset($_POST['mobilenumber']) && $_POST['mobilenumber']<9999999999 && $_POST['mobilenumber']>6000000000) {
                       if (isset($_POST['message']) && strlen($_POST['message'])>0) {
                         InternationalSMS::sendsms($_POST['mobilenumber'],$_POST['message'],"","0",$_SESSION['user']['userid'],"Panel");        
                         ?>
                         <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Success</h5>
                  message has been sent successfully.
                </div>
                         <?php
                        unset($_POST);
                       } else {
                          $message_error =  "Error: message is empty"; 
                       }
                   } else {
                       $mobile_error = "Error: Invalid mobile number";
                   }
                }
              ?>
                <form role="form" action="" method="post">
                  <div class="row">
                    <div class="col-sm-6"> 
                    <div class="form-group">
                      <!--  <label>Sender ID</label>
                        <?php $senderids= $mysql->select("select * from _senderid where userid='".$_SESSION['user']['userid']."'"); ?>
                        <select name="senderid" class="custom-select">
                        <?php foreach($senderids as $senderid) {?>
                        <option value="<?php echo  $senderid['sendername'];?>"><?php echo  $senderid['sendername'];?></option>
                        <?php } ?>
                        </select> -->
                      </div>
                    </div>
                    <div class="col-sm-6"> 
                    <div class="form-group">
                        <label>Available Credits</label>
                        <input type="text" readonly="readonly" class="form-control" value="<?php echo InternationalSMS::getBalanceInternationalSMS($_SESSION['user']['userid']);  ?>" style="text-align:right">
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
                        <label>Message</label>
                        <textarea name="message" class="form-control <?php echo isset($message_error) ? 'is-warning' : '';?>" rows="3" placeholder="Enter message ..."><?php echo isset($_POST['message']) ? $_POST['message'] : '';?></textarea>
                      </div>
                    </div>
                  </div>
                <div class="card-footer" style="padding:0px;background:#fff">
                  <button type="submit" name="sendBtn" class="btn btn-info">Send SMS</button>
                  <button type="reset" class="btn btn-default float-right">Reset</button>
                </div>
                 </form>
                 
                <?php } ?> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
 <?php include_once("../footer.php");?>