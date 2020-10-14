<ul class="nav nav-primary">
    <li class="nav-item ">
        <a data-toggle="collapse" href="dashboard.php" class="collapsed">
            <a href="dashboard.php"><i class="fas fa-home"></i><p>Dashboard</p></a>
        </a>
    </li>
   <?php if (CreateMemberUsing=="EPIN") { ?>
    <li class="nav-item">
        <a data-toggle="collapse" href="#epin"><i class="fab fa-keybase"></i><p>Epin</p><span class="caret"></span></a>
        <div class="collapse" id="epin">
            <ul class="nav nav-collapse">
                <li><a href="dashboard.php?action=EPins/MyPins"><span class="sub-item">My Epins</span></a></li>
                <?php if (TransferEPin) { ?>
                <li><a href="dashboard.php?action=EPins/Transfer/TransferEpins"><span class="sub-item">Transfer Epins</span></a></li>
                <?php } ?>
            </ul>
        </div>
    </li>
    <?php } ?>
    <li class="nav-item">
        <a data-toggle="collapse" href="#myteam"><i class="fas fa-user-friends"></i><p>My Team</p><span class="caret"></span></a>
        <div class="collapse" id="myteam">
            <ul class="nav nav-collapse">                                                 
                <li><a href="dashboard.php?action=Members/CreateMember"><span class="sub-item">Create Member </span></a></li>
                <li><a href="dashboard.php?action=Members/MyMembers"><span class="sub-item">My Direct Sponsors</span></a></li>
                <li><a href="dashboard.php?action=Members/MyAllMembers"><span class="sub-item">My Downlines</span></a></li>
                <li><a href="dashboard.php?action=Members/GenealogyTree"><span class="sub-item">Genealogy Tree</span></a></li>
            </ul>
        </div>
    </li>
   
    <li class="nav-item">
        <a data-toggle="collapse" href="#earnings"><i class="fas fa-money-check-alt"></i><p>Payout</p><span class="caret"></span></a>
        <div class="collapse" id="earnings">
            <ul class="nav nav-collapse">
                <!--<li><a href="dashboard.php?action=Earnings/Summary"><span class="sub-item">A/C Summary</span></a></li>-->
                <li><a href="dashboard.php?action=Earnings/PayoutTransactions"><span class="sub-item">Payout Transactions</span></a></li>
            </ul>
        </div>                        
    </li>
     <li class="nav-item">
        <a data-toggle="collapse" href="#levels"><i class="fas fa-clipboard"></i><p>Report</p><span class="caret"></span></a>
        <div class="collapse" id="levels">
            <ul class="nav nav-collapse">
                <li><a href="dashboard.php?action=Reports/Levels"><span class="sub-item">Level</span></a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a data-toggle="collapse" href="#payouts"><i class="fas fa-clipboard"></i><p>Withdraw</p><span class="caret"></span></a>
        <div class="collapse" id="payouts">
            <ul class="nav nav-collapse">
                <li><a href="dashboard.php?action=Withdraw/Request"><span class="sub-item">Request</span></a></li>
                <li><a href="dashboard.php?action=Withdraw/Requests"><span class="sub-item">All Requests</span></a></li>
                <!--<li><a href="dashboard.php?action=Payouts/Transactions"><span class="sub-item">Transactions</span></a></li>-->
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a data-toggle="collapse" href="#wallet"><i class="fas fa-wallet"></i><p>Wallet</p><span class="caret"></span></a>
        <div class="collapse" id="wallet">
            <ul class="nav nav-collapse">
                <li><a href="dashboard.php?action=Wallet/Refill"><span class="sub-item">Refill Wallet </span></a></li>
                <li><a href="dashboard.php?action=Wallet/Transactions"><span class="sub-item">Wallet Transactions</span></a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a data-toggle="collapse" href="#settings"><i class="fas fa-align-justify"></i><p>Settings</p><span class="caret"></span></a>
        <div class="collapse" id="settings">
            <ul class="nav nav-collapse">
                <li><a href="dashboard.php?action=Settings/MyProfile"><span class="sub-item">My Profile </span></a></li>
                <li><a href="dashboard.php?action=Settings/ChangePassword"><span class="sub-item">Change Password</span></a></li>
            </ul>
        </div>
    </li>
</ul> 