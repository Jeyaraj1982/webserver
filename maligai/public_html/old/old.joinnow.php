<?php include_once("includes/header.php"); ?>
<div style="height:50px">
</div>
 <section id="contact" class="section-padding">    
      <div class="container">
        <div class="section-header text-center">          
          <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Member Registration</h2>
          <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
        </div>
        <div class="row contact-form-area wow fadeInUp" data-wow-delay="0.3s"> 
           <div class="margin" style="width:300px;max-width: 300px;margin:0px auto;">
           <?php
           if (isset($_POST['submitBtn'])) {
               
               $mem = $mysql->select("select * from _tbl_Members where MobileNumber='".$_POST['SMobileNumber']."' or MemberCode='".$_POST['SMobileNumber']."'");
            
                if (sizeof($mem)==1) {
                    $epin =$mysql->select("SELECT * FROM `_tblEpins` where `EPIN`='".$_POST['Epin']."' and `PINPassword`='".$_POST['PinPassword']."'");
                    
                    if (true)  {
                        
                        if ($epin[0]['IsUsed']==0) {
                            $data = md5($epin[0]['EPIN'].$epin[0]['PINPassword'].$epin[0]['EPINID']);
                            ?>
                            <form action="createmember.php" class="customform ajax-form" id="signupCForm" method="post">
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
<!--                                <div class="form-group">
                                    <label for="Epin">Voucher Number</label>
                                    <input type="text" class="form-control" readonly="readonly"  value="<?php echo $epin[0]['EPIN'];?>">
                                </div> -->
                                <button class="btn btn-primary" name="submitBtn" type="submit">Confirm & Continue</button>
                            </form>
                            <?php
                            $isSuccess=true;                   
                        } else {
                            $error = "Entered epin already used.";
                        }
                    } else {
                        $error = "Invalid epin & pin password.";
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
                <input id="Epin" class="form-control" name="SMobileNumber" type="text" placeholder="Enter your Sponsor Mobile Number" class="subject" required style="background:#fff">
            </div>
           <!-- <div class="form-group">
                <label for="username" class="placeholder">Voucher Number<span style="color:red">*</span></label><br>
                <input id="Epin" class="form-control" name="Epin" type="text" placeholder="Enter your voucher number" class="subject" required style="background:#fff">
            </div>
            <div class="form-group">
                <label for="password" class="placeholder">Voucher Key<span style="color:red">*</span></label><br>
                <input id="PinPassword" class="form-control" name="PinPassword" placeholder="Enter your voucher key" type="password" class="subject" required style="background:#fff">
            </div> -->
            <?php if (isset($error)) { ?>
            <div class="form-group">
                <label for="password" class="placeholder"><?php echo $error;?></label>
            </div>
            <?php } ?>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="submitBtn" value="Sign In">Continue</button>
            </div>
            <div style="text-align:center;font-size:15px;">Already a member? <a href="login.php" class="text-primary-hover" style="color:#F63854 !important; ">Login Now</a></div>
        </form>
    <?php } ?>       
        </div>
          
        </div>   
       </div> 
    </section>
<?php include_once("includes/footer.php"); ?>    