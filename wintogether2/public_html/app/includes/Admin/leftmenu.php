<ul class="nav nav-primary">
    <li class="nav-item ">
        <a href="dashboard.php" class="collapsed" aria-expanded="false">
            <i class="fas fa-home"></i><p>Dashboard</p>
        </a>
    </li>
    <li class="nav-item">
        <a data-toggle="collapse" href="#epin"><i class="fas fa-layer-group"></i><p>Epin</p><span class="caret"></span></a>
        <div class="collapse" id="epin">
            <ul class="nav nav-collapse">
                <li><a href="dashboard.php?action=EPins/Generate"><span class="sub-item">Generate Epins</span></a></li>
                <li><a href="dashboard.php?action=EPins/MyPins"><span class="sub-item">My Epins</span></a></li>
            </ul>
        </div>          
    </li>
    <li class="nav-item">
        <a data-toggle="collapse" href="#myteam"><i class="fas fa-layer-group"></i><p>Members</p><span class="caret"></span></a>
        <div class="collapse" id="myteam">
            <ul class="nav nav-collapse">
                <li><a href="dashboard.php?action=Members/AllMembers"><span class="sub-item">View Members</span></a></li>
                <li><a href="dashboard.php?action=Members/Packages"><span class="sub-item">Packages</span></a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a data-toggle="collapse" href="#products"><i class="fas fa-layer-group"></i><p>Products</p><span class="caret"></span></a>
        <div class="collapse" id="products">
            <ul class="nav nav-collapse">
                <li><a href="dashboard.php?action=Products/ManageCategories"><span class="sub-item">Categories </span></a></li>
                <li><a href="dashboard.php?action=Products/ManageSubCategories"><span class="sub-item">Sub Categories </span></a></li>
                <li><a href="dashboard.php?action=Products/ManageProducts"><span class="sub-item">Products </span></a></li>
            </ul>
        </div>
    </li>
    <!--
    <li class="nav-item">
        <a data-toggle="collapse" href="#orders"><i class="fas fa-layer-group"></i><p>Orders</p><span class="caret"></span></a>
        <div class="collapse" id="orders">
            <ul class="nav nav-collapse">
                <li><a href="dashboard.php?action=Products/ManageOrders"><span class="sub-item">Manager Orders</span></a></li>
                <li><a href="dashboard.php?action=Products/ManageSubCategories"><span class="sub-item">Sub Categories </span></a></li>
                <li><a href="dashboard.php?action=Products/ManageProducts"><span class="sub-item">Products </span></a></li>
            </ul>
        </div>
    </li>
    -->
    <!--  <li class="nav-item">
        <a data-toggle="collapse" href="#stockiest"><i class="fas fa-layer-group"></i><p>Stock Points</p><span class="caret"></span></a>
        <div class="collapse" id="stockiest">
            <ul class="nav nav-collapse">
                <li><a href="dashboard.php?action=Stockiest/ManageStockPoints"><span class="sub-item">Manage Stock-Points </span></a></li>
            </ul>
        </div>
    </li> -->
     <li class="nav-item">
        <a data-toggle="collapse" href="#supportingcenter"><i class="fas fa-layer-group"></i><p>Stores</p><span class="caret"></span></a>
        <div class="collapse" id="supportingcenter">
            <ul class="nav nav-collapse">
                <li><a href="dashboard.php?action=SupportingCenter/ManageBusinessSupporting&filter=all"><span class="sub-item">Manage Stores </span></a></li>
                <li><a href="dashboard.php?action=SupportingCenter/ManageBusinessStore&filter=all"><span class="sub-item">Manage Stores Types </span></a></li>
            </ul>
        </div> 
    </li>
    <li class="nav-item">
        <a data-toggle="collapse" href="#payouts"><i class="fas fa-layer-group"></i><p>Payout</p><span class="caret"></span></a>
        <div class="collapse" id="payouts">
            <ul class="nav nav-collapse">
                <li><a href="dashboard.php?action=Payout/Transactions"><span class="sub-item">Transaction Log</span></a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a data-toggle="collapse" href="#wallet"><i class="fas fa-layer-group"></i><p>Wallet</p><span class="caret"></span></a>
        <div class="collapse" id="wallet">
            <ul class="nav nav-collapse">
                <li><a href="dashboard.php?action=Wallets/Refill"><span class="sub-item">Refill <br>To Member </span></a></li>
                <li><a href="dashboard.php?action=Wallets/UtilityWalletRequests"><span class="sub-item">Member Wallet<br>Refill Requests </span></a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a data-toggle="collapse" href="#settings"><i class="fas fa-layer-group"></i><p>Settings</p><span class="caret"></span></a>
        <div class="collapse" id="settings">
            <ul class="nav nav-collapse">
                <li><a href="dashboard.php?action=Settings/MyProfile"><span class="sub-item">My Profile </span></a></li>
                <li><a href="dashboard.php?action=Settings/ChangePassword"><span class="sub-item">Change Password</span></a></li>
                <li><a href="dashboard.php?action=Settings/GeneralSettings"><span class="sub-item">App Settings</span></a></li>
                <li><a href="dashboard.php?action=Settings/Masters"><span class="sub-item">Masters</span></a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a data-toggle="collapse" href="#logs"><i class="fas fa-layer-group"></i><p>Logs</p><span class="caret"></span></a>
        <div class="collapse" id="logs">
            <ul class="nav nav-collapse">
                <li><a href="dashboard.php?action=Logs/MobileSMS"><span class="sub-item">Mobile SMS</span></a></li>
                <li><a href="dashboard.php?action=Logs/Email"><span class="sub-item">Email</span></a></li>
                <li><a href="dashboard.php?action=Logs/MemberLogin"><span class="sub-item">Member Login</span></a></li>
            </ul>
        </div>
    </li>
</ul>  