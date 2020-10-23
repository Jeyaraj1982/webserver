<?php
    if (isset($_POST['submitpassword'])) {
        
        $error=0;
        
        $txn = $mysql->select("select * from _tbl_transactions where txnid='".$_POST['TxnID']."'");
         if (sizeof($txn)==0) {
            $error++;
            $errormsg = "Invalid Transaction ID";  
        }
        
        
        if ($error==0) {
            $mysql->execute("update `_tbl_transactions` set `OperatorNumber`='".$_POST['OptrID']."' where txnid='".$_POST['TxnID']."'");  
            unset($_POST);
            ?>
            <script>
              $(document).ready(function() {
            
                    swal("Transaction ID Updated!", {
                        icon : "success" 
                    });
                 });
            </script>
            <?php
        }  else {
             ?>
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
            <li class="nav-item"><a href="dashboard.php?action=Setttings/ChangePassword">Transactions</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Setttings/ChangePassword">Operatr ID Update</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Operatr ID Update</div>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row"> 
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="email2">Tksd Txn ID</label>
                                    <input required class="form-control" id="TxnID" name="TxnID" value="<?php echo isset($_POST['TxnID']) ? $_POST['TxnID'] : "";?>" placeholder="Tksd Txn ID" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="email2">Operator ID</label>
                                    <input required class="form-control" id="OptrID" name="OptrID"  value="<?php echo isset($_POST['OptrID']) ? $_POST['OptrID'] : "";?>" placeholder="Operator ID" type="text">
                                </div>
                                
                                <div class="form-group">
                                    <input class="btn btn-primary" id="password"  value="Update"  name="submitpassword" type="submit">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>