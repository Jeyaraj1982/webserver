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
                                <p>Member</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="Cutomers">
                                <ul class="nav nav-collapse">
                                <li>
                                        <a href="dashboard.php?action=CreateMember">
                                            <span class="sub-item">Create Member</span>
                                        </a>
                                    </li>                               
                                    <li>
                                        <a href="dashboard.php?action=ManageMember&Status=All">
                                            <span class="sub-item">Manage Members</span>
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
                                        <a href="dashboard.php?action=CreateForm16">
                                            <span class="sub-item">Create Form 16</span>
                                        </a>
                                         <a href="dashboard.php?action=ManageForm16Staffwise&Status=All">
                                            <span class="sub-item">Form 16</span>
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
                         
                    </ul>
                </div>
            </div>
        </div>