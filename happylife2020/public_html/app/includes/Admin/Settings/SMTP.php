<?php
    if (isset($_POST['updateBtn'])) {
        $mysql->execute("update `_tbl_Settings_Params` set `ParamValue`='".$_POST['SMTP_HostUrl']."' where ParamCode='SMTP_HostUrl'");  
        $mysql->execute("update `_tbl_Settings_Params` set `ParamValue`='".$_POST['SMTP_UserName']."' where ParamCode='SMTP_UserName'");  
        $mysql->execute("update `_tbl_Settings_Params` set `ParamValue`='".$_POST['SMTP_Password']."' where ParamCode='SMTP_Password'"); 
        $mysql->execute("update `_tbl_Settings_Params` set `ParamValue`='".$_POST['SMTP_Port']."' where ParamCode='SMTP_Port'"); 
        $mysql->execute("update `_tbl_Settings_Params` set `ParamValue`='".$_POST['SMTP_Secure']."' where ParamCode='SMTP_Secure'"); 
        $mysql->execute("update `_tbl_Settings_Params` set `ParamValue`='".$_POST['SMTP_SenderName']."' where ParamCode='SMTP_SenderName'"); 
        $mysql->execute("update `_tbl_Settings_Params` set `ParamValue`='".$_POST['EnableEMail']."' where ParamCode='EnableEMail'");  
        ?>
        <script>
            $(document).ready(function() {
                swal("SMTP Settings updated", {
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
            <li class="nav-item"><a href="dashboard.php?action=Setttings/MobileAPISettings">SMTP Settings</a></li>
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
                        <h4 class="card-title text-orange"><i class="ti-user"></i>SMTP Settings</h4>
                        <div class="row mb15">
                            <div class="col-md-12 col-xs-12 b-r">
                                <span style="color:green;">&nbsp;</span>
                            </div>
                        </div>
                        <?php $settings = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('SMTP_HostUrl')"); ?>
                        <div class="row mb15">
                            <div class="col-md-12 col-xs-6 b-r">
                                <strong><?php echo $settings[0]['ParamLabel'];?></strong>
                                <br>
                                <input type="text" name="SMTP_HostUrl" id="MobileSMSSSMTP_HostUrlendAPI" class="form-control" value="<?php echo $settings[0]['ParamValue'];?>">
                            </div>
                        </div>
                        
                        <?php $settings = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('SMTP_UserName')"); ?>
                        <div class="row mb15"> 
                            <div class="col-md-12 col-xs-6 b-r"> 
                                <strong><?php echo $settings[0]['ParamLabel'];?></strong>
                                <br>
                                <input type="text" name="SMTP_UserName" id="SMTP_UserName" class="form-control" value="<?php echo $settings[0]['ParamValue'];?>">
                            </div>
                        </div>  
                        
                        <?php $settings = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('SMTP_Password')"); ?>
                        <div class="row mb15"> 
                            <div class="col-md-12 col-xs-6 b-r"> 
                                <strong><?php echo $settings[0]['ParamLabel'];?></strong>
                                <br>
                                <input type="text" name="SMTP_Password" id="SMTP_Password" class="form-control" value="<?php echo $settings[0]['ParamValue'];?>">
                            </div>
                        </div>  
                        
                        <?php $settings = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('SMTP_Port')"); ?>
                        <div class="row mb15"> 
                            <div class="col-md-12 col-xs-6 b-r"> 
                                <strong><?php echo $settings[0]['ParamLabel'];?></strong>
                                <br>
                                <input type="text" name="SMTP_Port" id="SMTP_Port" class="form-control" value="<?php echo $settings[0]['ParamValue'];?>">
                            </div>
                        </div>   
                        
                        <?php $settings = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('SMTP_Secure')"); ?>
                        <div class="row mb15"> 
                            <div class="col-md-12 col-xs-6 b-r"> 
                                <strong><?php echo $settings[0]['ParamLabel'];?></strong>
                                <br>
                                <input type="text" name="SMTP_Secure" id="SMTP_Secure" class="form-control" value="<?php echo $settings[0]['ParamValue'];?>">
                            </div>
                        </div>  
                        
                        <?php $settings = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('SMTP_SenderName')"); ?>
                        <div class="row mb15"> 
                            <div class="col-md-12 col-xs-6 b-r"> 
                                <strong><?php echo $settings[0]['ParamLabel'];?></strong>
                                <br>
                                <input type="text" name="SMTP_SenderName" id="SMTP_SenderName" class="form-control" value="<?php echo $settings[0]['ParamValue'];?>">
                            </div>
                        </div>  
                        
                        <?php $settings = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('EnableEMail')"); ?>
                        <div class="row mb15"> 
                            <div class="col-md-12 col-xs-6 b-r"> 
                                <strong><?php echo $settings[0]['ParamLabel'];?></strong>
                                <br>
                                <select name="EnableEMail" id="EnableEMail" class="form-control">
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