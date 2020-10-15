<br>
<style>
.sel_submenu { background:rgba(199, 199, 199, 0.2)}
</style>
<!--<?php echo $action[0]=="Settings" ? ' active' : '';?>-->
<?php $action = explode("/",$_GET['action']); ?>
<ul class="nav nav-primary">
    <li class="nav-item "><a href="dashboard.php"><i class="fas fa-home"></i><p>Dashboard</p></a></li>
    <li class="nav-item ">
        <a data-toggle="collapse" href="#settings"><i class="fas fa-align-justify"></i><p>My Account</p><span class="caret"></span></a>
        <div class="<?php echo $action[0]=="Settings" ? ' ' : 'collapse';?>" id="settings">
            <ul class="nav nav-collapse">
                <li><a href="dashboard.php?action=Settings/MyProfile" <?php echo $action[1]=="MyProfile" ? ' class="sel_submenu" ' : '';?> ><span class="sub-item">My Profile </span></a></li>
                <li><a href="dashboard.php?action=Settings/ChangePassword" <?php echo $action[1]=="ChangePassword" ? ' class="sel_submenu" ' : '';?>><span class="sub-item">Change Password</span></a></li>
                <li><a href="dashboard.php?action=Settings/ChangeTxnPassword" <?php echo $action[1]=="ChangeTxnPassword" ? ' class="sel_submenu" ' : '';?>><span class="sub-item">Change Txn Pwd</span></a></li>
                <li><a href="dashboard.php?action=Settings/WelcomeLetter" <?php echo $action[1]=="WelcomeLetter" ? ' class="sel_submenu" ' : '';?>><span class="sub-item">Welcome Letter</span></a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a data-toggle="collapse" href="#wallet"><i class="fas fa-wallet"></i><p>Wallet</p><span class="caret"></span></a>
        <div class="<?php echo $action[0]=="Wallet" ? ' ' : 'collapse';?>" id="wallet">
            <ul class="nav nav-collapse">
                <li><a href="dashboard.php?action=Wallet/Refill"><span class="sub-item">Wallet Request</span></a></li>
                <li><a href="dashboard.php?action=Wallet/Requests"><span class="sub-item">Request Status</span></a></li>
                <li><a href="dashboard.php?action=Wallet/Transactions"><span class="sub-item">Wallet Transaction</span></a></li>
            </ul>
        </div>                                                         
    </li>
    <li class="nav-item"><a href="dashboard.php?action=Members/CreateMember"><i class="fas fa-wallet"></i>Registration</a></li>
   
    <li class="nav-item">
        <a data-toggle="collapse" href="#myteam"><i class="fas fa-user-friends"></i><p>Team</p><span class="caret"></span></a>
        <div class="<?php echo $action[0]=="Members" ? ' ' : 'collapse';?>" id="myteam">
            <ul class="nav nav-collapse">                                                 
                <li><a href="dashboard.php?action=Members/MyMembers"><span class="sub-item">Direct Referral</span></a></li>
                <li><a href="dashboard.php?action=Members/MyAllMembers"><span class="sub-item">Downlines</span></a></li>
                <li><a href="dashboard.php?action=Members/GenealogyTree"><span class="sub-item">Tree View</span></a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a data-toggle="collapse" href="#mypackage"><i class="fas fa-money-check-alt"></i><p>My Packages</p><span class="caret"></span></a>
        <div class="<?php echo $action[0]=="Packages" ? ' ' : 'collapse';?>" id="mypackage">
            <ul class="nav nav-collapse">
                
                <li><a href="dashboard.php?action=Packages/MyPackage"><span class="sub-item">My Package</span></a></li>
                <li><a href="dashboard.php?action=Packages/PackageDetails"><span class="sub-item">ROI Details</span></a></li>
            </ul>
        </div>                        
    </li>
    <li class="nav-item">
        <a data-toggle="collapse" href="#earnings"><i class="fas fa-money-check-alt"></i><p>Reports</p><span class="caret"></span></a>
        <div class="<?php echo $action[0]=="Reports" ? ' ' : 'collapse';?>" id="earnings">
            <ul class="nav nav-collapse">
                <li><a href="dashboard.php?action=Reports/BinaryPayout"><span class="sub-item">Binary Payout</span></a></li>
                <li><a href="dashboard.php?action=Reports/BinaryIncome"><span class="sub-item">Binary Income</span></a></li>
                <li><a href="dashboard.php?action=Reports/ReferralIncome"><span class="sub-item">Referal Income</span></a></li>
                <li><a href="dashboard.php?action=Reports/RoiIncome"><span class="sub-item">ROI Income</span></a></li>
                <li><a href="dashboard.php?action=Reports/BankTransfer"><span class="sub-item">Bank Transfer</span></a></li>
                <li><a href="dashboard.php?action=Reports/Ledger"><span class="sub-item">Ledger Summary</span></a></li>
            </ul>
        </div>                        
    </li>
</ul>