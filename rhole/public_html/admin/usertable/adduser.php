<?php
    $obj = new CommonController();
          
                if (!(CommonController::isLogin())){
                echo CommonController::printError("Login Session Expired. Please Login Again");
                exit;
            }
  
   if(isset($_POST{"save"})) { 
        
              if(CommonController::isEmptyField($_POST['personname']) || CommonController::isEmptyField($_POST['username'])||CommonController::isEmptyField($_POST['pwd'])) {
                       echo CommonController::printError ("All Fields are Required"); 
                } 
                 
              else if(JUsertable::addUser($_POST['personname'],$_POST['username'],$_POST['pwd'],$_POST['isactive'])>0){
                        echo  CommonController::printSuccess("User added successfully");        
                } else {
                        echo CommonController::printError("Error Adding User"); 
                }                 
  } 
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                               Add User
                            </div>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="Title" class="col-md-3 text-right">Name</label>
                                    <div class="col-md-3"><input type="text" name="personname" style="width:100%;" value="<?php echo isset($_POST['personname']) ? $_POST['personname'] : ""; ?>" autocomplete="off" class="form-control"></div>
                                </div>
                                <div class="form-group row">
                                    <label for="Title" class="col-md-3 text-right">User Name</label>
                                    <div class="col-md-3"><input type="text" name="username" style="width:100%;" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ""; ?>" autocomplete="off" class="form-control"></div>
                                </div>
                                <div class="form-group row">
                                    <label for="Title" class="col-md-3 text-right">Password</label>
                                    <div class="col-md-3"><input type="text" name="pwd" style="width:100%;" value="<?php echo isset($_POST['pwd']) ? $_POST['pwd'] : ""; ?>" autocomplete="off" class="form-control"></div>
                                </div>
                                <div class="form-group row">
                                    <label for="Title" class="col-md-3 text-right">Is Active</label>
                                    <div class="col-md-3"><select name="isactive"><option value="1">Yes</option><option value="0">No</option></select></div>
                                </div>
                                
                               <div class="form-group row">
                                    <div class="col-md-12" style="text-align: center;color:red"><?php echo $error;?></div>
                               </div>     
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success" name="save">save</button>
                                        <button type="button" class="btn btn-warning" onclick="location.href='<?php echo AppUrl;?>/admin/dashboard.php?action=usertable/viewuser'">Cancel</button>
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
<script>$('#success').hide(3000);</script>  