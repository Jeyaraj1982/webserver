<div class="container-fluid">
    <Br><br>
    <div class="row">                  
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-light-green">
                    <h4 class="m-b-0 text-orange "><i class="mdi mdi-account-multiple-plus  p-r-10"></i>Create Member</h4>
                </div>
                <div class="card-body"> 
                    <div>
                        <?php
                            if (isset($_POST['submitBtn2'])) {
                                
                                $mem = $mysql->select("select * from _tbl_Members where MobileNumber='".$_POST['SMobileNumber']."' or MemberCode='".$_POST['SMobileNumber']."'");
                                
                                if (sizeof($mem)==1) {
                                    $epin =$mysql->select("SELECT * FROM `_tblEpins` where `EPIN`='".$_POST['Epin']."' and `PINPassword`='".$_POST['PinPassword']."'");
                                    
                                    if (sizeof($epin)==1)  {
                                        
                                        if ($epin[0]['IsUsed']==0) {
                                            $data = md5($epin[0]['EPIN'].$epin[0]['PINPassword'].$epin[0]['EPINID']);
                                            $sel_epin = md5($epin[0]['EPINID'].$epin[0]['EPIN']);
                        ?>
                                            <form action="dashboard.php?action=Members/CreateMemberUsing" class="customform ajax-form" id="signupCForm" method="post">
                                                <input type="hidden" value="<?php echo $sel_epin;?>" name="sel_epin">
                                                <input type="hidden" value="<?php echo $data;?>" name="data">
                                                <input type="hidden" value="<?php echo md5($mem[0]['MemberCode'].$mem[0]['MemberName']);?>" name="mdata">
                                                <div class="form-group">
                                                    <label for="Epin">Sponser ID</label>
                                                    <input type="text" class="form-control" readonly="readonly" value="<?php echo $mem[0]['MemberCode'];?>">
                                                </div>                                      
                                                <div class="form-group">
                                                    <label for="Epin">Sponser Name</label>
                                                    <input type="text" class="form-control" readonly="readonly"  value="<?php echo $mem[0]['MemberName'];?>">
                                                </div>
                                                 <div class="form-group">     
                                                    <label for="Epin">Mobile Number</label>
                                                    <input type="text" class="form-control" readonly="readonly"  value="<?php echo $mem[0]['MobileNumber'];?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Epin"><?php echo EPIN;?> Number</label>
                                                    <input type="text" class="form-control" readonly="readonly"  value="<?php echo $epin[0]['EPIN'];?>">
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-primary" name="submitBtns" type="submit">Confirm & Continue</button> 
                                                </div>
                                            </form>
                        <?php
                                            $isSuccess=true;                   
                                        } else {
                                            $error = "Entered epin already used.";
                                        }
                                    } else {
                                        $error = "<span style='color:red'>Invalid epin & pin password.</span>";
                                    }
                                } else {
                                    $error = "Sponsor not found";
                                }
                        }   
    
                        if (!(isset($isSuccess) && $isSuccess==true)) {
                        ?>
                            <form action="" class="customform ajax-form" method="post">
                                <div class="form-group">
                                    <label for="username" class="placeholder">Sponsor's Mobile Number<span style="color:red">*</span></label><br>
                                    <input id="Epin" class="form-control" name="SMobileNumber" value="<?php echo $_POST['SMobileNumber'];?>" type="text" placeholder="Sponsor's Mobile Number / ID" class="subject" maxlength="10" required style="background:#fff">
                                </div>
                                <div class="form-group">
                                    <label for="username" class="placeholder"><?php echo EPIN;?> Number<span style="color:red">*</span></label><br>
                                    <input id="Epin" class="form-control" name="Epin" value="<?php echo $_POST['Epin'];?>" type="text" placeholder="Enter voucher number" class="subject" required style="background:#fff">
                                </div>
                                <div class="form-group">
                                    <label for="password" class="placeholder"><?php echo EPIN;?> Pass<span style="color:red">*</span></label><br>
                                    <input id="PinPassword" class="form-control"  value="<?php echo $_POST['PinPassword'];?>" name="PinPassword" placeholder="Enter voucher key" type="text" class="subject" required style="background:#fff">
                                </div>
                                <?php if (isset($error)) { ?>
                                <div class="form-group">
                                    <label for="password" class="placeholder"><?php echo $error;?></label>
                                </div>
                                <?php } ?>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="submitBtn2" value="Sign In">Continue</button>
                                </div>
                            </form>
                        <?php } ?>       
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>