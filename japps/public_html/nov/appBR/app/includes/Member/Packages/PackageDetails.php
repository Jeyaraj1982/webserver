<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Setttings/ChangePassword">Packages</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Setttings/ChangePassword">My ROI Details</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">My ROI Details</div>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-sm-8">
                                <?php $roi = $mysql->select("select * from _roi_payouts where MemberID='".$_SESSION['User']['MemberID']."'"); ?>
                                <select name="RoiID" class="form-control">
                                    <?php foreach($roi as $r) { ?>
                                    <option value="<?php echo $r['ROI_ID'];?>" <?php echo ($_POST['RoiID']==$r['ROI_ID']) ? " selected='selected' " : ""; ?> ><?php echo $r['TypeString'].( $r['RMemberID']!=0 ? " - - - - - [".$r['RMemberCode']."] [".$r['PackageName']."]" : "");?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <input type="submit" value="Go" name="submitBtn" class="btn btn-primary">
                            </div>
                        </div>
                    </form>    
                </div>
            </div>
        </div>
    </div>
    <?php if (isset($_POST['RoiID'])) {?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">ROI Details</div>
                </div>
                <?php
                    $roi = $mysql->select("select (@a:=@a+1)   AS slno, _roi_payments.* FROM _roi_payments,(SELECT @a:=0) initvars  where _roi_payments.MemberID='".$_SESSION['User']['MemberID']."' and _roi_payments.ROI_PayoutID= '".$_POST['RoiID']."'");   
                    $i=1;
                ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>        
                                            <th>Sl.No</th>
                                            <th>Date</th>
                                            <th  style="text-align: right">ROI Amount($)</th>
                                            <th>Status</th>
                                            <th>Status On</th>
                                            <th style="text-align: right;">Txn ID</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($roi as $r) {?>
                                        <tr>
                                            <td><?php echo $r['slno'];?></td>
                                            <td><?php echo date("M d, Y",strtotime($r['ROI_DATE']));?></td>
                                            <td style="text-align: right"><?php echo $r['ROI_AMT'];?></td>
                                            <td><?php echo $r['IsSettled']==0 ? "<span style='color:#999'>Scheduled</span>" : "Settled";?></td>
                                            <td><?php echo (isset($r['SettledOn']) ? date("M d, Y",strtotime($r['SettledOn'])) : "");?>
                                            <td style="text-align: right"><?php echo (isset($r['AccountTxnID']) ? str_pad($r['AccountTxnID'],6,"0",STR_PAD_LEFT) : "");?></td>
                                        </tr>
                                    <?php $i++;} ?>
                                    </tbody>
                              </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>