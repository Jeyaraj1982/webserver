<div style="padding:0px;text-align:center;margin-bottom:20px;">
    <h5>Create Agent</h5>
</div> 
<div class="row" id="title_" style="padding-bottom:30px">
    <img src="assets/img/new_agents.png" style="width:25%;border:1px solid #ccc;border-radius:10px;margin:0px auto">    
</div>
<?php if ($_SESSION['User']['IsDistributor']==1) { ?>
    <?php if (isset($_POST['submitRequest'])) { ?>
        <script>$('#myModal').modal("show");</script>
        <?php
        
           $error =0;
        
        
        if (!($_POST['MobileNumber']>6000000000 && $_POST['MobileNumber']<9999999999)) {
            $error++;
            $result['status']="failed";
           $result['message']="Invalid mobile number. Please try again.";
        }
        
        $duplicateMobile = $mysql->select("select * from _tbl_member where MobileNumber='".$_POST['MobileNumber']."'");
        if (sizeof($duplicateMobile)>0) {
           $error++;
           $result['status']="failed";
           $result['message']="Mobile Number already in use.";
        }
        
        if ($error==0) {
            $MemberID =  $mysql->insert("_tbl_member",array("MemberName"      => $_POST['MemberName'],
                                                            "PersonName"      => $_POST['PersonName'],
                                                            "MobileNumber"    => $_POST['MobileNumber'],
                                                            "MemberPassword"  => $_POST['Password'],
                                                            "IsDistributor"   => "0",
                                                            "IsMember"        => "1",
                                                            "IsActive"        => "1",
                                                            "IsAPI"           => "0",
                                                            "MapedTo"         => $_SESSION['User']['MemberID'],
                                                            "MapedToName"     => $_SESSION['User']['MemberName'],
                                                            "CreatedOn"       => date("Y-m-d H:i:s")));
            $d = MobileSMS::sendSMS($_POST['MobileNumber'],"Dear Agent, your account created. Your login Name: ".$_POST['MobileNumber']." and Password: ".$_POST['Password'],$MemberID);
            $result['status']="success";
            
             
                                 
       
             
             $selectedOperators =  $mysql->select("Select OperatorCode from _tbl_operators where MemberID='".$_SESSION['User']['MemberID']."' "); 
             foreach($selectedOperators as $operator) {
                $mysql->insert("_tbl_member_operator",array("MemberID"=>$MemberID,"OperatorCode"=>$operator['OperatorCode']));
             } 
                                 
        } 
        
        
        echo "<script>$('#myModal').modal('hide');$('#title_').hide();</script>";
        if ($result['status']=="success") {
        ?>
            <div class="row">
                <div style="padding:20px;text-align:center;width:100%;color:#666;line-height:25px;padding-bottom:0px;">
                    <img src="assets/img/success.png" style="width:250px">
                </div>
                <div style="padding:20px;text-align:center;width:100%;">
                    Agent Created
                </div>
                <a href="dashboard.php?action=agent_new" class="btn btn-success  glow w-100 position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a>
            </div>
        <?php } else {?>
            <div class="row">
                <div style="padding:20px;text-align:center;width:100%;color:#666;line-height:25px;padding-bottom:0px;">
                    <img src="assets/img/failure.png" style="width:250px">
                </div>
                <div style="padding:20px;text-align:center;width:100%;color:red;line-height:25px;">
                    Agent creation failed<br>
                    <?php echo $result['message']; ?>
                </div>
                <a href="dashboard.php?action=agent_new" class="btn btn-success  glow w-100 position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a><br><br>
                <a href="dashboard.php?action=agents_manage" class="btn btn-outline-success glow w-100 position-relative">Back<i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;"></i></a>
            </div>
        <?php } ?>
    <?php } else { ?>                     
        <div class="row">
            <form action="" method="post" style="width: 80%;margin: 0px auto;">
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Shop Name<span style="color:red">*</span></label>
                    <input type="text"  value="<?php echo isset($_POST['MemberName']) ? $_POST['MemberName'] : "";?>"   name="MemberName" id="MemberName" class="form-control" id="exampleInputEmail1" placeholder="Shop Name" required="">
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Person Name<span style="color:red">*</span></label>
                    <input type="text"  value="<?php echo isset($_POST['PersonName']) ? $_POST['PersonName'] : "";?>"   name="PersonName" id="PersonName" class="form-control" id="exampleInputEmail1" placeholder="Person Name" required="">
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Mobile Number<span style="color:red">*</span></label>
                    <input type="number"  value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : "";?>" maxlength="10" name="MobileNumber" id="MobileNumber" class="form-control" id="exampleInputEmail1" placeholder="Mobile Number" required="">
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Password<span style="color:red">*</span></label>
                    <input type="password"  value="<?php echo isset($_POST['Amount']) ? $_POST['Amount'] : "";?>" maxlength="10" name="Password" id="Password" class="form-control" placeholder="Password" required="">
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Confirm Password<span style="color:red">*</span></label>
                    <input type="password"  value="<?php echo isset($_POST['CPassword']) ? $_POST['CPassword'] : "";?>" maxlength="10" name="CPassword" id="CPassword" class="form-control" placeholder="Confrim Password" required="">
                </div>
                <div class="form-group">
                    <p align="center" style="color:red">&nbsp;<?php echo $error;?></p>
                </div>
                <button type="submit" name="submitRequest" class="btn btn-success  glow w-100 position-relative">Create Agent<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></button><br><br>
                <a href="dashboard.php?action=agents_manage" class="btn btn-outline-success glow w-100 position-relative">Back<i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;"></i></a>
            </form>         
        </div>
    <?php } ?>
<?php } else { ?>
<div class="row">
    <div style="padding:20px;color:red;text-align:center;width:100%;">Permission denied. please contact administrator</div>
    <div style="width: 100%"><a href="dashboard.php?action=agents_manage" class="btn btn-success  glow w-100 position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a></div>
    <div style="width:100%;padding-top:15px"><a href="dashboard.php?action=agents_manage" class="btn btn-outline-success glow w-100 position-relative"><i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;">Back</i></a></div>
</div>
<?php } ?>
