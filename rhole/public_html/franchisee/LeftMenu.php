 
<div class="sidebar sidebar-style-2" data-background-color="dark2">            
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <p align="center">
                <img src="" style="width:60%;margin:0px auto;">  <br>
            </p>      
            <ul class="nav nav-primary">
                <li class="nav-item active">
                    <a href="dashboard.php">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <?php if ($_SESSION['FRANCHISEE']['CountryID']!=-1) {?>
                <li class="nav-item">   
                    <a data-toggle="collapse" href="#NewAdd">
                        <i class="fas fa-users"></i>
                        <p>Posted Ads</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="NewAdd">
                        <ul class="nav nav-collapse">
                            <li><a href="dashboard.php?action=postad/viewpostads"><span class="sub-item">Manage Post Ads</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">   
                    <a data-toggle="collapse" href="#UserManage">
                        <i class="fas fa-users"></i>
                        <p>Users</p>
                        <span class="caret"></span>
                    </a>                                                                         
                    <div class="collapse" id="UserManage">
                        <ul class="nav nav-collapse">
                            <li><a href="dashboard.php?action=postad/listuser"><span class="sub-item">List Users</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">                                                                      
                    <a data-toggle="collapse" href="#FeatureAds">
                        <i class="fas fa-users"></i>
                        <p>Featured Ads</p>
                        <span class="caret"></span>
                    </a>                                                                         
                    <div class="collapse" id="FeatureAds">
                        <ul class="nav nav-collapse">
                            <li><a href="dashboard.php?action=featured/list&f=a"><span class="sub-item">Active Feature Ads</span></a></li>
                        </ul>
                    </div>
                </li>
               
                <li class="nav-item">   
                    <a data-toggle="collapse" href="#Packages">
                        <i class="fas fa-users"></i>
                        <p>Ads Packages</p>
                        <span class="caret"></span>
                    </a>                                                                          
                    <div class="collapse" id="Packages">
                        <ul class="nav nav-collapse">
                            <li><a href="dashboard.php?action=upgradepackage/list&f=a"><span class="sub-item">Active Packages</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">   
                    <a data-toggle="collapse" href="#Account">
                        <i class="fas fa-users"></i>
                        <p>My Account</p>
                        <span class="caret"></span>
                    </a>                                                                         
                    <div class="collapse" id="Account">
                        <ul class="nav nav-collapse">
                            <li><a href="dashboard.php?action=Wallet/AddBankAccount"><span class="sub-item">Add Bank Details</span></a></li>
                            <li><a href="dashboard.php?action=Wallet/Transactions"><span class="sub-item">Wallet Transaction</span></a></li>
                            <li><a href="dashboard.php?action=Wallet/WithdrawalRequest"><span class="sub-item">Withdrawal Request</span></a></li>
                            <li><a href="dashboard.php?action=Wallet/WithdrawalRequests&filter=All"><span class="sub-item">Withdrawal Requests</span></a></li>
                        </ul>
                    </div>
                </li>
                <?php } else  { ?>
                <li class="nav-item">   
                    <a data-toggle="collapse" href="#DigitalWorks">
                        <i class="fas fa-users"></i>
                        <p>Digital Works</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="DigitalWorks">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="dashboard.php?action=Cards/list">      
                                    <span class="sub-item">Manage Cards</span>
                                </a>
                            </li>
                            <li>
                                <a href="dashboard.php?action=Resumes/list">      
                                    <span class="sub-item">Manage Resumes</span>
                                </a>
                            </li>
                            <li>
                                <a href="dashboard.php?action=Accounts/AccountSummary">      
                                    <span class="sub-item">Manage Credits</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <?php } ?>
                
               
            </ul>
        </div>                                                
    </div>
</div> 
     