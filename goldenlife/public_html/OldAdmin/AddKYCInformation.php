<?php include_once("header.php"); ?> 
 <?php
     $Member = $mysql->select("Select * from _tbl_member where MemberCode='".$_GET['code']."'");
 ?>
       <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-display1 icon-gradient bg-premium-dark">
                                    </i>
                                </div>
                                <div>Add KYC Information
                                </div>
                            </div>
                        </div>
                    </div>        
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade active show" id="tab-content-1" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"> 
                                       <?php
                                         if (isset($_POST['updateBtn'])) {
                                             $mysql->insert("_tbl_member_kycinformation",array("MemberID"          => $Member[0]['MemberID'],
                                                                                          "MemberCode"        => $Member[0]['MemberCode'],
                                                                                          "AadhaarNumber" => $_POST['AadhaarNumber'],
                                                                                          "PanCardNumber"     => $_POST['PanCardNumber'],
                                                                                          "VoterIDNumber"       => $_POST['VoterIDNumber'],
                                                                                          "KycVerified"       => "0",
                                                                                          "AddedOn"             => date("Y-m-d H:i:s")
                                                                                          ));
                                             echo "Added successfully";
                                         ?>
                                            <script>location.href='ViewMember.php?code=<?php echo $Member[0]['MemberCode'];?>';</script>
                                             <?php
                                             exit;
                                         }
                                            
                                        ?>
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
                                                    <div class="col-sm-9">
                                                        <input type="text" name="VoterIDNumber"   class="form-control" value="<?php echo $bankInformation[0]['VoterIDNumber'];?>">
                                                    </div>
                                                </div>
                                               
                                                <div class="form-group row">
                                                   <div class="col-sm-12"><button type="submit" name="updateBtn" class="mb-2 mr-2 btn btn-gradient-primary"  >Update KYC Information</button></div>
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
 <?php include_once("footer.php");?>             