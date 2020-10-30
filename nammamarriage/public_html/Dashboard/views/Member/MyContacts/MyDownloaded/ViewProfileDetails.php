<?php           
    $response = $webservice->getData("Member","GetDownloadProfileInformation",array("ProfileID"=>$_GET['Code']));
    $ProfileInfo          = $response['data']['ProfileInfo'];
    $PartnerExpectation = $response['data']['PartnerExpectation'];
    $EducationAttachment = $response['data']['EducationAttachments'];
    $ProfilePhotos = $response['data']['ProfilePhoto'];
?>
  
 <style>
 .table-bordered > tbody > tr > td{
     width: 75px;
height: 75px;
text-align:center;
 }
 .form-group {
    margin-bottom: 0px;
}
.photoview {
    float: left;
    margin-right: 10px;
    text-align: center;
    border: 1px solid #eaeaea;
    height: 211px;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 10px;
}
 </style>
<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                            <h4 class="card-title">Profile Information</h4>
                <div class="form-group row">
                  <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="Community" class="col-sm-3 col-form-label">Profile For</label>
                        <div class="col-sm-9"> <small style="color:#727373;"><?php echo $ProfileInfo['ProfileFor'];?></small></div>
                         </div>
                    <div class="form-group row">
                        <label for="Name" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9"><small style="color:#737373;"><?php echo $ProfileInfo['ProfileName'];?></small></div>
                    </div>
                    <div class="form-group row">
                         <label for="Date of birth" class="col-sm-3 col-form-label">Date of birth</label>
                         <div class="col-sm-9">
                            <small style="color:#737373;"><?php echo $ProfileInfo['DateofBirth'];?></small>
                         </div>
                         </div>
                    <div class="form-group row">
                         <label for="Sex" class="col-sm-3 col-form-label">Sex</label>
                         <div class="col-sm-9" ><small style="color:#737373;"><?php echo $ProfileInfo['Sex'];?></small>   
                         </div>
                    </div>
                    <div class="form-group row">
                         <label for="MaritalStatus" class="col-sm-3 col-form-label">Marital Status</label>
                         <div class="col-sm-9">
                         <small style="color:#737373;"><?php echo $ProfileInfo['MaritalStatus'];?></small>   
                         </div>
                         </div>
                    <div class="form-group row">
                         <label for="Caste" class="col-sm-3 col-form-label">Mother Tongue</label>
                         <div class="col-sm-9">
                            <small style="color:#737373;"><?php echo $ProfileInfo['MotherTongue'];?></small>  
                         </div>
                    </div>
                    <div class="form-group row">
                         <label for="Religion" class="col-sm-3 col-form-label">Religion</label>
                         <div class="col-sm-9">
                            <small style="color:#737373;"><?php echo $ProfileInfo['Religion'];?></small>   
                         </div>
                         </div>
                    <div class="form-group row">
                         <label for="Caste" class="col-sm-3 col-form-label">Caste</label>
                         <div class="col-sm-9">
                            <small style="color:#737373;"><?php echo $ProfileInfo['Caste'];?></small>   
                         </div>
                    </div>
                    <div class="form-group row">
                         <label for="Religion" class="col-sm-3 col-form-label">Community</label>
                         <div class="col-sm-9">
                            <small style="color:#737373;"><?php echo $ProfileInfo['Community'];?></small>   
                         </div>
                         </div>
                    <div class="form-group row">
                         <label for="Caste" class="col-sm-3 col-form-label">Nationality</label>
                         <div class="col-sm-9">
                            <small style="color:#737373;"><?php echo $ProfileInfo['Nationality'];?></small>   
                         </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                  <?php foreach($ProfilePhotos as $ProfilePhoto) {?>
                   <div class="photoview">
                    <img src="<?php echo AppUrl;?>uploads/<?php echo $ProfilePhoto['ProfilePhoto'];?>" style="height:120px;">
                  </div> 
                  <?php }?>
                  </div>
              </div>
         </div>
