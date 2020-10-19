<?php
    $allmembers =explode(",",countChildrenCodees($_SESSION['User']['MemberCode']));
    $allmembers = array_filter($allmembers); 
    $result = array();
    foreach($allmembers as $allm) {
    $result[]="'".$allm."'";
    }
    $Members =$mysqldb->select("select * from `_tbl_Members` where `MemberCode` in (".implode(",",$result).")");
    
?>
  <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-6 align-self-center">
                        <h4 class="page-title">List of All Members</h4>
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
                                                <th class="border-top-0"><b>Member ID</b></th>
                                                <th class="border-top-0"><b>Member Name</b></th>
                                                <th class="border-top-0"><b>Member Email</b></th>
                                                <th class="border-top-0"><b>Sponsor Code</b></th>
                                                <th class="border-top-0"><b>Upline Code</b></th>
                                                <th class="border-top-0"><b>Left</b></th>
                                                <th class="border-top-0"><b>Right</b></th>
                                                <th class="border-top-0"><b>&nbsp;</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach ($Members as $Member){ ?>
                                            <tr>
                                                <td><span class="<?php echo ($Member['IsActive']==1) ? 'Activedot' : 'Deactivedot';?>"></span>&nbsp;&nbsp;&nbsp;<?php echo $Member['MemberCode'];?></td>
                                                <td><?php echo $Member['MemberName'];?></td>
                                                <td><?php echo $Member['MemberEmail'];?></td>
                                                <td><?php echo $Member['SponsorCode'];?></td>
                                                <td><?php echo $Member['UplineCode'];?></td>
                                                <td style="text-align: right"><?php echo getTotalLeftCount($Member['MemberCode']);?></td>
                                                <td style="text-align: right"><?php echo getTotalRightCount($Member['MemberCode']);?></td>
                                                <td><a href="dashboard.php?action=Members/GenealogyTree&Code=<?php echo $Member['MemberCode'];?>">View Tree</a></td>
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
