<div class="page-inner">
    <div class="row">
	    <div class="col-md-12">
		    <div class="card">
			    <div class="card-header">
				    <h4 class="card-title">My Domains</h4>
                    <span style="font-weight:normal;color:#888">All domains</span>
				</div>
				<div class="card-body">
				    <div class="table-responsive">
					    <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th>Domain Name</th>
                                        <th style="text-align: right;">Registered</th>
                                        <th style="text-align: right;">Expired</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $projects = $mysql->select("select * from _domains where CustomerID='".$_SESSION['USER']['CustomerID']."'");
                                        foreach($projects as $p) {
                                    ?>
                                            <tr>
                                                <td><?php echo $p['DomainName'];?></td>
                                                <td style="text-align: right"><?php echo date("M d, Y",strtotime($p['RegisteredOn']));?></td>
                                                <td style="text-align: right"><?php echo date("M d, Y",strtotime($p['ExpiredOn']));?></td>
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