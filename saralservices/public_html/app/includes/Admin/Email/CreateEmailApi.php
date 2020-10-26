<?php 

if (isset($_POST['BtnSubmit'])) {
            $Error=0;
             if (!(strlen(trim($_POST['ApiName']))>0)) {
                $ErrApiName = "Please Enter Api Name";                                      
                $Error++;
             }
            if (!(strlen(trim($_POST['HostName']))>0)) {
               $ErrHostName = "Please Enter Host name";                                      
               $Error++;
            }
            if (!(strlen(trim($_POST['PortNo']))>0)) {
               $ErrPortNo = "Please Enter Port No";                                      
               $Error++;
            }
            if (!(strlen(trim($_POST['Secure']))>0)) {
               $ErrSecure = "Please Enter Secure";                                      
               $Error++;
            }
            if (!(strlen(trim($_POST['UserName']))>0)) {
               $ErrSecure = "Please Enter UserName";                                      
               $Error++;
            }
            if (!(strlen(trim($_POST['Password']))>0)) {
               $ErrSecure = "Please Enter Password";                                      
               $Error++;
            }
            if (!(strlen(trim($_POST['SendersName']))>0)) {
               $ErrSendersName = "Please Enter Senders Name";                                      
               $Error++;
            }
            
             $data = $mysql->select("select * from _tbl_settings_emailapi where ApiName='".trim($_POST['ApiName'])."'");
             if (sizeof($data)>0) {
                 $ErrApiName = "Api Name Already Exists";
                 $Error++;
             } 
             $data = $mysql->select("select * from _tbl_settings_emailapi where HostName='".trim($_POST['HostName'])."'");
             if (sizeof($data)>0) {
                 $ErrHostName = "Host Name Already Exists";
                 $Error++;
             } 
             $data = $mysql->select("select * from _tbl_settings_emailapi where PortNumber='".trim($_POST['PortNo'])."'");
             if (sizeof($data)>0) {
                 $ErrPortNo = "Port No Already Exists";
                 $Error++;
             } 
             $data = $mysql->select("select * from _tbl_settings_emailapi where SMTPUserName='".trim($_POST['UserName'])."'");
             if (sizeof($data)>0) {
                 $ErrUserName = "User Name Already Exists";
                 $Error++;
             }  
            
             if($Error==0){
                 $ApiCode   = SeqMaster::GetNextEmailApiCode();
                 
                  $id = $mysql->insert("_tbl_settings_emailapi",array("ApiCode"      => $ApiCode,                          
                                                                      "ApiName"      => $_POST['ApiName'],
                                                                      "HostName"     => $_POST['HostName'],
                                                                      "PortNumber"   => $_POST['PortNo'],
                                                                      "Secure"       => $_POST['Secure'],
                                                                      "SMTPUserName" => $_POST['UserName'],
                                                                      "SMTPPassword" => $_POST['Password'],
                                                                      "SendersName"  => $_POST['SendersName'],
                                                                      "Remarks"      => $_POST['Remarks'], 
                                                                      "CreatedOn"    => date("Y-m-d H:i:s"))); 
                      if(sizeof($id)>0){                                                                                     
                            unset($_POST);            
                        echo "<script>location.href='dashboard.php?action=Email/ManageEmailApi&Status=All';</script>";
                      }
                    }                                                                                                                     
             }
             
      ?>
<script>
$(document).ready(function () {
    $("#ApiName").blur(function () {
    
        if (IsNonEmpty("ApiName","ErrApiName","Please Enter Api Name")) {
        IsAlphabet("ApiName","ErrApiName","Please Enter Alpha Numeric characters only");
        }
                        
   });
   $("#HostName").blur(function () {
    
        IsNonEmpty("HostName","ErrHostName","Please Enter Host Name");
                        
   });
   $("#PortNo").blur(function () {
    
        IsNonEmpty("PortNo","ErrPortNo","Please Enter Port No");
                        
   });
   $("#Secure").blur(function () {
    
        IsNonEmpty("Secure","ErrSecure","Please Select Secure");
                        
   });
   $("#UserName").blur(function () {
    
        IsNonEmpty("UserName","ErrUserName","Please Enter UserName");
                        
   }); 
   $("#Password").blur(function () {
    
        IsNonEmpty("Password","ErrPassword","Please Enter Password");
                        
   });
   $("#SendersName").blur(function () {
    
        IsNonEmpty("SendersName","ErrSendersName","Please Enter Sender's Name");
                        
   });
});
function SubmitProfile() { 
     ErrorCount=0;                                                                                                               
     $('#ErrApiCode').html("");
     $('#ErrApiName').html("");
     $('#ErrHostName').html("");
     $('#ErrPortNo').html("");
     $('#ErrUserName').html("");
     $('#ErrPassword').html("");
     $('#ErrSendersName').html("");
     
     ErrorCount=0;

       if (IsNonEmpty("ApiName","ErrApiName","Please Enter Api Name")) {
        IsAlphabet("ApiName","ErrApiName","Please Enter Alpha Numeric characters only");
        }
        IsNonEmpty("HostName","ErrHostName","Please Enter Host Name");
        IsNonEmpty("PortNo","ErrPortNo","Please Enter Port No");
        if (IsNonEmpty("UserName","ErrUserName","Please Enter the user name")) {
        //IsEmail("UserName","ErrUserName","Please Enter Valid ");
        }
        IsPassword("Password","ErrPassword","Please Enter Password");
        
        IsNonEmpty("SendersName","ErrSendersName","Please Enter Senders Name");
   
     return (ErrorCount==0) ? true : false;     
}                   
</script>

        <!-- Sidebar -->
