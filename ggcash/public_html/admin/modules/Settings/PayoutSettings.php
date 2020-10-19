<?php
    if (isset($_POST['updateBtn'])) {
        $mysql->execute("update `_tbl_Settings_Params` set `ParamValue`='".$_POST['PayoutMode']."' where ParamCode='PayoutMode'");  
        $mysql->execute("update `_tbl_Settings_Params` set `ParamValue`='".$_POST['MinPayout']."' where ParamCode='MinPayout'");  
        $mysql->execute("update `_tbl_Settings_Params` set `ParamValue`='".$_POST['MaxPayout']."' where ParamCode='MaxPayout'");  
        $mysql->execute("update `_tbl_Settings_Params` set `ParamValue`='".$_POST['PayoutCharges']."' where ParamCode='PayoutCharges'");  
        $mysql->execute("update `_tbl_Settings_Params` set `ParamValue`='".$_POST['PayoutCutOff']."' where ParamCode='PayoutCutOff'");  
        $successmessage = "Successfully updated";
    }
?>
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-9 align-self-center">
                <h4 class="page-title">Settings</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Payout Settings</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <div class="row mb15">
                        <div class="col-md-12 col-xs-12 b-r">
                            <a href="dashboard.php?action=Settings/GeneralSettings">General Settings</a>
                        </div>
                    </div>
                    <div class="row mb15">
                        <div class="col-md-12 col-xs-12 b-r">
                            <a href="dashboard.php?action=Settings/EnrollmentPackage">Enrollment Packages</a>
                        </div>
                    </div>
                    <div class="row mb15">
                        <div class="col-md-12 col-xs-12 b-r">
                            <a href="dashboard.php?action=Settings/WithdrawalSettings">Withdrawal Settings</a>
                        </div>
                    </div>
                    <div class="row mb15">
                        <div class="col-md-12 col-xs-12 b-r">
                            <a href="dashboard.php?action=Settings/PayoutSettings">Payout Settings</a>
                        </div>
                    </div>
                      <div class="row mb15">
                        <div class="col-md-12 col-xs-12 b-r">
                            <a href="dashboard.php?action=Settings/AdminSettings">Admin Settings</a>
                        </div>
                    </div>
                    <div class="row mb15">
                        <div class="col-md-12 col-xs-12 b-r">
                            <a href="dashboard.php?action=Settings/MobileAPISettings">Mobile SMS API Settings</a>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
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
                        <?php $settings = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('MaxPayout')"); ?>
                        <div class="row mb15"> 
                            <div class="col-md-12 col-xs-6 b-r">
                                <strong><?php echo $settings[0]['ParamLabel'];?></strong>
                                <br>
                                <input type="text" name="MaxPayout" id="MaxPayout" class="form-control" value="<?php echo $settings[0]['ParamValue'];?>">
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
<?php include_once("footer.php"); ?>