<?php
    $myprofile= $mysql->select("select * from _tbl_Members where MemberID='".$_SESSION['User']['MemberID']."'");
    $mydistributor= $mysql->select("select * from _tbl_Members where MemberID='".$_SESSION['User']['MapedTo']."'");
?>

    <?php if (isset($_POST['submitRequest'])) { ?>
        <script>$('#myModal').modal("show");</script>
        <?php
         
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
    <div class="main-panel">
        <div class="container" style="margin-top:0px !important">
            <div class="page-inner">
                <div class="row">
                    <div class="col-md-12" style="padding: 5px;">
                        <div class="card" style="background: none;">
                            <div class="card-header">
                                <div class="card-title" style="text-align: center;">My Profile</div>
                            </div>
                            <div class="card-body" style="padding:0px">
                            <form action="" method="post">
                            <?php if ($_SESSION['User']['IsMember']=="1") { ?>
                                <div class="row" style="margin-bottom:5px;">
                                    <div class="col-md-12"> 
                                        <label for="exampleInputEmail1" style="text-transform:none ;"><b>My Distributor</b></label>
                                        <div class="controls">                  
                                            <label style="text-transform:none ;"><?php echo $_SESSION['User']['MapedToName'];?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:5px;">
                                    <div class="col-md-12"> 
                                        <label for="exampleInputEmail1" style="text-transform:none ;"><b>My Distributor Contact No</b></label>
                                        <div class="controls">                  
                                            <label style="text-transform:none ;"><?php echo $mydistributor[0]['MobileNumber'];?></label>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="row" style="margin-bottom:5px;">
                                    <div class="col-md-12"> 
                                        <label for="exampleInputEmail1" style="text-transform:none ;"><b>Shop Name</b></label>
                                        <div class="controls">                  
                                            <label style="text-transform:none ;"> <?php echo $myprofile[0]['MemberName'];?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:5px;">
                                    <div class="col-md-12"> 
                                        <label for="exampleInputEmail1" style="text-transform:none ;"><b>Person Name</b></label>
                                        <div class="controls">                  
                                            <label style="text-transform:none ;"> <?php echo $myprofile[0]['PersonName'];?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:5px;">
                                    <div class="col-md-12"> 
                                        <label for="exampleInputEmail1" style="text-transform:none ;"><b>Mobile Number</b></label>
                                        <div class="controls">                  
                                            <label style="text-transform:none ;"> <?php echo $myprofile[0]['MobileNumber'];?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:5px;">
                                    <div class="col-md-12"> 
                                        <label for="exampleInputEmail1" style="text-transform:none ;"><b>Email</b></label>
                                        <div class="controls">                  
                                            <label style="text-transform:none ;"> <?php echo $myprofile[0]['EmailID'];?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:5px;">
                                    <div class="col-md-12"> 
                                        <label for="exampleInputEmail1" style="text-transform:none ;"><b>Address Line 1</b></label>
                                        <div class="controls">                  
                                            <label style="text-transform:none ;"> <?php echo $myprofile[0]['Address1'];?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:5px;">
                                    <div class="col-md-12"> 
                                        <label for="exampleInputEmail1" style="text-transform:none ;"><b>Address Line 2</b></label>
                                        <div class="controls">                  
                                            <label style="text-transform:none ;"> <?php echo $myprofile[0]['Address2'];?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:5px;">
                                    <div class="col-md-12"> 
                                        <label for="exampleInputEmail1" style="text-transform:none ;"><b>PinCode</b></label>
                                        <div class="controls">                  
                                            <label style="text-transform:none ;"> <?php echo $myprofile[0]['PostalCode'];?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top:25px;margin-bottom:10px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button type="button" class="btn btn-black" onclick="location.href='dashboard.php?action=settings';" style="background:#6c757d !important;width: 46%;">Back</button>
                                        <button type="button" class="btn btn-danger" onclick="location.href='dashboard.php?action=settings_editprofile';" style="width: 46%;float:right">Edit Profile</button>
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
