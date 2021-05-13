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
                    <a data-toggle="collapse" href="#NewAdd">
                        <i class="fas fa-users"></i>
                        <p>Post New Ad</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="NewAdd">
                        <ul class="nav nav-collapse">
                            <li><a href="dashboard.php?action=postad/viewpostads"><span class="sub-item">Manage Post Ads</span></a></li>
                            <li><a href="dashboard.php?action=postad/todaypostads&view=today"><span class="sub-item">Today Post Ads</span></a></li>
                            <li><a href="dashboard.php?action=postad/filterbydate"><span class="sub-item">Filter by Date</span></a></li>
                            <li><a href="dashboard.php?action=postad/listuser"><span class="sub-item">List of User</span></a></li>
                        </ul>
                    </div>
                </li>
                
                <li class="nav-item">   
                    <a data-toggle="collapse" href="#addAds">
                        <i class="fas fa-users"></i>
                        <p>Additional Ad</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="addAds">
                        <ul class="nav nav-collapse">
                            <li><a href="dashboard.php?action=additional/videoads/manage"><span class="sub-item">Manage Video Ads</span></a></li>
                            <li><a href="dashboard.php?action=additional/photoads/manage"><span class="sub-item">Manage Photo Ads</span></a></li>
                            <li><a href="dashboard.php?action=additional/others/manage"><span class="sub-item">Manage Business Ads</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">   
                    <a data-toggle="collapse" href="#FeatureAds">
                        <i class="fas fa-users"></i>
                        <p>Feature Ads</p>
                        <span class="caret"></span>
                    </a>                                                                         
                    <div class="collapse" id="FeatureAds">
                        <ul class="nav nav-collapse">
                            <li><a href="dashboard.php?action=featured/add"><span class="sub-item">Add Feature Ads</span></a></li>
                            <li><a href="dashboard.php?action=featured/list&f=a"><span class="sub-item">Active Feature Ads</span></a></li>
                            <li><a href="dashboard.php?action=featured/list&f=e"><span class="sub-item">Expired Feature Ads</span></a></li>
                            <li><a href="dashboard.php?action=featured/list&f=d"><span class="sub-item">Deteled Feature Ads</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">   
                    <a data-toggle="collapse" href="#resume">
                        <i class="fas fa-users"></i>
                        <p>Digital Works</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="resume">
                        <ul class="nav nav-collapse">
                            <li><a href="dashboard.php?action=digitalresume/ResumeList"><span class="sub-item">Manage Resumes</span></a></li>
                            <li><a href="dashboard.php?action=digitalresume/Cards/list"><span class="sub-item">Manage Cards</span></a></li>
                            <li><a href="dashboard.php?action=franchisee/digital/AddCredits"><span class="sub-item">Add Credits</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">   
                    <a data-toggle="collapse" href="#Franchisee">
                        <i class="fas fa-users"></i>
                        <p>Franchisee</p>
                        <span class="caret"></span>
                    </a>                                                                         
                    <div class="collapse" id="Franchisee">
                        <ul class="nav nav-collapse">
                            <!--<li><a href="dashboard.php?action=franchisee/add"><span class="sub-item">Add Franchisee</span></a></li>-->
                            <li><a href="dashboard.php?action=franchisee/list&f=a"><span class="sub-item">Manage Franchisee (Area)</span></a></li>
                            <li><a href="dashboard.php?action=franchisee/digital/List&filter=all"><span class="sub-item">Manage Franchisee (Digital)</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">   
                    <a data-toggle="collapse" href="#Requests">
                        <i class="fas fa-users"></i>
                        <p>Requests</p>
                        <span class="caret"></span>                                                     
                    </a>                                                                         
                    <div class="collapse" id="Requests">
                        <ul class="nav nav-collapse">
                            <li><a href="dashboard.php?action=Requests/FranchiseeWithdrawalRequests&filter=Requested"><span class="sub-item">Franchisee Withdrawal  Requests</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">   
                    <a data-toggle="collapse" href="#Packages">
                        <i class="fas fa-users"></i>
                        <p>Ads Package Upgrade</p>
                        <span class="caret"></span>
                    </a>                                                                         
                    <div class="collapse" id="Packages">
                        <ul class="nav nav-collapse">
                            <li><a href="dashboard.php?action=upgradepackage/add"><span class="sub-item">Add Package</span></a></li>
                            <li><a href="dashboard.php?action=upgradepackage/list&f=a"><span class="sub-item">User Packages</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">   
                    <a data-toggle="collapse" href="#SiteSettings">
                        <i class="fas fa-users"></i>
                        <p>Site Settings</p>
                        <span class="caret"></span>
                    </a>                                                                         
                    <div class="collapse" id="SiteSettings">
                        <ul class="nav nav-collapse">
                            <li><a href="dashboard.php?action=sitesettings/editsitesettings"><span class="sub-item">Edit Site Settings</span></a></li>
                            <li><a href="dashboard.php?action=country/managecountrynames"><span class="sub-item">Manage Locations</span></a></li>
                            <li><a href="dashboard.php?action=category/managecategories"><span class="sub-item">Manage Categories</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">   
                    <a data-toggle="collapse" href="#SuccessStories">
                        <i class="fas fa-users"></i>
                        <p>Success Stories</p>
                        <span class="caret"></span>
                    </a>                                                                         
                    <div class="collapse" id="SuccessStories">
                        <ul class="nav nav-collapse">
                            <li><a href="dashboard.php?action=successstories/addstories"><span class="sub-item">Add Success Stories</span></a></li>
                            <li><a href="dashboard.php?action=successstories/viewstories"><span class="sub-item">Manage Success Stories</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">   
                    <a data-toggle="collapse" href="#Testimonials">
                        <i class="fas fa-users"></i>
                        <p>Testimonials</p>
                        <span class="caret"></span>
                    </a>                                                                         
                    <div class="collapse" id="Testimonials">
                        <ul class="nav nav-collapse">
                            <li><a href="dashboard.php?action=testimonials/addtestimonials"><span class="sub-item">Add Testimonials</span></a></li>
                            <li><a href="dashboard.php?action=testimonials/viewtestimonials"><span class="sub-item">Manage Testimonials</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">   
                    <a data-toggle="collapse" href="#FAQ">
                        <i class="fas fa-users"></i>
                        <p>FAQ</p>
                        <span class="caret"></span>
                    </a>                                                                         
                    <div class="collapse" id="FAQ">
                        <ul class="nav nav-collapse">
                            <li><a href="dashboard.php?action=faq/addfaq"><span class="sub-item">Add Faq</span></a></li>
                            <li><a href="dashboard.php?action=faq/viewfaq"><span class="sub-item">Manage Faq</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">   
                    <a data-toggle="collapse" href="#Subscribers">
                        <i class="fas fa-users"></i>
                        <p>Subscribers</p>
                        <span class="caret"></span>
                    </a>                                                                         
                    <div class="collapse" id="Subscribers">
                        <ul class="nav nav-collapse">
                            <li><a href="dashboard.php?action=subscribers/addsubscriber"><span class="sub-item">Add Subscribers</span></a></li>
                            <li><a href="dashboard.php?action=subscribers/viewsubscriber"><span class="sub-item">Manage Subscribers</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">   
                    <a data-toggle="collapse" href="#ContactUs">
                        <i class="fas fa-users"></i>
                        <p>Contact Us</p>
                        <span class="caret"></span>
                    </a>                                                                         
                    <div class="collapse" id="ContactUs">
                        <ul class="nav nav-collapse">
                            <li><a href="dashboard.php?action=contactus/addcontact"><span class="sub-item">Add Contact</span></a></li>
                            <li><a href="dashboard.php?action=contactus/viewcontact"><span class="sub-item">Manage Contact</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">   
                    <a data-toggle="collapse" href="#User">
                        <i class="fas fa-users"></i>
                        <p>Manage Users</p>
                        <span class="caret"></span>
                    </a>                                                                         
                    <div class="collapse" id="User">
                        <ul class="nav nav-collapse">
                            <li><a href="dashboard.php?action=user/listuser&f=a"><span class="sub-item">List Users</span></a></li>
                            <li><a href="dashboard.php?action=user/listuser&f=Verified"><span class="sub-item">Verified Users</span></a></li>
                            <li><a href="dashboard.php?action=user/listuser&f=Nonverified"><span class="sub-item">Non-Verified Users</span></a></li>
                            <li><a href="dashboard.php?action=user/listuser&f=AdPosted"><span class="sub-item">Ad Posted</span></a></li>
                            <li><a href="dashboard.php?action=user/usersellproducts"><span class="sub-item">User Sell Products</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">   
                    <a data-toggle="collapse" href="#Staffs">
                        <i class="fas fa-users"></i>
                        <p>Manage Staffs</p>
                        <span class="caret"></span>
                    </a>                                                                         
                    <div class="collapse" id="Staffs">
                        <ul class="nav nav-collapse">
                            <li><a href="dashboard.php?action=staff/list"><span class="sub-item">List Staffs</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">   
                    <a data-toggle="collapse" href="#Products">
                        <i class="fas fa-users"></i>
                        <p>Manage Products</p>
                        <span class="caret"></span>
                    </a>                                                                         
                    <div class="collapse" id="Products">
                        <ul class="nav nav-collapse">
                            <li><a href="dashboard.php?action=Products/list&status=All"><span class="sub-item">List Products</span></a></li>
                            <li><a href="dashboard.php?action=Products/addCommission&status=All"><span class="sub-item">Add Commission</span></a></li>
                            <li><a href="dashboard.php?action=Products/PayCommission&status=All"><span class="sub-item">Pay Commissions</span></a></li>
                        </ul>
                    </div>
                </li>
                
                 <li class="nav-item">   
                    <a data-toggle="collapse" href="#othersettings">
                        <i class="fas fa-users"></i>
                        <p>Other Settings</p>
                        <span class="caret"></span>
                    </a>                                                                         
                    <div class="collapse" id="othersettings">
                        <ul class="nav nav-collapse">
                            <li><a href="dashboard.php?action=othersettings/counter"><span class="sub-item">Counter</span></a></li>
                        </ul>
                    </div>
                </li>
                
              <!--  <li class="nav-item">   
                    <a data-toggle="collapse" href="#UserManage">
                        <i class="fas fa-users"></i>
                        <p>User Manage</p>
                        <span class="caret"></span>
                    </a>                                                                         
                    <div class="collapse" id="UserManage">
                        <ul class="nav nav-collapse">
                            <li><a href="dashboard.php?action=usertable/adduser"><span class="sub-item">Add Users</span></a></li>
                            <li><a href="dashboard.php?action=usertable/viewuser"><span class="sub-item">Manage Users</span></a></li>
                            <li><a href="dashboard.php?action=usertable/listusers"><span class="sub-item">List Users</span></a></li>
                        </ul>
                    </div>
                </li>  -->
            </ul>
        </div>
    </div>
</div> 
    