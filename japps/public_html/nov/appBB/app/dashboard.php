<?php
    include_once("../config.php");
    if (! (isset($_SESSION['User']['MemberID']) || isset($_SESSION['User']['AdminID']) || isset($_SESSION['User']['StockAdminID'])  || isset($_SESSION['User']['SupportingCenterAdminID']) )) {
        ?>
        <script>
        location.href='../index.php';
        </script>
        <?php
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>                  
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?php echo SITE_TITLE;?></title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="assets/js/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/atlantis.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
    
    <script src="assets/js/jquery.3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script src="assets/js/jquery.scrollbar.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/jquery.sparkline.min.js"></script>
    <script src="assets/js/circles.min.js"></script>
    <script src="assets/js/datatables.min.js"></script>
    <script src="assets/js/bootstrap-notify.min.js"></script>
    <script src="assets/js/bootstrap-toggle.min.js"></script>
    <script src="assets/js/jquery.vmap.min.js"></script>
    <script src="assets/js/jquery.vmap.world.js"></script>
    <script src="assets/js/gmaps.js"></script>
    <script src="assets/js/dropzone.min.js"></script>
    <script src="assets/js/fullcalendar.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/bootstrap-tagsinput.min.js"></script>
    <script src="assets/js/bootstrapwizard.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/summernote-bs4.min.js"></script>
    <script src="assets/js/select2.full.min.js"></script>
    <script src="assets/js/sweetalert.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/atlantis.min.js"></script>
    <script src="assets/js/app.js"></script>
    <!--<script src="assets/js/setting-demo.js"></script>
    <script src="assets/js/demo.js"></script>  -->
    <style>
    .mb15 {margin-bottom:15px;}
    </style>
</head>
<?php
    $leftCount = $memberTree->getTotalLeftCount($_SESSION['User']['MemberCode']);
    $leftPV=$memberTree->PV;
    $rightCount = $memberTree->getTotalRightCount($_SESSION['User']['MemberCode']);
    $rightPV=$memberTree->PV;
?>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue" style="background:#f1f1f1 !important;">
				
				<a href="dashboard.php" class="logo">
					<img src="https://wintogether2.com/assets/images/wintogether.png" alt="navbar brand" class="navbar-brand" style="height:36px;background:#f1f1f1">
                   
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu" style="color:#333"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2" style="background:#f1f1f1 !important;">
				
				<div class="container-fluid">
					 
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret" style="display: none;">
							<a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-envelope"></i>
							</a>
							<ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
								<li>
									<div class="dropdown-title d-flex justify-content-between align-items-center">
										Messages 									
										<a href="#" class="small">Mark all as read</a>
									</div>
								</li>
								<li>
									<div class="message-notif-scroll scrollbar-outer">
										<div class="notif-center">
											<a href="#">
												<div class="notif-img"> 
													<img src="assets/img/jm_denis.jpg" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="subject">Jimmy Denis</span>
													<span class="block">
														How are you ?
													</span>
													<span class="time">5 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-img"> 
													<img src="assets/img/chadengle.jpg" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="subject">Chad</span>
													<span class="block">
														Ok, Thanks !
													</span>
													<span class="time">12 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-img"> 
													<img src="assets/img/mlane.jpg" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="subject">Jhon Doe</span>
													<span class="block">
														Ready for the meeting today...
													</span>
													<span class="time">12 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-img"> 
													<img src="assets/img/talha.jpg" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="subject">Talha</span>
													<span class="block">
														Hi, Apa Kabar ?
													</span>
													<span class="time">17 minutes ago</span> 
												</div>
											</a>
										</div>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);">See all messages<i class="fa fa-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown hidden-caret" style="display: none;">
							<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-bell"></i>
								<span class="notification">4</span>
							</a>
							<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
								<li>
									<div class="dropdown-title">You have 4 new notification</div>
								</li>
								<li>
									<div class="notif-scroll scrollbar-outer">
										<div class="notif-center">
											<a href="#">
												<div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i> </div>
												<div class="notif-content">
													<span class="block">
														New user registered
													</span>
													<span class="time">5 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-icon notif-success"> <i class="fa fa-comment"></i> </div>
												<div class="notif-content">
													<span class="block">
														Rahmad commented on Admin
													</span>
													<span class="time">12 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-img"> 
													<img src="assets/img/profile2.jpg" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="block">
														Reza send messages to you
													</span>
													<span class="time">12 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-icon notif-danger"> <i class="fa fa-heart"></i> </div>
												<div class="notif-content">
													<span class="block">
														Farrah liked Admin
													</span>
													<span class="time">17 minutes ago</span> 
												</div>
											</a>
										</div>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown hidden-caret" style="display: none;">
							<a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
								<i class="fa fa-th"></i>
							</a>
							<div class="dropdown-menu quick-actions quick-actions-info animated fadeIn">
								<div class="quick-actions-header">
									<span class="title mb-1">Quick Actions</span>
									<span class="subtitle op-8">Shortcuts</span>
								</div>
								<div class="quick-actions-scroll scrollbar-outer">
									<div class="quick-actions-items">
										<div class="row m-0">
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<div class="avatar-item bg-danger rounded-circle">
														<i class="far fa-calendar-alt"></i>
													</div>
													<span class="text">Calendar</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<div class="avatar-item bg-warning rounded-circle">
														<i class="fas fa-map"></i>
													</div>
													<span class="text">Maps</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<div class="avatar-item bg-info rounded-circle">
														<i class="fas fa-file-excel"></i>
													</div>
													<span class="text">Reports</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<div class="avatar-item bg-success rounded-circle">
														<i class="fas fa-envelope"></i>
													</div>
													<span class="text">Emails</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<div class="avatar-item bg-primary rounded-circle">
														<i class="fas fa-file-invoice-dollar"></i>
													</div>
													<span class="text">Invoice</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<div class="avatar-item bg-secondary rounded-circle">
														<i class="fas fa-credit-card"></i>
													</div>
													<span class="text">Payments</span>
												</div>
											</a>
										</div>
									</div>
								</div>
							</div>
						</li>
                        <li class="nav-item   hidden-caret" style="text-align: right;">
                           <div id="MyClockDisplay" class="clock" onload="showTime()">  </div>
                           <div style="font-size:14px;color:#555;">
                           <?php if($_SESSION['User']['Role']=="Member"){ ?>
                               <?php echo $_SESSION['User']['MemberName'];?><br>
                               INR <?php echo getEarningWalletBalance($_SESSION['User']['MemberID'],2);?>
                           <?php } ?>
                           <?php if($_SESSION['User']['Role']=="Admin"){ ?>
                               <?php echo $_SESSION['User']['AdminName'];?><br>
                               INR <?php echo getEarningWalletBalance($_SESSION['User']['AdminID'],2);?>
                           <?php } ?>
                           <?php if($_SESSION['User']['Role']=="BSCenter"){ ?>
                                <?php echo $_SESSION['User']['SupportingCenterName'];?>
                                <br>
                               INR <?php echo getEarningWalletBalance($_SESSION['User']['SupportingCenterAdminID'],2);?>
                           <?php } ?>
                           </div>
                        </li> 
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm" style="border: 2px solid #f1f1f1;border-radius: 10px;">
									<?php if($_SESSION['User']['Role']=="Member"){ ?>
                                        <img src="<?php echo getImageUrl($_SESSION['User']['Thumb'],$_SESSION['User']['Sex']);?>" alt="..." class="avatar-img rounded-circle">
                                    <?php } ?>
                                    <?php if($_SESSION['User']['Role']=="Admin"){ ?>
                                        <img src="<?php echo getImageUrl($_SESSION['User']['Thumb'],$_SESSION['User']['Gender']);?>" alt="..." class="avatar-img rounded-circle">
								    <?php } ?>
                                    <?php if($_SESSION['User']['Role']=="BSCenter"){ ?>
                                        <img src="<?php echo getImageUrl($_SESSION['User']['ShopLogo'],$_SESSION['User']['Gender']);?>" alt="..." class="avatar-img rounded-circle">    
                                    <?php } ?>
                                </div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg">
                                            <?php if($_SESSION['User']['Role']=="Member"){ ?>
                                                <img src="<?php echo getImageUrl($_SESSION['User']['Thumb'],$_SESSION['User']['Sex']);?>" alt="image profile" class="avatar-img rounded">
                                            <?php } ?>
                                            <?php if($_SESSION['User']['Role']=="Admin"){ ?>
                                                <img src="<?php echo getImageUrl($_SESSION['User']['Thumb'],$_SESSION['User']['Gender']);?>" alt="image profile" class="avatar-img rounded">
                                            <?php } ?> 
                                            <?php if($_SESSION['User']['Role']=="BSCenter"){ ?>
                                                <img src="<?php echo getImageUrl($_SESSION['User']['ShopLogo'],$_SESSION['User']['Sex']);?>" alt="image profile" class="avatar-img rounded">
                                            <?php } ?>    
                                            </div>
											<div class="u-text">
                                            <?php if($_SESSION['User']['Role']=="Member"){ ?>
                                                <h4><?php echo $_SESSION['User']['MemberName'];?></h4>
                                                <p class="text-muted"><?php echo $_SESSION['User']['MemberCode'];?></p>
                                            <?php } ?>
                                            <?php if($_SESSION['User']['Role']=="Admin"){ ?>
                                                <h4><?php echo $_SESSION['User']['AdminName'];?></h4>
                                                <p class="text-muted"><?php echo $_SESSION['User']['AdminCode'];?></p>
                                            <?php } ?>
                                            <?php if($_SESSION['User']['Role']=="BSCenter"){ ?>
												<h4><?php echo $_SESSION['User']['SupportingCenterAdminName'];?></h4>
												<p class="text-muted"><?php echo $_SESSION['User']['MemberCode'];?></p>
                                            <?php } ?> 
                                                <!--<a href="dashboard.php?action=Settings/MyProfile" class="btn btn-xs btn-secondary btn-sm">View Profile</a>-->
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="dashboard.php?action=Settings/MyProfile">My Profile</a>
										<!--<a class="dropdown-item" href="#">My Balance</a>
										<a class="dropdown-item" href="#">Inbox</a>-->
										<!--<div class="dropdown-divider"></div>-->
										<!--<a class="dropdown-item" href="dashboard.php?action=Settings/AccountSettings">Account Setting</a>-->
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="dashboard.php?action=logout">Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>
		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
                    <?php include_once("includes/".UserRole."/leftmenu.php"); ?>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->
		<div class="main-panel">
			<div class="container">
                <?php if(UserRole=="Member") { 
                        $txncheck = $mysql->select("select * from _tbl_Members where MemberID='".$_SESSION['User']['MemberID']."'");
                        if($txncheck[0]['MemberTxnPassword']==""){
                            include_once("includes/".UserRole."/Settings/SaveTxnPassword.php");
                            exit;    
                        }
                } ?>
				<?php 
                if (isset($_GET['action']) && strlen($_GET['action'])>0) {
                    include_once("includes/".UserRole."/".$_GET['action'].".php");
                } else {
                    include_once("includes/".UserRole."/dashboard.php"); 
                }
                ?>
			</div> 
