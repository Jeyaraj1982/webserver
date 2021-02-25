<?php include_once("header.php");?>

<div id="account-login" class="container">
	<ul class="breadcrumb">
		<li><a>Home</a></li>
		<li><a href="MyProfile.php">My Profile</a></li>
	</ul>
    <div class="row">
        <div id="content" class="col-md-9 col-sm-8 col-xs-12">
			<div class="row">
				<div class="col-md-6 col-xs-12">
					<div class="well" style="border:none">
						<h2 class="heading">My Profile</h2>
						<div class="form-group row">
							<label class="col-sm-4" style="font-weight:bold">Name</label>
							<label class="col-sm-7">:&nbsp;<?php echo $_SESSION['User']['CustomerName'];?></label>
						</div>
						<div class="form-group row">
							<label class="col-sm-4" style="font-weight:bold">Email ID</label>
							<label class="col-sm-7">:&nbsp;<?php echo $_SESSION['User']['EmailID'];?></label>
						</div>
						<div class="form-group row">
							<label class="col-sm-4" style="font-weight:bold">Mobile Number</label>
							<label class="col-sm-7">:&nbsp;<?php echo $_SESSION['User']['MobileNumber'];?></label>
						</div>
						<button type="button" class="btn btn-primary" onclick="location.href='index.php'">Back to Shopping</button>
					</div>
				</div> 
			</div>
		</div>
	</div>
</div>
<?php include_once("footer.php");?>
