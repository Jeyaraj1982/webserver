<?php
    if ($_GET['f']=="requested") {
        $Members =$mysqldb->select("select * from _BonusCardRegistration");
    } elseif ($_GET['f']=="activated") {
        $Members = $mysql->select("SELECT * FROM _BonusCardRegistration WHERE DATE(DueDate)>=DATE('".date("Y-m-d")."')");
    } elseif ($_GET['f']=="expired") {
        $Members = $mysql->select("SELECT * FROM _BonusCardRegistration WHERE DATE(DueDate)<DATE('".date("Y-m-d")."')");
    } else {
        $Members =$mysqldb->select("select * from _BonusCardRegistration");
    }
                     
?>
  <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-6 align-self-center">
                        <h4 class="page-title">List of Bonus Cards</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Bonus Cards</li>
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
                                                <th class="border-top-0"><b>Created</b></th>
                                                <th class="border-top-0"><b>Card Number</b></th>
                                                <th class="border-top-0"><b>Applicant Name</b></th>
                                                <th class="border-top-0"><b>Amount</b></th>
                                                <th class="border-top-0"><b>Entry Date</b></th>
                                                <th class="border-top-0"><b>Due Date</b></th>
                                                <th class="border-top-0"><b>Days</b></th>
                                                <th class="border-top-0"><b>Status</b></th>
                                                <th class="border-top-0"><b>Status On</b></th>
                                                <th class="border-top-0"> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach ($Members as $Member){ ?>
                                            <tr>
                                                <td ><?php echo $Member['RequestedOn'];?></td>
                                                <td ><?php echo $Member['BonusCardNumber'];?></td>
                                                <td ><?php echo $Member['ApplicantName'];?></td>
                                                <td style="text-align:right"><?php echo number_format($Member['Amount'],2);?></td>
                                                <td ><?php echo $Member['EntryDate'];?></td>
                                                <td ><?php echo $Member['DueDate'];?></td>
                                                <td ><?php echo $Member['Days'];?></td>
                                                <td><?php   
                                                if (strtotime(date("Y-m-d"))<=strtotime($Member['DueDate'])) {
                                                    echo "Active";
                                                }else{
                                                    echo "Expired";
                                                }
                                                ?></td>
                                                 
                                                
                                                <td style="text-align: right;">
                                                 <?php // if ($_GET['f']=="requested") { ?>
                                                  <a href="dashboard.php?action=BonusCard/Edit&code=<?php echo md5("JJ".$Member['BonusCardRegID']);?>">Edit</a>&nbsp;|&nbsp;
                                                  <a href="dashboard.php?action=BonusCard/View&code=<?php echo md5("JJ".$Member['BonusCardRegID']);?>">View</a>
                                                  <?php // } ?>
                                                  <?php /*if ($_GET['f']=="activated") { ?>
                                                  <a href="dashboard.php?action=BonusCard/View&code=<?php echo md5("JJ".$Member['BonusCardRegID']);?>">View</a>
                                                  <?php //} ?>
                                                  <?php //if ($_GET['f']=="rejected") { ?>
                                                  <a href="dashboard.php?action=BonusCard/View&code=<?php echo md5("JJ".$Member['BonusCardRegID']);?>">View</a>
                                                  <?php// }*/ ?>
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