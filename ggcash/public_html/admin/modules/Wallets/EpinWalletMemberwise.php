<?php
    
    $Members =$mysqldb->select("select * from `_tbl_Members` order by MemberID desc");
    
?>
  <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-6 align-self-center">
                        <h4 class="page-title">EPin Wallet Transactions Member Wise</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">EPin Wallet Transactions Member Wise</li>
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
                                <div class="table-responsive"  style="min-height:200px;">
                                    <table class="table v-middle" style="border: 1px solid; border-color: #e1e1e1;">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0"></th>
                                                <th class="border-top-0"><b>Member Code</b></th>
                                                <th class="border-top-0"><b>Member Name</b></th>
                                                <th class="border-top-0"><b>Member Email</b></th>
                                                <th class="border-top-0"><b>Sponsor Code</b></th>
                                                <th class="border-top-0"><b>Upline Code</b></th>
                                                <th class="border-top-0"><b>Credits</b></th>
                                                <th class="border-top-0"><b>Debits</b></th>
                                                <th class="border-top-0"><b>Balance</b></th>
                                                <th class="border-top-0"><b>&nbsp;</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach ($Members as $Member){
                                          $summary = getEpinWalletShortSummary($Member['MemberID']);
                                          
                                           ?>
                                            <tr>
                                                <td><?php echo getImage($Member['Thumb'],$Member['Sex']);?></td>
                                                <td><span class="<?php echo ($Member['IsActive']==1) ? 'Activedot' : 'Deactivedot';?>"></span>&nbsp;&nbsp;&nbsp;<?php echo $Member['MemberCode'];?></td>
                                                <td><?php echo $Member['MemberName'];?></td>
                                                <td><?php echo $Member['MemberEmail'];?></td>
                                                <td><?php echo $Member['SponsorCode'];?></td>
                                                <td><?php echo $Member['UplineCode'];?></td>
                                                <td style="text-align: right"><?php echo number_format($summary['Credits'],2);?></td>
                                                <td style="text-align: right"><?php echo number_format($summary['Debits'],2);?></td>
                                                <td style="text-align: right"><?php echo number_format($summary['Balance'],2);?></td>
                                                <td>
                                                     <div class="btn-group">
                                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                                <div class="dropdown-menu">
                                                    <!--<div class="dropdown-divider"></div>-->
                                                    <a class="dropdown-item" href="dashboard.php?action=Members/GenealogyTree&Code=<?php echo $Member['MemberCode'];?>">View Tree</a>
                                                    <a class="dropdown-item" href="dashboard.php?action=Members/EditMember&code=<?php echo $Member['MemberCode'];?>">Edit</a>
                                                    <a class="dropdown-item" href="dashboard.php?action=Members/ViewMember&code=<?php echo $Member['MemberCode'];?>">View</a>
                                                    <a class="dropdown-item" href="dashboard.php?action=Wallets/EPinWalletTransactionForMember&code=<?php echo $Member['MemberCode'];?>">View Transactions</a>
                                                </div>
                                            </div>
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