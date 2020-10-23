 <?php

if (isset($_POST['deleteBtn']))  {
       $mysql->execute("update `_tbl_operator_plans` set `IsActive`='0' where  `PlanTableID`='".$_GET['id']."'");
       ?>   
        <script>
                swal("Plan details deleted", {
                    icon:"success",
                    confirm: {value: 'Continue'}
                }).then((value) => {
                    location.href='dashboard.php?action=RechargePlans/ViewOperatorPlan&OperatorCode=<?php echo $_GET['OperatorCode'];?>'
                });
            </script>
       <?php
       
}
 $Requests  = $mysql->select("SELECT * FROM _tbl_operators  where OperatorCode='".$_GET['OperatorCode']."'" );
    if (isset($_POST['submitBtn'])) {
    
        $error =0;
        
        if (!(strlen($_POST['Description'])>=5)) {
            $error++;
            $errormsg="Please enter valid description";
        }
        
        if (!($_POST['Amount']>=10)) {
            $error++;
            $errormsg="Invalid Amount.";
        }
        
        $duplicateAmt = $mysql->select("select * from _tbl_operator_plans where PlanTableID<>'".$_GET['id']."' and IsActive='1' and Amount='".$_POST['Amount']."' and  OperatorCode='".$_GET['OperatorCode']."'");
        if (sizeof($duplicateAmt)>0) {
           $error++;
           $errormsg="Duplicate amount."; 
        }
        
        if ($error==0) {
            $mysql->execute("update _tbl_operator_plans set OperatorCode='".$_GET['OperatorCode']."',
                                                       Description='".$_POST['Description']."',
                                                       Amount='".$_POST['Amount']."' where  PlanTableID='".$_GET['id']."'");
                                                       
            
            unset($_POST);
                                                       
            ?>
             <script>
                swal("Plan details updated", {
                    icon:"success",
                    confirm: {value: 'Continue'}
                });
            </script>
            <?php
                                                                 
        } else {
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
    $data = $mysql->select("select * from _tbl_operator_plans where PlanTableID='".$_GET['id']."'");
 ?>
  <div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=RechargePlans/List">Operators</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=RechargePlans/ViewOperatorPlan&OperatorCode=<?php echo $_GET['OperatorCode'];?>">Plans</a></li>
        </ul>
    </div> 
    <form action="" class="validation-wizard clearfix" role="application" id="steps-uid-7" novalidate="novalidate" method="post">    
    <div class="row">
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-b-0 text-orange "><i class="mdi mdi-account-multiple-plus  p-r-10"></i>Operator Plan Details</h4>
                    <span><?php echo $Requests[0]['OperatorName'];?></span>
                </div>
                <div class="card-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="form-group user-test" id="user-exists">
                                    <label>Description<span style="color:red">*</span></label>
                                    <input name="Description" id="Description" placeholder="Description" value="<?php echo isset($data[0]['Description']) ? $data[0]['Description'] : "";?>" class="form-control" required="" type="text">
                                    <div class="help-block"></div>
                                    <div class="help-block"><p class="error" id="username-exists"></p></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Amount<span style="color:red">*</span></label>
                                    <input name="Amount" placeholder="Amount" id="Amount" value="<?php echo isset($data[0]['Amount']) ? $data[0]['Amount'] : "";?>" class="form-control" required=""  type="number">
                                    <div class="help-block" style="color:red"><?php echo $errorMobile;?></div>
                                </div>
                            </div>
                        </div>
                        
                    <div class="col-12 p-b-20"><hr></div>
                    <div class="card-body"><div class="form-group m-b-0 text-right">
                        <a href="dashboard.php?action=RechargePlans/ViewOperatorPlan&OperatorCode=<?php echo $_GET['OperatorCode'];?>" class="btn btn-outline-primary waves-effect waves-light">Cancel</a>
                        <button type="submit" name="submitBtn" class="btn btn-primary waves-effect waves-light">Upadte Plan</button>
                        <button type="submit" name="deleteBtn" class="btn btn-danger waves-effect waves-light">Delete Plan</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>  