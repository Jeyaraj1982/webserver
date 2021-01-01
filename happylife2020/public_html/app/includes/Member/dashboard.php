<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
	    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
		    <div>
			    <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
				<h5 class="text-white op-7 mb-2">
                    <img src="assets/img/<?php echo $_SESSION['User']['PackageIcon'];?>" style="height:48px;">
                    <?php echo $_SESSION['User']['CurrentPackageName'];?></h5>
			</div>
           
			<div class="ml-md-auto py-2 py-md-0">
			    <a href="dashboard.php?action=Shopping/Index" class="btn btn-white btn-border btn-round mr-2">Shopping</a>
				<a href="dashboard.php?action=Members/EpinNotFound" class="btn btn-secondary btn-round">Create Member</a>
			</div>
		</div>
	</div>
</div>
<?php
    $memberTree->GetNodeIDs($_SESSION['User']['MemberCode'],"L");
    $totalLeftPV = $memberTree->leftPV;
    $todayLeftPV = $memberTree->todayLeftPV;
    $memberTree->GetNodeIDs($_SESSION['User']['MemberCode'],"R");
    $totalRightPV = $memberTree->rightPV;
    $todayRightPV = $memberTree->todayRightPV;
     
?>
<div class="page-inner mt--5">
    <div class="row mt--2">
	    <div class="col-md-6">
		    <div class="card full-height">
			    <div class="card-body">
                    <div class="card-title">General Statistics</div>
					<div class="card-category">
                        Overall Members and available BVs and PVs<br>
                        <span style="color:#aaa;font-size:11px;">values are display Today/Overall</span>
                    </div>
					<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
						<div class="px-2 pb-2 pb-md-0 text-center">
							<div id="circles-1"></div>
							<h6 class="fw-bold mt-3 mb-1">Left</h6>
                            <h6>PV: <?php echo $todayLeftPV." / ".$totalLeftPV;?><span style="color:#ccc">&nbsp;|&nbsp;</span> BV: 0 / 0 <span style="color:#ccc"></span></h6>
						</div>
						<div class="px-2 pb-2 pb-md-0 text-center">
							<div id="circles-2"></div>
							<h6 class="fw-bold mt-3 mb-1">Right</h6>
                            <h6> PV: <?php echo $todayRightPV." / ".$totalRightPV;?><span style="color:#ccc">&nbsp;|&nbsp;</span> BV: 0 / 0 </h6>
						</div>
                    </div>
                    <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <h6 class="fw-bold mt-3 mb-1">Binary Eligibility: 
                            <?php                             
                                if ($_SESSION['User']['IsBinaryEligible']==1) {
                                    echo "<span style='color:green;font-weight:normal'>Eligible</span>";
                                } else {                          
                                    $binary_eligible = $memberTree->IsBinaryEligible($_SESSION['User']['MemberCode'],$left,$right);
                                   // print_r($left);echo date("Y-m-d");
                                    if ($binary_eligible) {
                                        $mysql->execute("update `_tbl_Members` set `IsBinaryEligible`='1'  where `MemberCode`='".$_SESSION['User']['MemberCode']."'");
                                        echo "<span style='color:green;font-weight:normal'>Eligible</span>";
                                    } else {
                                        echo "<span style='color:red;font-weight:normal'>Not Eligible</span><br><span style='color:#ccc;font-size:11px'>Requires one direct referal for Left and Right ";
                                    }
                                }
                            ?>
                            </h6>                                                                              
                            <h6 class="fw-bold mt-3 mb-1">Payout Eligibility:
                            <?php
                                //if ($_SESSION['User']['IsPayoutEligible']==1) {
                                   // echo "<span style='color:green;font-weight:normal'>Eligible</span>";
                               // } else {                                        
                                $payout_eligible = $memberTree->IsPayoutEligible($_SESSION['User']['MemberCode'],$left,$right);
                                //echo "l";print_r($left);
                                //echo "r";print_r($right);         
                                    if ($payout_eligible) {
                                        $mysql->execute("update `_tbl_Members` set `IsPayoutEligible`='1'  where `MemberCode`='".$_SESSION['User']['MemberCode']."'");
                                        echo "<span style='color:green;font-weight:normal'>Eligible</span>";
                                    } else {
                                         echo "<span style='color:red;font-weight:normal'>Not Eligible</span><br><span style='color:#ccc;font-size:11px'>Requires direct referal 1:2 or 2:1";
                                    }
                              // }                  
                            ?>
                            </h6>
                        </div>
                    </div>
				</div>
            </div>    
		</div>                          
		<div class="col-md-6">
		    <div class="card full-height">
			    <div class="card-body">
				    <div class="card-title">Total income & spend statistics</div>
					    <div class="row py-3">
						    <div class="col-md-4 d-flex flex-column justify-content-around">
							    <div>
								    <h6 class="fw-bold text-uppercase text-success op-8">Total Income</h6>
									<h3 class="fw-bold">&#8377;<?php echo getEarningWalletBalance($_SESSION['User']['MemberID']);?></h3>
								</div>
							</div>
							<div class="col-md-8">
											<div id="chart-container">
												<canvas id="totalIncomeChart"></canvas>
											</div>
                                            
										</div>
                                        
                                        
                                        <div class="col-md-4 d-flex flex-column justify-content-around">
                                            
                                            <div>
                                                <h6 class="fw-bold text-uppercase text-danger op-8">Total Spend</h6>
                                                <h3 class="fw-bold">&#8377;0</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                             
                                            <br>
                                            <div id="chart-container">
                                                <canvas id="totalSpentChart"></canvas>
                                            </div>
                                        </div>
                                        
                                        
                                        
									</div>
								</div>
							</div>
						</div>
					</div>
                    
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">Recent Members</div>
										<div class="card-tools">
											<!--<a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2">
												<span class="btn-label">
													<i class="fa fa-pencil"></i>
												</span>
												Export
											</a>
											<a href="#" class="btn btn-info btn-border btn-round btn-sm">
												<span class="btn-label">
													<i class="fa fa-print"></i>
												</span>
												Print
											</a>
										</div> -->
									</div>
								</div>
								<div class="card-body">
									
                                    <?php      
    
    $error = "No direct downline members found";
      $Members = $mysql->select("SELECT * FROM _tbl_Members 
                               LEFT JOIN _tbl_Settings_Packages 
                               ON _tbl_Members.CurrentPackageID=_tbl_Settings_Packages.PackageID where 
                               `_tbl_Members`.`MemberCode` in (SELECT `ChildCode` FROM  `_tblPlacements` WHERE `PlacedByCode`='".$_SESSION['User']['MemberCode']."'  ORDER BY `PlacementID` DESC) 
                                order by `_tbl_Members`.`MemberID` Desc ");
?>

<div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                     <th> </th>
                                     <th><b>Member Code</b></th>
                                     <th><b>Member Name</b></th>
                                     <th><b>Sponsor Code</b></th>
                                     <th><b>Upline Code</b></th>
                                     <th><b>Created</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (sizeof($Members)==0) { ?>
                                <tr>
                                    <td colspan="8" style="text-align:center;"><?php echo $error;?></td>
                                </tr>
                                <?php } ?>
                                <?php 
                                $i=1;
                                foreach ($Members as $Member) {
                                if ($i<=2) {
                                 ?>
                                <tr>
                                    <td><img src="assets/img/<?php echo $Member['FileName'];?>" style="height:32px;"></td>
                                    <td><span class="<?php echo ($Member['IsActive']==1) ? 'Activedot' : 'Deactivedot';?>"></span>&nbsp;&nbsp;&nbsp;<?php echo $Member['MemberCode'];?></td>
                                    <td><?php echo $Member['MemberName'];?></td>
                                    <td><?php echo $Member['SponsorCode'];?></td>
                                    <td><?php echo $Member['UplineCode'];?></td>
                                    <td><?php echo date("Y-m-d",strtotime($Member['CreatedOn']));?></td>
                                </tr>
                                <?php } }?> 
                            </tbody>
                        </table>
                        <p align="right">
                        <?php
                            if (sizeof($Members)>2) {
                                ?>
                                <a href="dashboard.php?action=Members/MyAllMembers">More Members</a>
                                <?php
                            }
                        ?>
                        </p>
                    </div>
                    
								</div>
							</div>
						</div>
						 
					</div>
                    <!--
					<div class="row row-card-no-pd">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row card-tools-still-right">
										<h4 class="card-title">Users Geolocation</h4>
										<div class="card-tools">
											<button class="btn btn-icon btn-link btn-primary btn-xs"><span class="fa fa-angle-down"></span></button>
											<button class="btn btn-icon btn-link btn-primary btn-xs btn-refresh-card"><span class="fa fa-sync-alt"></span></button>
											<button class="btn btn-icon btn-link btn-primary btn-xs"><span class="fa fa-times"></span></button>
										</div>
									</div>
									<p class="card-category">
									Map of the distribution of users around the world</p>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-6">
											<div class="table-responsive table-hover table-sales">
												<table class="table">
													<tbody>
														<tr>
															<td>
																<div class="flag">
																	<img src="assets/img/flags/id.png" alt="indonesia">
																</div>
															</td>
															<td>Indonesia</td>
															<td class="text-right">
																2.320
															</td>
															<td class="text-right">
																42.18%
															</td>
														</tr>
														<tr>
															<td>
																<div class="flag">
																	<img src="assets/img/flags/us.png" alt="united states">
																</div>
															</td>
															<td>USA</td>
															<td class="text-right">
																240
															</td>
															<td class="text-right">
																4.36%
															</td>
														</tr>
														<tr>
															<td>
																<div class="flag">
																	<img src="assets/img/flags/au.png" alt="australia">
																</div>
															</td>
															<td>Australia</td>
															<td class="text-right">
																119
															</td>
															<td class="text-right">
																2.16%
															</td>
														</tr>
														<tr>
															<td>
																<div class="flag">
																	<img src="assets/img/flags/ru.png" alt="russia">
																</div>
															</td>
															<td>Russia</td>
															<td class="text-right">
																1.081
															</td>
															<td class="text-right">
																19.65%
															</td>
														</tr>
														<tr>
															<td>
																<div class="flag">
																	<img src="assets/img/flags/cn.png" alt="china">
																</div>
															</td>
															<td>China</td>
															<td class="text-right">
																1.100
															</td>
															<td class="text-right">
																20%
															</td>
														</tr>
														<tr>
															<td>
																<div class="flag">
																	<img src="assets/img/flags/br.png" alt="brazil">
																</div>
															</td>
															<td>Brasil</td>
															<td class="text-right">
																640
															</td>
															<td class="text-right">
																11.63%
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<div class="col-md-6">
											<div class="mapcontainer">
												<div id="map-example" class="vmap"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Top Products</div>
								</div>
								<div class="card-body pb-0">
									<div class="d-flex">
										<div class="avatar">
											<img src="assets/img/logoproduct.svg" alt="..." class="avatar-img rounded-circle">
										</div>
										<div class="flex-1 pt-1 ml-2">
											<h6 class="fw-bold mb-1">CSS</h6>
											<small class="text-muted">Cascading Style Sheets</small>
										</div>
										<div class="d-flex ml-auto align-items-center">
											<h3 class="text-info fw-bold">+$17</h3>
										</div>
									</div>
									<div class="separator-dashed"></div>
									<div class="d-flex">
										<div class="avatar">
											<img src="assets/img/logoproduct.svg" alt="..." class="avatar-img rounded-circle">
										</div>
										<div class="flex-1 pt-1 ml-2">
											<h6 class="fw-bold mb-1">J.CO Donuts</h6>
											<small class="text-muted">The Best Donuts</small>
										</div>
										<div class="d-flex ml-auto align-items-center">
											<h3 class="text-info fw-bold">+$300</h3>
										</div>
									</div>
									<div class="separator-dashed"></div>
									<div class="d-flex">
										<div class="avatar">
											<img src="assets/img/logoproduct3.svg" alt="..." class="avatar-img rounded-circle">
										</div>
										<div class="flex-1 pt-1 ml-2">
											<h6 class="fw-bold mb-1">Ready Pro</h6>
											<small class="text-muted">Bootstrap 4 Admin Dashboard</small>
										</div>
										<div class="d-flex ml-auto align-items-center">
											<h3 class="text-info fw-bold">+$350</h3>
										</div>
									</div>
									<div class="separator-dashed"></div>
									<div class="pull-in">
										<canvas id="topProductsChart"></canvas>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card">
								<div class="card-body">
									<div class="card-title fw-mediumbold">Suggested People</div>
									<div class="card-list">
										<div class="item-list">
											<div class="avatar">
												<img src="assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded-circle">
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
												<img src="assets/img/chadengle.jpg" alt="..." class="avatar-img rounded-circle">
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
												<img src="assets/img/talha.jpg" alt="..." class="avatar-img rounded-circle">
											</div>
											<div class="info-user ml-3">
												<div class="username">Talha</div>
												<div class="status">Front End Designer</div>
											</div>
											<button class="btn btn-icon btn-primary btn-round btn-xs">
												<i class="fa fa-plus"></i>
											</button>
										</div>
										<div class="item-list">
											<div class="avatar">
												<img src="assets/img/mlane.jpg" alt="..." class="avatar-img rounded-circle">
											</div>
											<div class="info-user ml-3">
												<div class="username">John Doe</div>
												<div class="status">Back End Developer</div>
											</div>
											<button class="btn btn-icon btn-primary btn-round btn-xs">
												<i class="fa fa-plus"></i>
											</button>
										</div>
										<div class="item-list">
											<div class="avatar">
												<img src="assets/img/talha.jpg" alt="..." class="avatar-img rounded-circle">
											</div>
											<div class="info-user ml-3">
												<div class="username">Talha</div>
												<div class="status">Front End Designer</div>
											</div>
											<button class="btn btn-icon btn-primary btn-round btn-xs">
												<i class="fa fa-plus"></i>
											</button>
										</div>
										<div class="item-list">
											<div class="avatar">
												<img src="assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded-circle">
											</div>
											<div class="info-user ml-3">
												<div class="username">Jimmy Denis</div>
												<div class="status">Graphic Designer</div>
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
							<div class="card card-primary bg-primary-gradient">
								<div class="card-body">
									<h4 class="mt-3 b-b1 pb-2 mb-4 fw-bold">Active user right now</h4>
									<h1 class="mb-4 fw-bold">17</h1>
									<h4 class="mt-3 b-b1 pb-2 mb-5 fw-bold">Page view per minutes</h4>
									<div id="activeUsersChart"></div>
									<h4 class="mt-5 pb-3 mb-0 fw-bold">Top active pages</h4>
									<ul class="list-unstyled">
										<li class="d-flex justify-content-between pb-1 pt-1"><small>/product/readypro/index.html</small> <span>7</span></li>
										<li class="d-flex justify-content-between pb-1 pt-1"><small>/product/atlantis/demo.html</small> <span>10</span></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-header">
									<div class="card-title">Feed Activity</div>
								</div>
								<div class="card-body">
									<ol class="activity-feed">
										<li class="feed-item feed-item-secondary">
											<time class="date" datetime="9-25">Sep 25</time>
											<span class="text">Responded to need <a href="#">"Volunteer opportunity"</a></span>
										</li>
										<li class="feed-item feed-item-success">
											<time class="date" datetime="9-24">Sep 24</time>
											<span class="text">Added an interest <a href="#">"Volunteer Activities"</a></span>
										</li>
										<li class="feed-item feed-item-info">
											<time class="date" datetime="9-23">Sep 23</time>
											<span class="text">Joined the group <a href="single-group.php">"Boardsmanship Forum"</a></span>
										</li>
										<li class="feed-item feed-item-warning">
											<time class="date" datetime="9-21">Sep 21</time>
											<span class="text">Responded to need <a href="#">"In-Kind Opportunity"</a></span>
										</li>
										<li class="feed-item feed-item-danger">
											<time class="date" datetime="9-18">Sep 18</time>
											<span class="text">Created need <a href="#">"Volunteer Opportunity"</a></span>
										</li>
										<li class="feed-item">
											<time class="date" datetime="9-17">Sep 17</time>
											<span class="text">Attending the event <a href="single-event.php">"Some New Event"</a></span>
										</li>
									</ol>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">Support Tickets</div>
										<div class="card-tools">
											<ul class="nav nav-pills nav-secondary nav-pills-no-bd nav-sm" id="pills-tab" role="tablist">
												<li class="nav-item">
													<a class="nav-link" id="pills-today" data-toggle="pill" href="#pills-today" role="tab" aria-selected="true">Today</a>
												</li>
												<li class="nav-item">
													<a class="nav-link active" id="pills-week" data-toggle="pill" href="#pills-week" role="tab" aria-selected="false">Week</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" id="pills-month" data-toggle="pill" href="#pills-month" role="tab" aria-selected="false">Month</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="d-flex">
										<div class="avatar avatar-online">
											<span class="avatar-title rounded-circle border border-white bg-info">J</span>
										</div>
										<div class="flex-1 ml-3 pt-1">
											<h6 class="text-uppercase fw-bold mb-1">Joko Subianto <span class="text-warning pl-3">pending</span></h6>
											<span class="text-muted">I am facing some trouble with my viewport. When i start my</span>
										</div>
										<div class="float-right pt-1">
											<small class="text-muted">8:40 PM</small>
										</div>
									</div>
									<div class="separator-dashed"></div>
									<div class="d-flex">
										<div class="avatar avatar-offline">
											<span class="avatar-title rounded-circle border border-white bg-secondary">P</span>
										</div>
										<div class="flex-1 ml-3 pt-1">
											<h6 class="text-uppercase fw-bold mb-1">Prabowo Widodo <span class="text-success pl-3">open</span></h6>
											<span class="text-muted">I have some query regarding the license issue.</span>
										</div>
										<div class="float-right pt-1">
											<small class="text-muted">1 Day Ago</small>
										</div>
									</div>
									<div class="separator-dashed"></div>
									<div class="d-flex">
										<div class="avatar avatar-away">
											<span class="avatar-title rounded-circle border border-white bg-danger">L</span>
										</div>
										<div class="flex-1 ml-3 pt-1">
											<h6 class="text-uppercase fw-bold mb-1">Lee Chong Wei <span class="text-muted pl-3">closed</span></h6>
											<span class="text-muted">Is there any update plan for RTL version near future?</span>
										</div>
										<div class="float-right pt-1">
											<small class="text-muted">2 Days Ago</small>
										</div>
									</div>
									<div class="separator-dashed"></div>
									<div class="d-flex">
										<div class="avatar avatar-offline">
											<span class="avatar-title rounded-circle border border-white bg-secondary">P</span>
										</div>
										<div class="flex-1 ml-3 pt-1">
											<h6 class="text-uppercase fw-bold mb-1">Peter Parker <span class="text-success pl-3">open</span></h6>
											<span class="text-muted">I have some query regarding the license issue.</span>
										</div>
										<div class="float-right pt-1">
											<small class="text-muted">2 Day Ago</small>
										</div>
									</div>
									<div class="separator-dashed"></div>
									<div class="d-flex">
										<div class="avatar avatar-away">
											<span class="avatar-title rounded-circle border border-white bg-danger">L</span>
										</div>
										<div class="flex-1 ml-3 pt-1">
											<h6 class="text-uppercase fw-bold mb-1">Logan Paul <span class="text-muted pl-3">closed</span></h6>
											<span class="text-muted">Is there any update plan for RTL version near future?</span>
										</div>
										<div class="float-right pt-1">
											<small class="text-muted">2 Days Ago</small>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                    -->
				</div>

                
                