</div>
</div>
<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
    <h4 class="card-title">Education Details</h4>
        <div class="form-group row">
            <label for="Community" class="col-sm-2 col-form-label">Qualification</label>
            <div class="col-sm-9"> <small style="color:#737373;"><?php echo $EducationAttachment['EducationDetails'];?></small></div>
             </div>
        <div class="form-group row">
            <label for="Name" class="col-sm-2 col-form-label">Education Degree</label>
            <div class="col-sm-9"> <small style="color:#737373;"><?php echo $EducationAttachment['EducationDegree'];?></small></div>
        </div>
    </div>
  </div>
</div>
<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
    <h4 class="card-title">Occupation Details</h4>
        <div class="form-group row">
            <label for="Community" class="col-sm-2 col-form-label">Employed As</label>
            <div class="col-sm-3"> <small style="color:#737373;"><?php echo $ProfileInfo['EmployedAs'];?></small></div>
            <label for="Sex" class="col-sm-2 col-form-label">Annual Income</label>
             <div class="col-sm-3" ><small style="color:#737373;"><?php echo $ProfileInfo['AnnualIncome'];?></small></div>
        </div>
        <div class="form-group row">
            <label for="Name" class="col-sm-2 col-form-label">Occupation</label>
            <div class="col-sm-3"><small style="color:#737373;"><?php echo $ProfileInfo['OccupationType'];?></small></div>
            <label for="Date of birth" class="col-sm-2 col-form-label">Occupation Type</label>
             <div class="col-sm-3">
                <small style="color:#737373;"><?php echo $ProfileInfo['TypeofOccupation'];?></small>
             </div>
        </div>
    </div>
  </div>
