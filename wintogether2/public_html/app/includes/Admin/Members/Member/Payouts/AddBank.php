<?php
   $BankDetails =$mysql->select("select * from _tbl_bank_names order by BankName");  
   
         if (isset($_POST['btnAddBank'])) {
             
             $error=0;

             $dupBank = $mysql->select("select * from  _tbl_member_bank_details where AccountNumber='".$_POST['AccountNumber']."'");
              if (sizeof($dupBank)>0) {
                 $errormsg = "Failed to add Bank Information. Account Number already exits";
                 $error++;
             }
             
             if (strlen(trim($_POST['IFSCode']))==0) {
                 $errormsg = "Invalid IFS Code";
                 $error++;
             }
             
             if (strlen(trim($_POST['AccountName']))==0) {
                 $errormsg = "Invalid Account Name";
                 $error++;
             }
             
             if (strlen(trim($_POST['AccountNumber']))==0) {
                 $errormsg = "Invalid Account Number";
                 $error++;
             }
             
          
             if ($error==0) {
                              
                  $SelBankDetails =$mysql->select("select * from _tbl_bank_names where BankID='".$_POST['BankName']."'"); 
                 
                 $id=$mysql->insert("_tbl_member_bank_details",array("MemberID"     =>$_SESSION['User']['MemberID'],
                                                                     "BankName"     => $SelBankDetails[0]['BankName'],
                                                                     "AccountNumber"=>$_POST['AccountNumber'],
                                                                     "IFSCode"      =>$_POST['IFSCode'],
                                                                     "AccountName"  =>$_POST['AccountName'],
                                                                     "CreatedOn"    =>date("Y-m-d H:i:s"))); 
                 unset($_POST);
             ?>   
             <script>
                $(document).ready(function() {
                    swal("Bank Details added successfully!", {
                        icon : "success" 
                    });
                 });
            </script>
            <?php } else { ?>
            <script>
                $(document).ready(function() {
                swal("<?php echo $errormsg;?>", {
                        icon : "error" 
                    });
                 });
            </script>
            <?php }   ?>
         <?php } ?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Payouts/AddBank">Payouts</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Payouts/AddBank">Add Bank Information</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Add Bank Information</div>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row"> 
                            <div class="col-md-9">
                                 <div class="form-group">
                                    <label for="email2">Account Holder's Name</label>
                                    <input class="form-control" id="AccountName" name="AccountName" value="<?php echo isset($_POST['AccountName']) ? $_POST['AccountName'] : "";?>" placeholder="Account Holder's Name" type="text">
                                </div>
                                
                                 <div class="form-group">
                                    <label for="email2">Account Number</label>
                                    <input class="form-control" id="AccountNumber" name="AccountNumber" value="<?php echo isset($_POST['AccountNumber']) ? $_POST['AccountNumber'] : "";?>" placeholder="Account Number" type="text">
                                </div>
                                
                                 <div class="form-group">
                                    <label for="email2">IFS Code</label>
                                    <input class="form-control" id="IFSCode" name="IFSCode" value="<?php echo isset($_POST['IFSCode']) ? $_POST['IFSCode'] : "";?>" placeholder="IFS Code" type="text">
                                </div>
                                 <div class="form-group">
                                    <label for="email2">Bank Name</label>
                                    <div class="select2-input">
                                        <select id="basic"  name="BankName" class="form-control">
                                            <?php foreach($BankDetails as $BankDetail){ ?>
                                            <option value="<?php echo $BankDetail['BankID'];?>" <?php echo $_POST['BankName']==$BankDetail['BankID'] ? " selected='selected' " : "";?>><?php echo $BankDetail['BankName'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <input class="btn btn-primary" name="btnAddBank" value="Save Bank Information"   type="submit">
                                    &nbsp;&nbsp;<a href="dashboard.php?action=Payouts/ManageBanks">View all bank accounts</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 
<script>
 $(document).ready(function() {
 $('#basic').select2({
            theme: "bootstrap"
        });

        });
</script> 