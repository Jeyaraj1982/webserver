
<br><br>
<div class="main-panel full-height">
            <div class="container">
                <div class="panel-header">
                    <div class="page-inner border-bottom pb-0 mb-3">
                        <div class="d-flex align-items-left flex-column">
                            <h2 class="pb-2 fw-bold">Dashboard</h2>
                            <div class="nav-scroller d-flex">
                                <div class="nav nav-line nav-color-info d-flex align-items-center justify-contents-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-inner">
                    <h2 class="pb-2 fw-bold">Today </h2> 
                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round" style="cursor: pointer;">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-analytics text-warning"></i>
                                            </div>
                                        </div> 
                                        <div class="col-9 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Payment Received</p>
                                                <h3 class="card-title">
                                                    <?php 
                                                    $d = $mysql->select("select (sum(Credits)) as bal from _queen_payment where StaffID='".$_SESSION['User']['StaffID']."' and date(AddOn)='".date("Y-m-d")."'");
                                                    echo number_format(isset($d[0]['bal']) ? $d[0]['bal'] : 0,2);
                                                   ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round" style="cursor: pointer;">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-analytics text-warning"></i>
                                            </div>
                                        </div> 
                                        <div class="col-9 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">My Expenses</p>
                                                <h3 class="card-title">
                                                    <?php 
                                                    $d = $mysql->select("select (sum(ExpenseAmount)) as bal from _queen_expenses where StaffID='".$_SESSION['User']['StaffID']."' and date(CreatedOn)='".date("Y-m-d")."'");
                                                    echo number_format(isset($d[0]['bal']) ? $d[0]['bal'] : 0,2);
                                                   ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round" style="cursor: pointer;">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-analytics text-warning"></i>
                                            </div>
                                        </div> 
                                        <div class="col-9 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">My Orders</p>
                                                <h3 class="card-title"><?php echo sizeof($mysql->select("select * from _queen_temp_orders where StaffID='".$_SESSION['User']['StaffID']."' and date(OrderOn)='".date("Y-m-d")."'")); ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
