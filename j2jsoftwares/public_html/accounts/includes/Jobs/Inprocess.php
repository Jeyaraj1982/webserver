<div class="page-inner">
    <div class="row">
	    <div class="col-md-12">
		    <div class="card">
			    <div class="card-header">
				    <h4 class="card-title">My Jobs</h4>
                    <span style="font-weight:normal;color:#888">Inprocess Jobs</span>
				</div>
				<div class="card-body">
				    <div class="table-responsive">
					    <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th style="width:150px;">Job Created</th>
                                        <th>Project Title</th>
                                        <th>Job Titles</th>
                                        <th style="text-align:right;">Value</th>
                                        <th style="text-align:right;">Paid</th>
                                        <th style="text-align:right;">Balance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $projects = $mysql->select("select * from _Customer_Jobs where IsCompleted='2' and CustomerID='".$_SESSION['USER']['CustomerID']."' order by Requested desc");
                                        foreach($projects as $p) {
                                    ?>
                                            <tr>
                                                <td style="text-align:left;"><?php echo date("M d, Y",strtotime($p['Requested']));?></td>    
                                                <td style="text-align:left;"><?php echo $p['ProjectTitle'];?></td>    
                                                <td><a href="<?php echo baseurl;?>?action=Jobs/Info&Job=<?php echo md5("jtj".$p['JobID']);?>"><?php echo $p['JobTitle'];?></a></td>
                                                <td style="text-align:right;"><?php echo $p['JobValue'];?></td>    
                                                <td style="text-align:right;"><?php echo $p['Paid'];?></td>    
                                                <td style="text-align:right;"><?php echo $p['Balance'];?></td>    
                                            </tr>
                                            <?php
                                        }
                                        if (sizeof($projects)==0) {
                                            ?>
                                            <tr>
                                                <td colspan="6" style="text-align: center;">No inprocess jobs found</td>
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