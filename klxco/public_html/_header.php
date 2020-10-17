<?php include_once("config.php"); 
if (isset($_SESSION['USER']['userid']) && $_SESSION['USER']['userid']>0) {
    if (strlen(trim($_SESSION['USER']['mobile']))<10) {
        echo "<script>location.href='updatemobile';</script>";
    }  else {
        if ($_SESSION['USER']['ismobileverified']==0) {
            echo "<script>location.href='https://www.klx.co.in/in/mobileverification';</script>";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>klx.co.in</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?php echo base_url;?>assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="<?php echo base_url;?>assets/js/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?php echo base_url;?>assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
    
    <style>
.cursor-hand{cursor:pointer;}
.cursor-hand p{color:#333}
.cursor-hand:hover {background:#f1f1f1}
 
</style>
       <script>
        function goUrl(url) {
            location.href='<?php echo path_url;?>'+url;
        } 
        function viewad(id) {
            location.href='<?php echo path_url;?>v'+id;
        } 
        function viewads(id) {
            location.href='viewads.php?a='+id;
        }  
        
        function ListSubCategories(id) {
            location.href='subcategory.php?a='+id;
        }
         function viewads_subcategory(id) {
            location.href='viewads.php?s='+id;
        }
        
        
        function likead(adid) {
            $.ajax({url:'webservice.php?action=addFav&postId='+adid,success:function(result){
                     $('#d').html(result);
            }});
        }
        
       </script>
       <div id="d"></div>
	<!-- CSS Files -->
	<link rel="stylesheet" href="<?php echo base_url;?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url;?>assets/css/atlantis.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="<?php echo base_url;?>assets/css/demo.css">
    
   
<style>

.adImage {height:200px;margin:0px auto;width:auto;max-width:100%;}
.adbox{border:2px solid #fff;height:410px !important;cursor:pointer;min-width:160px}
.adbox:hover{border:2px solid #ccc}

.adboxf{border:2px solid #fff;height:450px !important;cursor:pointer;min-width:160px}     
.adboxf:hover{border:2px solid #ccc}

                                                
 .postedon {float: right;}
    .mobilemenu {display: none;}
    @media all and (max-width: 768px){
        
        .mobilemenu {display: block;}
        .adImage {height:100px;margin:0px auto;width:auto;max-width:100%;}
        /*.adbox{border:2px solid #fff;height:300px !important;cursor:pointer;width:150px}*/
        .description_level1 {font-size:12px;line-height:14px;}
         .postedon{float:left;font-size:11px;}
         .col-lg-3 {padding-left:5px;padding-right:5px;}
    }                     
 
    
    

    </style>
    
    
</head>
<body>
	<div class="wrapper">                                  
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="white">
				<a href="<?php echo base_url;?>index.php" class="logo" style="left:10px !important;transform:none">
                    <img src="<?php echo base_url;?>assets/cms/klx_log.png" alt="klx" class="navbar-brand" style="height:30px;">
					<img src="<?php echo base_url;?>assets/img/<?php echo $_SESSION['country'];?>.png" alt="klx" class="navbar-brand" style="height:24px;border:1px solid #eee;border-radius:3px;">
				</a>
                
                  
				<!--<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button> -->
                <!--<button class="topbar-toggler more">-->
				<button class="topbar more" style="width:170px">
                 
                 <?php
                            if ($_SESSION['USER']['userid']>0) {
                               ?>
                                 <a class="btn btn-primary btn-sm" href="<?php echo country_url;?>freeadpost">
                                 Post Free Ad
                            </a> 
                      <a class="profile-pic" data-toggle="dropdown" href="javascript:void(0)" aria-expanded="false" style="float:right">
                 
                                <div class="avatar-sm" style="height: 50px;width:auto;">
                                <span style="font-size:16px;display:inline;font-weight:bold;">Hi !</span>
                                     <i class="flaticon-user-1" style="font-size:28px"></i>
                                </div>
                            </a>  
                            
                             <ul class="dropdown-menu dropdown-user animated fadeIn" style="width:150px; overflow: hidden; ">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>          
                                        <div class="user-box">
                                            <div class="u-text">
                                                <h4><?php echo $_SESSION['USER']['personname'];?></h4>
                                                <!--<p class="text-muted"><?php echo $_SESSION['USER']['email'];?></p><!--<a href="viewprofile.php" class="btn btn-xs btn-secondary btn-sm">View Profile</a>-->
                                          </div>
                                        </div>
                                    </li>                              
                                    <li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo country_url;?>mypage" style="line-height:15px;">My Page</a>  
                                        <a class="dropdown-item" href="<?php echo country_url;?>myads" style="line-height:15px;">My Ads</a>  
                                        <a class="dropdown-item" href="<?php echo country_url;?>myprofile" style="line-height:15px;">My Profile</a>
                                        <a class="dropdown-item" href="<?php echo country_url;?>changepassword" style="line-height:15px;">Change Password</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo base_url;?>index.php?action=logout" style="line-height:15px;">Logout</a>
                                    </li> 
                                </div>
                            </ul>          
                               <?php 
                            } else {
                        ?>
                <a class="btn btn-outline-primary" style="border:none;font-weight:bold !important;font-size:15px;" href="<?php echo country_url;?>login">
                                Login 
                            </a>
                         <a class="btn btn-primary" style="color:#fff" href="<?php echo country_url;?>register">
                                Sell 
                            </a>
                            <?php } ?>
              <!--  <i class="icon-options-vertical"></i> -->
                
                <!--  <li class="nav-item dropdown hidden-caret" style="list-style: none;"> 
                
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                   <span class="caret"></span>
                                <div class="avatar-sm" style="height: 50px;">
                                     <i class="flaticon-user-1" style="font-size:28px"></i>
                                </div>
                            </a>
                            <?php
                        //    if ($_SESSION['USER']['userid']>0) {
                        ?>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>          
                                        <div class="user-box">
                                            <div class="u-text">
                                                <h4><?php// echo $_SESSION['USER']['personname'];?></h4>
                                                <p class="text-muted"><?php echo $_SESSION['USER']['email'];?></p><!--<a href="viewprofile.php" class="btn btn-xs btn-secondary btn-sm">View Profile</a>-->
                                  <!--          </div>
                                        </div>
                                    </li>                              
                                    <li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php //echo country_url;?>mypage">My Page</a>  
                                        <a class="dropdown-item" href="<?php //echo country_url;?>myads">My Ads</a>  
                                        <a class="dropdown-item" href="<?php //echo country_url;?>myprofile">My Profile</a>
                                        <a class="dropdown-item" href="<?php //echo country_url;?>changepassword">Change Password</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php //echo base_url;?>index.php?action=logout">Logout</a>
                                    </li> 
                                </div>
                            </ul> 
                            <?php //} else { ?>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>
                                        <a class="btn btn-outline-primary" href="<?php //echo country_url;?>login">
                                            Login 
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="btn btn-primary" style="color:#fff" href="<?php //echo country_url;?>register">
                                            Sell 
                                        </a>
                                    </li> 
                                </div>
                            </ul> 
                             <?php //} ?>
                            </li>  -->
                            
                </button>       
				<!--<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>   -->
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->  
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="white">
				
				<div class="container-fluid">
					 
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						 
                        <li class="nav-item dropdown hidden-caret">
                     
                            <a class="btn btn-primary" href="<?php echo country_url;?>freeadpost">
                                 Post Free Ad
                            </a>    
                            </li>
                        <?php
                            if ($_SESSION['USER']['userid']>0) {
                        ?>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">   
								<div class="avatar-sm">
									 <i class="flaticon-user-1" style="font-size:28px"></i>
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
                                    <li>          
										<div class="user-box">
											<div class="u-text">
												<h4><?php echo $_SESSION['USER']['personname'];?></h4>
												<p class="text-muted"><?php echo $_SESSION['USER']['email'];?></p><!--<a href="viewprofile.php" class="btn btn-xs btn-secondary btn-sm">View Profile</a>-->
											</div>
										</div>
									</li>                              
									<li>
										<div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo country_url;?>mypage">My Page</a>  
                                        <a class="dropdown-item" href="<?php echo country_url;?>myads">My Ads</a>  
										<a class="dropdown-item" href="<?php echo country_url;?>myprofile">My Profile</a>
										<a class="dropdown-item" href="<?php echo country_url;?>changepassword">Change Password</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="<?php echo base_url;?>index.php?action=logout">Logout</a>
									</li> 
								</div>
							</ul>                   
						</li>  
                        <?php } else {?>
                              <li class="nav-item dropdown hidden-caret">
                             <a class="btn btn-outline-primary" href="<?php echo country_url;?>login">
                                Login 
                            </a>
                        </li>
                         <li class="nav-item dropdown hidden-caret">
                            <a class="btn btn-primary" style="color:#fff" href="<?php echo country_url;?>register">
                                Sell 
                            </a>
                        </li>
                        <?php } ?>
					</ul>
				</div>
			</nav> 
			 
		</div>   
        
          
        <script>
var cnt = 1;
var district="0";
var stateid="0";
    function  getMoreAds() {   
        $.ajax({url:'<?php echo base_url;?>webservice.php?action=moreads&cnt='+cnt+"&d="+district+"&s="+stateid,
       contentType: 'application/x-www-form-urlencoded', 
        success:function(data)
        {
            $('#drop_D').html($('#drop_D').html()+data);
        }});
    }
</script>                                             
    
<div class="main-panel" style="width: 100%;height:auto">    
               
    <div class="container" style="margin-top:0px;padding-top:60px !important;"> 
        <?php
             if (!(isset($_GET['chat']))) {
         ?>
         <div class="row mobilemenu" style="background:#fff;height:60px;padding:10px;display:none">
            <ul class=" " style="list-style-type: none;background:#fff">
                    <li class="nav-item dropdown hidden-caret" style="float:left;margin-right:10px">
                        <a class="btn btn-primary" href="<?php echo country_url;?>freeadpost">Post Free Ad</a>
                    </li>
                    <?php if ($_SESSION['USER']['userid']>0) { ?>
                    <li class="nav-item dropdown hidden-caret" style="float:left;margin-right:10px">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                            <div class="avatar-sm">
                                <i class="flaticon-user-1" style="font-size:28px"></i>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-user animated fadeIn">
                            <div class="dropdown-user-scroll scrollbar-outer">
                                <li>          
                                    <div class="user-box">
                                        <div class="u-text">
                                            <h4><?php echo $_SESSION['USER']['personname'];?></h4>
                                            <p class="text-muted"><?php echo $_SESSION['USER']['email'];?></p><!--<a href="viewprofile.php" class="btn btn-xs btn-secondary btn-sm">View Profile</a>-->
                                        </div>
                                    </div>
                                </li>                              
                                <li>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?php echo country_url;?>mypage">My Page</a>  
                                    <a class="dropdown-item" href="<?php echo country_url;?>myads">My Ads</a>  
                                    <a class="dropdown-item" href="<?php echo country_url;?>myprofile">My Profile</a>
                                    <a class="dropdown-item" href="<?php echo country_url;?>changepassword">Change Password</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?php echo base_url;?>index.php?action=logout">Logout</a>
                                </li> 
                            </div>
                        </ul>                   
                    </li>  
                    <?php } else {?>
                    <li class="nav-item dropdown hidden-caret" style="float:left;margin-right:10px">
                        <a class="btn btn-outline-primary" href="<?php echo country_url;?>login">Login</a>
                    </li>
                    <li class="nav-item dropdown hidden-caret" style="float:left">
                        <a class="btn btn-primary" style="color:#fff" href="<?php echo country_url;?>register">Sell</a>
                    </li>  
                    <?php } ?>
                </ul>
            </div>  <?php
            }
         ?> 
         