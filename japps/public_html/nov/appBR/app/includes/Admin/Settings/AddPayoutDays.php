<?php
    if (isset($_POST['SubmitBtn'])) {
        $error=0;
        if (strlen(trim($_POST['PayoutDay']))<1) {
            $error++;
            $errormsg = "You must provide Payout Day";  
        }
        $date =$mysql->select("select * from _tbl_payout_days where TxnDate='".$_POST['PayoutDay']."'"); 
        if(sizeof($date)>0){
           $error++;
           $errormsg = "Working Payout day already added";  
        } 
        
        if(!(date("l",strtotime($_POST['PayoutDay']))=="Saturday")) {
            $error++;
            $errormsg = "Working Payout day must be Saturday";   
        }    
        
        if ($error==0) {
            $id=$mysql->insert("_tbl_payout_days",array("TxnDate"       => $_POST['PayoutDay'])); 
            unset($_POST);
?>
            <script>
              $(document).ready(function() {
                    swal("Working Payout Day Added!", {
                        icon : "success" 
                    });
                 });
            </script>
<?php }  else { ?>
            <script>
              $(document).ready(function() {
                    swal("<?php echo $errormsg;?>", {
                        icon : "error" 
                    });
                 });
            </script>
<?php
      }  
    
    }       
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Settings/addPayoutDays">Settings</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Settings/AddPayoutDays">Add Working Payout Days</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Add Working Payout Days</div>
                </div>
                <div class="card-body"> 
                    <form action="" method="post">
                        <div class="form-group row">
                           <div class="col-sm-3">
                                <label>Working Payout Day</label>
                                <div class="input-group">
                                    <input type="text" class="form-control success" id="PayoutDay" name="PayoutDay" value="<?php echo isset($_POST['PayoutDay']) ? $_POST['PayoutDay'] : "";?>" required="" aria-invalid="false">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-calendar-check"></i>
                                        </span>
                                    </div>
                                </div>    
                            </div>
                           <div class="col-sm-2"><label>&nbsp;</label><br> <button type="submit" name="SubmitBtn" class="btn btn-primary">Save</button></div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#PayoutDay').datetimepicker({
            format: 'YYYY-MM-DD'
        });
       
    </script>