<?php
    if ($_GET['f']=="requested") {
        $Members =$mysqldb->select("select * from _VoucherRegistration where IsActivated='0'");
    }
    
    if ($_GET['f']=="activated") {
        $Members =$mysqldb->select("select * from _VoucherRegistration where IsActivated='1'");
    }
    
    if ($_GET['f']=="rejected") {
        $Members =$mysqldb->select("select * from _VoucherRegistration where IsActivated='2'");
    }
                     
?>
  <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-6 align-self-center">
                        <h4 class="page-title">List of Requested Vouchers</h4>
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
                <div class="row">
                    <div class="col-lg-12 col-xlg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table v-middle" style="border: 1px solid; border-color: #e1e1e1;">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0"><b>Requested</b></th>
                                                <th class="border-top-0"><b>Applicant Name</b></th>
                                                <th class="border-top-0"><b>Mobile Number</b></th>
                                                <th class="border-top-0"><b>Email Address</b></th>
                                                <th class="border-top-0"><b>Amount</b></th>
                                                <th class="border-top-0"><b>Status</b></th>
                                                <th class="border-top-0"><b>Status On</b></th>
                                                <?php if ($_GET['f']=="activated") { ?>
                                                    <th class="border-top-0"><b>Voucher Number</b></th>
                                                <?php } ?>
                                                <th class="border-top-0"> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach ($Members as $Member){ ?>
                                            <tr>
                                                <td ><?php echo $Member['RequestedOn'];?></td>
                                                <td ><?php echo $Member['ApplicantName'];?></td>
                                                <td><?php echo $Member['MobileNumber'];?></td>
                                                <td><?php echo $Member['EmailAddress'];?></td>
                                                <td style="text-align:right"><?php echo number_format($Member['Amount'],2);?></td>
                                                
                                                <td><?php   
                                                if ($Member['IsActivated']=='0') {
                                                    echo "Requested";
                                                }
                                                
                                                if ($Member['IsActivated']=='1') {
                                                    echo "Activated";
                                                }
                                                
                                                if ($Member['IsActivated']=='2') {
                                                    echo "Rejected";
                                                }
                                                ?></td>
                                                <td><?php echo $Member['ActivatedOn'];?></td>
                                                <?php if ($_GET['f']=="activated") { ?>
                                                    <td><?php echo $Member['VoucherKey'];?></td>
                                                <?php } ?>
                                                
                                                <td style="text-align: right;">
                                                 <?php if ($_GET['f']=="requested") { ?>
                                                  <a href="dashboard.php?action=Vouchers/Edit&code=<?php echo md5("JJ".$Member['CouponRegID']);?>">Edit</a>&nbsp;|&nbsp;
                                                  <a href="dashboard.php?action=Vouchers/View&code=<?php echo md5("JJ".$Member['CouponRegID']);?>">View</a>
                                                  <?php } ?>
                                                  <?php if ($_GET['f']=="activated") { ?>
                                                  <a href="dashboard.php?action=Vouchers/View&code=<?php echo md5("JJ".$Member['CouponRegID']);?>">View</a>
                                                  <?php } ?>
                                                  <?php if ($_GET['f']=="rejected") { ?>
                                                  <a href="dashboard.php?action=Vouchers/View&code=<?php echo md5("JJ".$Member['CouponRegID']);?>">View</a>
                                                  <?php } ?>
                                                </td>
                                            </tr>                
                                         <?php }?>    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    