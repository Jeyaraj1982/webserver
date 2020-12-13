<?php
      $projects = $mysql->select("select * from _jobs where md5(concat('jtj',JobID))='".$_GET['Order']."' and CustomerID='".$_SESSION['USER']['CustomerID']."'");
?>
<div class="page-inner">
    <div class="row">
	    <div class="col-md-12">
		    <div class="card">
			    <div class="card-header">
				    <h4 class="card-title">Jobs Details</h4>
                    <span style="font-weight:normal;color:#888"><?php echo $projects[0]['JobTitle'];?></span>
				</div>
				<div class="card-body">
				    <div class="table-responsive">
					    <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th>Order Category</th>
                                        <th style="text-align:right;">Order Value</th>
                                        <th style="text-align:right;">Paid</th>
                                        <th style="text-align:right;">Balance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $domians = $mysql->select("select * from _domains where JobID='".$projects[0]['JobID']."'");
                                    foreach($domians as $domain) {
                                    ?>
                                            <tr>
                                                <td style="padding:10px 15px !important;">
                                                Domain Register<br>
                                                <span style="font-weight:normal;color:#888">
                                                    <?php echo $domain['DomainName'];?><br>
                                                    <?php echo date("M d, Y",strtotime($domain['RegisteredOn']));?> To <?php echo date("M d, Y",strtotime($domain['ExpiredOn']));?>
                                                </span>
                                                </td>
                                                <td style="text-align:right;">0.00</td>    
                                                <td style="text-align:right;">0.00</td>    
                                                <td style="text-align:right;">0.00</td>    
                                            </tr>
                                            <?php
                                        }
                                    ?>                
                                    
                                     <?php
                                     $hostings = $mysql->select("select * from _hostings left join _hosting_packages on _hostings.HostingPackageID=_hosting_packages.HostingPackageID where _hostings.JobID='".$projects[0]['JobID']."' and _hostings.CustomerID='".$_SESSION['USER']['CustomerID']."'");
                                     
                                    foreach($hostings as $hosting) {
                                    ?>
                                            <tr>
                                                <td style="padding:10px 15px !important;">
                                                Hosting<br>
                                                <span style="font-weight:normal;color:#888">
                                                <?php echo $hosting['PackageName'];?>/<?php echo $hosting['Description'];?><br>
                                                <?php echo date("M d, Y",strtotime($hosting['Registered']));?> To <?php echo date("M d, Y",strtotime($hosting['Expired']));?>
                                                </span>
                                                </td>
                                                <td style="text-align:right;">0.00</td>    
                                                <td style="text-align:right;">0.00</td>    
                                                <td style="text-align:right;">0.00</td>    
                                            </tr>
                                            <?php
                                        }            
                                    ?>
                                    
                                      <?php
                                     $webdevelopments = $mysql->select("select count(*) as cnt from _Job where JobCategoryID='1' and JobID='".$projects[0]['JobID']."' and CustomerID='".$_SESSION['USER']['CustomerID']."' group by JobCategoryID");
                                     
                                    foreach($webdevelopments as $webdevelopment) {
                                    ?>
                                            <tr>
                                                <td style="padding:10px 15px !important;">
                                                Web Development<br>
                                                <span style="font-weight:normal;color:#888">
                                                Tasks: <?php echo $webdevelopment['cnt'];?> 
                                                </span>
                                                </td>
                                                <td style="text-align:right;">0.00</td>    
                                                <td style="text-align:right;">0.00</td>    
                                                <td style="text-align:right;">0.00</td>    
                                            </tr>
                                            <?php
                                        }
                                    ?>
                                    
                                    
                                       <?php
                                     $apiservices = $mysql->select("select * from _apiservice where  JobID='".$projects[0]['JobID']."' and CustomerID='".$_SESSION['USER']['CustomerID']."'");
                                     
                                    foreach($apiservices as $apiservice) {
                                    ?>
                                            <tr>
                                                <td style="padding:10px 15px !important;">
                                                API Service<br>
                                                <span style="font-weight:normal;color:#888">
                                                <?php echo $apiservice['ServiceName'];?> 
                                                </span>
                                                </td>
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