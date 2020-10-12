<?php
$data=$mysql->select("select * from _tbl_resume_general_info where ResumeID='".$_GET['id']."'");
?>
<script>
function CoppyResumeUrl() {
  var copyText = document.getElementById("ResumeUrl");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  document.getElementById("ErrCopyResumeUrl").innerHTML = "Copied !";
}

</script>
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">General Information</div>    <br>
                                        <div class="form-group form-show-validation row" style="padding: 0px;">
                                             <div class="col-lg-6 col-md-6 col-sm-6">
                                             <label>Resume Url</label>
                                                <div class="input-group">
                                                  <input type="text" class="form-control" readonly="readonly" id="ResumeUrl" value="https://www.digitalmaking.in/r-<?php echo $data[0]['Url'];?>">
                                                  <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2" onclick="CoppyResumeUrl()"><i class="fas fa-copy"></i></span>
                                                  </div>
                                                </div>
                                                <span id="ErrCopyResumeUrl" style="font-size: 12px;"></span>
                                             </div>
                                             <div class="col-lg-6 col-md-6 col-sm-6" style="text-align: right;">
                                                <label>Viewed</label>
                                                <div style="font-size: 24px;"><?php echo sizeof($mysql->select("select * from resume_visitor_log where ResumeID='".$data[0]['ResumeID']."'"));?></div>                                        
                                             </div>
                                        </div> 
                                        
                                    </div>
                                <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitProduct();" id="addProduct" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Name</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['ResumeName'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Proffession</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['Proffession'];?></div>
                                        </div>
                                        <!--<div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Proffession Description</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['Description'];?></div>
                                        </div>-->
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Career Objectives</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['CareerObjectives'];?></div>
                                        </div>
                                        <!--<div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Personal Information</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['PersonalInfo'];?></div>
                                        </div>-->
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Gender</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['Gender'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Date of Birth</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['DateofBirth'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Father's Name</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['FathersName'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Mobile Number</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['MobileNumber'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Whatsapp Number</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['WhatsappNumber'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Email ID</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['EmailID'];?></div>
                                        </div>
                                        <!--<div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Community</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['Community'];?></div>
                                        </div>-->
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Religion</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['Religion'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Nationality</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['Nationality'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Marital Status</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['MaritalStatus'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">     
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Language</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['Language'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Website</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo "https://".$data[0]['Website'];?></div>
                                        </div>
                                        
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Address Line1</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['AddressLine1'];?></div>
                                        </div>
                                        <?php if($data[0]['AddressLine2']!=""){ ?>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Address Line2</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['AddressLine2'];?></div>
                                        </div>
                                        <?php } ?>
                                        <?php if($data[0]['AddressLine3']!=""){ ?>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Address Line3</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['AddressLine3'];?></div>
                                        </div>
                                        <?php } ?>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Profile Photo</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                        <img src="../<?php echo "uploads/".$data[0]['ProfilePhoto'];?>" style='width: 64px;height:64px;margin-top: 5px;'>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Declaration</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['Declaration'];?></div>
                                        </div>
                                    </div>                                                                        
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a href="dashboard.php?action=Resumes/list" class="btn btn-warning btn-border">Back</a>
                                            </div>                                        
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-6"><div class="card-title">Educational Information</div></div>
                                    </div>
                                    
                                </div>
                                <form id="exampleValidation" method="POST" action="" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="basic-datatables" class="table table-bordered" style="border-top:1px solid #ebedf2;">
                                                <thead>
                                                    <tr>
                                                        <th>Year</th>
                                                        <th>Course</th>
                                                        <th>Description</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $Educations = $mysql->select("select * from _tbl_resume_education where ResumeID='".$data[0]['ResumeID']."'");    ?>
                                                    <?php foreach($Educations as $Education) { ?>
                                                    <tr>
                                                        <td><?php echo $Education['AcademicYear'];?></td>
                                                        <td><?php echo $Education['Course'];?><br><span style="color:#acacac;"><?php echo $Education['Institute'];?> </span> </td>
                                                        <td><?php echo $Education['Description'];?></td>
                                                    </tr>                                                                                                                                                                                                                                                                                                                                                                    
                                                    <?php } ?>
                                                    <?php if(sizeof($Educations)==0){ ?>
                                                        <tr>                                                                                                                                                                                                                                                  
                                                            <td colspan="3" style="text-align:center">No Educations Details Found</td>                                                                                                                                        
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>                                                                        
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-6"><div class="card-title">Work Experience</div></div>
                                    </div>
                                    
                                </div>
                                <form id="exampleValidation" method="POST" action="" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="basic-datatables" class="table table-bordered" style="border-top:1px solid #ebedf2;">
                                                <thead>
                                                    <tr>
                                                        <th>Year</th>
                                                        <th>Title</th>
                                                        <th>Description</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $Epericences = $mysql->select("select * from _tbl_resume_experience where ResumeID='".$data[0]['ResumeID']."'");    ?>
                                                    <?php foreach($Epericences as $Epericence) { ?>
                                                    <tr>
                                                        <td><?php echo $Epericence['Year'];?></td>
                                                        <td><?php echo $Epericence['Title'];?><br><span style="color:#acacac;"><?php echo $Epericence['WorkingPlace'];?> </span> </td>
                                                        <td><?php echo $Epericence['Description'];?></td>
                                                    </tr>
                                                    <?php } ?>
                                                    <?php if(sizeof($Epericences)==0){ ?>
                                                        <tr>
                                                            <td colspan="3" style="text-align:center">No Experience Found</td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>                                                                        
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-6"><div class="card-title">Skills</div></div>
                                    </div>
                                    
                                </div>
                                <form id="exampleValidation" method="POST" action="" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="basic-datatables" class="table table-bordered" style="border-top:1px solid #ebedf2;">
                                                <thead>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Description</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $Skills = $mysql->select("select * from _tbl_resume_skills where ResumeID='".$data[0]['ResumeID']."'");    ?>
                                                    <?php foreach($Skills as $Skill) { ?>
                                                    <tr>
                                                        <td><?php echo $Skill['Title'];?></td>
                                                        <td><?php echo $Skill['Description'];?></td>
                                                    </tr>
                                                    <?php } ?>
                                                    <?php if(sizeof($Skills)==0){ ?>
                                                        <tr>
                                                            <td colspan="2" style="text-align:center">No Skills Found</td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>                                                                        
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-6"><div class="card-title">Additional Information</div></div>
                                    </div>
                                    
                                </div>
                                <form id="exampleValidation" method="POST" action="" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="basic-datatables" class="table table-bordered" style="border-top:1px solid #ebedf2;">
                                                <thead>
                                                    <tr>
                                                        <th>Additional Information</th>
                                                        <th>Description</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $Hobbies = $mysql->select("select * from _tbl_resume_additional_info where ResumeID='".$data[0]['ResumeID']."'");    ?>
                                                    <?php foreach($Hobbies as $Hobby) { ?>
                                                    <tr>
                                                        <td><?php if($Hobby['AdditionalInfo']=="Others"){  echo $Hobby['OtherAdditionalInfo']; } else { echo $Hobby['AdditionalInfo']; }?></td>
                                                        <td><?php echo $Hobby['Description'];?></td>
                                                    </tr>
                                                    <?php } ?>
                                                    <?php if(sizeof($Hobbies)==0){ ?>
                                                        <tr>
                                                            <td colspan="2" style="text-align:center">No Hobbies Found</td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>                                                                        
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 

        <?php include_once("footer.php");?>