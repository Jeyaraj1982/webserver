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
                    <a data-toggle="collapse" href="#Products">
                        <i class="fas fa-users"></i>
                        <p>Master</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="Products">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="dashboard.php?action=Category/list&status=All">
                                    <span class="sub-item">Manage Category</span>
                                </a>
                            </li>
                            <li>
                                <a href="dashboard.php?action=SubCategory/list&status=All">
                                    <span class="sub-item">Manage Sub Category</span>
                                </a>
                            </li>
                            <li>
                                <a href="dashboard.php?action=Brands/list&status=All">
                                    <span class="sub-item">Manage Brand Names</span>
                                </a>
                            </li>
                            <li>
                                <a data-toggle="collapse" href="#BrandSize">
                                    <span class="sub-item">Manage Brand Size</span>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="BrandSize">
                                    <ul class="nav nav-collapse subnav">
                                        <li>
                                            <a href="dashboard.php?action=BrandSize/AgeGroup&status=All">
                                                <span class="sub-item">By Age Group</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="dashboard.php?action=BrandSize/BySize&status=All">
                                                <span class="sub-item">Size</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="dashboard.php?action=Products/list&status=All">
                                    <span class="sub-item">Manage Products</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div> 
    