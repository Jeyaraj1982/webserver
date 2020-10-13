<?php
    if (isset($_POST['updateBtn'])) {
        $mysql->execute("update `_tbl_Settings_Params` set `ParamValue`='".$_POST['PayoutMode']."' where ParamCode='PayoutMode'");  
        $mysql->execute("update `_tbl_Settings_Params` set `ParamValue`='".$_POST['MinPayout']."' where ParamCode='MinPayout'");  
        $mysql->execute("update `_tbl_Settings_Params` set `ParamValue`='".$_POST['PayoutCharges']."' where ParamCode='PayoutCharges'");  
        $mysql->execute("update `_tbl_Settings_Params` set `ParamValue`='".$_POST['PayoutCutOff']."' where ParamCode='PayoutCutOff'");  
        $successmessage = "Successfully updated";
    }
?>
 
 
  
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-display1 icon-gradient bg-premium-dark">
                                    </i>
                                </div>
                                <div>Settings
                                
                                </div>
                            </div>
                        </div>
                    </div>       
                    
                     
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade active show" id="tab-content-1" role="tabpanel">
                            <div class="row">
                                <div class="col-md-4">
                                 
                                    <div class="card">
                <div class="card-body">
                    <div class="row mb15">
                        <div class="col-md-12 col-xs-12 b-r">
                            <a href="dashboard.php?action=application/GeneralSettings">General Settings</a>
                        </div>
                    </div>
                    <div class="row mb15">
                        <div class="col-md-12 col-xs-12 b-r">
                            <a href="dashboard.php?action=application/EnrollmentPackage">Enrollment Packages</a>
                        </div>
                    </div>
                    <div class="row mb15">
                        <div class="col-md-12 col-xs-12 b-r">
                            <a href="dashboard.php?action=application/WithdrawalSettings">Withdrawal Settings</a>
                        </div>
                    </div>
                    <div class="row mb15">
                        <div class="col-md-12 col-xs-12 b-r">
                            <a href="dashboard.php?action=application/PayoutSettings">Payout Settings</a>
                        </div>
                    </div>
                </div>
            </div>
                                </div>
                                
                                <div class="col-md-8">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                        
                        <form method="post" action="">
                        <h4 class="card-title text-orange"><i class="ti-user"></i>&nbsp;&nbsp; Payout Configurations</h4>
                         <div class="row mb15">
                            <div class="col-md-12 col-xs-12 b-r">
                                <span style="color:green;"><?php echo $successmessage;?>&nbsp;</span>
                            </div>
                        </div>
                        <?php $settings = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('PayoutMode')"); ?>
                        <div class="row mb15"> 
                            <div class="col-md-12 col-xs-6 b-r">
                                <strong><?php echo $settings[0]['ParamLabel'];?></strong>
                                <br>
                                <select name="PayoutMode" class="form-control">
                                    <option value="1" <?php echo $settings[0]['ParamValue']==1 ? " selected='selected' " : "";?> >Instant</option>
                                    <option value="2" <?php echo $settings[0]['ParamValue']==2 ? " selected='selected' " : "";?>>Daily</option>
                                    <option value="3" <?php echo $settings[0]['ParamValue']==3 ? " selected='selected' " : "";?>>Weekly</option>
                                    <option value="4" <?php echo $settings[0]['ParamValue']==4 ? " selected='selected' " : "";?>>Monthly</option>
                                    <option value="5" <?php echo $settings[0]['ParamValue']==5 ? " selected='selected' " : "";?>>Yearly</option>
                                </select>
                            </div>
                        </div>
                        <?php $settings = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('PayoutCutOff')"); ?>
                        <div class="row mb15"> 
                            <div class="col-md-12 col-xs-6 b-r">
                                <strong><?php echo $settings[0]['ParamLabel'];?></strong>
                                <br>
                                <input type="text" name="PayoutCutOff" id="PayoutCutOff" class="form-control" value="<?php echo $settings[0]['ParamValue'];?>">
                            </div>                                                                                                              
                        </div>
                        <?php $settings = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('MinPayout')"); ?>
                        <div class="row mb15"> 
                            <div class="col-md-12 col-xs-6 b-r">
                                <strong><?php echo $settings[0]['ParamLabel'];?></strong>
                                <br>
                                <input type="text" name="MinPayout" id="MinPayout" class="form-control" value="<?php echo $settings[0]['ParamValue'];?>">
                            </div>
                        </div>
                        <?php $settings = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('PayoutCharges')"); ?>
                        <div class="row mb15"> 
                            <div class="col-md-12 col-xs-6 b-r"> 
                                <strong><?php echo $settings[0]['ParamLabel'];?></strong>
                                <br>
                                <input type="text" name="PayoutCharges" id="PayoutCharges" class="form-control" value="<?php echo $settings[0]['ParamValue'];?>">
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-md-12 col-xs-6 b-r">
                                <button type="submit" name="updateBtn" id="updateBtn" class="btn btn-primary" >Update</button>
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
                </div>



                
                    
                