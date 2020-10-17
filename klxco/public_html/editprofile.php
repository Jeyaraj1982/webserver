<?php
    include_once("header.php");  
    $obj = new CommonController(); 
    
    if(isset($_POST{"save"})) {
        $mysql->execute("update _jusertable set personname='".trim($_POST['personname'])."',email='".trim($_POST['email'])."',mobile='".trim($_POST['mobile'])."' where userid=".$_SESSION['USER']['userid']);
        $_SESSION['USER']['personname']= trim($_POST['personname']);
        $_SESSION['USER']['email']= trim($_POST['email']);
        $_SESSION['USER']['mobile']= trim($_POST['mobile']);
        $success= "Successfully updated";
    }  
    $udata = $mysql->select("select * from _jusertable  where userid=".$_SESSION['USER']['userid']);
?>                                          
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
                        <a href="<?php echo country_url;?>myprofile" >My Profile</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">My Profile</h4>
                        </div>
                        <div class="card-body">
                            <?php if (isset($success)) { ?>
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <span style="color:green !important" >Updated Successfully</span>
                                </div>
                            </div> 
                            <?php } ?>
                            <form action="" method="post">
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <label >Person Name</label>
                                    <input type="text" value="<?php echo $udata[0]['personname'];?>"  name="personname" id="personname" required class="form-control">
                                </div>
                            </div>   
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <label >Email</label>
                                    <input type="text" value="<?php echo $udata[0]['email'];?>"  name="email" id="email" required class="form-control">
                                </div>
                            </div>    
                            <div class="row mb-5">
                                <div class="col-sm-12">
                                   <label >Mobile</label>
                                    <input type="text" value="<?php echo $udata[0]['mobile'];?>" name="mobile" id="mobile" required  class="form-control">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <input type="submit" value="Update" name="save" class="btn btn-primary" >&nbsp;&nbsp;
                                    <a href="<?php echo country_url;?>myprofile"   >Cancel</a>
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
<?php include_once("footer.php"); ?>