<?php include_once("header.php");?>
<div id="account-login" class="container">
	<ul class="breadcrumb">
		<li><a href="<?php echo WEB_URL;?>/index.php">Home</a></li>
		<li><a href="<?php echo WEB_URL;?>/MyProfile.php">My Profile</a></li>
	</ul>
    <div class="row">
        <div id="content" class="col-md-9 col-sm-8 col-xs-12">
			<div class="row">
				<div class="col-md-12 col-xs-12">
					<div class="well" style="border:none">
						<h2 class="heading">Dashboard</h2>
						<div class="form-group row">
							<label class="col-sm-4" style="font-weight:bold">My Referal Code</label>
							<label class="col-sm-7">:&nbsp;<?php echo $_SESSION['User']['Referral'];?></label>
						</div>
                        <div class="form-group row">
                            <label class="col-sm-4" style="font-weight:bold">Referred Customers</label>
                            <label class="col-sm-7">:&nbsp;<?php echo sizeof($mysql->select("select * from _tbl_customer where CreatedBy='".$_SESSION['User']['CustomerID']."'"));?> 
                            (<a href="MyReferredCustomers.php"  style="text-decoration: underline;">view</a>)&nbsp;
                            (<a href="AddCustomers.php" style="text-decoration: underline;">Add Customer</a>)
                            </label>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4" style="font-weight:bold">Total Earnings</label>
                            <label class="col-sm-7">:&nbsp;Rs. <?php echo number_format(Wallet::getTotalCredits($_SESSION['User']['CustomerID']),2);?></label>
                        </div>                         
                        <div class="form-group row">
                            <label class="col-sm-4" style="font-weight:bold">Available Balance</label>
                            <label class="col-sm-7">:&nbsp;Rs. <?php echo number_format(Wallet::getBalance($_SESSION['User']['CustomerID']),2);?>
                             (<a href="MyAccountSummary.php"  style="text-decoration: underline;">view</a>)&nbsp;
                            </label>
                        </div>						 
                        <div class="form-group row">
                            <label class="col-sm-4" style="font-weight:bold">Member Bank Account</label>
                            <label class="col-sm-7">: 
                                <?php
                                    $bankaccount = $mysql->select("select * from _tbl_customer_bankinformations where CustomerID='".$_SESSION['User']['CustomerID']."'");
                                    if (sizeof($bankaccount)==0) {
                                        ?>
                                        <a href="MyBankInformation.php"  style="text-decoration: underline;">Add Your Bank Information</a>
                                        <?php
                                    }  else {
                                        echo $bankaccount[0]['BankAccountName'].", A/c No: ".$bankaccount[0]['BankAccountNumber'].", IFSCode: ".$bankaccount[0]['IFSCode'];
                                    }
                                ?>
                            
                            </label>
                        </div>                         

						<button type="button" class="btn btn-primary" onclick="location.href='index.php'">Back</button>
					</div>
				</div> 
			</div>                                     
		</div>
	</div>
</div>
<?php include_once("footer.php");?>
