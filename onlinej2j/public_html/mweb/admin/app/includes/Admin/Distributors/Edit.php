 <?php
    if (isset($_POST['submitBtn'])) {
        $error =0;
                                 
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
        if (!(preg_match($regex, strtolower($_POST['EmailID'])))) {
            $error++;
            $errorEmail="Email is an invalid email. Please try again.";
        } 
        
        if (!($_POST['MobileNumber']>6000000000 && $_POST['MobileNumber']<9999999999)) {
            $error++;
            $errorMobile="Invalid mobile number. Please try again.";
        }
                                                                                
        if ($error==0) {
          $MemberID =  $mysql->execute("update _tbl_member set MemberName      = '".$_POST['MemberName']."',
                                                               MobileNumber    = '".$_POST['MobileNumber']."',
                                                               PersonName      = '".$_POST['PersonName']."',
                                                               EmailID         = '".$_POST['EmailID']."',
                                                               MemberPassword  = '".$_POST['MemberPassword']."',
                                                               Gender          = '".$_POST['Gender']."',
                                                               PanCard         = '".$_POST['PanCard']."',
                                                               AdhaarCard      = '".$_POST['AdhaarCard']."',
                                                               Address1        = '".$_POST['Address1']."',
                                                               BillCharge      = '".$_POST['BillCharge']."',
                                                               IsActive        = '".$_POST['IsActive']."',
                                                               MAB_Enabled     = '".$_POST['MAB_Enabled']."',
                                                               Address2        = '".$_POST['Address2']."',
                                                               MoneyTransferLimit = '".$_POST['MoneyTransferLimit']."',
                                                               MoneyTransfer   = '".$_POST['MoneyTransfer']."',
                                                               DepositAmount   = '".$_POST['DepositAmount']."',
                                                               PostalCode      = '".$_POST['PostalCode']."'
                                                               where MemberID  ='".$_GET['Distributor']."'");
          $mysql->execute("update `_tbl_member` set MapedToName='".$_POST['MemberName']."' where MapedTo='".$_GET['Distributor']."'");
             ?>
             <script>                                     
             alert("updated successfully");
             </script>
             <?php
          }
    } 
     $data = $mysql->select("select * from _tbl_member where MemberID='".$_GET['Distributor']."'");
 ?>
  <div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Distributors/New">Distributors</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Distributors/List">Edit Distributor</a></li>
        </ul>
    </div> 
    <form action="" class="validation-wizard clearfix" role="application" id="steps-uid-7" novalidate="novalidate" method="post">    
     
    <div class="row">
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-b-0 text-orange "><i class="mdi mdi-account-multiple-plus  p-r-10"></i>Distributor Details</h4>
                </div>
                <div class="card-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="form-group user-test" id="user-exists">
                                    <label>Shop Name<span style="color:red">*</span></label>
                                    <input name="MemberName" id="MemberName" placeholder="Distributor Name" value="<?php echo isset($_POST['MemberName']) ? $_POST['MemberName'] :  $data[0]['MemberName'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter Distributor shop name" type="text">
                                    <div class="help-block"></div>
                                    <div class="help-block"><p class="error" id="username-exists"></p></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-md-6 ">
                                <div class="form-group user-test" id="user-exists">
                                    <label>Distributor's Name<span style="color:red">*</span></label>
                                    <input name="PersonName" id="PersonName" placeholder="Person Name" value="<?php echo isset($_POST['PersonName']) ? $_POST['PersonName'] :  $data[0]['PersonName'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter Distributor name" type="text">
                                    <div class="help-block"></div>
                                    <div class="help-block"><p class="error" id="username-exists"></p></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mobile Number<span style="color:red">*</span></label>
                                    <input name="MobileNumber" placeholder="Mobile Number" id="MobileNumber" value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : $data[0]['MobileNumber'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter mobile number" type="text">
                                    <div class="help-block"  style="color:red"><?php echo $errorMobile;?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" id="email-exists">
                                    <label>Email<span style="color:red">*</span></label>
                                    <input name="EmailID" id="EmailID" placeholder="Email" value="<?php echo isset($_POST['EmailID']) ? $_POST['EmailID'] : $data[0]['EmailID'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter email id" type="text">
                                    <div class="help-block" style="color:red"><?php echo $errorEmail;?></div>
                                    <div class="help-block"><p class="error" id="emailid-exists" style="color:red"></p></div>
                                </div>
                            </div>                                
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Gender<span style="color:red">*</span></label>
                                    <select class="form-control" name="Gender" id="Gender">
                                        <option value="Male">Male</option> 
                                        <option value="Female">Female</option> 
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Pancard</label>
                                    <input name="PanCard" id="PanCard" placeholder="PAN Card Number" value="<?php echo isset($_POST['PanCard']) ? $_POST['PanCard'] : $data[0]['PanCard'];?>" class="form-control"    data-validation-required-message="Please enter Pancard number" type="text">
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Aadhaar Card</label>
                                    <input name="AdhaarCard" id="AdhaarCard" placeholder="Adhaar Card Number" value="<?php echo isset($_POST['AdhaarCard']) ? $_POST['AdhaarCard'] : $data[0]['AdhaarCard'];?>" class="form-control"    data-validation-required-message="Please enter Adhaar Card Number" type="text">
                                    <div class="help-block"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address Line 1<span style="color:red">*</span></label>
                                    <input name="Address1" id="Address1" placeholder="Address Line 1" value="<?php echo isset($_POST['Address1']) ? $_POST['Address1'] : $data[0]['Address1'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter Address Line1" type="text">
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address Line 2</label>
                                    <input name="Address2" id="Address2" placeholder="Address Line 2" value="<?php echo isset($_POST['Address2']) ? $_POST['Address2'] : $data[0]['Address2'];?>" class="form-control"   data-validation-required-message="Please enter Address Line 2" type="text">
                                    <div class="help-block"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Pincode<span style="color:red">*</span></label>
                                    <input name="PostalCode" id="PinCode" placeholder="PostalCode" value="<?php echo isset($_POST['PostalCode']) ? $_POST['PostalCode'] : $data[0]['PostalCode'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter PinCode" type="text">
                                    <div class="help-block"></div>
                                </div>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Password<span style="color:red">*</span></label>
                                    <input name="MemberPassword" id="MemberPassword" placeholder="Password" value="<?php echo isset($_POST['MemberPassword']) ? $_POST['MemberPassword'] : $data[0]['MemberPassword'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter Password" type="text">
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Confirm Password<span style="color:red">*</span></label>
                                    <input name="CMemberPassword" id="CMemberPassword" placeholder="Confirm Password" value="<?php echo isset($_POST['MemberPassword']) ? $_POST['MemberPassword'] : $data[0]['MemberPassword'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter Confirm Password" type="text">
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Deposit Amount<span style="color:red">*</span></label>
                                    <input name="DepositAmount" id="DepositAmount" placeholder="DepositAmount" value="<?php echo isset($_POST['DepositAmount']) ? $_POST['DepositAmount'] : $data[0]['DepositAmount'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter DepositAmount" type="text">
                                    <div class="help-block"></div>
                                </div>
                            </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label>Is Active</label>
                                    <select name="IsActive" id="IsActive" class="form-control">
                                        <option value="1" <?php echo ($data[0]['IsActive']==1) ? " selected='selected' " : "";?> >Active</option>
                                        <option value="0" <?php echo ($data[0]['IsActive']==0) ? " selected='selected' " : "";?> >De-Active</option>
                                    </select>
                                    <div class="help-block"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label>Bill Charge<span style="color:red">*</span></label>
                                    <select class="form-control" name="BillCharge" id="BillCharge">
                                        <option value="1" <?php echo $data[0]['BillCharge']=="1" ? " selected='selected' " : ""; ?> >Enabled</option> 
                                        <option value="0" <?php echo $data[0]['BillCharge']=="0" ? " selected='selected' " : ""; ?> >Disabled</option> 
                                    </select>
                                </div>
                            </div>   <div class="col-md-6">
                                <div class="form-group">
                                    <label>MAB Interest<span style="color:red">*</span></label>
                                    <select class="form-control" name="MAB_Enabled" id="MAB_Enabled">
                                        <option value="1" <?php echo $data[0]['MAB_Enabled']=="1" ? " selected='selected' " : ""; ?> >Enabled</option> 
                                        <option value="0" <?php echo $data[0]['MAB_Enabled']=="0" ? " selected='selected' " : ""; ?> >Disabled</option> 
                                    </select>
                                </div>
                            </div>
                        </div>
                         <div class="row">
                        <div class="col-md-6">                       
                                <div class="form-group">
                                    <label>Money Transfer<span style="color:red">*</span></label>
                                    <select class="form-control" name="MoneyTransfer" id="MoneyTransfer">
                                        <option value="1" <?php echo $data[0]['MoneyTransfer']=="1" ? " selected='selected' " : ""; ?> >Enabled</option> 
                                        <option value="0" <?php echo $data[0]['MoneyTransfer']=="0" ? " selected='selected' " : ""; ?> >Disabled</option> 
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Money Transfer Limit</label>
                                    <input name="MoneyTransferLimit" id="MoneyTransferLimit" placeholder="Money Transfer Limit" value="<?php echo isset($_POST['MoneyTransferLimit']) ? $_POST['MoneyTransferLimit'] : $data[0]['MoneyTransferLimit'];?>" class="form-control" data-validation-required-message="Money Transfer Limit" type="text"> 
                                </div>
                            </div>
                        </div>
                    <div class="col-12 p-b-20"><hr></div>
                     
                    <div class="card-body"><div class="form-group m-b-0 text-right">
                        <button type="submit" class="btn btn-outline-primary waves-effect waves-light">Cancel</button>
                        <button type="submit" name="submitBtn" class="btn btn-primary waves-effect waves-light">Update</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>    
  
    </form>
    <br><Br>
    
       <form action="" class="validation-wizard clearfix" role="application" id="steps-uid-7" novalidate="novalidate" method="post">    
     
    <div class="row">
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-b-0 text-orange "><i class="mdi mdi-account-multiple-plus  p-r-10"></i>Select operators to enable </h4>
                </div>
                <div class="card-body">
                          <?php
                              if (isset($_POST['submitOptrBtn'])) {
                                  
                                 $codes = array();
                                 
                                  foreach($_POST['optr'] as $key=>$value) {
                                    $codes[]=$key;  
                                  }
                                  
                                  $selectedOperators =  $mysql->select("Select OperatorCode from _tbl_operators where OperatorCode not in (".implode(",",$codes).") "); 
                                  
                                  $mysql->execute("delete  from _tbl_member_operator where MemberID='".$_GET['Distributor']."' ");
                                  
                                  foreach($selectedOperators as $operator) {
                                      $mysql->insert("_tbl_member_operator",array("MemberID"=>$_GET['Distributor'],"OperatorCode"=>$operator['OperatorCode']));
                                  }
                                  
                                  $data = $mysql->select("select MemberID from _tbl_member where MapedTo='".$_GET['Distributor']."'");
                                  foreach($data as $d) {
                                      $mysql->execute("delete  from _tbl_member_operator where MemberID='".$d['MemberID']."' ");
                                      foreach($selectedOperators as $operator) {
                                        $mysql->insert("_tbl_member_operator",array("MemberID"=>$d['MemberID'],"OperatorCode"=>$operator['OperatorCode']));
                                      } 
                                  }
                              echo "<span style='color:green'>updated distributors and their mapped users</span>";
                              }
                              
                              
                          ?>
                          <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover" >
                                                  
                                <tbody>
                                
                                <?php $optrs = $mysql->select("Select * from _tbl_operators");  ?>
                                    <?php foreach ($optrs as $Request){ ?>
                                    <tr>
                                        
                                        <td><?php   
                                        
                                       
                                        $t = $mysql->select("select * from _tbl_member_operator where MemberID='".$_GET['Distributor']."' and OperatorCode='".$Request['OperatorCode']."'");
                                         
                                        ?>
                                        <input type="checkbox" <?php echo sizeof($t)>0 ? "" : "  checked='checked'  "; ?> name="optr['<?php echo $Request['OperatorCode'];?>']">
                                          &nbsp;<?php echo $Request['OperatorName'];?>
                                        </td>
                                    
                                    </tr>
                                    <?php }?>  
                            </tbody>
                        </table>
                      
                     
                    <div class="card-body"><div class="form-group m-b-0 text-right">
                     
                        <button type="submit" name="submitOptrBtn" class="btn btn-primary waves-effect waves-light">Update</button>
                    </div>
                    </div>
                     
                     
                     
                     
                     
                     
                </div>
            </div>
        </div>
    </div>    
  
    </form>
    
    
    
    