<?php include_once("header.php");?>
     <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-9 align-self-center">
                        <h4 class="page-title">Change Password</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-3 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <div class="m-r-10 display-6 text-primary">
                                <i class="ti-user"></i>
                            </div>
                            <div class=""><small> </small>
                                <h4 class="text-primary m-b-0 font-medium"><?php echo $_SESSION['User']['MemberName'];?></h4></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="container-fluid">
                         

<div class="row">
<div class="col-12">
<div class="card">
                            <div class="card-body">
                             <?php
                                          
 
                   
 $mysqldb   = new MySqldatabase("localhost","ggcash_user","ggcash_user","ggcash_database");
                                                                                    
                       if (isset($_POST['submitpassword'])) {
                       $getpassword =$mysqldb->select("select * from _tbl_Members where MemberID='".$_SESSION['User']['MemberID']."'");
                            if ($getpassword[0]['MemberPassword']!=$_POST['CPassword']) {
                                echo "<span style='color:red'>Incorrect Current password.</span>";
                               
                            } 
                            if ($getpassword[0]['MemberPassword']==$_POST['CPassword']) {
                                $sqlQry = "update `_tbl_Members` set `MemberPassword`='".$_POST['CNPassword']."' where MemberID='".$_SESSION['User']['MemberID']."'";
                                $mysqldb->execute($sqlQry);  
                                echo "<span style='color:green'>Password Changed sucessfully.</span>"; 
                                unset($_POST);
                                 
                            }   
                       }                                   
                                         ?>
                                        <form action="" method="post">
                                <div class="tablesaw-bar tablesaw-mode-stack"></div> 
                                                    
                                  <div class="form-actions">
                                                <div class="form-group user-test" id="user-exists">
                                                    <label>Current Password</label>
                                                    <input type="Password" name="CPassword" id="CPassword" placeholder="Cureent Password" value="<?php echo (isset($_POST['CPassword']) ? $_POST['CPassword'] : "");?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter Username">
                                                    <div class="help-block"></div>
                                                    <div class="help-block"><p class="error" id="username-exists"></p></div>
                                                </div>
                                            </div>
                                              <div class="form-actions">
                                                <div class="form-group user-test" id="user-exists">
                                                    <label>New  Password</label>
                                                    <input type="Password" name="NPassword" id="NPassword" placeholder="New Password" value="<?php echo (isset($_POST['NPassword']) ? $_POST['NPassword'] : "");?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter Username">
                                                    <div class="help-block"></div>
                                                    <div class="help-block"><p class="error" id="username-exists"></p></div>
                                                </div>
                                            </div>
                                              <div class="form-actions">
                                                <div class="form-group user-test" id="user-exists">
                                                    <label>Confirm Password</label>
                                                    <input type="Password" name="CNPassword" id="CNPassword" placeholder="Confirm New Password" value="<?php echo (isset($_POST['CNPassword']) ? $_POST['CNPassword'] : "");?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter Username">
                                                    <div class="help-block"></div>
                                                    <div class="help-block"><p class="error" id="username-exists"></p></div>
                                                </div>
                                            </div>
                                <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary block-default" name="submitpassword">Change Password</button>
                                        </div>
                                    </div>
                                    </form>
                            </div>
                        </div>
</div>
</div>

<script src="https://gcchub.org/panel/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<script>
//=============================================//
//    File export                              //
//=============================================//
$('#file_export').DataTable({
dom: 'Bfrtip',
buttons: [
'copy', 'csv', 'excel', 'pdf', 'print'
]
});
$('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-cyan text-white mr-1');
</script>            </div>
            
            


         <?php include_once("footer.php"); ?>



 
