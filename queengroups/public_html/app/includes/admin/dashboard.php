
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
                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round" onclick="location.href='dashboard.php?action=Agent/list&status=All'" style="cursor: pointer;">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-user text-warning"></i>
                                            </div>
                                        </div> 
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Agents</p>
                                                <h3 class="card-title"><?php echo sizeof($mysql->select("select * from _queen_agent where IsAgent='1'")); ?></h3>
                                            </div>
										</div>
                                    </div>
									<div class="row">
										<div class="col-4">
										</div>
										<div class="col-4">
											<p><i class="fas fa-bullseye" style="color:green"></i> <?php echo sizeof($mysql->select("select * from _queen_agent where IsActive='1' and IsAgent='1'")); ?></p>
										</div>
										<div class="col-4">
											<p><i class="fas fa-bullseye" style="color:grey"></i> <?php echo sizeof($mysql->select("select * from _queen_agent where IsActive='0' and IsAgent='1'")); ?></p>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round" onclick="location.href='dashboard.php?action=Customer/list&status=All'" style="cursor: pointer;">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-user text-warning"></i>
                                            </div>
                                        </div> 
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Customers</p>
                                                <h3 class="card-title"><?php echo sizeof($mysql->select("select * from _queen_agent where IsAgent='0'")); ?></h3>
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
										<div class="col-4">
										</div>
										<div class="col-4">
											<p><i class="fas fa-bullseye" style="color:green"></i> <?php echo sizeof($mysql->select("select * from _queen_agent where IsActive='1' and IsAgent='0'")); ?></p>
										</div>
										<div class="col-4">
											<p><i class="fas fa-bullseye" style="color:grey"></i> <?php echo sizeof($mysql->select("select * from _queen_agent where IsActive='0' and IsAgent='0'")); ?></p>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round" onclick="location.href='dashboard.php?action=Staffs/list&status=All'" style="cursor: pointer;">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-user text-warning"></i>
                                            </div>
                                        </div> 
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Staffs</p>
                                                <h3 class="card-title"><?php echo sizeof($mysql->select("select * from _queen_staffs")); ?></h3>
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
										<div class="col-4">
										</div>
										<div class="col-4">
											<p><i class="fas fa-bullseye" style="color:green"></i> <?php echo sizeof($mysql->select("select * from _queen_staffs where IsActive='1'")); ?></p>
										</div>
										<div class="col-4">
											<p><i class="fas fa-bullseye" style="color:grey"></i> <?php echo sizeof($mysql->select("select * from _queen_staffs where IsActive='0'")); ?></p>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round" onclick="location.href='dashboard.php?action=Services/list&status=All'" style="cursor: pointer;">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-analytics text-warning"></i>
                                            </div>
                                        </div> 
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Services</p>
                                                <h3 class="card-title"><?php echo sizeof($mysql->select("select * from _queen_services")); ?></h3>
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
										<div class="col-4">
										</div>
										<div class="col-4">
											<p><i class="fas fa-bullseye" style="color:green"></i> <?php echo sizeof($mysql->select("select * from _queen_services where IsActive='1'")); ?></p>
										</div>
										<div class="col-4">
											<p><i class="fas fa-bullseye" style="color:grey"></i> <?php echo sizeof($mysql->select("select * from _queen_services where IsActive='0'")); ?></p>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>  
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
                                                    $d = $mysql->select("select (sum(OrderTotal)) as bal from _queen_orders where IsPaid='1' and date(OrderOn)='".date("Y-m-d")."'");
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
                                                <p class="card-category">Order Value</p>
                                                <h3 class="card-title">
                                                    <?php 
                                                    $d = $mysql->select("select (sum(OrderTotal)) as bal from _queen_orders where date(OrderOn)='".date("Y-m-d")."'");
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
                                                <p class="card-category">Expenses</p>
                                                <h3 class="card-title">
                                                    <?php 
                                                    $d = $mysql->select("select (sum(ExpenseAmount)) as bal from _queen_expenses where date(CreatedOn)='".date("Y-m-d")."'");
                                                    echo number_format(isset($d[0]['bal']) ? $d[0]['bal'] : 0,2);
                                                   ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                                <p class="card-category">Fee Value</p>
                                                <h3 class="card-title">
                                                    <?php 
                                                    $d = $mysql->select("select (sum(FeeAmount)) as bal from _queen_order_item");
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
                                                <p class="card-category">Charge Value</p>
                                                <h3 class="card-title">
                                                    <?php 
                                                    $d = $mysql->select("select (sum(Charge)) as bal from _queen_order_item");
                                                    echo number_format(isset($d[0]['bal']) ? $d[0]['bal'] : 0,2);
                                                   ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
                </div>
