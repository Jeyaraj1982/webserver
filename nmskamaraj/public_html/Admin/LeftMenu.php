 
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
                                        <a href="dashboard.php?action=MyProfile">
                                            <span class="sub-item">My Profile</span>
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
                            <a data-toggle="collapse" href="#Applications">
                                <i class="fas fa-users"></i>
                                <p>Applications</p>
                                <span class="caret"></span>
                            </a>                                                                         
                            <div class="collapse" id="Applications">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="dashboard.php?action=FirstYear&filter=Applied&course=All">
                                            <span class="sub-item">First Year</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard.php?action=SecondYear&filter=Applied&course=All">
                                            <span class="sub-item">Second Year</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <?php if($_SESSION['User']['IsAdmin']=="1"){?>
                            <li class="nav-item">   
                            <a data-toggle="collapse" href="#Staffs">
                                <i class="fas fa-users"></i>
                                <p>Manage Staffs<?php echo $_SESSION['User']['IsAdmin'];?></p>
                                <span class="caret"></span>
                            </a>                                                                         
                            <div class="collapse" id="Staffs">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="dashboard.php?action=Staffs/ManageStaff&Status=All">
                                            <span class="sub-item">Manage Staffs</span>
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
    