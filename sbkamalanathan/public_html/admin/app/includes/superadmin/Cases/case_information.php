<?php include_once("case_view_header.php");?>      
<div class="card">
    <div class="card-header">
    
      <div class="row">
            <div class="col-md-6">
                <h5 style="margin-top:5px">Case Information</h5>
            </div>
            <div class="col-md-6" style="text-align: right;font-size:13px;color:#666">
            Created : <?php echo date("M d, Y H:i",strtotime($CaseDetails[0]['CreatedOn']));?><br>
            Stats : <?php echo ($CaseDetails[0]['IsActive']==1) ? 'Active' : '<span style="color:red">DeActivated</span>';?>
            </div>
             
        </div>
    </div>
    
    
     <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
               <div class="row g-3  mb-3">
                <div class="col-md-6">
                    <label class="form-label" for="validationCustom01" style="font-weight:bold;">Court</label><br>
                    <?php echo   $CaseDetails[0]['CourtName'];?>&nbsp; 
               </div> 
                <?php if ($CaseDetails[0]['CourtID']==1) {?>
               
               <div class="col-md-6">
                    <label class="form-label" for="validationCustom01" style="font-weight:bold;">DairyNumber/Year</label><br>
                    <?php echo   $CaseDetails[0]['DairyNumber'];?>/<?php echo   $CaseDetails[0]['DairyYear'];?>&nbsp;  
               </div>
               <?php } ?> 
                     
            </div>
            
            <!-- High Court -->
            <?php if ($CaseDetails[0]['CourtID']==2) {?>
            <div class="row g-3  mb-3">
                <div class="col-md-6">
                    <label class="form-label" for="validationCustom01" style="font-weight:bold;">High Court</label><br>
                    <?php echo   $CaseDetails[0]['HighCourtName'];?>&nbsp;   
               </div> 
               
               <div class="col-md-6">
                    <label class="form-label" for="validationCustom01" style="font-weight:bold;">Bench</label><br>
                    <?php echo   $CaseDetails[0]['HighCourtBenchtName'];?>&nbsp; 
               </div>
               
                     
            </div>
            <?php } ?>
            
            <!-- District Court -->
            <?php if ($CaseDetails[0]['CourtID']==3) {?>
             <div class="row g-3  mb-3">
                <div class="col-md-3">
                    <label class="form-label" for="validationCustom01" style="font-weight:bold;">State Name</label><br>
                    <?php echo   $CaseDetails[0]['DistrctCourtStateName'];?>&nbsp;  >
               </div> 
               
               <div class="col-md-3">
                    <label class="form-label" for="validationCustom01" style="font-weight:bold;">District Name</label><br>
                    <?php echo   $CaseDetails[0]['DistrctCourtDistrictName'];?>&nbsp; 
               </div>
                 <div class="col-md-3">
                    <label class="form-label" for="validationCustom01" style="font-weight:bold;">Place of Court</label><br>
                    <?php echo   $CaseDetails[0]['DistrctCourtPlaceName'];?>&nbsp; 
               </div>
               <div class="col-md-3">
                    <label class="form-label" for="validationCustom01" style="font-weight:bold;">Court</label><br>
                    <?php echo   $CaseDetails[0]['DistrictCourtTypeName'];?>&nbsp; 
               </div>
                     
            </div>
            <?php } ?>
            
            
            <div class="row g-3  mb-3">
                <div class="col-md-3">
                    <label class="form-label" for="validationCustom01" style="font-weight:bold;">Old Case Number</label><br>
                    <?php echo   $CaseDetails[0]['OldCaseNumber'];?>&nbsp;  
               </div> 
               
               <div class="col-md-3">
                    <label class="form-label" for="validationCustom01" style="font-weight:bold;">Old Case Year</label><br>
                    <?php echo   $CaseDetails[0]['OldCaseYear'];?>&nbsp; 
               </div>
                 <div class="col-md-6">
                    <label class="form-label" for="validationCustom01" style="font-weight:bold;">Date Of First Appearance</label><br>
                    <?php echo   $CaseDetails[0]['DateOfFirstAppearance'];?>&nbsp; 
               </div>
               
                     
            </div>
            
            
             <div class="row g-3  mb-3">
               <?php if (strlen($CaseDetails[0]['CaseNumber'])>2) {?>
                <div class="col-md-3">
                    <label class="form-label" for="validationCustom01" style="font-weight:bold;">Case Number</label><br>
                    <?php echo   $CaseDetails[0]['CaseNumber'];?>&nbsp;  
               </div> 
               
               <div class="col-md-3">
                    <label class="form-label" for="validationCustom01" style="font-weight:bold;">Year</label><br>
                    <?php echo   $CaseDetails[0]['CaseYear'];?>&nbsp; 
               </div>
               <?php } ?>
               
               <?php if (strlen($CaseDetails[0]['CNRNumber'])>2) {?>
                 <div class="col-md-3">
                    <label class="form-label" for="validationCustom01" style="font-weight:bold;">CNR Number</label><br>
                    <?php echo   $CaseDetails[0]['CNRNumber'];?>&nbsp; 
               </div>
               <?php } ?>
               
                     
            </div>
            
            
            <div class="row g-3  mb-3">
                <div class="col-md-6">
                    <label class="form-label" for="validationCustom01" style="font-weight:bold;">Appearing Model</label><br>
                    <?php echo   $CaseDetails[0]['AppearingModelName'];?>&nbsp;   
               </div> 
               
               <div class="col-md-3">
                    <label class="form-label" for="validationCustom01" style="font-weight:bold;">Year</label><br>
                    <?php echo   $CaseDetails[0]['AppearingAs'];?>  <?php echo   $CaseDetails[0]['Appear_2'];?>&nbsp; 
               </div>
                 <div class="col-md-3">
                    <label class="form-label" for="validationCustom01" style="font-weight:bold;">Appear Number</label><br>
                    <?php echo   $CaseDetails[0]['AppearNumber'];?>&nbsp; 
               </div>
               
                     
            </div>
            
              <div class="row g-3  mb-3">
                <div class="col-md-3">
                    <label class="form-label" for="validationCustom01" style="font-weight:bold;">Case Type Name</label><br>
                    <?php echo   $CaseDetails[0]['CaseTypeName'];?>&nbsp;   
               </div> 
               
               <div class="col-md-3">
                    <label class="form-label" for="validationCustom01" style="font-weight:bold;">Date Of Filing</label><br>
                    <?php echo   $CaseDetails[0]['DateOfFilling'];?> &nbsp; 
               </div>
                 <div class="col-md-3">
                    <label class="form-label" for="validationCustom01" style="font-weight:bold;">Court Hall Number</label><br>
                    <?php echo   $CaseDetails[0]['CourtHallNumber'];?>&nbsp; 
               </div>
                 <div class="col-md-3">
                    <label class="form-label" for="validationCustom01" style="font-weight:bold;">Floor Number</label><br>
                    <?php echo   $CaseDetails[0]['FloorNumber'];?>&nbsp; 
               </div>
                     
            </div>
            
               <div class="row g-3  mb-3">
                <div class="col-md-12">
                    <label class="form-label" for="validationCustom01" style="font-weight:bold;">Clarification</label><br>
                    <?php echo   $CaseDetails[0]['Clarification'];?>&nbsp;   
               </div> 
               </div>
               
               
                  <div class="row g-3  mb-3">
                <div class="col-md-12">
                    <label class="form-label" for="validationCustom01" style="font-weight:bold;">Title</label><br>
                    <?php echo   $CaseDetails[0]['Title'];?>&nbsp;   
               </div> 
               </div>
               
               
                  <div class="row g-3  mb-3">
                <div class="col-md-12">
                    <label class="form-label" for="validationCustom01" style="font-weight:bold;">Description</label><br>
                    <?php echo   $CaseDetails[0]['Description'];?>&nbsp;   
               </div> 
               </div>
               
                <div class="row g-3  mb-3">
                <div class="col-md-6">
                    <label class="form-label" for="validationCustom01" style="font-weight:bold;">BeforeJudge</label><br>
                    <?php echo   $CaseDetails[0]['BeforeJudge'];?>&nbsp;   
               </div> 
               <div class="col-md-6">
                    <label class="form-label" for="validationCustom01" style="font-weight:bold;">ReferredBy</label><br>
                    <?php echo   $CaseDetails[0]['ReferredBy'];?>&nbsp;   
               </div> 
               </div>
               
                 <div class="row g-3  mb-3">
                <div class="col-md-6">
                    <label class="form-label" for="validationCustom01" style="font-weight:bold;">Section/Category</label><br>
                    <?php echo   $CaseDetails[0]['SectionCategory'];?>&nbsp;   
               </div> 
               <div class="col-md-6">
                    <label class="form-label" for="validationCustom01" style="font-weight:bold;">Priority</label><br>
                    <?php echo   $CaseDetails[0]['PriorityName'];?>&nbsp;   
               </div> 
               </div>
               
                <div class="row g-3  mb-3">
                <div class="col-md-6">
                    <label class="form-label" for="validationCustom01" style="font-weight:bold;">AffidavitFilled</label><br>
                    <?php echo   $CaseDetails[0]['AffidavitFilled'];?>&nbsp;   
               </div> 
               <div class="col-md-6">
                    <label class="form-label" for="validationCustom01" style="font-weight:bold;">AffdavitDate</label><br>
                    <?php echo   $CaseDetails[0]['AffdavitDate'];?>&nbsp;   
               </div> 
               </div>
                  <div class="row g-3  mb-3">
                <div class="col-md-12">
                    <label class="form-label" for="validationCustom01" style="font-weight:bold;">Remarks</label><br>
                    <?php echo   $CaseDetails[0]['Remarks'];?>&nbsp;   
               </div> 
               </div> 
               
            </div>
        </div>
    </div>
</div>
<?php include_once("case_view_footer.php");?> 