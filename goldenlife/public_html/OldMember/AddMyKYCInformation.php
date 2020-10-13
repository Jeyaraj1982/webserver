<?php include_once("header.php"); ?> 
 
       <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-display1 icon-gradient bg-premium-dark">
                                    </i>
                                </div>
                                <div>My KYC Information
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
                                        <?php $kycInformation = $mysql->select("Select * from _tbl_member_kycinformation where MemberID='".$_SESSION['User']['MemberID']."'  order by KYCID desc limit 0,1"); ?>
                                         <?php if(sizeof($kycInformation)==0){?>
                                                
                                        <?php
                                             
                                         if (isset($_POST['updateBtn'])) {
                                             $mysql->insert("_tbl_member_kycinformation",array("MemberID"          => $_SESSION['User']['MemberID'],
                                                                                                  "MemberCode"        => $_SESSION['User']['MemberCode'],
                                                                                                  "AadhaarNumber"        => $_POST['AadhaarNumber'],
                                                                                                  "PanCardNumber"    => $_POST['PanCardNumber'],
                                                                                                  "VoterIDNumber" => $_POST['VoterIDNumber'],
                                                                                                  "AddedOn"           => date("Y-m-d H:i:s")));
                                             echo "Added successfully";
                                         ?>
                                             <Script>
                                                  setTimeout(function(){
                                                  location.href='MyKYCInformation.php';
                                                  },1000);
                                                  </script>
                                             <?php
                                             exit;
                                         }
                                         
                                            
                                        ?> 
                                        <form action="" method="post">
                                            <div>
                                                  <div class="form-group row">
                                                   <div class="col-sm-3">Aadhaar Number</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="AadhaarNumber"  class="form-control" value="<?php echo $kycInformation[0]['AadhaarNumber'];?>">
                                                    </div>
                                                </div>
                                                   <div class="form-group row">
                                                   <div class="col-sm-3">Pancard Number</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="PanCardNumber"  class="form-control" value="<?php echo $kycInformation[0]['PanCardNumber'];?>">
                                                    </div>
                                                </div>
                                                 <div class="form-group row">
                                                   <div class="col-sm-3">VoterID Number</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="VoterIDNumber"  class="form-control" value="<?php echo $kycInformation[0]['VoterIDNumber'];?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-12"><button  class="mb-2 mr-2 btn btn-gradient-primary" type="submit" name="updateBtn">Update KYC Information</button></div>
                                                </div>
                                            </div>
                                        </form>
                                         
                                         <?php } else {?>
                                            <div class="form-group row" style="text-align:center;">
                                                   <div class="col-sm-12"><a class="mb-2 mr-2 btn btn-gradient-primary" href="MyKYCInformation.php">View KYC Information</a></div>
                                                </div>  
                                        <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
 <?php include_once("footer.php");?>             