<script>
var TotalEpins = 0;
</script>
<?php
   
    $package=$mysql->select("SELECT * FROM `_tbl_Settings_Packages` where PackageID='".$_GET['Package']."'");                           
 
    $records=$mysql->select("
    
    select *,_tbl_Settings_Packages.FileName from 
    (SELECT * FROM _tblEpins where PackageID='".$_GET['Package']."' and IsUsed='0' and (CreatedByID='".$_SESSION['User']['MemberID']."' or OwnToID='".$_SESSION['User']['MemberID']."') ) as t1 
    
    left join  _tbl_Settings_Packages
    on _tbl_Settings_Packages.PackageID=t1.PackageID
    
    ");
    
    $title = "All Epins";
    $error = "No EPins found";
                                                                                                       
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=EPins/TransferEpins">EPins</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=EPins/TransferEpins">Request To Transfer EPins</a></li>
        </ul>
    </div>                             
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Request To Transfer EPins</h4>
                </div>
                <form action="dashboard.php?action=EPins/Transfer/Confirmation&Package=<?php echo $_GET['Package'];?>" method="post"  >
                <div class="card-body">
                    <div class="form-group">
                        <label>Member ID<span style="color:red">*</span></label>
                        <input name="MemberID" id="MemberID" placeholder="Member ID" value="<?php echo isset($_POST['MemberID']) ? $_POST['MemberID'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter MemberID" type="text">
                        <div class="help-block" style="color: red"><?php echo $errorMemberPassword;?></div>
                    </div>
                    <div class="form-group"
                        <label><?php echo $package[0]['PackageName'];?> Epins ID<span style="color:red">*</span></label>
                        <div class="table-responsive" style="height: 200px;overflow:auto;">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th style="width: 50px;"></th>
                                    <th style="width: 100px;"><label>E-Pin</label></th>
                                    <th><label>Pin Password</label></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (sizeof($records)==0) { ?>
                                <tr>
                                    <td colspan="6" style="text-align:center;"><?php echo $error;?></td>
                                </tr>
                                <?php } ?>
                                <?php 
                                $i=1;
                                foreach ($records as $Transaction){ 
                                    
                                    ?>
                                <tr>
                                    <td><input type="checkbox" id="pins_<?php echo $i;?>" name="pins[]" value="<?php echo $Transaction['EPIN'];?>"></td>
                                    <td><?php echo $Transaction['EPIN'];?></td>
                                    <td><?php echo $Transaction['PINPassword'];?></td>
                                </tr>
                                <?php }?> 
                            </tbody>
                        </table>
                    </div>
                    </div>
                    <div class="form-group m-b-0 text-right">
                        <button type="submit" name="submitBtn" class="btn btn-primary waves-effect waves-light">Transfer Now</button>
                        <button type="submit" class="btn btn-danger waves-effect waves-light">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
         TotalEpins = <?php echo $i;?>;
         function before_submit() {
             var c=0;
             for(i=1;i<=TotalEpins;i++){
                 if(document.getElementById('pins_'+i).checked) {
                    c++;
                 } 
             }
             if (c==0) {
                 swal({
                     title:'Please select members',
  icon: "error",
});
                 return false;
             } else {
                 return true;
             }
         }
</script>