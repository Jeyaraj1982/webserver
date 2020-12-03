<?php 
  $obj = new CommonController();
      
         
$user = new JUsertable();
$pageContent = $user->getUser($_GET['d']);
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                View User
                            </div>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="rowid" value="<?php echo $pageContent[0]['userid'];?>">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">Person Name</label>
                                    <div class="col-md-3"><?php echo $pageContent[0]['personname'];?></div>
                                </div>
                                <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">Email Address</label>
                                    <div class="col-md-3"><?php echo $pageContent[0]['email'];?></div>
                                </div>
                                <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">Mobile Number</label>
                                    <div class="col-md-3"><?php echo $pageContent[0]['mobile'];?></div>
                                </div>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-warning" name="cancelbtn"  onclick="location.href='https://klx.co.in/klxadmin/dashboard.php?action=user/listuser&f=a'">Cancel</button>
                                    </div>                                        
                                </div>
                            </div>
                        </form>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>