<style>
label{
    font-weight: normal;
}
</style>              
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title"></h4>
                    </div>
                    <form method="POST" action="" id="frms" enctype="multipart/form-data" onsubmit="return SubmitProfile();">
                      <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Create Email Api</div>
                                </div>
                                <div class="card-body"> 
                                        <div class="form-group form-show-validation row">
                                            <label for="ApiName" class="col-sm-3" style="font-weight:normal">Api Name <span class="required-label">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="ApiName" name="ApiName" value="<?php echo (isset($_POST['ApiName']) ? $_POST['ApiName'] :"");?>"Placeholder="Api Name">
                                                <span class="errorstring" id="ErrApiName"><?php echo isset($ErrApiName)? $ErrApiName : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="HostName" class="col-sm-3" style="font-weight:normal">Host Name <span class="required-label">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="HostName" name="HostName" value="<?php echo (isset($_POST['HostName']) ? $_POST['HostName'] : "");?>">
                                                <span class="errorstring" id="ErrHostName"><?php echo isset($ErrHostName)? $ErrHostName : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="PortNo" class="col-sm-3" style="font-weight:normal">Port No <span class="required-label">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="PortNo" name="PortNo" value="<?php echo (isset($_POST['PortNo']) ? $_POST['PortNo'] : "");?>">
                                                <span class="errorstring" id="ErrPortNo"><?php echo isset($ErrPortNo)? $ErrPortNo : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Secure" class="col-sm-3 text-left" style="font-weight:normal">Secure</label>
                                            <div class="col-sm-5 text-left">
                                                <select id="Secure" name="Secure" class="form-control">                             
                                                    <option value="ssl" <?php echo ($_POST['Secure']=="ssl") ? " selected='selected' " : "";?>>ssl</option>
                                                    <option value="tls" <?php echo ($_POST['Secure']=="tls") ? " selected='selected' " : "";?>>tls</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="UserName" class="col-sm-3 text-left" style="font-weight:normal">User Name</label>
                                            <div class="col-sm-5 text-left">
                                                <input type="text" class="form-control" id="UserName" name="UserName" value="<?php echo (isset($_POST['UserName']) ? $_POST['UserName'] : "");?>">
                                                <span class="errorstring" id="ErrUserName"><?php echo isset($ErrUserName)? $ErrUserName : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Password" class="col-sm-3 text-left" style="font-weight:normal">Password <span class="required-label">*</span></label>
                                            <div class="col-sm-5">
                                                <div class="input-group">
                                                    <input type="password" class="form-control" id="Password" name="Password" value="<?php echo (isset($_POST['Password']) ? $_POST['Password'] :"");?>" Placeholder="Password">
                                                    <span class="input-group-btn">
                                                        <button  onclick="showHidePwd('Password',$(this))" class="btn btn-default reveal" type="button"><i class="icon-eye"></i></button>
                                                    </span>          
                                                </div>
                                                <span class="errorstring" id="ErrPassword"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="SendersName" class="col-sm-3 text-left" style="font-weight:normal">Sender's Name <span class="required-label">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="SendersName" name="SendersName" value="<?php echo (isset($_POST['SendersName']) ? $_POST['SendersName'] : "");?>">
                                                <span class="errorstring" id="ErrSendersName"><?php echo isset($ErrSendersName)? $ErrSendersName : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Remarks" class="col-sm-3 text-left" style="font-weight:normal">Remarks</label>
                                            <div class="col-sm-5">
                                                <textarea class="form-control" id="Remarks" name="Remarks" placeholder="Remarks"><?php echo (isset($_POST['Remarks']) ? $_POST['Remarks'] :"");?></textarea>
                                                <span class="errorstring" id="ErrRemarks"><?php echo isset($ErrRemarks)? $ErrRemarks : "";?></span>
                                            </div>                                                                                                       
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;color: green;"><?php echo $Successmessage;?> </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                      </div>
                     <div class="row">
                        <div class="col-md-12"> 
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12" style="text-align: right;">
                                            <a href="dashboard.php?action=Email/ManageEmailApi&Status=All" class="btn btn-outline-danger">Cancel</a>
                                            <button type="submit" class="btn btn-warning" name="BtnSubmit" id="BtnSubmit">Submit</button>
                                            </div>                                        
                                        </div>                                                                             
                                    </div>
                               
                            </div>                                                                                             
                        </div>
                        
                         </form>
                    </div>
                </div>
            </div>
