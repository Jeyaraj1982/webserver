<?php include_once("config.php");?>
<html lang="en">
<head>
  <title>Resume</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body style="background:#333">
<style>
.profile-pic {
    text-align: center;
}
.profile-pic .profile-pic-img {
    width: 150px;
    height: 150px;
    margin-top: 30px;
    border-radius: 8px;
    border: 1px solid #fbb060;;
    border-radius: 50%;
    padding:3px;
    background: white;
    
}
</style>
<?php $data = $mysql->select("select * from _tbl_resume_general_info where ResumeID='".$_GET['id']."'");?>
<?php $Educations = $mysql->select("select * from _tbl_resume_education where ResumeID='".$data[0]['ResumeID']."'");?>
<?php $Experinces = $mysql->select("select * from _tbl_resume_experience where ResumeID='".$data[0]['ResumeID']."'");?>
<?php 
        $id = $mysql->insert("resume_visitor_log",array("ResumeID"    => $data[0]['ResumeID'],
                                                        "viewed"      => 1,
                                                        "ViewedOn"    => date("Y-m-d H:i:s")));
?>

    <div class="page-wrapper" id="home-section">
        <div class="page-details">
            <div class="page-content" style="width: 800px;margin:0px auto;">
                <div class="form-group row" style="margin-right:0px;margin-left:0px">
                    <div class="col-md-3" style="background:#183c60;">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="profile-pic" >
                                    <img src="uploads/<?php echo $data[0]['ProfilePhoto'];?>" class="profile-pic-img">
                                </div>
                            </div>
                        </div> 
                        <div class="form-group row">
                            <div class="col-md-12" style="text-align: center;">
                                <h4 style="color:white">Contact</h4>    
                            </div>
                        </div> 
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="col-md-3" style="margin-left: -16px;">
                                    <div  style="background: white;padding:5px;border-bottom-right-radius: 5px;border-top-right-radius: 5px;margin-left:-15px">email</div>
                                </div>
                                <div class="col-md-9" style="color:white"><?php echo $data[0]['EmailID'];?></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="col-md-3" style="margin-left: -16px;">
                                    <div  style="background: white;padding:5px;border-bottom-right-radius: 5px;border-top-right-radius: 5px;margin-left:-15px">mob</div>
                                </div>
                                <div class="col-md-9" style="color:white"><?php echo $data[0]['MobileNumber'];?></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="col-md-3" style="margin-left: -16px;">
                                    <div  style="background: white;padding:5px;border-bottom-right-radius: 5px;border-top-right-radius: 5px;margin-left:-15px">loc</div>
                                </div>
                                <div class="col-md-9" style="color:white"><?php echo $data[0]['AddressLine1'];?>&nbsp;<?php echo $data[0]['AddressLine2'];?>&nbsp;<?php echo $data[0]['AddressLine3'];?></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12" style="text-align: center;">
                                <h4 style="color:white">Skills</h4>    
                            </div>
                        </div>  
                    </div>
                    <div class="col-md-9">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <h3><?php echo $data[0]['ResumeName'];?></h3>
                            </div>
                        </div>
                        <div class="col-md-9">                                                             
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div style="background: #183c60;color:white;width: 150px;padding: 3px 0px 3px 10px;border-radius: 5px;">General Information</div>
                                    <span>
                                        <?php echo $data[0]['Description'];?>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div style="background: #183c60;color:white;width: 155px;padding: 3px 0px 3px 10px;border-radius: 5px;">Education Information</div>
                                    <?php foreach($Educations as $Education){ ?>
                                    <div class="col-md-12" style="margin-top: 5px;">                      
                                        <div class="col-md-2"><?php echo $Education['AcademicYear'];?></div>
                                        <div class="col-md-10"><?php echo $Education['Course'];?><br><span><?php echo $Education['Institute'];?></span></div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div style="background:#183c60;color:white;width: 155px;padding: 3px 0px 3px 10px;border-radius: 5px;">Working Experience</div>
                                    <?php foreach($Experinces as $Experince){ ?>
                                    <div class="col-md-12" style="margin-top: 5px;">                      
                                        <div class="col-md-2"><?php echo $Experince['Year'];?></div>
                                        <div class="col-md-10"><?php echo $Experince['Title'];?><br><span><?php echo $Experince['WorkingPlace'];?></span><br><br><?php echo $Experince['Description'];?></div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>