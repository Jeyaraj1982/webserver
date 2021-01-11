<?php 
 $Member = $mysql->select("Select * from _tbl_member where MemberCode='".$_GET['code']."'");
 
 if (isset($_POST['updateBtn'])) {
     $mysql->insert("_tbl_member_kycinformation",array("MemberID"          => $Member[0]['MemberID'],
                                                       "MemberCode"        => $Member[0]['MemberCode'],
                                                       "AadhaarNumber"     => $_POST['AadhaarNumber'],
                                                       "PanCardNumber"     => $_POST['PanCardNumber'],
                                                       "VoterIDNumber"     => $_POST['VoterIDNumber'],
                                                       "KycVerified"       => "0",
                                                       "AddedOn"           => date("Y-m-d H:i:s")));
     echo "Added successfully";
 ?>
    <script>location.href='dashboard.php?action=ViewMember&code=<?php echo $Member[0]['MemberCode'];?>';</script>
     <?php
     exit;
 }
                                            
 ?>
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
                                        Add KYC Information
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div>
                                    <div class="form-group row">
                                       <div class="col-sm-3">Aadhaar Number</div>
                                        <div class="col-sm-9">
                                            <input type="text" name="AadhaarNumber"  class="form-control" value="<?php echo $bankInformation[0]['AadhaarNumber'];?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                       <div class="col-sm-3">PanCard Number</div>
                                       <div class="col-sm-9">
                                            <input type="text" name="PanCardNumber" class="form-control" value="<?php echo $bankInformation[0]['PanCardNumber'];?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3">VoterID Number</div>
                                        <div class="col-sm-9"><input type="text" name="VoterIDNumber"   class="form-control" value="<?php echo $bankInformation[0]['VoterIDNumber'];?>"></div>
                                    </div> 
                                    <div class="form-group row">
                                       <div class="col-sm-12"><button type="submit" class="btn btn-primary" name="updateBtn">Update KYC Information</button></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>


