<?php if ($_SESSION['User']['MemberPin']>0) {?>
<div class="sidebar sidebar-style-2">			
	<div class="sidebar-wrapper scrollbar scrollbar-inner">
		<div class="sidebar-content">
			<ul class="nav nav-primary">
             
				<li class="nav-item ">
					<a href="dashboard.php">
						<i class="fas fa-home"></i>
						<p>Dashboard</p>
					</a>
				</li>
                 
                <li class="nav-item">
                    <a data-toggle="collapse" href="#Recharge"><i class="fas fa-user"></i><p>Business</p><span class="caret"></span></a>
                    <div class="collapse" id="Recharge">
                        <ul class="nav nav-collapse">
                            <li><a href="dashboard.php?action=MobileRecharge/Recharge"><span class="sub-item">Mobile Recharge</span></a></li>
                            <li><a href="dashboard.php?action=DTHRecharge/Recharge"><span class="sub-item">DTH Recharge</span></a></li>
                            <li><a href="dashboard.php?action=MoneyTransfer"><span class="sub-item">Money Transfer</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#MyAccounts"><i class="fas fa-user"></i><p>My Accounts</p><span class="caret"></span></a>
                    <div class="collapse" id="MyAccounts">
                        <ul class="nav nav-collapse">
                            <li><a href="dashboard.php?action=Transactions"><span class="sub-item">My Account Summary</span></a></li>
                            <li><a href="dashboard.php?action=Purchased"><span class="sub-item">Purchase Summary</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#Wallet"><i class="fas fa-user"></i><p>Wallet</p><span class="caret"></span></a>
                    <div class="collapse" id="Wallet">
                        <ul class="nav nav-collapse">
                            <li><a href="dashboard.php?action=WalletRequest"><span class="sub-item">Wallet Request</span></a></li>
                            <li><a href="dashboard.php?action=WalletRequests"><span class="sub-item">Wallet Requests</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#MyReports"><i class="fas fa-user"></i><p>My Reports</p><span class="caret"></span></a>
                    <div class="collapse" id="MyReports">
                        <ul class="nav nav-collapse">
                            <li><a href="dashboard.php?action=Reports/Transactions"><span class="sub-item">Transaction Hisotry</span></a></li>
                            <li><a href="dashboard.php?action=Reports/PendingTransactions"><span class="sub-item">Pending Transactions</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#MyProfile"><i class="fas fa-th-list"></i><p>My Profile</p><span class="caret"></span></a>
                    <div class="collapse" id="MyProfile">
                        <ul class="nav nav-collapse">
                            <li><a href="dashboard.php?action=Settings/MyProfile"><span class="sub-item">My Profile</span></a></li>
                            <li><a href="dashboard.php?action=Settings/MyDealerInfo"><span class="sub-item">My Dealer Info</span></a></li>
                            <li><a href="dashboard.php?action=Settings/ChangePassword"><span class="sub-item">Change Password</span></a></li>
                            <li><a href="dashboard.php?action=Settings/MySettings"><span class="sub-item">My Settings</span></a></li>
                            <li><a href="dashboard.php?action=Settings/MyChargesandCommission"><span class="sub-item">My Charges</span></a></li>
                            <li><a href="dashboard.php?action=Settings/ChangePin"><span class="sub-item">Change Pin</span></a></li>
                            <li><a href="dashboard.php?action=Settings/AddMyContact"><span class="sub-item">Add My Contacts</span></a></li>
                            <li><a href="dashboard.php?action=Settings/ManageMyContact"><span class="sub-item">Manage My Contacts</span></a></li>
                        </ul>
                    </div>
                </li>
			</ul>
		</div>                           
	</div>
</div>
<?php } ?>