<?php
    $myprofile= $mysql->select("select * from _tbl_member where MemberID='".$_SESSION['User']['MemberID']."'");
?>
<div style="padding:0px;text-align:center;margin-bottom:20px;">
    <h5>My Profile</h5>
</div> 
    <?php if (isset($_POST['submitRequest'])) { ?>
        <script>$('#myModal').modal("show");</script>
        <?php
        
        $mysql->execute("update _tbl_member set MemberName='".$_POST['MemberName']."',
                                                EmailID='".$_POST['EmailID']."', 
                                                Gender='".$_POST['Gender']."', 
                                                PanCard='".$_POST['PanCard']."', 
                                                PersonName='".$_POST['PersonName']."', 
                                                AdhaarCard='".$_POST['AdhaarCard']."', 
                                                Address1='".$_POST['Address1']."', 
                                                Address2='".$_POST['Address2']."', 
                                                PostalCode='".$_POST['PostalCode']."', 
                                                GSTIN='".$_POST['GSTIN']."', 
                                                AccountHolderName='".$_POST['AccountHolderName']."', 
                                                AccountNumber='".$_POST['AccountNumber']."', 
                                                IFSCode='".$_POST['IFSCode']."', 
                                                AccountType='".$_POST['AccountType']."' 
                                                where MemberID='".$_SESSION['User']['MemberID']."'");
        
         $result['status']="success";
        echo "<script>$('#myModal').modal('hide');</script>";
        if ($result['status']=="success") {
            
        ?>
            <div class="row">
                <div style="padding:20px;text-align:center;width:100%;color:#666;line-height:25px;padding-bottom:0px;">
                   
                </div>
                <div style="padding:20px;text-align:center;width:100%;">
                         Profile Updated successfully
                </div>
                
                <a href="dashboard.php?action=settings_myprofile" class="btn btn-success  glow w-100 position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a>
            </div>
        <?php } ?>
    <?php } else { ?>
        <div class="row">
            <form action="" method="post" style="width: 80%;margin: 0px auto;" onsubmit="return checkInputs();">
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Your Distributor</label>
                    <input type="text"  value="<?php echo $_SESSION['User']['MapedToName'];?>" class="form-control"  disabled="disabled">
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Shop Name</label>
                    <input type="text"  value="<?php echo $myprofile[0]['MemberName'];?>" name="MemberName" class="form-control" placeholder="Shop Name" required>
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Person Name</label>
                    <input type="text"  value="<?php echo $myprofile[0]['PersonName'];?>" name="PersonName" class="form-control" placeholder="Person Name" required>
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Gender</label>
                    <select name="Gender" class="form-control">
                        <option value="Male" <?php echo $myprofile[0]['Gender']=="Male" ? " selected='selected' " : ""; ?> >Male</option>
                        <option value="Female" <?php echo $myprofile[0]['Gender']=="Female" ? " selected='selected' " : ""; ?>  >Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Mobile Number</label>
                    <input type="text"  value="<?php echo $myprofile[0]['MobileNumber'];?>" class="form-control"  disabled="disabled">
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Email</label>
                    <input type="text"  value="<?php echo $myprofile[0]['EmailID'];?>" name="EmailID" class="form-control" placeholder="Email" required>
                </div> 
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Address Line 1</label>
                    <input type="text"  value="<?php echo $myprofile[0]['Address1'];?>" name="Address1" class="form-control" placeholder="Address Line 1" required>
                </div>
                  <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Address Line 2</label>
                    <input type="text"  value="<?php echo $myprofile[0]['Address2'];?>" name="Address2" class="form-control" placeholder="Address Line 2" required>
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">PinCode</label>
                    <input type="text"  value="<?php echo $myprofile[0]['PostalCode'];?>" name="PostalCode" class="form-control" placeholder="Pin Code" required>
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Pancard</label>
                    <input type="text"  value="<?php echo $myprofile[0]['PanCard'];?>" name="PanCard" class="form-control" placeholder="Pancard Number" required>
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Aadhaar</label>
                    <input type="text"  value="<?php echo $myprofile[0]['AdhaarCard'];?>" name="AdhaarCard" class="form-control" placeholder="Aadhaar Card Number" required>
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">GST IN</label>
                    <input type="text"  value="<?php echo $myprofile[0]['GSTIN'];?>" name="GSTIN" class="form-control" placeholder="GST Number" required>
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Account Holder Name</label>
                    <input type="text"  value="<?php echo $myprofile[0]['AccountHolderName'];?>" name="AccountHolderName" class="form-control" placeholder="Account Holder Name" required>
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Account Number</label>
                    <input type="text"  value="<?php echo $myprofile[0]['AccountNumber'];?>" name="AccountNumber" class="form-control" placeholder="Account Number" required>
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">IFS Code</label>
                    <input type="text"  value="<?php echo $myprofile[0]['IFSCode'];?>" name="IFSCode" class="form-control" placeholder="IFS Code" required>
                </div>
                 <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Account Type</label>
                    <select name="AccountType" class="form-control">
                        <option value="Savings" <?php echo $myprofile[0]['AccountType']=="Savings" ? " selected='selected' " : ""; ?> >Saving Account</option>
                        <option value="Current" <?php echo $myprofile[0]['AccountType']=="Current" ? " selected='selected' " : ""; ?>  >Current Account</option>
                    </select>
                </div>
                <button type="submit" name="submitRequest" class="btn btn-success  glow w-100 position-relative">Save Profile</button><br><br>
                <a href="dashboard.php" class="btn btn-outline-success glow w-100 position-relative">Back<i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;"></i></a><br><br>
            </form>         
        </div>
    <?php } ?> 