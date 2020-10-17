<?php include_once("header.php");   ?>
<form action="" method="post">
<div class="main-panel"  style="width: 100%;height:auto !important">
    <div class="container">           
        <div class="page-inner">
        <a class="btn btn-outline-primary btn-sm" style="width:50px;" href="<?php echo country_url;?>">Back</a><br><br>
        <div class="page-header">
                <ul class="breadcrumbs" style="border:none;margin-left:0px;padding-left:0px;">
                    <li class="nav-home">
                        <a href="<?php echo country_url;?>">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo country_url;?>" >Home</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo country_url;?>mypage" >Dashboard</a>
                    </li>
                     <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo country_url;?>changepassword" >Change Password</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Change Password</h4>
                        </div>
                        <div class="card-body">
                        <?php
    
    $obj = new CommonController(); 
    
    if(isset($_POST{"save"})) {
        
        if ($obj->isEmptyField($_POST['currpwd']) || $obj->isEmptyField($_POST['newpwd']) || $obj->isEmptyField($_POST['confirmpwd'])) {  
            echo $obj->printError("All Fields are Required;");
        } else {
            if ($_SESSION['USER']['pwd']==trim($_POST['currpwd'])) {
                if ((trim($_POST['newpwd'])==trim($_POST['confirmpwd'])) && (strlen(trim($_POST['newpwd']))>8) ) {
                    $mysql->execute("update _jusertable set pwd='".trim($_POST['newpwd'])."' where userid=".$_SESSION['USER']['userid']);
                    $_SESSION['USER']['pwd']= trim($_POST['newpwd']);
                    echo $obj->printSuccess("Successfully Changed Password");
                } else {
                    echo $obj->printError("New Password & Confirm Password should be same and length greather than 8 Characters");
                }
            } else {
                echo $obj->printError("Invalid Current Password");
            }
        }   
    }  
?>
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <label >Enter Current Password</label>
                                    <input type="password" name="currpwd" class="form-control">
                                </div>
                            </div>   
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <label >Enter New Password</label>
                                    <input type="password" name="newpwd" class="form-control">
                                </div>
                            </div>    
                            <div class="row mb-5">
                                <div class="col-sm-12">
                                    <label >Enter Confirm New Password</label>
                                    <input type="password" name="confirmpwd" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <input type="submit" name="save" class="btn btn-primary" value="Change Password" bgcolor="grey">
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
<?php include_once("footer.php"); ?>