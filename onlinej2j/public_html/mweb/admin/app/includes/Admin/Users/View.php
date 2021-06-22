<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Users/New">Users</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Users/New">View User</a></li>
        </ul>
    </div> 
    <?php
        $data = $mysql->select("select * from _tbl_member where MemberID='".$_GET['User']."'");
    ?>
    <form action="" class="validation-wizard clearfix" role="application" id="steps-uid-7" novalidate="novalidate" method="post">    
     
    <div class="row">
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-b-0 text-orange "><i class="mdi mdi-account-multiple-plus  p-r-10"></i>User Details</h4>
                </div>
                <div class="card-body">
                    <div class="form-body">
                     <div class="row">
                            <div class="col-md-6 ">
                                <div class="form-group user-test" id="user-exists">
                                    <label>Distributor Name</label>
                                    <div style="color:#999"><?php echo $data[0]['MapedToName'];?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="form-group user-test" id="user-exists">
                                    <label>Shop Name</label>
                                    <div style="color:#999"><?php echo $data[0]['MemberName'];?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                   
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="form-group user-test" id="user-exists">
                                    <label>Agent Name</label>
                                    <div style="color:#999"><?php echo $data[0]['PersonName'];?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <div style="color:#999"><?php echo $data[0]['MobileNumber'];?></div>
                                </div>
                            </div>
                        </div>      
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" id="email-exists">
                                    <label>Email</label>
                                    <div style="color:#999"><?php echo $data[0]['EmailID'];?></div>
                                </div>
                            </div>                                
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <div style="color:#999"><?php echo $data[0]['Gender'];?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Pancard</label>
                                    <div style="color:#999"><?php echo $data[0]['PanCard'];?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Aadhaar Card</label>
                                    <div style="color:#999"><?php echo $data[0]['AdhaarCard'];?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address Line 1</label>
                                    <div style="color:#999"><?php echo $data[0]['Address1'];?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address Line 2</label>
                                    <div style="color:#999"><?php echo $data[0]['Address2'];?></div>
                                </div>
                            </div>
                        </div>
                      
                </div>
                  <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Created On</label>
                                    <div style="color:#999"><?php echo $data[0]['CreatedOn'];?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <div style="color:#999"><?php echo $data[0]['IsActive']==1 ? "Active" : "Deactivated";?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Bill Charge</label>                       
                                    <div style="color:#999"><?php echo $data[0]['BillCharge']==1 ? "Activated" : "Deactivated";?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>MAB Interest Enabled</label>                       
                                    <div style="color:#999"><?php echo $data[0]['MAB_Enabled']==1 ? "Activated" : "Deactivated";?></div>
                                </div>
                            </div>
                        </div>
                        
                          <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Money Transfer</label>                       
                                    <div style="color:#999"><?php echo $data[0]['MoneyTransfer']==1 ? "Activated" : "Deactivated";?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Money Transfer Limit</label>                       
                                    <div style="color:#999"><?php echo $data[0]['MoneyTransferLimit'];?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Deposit Amount</label>                       
                                    <div style="color:#999"><?php echo $data[0]['DepositAmount'];?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Is Active</label>                       
                                    <div style="color:#999"><?php echo $data[0]['IsActive']==1 ? "Active" : "De-Active";?></div>
                                </div>
                            </div>
                        </div>
                        
                        
            </div>
        </div>
    </div>
  </div>   
  
  
    <br>
  
  <div class="row">
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-b-0 text-orange "><i class="mdi mdi-account-multiple-plus  p-r-10"></i>Select operators to enable </h4>
                </div>
                <div class="card-body">
                           
                          <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover" >
                                                  
                                <tbody>
                                
                                <?php $optrs = $mysql->select("Select * from _tbl_operators");  ?>
                                    <?php foreach ($optrs as $Request){ ?>
                                    <tr>
                                        
                                        <td><?php   
                                        
                                       
                                        $t = $mysql->select("select * from _tbl_member_operator where MemberID='".$_GET['User']."' and OperatorCode='".$Request['OperatorCode']."'");
                                         
                                        ?>
                                        <input type="checkbox" disabled="disabled" <?php echo sizeof($t)>0 ? "" : "  checked='checked'  "; ?> name="optr['<?php echo $Request['OperatorCode'];?>']">
                                          &nbsp;<?php echo $Request['OperatorName'];?>
                                        </td>
                                    
                                    </tr>
                                    <?php }?>  
                            </tbody>
                        </table>
                      
                     
                   
                    </div>
                     
                     
                     
                     
                     
                     
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-b-0 text-orange "><i class="mdi mdi-account-multiple-plus  p-r-10"></i>Wallet Auto update bank accounts </h4>
                </div>
                <div class="card-body">
                           
                          <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover" >
                                                  
                                <tbody>
                                
                                <?php $memberAccounts = $mysql->select("select * from _tbl_member_bankaccounts where MemberID='".$_GET['User']."'");  ?>
                                    <?php foreach ($memberAccounts as $b){ ?>
                                    <tr>
                                        
                                        <td> <?php echo $b['AccountName'];?></td>
                <td><?php echo $b['AccountNumber'];?></td>
               <td> <?php echo $b['IFSCode'];?></td>
                                    </tr>
                                    <?php }?>  
                            </tbody>
                        </table>
                      
                     
                   
                    </div>
                     
                     
                     
                     
                     
                     
                </div>
            </div>
        </div>
    </div>    
    
    
    
    
  
    