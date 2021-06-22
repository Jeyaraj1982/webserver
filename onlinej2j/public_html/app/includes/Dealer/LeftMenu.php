<div class="sidebar sidebar-style-2" data-background-color="dark2">			
	<div class="sidebar-wrapper scrollbar scrollbar-inner">
		<div class="sidebar-content">
       
			<ul class="nav nav-primary">
				<li class="nav-item active">
					<a href="dashboard.php">
						<i class="fas fa-home"></i>
						<p>Dashboard</p>
					</a>
				</li>
                <br><br>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#Cutomers">
                        <i class="fas fa-users"></i>
                        <p>Retailers</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="Cutomers">
                        <ul class="nav nav-collapse">
                        <li>
                                <a href="dashboard.php?action=Retailers/Create">
                                    <span class="sub-item">Create Retailer</span>
                                </a>
                            </li>
                            <li>
                                <a href="dashboard.php?action=Retailers/Refill">
                                    <span class="sub-item">Refill</span>
                                </a>
                            </li>
                            <li>
                                <a href="dashboard.php?action=Retailers/Manage">
                                    <span class="sub-item">Manage Retailers</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
				 <li class="nav-item">
                            <a data-toggle="collapse" href="#MyAccounts">
                                <i class="fas fa-user"></i>
                                <p>My Accounts</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="MyAccounts">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="dashboard.php?action=Transactions">
                                            <span class="sub-item">My Account Summary</span>
                                        </a>
                                    </li>
                                     <li>
                                        <a href="dashboard.php?action=Purchased">
                                            <span class="sub-item">My Purcahse Summary</span>
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
                            <li>   
                                <a href="dashboard.php?action=ChangePin">
                                    <span class="sub-item">Change Pin</span>
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
                <li class="nav-item">
                    <a data-toggle="collapse" href="#Wallet">
                        <i class="fas fa-th-list"></i>
                        <p>Wallet</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="Wallet">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="dashboard.php?action=WalletRequest">
                                    <span class="sub-item">Wallet Update</span>
                                </a>
                            </li>
                            <li>
                                <a href="dashboard.php?action=WalletRequests">
                                    <span class="sub-item">Wallet Requests</span>
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
                <li class="nav-item"><a href="dashboard.php?action=News/Manage"><span class="sub-item">News</span></a></li>
			</ul>
		</div>
	</div>
</div>