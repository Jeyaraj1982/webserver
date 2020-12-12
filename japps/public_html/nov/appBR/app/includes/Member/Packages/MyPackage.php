 
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Setttings/ChangePassword">Packages</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Setttings/ChangePassword">My Package</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">My Packages</div>
                </div>
                <div class="card-body">
                     <div class="row py-3">
                        <?php
                            $packageinfo = $mysql->select("select * from _tbl_Members_Packages where MemberID='".$_SESSION['User']['MemberID']."'");
                        ?>
                           <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                             <tr>
                                <th>Date</th>
                                <th>Package Name</th>
                                <th style="text-align: right;">Package Cost</th>
                             </tr>
                             </thead>
                             <tbody>
                             <?php foreach($packageinfo as $info) {?>
                              <tr>
                                <td><?php echo date("M d, Y",strtotime($packageinfo[0]['PackageActivatedOn']));?></td>
                                <td><?php echo $packageinfo[0]['PackageName'];?></td>
                                <td style="text-align: right">$<?php echo $packageinfo[0]['PackageCost'];?></td>
                             </tr>
                             <?php } ?>
                             </tbody> 
                        </table>
                         
                    </div>             
                                        
                                    </div>
                </div>
            </div>
        </div>
    </div>
</div>