<?php if(UserRole=="Member") { ?>            
<?php 
    $feedback = $mysql->select("select * from _tbl_store_feedback where MemberCode='".$_SESSION['User']['MemberCode']."'");
    if(sizeof($feedback)>0){
        $Store= $mysql->select("select * from _tbl_business_supporting_center where SupportingCenterAdminID='".$feedback[0]['StoreID']."'");
        if($feedback[0]['IsFirst']=="1"){ ?>
            <script>
                $(document).ready(function(){  
                    AddFeedBack('<?php echo $feedback[0]['FeedBackID'];?>','<?php echo $Store[0]['SupportingCenterName'];?>','<?php echo $Store[0]['SupportingCenterAddressLine1'];?>','<?php echo $Store[0]['SupportingCenterAddressLine2'];?>');
                });
            </script>  
       <?php  }
    }
?>
<script>
function AddFeedBack(FeedBackID,StoreName,Address1,Address2){
            var txt ='<form action="" method="POST" id="FeedBackFrm'+FeedBackID+'">'
                        +'<input type="hidden" value="'+FeedBackID+'" id="FeedBackID" Name="FeedBackID">'
                        +'<div class="modal-header" style="padding-bottom:5px">'
                            +'<h4 class="heading"><strong>Please Give Your Feedback</strong> </h4>'
                            +'<button type="button" class="close"  aria-label="Close" style="color:white">'
                            +'</button>'
                            +'</div>'
                            +'<div class="modal-body">'
                                +'<label><b>Recently Purchased Store</b></label>'
                                +'<div class="form-group">'
                                    +'<label style="color: #737373 !important;">'+StoreName+'</lable><br>'
                                    +'<span style="font-weight:normal">'+Address1+',<br>'+Address2+'</span>'
                                +'</div>'
                                +'<div class="form-group"><label>Feedback</label>'
                                    +'<textarea name="FeedBack" id="FeedBack" class="form-control"></textarea>'
                                +'</div>'
                                +'<div class="form-group"><label>Ratting</label><br>'
                                    +'<div class="custom-control custom-radio">'
                                        +'<input type="radio" id="Rating1" name="Rating" value="1" class="custom-control-input">'
                                        +'<label class="custom-control-label" for="Rating1">1</label>'
                                    +'</div>'
                                    +'<div class="custom-control custom-radio">'
                                        +'<input type="radio" id="Rating2" name="Rating" value="2" class="custom-control-input">'
                                        +'<label class="custom-control-label" for="Rating2">2</label>'
                                    +'</div>'
                                    +'<div class="custom-control custom-radio">'
                                        +'<input type="radio" id="Rating3" name="Rating" value="3" class="custom-control-input">'
                                        +'<label class="custom-control-label" for="Rating3">3</label>'
                                    +'</div>'
                                    +'<div class="custom-control custom-radio">'   
                                        +'<input type="radio" id="Rating4" name="Rating" value="4" class="custom-control-input">'
                                        +'<label class="custom-control-label" for="Rating4">4</label>'
                                    +'</div>'
                                    +'<div class="custom-control custom-radio">'
                                        +'<input type="radio" id="Rating5" name="Rating" value="5" class="custom-control-input">'
                                        +'<label class="custom-control-label" for="Rating5">5</label>'
                                    +'</div><br><span style="font-size:13px;color:red" id="ErrRating"></span>'
                                +'</div>'                                                                   
                            +'</div>'
                            +'<div class="modal-footer">'
                                +'<button type="button" class="btn btn-success" onclick="ConfirmAddFeedback(\''+FeedBackID+'\')" >Yes, Confirm</button>'
                             +'</div>'
                     +'</form>';
        
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
           
}
function ConfirmAddFeedback(FeedBackID) {
    
    var Error=0;
        var Rating = document.getElementsByName("Rating");
          var check1 = 0;
          for(i=0;i<Rating.length;i++){
            if(Rating[i].checked) {
                 check1++;
            }
          }
        if(check1>0){
                var param = $( "#FeedBackFrm"+FeedBackID).serialize();
                $.post( "webservice.php?action=AddFeedback",param,function(data) {                 
                    var obj = JSON.parse(data); 
                    var html = "";                                                                              
                    if (obj.status=="failure") {
                        html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/imge/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
                        html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
                    }if (obj.status=="Success") {
                        html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/img/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
                        html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php' class='btn btn-outline-success'>Continue</a></div>"; 
                    }
                    $("#xconfrimation_text").html(html);
                    
                });
            }  else {
                $("#ErrRating").html("Please Give Your Rating");
                return false;
            }
}
</script> 
<?php } ?>
			<footer class="footer">
				<div class="container-fluid" >
					<nav class="pull-left" style="display: none;">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link" href="#">
									Help
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Licenses
								</a>
							</li>
						</ul>
					</nav>
					<div class="copyright ml-auto">
						Copyright &copy; 2020-2021, wintogether2.com 
					</div>				
				</div>
			</footer>
		</div>
	    <!--
		<div class="quick-sidebar">
			<a href="#" class="close-quick-sidebar">
				<i class="flaticon-cross"></i>
			</a>
			<div class="quick-sidebar-wrapper">
				<ul class="nav nav-tabs nav-line nav-color-secondary" role="tablist">
					<li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#messages" role="tab" aria-selected="true">Messages</a> </li>
					<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tasks" role="tab" aria-selected="false">Tasks</a> </li>
					<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab" aria-selected="false">Settings</a> </li>
				</ul>
				<div class="tab-content mt-3">
					<div class="tab-chat tab-pane fade show active" id="messages" role="tabpanel">
						<div class="messages-contact">
							<div class="quick-wrapper">
								<div class="quick-scroll scrollbar-outer">
									<div class="quick-content contact-content">
										<span class="category-title mt-0">Contacts</span>
										<div class="avatar-group">
											<div class="avatar">
												<img src="assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded-circle border border-white">
											</div>
											<div class="avatar">
												<img src="assets/img/chadengle.jpg" alt="..." class="avatar-img rounded-circle border border-white">
											</div>
											<div class="avatar">
												<img src="assets/img/mlane.jpg" alt="..." class="avatar-img rounded-circle border border-white">
											</div>
											<div class="avatar">
												<img src="assets/img/talha.jpg" alt="..." class="avatar-img rounded-circle border border-white">
											</div>
											<div class="avatar">
												<span class="avatar-title rounded-circle border border-white">+</span>
											</div>
										</div>
										<span class="category-title">Recent</span>
										<div class="contact-list contact-list-recent">
											<div class="user">
												<a href="#">
													<div class="avatar avatar-online">
														<img src="assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded-circle border border-white">
													</div>
													<div class="user-data">
														<span class="name">Jimmy Denis</span>
														<span class="message">How are you ?</span>
													</div>
												</a>
											</div>
											<div class="user">
												<a href="#">
													<div class="avatar avatar-offline">
														<img src="assets/img/chadengle.jpg" alt="..." class="avatar-img rounded-circle border border-white">
													</div>
													<div class="user-data">
														<span class="name">Chad</span>
														<span class="message">Ok, Thanks !</span>
													</div>
												</a>
											</div>
											<div class="user">
												<a href="#">
													<div class="avatar avatar-offline">
														<img src="assets/img/mlane.jpg" alt="..." class="avatar-img rounded-circle border border-white">
													</div>
													<div class="user-data">
														<span class="name">John Doe</span>
														<span class="message">Ready for the meeting today with...</span>
													</div>
												</a>
											</div>
										</div>
										<span class="category-title">Other Contacts</span>
										<div class="contact-list">
											<div class="user">
												<a href="#">
													<div class="avatar avatar-online">
														<img src="assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded-circle border border-white">
													</div>
													<div class="user-data2">
														<span class="name">Jimmy Denis</span>
														<span class="status">Online</span>
													</div>
												</a>
											</div>
											<div class="user">
												<a href="#">
													<div class="avatar avatar-offline">
														<img src="assets/img/chadengle.jpg" alt="..." class="avatar-img rounded-circle border border-white">
													</div>
													<div class="user-data2">
														<span class="name">Chad</span>
														<span class="status">Active 2h ago</span>
													</div>
												</a>
											</div>
											<div class="user">
												<a href="#">
													<div class="avatar avatar-away">
														<img src="assets/img/talha.jpg" alt="..." class="avatar-img rounded-circle border border-white">
													</div>
													<div class="user-data2">
														<span class="name">Talha</span>
														<span class="status">Away</span>
													</div>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="messages-wrapper">
							<div class="messages-title">
								<div class="user">
									<div class="avatar avatar-offline float-right ml-2">
										<img src="assets/img/chadengle.jpg" alt="..." class="avatar-img rounded-circle border border-white">
									</div>
									<span class="name">Chad</span>
									<span class="last-active">Active 2h ago</span>
								</div>
								<button class="return">
									<i class="flaticon-left-arrow-3"></i>
								</button>
							</div>
							<div class="messages-body messages-scroll scrollbar-outer">
								<div class="message-content-wrapper">
									<div class="message message-in">
										<div class="avatar avatar-sm">
											<img src="assets/img/chadengle.jpg" alt="..." class="avatar-img rounded-circle border border-white">
										</div>
										<div class="message-body">
											<div class="message-content">
												<div class="name">Chad</div>
												<div class="content">Hello, Rian</div>
											</div>
											<div class="date">12.31</div>
										</div>
									</div>
								</div>
								<div class="message-content-wrapper">
									<div class="message message-out">
										<div class="message-body">
											<div class="message-content">
												<div class="content">
													Hello, Chad
												</div>
											</div>
											<div class="message-content">
												<div class="content">
													What's up?
												</div>
											</div>
											<div class="date">12.35</div>
										</div>
									</div>
								</div>
								<div class="message-content-wrapper">
									<div class="message message-in">
										<div class="avatar avatar-sm">
											<img src="assets/img/chadengle.jpg" alt="..." class="avatar-img rounded-circle border border-white">
										</div>
										<div class="message-body">
											<div class="message-content">
												<div class="name">Chad</div>
												<div class="content">
													Thanks
												</div>
											</div>
											<div class="message-content">
												<div class="content">
													When is the deadline of the project we are working on ?
												</div>
											</div>
											<div class="date">13.00</div>
										</div>
									</div>
								</div>
								<div class="message-content-wrapper">
									<div class="message message-out">
										<div class="message-body">
											<div class="message-content">
												<div class="content">
													The deadline is about 2 months away
												</div>
											</div>
											<div class="date">13.10</div>
										</div>
									</div>
								</div>
								<div class="message-content-wrapper">
									<div class="message message-in">
										<div class="avatar avatar-sm">
											<img src="assets/img/chadengle.jpg" alt="..." class="avatar-img rounded-circle border border-white">
										</div>
										<div class="message-body">
											<div class="message-content">
												<div class="name">Chad</div>
												<div class="content">
													Ok, Thanks !
												</div>
											</div>
											<div class="date">13.15</div>
										</div>
									</div>
								</div>
							</div>
							<div class="messages-form">
								<div class="messages-form-control">
									<input type="text" placeholder="Type here" class="form-control input-pill input-solid message-input">
								</div>
								<div class="messages-form-tool">
									<a href="#" class="attachment">
										<i class="flaticon-file"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="tasks" role="tabpanel">
						<div class="quick-wrapper tasks-wrapper">
							<div class="tasks-scroll scrollbar-outer">
								<div class="tasks-content">
									<span class="category-title mt-0">Today</span>
									<ul class="tasks-list">
										<li>
											<label class="custom-checkbox custom-control checkbox-secondary">
												<input type="checkbox" checked="" class="custom-control-input"><span class="custom-control-label">Planning new project structure</span>
												<span class="task-action">
													<a href="#" class="link text-danger">
														<i class="flaticon-interface-5"></i>
													</a>
												</span>
											</label>
										</li>
										<li>
											<label class="custom-checkbox custom-control checkbox-secondary">
												<input type="checkbox" class="custom-control-input"><span class="custom-control-label">Create the main structure							</span>
												<span class="task-action">
													<a href="#" class="link text-danger">
														<i class="flaticon-interface-5"></i>
													</a>
												</span>
											</label>
										</li>
										<li>
											<label class="custom-checkbox custom-control checkbox-secondary">
												<input type="checkbox" class="custom-control-input"><span class="custom-control-label">Add new Post</span>
												<span class="task-action">
													<a href="#" class="link text-danger">
														<i class="flaticon-interface-5"></i>
													</a>
												</span>
											</label>
										</li>
										<li>
											<label class="custom-checkbox custom-control checkbox-secondary">
												<input type="checkbox" class="custom-control-input"><span class="custom-control-label">Finalise the design proposal</span>
												<span class="task-action">
													<a href="#" class="link text-danger">
														<i class="flaticon-interface-5"></i>
													</a>
												</span>
											</label>
										</li>
									</ul>

									<span class="category-title">Tomorrow</span>
									<ul class="tasks-list">
										<li>
											<label class="custom-checkbox custom-control checkbox-secondary">
												<input type="checkbox" class="custom-control-input"><span class="custom-control-label">Initialize the project							</span>
												<span class="task-action">
													<a href="#" class="link text-danger">
														<i class="flaticon-interface-5"></i>
													</a>
												</span>
											</label>
										</li>
										<li>
											<label class="custom-checkbox custom-control checkbox-secondary">
												<input type="checkbox" class="custom-control-input"><span class="custom-control-label">Create the main structure							</span>
												<span class="task-action">
													<a href="#" class="link text-danger">
														<i class="flaticon-interface-5"></i>
													</a>
												</span>
											</label>
										</li>
										<li>
											<label class="custom-checkbox custom-control checkbox-secondary">
												<input type="checkbox" class="custom-control-input"><span class="custom-control-label">Updates changes to GitHub							</span>
												<span class="task-action">
													<a href="#" class="link text-danger">
														<i class="flaticon-interface-5"></i>
													</a>
												</span>
											</label>
										</li>
										<li>
											<label class="custom-checkbox custom-control checkbox-secondary">
												<input type="checkbox" class="custom-control-input"><span title="This task is too long to be displayed in a normal space!" class="custom-control-label">This task is too long to be displayed in a normal space!				</span>
												<span class="task-action">
													<a href="#" class="link text-danger">
														<i class="flaticon-interface-5"></i>
													</a>
												</span>
											</label>
										</li>
									</ul>

									<div class="mt-3">
										<div class="btn btn-primary btn-rounded btn-sm">
											<span class="btn-label">
												<i class="fa fa-plus"></i>
											</span>
											Add Task
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="settings" role="tabpanel">
						<div class="quick-wrapper settings-wrapper">
							<div class="quick-scroll scrollbar-outer">
								<div class="quick-content settings-content">

									<span class="category-title mt-0">General Settings</span>
									<ul class="settings-list">
										<li>
											<span class="item-label">Enable Notifications</span>
											<div class="item-control">
												<input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-style="btn-round" data-size>
											</div>
										</li>
										<li>
											<span class="item-label">Signin with social media</span>
											<div class="item-control">
												<input type="checkbox" data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
											</div>
										</li>
										<li>
											<span class="item-label">Backup storage</span>
											<div class="item-control">
												<input type="checkbox" data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
											</div>
										</li>
										<li>
											<span class="item-label">SMS Alert</span>
											<div class="item-control">
												<input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
											</div>
										</li>
									</ul>

									<span class="category-title mt-0">Notifications</span>
									<ul class="settings-list">
										<li>
											<span class="item-label">Email Notifications</span>
											<div class="item-control">
												<input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
											</div>
										</li>
										<li>
											<span class="item-label">New Comments</span>
											<div class="item-control">
												<input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
											</div>
										</li>
										<li>
											<span class="item-label">Chat Messages</span>
											<div class="item-control">
												<input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
											</div>
										</li>
										<li>
											<span class="item-label">Project Updates</span>
											<div class="item-control">
												<input type="checkbox" data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
											</div>
										</li>
										<li>
											<span class="item-label">New Tasks</span>
											<div class="item-control">
												<input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="custom-template">
			<div class="title">Settings</div>
			<div class="custom-content">
				<div class="switcher">
					<div class="switch-block">
						<h4>Logo Header</h4>
						<div class="btnSwitch">
							<button type="button" class="changeLogoHeaderColor" data-color="dark"></button>
							<button type="button" class="selected changeLogoHeaderColor" data-color="blue"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="green"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="red"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="white"></button>
							<br/>
							<button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Navbar Header</h4>
						<div class="btnSwitch">
							<button type="button" class="changeTopBarColor" data-color="dark"></button>
							<button type="button" class="changeTopBarColor" data-color="blue"></button>
							<button type="button" class="changeTopBarColor" data-color="purple"></button>
							<button type="button" class="changeTopBarColor" data-color="light-blue"></button>
							<button type="button" class="changeTopBarColor" data-color="green"></button>
							<button type="button" class="changeTopBarColor" data-color="orange"></button>
							<button type="button" class="changeTopBarColor" data-color="red"></button>
							<button type="button" class="changeTopBarColor" data-color="white"></button>
							<br/>
							<button type="button" class="changeTopBarColor" data-color="dark2"></button>
							<button type="button" class="selected changeTopBarColor" data-color="blue2"></button>
							<button type="button" class="changeTopBarColor" data-color="purple2"></button>
							<button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
							<button type="button" class="changeTopBarColor" data-color="green2"></button>
							<button type="button" class="changeTopBarColor" data-color="orange2"></button>
							<button type="button" class="changeTopBarColor" data-color="red2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Sidebar</h4>
						<div class="btnSwitch">
							<button type="button" class="selected changeSideBarColor" data-color="white"></button>
							<button type="button" class="changeSideBarColor" data-color="dark"></button>
							<button type="button" class="changeSideBarColor" data-color="dark2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Background</h4>
						<div class="btnSwitch">
							<button type="button" class="changeBackgroundColor" data-color="bg2"></button>
							<button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
							<button type="button" class="changeBackgroundColor" data-color="bg3"></button>
							<button type="button" class="changeBackgroundColor" data-color="dark"></button>
						</div>
					</div>
				</div>
			</div>
			<div class="custom-toggle">
				<i class="flaticon-settings"></i>
			</div>
		</div>
        -->
		
	</div>
	<!--   Core JS Files   -->
	
    
    <script>
