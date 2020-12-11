<?php
    if (isset($_POST['updateBtn'])) {
        $mysql->execute("update `_tbl_Settings_Params` set `ParamValue`='".$_POST['MemberCodePrefix']."' where ParamCode='MemberCodePrefix'");  
        $mysql->execute("update `_tbl_Settings_Params` set `ParamValue`='".$_POST['MemberCodeLength']."' where ParamCode='MemberCodeLength'");  
        //$mysql->execute("update `_tbl_Settings_Params` set `ParamValue`='".$_POST['EpinPrefix']."' where ParamCode='EpinPrefix'");  
        $mysql->execute("update `_tbl_Settings_Params` set `ParamValue`='".$_POST['EpinLength']."' where ParamCode='EpinLength'");  
        $mysql->execute("update `_tbl_Settings_Params` set `ParamValue`='".$_POST['EpinPwdLength']."' where ParamCode='EpinPwdLength'");  
        
        $mysql->execute("update `_tbl_Settings_Params` set `ParamValue`='".$_POST['IsMobileIsMandatory']."' where ParamCode='IsMobileIsMandatory'");  
        $mysql->execute("update `_tbl_Settings_Params` set `ParamValue`='".$_POST['AllowDuplicateMobile']."' where ParamCode='AllowDuplicateMobile'");  
        $mysql->execute("update `_tbl_Settings_Params` set `ParamValue`='".$_POST['AllowDuplicateEmail']."' where ParamCode='AllowDuplicateEmail'");  
        $mysql->execute("update `_tbl_Settings_Params` set `ParamValue`='".$_POST['IsEmailMandatory']."' where ParamCode='IsEmailMandatory'");  
        $mysql->execute("update `_tbl_Settings_Params` set `ParamValue`='".$_POST['AllowDuplicatePanCard']."' where ParamCode='AllowDuplicatePanCard'");  
        $mysql->execute("update `_tbl_Settings_Params` set `ParamValue`='".$_POST['IsPanCardIsMandatory']."' where ParamCode='IsPanCardIsMandatory'");  
        ?>
        <script>
            $(document).ready(function() {
                swal("General Settings updated", {
                    icon : "success" 
                });
            });
        </script>
        <?php
    }
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Setttings/GeneralSettings">Settings</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Setttings/GeneralSettings">General Settings</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <?php include_once("includes/".UserRole."/Settings/sub_menu.php"); ?>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="">
                        <h4 class="card-title text-orange"><i class="ti-user"></i>General Settings</h4>
                        <div class="row mb15">
                            <div class="col-md-12 col-xs-12 b-r">
                                <span style="color:green;">&nbsp;</span>
                            </div>
                        </div>
                        <?php $settings = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('MemberCodePrefix')"); ?>                                    
                        <div class="row mb15"> 
                            <div class="col-md-12 col-xs-6 b-r">
                                <strong><?php echo $settings[0]['ParamLabel'];?></strong>
                                <br>
                                <input type="text" name="MemberCodePrefix" id="MemberCodePrefix" class="form-control" value="<?php echo $settings[0]['ParamValue'];?>">
                            </div>
                        </div>
                        <?php $settings = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('MemberCodeLength')"); ?>                                    
                        <div class="row mb15"> 
                            <div class="col-md-12 col-xs-6 b-r">
                                <strong><?php echo $settings[0]['ParamLabel'];?></strong>
                                <br>
                                <input type="text" name="MemberCodeLength" id="MemberCodeLength" class="form-control" value="<?php echo $settings[0]['ParamValue'];?>">
                            </div>
                        </div> 
                        <?php $settings = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('EpinPrefix')"); ?>       
                       <!-- <div class="row mb15"> 
                            <div class="col-md-12 col-xs-6 b-r">
                                <strong><?php echo $settings[0]['ParamLabel'];?></strong>
                                <br>
                                <input type="text" name="EpinPrefix" id="EpinPrefix" class="form-control" value="<?php echo $settings[0]['ParamValue'];?>">
                            </div>
                        </div>   -->
                        
                        <?php $settings = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('EpinLength')"); ?>     
                        <div class="row mb15"> 
                            <div class="col-md-12 col-xs-6 b-r">
                                <strong><?php echo $settings[0]['ParamLabel'];?></strong>
                                <br>
                                <input type="text" name="EpinLength" id="EpinLength" class="form-control" value="<?php echo $settings[0]['ParamValue'];?>">
                            </div>
                        </div>
                        <?php $settings = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('EpinPwdLength')"); ?>  
                        <div class="row mb15"> 
                            <div class="col-md-12 col-xs-6 b-r">
                                <strong><?php echo $settings[0]['ParamLabel'];?></strong>
                                <br>
                                <input type="text" name="EpinPwdLength" id="EpinPwdLength" class="form-control" value="<?php echo $settings[0]['ParamValue'];?>">
                            </div>
                        </div> 
                        
                        <?php $settings = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('IsMobileIsMandatory')"); ?>  
                        <div class="row mb15"> 
                            <div class="col-md-12 col-xs-6 b-r">
                                <strong><?php echo $settings[0]['ParamLabel'];?></strong>
                                <br>
                                <select name="IsMobileIsMandatory" class="form-control">
                                    <option value="1" <?php echo $settings[0]['ParamValue']==1 ? ' selected="selected" ' : '';?>>Yes</option>
                                    <option value="0" <?php echo $settings[0]['ParamValue']==0 ? ' selected="selected" ' : '';?>>No</option>
                                </select>
                                <!--<input type="text" name="IsMobileIsMandatory" id="IsMobileIsMandatory" class="form-control" value="<?php echo $settings[0]['ParamValue'];?>">-->
                            </div>
                        </div> 
                        
                        <?php $settings = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('AllowDuplicateMobile')"); ?>  
                        <div class="row mb15"> 
                            <div class="col-md-12 col-xs-6 b-r">
                                <strong><?php echo $settings[0]['ParamLabel'];?></strong>
                                <br>
                                <select name="AllowDuplicateMobile" class="form-control">
                                    <option value="1" <?php echo $settings[0]['ParamValue']==1 ? ' selected="selected" ' : '';?>>Yes</option>
                                    <option value="0" <?php echo $settings[0]['ParamValue']==0 ? ' selected="selected" ' : '';?>>No</option>
                                </select>
                                <!--<input type="text" name="AllowDuplicateMobile" id="AllowDuplicateMobile" class="form-control" value="<?php echo $settings[0]['ParamValue'];?>">-->
                            </div>
                        </div> 
                        
                        <?php $settings = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('AllowDuplicateEmail')"); ?>  
                        <div class="row mb15"> 
                            <div class="col-md-12 col-xs-6 b-r">
                                <strong><?php echo $settings[0]['ParamLabel'];?></strong>
                                <br>
                                <select name="AllowDuplicateEmail" class="form-control">
                                    <option value="1" <?php echo $settings[0]['ParamValue']==1 ? ' selected="selected" ' : '';?>>Yes</option>
                                    <option value="0" <?php echo $settings[0]['ParamValue']==0 ? ' selected="selected" ' : '';?>>No</option>
                                </select>
                                <!--<input type="text" name="AllowDuplicateEmail" id="AllowDuplicateEmail" class="form-control" value="<?php echo $settings[0]['ParamValue'];?>">-->
                            </div>
                        </div> 
                        
                        <?php $settings = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('IsEmailMandatory')"); ?>  
                        <div class="row mb15"> 
                            <div class="col-md-12 col-xs-6 b-r">
                                <strong><?php echo $settings[0]['ParamLabel'];?></strong>
                                <br>
                                <select name="IsEmailMandatory" class="form-control">
                                    <option value="1" <?php echo $settings[0]['ParamValue']==1 ? ' selected="selected" ' : '';?>>Yes</option>
                                    <option value="0" <?php echo $settings[0]['ParamValue']==0 ? ' selected="selected" ' : '';?>>No</option>
                                </select>
                                <!--<input type="text" name="IsEmailMandatory" id="IsEmailMandatory" class="form-control" value="<?php echo $settings[0]['ParamValue'];?>">-->
                            </div>
                        </div>
                        
                          <?php $settings = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('AllowDuplicatePanCard')"); ?>  
                        <div class="row mb15"> 
                            <div class="col-md-12 col-xs-6 b-r">
                                <strong><?php echo $settings[0]['ParamLabel'];?></strong>
                                <br>
                                <select name="AllowDuplicatePanCard" class="form-control">
                                    <option value="1" <?php echo $settings[0]['ParamValue']==1 ? ' selected="selected" ' : '';?>>Yes</option>
                                    <option value="0" <?php echo $settings[0]['ParamValue']==0 ? ' selected="selected" ' : '';?>>No</option>
                                </select>
                                <!--<input type="text" name="AllowDuplicatePanCard" id="AllowDuplicatePanCard" class="form-control" value="<?php echo $settings[0]['ParamValue'];?>">-->
                            </div>
                        </div> 
                        
                        <?php $settings = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('IsPanCardIsMandatory')"); ?>  
                        <div class="row mb15"> 
                            <div class="col-md-12 col-xs-6 b-r">
                                <strong><?php echo $settings[0]['ParamLabel'];?></strong>
                                <br>
                                <select name="IsPanCardIsMandatory" class="form-control">
                                    <option value="1" <?php echo $settings[0]['ParamValue']==1 ? ' selected="selected" ' : '';?>>Yes</option>
                                    <option value="0" <?php echo $settings[0]['ParamValue']==0 ? ' selected="selected" ' : '';?>>No</option>
                                </select>
                                <!--<input type="text" name="IsPanCardIsMandatory" id="IsPanCardIsMandatory" class="form-control" value="<?php echo $settings[0]['ParamValue'];?>">-->
                            </div>
                        </div>
                        
                        
                        
                        
                           
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <div class="row mb15">
                            <div class="col-md-4 col-xs-6 b-r">
                                <button type="submit" name="updateBtn" id="updateBtn" class="btn btn-primary" >Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once("footer.php"); ?>