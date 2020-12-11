<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=EPins/Generate">EPins</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=EPins/Generate">Verification</a></li>
        </ul>
    </div>  
    
     <?php
     $title = "Transfer Epin OTP";
     
                                if (isset($_POST['submitBtn'])) {
                                    $message = "Your Epin Tranfer OTP is ".$_SESSION['tmp']['otp'];
                                    MobileSMS::sendSMS($_SESSION['User']['MobileNumber'],$message,$_SESSION['User']['MemberID']);
                                }
                                if (isset($_POST['btnTransfer'])) {
                                    $data = $_SESSION['tmp'];
                                    if ($_POST['otp']==$data['otp']) {
                                        
                                        //Request tbl
                                         $mysql->insert("_tbl_requests",array("ReqType"=>"PinTransfer",
                                                                              "ReqOn"=>date("Y-m-d H:i:s"),
                                                                              "MemberID"=>$_SESSION['User']['MemberID'],
                                                                              "AdminID"=>"0",
                                                                              "Param"=>json_encode($data)));
                                         foreach($data['pins'] as $p) {
                                             
                                             $mysql->insert("_tbl_transferpin",array("TransferredOn"=>date("Y-m-d H:i:s"),
                                                                                     "TransferFrom"=>$_SESSION['User']['MemberID'],
                                                                                     "TransferTo"=>$data['member']['MemberID'],
                                                                                     "IsMember"=>"1",
                                                                                     "IsAdmin"=>"0",
                                                                                     "PinID"=>$p));
                                             $mysql->execute("update _tblEpins set OwnToID='".$data['member']['MemberID']."', OwnToName='".$data['member']['MemberName']."', OwnToCode='".$data['member']['MemberCode']."', OwnedOn='".date("Y-m-d H:i:s")."'  where EPIN='".$p."'");
                                             
                                         }
                                        //
                                        $title = "Epin Transfer Completed";
                                        $msg = "<span style='color:green'>Transfer Completed.</span>".
                                         "<br><br><a href='dashboard.php'>Continue to dashboard</a>";
                                        //$_SESSION['tmp']=array(); 
                                        echo "<style>#pin{display:none}</style>";
                                    } else {
                                        echo "<span style='color:red'>Transaction failed. Invalid OTP.</span>";
                                    }
                            }
                            ?>
                
                                                                   
           <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                    <div class="card-title"><?php echo $title;?></div>
                </div>
                <div class="card-body">
            
                <?php echo $msg; ?>
                           
                                <form action="" method="post" id="pin">
                                    <div class="tablesaw-bar tablesaw-mode-stack"></div> 
                                     <div class="form-actions">
                                        <div class="form-group user-test" id="user-exists">
                                            <label>Please enter otp we sent your mobile number</label>
                                            <input type="text" name="otp" id="otp" value="<?php echo isset($_POST['otp']) ? $_POST['otp'] : "";?>" class="form-control" placeholder="Enter otp" required="required">
                                            <div class="help-block" id="payamt" style="display:block"></div>
                                            <div class="help-block" style="color:red" style="display:block"></div>
                                            <div class="help-block"><p class="error" id="username-exists"></p></div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary block-default" name="btnTransfer">Generate Pins</button>
                                        </div>
                                    </div>
                                </form>
                 </div>
                        </div>
                    </div>
                </div>
            </div>
            
                