</div>
<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
    <h4 class="card-title">Family Information</h4>
        <div class="form-group row">
            <label for="Community" class="col-sm-2 col-form-label">Father's Name</label>
            <div class="col-sm-3"> <small style="color:#737373;"><?php echo $ProfileInfo['FathersName'];?></small></div>
             <label for="Name" class="col-sm-2 col-form-label">Father's Occupation</label>
            <div class="col-sm-3"><small style="color:#737373;"><?php echo $ProfileInfo['FathersOccupation'];?></small></div>
        </div>
        <div class="form-group row">
             <label for="Date of birth" class="col-sm-2 col-form-label">Mother's Name</label>
             <div class="col-sm-3">
                <small style="color:#737373;"><?php echo $ProfileInfo['MothersName'];?></small>
             </div>
             <label for="Sex" class="col-sm-2 col-form-label">Mother's Occupation</label>
             <div class="col-sm-3" ><small style="color:#737373;"><?php echo $ProfileInfo['MothersOccupation'];?></small>   
             </div>
        </div>
        <div class="form-group row">
             <label for="FamilyType" class="col-sm-2 col-form-label">Family Type</label>
             <div class="col-sm-3">
                <small style="color:#737373;"><?php echo $ProfileInfo['FamilyType'];?></small>
             </div>
             <label for="FamilyAffluence" class="col-sm-2 col-form-label">Family Affluence</label>
             <div class="col-sm-3" ><small style="color:#737373;"><?php echo $ProfileInfo['FamilyAffluence'];?></small>   
             </div>
        </div>
        <div class="form-group row">
             <label for="FamilyValue" class="col-sm-2 col-form-label">Family Value</label>
             <div class="col-sm-3">
                <small style="color:#737373;"><?php echo $ProfileInfo['FamilyValue'];?></small>
             </div>
        </div>
        <div class="form-group row">
             <label for="NumberOfbrothers" class="col-sm-2 col-form-label">Number Of Brothers</label>
             <div class="col-sm-1">
                <small style="color:#737373;"><?php echo $ProfileInfo['NumberofBrothers'];?></small>
             </div>
             <label for="NumberOfbrothers" class="col-sm-1 col-form-label">Elder</label>
             <div class="col-sm-1">
                <small style="color:#737373;"><?php echo $ProfileInfo['Elder'];?></small>
             </div>
             <label for="younger" class="col-sm-2 col-form-label">younger</label>
             <div class="col-sm-1">
                <small style="color:#737373;"><?php echo $ProfileInfo['Younger'];?></small>
             </div>
             <label for="younger" class="col-sm-2 col-form-label">Married</label>
             <div class="col-sm-1">
                <small style="color:#737373;"><?php echo $ProfileInfo['Married'];?></small>
             </div>
        </div>
        <div class="form-group row">
             <label for="NumberOfbrothers" class="col-sm-2 col-form-label">Number Of Sisters</label>
             <div class="col-sm-1">
                <small style="color:#737373;"><?php echo $ProfileInfo['NumberofSisters'];?></small>
             </div>
             <label for="NumberOfbrothers" class="col-sm-1 col-form-label">Elder</label>
             <div class="col-sm-1">
                <small style="color:#737373;"><?php echo $ProfileInfo['ElderSister'];?></small>
             </div>
             <label for="younger" class="col-sm-2 col-form-label">younger</label>
             <div class="col-sm-1">
                <small style="color:#737373;"><?php echo $ProfileInfo['YoungerSister'];?></small>
             </div>
             <label for="younger" class="col-sm-2 col-form-label">Married</label>
             <div class="col-sm-1">
                <small style="color:#737373;"><?php echo $ProfileInfo['MarriedSister'];?></small>
             </div>
        </div>
        </div>
    </div>
  </div>
  <div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
    <h4 class="card-title">Physical Information</h4>
        <div class="form-group row">
            <label for="Community" class="col-sm-3 col-form-label">Physically Impaired?</label>
            <div class="col-sm-3"> <small style="color:#737373;"><?php echo $ProfileInfo['PhysicallyImpaired'];?></small></div>
            <label for="Name" class="col-sm-3 col-form-label">Visually Impaired?</label>
            <div class="col-sm-3"><small style="color:#737373;"><?php echo $ProfileInfo['VisuallyImpaired'];?></small></div>
        </div>
        <div class="form-group row">
             <label for="Date of birth" class="col-sm-3 col-form-label">Vission Impaired?</label>
             <div class="col-sm-3">
                <small style="color:#737373;"><?php echo $ProfileInfo['VissionImpaired'];?></small>
             </div>
             <label for="Sex" class="col-sm-3 col-form-label">Speech Impaired?</label>
             <div class="col-sm-3" ><small style="color:#737373;"><?php echo $ProfileInfo['SpeechImpaired'];?></small>   
             </div>
        </div>
        <div class="form-group row">
             <label for="Date of birth" class="col-sm-3 col-form-label">Height</label>
             <div class="col-sm-3">
                <small style="color:#737373;"><?php echo $ProfileInfo['Height'];?></small>
             </div>
             <label for="Sex" class="col-sm-3 col-form-label">Weight</label>
             <div class="col-sm-3" ><small style="color:#737373;"><?php echo $ProfileInfo['Weight'];?></small>   
             </div>
        </div>
        <div class="form-group row">
             <label for="Date of birth" class="col-sm-3 col-form-label">Blood Group</label>
             <div class="col-sm-3">
                <small style="color:#737373;"><?php echo $ProfileInfo['BloodGroup'];?></small>
             </div>
             <label for="Sex" class="col-sm-3 col-form-label">Complexation</label>
             <div class="col-sm-3" ><small style="color:#737373;"><?php echo $ProfileInfo['Complexation'];?></small>   
             </div>
        </div>
        <div class="form-group row">
             <label for="Date of birth" class="col-sm-3 col-form-label">Body Type</label>
             <div class="col-sm-3">
                <small style="color:#737373;"><?php echo $ProfileInfo['BodyType'];?></small>
             </div>
             <label for="Sex" class="col-sm-3 col-form-label">Diet</label>
             <div class="col-sm-3" ><small style="color:#737373;"><?php echo $ProfileInfo['Diet'];?></small>   
             </div>
        </div>
        <div class="form-group row">
             <label for="Date of birth" class="col-sm-3 col-form-label">Smoking Habit</label>
             <div class="col-sm-3">
                <small style="color:#737373;"><?php echo $ProfileInfo['SmokingHabit'];?></small>
             </div>
             <label for="Sex" class="col-sm-3 col-form-label">Drinking Habit</label>
             <div class="col-sm-3" ><small style="color:#737373;"><?php echo $ProfileInfo['DrinkingHabit'];?></small>   
             </div>
        </div>
    </div>
  </div>
