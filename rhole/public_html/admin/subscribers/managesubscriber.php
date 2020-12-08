<?php 
$obj = new CommonController();  
          /*  if (!($obj->isLogin())){
                echo $obj->printError("Login Session Expired. Please Login Again");
                exit;
            }           */
             
                        if (isset($_POST{"viewbtn"})){
                                $pageContent = JSubscriber::getSubscriber($_POST['rowid']);?>
                                <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                View Subscriber
                            </div>
                        </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Subscriber Name</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['subscribname'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Subscriber Mobile Number</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['subscribmob'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Subscriber Email Address</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['subscribemail'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Others</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['others'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Posted On</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['postedon'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Last Modified</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['lastmodified'];?></div>
                                    </div>
                                    <form action='<?php echo AppUrl;?>/admin/dashboard.php?action=faq/managefaq' method='post' style='height:0px;'>
                                        <input type='hidden' value='<?php echo $pageContent[0]['subscribid'];?>' name='rowid' id='rowid' >
                                        <input style='font-size:11px;' type="button" name="cancelbtn" value="Cancel" bgcolor="grey" onclick="location.href='<?php echo AppUrl;?>/admin/dashboard.php?action=subscribers/viewsubscriber'"> 
                                   </form>
                             </div>      
                                <?php
                                 exit;
      }
      if(isset($_POST{"cdeletebtn"})){
          
       $pageContent = JSubscriber::getSubscriber($_POST['rowid']); 
       echo CommonController::printSuccess("Deleted Successfully");
       echo "<script>setTimeout(\"window.open('viewsubscriber.php','rpanel')\",1500);</script>"; 
      }
      
      if (isset($_POST{"deletebtn"})){
          
       $pageContent = JSubscriber::getSubscriber($_POST['rowid']);
                                ?>
                                <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                View Subscriber
                            </div>
                        </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Subscriber Name</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['subscribname'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Subscriber Mobile Number</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['subscribmob'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Subscriber Email Address</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['subscribemail'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Others</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['others'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Posted On</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['postedon'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Last Modified</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['lastmodified'];?></div>
                                    </div>
                                    <form action='<?php echo AppUrl;?>/admin/dashboard.php?action=faq/managefaq' method='post' style='height:0px;'>
                                        <input type='hidden' value='<?php echo $pageContent[0]['subscribid'];?>' name='rowid' id='rowid' >
                                        <input style='font-size:11px;' type="button" name="cdeletebtn" value="Cancel" bgcolor="grey"> 
                                        <input style='font-size:11px;' type="button" name="cancelbtn" value="Cancel" bgcolor="grey" onclick="location.href='<?php echo AppUrl;?>/admin/dashboard.php?action=subscribers/viewsubscriber'"> 
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


