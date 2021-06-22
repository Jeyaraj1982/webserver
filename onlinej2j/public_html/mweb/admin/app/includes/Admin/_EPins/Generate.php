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
                        $package =$mysql->select("select * from `_tbl_Settings_Packages` where `PackageID`='".$_POST['PackageID']."' "); 
                        
                        if (isset($_POST['btnGenerate'])) {
                            $error = 0;
                            
                            if (sizeof($package)==0 || sizeof($package)>1) {
                                $error++;
                                $titlemsg = "Invalid Package";
                                $errormsg = "Package configuration failed.";
                            }
                            
                            $member =$mysql->select("select * from `_tbl_Members` where `MemberCode`='".$_POST['MemberCode']."' "); 
                            if (sizeof($member)==0) {
                                $error++;    
                                $titlemsg = "Invalid Member."                                 ;
                                $errormsg = "Member ID ".$_POST['MemberCode']." not found";
                            }                       
                            if ($error==0) {
                                $_SESSION['tmp']=array("otp"=>rand(9999,99999),"package"=>$package[0],"member"=>$member[0],"pins"=>$_POST['NumberofPins']);
                                echo "<script>location.href='dashboard.php?action=EPins/Confirmation';</script>";
                            } else {
                                echo "<script>swal({title:'".$titlemsg."',text:'".$errormsg."',icon:'error', button:'Ok!'});</script>";
                            }
                        }
                        $packages = $mysql->select("select * from `_tbl_Settings_Packages`");                                                                                           
                    ?>
                    <form action="" method="post" id="generatepin">
                        <div class="tablesaw-bar tablesaw-mode-stack"></div>
                        <div class="form-actions">
                            <div class="form-group user-test" id="user-exists">
                                <label>Package<span style="color:red">*</span></label>
                                <select name="PackageID" id="PackageID"  class="form-control">
                                    <?php foreach($packages as $p) { ?>
                                    <option value="<?php echo $p['PackageID'];?>" <?php echo (isset($_POST['PackageID']) && $_POST['PackageID']==$p['PackageID']) ? ' selected="selected" ':"";?>><?php echo $p['PackageName'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="form-group user-test" id="user-exists">
                                <label>Number of <?php echo EPINS;?><span style="color:red">*</span></label>
                                <select name="NumberofPins" id="NumberofPins" class="form-control">
                                    <?php for($i=1;$i<=10;$i++) {?>
                                    <option value="1" <?php echo (isset($_POST['NumberofPins']) && $_POST['NumberofPins']==$i) ? ' selected="selected" ':"";?>><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="form-group user-test" id="user-exists">
                                <label>Member Code<span style="color:red">*</span></label>
                                <input type="text" name="MemberCode" id="MemberCode" value="<?php echo isset($_POST['MemberCode']) ? $_POST['MemberCode'] : "";?>" class="form-control" placeholder="Member Code" required="required">
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="text-right form-group">
                                <a class="btn btn-outline-primary block-default" href="dashboard.php">Cancel</a>&nbsp;&nbsp;
                                <button type="submit" class="btn btn-primary block-default" name="btnGenerate">Generate <?php echo EPINS;?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>         