<ul class="nav nav-primary">
    <li class="nav-item ">
        <a href="dashboard.php" class="collapsed" aria-expanded="false">
            <i class="fas fa-home"></i><p>Dashboard</p>
        </a>
    </li>
    <li class="nav-item">
        <a data-toggle="collapse" href="#users"><i class="fas fa-layer-group"></i><p>Agents</p><span class="caret"></span></a>
        <div class="collapse" id="users">
            <ul class="nav nav-collapse">
                <li><a href="dashboard.php?action=Distributors/List"><span class="sub-item">Manage Distributors</span></a></li>
                <li><a href="dashboard.php?action=Users/List"><span class="sub-item">Manage Users</span></a></li>    
                <!--<li><a href="dashboard.php?action=ApiUsers/List"><span class="sub-item">Manage Api Users</span></a></li>-->
            </ul>
        </div>          
    </li>
    <li class="nav-item">
        <a data-toggle="collapse" href="#bill"><i class="fas fa-layer-group"></i><p>Bill Requests</p><span class="caret"></span></a>
        <div class="collapse" id="bill">
            <ul class="nav nav-collapse">
                <li><a href="dashboard.php?action=BillPayments/MoneyTransfer&filter=requested"><span class="sub-item">Manage Money Transfer</span></a></li>
                <li><a href="dashboard.php?action=BillPayments/TNEB&filter=requested"><span class="sub-item">Manage TNEB</span></a></li>
                <li><a href="dashboard.php?action=BillPayments/Insurance&filter=requested"><span class="sub-item">Manage Insurance</span></a></li>
                <li><a href="dashboard.php?action=BillPayments/Landline&filter=requested"><span class="sub-item">Manage Landline</span></a></li>
                <li><a href="dashboard.php?action=BillPayments/Postpaid&filter=requested"><span class="sub-item">Manage Postpaid</span></a></li>
                <li><a href="dashboard.php?action=UtilityPayment/TNPolice&filter=requested"><span class="sub-item">Manage TN Police</span></a></li>
                <li><a href="dashboard.php?action=BillPayments/Gas&filter=requested"><span class="sub-item">Manage Gas Bill</span></a></li>
            </ul>
        </div>
    </li> 
     <li class="nav-item">
        <a data-toggle="collapse" href="#report"><i class="fas fa-layer-group"></i><p>Reports</p><span class="caret"></span></a>
        <div class="collapse" id="report">
            <ul class="nav nav-collapse">
                <li><a href="dashboard.php?action=Transactions/ListAll"><span class="sub-item">All User's Balance</span></a></li>
                <li><a href="dashboard.php?action=Transactions/CreditDebit"><span class="sub-item">Credit/Debit</span></a></li>
                <li><a href="dashboard.php?action=Transactions/Report"><span class="sub-item">Transaction Reports</span></a></li>
                <li><a href="dashboard.php?action=Reports/MAB"><span class="sub-item">MAB Reports</span></a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a data-toggle="collapse" href="#wallet"><i class="fas fa-layer-group"></i><p>Wallet</p><span class="caret"></span></a>
        <div class="collapse" id="wallet">                
            <ul class="nav nav-collapse">
                <li><a href="dashboard.php?action=Wallets/Refill"><span class="sub-item">Refill Amount</span></a></li>
                <li><a href="dashboard.php?action=Wallets/Debit"><span class="sub-item">Debit Amount</span></a></li>
                <li><a href="dashboard.php?action=Wallets/CreditSales"><span class="sub-item">Credit Sales</span></a></li>
            </ul>
        </div>
    </li>
     <li class="nav-item">
        <a data-toggle="collapse" href="#myteam"><i class="fas fa-layer-group"></i><p>Settings</p><span class="caret"></span></a>
        <div class="collapse" id="myteam">
            <ul class="nav nav-collapse">
                <li><a href="dashboard.php?action=Settings/prepaidmobileoperators"><span class="sub-item">Manage Operators</span></a></li>
                <li><a href="dashboard.php?action=RechargePlans/List"><span class="sub-item">Recharge Plan</span></a></li>
                <li><a href="dashboard.php?action=Imps/UpdateLimits"><span class="sub-item">Update IMPS Limit</span></a></li>
                <li><a href="dashboard.php?action=Transactions/TxnIDUpdate"><span class="sub-item">Txn ID Update</span></a></li>
                <!--<li><a href="dashboard.php?action=Settings/LapuLog"><span class="sub-item">Lapu log</span></a></li>-->
            </ul>
        </div>
    </li>
     <li class="nav-item">
        <a data-toggle="collapse" href="#Telegram"><i class="fas fa-layer-group"></i><p>Telegram</p><span class="caret"></span></a>
        <div class="collapse" id="Telegram">
            <ul class="nav nav-collapse">
                <li><a href="dashboard.php?action=TelegramReceivedMsg"><span class="sub-item">Telegram Received Msg</span></a></li>
                <li><a href="dashboard.php?action=TelegramSubscribers"><span class="sub-item">Telegram Subscribers</span></a></li>
                <li><a href="dashboard.php?action=SendAllAgents"><span class="sub-item">Telegram - msg to agent</span></a></li>
                <li><a href="dashboard.php?action=SendAllDistributors"><span class="sub-item">Telegram - msg to distributor </span></a></li>
            </ul>
        </div>
    </li>
   
 
       
      
      <li  class="nav-item"><a href="dashboard.php?action=logout"><span class="sub-item">Logout</span></a></li>
</ul>