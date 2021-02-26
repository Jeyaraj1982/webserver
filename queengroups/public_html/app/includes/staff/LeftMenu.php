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
                <li class="nav-item">   
                    <a data-toggle="collapse" href="#Masters">
                        <i class="fas fa-users"></i>
                        <p>Master</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="Masters">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="dashboard.php?action=Agent/list&status=All">
                                    <span class="sub-item">Agents</span>
                                </a>
                            </li>
                            <li>
                                <a href="dashboard.php?action=Customer/list&status=All">
                                    <span class="sub-item">Customers</span>
                                </a>
                            </li>
                            <li>
                                <a href="dashboard.php?action=Services/list&status=All">
                                    <span class="sub-item">Services</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
				<li class="nav-item">   
                    <a data-toggle="collapse" href="#MyExpenses"> 
                        <i class="fas fa-users"></i>
                        <p>My Expenses</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="MyExpenses">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="dashboard.php?action=Expenses/add">
                                    <span class="sub-item">Add Expense</span>
                                </a>
                            </li>
                            <li>
                                <a href="dashboard.php?action=Expenses/history">
                                    <span class="sub-item">Expenses Hisotry</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">   
                    <a data-toggle="collapse" href="#MyPayments"> 
                        <i class="fas fa-users"></i>
                        <p>My Payments</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="MyPayments">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="dashboard.php?action=Payments/add">
                                    <span class="sub-item">Add Payments</span>
                                </a>
                            </li>
                             <li>
                                <a href="dashboard.php?action=Payments/history">
                                    <span class="sub-item">Payment History</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">   
                    <a data-toggle="collapse" href="#MyReports"> 
                        <i class="fas fa-users"></i>
                        <p>Reports</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="MyReports">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="dashboard.php?action=Reports/DailyReport">
                                    <span class="sub-item">DailyReport</span>
                                </a>
                            </li>
                              
                        </ul>
                    </div>
                </li>
                <li class="nav-item">   
                    <a data-toggle="collapse" href="#Orders"> 
                        <i class="fas fa-users"></i>
                        <p>Orders</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="Orders">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="dashboard.php?action=Orders/New">
                                    <span class="sub-item">New Order</span>
                                </a>
                            </li>
                            <li>
                                <a href="dashboard.php?action=Orders/MySavedOrders">
                                    <span class="sub-item">My Saved Orders</span>
                                </a>
                            </li>
                            <li>
                                <a href="dashboard.php?action=Orders/AllSavedOrders">
                                    <span class="sub-item">All Saved Orders</span>
                                </a>
                            </li>
                            <li>
                                <a href="dashboard.php?action=Orders/MyOpenedOrders">
                                    <span class="sub-item">My Opened Orders</span>
                                </a>                                                        
                            </li>
							<li>
                                <a href="dashboard.php?action=Orders/ManageOrders">
                                    <span class="sub-item">Completed Orders</span>
                                </a>
                            </li>
						</ul>
                    </div>
                </li>
                <li class="nav-item">   
                    <a data-toggle="collapse" href="#Profile">
                        <i class="fas fa-users"></i>
                        <p>My Profile</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="Profile">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="dashboard.php?action=MyProfile">
                                    <span class="sub-item">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="dashboard.php?action=MyPermission">
                                    <span class="sub-item">My Permission</span>
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
            </ul>
        </div>
    </div>
</div> 
    