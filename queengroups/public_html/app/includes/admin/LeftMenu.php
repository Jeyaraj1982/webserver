<div class="sidebar sidebar-style-2" data-background-color="dark">            
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
                                <a href="dashboard.php?action=ExpenseType/list&status=All">
                                    <span class="sub-item">Expense Types</span>
                                </a>
                            </li>
                            <li>
                                <a href="dashboard.php?action=Services/list&status=All">
                                    <span class="sub-item">Services</span>
                                </a>
                            </li>
                            <li>
                                <a href="dashboard.php?action=Staffs/list&status=All">
                                    <span class="sub-item">Staffs</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!--<li class="nav-item">   
                    <a data-toggle="collapse" href="#Expenses">
                        <i class="fas fa-users"></i>
                        <p>Expenses</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="Expenses">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="dashboard.php?action=Expenses/list&status=All">
                                    <span class="sub-item">Manage Expenses</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>-->
				<li class="nav-item">   
                    <a data-toggle="collapse" href="#Reports">
                        <i class="fas fa-users"></i>
                        <p>Reports</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="Reports">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="dashboard.php?action=Orders/ManageOrder&status=All">
                                    <span class="sub-item">All Orders</span>
                                </a>
                            </li>
                            <li>
                                <a href="dashboard.php?action=Report/AgentDateWise">
                                    <span class="sub-item">Agent - Date wise</span>
                                </a>
                            </li>
                            <li>
                                <a href="dashboard.php?action=Report/AgentWise">
                                    <span class="sub-item">Agent wise</span>
                                </a>
                            </li>
                            <li>
                                <a href="dashboard.php?action=Report/AgentServiceWise">
                                    <span class="sub-item">Agent - Service wise</span>
                                </a>
                            </li>
							<li>
                                <a href="dashboard.php?action=Report/ServiceWise">
                                    <span class="sub-item">Service wise</span>
                                </a>
                            </li>
							<li>
                                <a href="dashboard.php?action=Report/StaffWise">
                                    <span class="sub-item">Staff wise</span>
                                </a>
                            </li>
							<li>
                                <a href="dashboard.php?action=Report/ExpenseDateWise">
                                    <span class="sub-item">Expense - Staff Date wise</span>
                                </a>
                            </li>
                            <li>
                                <a href="dashboard.php?action=Report/ExpenseTypewise">
                                    <span class="sub-item">Expense - Expense Type wise</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div> 
    