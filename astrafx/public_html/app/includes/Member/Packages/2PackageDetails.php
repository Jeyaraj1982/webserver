 
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Setttings/ChangePassword">Packages</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Setttings/ChangePassword">My Package Details</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">My Packages</div>
                </div>
                <div class="card-body">
                       <div class="row">
                        <div class="col-sm-12">
                        
                     <form action="" method="post">
                        <?php
                            $packageinfo = $mysql->select("select * from _tbl_Members_Packages where MemberID='".$_SESSION['User']['MemberID']."'");
                        ?>
                        <select name="packageID" class="form-control">
                            <?php foreach($packageinfo as $info) { ?>
                                <option value="<?php echo $info['PackageID'];?>"><?php echo date("M d, Y",strtotime($info['PackageActivatedOn']))." - ".$info['PackageName'];?></option>
                            <?php } ?>
                        </select>
                        <input type="submit" value="Go" name="submitBtn" class="btn btn-success">
                                         
                        </form>    
                        </div></div>
                                    
                                    
                </div>
            </div>
        </div>
    </div>
    
    <?php if (isset($_POST['packageID'])) {?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Package Details</div>
                </div>
                <?php
                            $packageinfo = $mysql->select("select * from _tbl_Settings_Packages where PackageID='".$_POST['packageID']."'");
                           
                            $selectedPackage = $mysql->select("select * from _tbl_Members_Packages where PackageID='".$_POST['packageID']."' and MemberID='".$_SESSION['User']['MemberID']."'");
                        ?>
                          <?php
                         $roi = $mysql->select("select * from _tbl_roi_dates where date(TDate)>=date('".date("Y-m-d",strtotime($selectedPackage[0]['PackageActivatedOn']))."') limit 6,".$packageinfo[0]['ROI_Days']);   
                         $i=1;
                    ?>
                <div class="card-body">
                       <div class="row">
                        <div class="col-sm-6">
                        
                        
                           
                       <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                             <tr>        
                               
                                        <th>Sl.No</th>
                                        <th>Date</th>
                                        <th>ROI Amount</th>
                                        <th>Settled</th>
                                    </tr>
                               </thead>
                                    <?php foreach($roi as $r) {?>
                               <tbody>
                                     <tr>
                                        <td><?php echo $i;?></td>
                                        <td><?php echo $r['TDate'];?></td>
                                        <td>$<?php echo number_format($packageinfo[0]['PackageAmount']*$packageinfo[0]['ROI']/100,2);?></td>
                                        <td>No</td>
                                    </tr>
                                    </tbody>
                                    <?php $i++;} ?>
                              </table>
                              </div>
                              
                        </div>
                        <div class="col-sm-5">
                        
                      <div class="row py-3">
                        
                           <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                             <tr style="background:#fff;">
                                <td style="height:auto;">Package Name</td>
                                <td style="height:auto;">:&nbsp;<?php echo $packageinfo[0]['PackageName'];?></td>
                             </tr>
                              <tr style="background:#fff;">
                                <td style="height:auto;">Package Price</td>
                                <td style="height:auto;">:&nbsp;$<?php echo $packageinfo[0]['PackageAmount'];?></td>
                             </tr>
                               <tr style="background:#fff;">
                                <td style="height:auto;">Celling</td>
                                <td style="height:auto;">:&nbsp;$<?php echo $packageinfo[0]['CutOffPV'];?></td>
                             </tr>
                               <tr style="background:#fff;">
                                <td style="height:auto;">Direct Referal Earning</td>
                                <td style="height:auto;">:&nbsp;<?php echo $packageinfo[0]['DirectReferalCommission'];?>%</td>
                             </tr>
                               <tr style="background:#fff;">
                                <td style="height:auto;">Direct Referal Settlement Days</td>
                                <td style="height:auto;">:&nbsp;<?php echo $packageinfo[0]['DirectReferal_Days'];?></td>
                             </tr>
                             
                               <tr style="background:#fff;">
                                <td style="height:auto;">Binary Match Earning</td>
                                <td style="height:auto;">:&nbsp;<?php echo $packageinfo[0]['BinaryCommission'];?>%</td>
                             </tr>
                               <tr style="background:#fff;">
                                <td style="height:auto;">Binary Match Earning Settlement Days</td>
                                <td style="height:auto;">:&nbsp;<?php echo $packageinfo[0]['BinaryCommission_Days'];?></td>
                             </tr>
                              <tr style="background:#fff;">
                                <td style="height:auto;">ROI</td>
                                <td style="height:auto;">:&nbsp;<?php echo $packageinfo[0]['ROI'];?>%</td>
                             </tr>
                             <tr style="background:#fff;">
                                <td style="height:auto;">ROI Days</td>
                                <td style="height:auto;">:&nbsp;<?php echo $packageinfo[0]['ROI_Days'];?></td>
                             </tr>
                            <tr style="background:#fff;">
                                <td style="height:auto;">Joined</td>
                                <td style="height:auto;width:150px">:&nbsp;<?php echo date("M d, Y",strtotime($_SESSION['User']['CreatedOn']));?></td>
                             </tr> 
                        </table>
                        
                        
                       
                         
                    </div>             
                                        
                                    </div>    
                        </div></div>
                                    
                                    
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>