<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=EPins/Generate"><?php echo EPINS;?></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=EPins/Generate">Generate <?php echo EPINS;?></a></li>
        </ul>
    </div>                                                     
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Generate <?php echo EPINS;?></div>
                </div>
                <div class="card-body">
                <?php
                    $data = $_SESSION['tmp'];
                    
                    if (isset($_POST['btnGenerate'])) {
                        
                        if ($_POST['otp']==$data['otp']) {
                            
                            $package =$mysql->select("select * from `_tbl_Settings_Packages` where `PackageID`='".$data['package']['PackageID']."' ");
                            
                            $epin_length  = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('EpinLength')");     
                            $epin_pwedlen = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('EpinPwdLength')"); 
                            
                            $member =$mysql->select("select * from `_tbl_Members` where `MemberCode`='".$data['member']['MemberCode']."' "); 
                            for($i=1;$i<=$data['pins'];$i++) {
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
                            echo "<span style='color:green'>".$data['pins']." ".EPINS." are generated.</span>";
                                echo "<br><br><a href='dashboard.php'>Continue to dashboard</a>";
                                $_SESSION['tmp']=array(); 
                                echo "<style>#pin{display:none}</style>";
                        } else {
                            echo "<script>swal({title:'Invalid OTP',text:'Transaction failed',icon:'error', button:'Ok!'});</script>";
                        }
                    }
                ?>
                    <form action="" method="post" id="pin">
                     <div class="col-12">
                                        <?php  echo "Your OTP ".$data['otp']; ?>
                                    </div>
                        <div class="tablesaw-bar tablesaw-mode-stack"></div> 
                        <div class="form-actions">
                            <div class="form-group user-test" id="user-exists">
                                <label>Package Information</label>
                                <input type="text" value="<?php echo $data["package"]['PackageName'];?>" disabled="disabled" class="form-control">  
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="form-group user-test" id="user-exists">
                                <label>Member Information</label>
                                <input type="text" disabled="disabled" value="<?php echo $data["member"]['MemberName'];?>" class="form-control">  
                                <input type="text" disabled="disabled" value="<?php echo $data["member"]['MemberCode'];?>" class="form-control">  
                                <input type="text" disabled="disabled" value="<?php echo $data["member"]['MobileNumber'];?>" class="form-control">  
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="form-group user-test" id="user-exists">
                                <label>Number of <?php echo EPINS;?></label>
                                <input type="text" disabled="disabled" value="<?php echo $data["pins"];?>" class="form-control">  
                            </div>
                        </div> 
                        <div class="form-actions">
                            <div class="form-group user-test" id="user-exists">
                                <label>Please enter otp we sent your mobile number<span style="color:red">*</span></label>
                                <input type="text" name="otp" id="otp" value="<?php echo isset($_POST['otp']) ? $_POST['otp'] : "";?>" class="form-control" placeholder="Enter otp" required="required">
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="text-right form-group">
                                <a class="btn btn-outline-primary block-default" href="dashboard.php?action=Epins/Generate">Cancel</a>&nbsp;&nbsp;
                                <button type="submit" class="btn btn-primary block-default" name="btnGenerate">Generate <?php echo EPINS;?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>           
