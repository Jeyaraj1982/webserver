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
                <h3 class="card-title">Sender ID</h3>
              </div>
              <div class="card-body">
                <?php if ($_SESSION['user']['transactionsms']==0)  {?>
              To enable this service please contact administrator
              <?php } else {?>
                <form role="form" action="" method="post">
                  <div class="row">
                    <div class="col-sm-6"> 
                    <div class="form-group">
                        <label>Sender ID</label>
                        <?php $senderids= $mysql->select("select * from _senderid where userid='".$_SESSION['user']['userid']."'"); ?>
                        <select name="senderid" class="custom-select" multiple="5">
                        <?php foreach($senderids as $senderid) {?>
                        <option value="<?php echo  $senderid['sendername'];?>"><?php echo  $senderid['sendername'];?></option>
                        <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6"> 
                    <div class="form-group">
                        <label>Available Credits</label>
                        <input type="text" readonly="readonly" class="form-control" value="<?php echo SMS::getTransactionSMSCredits($_SESSION['user']['userid']);  ?>" style="text-align:right">
                      </div>
                    </div>
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