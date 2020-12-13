<style>
.bx:hover{border:2px solid #6861ce}
</style>
<div class="page-inner">
					<div class="row">                        
						<div class="col-6 col-sm-4 col-lg-2" style="cursor: pointer;" onclick="location.href='https://accounts.j2jsoftwaresolutions.com/?action=Jobs/Open'">
							<div class="card bx">
								<div class="card-body p-3 text-center">
									<div class="text-right text-success">
										 &nbsp;
									</div>
									<div class="h1 m-0">
                                    <?php
                                             $projects = $mysql->select("select * from _Customer_Jobs where IsCompleted='0' and CustomerID='".$_SESSION['USER']['CustomerID']."' order by Requested desc");
                                             echo sizeof($projects);
                                        ?>
                                    </div>
									<div class="text-muted mb-3">New Jobs</div>
								</div>
							</div>
						</div>
						<div class="col-6 col-sm-4 col-lg-2" style="cursor: pointer;"  onclick="location.href='https://accounts.j2jsoftwaresolutions.com/?action=Jobs/Inprocess'">
							<div class="card bx">
								<div class="card-body p-3 text-center">
									<div class="text-right text-danger">
                                          &nbsp;
										 
									</div>
									<div class="h1 m-0">
                                     <?php
                                             $projects = $mysql->select("select * from _Customer_Jobs where IsCompleted='2' and CustomerID='".$_SESSION['USER']['CustomerID']."' order by Requested desc");
                                             echo sizeof($projects);
                                        ?>
                                    </div>
									<div class="text-muted mb-3">Inprocess Jobs</div>
								</div>
							</div>
						</div>
						<div class="col-6 col-sm-4 col-lg-2" style="cursor: pointer;"  onclick="location.href='https://accounts.j2jsoftwaresolutions.com/?action=Jobs/Completed'">
							<div class="card bx">
								<div class="card-body p-3 text-center">
									<div class="text-right text-success">  &nbsp;
									</div>
									<div class="h1 m-0">
                                    <?php
                                             $projects = $mysql->select("select * from _Customer_Jobs where IsCompleted='1' and CustomerID='".$_SESSION['USER']['CustomerID']."' order by Requested desc");
                                             echo sizeof($projects);
                                        ?>
                                    </div>
									<div class="text-muted mb-3">Completed Jobs</div>
								</div>
							</div>
						</div>
						   
					</div>
					 
					 <div class="row">                        
                        <div class="col-6 col-sm-4 col-lg-3" style="cursor: pointer;" onclick="location.href='https://accounts.j2jsoftwaresolutions.com/?action=Wallet/Transactions'">
                            <div class="card bx">
                                <div class="card-body p-3 text-center">
                                    <div class="text-right text-success">
                                         &nbsp;
                                    </div>
                                    <div class="h1 m-0">
                                    <?php
                                             $bal = $mysql->select("select (sum(Credits)-sum(Debits)) as bal from _Customer_Wallets where  CustomerID='".$_SESSION['USER']['CustomerID']."' ");
                                             
                                             echo sizeof($bal)>0 ? number_format($bal[0]['bal'],2) : "0.00";
                                        ?>
                                    </div>
                                    <div class="text-muted mb-3">Wallet Balance</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-lg-3" style="cursor: pointer;"  onclick="location.href='https://accounts.j2jsoftwaresolutions.com/?action=Job/Unpaid'">
                            <div class="card bx">
                                <div class="card-body p-3 text-center">
                                    <div class="text-right text-danger">
                                          &nbsp;
                                         
                                    </div>
                                    <div class="h1 m-0">
                                     <?php
                                             $bal = $mysql->select("select  sum(JobValue) as bal from _Customer_Jobs where Paid='0' and CustomerID='".$_SESSION['USER']['CustomerID']."'  ");
                                              echo sizeof($bal)>0 ? number_format($bal[0]['bal'],2) : "0.00";
                                        ?>
                                    </div>
                                    <div class="text-muted mb-3">Payable Amount</div>
                                </div>
                            </div>
                        </div>
 
                           
                    </div>
					 
					 
				</div>