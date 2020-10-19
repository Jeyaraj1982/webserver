<style>
 .sidebar[data-background-color="dark2"] .nav > .nav-item a {
    color: #9b0976 !important;
}
.sidebar.sidebar-style-2 .nav .nav-item a:hover, .sidebar.sidebar-style-2 .nav .nav-item a:focus, .sidebar.sidebar-style-2 .nav .nav-item a[data-toggle=collapse][aria-expanded=true] {
    background:#a40976;
    color: #b9a9a3 !important;}
    

</style>
<ul class="nav nav-primary">
    <li class="nav-item ">
        <a href="dashboard.php" class="collapsed" aria-expanded="false">
            <i class="fas fa-home" style="color: #9b0976;"></i><p>Dashboard</p>
        </a>
    </li>
    <!--
    <li class="nav-item">
        <a data-toggle="collapse" href="#epin"><i class="fas fa-layer-group"></i><p>Epin</p><span class="caret"></span></a>
        <div class="collapse" id="epin">
            <ul class="nav nav-collapse">
                <li><a href="dashboard.php?action=EPins/Generate"><span class="sub-item">Generate Epins</span></a></li>
                <li><a href="dashboard.php?action=EPins/MyPins"><span class="sub-item">My Epins</span></a></li>
            </ul>
        </div>          
    </li>
    -->
    <li class="nav-item">
        <a data-toggle="collapse" href="#myteam"><i class="far fa-user-circle" style="color: #9b0976;"></i><p>Members</p><span class="caret"></span></a>
        <div class="collapse" id="myteam">
            <ul class="nav nav-collapse">
                <li ><a href="dashboard.php?action=Members/AllMembers"><span class="sub-item">View Members</span></a></li>
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
     
    <li class="nav-item">
        <a data-toggle="collapse" href="#payouts"><i class="fas fa-money-check-alt" style="color: #9b0976;"></i><p>Payout</p><span class="caret"></span></a>
        <div class="collapse" id="payouts">
            <ul class="nav nav-collapse">
                <li><a href="dashboard.php?action=Payout/Transactions"><span class="sub-item">Transaction Log</span></a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a data-toggle="collapse" href="#wallet"><i class="fas fa-wallet" style="color: #9b0976;"></i><p>Wallet</p><span class="caret"></span></a>
        <div class="collapse" id="wallet">
            <ul class="nav nav-collapse">
                <li><a href="dashboard.php?action=Wallets/Refill"><span class="sub-item">Refill <br>To Member </span></a></li>
                <li><a href="dashboard.php?action=Wallets/UtilityWalletRequests"><span class="sub-item">Member Wallet<br>Refill Requests </span></a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a data-toggle="collapse" href="#logs"><i class="fas fa-layer-group" style="color: #9b0976;"></i><p>Logs</p><span class="caret"></span></a>
        <div class="collapse" id="logs">
            <ul class="nav nav-collapse">
                <li><a href="dashboard.php?action=Logs/MobileSMS"><span class="sub-item">Mobile SMS</span></a></li>
                <li><a href="dashboard.php?action=Logs/Email"><span class="sub-item">Email</span></a></li>
                <li><a href="dashboard.php?action=Logs/MemberLogin"><span class="sub-item">Member Login</span></a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a data-toggle="collapse" href="#Report"><i class="fas fa-file-invoice" style="color: #9b0976;"></i><p>Reports</p><span class="caret"></span></a>
        <div class="collapse" id="Report">
            <ul class="nav nav-collapse">
                <li><a href="dashboard.php?action=Report/WithoutBankDetailsMem"><span class="sub-item">Without Bank Details Member</span></a></li>
                <li><a href="dashboard.php?action=Report/WithBankDetailsMem"><span class="sub-item">With Bank Details Member</span></a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a data-toggle="collapse" href="#Products"><i class="flaticon-settings" style="color: #9b0976;"></i><p>Products</p><span class="caret"></span></a>
        <div class="collapse" id="Products">
            <ul class="nav nav-collapse">
                <li><a href="dashboard.php?action=Products/List"><span class="sub-item">Manage Products </span></a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a data-toggle="collapse" href="#Orders"><i class="flaticon-settings" style="color: #9b0976;"></i><p>Orders</p><span class="caret"></span></a>
        <div class="collapse" id="Orders">
            <ul class="nav nav-collapse">
                <li><a href="dashboard.php?action=Orders/List&f=all"><span class="sub-item">Manage Orders </span></a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a data-toggle="collapse" href="#settings"><i class="flaticon-settings" style="color: #9b0976;"></i><p>Settings</p><span class="caret"></span></a>
        <div class="collapse" id="settings">
            <ul class="nav nav-collapse">
                <li><a href="dashboard.php?action=Settings/MyProfile"><span class="sub-item">My Profile </span></a></li>
                <li><a href="dashboard.php?action=Settings/ChangePassword"><span class="sub-item">Change Password</span></a></li>
                <li><a href="dashboard.php?action=Settings/GeneralSettings"><span class="sub-item">App Settings</span></a></li>
                <li><a href="dashboard.php?action=Settings/Masters"><span class="sub-item">Masters</span></a></li>
            </ul>
        </div>
    </li>
</ul>  