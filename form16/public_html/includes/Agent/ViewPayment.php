<?php 
  $sql= $mysql->select("select * from `_tbl_payments` where  md5(PaymentID)='".$_GET['Code']."'");
  $member= $mysql->select("select * from `_tbl_Members` where `MemberCode`='".$sql[0]['MemberCode']."'");
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
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
                                <label for="Name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Order Number </label>
                                <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['OrderNumber'];?></div>
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
                            <?php if ($sql[0]['IsFailure']==1) {?>
                            <div class="form-group form-show-validation row">
                                <label for="Name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Error Messasge </label>
                                <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['error_message'];?></div>
                            </div>
                            <?php } ?>
                            <div class="form-group form-show-validation row">
                                <label for="Name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Razorpay Payment ID </label>
                                <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['razorpay_payment_id'];?></div>
                            </div>
                        </div>
                        <div class="card-action">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="dashboard.php?action=ViewPayments" id="show-signup" class="link">Back</a>
                                </div>                                        
                            </div>
                        </div>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>     