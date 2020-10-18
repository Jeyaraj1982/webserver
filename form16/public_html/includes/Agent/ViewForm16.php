<?php $form= $mysql->select("Select * from _tbl_form_16 where id='".$_GET['FCode']."'");?>
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">Form16</h4>
                    </div>
                                <form method="POST" action="" enctype="multipart/form-data">
                                    <div class="card-body">
                                     <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Customer Details</div>
                                </div>
                                <div class="card-body"> 
                                <?php $member= $mysql->select("select * from `_tbl_Members` where `MemberCode`='".$form[0]['FormByCode']."'"); ?>
                                    <div class="form-group form-show-validation row" style="padding:0px">
                                        <label for="AccountName" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left"  style="font-weight:normal">Customer Name  </label>
                                        <div class="col-lg-4 col-md-9 col-sm-8">:&nbsp;<?php echo $member[0]['MemberName'];?></div>
                                    </div>
                                    <div class="form-group form-show-validation row" style="padding:0px">
                                        <label for="AccountName" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left"  style="font-weight:normal">Customer Mobile Number  </label>
                                        <div class="col-lg-4 col-md-9 col-sm-8">:&nbsp;<?php echo $member[0]['MobileNumber'];?></div>
                                    </div>
                                    <div class="form-group form-show-validation row" style="padding:0px">
                                        <label for="AccountName" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left"  style="font-weight:normal">Customer Email ID  </label>
                                        <div class="col-lg-4 col-md-9 col-sm-8">:&nbsp;<?php echo $member[0]['EmailID'];?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                                    <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="form-group form-show-validation row" style="padding:0px">
                                                <label for="Finacial Year" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left" style="font-weight:normal">Financial Year  </label>
                                                <div class="col-lg-4 col-md-9 col-sm-8">:&nbsp;<?php echo $form[0]['FinancialYear'];?></div>
                                            </div>
                                            <div class="form-group form-show-validation row" style="padding:0px">
                                                <label for="AssestmentYear" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left" style="font-weight:normal">Assessment Year  </label>
                                                <div class="col-lg-4 col-md-9 col-sm-8">:&nbsp;<?php echo $form[0]['AssestmentYear'];?></div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                        <div class="row">                            
                                                    <div class="col-md-4">
                                                        <label for="Form16" class="text-left"  style="font-weight:normal">Form16</label>
                                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                                        <?php 
                                                            $t = pathinfo(strtolower(basename($form[0]['Form16'])));
                                                            $filename = ($t['extension']=="pdf") ?  "assets/pdf.png" : "uploads/Form16/".$form[0]['FormByCode']."/".$form[0]['id']."/".$form[0]['Form16'];
                                                        ?>
                                                            <img src="<?php echo $filename; ?>" style="height:100px;max-width:110px">
                                                            <br>
                                                            <div style="text-align:center;">
                                                                <a target="blank_" href="download.php?file=<?php echo $form[0]['FormByCode']."/".$form[0]['id']."/".$form[0]['Form16'];?>" class="btn btn-warning" style="width:110px;padding: 3px 9px 3px 9px;color:#fff"><i class="fa fa-download"></i> &nbsp;Download</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="AadhaarCard" class="text-left"  style="font-weight:normal">Aadhaar Card  </label>
                                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                                        <?php  if (strlen(trim($form[0]['AadhaarNumber']))>0) {?>    
                                                <?php echo $form[0]['AadhaarNumber'];?>
                                            <?php } else { ?>
                                                        <?php 
                                                            $t = pathinfo(strtolower(basename($form[0]['AadhaarCard'])));
                                                            $filename = ($t['extension']=="pdf")  ? "assets/pdf.png" : "uploads/Form16/".$form[0]['FormByCode']."/".$form[0]['id']."/".$form[0]['AadhaarCard'];
                                                        ?>                                 
                                                            <img src="<?php echo $filename; ?>" style="height:100px;max-width:110px">
                                                            <br>
                                                            <div style="text-align:center;">
                                                                <a target="blank_" href="download.php?file=<?php echo  $form[0]['FormByCode']."/".$form[0]['id']."/".$form[0]['AadhaarCard'];?>" class="btn btn-warning" style="width:110px;padding: 3px 9px 3px 9px;color:#fff"><i class="fa fa-download"></i> &nbsp;Download</a>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="Pancard" class="text-left"  style="font-weight:normal">PanCard  </label>
                                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                                         <?php  if (strlen(trim($form[0]['PanCardNumber']))>0) {?>
                                                <?php echo $form[0]['PanCardNumber'];?>
                                            <?php } else { ?>
                                                        <?php 
                                                            $t = pathinfo(strtolower(basename($form[0]['PanCard'])));
                                                            $filename = ($t['extension']=="pdf") ? "assets/pdf.png" : "uploads/Form16/".$form[0]['FormByCode']."/".$form[0]['id']."/".$form[0]['PanCard'];
                                                        ?>                
                                                            <img src="<?php echo $filename; ?>" style="height:100px;max-width:110px">
                                                            <br>
                                                            <div style="text-align:center;">
                                                                <a target="blank_" href="download.php?file=<?php echo $form[0]['FormByCode']."/".$form[0]['id']."/".$form[0]['PanCard'];?>" class="btn btn-warning" style="width:110px;padding: 3px 9px 3px 9px;color:#fff"><i class="fa fa-download"></i> &nbsp;Download</a>
                                                            </div>
                                                            <?php }?>
                                                        </div>
                                                    </div>
                                                 </div>
                                                  <div class="row">                            
                                    <div class="col-md-4">
                                        <br>
                                       <a target="blank_" href="download.php?file=<?php echo $form[0]['FormByCode']."/".$form[0]['id']."/".$form[0]['zip_file'];?>">Download All</a>
                                    </div>
                                  </div>
                                           <!-- <div class="row">                                                                                                                                                  
                                                <div class="col-md-4">
                                                    <label for="Form16" class="text-left"  style="font-weight:normal">Form16</label>
                                                    <div class="col-lg-4 col-md-9 col-sm-8"><img src="uploads/Form16/Form16/<?php echo $form[0]['Form16'];?>" style="height:200px;width:150px"></div>
                                                    <label for="Form16" class="text-left"><button class="btn btn-info" style="padding: 3px 9px 3px 9px;"><span class="btn-label"><i class="fa fa-download"></i></span>Download</button></label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="AadhaarCard" class="text-left"  style="font-weight:normal">Aadhaar Card  </label>
                                                    <div class="col-lg-4 col-md-9 col-sm-8"><img src="uploads/Form16/AadhaarCard/<?php echo $form[0]['AadhaarCard'];?>" style="height:200px;width:150px"></div>
                                                    <label for="AadhaarCard" class="text-left"><button class="btn btn-info" style="padding: 3px 9px 3px 9px;"><span class="btn-label"><i class="fa fa-download"></i></span>Download</button></label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="Pancard" class="text-left"  style="font-weight:normal">PanCard  </label>
                                                    <div class="col-lg-4 col-md-9 col-sm-8"><img src="uploads/Form16/PanCard/<?php echo $form[0]['PanCard'];?>" style="height:200px;width:150px"></div>
                                                    <label for="Pancard" class="text-left"><button class="btn btn-info" style="padding: 3px 9px 3px 9px;"><span class="btn-label"><i class="fa fa-download"></i></span>Download</button></label>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>        
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">Bank Details</div>
                                        </div>
                                        <div class="card-body">        
                                            <div class="form-group form-show-validation row" style="padding:0px">
                                                <label for="AccountName" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left"  style="font-weight:normal">Account Name  </label>
                                                <div class="col-lg-4 col-md-9 col-sm-8">:&nbsp;<?php echo $form[0]['AccountName'];?></div>
                                            </div>
                                            <div class="form-group form-show-validation row" style="padding:0px">
                                                <label for="AccountNumber" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left" style="font-weight:normal">Account Number  </label>
                                                <div class="col-lg-4 col-md-9 col-sm-8">:&nbsp;<?php echo $form[0]['AccountNumber'];?></div>
                                            </div>
                                            <div class="form-group form-show-validation row"  style="padding:0px">
                                                <label for="AccountName" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left" style="font-weight:normal">IFSC Code </label>
                                                <div class="col-lg-4 col-md-9 col-sm-8">:&nbsp;<?php echo $form[0]['IFSCode'];?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">Personal Details</div>
                                        </div>
                                        <div class="card-body"> 
                                            <div class="form-group form-show-validation row"  style="padding:0px">
                                                <label for="Name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left" style="font-weight:normal">Name </label>
                                                <div class="col-lg-4 col-md-9 col-sm-8">:&nbsp;<?php echo $form[0]['Name'];?><br>
                                                :&nbsp;<?php echo $form[0]['FormFor'];?>&nbsp;<?php echo $form[0]['FormForName'];?>
                                                </div>
                                            </div>
                                            <div class="form-group form-show-validation row"  style="padding:0px">
                                                <label for="Email" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left" style="font-weight:normal">Gender </label>
                                                <div class="col-lg-4 col-md-9 col-sm-8" style="padding-top:8px;">:&nbsp;<?php echo $form[0]['Gender'];?></div>
                                            </div>
                                            <div class="form-group form-show-validation row"  style="padding:0px">
                                                <label for="Email" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left" style="font-weight:normal">Date of Birth </label>
                                                <div class="col-lg-4 col-md-9 col-sm-8" style="padding-top:8px;">:&nbsp;<?php echo $form[0]['DateofBirth'];?></div>
                                            </div>
                                            <div class="form-group form-show-validation row"  style="padding:0px">
                                                <label for="Email" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left" style="font-weight:normal">Mobile Number </label>
                                                <div class="col-lg-4 col-md-9 col-sm-8" style="padding-top:8px;">:&nbsp;<?php echo $form[0]['MobileNumber'];?></div>
                                            </div>
                                            <div class="form-group form-show-validation row"  style="padding:0px">
                                                <label for="Email" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left" style="font-weight:normal">Email </label>
                                                <div class="col-lg-4 col-md-9 col-sm-8">:&nbsp;<?php echo $form[0]['EmailID'];?></div>
                                            </div>
                                            <div class="form-group form-show-validation row"  style="padding:0px">
                                                <label for="Email" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left" style="font-weight:normal">AddressLine1</label>
                                                <div class="col-lg-4 col-md-9 col-sm-8">:&nbsp;<?php echo $form[0]['AddressLine1'];?>,<?php echo $form[0]['AddressLine2'];?></div>
                                            </div>
                                            <div class="form-group form-show-validation row" style="padding:0px;">
                                                <label for="Email" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left" style="font-weight:normal">City Name</label>
                                                <div class="col-lg-4 col-md-9 col-sm-8">:&nbsp;<?php echo $form[0]['CityName'];?></div>
                                            </div>
                                            <div class="form-group form-show-validation row"  style="padding:0px">
                                                <label for="Email" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left" style="font-weight:normal">Pincode</label>
                                                <div class="col-lg-4 col-md-9 col-sm-8">:&nbsp;<?php echo $form[0]['Pincode'];?></div>
                                            </div>
                                            <div class="form-group form-show-validation row"  style="padding:0px">
                                                <label for="Email" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left" style="font-weight:normal">Remarks</label>
                                                <div class="col-lg-4 col-md-9 col-sm-8">:&nbsp;<?php echo $form[0]['Remarks'];?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--<div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">        
                                            <div class="form-group form-show-validation row">                                                                  
                                                <label class="col-sm-12 text-left">
                                                    Submitted<br>
                                                    <?php echo $form[0]['CreatedOn'];?>
                                                </label>
                                            </div> 
                                            <?php if($form[0]['InProccess']==1){?> 
                                                <div class="form-group form-show-validation row">                                                                  
                                                    <label class="col-sm-12 text-left">
                                                        Accepted<br>
                                                        <?php echo $form[0]['InProccessOn'];?>
                                                    </label>
                                                </div> 
                                            <?php } ?>
                                            <?php if($form[0]['Completed']==1){?> 
                                                <div class="form-group form-show-validation row">                                                                  
                                                    <label class="col-sm-12 text-left">
                                                        Accepted<br>
                                                        <?php echo $form[0]['InProccessOn'];?>
                                                    </label>
                                                </div>
                                            <?php } ?>
                                            <?php if($form[0]['IsApproved']==1){?> 
                                                <div class="form-group form-show-validation row">                                                                  
                                                    <label class="col-sm-12 text-left">
                                                        In Process<br>
                                                        <?php echo $form[0]['VerifiedOn'];?>
                                                    </label>
                                                </div>
                                                <div class="form-group form-show-validation row">                                                                  
                                                    <label class="col-sm-12 text-left">
                                                        Completed<br>
                                                        <?php echo $form[0]['InProcessCompleteOn'];?>
                                                    </label>
                                                </div>  
                                            <?php } ?>
                                            <?php if($form[0]['IsRejected']==1){?> 
                                                <div class="form-group form-show-validation row">                                                                  
                                                    <label class="col-sm-12 text-left">
                                                        Rejected<br>
                                                        <?php echo $form[0]['VerifiedOn'];?>
                                                    </label>
                                                </div> 
                                                <div class="form-group form-show-validation row">                                                                  
                                                    <label class="col-sm-12 text-left">
                                                        Completed<br>
                                                        <?php echo $form[0]['InProcessCompleteOn'];?>
                                                    </label>
                                                </div>                                                                       
                                            <?php } ?>
                                                <?php if($form[0]['Completed']==1){?>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="AadhaarCard" class="text-left"  style="font-weight:normal">Acknowledgement</label>
                                                    <div class="col-lg-4 col-md-9 col-sm-8"><img src="uploads/Form16/<?php echo $form[0]['FormByCode'];?>/Acknowledgement_<?php echo $form[0]['Acknowledgement'];?>" style="height:200px;width:150px"></div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                </div>
                            </div>
                        </div>
                     </div>-->
                     <?php if($form[0]['Completed']==1){?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">Acknowledgement</div>
                                        </div>
                                        <div class="card-body">   
                                            <div class="row">
                                                <div class="col-sm-4">
                                                
                                                 <?php 
                                            $t = pathinfo(strtolower(basename($form[0]['Acknowledgement'])));
                                            $filename = ($t['extension']=="pdf") ? "assets/pdf.png" : "uploads/Form16/".$form[0]['FormByCode']."/".$form[0]['id']."/".$form[0]['Acknowledgement'];
                                        ?>
                                        <img src="<?php echo $filename;?>"  style="height:100px;max-width:110px">
                                        <br>
                                        <div>
                                            <a target="blank_" href="download.php?file=<?php echo  $form[0]['FormByCode']."/".$form[0]['id']."/".$form[0]['Acknowledgement']; ?>" class="btn btn-warning" style="width:110px;padding: 3px 9px 3px 9px;color:#fff"><i class="fa fa-download"></i> &nbsp;Download</a>
                                        </div>
                                        
                                                   
                                                </div>
                                            </div>      
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?> 
                     <div class="row">
                        <div class="col-md-12">
                            <div class="card full-height">
                                <div class="card-header">
                                    <div class="card-title">Activity</div>
                                </div>
                                <div class="card-body">
                                    <ol class="activity-feed">
                                    <?php
                                    $feed = $mysql->select("select * from _tbl_formlogs where FormID='".$_GET['FCode']."' order by FormLogID desc");
                                    ?>
                                    <?php foreach($feed as $f) {?>
                                    <?php
                                    $admin = $mysql->select("select * from _tbl_Admin where AdminID='".$f['UpdatedStaffID']."'");
                                    ?>
                                          <li class="feed-item feed-item-secondary">
                                            <time class="date" datetime="<?php echo printDateTime($f['ActionPerformed']);?>"><?php echo printDateTime($f['ActionPerformed']);?></time>
                                            <span class="text"><?php echo $f['ActionTitle'];?> <!--<a href="#">"Volunteer opportunity"</a> --></span><br>
                                            <span class="text">User Remarks  &nbsp;&nbsp;&nbsp;: <?php echo $f['UserRemarks'];?></span>  <br>
                                            <span class="text">Activity Done By : <?php echo ($admin[0]['IsAdmin']==1) ? 'Admin' : 'Staff';?></span> <br>
                                            <span class="text"><?php echo ($admin[0]['IsAdmin']==1) ? 'Admin Name' : 'Staff Name';?>&nbsp;&nbsp;&nbsp;:<?php echo $f['UpdatedStaffName'];?></span> <br>
                                        </li>
                                    <?php } ?>
                                       <!-- <li class="feed-item feed-item-secondary">
                                            <time class="date" datetime="9-25">Sep 25</time>
                                            <span class="text">Responded to need <a href="#">"Volunteer opportunity"</a></span>
                                        </li>
                                        <li class="feed-item feed-item-success">
                                            <time class="date" datetime="9-24">Sep 24</time>
                                            <span class="text">Added an interest <a href="#">"Volunteer Activities"</a></span>
                                        </li>
                                        <li class="feed-item feed-item-info">
                                            <time class="date" datetime="9-23">Sep 23</time>
                                            <span class="text">Joined the group <a href="single-group.php">"Boardsmanship Forum"</a></span>
                                        </li>
                                        <li class="feed-item feed-item-warning">
                                            <time class="date" datetime="9-21">Sep 21</time>
                                            <span class="text">Responded to need <a href="#">"In-Kind Opportunity"</a></span>
                                        </li>
                                        <li class="feed-item feed-item-danger">
                                            <time class="date" datetime="9-18">Sep 18</time>
                                            <span class="text">Created need <a href="#">"Volunteer Opportunity"</a></span>
                                        </li>
                                        <li class="feed-item">
                                            <time class="date" datetime="9-17">Sep 17</time>
                                            <span class="text">Attending the event <a href="single-event.php">"Some New Event"</a></span>
                                        </li>  -->
                                    </ol>
                                </div>
                            </div>
                        </div>
                         
                    </div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a href="dashboard.php?action=ManageForm16&Status=All">Back</a>
                                            </div>                                        
                                        </div>                                                                             
                                    </div>
                                </form>
                </div>
            </div>
             
        </div>
    </div>
 <iframe style="height:0px;width:0px;" name="blank_"></iframe>