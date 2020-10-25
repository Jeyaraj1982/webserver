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
          <div class="col-md-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Whats API Settings</h3>
              </div>
              <div class="card-body">
                <form role="form" action="" method="post">
                  <div class="row">
                    <div class="col-sm-12"> 
                     <?php if ($_SESSION['user']['transactionsms']==0)  {?>
              To enable this service please contact administrator
              <?php } else {?>
                        <div class="form-group">
                        <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">apiusername</span>
                  </div>
                  <input type="text" class="form-control" value="<?php echo $_SESSION['user']['apiusername'];?>" placeholder="Username">
                </div>
                
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">apipassword</span>
                  </div>
                  <input type="text" class="form-control" value="<?php echo $_SESSION['user']['apipassword'];?>" placeholder="Username">
                </div>
                
                 <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">allow ip address</span>
                  </div>
                  <input type="text" class="form-control" value="<?php echo $_SESSION['user']['ipaddress'];?>" placeholder="accept all ip use '*' or give server ip 10.10.10.1">
                </div> 
                <?php } ?>
                    </div>
                  </div>
                 </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid"> 
        <div class="row">
          <div class="col-md-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">SMS API </h3>
              </div>
              <div class="card-body">
                <form role="form" action="" method="post">
                  <div class="row">
                    <div class="col-sm-12"> 
                     <?php if ($_SESSION['user']['transactionsms']==0)  {?>
              To enable this service please contact administrator
              <?php } else {?>
                        <div class="form-group">
                      
                
                 
                <strong>send sms api</strong>
                    <p class="text-muted">
                            <br>live url: </b>https://www.aaranju.in/whatsapp/<br>
                            
                            post params<br>
                            
                            username<br>
                            password<br>
                            sendto<br>
                            sendfrom<br>
                            textmsaage<br>
                            mediapath<br>
                    </p> 
                    
                     <strong>get balance</strong>
                    <p class="text-muted">
                            http://www.aaranju.in/whatsapp/api_balance.php?apiusername=&lt;password&gt;&apipassword=&lt;password&gt;
                    </p> 
                    
                    <strong>get numbers</strong>
                    <p class="text-muted">
                            http://www.aaranju.in/whatsapp/api_senderids.php?username=&lt;password&gt;&apipassword=&lt;password&gt;
                    </p>      
                        </div>
                <?php } ?>
                    </div>
                  </div>
                 </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<?php include_once("../footer.php");?>