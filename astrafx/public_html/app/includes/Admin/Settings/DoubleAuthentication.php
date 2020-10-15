<?php
    if (isset($_POST['updateBtn'])) {
        $mysql->execute("update `_tbl_Settings_Params` set `ParamValue`='".$_POST['AdminLoginMobileOTPRequired']."' where ParamCode='AdminLoginMobileOTPRequired'");  
        $mysql->execute("update `_tbl_Settings_Params` set `ParamValue`='".$_POST['AdminLoginEmailOTPRequired']."' where ParamCode='AdminLoginEmailOTPRequired'");  
        $mysql->execute("update `_tbl_Settings_Params` set `ParamValue`='".$_POST['AdminLoginWhatsappOTPRequired']."' where ParamCode='AdminLoginWhatsappOTPRequired'");  
        
        $mysql->execute("update `_tbl_Settings_Params` set `ParamValue`='".$_POST['MemberLoginMobileOTPRequired']."' where ParamCode='MemberLoginMobileOTPRequired'"); 
        $mysql->execute("update `_tbl_Settings_Params` set `ParamValue`='".$_POST['MemberLoginEmailOTPRequired']."' where ParamCode='MemberLoginEmailOTPRequired'"); 
        ?>
        <script>
            $(document).ready(function() {
                swal("Double Authentication Settings updated", {
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
            <li class="nav-item"><a href="dashboard.php?action=Setttings/MobileAPISettings">Double Authentication Settings</a></li>
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
                        <h4 class="card-title text-orange"><i class="ti-user"></i>Double Authentication Settings</h4>
                        <div class="row mb15">
                            <div class="col-md-12 col-xs-12 b-r">
                                <span style="color:green;">&nbsp;</span>
                            </div>
                        </div>
                        <?php $settings = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('AdminLoginMobileOTPRequired')"); ?>
                        <div class="row mb15">
                            <div class="col-md-12 col-xs-6 b-r">
                                <strong><?php echo $settings[0]['ParamLabel'];?></strong>
                                <br>
                                <select name="AdminLoginMobileOTPRequired" id="AdminLoginMobileOTPRequired" class="form-control">
                                       <option value='1' <?php echo $settings[0]['ParamValue']==1 ? 'selected="selected" ' : ''; ?> >Enable</option>
                                       <option value='0' <?php echo $settings[0]['ParamValue']==0 ? 'selected="selected" ' : ''; ?> >Disable</option>
                                </select>
                            </div>
                        </div>
                        
                        <?php $settings = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('AdminLoginEmailOTPRequired')"); ?>
                        <div class="row mb15"> 
                            <div class="col-md-12 col-xs-6 b-r"> 
                                <strong><?php echo $settings[0]['ParamLabel'];?></strong>
                                <br>
                                <select name="AdminLoginEmailOTPRequired" id="AdminLoginEmailOTPRequired" class="form-control">
                                       <option value='1' <?php echo $settings[0]['ParamValue']==1 ? 'selected="selected" ' : ''; ?> >Enable</option>
                                       <option value='0' <?php echo $settings[0]['ParamValue']==0 ? 'selected="selected" ' : ''; ?> >Disable</option>
                                </select>
                            </div>
                        </div> 
                        
                        <?php $settings = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('AdminLoginWhatsappOTPRequired')"); ?>
                        <div class="row mb15"> 
                            <div class="col-md-12 col-xs-6 b-r"> 
                                <strong><?php echo $settings[0]['ParamLabel'];?></strong>
                                <br>
                                <select name="AdminLoginWhatsappOTPRequired" id="AdminLoginWhatsappOTPRequired" class="form-control">
                                       <option value='1' <?php echo $settings[0]['ParamValue']==1 ? 'selected="selected" ' : ''; ?> >Enable</option>
                                       <option value='0' <?php echo $settings[0]['ParamValue']==0 ? 'selected="selected" ' : ''; ?> >Disable</option>
                                </select>
                            </div>
                        </div>  
                        
                        <?php $settings = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('MemberLoginMobileOTPRequired')"); ?>
                        <div class="row mb15"> 
                            <div class="col-md-12 col-xs-6 b-r"> 
                                <strong><?php echo $settings[0]['ParamLabel'];?></strong>
                                <br>
                                <select name="MemberLoginMobileOTPRequired" id="MemberLoginMobileOTPRequired" class="form-control">
                                       <option value='1' <?php echo $settings[0]['ParamValue']==1 ? 'selected="selected" ' : ''; ?> >Enable</option>
                                       <option value='0' <?php echo $settings[0]['ParamValue']==0 ? 'selected="selected" ' : ''; ?> >Disable</option>
                                </select>
                            </div>
                        </div>  
                        
                        <?php $settings = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('MemberLoginEmailOTPRequired')"); ?>
                        <div class="row mb15"> 
                            <div class="col-md-12 col-xs-6 b-r"> 
                                <strong><?php echo $settings[0]['ParamLabel'];?></strong>
                                <br>
                                <select name="MemberLoginEmailOTPRequired" id="MemberLoginEmailOTPRequired" class="form-control">
                                       <option value='1' <?php echo $settings[0]['ParamValue']==1 ? 'selected="selected" ' : ''; ?> >Enable</option>
                                       <option value='0' <?php echo $settings[0]['ParamValue']==0 ? 'selected="selected" ' : ''; ?> >Disable</option>
                                </select>
                            </div>
                        </div>
                        
                        <?php $settings = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('MemberLoginWhatsappOTPRequired')"); ?>
                        <div class="row mb15"> 
                            <div class="col-md-12 col-xs-6 b-r"> 
                                <strong><?php echo $settings[0]['ParamLabel'];?></strong>
                                <br>
                                <select name="MemberLoginWhatsappOTPRequired" id="MemberLoginWhatsappOTPRequired" class="form-control">
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