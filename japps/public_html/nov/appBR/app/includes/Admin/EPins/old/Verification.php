<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=EPins/Generate">EPins</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=EPins/Generate">Generate EPins</a></li>
        </ul>
    </div>                                                     
           <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Generate EPins</div>
                </div>
                <div class="card-body">
                            <?php
                                if (isset($_POST['btnGenerate'])) {
                                    $data = $_SESSION['tmp'];
                                    if ($_POST['otp']==$data['otp']) {
                                        
                                        $package =$mysql->select("select * from `_tbl_Settings_Packages` where `PackageID`='".$data['package']['PackageID']."' "); 
                                        
                                        //$epin_prefix  = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('EpinPrefix')");
                                         
                                        $epin_length  = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('EpinLength')");     
                                        $epin_pwedlen = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('EpinPwdLength')"); 
                                        
                                        $member =$mysql->select("select * from `_tbl_Members` where `MemberCode`='".$data['member']['MemberCode']."' "); 
                                        for($i=1;$i<=$data['pins'];$i++) {
                                            //$epins = $epin_prefix[0]['ParamValue'];
                                            $epins = $package[0]['Prefix'];
                                            
                                            $epins .= substr(md5("epins".$_SESSION['User']['AdminID'].$i.time()),0,$epin_length[0]['ParamValue']);
                                            $pinpassword = substr(md5("password".$_SESSION['User']['AdminID'].$i.time()),0,$epin_pwedlen[0]['ParamValue']);
                                            $mysql->insert("_tblEpins",array("EPIN"           => $epins,
                                                                             "PINPassword"    => $pinpassword,
                                                                             "CreatedByID"    => $_SESSION['User']['AdminID'],
                                                                             "CreatedByCode"  => $_SESSION['User']['AdminName'],
                                                                             "CreatedByName"  => $_SESSION['User']['AdminCode'],
                                                                             "CreatedOn"      => date("Y-m-d H:i:s"),
                                                                             "SoldToID"       => "0",
                                                                             "SoldToName"     => "0",
                                                                             "SoldToCode"     => "0",
                                                                             "OwnToID"        => $member[0]['MemberID'],
                                                                             "OwnToName"      => $member[0]['MemberName'],
                                                                             "OwnToCode"      => $member[0]['MemberCode'],
                                                                             "OwnedOn"        => date("Y-m-d H:i:s"),
                                                                             "IsUsed"         => "0",
                                                                             "UsedForID"      => "0",
                                                                             "UserForCode"    => "0",
                                                                             "UsedForName"    => "0",
                                                                             "CreatedBy"      => "Admin",
                                                                             "PackageID"      => $package[0]['PackageID'],
                                                                             "PackageName"    => $package[0]['PackageName'],
                                                                             "PackagePV"      => $package[0]['PV'],
                                                                             "PinValue"       => $package[0]['PackageAmount']));
                                            
                                      } 
                                      echo "<span style='color:green'>".$data['pins']." Epins are generated.</span>";
                                            echo "<br><br><a href='dashboard.php'>Continue to dashboard</a>";
                                            $_SESSION['tmp']=array(); 
                                            echo "<style>#pin{display:none}</style>";
                                    } else {
                                        echo "<span style='color:red'>Transaction failed. Invalid OTP.</span>";
                                    }
                            }
                            ?>
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
                                            <button type="submit" class="btn btn-primary block-default" name="btnGenerate">Generate Pins</button>
                                        </div>
                                    </div>
                                   
                                </form>
                           
                 
                 </div>
                        </div>
                    </div>
                </div>
            </div>
            
                
