<?php
    include_once("header.php");  
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
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <label >Person Name</label>
                                    <input type="text" value="<?php echo $udata[0]['personname'];?>"  disabled="disabled" class="form-control">
                                </div>
                            </div>   
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <label >Email</label>
                                    <input type="text" value="<?php echo $udata[0]['email'];?>"  disabled="disabled" class="form-control">
                                </div>
                            </div>    
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                   <label >Mobile</label>
                                    <input type="text" value="<?php echo $udata[0]['mobile'];?>"  disabled="disabled"  class="form-control">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                   <label >Country Name</label>
                                    <input type="text" value="<?php echo $udata[0]['countryname'];?>"  disabled="disabled"  class="form-control">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                   <label >State Name</label>
                                    <input type="text" value="<?php echo $udata[0]['statename'];?>"  disabled="disabled"  class="form-control">
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-sm-12">
                                   <label >District Name</label>
                                    <input type="text" value="<?php echo $udata[0]['districtname'];?>"  disabled="disabled"  class="form-control">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <a href="<?php echo country_url;?>editprofile"  >Edit Profile</a>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once("footer.php"); ?>