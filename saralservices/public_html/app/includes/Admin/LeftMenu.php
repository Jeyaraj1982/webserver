 <div class="sidebar sidebar-style-2" data-background-color="dark2">            
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
               <p align="center">
        <!--    <img src="assets/logo.jpeg" style="width:60%;margin:0px auto;">-->
        </p>      
                    <ul class="nav nav-primary">
                        <li class="nav-item active">
                            <a href="dashboard.php">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <br><br>
                        <li class="nav-item">   
                            <a data-toggle="collapse" href="#Dealers">
                                <i class="fas fa-users"></i>
                                <p>Dealers</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="Dealers">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="dashboard.php?action=Dealers/Manage&Status=All">
                                            <span class="sub-item">Manage Dealers</span>
                                        </a>
                                    </li>
                                     <li>
                                        <a href="dashboard.php?action=Dealers/Refill">
                                            <span class="sub-item">Refill Wallet</span>
                                        </a>
                                    </li>
                                     <li>
                                        <a href="dashboard.php?action=Dealers/Reverse">
                                            <span class="sub-item">Reverse Amount</span>
                                        </a>
                                    </li>
                                   <!-- <li>
                                        <a href="dashboard.php?action=Retailers/Manage&Status=All">
                                            <span class="sub-item">Manage Retailers</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard.php?action=SearchMember">
                                            <span class="sub-item">Search Partner</span>
                                        </a>
                                    </li> -->
                                </ul>
                            </div>
                        </li>
                        
                        <li class="nav-item">   
                            <a data-toggle="collapse" href="#Members">
                                <i class="fas fa-users"></i>
                                <p>Members</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="Members">
                                <ul class="nav nav-collapse">
                                    
                                     <li>
                                        <a href="dashboard.php?action=Members/Manage&Status=All">
                                            <span class="sub-item">Manage Members</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">   
                            <a data-toggle="collapse" href="#Retailer">
                                <i class="fas fa-users"></i>
                                <p>Retailers</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="Retailer">
                                <ul class="nav nav-collapse">
                                    
                                     <li>
                                        <a href="dashboard.php?action=Retailers/List">
                                            <span class="sub-item">Manage Retailers</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard.php?action=Retailers/Refill">
                                            <span class="sub-item">Refill Wallet</span>
                                        </a>
                                    </li>
                                    
                                     <li>
                                        <a href="dashboard.php?action=Retailers/Reverse">
                                            <span class="sub-item">Reverse Amount</span>
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
                                 
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#WalletRequests">
                                <i class="fas fa-user"></i>
                                <p>Requests</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="WalletRequests">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="dashboard.php?action=Requests/WalletRequests">
                                            <span class="sub-item">Wallet Requests</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard.php?action=Requests/TNEBRequests">
                                            <span class="sub-item">TNEB Requests</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard.php?action=Requests/IMPSRequests&filter=Accepted">
                                            <span class="sub-item">IMPS Requests</span>
                                        </a>
                                    </li>
                                 
                                </ul>
                            </div>
                        </li>
                        
                        
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#MyReports">
                                <i class="fas fa-user"></i>
                                <p>Reports</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="MyReports">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="dashboard.php?action=Reports/OperatorwiseSale">
                                            <span class="sub-item">Operator wise sales</span>
                                        </a>
                                    </li>
                                     <li>
                                        <a href="dashboard.php?action=Reports/Transactions">
                                            <span class="sub-item">Transactions</span>
                                        </a>
                                    </li>
                                    
                                     <li>
                                        <a href="dashboard.php?action=Reports/PendingTransactions">
                                            <span class="sub-item">Pendings Txns</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard.php?action=Reports/AllUsers">
                                            <span class="sub-item">All Users</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                         
                         
                         <li class="nav-item">
                            <a data-toggle="collapse" href="#News">
                                <i class="fas fa-user"></i>
                                <p>Manage News</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="News">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="dashboard.php?action=News/Manage&f=Retailers">
                                            <span class="sub-item">Retailer News</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard.php?action=News/Manage&f=Dealers">
                                            <span class="sub-item">Dealer News</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard.php?action=News/Manage&f=All">    
                                            <span class="sub-item">All User News</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#MyProfile">
                                <i class="fas fa-user"></i>
                                <p>My Profile</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="MyProfile">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="dashboard.php?action=MyProfile">
                                            <span class="sub-item">My profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard.php?action=ChangePassword">
                                            <span class="sub-item">Change Password</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        
                         
                        
                        
                         
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#Logs">
                                <i class="fas fa-clipboard-list"></i>
                                <p>Logs</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="Logs">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="dashboard.php?action=Logs/EmailLog">
                                            <span class="sub-item">Email Log</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard.php?action=Logs/SmsLog">
                                            <span class="sub-item">SMS Log</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard.php?action=Logs/LoginLog&Status=All">
                                            <span class="sub-item">Login Log</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard.php?action=Logs/IFSCLog&Status=All">
                                            <span class="sub-item">IFSC Log</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard.php?action=Logs/TNEBLog&Status=All">
                                            <span class="sub-item">TNEB Log</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard.php?action=Logs/MobOperatorLog&Status=All">
                                            <span class="sub-item">Mobile Operator Log</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard.php?action=Logs/MobOfferLog&Status=All">
                                            <span class="sub-item">Mobile Offer Log</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard.php?action=Logs/MobROfferLog&Status=All">
                                            <span class="sub-item">Mobile R-Offer Log</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard.php?action=Logs/ForgotPassword&Status=All">
                                            <span class="sub-item">Forgot Password</span>
                                        </a>
                                    </li> 
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#Settings">
                                <i class="fas fa-clipboard-list"></i>
                                <p>Settings</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="Settings">
                                <ul class="nav nav-collapse">
                                <!--
                                    <li>
                                        <a href="dashboard.php?action=Email/ManageEmailApi&Status=All">
                                            <span class="sub-item">Email Api</span>
                                        </a>
                                    </li> 
                                    <li>
                                        <a href="dashboard.php?action=SMS/ManageMobileSMS&Status=All">
                                            <span class="sub-item">Mobile SMS</span>
                                        </a>
                                    </li>  -->
                                    <li>
                                        <a href="dashboard.php?action=Settings/Operators">
                                            <span class="sub-item">Operator</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="dashboard.php?action=AddBankDetails">
                                <i class="fas fa-clipboard-list"></i>
                                <p>Add Bank Details</p>
                                <span class="caret"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div> 