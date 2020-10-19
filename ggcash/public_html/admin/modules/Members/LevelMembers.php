<?php
    
    
    $Members =$mysqldb->select("select * from `_tbl_Members` where  MemberCode in (select MemberCode from _tbl_daily where MemberLevel='".$_GET['L']."')");
    
?>
  <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-6 align-self-center">
                        <h4 class="page-title">List of All Members - Level - <?php echo $_GET['L'];?></h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Members</li>
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
                                                <th class="border-top-0" style="width:50px"></th>
                                                <th class="border-top-0" style="width:200px"><b>Member Code</b></th>
                                                <th class="border-top-0"><b>Member Name</b></th>
                                                <th class="border-top-0"><b>Member Email</b></th>
                                                <th class="border-top-0"><b>Sponsor Code</b></th>
                                                <th class="border-top-0"><b>Upline Code</b></th>
                                                <th class="border-top-0"><b>Left</b></th>
                                                <th class="border-top-0"><b>Right</b></th>
                                                <th class="border-top-0"><b>E-Pin Wallet</b></th>
                                                <th class="border-top-0"><b>GGCash Wallet</b></th>
                                                <th class="border-top-0"><b>Utility Wallet</b></th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach ($Members as $Member){ ?>
                                            <tr>
                                                <td><?php echo getImage($Member['Thumb'],$Member['Sex']);?><span class="<?php echo ($Member['IsActive']==1) ? 'Activedot' : 'Deactivedot';?>"></span></td>
                                                <td ><?php echo $Member['MemberCode'];?>
                                                    <br>
                                                    <span style="font-size:12px">   <a href="dashboard.php?action=Members/GenealogyTree&Code=<?php echo $Member['MemberCode'];?>">View Tree</a>&nbsp;|&nbsp;
                                                    <a href="dashboard.php?action=Members/EditMember&code=<?php echo $Member['MemberCode'];?>">Edit</a>&nbsp;|&nbsp;
                                                    <a href="dashboard.php?action=Members/ViewMember&code=<?php echo $Member['MemberCode'];?>">View</a>
                                                    </span>
                                                </td>
                                                <td><?php echo $Member['MemberName'];?></td>
                                                <td><?php echo $Member['MemberEmail'];?></td>
                                                <td><?php echo $Member['SponsorCode'];?></td>
                                                <td><?php echo $Member['UplineCode'];?></td>
                                                <td style="text-align: right"><?php echo $memberTree->getTotalLeftCount($Member['MemberCode']);?></td>
                                                <td style="text-align: right"><?php echo $memberTree->getTotalRightCount($Member['MemberCode']);?></td>
                                                <td style="text-align: right"><?php echo number_format(getEpinWalletBalance($Member['MemberID']),2);?></td>
                                                <td style="text-align: right"><?php echo number_format(getGGCashWalletBalance($Member['MemberID']),2);?></td>
                                                <td style="text-align: right"><?php echo number_format(getUtilityhWalletBalance($Member['MemberID']),2);?></td>
                                                
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