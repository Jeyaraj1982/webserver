<?php
$myprofile= $mysql->select("select * from _tbl_Members where MemberID='".$_SESSION['User']['MemberID']."'");

if (isset($_POST['submitRequest'])) {
    
    ?><script>$('#myModal').modal("show");</script><?php
    $mysql->execute("update _tbl_Members set MemberName  ='".$_POST['MemberName']."',
                                             EmailID     ='".$_POST['EmailID']."', 
                                             PersonName  ='".$_POST['PersonName']."', 
                                             Address1    ='".$_POST['Address1']."', 
                                             Address2    ='".$_POST['Address2']."', 
                                             PostalCode  ='".$_POST['PostalCode']."' 
                                                where MemberID='".$_SESSION['User']['MemberID']."'");
    $result['status']="success";
    echo "<script>$('#myModal').modal('hide');</script>";
    ?>
    <div class="row">
        <div style="padding:20px;text-align:center;width:100%;color:#666;line-height:25px;padding-bottom:0px;">
        </div>
        <div style="padding:20px;text-align:center;width:100%;">
            Profile Updated successfully
        </div>
        <a href="dashboard.php?action=settings_myprofile" class="btn btn-success  glow w-100 position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a>
    </div>
<?php } else { ?>
    <div class="main-panel">
        <div class="container" style="margin-top:0px !important">
            <div class="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="background: none;">
                            <div class="card-header">
                                <div class="card-title" style="text-align: center;">My Profile</div>
                            </div>
                            <div class="card-body" style="padding:0px;">
                                <form action="" method="post">
                                    <div class="row" style="margin-bottom:5px;">
                                        <label for="exampleInputEmail1" style="text-transform: none;">Shop Name</label>
                                        <input type="text"  value="<?php echo $myprofile[0]['MemberName'];?>" name="MemberName" class="form-control" placeholder="Shop Name" required>
                                    </div>
                                    <div class="row" style="margin-bottom:5px;">
                                        <label for="exampleInputEmail1" style="text-transform: none;">Person Name</label>
                                        <input type="text"  value="<?php echo $myprofile[0]['PersonName'];?>" name="PersonName" class="form-control" placeholder="Person Name" required>
                                    </div>
                                    <div class="row" style="margin-bottom:5px;">
                                        <label for="exampleInputEmail1" style="text-transform: none;">Mobile Number</label>
                                        <input type="text"  value="<?php echo $myprofile[0]['MobileNumber'];?>" class="form-control"  disabled="disabled">
                                    </div>
                                    <div class="row" style="margin-bottom:5px;">
                                        <label for="exampleInputEmail1" style="text-transform: none;">Email</label>
                                        <input type="text"  value="<?php echo $myprofile[0]['EmailID'];?>" name="EmailID" class="form-control" placeholder="Email" required>
                                    </div> 
                                    <div class="row" style="margin-bottom:5px;">
                                        <label for="exampleInputEmail1" style="text-transform: none;">Address Line 1</label>
                                        <input type="text"  value="<?php echo $myprofile[0]['Address1'];?>" name="Address1" class="form-control" placeholder="Address Line 1" required>
                                    </div>
                                    <div class="row" style="margin-bottom:5px;">
                                        <label for="exampleInputEmail1" style="text-transform: none;">Address Line 2</label>
                                        <input type="text"  value="<?php echo $myprofile[0]['Address2'];?>" name="Address2" class="form-control" placeholder="Address Line 2" required>
                                    </div>
                                    <div class="row" style="margin-bottom:5px;">
                                        <label for="exampleInputEmail1" style="text-transform: none;">PinCode</label>
                                        <input type="text"  value="<?php echo $myprofile[0]['PostalCode'];?>" name="PostalCode" class="form-control" placeholder="Pin Code" required>
                                    </div>
                                    <div class="row" style="margin-top:25px;margin-bottom:10px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12" style="padding: 0px;">
                                        <button type="button" class="btn btn-black" onclick="location.href='dashboard.php?action=settings_myprofile';" style="background:#6c757d !important;width: 46%;">Back</button>
                                        <button type="submit" class="btn btn-danger" name="submitRequest" style="width: 46%;float:right">Save Profile</button>
                                    </div>                                        
                                </div>
                                </form>         
                            </div>
                        </div>
                   </div>
                </div>
          </div>
        </div>
    </div>
<?php } ?> 