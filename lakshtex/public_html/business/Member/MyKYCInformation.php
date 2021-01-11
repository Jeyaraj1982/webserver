
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
                                        My KYC Information
                                    </div>
                                </div>
                                <div class="col-md-6" style="text-align: right;">
                                    <a href="Dashboard.php?action=AddMyKYCInformation" class="btn btn-primary btn-sm">Add KYC Information</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-bordered" id="basic-datatables" style="width: 100%;border-top:1px solid #ebedf2;border-bottom:1px solid #ebedf2;">
                                    <thead>
                                        <tr>
                                            <th>ID Type</th>
                                            <th>ID Number</th>
                                            <th>Added On</th>
                                            <th>Isverified</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php
                                         $kycInformations = $mysql->select("Select * from _tbl_member_kycinformation where MemberID='".$_SESSION['User']['MemberID']."'  order by KYCID DESC");
                                         foreach($kycInformations as $kycInformation) {
                                             ?>
                                             <tr>                                                        
                                                <td><?php echo $kycInformation['IDType'];?></td>
                                                <td><?php echo $kycInformation['IDNumber'];?></td>
                                                <td><?php echo date("d M, Y H:i", strtotime($kycInformation['AddedOn']));?></td>
                                                <td><?php echo ($kycInformation['KycVerified']=="1") ? "Verified" : "Pending";?></td>
                                             </tr>
                                             <?php
                                         }
                                     ?>
                                     <?php if(sizeof($kycInformations)==0){ ?>
                                        <tr>
                                            <td colspan="5" style="text-align: center;">No records found<br><a href="Dashboard.php?action=AddMyKYCInformation">Add KYC Information</a></td>
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
</div>
 