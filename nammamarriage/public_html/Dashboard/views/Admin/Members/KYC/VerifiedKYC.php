<form method="post" action="" onsubmit="">      
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">KYC Verification</h4>
                <div class="form-group row">
                        <div class="col-sm-6">
                        <h4 class="card-title">Verified KYC</h4>
                        </div>
                        <div class="col-sm-6" style="text-align:right;padding-top:5px;color:skyblue;">
                            <a href="KYCVerification"><small>All</small></a>&nbsp;|&nbsp;
                            <a href="RequestedKYC"><small>Requested</small></a>&nbsp;|&nbsp;
                            <a href="VerifiedKYC"><small style="font-weight:bold;text-decoration:underline">Verified</small></a>&nbsp;|&nbsp;
                            <a href="RejectedKYC"><small>Rejected</small></a>
                        </div>
                    </div>
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped">
                      <thead>  
                        <tr> 
                        <th>Member Code</th>
                        <th>Document Type</th>
                        <th>File Type</th>
                        <th>Attached On</th>
						<th>Status</th>
                        <th></th>
                        </tr>  
                    </thead>
                     <tbody>  
                        <?php 
                         $response = $webservice->getData("Admin","ViewMemberKYCDoc",array("Request"=>"Verified"));                         
                         if (sizeof($response['data'])>0) {                                                                 
                         ?>
                       <?php foreach($response['data'] as $KYC) { ?>
                                <tr>
                                <td><?php echo $KYC['MemberCode'];?></td>
                                <td><?php echo $KYC['DocumentType'];?></td>
                                <td><?php echo $KYC['FileType'];?></td>
                                <td><?php echo putDateTime($KYC['SubmittedOn']);?></td>
								<td>
									<?php if($KYC['IsVerified']==0 && $KYC['IsRejected']==0) {
										echo "Pending";
									} if($KYC['IsVerified']==1 && $KYC['IsRejected']==0) { 
										echo "Approved";
									} if($KYC['IsVerified']==0 && $KYC['IsRejected']==1) {
										echo "Rejected";
									} ?></td>
                                <td style="text-align:right"><a href="<?php echo GetUrl("Members/KYC/ViewKyc/".$KYC['MemberID'].".htm"); ?>"><span>View</span></a></td>
                                </tr>
                        <?php } } else {?>            
                        
                        <?php } ?>                                                                                          
                      </tbody>                        
                     </table>
                  </div>                                                   
                </div>
              </div>
            </div>
        </form>   
 <script>
$(document).ready(function(){
    $('#myTable').dataTable();
    setTimeout("DataTableStyleUpdate()",500);
});
</script>