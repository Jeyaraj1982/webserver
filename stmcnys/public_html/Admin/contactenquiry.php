<?php include_once("header.php");?>
<?php include_once("LeftMenu.php");?>
<div class="main-panel">
			<div class="container">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Contact Enquiry</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Contacts</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Contacts</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header" style="text-align: right;">
								</div>
								<div class="card-body">
									<div class="table-responsive">
                                           <div class="row">
                                                <div class="col-sm-12">
                                                    <table id="basic-datatables" class="display table table-striped table-hover dataTable">
											        <thead>
												        <tr role="row">
                                                            <th>Name</th>
                                                            <th>Email Address</th>
                                                            <th>Mobile Number</th>
                                                            <th>Comments</th>
                                                            <th>Posted On</th>
                                                        </tr>
											        </thead>
											        <tbody>
                                                        <?php
                                                            $datas= $mysql->select("select * from contacts order by id desc");
                                                       
                                                            foreach($datas as $data){?>                                                        
                                                        <tr>
                                                            <td><?php echo $data['contactname'];?></td>
                                                            <td><?php echo $data['emailid'];?></td>
                                                            <td><?php echo $data['mobile'];?></td>
                                                            <td><?php echo $data['comments'];?></td>
                                                            <td><?php echo $data['postedon'];?></td>
                                                        </tr>
                                                        <?php } ?>
                                                        <?php if(sizeof($datas)==0){ ?>
                                                            <tr>
                                                                <td colspan="5" style="text-align: center;">No Datas Found</td>
                                                            </tr>
                                                        <?php } ?>
											        </tbody>
										        </table>
                                            </div>
                                        </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
<?php include_once("footer.php");?> 
<script>
/*$(document).ready(function() {
            $('#basic-datatables').DataTable({
            });
            });       */
</script>