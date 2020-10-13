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
                                <div>Add Bank Account Information
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
                                        <?php $bankInformation = $mysql->select("Select * from _tbl_member_banknames where MemberID='".$_SESSION['User']['MemberID']."'  order by BankID desc limit 0,1"); ?>
                                          <?php if(sizeof($bankInformation)==0){?>
                                        <?php
                                         if (isset($_POST['updateBtn'])) {
                                             $mysql->insert("_tbl_member_banknames",array("MemberID"          => $_SESSION['User']['MemberID'],
                                                                                          "MemberCode"        => $_SESSION['User']['MemberCode'],
                                                                                          "AccountHolderName" => $_POST['AccountHolderName'],
                                                                                          "AccountNumber"     => $_POST['AccountNumber'],
                                                                                          "AccountType"       => $_POST['AccountType'],
                                                                                          "BankName"          => $_POST['BankName'],
                                                                                          "Added"             => date("Y-m-d H:i:s"),
                                                                                          "IFSCode"           => $_POST['IFSCode']));
                                             echo "Added successfully";
                                         ?>
                                             <Script>
                                                  setTimeout(function(){
                                                  location.href='MyBankAccountInformation.php';
                                                  },1000);
                                                  </script>
                                             <?php
                                             exit;
                                         }
                                            
                                        ?>
                                            <form action="" method="post">
                                            <div>
                                                  <div class="form-group row">
                                                   <div class="col-sm-3">A/c holder Name</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="AccountHolderName"  class="form-control" value="<?php echo $bankInformation[0]['AccountHolderName'];?>">
                                                    </div>
                                                </div>
                                                   <div class="form-group row">
                                                   <div class="col-sm-3">Account Number</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="AccountNumber" class="form-control" value="<?php echo $bankInformation[0]['AccountNumber'];?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-3">A/c Type</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="AccountType"   class="form-control" value="<?php echo $bankInformation[0]['AccountType'];?>">
                                                    </div>
                                                </div>
                                                 <div class="form-group row">
                                                   <div class="col-sm-3">Bank Name</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="BankName"  class="form-control" value="<?php echo $bankInformation[0]['BankName'];?>">
                                                    </div>
                                                </div>
                                                 <div class="form-group row">
                                                   <div class="col-sm-3">IFS Code</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="IFSCode" class="form-control" value="<?php echo $bankInformation[0]['IFSCode'];?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-12"><button type="submit" name="updateBtn" class="mb-2 mr-2 btn btn-gradient-primary"  >Update Bank Information</button></div>
                                                </div>
                                            </div>  
                                            </form>
                                        <?php } else {?>
                                             <div class="form-group row" style="text-align:center;">
                                                   <div class="col-sm-12"><a class="mb-2 mr-2 btn btn-gradient-primary" href="MyBankAccountInformation.php">View Bank Account Information</a></div>
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