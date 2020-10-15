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
                        $package =$mysql->select("select * from `_tbl_Settings_Packages` where `PackageID`='".$_POST['PackageID']."' "); 
                        
                        if (isset($_POST['btnGenerate'])) {
                            $error=0;
                            
                            if (sizeof($package)==0 || sizeof($package)>1) {
                                $error++;
                                $errormsg = "Package configuration failed.";
                            }
                            
                            $member =$mysql->select("select * from `_tbl_Members` where `MemberCode`='".$_POST['MemberCode']."' "); 
                            if (sizeof($member)==0) {
                                $error++;                                     
                                $errormsg = "Invalid Member."."select * from `_tbl_Members` where `MemberCode`='".$_POST['MemberCode']."' ";
                            }                       
                            if ($error==0) {
                                $otp = rand(9999,99999);
                                $otp = 45541;      
                                $_SESSION['tmp']=array("otp"=>$otp,"package"=>$package[0],"member"=>$member[0],"pins"=>$_POST['NumberofPins']);
                                ?>
                                     <script>location.href='dashboard.php?action=EPins/Confirmation';</script>
                                <?php
                                /*
                                $epin_prefix  = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('EpinPrefix')"); 
                                $epin_length  = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('EpinLength')");     
                                $epin_pwedlen = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('EpinPwdLength')"); 
                                
                                for($i=1;$i<=$_POST['NumberofPins'];$i++) {
                                
                                    $epins = $epin_prefix[0]['ParamValue'];
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
                                        
                                            //$balance = getEpinWalletBalance($_SESSION['User']['MemberID'])-($_POST['NumberofPins']*$package[0]['PackageAmount']);
                                    
                                            //$id=$mysql->insert("_tbl_wallet_epin",array("MemberID"         => $_SESSION['User']['MemberID'],
                                                                                          //"Particulars"      => "Epin Generated. Generated ".$_POST['NumberofPins']." pins",                    
                                                                                          //"Credits"          => "0",                    
                                                                                          //"Debits"           => $_POST['NumberofPins']*$package[0]['PackageAmount'], 
                                                                                          //"AvailableBalance" => $balance,                   
                                                                                          //"TxnDate"          => date("Y-m-d H:i:s")));
                                    
                                            echo "<span style='color:green'>".$_POST['NumberofPins']." Epins are generated.</span>";
                                           // echo "<span style='color:green'><br>Your available balance Rs. ".number_format($balance,2)."</span>";
                                            echo "<style>#generatepin{display:none}</style>";
                                            echo "<br><br><a href='dashboard.php'>Continue to dashboard</a>";
                                            unset($_POST);    */
                                        } else {
                                            ?>
                                                 <script>
                                                 //title: "Good job!",
                                                 swal({
  
  text: "<?php echo $errormsg;?>",
  icon: "error",
  button: "Ok!",
});
                                                 </script>
                                            <?php
                                        }
                                    }                                                                                           
                                ?>
                                <form action="" method="post" id="generatepin">
                                    <div class="tablesaw-bar tablesaw-mode-stack"></div> 
                                     
                                    <div class="form-actions">
                                        <div class="form-group user-test" id="user-exists">
                                            <label>Package</label>
                                            <select name="PackageID" id="PackageID"  class="form-control">
                                            <?php
                                                $packages = $mysql->select("select * from _tbl_Settings_Packages ");
                                                foreach($packages as $p) {
                                            ?>
                                                <option value="<?php echo $p['PackageID'];?>" <?php echo (isset($_POST['PackageID']) && $_POST['PackageID']==$p['PackageID']) ? ' selected="selected" ':"";?>><?php echo $p['PackageName'];?> (<?php echo $p['PV'];?>PVs)</option>
                                            <?php } ?>
                                            </select>
                                            <div class="help-block" id="payamt" style="display:block"></div>
                                            <div class="help-block" style="color:red" style="display:block"></div>
                                            
                                            <div class="help-block"><p class="error" id="username-exists"></p></div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-actions">
                                        <div class="form-group user-test" id="user-exists">
                                            <label>Number of Pins</label>
                                            <select name="NumberofPins" id="NumberofPins"    class="form-control">
                                                <option value="1" <?php echo (isset($_POST['NumberofPins']) && $_POST['NumberofPins']=='1') ? ' selected="selected" ':"";?>>1</option>
                                                <option value="2" <?php echo (isset($_POST['NumberofPins']) && $_POST['NumberofPins']=='2') ? ' selected="selected" ':"";?>>2</option>
                                                <option value="3" <?php echo (isset($_POST['NumberofPins']) && $_POST['NumberofPins']=='3') ? ' selected="selected" ':"";?>>3</option>
                                                <option value="4" <?php echo (isset($_POST['NumberofPins']) && $_POST['NumberofPins']=='4') ? ' selected="selected" ':"";?>>4</option>
                                                <option value="5" <?php echo (isset($_POST['NumberofPins']) && $_POST['NumberofPins']=='5') ? ' selected="selected" ':"";?>>5</option>
                                                <option value="6" <?php echo (isset($_POST['NumberofPins']) && $_POST['NumberofPins']=='6') ? ' selected="selected" ':"";?>>6</option>
                                                <option value="7" <?php echo (isset($_POST['NumberofPins']) && $_POST['NumberofPins']=='7') ? ' selected="selected" ':"";?>>7</option>
                                                <option value="8" <?php echo (isset($_POST['NumberofPins']) && $_POST['NumberofPins']=='8') ? ' selected="selected" ':"";?>>8</option>
                                                <option value="9" <?php echo (isset($_POST['NumberofPins']) && $_POST['NumberofPins']=='9') ? ' selected="selected" ':"";?>>9</option>
                                                <option value="10" <?php echo (isset($_POST['NumberofPins']) && $_POST['NumberofPins']=='10') ? ' selected="selected" ':"";?>>10</option>
                                            </select>
                                            <div class="help-block" id="payamt" style="display:block"></div>
                                            <div class="help-block" style="color:red" style="display:block"></div>
                                            
                                            <div class="help-block"><p class="error" id="username-exists"></p></div>
                                        </div>
                                    </div>
                                     <div class="form-actions">
                                        <div class="form-group user-test" id="user-exists">
                                            <label>Member Code</label>
                                            <input type="text" name="MemberCode" id="MemberCode" value="<?php echo isset($_POST['MemberCode']) ? $_POST['MemberCode'] : "";?>" class="form-control" placeholder="Member Code" required="required">
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
            
                
                