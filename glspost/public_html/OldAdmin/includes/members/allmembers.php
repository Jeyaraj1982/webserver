<?php include_once("header.php");?>
       <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-display1 icon-gradient bg-premium-dark">
                                    </i>
                                </div>
                                <div>Members
                                </div>
                            </div>
                        </div>
                    </div>        
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade active show" id="tab-content-1" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"><h5 class="card-title">Members</h5>
                                            <div class="card-body">
                                                <table  id="example" style="width: 100%;" class="table table-hover table-striped table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>Member Code</th>
                                                        <th>Member Name</th>
                                                        <th>Created</th>
                                                        <th>KYC</th>
                                                        <th>Nominee</th>
                                                        <th>Bank</th>
                                                        <th>Earnings</th>
                                                        <th>Withdraw</th>
                                                        <th>Action</th>                            
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $Members = $mysql->select("select * from _tbl_member");?>
                                                    <?php foreach($Members as $Member){?>
                                                    <tr>
                                                        <td><?php echo $Member['MemberCode'];?></td>
                                                        <td><?php echo $Member['MemberName'];?></td>
                                                        <td><?php echo $Member['CreatedOn'];?></td>
                                                        <td style="text-align: center;">
                                                            <?php if($Member['KycVerified']==1){?>
                                                                 <img src="../assets/images/check-mark.png" style="width: 24px;">
                                                            <?php } if($Member['KycVerified']==0){?>
                                                                   <img src="../assets/images/fail.png" style="width: 24px;">
                                                            <?php }?>
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <?php if($Member['NomineeVerified']==1){?>
                                                                 <img src="../assets/images/check-mark.png" style="width: 24px;">
                                                            <?php } if($Member['NomineeVerified']==0){?>
                                                                   <img src="../assets/images/fail.png" style="width: 24px;">
                                                            <?php }?>
                                                        </td>
                                                         <td style="text-align: center;">
                                                            <?php if($Member['BankAccountVerified']==1){?>
                                                                 <img src="../assets/images/check-mark.png" style="width: 24px;">
                                                            <?php } if($Member['BankAccountVerified']==0){?>
                                                                   <img src="../assets/images/fail.png" style="width: 24px;">
                                                            <?php }?>
                                                        </td>
                                                        <td  style="text-align: right;"><?php echo number_format(getOverallBalance($Member['MemberCode']),2);?></td>
                                                        <td  style="text-align: right;"><?php echo number_format(getWithdrawableBalance($Member['MemberCode']),2);?></td>
                                                        <td><a href="EditMember.php?code=<?php echo $Member['MemberCode'];?>">Edit</a>&nbsp;&nbsp;<a href="ViewMember.php?code=<?php echo $Member['MemberCode'];?>">View</a></td>
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
                    </div>
                </div>
 <?php include_once("footer.php");?>              