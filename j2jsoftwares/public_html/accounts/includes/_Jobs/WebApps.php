<div class="page-inner">
    <div class="row">
	    <div class="col-md-12">
		    <div class="card">
			    <div class="card-header">
				    <h4 class="card-title">My Jobs</h4>
                    <span style="font-weight:normal;color:#888">Web Applications</span>
				</div>
				<div class="card-body">
				    <div class="table-responsive">
					    <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th>Project Name</th>
                                        <th style="text-align: right;">Tasks</th>
                                        <th style="text-align: right;">Paid Tasks</th>
                                        <th style="text-align: right;">Unpaid Tasks</th>
                                        <th style="text-align: right;">Amount</th>
                                        <th style="text-align: right;">Paid</th>
                                        <th style="text-align: right;">Balance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $projects = $mysql->select("select * from _projects where CustomerID='".$_SESSION['USER']['CustomerID']."'");
                                        foreach($projects as $p) {
                                            $totalTasks = $mysql->select("select * from  _Job where JobFor='".$_SESSION['USER']['CustomerID']."' and ProjectID='".$p['ProjectID']."'");
                                            $paidTasks = $mysql->select("select * from  _Job where IsPaid='1' and JobFor='".$_SESSION['USER']['CustomerID']."' and ProjectID='".$p['ProjectID']."'");
                                            $unpaidTasks = $mysql->select("select * from  _Job where IsPaid='0' and JobFor='".$_SESSION['USER']['CustomerID']."' and ProjectID='".$p['ProjectID']."'");
                                            $Amount = $mysql->select("select sum(Amount) as Amount from  _Job where  JobFor='".$_SESSION['USER']['CustomerID']."' and ProjectID='".$p['ProjectID']."'");
                                            $PAmount = $mysql->select("select sum(PaidAmount) as Amount from  _Job where  JobFor='".$_SESSION['USER']['CustomerID']."' and ProjectID='".$p['ProjectID']."'");
                                            $BAmount = $mysql->select("select (sum(Amount)-sum(PaidAmount)) as Amount from  _Job where  JobFor='".$_SESSION['USER']['CustomerID']."' and ProjectID='".$p['ProjectID']."'");
                                            ?>
                                            <tr>
                                                <td><?php echo $p['ProjectTitle'];?></td>
                                                <td style="text-align: right"><?php echo sizeof($totalTasks);?></td>
                                                <td style="text-align: right"><?php echo sizeof($paidTasks);?></td>
                                                <td style="text-align: right"><?php echo sizeof($unpaidTasks);?></td>
                                                <td style="text-align: right"><?php echo number_format((isset($Amount[0]['Amount']) ? $Amount[0]['Amount'] : 0),2);?></td>
                                                <td style="text-align: right"><?php echo number_format((isset($PAmount[0]['Amount']) ? $PAmount[0]['Amount'] : 0),2);?></td>
                                                <td style="text-align: right"><?php echo number_format((isset($BAmount[0]['Amount']) ? $BAmount[0]['Amount'] : 0),2);?></td>
                                            </tr>
                                            <?php
                                        }
                                    ?>
                                </tbody>				
                            </table>
                        </div>
                    </div>
				</div>
			</div>
		</div>
    </div>
</div>