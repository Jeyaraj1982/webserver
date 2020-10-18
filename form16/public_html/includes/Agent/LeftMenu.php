<div class="sidebar sidebar-style-2" data-background-color="dark2">			
	<div class="sidebar-wrapper scrollbar scrollbar-inner">
		<div class="sidebar-content">
        <p align="center">
            <img src="assets/logo.jpeg" style="width:60%;margin:0px auto;">
        </p>
			<ul class="nav nav-primary">
				<li class="nav-item active">
					<a href="dashboard.php">
						<i class="fas fa-home"></i>
						<p>Dashboard</p>
					</a>
				</li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#Cutomers">
                        <i class="fas fa-users"></i>
                        <p>Customers</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="Cutomers">
                        <ul class="nav nav-collapse">
                        <li>
                                <a href="dashboard.php?action=CreateCustomer">
                                    <span class="sub-item">Create Customer</span>
                                </a>
                            </li>
                            <li>
                                <a href="dashboard.php?action=ManageCustomer&Status=All">
                                    <span class="sub-item">Manage Customers</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
				<li class="nav-item">
                    <a data-toggle="collapse" href="#Form16">
                        <i class="fas fa-pen-square"></i>
                        <p>Form 16</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="Form16">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="dashboard.php?action=CreateForm16">
                                    <span class="sub-item">Create Form 16</span>
                                </a>
                                <a href="dashboard.php?action=ManageForm16&Status=All">
                                    <span class="sub-item">Manage Form 16</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#Acounts">
                        <i class="fas fa-pen-square"></i>
                        <p>My Accounts</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="Acounts">
                        <ul class="nav nav-collapse">
                            <li>
                             <a href="dashboard.php?action=UpdateMyWallet">
                                    <span class="sub-item">Update Wallet</span>
                                </a>
                                  <a href="dashboard.php?action=MyAccountSummary">
                                    <span class="sub-item">Account Summary</span>
                                </a>
                            <!--    <a href="dashboard.php?action=MyOrders">
                                    <span class="sub-item">My Orders</span>
                                </a> -->
                                <a href="dashboard.php?action=MyInvoices">
                                    <span class="sub-item">My Invoices</span>
                                </a>
                                <a href="dashboard.php?action=ViewPayments">
                                    <span class="sub-item">My Payments</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#MyProfile">
                        <i class="fas fa-th-list"></i>
                        <p>My Profile</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="MyProfile">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="dashboard.php?action=MyProfile">
                                    <span class="sub-item">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="dashboard.php?action=ChangePassword">
                                    <span class="sub-item">Change Password</span>
                                </a>
                            </li>
                        <!--    <li>
                                <a href="dashboard.php?action=BankAccount">
                                    <span class="sub-item">Bank A/C</span>
                                </a>
                            </li>
                            <li>
                                <a href="dashboard.php?action=PanCard">
                                    <span class="sub-item">Pan Card</span>
                                </a>
                            </li>
                            <li>
                                <a href="dashboard.php?action=AadhaarCard">
                                    <span class="sub-item">Aadhaar Card</span>
                                </a>
                            </li>  -->
                        </ul>
                    </div>
                </li>
			</ul>
		</div>
	</div>
</div>