$( document ).ready(function() {
    
        Circles.create({
            id:'circles-1',
            radius:45,
            value:60,
            maxValue:100,
            width:7,
            text: <?php echo $leftCount>0 ? $leftCount : 0;?>,
            colors:['#f1f1f1', '#FF9E27'],
            duration:400,
            wrpClass:'circles-wrp',
            textClass:'circles-text',
            styleWrapper:true,
            styleText:true
        });

        Circles.create({
            id:'circles-2',
            radius:45,
            value:70,
            maxValue:100,
            width:7,
            text: <?php echo $rightCount >0 ? $rightCount : 0;?>,
            colors:['#f1f1f1', '#2BB930'],
            duration:400,
            wrpClass:'circles-wrp',
            textClass:'circles-text',
            styleWrapper:true,
            styleText:true
        });
        
        

        /*Circles.create({
            id:'circles-3',
            radius:45,
            value:40,
            maxValue:100,
            width:7,
            text: 12,
            colors:['#f1f1f1', '#F25961'],
            duration:400,
            wrpClass:'circles-wrp',
            textClass:'circles-text',
            styleWrapper:true,
            styleText:true
        }) */

        var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

        var mytotalIncomeChart = new Chart(totalIncomeChart, {
            type: 'bar',
            data: {
                labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
                datasets : [{
                    label: "Total Income",
                    backgroundColor: '#00ff00',
                    borderColor: 'rgb(23, 125, 255)',
                    data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: false,
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            display: false //this will remove only the label
                        },
                        gridLines : {
                            drawBorder: false,
                            display : false
                        }
                    }],
                    xAxes : [ {
                        gridLines : {
                            drawBorder: false,
                            display : false
                        }
                    }]
                },
            }
        });
        
        
        var totalSpentChart = document.getElementById('totalSpentChart').getContext('2d');

        var mytotalSpentChart = new Chart(totalSpentChart, {
            type: 'bar',
            data: {
                labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
                datasets : [{
                    label: "Total Spent",
                    backgroundColor: '#ff9e27',
                    borderColor: 'rgb(23, 125, 255)',
                    data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: false,
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            display: false //this will remove only the label
                        },
                        gridLines : {
                            drawBorder: false,
                            display : false
                        }
                    }],
                    xAxes : [ {
                        gridLines : {
                            drawBorder: false,
                            display : false
                        }
                    }]
                },
            }
        });


        $('#lineChart').sparkline([105,103,123,100,95,105,115], {
            type: 'line',
            height: '70',
            width: '100%',
            lineWidth: '2',
            lineColor: '#ffa534',
            fillColor: 'rgba(255, 165, 52, .14)'
        });
      $('#circles-1 .circles-wrp .circles-text').html('0');
        $('#circles-2 .circles-wrp .circles-text').html('0');     
    setTimeout(function() {
        $('#circles-1 .circles-wrp .circles-text').html('<?php echo $leftCount;?>');
        $('#circles-2 .circles-wrp .circles-text').html('<?php echo $rightCount;?>');    
    },2400);
     
});
    </script>
<div class="modal fade right" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" style="top: 0px !important;">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document" >
    <div class="modal-content" >
    <div id="xconfrimation_text"></div>
    </div>
  </div>
</div>
</body>
</html>
