 <?php
    
    if (isset($_POST['submitBtn'])) {
        
      $id=  $mysql->execute("update _tbl_operators set OperatorName='".$_POST['OperatorName']."',
                                                   OperatorCode='".$_POST['OperatorCode']."',
                                                   IsCashback='".$_POST['IsCashback']."',
                                                   IsChargeable='".$_POST['IsChargeable']."',
                                                   IsActive='".$_POST['IsActive']."',
                                                   InactiveMessage='".$_POST['InactiveMessage']."',
                                                   APIID='".$_POST['APIID']."',
                                                   IsMaxChargeable='".$_POST['IsMaxChargeable']."' 
        
       where OperatorRefID='".$_GET['operator']."'");
     
        
       if ($id==1) {
         ?>
          <script>
              $(document).ready(function() {
            
                    swal("details are updated!", {
                        icon : "success" 
                    });
                 });
            </script>
         <?php
    } else {
        ?>
        <script>
              $(document).ready(function() {
            
                    swal("no changes affected!", {
                        icon : "success" 
                    });
                 });
            </script>
        <?php
    }
    }
    
         $data = $mysql->select("select * from _tbl_operators where OperatorRefID='".$_GET['operator']."'");
 ?>
  <div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Settings">Settings</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Settings/List">Edit Operator</a></li>
        </ul>
    </div> 
    <form action="" class="validation-wizard clearfix" role="application" id="steps-uid-7" novalidate="novalidate" method="post">    
     
    <div class="row">
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-b-0 text-orange "><i class="mdi mdi-account-multiple-plus  p-r-10"></i>Operator Details</h4>
                </div>
                   
                <div class="card-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="form-group user-test" id="user-exists">
                                    <label>Operator Name<span style="color:red">*</span></label>
                                    <input name="OperatorName" id="OperatorName" placeholder="Operator Name" value="<?php echo isset($_POST['OperatorName']) ? $_POST['OperatorName'] :  $data[0]['OperatorName'];?>" class="form-control" required=""  type="text">
                                    <div class="help-block"><p class="error" id="username-exists"></p></div>
                                </div>
                            </div>                                                
                            <div class="col-md-6">
                                <div class="form-group">
                                   <label>Operator Code<span style="color:red">*</span></label>
                                    <input name="OperatorCode" id="OperatorCode" placeholder="Operator Code" value="<?php echo isset($_POST['OperatorCode']) ? $_POST['OperatorCode'] :  $data[0]['OperatorCode'];?>" class="form-control" required=""  type="text">
                                    <div class="help-block"><p class="error" id="username-exists"></p></div>
                               
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>IsCashback (%)<span style="color:red">*</span></label>
                                    <input name="IsCashback" placeholder="Cash back" id="IsCashback" value="<?php echo isset($_POST['IsCashback']) ? $_POST['IsCashback'] : $data[0]['IsCashback'];?>" class="form-control" required="" type="text">
                                    <div class="help-block"  style="color:red"><?php echo $errorMobile;?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="email-exists">
                                 <div class="avatar avatar-<?php echo $data[0]['IsActive']==1 ? 'online':'offline';?>">
                        <img style="border:1px solid #ccc;" src="../../assets/img/<?php echo $data[0]['IconFile'];?>" alt="..." class="avatar-img rounded-circle">
                    </div>
                                </div>
                            </div>                                
                        </div>
                        
                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" id="email-exists">
                                    <label>Minimum Charge (Rs)<span style="color:red">*</span></label>
                                    <input name="IsChargeable" id="IsChargeable" placeholder="Chargeable" value="<?php echo isset($_POST['IsChargeable']) ? $_POST['IsChargeable'] : $data[0]['IsChargeable'];?>" class="form-control" required=""   type="text">
                                    <div class="help-block"><p class="error" id="emailid-exists" style="color:red"></p></div>
                                </div>
                            </div>                                

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Minimum Charge (%)<span style="color:red">*</span></label>
                                    <input name="IsMaxChargeable" placeholder="MAximum Chargeable" id="IsMaxChargeable" value="<?php echo isset($_POST['IsMaxChargeable']) ? $_POST['IsMaxChargeable'] : $data[0]['IsMaxChargeable'];?>" class="form-control" required="" type="text">
                                    <div class="help-block"  style="color:red"><?php echo $errorMobile;?></div>
                                </div>
                            </div>
                        </div>
                        
                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" id="email-exists">
                                     <label>Status<span style="color:red">*</span></label>
                                    <select class="form-control" name="IsActive" id="IsActive">
                                        <option value="0" <?php echo ($data[0]['IsActive']==0) ? " selected='selected' " : "";?> >Off</option> 
                                        <option value="1" <?php echo ($data[0]['IsActive']==1) ? " selected='selected' " : "";?> >On</option> 
                                    </select>
                                </div>
                            </div>                                
                            <div class="col-md-6">
                                <div class="form-group">
                                  
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group user-test" id="user-exists">
                                    <label>Inactive Message<span style="color:red">*</span></label>
                                    <input name="InactiveMessage" id="InactiveMessage" placeholder="Inactive Message" value="<?php echo isset($_POST['InactiveMessage']) ? $_POST['InactiveMessage'] :  $data[0]['InactiveMessage'];?>" class="form-control" required=""  type="text">
                                    <div class="help-block"><p class="error" id="username-exists"></p></div>
                                </div>
                            </div>
                        </div>
                        
                          <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" id="email-exists">
                                     <label>API<span style="color:red">*</span></label>
                                    <select class="form-control" name="APIID" id="APIID">
                                        <!--<option value="1" <?php echo ($data[0]['APIID']==1) ? " selected='selected' " : "";?> >Lapu</option> -->
                                        <option value="2" <?php echo ($data[0]['APIID']==2) ? " selected='selected' " : "";?> >Mrobotics</option> 
                                        <!--<option value="3" <?php echo ($data[0]['APIID']==3) ? " selected='selected' " : "";?> >Ezytm</option> -->
                                        <option value="4" <?php echo ($data[0]['APIID']==4) ? " selected='selected' " : "";?> >Aaranju Lapu</option> 
                                    </select>
                                </div>         
                            </div>                                
                            <div class="col-md-6">
                                <div class="form-group">
                                  
                                </div>
                            </div>
                        </div>  
                         
                         
                         
                          
                    <div class="col-12 p-b-20"><hr></div>
                     
                    <div class="card-body"><div class="form-group m-b-0 text-right">
                        <a href="dashboard.php"  class="btn btn-outline-primary waves-effect waves-light">Cancel</a>
                        <button type="submit" name="submitBtn" class="btn btn-primary waves-effect waves-light">Update</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>    