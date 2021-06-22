 <?php
 
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
        
        $duplicateAmt = $mysql->select("select * from _tbl_operator_plans where IsActive='1' and Amount='".$_POST['Amount']."' and  OperatorCode='".$_GET['OperatorCode']."'");
        if (sizeof($duplicateAmt)>0) {
           $error++;
           $errormsg="Duplicate amount."; 
        }
        
        if ($error==0) {
            $mysql->insert("_tbl_operator_plans",array("OperatorCode"=>$_GET['OperatorCode'],
                                                       "Description"=>$_POST['Description'],
                                                       "Amount"=>$_POST['Amount'],
                                                       "Category"=>$_POST['Category'],
                                                       "IsActive"=>"1"));
            
            unset($_POST);
                                                       
            ?>
             <script>
                swal("Plan details added", {
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
                            <div class="col-md-7">
                                <div class="form-group user-test" id="user-exists">
                                    <label>Description<span style="color:red">*</span></label>
                                    <input name="Description" id="Description" placeholder="Description" value="<?php echo isset($_POST['Description']) ? $_POST['Description'] : "";?>" class="form-control" required="" type="text">
                                    <div class="help-block"></div>
                                    <div class="help-block"><p class="error" id="username-exists"></p></div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Amount<span style="color:red">*</span></label>
                                    <input name="Amount" placeholder="Amount" id="Amount" value="<?php echo isset($_POST['Amount']) ? $_POST['Amount'] : "";?>" class="form-control" required=""  type="number">
                                    <div class="help-block" style="color:red"><?php echo $errorMobile;?></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Category<span style="color:red">*</span></label>
                                    <select name="Category" class="form-control">
                                    <?php $category = $mysql->select("select * from _tbl_plancategory where OperatorCode='".$_GET['OperatorCode']."'");
                                    foreach($category as $c) {
                                        ?>
                                        <option value="<?php echo $c['PlanCategory'];?>"><?php echo $c['CategoryName'];?></option>
                                        <?php
                                    }
                                    ?>
                                     </select>
                                    <div class="help-block" style="color:red"><?php echo $errorMobile;?></div>
                                </div>
                            </div>

                        </div>
                        
                    <div class="col-12 p-b-20"><hr></div>
                    <div class="card-body"><div class="form-group m-b-0 text-right">
                        <a href="dashboard.php?action=RechargePlans/ViewOperatorPlan&OperatorCode=<?php echo $_GET['OperatorCode'];?>" class="btn btn-outline-primary waves-effect waves-light">Cancel</a>
                        <button type="submit" name="submitBtn" class="btn btn-primary waves-effect waves-light">Create Plan</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>  