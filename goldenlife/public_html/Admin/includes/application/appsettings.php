 
       <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-display1 icon-gradient bg-premium-dark">
                                    </i>
                                </div>
                                <div>Change Password
                                </div>
                            </div>
                        </div>
                    </div>        
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade active show" id="tab-content-1" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"><h5 class="card-title">Application Setttings</h5>
                                        <form method="post" action="">
                                            <div>
                                                <div class="form-group row">
                                                   <div class="col-sm-3">Member Prefix</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="MemberPrefix" id="MemberPrefix" placeholder="Member Prefix" class="form-control" value="<?php echo (isset($_POST['CurrentPassword']) ? $_POST['CurrentPassword'] : "");?>">
                                                        <span class="errorstring" id="ErrCurrentPassword"><?php echo isset($ErrCurrentPassword)? $ErrCurrentPassword : "";?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-3">Member Code Length</div>
                                                    <div class="col-sm-9">
                                                        <input type="password" name="NewPassword" id="NewPassword" placeholder="New Password" class="form-control" value="<?php echo (isset($_POST['NewPassword']) ? $_POST['NewPassword'] : "");?>">
                                                        <span class="errorstring" id="ErrNewPassword"><?php echo isset($ErrNewPassword)? $ErrNewPassword : "";?></span>
                                                    </div>
                                                </div>
                                                
                                                 <div class="form-group row">
                                                   <div class="col-sm-3">Epin Prefix</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="MemberPrefix" id="MemberPrefix" placeholder="Member Prefix" class="form-control" value="<?php echo (isset($_POST['CurrentPassword']) ? $_POST['CurrentPassword'] : "");?>">
                                                        <span class="errorstring" id="ErrCurrentPassword"><?php echo isset($ErrCurrentPassword)? $ErrCurrentPassword : "";?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-3">Epin Code Length</div>
                                                    <div class="col-sm-9">
                                                        <input type="password" name="NewPassword" id="NewPassword" placeholder="New Password" class="form-control" value="<?php echo (isset($_POST['NewPassword']) ? $_POST['NewPassword'] : "");?>">
                                                        <span class="errorstring" id="ErrNewPassword"><?php echo isset($ErrNewPassword)? $ErrNewPassword : "";?></span>
                                                    </div>
                                                </div>
                                                 <div class="form-group row">
                                                   <div class="col-sm-3">Epin Password Length</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="MemberPrefix" id="MemberPrefix" placeholder="Member Prefix" class="form-control" value="<?php echo (isset($_POST['CurrentPassword']) ? $_POST['CurrentPassword'] : "");?>">
                                                        <span class="errorstring" id="ErrCurrentPassword"><?php echo isset($ErrCurrentPassword)? $ErrCurrentPassword : "";?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-3">Member Code Length</div>
                                                    <div class="col-sm-9">
                                                        <input type="password" name="NewPassword" id="NewPassword" placeholder="New Password" class="form-control" value="<?php echo (isset($_POST['NewPassword']) ? $_POST['NewPassword'] : "");?>">
                                                        <span class="errorstring" id="ErrNewPassword"><?php echo isset($ErrNewPassword)? $ErrNewPassword : "";?></span>
                                                    </div>
                                                </div>
                                                <hr>
                                                
                                                  <div class="form-group row">
                                                   <div class="col-sm-3">Level 1</div>
                                                    <div class="col-sm-9">
                                                        <input type="password" name="NewPassword" id="NewPassword" placeholder="New Password" class="form-control" value="<?php echo (isset($_POST['NewPassword']) ? $_POST['NewPassword'] : "");?>">
                                                        <span class="errorstring" id="ErrNewPassword"><?php echo isset($ErrNewPassword)? $ErrNewPassword : "";?></span>
                                                    </div>
                                                </div>
                                                
                                                   <div class="form-group row">
                                                   <div class="col-sm-3">Level 2</div>
                                                    <div class="col-sm-9">
                                                        <input type="password" name="NewPassword" id="NewPassword" placeholder="New Password" class="form-control" value="<?php echo (isset($_POST['NewPassword']) ? $_POST['NewPassword'] : "");?>">
                                                        <span class="errorstring" id="ErrNewPassword"><?php echo isset($ErrNewPassword)? $ErrNewPassword : "";?></span>
                                                    </div>
                                                </div>
                                                
                                                   <div class="form-group row">
                                                   <div class="col-sm-3">Level 3</div>
                                                    <div class="col-sm-9">
                                                        <input type="password" name="NewPassword" id="NewPassword" placeholder="New Password" class="form-control" value="<?php echo (isset($_POST['NewPassword']) ? $_POST['NewPassword'] : "");?>">
                                                        <span class="errorstring" id="ErrNewPassword"><?php echo isset($ErrNewPassword)? $ErrNewPassword : "";?></span>
                                                    </div>
                                                </div>
                                                
                                                   <div class="form-group row">
                                                   <div class="col-sm-3">Level 4</div>
                                                    <div class="col-sm-9">
                                                        <input type="password" name="NewPassword" id="NewPassword" placeholder="New Password" class="form-control" value="<?php echo (isset($_POST['NewPassword']) ? $_POST['NewPassword'] : "");?>">
                                                        <span class="errorstring" id="ErrNewPassword"><?php echo isset($ErrNewPassword)? $ErrNewPassword : "";?></span>
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                                
                                                <div class="form-group row">
                                                   <div class="col-sm-12" style="text-align:center;color:green"><?php echo $successMessage ;?></div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-12"><button class="mb-2 mr-2 btn btn-gradient-primary" name="ChangePassword">Update Settings</button></div>
                                                </div>
                                            </div>
                                         </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
 <?php include_once("footer.php");?>             