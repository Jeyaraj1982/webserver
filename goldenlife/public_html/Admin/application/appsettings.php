 
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-title">
                                        Application Setttings
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
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
                                       <div class="col-sm-12"><button class="btn btn-primary" name="Settings">Update Settings</button></div>
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
 

