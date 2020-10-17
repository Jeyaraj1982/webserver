<?php include_once("header.php");?>
<?php include_once("LeftMenu.php");?>
<div class="main-panel">
			<div class="container">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Admission Form</h4>
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
								<a href="#">Admission Forms</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Admission Forms</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header" style="text-align: right;">
                                    <a href="admission.php?filter=Applied&course=All" <?php if($_GET['filter']=="Applied"){ ?> Style="text-decoration: underline;font-weight: bold;"<?php } ?>>Applied</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                                    <a href="admission.php?filter=Paid&course=All" <?php if($_GET['filter']=="Paid"){ ?> Style="text-decoration: underline;font-weight: bold;"<?php } ?>>Paid</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                                    <a href="admission.php?filter=Approved&course=All" <?php if($_GET['filter']=="Approved"){ ?> Style="text-decoration: underline;font-weight: bold;"<?php } ?>>Approved</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                                    <a href="admission.php?filter=Rejected&course=All" <?php if($_GET['filter']=="Rejected"){ ?> Style="text-decoration: underline;font-weight: bold;"<?php } ?>>Rejected</a>&nbsp;&nbsp;|&nbsp;&nbsp;
								    <a href="admission.php?filter=Waiting&course=All" <?php if($_GET['filter']=="Waiting"){ ?> Style="text-decoration: underline;font-weight: bold;"<?php } ?>>Waiting</a>
								</div>
								<div class="card-body">
									<div class="table-responsive">
                                           <div class="row">
                                                <div class="col-sm-12">
                                                    <table id="basic-datatables" class="display table table-striped table-hover dataTable">
											        <thead>
												        <tr role="row">
                                                            <th>Name</th>
                                                            <th>Marks</th>
                                                            <th>Course</th>
                                                            <th></th>
                                                        </tr>
											        </thead>
											        <tbody>
                                                        <?php
                                                        if($_GET['filter']=="Applied"){
                                                            $datas= $mysql->select("select * from _tbl_admissionform where Status='0'");
                                                        }
                                                        if($_GET['filter']=="Paid"){
                                                            $datas= $mysql->select("select * from _tbl_admissionform where IsPaid='1'");
                                                        }
                                                        if($_GET['filter']=="Approved"){
                                                            $datas= $mysql->select("select * from _tbl_admissionform where Status='1'");
                                                        }
                                                        if($_GET['filter']=="Rejected"){
                                                            $datas= $mysql->select("select * from _tbl_admissionform where Status='2'");
                                                        }
                                                        if($_GET['filter']=="Waiting"){
                                                            $datas= $mysql->select("select * from _tbl_admissionform where Status='3'");
                                                        }
                                                            foreach($datas as $data){?>                                                        
                                                        <tr>
                                                            <td><?php echo $data['ApplicantName'];?></td>
                                                            <td><?php echo $data['ApplicantEmail'];?></td>
                                                            <td><?php echo $data['ApplicantMobile'];?></td>
                                                            <td><a href="viewadmission.php?id=<?php echo $data['AdmissionID'];?>">View</a></td>
                                                        </tr>
                                                        <?php } ?>
                                                        <?php if(sizeof($datas)==0){ ?>
                                                            <tr>
                                                                <td colspan="4" style="text-align: center;">No Datas Found</td>
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