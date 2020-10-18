 
 <div class="sidebar sidebar-style-2" data-background-color="dark2">            
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
               <p align="center">
            <img src="assets/logo.jpeg" style="width:60%;margin:0px auto;">  <br>
             
              
        </p>      
       
        
        
       
                    <ul class="nav nav-primary">
                        <li class="nav-item active">
                            <a href="dashboard.php">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
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
                                        <a href="dashboard.php?action=ManageMembers&Status=All">
                                            <span class="sub-item">Members</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard.php?action=SearchMember">
                                            <span class="sub-item">Search Member</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#Form16">
                                <i class="fab fa-firstdraft"></i>
                                <p>Form 16</p>
                                <span class="caret"></span>
                            </a>                                                            
                            <div class="collapse" id="Form16">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="dashboard.php?action=CreateMember">
                                            <span class="sub-item">Create Form 16</span>
                                        </a>
                                         <a href="dashboard.php?action=ManageForm16&Status=All">
                                            <span class="sub-item">Form 16</span>
                                        </a>
                                        <a href="dashboard.php?action=ManageForm16Staffwise&Status=All">
                                            <span class="sub-item">Form 16 Staffwise</span>
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
                            <a data-toggle="collapse" href="#Agents">
                                <i class="fas fa-user"></i>
                                <p>Partners</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="Agents">
                                <ul class="nav nav-collapse">
                                   <li>
                                        <a href="dashboard.php?action=Agents/ManageAgents&Status=All">
                                            <span class="sub-item">Manage Partners</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard.php?action=Agents/PartnerRequests">
                                            <span class="sub-item">Become a Partner</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        
                        
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#Staffs">
                                <i class="fas fa-user"></i>
                                <p>Staffs</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="Staffs">
                                <ul class="nav nav-collapse">
                                   <li>
                                        <a href="dashboard.php?action=Staffs/ManageStaffs&Status=All">
                                            <span class="sub-item">Manage Staffs</span>
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
                                        <a href="dashboard.php?action=Logs/AdminLoginLog&Status=All">
                                            <span class="sub-item">Admin Login Log</span>
                                        </a>
                                    </li> 
                                    <li>
                                        <a href="dashboard.php?action=Logs/StaffLoginLog&Status=All">
                                            <span class="sub-item">Staff's Login Log</span>                                 
                                        </a>
                                    </li>
                                     <li>
                                        <a href="dashboard.php?action=Logs/AgentLoginLog&Status=All">
                                            <span class="sub-item">Partner's Login Log</span>                                 
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard.php?action=Logs/MemberLoginLog&Status=All">
                                            <span class="sub-item">Member's Login Log</span>
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
                                    <li>
                                        <a href="dashboard.php?action=SMS/ManageMobileSMS&Status=All">
                                            <span class="sub-item">Mobile SMS</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard.php?action=Email/ManageEmailApi&Status=All">
                                            <span class="sub-item">Email Api</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#Accounts">
                                <i class="fas fa-clipboard-list"></i>
                                <p>Accounts</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="Accounts">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="dashboard.php?action=Accounts/Invoices&Status=All">
                                            <span class="sub-item">Invoices</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard.php?action=Accounts/Orders&Status=All">
                                            <span class="sub-item">Orders</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard.php?action=Accounts/Payment&Status=All">
                                            <span class="sub-item">Payment</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div> 
    