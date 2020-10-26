
<?php 
  $sql= $mysql->select("select * from `_tbl_payments` where  `PaymentID`='".$_GET['Code']."'");
  $member= $mysql->select("select * from `_tbl_Members` where `MemberCode`='".$sql[0]['MemberCode']."'");
?>
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Member Details</div>
                                </div>
                                <div class="card-body"> 
                                    <div class="form-group form-show-validation row" style="padding:0px">
                                        <label for="AccountName" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left"  style="font-weight:normal">Member Name  </label>
                                        <div class="col-lg-4 col-md-9 col-sm-8">:&nbsp;<?php echo $member[0]['MemberName'];?></div>
                                    </div>
                                    <div class="form-group form-show-validation row" style="padding:0px">
                                        <label for="AccountName" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left"  style="font-weight:normal">Member Mobile Number  </label>
                                        <div class="col-lg-4 col-md-9 col-sm-8">:&nbsp;<?php echo $member[0]['MobileNumber'];?></div>
                                    </div>
                                    <div class="form-group form-show-validation row" style="padding:0px">
                                        <label for="AccountName" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left"  style="font-weight:normal">Member Email ID  </label>
                                        <div class="col-lg-4 col-md-9 col-sm-8">:&nbsp;<?php echo $member[0]['EmailID'];?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title" style="float: left;">View Payment</div>
                                </div>
                                    <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Payment Date </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo date("d M, Y H:i",strtotime($sql[0]['PaymentDate']));?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Order ID </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['OrderID'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Order Number </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['OrderNumber'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Member ID </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['MemberID'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Member Code </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['MemberCode'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Form ID </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['MemberID'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Razorpay Order ID </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['razorpay_orderid'];?></div>
                                        </div>
                                       <div class="form-group form-show-validation row">
                                            <label for="Aadhaar" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Status </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['IsSuccess']==1 ? "Success" : "Failure";?></div>
                                        </div>
                                         <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Razorpay Response </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['razorpay_response'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Error Messasge </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['error_message'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Razorpay Payment ID </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['razorpay_payment_id'];?></div>
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a href="dashboard.php?action=MemberPayments&Status=All&MCode=<?php echo $sql[0]['MemberCode'];?>" id="show-signup" class="link">Back</a>
                                            </div>                                        
                                        </div>
                                    </div>
                                    </div>                                                                                             
                                </div>
                            </div>
                        </div>
                    </div>
             
        </div>

         
     