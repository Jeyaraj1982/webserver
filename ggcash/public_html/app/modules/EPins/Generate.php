<?php include_once("header.php");?>
     <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-9 align-self-center">
                        <h4 class="page-title">Generate Epin</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Generate E-Pin</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
            <?php
                if (getEpinWalletBalance($_SESSION['User']['MemberID'])==0 && !(isset($_POST['btnGenerate']))) {
                        $error++;
                        $errormsg = "Insufficant balance to generate epins.";
                        ?>
                         <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body" style="text-align: center;padding:100px;">
                                <img src="assets/images/wallet_128.png"><br><br>
                                   <span>Your epin wallet has Insufficant fund.</span> <br><br>
                                Click here to <a href='dashboard.php?action=Wallets/addCashToEpin'>Update E-Pin Wallet</a>
                            </div>
                            </div>
                            </div>
                            </div>
                        <?php
                } else {
            ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
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
                                            
                                                $mysqldb->insert("_tblEpins",array("EPIN"           => $epins,
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
                                    
                                            $id=$mysqldb->insert("_tbl_wallet_epin",array("MemberID"         => $_SESSION['User']['MemberID'],
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
                                    <br><Br>
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
                                    <script>
                                      function getPriceInfo() {
                                            $('#payamt').html( "Payable amount Rs. " +(parseInt($('#NumberofPins').val())*<?php echo $package[0]['PackageAmount'];?>).toFixed(2) );
                                        };
                                    </script>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            
                <script src="https://gcchub.org/panel/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
                <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
                <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
                <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

                <?php include_once("footer.php"); ?>