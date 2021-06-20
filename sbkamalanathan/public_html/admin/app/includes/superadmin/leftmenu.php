<nav class="sidebar-main">
    <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
    <div id="sidebar-menu">
        <ul class="sidebar-links" id="simple-bar">
            <li class="back-btn"><a href="dashboard.php"><img class="img-fluid" src="assets/images/logo/logo-icon.png" alt=""></a>
                <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
            </li>
            <!--
            <li class="sidebar-main-title">
                <div>
                  <h6 class="lan-1">General</h6>
                  <p class="lan-2">Dashboards,widgets & layout.</p>
                </div>
            </li>
            -->
            <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="dashboard.php"><i data-feather="home"></i><span>Dashboard</span></a></li> 
            <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="javascript:void(0)"><i data-feather="users"></i><span>Clients</span></a>
                <ul class="sidebar-submenu">
                    <li><a href="dashboard.php?action=Clients/add"><span>Create Client</span></a></li>                
                    <li><a href="dashboard.php?action=Clients/list"><span>Client Lists</span></a></li>
                </ul>
            </li>
             <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="javascript:void(0)"><i data-feather="layers"></i><span>Cases</span></a>
                <ul class="sidebar-submenu">
                    <li><a href="dashboard.php?action=Cases/new"><span>Create Case</span></a></li>
                    <li><a href="dashboard.php?action=Cases/list"><span>Case Lists</span></a></li>
                    <li><a href="dashboard.php?action=Dashboard/CaseForm&redirect=AddHirings"><span>Add Hiring</span></a></li>
                    <li><a href="dashboard.php?action=Dashboard/CaseForm&redirect=AddDocuments"><span>Attach Document</span></a></li>
                    <li><a href="dashboard.php?action=Dashboard/CaseForm&redirect=AddNotes"><span>Add Notes</span></a></li>
                    <li><a href="dashboard.php?action=Dashboard/CaseForm&redirect=AddIADetails"><span>Add IA Details</span></a></li>
                    <li><a href="dashboard.php?action=Dashboard/CaseForm&redirect=AddExpenses"><span>Add Expenses</span></a></li>
                    <li><a href="dashboard.php?action=Dashboard/CaseForm&redirect=AddPayments"><span>Add Recevied Payment</span></a></li>
                    <li><a href="dashboard.php?action=Dashboard/CaseForm&redirect=AddTimeSheet"><span>Add TimeSheet</span></a></li>
                </ul>
            </li>
            <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="javascript:void(0)"><i data-feather="airplay"></i><span>Masters</span></a>
                <ul class="sidebar-submenu">
                    <li><a href="dashboard.php?action=Administrators/list">Administrators</a></li>
                    <li><a href="dashboard.php?action=Advocates/list">Advocates</a></li>
                    <li><a href="dashboard.php?action=CaseTypes/list">Case Types</a></li>
                    <li><a href="dashboard.php?action=Clients/list">Clients</a></li>
                    <li><a href="dashboard.php?action=ClientTypes/list">Client's Type</a></li>
                    <li><a href="dashboard.php?action=DistrictCourtTypes/list">District Court Types</a></li>
                    <li><a href="dashboard.php?action=DistrictNames/list">District Names</a></li>
                    <li><a href="dashboard.php?action=Courts/list">Main Courts</a></li>
                    
                    <li><a href="dashboard.php?action=HighCourts/list">High Courts</a></li>
                    <li><a href="dashboard.php?action=HighCourtBenchNames/list">High Court's Benches</a></li>
                    
                    <li><a href="dashboard.php?action=Nationality/list">Nationalities</a></li> 
                    <li><a href="dashboard.php?action=PlaceNames/list">Place Names</a></li>
                    <li><a href="dashboard.php?action=Priority/list">Priorities</a></li> 
                    <li><a href="dashboard.php?action=Religions/list">Religion Names</a></li> 
                    <li><a href="dashboard.php?action=Staffs/list">Staffs</a></li> 
                    <li><a href="dashboard.php?action=StateNames/list">State Names</a></li> 
                </ul>
            </li>
            <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="javascript:void(0)"><i data-feather="command"></i><span>Settings</span></a>
                <ul class="sidebar-submenu">
                    <li><a href="dashboard.php?action=MyProfile">My Profile</a></li>
                    <li><a href="dashboard.php?action=ChangePassword">Change Password</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
</nav>