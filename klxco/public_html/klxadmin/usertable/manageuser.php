<?php 
$obj = new CommonController();
    
            if (!($obj->isLogin())){
                echo $obj->printError("Login Session Expired. Please Login Again");
                exit;
            }
            if (isset($_POST{"updatebtn"})) {
             $user= new JUsertable();
                 echo $user->updateUser($_POST['personname'],$_POST['username'],$_POST['pwd'],$_POST['isactive'],$_POST['rowid']);
             ?>
                <script>                  
                    alert("Updated Successfully");
                    location.href='viewuser.php';
                </script>
            <?php
            exit;
         }

      if (isset($_POST{"editbtn"})) {
           $user = new JUsertable();
           $pageContent = $user->getUser($_POST['rowid']);

     ?> 

                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                Edit User
                            </div>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="rowid" value="<?php echo $pageContent[0]['userid'];?>">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Person Name</label>
                                        <div class="col-md-3"><input type="text" name="personname" size="40" style="width:250px;" value="<?php echo $pageContent[0]['personname'];?>" class="form-control"></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">User Name</label>
                                        <div class="col-md-3"><input type="text" name="username" class="form-control" value="<?php echo $pageContent[0]['username'];?>"></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Password</label>
                                        <div class="col-md-3"><input type="text" name="pwd" class="form-control" value="<?php echo $pageContent[0]['pwd'];?>"></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">IsActive</label>
                                        <div class="col-md-3"><select name="isactive" class="form-control">
                <option value='1' <?php echo ($pageContent[0]['isactive']==1) ? "selected='selected'" : "";?>>Active</option>
                <option value='0' <?php echo ($pageContent[0]['isactive']==0) ? "selected='selected'" : "";?>>In Active</option>
                </select></div>
                                    </div>
                                </div>
                                <div class="card-action">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-success" name="updatebtn">Update</button>
                                            <button type="button" class="btn btn-warning" name="cancelbtn"  onclick="location.href='https://klx.co.in/klxadmin/dashboard.php?action=usertable/viewuser'">Cancel</button>
                                        </div>                                        
                                    </div>
                                </div>
                            </form>
                                <script>$('#success').hide(3000);</script>
                               <?php
                               exit;
                              } if (isset($_POST{"viewbtn"})){
       $pageContent = JUsertable::getUser($_POST['rowid']);?>
                                <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                View User
                            </div>
                        </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">User Transcation Id</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['userid'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Name</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['personname'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">User Name</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['email'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Password</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['pwd'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Created On</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['createdon'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Is Active</label>
                                        <div class="col-md-3">
                                            <?php if ($pageContent[0]["isactive"]==1) {?>
                    <span style='color:#08912A;font-weight:bold;'>Active</span> 
                <?php } else { ?>
                    <span style='color:#FF090D;font-weight:bold;'>In Active</span> 
                <?php } ?>
                                        </div>
                                    </div>
                                    <form action='https://klx.co.in/klxadmin/dashboard.php?action=usertable/viewuser' method='post' style='height:0px;'>
                                        <input type='hidden' value='<?php echo $pageContent[0]['editbtn'];?>' name='rowid' id='rowid' >
                                        <input style='font-size:11px;' type='submit' name='editbtn' value='Edit'>                                                                                                              
                                        <input style='font-size:11px;' type="button" name="cancelbtn" value="Cancel" bgcolor="grey" onclick="location.href='https://klx.co.in/klxadmin/dashboard.php?action=usertable/viewuser'"> 
                                   </form>
                                </div>
                                <?php
                                    exit;                                                  
                                } 
                                
                                ?>
<script>$('#success').hide(3000);</script>                                                                                 
                        </div>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>


