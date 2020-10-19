<?php
   
    if (isset($_POST['submitBtn'])) {
        
        $member = $mysql->select("select * from `_tbl_Members` where `MemberCode`='".trim($_POST['MemberID'])."'");
        
        $_SESSION['tmp']=$_POST;
        $_SESSION['tmp']['otp']=rand(9999,99999);
        $_SESSION['tmp']['member']=$member[0];
        $id=array();
        foreach($_POST['pins'] as $p) {
             $id[] = "'".$p."'";
        }
       // print_r($_POST);
    
    
    $package=$mysql->select("SELECT * FROM `_tbl_Settings_Packages` where PackageID='".$_GET['Package']."'");                           
 
  
    $records=$mysql->select("
    
    select *,_tbl_Settings_Packages.FileName from 
    (SELECT * FROM _tblEpins where EPIN in (".implode(",",$id).") and IsUsed='0' and (CreatedByID='".$_SESSION['User']['MemberID']."' or OwnToID='".$_SESSION['User']['MemberID']."') ) as t1 
    
    left join  _tbl_Settings_Packages
    on _tbl_Settings_Packages.PackageID=t1.PackageID
    
    ");
    
    $title = "All Epins";
    $error = "No EPins found";
    $error=0;
    $errormessage = "";
    if (sizeof($records)==0) {
        $error++;
        $errormessage .="<br>Epins not found";
    }
    
    
    if (sizeof($member)==0) {
        $error++;
        $errormessage .="<br>Member not found";
    }
    
    if ($_POST['MemberID']==$_SESSION['User']['MemberCode']) {
        $error++;
        $errormessage .="<br>Transfer not allow to self Member";
    }
    
     
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=EPins/MyPins">EPins</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=EPins/MyPins">Confirmation To Transfer EPins</a></li>
        </ul>
    </div>                             
    <div class="row">                                    
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Confirmation to Transfer EPins</h4>
                </div>
                <div class="card-body">
                    <?php if ($error==0) {?>
                    <form action="dashboard.php?action=EPins/Transfer/Verification" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Member Code</label>
                                    <input value="<?php echo $member[0]['MemberCode'];?>" class="form-control" disabled="disabled" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Member Name</label>
                                    <input value="<?php echo $member[0]['MemberName'];?>" class="form-control" disabled="disabled" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Selected EPins</label>                
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table table-striped table-hover" >
                                        <thead>
                                            <tr>
                                                <th style="width: 60px;"></th>
                                                <th style="width: 100px;"><label>E-Pin</label></th>
                                                <th><label>Pin Password</label></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (sizeof($records)==0) { ?>
                                            <tr>
                                                <td colspan="3" style="text-align:center;"><?php echo $error;?></td>
                                            </tr>
                                            <?php } ?>
                                            <?php foreach ($records as $Transaction){ ?>         
                                            <tr>
                                                <td><img src="assets/img/<?php echo $Transaction['FileName'];?>" style="width: 48px;"></td>
                                                <td><?php echo $Transaction['EPIN'];?></td>
                                                <td><?php echo $Transaction['PINPassword'];?></td>
                                            </tr>
                                            <?php }?> 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-b-0 text-right">
                            <button type="submit" name="submitBtn" class="btn btn-primary waves-effect waves-light">Transfer Now</button>
                            <a href="dashboard.php" class="btn btn-danger waves-effect waves-light">Cancel</a>
                        </div>
                    </form>
                <?php } else {?>
                    <div class="form-group">
                        <span><?php echo $errormessage;?></span> <br><br>
                        Click here to <a href='dashboard.php?action=EPins/Transfer/TransferEpins'>continue</a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php } else {?>
<script>
location.href='dashboard.php';
</script>
<?php } ?>