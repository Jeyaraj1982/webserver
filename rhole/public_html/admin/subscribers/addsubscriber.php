<?php
    $obj = new CommonController();
            
      /*  if (!($obj->isLogin())){
            echo $obj->printError("Login Session Expired. Please Login Again");
            exit;
        }       */
        
   if (isset($_POST{"save"})) {
       
       $param=array("subscribname"=>$_POST['subscribername'],"subscribemail"=>$_POST['subscriberemail'],"subscribmobile"=>$_POST['subscribermobile'],"others"=>$_POST['others']);
       
       if ($obj->isEmptyField($_POST['subscribername'])) {
        echo $obj->printError("SubscriberName Shouldn't be blank");
        }
        if ($obj->isEmptyField($_POST['subscriberemail'])) {
        echo $obj->printError("Subscriber Email Address Shouldn't be blank");
        } 
        if ($obj->isEmptyField($_POST['subscribermobile'])) {
        echo $obj->printError("Subscriber Mobile Number Shouldn't be blank");
        } 

        if ($obj->err==0) {
            echo (JSubscriber::addSubscriber($param)>0) ? $obj->printSuccess("Subscriber added successfully") : $obj->printError("Error adding Subscriber");
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
                               Add Subscribers
                            </div>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="Title" class="col-md-3 text-right">Name</label>
                                    <div class="col-md-3"><input type="text" name="subscribername" style="width:100%;" value="<?php echo isset($_POST['subscribername']) ? $_POST['subscribername'] : ""; ?>" autocomplete="off" class="form-control"></div>
                                </div>
                                <div class="form-group row">
                                    <label for="Title" class="col-md-3 text-right">Email ID</label>
                                    <div class="col-md-3"><input type="text" name="subscriberemail" style="width:100%;" value="<?php echo isset($_POST['subscriberemail']) ? $_POST['subscriberemail'] : ""; ?>" autocomplete="off" class="form-control"></div>
                                </div>
                                <div class="form-group row">
                                    <label for="Title" class="col-md-3 text-right">Mobile No.</label>
                                    <div class="col-md-3"><input type="text" name="subscribermobile" style="width:100%;" value="<?php echo isset($_POST['subscribermobile']) ? $_POST['subscribermobile'] : ""; ?>" autocomplete="off" class="form-control"></div>
                                </div>
                                <div class="form-group row">
                                    <label for="Title" class="col-md-3 text-right">Others</label>
                                    <div class="col-md-3"><input type="text" name="others" style="width:100%;" value="<?php echo isset($_POST['others']) ? $_POST['others'] : ""; ?>" autocomplete="off" class="form-control"></div>
                                </div>
                               <div class="form-group row">
                                    <div class="col-md-12" style="text-align: center;color:red"><?php echo $error;?></div>
                               </div>     
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success" name="save">save</button>
                                        <button type="button" class="btn btn-warning" onclick="location.href='<?php echo AppUrl;?>/admin/dashboard.php?action=subscribers/viewsubscriber'">Cancel</button>
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