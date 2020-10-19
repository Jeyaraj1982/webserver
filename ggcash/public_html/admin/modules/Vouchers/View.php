<?php
    $data = $mysqldb->select("select * from _VoucherRegistration where IsActivated='0' and md5(concat('JJ',CouponRegID))='".$_GET['code']."'");
    
    if (isset($_POST['ReGenerate'])) {
        $xdata = $mysqldb->select("select * from _VoucherRegistration where  md5(concat('JJ',CouponRegID))='".$_GET['code']."'");
        generateCoupon($xdata[0]['CouponRegID']);
    }

    if (isset($_POST['approveBtn'])) {
        if (sizeof($data)==1) {
            $mysqldb->execute("update _VoucherRegistration set IsActivated='1', VoucherKey='".md5($data[0]['MobileNumber'].$data[0]['CouponRegID'].time())."', CouponNumber=concat(MobileNumber,".str_pad($data[0]['CouponRegID'],6,"0",STR_PAD_LEFT)."), ActivatedOn='".date("Y-m-d H:i:s")."' where md5(concat('JJ',CouponRegID))='".$_GET['code']."'");
            generateCoupon($data[0]['CouponRegID']);
            MobileSMS::sendSMS($data[0]['MobileNumber'],"Dear ".$_POST['ApplicantName'].", Your VRNumber ".$data[0]['MobileNumber']."-".$data[0]['CouponRegID']." has been approved. Thanks GGCash.in","9000000".$id);
            echo "<script>setTimeout(function(){\$('#myModalApproved').modal('show');},2000)</script>";
        } else { 
            echo "<script>setTimeout(function(){\$('#myModalAlreadyProcessed').modal('show');},2000)</script>";
        }
    }

    if (isset($_POST['RejectBtn'])) {
        if (sizeof($data)==1) {
            $mysqldb->execute("update _VoucherRegistration set IsActivated='2', ActivatedOn='".date("Y-m-d H:i:s")."' where md5(concat('JJ',CouponRegID))='".$_GET['code']."'");
            MobileSMS::sendSMS($data[0]['MobileNumber'],"Dear ".$_POST['ApplicantName'].", Your VRNumber ".$_POST['MobileNumber']."-".$id." has been rejected. Thanks GGCash.in","9000000".$id);
        ?>
        <script>setTimeout(function(){$('#myModalRejected').modal("show");},2000)</script>
        <?php } else { ?>
        <script>setTimeout(function(){$('#myModalAlreadyProcessed').modal("show");},2000)</script>
       <?php
    }
}
$data = $mysqldb->select("select * from _VoucherRegistration where md5(concat('JJ',CouponRegID))='".$_GET['code']."'");
?>
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-6 align-self-center">
                <h4 class="page-title">Voucher Information</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Vouchers</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
    <?php
        if (isset($_POST['ReGenerate'])) {
    ?>
        <div class="row" style="margin-bottom:10px;">
              <div class="col-lg-12 col-xlg-12 col-md-12">
                   <div class="success alert-success alert-dismissible fade show" role="alert" style="padding:20px;">
  <strong>Regenerated!</strong> &nbsp;Your coupon has regenerated.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
              </div>
        </div>
        <?php } ?>
        <div class="row">
            <div class="col-lg-7 col-xlg-7 col-md-7">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">     
                                <label for="fullName">NAME OF THE APPLICANT (Mr/Mrs/Others)</label>
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['ApplicantName'];?>">
                            </div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                            <div class="col-sm-3">
                                <label for="fullName">Gender</label>
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['Gender'];?>">
                            </div>
                            <div class="col-sm-6">
                                <label>Date of Birth</label><br>                       
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['DateOfBirth'];?>">
                            </div>
                            <div class="col-sm-3">
                                <label for="MaritalStatus">Marital Status</label>
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['MaritalStatus'];?>">
                            </div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                            <div class="col-sm-12">
                                <label for="emailAddress">Address Line 1</label>
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['AddressLine1'];?>">
                            </div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                            <div class="col-sm-12">
                                <label for="emailAddress">Address Line 2</label>
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['AddressLine2'];?>">
                            </div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                            <div class="col-sm-6">
                                <label for="Town">Town</label>
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['Town'];?>">
                            </div>
                            <div class="col-sm-6">
                                <label for="PinCode">PinCode</label>
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['PinCode'];?>">
                            </div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                            <div class="col-sm-6">
                                <label for="District">District</label>
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['DistrictName'];?>">
                            </div>           
                            <div class="col-sm-6">
                                <label for="State">State</label>
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['StateName'];?>">
                            </div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                            <div class="col-sm-6" style="clear: both;">
                                <label for="fullName">Mobile Number</label>
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['MobileNumber'];?>">
                            </div>
                            <div class="col-sm-6">
                                <label for="emailAddress">Email Address</label>                            
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['EmailAddress'];?>">
                            </div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                            <div class="col-sm-12">
                                <label for="AadhaarNumber">Aadhaar no</label>
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['AadhaarNumber'];?>">
                            </div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                            <div class="col-sm-12">
                                <label for="NameOfTheNominee">Amount</label>
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['Amount'];?>">
                            </div>
                        </div>                                   
                        <div class="row" style="margin-top:10px;">
                            <div class="col-sm-12">
                                <label for="RelationshipWithTheApplicant">Remarks</label> 
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['Remarks'];?>">
                            </div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                            <div class="col-sm-12">
                                <label for="ReferralsCode">Referral's Code</label> 
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['ReferredByCode'];?>">
                            </div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                            <div class="col-sm-12">
                                <label for="ReferralsName">Referral's Name</label>          
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['ReferredByName'];?>">           
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-xlg-5 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12"  style="margin-top:10px;">     
                                <label for="fullName">Requested On</label>
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['RequestedOn'];?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12"  style="margin-top:10px;">     
                                <label for="fullName">Status</label>
                                <?php
                                    if ($data[0]['IsActivated']=='0') {
                                        $status= "Requested";
                                    }
                                    
                                    if ($data[0]['IsActivated']=='1') {
                                        $status= "Activated";
                                    }
                                    
                                    if ($data[0]['IsActivated']=='2') {
                                        $status= "Rejected";
                                    }
                                ?>
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $status;?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12"  style="margin-top:10px;">     
                                <label for="fullName">Status On</label>
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['ActivatedOn'];?>">
                            </div>
                        </div> 
                        <?php if ($data[0]['IsActivated']=="1") { ?>
                        <div class="row">
                            <div class="col-sm-12"  style="margin-top:10px;">     
                                <label for="fullName">QR Code</label>
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['VoucherKey'];?>">
                            </div>
                        </div>
                        
                         <div class="row">
                            <div class="col-sm-12"  style="margin-top:10px;">     
                                <label for="fullName">Coupon Number</label>
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['CouponNumber'];?>">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12"  style="margin-top:10px;">     
                                <label for="fullName">Barcode Number</label>
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['CouponNumber'];?>">
                            </div>
                        </div>
                         
                         <div class="row">
                            <div class="col-sm-12"  style="margin-top:10px;">     
                            <label for="fullName">Coupon</label>  
                         <img src="assets/cards/<?php echo $data[0]['FileName'];?>" style="width: 100%;">
                         <br>  <br>
                         <form action="" method="post">
                          <input type="submit" value="Re-Generate" name="ReGenerate" class="btn btn-primary"> 
                          <a href="download.php?file=cards/<?php echo $data[0]['FileName'];?>" target="_blank" class="btn btn-secondary">Download</a>
                          <input type="button" disabled="disabled" value="Send To Whatsapp">&nbsp;
                                    <input type="button" disabled="disabled" value="Send To Email">&nbsp;
                          </form>
                            </div>
                        </div>
                          
                        <?php } ?>
                        <?php if ($data[0]['IsActivated']=="0") { ?>
                        <div class="row">
                            <div class="col-sm-12" style="margin-top:10px;">
                                <label for="fullName">&nbsp;</label>
                                <a href="dashboard.php?action=Vouchers/Edit&code=<?php echo md5("JJ".$data[0]['CouponRegID']);?>">Edit</a> 
                                <form action="" method="post">
                                    <input type="submit" value="Approve" name="approveBtn" class="btn btn-primary">
                                    <input type="submit" value="Reject" name="RejectBtn" class="btn btn-danger">
                                    
                                </form>
                                 
                            </div>
                        </div>
                         <?php } ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    


<!-- The Modal -->
<div class="modal" id="myModalApproved">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="border:none">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" style="border:none;text-align:center;padding:20px;">
      <img src="assets/tick.png"><br><br>
        Application Approved successfully.
      </div>

      <!-- Modal footer -->
      <div class="modal-footer"  style="border:none">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal" id="myModalRejected">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="border:none">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" style="border:none;text-align:center;padding:20px;">
      <img src="assets/tick.png"><br><br>
        Application <span style="color:red">Rejected</span> successfully.
      </div>

      <!-- Modal footer -->
      <div class="modal-footer"  style="border:none">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal" id="myModalAlreadyProcessed">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="border:none">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" style="border:none;text-align:center;padding:20px;">
      <img src="assets/info.png"><br><br>
        Failed, Application already processed.
      </div>

      <!-- Modal footer -->
      <div class="modal-footer"  style="border:none">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
 