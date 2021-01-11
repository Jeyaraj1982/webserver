<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-title">
                                        Members
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3" id="basic-datatables">
                                        <thead>
                                            <tr>
                                                <th>Member Code</th>
                                                <th>Member Name</th>
                                                <th>Created</th>
                                                <th>KYC</th>
                                                <th>Nominee</th>
                                                <th>Bank</th>
                                                <th>Voucher</th>
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
                                                    <td  style="text-align: right;"><?php echo number_format(GetUtilityBalance($Member['MemberCode']),2);?></td>
                                                    <td  style="text-align: right;"><?php echo number_format(getWithdrawableBalance($Member['MemberCode']),2);?></td>
                                                    <td><a href="dashboard.php?action=EditMember&code=<?php echo $Member['MemberCode'];?>">Edit</a>&nbsp;&nbsp;<a href="dashboard.php?action=ViewMember&code=<?php echo $Member['MemberCode'];?>">View</a></td>
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
 <script>
    $(document).ready(function() {
        $('#basic-datatables').DataTable({});
    });
</script> 

