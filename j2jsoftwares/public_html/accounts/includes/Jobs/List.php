<div class="page-inner">
    <div class="row">
	    <div class="col-md-12">
		    <div class="card">
			    <div class="card-header">
				    <h4 class="card-title">My Jobs</h4>
                    <span style="font-weight:normal;color:#888">All Jobs</span>
				</div>
				<div class="card-body">
				    <div class="table-responsive">
					    <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th>Job Titles</th>
                                        <th  style="text-align:right;">Order Value</th>
                                        <th style="text-align:right;">Paid</th>
                                        <th style="text-align:right;">Balance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $projects = $mysql->select("select * from _jobs where CustomerID='".$_SESSION['USER']['CustomerID']."'");
                                        foreach($projects as $p) {
                                    ?>
                                            <tr>
                                                <td><a href="<?php echo baseurl;?>?action=Jobs/Info&Order=<?php echo md5("jtj".$p['JobID']);?>"><?php echo $p['JobTitle'];?></a></td>
                                                <td style="text-align:right;">0.00</td>    
                                                <td style="text-align:right;">0.00</td>    
                                                <td style="text-align:right;">0.00</td>    
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