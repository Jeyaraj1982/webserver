<ul class="nav nav-primary">
    <li class="nav-item ">
        <a href="dashboard.php" class="collapsed" aria-expanded="false">
            <i class="fas fa-home"></i><p>Dashboard</p>
        </a>
    </li>
    <li class="nav-item">
        <a data-toggle="collapse" href="#epin"><i class="fas fa-layer-group"></i><p>Voucher</p><span class="caret"></span></a>
        <div class="collapse" id="epin">
            <ul class="nav nav-collapse">
                <li><a href="dashboard.php?action=EPins/Generate"><span class="sub-item">Generate <?php echo EPINS;?></span></a></li>
                <li><a href="dashboard.php?action=EPins/MyPins"><span class="sub-item">My <?php echo EPINS;?></span></a></li>
            </ul>
        </div>                                                                     
    </li>
    <li class="nav-item">
        <a data-toggle="collapse" href="#myteam"><i class="fas fa-layer-group"></i><p>Members</p><span class="caret"></span></a>
        <div class="collapse" id="myteam">
            <ul class="nav nav-collapse">
                <li><a href="dashboard.php?action=Members/AllMembers"><span class="sub-item">View Members</span></a></li>
                <li><a href="dashboard.php?action=Members/InActiveMembers"><span class="sub-item">Inactive Members</span></a></li>
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