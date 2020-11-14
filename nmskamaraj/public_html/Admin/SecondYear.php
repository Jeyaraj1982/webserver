<?php include_once("header.php");?>
<?php include_once("LeftMenu.php");?>
<div class="main-panel">
			<div class="container">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Second Year</h4>
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
								<a href="#">Application Forms</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Second Year</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header" style="text-align: right;">
                                    <a href="SecondYear.php?filter=Applied&course=All" <?php if($_GET['filter']=="Applied"){ ?> Style="text-decoration: underline;font-weight: bold;"<?php } ?>>Applied</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                                    <a href="SecondYear.php?filter=Paid&course=All" <?php if($_GET['filter']=="Paid"){ ?> Style="text-decoration: underline;font-weight: bold;"<?php } ?>>Paid</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                                    <a href="SecondYear.php?filter=UnPaid&course=All" <?php if($_GET['filter']=="UnPaid"){ ?> Style="text-decoration: underline;font-weight: bold;"<?php } ?>>Un-Paid</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                                    <a href="SecondYear.php?filter=Approved&course=All" <?php if($_GET['filter']=="Approved"){ ?> Style="text-decoration: underline;font-weight: bold;"<?php } ?>>Approved</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                                    <a href="SecondYear.php?filter=Rejected&course=All" <?php if($_GET['filter']=="Rejected"){ ?> Style="text-decoration: underline;font-weight: bold;"<?php } ?>>Rejected</a>&nbsp;&nbsp;|&nbsp;&nbsp;
								    <a href="SecondYear.php?filter=Waiting&course=All" <?php if($_GET['filter']=="Waiting"){ ?> Style="text-decoration: underline;font-weight: bold;"<?php } ?>>Waiting</a>
								</div>
								<div class="card-body">
									<div class="table-responsive">
                                           <div class="row">
                                                <div class="col-sm-12">
                                                    <table id="basic-datatables" class="display table table-striped table-hover dataTable">
											        <thead>
												        <tr role="row">
                                                            <th>Applied</th>
                                                            <th>Name</th>
                                                            <th>Marks</th>
                                                            <th>Course</th>
                                                            <th></th>
                                                        </tr>
											        </thead>
											        <tbody>
                                                            <?php 
                                                            if($_GET['filter']=="Applied" && $_GET['course']=="All"){
                                                                $datas = $mysql->select("select * from admission_secondyear where Status='1' order by AdmissionID Desc");    
                                                            }
                                                            if($_GET['filter']=="Paid" && $_GET['course']=="All"){
                                                                $datas = $mysql->select("select * from admission_secondyear where IsPaid='1' order by AdmissionID Desc");    
                                                            }
                                                            if($_GET['filter']=="UnPaid" && $_GET['course']=="All"){
                                                                $datas = $mysql->select("select * from admission_secondyear where IsPaid<>'1' order by AdmissionID Desc");    
                                                            }
                                                            if($_GET['filter']=="Approved" && $_GET['course']=="All"){
                                                                $datas = $mysql->select("select * from admission_secondyear where Status='2' order by AdmissionID Desc");    
                                                            }
                                                            if($_GET['filter']=="Rejected" && $_GET['course']=="All"){
                                                                $datas = $mysql->select("select * from admission_secondyear where Status='3' order by AdmissionID Desc");    
                                                            }
                                                            if($_GET['filter']=="Waiting" && $_GET['course']=="All"){
                                                                $datas = $mysql->select("select * from admission_secondyear where Status='4' order by AdmissionID Desc");    
                                                            }
                                                            if($_GET['filter']=="Applied" && $_GET['course']=="1"){
                                                                $datas = $mysql->select("select * from admission_secondyear where Status='1' and FirstCourseID='1' order by AdmissionID Desc");    
                                                            }
                                                            if($_GET['filter']=="Applied" && $_GET['course']=="2"){
                                                                $datas = $mysql->select("select * from admission_secondyear where Status='1' and FirstCourseID='2' order by AdmissionID Desc");    
                                                            }
                                                            if($_GET['filter']=="Applied" && $_GET['course']=="3"){
                                                                $datas = $mysql->select("select * from admission_secondyear where Status='1' and FirstCourseID='3' order by AdmissionID Desc");    
                                                            }
                                                            if($_GET['filter']=="Applied" && $_GET['course']=="4"){
                                                                $datas = $mysql->select("select * from admission_secondyear where Status='1' and FirstCourseID='4' order by AdmissionID Desc");    
                                                            }
                                                            if($_GET['filter']=="Applied" && $_GET['course']=="5"){
                                                                $datas = $mysql->select("select * from admission_secondyear where Status='1' and FirstCourseID='5' order by AdmissionID Desc");    
                                                            }
                                                            if($_GET['filter']=="Applied" && $_GET['course']=="6"){
                                                                $datas = $mysql->select("select * from admission_secondyear where Status='1' and FirstCourseID='6' order by AdmissionID Desc");    
                                                            }
                                                            if($_GET['filter']=="Paid" && $_GET['course']=="1"){
                                                                $datas = $mysql->select("select * from admission_secondyear where IsPaid='1' and FirstCourseID='1' order by AdmissionID Desc");    
                                                            }
                                                            if($_GET['filter']=="Paid" && $_GET['course']=="2"){
                                                                $datas = $mysql->select("select * from admission_secondyear where IsPaid='1' and FirstCourseID='2' order by AdmissionID Desc");    
                                                            }
                                                            if($_GET['filter']=="Paid" && $_GET['course']=="3"){
                                                                $datas = $mysql->select("select * from admission_secondyear where IsPaid='1' and FirstCourseID='3' order by AdmissionID Desc");    
                                                            }
                                                            if($_GET['filter']=="Paid" && $_GET['course']=="4"){
                                                                $datas = $mysql->select("select * from admission_secondyear where IsPaid='1' and FirstCourseID='4' order by AdmissionID Desc");    
                                                            }
                                                            if($_GET['filter']=="Paid" && $_GET['course']=="5"){
                                                                $datas = $mysql->select("select * from admission_secondyear where IsPaid='1' and FirstCourseID='5' order by AdmissionID Desc");    
                                                            }
                                                            if($_GET['filter']=="Paid" && $_GET['course']=="6"){
                                                                $datas = $mysql->select("select * from admission_secondyear where IsPaid='1' and FirstCourseID='6' order by AdmissionID Desc");    
                                                            }
                                                            if($_GET['filter']=="Approved" && $_GET['course']=="1"){
                                                                $datas = $mysql->select("select * from admission_secondyear where Status='2' and FirstCourseID='1' order by AdmissionID Desc");    
                                                            }
                                                            if($_GET['filter']=="Approved" && $_GET['course']=="2"){
                                                                $datas = $mysql->select("select * from admission_secondyear where Status='2' and FirstCourseID='2' order by AdmissionID Desc");    
                                                            }
                                                            if($_GET['filter']=="Approved" && $_GET['course']=="3"){
                                                                $datas = $mysql->select("select * from admission_secondyear where Status='2' and FirstCourseID='3' order by AdmissionID Desc");    
                                                            }
                                                            if($_GET['filter']=="Approved" && $_GET['course']=="4"){
                                                                $datas = $mysql->select("select * from admission_secondyear where Status='2' and FirstCourseID='4' order by AdmissionID Desc");    
                                                            }
                                                            if($_GET['filter']=="Approved" && $_GET['course']=="5"){
                                                                $datas = $mysql->select("select * from admission_secondyear where Status='2' and FirstCourseID='5' order by AdmissionID Desc");    
                                                            }
                                                            if($_GET['filter']=="Approved" && $_GET['course']=="6"){
                                                                $datas = $mysql->select("select * from admission_secondyear where Status='2' and FirstCourseID='6' order by AdmissionID Desc");    
                                                            }
                                                            if($_GET['filter']=="Rejected" && $_GET['course']=="1"){
                                                                $datas = $mysql->select("select * from admission_secondyear where Status='3' and FirstCourseID='1' order by AdmissionID Desc");    
                                                            }
                                                            if($_GET['filter']=="Rejected" && $_GET['course']=="2"){
                                                                $datas = $mysql->select("select * from admission_secondyear where Status='3' and FirstCourseID='2' order by AdmissionID Desc");    
                                                            }
                                                            if($_GET['filter']=="Rejected" && $_GET['course']=="3"){
                                                                $datas = $mysql->select("select * from admission_secondyear where Status='3' and FirstCourseID='3' order by AdmissionID Desc");    
                                                            }
                                                            if($_GET['filter']=="Rejected" && $_GET['course']=="4"){
                                                                $datas = $mysql->select("select * from admission_secondyear where Status='3' and FirstCourseID='4' order by AdmissionID Desc");    
                                                            }
                                                            if($_GET['filter']=="Rejected" && $_GET['course']=="5"){
                                                                $datas = $mysql->select("select * from admission_secondyear where Status='3' and FirstCourseID='5' order by AdmissionID Desc");    
                                                            }
                                                            if($_GET['filter']=="Rejected" && $_GET['course']=="6"){
                                                                $datas = $mysql->select("select * from admission_secondyear where Status='3' and FirstCourseID='6' order by AdmissionID Desc");    
                                                            }
                                                            if($_GET['filter']=="Waiting" && $_GET['course']=="1"){
                                                                $datas = $mysql->select("select * from admission_secondyear where Status='4' and FirstCourseID='1' order by AdmissionID Desc");    
                                                            }
                                                            if($_GET['filter']=="Waiting" && $_GET['course']=="2"){
                                                                $datas = $mysql->select("select * from admission_secondyear where Status='4' and FirstCourseID='2' order by AdmissionID Desc");    
                                                            }
                                                            if($_GET['filter']=="Waiting" && $_GET['course']=="3"){
                                                                $datas = $mysql->select("select * from admission_secondyear where Status='4' and FirstCourseID='3' order by AdmissionID Desc");    
                                                            }if($_GET['filter']=="Waiting" && $_GET['course']=="4"){
                                                                $datas = $mysql->select("select * from admission_secondyear where Status='4' and FirstCourseID='4' order by AdmissionID Desc");    
                                                            }if($_GET['filter']=="Waiting" && $_GET['course']=="5"){
                                                                $datas = $mysql->select("select * from admission_secondyear where Status='4' and FirstCourseID='5' order by AdmissionID Desc");    
                                                            }if($_GET['filter']=="Waiting" && $_GET['course']=="6"){
                                                                $datas = $mysql->select("select * from admission_secondyear where Status='4' and FirstCourseID='6' order by AdmissionID Desc");    
                                                            }                                                                          
                                                            
                                                            foreach($datas as $data){?> 
                                                        <tr>
                                                            <td><?php echo $data['CreatedOn'];?></td>
                                                            <td><?php echo $data['CandidiateName'];?></td>
                                                            <td><?php echo $data['PreviousTotalMarks'];?></td>
                                                            <td><?php echo $data['FirstCourse'];?></td>
                                                            
                                                             <td><?php if ($data['IsPaid']==1) {
                                                                $paidamount = $mysql->select("select * from _tblPayments where TblName='admission_secondyear' and FormID='".$data['AdmissionID']."'");
                                                               echo "Rs.".$paidamount[0]['TxnAmount'] ;
                                                                
                                                            }?></td>
                                                             <td><?php if ($data['IsPaid']==1) {
                                                                echo "Paid";
                                                                
                                                            }?></td>
                                                            <td><a href="editsecondyear.php?id=<?php echo md5($data['AdmissionID']);?>">Edit</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="viewsecondyear.php?id=<?php echo $data['AdmissionID'];?>">View</a></td>
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
            }); */
</script>