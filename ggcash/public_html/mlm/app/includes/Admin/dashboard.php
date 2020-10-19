
<div class="page-inner">
                    <!-- Card -->
                    <h4 class="page-title" style="color: #9b0976;">Dashboard</h4>
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-users"></i>
                                            </div>
                                        </div>
                                        <div class="col ml-3 ml-sm-0">
                                            <div class="numbers" style="text-align:right">
                                                <p class="card-category">Members</p>
                                                <h4 class="card-title">
                                                <?php echo (sizeof($mysql->select("select * from _tbl_Members")));?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center bubble-shadow-small">
                                                <i class="flaticon-graph"></i>
                                            </div>
                                        </div>
                                        <div class="col ml-3 ml-sm-0">
                                            <div class="numbers" style="text-align: right;">
                                                <p class="card-category">10% Charges</p>
                                                <h4 class="card-title" style="text-align: right;">
                                                <?php
                                                    //$val = $mysql->select("select sum(Debits) as d from _tbl_wallet_earnings where Ledger='1'");
                                                    echo number_format($val[0]['d'],2);
                                                ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center bubble-shadow-small">
                                                <i class="flaticon-success"></i>
                                            </div>
                                        </div>
                                        <div class="col ml-3 ml-sm-0">
                                            <div class="numbers">
                                                <p class="card-category">Payable Payout</p>
                                                <h4 class="card-title" style="text-align: right;">
                                                <?php
                                                    $val = $mysql->select("select sum(Credits) as amount from _tbl_wallet_utility where LevelID>0");
                                                    echo " ".number_format($val[0]['amount'],2);
                                                ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center bubble-shadow-small">
                                                <i class="flaticon-success"></i>
                                            </div>
                                        </div>
                                        <div class="col ml-3 ml-sm-0">
                                            <div class="numbers">
                                                <p class="card-category" style="text-align: right;">IMPS API</p>
                                                <h4 class="card-title" style="text-align: right;">
                                                <?php
                                                    echo "0.00 ";
                                                ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-5">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center bubble-shadow-small">
                                                <i class="flaticon-coins"></i>
                                            </div>
                                        </div>
                                        <div class="col ml-3 ml-sm-0">
                                            <div class="numbers">
                                                <p class="card-category" style="text-align: right;">Admin Earnings</p>
                                                <h4 class="card-title" style="text-align: right;">
                                                <?php
                                                $val = $mysql->select("select sum(Credits) as amount from _tbl_wallet_utility where LevelID>0");
                                                $Eranings = (sizeof($mysql->select("select * from _tbl_Members")) * 1000) - $val[0]['amount']; 
                                                    echo number_format($Eranings,2);
                                                ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col ml-3 ml-sm-0">
                                            <div class="numbers" style="text-align:right">
                                                <p class="card-category">Blocked Members</p>
                                                <h4 class="card-title">
                                                <?php echo (sizeof($mysql->select("select * from _tbl_Members where IsActive='0'")));?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="card">
                                <div class="card-header">Payout Details</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                    <table style="width:100%;">
                                    <thead>
                                       <tr>
                                            <th>Payout Date</th>
                                            <th style="text-align: right;">Payable</th>
                                            <th style="text-align: right;">Paid</th>
                                            <th style="text-align: right;">Unpaid</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $Transactions = $mysql->select("select * from _tbl_payout_overall  ORDER BY `ID` DESC");?>
                                        <?php if (sizeof($Transactions)==0) {?>
                                        <tr>
                                            <td colspan="5" style="text-align: center;">No records found</td>
                                        </tr>
                                        <?php } ?>
                                        <?php foreach ($Transactions as $Transaction){ ?>
                                        <tr>
                                            <td style="font-size:12px; border-bottom: 1px solid #ddd;text-align:left"><?php echo date("M d, Y p",strtotime($Transaction['PayoutDate']));?></td>
                                            <td style="font-size:12px; border-bottom: 1px solid #ddd;text-align: right"><?php echo number_format($Transaction['PayoutAmount'],2);?></td>
                                            <td style="font-size:12px; border-bottom: 1px solid #ddd;text-align: right"><?php echo number_format($Transaction['Settled'],2);?></td>
                                            <td style="font-size:12px; border-bottom: 1px solid #ddd;text-align: right"><?php echo number_format($Transaction['PayoutAmount'],2);?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                    <table style="width:100%;">
                                    <tbody>
                                        <tr>
                                            <td style="font-size:12px; border-bottom: 1px solid #ddd;text-align:left">Bank Account Not Updated Members</td>
                                            <td style="font-size:12px; border-bottom: 1px solid #ddd;text-align:right">
                                                <?php $mem = $mysql->select("SELECT COUNT(*) AS cnt FROM _tbl_Members WHERE MemberCode NOT IN (SELECT MemberCode FROM _tbl_Members_bank_info)");?>
                                                <?php echo $mem[0]['cnt'];?>
                                            </td>
                                            <td style="font-size:12px; border-bottom: 1px solid #ddd;text-align:right"><?php if($mem[0]['cnt']>0){ ?><a href="dashboard.php?action=Report/WithoutBankDetailsMem">View</a><?php } ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-size:12px; border-bottom: 1px solid #ddd;text-align: left">Wallet Update Requests</td>
                                            <td style="font-size:12px; border-bottom: 1px solid #ddd;text-align: right"><?php  $val = $mysql->select("select Count(RequestID) as cnt from _tbl_wallet_request_utility where IsApproved='0' and IsRejected='0'"); echo $val[0]['cnt']; ?></td>
                                            <td style="font-size:12px; border-bottom: 1px solid #ddd;text-align: right"><a href="dashboard.php?action=Wallets/UtilityWalletRequests">View</a></td>
                                        </tr>
                                        <tr>
                                            <td style="font-size:12px; border-bottom: 1px solid #ddd;text-align: left">Failure Payout Payments</td>
                                            <td style="font-size:12px; border-bottom: 1px solid #ddd;text-align: right">0</td>
                                            <td style="font-size:12px; border-bottom: 1px solid #ddd;text-align: right">&nbsp;</td>
                                        </tr>
                                    </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="card">
                                <div class="card-header">Recent Login Logs</div>
                                <div class="card-body">
                                
                                    <div class="table-responsive">
                                    <table style="width:100%;">
                                    <thead>
                                       <tr>
                                            <th>Login Date</th>
                                            <th>Member Code</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $Transactions = $mysql->select("select * from _tbl_members_login_logs  ORDER BY `LoginID` DESC limit 0,5");?>
                                        <?php if (sizeof($Transactions)==0) {?>
                                        <tr>
                                            <td colspan="5" style="text-align: center;">No records found</td>
                                        </tr>
                                        <?php } ?>
                                        <?php foreach ($Transactions as $Transaction){ ?>
                                        <?php $mem = $mysql->select("select * from _tbl_Members where MemberID='".$Transaction['MemberID']."'");?>
                                        <tr>
                                            <td style="font-size:12px; border-bottom: 1px solid #ddd;text-align:left"><?php echo $Transaction['LoginOn'];?></td>
                                            <td style="font-size:12px; border-bottom: 1px solid #ddd;text-align:left"><?php echo $mem[0]['MemberName'];?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                        
                    <!-- Row Card No Padding 
                    <div class="row row-card-no-pd">
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-chart-pie text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Number</p>
                                                <h4 class="card-title">150GB</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-coins text-success"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Revenue</p>
                                                <h4 class="card-title">$ 1,345</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-error text-danger"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Errors</p>
                                                <h4 class="card-title">23</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-twitter text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Followers</p>
                                                <h4 class="card-title">+45K</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-secondary">
                                <div class="card-body skew-shadow">
                                    <h1>3,072</h1>
                                    <h5 class="op-8">Total conversations</h5>
                                    <div class="pull-right">
                                        <h3 class="fw-bold op-8">88%</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-dark bg-secondary-gradient">
                                <div class="card-body bubble-shadow">
                                    <h1>188</h1>
                                    <h5 class="op-8">Total Sales</h5>
                                    <div class="pull-right">
                                        <h3 class="fw-bold op-8">25%</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-dark bg-secondary2">
                                <div class="card-body curves-shadow">
                                    <h1>12</h1>
                                    <h5 class="op-8">New Users</h5>
                                    <div class="pull-right">
                                        <h3 class="fw-bold op-8">70%</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-dark bg-secondary-gradient">
                                <div class="card-body skew-shadow">
                                    <img src="../assets/img/visa.svg" alt="Visa Logo" height="12.5">
                                    <h2 class="py-4 mb-0">1234 **** **** 5678</h2>
                                    <div class="row">
                                        <div class="col-8 pr-0">
                                            <h3 class="fw-bold mb-1">Sultan Ghani</h3>
                                            <div class="text-small text-uppercase fw-bold op-8">Card Holder</div>
                                        </div>
                                        <div class="col-4 pl-0 text-right">
                                            <h3 class="fw-bold mb-1">4/26</h3>
                                            <div class="text-small text-uppercase fw-bold op-8">Expired</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-dark bg-secondary-gradient">
                                <div class="card-body bubble-shadow">
                                    <img src="../assets/img/visa.svg" alt="Visa Logo" height="12.5">
                                    <h2 class="py-4 mb-0">1234 **** **** 5678</h2>
                                    <div class="row">
                                        <div class="col-8 pr-0">
                                            <h3 class="fw-bold mb-1">Sultan Ghani</h3>
                                            <div class="text-small text-uppercase fw-bold op-8">Card Holder</div>
                                        </div>
                                        <div class="col-4 pl-0 text-right">
                                            <h3 class="fw-bold mb-1">4/26</h3>
                                            <div class="text-small text-uppercase fw-bold op-8">Expired</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-dark bg-secondary-gradient">
                                <div class="card-body curves-shadow">
                                    <img src="../assets/img/visa.svg" alt="Visa Logo" height="12.5">
                                    <h2 class="py-4 mb-0">1234 **** **** 5678</h2>
                                    <div class="row">
                                        <div class="col-8 pr-0">
                                            <h3 class="fw-bold mb-1">Sultan Ghani</h3>
                                            <div class="text-small text-uppercase fw-bold op-8">Card Holder</div>
                                        </div>
                                        <div class="col-4 pl-0 text-right">
                                            <h3 class="fw-bold mb-1">4/26</h3>
                                            <div class="text-small text-uppercase fw-bold op-8">Expired</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body pb-0">
                                    <div class="h1 fw-bold float-right text-primary">+5%</div>
                                    <h2 class="mb-2">17</h2>
                                    <p class="text-muted">Users online</p>
                                    <div class="pull-in sparkline-fix">
                                        <div id="lineChart"><canvas style="display: inline-block; width: 299.533px; height: 70px; vertical-align: top;" width="299" height="70"></canvas></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body pb-0">
                                    <div class="h1 fw-bold float-right text-danger">-3%</div>
                                    <h2 class="mb-2">27</h2>
                                    <p class="text-muted">New Users</p>
                                    <div class="pull-in sparkline-fix">
                                        <div id="lineChart2"><canvas style="display: inline-block; width: 299.533px; height: 70px; vertical-align: top;" width="299" height="70"></canvas></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body pb-0">
                                    <div class="h1 fw-bold float-right text-warning">+7%</div>
                                    <h2 class="mb-2">213</h2>
                                    <p class="text-muted">Transactions</p>
                                    <div class="pull-in sparkline-fix">
                                        <div id="lineChart3"><canvas style="display: inline-block; width: 299.533px; height: 70px; vertical-align: top;" width="299" height="70"></canvas></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-dark bg-primary-gradient">
                                <div class="card-body pb-0">
                                    <div class="h1 fw-bold float-right">+5%</div>
                                    <h2 class="mb-2">17</h2>
                                    <p>Users online</p>
                                    <div class="pull-in sparkline-fix chart-as-background">
                                        <div id="lineChart4"><canvas style="display: inline-block; width: 298.333px; height: 70px; vertical-align: top;" width="298" height="70"></canvas></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-black">
                                <div class="card-body pb-0">
                                    <div class="h1 fw-bold float-right">-3%</div>
                                    <h2 class="mb-2">27</h2>
                                    <p>New Users</p>
                                    <div class="pull-in sparkline-fix chart-as-background">
                                        <div id="lineChart5"><canvas style="display: inline-block; width: 298.333px; height: 70px; vertical-align: top;" width="298" height="70"></canvas></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-dark bg-success2">
                                <div class="card-body pb-0">
                                    <div class="h1 fw-bold float-right">+7%</div>
                                    <h2 class="mb-2">213</h2>
                                    <p>Transactions</p>
                                    <div class="pull-in sparkline-fix chart-as-background">
                                        <div id="lineChart6"><canvas style="display: inline-block; width: 298.333px; height: 70px; vertical-align: top;" width="298" height="70"></canvas></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h5><b>Todays Income</b></h5>
                                            <p class="text-muted">All Customs Value</p>
                                        </div>
                                        <h3 class="text-info fw-bold">$170</h3>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-info w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <p class="text-muted mb-0">Change</p>
                                        <p class="text-muted mb-0">75%</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h5><b>Total Revenue</b></h5>
                                            <p class="text-muted">All Customs Value</p>
                                        </div>
                                        <h3 class="text-success fw-bold">$120</h3>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-success w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <p class="text-muted mb-0">Change</p>
                                        <p class="text-muted mb-0">25%</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h5><b>New Orders</b></h5>
                                            <p class="text-muted">Fresh Order Amount</p>
                                        </div>
                                        <h3 class="text-danger fw-bold">15</h3>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-danger w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <p class="text-muted mb-0">Change</p>
                                        <p class="text-muted mb-0">50%</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h5><b>New Users</b></h5>
                                            <p class="text-muted">Joined New User</p>
                                        </div>
                                        <h3 class="text-secondary fw-bold">12</h3>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-secondary w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <p class="text-muted mb-0">Change</p>
                                        <p class="text-muted mb-0">25%</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row row-card-no-pd mt--2">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h5><b>Todays Income</b></h5>
                                            <p class="text-muted">All Customs Value</p>
                                        </div>
                                        <h3 class="text-info fw-bold">$170</h3>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-info w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <p class="text-muted mb-0">Change</p>
                                        <p class="text-muted mb-0">75%</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h5><b>Total Revenue</b></h5>
                                            <p class="text-muted">All Customs Value</p>
                                        </div>
                                        <h3 class="text-success fw-bold">$120</h3>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-success w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <p class="text-muted mb-0">Change</p>
                                        <p class="text-muted mb-0">25%</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h5><b>New Orders</b></h5>
                                            <p class="text-muted">Fresh Order Amount</p>
                                        </div>
                                        <h3 class="text-danger fw-bold">15</h3>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-danger w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <p class="text-muted mb-0">Change</p>
                                        <p class="text-muted mb-0">50%</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h5><b>New Users</b></h5>
                                            <p class="text-muted">Joined New User</p>
                                        </div>
                                        <h3 class="text-secondary fw-bold">12</h3>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-secondary w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <p class="text-muted mb-0">Change</p>
                                        <p class="text-muted mb-0">25%</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 col-sm-4 col-lg-2">
                            <div class="card">
                                <div class="card-body p-3 text-center">
                                    <div class="text-right text-success">
                                        6%
                                        <i class="fa fa-chevron-up"></i>
                                    </div>
                                    <div class="h1 m-0">43</div>
                                    <div class="text-muted mb-3">New Tickets</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-lg-2">
                            <div class="card">
                                <div class="card-body p-3 text-center">
                                    <div class="text-right text-danger">
                                        -3%
                                        <i class="fa fa-chevron-down"></i>
                                    </div>
                                    <div class="h1 m-0">17</div>
                                    <div class="text-muted mb-3">Closed Today</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-lg-2">
                            <div class="card">
                                <div class="card-body p-3 text-center">
                                    <div class="text-right text-success">
                                        9%
                                        <i class="fa fa-chevron-up"></i>
                                    </div>
                                    <div class="h1 m-0">7</div>
                                    <div class="text-muted mb-3">New Replies</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-lg-2">
                            <div class="card">
                                <div class="card-body p-3 text-center">
                                    <div class="text-right text-success">
                                        3%
                                        <i class="fa fa-chevron-up"></i>
                                    </div>
                                    <div class="h1 m-0">27.3K</div>
                                    <div class="text-muted mb-3">Followers</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-lg-2">
                            <div class="card">
                                <div class="card-body p-3 text-center">
                                    <div class="text-right text-danger">
                                        -2%
                                        <i class="fa fa-chevron-down"></i>
                                    </div>
                                    <div class="h1 m-0">$95</div>
                                    <div class="text-muted mb-3">Daily Earnings</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-lg-2">
                            <div class="card">
                                <div class="card-body p-3 text-center">
                                    <div class="text-right text-danger">
                                        -1%
                                        <i class="fa fa-chevron-down"></i>
                                    </div>
                                    <div class="h1 m-0">621</div>
                                    <div class="text-muted mb-3">Products</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="card p-3">
                                <div class="d-flex align-items-center">
                                    <span class="stamp stamp-md bg-secondary mr-3">
                                        <i class="fa fa-dollar-sign"></i>
                                    </span>
                                    <div>
                                        <h5 class="mb-1"><b><a href="#">132 <small>Sales</small></a></b></h5>
                                        <small class="text-muted">12 waiting payments</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card p-3">
                                <div class="d-flex align-items-center">
                                    <span class="stamp stamp-md bg-success mr-3">
                                        <i class="fa fa-shopping-cart"></i>
                                    </span>
                                    <div>
                                        <h5 class="mb-1"><b><a href="#">78 <small>Orders</small></a></b></h5>
                                        <small class="text-muted">32 shipped</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card p-3">
                                <div class="d-flex align-items-center">
                                    <span class="stamp stamp-md bg-danger mr-3">
                                        <i class="fa fa-users"></i>
                                    </span>
                                    <div>
                                        <h5 class="mb-1"><b><a href="#">1,352 <small>Members</small></a></b></h5>
                                        <small class="text-muted">163 registered today</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card p-3">
                                <div class="d-flex align-items-center">
                                    <span class="stamp stamp-md bg-warning mr-3">
                                        <i class="fa fa-comment-alt"></i>
                                    </span>
                                    <div>
                                        <h5 class="mb-1"><b><a href="#">132 <small>Comments</small></a></b></h5>
                                        <small class="text-muted">16 waiting</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

           
                    <h4 class="page-title">Timeline</h4>
                    <div class="row">
                        <div class="col-md-12">
                            
                            <ul class="timeline">
                                <li>
                                    <div class="timeline-badge"><i class="flaticon-message"></i></div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Mussum ipsum cacilds</h4>
                                            <p><small class="text-muted"><i class="flaticon-message"></i> 11 hours ago via Twitter</small></p>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-inverted">
                                    <div class="timeline-badge warning"><i class="flaticon-alarm-1"></i></div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Mussum ipsum cacilds</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-badge danger"><i class="flaticon-error"></i></div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Mussum ipsum cacilds</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-inverted">
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Mussum ipsum cacilds</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-badge info"><i class="flaticon-price-tag"></i></div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Mussum ipsum cacilds</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                            <hr>
                                            <div class="btn-group dropdown">
                                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                    <span class="btn-label">
                                                        <i class="fa fa-cog"></i>
                                                    </span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>
                                                        <a class="dropdown-item" href="#">Action</a>
                                                        <a class="dropdown-item" href="#">Another action</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Mussum ipsum cacilds</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-inverted">
                                    <div class="timeline-badge success"><i class="flaticon-credit-card-1"></i></div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Mussum ipsum cacilds</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

               
                    <h4 class="page-title">Pricing</h4>
                    <div class="row justify-content-center align-items-center mb-1">
                        <div class="col-md-3 pl-md-0">
                            <div class="card card-pricing">
                                <div class="card-header">
                                    <h4 class="card-title">Basic</h4>
                                    <div class="card-price">
                                        <span class="price">$25</span>
                                        <span class="text">/mo</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <ul class="specification-list">
                                        <li>
                                            <span class="name-specification">Customizer</span>
                                            <span class="status-specification">14 days trial</span>
                                        </li>
                                        <li>
                                            <span class="name-specification">Chat History</span>
                                            <span class="status-specification">No</span>
                                        </li>
                                        <li>
                                            <span class="name-specification">Statistics</span>
                                            <span class="status-specification">14 days trial</span>
                                        </li>
                                        <li>
                                            <span class="name-specification">Support</span>
                                            <span class="status-specification">Yes</span>
                                        </li>
                                        <li>
                                            <span class="name-specification">Live Support</span>
                                            <span class="status-specification">No</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary btn-block"><b>Get Started</b></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 pl-md-0 pr-md-0">
                            <div class="card card-pricing card-pricing-focus card-primary">
                                <div class="card-header">
                                    <h4 class="card-title">Professional</h4>
                                    <div class="card-price">
                                        <span class="price">$35</span>
                                        <span class="text">/mo</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <ul class="specification-list">
                                        <li>
                                            <span class="name-specification">Customizer</span>
                                            <span class="status-specification">Yes</span>
                                        </li>
                                        <li>
                                            <span class="name-specification">Chat History</span>
                                            <span class="status-specification">3 Month</span>
                                        </li>
                                        <li>
                                            <span class="name-specification">Statistics</span>
                                            <span class="status-specification">3 Month</span>
                                        </li>
                                        <li>
                                            <span class="name-specification">Support</span>
                                            <span class="status-specification">Yes</span>
                                        </li>
                                        <li>
                                            <span class="name-specification">Live Support</span>
                                            <span class="status-specification">Yes</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-light btn-block"><b>Get Started</b></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 pr-md-0">
                            <div class="card card-pricing">
                                <div class="card-header">
                                    <h4 class="card-title">Team</h4>
                                    <div class="card-price">
                                        <span class="price">$75</span>
                                        <span class="text">/mo</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <ul class="specification-list">
                                        <li>
                                            <span class="name-specification">Customizer</span>
                                            <span class="status-specification">Yes</span>
                                        </li>
                                        <li>
                                            <span class="name-specification">Chat History</span>
                                            <span class="status-specification">1 Year</span>
                                        </li>
                                        <li>
                                            <span class="name-specification">Statistics</span>
                                            <span class="status-specification">1 Year</span>
                                        </li>
                                        <li>
                                            <span class="name-specification">Support</span>
                                            <span class="status-specification">Yes</span>
                                        </li>
                                        <li>
                                            <span class="name-specification">Live Support</span>
                                            <span class="status-specification">Yes</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary btn-block"><b>Get Started</b></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4 class="page-title">Pricing 2</h4>
                    <div class="row justify-content-center align-items-center mb-5">
                        <div class="col-md-3 pl-md-0">
                            <div class="card-pricing2 card-success">
                                <div class="pricing-header">
                                    <h3 class="fw-bold">Standard</h3>
                                    <span class="sub-title">Lorem ipsum</span>
                                </div>
                                <div class="price-value">
                                    <div class="value">
                                        <span class="currency">$</span>
                                        <span class="amount">10.<span>99</span></span>
                                        <span class="month">/month</span>
                                    </div>
                                </div>
                                <ul class="pricing-content">
                                    <li>50GB Disk Space</li>
                                    <li>50 Email Accounts</li>
                                    <li>50GB Monthly Bandwidth</li>
                                    <li class="disable">10 Subdomains</li>
                                    <li class="disable">15 Domains</li>
                                </ul>
                                <a href="#" class="btn btn-success btn-border btn-lg w-75 fw-bold mb-3">Sign up</a>
                            </div>
                        </div>
                        <div class="col-md-3 pl-md-0 pr-md-0">
                            <div class="card-pricing2 card-primary">
                                <div class="pricing-header">
                                    <h3 class="fw-bold">Business</h3>
                                    <span class="sub-title">Lorem ipsum</span>
                                </div>
                                <div class="price-value">
                                    <div class="value">
                                        <span class="currency">$</span>
                                        <span class="amount">20.<span>99</span></span>
                                        <span class="month">/month</span>
                                    </div>
                                </div>
                                <ul class="pricing-content">
                                    <li>60GB Disk Space</li>
                                    <li>60 Email Accounts</li>
                                    <li>60GB Monthly Bandwidth</li>
                                    <li>15 Subdomains</li>
                                    <li class="disable">20 Domains</li>
                                </ul>
                                <a href="#" class="btn btn-primary btn-border btn-lg w-75 fw-bold mb-3">Sign up</a>
                            </div>
                        </div>
                        <div class="col-md-3 pr-md-0">
                            <div class="card-pricing2 card-secondary">
                                <div class="pricing-header">
                                    <h3 class="fw-bold">Premium</h3>
                                    <span class="sub-title">Lorem ipsum</span>
                                </div>
                                <div class="price-value">
                                    <div class="value">
                                        <span class="currency">$</span>
                                        <span class="amount">30.<span>99</span></span>
                                        <span class="month">/month</span>
                                    </div>
                                </div>
                                <ul class="pricing-content">
                                    <li>70GB Disk Space</li>
                                    <li>70 Email Accounts</li>
                                    <li>70GB Monthly Bandwidth</li>
                                    <li>20 Subdomains</li>
                                    <li>25 Domains</li>
                                </ul>
                                <a href="#" class="btn btn-secondary btn-border btn-lg w-75 fw-bold mb-3">Sign up</a>
                            </div>
                        </div>
                    </div>

                     
                    <h4 class="page-title">Customized Card</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-info card-annoucement card-round">
                                <div class="card-body text-center">
                                    <div class="card-opening">Welcome Rian,</div>
                                    <div class="card-desc">
                                        Congrats and best wishes for success in your brand new life!
                                        I knew that you would do this!
                                    </div>
                                    <div class="card-detail">
                                        <div class="btn btn-light btn-rounded">View Detail</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-round">
                                <div class="card-body">
                                    <div class="card-title fw-mediumbold">Suggested People</div>
                                    <div class="card-list">
                                        <div class="item-list">
                                            <div class="avatar">
                                                <img src="../assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded-circle">
                                            </div>
                                            <div class="info-user ml-3">
                                                <div class="username">Jimmy Denis</div>
                                                <div class="status">Graphic Designer</div>
                                            </div>
                                            <button class="btn btn-icon btn-primary btn-round btn-xs">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                        <div class="item-list">
                                            <div class="avatar">
                                                <img src="../assets/img/chadengle.jpg" alt="..." class="avatar-img rounded-circle">
                                            </div>
                                            <div class="info-user ml-3">
                                                <div class="username">Chad</div>
                                                <div class="status">CEO Zeleaf</div>
                                            </div>
                                            <button class="btn btn-icon btn-primary btn-round btn-xs">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                        <div class="item-list">
                                            <div class="avatar">
                                                <img src="../assets/img/talha.jpg" alt="..." class="avatar-img rounded-circle">
                                            </div>
                                            <div class="info-user ml-3">
                                                <div class="username">Talha</div>
                                                <div class="status">Front End Designer</div>
                                            </div>
                                            <button class="btn btn-icon btn-primary btn-round btn-xs">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-post card-round">
                                <img class="card-img-top" src="../assets/img/blogpost.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="avatar">
                                            <img src="../assets/img/profile2.jpg" alt="..." class="avatar-img rounded-circle">
                                        </div>
                                        <div class="info-post ml-2">
                                            <p class="username">Joko Subianto</p>
                                            <p class="date text-muted">20 Jan 18</p>
                                        </div>
                                    </div>
                                    <div class="separator-solid"></div>
                                    <p class="card-category text-info mb-1"><a href="#">Design</a></p>
                                    <h3 class="card-title">
                                        <a href="#">
                                            Best Design Resources This Week
                                        </a>
                                    </h3>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary btn-rounded btn-sm">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-profile">
                                <div class="card-header" style="background-image: url('../assets/img/blogpost.jpg')">
                                    <div class="profile-picture">
                                        <div class="avatar avatar-xl">
                                            <img src="../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="user-profile text-center">
                                        <div class="name">Hizrian, 19</div>
                                        <div class="job">Frontend Developer</div>
                                        <div class="desc">A man who hates loneliness</div>
                                        <div class="social-media">
                                            <a class="btn btn-info btn-twitter btn-sm btn-link" href="#"> 
                                                <span class="btn-label just-icon"><i class="flaticon-twitter"></i> </span>
                                            </a>
                                            <a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#"> 
                                                <span class="btn-label just-icon"><i class="flaticon-google-plus"></i> </span> 
                                            </a>
                                            <a class="btn btn-primary btn-sm btn-link" rel="publisher" href="#"> 
                                                <span class="btn-label just-icon"><i class="flaticon-facebook"></i> </span> 
                                            </a>
                                            <a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#"> 
                                                <span class="btn-label just-icon"><i class="flaticon-dribbble"></i> </span> 
                                            </a>
                                        </div>
                                        <div class="view-profile">
                                            <a href="#" class="btn btn-secondary btn-block">View Full Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row user-stats text-center">
                                        <div class="col">
                                            <div class="number">125</div>
                                            <div class="title">Post</div>
                                        </div>
                                        <div class="col">
                                            <div class="number">25K</div>
                                            <div class="title">Followers</div>
                                        </div>
                                        <div class="col">
                                            <div class="number">134</div>
                                            <div class="title">Following</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div> -->
                </div> 