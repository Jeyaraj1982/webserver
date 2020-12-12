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
                if (getUtilityhWalletBalance($_SESSION['User']['MemberID'])==0 && !(isset($_POST['btnGenerate']))) {
                        $error++;
                        ?>
                        <!--<img src="assets/images/wallet_128.png"><br><br>-->
                        <span>Your epin wallet has Insufficant fund.</span> <br><br>
                        Click here to <a href='dashboard.php?action=Wallet/Refill'>Update your wallet</a>
                        <?php
                } else {
            ?>
                 
                                <?php
                                    $package =$mysql->select("select * from `_tbl_Settings_Packages` where `IsActive`='1' and `IsPrimary`='1'"); 
                                    
                                    if (isset($_POST['btnGenerate'])) {
                                        
                                        $error=0;
                                        
                                        if (sizeof($package)==0 || sizeof($package)>1) {
                                            $error++;
                                            $errormsg = "Package configuration failed.";
                                        }
                                        
                                        if (sizeof($package)==1) {
                                            if (!(getEpinWalletBalance($_SESSION['User']['MemberID'])>=$_POST['NumberofPins']*$package[0]['PackageAmount'])) {
                                                $error++;
                                                $errormsg = "Insufficant balance to generate epins.";
                                            }
                                        }
                                        
                                        if ($error==0) {
                                        
                                            $epin_prefix  = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('EpinPrefix')"); 
                                            $epin_length  = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('EpinLength')");     
                                            $epin_pwedlen = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('EpinPwdLength')"); 
                                        
                                            for($i=1;$i<=$_POST['NumberofPins'];$i++) {
                                        
                                                $epins = $epin_prefix[0]['ParamValue'];
                                                $epins .= substr(md5("epins".$_SESSION['User']['MemberID'].$i.time()),0,$epin_length[0]['ParamValue']);
                                                $pinpassword = substr(md5("password".$_SESSION['User']['MemberID'].$i.time()),0,$epin_pwedlen[0]['ParamValue']);
                                            
                                                $mysql->insert("_tblEpins",array("EPIN"           => $epins,
                                                                                   "PINPassword"    => $pinpassword,
                                                                                   "CreatedByID"    => $_SESSION['User']['MemberID'],
                                                                                   "CreatedByCode"  => $_SESSION['User']['MemberName'],
                                                                                   "CreatedByName"  => $_SESSION['User']['MemberCode'],
                                                                                   "CreatedOn"      => date("Y-m-d H:i:s"),
                                                                                   "SoldToID"       => "0",
                                                                                   "SoldToName"     => "0",
                                                                                   "SoldToCode"     => "0",
                                                                                   "SoldOn"         => "0000-00-00 00:00:00",
                                                                                   "OwnToID"        => $_SESSION['User']['MemberID'],
                                                                                   "OwnToName"      => $_SESSION['User']['MemberName'],
                                                                                   "OwnToCode"      => $_SESSION['User']['MemberCode'],
                                                                                   "OwnedOn"        => date("Y-m-d H:i:s"),
                                                                                   "IsUsed"         => "0",
                                                                                   "UsedOn"         => "0000-00-00 00:00:00",
                                                                                   "UsedForID"      => "0",
                                                                                   "UserForCode"    => "0",
                                                                                   "UsedForName"    => "0",
                                                                                   "PinValue"       => $package[0]['PackageAmount']));
                                            }
                                        
                                            $balance = getEpinWalletBalance($_SESSION['User']['MemberID'])-($_POST['NumberofPins']*$package[0]['PackageAmount']);
                                    
                                            $id=$mysql->insert("_tbl_wallet_epin",array("MemberID"         => $_SESSION['User']['MemberID'],
                                                                                          "Particulars"      => "Epin Generated. Generated ".$_POST['NumberofPins']." pins",                    
                                                                                          "Credits"          => "0",                    
                                                                                          "Debits"           => $_POST['NumberofPins']*$package[0]['PackageAmount'], 
                                                                                          "AvailableBalance" => $balance,                   
                                                                                          "TxnDate"          => date("Y-m-d H:i:s")));
                                    
                                            echo "<span style='color:green'>".$_POST['NumberofPins']." Epins are generated.</span>";
                                            echo "<span style='color:green'><br>Your available balance Rs. ".number_format($balance,2)."</span>";
                                            echo "<style>#generatepin{display:none}</style>";
                                            echo "<br><br><a href='dashboard.php'>Continue to dashboard</a>";
                                            unset($_POST);
                                        } 
                                    }                                                                                           
                                ?>
                                <form action="" method="post" id="generatepin">
                                    <div class="tablesaw-bar tablesaw-mode-stack"></div> 
                                     
                                    <div class="form-actions">
                                        <div class="form-group user-test" id="user-exists">
                                            <label>Package</label>
                                            <select name="NumberofPins" id="NumberofPins"  onchange="getPriceInfo()" class="form-control">
                                            <?php
                                                $packages = $mysql->select("select * from _tbl_packages ");
                                                foreach($packages as $p) {
                                            ?>
                                                <option value="<?php echo $p['PackageID'];?>"><?php echo $p['PackageName'];?> (<?php echo $p['PV'];?>PVs) Rs. <?php echo $p['Price'];?></option>
                                            <?php } ?>
                                            </select>
                                            <div class="help-block" id="payamt" style="display:block"></div>
                                            <div class="help-block" style="color:red" style="display:block"><?php echo $errormsg;?></div>
                                            
                                            <div class="help-block"><p class="error" id="username-exists"></p></div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-actions">
                                        <div class="form-group user-test" id="user-exists">
                                            <label>Number of Pins</label>
                                            <select name="NumberofPins" id="NumberofPins"  onchange="getPriceInfo()" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                            </select>
                                            <div class="help-block" id="payamt" style="display:block"></div>
                                            <div class="help-block" style="color:red" style="display:block"><?php echo $errormsg;?></div>
                                            
                                            <div class="help-block"><p class="error" id="username-exists"></p></div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary block-default" name="btnGenerate">Generate Pins</button>
                                        </div>
                                    </div>
                                   
                                </form>
                           
                <?php } ?>
                 </div>
                        </div>
                    </div>
                </div>
            </div>
            
                
                