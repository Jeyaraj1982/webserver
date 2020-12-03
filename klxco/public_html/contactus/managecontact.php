<?php 
$obj = new CommonController();  
        $obj = new CommonController();  
            if (!($obj->isLogin())){
                echo $obj->printError("Login Session Expired. Please Login Again");
                exit;
            }
     
      if (isset($_POST{"viewbtn"})){
           
      $pageContent = JContactus::getContactus($_POST['rowid']); ?>
                                <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                View Contact
                            </div>
                        </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Name</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['personname'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Mobile Number</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['contmob'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Email Address</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['contemail'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Subject</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['subject'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Content</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['content'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Convenient Time</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['convtime'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Posted On</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['postedon'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Last Modified</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['lastmodified'];?></div>
                                    </div>
                                    <form action='https://klx.co.in/klxadmin/dashboard.php?action=contactus/managecontact' method='post' style='height:0px;'>
                                        <input type='hidden' value='<?php echo $pageContent[0]['contid'];?>' name='rowid' id='rowid' >
                                        <input style='font-size:11px;' type="button" name="cancelbtn" value="Cancel" bgcolor="grey" onclick="location.href='https://klx.co.in/klxadmin/dashboard.php?action=contactus/viewcontact'"> 
                                   </form>
                             </div>      
                                <?php
                           exit;
      }
      if(isset($_POST{"cdeletebtn"})){
          
       $pageContent = JContactus::deleteContactus($_POST['rowid']); 
       echo CommonController::printSuccess("Deleted Successfully");
       echo "<script>setTimeout(\"window.open('viewcontact.php','rpanel')\",1500);</script>"; 
      }
      
      if (isset($_POST{"deletebtn"})){
          
       $pageContent = JContactus::getContactus($_POST['rowid']);
                                ?>
                                <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                Delete Contact
                            </div>
                        </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Name</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['personname'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Mobile Number</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['contmob'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Email Address</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['contemail'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Subject</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['subject'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Content</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['content'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Convenient Time</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['convtime'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Posted On</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['postedon'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Last Modified</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['lastmodified'];?></div>
                                    </div>
                                    <form action='https://klx.co.in/klxadmin/dashboard.php?action=contactus/managecontact' method='post' style='height:0px;'>
                                        <input type='hidden' value='<?php echo $pageContent[0]['contid'];?>' name='rowid' id='rowid' >
                                        <input style='font-size:11px;' type='submit' name='editbtn' value='Edit'>
                                        <input style='font-size:11px;' type='submit' name='cdeletebtn' value='Delete'>
                                        <input style='font-size:11px;' type="button" name="cancelbtn" value="Cancel" bgcolor="grey" onclick="location.href='https://klx.co.in/klxadmin/dashboard.php?action=contactus/viewcontact'"> 
                                   </form>
                             </div>      
                                  <?php } ?>
<script>$('#success').hide(3000);</script>                                                                                 
                        </div>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>


