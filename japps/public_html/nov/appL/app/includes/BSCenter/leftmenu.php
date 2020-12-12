<ul class="nav nav-primary">
    <li class="nav-item ">
        <a href="dashboard.php">
            <i class="fas fa-home"></i><p>Dashboard</p>
        </a>
    </li>
    <li class="nav-item">
        <a data-toggle="collapse" href="#Members"><i class="fas fa-layer-group"></i><p>Members</p><span class="caret"></span></a>
        <div class="collapse" id="Members">
            <ul class="nav nav-collapse">
                <li><a href="dashboard.php?action=Members/VerifyMember"><span class="sub-item">Verify Member</span></a></li>
                <li><a href="dashboard.php?action=Members/VerifiedMembers&filter=Valid"><span class="sub-item">Verified Members</span></a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a data-toggle="collapse" href="#Products"><i class="fas fa-layer-group"></i><p>Products</p><span class="caret"></span></a>
        <div class="collapse" id="Products">
            <ul class="nav nav-collapse">
                <li><a href="dashboard.php?action=Products/list&filter=all"><span class="sub-item">Manage Products </span></a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a data-toggle="collapse" href="#Orders"><i class="fas fa-layer-group"></i><p>Orders</p><span class="caret"></span></a>
        <div class="collapse" id="Orders">
            <ul class="nav nav-collapse">
                <li><a href="dashboard.php?action=Orders/list&filter=all"><span class="sub-item">Manage Orders </span></a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a data-toggle="collapse" href="#settings"><i class="fas fa-align-justify"></i><p>Settings</p><span class="caret"></span></a>
        <div class="collapse" id="settings">
            <ul class="nav nav-collapse">
                <li><a href="dashboard.php?action=Settings/MyStoreInformation"><span class="sub-item">My Store Information </span></a></li>
                <li><a href="dashboard.php?action=Settings/MyProfile"><span class="sub-item">My Profile </span></a></li>
            </ul>
        </div>
    </li>
</ul> 