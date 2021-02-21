 
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
                            <a data-toggle="collapse" href="#Members">
                                <i class="fas fa-users"></i>
                                <p>Profile</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="Members">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="dashboard.php?action=ChangePassword">      
                                            <span class="sub-item">Change Password</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">   
                            <a data-toggle="collapse" href="#Products">
                                <i class="fas fa-users"></i>
                                <p>Products</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="Products">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="dashboard.php?action=Products/list&status=All">
                                            <span class="sub-item">Manage Products</span>
                                        </a>
                                    </li> 
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">   
                            <a data-toggle="collapse" href="#Customers">
                                <i class="fas fa-users"></i>
                                <p>Customers</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="Customers">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="dashboard.php?action=Customers/list&status=All">
                                            <span class="sub-item">Manage Customers</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">   
                            <a data-toggle="collapse" href="#Invoice">
                                <i class="fas fa-users"></i>
                                <p>Invoice</p> 
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="Invoice">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="dashboard.php?action=Invoice/list">
                                            <span class="sub-item">Manage Invoice</span>
                                        </a>
                                    </li>
									<li>
                                        <a href="dashboard.php?action=Invoice/SavedInvoices">
                                            <span class="sub-item">Manage Saved Invoice</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">   
                            <a data-toggle="collapse" href="#Receipts">
                                <i class="fas fa-users"></i>
                                <p>Receipts</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="Receipts">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="dashboard.php?action=Invoice/receipts">
                                            <span class="sub-item">Manage Receipts</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">   
                            <a data-toggle="collapse" href="#Reports">
                                <i class="fas fa-users"></i>
                                <p>Reports</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="Reports">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="dashboard.php?action=Invoice/outstandingamount&wise=date">
                                            <span class="sub-item">Outstanding Amount</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div> 
    