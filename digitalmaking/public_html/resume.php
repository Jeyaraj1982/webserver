<?php 
include_once("config.php");

$data = $mysql->select("select * from _tbl_resume_general_info where ResumeID='".$_GET['id']."' and IsDelete='0'");
if (sizeof($data)==0) {
    include_once("noresume.php");
    exit;
}
$Educations = $mysql->select("select * from _tbl_resume_education where ResumeID='".$data[0]['ResumeID']."'");
$Experinces = $mysql->select("select * from _tbl_resume_experience where ResumeID='".$data[0]['ResumeID']."'");
$Skills = $mysql->select("select * from _tbl_resume_skills where ResumeID='".$data[0]['ResumeID']."'"); 
$Carrier = $mysql->select("select * from _tbl_resume_additional_info where ResumeID='".$data[0]['ResumeID']."' and AdditionalInfo='Carrier Objectives'"); 
$AddidionalInfo = $mysql->select("select * from _tbl_resume_additional_info where ResumeID='".$data[0]['ResumeID']."'"); 
$Age = date("Y-m-d")-date($data[0]['DateofBirth']);                                                    
$dup = $mysql->select("select * from resume_visitor_log where ResumeID='".$data[0]['ResumeID']."' and ipaddress='".$_SERVER['REMOTE_ADDR']."'");
$count = $mysql->select("select * from resume_visitor_log where ResumeID='".$data[0]['ResumeID']."'  ");
if (sizeof($dup)==0) {
    $id = $mysql->insert("resume_visitor_log",array("ResumeID"  => $data[0]['ResumeID'],
                                                    "viewed"    => 1,
                                                    "ipaddress" => $_SERVER['REMOTE_ADDR'],
                                                    "ViewedOn"  => date("Y-m-d H:i:s")));
}
?>
<html lang="en">                                                                           
<head>
  <title>Resume</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/c17e2145d5.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,700&display=swap" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;1,700&family=Roboto+Condensed&display=swap" rel="stylesheet"> 
</head>
<body style="background:#333">
<style>
.profile-pic {
    text-align: center;
}
.profile-pic .profile-pic-img {
    width: 100%;
    background: white;
}