</div>
<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
    <h4 class="card-title">Communication Details</h4>
        <div class="form-group row">
            <label for="EmailID" class="col-sm-2 col-form-label">Email ID</label>
            <div class="col-sm-9"> <small style="color:#737373;"><?php echo $ProfileInfo['EmailID'];?></small></div>
        </div>
        <div class="form-group row">
            <label for="MobileNumber" class="col-sm-2 col-form-label">Mobile Number</label>
            <div class="col-sm-3"><small style="color:#737373;"><?php echo $ProfileInfo['MobileNumber'];?></small></div>
            <label for="WhatsappNumber" class="col-sm-2 col-form-label">Whatsapp Number</label>
             <div class="col-sm-3"><small style="color:#737373;"><?php echo $ProfileInfo['WhatsappNumber'];?></small></div>
        </div>
        <div class="form-group row">
            <label for="Address" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-9"><small style="color:#737373;"><?php echo $ProfileInfo['AddressLine1'];?><?php echo $ProfileInfo['AddressLine2'];?><?php echo $ProfileInfo['AddressLine3'];?></small></div>
        </div> 
        <div class="form-group row">
            <label for="Address" class="col-sm-2 col-form-label">Country</label>
            <div class="col-sm-3"><small style="color:#737373;"><?php echo $ProfileInfo['Country'];?></small></div>
            <label for="AddressLine2" class="col-sm-2 col-form-label">State</label>
             <div class="col-sm-3"><small style="color:#737373;"><?php echo $ProfileInfo['State'];?></small></div>
        </div> 
        <div class="form-group row">
            <label for="Address" class="col-sm-2 col-form-label">City</label>
            <div class="col-sm-3"><small style="color:#737373;"><?php echo $ProfileInfo['City'];?></small></div>
            <label for="AddressLine2" class="col-sm-2 col-form-label">Other Location</label>
             <div class="col-sm-3"><small style="color:#737373;"><?php echo $ProfileInfo['OtherLocation'];?></small></div>
        </div>
        </div>
    </div>
  </div>
  <div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
    <h4 class="card-title">Horoscope Details</h4>
        <div class="form-group row">
            <label for="EmailID" class="col-sm-2 col-form-label">Star Name</label>
            <div class="col-sm-9"> <small style="color:#737373;"><?php echo $ProfileInfo['StarName'];?></small></div>
        </div>
        <div class="form-group row">
            <label for="MobileNumber" class="col-sm-2 col-form-label">Rasi Name</label>
            <div class="col-sm-3"><small style="color:#737373;"><?php echo $ProfileInfo['RasiName'];?></small></div>
            <label for="WhatsappNumber" class="col-sm-2 col-form-label">Lakanam</label>
             <div class="col-sm-3"><small style="color:#737373;"><?php echo $ProfileInfo['Lakanam'];?></small></div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6">
               <table class="table table-bordered">
                <tbody>
                  <tr>
                    <td><?php echo $ProfileInfo['R1'];?></td>
                    <td><?php echo $ProfileInfo['R2'];?></td>
                    <td><?php echo $ProfileInfo['R3'];?></td>
                    <td><?php echo $ProfileInfo['R4'];?></td>
                  </tr>
                  <tr>
                    <td><?php echo $ProfileInfo['R5'];?></td>
                    <td colspan="2" rowspan="2" style="text-align:center;padding-top:61px">Rasi</td>
                    <td><?php echo $ProfileInfo['R8'];?></td>
                  </tr>
                  <tr>
                    <td><?php echo $ProfileInfo['R9'];?></td>
                    <td><?php echo $ProfileInfo['R12'];?></td>
                  </tr>
                  <tr>
                    <td><?php echo $ProfileInfo['R13'];?></td>
                    <td><?php echo $ProfileInfo['R14'];?></td>
                    <td><?php echo $ProfileInfo['R15'];?></td>
                    <td><?php echo $ProfileInfo['R16'];?></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="col-sm-6">
               <table class="table table-bordered">
                <tbody>
                  <tr>
                    <td><?php echo $ProfileInfo['A1'];?></td>
                    <td><?php echo $ProfileInfo['A2'];?></td>
                    <td><?php echo $ProfileInfo['A3'];?></td>
                    <td><?php echo $ProfileInfo['A4'];?></td>
                  </tr>
                  <tr>
                    <td><?php echo $ProfileInfo['A5'];?></td>
                    <td colspan="2" rowspan="2" style="text-align:center;padding-top:61px">Amsam</td>
                    <td><?php echo $ProfileInfo['A8'];?></td>
                  </tr>
                  <tr>
                    <td><?php echo $ProfileInfo['A9'];?></td>
                    <td><?php echo $ProfileInfo['A12'];?></td>
                  </tr>
                  <tr>
                    <td><?php echo $ProfileInfo['A13'];?></td>
                    <td><?php echo $ProfileInfo['A14'];?></td>
                    <td><?php echo $ProfileInfo['A15'];?></td>
                    <td><?php echo $ProfileInfo['A16'];?></td>
                  </tr>
                </tbody>
              </table>
            </div>
        </div>
        </div>
    </div>
  </div>
  
  <div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
    <h4 class="card-title">Parners Expectation</h4>
        <div class="form-group row">
            <label for="AgeFrom" class="col-sm-2 col-form-label">Age From</label>
            <div class="col-sm-3"> <small style="color:#737373;"><?php echo $PartnerExpectation['AgeFrom'];?></small></div>
            <label for="AgeTo" class="col-sm-2 col-form-label">Age To</label>
            <div class="col-sm-3"><small style="color:#737373;"><?php echo $PartnerExpectation['AgeTo'];?></small></div>
        </div>
        <div class="form-group row">
            <label for="Religion" class="col-sm-2 col-form-label">Religion</label>
            <div class="col-sm-3"> <small style="color:#737373;"><?php echo $PartnerExpectation['Religion'];?></small></div>
            <label for="Caste" class="col-sm-2 col-form-label">Caste</label>
            <div class="col-sm-3"><small style="color:#737373;"><?php echo $PartnerExpectation['Caste'];?></small></div>
        </div>
        <div class="form-group row">
            <label for="MaritalStatus" class="col-sm-2 col-form-label">Marital Status</label>
            <div class="col-sm-3"> <small style="color:#737373;"><?php echo $PartnerExpectation['MaritalStatus'];?></small></div>
            <label for="AnnualIncome" class="col-sm-2 col-form-label">Income Range</label>
            <div class="col-sm-3"><small style="color:#737373;"><?php echo $PartnerExpectation['AnnualIncome'];?></small></div>
        </div>
        <div class="form-group row">
            <label for="Education" class="col-sm-2 col-form-label">Education</label>
            <div class="col-sm-3"> <small style="color:#737373;"><?php echo $PartnerExpectation['Education'];?></small></div>
            <label for="EmployedAs" class="col-sm-2 col-form-label">Employed As</label>
            <div class="col-sm-3"><small style="color:#737373;"><?php echo $PartnerExpectation['EmployedAs'];?></small></div>
        </div>
    </div>
  </div>
</div>
 
            
<?php include_once("settings_footer.php");?>                    