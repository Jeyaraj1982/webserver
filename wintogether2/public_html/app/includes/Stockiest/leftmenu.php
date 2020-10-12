<ul class="nav nav-primary">
    <li class="nav-item ">
        <a data-toggle="collapse" href="dashboard.php" class="collapsed" aria-expanded="false">
            <i class="fas fa-home"></i><p>Dashboard</p>
        </a>
    </li>
    <li class="nav-item">
        <a data-toggle="collapse" href="#orders"><i class="fas fa-layer-group"></i><p>Order</p><span class="caret"></span></a>
        <div class="collapse" id="orders">
            <ul class="nav nav-collapse">
            <?php if ($_SESSION['User']['IsSuperStockiest']==1) {?>
                <li><a href="dashboard.php?action=Orders/MyOrders"><span class="sub-item">List Orders</span></a></li>
            <?php } else {?>
                <li><a href="dashboard.php?action=Orders/New"><span class="sub-item">New Order</span></a></li>
                <li><a href="dashboard.php?action=Orders/MyOrders"><span class="sub-item">My Orders</span></a></li>
            <?php } ?>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a data-toggle="collapse" href="#stocks"><i class="fas fa-layer-group"></i><p>Stock</p><span class="caret"></span></a>
        <div class="collapse" id="stocks">
            <ul class="nav nav-collapse">
            <?php if ($_SESSION['User']['IsSuperStockiest']==1) {?>
                <li><a href="dashboard.php?action=StockInfo/AddStock"><span class="sub-item">Add Stock</span></a></li>
                <li><a href="dashboard.php?action=StockInfo/ViewStocks"><span class="sub-item">View Stocks</span></a></li>
                <li><a href="dashboard.php?action=StockInfo/Transfer"><span class="sub-item">Stock Transfer</span></a></li>
            <?php } else { ?>
                <li><a href="dashboard.php?action=Orders/GeneralReport"><span class="sub-item">Quick Report</span></a></li>
                <li><a href="dashboard.php?action=Orders/StockReport"><span class="sub-item">Detailed Report</span></a></li>
            <?php } ?>
            </ul>
        </div>
    </li> 
   
    <li class="nav-item">
        <a data-toggle="collapse" href="#wallet"><i class="fas fa-layer-group"></i><p>Wallet</p><span class="caret"></span></a>
        <div class="collapse" id="wallet">
            <ul class="nav nav-collapse">
                <li><a href="dashboard.php?action=Wallet/Refill"><span class="sub-item">Refill Wallet </span></a></li>
                <li><a href="dashboard.php?action=Wallet/Transactions"><span class="sub-item">Wallet Transactions</span></a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a data-toggle="collapse" href="#settings"><i class="fas fa-layer-group"></i><p>Settings</p><span class="caret"></span></a>
        <div class="collapse" id="settings">
            <ul class="nav nav-collapse">
                <li><a href="dashboard.php?action=Settings/MyProfile"><span class="sub-item">My Profile </span></a></li>
                <li><a href="dashboard.php?action=Settings/ChangePassword"><span class="sub-item">Change Password</span></a></li>
            </ul>
        </div>
    </li>
</ul> 