.shadow {font-family: 'Lato', sans-serif;box-shadow: inset 0 10px 10px #f1f1f1;-moz-box-shadow: inset 0 10px 10px #f1f1f1;-webkit-box-shadow: inset inset 0 10px 10px #f1f1f1;border:1px solid #222;border-left:0px}

table,td,tr,div,span,b {font-family: 'Roboto Condensed', sans-serif;font-size:16px}
.shadow_theme_a {font-family: 'Lato', sans-serif;background:#183c60;box-shadow: inset 0 30px 30px #222;-moz-box-shadow: inset 0 30px 30px #222;-webkit-box-shadow: inset inset 0 30px 30px #222;border:1px solid #222; border-radius:0px 0px 0px 0px !important;border-top:0px;border-bottom:0px;border-left:0px}
.outershadow {border-radius:15px !important;box-shadow: 3px 3px 13px #666;-moz-box-shadow: 3px 3px 13px #666;-webkit-box-shadow: 3px 3px 13px #666;}
.views-label{border: 1px solid #fff !important;
background: #fff;
width: -moz-fit-content;
padding: 5px 10px;
border-radius: 50px;
font-weight: normal;
font-size: 14px;}
</style>
    <div style="width:900px;margin:0px auto;background:#fff;height:auto">
        <table>
            <tr>
                <td class="shadow_theme_a" style="width:260px;overflow:hidden;vertical-align:top;">
                    <div class="form-group row" style="margin-left:0px;margin-right:0px">
                        <div class="col-md-12" style="padding-left:0px;padding-right:0px;">
                            <div class="profile-pic" >
                                <img src="uploads/<?php echo $data[0]['ProfilePhoto'];?>" class="profile-pic-img">
                            </div>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <div class="col-md-12" style="text-align: center;">
                        <div class="views-label"><i class="fas fa-eye"></i> Views: <b><?php echo sizeof($count);?></b></div>
                            <h4 style="color:white">Contact</h4>    
                        </div>
                    </div> 
                    <div class="form-group row">
                        <div class="col-12" style="padding-left:0px">
                            <div style="padding-left:0px;width:60px;float:left">
                                <div class="shadow" style="background: #eff7ff;padding:3px 10px;border-bottom-right-radius: 3px;border-top-right-radius: 3px;text-align:right;font-size:20px;">
                                    <a href="mailto:<?php echo $data[0]['EmailID'];?>"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div style="padding-left:0px;float:left;color:white;padding-top:5px;padding-left:10px;padding-right:0px"><?php echo $data[0]['EmailID'];?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12" style="padding-left:0px">
                            <div style="padding-left:0px;width:60px;float:left">
                                <div style="background: #eff7ff;padding:3px 10px;border-bottom-right-radius: 3px;border-top-right-radius: 3px;text-align:right;font-size:20px;padding-right:15px">
                                    <a href="tel:<?php echo $data[0]['MobileNumber'];?>"><i class="fa fa-mobile" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div style="padding-left:0px;float:left;color:white;padding-top:5px;padding-left:10px;padding-right:0px"><?php echo $data[0]['MobileNumber'];?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12" style="padding-left:0px">
                            <div style="padding-left:0px;width:60px;float:left">
                                <div style="background: #eff7ff;padding:3px 10px;border-bottom-right-radius: 3px;border-top-right-radius: 3px;text-align:right;font-size:20px;">
                                    <a href="https://api.whatsapp.com/send?phone=<?php echo $data[0]['WhatsappNumber'];?>"><i class="fa fa-whatsapp"></i></a>
                                </div>
                            </div>
                            <div style="padding-left:0px;float:left;color:white;padding-top:5px;padding-left:10px;padding-right:0px"><?php echo $data[0]['WhatsappNumber'];?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12" style="padding-left:0px">
                            <div style="padding-left:0px;width:60px;float:left">
                                <div  style="background: #eff7ff;padding:3px 10px;border-bottom-right-radius: 3px;border-top-right-radius: 3px;text-align:right;font-size:20px;"><i class="fas fa-map-marker-alt contact-action-container-icon"></i></div>
                            </div>
                            <div style="padding-left:0px;float:left;color:white;padding-top:5px;padding-left:10px;padding-right:0px">
                                <?php echo $data[0]['AddressLine1'];?><br>
                                <?php echo $data[0]['AddressLine2'];?><br>
                                <?php echo $data[0]['AddressLine3'];?></div>
                        </div>
                    </div>
                    <?php if (sizeof($Skills)>0) { ?>
                    <div class="form-group row">
                        <div class="col-md-12" style="text-align: center;">
                            <h4 style="color:white">Skills</h4>    
                        </div>
                    </div>
                    <div class="form-group row" style="padding-left:20px;padding-right:10px">
                        <div class="col-md-12">
                            <?php foreach($Skills as $Skill) { ?>
                            <div class="form-group row" style="margin-bottom: 0px;">
                                <div class="col-md-6" style="color:white;padding-top:5px;padding-right:0px">
                                    <?php echo $Skill['Title'];?>
                                </div>
                                <div class="col-md-6" style="color:white;padding-top:5px;padding-right:0px">
                                    <?php echo progressBarResume($Skill['SkillsRange']);?>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>  
                    <?php }?>                                                 
                </td>
                <td>
                    <div style="background:#fff;padding-left:20px;padding-right:15px;">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <h3 style="font-size:40px;font-weight:bold"><?php echo $data[0]['ResumeName'];?></h3>
                                <!--<span style="font-size:25px"><?php //echo $data[0]['Proffession'];?></span><br>-->
                                <?php if(strlen(trim($data[0]['CareerObjectives']))>0) { ?>
                                    <div style="font-size:21px;background: #183c60;color:white;width: 220px;padding: 3px 0px 3px 10px;border-radius: 5px;margin-bottom:10px">Career Objectives</div>
                                    <span style="color: #666"><?php echo $data[0]['CareerObjectives'];?></span><br>   
                                <?php } ?>
                                    <!--<span style="color: #666"><?php //echo $data[0]['Description'];?></span>-->
                            </div>
                        </div>
                        <div>                                                             
                            <div style="font-size:21px;background: #183c60;color:white;width: 220px;padding: 3px 0px 3px 10px;border-radius: 5px;">Personal Information</div>
                            <div style="margin-top:15px;margin-bottom:20px;">
                                <span style="color: #666"><?php echo $data[0]['PersonalInfo'];?></span>
                            </div>              
                            <table style="margin-bottom:20px;">
                                <tr>
                                    <td style="padding:5px;"><span style="color: #3c3b3b;">Name </span></td>
                                    <td style="padding:5px;"><span style="color: #666;">:&nbsp;<?php echo $data[0]['ResumeName'];?></span></td>
                                </tr>
                                <tr>
                                    <td style="padding:5px;"><span style="color: #3c3b3b;">Gender</span></td>
                                    <td style="padding:5px;"><span style="color: #666;">:&nbsp;<?php echo $data[0]['Gender'];?></span></td>
                                </tr>
                                <tr>
                                    <td style="padding:5px;"><span style="color: #3c3b3b;">Date of Birth</span></td>
                                    <td style="padding:5px;"><span style="color: #666;">:&nbsp;<?php echo date("d-M-Y",strtotime($data[0]['DateofBirth']));?>&nbsp;&nbsp;<span style="font-size:14px;font-weight:normal">(<?php echo $Age;?>&nbsp;Yrs)</span></span></td>
                                </tr>   
                                <tr>
                                    <td style="padding:5px;"><span style="color: #3c3b3b;">Father's Name</span></td>
                                    <td style="padding:5px;"><span style="color: #666;">:&nbsp;<?php echo $data[0]['FathersName'];?></span></td>
                                </tr>
                                <!--<tr>
                                    <td style="padding:5px;"><span style="color: #3c3b3b;">Community</span></td>
                                    <td style="padding:5px;"><span style="color: #666;">:&nbsp;<?php echo $data[0]['Community'];?></span></td>
                                </tr>
                                -->
                                <tr>
                                    <td style="padding:5px;"><span style="color: #3c3b3b;">Religion</span></td>
                                    <td style="padding:5px;"><span style="color: #666;">:&nbsp;<?php echo $data[0]['Religion'];?></span></td>
                                </tr>
                                <tr>
                                    <td style="padding:5px;"><span style="color: #3c3b3b;">Nationality</span></td>
                                    <td style="padding:5px;"><span style="color: #666;">:&nbsp;<?php echo $data[0]['Nationality'];?></span></td>
                                </tr>
                                <tr>
                                    <td style="padding:5px;"><span style="color: #3c3b3b">Marital Status</span></td>
                                    <td style="padding:5px;"><span style="color: #666;">:&nbsp;<?php echo $data[0]['MaritalStatus'];?></span></td>
                                </tr>
                                <tr>
                                    <td style="padding:5px;"><span style="color: #3c3b3b;">Language</span></td>
                                    <td style="padding:5px;"><span style="color: #666;">:&nbsp;<?php echo $data[0]['Language'];?></span></td>
                                </tr>
                            </table>
                            
                            <?php if (sizeof($Educations)>0) { ?>
                            <div style="font-size:21px;background: #183c60;color:white;width: 220px;padding: 3px 0px 3px 10px;border-radius: 5px;margin-bottom:10px;">Education Information</div>
                            <table style="margin-bottom:20px;">
                                <?php foreach($Educations as $Education){ ?> 
                                <tr>
                                    <td style="padding:5px;vertical-align:top;width:50px;"><span style="color: #3c3b3b;"><?php echo $Education['AcademicYear'];?></span></td>
                                    <td style="padding:5px;"><span style="color: #666;font-weight:bold"><?php echo $Education['Course'];?> <span style="font-size:14px;font-weight:normal">(<?php echo $Education['Percentage'];?>%)</span></span><br><span style="color: #666"><?php echo $Education['Institute'];?></span></td>
                                </tr>
                                <?php } ?>
                            </table>
                            <?php } ?>

                            <?php if (sizeof($Experinces)>0) { ?>
                            <div style="font-size:21px;background: #183c60;color:white;width: 220px;padding: 3px 0px 3px 10px;border-radius: 5px;margin-bottom:10px;">Working Experience</div>
                            <table style="margin-bottom:20px;">
                                <?php foreach($Experinces as $Experince){ ?> 
                                <tr>
                                    <td style="padding:5px;vertical-align:top;width:100px;"><span style="color: #666"><?php echo $Experince['FromYear']." - ".$Experince['ToYear'];?></span></td>
                                    <td style="padding:5px;"><span style="color: #3c3b3b;font-weight:bold"><?php echo $Experince['NameofCompany'];?></span><br><span style="color:#666"><?php echo $Experince['Designation'];?></span><br><span style="color:#333;font-size: 14px;line-height:18px"><?php echo $Experince['Description'];?></span></td>
                                </tr>
                                <?php } ?>
                            </table> 
                            <?php } ?>                           
                            
                            <?php if (sizeof($AddidionalInfo)>0) { ?>
                            <div style="font-size:21px;background: #183c60;color:white;width: 220px;padding: 3px 0px 3px 10px;border-radius: 5px;margin-bottom:10px;">Additional Information</div>
                            <table style="margin-bottom:20px;">
                                <?php foreach($AddidionalInfo as $AddidionalInfos){ ?> 
                                <tr>
                                    <td style="padding:5px;">
                                    <div style="color: #3c3b3b;font-weight:bold;color: #666;margin-bottom:10px;">
                                        <?php if ($AddidionalInfos['AdditionalInfo']!="Others") {
                                             echo $AddidionalInfos['AdditionalInfo'];
                                        } else {
                                            echo $AddidionalInfos['OtherAdditionalInfo'];
                                        }?>
                                    </div>
                                    <span style="color:#333;font-size: 14px;line-height:20px">
                                    <?php $d = explode("\n",$AddidionalInfos['Description']);
                                    if (sizeof($d)>0) {
                                        echo "<ul>";
                                    foreach($d as $dd) {
                                        if (trim($dd)!="") {
                                        echo "<li>".strip_tags($dd)."</li>";
                                        }
                                    }
                                    echo "<ul>";
                                    }
                                    ?>
                                    </span>
                                    </td>
                                </tr>
                                <?php } ?>
                            </table> 
                            <?php } ?> 
                            </div>
                            
                            <div style="font-size:21px;background: #183c60;color:white;width: 220px;padding: 3px 0px 3px 10px;border-radius: 5px;margin-bottom:10px;">Declaration</div>
                            <div style="padding-left:5px;padding-bottom:30px;"><?php echo $data[0]['Declaration'];?></div> 
                            <table style="width:98%;margin:0px auto">
                                <tr>
                                    <td style="width: 50%;">Date:</td>
                                    <td style="width: 50%;"></td>
                                </tr>
                                <tr>
                                    <td>Place:</td>
                                    <td style="text-align: right"><span style="color: #666;"><?php echo $data[0]['ResumeName'];?></span></td>
                                </tr>
                             </table>
                             <br><br>
                             
                    </div>
        </td>
            </tr>
        </table>
    </div>
</body>
</html>