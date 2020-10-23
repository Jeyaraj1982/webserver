<?php
    $myprofile= $mysql->select("select * from _tbl_member where MemberID='".$_SESSION['User']['MemberID']."'");
?>
<div style="padding:0px;text-align:center;margin-bottom:20px;">
    <h5>My Profile</h5>
</div> 
    <?php if (isset($_POST['submitRequest'])) { ?>
        <script>$('#myModal').modal("show");</script>
        <?php
        $number = $_POST['region']."-".$_POST['number'];
        $result = $application->doBillPay(array("MemberID"              => $_SESSION['User']['MemberID'],
                                                 "operator"             => $data[0]['OperatorLAPUCode'],
                                                 "CustomerMobileNumber" => $_POST['CustomerMobileNumber'],
                                                 "particulars"          => $data[0]['OperatorType']." TNEB ".$number,
                                                 "number"               => $_POST['MobileNumber'],
                                                 "PersonName"               => $_POST['PersonName'],
                                                 "markascredit"         => $_POST['markascredit'],         
                                                 "credit_nickname"      => $_POST['credit_nickname'],
                                                 "CrAmount"             => $_POST['CrAmount'],
                                                 "amount"               => $_POST['Amount']));
        echo "<script>$('#myModal').modal('hide');</script>";
        if ($result['status']=="success" || $result['status']=="requested") {
            
        ?>
            <div class="row">
                <div style="padding:20px;text-align:center;width:100%;color:#666;line-height:25px;padding-bottom:0px;">
                    <?php echo $result['number']; ?><br>
                    Rs. <?php echo $result['amount']; ?><br>
                </div>
                <div style="padding:20px;text-align:center;width:100%;">
                    Transaction <?php echo  $result['status'];?><br>
                    Trasaction Ref No: <?php echo $result['txnid'];?> <br>
                    Charges : <?php echo number_format($result['charged'],2);?> <br>
                    <?php if ($result['creditnote']==0) { ?>
                    <a href="dashboard.php?action=creditsales_addtxnt&back=txnhistory&txn=<?php echo $result['txnid'];?>" ><i id="icon-arrow" class="bx bxs-pin"></i><br>credit<br>sale</a>     <br>
                    <?php } ?>              
                </div>
                
                <a href="dashboard.php?action=bill_tneb" class="btn btn-success  glow w-100 position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a>
            </div>
        <?php } else {?>
            <div class="row">
                <div style="padding:20px;text-align:center;width:100%;color:#666;line-height:25px;padding-bottom:0px;">
                    <?php echo $result['number']; ?><br>
                    Rs. <?php echo $result['amount']; ?><br>
                </div>
                <div style="padding:20px;text-align:center;width:100%;color:red;line-height:25px;">
                    Transaction failed<br>
                    <?php echo $result['message']; ?>
                </div>
                <a href="dashboard.php?action=bill_tneb" class="btn btn-success  glow w-100 position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a><br><br>
                <a href="dashboard.php" class="btn btn-outline-success glow w-100 position-relative">Back<i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;"></i></a>
            </div>
        <?php } ?>
    <?php } else { ?>
        <div class="row">
            <form action="" method="post" style="width: 80%;margin: 0px auto;" onsubmit="return checkInputs();">
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Your Distributor</label>
                    <input type="text"  value="<?php echo $_SESSION['User']['MapedToName'];?>" class="form-control" disabled="disabled">
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Shop Name</label>
                    <input type="text"  value="<?php echo $myprofile[0]['MemberName'];?>" class="form-control" disabled="disabled">
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Person Name</label>
                    <input type="text"  value="<?php echo $myprofile[0]['PersonName'];?>" class="form-control" disabled="disabled">
                </div>

                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Gender</label>
                    <select  class="form-control" disabled="disabled">
                        <option value="Male" <?php echo $myprofile[0]['Gender']=="Male" ? " selected='selected' " : ""; ?> >Male</option>
                        <option value="Female" <?php echo $myprofile[0]['Gender']=="Female" ? " selected='selected' " : ""; ?>  >Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Mobile Number</label>
                    <input type="text"  value="<?php echo $myprofile[0]['MobileNumber'];?>" class="form-control" disabled="disabled">
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Email</label>
                    <input type="text"  value="<?php echo $myprofile[0]['EmailID'];?>" class="form-control" disabled="disabled">
                </div> 
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Address Line 1</label>
                    <input type="text"  value="<?php echo $myprofile[0]['Address1'];?>"  class="form-control"  disabled="disabled">
                </div>
                  <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Address Line 2</label>
                    <input type="text"  value="<?php echo $myprofile[0]['Address2'];?>"  class="form-control"  disabled="disabled">
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">PinCode</label>
                    <input type="text"  value="<?php echo $myprofile[0]['PostalCode'];?>"   class="form-control" disabled="disabled">
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Pancard</label>
                    <input type="text"  value="<?php echo $myprofile[0]['PanCard'];?>"   class="form-control"  disabled="disabled">
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Aadhaar</label>
                    <input type="text"  value="<?php echo $myprofile[0]['AdhaarCard'];?>"   class="form-control"  disabled="disabled">
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">GST IN</label>
                    <input type="text"  value="<?php echo $myprofile[0]['GSTIN'];?>"  class="form-control" disabled="disabled">
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Account Holder Name</label>
                    <input type="text"  value="<?php echo $myprofile[0]['AccountHolderName'];?>"  class="form-control"  disabled="disabled">
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Account Number</label>
                    <input type="text"  value="<?php echo $myprofile[0]['AccountNumber'];?>"  class="form-control" disabled="disabled">
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">IFS Code</label>
                    <input type="text"  value="<?php echo $myprofile[0]['IFSCode'];?>"  class="form-control" disabled="disabled">
                </div>
                 <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Account Type</label>
                    <select disabled="disabled" class="form-control">
                        <option value="Savings" <?php echo $myprofile[0]['AccountType']=="Savings" ? " selected='selected' " : ""; ?> >Saving Account</option>
                        <option value="Current" <?php echo $myprofile[0]['AccountType']=="Current" ? " selected='selected' " : ""; ?>  >Current Account</option>
                    </select>
                </div>
                  
                <a href="dashboard.php?action=settings_editprofile" class="btn btn-success glow w-100 position-relative">Edit Profile<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a><br><br>
                <a href="dashboard.php" class="btn btn-outline-success glow w-100 position-relative">Back<i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;"></i></a><br><br>
            </form>         
        </div>
    <?php } ?> 