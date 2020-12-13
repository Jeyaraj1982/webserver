<div class="page-inner">
    <div class="row">
	    <div class="col-md-12">
		    <div class="card">
			    <div class="card-header">
				    <h4 class="card-title">My Hostings</h4>
                    <span style="font-weight:normal;color:#888">All packages</span>
				</div>
				<div class="card-body">
				    <div class="table-responsive">
					    <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th>Domain Name</th>
                                        <th style="text-align: left;">Hosting Package</th>
                                        <th style="text-align: right;">Registered</th>
                                        <th style="text-align: right;">Expired</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $projects = $mysql->select("select * from _hostings left join _hosting_packages on _hostings.HostingPackageID=_hosting_packages.HostingPackageID where _hostings.CustomerID='".$_SESSION['USER']['CustomerID']."'");
                                        foreach($projects as $p) {
                                             ?>
                                            <tr>
                                                <td><?php echo $p['HostingDomain'];?></td>
                                                <td>
                                                    <?php echo $p['PackageName'];?><br>
                                                    <span style="color:#999"><?php echo $p['Description'];?></span>
                                                </td>
                                                 <td style="text-align: right"><?php echo date("M d, Y",strtotime($p['Registered']));?></td>
                                                 <td style="text-align: right"><?php echo date("M d, Y",strtotime($p['Expired']));?></td>
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