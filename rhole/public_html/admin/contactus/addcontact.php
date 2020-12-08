<?php
    $obj = new CommonController();
            
          /*  if (!($obj->isLogin())){
                echo $obj->printError("Login Session Expired. Please Login Again");
                exit;
            } */ 
            if(isset($_POST{"save"})) {
                
                $param=array("mobileno"=>$_POST['mobileno'],"email"=>$_POST['email'],"personname"=>$_POST['personname'],"subject"=>$_POST['subject'],"content"=>$_POST['content'],"convtime"=>$_POST['convtime']);
                
                if ($obj->isEmptyField($_POST['personname'])) {
                echo $obj->printError("Name Shouldn't be blank");
                }
                if ($obj->isEmptyField($_POST['mobileno'])) {
                echo $obj->printError("Mobileno Shouldn't be blank");
                } 
                if ($obj->isEmptyField($_POST['email'])) {
                echo $obj->printError("Mobileno Shouldn't be blank");
                } 
                if ($obj->isEmptyField($_POST['subject'])) {
                echo $obj->printError("Subject Shouldn't be blank");
                } 
                if ($obj->isEmptyField($_POST['content'])) {
                echo $obj->printError("Content Shouldn't be blank");
                }  
                if ($obj->isEmptyField($_POST['convtime'])) {
                echo $obj->printError("Convenient Time Shouldn't be blank");
                } 
                
               if ($obj->err==0) {
               echo (JContactus::addContactus($param)>0) ? $obj->printSuccess("Contacts added successfully") : $obj->printError("Error adding Contacts");
          
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
                               Add Contact
                            </div>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="Title" class="col-md-3 text-right">Name</label>
                                    <div class="col-md-3"><input type="text" name="personname" style="width:100%;" value="<?php echo isset($_POST['personname']) ? $_POST['personname'] : ""; ?>" autocomplete="off" class="form-control"></div>
                                </div>
                                <div class="form-group row">
                                    <label for="Title" class="col-md-3 text-right">Mobile No.</label>
                                    <div class="col-md-3"><input type="text" name="mobileno" style="width:100%;" value="<?php echo isset($_POST['mobileno']) ? $_POST['mobileno'] : ""; ?>" autocomplete="off" class="form-control"></div>
                                </div>
                                <div class="form-group row">
                                    <label for="Title" class="col-md-3 text-right">Email Id</label>
                                    <div class="col-md-3"><input type="text" name="email" style="width:100%;" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ""; ?>" autocomplete="off" class="form-control"></div>
                                </div>
                                <div class="form-group row">
                                    <label for="Title" class="col-md-3 text-right">Subject</label>
                                    <div class="col-md-3"><input type="text" name="subject" style="width:100%;" value="<?php echo isset($_POST['subject']) ? $_POST['subject'] : ""; ?>" autocomplete="off" class="form-control"></div>
                                </div>
                                <div class="form-group row">
                                    <label for="Title" class="col-md-3 text-right">Content</label>
                                    <div class="col-md-3"><input type="text" name="content" style="width:100%;" value="<?php echo isset($_POST['content']) ? $_POST['content'] : ""; ?>" autocomplete="off" class="form-control"></div>
                                </div>
                                <div class="form-group row">
                                    <label for="Title" class="col-md-3 text-right">Convenoent Time</label>
                                    <div class="col-md-3"><input type="text" name="convtime" style="width:100%;" value="<?php echo isset($_POST['convtime']) ? $_POST['convtime'] : ""; ?>" autocomplete="off" class="form-control"></div>
                                </div>
                               <div class="form-group row">
                                    <div class="col-md-12" style="text-align: center;color:red"><?php echo $error;?></div>
                               </div>     
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success" name="save">save</button>
                                        <button type="button" class="btn btn-warning" onclick="location.href='<?php echo AppUrl;?>/admin/dashboard.php?action=contactus/viewcontact'">Cancel</button>
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