<?php
$data= $mysql->Select("select * from _queen_agent where MD5(AgentCode)='".$_GET['id']."'");
?>

<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Agent Details</div>
                        </div>
                            <div class="card-body">
                               <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Agent Code</label>
                                            <div class="col-sm-9"><?php echo $data[0]['AgentCode'];?></div> 
                                        </div>
										<div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Agent Name</label>
                                            <div class="col-sm-9"><?php echo $data[0]['AgentName'];?></div> 
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Sur Name</label>
                                            <div class="col-sm-9"><?php echo $data[0]['SurName'];?></div> 
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Mobile Number</label>
                                            <div class="col-sm-9"><?php echo $data[0]['MobileNumber'];?></div> 
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Alternative Mobile No</label>
                                            <div class="col-sm-9"><?php echo $data[0]['AlternativeMobileNumber'];?></div> 
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Description</label>
                                            <div class="col-sm-9"><?php echo $data[0]['Description'];?></div> 
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Is Active</label>
                                            <div class="col-sm-9"><?php if($data[0]['IsActive']=="1") { echo "Active"; } else { echo "Blocked";}?></div> 
                                       </div>
                                       <div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Created On</label>
                                            <div class="col-sm-9"><?php echo date("d M Y, H:i", strtotime($data[0]['CreatedOn']));?></div> 
                                        </div>  
                                    </div>
                               </div> 
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12"> 
                                        <a href="dashboard.php?action=Agent/list&status=All" class="btn btn-warning btn-border">Back</a>
                                    </div>                                        
                                </div>
                            </div>
                    </div>
                </div>
            </div>
			<div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card-title">
                                        Transactions
                                    <br>
                                    <span style="font-size: 15px"><?php echo $title;?></span>  </div>
                                </div>
                            </div>
                        </div>                                       
                        <div class="card-body">                                                                                                                                             
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align:Left">Txn Date</th>
                                                <th scope="col" style="text-align:Left">Particular</th>
                                                <th scope="col" style="text-align:right">Service</th>
                                                <th scope="col" style="text-align:right">AppMame</th>
                                                <th scope="col" style="text-align:right">Charge</th>
                                                <th scope="col" style="text-align:right">Fee</th>
                                                <th scope="col" style="text-align:right">Commission</th>
                                                <th scope="col" style="text-align:right">Credits</th>
												<th scope="col" style="text-align:right">Debits</th>
												<th scope="col" style="text-align:right">Available Balance</th>
											<!--	<th scope="col">Added On</th>
												<th scope="col">Added By</th>     -->
												<th></th>
                                            </tr>                            
                                        </thead>
                                        <tbody>
                                                                                   
                                        <?php 
											//$transactions = $mysql->select("select * from _queen_wallet where md5(AgentID)='".$_GET['id']."'");
                                            
                                            $transactions= $mysql->Select("select * from _tbl_transactions where MD5(AgentID)='".$_GET['id']."'");
                                            
											foreach($transactions as $transaction){ 
											//$staff = $mysql->select("select * from _queen_staffs where StaffID='".$transaction['StaffID']."'");
										?>
											<tr>
                                                <td style="text-align:left"><?php echo $transaction['TxnDate'];?></td>
                                                <td style="text-align:left"><?php echo $transaction['Particulars'];?></td>
                                                <td style="text-align:left"><?php echo $transaction['ServiceName'];?></td>
                                                <td style="text-align:left"><?php echo $transaction['ApplicantName'];?></td>
                                                <td style="text-align:right"><?php echo number_format($transaction['Charge'],2);?></td>
                                                <td style="text-align:right"><?php echo number_format($transaction['Fee'],2);?></td>
                                                <td style="text-align:right"><?php echo number_format($transaction['Commission'],2);?></td>
                                                <td style="text-align:right"><?php echo number_format($transaction['Credits'],2);?></td>
                                                <td style="text-align:right"><?php echo number_format($transaction['Debits'],2);?></td>
                                                <td style="text-align:right"><?php echo number_format($transaction['AvailableBalance'],2);?></td>
                                              <!--    <td><?php echo date("M d,Y H:i", strtotime($transaction['AddOn']));?></td>
                                              <td><?php echo $staff[0]['StaffName'];?></td>-->
                                            </tr> 
                                        <?php } if(sizeof($transactions)=="0"){ ?>
                                            <tr>
												<td style="text-align: center;" colspan="5">No Transactions found</td>
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
