<?php 
$obj = new CommonController();  
          /*  if (!($obj->isLogin())){
                echo $obj->printError("Login Session Expired. Please Login Again");
                exit;
            }    */

     if(isset($_POST{"updatebtn"})) {
         
         if ($obj->isEmptyField($_POST['faqquestion'])) {
             echo $obj->printError("FAQ Question Shouldn't be blank");
         }
         
         if ($obj->isEmptyField($_POST['faqanswer'])) {
             echo $obj->printError("FAQ Answer Shouldn't be blank");
         }
         $param = array("faqid"=>$_POST['rowid'],"faqquestion"=>$_POST['faqquestion'],"faqanswer"=>str_replace("'","\\'",$_POST['faqanswer']),"ispublished"=>$_POST['ispublished']);
               
         if ($obj->err==0) {
             echo (JFaq::updateFaq($param)>0) ? $obj->printSuccess("FAQ Updated  Successfully") : $obj->printError("Error Updating FAQs");
         }else {
            echo $obj->printErrors();
         }
         $_POST{"editbtn"}="editbtn";       
      
     } 
      
      if (isset($_POST{"editbtn"})){
          
       $pageContent = JFaq::getFaq($_POST['rowid']);
     ?> 

                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                Edit Faqs
                            </div>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="rowid" value="<?php echo $pageContent[0]['faqid'];?>">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Questions</label>
                                        <div class="col-md-3"><input type="text" name="faqquestion" style="width:100%;" value="<?php echo $pageContent[0]['faqques'];?>" class="form-control"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12"><textarea name="faqanswer" style="height: 350px;width:100%" class="form-control"><?php echo $pageContent[0]['faqans'];?></textarea></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Is Publish? </label>
                                        <div class="col-md-3">
                                            <select name="ispublished" class="form-control"><option value='1' <?php echo ($pageContent[0]["ispublished"]) ? 'selected="selected"' : '';?>>Yes</option><option value='0' <?php echo ($pageContent[0]["ispublished"]!=1) ? 'selected="selected"' : '';?>>No</option></select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Posted On</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['postedon'];?></div>
                                    </div>
                                </div>
                                <div class="card-action">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-success" name="updatebtn">Update</button>
                                            <button type="button" class="btn btn-warning" name="cancelbtn"  onclick="location.href='<?php echo AppUrl;?>/admin/dashboard.php?action=faq/viewfaq'">Cancel</button>
                                        </div>                                        
                                    </div>
                                </div>
                            </form>
                                <script>$('#success').hide(3000);</script>
                               <?php
                               exit;
                              } if (isset($_POST{"viewbtn"})){
       
                                 $pageContent = JFaq::getFaq($_POST['rowid']);?>
                                <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                View Faq
                            </div>
                        </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Faq Question</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['faqques'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Faql Answer</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['faqans'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Is Published</label>
                                        <div class="col-md-3"><?php echo ($pageContent[0]["ispublished"])  ? "<span style='color:#08912A;font-weight:bold;'>Published</span>" : "<span style='color:#FF090D;font-weight:bold;'>Un Published</span>"; ?></div>
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
                                        <input type='hidden' value='<?php echo $pageContent[0]['faqid'];?>' name='rowid' id='rowid' >
                                        <input style='font-size:11px;' type='submit' name='editbtn' value='Edit'>                                                                                                              
                                        <input style='font-size:11px;' type="button" name="cancelbtn" value="Cancel" bgcolor="grey" onclick="location.href='<?php echo AppUrl;?>/admin/dashboard.php?action=faq/viewfaq'"> 
                                   </form>
                             </div>      
                                <?php
                                    exit;                                                  
                                } 
                              if(isset($_POST{"cdeletebtn"})){
          
       $pageContent = JFaq::deleteFaq($_POST['rowid']); 
       echo CommonController::printSuccess("Deleted Successfully");
       echo "<script>setTimeout(\"window.open('viewfaq.php','rpanel')\",1500);</script>"; 
      }
      
      if (isset($_POST{"deletebtn"})){
          
       $pageContent = JFaq::getFaq($_POST['rowid']);
                                ?>
                                <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                Delete FAQs
                            </div>
                        </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Faq Question</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['faqques'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Faql Answer</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['faqans'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Is Published</label>
                                        <div class="col-md-3"><?php echo ($pageContent[0]["ispublished"])  ? "<span style='color:#08912A;font-weight:bold;'>Published</span>" : "<span style='color:#FF090D;font-weight:bold;'>Un Published</span>"; ?></div>
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
                                        <input type="hidden" name="rowid" value="<?php echo $pageContent[0]['faqid'];?>"> 
                                        <input style='font-size:11px;' type='submit' name='cdeletebtn' value='Delete'>                                                                                                              
                                        <input style='font-size:11px;' type="button" name="cancelbtn" value="Cancel" bgcolor="grey" onclick="location.href='<?php echo AppUrl;?>/admin/dashboard.php?action=faq/viewfaq'"> 
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


