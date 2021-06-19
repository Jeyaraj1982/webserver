<?php include_once("case_view_header.php");?>
<?php
     $CaseDetails = $mysql->select("select * from _tbl_cases_register where md5(concat(CreatedOn,CaseID))='".$_GET['case']."'" );
     $client_data = $mysql->select("select * from _tbl_master_clients  where ClientID='".$CaseDetails[0]['ClientID']."'");
?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h5 style="margin-top:5px">Client Information</h5>
            </div>
            <div class="col-md-6" style="text-align: right;font-size:13px;color:#666">
            Created : <?php echo date("M d, Y H:i",strtotime($client_data[0]['CreatedOn']));?><br>
            Stats : <?php echo ($client_data[0]['IsActive']==1) ? 'Active' : '<span style="color:red">DeActivated</span>';?>
            </div>
             
        </div>
    </div>
    <div class="card-body">
          <div class="row"> 
        <div class="col-sm-12">
                        <div class="row g-3  mb-3">
                            <div class="col-md-9">
                                <label class="form-label" for="validationCustom01" style="font-weight:bold;">Client's Name</label><br>
                                <?php echo   $client_data[0]['ClientName'];?>&nbsp; <br><br>
                                
                            
                                <label class="form-label" for="validationCustom01"  style="font-weight:bold;">Client Type</label><br>
                                <?php echo   $client_data[0]['ClientTypeName'];?>&nbsp;<bR><br>
                                
                                  <label class="form-label" for="validationCustom03" style="font-weight:bold">Fahter/Husband Name</label><br>
                                <?php echo   $client_data[0]['FatherName'];?>&nbsp;
                            
                            </div>
                            <div class="col-md-3">
                                <?php if (strlen(trim($client_data[0]['ProfilePhoto']))>0) { ?>
                                <img src="<?php echo $client_data[0]['ProfilePhoto'];?>" style="max-width: 100%;height:180px;border:1px solid #ccc;padding:3px;border-radius:3px;background:#fff"> 
                                <?php } else { ?>
                                <img src="assets/app/noimage.jpg" style="height:100px;border:1px solid #ccc;padding:3px;border-radius:3px;background:#222">                             <?php } ?>
                            </div>
                            
                        </div>
                        <div class="row g-3  mb-3">
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom03" style="font-weight: bold;">Gender</label><br>
                                <?php echo   $client_data[0]['Gender'];?>&nbsp;
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom03"  style="font-weight: bold;">Date of Birth</label> <br>
                                <?php echo   $client_data[0]['DateOfBirth'];?>&nbsp;
                          </div>
                            
                             <div class="col-md-4">
                                <label class="form-label" for="validationCustom02"  style="font-weight: bold;">Email</label> <br>
                                <?php echo   $client_data[0]['EmailID'];?>&nbsp;
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustomUsername"  style="font-weight: bold;">Mobile Number</label><br>
                                <?php echo   $client_data[0]['MobileNumber'];?>&nbsp;
                            </div>
                             <div class="col-md-8">
                                <label class="form-label" for="validationCustom03"  style="font-weight: bold;">Alernative Contact Numbers</label><br>
                                <?php echo   $client_data[0]['PersonalAlternativeNumbers'];?>&nbsp;
                            </div>
                        </div>
                   
                        <div class="row g-3  mb-3">
                                                          <div class="col-md-4">
                                <label class="form-label" for="validationCustomUsername"  style="font-weight: bold;">Whatsapp Number</label> <br>
                                <?php echo   $client_data[0]['WhatsappNumber'];?>&nbsp;
                            </div>

                             <div class="col-md-4">
                                <label class="form-label" for="validationCustom01"   style="font-weight: bold;">Religion</label><br>
                                <?php echo   $client_data[0]['ReligionName'];?>&nbsp;
                            </div>
                                                                                 
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom01"   style="font-weight: bold;">Nationality</label>
                                <?php echo   $client_data[0]['Nationality'];?>&nbsp;
                            </div>
                        </div>
                        <div class="row g-3  mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="validationCustom03"   style="font-weight: bold;">Remarks</label><br>
                                <?php echo   $client_data[0]['PersonalRemarks'];?>&nbsp;
                            </div>
                          <!--   <div class="col-md-3">
                                <label class="form-label" for="validationCustom03">Is Active</label>
                                <select  class="form-select" name="IsActive" id="IsActive" >
                                    <option value="1" <?php echo ($data[0]['IsActive']==1) ? " selected='selected' " : "";?> >Yes</option>
                                    <option value="0" <?php echo ($data[0]['IsActive']==0) ? " selected='selected' " : "";?> >No</option>
                                </select>
                            </div>
                            -->
                        </div>
                        
               
            
        </div>
        </div>
    
    
    <div class="row">
        <div class="col-sm-6" style="border-right:1px dashed #aaa;">
             
              
                  <h6 style="margin-bottom:20px;border-bottom:1px solid #ccc;padding-bottom:10px;margin-top:30px">Contact Details</h6>
                        <div class="row g-3  mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="validationCustom01" style="font-weight: bold;">Address information</label><br>
                                  &nbsp;&nbsp;&nbsp;<?php echo   $client_data[0]['ContactAddressLine1'];?>&nbsp;<br>
                                  &nbsp;&nbsp;&nbsp;<?php echo   $client_data[0]['ContactAddressLine2'];?>&nbsp;<br>
                                  &nbsp;&nbsp;&nbsp;<?php echo   $client_data[0]['ContactAddressLine3'];?>&nbsp;<br>
                                  &nbsp;&nbsp;&nbsp;Pincode: <?php echo   $client_data[0]['ContactPincode'];?>&nbsp;
                                  
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                             <div class="col-md-12">
                                <label class="form-label" for="validationCustom03" style="font-weight: bold;">Contact numbers</label><br>
                                <?php echo   $client_data[0]['ContactAdditonalNumbers'];?>&nbsp;
                            </div>
                        </div>
                        <div class="row g-3  mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="validationCustom03" style="font-weight: bold;">Remarks</label><br>
                                <?php echo   $client_data[0]['ContactRemarks'];?>&nbsp;
                            </div>
                        </div>
                 
          
        </div>
        
        <div class="col-sm-6">
           
               
                   <h6 style="margin-bottom:20px;border-bottom:1px solid #ccc;padding-bottom:10px;margin-top:30px;text-align:right">Office Details</h6>
                        <div class="row g-3  mb-3">
                            <div class="col-md-12" style="text-align: right;">
                                <label class="form-label" for="validationCustom01" style="font-weight: bold;">Address information</label><br>
                                &nbsp;&nbsp;&nbsp;<?php echo   $client_data[0]['OfficeAddressLine1'];?>&nbsp;<br>
                                &nbsp;&nbsp;&nbsp;<?php echo   $client_data[0]['OfficeAddressLine2'];?>&nbsp;<br>
                                &nbsp;&nbsp;&nbsp;<?php echo   $client_data[0]['OfficeAddressLine3'];?>&nbsp;<br>
                                &nbsp;&nbsp;&nbsp;Pincode: <?php echo   $client_data[0]['OfficePincode'];?>&nbsp;
                            </div>
                        </div>
                     
                      
                         
                        <div class="row g-3 mb-3">
                             <div class="col-md-12" style="text-align: right;">
                                <label class="form-label" for="validationCustom03" style="font-weight: bold;">Contact numbers</label><br>
                                <?php echo   $client_data[0]['OfficeAdditonalNumbers'];?>&nbsp;
                            </div>
                        </div>
                        <div class="row g-3  mb-3">
                            <div class="col-md-12" style="text-align: right;">
                                <label class="form-label" for="validationCustom03" style="font-weight: bold;">Remarks</label><br>
                                <?php echo   $client_data[0]['OfficeRemarks'];?>&nbsp;
                            </div>
                        </div>
              
        </div>
         
        
    </div>
    </div>
</div>
<?php include_once("case_view_footer.php");?> 