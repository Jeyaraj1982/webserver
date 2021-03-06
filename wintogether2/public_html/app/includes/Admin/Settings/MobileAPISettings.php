<?php
    if (isset($_POST['updateBtn'])) {
        $mysql->execute("update `_tbl_Settings_Params` set `ParamValue`='".$_POST['MobileSMSSendAPI']."' where ParamCode='MobileSMSSendAPI'");  
        $mysql->execute("update `_tbl_Settings_Params` set `ParamValue`='".$_POST['MobileSMSBalanceAPI']."' where ParamCode='MobileSMSBalanceAPI'");  
        $mysql->execute("update `_tbl_Settings_Params` set `ParamValue`='".$_POST['EnableSendSMS']."' where ParamCode='EnableSendSMS'");  
        ?>
        <script>
            $(document).ready(function() {
                swal("Mobile API Settings updated", {
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
            <li class="nav-item"><a href="dashboard.php?action=Setttings/MobileAPISettings">Settings</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Setttings/MobileAPISettings">Mobile API Settings</a></li>
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
                        <h4 class="card-title text-orange"><i class="ti-user"></i>Mobile SMS API Settings</h4>
                        <div class="row mb15">
                            <div class="col-md-12 col-xs-12 b-r">
                                <span style="color:green;">&nbsp;</span>
                            </div>
                        </div>
                        <?php $settings = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('MobileSMSSendAPI')"); ?>
                        <div class="row mb15">
                            <div class="col-md-12 col-xs-6 b-r">
                                <strong><?php echo $settings[0]['ParamLabel'];?></strong>
                                <br>
                                <input type="text" name="MobileSMSSendAPI" id="MobileSMSSendAPI" class="form-control" value="<?php echo $settings[0]['ParamValue'];?>">
                            </div>
                        </div>
                        <?php $settings = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('MobileSMSBalanceAPI')"); ?>
                        <div class="row mb15"> 
                            <div class="col-md-12 col-xs-6 b-r"> 
                                <strong><?php echo $settings[0]['ParamLabel'];?></strong>
                                <br>
                                <input type="text" name="MobileSMSBalanceAPI" id="MobileSMSBalanceAPI" class="form-control" value="<?php echo $settings[0]['ParamValue'];?>">
                            </div>
                        </div>  
                        
                        <?php $settings = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('EnableSendSMS')"); ?>
                        <div class="row mb15"> 
                            <div class="col-md-12 col-xs-6 b-r"> 
                                <strong><?php echo $settings[0]['ParamLabel'];?></strong>
                                <br>
                                <select name="EnableSendSMS" id="EnableSendSMS" class="form-control">
                                       <option value='1' <?php echo $settings[0]['ParamValue']==1 ? 'selected="selected" ' : ''; ?> >Enable</option>
                                       <option value='0' <?php echo $settings[0]['ParamValue']==0 ? 'selected="selected" ' : ''; ?> >Disable</option>
                                       
                                </select>
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
</div>
<?php include_once("footer.php"); ?>